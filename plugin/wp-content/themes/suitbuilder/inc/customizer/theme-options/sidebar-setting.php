<?php

global $suitbuilder_sections;
global $suitbuilder_settings_controls;
global $suitbuilder_defaults;

//call all defaults values
$suitbuilder_defaults = suitbuilder_all_defalts_values();

//create a section for sidebar section
$suitbuilder_sections['suitabel-sidebare-section'] = array(
	'title'			=> esc_html__('Sidebar','suitbuilder'),
	'description' 	=> esc_html__('You need to choose left or right sidebar,to get more options( like color and title options )','suitbuilder'),
	'panel'			=> 'suitbuilder-all-panels',
	'priority'		=> 60

);

// layout-options option responsive lodader start
$suitbuilder_settings_controls['suitbuilder-default-layout'] = array(
    'setting' =>     array(
        'default'              => $suitbuilder_defaults['suitbuilder-default-layout'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Sidebar Layout Options', 'suitbuilder' ),
        'description'           =>  esc_html__( 'Please note that this section can be overridden by individual page/posts settings', 'suitbuilder' ),
        'section'               => 'suitabel-sidebare-section',
        'type'					=> 'radio',
        'choices' => array(
            'right-sidebar' => esc_html__( 'Right', 'suitbuilder' ),
            'left-sidebar'  => esc_html__( 'Left', 'suitbuilder' ),
            'no-sidebar'    => esc_html__( 'No', 'suitbuilder' )
        ),
        'priority'              => 10,
        'active_callback'       => ''
    )
);

//Color Options
$suitbuilder_settings_controls['suitbuilder-sidebare-color-field'] = array(
    'setting' =>     array(
        'default'       => '',
    ),
    'control' => array(
        'description'                 => sprintf( '<div class="bg-white"> %1$s </div>', esc_html__( 'Color Options', 'suitbuilder' ) ),
        'section'               => 'suitabel-sidebare-section',
        'type'                  => 'text',
        'input_attrs'           => array('class'=> "hidden"),
        'priority'              => 15,
        'active_callback'       => ''
    )
);

//sidebar background color
$suitbuilder_settings_controls['suitbuilder-sidebar-background-color'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-sidebar-background-color']
	),
	'control'	=> array(
		'label'					=> esc_html__('Sidebar Background Color','suitbuilder'),
		'section'				=> 'suitabel-sidebare-section',
		'type'					=> 'color',
		'priority'				=> 20,
		'active_callback'		=> 'suitbuilder_no_sidebar_active'
	)
);


//widget background color
$suitbuilder_settings_controls['suitbuilder-widget-background-color'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-widget-background-color']
	),
	'control'	=> array(
		'label'					=> esc_html__('Widget Background Color','suitbuilder'),
		'section'				=> 'suitabel-sidebare-section',
		'type'					=> 'color',
		'priority'				=> 30,
		'active_callback'		=> 'suitbuilder_no_sidebar_active'
	)
);

//widget title color
$suitbuilder_settings_controls['suitbuilder-widget-title-color'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-widget-title-color']
	),
	'control'	=> array(
		'label'					=> esc_html__('Widget Title Color','suitbuilder'),
		'section'				=> 'suitabel-sidebare-section',
		'type'					=> 'color',
		'priority'				=> 40,
		'active_callback'		=> 'suitbuilder_no_sidebar_active'
	)
);

//widget content color
$suitbuilder_settings_controls['suitbuilder-widget-content-color'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-widget-content-color']
	),
	'control'	=> array(
		'label'					=> esc_html__('Widget Content Color','suitbuilder'),
		'section'				=> 'suitabel-sidebare-section',
		'type'					=> 'color',
		'priority'				=> 50,
		'active_callback'		=> 'suitbuilder_no_sidebar_active'
	)
);


//Title  Options
$suitbuilder_settings_controls['suitbuilder-sidebare-title-field'] = array(
    'setting' =>     array(
        'default'       => '',
    ),
    'control' => array(
        'description'                 => sprintf( '<div class="bg-white"> %1$s </div>', esc_html__( 'Advance Options', 'suitbuilder' ) ),
        'section'               => 'suitabel-sidebare-section',
        'type'                  => 'text',
        'input_attrs'           => array('class'=> "hidden"),
        'priority'              => 55,
        'active_callback'       => ''
    )
);

//widget title font size
$suitbuilder_settings_controls['suitbuilder-widget-title-font-size'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-widget-title-font-size']
	),
	'control'	=> array(
		'label'					=> esc_html__('Widget Title Font Size','suitbuilder'),
		'section'				=> 'suitabel-sidebare-section',
		'type'					=> 'number',
		'priority'				=> 60,
		'active_callback'		=> 'suitbuilder_no_sidebar_active'
	)
);

//widget title font weight
$suitbuilder_settings_controls['suitbuilder-widget-title-font-weight'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-widget-title-font-weight']
	),
	'control'	=> array(
		'label'					=> esc_html__('Widget Title Font Weight','suitbuilder'),
		'section'				=> 'suitabel-sidebare-section',
		'type'					=> 'number',
		'priority'				=> 70,
		'active_callback'		=> 'suitbuilder_no_sidebar_active'
	)
);

//setting control for widget title-transform
$suitbuilder_settings_controls['suitbuilder-widget-title-transform'] =  array(
    'setting'   => array(
        'default'               => $suitbuilder_defaults['suitbuilder-widget-title-transform']
    ),
    'control'   => array(
        'label'                 => esc_html__('Widget Title Text Transform','suitbuilder'),
        'section'               => 'suitabel-sidebare-section',
        'type'                  => 'select',
        'choices'   => array(
            'uppercase'           => esc_html__('Uppercase','suitbuilder'),
            'lowercase'           => esc_html__('Lowercase','suitbuilder'),
            'capitalize'          => esc_html__('Capitalize','suitbuilder'),
        ),
        'priority'              => 80,
        'active_callback'       => 'suitbuilder_no_sidebar_active'
    )
);


//Title  Options
$suitbuilder_settings_controls['suitbuilder-widget-title-padding'] = array(
    'setting' =>     array(
        'default'       => '',
    ),
    'control' => array(
        'description'                 => sprintf( '<div class="widget-padding"> %1$s </div>', esc_html__( 'Widget Title padding(PX) ', 'suitbuilder' ) ),
        'section'               => 'suitabel-sidebare-section',
        'type'                  => 'text',
        'input_attrs'           => array('class'=> "hidden"),
        'priority'              => 85,
        'active_callback'       => 'suitbuilder_no_sidebar_active'
    )
);

//padding icon 
$suitbuilder_settings_controls['suitbuilder-widget-padding-icon'] =  array(
    'setting'   => array(
        'default'               => $suitbuilder_defaults['suitbuilder-widget-padding-icon'],
		'transport'     => 'refresh'
    ),
    'control'   => array(
        'section'               => 'suitabel-sidebare-section',
        'type'                  => 'radio_image',
        'choices'   => array(
            'w-padding-desktop'           => get_template_directory_uri() .'/assets/image/desktop.png',
            'w-padding-mobile'            => get_template_directory_uri() .'/assets/image/phone.png',
        ),
        'priority'              => 86,
        'active_callback'       => 'suitbuilder_no_sidebar_active'
    )

);

//paddin option widget title paddin top
$suitbuilder_settings_controls['suitbuilder-widget-title-padding-top'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-widget-title-padding-top']
	),
	'control'	=> array(
		'label'					=> esc_html__('Top','suitbuilder'),
		'section'				=> 'suitabel-sidebare-section',
		'type'					=> 'number',
		'priority'				=> 90,
		'active_callback'		=> 'suitbuilder_widget_merge_padding_desktop_active'
	)
);

//paddin option widget title paddin right
$suitbuilder_settings_controls['suitbuilder-widget-title-padding-right'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-widget-title-padding-right']
	),
	'control'	=> array(
		'label'					=> esc_html__('Right','suitbuilder'),
		'section'				=> 'suitabel-sidebare-section',
		'type'					=> 'number',
		'priority'				=> 100,
		'active_callback'		=> 'suitbuilder_widget_merge_padding_desktop_active'
	)
);

//paddin option widget title paddin bottom
$suitbuilder_settings_controls['suitbuilder-widget-title-padding-bottom'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-widget-title-padding-bottom']
	),
	'control'	=> array(
		'label'					=> esc_html__('Bottom','suitbuilder'),
		'section'				=> 'suitabel-sidebare-section',
		'type'					=> 'number',
		'priority'				=> 110,
		'active_callback'		=> 'suitbuilder_widget_merge_padding_desktop_active'
	)
);

//paddin option widget title paddin left
$suitbuilder_settings_controls['suitbuilder-widget-title-padding-left'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-widget-title-padding-left']
	),
	'control'	=> array(
		'label'					=> esc_html__('Left','suitbuilder'),
		'section'				=> 'suitabel-sidebare-section',
		'type'					=> 'number',
		'priority'				=> 120,
		'active_callback'		=> 'suitbuilder_widget_merge_padding_desktop_active'
	)
);

//paddin option widget title paddin top-mb
$suitbuilder_settings_controls['suitbuilder-widget-title-padding-top-mb'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-widget-title-padding-top-mb']
	),
	'control'	=> array(
		'label'					=> esc_html__('Top','suitbuilder'),
		'section'				=> 'suitabel-sidebare-section',
		'type'					=> 'number',
		'priority'				=> 121,
		'active_callback'		=> 'suitbuilder_widget_merge_padding_mobile_active'
	)
);

//paddin option widget title paddin right-mb
$suitbuilder_settings_controls['suitbuilder-widget-title-padding-right-mb'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-widget-title-padding-right-mb']
	),
	'control'	=> array(
		'label'					=> esc_html__('Right','suitbuilder'),
		'section'				=> 'suitabel-sidebare-section',
		'type'					=> 'number',
		'priority'				=> 122,
		'active_callback'		=> 'suitbuilder_widget_merge_padding_mobile_active'
	)
);

//paddin option widget title paddin bottom mb
$suitbuilder_settings_controls['suitbuilder-widget-title-padding-bottom-mb'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-widget-title-padding-bottom-mb']
	),
	'control'	=> array(
		'label'					=> esc_html__('Bottom','suitbuilder'),
		'section'				=> 'suitabel-sidebare-section',
		'type'					=> 'number',
		'priority'				=> 123,
		'active_callback'		=> 'suitbuilder_widget_merge_padding_mobile_active'
	)
);

//paddin option widget title paddin left-mb
$suitbuilder_settings_controls['suitbuilder-widget-title-padding-left-mb'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-widget-title-padding-left-mb']
	),
	'control'	=> array(
		'label'					=> esc_html__('Left','suitbuilder'),
		'section'				=> 'suitabel-sidebare-section',
		'type'					=> 'number',
		'priority'				=> 124,
		'active_callback'		=> 'suitbuilder_widget_merge_padding_mobile_active'
	)
);

//Title  margin
$suitbuilder_settings_controls['suitbuilder-widget-title-margin'] = array(
    'setting' =>     array(
        'default'       => '',
    ),
    'control' => array(
        'description'                 => sprintf( '<div class="widget-padding"> %1$s </div>', esc_html__( 'Widget Title margin(PX)', 'suitbuilder' ) ),
        'section'               => 'suitabel-sidebare-section',
        'type'                  => 'text',
        'input_attrs'           => array('class'=> "hidden"),
        'priority'              => 125,
        'active_callback'       => 'suitbuilder_no_sidebar_active'
    )
);

//margin icon 
$suitbuilder_settings_controls['suitbuilder-widget-margin-icon'] =  array(
    'setting'   => array(
        'default'               => $suitbuilder_defaults['suitbuilder-widget-margin-icon'],
		'transport'     => 'refresh'
    ),
    'control'   => array(
        'section'               => 'suitabel-sidebare-section',
        'type'                  => 'radio_image',
        'choices'   => array(
            'w-margin-desktop'           => get_template_directory_uri() .'/assets/image/desktop.png',
            'w-margin-mobile'            => get_template_directory_uri() .'/assets/image/phone.png',
        ),
        'priority'              => 126,
        'active_callback'       => 'suitbuilder_no_sidebar_active'
    )

);


// widget title margin top
$suitbuilder_settings_controls['suitbuilder-widget-title-margin-top'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-widget-title-margin-top']
	),
	'control'	=> array(
		'label'					=> esc_html__('Top','suitbuilder'),
		'section'				=> 'suitabel-sidebare-section',
		'type'					=> 'number',
		'priority'				=> 130,
		'active_callback'		=> 'suitbuilder_widget_merge_margin_desktop_active'
	)
);

//widget title margin right
$suitbuilder_settings_controls['suitbuilder-widget-title-margin-right'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-widget-title-margin-right']
	),
	'control'	=> array(
		'label'					=> esc_html__('Right','suitbuilder'),
		'section'				=> 'suitabel-sidebare-section',
		'type'					=> 'number',
		'priority'				=> 140,
		'active_callback'		=> 'suitbuilder_widget_merge_margin_desktop_active'
	)
);

// widget title margin bottom
$suitbuilder_settings_controls['suitbuilder-widget-title-margin-bottom'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-widget-title-margin-bottom']
	),
	'control'	=> array(
		'label'					=> esc_html__('Bottom','suitbuilder'),
		'section'				=> 'suitabel-sidebare-section',
		'type'					=> 'number',
		'priority'				=> 150,
		'active_callback'		=> 'suitbuilder_widget_merge_margin_desktop_active'
	)
);

// widget title margin left
$suitbuilder_settings_controls['suitbuilder-widget-title-margin-left'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-widget-title-margin-left']
	),
	'control'	=> array(
		'label'					=> esc_html__('Left','suitbuilder'),
		'section'				=> 'suitabel-sidebare-section',
		'type'					=> 'number',
		'priority'				=> 160,
		'active_callback'		=> 'suitbuilder_widget_merge_margin_desktop_active'
	)
);

// widget title margin top-mb
$suitbuilder_settings_controls['suitbuilder-widget-title-margin-top-mb'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-widget-title-margin-top-mb']
	),
	'control'	=> array(
		'label'					=> esc_html__('Top','suitbuilder'),
		'section'				=> 'suitabel-sidebare-section',
		'type'					=> 'number',
		'priority'				=> 161,
		'active_callback'		=> 'suitbuilder_widget_merge_margin_mobile_active'
	)
);

//widget title margin right-mb
$suitbuilder_settings_controls['suitbuilder-widget-title-margin-right-mb'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-widget-title-margin-right-mb']
	),
	'control'	=> array(
		'label'					=> esc_html__('Right','suitbuilder'),
		'section'				=> 'suitabel-sidebare-section',
		'type'					=> 'number',
		'priority'				=> 162,
		'active_callback'		=> 'suitbuilder_widget_merge_margin_mobile_active'
	)
);

// widget title margin bottom-mb
$suitbuilder_settings_controls['suitbuilder-widget-title-margin-bottom-mb'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-widget-title-margin-bottom-mb']
	),
	'control'	=> array(
		'label'					=> esc_html__('Bottom','suitbuilder'),
		'section'				=> 'suitabel-sidebare-section',
		'type'					=> 'number',
		'priority'				=> 163,
		'active_callback'		=> 'suitbuilder_widget_merge_margin_mobile_active'
	)
);

// widget title margin left-mb
$suitbuilder_settings_controls['suitbuilder-widget-title-margin-left-mb'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-widget-title-margin-left-mb']
	),
	'control'	=> array(
		'label'					=> esc_html__('Left','suitbuilder'),
		'section'				=> 'suitabel-sidebare-section',
		'type'					=> 'number',
		'priority'				=> 164,
		'active_callback'		=> 'suitbuilder_widget_merge_margin_mobile_active'
	)
);


// widget title paddin line height
$suitbuilder_settings_controls['suitbuilder-widget-title-line-height'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-widget-title-line-height']
	),
	'control'	=> array(
		'label'					=> esc_html__('Widget Title Line Height','suitbuilder'),
		'section'				=> 'suitabel-sidebare-section',
		'type'					=> 'number',
		'priority'				=> 170,
		'active_callback'		=> 'suitbuilder_no_sidebar_active'
	)
);

//sidebar reset options
$suitbuilder_settings_controls['suitbuilder-sidebar-reset-field'] = array(
    'setting' =>     array(
        'default'       => '',
    ),
    'control' => array(
        'description'                 => sprintf( '<div class="bg-white"> %1$s </div>', esc_html__( 'Reset', 'suitbuilder' ) ),
        'section'               => 'suitabel-sidebare-section',
        'type'                  => 'text',
        'input_attrs'           => array('class'=> "hidden"),
        'priority'              => 230,
        'active_callback'       => ''
    )
);


//sidebar reset option
$suitbuilder_settings_controls['suitbuilder-sidebar-reset-option'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-sidebar-reset-option']
	),
	'control'	=> array(
		'label'				=> esc_html__('Reset','suitbuilder'),
		'description'		=> esc_html__('Caution: This will reset sidebar options to default. Publish the changes and Refresh the page to view the changes.','suitbuilder'),
		'section'			=> 'suitabel-sidebare-section',
		'type'				=> 'checkbox',
		'priority'			=> 240,
		'active_callback'	=> ''	
	)

);

//reset sidebar options
if( !function_exists( 'suitbuilder_sidebar_reset' ) ) :
	/**
	* suitbuilder inner header reset
	*
	* @since suitbuilder 1.0.0
	*
	* @param null
	* @return null
	*/
	function suitbuilder_sidebar_reset(){
		global $suitbuilder_customizer_saved_values;

		$suitbuilder_customizer_saved_values = suitbuilder_get_all_options();

		if( 1 == intval( $suitbuilder_customizer_saved_values['suitbuilder-sidebar-reset-option'] ) ){
			global $suitbuilder_defaults;

			$suitbuilder_customizer_saved_values['suitbuilder-default-layout'] 				= $suitbuilder_defaults['suitbuilder-default-layout'];
			$suitbuilder_customizer_saved_values['suitbuilder-sidebar-background-color'] 		= $suitbuilder_defaults['suitbuilder-sidebar-background-color'];
			$suitbuilder_customizer_saved_values['suitbuilder-widget-background-color'] 		= $suitbuilder_defaults['suitbuilder-widget-background-color'];
			$suitbuilder_customizer_saved_values['suitbuilder-widget-title-color'] 			= $suitbuilder_defaults['suitbuilder-widget-title-color'];
			$suitbuilder_customizer_saved_values['suitbuilder-widget-content-color'] 			= $suitbuilder_defaults['suitbuilder-widget-content-color'];
			$suitbuilder_customizer_saved_values['suitbuilder-widget-title-font-size'] 		= $suitbuilder_defaults['suitbuilder-widget-title-font-size'];
			$suitbuilder_customizer_saved_values['suitbuilder-widget-title-font-weight'] 		= $suitbuilder_defaults['suitbuilder-widget-title-font-weight'];
			$suitbuilder_customizer_saved_values['suitbuilder-widget-title-transform'] 		= $suitbuilder_defaults['suitbuilder-widget-title-transform'];
			

			$suitbuilder_customizer_saved_values['suitbuilder-sidebar-reset-option'] 			= '';

			//reset header optins
			suitbuilder_reset_options($suitbuilder_customizer_saved_values);

		}else{
			return null;
		}

	}
endif;
add_action( 'customize_save_after','suitbuilder_sidebar_reset' );


//active callback
if( !function_exists( 'suitbuilder_no_sidebar_active' ) ) :
	/**
	* Suitbuilder no sidebar active
	*
	* @since suitbuilder 1.0.0
	*
	* @param null
	* @return null 

	*/
	function suitbuilder_no_sidebar_active( ){
	    global $suitbuilder_customizer_all_values;
		if( 'no-sidebar' == $suitbuilder_customizer_all_values['suitbuilder-default-layout'] ){
			return false;
		}else{
			return true;
		}
	}

endif;

//** ===================== Widget padding Desktop active callback ======= */
if( !function_exists('suitbuilder_widget_padding_desktop_active') ) :
    /**
    * Desktop device options active
    * 
    * @since suitbuilder 1.0.0
    *
    * @param null
    * @return boolean
    */
    
     function suitbuilder_widget_padding_desktop_active(  ){
        global $suitbuilder_customizer_all_values;
        $w_desktop_device = $suitbuilder_customizer_all_values['suitbuilder-widget-padding-icon'];
        
        if( 'w-padding-desktop' == $w_desktop_device ){
            return true;
        }else{
            return false;
        }  
    }
endif;


//** ===================== sidebar widget padding mobile active callback ======= */
if( !function_exists('suitbuilder_widegt_padding_mb_active') ) :
    /**
    * mobile device options active
    * 
    * @since suitbuilder 1.0.0
    *
    * @param null
    * @return boolean
    */
    
     function suitbuilder_widegt_padding_mb_active(  ){
        global $suitbuilder_customizer_all_values;
        $widget_margin_mobile_device = $suitbuilder_customizer_all_values['suitbuilder-widget-padding-icon'];
        
        if( 'w-padding-mobile' == $widget_margin_mobile_device ){
            return true;
        }else{
            return false;
        }  
    }
endif;

//** ===================== widget margin desktop active callback ======= */
if( !function_exists('suitbuilder_widget_margin_desktop_active') ) :
    /**
    * desktop device options active
    * 
    * @since suitbuilder 1.0.0
    *
    * @param null
    * @return boolean
    */
    
     function suitbuilder_widget_margin_desktop_active(  ){
        global $suitbuilder_customizer_all_values;
        $widget_margin_desktop_device = $suitbuilder_customizer_all_values['suitbuilder-widget-margin-icon'];
        
        if( 'w-margin-desktop' == $widget_margin_desktop_device ){
            return true;
        }else{
            return false;
        }  
    }
endif;

//** ===================== sidebar widget margin mobile active callback ======= */
if( !function_exists('suitbuilder_widget_margin_mobile_active') ) :
    /**
    * mobile device options active
    * 
    * @since suitbuilder 1.0.0
    *
    * @param null
    * @return boolean
    */
    
     function suitbuilder_widget_margin_mobile_active(  ){
        global $suitbuilder_customizer_all_values;
        $widget_margin_mobile_device = $suitbuilder_customizer_all_values['suitbuilder-widget-margin-icon'];
        
        if( 'w-margin-mobile' == $widget_margin_mobile_device ){
            return true;
        }else{
            return false;
        }  
    }
endif;

//** ======================== merge function active sidebar and desktop padding */
if( !function_exists('suitbuilder_widget_merge_padding_desktop_active') ) :
    /**
    * Slider button options active
    * 
    * @since suitbuilder 1.0.0
    *
    * @param null
    * @return boolean
    */
    
	function suitbuilder_widget_merge_padding_desktop_active( $control ){
        return(
            suitbuilder_no_sidebar_active( $control ) && suitbuilder_widget_padding_desktop_active($control)
        );  
    }
endif;

//** ======================== merge function active sidebar and mobile padding */
if( !function_exists('suitbuilder_widget_merge_padding_mobile_active') ) :
    /**
    * Sidebar Widget merge options active
    * 
    * @since suitbuilder 1.0.0
    *
    * @param null
    * @return boolean
    */
    
	function suitbuilder_widget_merge_padding_mobile_active( $param ){
        return(
            suitbuilder_no_sidebar_active( $param ) && suitbuilder_widegt_padding_mb_active($param)
        );  
    }
endif;

//** ======================== merge function active sidebar and desktop margin */
if( !function_exists('suitbuilder_widget_merge_margin_desktop_active') ) :
    /**
    * Sidebar widget merge options active
    * 
    * @since suitbuilder 1.0.0
    *
    * @param null
    * @return boolean
    */
    
	function suitbuilder_widget_merge_margin_desktop_active( $values ){
        return(
            suitbuilder_no_sidebar_active( $values ) && suitbuilder_widget_margin_desktop_active($values)
        );  
    }
endif;

//** ======================== merge function active sidebar and mobile margin */
if( !function_exists('suitbuilder_widget_merge_margin_mobile_active') ) :
    /**
    * Sidebar Widget merge options active
    * 
    * @since suitbuilder 1.0.0
    *
    * @param null
    * @return boolean
    */
    
	function suitbuilder_widget_merge_margin_mobile_active( $val ){
        return(
            suitbuilder_no_sidebar_active( $val ) && suitbuilder_widget_margin_mobile_active($val)
        );  
    }
endif;