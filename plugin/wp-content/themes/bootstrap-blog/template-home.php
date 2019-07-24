<?php

get_header();


$sections = get_theme_mod( 'bootstrap_blog_sort_homepage', array(
    'blog',
    'featured-lifestyle',
    'shop',
    'email-subscription',
    'instagram'
) );



if ( ! empty( $sections ) && is_array( $sections ) ) :

	foreach ( $sections as $section ) :
		get_template_part( 'template-parts/home-sections/' . $section, $section );
	endforeach;

endif;

get_footer();