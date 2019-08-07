<?php
/**
 * Core functions and definitions
 *
 * Sets up the theme
 *
 * The first function, rock_star_initial_setup(), sets up the theme by registering support
 * for various features in WordPress, such as theme support, post thumbnails, navigation menu, and the like.
 *
 * Rock Star functions and definitions
 *
 * @package Catch Themes
 * @subpackage Rock Star
 * @since Rock Star 0.3
 */

if ( ! function_exists( 'rock_star_content_width' ) ) :
	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width
	 */
	function rock_star_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'rock_star_content_width', 840 );
	}
endif;
add_action( 'after_setup_theme', 'rock_star_content_width', 0 );


if ( ! function_exists( 'rock_star_template_redirect' ) ) :
	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet for different value other than the default one
	 *
	 * @global int $content_width
	 */
	function rock_star_template_redirect() {
	    $layout = rock_star_get_theme_layout();

	    if ( 'no-sidebar-full-width' == $layout ) {
			$GLOBALS['content_width'] = 1200;
		}
	}
endif;
add_action( 'template_redirect', 'rock_star_template_redirect' );


if ( ! function_exists( 'rock_star_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which runs
	 * before the init hook. The init hook is too late for some features, such as indicating
	 * support post thumbnails.
	 */
	function rock_star_setup() {
		/**
		 * Get Theme Options Values
		 */
		$options 	= rock_star_get_theme_options();

		/**
		 * Make theme available for translation
		 * Translations can be filed in the /languages/ directory
		 * If you're building a theme based on Rock Star, use a find and replace
		 * to change 'rock-star' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'rock-star', get_template_directory() . '/languages' );

		/**
		 * Add default posts and comments RSS feed links to head
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Enable support for Post Thumbnails on posts and pages
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Add excerpt box in pages
		 */
		add_post_type_support( 'page', 'excerpt' );

		// used in Header Highlight small image, Featured Content, Post Thumbnail( Except Sticky ) Ratio 4:3
		set_post_thumbnail_size( 420, 280, true );

		// Add Rock Star's custom image sizes
		add_image_size( 'rock-star-slider', 1920, 1080, true ); // Used for Featured slider

		//Archive Images for Archive Image Top Ratio 4:3
		add_image_size( 'rock-star-featured', 840, 630, true);

		add_image_size( 'rock-star-landscape', 385, 257, true ); // used in Archive Image Left/Right Ratio 4:3

		//Small Images for Featured posts widget and widgets 90x68
		add_image_size( 'rock-star-small', 90, 68, true );


		/**
		 * This theme uses wp_nav_menu() in one location.
		 */
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'rock-star' ),
		) );

		/**
		 * Enable support for Post Formats
		 */
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

		/**
		 * Setup the WordPress core custom background feature.
		 */
		$default_options = rock_star_get_default_theme_options(); //Get Default Theme Options Values

		/**
		 * Setup the WordPress core custom background feature.
		 */
		$bg_defaults = array(
			'default-repeat'     => 'no-repeat',
			'default-position-x' => 'center',
			'default-attachment' => 'fixed',
		);

		if ( 'dark' == $options['color_scheme'] ) {
			$default_bg_color = rock_star_get_default_theme_options();

			$bg_defaults['default-image'] = trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'images/gallery/background-dark-1920x1080.jpg';
		}
		elseif ( 'light' == $options['color_scheme'] ) {
			$default_bg_color = rock_star_default_light_color_options();

			$bg_defaults['default-image'] = trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'images/gallery/background-light-1920x1080.jpg';

		}

		$bg_defaults['default-color'] = $default_bg_color['background_color'];

		add_theme_support( 'custom-background', apply_filters( 'rock_star_custom_background_args', $bg_defaults ) );

		/**
		 * Setup Editor style
		 */
		add_editor_style( 'css/editor-style.css' );

		/**
		 * Setup title support for theme
		 * Supported from WordPress version 4.1 onwards
		 * More Info: https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Setup Custom Logo Support for theme
		 * Supported from WordPress version 4.5 onwards
		 * More Info: https://make.wordpress.org/core/2016/03/10/custom-logo/
		 */
		add_theme_support( 'custom-logo' );

		/**
		 * Setup Infinite Scroll using JetPack if navigation type is set
		 */
		$pagination_type	= $options['pagination_type'];

		if ( 'infinite-scroll-click' == $pagination_type ) {
			add_theme_support( 'infinite-scroll', array(
				'type'		=> 'click',
				'container' => 'archive-blog-wrapper',
				'wrapper'   => false,
				'footer'    => 'page'
			) );
		}
		elseif ( 'infinite-scroll-scroll' == $pagination_type ) {
			//Override infinite scroll disable scroll option
        	update_option('infinite_scroll', true);

			add_theme_support( 'infinite-scroll', array(
				'type'      => 'scroll',
				'container' => 'archive-blog-wrapper',
				'wrapper'   => false,
				'footer'    => 'page'
			) );
		}
	}
endif; // rock_star_setup
add_action( 'after_setup_theme', 'rock_star_setup' );


/**
 * Enqueue scripts and styles
 *
 * @uses  wp_register_script, wp_enqueue_script, wp_register_style, wp_enqueue_style, wp_localize_script
 * @action wp_enqueue_scripts
 *
 * @since Rock Star 0.3
 */
function rock_star_scripts() {
	$options = rock_star_get_theme_options();

	//For genericons
	wp_register_style( 'genericons', trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'css/genericons/genericons.css', false, '3.4.1' );
	$deps[] = 'genericons';

	wp_enqueue_style( 'rock-star-style', get_stylesheet_uri(), $deps, ROCK_STAR_THEME_VERSION );

	wp_enqueue_style( 'rock-star-fonts', rock_star_fonts_url(), array(), ROCK_STAR_THEME_VERSION );

	/**
	 * Enqueue the styles for the current color scheme for catchbase.
	 */
	if ( 'dark' != $options['color_scheme'] ) {
		wp_enqueue_style( 'rock-star-'. $options['color_scheme'], trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'css/colors/'. $options['color_scheme'] .'.css', array(), null );
	}

	wp_enqueue_script( 'rock-star-navigation', trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'js/navigation.min.js', array(), '20120206', true );

	// Load the html5 shiv.
	wp_enqueue_script( 'rock-star--html5', trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'js/html5.min.js', array(), '3.7.3' );
	wp_script_add_data( 'rock-star-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'rock-star-skip-link-focus-fix', trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'js/skip-link-focus-fix.min.js', array(), '20130115', true );

	/**
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/**
	 * Loads up fit vids
	 */
	wp_enqueue_script( 'jquery-fitvids', trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'js/fitvids.min.js', array( 'jquery' ), '1.1', true );

	/**
	 * Loads up Cycle JS
	 */
	if ( $options['featured_slider_option'] != 'disabled' || $options['news_ticker_option'] != 'disabled' ) {
		wp_register_script( 'jquery-cycle2', trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'js/jquery.cycle/jquery.cycle2.min.js', array( 'jquery' ), '2.1.5', true );

		$transition_effects = array(
			$options['featured_slide_transition_effect'],
			$options['news_ticker_transition_effect']
		);

		/**
		 * Condition checks for additional slider transition plugins
		 */
		// Scroll Vertical transition plugin addition
		if ( in_array( 'scrollVert', $transition_effects ) ){
			wp_enqueue_script( 'jquery-cycle2-scrollVert', trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'js/jquery.cycle/jquery.cycle2.scrollVert.min.js', array( 'jquery-cycle2' ), '20140128', true );
		}

		// Flip transition plugin addition
		if ( in_array( 'flipHorz', $transition_effects ) || in_array( 'flipVert', $transition_effects ) ){
			wp_enqueue_script( 'jquery-cycle2-flip', trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'js/jquery.cycle/jquery.cycle2.flip.min.js', array( 'jquery-cycle2' ), '20140128', true );
		}

		// Shuffle transition plugin addition
		if ( in_array( 'tileSlide', $transition_effects ) || in_array( 'tileBlind', $transition_effects ) ){
			wp_enqueue_script( 'jquery-cycle2-tile', trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'js/jquery.cycle/jquery.cycle2.tile.min.js', array( 'jquery-cycle2' ), '20140128', true );
		}

		// Shuffle transition plugin addition
		if ( in_array( 'shuffle', $transition_effects ) ){
			wp_enqueue_script( 'jquery-cycle2-shuffle', trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'js/jquery.cycle/jquery.cycle2.shuffle.min.js', array( 'jquery-cycle2' ), '20140128 ', true );
		}

		//Load jquery cycle alone if no plugin is required
		if ( !( in_array( 'scrollVert', $transition_effects ) || in_array( 'flipHorz', $transition_effects ) || in_array( 'flipVert', $transition_effects ) || in_array( 'tileSlide', $transition_effects ) || in_array( 'tileBlind', $transition_effects ) || in_array( 'shuffle', $transition_effects ) ) ){
			wp_enqueue_script( 'jquery-cycle2' );
		}
	}

	/**
	 * Loads up Scroll Up script
	 */
	if ( ! $options['disable_scrollup'] ) {
		wp_enqueue_script( 'rock-star-scrollup', trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'js/scrollup.min.js', array( 'jquery' ), '20072014', true  );
	}

	/**
	 * Enqueue custom script for Rock Star.
	 */
	wp_enqueue_script( 'rock-star-custom-scripts', trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'js/custom-scripts.min.js', array( 'jquery' ), null );

	wp_localize_script( 'rock-star-custom-scripts', 'screenReaderText', array(
		'expand'   => __( 'expand child menu', 'rock-star' ),
		'collapse' => __( 'collapse child menu', 'rock-star' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'rock_star_scripts' );


/**
 * Register Google fonts.
 *
 */
function rock_star_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	* supported by Montserrat, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$courgette = _x( 'on', 'Courgette font: on or off', 'rock-star' );

	if ( 'off' !== $courgette ) {
		$fonts_url = '//fonts.googleapis.com/css?family=Courgette';
	}

	return esc_url_raw( $fonts_url );
}


/**
 * Enqueue scripts and styles for Metaboxes
 * @uses wp_register_script, wp_enqueue_script, and  wp_enqueue_style
 *
 * @action admin_print_scripts-post-new, admin_print_scripts-post, admin_print_scripts-page-new, admin_print_scripts-page
 *
 * @since Rock Star 0.3
 */

/**
 * Default Options.
 */
require trailingslashit( get_template_directory() ) . 'inc/default-options.php';

/**
 * Custom Header.
 */
require trailingslashit( get_template_directory() ) . 'inc/custom-header.php';


/**
 * Structure for Rock Star
 */
require trailingslashit( get_template_directory() ) . 'inc/structure.php';


/**
 * Customizer additions.
 */
require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/customizer.php';


/**
 * Custom Menus
 */
require trailingslashit( get_template_directory() ) . 'inc/menus.php';


/**
 * Load Slider file.
 */
require trailingslashit( get_template_directory() ) . 'inc/featured-slider.php';


/**
 * Load Featured Content.
 */
require trailingslashit( get_template_directory() ) . 'inc/featured-content.php';


/**
 * Load News Ticker
 */
require trailingslashit( get_template_directory() ) . 'inc/news-ticker.php';


/**
 * Load Breadcrumb file.
 */
require trailingslashit( get_template_directory() ) . 'inc/breadcrumb.php';


/**
 * Load Widgets and Sidebars
 */
require trailingslashit( get_template_directory() ) . 'inc/widgets/widgets.php';


/**
 * Load Social Icons
 */
require trailingslashit( get_template_directory() ) . 'inc/social-icons.php';


/**
 * Load Metaboxes
 */
require trailingslashit( get_template_directory() ) . 'inc/metabox.php';


/**
 * Returns the options array for Rock Star.
 * @uses  get_theme_mod
 *
 * @since Rock Star 0.3
 */
function rock_star_get_theme_options() {
	$default_options = rock_star_get_default_theme_options();

	return array_merge( $default_options , get_theme_mod( 'rock_star_theme_options', $default_options ) ) ;
}


/**
 * Flush out all transients
 *
 * @uses delete_transient
 *
 * @action customize_save, rock_star_customize_preview (see rock_star_customizer function: rock_star_customize_preview)
 *
 * @since Rock Star 0.3
 */
function rock_star_flush_transients(){
	delete_transient( 'rock_star_featured_content' );

	delete_transient( 'rock_star_news_ticker' );

	delete_transient( 'rock_star_featured_slider' );

	delete_transient( 'rock_star_custom_css' );

	delete_transient( 'rock_star_footer_content' );

	delete_transient( 'rock_star_featured_image' );

	delete_transient( 'rock_star_social_icons' );

	delete_transient( 'all_the_cool_cats' );

	//Add Rock Star default themes if there is no values
	if ( !get_theme_mod('rock_star_theme_options') ) {
		set_theme_mod( 'rock_star_theme_options', rock_star_get_default_theme_options() );
	}
}
add_action( 'customize_save', 'rock_star_flush_transients' );

/**
 * Flush out category transients
 *
 * @uses delete_transient
 *
 * @action edit_category
 *
 * @since Rock Star 0.3
 */
function rock_star_flush_category_transients(){
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'rock_star_flush_category_transients' );


/**
 * Flush out post related transients
 *
 * @uses delete_transient
 *
 * @action save_post
 *
 * @since Rock Star 0.3
 */
function rock_star_flush_post_transients(){
	delete_transient( 'rock_star_featured_content' );

	delete_transient( 'rock_star_news_ticker' );

	delete_transient( 'rock_star_featured_slider' );

	delete_transient( 'rock_star_featured_image' );

	delete_transient( 'all_the_cool_cats' );
}
add_action( 'save_post', 'rock_star_flush_post_transients' );


if ( ! function_exists( 'rock_star_custom_css' ) ) :
	/**
	 * Enqueue Custon CSS
	 *
	 * @uses  set_transient, wp_head, wp_enqueue_style
	 *
	 * @action wp_enqueue_scripts
	 *
	 * @since Rock Star 0.3
	 */
	function rock_star_custom_css() {
		//rock_star_flush_transients();
		$options  = rock_star_get_theme_options();
		$defaults = rock_star_get_default_theme_options();

		if ( ! $custom_css = get_transient( 'rock_star_custom_css' ) ) {
			$custom_css ='';

			$text_color = get_header_textcolor();

			if ( 'blank' == $text_color ){
				$custom_css	.=  ".site-title a, .site-description { position: absolute !important; clip: rect(1px 1px 1px 1px); clip: rect(1px, 1px, 1px, 1px); }". "\n";
			}
			elseif (  get_theme_support( 'custom-header', 'default-text-color' ) !== $text_color ) {
				$custom_css	.=  ".site-title a, .site-description { color: #".  $text_color ."; }". "\n";
			}

			// Featured Content Background Image Options
			if ( '' == $options['featured_content_background_image'] ) {
				//Remove Background Image
				$custom_css .= "#featured-content { background-image: none; }";
			}
			elseif ( $defaults['featured_content_background_image'] != $options['featured_content_background_image'] || $defaults['featured_content_background_display_position'] != $options['featured_content_background_display_position'] || $defaults['featured_content_background_repeat'] != $options['featured_content_background_repeat'] || $defaults['featured_content_background_attachment'] != $options['featured_content_background_attachment'] ) {

				$custom_css .= "#featured-content {". "\n";
				if ( $defaults['featured_content_background_image'] != $options['featured_content_background_image'] ) {
					$custom_css	.=  "background-image: url(\"". esc_url( $options['featured_content_background_image'] ) ."\");". "\n";
				}

				if ( $defaults['featured_content_background_display_position'] != $options['featured_content_background_display_position'] ) {
					$custom_css	.=  "background-position: center ". $options['featured_content_background_display_position'] .";". "\n";
				}

				if ( $defaults['featured_content_background_repeat'] != $options['featured_content_background_repeat'] ) {
					$custom_css	.=  "background-repeat: ". $options['featured_content_background_repeat'] . ";\n";
					$custom_css	.=  "background-size: inherit;\n";
				}

				if ( $defaults['featured_content_background_attachment'] != $options['featured_content_background_attachment'] ) {
					$custom_css	.=  "background-attachment: ". $options['featured_content_background_attachment'] ."\n";
				}
				$custom_css .= "}";
			}

			//Custom CSS Option
			if ( !empty( $options['custom_css'] ) ) {

				if ( '' != $custom_css ){
					// Just add a new line.
					$custom_css	.=  $custom_css . "\n";
				}
				$custom_css	.=  "/* Custom CSS from Custom CSS box */" . "\n" . $options[ 'custom_css'] . "\n";
			}

			if ( '' != $custom_css ){
				echo '<!-- refreshing cache -->' . "\n";

				$custom_css = '<!-- '.get_bloginfo('name').' inline CSS Styles -->' . "\n" . '<style type="text/css" media="screen">' . "\n" . $custom_css;

				$custom_css .= '</style>' . "\n";

			}

			set_transient( 'rock_star_custom_css', htmlspecialchars_decode( $custom_css ), 86940 );
		}

		echo $custom_css;
	}
endif; //rock_star_custom_css
add_action( 'wp_head', 'rock_star_custom_css', 101  );


/**
 * Alter the query for the main loop in homepage
 *
 * @action pre_get_posts
 *
 * @since Rock Star 0.3
 */
function rock_star_alter_home( $query ){
	if ( $query->is_main_query() && $query->is_home() ) {
		$options 	= rock_star_get_theme_options();
	    $cats 		= $options['front_page_category'];

	    if ( is_array( $cats ) && !in_array( '0', $cats ) ) {
			$query->query_vars['category__in'] =  $cats;
		}
	}
}
add_action( 'pre_get_posts','rock_star_alter_home' );


if ( ! function_exists( 'rock_star_content_nav' ) ) :
	/**
	 * Display navigation to next/previous pages when applicable
	 *
	 * @since Rock Star 0.3
	 */
	function rock_star_content_nav( $nav_id ) {
		global $wp_query, $post;

		// Don't print empty markup on single pages if there's nowhere to navigate.
		if ( is_single() ) {
			$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
			$next = get_adjacent_post( false, '', false );

			if ( ! $next && ! $previous )
				return;
		}

		// Don't print empty markup in archives if there's only one page.
		if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) ) {
			return;
		}

		$options			= rock_star_get_theme_options();

		$pagination_type	= $options['pagination_type'];

		$nav_class = ( is_single() ) ? 'site-navigation post-navigation' : 'site-navigation paging-navigation';

		/**
		 * Check if navigation type is Jetpack Infinite Scroll and if it is enabled, else goto default pagination
		 * if it's active then disable pagination
		 */
		if ( ( 'infinite-scroll-click' == $pagination_type || 'infinite-scroll-scroll' == $pagination_type ) && class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) {
			return false;
		}

		?>
	        <nav class="navigation post-navigation" role="navigation" id="<?php echo esc_attr( $nav_id ); ?>">
	        	<div class="nav-links">
		        	<h3 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'rock-star' ); ?></h3>
					<?php
					/**
					 * Check if navigation type is numeric and if Wp-PageNavi Plugin is enabled
					 */
					if ( 'numeric' == $pagination_type ) {
						if ( function_exists( 'wp_pagenavi' ) ) {
							wp_pagenavi();
						}
						else {
							the_posts_pagination( array(
								'prev_text'          => esc_html__( 'Previous page', 'rock-star' ),
								'next_text'          => esc_html__( 'Next page', 'rock-star' ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'rock-star' ) . ' </span>',
							) );
						}
	            	}
		            else { ?>
		                <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'rock-star' ) ); ?></div>
		                <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'rock-star' ) ); ?></div>
		            <?php
		            } ?>
		        </div>
	        </nav><!-- #nav -->
		<?php
	}
endif; // rock_star_content_nav


if ( ! function_exists( 'rock_star_comment' ) ) :
	/**
	 * Template for comments and pingbacks.
	 *
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 *
	 * @since Rock Star 0.3
	 */
	function rock_star_comment( $comment, $args, $depth ) {
		if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

		<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
			<div class="comment-body">
				<?php esc_html_e( 'Pingback:', 'rock-star' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( 'Edit', 'rock-star' ), '<span class="edit-link">', '</span>' ); ?>
			</div>

		<?php else : ?>

		<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
			<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
				<footer class="comment-meta">
					<div class="comment-author vcard">
						<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
						<?php printf( __( '%s <span class="says">says:</span>', 'rock-star' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
					</div><!-- .comment-author -->

					<div class="comment-metadata">
						<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
							<time datetime="<?php comment_time( 'c' ); ?>">
								<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'rock-star' ), get_comment_date(), get_comment_time() ); ?>
							</time>
						</a>
						<?php edit_comment_link( esc_html__( 'Edit', 'rock-star' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .comment-metadata -->

					<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'rock-star' ); ?></p>
					<?php endif; ?>
				</footer><!-- .comment-meta -->

				<div class="comment-content">
					<?php comment_text(); ?>
				</div><!-- .comment-content -->

				<?php
					comment_reply_link( wp_parse_args( $args, array(
						'add_below' => 'div-comment',
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
						'before'    => '<div class="reply">',
						'after'     => '</div>',
					) ) );
				?>
			</article><!-- .comment-body -->

		<?php
		endif;
	}
endif; // rock_star_comment()


if ( ! function_exists( 'rock_star_the_attached_image' ) ) :
	/**
	 * Prints the attached image with a link to the next attached image.
	 *
	 * @since Rock Star 0.3
	 */
	function rock_star_the_attached_image() {
		$post                = get_post();
		$attachment_size     = apply_filters( 'rock_star_attachment_size', array( 1200, 1200 ) );
		$next_attachment_url = wp_get_attachment_url();

		/**
		 * Grab the IDs of all the image attachments in a gallery so we can get the
		 * URL of the next adjacent image in a gallery, or the first image (if
		 * we're looking at the last image in a gallery), or, in a gallery of one,
		 * just the link to that image file.
		 */
		$attachment_ids = get_posts( array(
			'post_parent'    => $post->post_parent,
			'fields'         => 'ids',
			'numberposts'    => 1,
			'post_status'    => 'inherit',
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'order'          => 'ASC',
			'orderby'        => 'menu_order ID'
		) );

		// If there is more than 1 attachment in a gallery...
		if ( count( $attachment_ids ) > 1 ) {
			foreach ( $attachment_ids as $attachment_id ) {
				if ( $attachment_id == $post->ID ) {
					$next_id = current( $attachment_ids );
					break;
				}
			}

			// get the URL of the next image attachment...
			if ( $next_id )
				$next_attachment_url = get_attachment_link( $next_id );

			// or get the URL of the first image attachment.
			else
				$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
		}

		printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
			esc_url( $next_attachment_url ),
			the_title_attribute( 'echo=0' ),
			wp_get_attachment_image( $post->ID, $attachment_size )
		);
	}
endif; //rock_star_the_attached_image


if ( ! function_exists( 'rock_star_entry_meta' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 *
	 * @since Rock Star 0.3
	 */
	function rock_star_entry_meta() {
		echo '<p class="entry-meta">';

		$time_string = '<time datetime="%1$s" class="entry-date published updated">%2$s</time>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time datetime="%1$s" class="entry-date published">%2$s</time><time datetime="%1$s" class="updated">%2$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		printf( '<span class="posted-on">%1$s<a href="%2$s" rel="bookmark">%3$s</a></span>',
			sprintf( _x( '<span class="screen-reader-text">Posted on</span>', 'Used before publish date.', 'rock-star' ) ),
			esc_url( get_permalink() ),
			$time_string
		);

		if ( is_singular() || is_multi_author() ) {
			printf( '<span class="byline"><span class="author vcard">%1$s<a class="url fn n" href="%2$s">%3$s</a></span></span>',
				sprintf( _x( '<span class="screen-reader-text">Author</span>', 'Used before post author name.', 'rock-star' ) ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_html( get_the_author() )
			);
		}

		if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( esc_html__( 'Leave a comment', 'rock-star' ), esc_html__( '1 Comment', 'rock-star' ), esc_html__( '% Comments', 'rock-star' ) );
			echo '</span>';
		}

		edit_post_link( esc_html__( 'Edit', 'rock-star' ), '<span class="edit-link">', '</span>' );

		echo '</p><!-- .entry-meta -->';
	}
endif; //rock_star_entry_meta


if ( ! function_exists( 'rock_star_tag_category' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags.
	 *
	 * @since Rock Star 0.3
	 */
	function rock_star_tag_category() {
		echo '<p class="entry-meta">';

		if ( 'post' == get_post_type() ) {
			$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'rock-star' ) );
			if ( $categories_list && rock_star_categorized_blog() ) {
				printf( '<span class="cat-links">%1$s%2$s</span>',
					sprintf( _x( '<span class="screen-reader-text">Categories</span>', 'Used before category names.', 'rock-star' ) ),
					$categories_list
				);
			}

			$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'rock-star' ) );
			if ( $tags_list ) {
				printf( '<span class="tags-links">%1$s%2$s</span>',
					sprintf( _x( '<span class="screen-reader-text">Tags</span>', 'Used before tag names.', 'rock-star' ) ),
					$tags_list
				);
			}
		}

		echo '</p><!-- .entry-meta -->';
	}
endif; //rock_star_tag_category


if ( ! function_exists( 'rock_star_get_highlight_meta' ) ) :
	/**
	 * Returns HTML with meta information for the categories, tags, date and author.
	 *
	 * @param [boolean] $hide_category Adds screen-reader-text class to category meta if true
	 * @param [boolean] $hide_tags Adds screen-reader-text class to tag meta if true
	 * @param [boolean] $hide_posted_by Adds screen-reader-text class to date meta if true
	 * @param [boolean] $hide_author Adds screen-reader-text class to author meta if true
	 *
	 * @since Rock Star 0.3
	 */
	function rock_star_get_highlight_meta( $hide_category = false, $hide_tags = false, $hide_posted_by = false, $hide_author = false ) {
		$output = '<p class="entry-meta">';

		if ( 'post' == get_post_type() ) {

			$class = $hide_category ? 'screen-reader-text' : '';

			$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'rock-star' ) );
			if ( $categories_list && rock_star_categorized_blog() ) {
				$output .= sprintf( '<span class="cat-links ' . $class . '">%1$s%2$s</span>',
					sprintf( _x( '<span class="screen-reader-text">Categories</span>', 'Used before category names.', 'rock-star' ) ),
					$categories_list
				);
			}

			$class = $hide_tags ? 'screen-reader-text' : '';

			$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'rock-star' ) );
			if ( $tags_list ) {
				$output .= sprintf( '<span class="tags-links ' . $class . '">%1$s%2$s</span>',
					sprintf( _x( '<span class="screen-reader-text">Tags</span>', 'Used before tag names.', 'rock-star' ) ),
					$tags_list
				);
			}

			$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

			if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
				$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
			}

			$time_string = sprintf( $time_string,
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date() ),
				esc_attr( get_the_modified_date( 'c' ) ),
				esc_html( get_the_modified_date() )
			);

			$class = $hide_posted_by ? 'screen-reader-text' : '';

			$output .= sprintf( '<span class="posted-on ' . $class . '">%1$s<a href="%2$s" rel="bookmark">%3$s</a></span>',
				sprintf( _x( '<span class="screen-reader-text">Posted on</span>', 'Used before publish date.', 'rock-star' ) ),
				esc_url( get_permalink() ),
				$time_string
			);

			if ( is_singular() || is_multi_author() ) {
				$class = $hide_author ? 'screen-reader-text' : '';

				$output .= sprintf( '<span class="byline ' . $class . '"><span class="author vcard">%1$s<a class="url fn n" href="%2$s">%3$s</a></span></span>',
					sprintf( _x( '<span class="screen-reader-text">Author</span>', 'Used before post author name.', 'rock-star' ) ),
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					esc_html( get_the_author() )
				);
			}
		}

		$output .= '</p><!-- .entry-meta -->';

		return $output;
	}
endif; //rock_star_get_highlight_meta


/**
 * Returns true if a blog has more than 1 category
 *
 * @since Rock Star 0.3
 */
function rock_star_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so rock_star_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so rock_star_categorized_blog should return false
		return false;
	}
}


/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @since Rock Star 0.3
 */
function rock_star_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'rock_star_page_menu_args' );


/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 *
 * @since Rock Star 0.3
 */
function rock_star_enhanced_image_navigation( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
		return $url;

	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
		$url .= '#main';

	return $url;
}
add_filter( 'attachment_link', 'rock_star_enhanced_image_navigation', 10, 2 );


if ( ! function_exists( 'rock_star_excerpt_length' ) ) :
	/**
	 * Sets the post excerpt length to n words.
	 *
	 * function tied to the excerpt_length filter hook.
	 * @uses filter excerpt_length
	 *
	 * @since Rock Star 0.3
	 */
	function rock_star_excerpt_length( $length ) {
		// Getting data from Customizer Options
		$options	= rock_star_get_theme_options();
		$length	= $options['excerpt_length'];
		return $length;
	}
endif; //rock_star_excerpt_length
add_filter( 'excerpt_length', 'rock_star_excerpt_length' );


if ( ! function_exists( 'rock_star_continue_reading' ) ) :
	/**
	 * Returns a "Custom Continue Reading" link for excerpts
	 *
	 * @since Rock Star 0.3
	 */
	function rock_star_continue_reading() {
		// Getting data from Customizer Options
		$options		=	rock_star_get_theme_options();
		$more_tag_text	= $options['excerpt_more_text'];

		return ' <span class="read-more"><a class="more-link btn btn-transparent" href="' . esc_url( get_permalink() ) . '">' .  $more_tag_text . '</a></span>';
	}
endif; //rock_star_continue_reading
add_filter( 'excerpt_more', 'rock_star_continue_reading' );


if ( ! function_exists( 'rock_star_excerpt_more' ) ) :
	/**
	 * Replaces "[...]" (appended to automatically generated excerpts) with rock_star_continue_reading().
	 *
	 * @since Rock Star 0.3
	 */
	function rock_star_excerpt_more( $more ) {
		return rock_star_continue_reading();
	}
endif; //rock_star_excerpt_more
add_filter( 'excerpt_more', 'rock_star_excerpt_more' );


if ( ! function_exists( 'rock_star_custom_excerpt' ) ) :
	/**
	 * Adds Continue Reading link to more tag excerpts.
	 *
	 * function tied to the get_the_excerpt filter hook.
	 *
	 * @since Rock Star 0.3
	 */
	function rock_star_custom_excerpt( $output ) {
		if ( has_excerpt() && ! is_attachment() ) {
			$output .= rock_star_continue_reading();
		}
		return $output;
	}
endif; //rock_star_custom_excerpt
add_filter( 'get_the_excerpt', 'rock_star_custom_excerpt' );


if ( ! function_exists( 'rock_star_more_link' ) ) :
	/**
	 * Replacing Continue Reading link to the_content more.
	 *
	 * function tied to the the_content_more_link filter hook.
	 *
	 * @since Rock Star 0.3
	 */
	function rock_star_more_link( $more_link, $more_link_text ) {
	 	$options		=	rock_star_get_theme_options();
		$more_tag_text	= $options['excerpt_more_text'];

		return str_replace( $more_link_text, $more_tag_text, $more_link );
	}
endif; //rock_star_more_link
add_filter( 'the_content_more_link', 'rock_star_more_link', 10, 2 );


if ( ! function_exists( 'rock_star_body_classes' ) ) :
	/**
	 * Adds Rock Star layout classes to the array of body classes.
	 *
	 * @since Rock Star 0.3
	 */
	function rock_star_body_classes( $classes ) {
		global $wp_query;
		$options = rock_star_get_theme_options();

		// Adds a class of group-blog to blogs with more than 1 published author
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}

		$layout = rock_star_get_theme_layout();

		switch ( $layout ) {
			case 'left-sidebar':
				$classes[] = 'layout-two-columns content-right';
			break;

			case 'right-sidebar':
				$classes[] = 'layout-two-columns content-left';
			break;

			case 'no-sidebar-full-width':
				$classes[] = 'layout-one-column no-sidebar full-width';
			break;
		}

		$current_content_layout = $options['content_layout'];
		if ( "" != $current_content_layout ) {
			$classes[] = esc_attr( $current_content_layout );
		}

		$page_id        = $wp_query->get_queried_object_id();
		$page_for_posts = get_option('page_for_posts');

		//Check if slider is inactive
		$enable_slider   = $options['featured_slider_option'];
		$slider_disabled = true;

		if ( 'entire-site' == $enable_slider || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enable_slider ) ) {
			$slider_disabled = false;
		}

		//Check if header image is enabled
		$header_image_disabled = !rock_star_featured_image();

		if ( $slider_disabled && $header_image_disabled ) {
			//Add class if slider and header image is  disabled
			$classes[] = 'header-bg';
		}

		//Check if news-ticker is inactive
		$enable_news_ticker = $options['news_ticker_option'];

		if ( 'entire-site' == $enable_news_ticker || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enable_news_ticker ) ) {
			$classes[] = 'news-ticker-' . $options['news_ticker_position'];
		}


		$classes = apply_filters( 'rock_star_body_classes', $classes );

		return $classes;
	}
endif; //rock_star_body_classes
add_filter( 'body_class', 'rock_star_body_classes' );


/**
 * Count the number of footer sidebars to enable dynamic classes for the footer
 *
 * @since Rock Star 0.3
 */
function rock_star_footer_sidebar_class() {
	$count = 0;

	if ( is_active_sidebar( 'footer-1' ) )
		$count++;

	if ( is_active_sidebar( 'footer-2' ) )
		$count++;

	if ( is_active_sidebar( 'footer-3' ) )
		$count++;

	if ( is_active_sidebar( 'footer-4' ) )
		$count++;

	$class = '';

	switch ( $count ) {
		case '1':
			$class = 'widget-area one';
			break;
		case '2':
			$class = 'widget-area two';
			break;
		case '3':
			$class = 'widget-area three';
			break;
		case '4':
			$class = 'widget-area four';
			break;
	}

	if ( $class )
		echo 'class="' . $class . '"';
}


if ( ! function_exists( 'rock_star_post_classes' ) ) :
	/**
	 * Adds Rock Star post classes to the array of post classes.
	 * used for supporting different content layouts
	 *
	 * @since Rock Star 0.3
	 */
	function rock_star_post_classes( $classes ) {
		//Getting Ready to load data from Theme Options Panel
		$options = rock_star_get_theme_options();

		$contentlayout = $options['content_layout'];

		if ( is_archive() || is_home() ) {
			$classes[] = esc_attr( $contentlayout );
		}

		return $classes;
	}
endif; //rock_star_post_classes
add_filter( 'post_class', 'rock_star_post_classes' );

if ( ! function_exists( 'rock_star_get_theme_layout' ) ) :
	/**
	 * Returns Theme Layout prioritizing the meta box layouts
	 *
	 * @uses  get_theme_mod
	 *
	 * @action wp_head
	 *
	 * @since Rock Star 0.3
	 */
	function rock_star_get_theme_layout() {
		$id = '';

		global $post, $wp_query;

		// Front page displays in Reading Settings
		$page_on_front  = get_option('page_on_front') ;
		$page_for_posts = get_option('page_for_posts');

		// Get Page ID outside Loop
		$page_id = $wp_query->get_queried_object_id();

		// Blog Page or Front Page setting in Reading Settings
		if ( $page_id == $page_for_posts || $page_id == $page_on_front ) {
		    $id = $page_id;
		}
		elseif ( is_singular() ) {
				if ( is_attachment() ) {
				$id = $post->post_parent;
			}
			else {
				$id = $post->ID;
			}
		}

		//Get appropriate metabox value of layout
		if ( '' != $id ) {
			$layout = get_post_meta( $id, 'rock-star-layout-option', true );
		}
		else {
			$layout = 'default';
		}

		//Load options data
		$options = rock_star_get_theme_options();

		//check empty and load default
		if ( empty( $layout ) || 'default' == $layout ) {
			if ( is_single() || is_page() ) {
				$layout = $options['single_page_post_layout'];
			}
			else {
				$layout = $options['theme_layout'];
			}
		}

		return $layout;
	}
endif; //rock_star_get_theme_layout


if ( ! function_exists( 'rock_star_archive_content_image' ) ) :
	/**
	 * Template for Featured Image in Archive Content
	 *
	 * To override this in a child theme
	 * simply create your own rock_star_archive_content_image(), and that function will be used instead.
	 *
	 * @since Rock Star 0.3
	 */
	function rock_star_archive_content_image() {
		$options        = rock_star_get_theme_options();
		$content_layout = $options['content_layout'];

		if ( has_post_thumbnail() && 'full-content' != $content_layout ) { ?>
			<figure class="featured-image">
	            <a rel="bookmark" href="<?php the_permalink(); ?>">
	            <?php the_post_thumbnail(); ?>
				</a>
	        </figure>
	   	<?php
		}
	}
endif; //rock_star_archive_content_image
add_action( 'rock_star_before_entry_container', 'rock_star_archive_content_image', 10 );


if ( ! function_exists( 'rock_star_single_content_image' ) ) :
	/**
	 * Template for Featured Image in Single Post
	 *
	 * To override this in a child theme
	 * simply create your own rock_star_single_content_image(), and that function will be used instead.
	 *
	 * @since Rock Star 0.3
	 */
	function rock_star_single_content_image() {
		global $post, $wp_query;

		// Get Page ID outside Loop
		$page_id = $wp_query->get_queried_object_id();
		if ( $post ) {
	 		if ( is_attachment() ) {
				$parent = $post->post_parent;
				$individual_featured_image = get_post_meta( $parent,'rock-star-featured-image', true );
			} else {
				$individual_featured_image = get_post_meta( $page_id,'rock-star-featured-image', true );
			}
		}

		if ( empty( $individual_featured_image ) || ( !is_page() && !is_single() ) ) {
			$individual_featured_image = 'default';
		}

		// Getting data from Theme Options
	   	$options = rock_star_get_theme_options();

		$featured_image = $options['single_post_image_size'];

		if ( ( 'disable' == $individual_featured_image  || '' == get_the_post_thumbnail() || ( $individual_featured_image=='default' && 'disabled' == $featured_image ) ) ) {
			echo '<!-- Page/Post Single Image Disabled or No Image set in Post Thumbnail -->';
			return false;
		}
		else {
			$class = '';

			if ( 'default' == $individual_featured_image ) {
				$class = $featured_image;
			}
			else {
				$class = 'from-metabox ' . $individual_featured_image;
			}

			?>
			<figure class="featured-image <?php echo $class; ?>">
                <?php
				if ( 'large' == $individual_featured_image  || ( $individual_featured_image=='default' && 'large' == $featured_image  ) ) {
                     the_post_thumbnail( 'large' );
                }
               	elseif ( 'slider' == $individual_featured_image  || ( $individual_featured_image=='default' && 'slider-image-size' == $featured_image  ) ) {
					the_post_thumbnail( 'rock-star-slider' );
				}
				elseif ( 'featured' == $individual_featured_image  || ( $individual_featured_image=='default' && 'featured' == $featured_image  ) ) {
					the_post_thumbnail( 'rock-star-featured' );
				}
				else {
					the_post_thumbnail( 'full' );
				} ?>
	        </figure>
	   	<?php
		}
	}
endif; //rock_star_single_content_image
add_action( 'rock_star_before_post_container', 'rock_star_single_content_image', 10 );
add_action( 'rock_star_before_page_container', 'rock_star_single_content_image', 10 );


if ( ! function_exists( 'rock_star_get_comment_section' ) ) :
	/**
	 * Comment Section
	 *
	 * @get comment setting from theme options and display comments sections accordingly
	 * @display comments_template
	 * @action rock_star_comment_section
	 *
	 * @since Rock Star 0.3
	 */
	function rock_star_get_comment_section() {
		if ( comments_open() || '0' != get_comments_number() ) {
			comments_template();
		}
	}
endif;
add_action( 'rock_star_comment_section', 'rock_star_get_comment_section', 10 );


/**
 * Footer Text
 *
 * @get footer text from theme options and display them accordingly
 * @display footer_text
 * @action rock_star_footer
 *
 * @since Rock Star 0.3
 */
function rock_star_footer_content() {
	//rock_star_flush_transients();
	if ( ( !$footer_content = get_transient( 'rock_star_footer_content' ) ) ) {
		$theme_data = wp_get_theme();
		$year       =  esc_attr( date_i18n( __( 'Y', 'rock-star' ) ) );
		$site_link  = '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>';
		$privacy_policy = get_the_privacy_policy_link();

		$footer_content =  '
			<div id="site-generator" class="site-info" role="contentinfo">
				<div class="wrapper">
					<span>' . sprintf( _x( 'Copyright &copy; %1$s %2$s. All Rights Reserved. %3$s', '1: Year, 2: Site Title with home URL, 3: Privacy Policy Link', 'rock-star' ), $year, $site_link, $privacy_policy ) . ' &#124; ' . $theme_data->get( 'Name' ) . '&nbsp;' . esc_html__( 'by', 'rock-star' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_html( $theme_data->get( 'Author' ) ) .'</a>' . '</span>
				</div><!-- .wrapper -->
			</div><!-- .site-info -->
	    	';

	    set_transient( 'rock_star_footer_content', $footer_content, 86940 );
    }

    echo $footer_content;
}
add_action( 'rock_star_footer', 'rock_star_footer_content', 100 );


/**
 * Return the first image in a post. Works inside a loop.
 * @param [integer] $post_id [Post or page id]
 * @param [string/array] $size Image size. Either a string keyword (thumbnail, medium, large or full) or a 2-item array representing width and height in pixels, e.g. array(32,32).
 * @param [string/array] $attr Query string or array of attributes.
 * @return [string] image html
 *
 * @since Rock Star 0.3
 */

function rock_star_get_first_image( $postID, $size, $attr ) {
	ob_start();

	ob_end_clean();

	$image 	= '';

	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', get_post_field('post_content', $postID ) , $matches);

	if ( isset( $matches [1] [0] ) ) {
		//Get first image
		$first_img = $matches [1] [0];

		return '<img class="wp-post-image" src="'. esc_url( $first_img ) .'">';
	}

	return false;
}


if ( ! function_exists( 'rock_star_scrollup' ) ) {
	/**
	 * This function loads Scroll Up Navigation
	 *
	 * @action rock_star_footer action
	 * @uses set_transient and delete_transient
	 */
	function rock_star_scrollup() {
		// get the data value from theme options
		$options = rock_star_get_theme_options();

		if ( $options['disable_scrollup'] ) {
			//bail if scroll up is disabled
			return;
		}

		echo '
		<div class="backtotop genericon genericon-collapse">
			<span class="screen-reader-text">' . esc_html__( 'Scroll Up', 'rock-star' ) . '</span>
		</div><!-- .backtotop -->' ;
	}
}
add_action( 'rock_star_after', 'rock_star_scrollup', 10 );


if ( ! function_exists( 'rock_star_page_post_meta' ) ) :
	/**
	 * Post/Page Meta for Google Structure Data
	 */
	function rock_star_page_post_meta() {
		$author_url     = esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) );

		$page_post_meta = '
			<span class="post-time">' . esc_html__( 'Posted on', 'rock-star' ) . '
				<time class="entry-date updated" datetime="' . esc_attr( get_the_date( 'c' ) ) . '">' . esc_html( get_the_date() ) . '</time>
			</span>

			<span class="post-author">
				' . esc_html__( 'By', 'rock-star' ) . '

				<span class="author vcard">
					<a class="url fn n" href="' . esc_url( $author_url ) . '" title="View all posts by ' . esc_attr( get_the_author() ) . '" rel="author">' . get_the_author() . '</a>
					</span>
			</span>';

		return $page_post_meta;
	}
endif; //rock_star_page_post_meta


if ( ! function_exists( 'rock_star_truncate_phrase' ) ) :
	/**
	 * Return a phrase shortened in length to a maximum number of characters.
	 *
	 * Result will be truncated at the last white space in the original string. In this function the word separator is a
	 * single space. Other white space characters (like newlines and tabs) are ignored.
	 *
	 * If the first `$max_characters` of the string does not contain a space character, an empty string will be returned.
	 *
	 * @since Rock Star 0.3
	 *
	 * @param string $text            A string to be shortened.
	 * @param integer $max_characters The maximum number of characters to return.
	 *
	 * @return string Truncated string
	 */
	function rock_star_truncate_phrase( $text, $max_characters ) {

		$text = trim( $text );

		if ( mb_strlen( $text ) > $max_characters ) {
			//* Truncate $text to $max_characters + 1
			$text = mb_substr( $text, 0, $max_characters + 1 );

			//* Truncate to the last space in the truncated string
			$text = trim( mb_substr( $text, 0, mb_strrpos( $text, ' ' ) ) );
		}

		return $text;
	}
endif; //rock_star_truncate_phrase


if ( ! function_exists( 'rock_star_get_the_content_limit' ) ) :
	/**
	 * Return content stripped down and limited content.
	 *
	 * Strips out tags and shortcodes, limits the output to `$max_char` characters, and appends an ellipsis and more link to the end.
	 *
	 * @since Rock Star 0.3
	 *
	 * @param integer $max_characters The maximum number of characters to return.
	 * @param string  $more_link_text Optional. Text of the more link. Default is "(more...)".
	 * @param bool    $stripteaser    Optional. Strip teaser content before the more text. Default is false.
	 *
	 * @return string Limited content.
	 */
	function rock_star_get_the_content_limit( $max_characters, $more_link_text = '(more...)', $stripteaser = false ) {

		$content = get_the_content( '', $stripteaser );

		//* Strip tags and shortcodes so the content truncation count is done correctly
		$content = strip_tags( strip_shortcodes( $content ), apply_filters( 'get_the_content_limit_allowedtags', '<script>,<style>' ) );

		//* Remove inline styles / scripts
		$content = trim( preg_replace( '#<(s(cript|tyle)).*?</\1>#si', '', $content ) );

		//* Truncate $content to $max_char
		$content = rock_star_truncate_phrase( $content, $max_characters );

		//* More link?
		if ( $more_link_text ) {
			$link   = apply_filters( 'get_the_content_more_link', sprintf( '<a href="%s" class="more-link">%s</a>', esc_url( get_permalink() ), $more_link_text ), $more_link_text );
			$output = sprintf( '<p>%s %s</p>', $content, $link );
		} else {
			$output = sprintf( '<p>%s</p>', $content );
			$link = '';
		}

		return apply_filters( 'rock_star_get_the_content_limit', $output, $content, $link, $max_characters );

	}
endif; //rock_star_get_the_content_limit


if ( ! function_exists( 'rock_star_post_navigation' ) ) :
	/**
	 * Displays Single post Navigation
	 *
	 * @uses  the_post_navigation
	 *
	 * @action rock_star_after_post
	 *
	 * @since Rock Star 0.3
	 */
	function rock_star_post_navigation() {
		// Previous/next post navigation.
		the_post_navigation( array(
			'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next post:', 'rock-star' ) . '</span> ' .
				'<span class="post-title">%title</span> <span class="meta-nav"> &rarr;</span>' ,
			'prev_text' => '<span class="meta-nav" aria-hidden="true">&larr; </span>' .
				'<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'rock-star' ) . '</span>' .
				'<span class="post-title">%title</span>',
		) );
	}
endif; //rock_star_post_navigation
add_action( 'rock_star_after_post', 'rock_star_post_navigation', 10 );


/**
 * Display Multiple Select type for and array of categories
 *
 * @param  [string] $name  [field name]
 * @param  [string] $id    [field_id]
 * @param  [array] $selected    [selected values]
 * @param  string $label [label of the field]
 */
function rock_star_dropdown_categories( $name, $id, $selected, $label = '' ) {
	$dropdown = wp_dropdown_categories(
		array(
			'name'             => $name,
			'echo'             => 0,
			'hide_empty'       => false,
			'show_option_none' => false,
			'hierarchical'     => 1,
		)
	);

	if ( '' != $label ) {
		echo '<label for="' . $id . '">
			'. $label .'
			</label>';
	}

	$dropdown = str_replace('<select', '<select multiple = "multiple" style = "height:120px; width: 100%" ', $dropdown );

	foreach( $selected as $selected ) {
		$dropdown = str_replace( 'value="'. $selected .'"', 'value="'. $selected .'" selected="selected"', $dropdown );
	}

	echo $dropdown;

	echo '<span class="description">'. esc_html__( 'Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.', 'rock-star' ) . '</span>';
}


/**
 * Return registered image sizes.
 *
 * Return a two-dimensional array of just the additionally registered image sizes, with width, height and crop sub-keys.
 *
 * @since 0.1.7
 *
 * @global array $_wp_additional_image_sizes Additionally registered image sizes.
 *
 * @return array Two-dimensional, with width, height and crop sub-keys.
 */
function rock_star_get_additional_image_sizes() {
	global $_wp_additional_image_sizes;

	if ( $_wp_additional_image_sizes )
		return $_wp_additional_image_sizes;

	return array();
}


/**
 * Migrate Custom CSS to WordPress core Custom CSS
 *
 * Runs if version number saved in theme_mod "custom_css_version" doesn't match current theme version.
 */
function rock_star_custom_css_migrate(){
	$ver = get_theme_mod( 'custom_css_version', false );

	// Return if update has already been run
	if ( version_compare( $ver, '4.7' ) >= 0 ) {
		return;
	}

	if ( function_exists( 'wp_update_custom_css_post' ) ) {
	    // Migrate any existing theme CSS to the core option added in WordPress 4.7.

	    /**
		 * Get Theme Options Values
		 */
	    $options = rock_star_get_theme_options();

	    if ( '' != $options['custom_css'] ) {
			$core_css = wp_get_custom_css(); // Preserve any CSS already added to the core option.
			$return   = wp_update_custom_css_post( $core_css . $options['custom_css'] );
	        if ( ! is_wp_error( $return ) ) {
	            // Remove the old theme_mod, so that the CSS is stored in only one place moving forward.
	            unset( $options['custom_css'] );
	            set_theme_mod( 'rock_star_theme_options', $options );

	            // Update to match custom_css_version so that script is not executed continously
				set_theme_mod( 'custom_css_version', '4.7' );
	        }
	    }
	}
}
add_action( 'after_setup_theme', 'rock_star_custom_css_migrate' );
