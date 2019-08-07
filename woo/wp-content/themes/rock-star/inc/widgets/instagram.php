<?php
/**
 * Newsletter Widget
 *
 * @package Catch Themes
 * @subpackage Rock Star
 * @since Rock Star 0.3
 */

class rock_star_instagram_widget extends WP_Widget {

	/**
	 * Holds widget settings defaults, populated in constructor.
	 *
	 * @var array
	 */
	protected $defaults;

	/**
	 * Constructor. Set the default widget options and create widget.
	 *
	 * @since 0.1.0
	 */
	function __construct() {
		$this->defaults = array(
			'title'            => esc_html__( 'Instagram', 'rock-star' ),
			'username'         => '',
			'number'           => 6,
			'layout'           => 'six-columns',
			'size'             => 'thumbnail',
			'background-image' => '',
			'target'           => 0,
			'link'             => esc_html__( 'View on Instagram', 'rock-star' ),
		);

		$widget_ops = array(
			'classname'   => 'ct-instagram ctninstagram',
			'description' => esc_html__( 'Displays your latest Instagram photos', 'rock-star' ),
		);

		$control_ops = array(
			'id_base' => 'ct-instagram',
		);

		parent::__construct(
			'ct-instagram', // Base ID
			__( 'CT: Instagram', 'rock-star' ), // Name
			$widget_ops,
			$control_ops
		);
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title', 'rock-star' ); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php esc_html_e( 'Username', 'rock-star' ); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" value="<?php echo esc_attr( $instance['username'] ); ?>" class="widefat" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php esc_html_e( 'Number of photos', 'rock-star' ); ?>:</label>
			<input type="number" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo absint( $instance['number'] ); ?>" class="small-text" min="1" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'size' ); ?>"><?php _e( 'Instagram Image Size', 'rock-star' ); ?>:</label>
			<select id="<?php echo $this->get_field_id( 'size' ); ?>" name="<?php echo $this->get_field_name( 'size' ); ?>" class="widefat">
				<?php
					$post_type_choices = array(
						'thumbnail' => esc_html__( 'Thumbnail', 'rock-star' ),
						'small'     => esc_html__( 'Small', 'rock-star' ),
						'large'     => esc_html__( 'Large', 'rock-star' ),
						'original'  => esc_html__( 'Original', 'rock-star' ),
					);

				foreach ( $post_type_choices as $key => $value ) {
					echo '<option value="' . $key . '" '. selected( $key, $instance['size'], false ) .'>' . $value .'</option>';
				}
				?>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'layout' ); ?>"><?php _e( 'Layout', 'rock-star' ); ?>:</label>
			<select id="<?php echo $this->get_field_id( 'layout' ); ?>" name="<?php echo $this->get_field_name( 'layout' ); ?>" class="widefat">
				<?php
					$post_type_choices = array(
						'one-column'	=> esc_html__( '1 Column', 'rock-star' ),
						'two-columns'	=> esc_html__( '2 Columns', 'rock-star' ),
						'three-columns'	=> esc_html__( '3 Columns', 'rock-star' ),
						'four-columns'	=> esc_html__( '4 Columns', 'rock-star' ),
						'five-columns'	=> esc_html__( '5 Columns', 'rock-star' ),
						'six-columns'   => esc_html__( '6 Columns', 'rock-star' ),
						'seven-columns'	=> esc_html__( '7 Columns', 'rock-star' ),
						'eight-columns'	=> esc_html__( '8 Columns', 'rock-star' ),
					);

				foreach ( $post_type_choices as $key => $value ) {
					echo '<option value="' . $key . '" '. selected( $key, $instance['layout'], false ) .'>' . $value .'</option>';
				}
				?>
			</select>
		</p>

		<p>
            <label for="<?php echo $this->get_field_id( 'background-image' ); ?>"><?php esc_html_e( 'Background Image Url:','rock-star'); ?></label>
            <br>
        	<input type="text" class="ct-upload" name="<?php echo $this->get_field_name( 'background-image' ); ?>" value="<?php echo esc_attr( $instance['background-image'] ); ?>" id="<?php echo $this->get_field_id( 'background-image' ); ?>" />
        	<button class="upload-media-button button button-primary"><?php esc_html_e( 'Upload', 'rock-star' ); ?></button>
        </p>

		<p>
        	<input class="checkbox" type="checkbox" <?php checked( $instance['target'], true ) ?> id="<?php echo $this->get_field_id( 'target' ); ?>" name="<?php echo $this->get_field_name( 'target' ); ?>" />
        	<label for="<?php echo $this->get_field_id('target' ); ?>"><?php esc_html_e( 'Check to Open Link in new Tab/Window', 'rock-star' ); ?></label><br />
        </p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>"><?php esc_html_e( 'Link text', 'rock-star' ); ?>:
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['link'] ); ?>" /></label></p>
		<?php

	}

	function update( $new_instance, $old_instance ) {
		delete_transient( 'instagram-a3-'.sanitize_title_with_dashes( $new_instance['username'] ) );
		$instance = $old_instance;

		$instance['title']            = sanitize_text_field( $new_instance['title'] );
		$instance['username']         = sanitize_text_field( $new_instance['username'] );
		$instance['number']           = absint( $new_instance['number'] );
		$instance['size']             = sanitize_key( $new_instance['size'] );
		$instance['layout']           = sanitize_key( $new_instance['layout'] );
		$instance['background-image'] = esc_url_raw( $new_instance['background-image'] );
		$instance['target']           = rock_star_sanitize_checkbox( $new_instance['target'] );
		$instance['link']             = sanitize_text_field( $new_instance['link'] );

		return $instance;
	}

	function widget( $args, $instance ) {
		// Merge with defaults
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		echo $args['before_widget'];

		// Set up the author bio
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $args['after_title'];
		}

		$username = empty( $instance['username'] ) ? '' : $instance['username'];
		$number   = empty( $instance['number'] ) ? 9 : $instance['number'];
		$size     = empty( $instance['size'] ) ? 'large' : $instance['size'];
		$link     = empty( $instance['link'] ) ? '' : $instance['link'];
		$layout   = empty( $instance['layout'] ) ? '' : $instance['layout'];

		$target = '_self';

		if ( $instance['target'] ) {
			$target = '_blank';
		}

		if ( '' != $username ) {

			$media_array = $this->scrape_instagram( $username, $number, $size );

			if ( is_wp_error( $media_array ) ) {

				echo wp_kses_post( $media_array->get_error_message() );

			} else {
				// filter for images only?
				if ( $images_only = apply_filters( 'rock_star_images_only', FALSE ) ) {
					$media_array = array_filter( $media_array, array( $this, 'images_only' ) );
				}

				?>

				<div class="instagram-image-wrapper columns <?php echo esc_attr( $layout ); ?>">
				<?php
					foreach ( $media_array as $item ) {
						echo '
						<figure class="hentry">
                            <a href="'. esc_url( $item['link'] ) .'" target="'. esc_attr( $target ) .'">
                            	<img src="'. esc_url( $item['img_src'] ) .'" alt="'. esc_attr( $item['description'] ) .'" title="'. esc_attr( $item['description'] ) .'">
                            </a>
                        </figure>
						';
					}
				?>
				</div><!-- .instagram-image-wrapper -->
			<?php
			}
		}

		$linkclass = apply_filters( 'rock_star_link_class', 'clear' );

		if ( '' != $link ) {
			?>
			<div class="view-more aligncenter <?php echo esc_attr( $linkclass ); ?>">
                <a href="//instagram.com/<?php echo esc_attr( trim( $username ) ); ?>"  rel="me" target="<?php echo esc_attr( $target ); ?>"><?php echo wp_kses_post( $link ); ?></a>
            </div>
			<?php
		}

		echo $args['after_widget'];

		if ( '' != $instance['background-image'] ) {
			echo '
			<style type="text/css" rel="ct-widget-css '. esc_attr( $args['widget_id'] ) .'">
				#'. esc_attr( $args['widget_id'] ) .' {
					background-image: url('. esc_url( $instance['background-image'] ) .');
					background-position: 50% 50%;
				}
			</style>'
			;
		}
	}

	// based on https://gist.github.com/cosmocatalano/4544576
	function scrape_instagram( $username, $slice = 9, $size = 'thumbnail' ) {
		$username = strtolower( $username );
		$username = str_replace( '@', '', $username );

		if ( false === ( $instagram = get_transient( 'instagram-a3-'.sanitize_title_with_dashes( $username ) ) ) ) {

			$remote = wp_remote_get( 'http://instagram.com/'.trim( $username ) );

			if ( is_wp_error( $remote ) ) {
				return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Instagram.', 'rock-star' ) );
			}

			if ( 200 != wp_remote_retrieve_response_code( $remote ) ) {
				return new WP_Error( 'invalid_response', esc_html__( 'Instagram did not return a 200.', 'rock-star' ) );
			}

			$shards      = explode( 'window._sharedData = ', $remote['body'] );
			$insta_json  = explode( ';</script>', $shards[1] );
			$insta_array = json_decode( $insta_json[0], TRUE );

			if ( ! $insta_array ) {
				return new WP_Error( 'bad_json', esc_html__( 'Instagram has returned invalid data.', 'rock-star' ) );
			}

			if ( isset( $insta_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'] ) ) {
				$images = $insta_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'];
			} else {
				return new WP_Error( 'bad_json_2', esc_html__( 'Instagram has returned invalid data.', 'rock-star' ) );
			}

			if ( ! is_array( $images ) ) {
				return new WP_Error( 'bad_array', esc_html__( 'Instagram has returned invalid data.', 'rock-star' ) );
			}

			$instagram = array();

			foreach ( $images as $image_node ) {
				$image_unfiltered = $image_node['node'];

				$image['thumbnail_src'] = preg_replace( '/^https?\:/i', '', $image_unfiltered['thumbnail_src'] );
				$image['display_src']   = preg_replace( '/^https?\:/i', '', $image_unfiltered['display_url'] );

				$index = 0; // Index 0 is for default $size = 'thumbnail'.

				if ( 'small' === $size ) {
					$index = 2;
				} elseif ( 'large' === $size ) {
					$index = 3;
				}

				$image['image_src'] = preg_replace('#^https?:#', '', isset( $image_unfiltered['thumbnail_resources'][ $index ]['src'] ) ? $image_unfiltered['thumbnail_resources'][ $index ]['src'] : $image['thumbnail_src'] );

				// Original image size is not in thumbnail_resources array, so we create a different condition here.
				if ( 'original' === $size ) {
					$image['image_src'] = $image['display_src'];
				}

				if ( $image_unfiltered['is_video'] == true ) {
					$type = 'video';
				}
				else {
					$type = 'image';
				}

				$caption = esc_html__( 'Instagram Image', 'rock-star' );

				if ( ! empty( $image_unfiltered['edge_media_to_caption']['edges'][0]['node']['text'] ) ) {
					$caption = $image_unfiltered['edge_media_to_caption']['edges'][0]['node']['text'];
				}

				$instagram[] = array(
					'description' => $caption,
					'link'        => '//instagram.com/p/' . $image_unfiltered['shortcode'],
					'img_src'     => $image['image_src'],
					'type'        => $type
				);
			}

			// do not set an empty transient - should help catch private or empty accounts
			if ( ! empty( $instagram ) ) {
				set_transient( 'instagram-a3-'.sanitize_title_with_dashes( $username ), $instagram, apply_filters( 'rock_star_instagram_cache_time', HOUR_IN_SECONDS*2 ) );
			}
		}

		if ( ! empty( $instagram ) ) {
			return array_slice( $instagram, 0, $slice );
		} else {

			return new WP_Error( 'no_images', esc_html__( 'Instagram did not return any images.', 'rock-star' ) );

		}
	}

	function images_only( $media_item ) {
		if ( $media_item['type'] == 'image' ) {
			return true;
		}

		return false;
	}
}

/**
 * Initialize Widget
 */
function rock_star_instagram_init() {
	register_widget( 'rock_star_instagram_widget' );
}
add_action( 'widgets_init', 'rock_star_instagram_init' );
