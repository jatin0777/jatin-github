<?php

global $suitbuilder_sectionss;
global $suitbuilder_settings_controls;
global $suitbuilder_defaults;

//call all defaults values
$suitbuilder_defaults = suitbuilder_all_defalts_values();

//create a section for preloader
$suitbuilder_sections['suitbuilder-preloader-section'] = array(
	'title'		=> esc_html__('Preloader','suitbuilder'),
	'panel'		=> 'suitbuilder-all-panels',
	'priority'	=> 80
);

//Enable Preloader
$suitbuilder_settings_controls['suitbuilder-enbale-preloader'] = array(
	'setting'	=> array(
		'defaults'			=> $suitbuilder_defaults['suitbuilder-enbale-preloader']
	),
	'control'	=> array(
		'label'				=> esc_html__('Show Preloader','suitbuilder'),
		'section'			=> 'suitbuilder-preloader-section',
		'type'				=> 'checkbox',
		'priority'			=> 10,
		'active_callback'	=> ''
	)

);

