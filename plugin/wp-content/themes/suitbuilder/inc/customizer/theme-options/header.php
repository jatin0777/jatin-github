<?php
global $suitbuilder_sections;
global $suitbuilder_settings_controls;
global $suitbuilder_defaults;

//call defaults values
$suitbuilder_defaults = suitbuilder_all_defalts_values();

//call font family
$suitbuilder_fonts  = suitbuilder_google_font();

//create a section 
$suitbuilder_sections['suitbuilder-main-header'] = array(
	'title'			=> esc_html__('Main Header','suitbuilder'),
	'panel'			=> 'suitbuilder-all-panels',
	'priority'		=> 20	
);

//create setting controls for header enable
$suitbuilder_settings_controls['suitbuilder-enable-main-header'] = array(
	'setting'	=> array(
		'default'		=> $suitbuilder_defaults['suitbuilder-enable-main-header']

	),
	'control' => array(
		'label'				=> esc_html__('Show Main Header','suitbuilder'),
		'section'			=> 'suitbuilder-main-header',
		'type'				=> 'checkbox',
		'priority'			=> 10,
		'active_callback'	=> ''	
	)
);


//create setting controls for header scroll and fixed
$suitbuilder_settings_controls['suitbuilder-scroll-fixed-main-header'] = array(
	'setting'	=> array(
		'default'		=> $suitbuilder_defaults['suitbuilder-scroll-fixed-main-header']
	),
	'control' => array(
		'label'				=> esc_html__('Sticky Header','suitbuilder'),
		'section'			=> 'suitbuilder-main-header',
		'type'				=> 'checkbox',
		'priority'			=> 20,
		'active_callback'	=> ''	
	)
);


// Button text Field
$suitbuilder_settings_controls['suitbuilder-header-button-text'] = array(
    'setting' =>     array(
		'default'		=> '',
    ),
    'control' => array(
    	'description'					=> sprintf( '<div class="bg-white"> %1$s </div>', esc_html__( 'Button ', 'suitbuilder' ) ),

        'section'               => 'suitbuilder-main-header',
        'type'                  => 'text',
        'input_attrs'           => array('class'=> "hidden"),
        'priority'              => 30,
        'active_callback'       => ''
    )
);


//create setting controls for header  button text
$suitbuilder_settings_controls['suitbuilder-main-header-button-text'] = array(
	'setting'	=> array(
		'default'		=> $suitbuilder_defaults['suitbuilder-main-header-button-text']
	),
	'control' => array(
		'label'				=> esc_html__('Button Text','suitbuilder'),
		'section'			=> 'suitbuilder-main-header',
		'type'				=> 'text',
		'priority'			=> 50,
		'active_callback'	=> ''	
	)
);

//create setting controls for header button url
$suitbuilder_settings_controls['suitbuilder-main-header-button-url'] = array(
	'setting'	=> array(
		'default'		=> $suitbuilder_defaults['suitbuilder-main-header-button-url']
	),
	'control' => array(
		'label'				=> esc_html__('Button Url','suitbuilder'),
		'section'			=> 'suitbuilder-main-header',
		'type'				=> 'url',
		'priority'			=> 60,
		'active_callback'	=> ''	
	)
);


//setting control for all button 
$suitbuilder_settings_controls['suitbuilder-header-button-bg-options'] = array(
    'setting'   => array(
        'default'           => $suitbuilder_defaults['suitbuilder-header-button-bg-options']
    ),
    'control'   => array(
        'label'             => esc_html__('Button Background Options','suitbuilder'),
        'section'           => 'suitbuilder-main-header',
        'type'              => 'radio',
        'choices'   => array(
            'button-bg'             => esc_html__('Background','suitbuilder'),
            'button-hover-bg'       => esc_html__('Hover Background','suitbuilder'),
        ),
        'priority'          => 90,
        'active_callback'   => ''
    )
);


//buttonn background color
$suitbuilder_settings_controls['suitbuilder-header-button-bg-color'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-header-button-bg-color']
	),
	'control'	=> array(
		'label'				=> esc_html__(' Background Color','suitbuilder'),
		'section'			=> 'suitbuilder-main-header',
		'type'				=> 'color',
		'priority'			=> 100,
		'active_callback'	=> 'suitbuilder_header_button_background_active'
	)
);

//buttonn text color
$suitbuilder_settings_controls['suitbuilder-header-button-text-color'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-header-button-text-color']
	),
	'control'	=> array(
		'label'				=> esc_html__('Text Color','suitbuilder'),
		'section'			=> 'suitbuilder-main-header',
		'type'				=> 'color',
		'priority'			=> 110,
		'active_callback'	=> 'suitbuilder_header_button_background_active'

	)
);

//button hover background color
$suitbuilder_settings_controls['suitbuilder-header-button-hover-bg-color'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-header-button-hover-bg-color']
	),
	'control'	=> array(
		'label'				=> esc_html__(' Background hover Color','suitbuilder'),
		'section'			=> 'suitbuilder-main-header',
		'type'				=> 'color',
		'priority'			=> 120,
		'active_callback'	=> 'suitbuilder_header_button_hover_background_active'
	)
);

//button hover text color
$suitbuilder_settings_controls['suitbuilder-header-button-hover-text-color'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-header-button-hover-text-color']
	),
	'control'	=> array(
		'label'				=> esc_html__('Text hover Color','suitbuilder'),
		'section'			=> 'suitbuilder-main-header',
		'type'				=> 'color',
		'priority'			=> 130,
		'active_callback'	=> 'suitbuilder_header_button_hover_background_active'
	)
);

//button title font
$suitbuilder_settings_controls['suitbuilder-button-title-font'] = array(
    'setting' => array(
        'default'          => $suitbuilder_defaults['suitbuilder-button-title-font'] 
    ),
    'control' => array(
        'label'             => esc_html__('Button Text Font Family','suitbuilder'),
        'section'           => 'suitbuilder-main-header',
        'type'              => 'select',
        'choices'			=> $suitbuilder_fonts,
        'priority'          => 140,
        'active_callback'  => ''

    )       
);

//button title font-size
$suitbuilder_settings_controls['suitbuilder-button-title-font-size'] = array(
    'setting' => array(
        'default'          => $suitbuilder_defaults['suitbuilder-button-title-font-size'] 
    ),
    'control' => array(
        'label'             => esc_html__('Button Text Font Size','suitbuilder'),
        'section'           => 'suitbuilder-main-header',
        'type'              => 'number',
        'priority'          => 150,
        'active_callback'  => ''

    )       
);


// Menu text Field
$suitbuilder_settings_controls['suitbuilder-header-menu-advance-option'] = array(
    'setting' =>     array(
		'default'		=> '',
    ),
    'control' => array(
    	'description'					=> sprintf( '<div class="bg-white"> %1$s </div>', esc_html__( 'Advance Options', 'suitbuilder' ) ),
        'section'               => 'suitbuilder-main-header',
        'type'                  => 'text',
        'input_attrs'           => array('class'=> "hidden"),
        'priority'              => 170,
        'active_callback'       => ''
    )
);

//create setting controls for menu font family
$suitbuilder_settings_controls['suitbuilder-menu-advance-option-checkbox'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-menu-advance-option-checkbox']
	),
	'control' => array(
		'label'					=> esc_html__('Advance Options','suitbuilder'),
		'description'			=> esc_html__('Please Enable For more Options','suitbuilder'),
		'section'				=> 'suitbuilder-main-header',
		'type'					=> 'checkbox',
		'priority'				=> 175,
		'active_callback'		=> ''
	)
);

//create setting controls for menu font family
$suitbuilder_settings_controls['suitbuilder-menu-font-family'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-menu-font-family']
	),
	'control' => array(
		'label'					=> esc_html__('Menu Font Family','suitbuilder'),
		'section'				=> 'suitbuilder-main-header',
		'type'					=> 'select',
		'choices'				=> $suitbuilder_fonts,
		'priority'				=> 180,
		'active_callback'		=> 'suitbuilder_header_menu_advance_options_active'
	)
);

//header menu title font size
$suitbuilder_settings_controls['suitbuilder-header-menu-font-size'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-header-menu-font-size']
	),
	'control'	=> array(
		'label'					=> esc_html__('Menu Font Size','suitbuilder'),
		'section'				=> 'suitbuilder-main-header',
		'type'					=> 'number',
		'priority'				=> 190,
		'active_callback'		=> 'suitbuilder_header_menu_advance_options_active'
	)
);

//header menu font weight
$suitbuilder_settings_controls['suitbuilder-header-menu-font-weight'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-header-menu-font-weight']
	),
	'control'	=> array(
		'label'					=> esc_html__('Menu Font Weight','suitbuilder'),
		'section'				=> 'suitbuilder-main-header',
		'type'					=> 'number',
		'priority'				=> 200,
		'active_callback'		=> 'suitbuilder_header_menu_advance_options_active'
	)
);

//setting control for menu-transform
$suitbuilder_settings_controls['suitbuilder-header-menu-transform'] =  array(
    'setting'   => array(
        'default'               => $suitbuilder_defaults['suitbuilder-header-menu-transform']
    ),
    'control'   => array(
        'label'                 => esc_html__('Menu Text Transform','suitbuilder'),
        'section'               => 'suitbuilder-main-header',
        'type'                  => 'select',
        'choices'   => array(
            'uppercase'           => esc_html__('Uppercase','suitbuilder'),
            'lowercase'           => esc_html__('Lowercase','suitbuilder'),
            'capitalize'          => esc_html__('Capitalize','suitbuilder'),
        ),
        'priority'              => 210,
        'active_callback'       => 'suitbuilder_header_menu_advance_options_active'
    )

);

//background color
$suitbuilder_settings_controls['suitbuilder-main-header-bg-color'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-main-header-bg-color']
	),
	'control'	=> array(
		'label'				=> esc_html__('Background Color','suitbuilder'),
		'section'			=> 'suitbuilder-main-header',
		'type'				=> 'color',
		'priority'			=> 220,
		'active_callback'	=> 'suitbuilder_header_menu_advance_options_active'
	)
);

//text color
$suitbuilder_settings_controls['suitbuilder-main-header-text-color'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-main-header-text-color']
	),
	'control'	=> array(
		'label'				=> esc_html__('Text Color','suitbuilder'),
		'section'			=> 'suitbuilder-main-header',
		'type'				=> 'color',
		'priority'			=> 230,
		'active_callback'	=> 'suitbuilder_header_menu_advance_options_active'
	)
);


//** ========================= active callback for  background button =============== **/
if( !function_exists('suitbuilder_header_button_background_active') ) :
	/**
	* Active callback for button background
	*
	* @since suitbuilder 1.0.0
	* @param null
	* @return boolean
	*/
	function suitbuilder_header_button_background_active(){
		global $suitbuilder_customizer_all_values;
		$button_hover_background = $suitbuilder_customizer_all_values['suitbuilder-header-button-bg-options'];
		if( 'button-bg' == $button_hover_background ){
			return true;
		}else{
			return false;
		}

	}
endif;


//**==================== active callback for hover background button ================= */
if( !function_exists('suitbuilder_header_button_hover_background_active') ) :
	/**
	* Active callback for button background
	*
	* @since suitbuilder 1.0.0
	* @param null
	* @return boolean
	*/
	function suitbuilder_header_button_hover_background_active(){
		global $suitbuilder_customizer_all_values;
		$button_hover_background = $suitbuilder_customizer_all_values['suitbuilder-header-button-bg-options'];
		if( 'button-hover-bg' == $button_hover_background ){
			return true;
		}else{
			return false;
		}

	}
endif;

//**==================== active callback for hover background button ===================**/
if( !function_exists('suitbuilder_header_menu_advance_options_active') ) :
	/**
	* Active callback for button background
	*
	* @since suitbuilder 1.0.0
	* @param null
	* @return boolean
	*/
	function suitbuilder_header_menu_advance_options_active(){
		global $suitbuilder_customizer_all_values;
		$menu_advannce = $suitbuilder_customizer_all_values['suitbuilder-menu-advance-option-checkbox'];
		if( 1 == $menu_advannce ){
			return true;
		}else{
			return false;
		}

	}
endif;


