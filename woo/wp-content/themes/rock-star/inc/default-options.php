<?php
/**
 * Implement Default Theme/Customizer Options
 *
 * @package Catch Themes
 * @subpackage Rock Star
 * @since Rock Star 0.3
 */


/**
 * Returns the default options for Rock Star.
 *
 * @since Rock Star 0.3
 */
function rock_star_get_default_theme_options() {
	$options = array(
		//Site Title an Tagline
		'move_title_tagline'                           => 0,

		//Layout
		'theme_layout'                                 => 'no-sidebar-full-width',
		'single_page_post_layout'                      => 'right-sidebar',
		'content_layout'                               => 'excerpt-image-top',
		'single_post_image_size'                       => 'disabled',

		//Header Image
		'enable_featured_header_image'                 => 'exclude-home',
		'featured_image_size'                          => 'full',
		'featured_header_image_url'                    => '',
		'featured_header_image_alt'                    => '',
		'featured_header_image_base'                   => 0,

		//Breadcrumb Options
		'breadcrumb_option'                            => 0,
		'$breadcrumb_on_homepage'                      => 0,
		'breadcrumb_seperator'                         => '&raquo;',

		//Custom CSS
		'custom_css'                                   => '',

		//Scrollup Options
		'disable_scrollup'                             => 0,

		//Header Right Sidebar Options
		'disable_header_right_sidebar'                 => 0,

		//Excerpt Options
		'excerpt_length'                               => '45',
		'excerpt_more_text'                            => esc_html__( 'Read More ...', 'rock-star' ),

		//Homepage / Frontpage Settings
		'front_page_category'                          => '0',

		//Pagination Options
		'pagination_type'                              => 'default',

		//Search Options
		'search_text'                                  => esc_html__( 'Search...', 'rock-star' ),

		//Colors Options
		'color_scheme'                                 => 'dark',
		'background_color'                             => '#000000',
		'header_textcolor'                             => '#ffffff',

		//Featured Content Options
		'featured_content_option'                      => 'disabled',
		'featured_content_layout'                      => 'three-columns',
		'featured_content_position'                    => 1,
		'featured_content_headline'                    => '',
		'featured_content_subheadline'                 => '',
		'featured_content_type'                        => 'demo-featured-content',
		'featured_content_number'                      => '3',
		'featured_content_show'                        => 'excerpt',

		'featured_content_background_image'            => trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'images/gallery/background-dark-1920x1080.jpg',
		'featured_content_background_display_position' => 'bottom',
		'featured_content_background_repeat'           => 'repeat',
		'featured_content_background_attachment'       => 'fixed',

		//News Ticker Options
		'news_ticker_option'                           => 'disabled',
		'news_ticker_position'                         => 'below-slider-header-image',
		'news_ticker_type'                             => 'demo-news-ticker',
		'news_ticker_label'                            => '',
		'news_ticker_transition_effect'                => 'flipVert',
		'news_ticker_number'                           => '4',
		'news_ticker_show'                             => 0,

		//Featured Slider Options
		'featured_slider_option'                       => 'disabled',
		'featured_slider_image_loader'                 => 'true',
		'featured_slider_enable_social_icons'          => 0,
		'featured_slide_transition_effect'             => 'fadeout',
		'featured_slide_transition_delay'              => '4',
		'featured_slide_transition_length'             => '1',
		'featured_slider_type'                         => 'demo-featured-slider',
		'featured_slide_number'                        => '4',

		//Reset all settings
		'reset_all_settings'                           => 0,
	);

	return apply_filters( 'rock_star_default_theme_options', $options );
}

/**
 * Returns an array of layout options registered for Rock Star.
 *
 * @since Rock Star 0.3
 */
function rock_star_layouts() {
	$layout_options = array(
		'left-sidebar'          => esc_html__( 'Primary Sidebar, Content', 'rock-star' ),
		'right-sidebar'         => esc_html__( 'Content, Primary Sidebar', 'rock-star' ),
		'no-sidebar-full-width' => esc_html__( 'No Sidebar ( Full Width )', 'rock-star' ),
	);
	return apply_filters( 'rock_star_layouts', $layout_options );
}


/**
 * Returns an array of content layout options registered for Rock Star.
 *
 * @since Rock Star 0.3
 */
function rock_star_get_archive_content_layout() {
	$layout_options = array(
		'excerpt-image-top' => esc_html__( 'Excerpt Image Top', 'rock-star' ),
		'full-content'      => esc_html__( 'Show Full Content (No Featured Image)', 'rock-star' ),
	);

	return apply_filters( 'rock_star_get_archive_content_layout', $layout_options );
}


/**
 * Returns an array of feature header enable options
 *
 * @since Rock Star 0.3
 */
function rock_star_enable_featured_header_image_options() {
	$enable_featured_header_image_options = array(
		'homepage'               => esc_html__( 'Homepage / Frontpage', 'rock-star' ),
		'exclude-home'           => esc_html__( 'Excluding Homepage', 'rock-star' ),
		'exclude-home-page-post' => esc_html__( 'Excluding Homepage, Page/Post Featured Image', 'rock-star' ),
		'entire-site'            => esc_html__( 'Entire Site', 'rock-star' ),
		'entire-site-page-post'  => esc_html__( 'Entire Site, Page/Post Featured Image', 'rock-star' ),
		'pages-posts'            => esc_html__( 'Pages and Posts', 'rock-star' ),
		'disabled'               => esc_html__( 'Disabled', 'rock-star' ),
	);

	return apply_filters( 'rock_star_enable_featured_header_image_options', $enable_featured_header_image_options );
}


/**
 * Returns an array of feature image size
 *
 * @since Rock Star 0.3
 */
function rock_star_featured_image_size_options() {
	$featured_image_size_options = array(
		'full'   => esc_html__( 'Full Image', 'rock-star' ),
		'large'  => esc_html__( 'Large Image', 'rock-star' ),
		'slider' => esc_html__( 'Slider Image', 'rock-star' ),
	);

	return apply_filters( 'rock_star_featured_image_size_options', $featured_image_size_options );
}


/**
 * Returns an array of content and slider layout options registered for Rock Star.
 *
 * @since Rock Star 0.3
 */
function rock_star_featured_slider_content_options() {
	$featured_slider_content_options = array(
		'homepage' 		=> esc_html__( 'Homepage / Frontpage', 'rock-star' ),
		'entire-site' 	=> esc_html__( 'Entire Site', 'rock-star' ),
		'disabled'		=> esc_html__( 'Disabled', 'rock-star' ),
	);

	return apply_filters( 'rock_star_featured_slider_content_options', $featured_slider_content_options );
}


/**
 * Returns an array of news ticker types registered for Rock Star.
 *
 * @since Rock Star 0.3
 */
function rock_star_news_ticker_types() {
	$options = array(
		'demo-news-ticker' => esc_html__( 'Demo', 'rock-star' ),
		'page-news-ticker' => esc_html__( 'Page', 'rock-star' ),
	);

	return apply_filters( 'rock_star_news_ticker_types', $options );
}


/**
 * Returns an array of news ticker positions registered for Rock Star.
 *
 * @since Rock Star 0.3
 */
function rock_star_news_ticker_positions() {
	$options = array(
		'below-menu'    => esc_html__( 'Below Slider / Header Image', 'rock-star' ),
		'above-content' => esc_html__( 'Above Content', 'rock-star' ),
	);

	return apply_filters( 'rock_star_news_ticker_positions', $options );
}


/**
 * Returns an array of feature content types registered for Rock Star.
 *
 * @since Rock Star 0.3
 */
function rock_star_featured_content_types() {
	$featured_content_types = array(
		'demo-featured-content' => esc_html__( 'Demo', 'rock-star' ),
		'featured-page-content' => esc_html__( 'Page', 'rock-star' ),
	);

	return apply_filters( 'rock_star_featured_content_types', $featured_content_types );
}


/**
 * Returns an array of featured content options registered for Rock Star.
 *
 * @since Rock Star 0.3
 */
function rock_star_featured_content_layout_options() {
	$options = array(
		'one-column'    => esc_html__( '1 column', 'rock-star' ),
		'two-columns'   => esc_html__( '2 columns', 'rock-star' ),
		'three-columns' => esc_html__( '3 columns', 'rock-star' ),
		'four-columns'  => esc_html__( '4 columns', 'rock-star' ),
		'five-columns'  => esc_html__( '5 columns', 'rock-star' ),
	);

	return apply_filters( 'rock_star_featured_content_layout_options', $options );
}


/**
 * Returns an array of featured content show registered for Rock Star.
 *
 * @since Rock Star 0.3
 */
function rock_star_featured_content_show() {
	$featured_content_show_option = array(
		'excerpt' 		=> esc_html__( 'Show Excerpt', 'rock-star' ),
		'full-content' 	=> esc_html__( 'Show Full Content', 'rock-star' ),
		'hide-content' 	=> esc_html__( 'Hide Content', 'rock-star' ),
	);

	return apply_filters( 'rock_star_featured_content_show', $featured_content_show_option );
}


/**
 * Returns an array of featured content background image positions
 *
 * @since Rock Star 0.3
 */
function rock_star_featured_content_background_display_positions() {
	$options = array(
		'top'    => esc_html__( 'Top', 'rock-star' ),
		'bottom' => esc_html__( 'Bottom', 'rock-star' ),
	);
	return apply_filters( 'rock_star_featured_content_background_display_positions', $options );
}


/**
 * Returns an array of featured content background repeat options
 *
 * @since Rock Star 0.3
 */
function rock_star_featured_content_background_repeat_options() {
	 $options = array(
		'no-repeat' => esc_html__( 'No repeat', 'rock-star' ),
		'tile'      => esc_html__( 'Tile', 'rock-star' ),
	);
	return apply_filters( 'rock_star_featured_content_background_repeat_options', $options );
}


/**
 * Returns an array of featured content background attachment options
 *
 * @since Rock Star 0.3
 */
function rock_star_featured_content_background_attachment_options() {
	$options = array(
		'scroll' => esc_html__( 'Scroll', 'rock-star' ),
		'fixed'  => esc_html__( 'Fixed', 'rock-star' ),
	);
	return apply_filters( 'rock_star_featured_content_background_attachment_options', $options );
}


/**
 * Returns an array of feature slider types registered for Rock Star.
 *
 * @since Rock Star 0.3
 */
function rock_star_featured_slider_types() {
	$options = array(
		'demo-featured-slider' => esc_html__( 'Demo', 'rock-star' ),
		'featured-page-slider' => esc_html__( 'Page', 'rock-star' ),
	);

	return apply_filters( 'rock_star_featured_slider_types', $options );
}


/**
 * Returns an array of feature slider transition effects
 *
 * @since Rock Star 0.3
 */
function rock_star_featured_slide_transition_effects() {
	$options = array(
		'fade' 		=> esc_html__( 'Fade', 'rock-star' ),
		'fadeout' 	=> esc_html__( 'Fade Out', 'rock-star' ),
		'none' 		=> esc_html__( 'None', 'rock-star' ),
		'scrollHorz'=> esc_html__( 'Scroll Horizontal', 'rock-star' ),
		'scrollVert'=> esc_html__( 'Scroll Vertical', 'rock-star' ),
		'flipHorz'	=> esc_html__( 'Flip Horizontal', 'rock-star' ),
		'flipVert'	=> esc_html__( 'Flip Vertical', 'rock-star' ),
		'tileSlide'	=> esc_html__( 'Tile Slide', 'rock-star' ),
		'tileBlind'	=> esc_html__( 'Tile Blind', 'rock-star' ),
		'shuffle'	=> esc_html__( 'Shuffle', 'rock-star' ),
	);

	return apply_filters( 'rock_star_featured_slide_transition_effects', $options );
}

/**
 * Returns an array of featured slider image loader options
 *
 * @since Rock Star 0.3
 */
function rock_star_featured_slider_image_loader() {
	$options = array(
		'true'  => esc_html__( 'True', 'rock-star' ),
		'wait'  => esc_html__( 'Wait', 'rock-star' ),
		'false' => esc_html__( 'False', 'rock-star' ),
	);

	return apply_filters( 'rock_star_featured_slider_image_loader', $options );
}


/**
 * Returns an array of pagination types registered for Rock Star.
 *
 * @since Rock Star 0.3
 */
function rock_star_get_pagination_types() {
	$options = array(
		'default'                => esc_html__( 'Default(Older Posts/Newer Posts)', 'rock-star' ),
		'numeric'                => esc_html__( 'Numeric', 'rock-star' ),
		'infinite-scroll-click'  => esc_html__( 'Infinite Scroll (Click)', 'rock-star' ),
		'infinite-scroll-scroll' => esc_html__( 'Infinite Scroll (Scroll)', 'rock-star' ),
	);

	return apply_filters( 'rock_star_get_pagination_types', $options );
}


/**
 * Returns an array of content featured image size.
 *
 * @since Rock Star 0.3
 */
function rock_star_single_post_image_size_options() {
	$options = array(
		'large'             => esc_html__( 'Large', 'rock-star' ),
		'full-size'         => esc_html__( 'Full size', 'rock-star' ),
		'slider-image-size' => esc_html__( 'Slider Image Size', 'rock-star' ),
		'featured'          => esc_html__( 'Featured Image Size', 'rock-star' ),
		'disabled'          => esc_html__( 'Disabled', 'rock-star' ),
	);
	return apply_filters( 'rock_star_single_post_image_size_options', $options );
}


/**
 * Returns list of social icons currently supported
 *
 * @since Rock Star 0.3
*/
function rock_star_get_social_icons_list() {
	$options = array(
		'facebook_link'		=> array(
			'genericon_class' 	=> 'facebook-alt',
			'label' 			=> esc_html__( 'Facebook', 'rock-star' )
			),
		'twitter_link'		=> array(
			'genericon_class' 	=> 'twitter',
			'label' 			=> esc_html__( 'Twitter', 'rock-star' )
			),
		'googleplus_link'	=> array(
			'genericon_class' 	=> 'googleplus',
			'label' 			=> esc_html__( 'Googleplus', 'rock-star' )
			),
		'email_link'		=> array(
			'genericon_class' 	=> 'mail',
			'label' 			=> esc_html__( 'Email', 'rock-star' )
			),
		'feed_link'			=> array(
			'genericon_class' 	=> 'feed',
			'label' 			=> esc_html__( 'Feed', 'rock-star' )
			),
		'wordpress_link'	=> array(
			'genericon_class' 	=> 'wordpress',
			'label' 			=> esc_html__( 'WordPress', 'rock-star' )
			),
		'github_link'		=> array(
			'genericon_class' 	=> 'github',
			'label' 			=> esc_html__( 'GitHub', 'rock-star' )
			),
		'linkedin_link'		=> array(
			'genericon_class' 	=> 'linkedin',
			'label' 			=> esc_html__( 'LinkedIn', 'rock-star' )
			),
		'pinterest_link'	=> array(
			'genericon_class' 	=> 'pinterest',
			'label' 			=> esc_html__( 'Pinterest', 'rock-star' )
			),
		'flickr_link'		=> array(
			'genericon_class' 	=> 'flickr',
			'label' 			=> esc_html__( 'Flickr', 'rock-star' )
			),
		'vimeo_link'		=> array(
			'genericon_class' 	=> 'vimeo',
			'label' 			=> esc_html__( 'Vimeo', 'rock-star' )
			),
		'youtube_link'		=> array(
			'genericon_class' 	=> 'youtube',
			'label' 			=> esc_html__( 'YouTube', 'rock-star' )
			),
		'tumblr_link'		=> array(
			'genericon_class' 	=> 'tumblr',
			'label' 			=> esc_html__( 'Tumblr', 'rock-star' )
			),
		'instagram_link'	=> array(
			'genericon_class' 	=> 'instagram',
			'label' 			=> esc_html__( 'Instagram', 'rock-star' )
			),
		'polldaddy_link'	=> array(
			'genericon_class' 	=> 'polldaddy',
			'label' 			=> esc_html__( 'PollDaddy', 'rock-star' )
			),
		'codepen_link'		=> array(
			'genericon_class' 	=> 'codepen',
			'label' 			=> esc_html__( 'CodePen', 'rock-star' )
			),
		'path_link'			=> array(
			'genericon_class' 	=> 'path',
			'label' 			=> esc_html__( 'Path', 'rock-star' )
			),
		'dribbble_link'		=> array(
			'genericon_class' 	=> 'dribbble',
			'label' 			=> esc_html__( 'Dribbble', 'rock-star' )
			),
		'skype_link'		=> array(
			'genericon_class' 	=> 'skype',
			'label' 			=> esc_html__( 'Skype', 'rock-star' )
			),
		'digg_link'			=> array(
			'genericon_class' 	=> 'digg',
			'label' 			=> esc_html__( 'Digg', 'rock-star' )
			),
		'reddit_link'		=> array(
			'genericon_class' 	=> 'reddit',
			'label' 			=> esc_html__( 'Reddit', 'rock-star' )
			),
		'stumbleupon_link'	=> array(
			'genericon_class' 	=> 'stumbleupon',
			'label' 			=> esc_html__( 'Stumbleupon', 'rock-star' )
			),
		'pocket_link'		=> array(
			'genericon_class' 	=> 'pocket',
			'label' 			=> esc_html__( 'Pocket', 'rock-star' ),
			),
		'dropbox_link'		=> array(
			'genericon_class' 	=> 'dropbox',
			'label' 			=> esc_html__( 'DropBox', 'rock-star' ),
			),
		'spotify_link'		=> array(
			'genericon_class' 	=> 'spotify',
			'label' 			=> esc_html__( 'Spotify', 'rock-star' ),
			),
		'foursquare_link'	=> array(
			'genericon_class' 	=> 'foursquare',
			'label' 			=> esc_html__( 'Foursquare', 'rock-star' ),
			),
		'twitch_link'		=> array(
			'genericon_class' 	=> 'twitch',
			'label' 			=> esc_html__( 'Twitch', 'rock-star' ),
			),
		'website_link'		=> array(
			'genericon_class' 	=> 'website',
			'label' 			=> esc_html__( 'Website', 'rock-star' ),
			),
		'phone_link'		=> array(
			'genericon_class' 	=> 'phone',
			'label' 			=> esc_html__( 'Phone', 'rock-star' ),
			),
		'handset_link'		=> array(
			'genericon_class' 	=> 'handset',
			'label' 			=> esc_html__( 'Handset', 'rock-star' ),
			),
		'cart_link'			=> array(
			'genericon_class' 	=> 'cart',
			'label' 			=> esc_html__( 'Cart', 'rock-star' ),
			),
		'cloud_link'		=> array(
			'genericon_class' 	=> 'cloud',
			'label' 			=> esc_html__( 'Cloud', 'rock-star' ),
			),
		'link_link'		=> array(
			'genericon_class' 	=> 'link',
			'label' 			=> esc_html__( 'Link', 'rock-star' ),
			),
	);

	return apply_filters( 'rock_star_social_icons_list', $options );
}


/**
 * Returns an array of metabox layout options registered for Rock Star.
 *
 * @since Rock Star 0.3
 */
function rock_star_metabox_layouts() {
	$options = array(
		'default' 	=> array(
			'id' 	=> 'rock-star-layout-option',
			'value' => 'default',
			'label' => esc_html__( 'Default', 'rock-star' ),
		),
		'left-sidebar' 	=> array(
			'id' 	=> 'rock-star-layout-option',
			'value' => 'left-sidebar',
			'label' => esc_html__( 'Primary Sidebar, Content', 'rock-star' ),
		),
		'right-sidebar' => array(
			'id' 	=> 'rock-star-layout-option',
			'value' => 'right-sidebar',
			'label' => esc_html__( 'Content, Primary Sidebar', 'rock-star' ),
		),
		'no-sidebar-full-width' => array(
			'id' 	=> 'rock-star-layout-option',
			'value' => 'no-sidebar-full-width',
			'label' => esc_html__( 'No Sidebar ( Full Width )', 'rock-star' ),
		),
	);
	return apply_filters( 'rock_star_layouts', $options );
}

/**
 * Returns an array of metabox header featured image options registered for Rock Star.
 *
 * @since Rock Star 0.3
 */
function rock_star_metabox_header_featured_image_options() {
	$options = array(
		'default' => array(
			'id'		=> 'rock-star-header-image',
			'value' 	=> 'default',
			'label' 	=> esc_html__( 'Default', 'rock-star' ),
		),
		'enable' => array(
			'id'		=> 'rock-star-header-image',
			'value' 	=> 'enable',
			'label' 	=> esc_html__( 'Enable', 'rock-star' ),
		),
		'disable' => array(
			'id'		=> 'rock-star-header-image',
			'value' 	=> 'disable',
			'label' 	=> esc_html__( 'Disable', 'rock-star' )
		)
	);
	return apply_filters( 'header_featured_image_options', $options );
}


/**
 * Returns an array of metabox featured image options registered for Rock Star.
 *
 * @since Rock Star 0.3
 */
function rock_star_metabox_featured_image_options() {
	$options = array(
		'default' => array(
			'id'		=> 'rock-star-featured-image',
			'value' 	=> 'default',
			'label' 	=> esc_html__( 'Default', 'rock-star' ),
		),
		'featured' => array(
			'id'		=> 'rock-star-featured-image',
			'value' 	=> 'featured',
			'label' 	=> esc_html__( 'Featured Image', 'rock-star' )
		),
		'full' => array(
			'id' => 'rock-star-featured-image',
			'value' => 'full',
			'label' => esc_html__( 'Full Image', 'rock-star' )
		),
		'slider' => array(
			'id' => 'rock-star-featured-image',
			'value' => 'slider',
			'label' => esc_html__( 'Slider Image', 'rock-star' )
		),
		'disable' => array(
			'id' => 'rock-star-featured-image',
			'value' => 'disable',
			'label' => esc_html__( 'Disable Image', 'rock-star' )
		)
	);
	return apply_filters( 'featured_image_options', $options );
}

/**
 * Returns an array of Color Scheme.
 *
 * @since Rock Star 0.3
 */
function rock_star_color_scheme_options() {
	$options = array(
		'light' => esc_html__( 'Light', 'rock-star' ),
		'dark'  => esc_html__( 'Dark', 'rock-star' ),
	);
	return apply_filters( 'color_scheme_options', $options );
}


/**
 * Returns the default options for Rock Star dark theme.
 *
 * @since Rock Star 0.3
 */
function rock_star_default_light_color_options() {
	$options = array(
		'background_color' => '#ffffff',
		'header_textcolor' => '#ffffff',
	);

	return apply_filters( 'rock_star_default_light_color_options', $options );
}
