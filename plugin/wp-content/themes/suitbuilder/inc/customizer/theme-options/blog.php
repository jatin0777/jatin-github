<?php

global $suitbuilder_sections;
global $suitbuilder_settings_controls;
global $suitbuilder_defaults;

//call all defaults
$suitbuilder_defaults = suitbuilder_all_defalts_values();


// create a section latest blog
$suitbuilder_sections['suitbuilder-latest-blog-section'] = array(
	'title'				=> esc_html__(' Latest Blog','suitbuilder'),
	'description'		=> esc_html__('It will work when you select ==> homepage setting ==>your latest Post','suitbuilder'),
	'priority'			=> 50,
	'panel'				=> 'suitbuilder-all-panels'
);

// create a setting control enable latest blog heading name
$suitbuilder_settings_controls['suitbuilder-blog-header-title-text'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-blog-header-title-text']
	),
	'control'	=> array(
		'label'				=> esc_html__('Blog Header','suitbuilder'),
		'section'			=> 'suitbuilder-latest-blog-section',
		'type'				=> 'text',
		'priority'			=> 1,
		'active_callback'	=> ''
	)
);

//create a setting controls blog section background
$suitbuilder_settings_controls['suitbuilder-blog-section-bg-color'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-blog-section-bg-color']	
	),
	'control'	=> array(
		'label'				=> esc_html__('Blog Post Background Color','suitbuilder'),
		'section'			=> 'suitbuilder-latest-blog-section',
		'type'				=> 'color',
		'priority'			=> 5,
		'active_callback'	=> ''
	)
);

//create a setting control number of post
$suitbuilder_settings_controls['suitbuilder-latest-blog-number-post'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-latest-blog-number-post']
	),
	'control' 	=> array(
		'label'				=> esc_html__('Select Number Of Post ','suitbuilder'),
		'section'			=> 'suitbuilder-latest-blog-section',
		'type'				=> 'number',
		'priority'			=> 10,
		'active_callback'	=> ''
	)
);

//create a setting control excerpt control
$suitbuilder_settings_controls['suitbuilder-latest-blog-excerpt-lenght'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-latest-blog-excerpt-lenght']
	),
	'control'	=> array(
		'label'				=> esc_html__('Blog Excerpt Length','suitbuilder'),
		'section'			=> 'suitbuilder-latest-blog-section',
		'type'				=> 'number',
		'priority'			=> 20,
		'active_callback'	=> ''
	)

);

//Blog Title options
$suitbuilder_settings_controls['suitbuilder-blog-text-options'] = array(
    'setting' =>     array(
        'default'       => '',
    ),
    'control' => array(
    	'description'			=> sprintf( '<div class="bg-white"> %1$s </div>', esc_html__( 'Title Options', 'suitbuilder' ) ),
        'section'               => 'suitbuilder-latest-blog-section',
        'type'                  => 'text',
        'input_attrs'           => array('class'=> "hidden"),
        'priority'              => 35,
        'active_callback'       => ''
    )
);


//create a setting controls checkbox for post title
$suitbuilder_settings_controls['suitbuilder-latest-blog-enable-title'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-latest-blog-enable-title']
	),
	'control'	=> array(
		'label'				=> esc_html__('Show Title','suitbuilder'),
		'section'			=> 'suitbuilder-latest-blog-section',
		'type'				=> 'checkbox',
		'priority'			=> 50,
		'active_callback'	=> ''
	)
);

//create a setting controls title color
$suitbuilder_settings_controls['suitbuilder-blog-section-title-color'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-blog-section-title-color']	
	),
	'control'	=> array(
		'label'				=> esc_html__('Title Color','suitbuilder'),
		'section'			=> 'suitbuilder-latest-blog-section',
		'type'				=> 'color',
		'priority'			=> 60,
		'active_callback'	=> ''
	)
);

//create a setting controls title font size
$suitbuilder_settings_controls['suitbuilder-blog-title-font-size'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-blog-title-font-size']	
	),
	'control'	=> array(
		'label'				=> esc_html__('Title Font Size(px)','suitbuilder'),
		'section'			=> 'suitbuilder-latest-blog-section',
		'type'				=> 'number',
		'priority'			=> 70,
		'active_callback'	=> ''
	)
);

//create a setting controls title font weight
$suitbuilder_settings_controls['suitbuilder-blog-title-font-weight'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-blog-title-font-weight']	
	),
	'control'	=> array(
		'label'				=> esc_html__('Title Font Weight','suitbuilder'),
		'section'			=> 'suitbuilder-latest-blog-section',
		'type'				=> 'number',
		'priority'			=> 80,
		'active_callback'	=> ''
	)
);

//setting control for post heading text-transform
$suitbuilder_settings_controls['suitbuilder-blog-title-transform'] =  array(
    'setting'   => array(
        'default'               => $suitbuilder_defaults['suitbuilder-blog-title-transform']
    ),
    'control'   => array(
        'label'                 => esc_html__('Title Text Transform','suitbuilder'),
        'section'               => 'suitbuilder-latest-blog-section',
        'type'                  => 'select',
        'choices'   => array(
            'uppercase'           => esc_html__('Uppercase','suitbuilder'),
            'lowercase'           => esc_html__('Lowercase','suitbuilder'),
            'capitalize'          => esc_html__('Capitalize','suitbuilder'),
        ),
        'priority'              => 90,
        'active_callback'       => ''
    )

);

//Title  padding
$suitbuilder_settings_controls['suitbuilder-blog-title-padding'] = array(
    'setting' =>     array(
        'default'       => '',
    ),
    'control' => array(
        'description'                 => sprintf( '<div class="blog-padding"> %1$s </div>', esc_html__( 'Blog Post Title padding (PX)', 'suitbuilder' ) ),
        'section'               => 'suitbuilder-latest-blog-section',
        'type'                  => 'text',
        'input_attrs'           => array('class'=> "hidden"),
        'priority'              => 95,
        'active_callback'       => ''
    )
);

//padding icon 
$suitbuilder_settings_controls['suitbuilder-blog-padding-icon'] =  array(
    'setting'   => array(
        'default'               => $suitbuilder_defaults['suitbuilder-blog-padding-icon'],
		'transport'     => 'refresh'
    ),
    'control'   => array(
        'section'               => 'suitbuilder-latest-blog-section',
        'type'                  => 'radio_image',
        'choices'   => array(
            'padding-desktop'           => get_template_directory_uri() .'/assets/image/desktop.png',
            'padding-mobile'            => get_template_directory_uri() .'/assets/image/phone.png',
        ),
        'priority'              => 96,
        'active_callback'       => ''
    )

);

// blog title padding top
$suitbuilder_settings_controls['suitbuilder-blog-title-padding-top'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-blog-title-padding-top']
	),
	'control'	=> array(
		'label'					=> esc_html__('Top','suitbuilder'),
		'section'				=> 'suitbuilder-latest-blog-section',
		'type'					=> 'number',
		'priority'				=> 100,
		'active_callback'		=> 'suitbuilder_padding_desktop_active'
	)
);

//blog title padding right
$suitbuilder_settings_controls['suitbuilder-blog-title-padding-right'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-blog-title-padding-right']
	),
	'control'	=> array(
		'label'					=> esc_html__('Right','suitbuilder'),
		'section'				=> 'suitbuilder-latest-blog-section',
		'type'					=> 'number',
		'priority'				=> 110,
		'active_callback'		=> 'suitbuilder_padding_desktop_active'
	)
);

// blog title padding bottom
$suitbuilder_settings_controls['suitbuilder-blog-title-padding-bottom'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-blog-title-padding-bottom']
	),
	'control'	=> array(
		'label'					=> esc_html__('Bottom','suitbuilder'),
		'section'				=> 'suitbuilder-latest-blog-section',
		'type'					=> 'number',
		'priority'				=> 120,
		'active_callback'		=> 'suitbuilder_padding_desktop_active'
	)
);

// blog title padding left
$suitbuilder_settings_controls['suitbuilder-blog-title-padding-left'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-blog-title-padding-left']
	),
	'control'	=> array(
		'label'					=> esc_html__('Left','suitbuilder'),
		'section'				=> 'suitbuilder-latest-blog-section',
		'type'					=> 'number',
		'priority'				=> 130,
		'active_callback'		=> 'suitbuilder_padding_desktop_active'
	)
);

// blog title padding top
$suitbuilder_settings_controls['suitbuilder-blog-title-padding-top-mb'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-blog-title-padding-top-mb']
	),
	'control'	=> array(
		'label'					=> esc_html__('Top','suitbuilder'),
		'section'				=> 'suitbuilder-latest-blog-section',
		'type'					=> 'number',
		'priority'				=> 131,
		'active_callback'		=> 'suitbuilder_padding_mb_active'
	)
);

//blog title padding right
$suitbuilder_settings_controls['suitbuilder-blog-title-padding-right-mb'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-blog-title-padding-right-mb']
	),
	'control'	=> array(
		'label'					=> esc_html__('Right','suitbuilder'),
		'section'				=> 'suitbuilder-latest-blog-section',
		'type'					=> 'number',
		'priority'				=> 132,
		'active_callback'		=> 'suitbuilder_padding_mb_active'
	)
);

// blog title padding bottom
$suitbuilder_settings_controls['suitbuilder-blog-title-padding-bottom-mb'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-blog-title-padding-bottom-mb']
	),
	'control'	=> array(
		'label'					=> esc_html__('Bottom','suitbuilder'),
		'section'				=> 'suitbuilder-latest-blog-section',
		'type'					=> 'number',
		'priority'				=> 133,
		'active_callback'		=> 'suitbuilder_padding_mb_active'
	)
);

// blog title padding left
$suitbuilder_settings_controls['suitbuilder-blog-title-padding-left-mb'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-blog-title-padding-left-mb']
	),
	'control'	=> array(
		'label'					=> esc_html__('Left','suitbuilder'),
		'section'				=> 'suitbuilder-latest-blog-section',
		'type'					=> 'number',
		'priority'				=> 134,
		'active_callback'		=> 'suitbuilder_padding_mb_active'
	)
);

//Title  margin
$suitbuilder_settings_controls['suitbuilder-blog-title-margin'] = array(
    'setting' =>     array(
        'default'       => '',
    ),
    'control' => array(
        'description'                 => sprintf( '<div class="blog-padding"> %1$s </div>', esc_html__( 'Blog Post Title margin (PX)', 'suitbuilder' ) ),
        'section'               => 'suitbuilder-latest-blog-section',
        'type'                  => 'text',
        'input_attrs'           => array('class'=> "hidden"),
        'priority'              => 135,
        'active_callback'       => ''
    )
);

//margin icon 
$suitbuilder_settings_controls['suitbuilder-blog-margin-icon'] =  array(
    'setting'   => array(
        'default'               => $suitbuilder_defaults['suitbuilder-blog-margin-icon'],
		'transport'     => 'refresh'
    ),
    'control'   => array(
        'section'               => 'suitbuilder-latest-blog-section',
        'type'                  => 'radio_image',
        'choices'   => array(
            'margin-desktop'           => get_template_directory_uri() .'/assets/image/desktop.png',
            'margin-mobile'            => get_template_directory_uri() .'/assets/image/phone.png',
        ),
        'priority'              => 136,
        'active_callback'       => ''
    )

);

// blog title margin top
$suitbuilder_settings_controls['suitbuilder-blog-title-margin-top'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-blog-title-margin-top']
	),
	'control'	=> array(
		'label'					=> esc_html__('Top','suitbuilder'),
		'section'				=> 'suitbuilder-latest-blog-section',
		'type'					=> 'number',
		'priority'				=> 140,
		'active_callback'		=> 'suitbuilder_margin_desktop_active'
	)
);

//blog title margin right
$suitbuilder_settings_controls['suitbuilder-blog-title-margin-right'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-blog-title-margin-right']
	),
	'control'	=> array(
		'label'					=> esc_html__('Right','suitbuilder'),
		'section'				=> 'suitbuilder-latest-blog-section',
		'type'					=> 'number',
		'priority'				=> 150,
		'active_callback'		=> 'suitbuilder_margin_desktop_active'
	)
);

// blog title margin bottom
$suitbuilder_settings_controls['suitbuilder-blog-title-margin-bottom'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-blog-title-margin-bottom']
	),
	'control'	=> array(
		'label'					=> esc_html__('Bottom','suitbuilder'),
		'section'				=> 'suitbuilder-latest-blog-section',
		'type'					=> 'number',
		'priority'				=> 160,
		'active_callback'		=> 'suitbuilder_margin_desktop_active'
	)
);

// blog title margin left
$suitbuilder_settings_controls['suitbuilder-blog-title-margin-left'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-blog-title-margin-left']
	),
	'control'	=> array(
		'label'					=> esc_html__('Left','suitbuilder'),
		'section'				=> 'suitbuilder-latest-blog-section',
		'type'					=> 'number',
		'priority'				=> 170,
		'active_callback'		=> 'suitbuilder_margin_desktop_active'
	)
);

// blog title margin top
$suitbuilder_settings_controls['suitbuilder-blog-title-margin-top-mb'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-blog-title-margin-top-mb']
	),
	'control'	=> array(
		'label'					=> esc_html__('Top','suitbuilder'),
		'section'				=> 'suitbuilder-latest-blog-section',
		'type'					=> 'number',
		'priority'				=> 171,
		'active_callback'		=> 'suitbuilder_margin_mobile_active'
	)
);

//blog title margin right
$suitbuilder_settings_controls['suitbuilder-blog-title-margin-right-mb'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-blog-title-margin-right-mb']
	),
	'control'	=> array(
		'label'					=> esc_html__('Right','suitbuilder'),
		'section'				=> 'suitbuilder-latest-blog-section',
		'type'					=> 'number',
		'priority'				=> 172,
		'active_callback'		=> 'suitbuilder_margin_mobile_active'
	)
);

// blog title margin bottom
$suitbuilder_settings_controls['suitbuilder-blog-title-margin-bottom-mb'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-blog-title-margin-bottom-mb']
	),
	'control'	=> array(
		'label'					=> esc_html__('Bottom','suitbuilder'),
		'section'				=> 'suitbuilder-latest-blog-section',
		'type'					=> 'number',
		'priority'				=> 173,
		'active_callback'		=> 'suitbuilder_margin_mobile_active'
	)
);

// blog title margin left
$suitbuilder_settings_controls['suitbuilder-blog-title-margin-left-mb'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-blog-title-margin-left-mb']
	),
	'control'	=> array(
		'label'					=> esc_html__('Left','suitbuilder'),
		'section'				=> 'suitbuilder-latest-blog-section',
		'type'					=> 'number',
		'priority'				=> 174,
		'active_callback'		=> 'suitbuilder_margin_mobile_active'
	)
);


// Blog title line height
$suitbuilder_settings_controls['suitbuilder-blog-title-line-height'] = array(
	'setting'	=> array(
		'default'				=> $suitbuilder_defaults['suitbuilder-blog-title-line-height']
	),
	'control'	=> array(
		'label'					=> esc_html__('Blog Title Line Height','suitbuilder'),
		'section'				=> 'suitbuilder-latest-blog-section',
		'type'					=> 'number',
		'priority'				=> 175,
		'active_callback'		=> ''
	)
);


//Blog Content options
$suitbuilder_settings_controls['suitbuilder-blog-content-options'] = array(
    'setting' =>     array(
        'default'       => '',
    ),
    'control' => array(
    	'description'			=> sprintf( '<div class="bg-white"> %1$s </div>', esc_html__( 'Content Options', 'suitbuilder' ) ),
        'section'               => 'suitbuilder-latest-blog-section',
        'type'                  => 'text',
        'input_attrs'           => array('class'=> "hidden"),
        'priority'              => 177,
        'active_callback'       => ''
    )
);

//create a setting controls checkbox for post excerpt
$suitbuilder_settings_controls['suitbuilder-latest-blog-enable-excerpt'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-latest-blog-enable-excerpt']
	),
	'control'	=> array(
		'label'				=> esc_html__('Show Excerpt/content','suitbuilder'),
		'section'			=> 'suitbuilder-latest-blog-section',
		'type'				=> 'checkbox',
		'priority'			=> 180,
		'active_callback'	=> ''	
	)	
);

//create a setting controls title color
$suitbuilder_settings_controls['suitbuilder-blog-section-content-color'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-blog-section-content-color']	
	),
	'control'	=> array(
		'label'				=> esc_html__('Content Color','suitbuilder'),
		'section'			=> 'suitbuilder-latest-blog-section',
		'type'				=> 'color',
		'priority'			=> 190,
		'active_callback'	=> ''
	)
);

//Blog enable/disable
$suitbuilder_settings_controls['suitbuilder-blog-enable-disable-options'] = array(
    'setting' =>     array(
        'default'       => '',
    ),
    'control' => array(
    	'description'			=> sprintf( '<div class="bg-white"> %1$s </div>', esc_html__( 'Enable/Disable Options', 'suitbuilder' ) ),
        'section'               => 'suitbuilder-latest-blog-section',
        'type'                  => 'text',
        'input_attrs'           => array('class'=> "hidden"),
        'priority'              => 195,
        'active_callback'       => ''
    )
);

//cretae a setting control checkbox for feature image
$suitbuilder_settings_controls['suitbuilder-latest-blog-enable-image'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-latest-blog-enable-image']
	),
	'control'	=> array(
		'label'				=> esc_html__('Show Image','suitbuilder'),
		'section'			=> 'suitbuilder-latest-blog-section',
		'type'				=> 'checkbox',
		'priority'			=> 200,
		'active_callback'	=> ''
	)
);


//create a setting controls checkbox for post date
$suitbuilder_settings_controls['suitbuilder-latest-blog-enable-date-author-cat'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-latest-blog-enable-date-author-cat']
	),
	'control'	=> array(
		'label'				=> esc_html__('Show Date/Author/Category','suitbuilder'),
		'section'			=> 'suitbuilder-latest-blog-section',
		'type'				=> 'checkbox',
		'priority'			=> 210,
		'active_callback'	=> ''
	)	
);

//create a setting controls checkbox for button
$suitbuilder_settings_controls['suitbuilder-latest-blog-enable-button'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-latest-blog-enable-button']	
	),
	'control'	=> array(
		'label'				=> esc_html__('Show Button','suitbuilder'),
		'section'			=> 'suitbuilder-latest-blog-section',
		'type'				=> 'checkbox',
		'priority'			=> 220,
		'active_callback'	=> ''
	)
);

//Blog Advance options
$suitbuilder_settings_controls['suitbuilder-blog-advance-options'] = array(
    'setting' =>     array(
        'default'       => '',
    ),
    'control' => array(
    	'description'			=> sprintf( '<div class="bg-white"> %1$s </div>', esc_html__( 'Advance Options', 'suitbuilder' ) ),
        'section'               => 'suitbuilder-latest-blog-section',
        'type'                  => 'text',
        'input_attrs'           => array('class'=> "hidden"),
        'priority'              => 225,
        'active_callback'       => ''
    )
);



//create a setting controls for latest blog layout
$suitbuilder_settings_controls['suitbuilder-latest-blog-layout'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-latest-blog-layout']
	),
	'control'	=> array(
		'label'				=> esc_html__('Blog Layout','suitbuilder'),
		'section'			=> 'suitbuilder-latest-blog-section',
		'type'				=> 'radio',
		'choices' => array(
			'blog-list'		=> esc_html__('List','suitbuilder'),
			'blog-grid'		=> esc_html__('Grid','suitbuilder'),
		),
		'priority'			=> 230,
		'active_callback'	=> ''
	)

);


//setting cotroll for post content layout
$suitbuilder_settings_controls['suitbuilder-archive-blog-order'] =  array(
    'setting'   => array(
        'default'               => $suitbuilder_defaults['suitbuilder-archive-blog-order']
    ),
    'control'   => array(
        'label'                 => esc_html__('Post Content Order','suitbuilder'),
        'section'               => 'suitbuilder-latest-blog-section',
        'type'                  => 'select',
        'choices'   => array(
            'blog-title-img-content'           => esc_html__('Title-Image-Content','suitbuilder'),
            'blog-img-title-content'           => esc_html__('Image-Title-Content','suitbuilder'),
            'blog-content-img-title'           => esc_html__('Content-Image-Title','suitbuilder'),
        ),
        'priority'              => 240,
        'active_callback'       => ''
    )

);

//create a setting controls pagination
$suitbuilder_settings_controls['suitbuilder-latest-blog-pagination'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-latest-blog-pagination']
	),
	'control'	=> array(
		'label'				=> esc_html__('Pagination','suitbuilder'),
		'description'		=> esc_html__('It will only change the latest blog pagination','suitbuilder'),
		'section'			=> 'suitbuilder-latest-blog-section',
		'type'				=> 'select',
		'choices'	=> array(
			'numeric'	=> esc_html__('Numeric','suitbuilder'),
			'default'	=> esc_html__('Default(Older Post/Newer Post)','suitbuilder')
		),
		'priority'			=> 260,
		'active_callback'	=> ''			
	)
);

//Select reset options
$suitbuilder_settings_controls['suitbuilder-blog-reset-field'] = array(
    'setting' =>     array(
        'default'       => '',
    ),
    'control' => array(
    	'description'			=> sprintf( '<div class="bg-white"> %1$s </div>', esc_html__( 'Reset', 'suitbuilder' ) ),
        'section'               => 'suitbuilder-latest-blog-section',
        'type'                  => 'text',
        'input_attrs'           => array('class'=> "hidden"),
        'priority'              => 270,
        'active_callback'       => ''
    )
);

//latest blog reset option
$suitbuilder_settings_controls['suitbuilder-blog-reset-option'] = array(
	'setting'	=> array(
		'default'			=> $suitbuilder_defaults['suitbuilder-blog-reset-option']
	),
	'control'	=> array(
		'label'				=> esc_html__('Reset','suitbuilder'),
		'description'		=> esc_html__('Caution: This will reset latest blog options to default. Publish the changes and Refresh the page to view the changes.','suitbuilder'),
		'section'			=> 'suitbuilder-latest-blog-section',
		'type'				=> 'checkbox',
		'priority'			=> 300,
		'active_callback'	=> ''	
	)

);

//**==================== reset latest blog options ============================== */
if( !function_exists( 'suitbuilder_latest_blog_reset' ) ) :
	/**
	* suitbuilder inner header reset
	*
	* @since suitbuilder 1.0.0
	* @param null

	*/
	function suitbuilder_latest_blog_reset(){
		global $suitbuilder_customizer_saved_values;

		$suitbuilder_customizer_saved_values = suitbuilder_get_all_options();

		if( 1 == intval( $suitbuilder_customizer_saved_values['suitbuilder-blog-reset-option'] ) ){
			global $suitbuilder_defaults;

			$suitbuilder_customizer_saved_values['suitbuilder-latest-blog-excerpt-lenght'] 			= $suitbuilder_defaults['suitbuilder-latest-blog-excerpt-lenght'];
			$suitbuilder_customizer_saved_values['suitbuilder-latest-blog-number-post'] 				= $suitbuilder_defaults['suitbuilder-latest-blog-number-post'];
			$suitbuilder_customizer_saved_values['suitbuilder-latest-blog-enable-image'] 				= $suitbuilder_defaults['suitbuilder-latest-blog-enable-image'];
			$suitbuilder_customizer_saved_values['suitbuilder-latest-blog-enable-title'] 				= $suitbuilder_defaults['suitbuilder-latest-blog-enable-title'];
			$suitbuilder_customizer_saved_values['suitbuilder-latest-blog-enable-excerpt'] 			= $suitbuilder_defaults['suitbuilder-latest-blog-enable-excerpt'];
			$suitbuilder_customizer_saved_values['suitbuilder-latest-blog-enable-date-author-cat'] 	= $suitbuilder_defaults['suitbuilder-latest-blog-enable-date-author-cat'];
			$suitbuilder_customizer_saved_values['suitbuilder-latest-blog-enable-button'] 			= $suitbuilder_defaults['suitbuilder-latest-blog-enable-button'];
			$suitbuilder_customizer_saved_values['suitbuilder-latest-blog-button-text'] 				= $suitbuilder_defaults['suitbuilder-latest-blog-button-text'];
			$suitbuilder_customizer_saved_values['suitbuilder-archive-blog-order'] 					= $suitbuilder_defaults['suitbuilder-archive-blog-order'];
			$suitbuilder_customizer_saved_values['suitbuilder-latest-blog-pagination'] 				= $suitbuilder_defaults['suitbuilder-latest-blog-pagination'];
			$suitbuilder_customizer_saved_values['suitbuilder-latest-blog-layout'] 					= $suitbuilder_defaults['suitbuilder-latest-blog-layout'];
			$suitbuilder_customizer_saved_values['suitbuilder-blog-title-transform'] 					= $suitbuilder_defaults['suitbuilder-blog-title-transform'];
			$suitbuilder_customizer_saved_values['suitbuilder-blog-title-font-size'] 					= $suitbuilder_defaults['suitbuilder-blog-title-font-size'];
			$suitbuilder_customizer_saved_values['suitbuilder-blog-title-font-weight'] 				= $suitbuilder_defaults['suitbuilder-blog-title-font-weight'];
			$suitbuilder_customizer_saved_values['suitbuilder-blog-section-bg-color'] 				= $suitbuilder_defaults['suitbuilder-blog-section-bg-color'];
			$suitbuilder_customizer_saved_values['suitbuilder-blog-section-content-color'] 			= $suitbuilder_defaults['suitbuilder-blog-section-content-color'];
			$suitbuilder_customizer_saved_values['suitbuilder-blog-section-title-color'] 				= $suitbuilder_defaults['suitbuilder-blog-section-title-color'];
;


			$suitbuilder_customizer_saved_values['suitbuilder-blog-reset-option'] 					= '';

			//reset header optins
			suitbuilder_reset_options($suitbuilder_customizer_saved_values);

		}else{
			return null;
		}

	}
endif;
add_action( 'customize_save_after','suitbuilder_latest_blog_reset' );

//** ===================== blog padding mobile active callback ======= */
if( !function_exists('suitbuilder_padding_mb_active') ) :
    /**
    * mobile device options active
    * 
    * @since suitbuilder 1.0.0
    *
    * @param null
    * @return boolean
    */
    
     function suitbuilder_padding_mb_active(  ){
        global $suitbuilder_customizer_all_values;
        $mobile_device = $suitbuilder_customizer_all_values['suitbuilder-blog-padding-icon'];
        
        if( 'padding-mobile' == $mobile_device ){
            return true;
        }else{
            return false;
        }  
    }
endif;

//** ===================== blog padding mobile active callback ======= */
if( !function_exists('suitbuilder_padding_desktop_active') ) :
    /**
    * mobile device options active
    * 
    * @since suitbuilder 1.0.0
    *
    * @param null
    * @return boolean
    */
    
     function suitbuilder_padding_desktop_active(  ){
        global $suitbuilder_customizer_all_values;
        $desktop_device = $suitbuilder_customizer_all_values['suitbuilder-blog-padding-icon'];
        
        if( 'padding-desktop' == $desktop_device ){
            return true;
        }else{
            return false;
        }  
    }
endif;

//** ===================== blog padding mobile active callback ======= */
if( !function_exists('suitbuilder_padding_mb_active') ) :
    /**
    * mobile device options active
    * 
    * @since suitbuilder 1.0.0
    *
    * @param null
    * @return boolean
    */
    
     function suitbuilder_padding_mb_active(  ){
        global $suitbuilder_customizer_all_values;
        $margin_mobile_device = $suitbuilder_customizer_all_values['suitbuilder-blog-padding-icon'];
        
        if( 'margin-mobile' == $margin_mobile_device ){
            return true;
        }else{
            return false;
        }  
    }
endif;

//** ===================== blog margin mobile active callback ======= */
if( !function_exists('suitbuilder_margin_desktop_active') ) :
    /**
    * mobile device options active
    * 
    * @since suitbuilder 1.0.0
    *
    * @param null
    * @return boolean
    */
    
     function suitbuilder_margin_desktop_active(  ){
        global $suitbuilder_customizer_all_values;
        $margin_desktop_device = $suitbuilder_customizer_all_values['suitbuilder-blog-margin-icon'];
        
        if( 'margin-desktop' == $margin_desktop_device ){
            return true;
        }else{
            return false;
        }  
    }
endif;

//** ===================== blog margin mobile active callback ======= */
if( !function_exists('suitbuilder_margin_mobile_active') ) :
    /**
    * mobile device options active
    * 
    * @since suitbuilder 1.0.0
    *
    * @param null
    * @return boolean
    */
    
     function suitbuilder_margin_mobile_active(  ){
        global $suitbuilder_customizer_all_values;
        $margin_mobile_device = $suitbuilder_customizer_all_values['suitbuilder-blog-margin-icon'];
        
        if( 'margin-mobile' == $margin_mobile_device ){
            return true;
        }else{
            return false;
        }  
    }
endif;