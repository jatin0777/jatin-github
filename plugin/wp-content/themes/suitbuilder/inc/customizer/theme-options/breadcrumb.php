<?php 

global $suitbuilder_sections;
global $suitbuilder_settings_controls;
global $suitbuilder_defaults;

//call all defaults values
$suitbuilder_defaults = suitbuilder_all_defalts_values();

//create a section for genral setting
$suitbuilder_sections['suitbuilder-breadcrumb-section'] = array(
	'title'		=> esc_html__('Breadcrumb','suitbuilder'),
	'panel'		=> 'suitbuilder-all-panels',
	'priority'	=> 40
);

//create a setting controls for enable breadcrumb
$suitbuilder_settings_controls['suitbuilder-enable-breadcrumb'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-enable-breadcrumb']
	),
	'control'	=> array(
		'label'				=> esc_html__('Show Breadcrumb','suitbuilder'),
		'section'			=> 'suitbuilder-breadcrumb-section',
		'type'				=> 'checkbox',
		'priority'			=> 10,
		'active_callback'	=> ''
	)
);

//breadcrumb option
$suitbuilder_settings_controls['suitbuilder-breadcrumb-options'] = array(
    'setting' =>     array(
		'default'		=> '',
    ),
    'control' => array(
    	'description'					=> sprintf( '<div class="bg-white"> %1$s </div>', esc_html__( 'Breadcrumb Options', 'suitbuilder' ) ),
        'section'               => 'suitbuilder-breadcrumb-section',
        'type'                  => 'text',
        'input_attrs'           => array('class'=> "hidden"),
        'priority'              => 20,
        'active_callback'       => ''
    )
);

//create a setting controls for breadcrumb margin buttom
$suitbuilder_settings_controls['suitbuilder-breadcrumb-margin-bottom'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-breadcrumb-margin-bottom']
	),
	'control'	=> array(
		'label'				=> esc_html__('Margin From Bottom','suitbuilder'),
		'section'			=> 'suitbuilder-breadcrumb-section',
		'type'				=> 'text',
		'priority'			=> 70,
		'active_callback'	=> ''
	)
);