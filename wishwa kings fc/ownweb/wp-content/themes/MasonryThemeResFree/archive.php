<?php get_header(); ?>	
<div id="content">
	<div class="container">
		<?php if(is_category()) { ?>
			<div class="archive_title">
				<?php printf( __( '%s', 'twentyten' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
				<div class="clear"></div>
			</div><!--//archive_title-->
		<?php } ?>		
		
			<div id="the_mason">		
			<div class="max_cont">
				<?php
				global $wp_query;
				$args = array_merge( $wp_query->query, array( 'posts_per_page' => 21 ) );
				query_posts( $args );
				$x = 1;
				while (have_posts()) : the_post(); ?>
                    
                    <div class="home_post_thumb <?php if($x % 3 == 0) { echo 'home_post_thumb_last'; } ?>">
                   
                    <?php if(get_post_meta( get_the_ID(), 'page_featured_type', true ) == 'youtube') { ?>
                                <div class="vid_cont"><iframe width="560" height="315" src="http://www.youtube.com/embed/<?php echo get_post_meta( get_the_ID(), 'page_video_id', true ); ?>" frameborder="0" allowfullscreen></iframe></div>
                            <?php } elseif(get_post_meta( get_the_ID(), 'page_featured_type', true ) == 'vimeo') { ?>
                                <div class="vid_cont"><iframe src="http://player.vimeo.com/video/<?php echo get_post_meta( get_the_ID(), 'page_video_id', true ); ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=02eaff" width="500" height="338" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
                            <?php } else { ?>
                        <a class="img" href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('home-image'); ?>
                        </a>
                       
                        <?php } ?>
                    </div>
       				<?php $x++; endwhile; ?>				
				</div><!--//max_cont-->
			</div> <!--//the_mason -->	
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
			<div id="max_pages_id" style="display: none;"><?php echo ceil($wp_query->found_posts / 24); //echo $max_pages-1; ?></div>						
	</div><!--//container-->
</div><!--//content-->
			<script type="text/javascript">
                $(document).ready(
                function($){
                var curPage = 1;
                var pagesNum = $("#max_pages_id").html();   // Number of pages  
                if(pagesNum == 1)
                    $('.load_more_text a').css('display','none');   
                  $('#the_mason').infinitescroll({
                 
                    navSelector  : "div.load_more_text",            
                           // selector for the paged navigation (it will be hidden)
                    nextSelector : "div.load_more_text a:first",    
                           // selector for the NEXT link (to page 2)
                    itemSelector : "#the_mason .home_post_thumb",
                           // selector for all items you'll retrieve
                    behavior: "twitter",
                    maxPage: <?php echo $max_pages; ?>
                  },function(arrayOfNewElems){
                  
                  $('#the_mason').masonry( 'appended', arrayOfNewElems );
                  
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