<?php

global $suitbuilder_sections;
global $suitbuilder_settings_controls;
global $suitbuilder_defaults;

//call to all defaults
$suitbuilder_defaults = suitbuilder_all_defalts_values();

//section create for color sectoion
$suitbuilder_sections['colors'] = array(
    'priority'       => 100,
    'title'          => esc_html__( 'Colors', 'suitbuilder' ),
    'panel'          => 'suitbuilder-all-panels'
);


//create setting control for primary color 
$suitbuilder_settings_controls['suitbuilder-primary-color'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-primary-color']
	),
	'control' => array(
		'label'				=> esc_html__('Primary','suitbuilder'),
		'section'			=> 'colors',
		'type'				=> 'color',
		'priority'			=> 10,
		'active_callback'   => ''
	)
);

//create setting controls for secondary color
$suitbuilder_settings_controls['suitbuilder-secondary-color'] = array(
	'setting'	=> array( 
		'default'			=> $suitbuilder_defaults['suitbuilder-secondary-color']
	),
	'control'	=> array(
		'label'				=> esc_html__('Secondary','suitbuilder'),
		'section'			=> 'colors',
		'type'				=> 'color',
		'priority'			=> 20,
		'active_callback'	=> ''
	)
);


