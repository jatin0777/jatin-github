<?php 

global $suitbuilder_sections;
global $suitbuilder_settings_controls;
global $suitbuilder_defaults;

//call all defaults
$suitbuilder_defaults = suitbuilder_all_defalts_values();

//create a setting controls show section
$suitbuilder_settings_controls['suitbuilder-enable-inner-header'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-enable-inner-header']	
	),
	'control'	=> array(
		'label'				=> esc_html__('Show Inner header','suitbuilder'),
		'section'			=> 'header_image',
		'type'				=> 'checkbox',
		'priority'			=> 1,
		'active_callback'	=> ''
	)
);

//inner header advance option
$suitbuilder_settings_controls['suitbuilder-inner-header-advance-option'] = array(
    'setting' =>     array(
        'default'       => '',
    ),
    'control' => array(
        'description'                 => sprintf( '<div class="bg-white"> %1$s </div>', esc_html__( 'Advance Options', 'suitbuilder' ) ),
        'section'               => 'header_image',
        'type'                  => 'text',
        'input_attrs'           => array('class'=> "hidden"),
        'priority'              => 10,
        'active_callback'       => ''
    )
);

//create a setting controls title font size
$suitbuilder_settings_controls['suitbuilder-inner-header-title-font-size'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-inner-header-title-font-size']	
	),
	'control'	=> array(
		'label'				=> esc_html__('Title Font Size(px)','suitbuilder'),
		'section'			=> 'header_image',
		'type'				=> 'number',
		'priority'			=> 40,
		'active_callback'	=> ''
	)
);

//create a setting controls title font weight
$suitbuilder_settings_controls['suitbuilder-inner-header-title-font-weight'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-inner-header-title-font-weight']	
	),
	'control'	=> array(
		'label'				=> esc_html__('Title Font Weight','suitbuilder'),
		'section'			=> 'header_image',
		'type'				=> 'number',
		'priority'			=> 50,
		'active_callback'	=> ''
	)
);

//setting control for post heading text-transform
$suitbuilder_settings_controls['suitbuilder-inner-header-title-transform'] =  array(
    'setting'   => array(
        'default'               => $suitbuilder_defaults['suitbuilder-inner-header-title-transform']
    ),
    'control'   => array(
        'label'                 => esc_html__('Title Text Transform','suitbuilder'),
        'section'               => 'header_image',
        'type'                  => 'select',
        'choices'   => array(
            'uppercase'           => esc_html__('Uppercase','suitbuilder'),
            'lowercase'           => esc_html__('Lowercase','suitbuilder'),
            'capitalize'          => esc_html__('Capitalize','suitbuilder'),
        ),
        'priority'              => 60,
        'active_callback'       => ''
    )

);

