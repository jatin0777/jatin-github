<?php
/**
 * Before Content Sidebar
 *
 * @package Catch Themes
 * @subpackage Rock Star
 * @since Rock Star 0.3
 */

if ( !is_active_sidebar( 'before-content' ) ) {
	//Bail early if no widgets are present in sidebar
	return;
}

/**
 * rock_star_before_before_content hook
 */
do_action( 'rock_star_before_before_content' ); ?>

	<aside id="before-content" class="widget-area" role="complementary">
		<?php
		dynamic_sidebar( 'before-content' );
		?>
	</aside><!-- #before-content -->
	
<?php
/**
 * rock_star_after_before_content hook
 */
do_action( 'rock_star_after_before_content' );