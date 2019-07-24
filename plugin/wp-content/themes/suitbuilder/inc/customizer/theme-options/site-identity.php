<?php 
 
global $suitbuilder_settings_controls;

//call all defaults
$suitbuilder_defaults = suitbuilder_all_defalts_values();

//call font family
$suitbuilder_fonts  = suitbuilder_google_font();


//inner header advance option
$suitbuilder_settings_controls['suitbuilder-site-identity-advance-option'] = array(
    'setting' =>     array(
        'default'       => '',
    ),
    'control' => array(
        'description'                 => sprintf( '<div class="bg-white"> %1$s </div>', esc_html__( 'Advance Options', 'suitbuilder' ) ),
        'section'               => 'title_tagline',
        'type'                  => 'text',
        'input_attrs'           => array('class'=> "hidden"),
        'priority'              => 70,
        'active_callback'       => ''
    )
);


//create setting controls for site-identity color
$suitbuilder_settings_controls['suitbuilder-site-identity-color'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-site-identity-color']
	),
	'control'	=> array(
		'label'				=> esc_html__('Site Identity Color','suitbuilder'),
		'section'			=> 'title_tagline',
		'type'				=> 'color',
		'priority'			=> 80,
		'active_callback'	=> ''	
	) 
);

//create setting controls for site identity font family
$suitbuilder_settings_controls['suitbuilder-site-idenity-font-family'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-site-idenity-font-family']
	),
	'control' => array(
		'label'					=> esc_html__('Site Idenity Font Family','suitbuilder'),
		'section'				=> 'title_tagline',
		'type'					=> 'select',
		'choices'				=> $suitbuilder_fonts,
		'priority'				=> 90,
		'active_callback'		=> ''
	)
);


//site-identity-title title font size
$suitbuilder_settings_controls['suitbuilder-site-identity-title-font-size'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-site-identity-title-font-size']
	),
	'control'	=> array(
		'label'					=> esc_html__('Title Font Size','suitbuilder'),
		'section'				=> 'title_tagline',
		'type'					=> 'number',
		'priority'				=> 100,
		'active_callback'		=> ''
	)
);

//site-identity title font weight
$suitbuilder_settings_controls['suitbuilder-site-identity-title-font-weight'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-site-identity-title-font-weight']
	),
	'control'	=> array(
		'label'					=> esc_html__('Title Font Weight','suitbuilder'),
		'section'				=> 'title_tagline',
		'type'					=> 'number',
		'priority'				=> 110,
		'active_callback'		=> ''
	)
);

//setting control for menu-transform
$suitbuilder_settings_controls['suitbuilder-site-identity-title-transform'] =  array(
    'setting'   => array(
        'default'               => $suitbuilder_defaults['suitbuilder-site-identity-title-transform']
    ),
    'control'   => array(
        'label'                 => esc_html__('Title Text Transform','suitbuilder'),
        'section'               => 'title_tagline',
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