<div class="corporateZingTwoContainer">
	
	<div class="corporateZingTwoServices">
		
		<?php if( '' != get_theme_mod('corporate_zing_two_welcome_post') && 'select' != get_theme_mod('corporate_zing_two_welcome_post') ) : 

				$corporate_zing_TwoWelcomePostTitle = '';
				$corporate_zing_TwoWelcomePostDesc = '';
				$corporate_zing_TwoWelcomePostContent = '';


				$corporate_zing_TwoWelcomePostId = get_theme_mod('corporate_zing_two_welcome_post');

				if( ctype_alnum($corporate_zing_TwoWelcomePostId) ){

					$corporate_zing_TwoWelcomePost = get_post( $corporate_zing_TwoWelcomePostId );

					$corporate_zing_TwoWelcomePostTitle = $corporate_zing_TwoWelcomePost->post_title;
					$corporate_zing_TwoWelcomePostDesc = $corporate_zing_TwoWelcomePost->post_excerpt;
					$corporate_zing_TwoWelcomePostContent = $corporate_zing_TwoWelcomePost->post_content;

				}			

		?>

		<div class="corporateZingTwoWelcome">

			<h2><?php echo esc_html($corporate_zing_TwoWelcomePostTitle); ?></h2>
			<p>
			<?php 

				if( '' != $corporate_zing_TwoWelcomePostDesc ){

					echo esc_html($corporate_zing_TwoWelcomePostDesc);

				}else{

					echo esc_html($corporate_zing_TwoWelcomePostContent);

				}

			?>			
			</p>

		</div>
		
		<?php endif; ?>
		
		<?php
			if( '' != get_theme_mod('corporate_zing_two_services_cat') && 'select' != get_theme_mod('corporate_zing_two_services_cat') ):
		?>
		<div class="corporateZingTwoServicesItems">

			<?php

				$corporate_zing_Two_cat = '';

				if(get_theme_mod('corporate_zing_two_services_cat')){
						$corporate_zing_Two_cat = get_theme_mod('corporate_zing_two_services_cat');
				}else{
						$corporate_zing_Two_cat = 0;
				}

				if(get_theme_mod('corporate_zing_two_services_num')){
						$corporate_zing_Two_cat_num = get_theme_mod('corporate_zing_two_services_num');
				}else{
						$corporate_zing_Two_cat_num = 4;
				}		

				$corporate_zing_Two_args = array(
					   // Change these category SLUGS to suit your use.
					   'ignore_sticky_posts' => 1,
					   'post_type' => array('post'),
					   'posts_per_page'=> $corporate_zing_Two_cat_num,
					   'cat' => $corporate_zing_Two_cat
				);

				$corporate_zing_Two = new WP_Query($corporate_zing_Two_args);		

				if ( $corporate_zing_Two->have_posts() ) : while ( $corporate_zing_Two->have_posts() ) : $corporate_zing_Two->the_post();

			?>		

			<div class="corporateZingTwoServicesItem">

				<div class="corporateZingTwoServicesItemImage">

					<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail('corporate_zing-home-posts');
							}else{
								echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/frontsix.png" />';
							}						
					?>

				</div>

				<div class="corporateZingTwoServicesItemContent">

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
	
	<div class="corporateZingTwoPortfolio">
		
		<div class="corporateZingTwoPortfolioHeading">
			
			<?php 

				$corporate_zing_Two_PortfolioHeading = __('Portfolio', 'corporate-zing');	


				if( '' != get_theme_mod('corporate_zing_two_portfolio_title') ){
					$corporate_zing_Two_PortfolioHeading = get_theme_mod('corporate_zing_two_portfolio_title');
				}			

			?>
			<h3><?php echo esc_html($corporate_zing_Two_PortfolioHeading); ?></h3>
			
		</div>
		
		<div class="corporateZingTwoPortfolioItems">

			<?php

				$corporate_zing_Two_port = '';

				if(get_theme_mod('corporate_zing_two_portfolio_cat')){
						$corporate_zing_Two_port = get_theme_mod('corporate_zing_two_portfolio_cat');
				}else{
						$corporate_zing_Two_port = 0;
				}

				if(get_theme_mod('corporate_zing_two_portfolio_num')){
						$corporate_zing_Two_port_num = get_theme_mod('corporate_zing_two_portfolio_num');
				}else{
						$corporate_zing_Two_port_num = 4;
				}		

				$corporate_zing_Two_port_args = array(
					   // Change these category SLUGS to suit your use.
					   'ignore_sticky_posts' => 1,
					   'post_type' => array('post'),
					   'posts_per_page'=> $corporate_zing_Two_port_num,
					   'cat' => $corporate_zing_Two_port
				);

				$corporate_zing_TwoPort = new WP_Query($corporate_zing_Two_port_args);		

				if ( $corporate_zing_TwoPort->have_posts() ) : while ( $corporate_zing_TwoPort->have_posts() ) : $corporate_zing_TwoPort->the_post();

			?>
			<div class="corporateZingTwoPortfolioItem">
			
				<div class="corporateZingTwoPortfolioItemImage">

				<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail('corporate_zing-home-posts');
					}else{
						echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/frontsix.png" />';
					}						
				?>

				</div>
				
				<?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>
				
			</div>
			<?php endwhile; wp_reset_postdata(); endif;?>
		
		</div>		
		
	</div>	
	
</div>