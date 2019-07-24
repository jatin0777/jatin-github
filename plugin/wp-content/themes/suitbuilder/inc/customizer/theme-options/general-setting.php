<?php 

global $suitbuilder_sections;
global $suitbuilder_settings_controls;
global $suitbuilder_defaults;

//call all defaults values
$suitbuilder_defaults = suitbuilder_all_defalts_values();

//create a section for genral setting
$suitbuilder_sections['suitbuilder-genral-setting-section'] = array(
	'title'		=> esc_html__('General Layout','suitbuilder'),
	'panel'		=> 'suitbuilder-all-panels',
	'priority'	=> 70
);


//**** ========= Layout optiopns =========== ***//
//home page static page display
$suitbuilder_settings_controls['suitbuilder-enable-static-page'] = array(
    'setting' =>     array(
        'default'              => $suitbuilder_defaults['suitbuilder-enable-static-page'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Enable Static Front Page', 'suitbuilder' ),
        'description'           =>  esc_html__( 'If you disable this, the static page will be disappeared form the front page and other section will remain as it is', 'suitbuilder' ),
        'section'               => 'suitbuilder-genral-setting-section',
        'type'                  => 'checkbox',
        'priority'              => 10,
    )
);

//general Setting Genearal options
$suitbuilder_settings_controls['suitbuilder-genearal-setting-genaral-options'] = array(
    'setting' =>     array(
        'default'       => '',
    ),
    'control' => array(
        'description'                 => sprintf( '<div class="bg-white"> %1$s </div>', esc_html__( 'Basic Options', 'suitbuilder' ) ),
        'section'               => 'suitbuilder-genral-setting-section',
        'type'                  => 'text',
        'input_attrs'           => array('class'=> "hidden"),
        'priority'              => 15,
        'active_callback'       => ''
    )
);

// single post/page image align
$suitbuilder_settings_controls['suitbuilder-single-post-image-align'] = array(
    'setting' =>     array(
        'default'              => $suitbuilder_defaults['suitbuilder-single-post-image-align'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Alignment of Image in Single Post/Page', 'suitbuilder' ),
        'section'               => 'suitbuilder-genral-setting-section',
        'type'                  => 'radio',
        'choices' => array(
            'full'      => esc_html__( 'Full', 'suitbuilder' ),
            'right'     => esc_html__( 'Right', 'suitbuilder' ),
            'left'      => esc_html__( 'Left', 'suitbuilder' ),
            'no-image'  => esc_html__( 'No', 'suitbuilder' )
        ),
        'priority'              => 40,
        'description'           =>  esc_html__( 'Please note that this setting can be overridden by individual post/page settings', 'suitbuilder' ),
    )
);

//Archive layout options
$suitbuilder_settings_controls['suitbuilder-archive-layout'] = array(
    'setting' => array(
        'default'              => $suitbuilder_defaults['suitbuilder-archive-layout']
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Archive Layout', 'suitbuilder' ),
        'section'               => 'suitbuilder-genral-setting-section',
        'type'                  => 'select',
        'choices'               => array(
            'excerpt-only'              => esc_html__( 'Excerpt Only', 'suitbuilder' ),
            'thumbnail-and-excerpt'     => esc_html__( 'Thumbnail and Excerpt', 'suitbuilder' ),
            'full-post'                 => esc_html__( 'Full Post', 'suitbuilder' ),
            'thumbnail-and-full-post'   => esc_html__( 'Thumbnail and Full Post', 'suitbuilder' ),
        ),
        'priority'              => 50,
    )
);

//setting controll for site layout
$suitbuilder_settings_controls['suitbuilder-site-layout-test'] = array(
    'setting'   => array(
        'default'               => $suitbuilder_defaults['suitbuilder-site-layout-test']
    ),
    'control'   => array(
        'label'                 => esc_html__('Site Layout','suitbuilder'),
        'section'               => 'suitbuilder-genral-setting-section',
        'type'                  => 'radio',
        'choices'   => array(
            'wide-layout'       => esc_html__('Full Width','suitbuilder'),
            'boxed-layout'      => esc_html__('Boxed','suitbuilder'),
            'custom-layout'     => esc_html__('Custom','suitbuilder') 
        ),
        'priority'              => 60,
        'active_callback'       => ''
    )

);

//setting control for custom container width
$suitbuilder_settings_controls['suitbuilder-container-width-test'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-container-width-test']
	),
	'control'	=> array(
		'label'				=> esc_html__('Container width','suitbuilder'),
		'section'			=> 'suitbuilder-genral-setting-section',
		'type'				=> 'number',
		'priority'			=> 62,
		'active_callback'	=> 'suitbuilder_custom_container_width_active'
	)
);

//sgeneral Setting icon options
$suitbuilder_settings_controls['suitbuilder-genearal-setting-icon'] = array(
    'setting' =>     array(
        'default'       => '',
    ),
    'control' => array(
        'description'                 => sprintf( '<div class="bg-white"> %1$s </div>', esc_html__( 'Scroll To Top', 'suitbuilder' ) ),
        'section'               => 'suitbuilder-genral-setting-section',
        'type'                  => 'text',
        'input_attrs'           => array('class'=> "hidden"),
        'priority'              => 65,
        'active_callback'       => ''
    )
);



//create setting controls for scroll to up
$suitbuilder_settings_controls['suitbuilder-enable-scroll-to-top'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-enable-scroll-to-top']
	),
	'control'	=> array(
		'label'				=> esc_html__('Show Scroll To Top','suitbuilder'),
		'section'			=> 'suitbuilder-genral-setting-section',
		'type'				=> 'checkbox',
		'priority'			=> 140,
		'active_callback'	=> ''
	)
);


//active callback for custom container width
if( !function_exists('suitbuilder_custom_container_width_active') ) :
    /**
    * custom container width  active
    * 
    * @since suitbuilder 1.0.0
    *
    * @param null
    * @return boolean
    */
    
     function suitbuilder_custom_container_width_active(  ){
        global $suitbuilder_customizer_all_values;
        $custom_container_width = $suitbuilder_customizer_all_values['suitbuilder-site-layout-test'];
        
        if( 'custom-layout' == $custom_container_width ){
            return true;
        }else{
            return false;
        }
    }
endif;

