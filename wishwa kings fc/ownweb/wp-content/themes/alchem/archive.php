<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package alchem
 */

 global $alchem_blog_style ,$alchem_css_class ;
 $alchem_css_class = '';
 switch( $alchem_blog_style ){
	 
	 case 2:
	 $alchem_css_class  = 'blog-list-wrap blog-grid row';
	 get_template_part('archive','blog');
	 break;
	 case 3:
	 $alchem_css_class  = 'blog-list-wrap blog-aside-image';
	 get_template_part('archive','blog');
	 break;
	 case 4:
	 $alchem_css_class  = '';
	 get_template_part('archive','blog4');
	 break;
	 case 1:
	 default:
	 $alchem_css_class  = 'blog-list-wrap';
	 get_template_part('archive','blog');
	 break;
	 
	 }