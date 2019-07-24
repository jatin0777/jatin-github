    <div class="site-slider corporate_zing-owl-basic">

        <div id="corporate_zing-owl-basic" class="owl-carousel owl-theme">
    
    		<?php 
			
				if(get_theme_mod('corporate_zing_slider_num')){
					$corporate_zing_slider_num = get_theme_mod('corporate_zing_slider_num');
				}else{
					$corporate_zing_slider_num = '5';
				}
			
				if(get_theme_mod('corporate_zing_slider_cat')){
					$corporate_zing_slider_cat = get_theme_mod('corporate_zing_slider_cat');
				}else{
					$corporate_zing_slider_cat = 0;
				}			
			
				$corporate_zing_slider_args = array(
                    // Change these category SLUGS to suit your use.
                    'ignore_sticky_posts' => 1,
                    'post_type' => array('post'),
                    'posts_per_page'=> $corporate_zing_slider_num,
					'cat' => $corporate_zing_slider_cat
               );
        
			   $corporate_zing_slider = new WP_Query($corporate_zing_slider_args);
			
            if ( $corporate_zing_slider->have_posts() ) : ?>            
			<?php /* Start the Loop */ ?>
			<?php while ( $corporate_zing_slider->have_posts() ) : $corporate_zing_slider->the_post(); ?>
            <div class="owl-carousel-slide">
                
                <?php if ( has_post_thumbnail()) : ?>	
                <?php the_post_thumbnail('corporate_zing-owl'); ?>
                <?php else : ?>
                    <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/2000.png">
                <?php endif; ?>
                
                <div class="owl-carousel-caption-container">
                    <h3>
						<a href="<?php the_permalink() ?>">
						<?php the_title(); ?>
                        </a>
                    </h3>
                    <div class="owl-carousel-caption">
						<p><?php echo esc_html(corporate_zing_limitedstring(get_the_excerpt())); ?></p>
						<p><a href="<?php the_permalink() ?>"><?php echo __( 'Read More', 'corporate-zing' ); ?></a></p>
					</div>
                </div>
                 	
            </div>
    		<?php endwhile; wp_reset_postdata(); endif; ?>
            
         </div>
    
    </div><!-- .site-slider --> 