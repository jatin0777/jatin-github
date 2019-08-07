<?php
/**
 * The template for displaying custom menus
 *
 * @package Catch Themes
 * @subpackage Rock Star
 * @since Rock Star 0.3
 */

if ( ! function_exists( 'rock_star_primary_menu' ) ) :
/**
 * Shows the Primary Menu
 *
 * default load in sidebar-header-right.php
 */
function rock_star_primary_menu() {
	?>
    <button id="menu-toggle" class="menu-toggle"><?php _e( 'Menu', 'rock-star' ); ?></button>

    <div id="site-header-menu" class="site-header-menu">
        <nav aria-label="<?php esc_attr_e( 'Primary Menu', 'rock-star' ); ?>" role="navigation" class="main-navigation" id="site-navigation">
            <div class="menu-main-menu-container">
                <?php
                    if ( has_nav_menu( 'primary' ) ) {
                        $rock_star_primary_menu_args = array(
                            'theme_location'    => 'primary',
                            'menu_class'        => 'menu nav-menu',
                            'container'         => false
                        );
                        wp_nav_menu( $rock_star_primary_menu_args );
                    }
                    else {
                        wp_page_menu( array( 'menu_class'  => 'menu nav-menu' ) );
                    }
                ?>
            </div><!--end menu-main-menu-container-->
         </nav><!--end main-navigation-->
    </div><!-- .site-header-menu -->
    <?php
}
endif; //rock_star_primary_menu
add_action( 'rock_star_header', 'rock_star_primary_menu', 80 );


if ( ! function_exists( 'rock_star_add_page_menu_class' ) ) :
/**
 * Filters wp_page_menu to add menu class  for default page menu
 *
 */
function rock_star_add_page_menu_class( $ulclass ) {
  return preg_replace( '/<ul>/', '<ul class="menu page-menu-wrap">', $ulclass, 1 );
}
endif; //rock_star_add_page_menu_class
add_filter( 'wp_page_menu', 'rock_star_add_page_menu_class' );