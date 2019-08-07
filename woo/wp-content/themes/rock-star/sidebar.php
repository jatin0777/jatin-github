<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Catch Themes
 * @subpackage Rock Star
 * @since Rock Star 0.3
 */
?>

<?php
/**
 * rock_star_before_secondary hook
 *
 * @hooked rock_star_main_end - 10
 * @hooked rock_star_after_posts_pages_sidebar - 20
 * @hooked rock_star_primary_end - 30
 *
 */
do_action( 'rock_star_before_secondary' );

$rock_star_layout = rock_star_get_theme_layout();

//Bail early if no sidebar layout is selected
if ( 'no-sidebar-full-width' == $rock_star_layout ) {
	return;
}

global $post, $wp_query;

// Front page displays in Reading Settings
$page_on_front = get_option('page_on_front') ;
$page_for_posts = get_option('page_for_posts');

// Get Page ID outside Loop
$page_id = $wp_query->get_queried_object_id();

// Blog Page or Front Page setting in Reading Settings
if ( $page_id == $page_for_posts || $page_id == $page_on_front ) {
    $sidebar_options = get_post_meta( $page_id, 'rock-star-sidebar-options', true );
}
elseif ( is_singular() ) {
	if ( is_attachment() ) {
		$parent 		= $post->post_parent;
		$sidebar_options = get_post_meta( $parent, 'rock-star-sidebar-options', true );

	}
	else {
		$sidebar_options = get_post_meta( $post->ID, 'rock-star-sidebar-options', true );
	}
}
else {
	$sidebar_options = '';
}

do_action( 'rock_star_before_primary_sidebar' );
?>
	<aside id="secondary" class="sidebar sidebar-primary widget-area" role="complementary">
		<?php
		if ( is_active_sidebar( 'primary-sidebar' ) ) {
        	dynamic_sidebar( 'primary-sidebar' );
   		}
		else {
			//Helper Text
			if ( current_user_can( 'edit_theme_options' ) ) { ?>
				<section id="widget-default-text" class="widget widget_text">
					<div class="widget-wrap">
	                	<h4 class="widget-title"><?php esc_html_e( 'Primary Sidebar Widget Area', 'rock-star' ); ?></h4>

	           			<div class="textwidget">
	                   		<p><?php esc_html_e( 'This is the Primary Sidebar Widget Area if you are using a two or three column site layout option.', 'rock-star' ); ?></p>
	                   		<p><?php printf( __( 'By default it will load Search and Archives widgets as shown below. You can add widget to this area by visiting your <a href="%s">Widgets Panel</a> which will replace default widgets.', 'rock-star' ), esc_url( admin_url( 'widgets.php' ) ) ); ?></p>
	                 	</div>
	           		</div><!-- .widget-wrap -->
	       		</section><!-- #widget-default-text -->
			<?php
			} ?>
			<section class="widget widget_widget_rock_star_adspace_widget" id="header-right-ads">
				<div class="widget-wrap">
					<a class="ads-image" href="#">
						<img src="<?php echo trailingslashit( esc_url( get_template_directory_uri() ) ); ?>images/gallery/ads-300x250.jpg">
					</a>
				</div><!-- .widget-wrap -->
			</section><!-- .widget-wrap -->
			<section class="widget widget_search" id="default-search">
				<div class="widget-wrap">
					<h4 class="widget-title"><?php esc_html_e( 'Search', 'rock-star' ); ?></h4>
					<?php get_search_form(); ?>
				</div><!-- .widget-wrap -->
			</section><!-- #default-search -->
			<section class="widget widget_archive" id="default-archives">
				<div class="widget-wrap">
					<h4 class="widget-title"><?php esc_html_e( 'Archives', 'rock-star' ); ?></h4>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</div><!-- .widget-wrap -->
			</section><!-- #default-archives -->
			<?php
		} ?>
	</aside><!-- .sidebar sidebar-primary widget-area -->
<?php
/**
 * rock_star_after_primary_sidebar hook
 */
do_action( 'rock_star_after_primary_sidebar' );
