<?php

get_header(); 
global  $alchem_page_meta,$alchem_blog_style, $alchem_css_class;
$detect  = new Mobile_Detect;
$sidebar ='none';
$enable_page_title_bar     = alchem_option('enable_page_title_bar');
$page_title_bg_parallax    = esc_attr(alchem_option('page_title_bg_parallax'));
$page_title_bg_parallax    = $page_title_bg_parallax=="yes"?"parallax-scrolling":"";
$page_title_align          = esc_attr(alchem_option('page_title_align'));
$display_breadcrumb        = esc_attr(alchem_option('display_breadcrumb'));
$breadcrumbs_on_mobile     = esc_attr(alchem_option('breadcrumbs_on_mobile_devices'));
$breadcrumb_menu_prefix    = esc_attr(alchem_option('breadcrumb_menu_prefix'));
$breadcrumb_menu_separator = esc_attr(alchem_option('breadcrumb_menu_separator'));
//$sidebar                   = isset($alchem_page_meta['page_layout'])?$alchem_page_meta['page_layout']:'none';
$left_sidebar              = esc_attr(alchem_option('left_sidebar_blog_archive'));
$right_sidebar             = esc_attr(alchem_option('right_sidebar_blog_archive'));
if( $left_sidebar !='' )
$sidebar ='left';
if( $right_sidebar !='' )
$sidebar ='right';
if( $left_sidebar !='' && $right_sidebar !='' )
$sidebar ='both';


$slider_banner = isset($alchem_page_meta['slider_banner'])?$alchem_page_meta['slider_banner']:'';

$enable_page_title_bar = (isset($alchem_page_meta['display_title_bar']) && $alchem_page_meta['display_title_bar']!='' )?$alchem_page_meta['display_title_bar']:$enable_page_title_bar;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php //alchem_get_page_slider( $slider_banner );?>
<?php if( $enable_page_title_bar == 'yes' ):?>
<section class="page-title-bar title-<?php echo $page_title_align;?> no-subtitle <?php echo $page_title_bg_parallax;?>">
            <div class="container alchem_enable_page_title_bar">
                <hgroup class="page-title text-light">
                
                <?php if(is_home()):?>
                    <h1 class="alchem_blog_title"><?php echo esc_attr(alchem_option('blog_title'));?></h1>
                    <?php if(alchem_option('blog_subtitle')):?>
                    <h3 class="alchem_blog_subtitle"><?php echo esc_attr(alchem_option('blog_subtitle'));?></h3>
                    <?php endif;?>
                 <?php else:?>
                    <h1><?php single_cat_title();?></h1>
                 <?php endif;?>   
                 
                </hgroup>
                
                <?php if( $display_breadcrumb == 'yes' && !$detect->isMobile()):?>
                <?php alchem_get_breadcrumb(array("before"=>"<div class='breadcrumb-nav text-light alchem_display_breadcrumb'>".$breadcrumb_menu_prefix,"after"=>"</div>","show_browse"=>false,"separator"=>$breadcrumb_menu_separator));?>
                <?php endif;?>
                <?php if( $breadcrumbs_on_mobile == 'yes' && $detect->isMobile()):?>
                <?php alchem_get_breadcrumb(array("before"=>"<div class='breadcrumb-nav text-light alchem_display_breadcrumb'>".$breadcrumb_menu_prefix,"after"=>"</div>","show_browse"=>false,"separator"=>$breadcrumb_menu_separator));?>
                <?php endif;?>
                <div class="clearfix"></div>            
            </div>
        </section>
<?php endif;?>
 <div class="post-wrap">
            <div class="container">
                <div class="post-inner row <?php echo alchem_get_content_class($sidebar);?>">
                        <div class="col-main">
                        <div class="<?php echo  $alchem_css_class;?>">
               <?php
			
             if ( have_posts() ) :
			   ?>
             <?php while ( have_posts() ) : the_post(); ?>
			<?php  get_template_part( 'content', 'article'.$alchem_blog_style ); ?>

		<?php endwhile; // end of the loop. ?>
        <?php endif;?>
                        </div>
                         <div class="clear"></div>
                          <?php alchem_paging_nav('echo',false); ?>
						  
                        </div>
                        <?php if( $sidebar == 'left' || $sidebar == 'both'  ): ?>
       <div class="col-aside-left">
                        <aside class="blog-side left text-left">
                            <div class="widget-area">
                            <?php get_sidebar('archiveleft');?>
                            </div>
                        </aside>
                    </div>
            <?php endif; ?>
            <?php if( $sidebar == 'right' || $sidebar == 'both'  ): ?>        
                    <div class="col-aside-right">
                        <div class="widget-area">
                           <?php get_sidebar('archiveright');?>
                            </div>
                    </div>
             <?php endif; ?>
                    </div>
                </div>
            </div>
      </article>
<?php get_footer(); ?>