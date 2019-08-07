<?php
/**
 * Background Image Widget
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
class rock_star_background_image_widget extends WP_Widget {

	/**
	 * Holds widget settings defaults, populated in constructor.
	 *
	 * @var array
	 */
	protected $defaults;

	function __construct() {

		$this->defaults = array(
			'image'		=> '',
			'height'	=> '300',
			'padding'	=> '0'
		);

		$widget_ops = array(
			'classname'   => 'ct-background-image ctbackgroundimage',
			'description' => esc_html__( 'Use this widget to add Background Image', 'rock-star' ),
		);

		$control_ops = array(
			'id_base' => 'ct-background-image',
		);

		parent::__construct(
			'ct-background-image', // Base ID
			esc_html__( 'CT: Background Image', 'rock-star' ), // Name
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
            <label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php esc_html_e( 'Image Url:','rock-star'); ?></label>
            <br>
        	<input type="text" class="ct-upload" name="<?php echo $this->get_field_name( 'image' ); ?>" value="<?php echo esc_url( $instance['image'] ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" />
        	<button class="upload-media-button button button-primary"><?php esc_html_e( 'Upload', 'rock-star' ); ?></button>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php esc_html_e( 'Height (px):','rock-star'); ?></label>
            <br>
        	<input type="number" name="<?php echo $this->get_field_name( 'height' ); ?>" value="<?php echo absint( $instance['height'] ); ?>" id="<?php echo $this->get_field_id( 'height' ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'padding' ); ?>"><?php esc_html_e( 'Padding (px):','rock-star'); ?></label>
            <br>
        	<input type="number" name="<?php echo $this->get_field_name( 'padding' ); ?>" value="<?php echo absint( $instance['padding'] ); ?>" id="<?php echo $this->get_field_id( 'padding' ); ?>" />
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

		$instance['image']		= esc_url_raw( $new_instance['image'] );
		$instance['height']		= absint( $new_instance['height'] );
		$instance['padding']	= absint( $new_instance['padding'] );

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

		$image   =  isset( $instance['image'] ) ? esc_url( $instance['image'] ) : '';
		$padding = '';
		$height = '';

		if ( $instance['padding'] > 0 ) {
			$padding = 'padding: '. absint( $instance['padding'] ) .'px 0;';
		}

		if ( '300' != $instance['height'] ) {
			$height = 'height: '. absint( $instance['height'] ) .'px;';
		}

		if ( '' != $image ) {
			echo $args['before_widget'];
			echo '<span class="divider"><img src=" ' . trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'images/gallery/divider-1920x156.png" alt="divider"></span>
                <span class="background-image" style="background-image: url('. esc_url( $image ) .'); '. $height . $padding . '"></span>
				<span class="divider"><img src=" ' . trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'images/gallery/divider-1920x156.png" alt="divider"></span>';
            echo $args['after_widget'];
		}
	}
}

/**
 * Initialize Widget
 */
function rock_star_background_image_init() {
	register_widget( 'rock_star_background_image_widget' );
}
add_action( 'widgets_init', 'rock_star_background_image_init' );
