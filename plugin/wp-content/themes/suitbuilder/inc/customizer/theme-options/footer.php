<?php
global $suitbuilder_sections;
global $suitbuilder_settings_controls;
global $suitbuilder_repeated_settings_controls;
global $suitbuilder_defaults;

//call defaults values
$suitbuilder_defaults = suitbuilder_all_defalts_values();

//create a section 
$suitbuilder_sections['suitbuilder-main-footer'] = array(
	'title'			=> esc_html__('Footer','suitbuilder'),
	'panel'			=> 'suitbuilder-all-panels',
	'priority'		=> 90	
);

//create setting controls for footer enable
$suitbuilder_settings_controls['suitbuilder-enable-main-footer'] = array(
	'setting'	=> array(
		'default'		=> $suitbuilder_defaults['suitbuilder-enable-main-footer'],
		'transport'     => 'refresh'
	),
	'control' => array(
		'label'				=> esc_html__('Show Footer','suitbuilder'),
		'section'			=> 'suitbuilder-main-footer',
		'type'				=> 'checkbox',
		'priority'			=> 10,
		'active_callback'	=> ''	
	)
);

//Fotter options
$suitbuilder_settings_controls['suitbuilder-footer-options'] = array(
    'setting' =>     array(
        'default'       => '',
    ),
    'control' => array(
        'description'                 => sprintf( '<div class="bg-white"> %1$s </div>', esc_html__( 'Creadit Options', 'suitbuilder' ) ),
        'section'               => 'suitbuilder-main-footer',
        'type'                  => 'text',
        'input_attrs'           => array('class'=> "hidden"),
        'priority'              => 15,
        'active_callback'       => ''
    )
);



//create setting controls for copyright text
$suitbuilder_settings_controls['suitbuilder-copyright-text'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-copyright-text'],
		'transport'     => 'postMessage'
	),
	'control'	=> array(
		'label'				=> esc_html__('Copyright Text','suitbuilder'),
		'section'			=> 'suitbuilder-main-footer',
		'type'				=> 'text',
		'priority'			=> 40,
		'active_callback'	=> ''
	)
);

//create setting controls for footer social links
$suitbuilder_settings_controls['suitbuilder-footer-enable-social-link'] = array(
	'seting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-footer-enable-social-link'],
		'transport'     => 'refresh'
	),
	'control'	=> array(
		'label'				=> esc_html__('Show Social Links','suitbuilder'),
		'section'			=> 'suitbuilder-main-footer',
		'type'				=> 'checkbox',
		'priority'			=> 79,
		'active_callback'	=> ''
	)
);


//Fotter widget options
$suitbuilder_settings_controls['suitbuilder-footer-widget-options'] = array(
    'setting' =>     array(
        'default'       => '',
    ),
    'control' => array(
        'description'                 => sprintf( '<div class="bg-white"> %1$s </div>', esc_html__( 'Footer Weight Options', 'suitbuilder' ) ),
        'section'               => 'suitbuilder-main-footer',
        'type'                  => 'text',
        'input_attrs'           => array('class'=> "hidden"),
        'priority'              => 80,
        'active_callback'       => ''
    )
);

//create setting controls for footer  title color
$suitbuilder_settings_controls['suitbuilder-footer-title-color'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-footer-title-color'],
		'transport'     => 'refresh'
	),
	'control'	=> array(
		'label'				=> esc_html__('Widget Title Color','suitbuilder'),
		'section'			=> 'suitbuilder-main-footer',
		'type'				=> 'color',
		'priority'			=> 83,
		'active_callback'	=> ''	
	)
);


//create setting controls for footer  content color
$suitbuilder_settings_controls['suitbuilder-footer-content-color'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-footer-content-color'],
		'transport'     => 'refresh'
	),
	'control'	=> array(
		'label'				=> esc_html__('Widget Content Color','suitbuilder'),
		'section'			=> 'suitbuilder-main-footer',
		'type'				=> 'color',
		'priority'			=> 90,
		'active_callback'	=> ''	
	)
);


//footer widget title font size
$suitbuilder_settings_controls['suitbuilder-footer-widget-title-font-size'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-footer-widget-title-font-size'],
		'transport'     => 'refresh'
	),
	'control'	=> array(
		'label'					=> esc_html__('Title Font Size','suitbuilder'),
		'section'				=> 'suitbuilder-main-footer',
		'type'					=> 'number',
		'priority'				=> 100,
		'active_callback'		=> ''
	)
);


//footer widget title font weight
$suitbuilder_settings_controls['suitbuilder-footer-widget-title-font-weight'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-footer-widget-title-font-weight'],
		'transport'     => 'refresh'
	),
	'control'	=> array(
		'label'					=> esc_html__('Title Font Weight','suitbuilder'),
		'section'				=> 'suitbuilder-main-footer',
		'type'					=> 'number',
		'priority'				=> 110,
		'active_callback'		=> ''
	)
);

//setting control for widget title-transform
$suitbuilder_settings_controls['suitbuilder-footer-widget-title-transform'] =  array(
    'setting'   => array(
        'default'               => $suitbuilder_defaults['suitbuilder-footer-widget-title-transform'],
		'transport'     => 'refresh'
    ),
    'control'   => array(
        'label'                 => esc_html__('Title Text Transform','suitbuilder'),
        'section'               => 'suitbuilder-main-footer',
        'type'                  => 'select',
        'choices'   => array(
            'uppercase'           => esc_html__('Uppercase','suitbuilder'),
            'lowercase'           => esc_html__('Lowercase','suitbuilder'),
            'capitalize'          => esc_html__('Capitalize','suitbuilder'),
        ),
        'priority'              => 120,
        'active_callback'       => ''
    )

);

// ft-widget title line height
$suitbuilder_settings_controls['suitbuilder-ft-widget-title-line-height'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-ft-widget-title-line-height']
	),
	'control'	=> array(
		'label'					=> esc_html__('Widget Title Line Height','suitbuilder'),
		'section'				=> 'suitbuilder-main-footer',
		'type'					=> 'number',
		'priority'				=> 210,
		'active_callback'		=> ''
	)
);


//Fotter advance options
$suitbuilder_settings_controls['suitbuilder-footer-advance-options'] = array(
    'setting' =>     array(
        'default'       => '',
    ),
    'control' => array(
        'description'                 => sprintf( '<div class="bg-white"> %1$s </div>', esc_html__( 'Footer Background Options', 'suitbuilder' ) ),
        'section'               => 'suitbuilder-main-footer',
        'type'                  => 'text',
        'input_attrs'           => array('class'=> "hidden"),
        'priority'              => 215,
        'active_callback'       => ''
    )
);

//create setting controls for footer background color
$suitbuilder_settings_controls['suitbuilder-footer-background-color']	= array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-footer-background-color'],
		'transport'     => 'refresh'
	),
	'control'	=> array(
		'label'				=> esc_html__('Background Color','suitbuilder'),
		'section'			=> 'suitbuilder-main-footer',
		'type'				=> 'color',
		'priority'			=> 240,
		'active_callback'	=> ''	
	)
);


//** ===================== footer widget padding mobile active callback ======= */
if( !function_exists('suitbuilder_ft_widget_padding_desktop_active') ) :
    /**
    * mobile device options active
    * 
    * @since suitbuilder 1.0.0
    *
    * @param null
    * @return boolean
    */
    
     function suitbuilder_ft_widget_padding_desktop_active(  ){
        global $suitbuilder_customizer_all_values;
        $ft_desktop_device = $suitbuilder_customizer_all_values['suitbuilder-ft-widget-padding-icon'];
        
        if( 'ft-padding-desktop' == $ft_desktop_device ){
            return true;
        }else{
            return false;
        }  
    }
endif;

//** ===================== footer widget padding mobile active callback ======= */
if( !function_exists('suitbuilder_ft_widget_padding_mb_active') ) :
    /**
    * mobile device options active
    * 
    * @since suitbuilder 1.0.0
    *
    * @param null
    * @return boolean
    */
    
     function suitbuilder_ft_widget_padding_mb_active(  ){
        global $suitbuilder_customizer_all_values;
        $ft_margin_mobile_device = $suitbuilder_customizer_all_values['suitbuilder-ft-widget-padding-icon'];
        
        if( 'ft-padding-mobile' == $ft_margin_mobile_device ){
            return true;
        }else{
            return false;
        }  
    }
endif;

//** ===================== ft widget margin mobile active callback ======= */
if( !function_exists('suitbuilder_ft_widget_margin_desktop_active') ) :
    /**
    * mobile device options active
    * 
    * @since suitbuilder 1.0.0
    *
    * @param null
    * @return boolean
    */
    
     function suitbuilder_ft_widget_margin_desktop_active(  ){
        global $suitbuilder_customizer_all_values;
        $ft_margin_desktop_device = $suitbuilder_customizer_all_values['suitbuilder-ft-widget-margin-icon'];
        
        if( 'ft-margin-desktop' == $ft_margin_desktop_device ){
            return true;
        }else{
            return false;
        }  
    }
endif;

//** ===================== blog margin mobile active callback ======= */
if( !function_exists('suitbuilder_ft_widget_margin_mobile_active') ) :
    /**
    * mobile device options active
    * 
    * @since suitbuilder 1.0.0
    *
    * @param null
    * @return boolean
    */
    
     function suitbuilder_ft_widget_margin_mobile_active(  ){
        global $suitbuilder_customizer_all_values;
        $ft_margin_mobile_device = $suitbuilder_customizer_all_values['suitbuilder-ft-widget-margin-icon'];
        
        if( 'ft-margin-mobile' == $ft_margin_mobile_device ){
            return true;
        }else{
            return false;
        }  
    }
endif;