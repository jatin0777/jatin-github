<?php get_header(); ?>	
<?php $shortname = "slidemag"; ?>

    
     
    <div class="max_cont">
    <div class="home_posts" id="port">
        <div class="container">
        
        <div id="the_mason">
                    <?php
                    $args = array(
                                 'post_type' => 'post',
                                 'posts_per_page' => 12,
                                 'meta_key' => 'ex_show_in_homepage',
                                  'post__not_in' => $slider_arr,
                                  'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1)
                                 );
                    query_posts($args);
                    $x = 1;
                    while (have_posts()) : the_post(); ?>
                    
                    <div class="home_post_thumb <?php if($x % 3 == 0) { echo 'home_post_thumb_last'; } ?>">
                        
                        <?php if(get_post_meta( get_the_ID(), 'page_featured_type', true ) == 'youtube') { ?>
                            <div class="vid_cont"><iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo get_post_meta( get_the_ID(), 'page_video_id', true ); ?>" frameborder="0" allowfullscreen></iframe></div>
                        <?php } elseif(get_post_meta( get_the_ID(), 'page_featured_type', true ) == 'vimeo') { ?>
                            <div class="vid_cont"><iframe src="https://player.vimeo.com/video/<?php echo get_post_meta( get_the_ID(), 'page_video_id', true ); ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=02eaff" width="500" height="338" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
                        <?php } else { ?>
                            <a class="img" href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('home-image'); ?>
                            </a>
                           
                        <?php } ?>
                    </div>
                    <?php $x++; endwhile; ?>
                    </div><!--//the_mason-->
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
                    <div id="max_pages_id" style="display: none;"><?php echo ceil($wp_query->found_posts / 13); ?></div>                    
                    
                    <?php wp_reset_query(); ?>                        
                
                
                <div class="clear"></div>   
                    </div><!--//container-->
                </div><!--//home_posts-->
            </div><!--/max_cont-->
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
                  
                  var $arrayOfNewElems = $( arrayOfNewElems ).css({  });
                  $arrayOfNewElems.imagesLoaded(function(){
                        //$arrayOfNewElems.css({ opacity: 1 });
                        //$container.masonry( 'appended', $newElems, true );                    
                        $('#the_mason').masonry( 'appended', arrayOfNewElems );
                    });
                  
                        
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