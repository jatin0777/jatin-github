<div class="corporateZingOneContainer">
	
	<?php if( '' != get_theme_mod('corporate_zing_one_welcome_post') && 'select' != get_theme_mod('corporate_zing_one_welcome_post') ) : 

			$corporate_zing_OneWelcomePostTitle = '';
			$corporate_zing_OneWelcomePostDesc = '';
			$corporate_zing_OneWelcomePostContent = '';


			$corporate_zing_OneWelcomePostId = get_theme_mod('corporate_zing_one_welcome_post');

			if( ctype_alnum($corporate_zing_OneWelcomePostId) ){

				$corporate_zing_OneWelcomePost = get_post( $corporate_zing_OneWelcomePostId );

				$corporate_zing_OneWelcomePostTitle = $corporate_zing_OneWelcomePost->post_title;
				$corporate_zing_OneWelcomePostDesc = $corporate_zing_OneWelcomePost->post_excerpt;
				$corporate_zing_OneWelcomePostContent = $corporate_zing_OneWelcomePost->post_content;

			}			

	?>

	<div class="corporateZingOneWelcome">

		<h2><?php echo esc_html($corporate_zing_OneWelcomePostTitle); ?></h2>
		<p>
		<?php 

			if( '' != $corporate_zing_OneWelcomePostDesc ){

				echo esc_html($corporate_zing_OneWelcomePostDesc);

			}else{

				echo esc_html($corporate_zing_OneWelcomePostContent);

			}

		?>			
		</p>

	</div>	
	
	<?php endif; ?>
	
	<?php
		if( '' != get_theme_mod('corporate_zing_one_services_cat') && 'select' != get_theme_mod('corporate_zing_one_services_cat') ):
	?>
	<div class="corporateZingOneServices">
		
		<?php

			$corporate_zing_one_cat = '';

			if(get_theme_mod('corporate_zing_one_services_cat')){
					$corporate_zing_one_cat = get_theme_mod('corporate_zing_one_services_cat');
			}else{
					$corporate_zing_one_cat = 0;
			}
		
			if(get_theme_mod('corporate_zing_one_services_num')){
					$corporate_zing_one_cat_num = get_theme_mod('corporate_zing_one_services_num');
			}else{
					$corporate_zing_one_cat_num = 4;
			}		

			$corporate_zing_one_args = array(
				   // Change these category SLUGS to suit your use.
				   'ignore_sticky_posts' => 1,
				   'post_type' => array('post'),
				   'posts_per_page'=> $corporate_zing_one_cat_num,
				   'cat' => $corporate_zing_one_cat
			);

			$corporate_zing_one = new WP_Query($corporate_zing_one_args);		

			if ( $corporate_zing_one->have_posts() ) : while ( $corporate_zing_one->have_posts() ) : $corporate_zing_one->the_post();
		
   		?>		
	
		<div class="corporateZingOneServicesItem">
			
			<div class="corporateZingOneServicesItemImage">
			
				<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('corporate_zing-home-posts');
						}else{
							echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/frontsix.png" />';
						}						
				?>
				
			</div>
			
			<div class="corporateZingOneServicesItemContent">
			
				<?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>
				<p>
					<?php  
						
						//$frontPostExcerpt = '';
						//$frontPostExcerpt = get_the_excerpt();
					
						if( has_excerpt() ){
							echo esc_html(get_the_excerpt());
						}else{
							echo esc_html(corporate_zing_limitedstring(get_the_content(), 50));
						}
					
					?>
				</p>
				
			</div>			
			
		</div>
		<?php endwhile; wp_reset_postdata(); endif;?>
		
	</div>
	<?php endif; ?>
	
</div>