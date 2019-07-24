<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <header>
 *
 * @package Bootstrap Blog
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="<?php echo esc_url( 'http://gmpg.org/xfn/11' ); ?>">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php $menu_sticky = get_theme_mod( 'bootstrap_blog_header_sticky_menu_option', false ); ?>

<?php
	// Default values for 'bootstrap_blog_social_media' theme mod.
	$defaults = "";
	$social_media = get_theme_mod( 'bootstrap_blog_social_media', $defaults );
?>

<?php
	set_query_var( 'menu_sticky', $menu_sticky );
	set_query_var( 'social_media', $social_media );

	$layout = get_theme_mod( 'bootstrap_blog_header_layouts', 'one' );
    if( $layout == 'one' ) {
		get_template_part( 'layouts/header/header-layout', 'one' );
	}
	
?>

<?php if ( class_exists( 'Breadcrumb_Trail' ) && ! is_home() && ! is_front_page() ) : ?>               
	<div class="breadcrumbs">
		<div class="container"><?php breadcrumb_trail(); ?></div>
	</div>
<?php endif; ?>