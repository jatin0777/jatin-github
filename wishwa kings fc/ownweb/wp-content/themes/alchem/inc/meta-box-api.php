<?php 


 function alchem_get_media_post_ID() {
    global $wpdb;
    
    return $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE `post_name` = 'media' AND `post_type` = 'alchem_portfolio' AND `post_status` = 'private'" );
    
  }

     function alchem_shortcode( $settings, $post ) {
  

      if ( ! is_object( $post ) )
        $settings['post']['id'] = alchem_get_media_post_ID();
      
      // No ID return settings
      if ( $settings['post']['id'] == 0 )
        return $settings;
  
      // Set the fake shortcode
      $settings['alchem_gallery'] = array( 'shortcode' => "[gallery id='{$settings['post']['id']}']" );
      
      // Return settings
      return $settings;
      
    }
    
    /**
     * Returns the AJAX images
     *
     */
     function alchem_ajax_gallery_update() {
    
      if ( ! empty( $_POST['ids'] ) )  {
        
        $return = '';
        
        foreach( $_POST['ids'] as $id ) {
        
          $thumbnail = wp_get_attachment_image_src( $id, 'thumbnail' );
          
          $return .= '<li><img  src="' . $thumbnail[0] . '" width="75" height="75" /></li>';
          
        }
        
        echo $return;
        exit();
      
      }
      
    }
	
	     // Adds the temporary hacktastic shortcode
      add_filter( 'media_view_settings', 'alchem_shortcode', 10, 2 );
    
      // AJAX update
      add_action( 'wp_ajax_gallery_update',  'alchem_ajax_gallery_update'  );
	  
	
	
 define( 'ALCHEM_ALLOW_UNFILTERED_HTML', apply_filters( 'alchem_allow_unfiltered_html', false ) );
 
if ( ! function_exists( 'alchem_validate_setting' ) ) {

  function alchem_validate_setting( $input, $type, $field_id, $wmpl_id = '' ) {
    
    /* exit early if missing data */
    if ( ! $input || ! $type || ! $field_id )
      return $input;
    
    $input = apply_filters( 'alchem_validate_setting', $input, $type, $field_id );
    
    /* WPML Register and Unregister strings */
    if ( ! empty( $wmpl_id ) ) {
    
      /* Allow filtering on the WPML option types */
      $single_string_types = apply_filters( 'alchem_wpml_option_types', array( 'text', 'textarea', 'textarea-simple' ) );
              
      if ( in_array( $type, $single_string_types ) ) {
      
        if ( ! empty( $input ) ) {
        
          alchem_wpml_register_string( $wmpl_id, $input );
          
        } else {
        
          alchem_wpml_unregister_string( $wmpl_id );
          
        }
      
      }
    
    }
            
    if ( 'background' == $type ) {

      $input['background-color'] = alchem_validate_setting( $input['background-color'], 'colorpicker', $field_id );
      
      $input['background-image'] = alchem_validate_setting( $input['background-image'], 'upload', $field_id );
      
      // Loop over array and check for values
      foreach( (array) $input as $key => $value ) {
        if ( ! empty( $value ) ) {
          $has_value = true;
        }
      }
      
      // No value; set to empty
      if ( ! isset( $has_value ) ) {
        $input = '';
      }
      
    } else if ( 'colorpicker' == $type ) {

      /* return empty & set error */
      if ( 0 === preg_match( '/^#([a-f0-9]{6}|[a-f0-9]{3})$/i', $input ) ) {
        
        $input = '';
        
        add_settings_error( 'alchem', 'invalid_hex', __( 'The Colorpicker only allows valid hexadecimal values.', 'alchem' ), 'error' );
      
      }
    
    } else if ( in_array( $type, array( 'css', 'text', 'textarea', 'textarea-simple' ) ) ) {
      
      if ( ! current_user_can( 'unfiltered_html' ) && ALCHEM_ALLOW_UNFILTERED_HTML == false ) {
      
        $input = wp_kses_post( $input );
        
      }
            
    } else if ( 'measurement' == $type ) {
    
      $input[0] = sanitize_text_field( $input[0] );
      
      // No value; set to empty
      if ( empty( $input[0] ) && empty( $input[1] ) ) {
        $input = '';
      }
      
    } else if ( 'typography' == $type && isset( $input['font-color'] ) ) {
      
      $input['font-color'] = alchem_validate_setting( $input['font-color'], 'colorpicker', $field_id );
      
      // Loop over array and check for values
      foreach( $input as $key => $value ) {
        if ( ! empty( $value ) ) {
          $has_value = true;
        }
      }
      
      // No value; set to empty
      if ( ! isset( $has_value ) ) {
        $input = '';
      }
      
    } else if ( 'upload' == $type ) {

      $input = sanitize_text_field( $input );
    
    } else if ( 'gallery' == $type ) {

      $input = trim( $input );
           
    }
    
    $input = apply_filters( 'alchem_after_validate_setting', $input, $type, $field_id );
 
    return $input;
    
  }

}



function alchem_wpml_register_string( $id, $value ) {

  if ( function_exists( 'icl_register_string' ) ) {
      
    icl_register_string( __( 'Theme Options', 'alchem' ), $id, $value );
      
  }
  
}



if ( ! function_exists( 'alchem_get_option' ) ) {

  function alchem_get_option( $option_id, $default = '' ) {
    
    /* get the saved options */ 
    $options = get_option( alchem_options_id() );
    
    /* look for the saved value */
    if ( isset( $options[$option_id] ) && '' != $options[$option_id] ) {
        
      return alchem_wpml_filter( $options, $option_id );
      
    }
    
    return $default;
    
  }
  
}


if ( ! function_exists( 'alchem_options_id' ) ) {

  function alchem_options_id() {
    
    return apply_filters( 'alchem_options_id', 'option_tree' );
    
  }
  
}



function alchem_filter_std_value( $value = '', $std = '' ) {
  
  $std = maybe_unserialize( $std );
  
  if ( is_array( $value ) && is_array( $std ) ) {
  
    foreach( $value as $k => $v ) {
      
      if ( '' == $value[$k] && isset( $std[$k] ) ) {
      
        $value[$k] = $std[$k];
        
      }
      
    }
  
  } else if ( '' == $value && ! empty( $std ) ) {
  
    $value = $std;
    
  }

  return $value;
  
}


if ( ! function_exists( 'alchem_radio_images' ) ) {
  
  function alchem_radio_images( $field_id = '' ) {

 if ( in_array($field_id ,array('page_layout' ,'default_page_layout','default_page_layout','default_post_layout' , 'default_layout','default_portfolio_layout')) ) {
    $array = array(
      array(
        'value'   => 'left',
        'label'   => __( 'Left Sidebar', 'alchem' ),
        'src'     => get_template_directory_uri() . '/images/sidebar_left.png'
      ),
      array(
        'value'   => 'right',
        'label'   => __( 'Right Sidebar', 'alchem' ),
        'src'     => get_template_directory_uri() . '/images/sidebar_right.png'
      ),
	   array(
        'value'   => 'both',
        'label'   => __( 'Both Sidebar', 'alchem' ),
        'src'     => get_template_directory_uri() . '/images/sidebar_both.png'
      ),
	   
	  array(
        'value'   => 'none',
        'label'   => __( 'Full Width', 'alchem' ),
        'src'     => get_template_directory_uri() . '/images/sidebar_without.png'
      )
    );
  }
  
  
    if($field_id == "bg_pattern"){
	  
	  $items = array();
	   
	  for( $i=1; $i<=10; $i++ ){
		  
		  $items[] = array(
        'value'   => $i,
        'label'   => sprintf(__( 'Pattern %d', 'alchem' ),$i),
        'src'     => get_template_directory_uri() . '/images/patterns/pattern'.$i.'.png'
      );
		  
		  }
	   $array =  $items ;
	  }

  return $array;

}
  }
  
  
  if ( ! function_exists( 'alchem_recognized_background_repeat' ) ) {
  
  function alchem_recognized_background_repeat( $field_id = '' ) {
  
    return apply_filters( 'alchem_recognized_background_repeat', array(
      'no-repeat' => 'No Repeat',
      'repeat'    => 'Repeat All',
      'repeat-x'  => 'Repeat Horizontally',
      'repeat-y'  => 'Repeat Vertically',
      'inherit'   => 'Inherit'
    ), $field_id );
    
  }
  
}

if ( ! function_exists( 'alchem_recognized_background_attachment' ) ) {

  function alchem_recognized_background_attachment( $field_id = '' ) {
  
    return apply_filters( 'alchem_recognized_background_attachment', array(
      "fixed"   => "Fixed",
      "scroll"  => "Scroll",
      "inherit" => "Inherit"
    ), $field_id );
    
  }

}


if ( ! function_exists( 'alchem_recognized_background_position' ) ) {

  function alchem_recognized_background_position( $field_id = '' ) {
  
    return apply_filters( 'alchem_recognized_background_position', array(
      "left top"      => "Left Top",
      "left center"   => "Left Center",
      "left bottom"   => "Left Bottom",
      "center top"    => "Center Top",
      "center center" => "Center Center",
      "center bottom" => "Center Bottom",
      "right top"     => "Right Top",
      "right center"  => "Right Center",
      "right bottom"  => "Right Bottom"
    ), $field_id );
    
  }

}

/**
 * Measurement Units
 *
 * Returns an array of all available unit types.
 * Renamed in version 2.0 to avoid name collisions.
 *
 * @uses      apply_filters()
 *
 * @return    array
 *
 * @access    public
 * @since     1.1.8
 * @updated   2.0
 */
if ( ! function_exists( 'alchem_measurement_unit_types' ) ) {
  
  function alchem_measurement_unit_types( $field_id = '' ) {
  
    return apply_filters( 'alchem_measurement_unit_types', array(
      'px' => 'px',
      '%'  => '%',
      'em' => 'em',
      'pt' => 'pt'
    ), $field_id );
    
  }

}



if ( ! function_exists( 'alchem_admin_styles' ) ) {

  function alchem_admin_styles() {
    global $wp_styles;
    
    /* execute styles before actions */
    do_action( 'alchem_admin_styles_before' );
    
    /* load WP colorpicker */
    wp_enqueue_style( 'wp-color-picker' );
    
    /* load admin styles */
    wp_enqueue_style( 'alchem-admin-css', ALCHEM_THEME_URI . 'css/metabox/css/alchem-admin.css', false, '' );
    
    /* load the RTL stylesheet */
    $wp_styles->add_data( 'alchem-admin-css','rtl', true );
    
    /* execute styles after actions */
    do_action( 'alchem_admin_styles_after' );

  }
  
}

/**
 * Setup the default admin scripts
 *
 * @uses      add_thickbox()          Include Thickbox for file uploads
 * @uses      wp_enqueue_script()     Add  scripts
 * @uses      wp_localize_script()    Used to include arbitrary Javascript data
 *
 * @return    void
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'alchem_admin_metabox_scripts' ) ) {

  function alchem_admin_metabox_scripts() {
    
    /* execute scripts before actions */
    do_action( 'alchem_admin_scripts_before' );
    
    if ( function_exists( 'wp_enqueue_media' ) ) {
      /* WP 3.5 Media Uploader */
      wp_enqueue_media();
    } else {
      /* Legacy Thickbox */
      add_thickbox();
    }
    
    /* load jQuery-ui slider */
    wp_enqueue_script( 'jquery-ui-slider' );
  
    /* load jQuery-ui datepicker */
    wp_enqueue_script( 'jquery-ui-datepicker' );
    
    /* load WP colorpicker */
    wp_enqueue_script( 'wp-color-picker' );
    
    /* Load Ace Editor for CSS Editing */
    wp_enqueue_script( 'ace-editor', ALCHEM_THEME_URI . 'js/vendor/ace/ace.js', null, '' );   
    
    /* load jQuery UI timepicker addon */
    wp_enqueue_script( 'jquery-ui-timepicker', ALCHEM_THEME_URI . 'js/vendor/jquery/jquery-ui-timepicker.js', array( 'jquery', 'jquery-ui-slider', 'jquery-ui-datepicker' ), '1.4.3' );
    
    /* load all the required scripts */
    wp_enqueue_script( 'alchem-admin-js', ALCHEM_THEME_URI . 'js/alchem-admin.js', array( 'jquery', 'jquery-ui-tabs', 'jquery-ui-sortable', 'jquery-ui-slider', 'wp-color-picker', 'ace-editor', 'jquery-ui-datepicker', 'jquery-ui-timepicker' ), '',true );
    
    /* create localized JS array */
    $localized_array = array( 
      'ajax'                  => admin_url( 'admin-ajax.php' ),
      'upload_text'           => apply_filters( 'alchem_upload_text', __( 'Send to admin', 'alchem' ) ),
      'remove_media_text'     => __( 'Remove Media', 'alchem' ),
      'reset_agree'           => __( 'Are you sure you want to reset back to the defaults?', 'alchem' ),
      'remove_no'             => __( 'You can\'t remove this! But you can edit the values.', 'alchem' ),
      'remove_agree'          => __( 'Are you sure you want to remove this?', 'alchem' ),
      'activate_layout_agree' => __( 'Are you sure you want to activate this layout?', 'alchem' ),
      'setting_limit'         => __( 'Sorry, you can\'t have settings three levels deep.', 'alchem' ),
      'delete'                => __( 'Delete Gallery', 'alchem' ), 
      'edit'                  => __( 'Edit Gallery', 'alchem' ), 
      'create'                => __( 'Create Gallery', 'alchem' ), 
      'confirm'               => __( 'Are you sure you want to delete this Gallery?', 'alchem' ),
      'date_current'          => __( 'Today', 'alchem' ),
      'date_time_current'     => __( 'Now', 'alchem' ),
      'date_close'            => __( 'Close', 'alchem' )
    );
    
    /* localized script attached to 'option_tree' */
    wp_localize_script( 'alchem-admin-js', 'option_tree', $localized_array );
    
    /* execute scripts after actions */
    do_action( 'alchem_admin_scripts_after' );

  }
  
}


 /* add scripts for metaboxes to post-new.php & post.php */
	add_action( 'admin_print_scripts-post-new.php', 'alchem_admin_metabox_scripts', 11 );
	add_action( 'admin_print_scripts-post.php', 'alchem_admin_metabox_scripts', 11 );
		  
	/* add styles for metaboxes to post-new.php & post.php */
	add_action( 'admin_print_styles-post-new.php', 'alchem_admin_styles', 11 );
	add_action( 'admin_print_styles-post.php', 'alchem_admin_styles', 11 );
		
		
		

function alchem_decode( $value ) {

  $func = 'base'. "64" . '_decode';
  return $func( $value );
  
}


	/**
 * Default Slider Settings array.
 *
 * Returns an array of the default slider settings.
 * You can filter this function to change the settings
 * on a per option basis.
 *
 * @uses      apply_filters()
 *
 * @return    array
 *
 * @access    public
 * @since     2.0
 */
if ( !function_exists( 'magee_slider_settings' ) ) {

  function magee_slider_settings( $id ) {
    
    $settings = apply_filters( 'image_slider_fields', array(
      array(
        'name'      => 'image',
        'type'      => 'image',
        'label'     => __( 'Image', 'alchem' ),
        'class'     => ''
      ),
      array(
        'name'      => 'link',
        'type'      => 'text',
        'label'     => __( 'Link', 'alchem' ),
        'class'     => ''
      ),
      array(
        'name'      => 'description',
        'type'      => 'textarea',
        'label'     => __( 'Description', 'alchem' ),
        'class'     => ''
      )
    ), $id );
    
    /* fix the array keys, values, and just get it 2.0 ready */
    foreach( $settings as $_k => $setting ) {
    
      foreach( $setting as $s_key => $s_value ) {
        
        if ( 'name' == $s_key ) {
        
          $settings[$_k]['id'] = $s_value;
          unset($settings[$_k]['name']);
          
        } else if ( 'type' == $s_key ) {
          
          if ( 'input' == $s_value ) {
          
            $settings[$_k]['type'] = 'text';
            
          } else if ( 'textarea' == $s_value ) {
          
            $settings[$_k]['type'] = 'textarea-simple';
            
          } else if ( 'image' == $s_value ) {
          
            $settings[$_k]['type'] = 'upload';
            
          }
          
        }
        
      } 
      
    }
    
    return $settings;
    
  }

}

    /**
 * Default List Item Settings array.
 *
 * Returns an array of the default list item settings.
 * You can filter this function to change the settings
 * on a per option basis.
 *
 * @uses      apply_filters()
 *
 * @return    array
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'alchem_list_item_settings' ) ) {

  function alchem_list_item_settings( $id ) {
    
    $settings = apply_filters( 'alchem_list_item_settings', array(
      array(
        'id'        => 'image',
        'label'     => __( 'Image', 'alchem' ),
        'desc'      => '',
        'std'       => '',
        'type'      => 'upload',
        'rows'      => '',
        'class'     => '',
        'post_type' => '',
        'choices'   => array()
      ),
      array(
        'id'        => 'link',
        'label'     => __( 'Link', 'alchem' ),
        'desc'      => '',
        'std'       => '',
        'type'      => 'text',
        'rows'      => '',
        'class'     => '',
        'post_type' => '',
        'choices'   => array()
      ),
      array(
        'id'        => 'description',
        'label'     => __( 'Description', 'alchem' ),
        'desc'      => '',
        'std'       => '',
        'type'      => 'textarea-simple',
        'rows'      => 10,
        'class'     => '',
        'post_type' => '',
        'choices'   => array()
      )
    ), $id );
    
    return $settings;
  
  }

}


/**
 *  Meta Box API
 *
 * This class loads all the methods and helpers specific to build a meta box.

 */
if ( ! class_exists( 'alchem_Meta_Box' ) ) {

  class alchem_Meta_Box {
  
    /* variable to store the meta box array */
    private $meta_box;
  
    /**
     * PHP5 constructor method.
     *
     * This method adds other methods of the class to specific hooks within WordPress.
     *
     * @uses      add_action()
     *
     * @return    void
     *
     * @access    public
     * @since     1.0
     */
    function __construct( $meta_box ) {
      if ( ! is_admin() )
        return;
        
      $this->meta_box = $meta_box;
      
      add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
      
      add_action( 'save_post', array( $this, 'save_meta_box' ), 1, 2 );
      
    }
    
    /**
     * Adds meta box to any post type
     *
     * @uses      add_meta_box()
     *
     * @return    void
     *
     * @access    public
     * @since     1.0
     */
    function add_meta_boxes() {
      foreach ( (array) $this->meta_box['pages'] as $page ) {
        add_meta_box( $this->meta_box['id'], $this->meta_box['title'], array( $this, 'build_meta_box' ), $page, $this->meta_box['context'], $this->meta_box['priority'], $this->meta_box['fields'] );
      }
    }
    
    /**
     * Meta box view
     *
     * @return    string
     *
     * @access    public
     * @since     1.0
     */
    function build_meta_box( $post, $metabox ) {
      
      echo '<div class="alchem-metabox-wrapper">';
           
        /* Use nonce for verification */
        echo '<input type="hidden" name="' . $this->meta_box['id'] . '_nonce" value="' . wp_create_nonce( $this->meta_box['id'] ) . '" />';
        
        /* meta box description */
        echo isset( $this->meta_box['desc'] ) && ! empty( $this->meta_box['desc'] ) ? '<div class="description" style="padding-top:10px;">' . htmlspecialchars_decode( $this->meta_box['desc'] ) . '</div>' : '';
      
        /* loop through meta box fields */
		 $field_value_array = array();
		 $field_value_json  = get_post_meta( $post->ID, "_alchem_post_meta", true );
		 if($field_value_json)
		 $field_value_array = json_decode($field_value_json,true); 

        foreach ( $this->meta_box['fields'] as $field ) {
        
          /* get current post meta data */
         // $field_value = get_post_meta( $post->ID, $field['id'], true );
          $field_value = isset($field_value_array[$field['id']])?$field_value_array[$field['id']]:"";
          /* set standard value */
          if ( isset( $field['std'] ) ) {  
            $field_value = alchem_filter_std_value( $field_value, $field['std'] );
          }
          
          /* build the arguments array */
          $_args = array(
            'type'              => $field['type'],
            'field_id'          => $field['id'],
            'field_name'        => $field['id'],
            'field_value'       => $field_value,
            'field_desc'        => isset( $field['desc'] ) ? $field['desc'] : '',
            'field_std'         => isset( $field['std'] ) ? $field['std'] : '',
            'field_rows'        => isset( $field['rows'] ) && ! empty( $field['rows'] ) ? $field['rows'] : 10,
            'field_post_type'   => isset( $field['post_type'] ) && ! empty( $field['post_type'] ) ? $field['post_type'] : 'post',
            'field_taxonomy'    => isset( $field['taxonomy'] ) && ! empty( $field['taxonomy'] ) ? $field['taxonomy'] : 'category',
            'field_min_max_step'=> isset( $field['min_max_step'] ) && ! empty( $field['min_max_step'] ) ? $field['min_max_step'] : '0,100,1',
            'field_class'       => isset( $field['class'] ) ? $field['class'] : '',
            'field_condition'   => isset( $field['condition'] ) ? $field['condition'] : '',
            'field_operator'    => isset( $field['operator'] ) ? $field['operator'] : 'and',
            'field_choices'     => isset( $field['choices'] ) ? $field['choices'] : array(),
            'field_settings'    => isset( $field['settings'] ) && ! empty( $field['settings'] ) ? $field['settings'] : array(),
            'post_id'           => $post->ID,
            'meta'              => true
          );
          
          $conditions = '';
          
          /* setup the conditions */
          if ( isset( $field['condition'] ) && ! empty( $field['condition'] ) ) {
  
            $conditions = ' data-condition="' . $field['condition'] . '"';
            $conditions.= isset( $field['operator'] ) && in_array( $field['operator'], array( 'and', 'AND', 'or', 'OR' ) ) ? ' data-operator="' . $field['operator'] . '"' : '';
  
          }
          
          /* only allow simple textarea due to DOM issues with wp_editor() */
          if ( $_args['type'] == 'textarea' )
            $_args['type'] = 'textarea-simple';
          
          /* option label */
          echo '<div id="setting_' . $field['id'] . '" class="format-settings"' . $conditions . '>';
            
            echo '<div class="format-setting-wrap">';
            
              /* don't show title with textblocks */
              if ( $_args['type'] != 'textblock' && ! empty( $field['label'] ) ) {
                echo '<div class="format-setting-label">';
                  echo '<label for="' . $field['id'] . '" class="label">' . $field['label'] . '</label>';
                echo '</div>';
              }
      
              /* get the option HTML */
              echo alchem_display_by_type( $_args );
              
            echo '</div>';
            
          echo '</div>';
          
        }
      
      echo '</div>';

    }
	


    /**
     * Saves the meta box values
     *
     * @return    void
     *
     * @access    public
     * @since     1.0
     */
    function save_meta_box( $post_id, $post_object ) {
      global $pagenow;

	  
      /* don't save if $_POST is empty */
      if ( empty( $_POST ) )
        return $post_id;
      
      /* don't save during quick edit */
      if ( $pagenow == 'admin-ajax.php' )
        return $post_id;
        
      /* don't save during autosave */
      if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return $post_id;

      /* don't save if viewing a revision */
      if ( $post_object->post_type == 'revision' || $pagenow == 'revision.php' )
        return $post_id;
  
      /* verify nonce */
      if ( isset( $_POST[ $this->meta_box['id'] . '_nonce'] ) && ! wp_verify_nonce( $_POST[ $this->meta_box['id'] . '_nonce'], $this->meta_box['id'] ) )
        return $post_id;
    
      /* check permissions */
      if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) )
          return $post_id;
      } else {
        if ( ! current_user_can( 'edit_post', $post_id ) )
          return $post_id;
      }
      $metaArray = array();
	  $post_type = get_post_type( $post_id );
	
	  if(in_array($post_type,$this->meta_box["pages"])){
		  
      foreach ( $this->meta_box['fields'] as $field ) {
        
      //  $old = get_post_meta( $post_id, $field['id'], true );
        $new = '';
        
        /* there is data to validate */
        if ( isset( $_POST[$field['id']] ) ) {
        
          /* slider and list item */
          if ( in_array( $field['type'], array( 'list-item', 'slider' ) ) ) {
              
            /* required title setting */
            $required_setting = array(
              array(
                'id'        => 'title',
                'label'     => __( 'Title', 'alchem' ),
                'desc'      => '',
                'std'       => '',
                'type'      => 'text',
                'rows'      => '',
                'class'     => 'option-tree-setting-title',
                'post_type' => '',
                'choices'   => array()
              )
            );
            
            /* get the settings array */
            $settings = isset( $_POST[$field['id'] . '_settings_array'] ) ? unserialize( alchem_decode( $_POST[$field['id'] . '_settings_array'] ) ) : array();
            
            /* settings are empty for some odd ass reason get the defaults */
            if ( empty( $settings ) ) {
              $settings = 'slider' == $field['type'] ? 
              magee_slider_settings( $field['id'] ) : 
              alchem_list_item_settings( $field['id'] );
            }
            
            /* merge the two settings array */
            $settings = array_merge( $required_setting, $settings );
            
            foreach( $_POST[$field['id']] as $k => $setting_array ) {
  
              foreach( $settings as $sub_setting ) {
                
                /* verify sub setting has a type & value */
                if ( isset( $sub_setting['type'] ) && isset( $_POST[$field['id']][$k][$sub_setting['id']] ) ) {
                  
                  $_POST[$field['id']][$k][$sub_setting['id']] = alchem_validate_setting( $_POST[$field['id']][$k][$sub_setting['id']], $sub_setting['type'], $sub_setting['id'] );
                  
                }
                
              }
            
            }
            
            /* set up new data with validated data */
            $new = $_POST[$field['id']];

          } else {
            
            /* run through validattion */
            $new = alchem_validate_setting( $_POST[$field['id']], $field['type'], $field['id'] );
            
          }
          
          /* insert CSS */
          if ( $field['type'] == 'css' ) {
            
            /* insert CSS into dynamic.css */
            if ( '' !== $new ) {
              
              alchem_insert_css_with_markers( $field['id'], $new, true );
            
            /* remove old CSS from dynamic.css */
            } else {
            
              alchem_remove_old_css( $field['id'] );
              
            }
          
          }
        
        }
		
        $metaArray[$field['id']] =  $new ;
      /*  if ( isset( $new ) && $new !== $old ) {
          update_post_meta( $post_id, $field['id'], $new );
        } else if ( '' == $new && $old ) {
          delete_post_meta( $post_id, $field['id'], $old );
        }*/
      }
	  
	    $metaJson = json_encode($metaArray) ;
		update_post_meta( $post_id, '_alchem_post_meta', $metaJson );
	  }

    }
  
  }

}

/**
 * This method instantiates the meta box class & builds the UI.
 *
 * @uses     alchem_Meta_Box()
 *
 * @param    array    Array of arguments to create a meta box
 * @return   void
 *
 * @access   public
 * @since    2.0
 */
if ( ! function_exists( 'alchem_register_meta_box' ) ) {

  function alchem_register_meta_box( $args ) {
    if ( ! $args )
      return;
	 
    $alchem_meta_box = new alchem_Meta_Box( $args );
  }

}

/* End of file meta-box-api.php */
/* Location: ./includes/meta-box-api.php */