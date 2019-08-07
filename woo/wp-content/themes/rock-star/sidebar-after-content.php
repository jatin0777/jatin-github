<?php
/**
 * After Content Sidebar
 *
 * @package Catch Themes
 * @subpackage Rock Star
 * @since Rock Star 0.3
 */

if ( !is_active_sidebar( 'after-content' ) ) {
	//Bail early if no widgets are present in sidebar
	return;
}

/**
 * rock_star_before_after_content hook
 */
do_action( 'rock_star_before_after_content' ); ?>

	<aside id="after-content" class="widget-area" role="complementary">
		<?php
		dynamic_sidebar( 'after-content' );
		?>
	</aside><!-- #after-content -->
		
<?php
/**
 * rock_star_after_after_content hook
 */
do_action( 'rock_star_after_after_content' );