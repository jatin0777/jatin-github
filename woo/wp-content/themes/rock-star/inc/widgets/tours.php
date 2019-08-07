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
class rock_star_tours_widget extends WP_Widget {

	/**
	 * Holds widget settings defaults, populated in constructor.
	 *
	 * @var array
	 */
	protected $defaults;

	function __construct() {

		$this->defaults = array(
			'title'            => '',
			'items_number'     => 5,
			'background-image' => '',
			'link'             => '',
			'link_text'        => '',
			'target'           => 1
		);

		$widget_ops = array(
			'classname'   => 'ct-tours cttours',
			'description' => esc_html__( 'Use this widget to add Tours', 'rock-star' ),
		);

		$control_ops = array(
			'id_base' => 'ct-tours',
		);

		parent::__construct(
			'ct-tours', // Base ID
			__( 'CT: Tours', 'rock-star' ), // Name
			$widget_ops,
			$control_ops
		);
	}

	/**
	 * Creates the form for the widget in the back-end which includes the Title , adcode, code, alt
	 * $instance Current settings
	 */
	function form( $instance ) {
		//* Merge with defaults
		$instance = wp_parse_args( (array) $instance, $this->defaults );
		?>
        <p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title', 'rock-star' ); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'items_number' ); ?>"><?php esc_html_e( 'No. of Items', 'rock-star' ); ?>:</label>
			<input type="number" id="<?php echo $this->get_field_id( 'items_number' ); ?>" name="<?php echo $this->get_field_name( 'items_number' ); ?>" value="<?php echo absint( $instance['items_number'] ); ?>" class="small-text" min="1" />
			<br>
			<span class="ct-description"><?php esc_html_e( 'Please save the widget once No. of items is changed to reflect the changes', 'rock-star' ); ?></span>
		</p>

		<p>
            <label for="<?php echo $this->get_field_id( 'background-image' ); ?>"><?php esc_html_e( 'Background Image Url:','rock-star'); ?></label>
            <br>
        	<input type="text" class="ct-upload" name="<?php echo $this->get_field_name( 'background-image' ); ?>" value="<?php echo esc_attr( $instance['background-image'] ); ?>" id="<?php echo $this->get_field_id( 'background-image' ); ?>" />
        	<button class="upload-media-button button button-primary"><?php esc_html_e( 'Upload', 'rock-star' ); ?></button>
        </p>

		<?php for( $i=1; $i<= absint( $instance['items_number'] ); $i++ ) { ?>
		<div class="ct-image-box">

		<?php
			$tours_title     =  isset( $instance['tours_title' . '_' .  $i] ) ? $instance['tours_title' . '_' .  $i] : '';
			$tours_date      =  isset( $instance['tours_date' . '_' .  $i] ) ? $instance['tours_date' . '_' .  $i] : '';
			$tours_address   =  isset( $instance['tours_address' . '_' .  $i] ) ? $instance['tours_address' . '_' .  $i] : '';
			$tours_link_1      =  isset( $instance['tours_link_1' . '_' .  $i] ) ? $instance['tours_link_1' . '_' .  $i] : '';
			$tours_link_text_1 =  isset( $instance['tours_link_text_1' . '_' .  $i] ) ? $instance['tours_link_text_1' . '_' .  $i] : '';
			$tours_link_2      =  isset( $instance['tours_link_2' . '_' .  $i] ) ? $instance['tours_link_2' . '_' .  $i] : '';
			$tours_link_text_2 =  isset( $instance['tours_link_text_2' . '_' .  $i] ) ? $instance['tours_link_text_2' . '_' .  $i] : '';
			$tours_link_3      =  isset( $instance['tours_link_3' . '_' .  $i] ) ? $instance['tours_link_3' . '_' .  $i] : '';
			$tours_link_text_3 =  isset( $instance['tours_link_text_3' . '_' .  $i] ) ? $instance['tours_link_text_3' . '_' .  $i] : '';
			$tours_link_4      =  isset( $instance['tours_link_4' . '_' .  $i] ) ? $instance['tours_link_4' . '_' .  $i] : '';
			$tours_link_text_4 =  isset( $instance['tours_link_text_4' . '_' .  $i] ) ? $instance['tours_link_text_4' . '_' .  $i] : '';
			$tours_links_target =  isset( $instance['tours_links_target' . '_' .  $i] ) ? $instance['tours_links_target' . '_' .  $i] : '';
		?>
		<h2> <?php printf( esc_html__( '%1s. Tour Details', 'rock-star' ), $i ); ?> </h2>
		<p>
        	<label for="<?php echo $this->get_field_id('tours_title' . '_' .  $i ); ?>">
        		<?php echo esc_html__( 'Title', 'rock-star' ); ?>
        	</label>

        	<br />

        	<input type="text" class="widefat" name="<?php echo $this->get_field_name('tours_title' . '_' .  $i ); ?>" id="<?php echo $this->get_field_id('tours_title' . '_' .  $i ); ?>" value="<?php echo esc_attr( $tours_title ); ?>">
        </p>

        <p>
        	<label for="<?php echo $this->get_field_id('tours_date' . '_' .  $i ); ?>">
        		<?php echo esc_html__( 'Date', 'rock-star' ); ?>
        	</label>

        	<br />

        	<input type="text" class="widefat ct-datepicker" name="<?php echo $this->get_field_name('tours_date' . '_' .  $i ); ?>" id="<?php echo $this->get_field_id('tours_date' . '_' .  $i ); ?>" value="<?php echo esc_attr( $tours_date ); ?>">
        </p>

        <p>
        	<label for="<?php echo $this->get_field_id('tours_address' . '_' .  $i ); ?>">
        		<?php echo esc_html__( 'Address', 'rock-star' ); ?>
        	</label>

        	<br />

        	<input type="text" class="widefat" name="<?php echo $this->get_field_name('tours_address' . '_' .  $i ); ?>" id="<?php echo $this->get_field_id('tours_address' . '_' .  $i ); ?>" value="<?php echo esc_attr( $tours_address ); ?>">
        </p>

        <p>
        	<label for="<?php echo $this->get_field_id('tours_link_1' . '_' .  $i ); ?>">
        		<?php echo esc_html__( 'Link 1', 'rock-star' ); ?>
        	</label>

        	<br />

        	<input type="text" class="widefat" name="<?php echo $this->get_field_name('tours_link_1' . '_' .  $i ); ?>" id="<?php echo $this->get_field_id('tours_link_1' . '_' .  $i ); ?>" value="<?php echo esc_attr( $tours_link_1 ) ; ?>">
        </p>

        <p>
        	<label for="<?php echo $this->get_field_id('tours_link_text_1' . '_' .  $i ); ?>">
        		<?php echo esc_html__( 'Link Text 1', 'rock-star' ); ?>
        	</label>

        	<br />

        	<input type="text" class="widefat" name="<?php echo $this->get_field_name('tours_link_text_1' . '_' .  $i ); ?>" id="<?php echo $this->get_field_id('tours_link_text_1' . '_' .  $i ); ?>" value="<?php echo esc_attr( $tours_link_text_1 ); ?>">
        </p>

        <p>
        	<label for="<?php echo $this->get_field_id('tours_link_2' . '_' .  $i ); ?>">
        		<?php echo esc_html__( 'Link 2', 'rock-star' ); ?>
        	</label>

        	<br />

        	<input type="text" class="widefat" name="<?php echo $this->get_field_name('tours_link_2' . '_' .  $i ); ?>" id="<?php echo $this->get_field_id('tours_link_2' . '_' .  $i ); ?>" value="<?php echo esc_attr( $tours_link_2 ) ; ?>">
        </p>

        <p>
        	<label for="<?php echo $this->get_field_id('tours_link_text_2' . '_' .  $i ); ?>">
        		<?php echo esc_html__( 'Link Text 2', 'rock-star' ); ?>
        	</label>

        	<br />

        	<input type="text" class="widefat" name="<?php echo $this->get_field_name('tours_link_text_2' . '_' .  $i ); ?>" id="<?php echo $this->get_field_id('tours_link_text_2' . '_' .  $i ); ?>" value="<?php echo esc_attr( $tours_link_text_2 ); ?>">
        </p>

        <p>
        	<label for="<?php echo $this->get_field_id('tours_link_3' . '_' .  $i ); ?>">
        		<?php echo esc_html__( 'Link 3', 'rock-star' ); ?>
        	</label>

        	<br />

        	<input type="text" class="widefat" name="<?php echo $this->get_field_name('tours_link_3' . '_' .  $i ); ?>" id="<?php echo $this->get_field_id('tours_link_3' . '_' .  $i ); ?>" value="<?php echo esc_attr( $tours_link_3 ) ; ?>">
        </p>

        <p>
        	<label for="<?php echo $this->get_field_id('tours_link_text_3' . '_' .  $i ); ?>">
        		<?php echo esc_html__( 'Link Text 3', 'rock-star' ); ?>
        	</label>

        	<br />

        	<input type="text" class="widefat" name="<?php echo $this->get_field_name('tours_link_text_3' . '_' .  $i ); ?>" id="<?php echo $this->get_field_id('tours_link_text_3' . '_' .  $i ); ?>" value="<?php echo esc_attr( $tours_link_text_3 ); ?>">
        </p>

        <p>
        	<label for="<?php echo $this->get_field_id('tours_link_4' . '_' .  $i ); ?>">
        		<?php echo esc_html__( 'Link 4', 'rock-star' ); ?>
        	</label>

        	<br />

        	<input type="text" class="widefat" name="<?php echo $this->get_field_name('tours_link_4' . '_' .  $i ); ?>" id="<?php echo $this->get_field_id('tours_link_4' . '_' .  $i ); ?>" value="<?php echo esc_attr( $tours_link_4 ) ; ?>">
        </p>

        <p>
        	<label for="<?php echo $this->get_field_id('tours_link_text_4' . '_' .  $i ); ?>">
        		<?php echo esc_html__( 'Link Text 4', 'rock-star' ); ?>
        	</label>

        	<br />

        	<input type="text" class="widefat" name="<?php echo $this->get_field_name('tours_link_text_4' . '_' .  $i ); ?>" id="<?php echo $this->get_field_id('tours_link_text_4' . '_' .  $i ); ?>" value="<?php echo esc_attr( $tours_link_text_4 ); ?>">
        </p>

        <p>
            <input class="checkbox" type="checkbox" <?php checked($tours_links_target, true) ?> id="<?php echo $this->get_field_id( 'tours_links_target' . '_' .  $i ); ?>" name="<?php echo $this->get_field_name( 'tours_links_target' . '_' .  $i ); ?>" />
        	<label for="<?php echo $this->get_field_id('tours_links_target' . '_' .  $i); ?>"><?php esc_html_e( 'Check to open link in new tab/window', 'rock-star' ); ?></label><br />
        </p>


        </div><!-- .ct-tour-box -->


	    <?php } //end for ?>

	    <p>
        	<label for="<?php echo $this->get_field_id( 'link' ); ?>">
        		<?php echo esc_html__( 'Link', 'rock-star' ); ?>
        	</label>

        	<br />

        	<input type="text" class="widefat" name="<?php echo $this->get_field_name('link'); ?>" id="<?php echo $this->get_field_id('link'); ?>" value="<?php echo esc_attr( $instance['link'] ) ; ?>">
        </p>

        <p>
        	<label for="<?php echo $this->get_field_id( 'link_text' ); ?>">
        		<?php echo esc_html__( 'Link Text', 'rock-star' ); ?>
        	</label>

        	<br />

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
		$instance 				= $old_instance;

		$instance['title']            = sanitize_text_field( $new_instance['title'] );
		$instance['items_number']     = absint( $new_instance['items_number'] );
		$instance['background-image'] = esc_url_raw( $new_instance['background-image'] );
		$instance['link']             = esc_url_raw( $new_instance['link'] );
		$instance['link_text']        = sanitize_text_field( $new_instance['link_text'] );
		$instance['target']           = rock_star_sanitize_checkbox( $new_instance['target'] );

		for( $i=1; $i<= absint( $instance['items_number'] ); $i++ ) {

			$instance['tours_title' . '_' .  $i]
				= sanitize_text_field( $new_instance['tours_title' . '_' .  $i] );
			$instance['tours_date' . '_' .  $i]
				= sanitize_text_field( $new_instance['tours_date' . '_' .  $i] );
			$instance['tours_address' . '_' .  $i]
				= sanitize_text_field( $new_instance['tours_address' . '_' .  $i] );
			$instance['tours_link_1' . '_' .  $i]
				= esc_url_raw( $new_instance['tours_link_1' . '_' .  $i] );
			$instance['tours_link_text_1' . '_' .  $i]
				= sanitize_text_field( $new_instance['tours_link_text_1' . '_' .  $i] );
			$instance['tours_link_2' . '_' .  $i]
				= esc_url_raw( $new_instance['tours_link_2' . '_' .  $i] );
			$instance['tours_link_text_2' . '_' .  $i]
				= sanitize_text_field( $new_instance['tours_link_text_2' . '_' .  $i] );
			$instance['tours_link_3' . '_' .  $i]
				= esc_url_raw( $new_instance['tours_link_3' . '_' .  $i] );
			$instance['tours_link_text_3' . '_' .  $i]
				= sanitize_text_field( $new_instance['tours_link_text_3' . '_' .  $i] );
			$instance['tours_link_4' . '_' .  $i]
				= esc_url_raw( $new_instance['tours_link_4' . '_' .  $i] );
			$instance['tours_link_text_4' . '_' .  $i]
				= sanitize_text_field( $new_instance['tours_link_text_4' . '_' .  $i] );
			$instance['tours_links_target' . '_' .  $i]
				= rock_star_sanitize_checkbox( $new_instance['tours_links_target' . '_' .  $i] );
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

			// Set up the author bio
			if ( ! empty( $instance['title'] ) ) {
				echo '<header class="entry-header">' . $args['before_title'] . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $args['after_title'] . '</header><!-- end entry-header -->';
			}

			echo '<div class="entry-content">
					<div class="tour-dates">';

			for( $i=1; $i<= absint( $instance['items_number'] ); $i++ ) {
				$tours_title     =  isset( $instance['tours_title' . '_' .  $i] ) ? $instance['tours_title' . '_' .  $i] : '';
				$tours_date      =  isset( $instance['tours_date' . '_' .  $i] ) ? $instance['tours_date' . '_' .  $i] : '';
				$tours_address   =  isset( $instance['tours_address' . '_' .  $i] ) ? $instance['tours_address' . '_' .  $i] : '';
				$tours_link_1      =  isset( $instance['tours_link_1' . '_' .  $i] ) ? $instance['tours_link_1' . '_' .  $i] : '';
				$tours_link_text_1 =  isset( $instance['tours_link_text_1' . '_' .  $i] ) ? $instance['tours_link_text_1' . '_' .  $i] : '';
				$tours_link_2      =  isset( $instance['tours_link_2' . '_' .  $i] ) ? $instance['tours_link_2' . '_' .  $i] : '';
				$tours_link_text_2 =  isset( $instance['tours_link_text_2' . '_' .  $i] ) ? $instance['tours_link_text_2' . '_' .  $i] : '';
				$tours_link_3      =  isset( $instance['tours_link_3' . '_' .  $i] ) ? $instance['tours_link_3' . '_' .  $i] : '';
				$tours_link_text_3 =  isset( $instance['tours_link_text_3' . '_' .  $i] ) ? $instance['tours_link_text_3' . '_' .  $i] : '';
				$tours_link_4      =  isset( $instance['tours_link_4' . '_' .  $i] ) ? $instance['tours_link_4' . '_' .  $i] : '';
				$tours_link_text_4 =  isset( $instance['tours_link_text_4' . '_' .  $i] ) ? $instance['tours_link_text_4' . '_' .  $i] : '';
				$links_target =  isset( $instance['tours_links_target' . '_' .  $i] ) ? $instance['tours_links_target' . '_' .  $i] : '';
				


				echo '<ul class="slide-one">
	                    <li>' . $tours_date . '</li>
	                    <li>' . $tours_title . '</li>
	                    <li>' . $tours_address . '</li>';



	                    if ( '' != $tours_link_1 || '' != $tours_link_2 || '' != $tours_link_3 || '' != $tours_link_4 ) {
	                    	echo '<li class="tour-links">';

	                    				$tours_links_target = '_self';

	                    				if ( $links_target ) {
	                    		        	$tours_links_target = '_blank';
	                    		        }


			                   	if ( '' != $tours_link_1 && '' != $tours_link_text_1 ) {
			                   		echo '
			                   		<a href="' . esc_url( $tours_link_1 ) . '" target="' . $tours_links_target . '"><span>' . esc_html( $tours_link_text_1 ) . '</span></a>
			                   		';
			                   	}

			                   	if ( '' != $tours_link_2 && '' != $tours_link_text_2 ) {
			                   		echo '
			                   		<a href="' . esc_url( $tours_link_2 ) . '" target="' . $tours_links_target . '"><span>' . esc_html( $tours_link_text_2 ) . '</span></a>
			                   		';
			                   	}

			                   	if ( '' != $tours_link_3 && '' != $tours_link_text_3 ) {
			                   		echo '
			                   		<a href="' . esc_url( $tours_link_3 ) . '" target="' . $tours_links_target . '"><span>' . esc_html( $tours_link_text_3 ) . '</span></a>
			                   		';
			                   	}

			                   	if ( '' != $tours_link_4 && '' != $tours_link_text_4 ) {
			                   		echo '
			                   		<a href="' . esc_url( $tours_link_4 ) . '" target="' . $tours_links_target . '"><span>' . esc_html( $tours_link_text_4 ) . '</span></a>
			                   		';
			                   	}
			                echo '</li><!-- .tour-links -->';
			            }

	                echo '</ul>';
			}

			echo '</div><!-- entry-content -->
				</div><!-- entry-content -->';

			$target = '_self';

			if ( $instance['target'] ) {
	        	$target = '_blank';
	        }

			if ( !empty( $instance['link'] ) && !empty( $instance['link_text'] ) ) {
				echo '<div class="view-more aligncenter">
	                            <a href="' . esc_url( $instance['link'] ) . '" target="' . $target . '">' . esc_html( $instance['link_text'] ) . '</a>
	                        </div><!-- end view more -->';
			}

		echo $args['after_widget'];
	}

}

/**
 * Initialize Widget
 */
function rock_star_tours_init() {
	register_widget( 'rock_star_tours_widget' );
}
add_action( 'widgets_init', 'rock_star_tours_init' );
