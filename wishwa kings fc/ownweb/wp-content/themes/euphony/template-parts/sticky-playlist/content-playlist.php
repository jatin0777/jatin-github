<?php
/**
 * The template used for displaying playlist
 *
 * @package Euphony
 */
?>

<?php
$enable_section = get_theme_mod( 'euphony_sticky_playlist_visibility', 'disabled' );

if ( ! euphony_check_section( $enable_section ) ) {
	// Bail if playlist is not enabled
	return;
}

get_template_part( 'template-parts/sticky-playlist/post-type', 'playlist' );
