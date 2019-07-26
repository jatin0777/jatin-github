<?php
/**
 * The Gallery and Widget for Instagram Helper of the plugin.
 *
 * @link       catchplugins.com
 * @since      1.0.0
 *
 * @package    Catch_Instagram_Feed_Gallery_Widget
 * @subpackage Catch_Instagram_Feed_Gallery_Widget/includes
 */

/**
 * The Gallery and Widget for Instagram Helper of the plugin.
 *
 * @package    Catch_Instagram_Feed_Gallery_Widget
 * @subpackage Catch_Instagram_Feed_Gallery_Widget/includes
 * @author     Catch Plugins <info@catchplugins.com>
 */
class Catch_Instagram_Feed_Gallery_Widget_Helper {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $public_url    The url to get feed from.
	 */
	private $url = 'https://api.instagram.com/v1/';

	/**
	 * Get Media and return in JSON format.
	 *
	 * @param string $type Account type.
	 *
	 * @param string $user Username.
	 *
	 * @param string $limit Count.
	 *
	 * @return json
	 */
	function get_media( $limit = null ) {
		if ( isset( $_POST['pagination_link'] ) ) {
			$url = $_POST['pagination_link'];
		} else {
			$options = catch_instagram_feed_gallery_widget_get_options( 'catch_instagram_feed_gallery_widget_options' );
			$token   = $options['access_token'];
			$url     = $this->url . 'users/self/media/recent/?access_token=' . esc_html( $token ) . '&count=' . absint( $limit );
	    } // End if().
	    $json = self::get_remote_data_from_instagram_in_json( $url );
	    return $json;
	}

	/**
	 * Parse user media json
	 *
	 * @param string $url URL.
	 *
	 * @return json
	 */
	function get_remote_data_from_instagram_in_json( $url ) {
	    $content = wp_remote_get( $url, array(
	    	'timeout'     => 100,
	    	)
	    );

	    if ( isset( $content->errors ) ) {
	        $content = array(
	        	'meta' => array(
	        		'error_message' => $content->errors['http_request_failed']['0'],
	        		 ),
	        	);
	        return $content;
	    } else {
	    	if ( 'Invalid User' === $content['body'] ) {
	    		$json = array(
	    			'meta' => array(
	    				'error_message' => $content['body'],
	    				),
	    			);
	    	} else {
				$response = wp_remote_retrieve_body( $content );
				//$json     = json_decode( $response, true );
				$json = $response;
	        }
	        return $json;
	    }
	}

	/**
	 * Convert json data to HTML
	 *
	 * @param  array $options Widget/Shortcode options.
	 */
	function display( $options ) {
		//delete_transient( 'catch_insta_json_' . $options['number'] . '_' . $options['size'] );
		//$data = get_transient( 'catch_insta_json_' . '_' . $options['username'] . $options['number'] . '_' . $options['size'] );
		//echo '<pre>'; print_r($data); echo '</pre>'; die();
		if ( false === ( $data = get_transient( 'catch_insta_json_' . '_' . $options['username'] . $options['number'] . '_' . $options['size'] ) ) ) {
		  // It wasn't there, so regenerate the data and save the transient
		  $data = $this->get_media( $options['number'] );
		  $data = json_decode( $data, true );
		  set_transient(  'catch_insta_json_' . '_' . $options['username'] . $options['number'] . '_' . $options['size'], $data, HOUR_IN_SECONDS );
		}

	    $output = '';
		if ( ! $data ) {
			$output .= esc_html__( 'No Data', 'catch-instagram-feed-gallery-widget' );
			return $output;
		} elseif ( isset( $data['meta']['error_message'] ) ) {
			if ( isset( $data['meta']['error_type'] ) ) {
				$output .= esc_html__( 'Provide API access token / Username', 'catch-instagram-feed-gallery-widget' );
				return $output;
			} else {
				$output .= esc_html( $data['meta']['error_message'] );
				return $output;
			}
		} else {
	    	if ( ( isset( $options['title'] ) && ! empty( $options['title'] ) ) && ( isset( $options['element'] ) && 'shortcode' === $options['element'] ) ) {
	    		$output .= '<h2>' . esc_html( $options['title'] ) . '</h2>';
	    	}
	    	$grid_class = '';

	    	$catch_instagram_feed_gallery_widget_class = 'default';

	    	$output .= '<input type="hidden" name="catch-instagram-feed-gallery-widget-ajax-nonce" id="catch-instagram-feed-gallery-widget-ajax-nonce" value="' . esc_attr( wp_create_nonce( 'catch-instagram-feed-gallery-widget-ajax-nonce' ) ) . '" />';
	    	$output .= '<div class="catch-instagram-feed-gallery-widget-wrapper ' . esc_attr( $catch_instagram_feed_gallery_widget_class ) . '">';
			$output .= '<div class="catch-instagram-feed-gallery-widget-image-wrapper">';

			$key = 'data';
			$next_url = isset( $data['pagination']['next_url'] ) ? $data['pagination']['next_url'] : '';

			if ( 0 === count( $data[ $key ] ) ) {
				$output .= esc_html__( 'No data / Invalid Username / Private Account', 'catch-instagram-feed-gallery-widget' );
				return;
			}
			$output .= '<ul>';
			foreach ( $data[ $key ] as $src ) {
				/*echo '<pre>'; print_r($src);
				echo '</pre>';*/
				$output .= '<li class="item">';
				$caption = $src['caption']['text'] ? $src['caption']['text'] : '';
				$like_comments_block = '<span class="cifgw-info">
			    	<span class="cifgw-count cifgw-likes">
			    		' . esc_attr( $src['likes']['count'] ) . '</span>
			    	<span class="cifgw-count cifgw-comments">
			    		' . esc_attr( $src['comments']['count'] ) . '</span>
		    	</span>';

				if ( 'video' === $src['type'] ) {
					$output .= '<a class="pretty" target="_blank" href="' . esc_url( $src['link'] ) . '">';
					if ( 'thumbnail' == $options['size'] ) {
						$options['size'] = 'low_resolution';
					}
					$output .= '<div id="' . absint( $src['id'] ) . '" style="display:none; position: absolute;">
								<video width="500" height="344" controls>
								  <source src="' . esc_url( $src['videos'][ $options['size'] ]['url'] ) . '" type="video/mp4">
								  Your browser does not support HTML5 video.
								</video>
							</div>
						    	<img class="cifgw" src="' . esc_url( $src['images'][ $options['size'] ]['url'] ) . '" />
						    	<span class="cifgw-overlay"></span>';

				    $output .= '<i class="overlay-icon dashicons dashicons-video-alt3"></i>';

					$output .= '</a>';
				} elseif ( 'image' === $src['type'] ) {

					$output .= '<a class="pretty" target="_blank" href="' . esc_url( $src['link'] ) . '">';

					$output .= '<img class="cifgw" src="' . esc_url( $src['images'][ $options['size'] ]['url'] ) . '" />
						    	<span class="cifgw-overlay"></span>';
					$output .= '</a>';
				} elseif ( 'carousel' === $src['type'] ) {
					$output .= '<a class="pretty" target="_blank" href="' . esc_url( $src['link'] ) . '">';
					$output .= '
					    	<img class="cifgw" src="' . esc_url( $src['images'][ $options['size'] ]['url'] ) . '" />
					    	<span class="cifgw-overlay"></span>';

					$output .= '<i class="fa fa-clone overlay-icon"></i>';
					$output .= '</a>';
				} // End if().
			} // End foreach().
			$output .= '</ul>';
			if ( isset( $next_url ) && '' !== $next_url ) {
				$link = $next_url;
			}

			$output .= '</div>';

			$opt = catch_instagram_feed_gallery_widget_get_options( 'catch_instagram_feed_gallery_widget_options' );

			$link = '//instagram.com/' . esc_html( $opt['username'] );
			$output .= '<p class="instagram-button"><a class="button" href="' . esc_url( $link ) . '" target="_blank"> ' . esc_html__( 'View on Instagram', 'catch-instagram-feed-gallery-widget' ) . '</a></p>';
			$output .= '</div>';

	        // Return the HTML block.
	        return $output;
		} // End if().
	}

	/**
	 * Text transform to sentence case
	 *
	 * @param string $string Layout of the widget.
	 */
	function sentence_case( $string ) {
		$new_string = '';
	    $sentences = preg_split( '/([.?!]+)/', $string, -1,PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE );
	    foreach ( $sentences as $key => $sentence ) {
	        $new_string .= ( $key & 1 ) == 0?
	            ucfirst( strtolower( trim( $sentence ) ) ) :
	            $sentence . ' ';
	    }
	    return trim( $new_string );
	}
}
