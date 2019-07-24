<?php

global $suitbuilder_sections;
global $suitbuilder_settings_controls;
global $suitbuilder_defaults;
global $suitbuilder_fonts;

// call all defasult
$suitbuilder_defaults  = suitbuilder_all_defalts_values();

//call font family
$suitbuilder_fonts 	= suitbuilder_google_font();


//create section for font family
$suitbuilder_sections['suitbuilder-font-section'] = array(
	'title'			=> esc_html__('Font Family','suitbuilder'),
	'panel'			=> 'suitbuilder-all-panels',
	'priority'		=> 110
);

//create settings controls for primary font
$suitbuilder_settings_controls['suitbuilder-primary-font-family'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-primary-font-family']
	),
	'control' => array(
		'label'					=> esc_html__('Primary','suitbuilder'),
		'section'				=> 'suitbuilder-font-section',
		'type'					=> 'select',
		'choices'				=> $suitbuilder_fonts,
		'priority'				=> 10,
		'active_callback' 		=> ''
	)
);

//create settings controls for secondary font
$suitbuilder_settings_controls['suitbuilder-secondary-font-family'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-secondary-font-family']
	),
	'control' => array(
		'label'					=> esc_html__('Secondary','suitbuilder'),
		'section'				=> 'suitbuilder-font-section',
		'type'					=> 'select',
		'choices'				=> $suitbuilder_fonts,
		'priority'				=> 20,
		'active_callback'		=> ''
	)
);



