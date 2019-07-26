<?php
/*
	Template Name: Blog
*/
?>
<?php get_header(); ?>	
<div id="content">
	<div class="container">
	
		<div class="">
		
			<div id="blog_cont">
		
				<?php
				$category_ID = get_category_id('blog');
				$args = array(
					 'post_type' => 'post',
					 'posts_per_page' => 6,
					 'cat' => $category_ID,
					 'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1)
					 );
				query_posts($args);
				$x = 0;
				while (have_posts()) : the_post(); ?>                                            		
					<div class="home_blog_box">
							<?php if(get_post_meta( get_the_ID(), 'page_featured_type', true ) == 'youtube') { ?>
								<iframe width="370" height="210" src="http://www.youtube.com/embed/<?php echo get_post_meta( get_the_ID(), 'page_video_id', true ); ?>" frameborder="0" allowfullscreen></iframe>
							<?php } elseif(get_post_meta( get_the_ID(), 'page_featured_type', true ) == 'vimeo') { ?>
								<iframe src="http://player.vimeo.com/video/<?php echo get_post_meta( get_the_ID(), 'page_video_id', true ); ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=085e17" width="500" height="338" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
							<?php } else { ?>
								<div class="zoom_img_cont"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog-img'); ?></a></div>
							<?php } ?>
								
								
								
						<div class="clear"></div>
					</div> <!-- //home_blog_box -->	
									
					
				<?php $x++; ?>
				<?php endwhile; ?>
				
				<div class="clear"></div>			
				
			</div><!--//blog_cont-->
			
			<div class="clear"></div>
			
			<div class="load_more_cont">
				<div align="center"><div class="load_more_text">
				<?php
				ob_start();
				next_posts_link('LOAD MORE');
				$buffer = ob_get_contents();
				ob_end_clean();
				if(!empty($buffer)) echo $buffer;
				?>
				</div></div>
			</div><!--//load_more_cont-->     					
			<?php
			global $wp_query;
			$max_pages = $wp_query->max_num_pages;
			?>			
			<div id="max_pages_id" style="display: none;"><?php echo ceil($wp_query->found_posts / 4); ?></div>					
			
			<?php wp_reset_query(); ?>                        
		
		</div><!--//single_full_cont-->
		
		
		<div class="clear"></div>	
		
		
	</div><!--//container-->
</div><!--//content-->
<script type="text/javascript">
$(document).ready(
function($){
var curPage = 1;
var pagesNum = $("#max_pages_id").html();   // Number of pages	
if(pagesNum == 1)
	$('.load_more_text a').css('display','none');	
  $('#blog_cont').infinitescroll({
 
    navSelector  : "div.load_more_text",            
    nextSelector : "div.load_more_text a:first",    
    itemSelector : "#blog_cont .home_blog_box",
	//behavior: "twitter",
    maxPage: <?php echo $max_pages; ?>
  },function(arrayOfNewElems){
  
  $('#blog_cont').append('<div class="clear"></div>');
  
      $('.load_more_text a').css('visibility','visible');
            curPage++;
            if(curPage == pagesNum) {
                $('.load_more_text a').css('display','none');
            } else {}  		      
 
  });  
}  
);
</script>	
<?php get_footer(); ?> 		