<?php
/**
 * Featured Post Widget
 *
 * @package Catch Themes
 * @subpackage Rock Star
 * @since Rock Star 0.3
 */

/**
 * Featured Post widget class
 *
 * @since Rock Star Magazine 1.0
 */
class rock_star_featured_post_widget extends WP_Widget {

	/**
	 * Holds widget settings defaults, populated in constructor.
	 *
	 * @var array
	 */
	protected $defaults;

	function __construct() {

		$this->defaults = array(
			'title'				=> '',
			'post_number'		=> 1,
			'layout'			=> 'one-columns',
			'disable_image'		=> 0,
			'image_alignment'	=> 'left',
			'image_size'		=> 'rock-star-small',
			'disable_title'		=> 0,
			'hide_category'		=> 0,
			'hide_tags'			=> 1,
			'hide_posted_on'	=> 1,
			'hide_author'		=> 1,
			'content_type'		=> '',
			'content_limit'		=> 200,
			'background-image'	=> '',
			'more_text'			=> __( 'Read More ...', 'rock-star' ),
		);

		$widget_ops = array(
			'classname'   => 'ct-featured-post ctfeaturedpostpageimage',
			'description' => __( 'Displays featured posts with thumbnails', 'rock-star' ),
		);

		$control_ops = array(
			'id_base' => 'ct-featured-post',
		);

		parent::__construct(
			'ct-featured-post', // Base ID
			__( 'CT: Featured Posts', 'rock-star' ), // Name
			$widget_ops,
			$control_ops
		);
	}

	function form( $instance ) {

		//* Merge with defaults
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		$style = 'style="display: none;"';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'rock-star' ); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat" />
		</p>

        <p>
			<label for="<?php echo $this->get_field_id( 'post_number' ); ?>"><?php _e( 'No. of Posts', 'rock-star' ); ?>:</label>
			<input type="number" id="<?php echo $this->get_field_id( 'post_number' ); ?>" name="<?php echo $this->get_field_name( 'post_number' ); ?>" value="<?php echo absint( $instance['post_number'] ); ?>" class="small-text" min="1" />
		</p>

		<p>
        	<input class="checkbox ct_feat_post_disable_image" type="checkbox" <?php checked($instance['disable_image'], true) ?> id="<?php echo $this->get_field_id( 'disable_image' ); ?>" name="<?php echo $this->get_field_name( 'disable_image' ); ?>" />
        	<label for="<?php echo $this->get_field_id('disable_image'); ?>"><?php _e( 'Check to Disable Image', 'rock-star' ); ?></label><br />
        </p>

        <p <?php echo ( $instance['disable_image'] )? $style : '';  ?>>
			<label for="<?php echo $this->get_field_id( 'image_alignment' ); ?>"><?php _e( 'Image Alignment', 'rock-star' ); ?>:</label>
			<select id="<?php echo $this->get_field_id( 'image_alignment' ); ?>" name="<?php echo $this->get_field_name( 'image_alignment' ); ?>" class="widefat">
				<?php
					$image_alignment_choices = array(
						'top'    => __( 'Top', 'rock-star' ),
						'left'   => __( 'Left', 'rock-star' ),
						'right'  => __( 'Right', 'rock-star' ),
						'center' => __( 'Center', 'rock-star' ),
					);

				foreach ( $image_alignment_choices as $key => $value ) {
					echo '<option value="' . $key . '" '. selected( $key, $instance['image_alignment'], false ) .'>' . $value .'</option>';
				}
				?>
			</select>
		</p>

		<p <?php echo ( $instance['disable_image'] )? $style : '';  ?>>
			<label for="<?php echo $this->get_field_id( 'image_size' ); ?>"><?php _e( 'Image Size', 'rock-star' ); ?>:</label>
			<select id="<?php echo $this->get_field_id( 'image_size' ); ?>" class="rock-star-image-size-selector" name="<?php echo $this->get_field_name( 'image_size' ); ?>">
				<option value="thumbnail">thumbnail (<?php echo get_option( 'thumbnail_size_w' ); ?>x<?php echo get_option( 'thumbnail_size_h' ); ?>)</option>
				<?php
				$sizes = rock_star_get_additional_image_sizes();
				foreach( (array) $sizes as $name => $size )
					echo '<option value="'.esc_attr( $name ).'" '.selected( $name, $instance['image_size'], FALSE ).'>'.esc_html( $name ).' ( '.$size['width'].'x'.$size['height'].' )</option>';
				?>
			</select>
		</p>

        <p>
        	<input class="checkbox" type="checkbox" <?php checked($instance['disable_title'], true) ?> id="<?php echo $this->get_field_id( 'disable_title' ); ?>" name="<?php echo $this->get_field_name( 'disable_title' ); ?>" />
        	<label for="<?php echo $this->get_field_id('disable_title'); ?>"><?php _e( 'Check to Disable Title', 'rock-star' ); ?></label><br />
        </p>

        <p>
			<span class="description"><?php _e( 'Post Meta Info', 'rock-star' ); ?></span><br/>
			<input class="checkbox" type="checkbox" <?php checked($instance['hide_category'], true) ?> id="<?php echo $this->get_field_id( 'hide_category' ); ?>" name="<?php echo $this->get_field_name( 'hide_category' ); ?>" />
        	<label for="<?php echo $this->get_field_id('hide_category'); ?>"><?php _e( 'Check to Hide Category', 'rock-star' ); ?></label><br />
        	<input class="checkbox" type="checkbox" <?php checked($instance['hide_tags'], true) ?> id="<?php echo $this->get_field_id( 'hide_tags' ); ?>" name="<?php echo $this->get_field_name( 'hide_tags' ); ?>" />
        	<label for="<?php echo $this->get_field_id('hide_tags'); ?>"><?php _e( 'Check to Hide Tags', 'rock-star' ); ?></label><br />
        	<input class="checkbox" type="checkbox" <?php checked($instance['hide_posted_on'], true) ?> id="<?php echo $this->get_field_id( 'hide_posted_on' ); ?>" name="<?php echo $this->get_field_name( 'hide_posted_on' ); ?>" />
        	<label for="<?php echo $this->get_field_id('hide_posted_on'); ?>"><?php _e( 'Check to Hide Posted On Date', 'rock-star' ); ?></label><br />
        	<input class="checkbox" type="checkbox" <?php checked($instance['hide_author'], true) ?> id="<?php echo $this->get_field_id( 'hide_author' ); ?>" name="<?php echo $this->get_field_name( 'hide_author' ); ?>" />
        	<label for="<?php echo $this->get_field_id('hide_author'); ?>"><?php _e( 'Check Hide to Author', 'rock-star' ); ?></label><br />
		</p>

        <p>
			<label for="<?php echo $this->get_field_id( 'content_type' ); ?>"><?php _e( 'Content Type', 'rock-star' ); ?>:</label>
			<select class="ct_feat_post_content_type" id="<?php echo $this->get_field_id( 'content_type' ); ?>" name="<?php echo $this->get_field_name( 'content_type' ); ?>">
				<option value="content" <?php selected( 'content', $instance['content_type'] ); ?>><?php _e( 'Show Content', 'rock-star' ); ?></option>
				<option value="excerpt" <?php selected( 'excerpt', $instance['content_type'] ); ?>><?php _e( 'Show Excerpt', 'rock-star' ); ?></option>
				<option value="content-limit" <?php selected( 'content-limit', $instance['content_type'] ); ?>><?php _e( 'Show Content Limit', 'rock-star' ); ?></option>
				<option value="" <?php selected( '', $instance['content_type'] ); ?>><?php _e( 'No Content', 'rock-star' ); ?></option>
			</select>
			<br />
			<label <?php echo ( 'content-limit' != $instance['content_type'] )? $style : '';  ?>for="<?php echo $this->get_field_id( 'content_limit' ); ?>"><?php _e( 'Limit content to', 'rock-star' ); ?>
				<input type="text" id="<?php echo $this->get_field_id( 'content_limit' ); ?>" name="<?php echo $this->get_field_name( 'content_limit' ); ?>" value="<?php echo esc_attr( intval( $instance['content_limit'] ) ); ?>" size="3" />
				<?php _e( 'characters', 'rock-star' ); ?>
			</label>
		</p>

		<p>
            <label for="<?php echo $this->get_field_id( 'background-image' ); ?>"><?php esc_html_e( 'Background Image Url:','rock-star'); ?></label>
            <br>
        	<input type="text" class="ct-upload" name="<?php echo $this->get_field_name( 'background-image' ); ?>" value="<?php echo esc_attr( $instance['background-image'] ); ?>" id="<?php echo $this->get_field_id( 'background-image' ); ?>" />
        	<button class="upload-media-button button button-primary"><?php esc_html_e( 'Upload', 'rock-star' ); ?></button>
        </p>

		<p>
			<label for="<?php echo $this->get_field_id( 'more_text' ); ?>"><?php _e( 'More Text (if applicable)', 'rock-star' ); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'more_text' ); ?>" name="<?php echo $this->get_field_name( 'more_text' ); ?>" value="<?php echo esc_html( $instance['more_text'] ); ?>" />
		</p>

		<script>
		jQuery(document).ready(function($){

			disable_image = $( '.ct_feat_post_disable_image' );
			disable_image.change(function(){
				image_alignment = $(this).parent().next();
				image_size = $(this).parent().next().next();

				if ( $(this).is(':checked') ) {
					image_alignment.hide();
					image_size.hide();
				}
				else {
					image_alignment.show();
					image_size.show();
				}
				return false;
			});

			content_type = $( '.ct_feat_post_content_type' );
			content_type.change(function(){
				content_type_val = $(this).val();
				content_limit = $(this).next().next();

				if ( 'content-limit' == content_type_val ) {
					content_limit.show();
				}
				else {
					content_limit.hide();
				}
				return false;
			});
		});
		</script>
       	<?php
	}

	function update( $new_instance, $old_instance ) {

		$instance 						= $old_instance;
		$instance['title']				= sanitize_text_field( $new_instance['title'] );
		$instance['post_number']		= absint( $new_instance['post_number'] );
		$instance['disable_image']		= rock_star_sanitize_checkbox( $new_instance['disable_image'] );
		$instance['image_alignment']	= sanitize_key( $new_instance['image_alignment'] );
		$instance['image_size']			= sanitize_key( $new_instance['image_size'] );
		$instance['disable_title']		= rock_star_sanitize_checkbox( $new_instance['disable_title'] );
		$instance['hide_category']		= rock_star_sanitize_checkbox( $new_instance['hide_category'] );
		$instance['hide_tags']			= rock_star_sanitize_checkbox( $new_instance['hide_tags'] );
		$instance['hide_posted_on']		= rock_star_sanitize_checkbox( $new_instance['hide_posted_on'] );
		$instance['hide_author']		= rock_star_sanitize_checkbox( $new_instance['hide_author'] );
		$instance['content_type']		= sanitize_key( $new_instance['content_type'] );
		$instance['content_limit']		= absint( $new_instance['content_limit'] );
		$instance['background-image']	= esc_url_raw( $new_instance['background-image'] );
		$instance['more_text']			= sanitize_text_field( $new_instance['more_text'] );
		return $instance;
	}

	function widget( $args, $instance ) {
		$output ='';

		// Merge with defaults
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		$output .= $args['before_widget'];

		if ( '' != $instance['background-image'] ) {
			$output .= '<div data-background="' . esc_url( $instance['background-image'] ) . '" class="widget-background"></div>';
		}

			// Set up the author bio
			if ( ! empty( $instance['title'] ) ) {
				$output .= $args['before_title'] . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $args['after_title'];
			}

			$query_args = array(
				'post_type'           => 'post',
				'ignore_sticky_posts' => '1',
			);

			$query_args['posts_per_page'] = absint( $instance['post_number'] );

			$loop = new WP_Query( $query_args );

			if ( $loop->have_posts() ) :
				$output .= '<div class="article-wrap columns ' . esc_attr( $instance['layout'] ) . ' '. esc_attr( $instance['image_alignment'] ) . ' ' . esc_attr( $instance['image_size'] ) .'">';
					while ( $loop->have_posts() ) : $loop->the_post();

						$class = 'post-'. esc_attr( get_the_ID() ) . ' post type-post hentry';

						if ( $instance['disable_image'] || !has_post_thumbnail() ) {
							$class .= " no-featured-image";
						}

						$output .= '
						<article class="' . esc_attr( $class ) . '">';

							$title_attribute = the_title_attribute( 'echo=0' );

							if ( !$instance['disable_image'] && has_post_thumbnail() ) {
								$output.= '
								<figure class="featured-image">
									<a href="' . esc_url( get_permalink() ) . '" title="' . $title_attribute . '">' .
										get_the_post_thumbnail(
											get_the_ID(),
											$instance['image_size']
											) .'
									</a>
	                            </figure><!-- .featured-image -->';
							}
							$output .= '<div class="entry-container">';

								$output .= '<header class="entry-header">';

									if ( !$instance['disable_title'] ) {
										$output .= '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" title="'. $title_attribute .'">'. get_the_title() .'</a></h2>';
									}

									if (
										$instance['hide_category'] &&
										$instance['hide_tags'] &&
										$instance['hide_posted_on'] &&
										$instance['hide_author'] ) {
									}

									$output .= rock_star_get_highlight_meta(
												$instance['hide_category'],
												$instance['hide_tags'],
												$instance['hide_posted_on'],
												$instance['hide_author']
											);

								$output .= '</header><!-- .entry-header -->';

								if ( 'excerpt' == $instance['content_type'] ) {
									$output .= '<div class="entry-summary">';
									$output .= '<p>' . get_the_excerpt() . '</p>';
									$output .= '</div><!-- .entry-summary -->';
								}
								elseif ( 'content-limit' == $instance['content_type'] ) {
									$output .= '<div class="entry-summary">';
									$output .= rock_star_get_the_content_limit( (int) $instance['content_limit'], esc_html( $instance['more_text'] ) );
									$output .= '</div><!-- .entry-summary -->';
								}

								elseif ( 'content' == $instance['content_type'] ) {
									$output .= '<div class="entry-content">';
									$output .= get_the_content( esc_html( $instance['more_text'] ) );
									$output .= '</div><!-- .entry-content -->';

								}

							$output .= '</div><!-- .entry-container -->';
						$output .= '</article><!-- .type-post -->';
					endwhile;
				$output .= '</div><!-- .article-wrap -->';
			endif;

			//* Restore original query
			wp_reset_postdata();

		$output .= $args['after_widget'];

		echo $output;
	}
}

/**
 * Initialize Widget
 */
function rock_star_featured_post_init() {
	register_widget( 'rock_star_featured_post_widget' );
}
add_action( 'widgets_init', 'rock_star_featured_post_init' );
