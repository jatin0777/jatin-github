<?php
//$sidebar    = alchem_option('blog_archive_sidebar');
$layout     = alchem_option('layout');
$blog_pagination_type = alchem_option('blog_pagination_type');

$infinite_scroll = '';
if( $blog_pagination_type == 'infinite_scroll' )
$infinite_scroll = 'alchem-infinite-scroll';

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