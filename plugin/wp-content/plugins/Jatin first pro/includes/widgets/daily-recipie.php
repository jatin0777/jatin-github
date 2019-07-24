<?php

class R_Daily_Recipie_Widget extends WP_Widget {
	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		
		parent::__construct( 'r_daily_recipie_widget', 'Recipie of the day', array(

			'description' => 'Display a random recipie each day'

		));
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget

		extract($args);
		extract($instance);

		$title = apply_filters( 'widget_title',$title );
		echo $before_widget;
		echo $before_title.$title.$after_title;

		$recipie_id = get_transient('r_daily_recipie');
		?>
		<a href="<?php echo get_permalink($recipie_id); ?>"><?php echo the_title($recipie_id); ?></a>

		<?php
		echo $after_widget;
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		$default = array('title'=>'Recipie of the day');
		$instance = wp_parse_args((array) $instance,$default );

		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title : </label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr($instance['title']); ?>">
		</p>

		<?php



	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		$instance = array();
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}
}
?>