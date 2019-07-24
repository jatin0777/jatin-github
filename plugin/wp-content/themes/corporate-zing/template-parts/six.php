<div class="corporateZingSixContainer">
	
	<?php if( '' != get_theme_mod('corporate_zing_six_welcome_post') && 'select' != get_theme_mod('corporate_zing_six_welcome_post') ) : 

			$corporate_zing_sixWelcomePostTitle = '';
			$corporate_zing_sixWelcomePostDesc = '';
			$corporate_zing_sixWelcomePostContent = '';


			$corporate_zing_sixWelcomePostId = get_theme_mod('corporate_zing_six_welcome_post');

			if( ctype_alnum($corporate_zing_sixWelcomePostId) ){

				$corporate_zing_sixWelcomePost = get_post( $corporate_zing_sixWelcomePostId );

				$corporate_zing_sixWelcomePostTitle = $corporate_zing_sixWelcomePost->post_title;
				$corporate_zing_sixWelcomePostDesc = $corporate_zing_sixWelcomePost->post_excerpt;
				$corporate_zing_sixWelcomePostContent = $corporate_zing_sixWelcomePost->post_content;

			}			

	?>

	<div class="corporateZingSixWelcome">

		<h2><?php echo esc_html($corporate_zing_sixWelcomePostTitle); ?></h2>
		<p>
		<?php 

			if( '' != $corporate_zing_sixWelcomePostDesc ){

				echo esc_html($corporate_zing_sixWelcomePostDesc);

			}else{

				echo esc_html($corporate_zing_sixWelcomePostContent);

			}

		?>			
		</p>

	</div>	
	
	<?php endif; ?>
	
	<?php
		if( '' != get_theme_mod('corporate_zing_six_services_cat') && 'select' != get_theme_mod('corporate_zing_six_services_cat') ):
	?>
	<div class="corporateZingSixServices">
		
		<?php

			$corporate_zing_six_cat = '';

			if(get_theme_mod('corporate_zing_six_services_cat')){
					$corporate_zing_six_cat = get_theme_mod('corporate_zing_six_services_cat');
			}else{
					$corporate_zing_six_cat = 0;
			}
		
			if(get_theme_mod('corporate_zing_six_services_num')){
					$corporate_zing_six_cat_num = get_theme_mod('corporate_zing_six_services_num');
			}else{
					$corporate_zing_six_cat_num = 4;
			}		

			$corporate_zing_six_args = array(
				   // Change these category SLUGS to suit your use.
				   'ignore_sticky_posts' => 1,
				   'post_type' => array('post'),
				   'posts_per_page'=> $corporate_zing_six_cat_num,
				   'cat' => $corporate_zing_six_cat
			);

			$corporate_zing_six = new WP_Query($corporate_zing_six_args);		

			if ( $corporate_zing_six->have_posts() ) : while ( $corporate_zing_six->have_posts() ) : $corporate_zing_six->the_post();
		
   		?>		
	
		<div class="corporateZingSixServicesItem">
			
			<div class="corporateZingSixServicesItemImage">
			
				<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('corporate_zing-home-posts');
						}else{
							echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/frontsix.png" />';
						}						
				?>
				
			</div>
			
			<div class="corporateZingSixServicesItemContent">
			
				<?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>
				<p>
					<?php  
						
						//$frontPostExcerpt = '';
						//$frontPostExcerpt = get_the_excerpt();
					
						if( has_excerpt() ){
							echo esc_html(get_the_excerpt());
						}else{
							echo esc_html(corporate_zing_limitedstring(get_the_content(), 150));
						}
					
					?>
				</p>
				
			</div>			
			
		</div>
		<?php endwhile; wp_reset_postdata(); endif;?>
		
	</div>
	<?php endif; ?>
	
</div>