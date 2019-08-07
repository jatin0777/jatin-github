<?php
/**
 * Featured Embed Widget
 *
 * @package Catch Themes
 * @subpackage Rock Star
 * @since Rock Star 0.3
 */

/**
 * Makes a custom Widget for Displaying Embed Codes
 *
 * Learn more: http://codex.wordpress.org/Widgets_API#Developing_Widgets
 *
 * @package Catch Themes
 * @subpackage Rock Star
 * @since Rock Star 0.3
 */
class rock_star_video_embed_widget extends WP_Widget {

	/**
	 * Holds widget settings defaults, populated in constructor.
	 *
	 * @var array
	 */
	protected $defaults;

	function __construct() {

		$this->defaults = array(
			'title'            => '',
			'description'      => '',
			'background-image' => '',
			'items_number'     => 3,
			'link'             => '',
			'link_text'        => '',
			'target'           => 1
		);

		$widget_ops = array(
			'classname'   => 'ct-video-post ct-video-embed ctvideopostpageimage',
			'description' => esc_html__( 'Use this widget to add Video Embed Codes', 'rock-star' ),
		);

		$control_ops = array(
			'id_base' => 'ct-video-embed',
		);

		parent::__construct(
			'ct-video-embed', // Base ID
			__( 'CT: Video Embeds', 'rock-star' ), // Name
			$widget_ops,
			$control_ops
		);
	}

	/**
	 * Creates the form for the widget in the back-end which includes the Title , adcode, code, alt
	 * $instance Current settings
	 */
	function form($instance) {
		//* Merge with defaults
		$instance = wp_parse_args( (array) $instance, $this->defaults );
		?>
        <p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title', 'rock-star' ); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php esc_html_e( 'Description', 'rock-star' ); ?>:</label>
			<textarea class="ct-textarea" name="<?php echo $this->get_field_name('description' ); ?>" id="<?php echo $this->get_field_id('description' ); ?>"><?php echo esc_textarea( $instance['description'] ) ?></textarea>
		</p>

		<p>
            <label for="<?php echo $this->get_field_id( 'background-image' ); ?>"><?php esc_html_e( 'Background Image Url:','rock-star'); ?></label>
            <br>
        	<input type="text" class="ct-upload" name="<?php echo $this->get_field_name( 'background-image' ); ?>" value="<?php echo esc_attr( $instance['background-image'] ); ?>" id="<?php echo $this->get_field_id( 'background-image' ); ?>" />
        	<button class="upload-media-button button button-primary"><?php esc_html_e( 'Upload', 'rock-star' ); ?></button>
        </p>

       <p>
			<label for="<?php echo $this->get_field_id( 'items_number' ); ?>"><?php esc_html_e( 'No. of Items', 'rock-star' ); ?>:</label>
			<input type="number" id="<?php echo $this->get_field_id( 'items_number' ); ?>" name="<?php echo $this->get_field_name( 'items_number' ); ?>" value="<?php echo absint( $instance['items_number'] ); ?>" class="small-text" min="1" />
			<br>
			<span class="ct-description"><?php esc_html_e( 'Please save the widget once No. of items is changed to reflect the changes', 'rock-star' ); ?></span>
		</p>

		<?php for( $i=1, $count = 0; $i<= absint( $instance['items_number'] ); $i++, $count++ ) { ?>

		<?php
			$code =  isset( $instance['code' . '_' .  $i] ) ? $instance['code' . '_' .  $i] : '';
		?>

		<p>
        	<label for="<?php echo $this->get_field_id('code' . '_' .  $i ); ?>">
        		<?php printf( esc_html__( 'Code %1s', 'rock-star' ), $i ); ?>
        	</label>

        	<textarea class="ct-textarea" name="<?php echo $this->get_field_name('code' . '_' .  $i ); ?>" id="<?php echo $this->get_field_id('code' . '_' .  $i ); ?>"><?php echo esc_textarea( $code ); ?></textarea>
        </p>
	    <?php } //end for ?>

	    <p>
        	<label for="<?php echo $this->get_field_id( 'link' ); ?>">
        		<?php echo esc_html__( 'More Link Url', 'rock-star' ); ?>
        	</label>
        	<input type="text" class="widefat" name="<?php echo $this->get_field_name('link'); ?>" id="<?php echo $this->get_field_id('link'); ?>" value="<?php echo esc_attr( $instance['link'] ) ; ?>">
        </p>

        <p>
        	<label for="<?php echo $this->get_field_id( 'link_text' ); ?>">
        		<?php echo esc_html__( 'More Link text', 'rock-star' ); ?>
        	</label>
        	<input type="text" class="widefat" name="<?php echo $this->get_field_name('link_text'); ?>" id="<?php echo $this->get_field_id('link_text'); ?>" value="<?php echo esc_attr( $instance['link_text'] ) ; ?>">
        </p>

        <p>
            <input class="checkbox" type="checkbox" <?php checked($instance['target'], true) ?> id="<?php echo $this->get_field_id( 'target' ); ?>" name="<?php echo $this->get_field_name( 'target' ); ?>" />
        	<label for="<?php echo $this->get_field_id('target'); ?>"><?php esc_html_e( 'Check to open link in new tab/window', 'rock-star' ); ?></label><br />
        </p>

        <?php
	}

	/**
	 * update the particular instant
	 *
	 * This function should check that $new_instance is set correctly.
	 * The newly calculated value of $instance should be returned.
	 * If "false" is returned, the instance won't be saved/updated.
	 *
	 * $new_instance New settings for this instance as input by the user via form()
	 * $old_instance Old settings for this instance
	 * Settings to save or bool false to cancel saving
	 */
	function update( $new_instance, $old_instance ) {
		$instance                     = $old_instance;
		$instance['title']            = sanitize_text_field( $new_instance['title'] );
		$instance['description']      = wp_kses_post( $new_instance['description'] );
		$instance['background-image'] = esc_url_raw( $new_instance['background-image'] );
		$instance['items_number']     = absint( $new_instance['items_number'] );
		$instance['link']             = esc_url_raw( $new_instance['link'] );
		$instance['link_text']        = sanitize_text_field( $new_instance['link_text'] );
		$instance['target']           = rock_star_sanitize_checkbox( $new_instance['target'] );

		for( $i=1; $i<= absint( $instance['items_number'] ); $i++ ) {
			$instance['code' . '_' .  $i]
				= wp_kses_stripslashes( $new_instance['code' . '_' .  $i] );
			$instance['embed_title' . '_' .  $i]
				= sanitize_text_field( $new_instance['embed_title' . '_' .  $i] );
		}

		return $instance;
	}

	/**
	 * Displays the Widget in the front-end.
	 *
	 * $args Display arguments including before_title, after_title, before_widget, and after_widget.
	 * $instance The settings for the particular instance of the widget
	 */
	function widget( $args, $instance ) {
		// Merge with defaults
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		echo $args['before_widget'];

		if ( '' != $instance['background-image'] ) {
			echo '<div data-background="' . esc_url( $instance['background-image'] ) . '" class="widget-background"></div>';
		}
			// Display Widget Title
			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $args['after_title'];
			}

			// Display Widget Description
			if ( ! empty( $instance['description'] ) ) {
				echo '<p>' . $instance['description'] . '</p>';
			}

			echo '<div class="article-wrap columns video-grid-layout">';

			for( $i=1, $count = 0; $i<= absint( $instance['items_number'] ); $i++, $count++ ) {
				$code        =  isset( $instance['code' . '_' .  $i] ) ? $instance['code' . '_' .  $i] : '';

				if ( '' != $code ) {
					$class = 'post type-video hentry video-' . $i;

					echo '
					<article class="' . $class . '">
						<div class="entry-container">
						' . $code . '
						</div><!-- .entry-container -->
					</article>';
				}
			}

			$target = '_self';
			if ( $instance['target'] ) {
				$target = '_blank';
			}

			if ( !empty( $instance['link'] ) && !empty( $instance['link_text'] ) ) {
				echo '
					<div class="view-more">
	                    <a target="' . $target. '" href="' . esc_url( $instance['link'] ) . '">' . esc_html( $instance['link_text'] ) . '</a>
	                </div><!-- .view-more -->';
			}

		echo $args['after_widget'];
	}

}

/**
 * Initialize Widget
 */
function rock_star_video_embed_init() {
	register_widget( 'rock_star_video_embed_widget' );
}
add_action( 'widgets_init', 'rock_star_video_embed_init' );
