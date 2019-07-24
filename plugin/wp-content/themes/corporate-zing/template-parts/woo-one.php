<div class="wooOneContainer">

	<div class="wooOneWelcomeContainer">
		
			<?php
			
				$corporate_zingWelcomePostTitle = '';
				$corporate_zingWelcomePostDesc = '';
				$corporate_zingWelcomePostContent = '';

				if( '' != get_theme_mod('corporate_zing_wooone_welcome_post') && 'select' != get_theme_mod('corporate_zing_wooone_welcome_post') ){

					$corporate_zingWelcomePostId = get_theme_mod('corporate_zing_wooone_welcome_post');

					if( ctype_alnum($corporate_zingWelcomePostId) ){

						$corporate_zingWelcomePost = get_post( $corporate_zingWelcomePostId );

						$corporate_zingWelcomePostTitle = $corporate_zingWelcomePost->post_title;
						$corporate_zingWelcomePostDesc = $corporate_zingWelcomePost->post_excerpt;
						$corporate_zingWelcomePostContent = $corporate_zingWelcomePost->post_content;

					}

				}			
			
			?>
			
			<h1><?php echo esc_html($corporate_zingWelcomePostTitle); ?></h1>
			<div class="wooOneWelcomeContent">
				<p>
					<?php 
					
						if( '' != $corporate_zingWelcomePostDesc ){
							
							echo esc_html($corporate_zingWelcomePostDesc);
							
						}else{
							
							echo esc_html($corporate_zingWelcomePostContent);
							
						}
					
					?>
				</p>
			</div><!-- .wooOneWelcomeContent -->	
		
	</div><!-- .wooOneWelcomeContainer -->
	
	
	<div class="new-arrivals-container">
		
		<?php 
					
			if( 'no' != get_theme_mod('corporate_zing_show_wooone_heading') ): 
			
				$corporate_zingWooOneLatestHeading = __('Latest Products', 'corporate-zing');	
				$corporate_zingWooOneLatestText = __('Some of our latest products', 'corporate-zing');
			
					
				if( '' != get_theme_mod('corporate_zing_wooone_latest_heading') ){
					$corporate_zingWooOneLatestHeading = get_theme_mod('corporate_zing_wooone_latest_heading');
				}
				
				if( '' != get_theme_mod('corporate_zing_wooone_latest_text') ){
					$corporate_zingWooOneLatestText = get_theme_mod('corporate_zing_wooone_latest_text');
				}				
			
					
		?>
		<div class="new-arrivals-title">
		
			<h3><?php echo esc_html($corporate_zingWooOneLatestHeading); ?></h3>
			<p><?php echo esc_html($corporate_zingWooOneLatestText); ?></p>
		
		</div><!-- .new-arrivals-title -->
		<?php endif; ?>
		
		<?php
			
			$corporate_zingWooOnePaged = get_query_var( 'page' ) ? get_query_var( 'page' ) : 1;
			
			$corporate_zing_front_page_ecom = array(
				'post_type' => 'product',
				'paged' => $corporate_zingWooOnePaged
			);
			$corporate_zing_front_page_ecom_the_query = new WP_Query( $corporate_zing_front_page_ecom );
			
			$corporate_zing_front_page_temp_query = $wp_query;
			$wp_query   = NULL;
			$wp_query   = $corporate_zing_front_page_ecom_the_query;
			
		?>		
		
		<div class="new-arrivals-content">
		<?php if ( have_posts() && post_type_exists('product') ) : ?>
		
		
			<div class="corporate_zing-woocommerce-content">
			
				<ul class="products">
			
					<?php /* Start the Loop */ ?>
					<?php while ( $corporate_zing_front_page_ecom_the_query->have_posts() ) : $corporate_zing_front_page_ecom_the_query->the_post(); ?>			
					<?php wc_get_template_part( 'content', 'product' ); ?>
					<?php endwhile; ?>
				
				</ul><!-- .products -->
				
				<?php //the_posts_navigation(); ?>
				
				<?php corporate_zing_pagination( $corporate_zingWooOnePaged, $corporate_zing_front_page_ecom_the_query->max_num_pages); // Pagination Function ?>
				
			</div><!-- .corporate_zing-woocommerce-content -->
			
		<?php else : ?>
		
			<p><?php echo __('Please install wooCommerce and add products.', 'corporate-zing') ?></p>

		<?php 
			
			endif; 
			wp_reset_postdata();
			$wp_query = NULL;
			$wp_query = $corporate_zing_front_page_temp_query;
		?>			
		
		
		</div><!-- .new-arrivals-content -->		
	
	</div><!-- .new-arrivals-container -->	

</div>