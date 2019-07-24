<div class="corporateZingSevenContainer">

	<?php if( '' != get_theme_mod('corporate_zing_seven_welcome_post') && 'select' != get_theme_mod('corporate_zing_seven_welcome_post') ) : 

			$corporate_zing_SevenWelcomePostTitle = '';
			$corporate_zing_SevenWelcomePostDesc = '';
			$corporate_zing_SevenWelcomePostContent = '';


			$corporate_zing_SevenWelcomePostId = get_theme_mod('corporate_zing_seven_welcome_post');

			if( ctype_alnum($corporate_zing_SevenWelcomePostId) ){

				$corporate_zing_SevenWelcomePost = get_post( $corporate_zing_SevenWelcomePostId );

				$corporate_zing_SevenWelcomePostTitle = $corporate_zing_SevenWelcomePost->post_title;
				$corporate_zing_SevenWelcomePostDesc = $corporate_zing_SevenWelcomePost->post_excerpt;
				$corporate_zing_SevenWelcomePostContent = $corporate_zing_SevenWelcomePost->post_content;

			}			

	?>

	<div class="corporateZingSevenWelcome">

		<h2><?php echo esc_html($corporate_zing_SevenWelcomePostTitle); ?></h2>
		<p>
		<?php 

			if( '' != $corporate_zing_SevenWelcomePostDesc ){

				echo esc_html($corporate_zing_SevenWelcomePostDesc);

			}else{

				echo esc_html($corporate_zing_SevenWelcomePostContent);

			}

		?>			
		</p>

	</div>	
	
	<?php endif; ?>
	
	<div class="corporateZingSevenWork">
	
		<?php if( '' != get_theme_mod('corporate_zing_seven_work_post') && 'select' != get_theme_mod('corporate_zing_seven_work_post') ) : 

				$corporate_zing_SevenWorkPostTitle = '';
				$corporate_zing_SevenWorkPostDesc = '';
				$corporate_zing_SevenWorkPostContent = '';


				$corporate_zing_SevenWorkPostId = get_theme_mod('corporate_zing_seven_work_post');

				if( ctype_alnum($corporate_zing_SevenWorkPostId) ){

					$corporate_zing_SevenWorkPost = get_post( $corporate_zing_SevenWorkPostId );

					$corporate_zing_SevenWorkPostTitle = $corporate_zing_SevenWorkPost->post_title;
					$corporate_zing_SevenWorkPostDesc = $corporate_zing_SevenWorkPost->post_excerpt;
					$corporate_zing_SevenWorkPostContent = $corporate_zing_SevenWorkPost->post_content;

				}			

		?>

		<div class="corporateZingSevenWorkPost">

			<h2><?php echo esc_html($corporate_zing_SevenWorkPostTitle); ?></h2>
			<p>
			<?php 

				if( '' != $corporate_zing_SevenWorkPostDesc ){

					echo esc_html($corporate_zing_SevenWorkPostDesc);

				}else{

					echo esc_html($corporate_zing_SevenWorkPostContent);

				}

			?>			
			</p>

		</div>	

		<?php endif; ?>
		
		<?php if( '' != get_theme_mod('corporate_zing_seven_portfolio_cat') && 'select' != get_theme_mod('corporate_zing_seven_portfolio_cat') ) : 
		?>
		<div class="corporateZingSevenWorkItems">
		
			<?php 
			
				$corporate_zing_Seven_cat = '';

				if(get_theme_mod('corporate_zing_seven_portfolio_cat')){
						$corporate_zing_Seven_cat = get_theme_mod('corporate_zing_seven_portfolio_cat');
				}else{
						$corporate_zing_Seven_cat = 0;
				}

				if(get_theme_mod('corporate_zing_seven_work_num')){
						$corporate_zing_Seven_cat_num = get_theme_mod('corporate_zing_seven_work_num');
				}else{
						$corporate_zing_Seven_cat_num = 8;
				}		

				$corporate_zing_Seven_args = array(
					   // Change these category SLUGS to suit your use.
					   'ignore_sticky_posts' => 1,
					   'post_type' => array('post'),
					   'posts_per_page'=> $corporate_zing_Seven_cat_num,
					   'cat' => $corporate_zing_Seven_cat
				);

				$corporate_zing_Seven = new WP_Query($corporate_zing_Seven_args);		

				if ( $corporate_zing_Seven->have_posts() ) : while ( $corporate_zing_Seven->have_posts() ) : $corporate_zing_Seven->the_post();			
			
			?>
			<div class="corporateZingSevenWorkItem">
			
				<a href="<?php echo esc_url( get_permalink() ); ?>">
				<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail('corporate_zing-home-posts');
					}else{
						echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/frontsix.png" />';
					}						
				?>
				</a>
				
			</div>
			<?php endwhile; wp_reset_postdata(); endif;?>
		
		</div>
		<?php endif; ?>
	
	</div>
	
	<?php if( '' != get_theme_mod('corporate_zing_seven_about_post') && 'select' != get_theme_mod('corporate_zing_seven_about_post') ) : 

			$corporate_zing_SevenAboutPostTitle = '';
			$corporate_zing_SevenAboutPostDesc = '';
			$corporate_zing_SevenAboutPostContent = '';


			$corporate_zing_SevenAboutPostId = get_theme_mod('corporate_zing_seven_about_post');

			if( ctype_alnum($corporate_zing_SevenAboutPostId) ){

				$corporate_zing_SevenAboutPost = get_post( $corporate_zing_SevenAboutPostId );

				$corporate_zing_SevenAboutPostTitle = $corporate_zing_SevenAboutPost->post_title;
				$corporate_zing_SevenAboutPostDesc = $corporate_zing_SevenAboutPost->post_excerpt;
				$corporate_zing_SevenAboutPostContent = $corporate_zing_SevenAboutPost->post_content;

			}			

	?>

	<div class="corporateZingSevenAbout">

		<h2><?php echo esc_html($corporate_zing_SevenAboutPostTitle); ?></h2>
		<p>
		<?php 

			if( '' != $corporate_zing_SevenAboutPostDesc ){

				echo esc_html($corporate_zing_SevenAboutPostDesc);

			}else{

				echo esc_html($corporate_zing_SevenAboutPostContent);

			}

		?>			
		</p>

	</div>	
	
	<?php endif; ?>	
	
</div>	