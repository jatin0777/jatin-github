<?php
/**
 * About Widget
 *
 * @package Catch Themes
 * @subpackage Rock Star
 * @since Rock Star 0.3
 */

/**
 * Makes a custom Widget for Displaying About
 *
 * Learn more: http://codex.wordpress.org/Widgets_API#Developing_Widgets
 *
 * @package Catch Themes
 * @subpackage Rock Star
 * @since Rock Star 0.3
 */
class rock_star_about_widget extends WP_Widget {

	/**
	 * Holds widget settings defaults, populated in constructor.
	 *
	 * @var array
	 */
	protected $defaults;

	function __construct() {

		$this->defaults = array(
			'title'        => '',
			'image'        => '',
			'image_title'  => '',
			'image_link'   => '',
			'image_alt'    => '',
			'image_target' => 0,
			'about'        => '',
			'more_link'    => '',
			'target'       => 0,
			'more_text'    => esc_html__( 'Read More', 'rock-star' )
		);

		$widget_ops = array(
			'classname'   => 'ct-about ctabout',
			'description' => esc_html__( 'Use this widget to add About Information', 'rock-star' ),
		);

		$control_ops = array(
			'id_base' => 'ct-about',
		);

		parent::__construct(
			'ct-about', // Base ID
			__( 'CT: About', 'rock-star' ), // Name
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
            <label for="<?php echo $this->get_field_id( 'image_title' ); ?>"><?php esc_html_e( 'Image Title:','rock-star'); ?></label>
        	<input type="text" name="<?php echo $this->get_field_name( 'image_title' ); ?>" value="<?php echo esc_attr( $instance['image_title'] ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'image_title' ); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php esc_html_e( 'Image:','rock-star'); ?></label>
            <br>
        	<input type="text" class="ct-upload" name="<?php echo $this->get_field_name( 'image' ); ?>" value="<?php echo esc_url( $instance['image'] ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" />
        	<button class="upload-media-button button button-primary" data-type="audio"><?php esc_html_e( 'Upload', 'rock-star' ); ?></button>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'image_link' ); ?>"><?php esc_html_e( 'Image Link:','rock-star'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name( 'image_link' ); ?>" value="<?php echo esc_url( $instance['image_link'] ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'image_link' ); ?>" />
        </p>

        <p>
        	<input class="checkbox" type="checkbox" <?php checked( $instance['image_target'], true ) ?> id="<?php echo $this->get_field_id( 'image_target' ); ?>" name="<?php echo $this->get_field_name( 'image_target' ); ?>" />
        	<label for="<?php echo $this->get_field_id( 'image_target' ); ?>"><?php esc_html_e( 'Check to Open Link in new Tab/Window', 'rock-star' ); ?></label><br />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'image_alt' ); ?>"><?php esc_html_e( 'Image Alt text:','rock-star'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name( 'image_alt' ); ?>" value="<?php echo esc_attr( $instance['image_alt'] ) ?>" class="widefat" id="<?php echo $this->get_field_id( 'image_alt' ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'about' ); ?>"><?php esc_html_e( 'About Text','rock-star'); ?></label>
        	<textarea class="ct-textarea" name="<?php echo $this->get_field_name( 'about' ); ?>" id="<?php echo $this->get_field_id( 'about' ); ?>"><?php echo esc_textarea( $instance['about'] ); ?></textarea>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'more_link' ); ?>"><?php esc_html_e( 'More Link:','rock-star'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name( 'more_link' ); ?>" value="<?php echo esc_url( $instance['more_link'] ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'more_link' ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'more_text' ); ?>"><?php esc_html_e( 'More Text:','rock-star'); ?></label>
        	<input type="text" name="<?php echo $this->get_field_name( 'more_text' ); ?>" value="<?php echo esc_attr( $instance['more_text'] ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'more_text' ); ?>" />
        </p>

        <p>
        	<input class="checkbox" type="checkbox" <?php checked( $instance['target'], true ) ?> id="<?php echo $this->get_field_id( 'target' ); ?>" name="<?php echo $this->get_field_name( 'target' ); ?>" />
        	<label for="<?php echo $this->get_field_id( 'target' ); ?>"><?php esc_html_e( 'Check to Open Link in new Tab/Window', 'rock-star' ); ?></label><br />
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
		$instance = $old_instance;

		$instance['title']        = sanitize_text_field( $new_instance['title'] );
		$instance['image']        = esc_url_raw( $new_instance['image'] );
		$instance['image_title']  = sanitize_text_field( $new_instance['image_title'] );
		$instance['image_link']   = esc_url_raw( $new_instance['image_link'] );
		$instance['image_alt']    = sanitize_text_field( $new_instance['image_alt'] );
		$instance['image_target'] = rock_star_sanitize_checkbox( $new_instance['image_target'] );
		$instance['about']        = wp_kses_post( $new_instance['about'] );
		$instance['more_link']    = esc_url_raw( $new_instance['more_link'] );
		$instance['target']       = rock_star_sanitize_checkbox( $new_instance['target'] );
		$instance['more_text']    = sanitize_text_field( $new_instance['more_text'] );

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

		if ( '' == $instance['title'] && '' == $instance['about'] ) {
			//Bail Early if both title and about are empty
			return;
		}

		echo $args['before_widget'];

		// Set up the author bio
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $args['after_title'];
		}

		$image
			=  isset( $instance['image'] ) ? $instance['image'] : '';
		$image_title
			=  isset( $instance['image_title'] ) ? $instance['image_title'] : '';
		$image_link
			=  isset( $instance['image_link'] ) ? $instance['image_link'] : '';
		$target
			=  isset( $instance['target'] ) ? $instance['target'] : '';
		$alt
			=  isset( $instance['image_alt'] ) ? $instance['image_alt'] : '';

		$base = '_self';

		if ( $target ) {
			$base = '_blank';
		}


		if ( '' != $image ) {
			echo '<figure class="featured-image alignleft">';

			$image_output = '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $alt ) . '" />';

			if ( '' != $image_link ) {
				echo '
				<a href="' . esc_url( $image_link ).'" target="' . esc_attr( $base ) . '">
					' . $image_output . '
				</a>';
			}
			else {
				echo $image_output;
			}

			echo '</figure>';
		}

		$about = $instance['about'];

		if ( '' != $instance['more_link'] ) {

			$more_base = '_self';

			if ( $instance['target'] ) {
				$more_base = '_blank';
			}
			$more_link = '<span class="read-more"><a class="btn btn-transparent" href="' . esc_url( $instance['more_link'] ) . '" target="' . esc_attr( $base ) . '">' . esc_attr( $instance['more_text'] ) . '</a></span>';

			$about = $about . ' ' . $more_link;
		}

		if ( ''!= $about ) {
			echo '<p>' . do_shortcode( $about ) . '</p>';
		}

		echo $args['after_widget'];
	}

}

/**
 * Initialize Widget
 */
function rock_star_about_init() {
	register_widget( 'rock_star_about_widget' );
}
add_action( 'widgets_init', 'rock_star_about_init' );
