<?php


 function magee_sliders_meta(){
	 $magee_sliders[] = array(
            'label'       => __( 'Select a slider', 'alchem' ),
            'value'       => ''
          );
	$alchem_custom_slider = new WP_Query( array( 'post_type' => 'magee_slider', 'post_status'=>'publish', 'posts_per_page' => -1 ) );
	while ( $alchem_custom_slider->have_posts() ) {
		$alchem_custom_slider->the_post();

		$magee_sliders[] = array(
            'label'       => get_the_title(),
            'value'       => get_the_ID()
          );
	}
	wp_reset_postdata();
	return $magee_sliders;
	 }
	 
/**
 * Initialize the custom Meta Boxes. 
 */
add_action( 'admin_init', 'alchem_meta_boxes' );

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types in demo-theme-options.php.
 *
 * @return    void
 * @since     2.0
 */
function alchem_meta_boxes() {
	
	global $wpdb, $wp_registered_sidebars;
/************ layerslider *************/
$layer_slides_array[] = array(
            'label'       => __( 'Select a slider', 'alchem' ),
            'value'       => ''
          );


/************ Magee Sliders*************/

$magee_sliders = magee_sliders_meta();

/************ get nav menus*************/
 
$nav_menus[] = array(
            'label'       => __( 'Default', 'alchem' ),
            'value'       => ''
          );
$menus = get_registered_nav_menus();

foreach ( $menus as $location => $description ) {
$nav_menus[] = array(
            'label'       => $description,
            'value'       => $location
          );
	
}
/* sidebars */

$alchem_sidebars[] = array(
            'label'       => __( 'Default', 'alchem' ),
            'value'       => ''
          );

foreach( $wp_registered_sidebars as $key => $value){
	
	$alchem_sidebars[] = array(
            'label'       => $value['name'],
            'value'       => $value['id'],
          );
	}
  /**
   * Create a custom meta boxes array that we pass to 
   * the OptionTree Meta Box API Class.
   */



 $alchem_page_meta_box = array(
    'id'          => 'page_meta_box',
    'title'       => __( 'Page Meta Box', 'alchem' ),
    'desc'        => '',
    'pages'       => array( 'page' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
	  array(
        'label'       => __( 'General Options', 'alchem' ),
        'id'          => 'general_options',
        'type'        => 'tab',
		'section'     => ''
		
      ),
	
	  array(
        'id'          => 'full_width',
        'label'       => __( 'Content Full Width', 'alchem' ),
        'desc'        => '',
        'std'         => 'no',
        'type'        => 'select',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		 'choices'     => array( 
			array(
            'value'       => 'no',
            'label'       => __( 'No', 'alchem' ),
            'src'         => ''
          ),
          array(
            'value'       => 'yes',
            'label'       => __( 'Yes', 'alchem' ),
            'src'         => ''
          )
          
        )
      ),
	  array(
        'id'          => 'padding_top',
        'label'       => __( 'Padding Top', 'alchem' ),
        'std'         => '',
		'desc'        => __('Page content top padding.', 'alchem' ),
        'type'        => 'text',
		'section'     => 'general_options'
      ),
	    array(
        'id'          => 'padding_bottom',
        'label'       => __( 'Padding Bottom', 'alchem' ),
        'std'         => '',
		'desc'        => __('Page content bottom padding.', 'alchem' ),
        'type'        => 'text',
		'section'     => 'general_options'
      ),
	  
	  
	  array(
        'id'          => 'display_title_bar',
        'label'       => __( 'Display Title Bar', 'alchem' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		 'choices'     => array( 
			array(
            'value'       => '',
            'label'       => __( 'Default', 'alchem' ),
            'src'         => ''
          ),
          array(
            'value'       => 'yes',
            'label'       => __( 'Yes', 'alchem' ),
            'src'         => ''
          ),
          array(
            'value'       => 'no',
            'label'       => __( 'No', 'alchem' ),
            'src'         => ''
          )
        )
      ),
	  
	  array(
        'id'          => 'nav_menu',
        'label'       => __( 'Select Nav Menu', 'alchem' ),
        'desc'        => '',
        'std'         => 'yes',
        'type'        => 'select',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		 'choices'     =>  $nav_menus
      ),
	  
	  	  
	   array(
        'id'          => 'page_layout',
        'label'       => __( 'Page Layout', 'alchem' ),
        'desc'        => '',
        'std'         => 'none',
        'type'        => 'radio-image',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
 array(
        'id'          => 'left_sidebar',
        'label'       => __( 'Select Left Sidebar', 'alchem' ),
        'desc'        => '',
        'std'         => 'yes',
        'type'        => 'select',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		 'choices'     =>  $alchem_sidebars
      ),
  array(
        'id'          => 'right_sidebar',
        'label'       => __( 'Select Right Sidebar', 'alchem' ),
        'desc'        => '',
        'std'         => 'yes',
        'type'        => 'select',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		 'choices'     =>  $alchem_sidebars
      ),

	  array(
        'id'          => 'slider_banner',
        'label'       => __( 'Slider Banner', 'alchem' ),
        'desc'        => '',
        'std'         => '0',
        'type'        => 'select',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		 'choices'     => array( 
          array(
            'value'       => '0',
            'label'       => __( 'Disable', 'alchem' ),
            'src'         => ''
          ),
          array(
            'value'       => 'magee_slider',
            'label'       => __( 'Magee Slider', 'alchem' ),
            'src'         => ''
          )
        )
      ),
	  array(
        'id'          => 'banner_position',
        'label'       => __( 'Banner Position', 'alchem' ),
        'desc'        => '',
        'std'         => '1',
        'type'        => 'select',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		 'choices'     => array( 
			array(
            'value'       => '1',
            'label'       => __( 'Below Header', 'alchem' ),
            'src'         => ''
          ),
          array(
            'value'       => '2',
            'label'       => __( 'Above Header', 'alchem' ),
            'src'         => ''
          )
          
        )
      )
	   ,
	   array(
        'label'       => __( 'Select Magee Slider', 'alchem' ),
        'id'          => 'magee_slider',
        'type'        => 'select',
        'desc'        =>'',
        'choices'     => $magee_sliders,
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'general_options'
      ), 
	   
	   
   array(
        'label'       => __( 'Page Background', 'alchem' ),
        'id'          => 'page_background',
        'type'        => 'tab',
		'section'     => ''
		
      ),
	  
	 array(
        'id'          => 'background_color',
        'label'       => __( 'Background Color', 'alchem' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'page_background',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	 
	   
	 array(
        'id'          => 'background_image',
        'label'       => __( 'Background Image', 'alchem' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'page_background',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	 
	  array(
        'id'          => 'background_repeat',
        'label'       => __( 'Background Repeat', 'alchem' ),
        'desc'        => '',
        'std'         => 'no',
        'type'        => 'select',
        'section'     => 'page_background',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		 'choices'     => array( 
			array(
            'value'       => 'no-repeat',
            'label'       => __( 'No Repeat', 'alchem' ),
            'src'         => ''
          ),
          array(
            'value'       => 'repeat',
            'label'       => __( 'Repeat', 'alchem' ),
            'src'         => ''
          ),
          array(
            'value'       => 'repeat-x',
            'label'       => __( 'Repeat X', 'alchem' ),
            'src'         => ''
          ),
          array(
            'value'       => 'repeat-y',
            'label'       => __( 'Repeat Y', 'alchem' ),
            'src'         => ''
          )
          
        )
      ),
	  
 array(
        'label'       => __( 'Title Bar Background', 'alchem' ),
        'id'          => 'title_bar_background',
        'type'        => 'tab',
		'section'     => ''
		
      ),
	  

	   
	 array(
        'id'          => 'title_bar_background_image',
        'label'       => __( 'Title Bar Background Image', 'alchem' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'title_bar_background',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	 
	  array(
        'id'          => 'title_bar_background_repeat',
        'label'       => __( 'Title Bar Background Repeat', 'alchem' ),
        'desc'        => '',
        'std'         => 'no',
        'type'        => 'select',
        'section'     => 'title_bar_background',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		 'choices'     => array( 
			array(
            'value'       => 'no-repeat',
            'label'       => __( 'No Repeat', 'alchem' ),
            'src'         => ''
          ),
          array(
            'value'       => 'repeat',
            'label'       => __( 'Repeat', 'alchem' ),
            'src'         => ''
          ),
          array(
            'value'       => 'repeat-x',
            'label'       => __( 'Repeat X', 'alchem' ),
            'src'         => ''
          ),
          array(
            'value'       => 'repeat-y',
            'label'       => __( 'Repeat Y', 'alchem' ),
            'src'         => ''
          )
          
        )
      ),
	 
	 
	 
	  )
	  );
 
 $alchem_post_meta_box = array(
    'id'          => 'post_meta_box',
    'title'       => __( 'Post Meta Box', 'alchem' ),
    'desc'        => '',
    'pages'       => array( 'post' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
	  array(
        'label'       => __( 'General Options', 'alchem' ),
        'id'          => 'general_options',
        'type'        => 'tab',
		'section'     => ''
		
      ),
	 array(
        'id'          => 'display_title',
        'label'       => __( 'Display Title', 'alchem' ),
        'desc'        => '',
        'std'         => '1',
        'type'        => 'select',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		 'choices'     => array( 
			array(
            'value'       => '0',
            'label'       => __( 'No', 'alchem' ),
            'src'         => ''
          ),
          array(
            'value'       => '1',
            'label'       => __( 'Yes', 'alchem' ),
            'src'         => ''
          )
          
        )
      ),
	  array(
        'id'          => 'display_meta_data',
        'label'       => __( 'Display Meta Data', 'alchem' ),
        'desc'        => '',
        'std'         => '1',
        'type'        => 'select',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		 'choices'     => array( 
			array(
            'value'       => '0',
            'label'       => __( 'No', 'alchem' ),
            'src'         => ''
          ),
          array(
            'value'       => '1',
            'label'       => __( 'Yes', 'alchem' ),
            'src'         => ''
          )
          
        )
      ),
	   array(
        'id'          => 'display_share_icons',
        'label'       => __( 'Display Share Icons', 'alchem' ),
        'desc'        => '',
        'std'         => '1',
        'type'        => 'select',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		 'choices'     => array( 
			array(
            'value'       => '0',
            'label'       => __( 'No', 'alchem' ),
            'src'         => ''
          ),
          array(
            'value'       => '1',
            'label'       => __( 'Yes', 'alchem' ),
            'src'         => ''
          )
          
        )
      ),
	   array(
        'id'          => 'display_author_info',
        'label'       => __( 'Display Author Info', 'alchem' ),
        'desc'        => '',
        'std'         => '1',
        'type'        => 'select',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		 'choices'     => array( 
			array(
            'value'       => '0',
            'label'       => __( 'No', 'alchem' ),
            'src'         => ''
          ),
          array(
            'value'       => '1',
            'label'       => __( 'Yes', 'alchem' ),
            'src'         => ''
          )
          
        )
      ),
	   
	   
	    array(
        'id'          => 'display_related',
        'label'       => __( 'Display Related Posts', 'alchem' ),
        'desc'        => '',
        'std'         => '1',
        'type'        => 'select',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		 'choices'     => array( 
			array(
            'value'       => '0',
            'label'       => __( 'No', 'alchem' ),
            'src'         => ''
          ),
          array(
            'value'       => '1',
            'label'       => __( 'Yes', 'alchem' ),
            'src'         => ''
          )
          
        )
      ),
	 
	 
	  )
	  );

  /**
   * Register our meta boxes using the 
   * of_register_meta_box() function.
   */
  if ( function_exists( 'alchem_register_meta_box' ) ){

    alchem_register_meta_box( $alchem_page_meta_box );
    alchem_register_meta_box( $alchem_post_meta_box );

  }
}