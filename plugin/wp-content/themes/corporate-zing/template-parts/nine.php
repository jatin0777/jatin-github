<div class="corporateZingNineContainer">
	
	<div class="corporateZingNineServicesContainer">
	
		<?php
		
			corporate_zing_nine_service('corporate_zing_nine_service_one_post');
			corporate_zing_nine_service('corporate_zing_nine_service_two_post');
			corporate_zing_nine_service('corporate_zing_nine_service_three_post');
		
		?>
	
	</div>	
	
	<?php

		$corporate_zingNineQuoteTitle = '';
		$corporate_zingNineQuoteDesc = '';
		$corporate_zingNineQuoteContent = '';

		if( '' != get_theme_mod('corporate_zing_nine_quote_post') && 'select' != get_theme_mod('corporate_zing_nine_quote_post') ){

			$corporate_zingNineQuoteId = get_theme_mod('corporate_zing_nine_quote_post');

			if( ctype_alnum($corporate_zingNineQuoteId) ){

				$corporate_zingNineQuote = get_post( $corporate_zingNineQuoteId );

				$corporate_zingNineQuoteTitle = $corporate_zingNineQuote->post_title;
				$corporate_zingNineQuoteDesc = $corporate_zingNineQuote->post_excerpt;
				$corporate_zingNineQuoteContent = $corporate_zingNineQuote->post_content;

			}

		}

	?>		
	<div class="corporateZingNineQuote">
				
			<p>
			<?php 

				if( '' != $corporate_zingNineQuoteDesc ){

					echo esc_html($corporate_zingNineQuoteDesc);

				}else{

					echo esc_html(corporate_zing_limitedstring($corporate_zingNineQuoteContent, 150));

				}

			?>			
			</p>
			<p><span><?php echo esc_html($corporate_zingNineQuoteTitle); ?></span></p>
			
	</div><!-- .frontQuoteContainer -->
	
	<?php

		$corporate_zingNineAboutTitle = '';
		$corporate_zingNineAboutDesc = '';
		$corporate_zingNineAboutContent = '';

		if( '' != get_theme_mod('corporate_zing_nine_about_post') && 'select' != get_theme_mod('corporate_zing_nine_about_post') ){

			$corporate_zingNineAboutId = get_theme_mod('corporate_zing_nine_about_post');

			if( ctype_alnum($corporate_zingNineAboutId) ){

				$corporate_zingNineAbout = get_post( $corporate_zingNineAboutId );

				$corporate_zingNineAboutTitle = $corporate_zingNineAbout->post_title;
				$corporate_zingNineAboutDesc = $corporate_zingNineAbout->post_excerpt;
				$corporate_zingNineAboutContent = $corporate_zingNineAbout->post_content;

			}

		}

	?>	
	<div class="corporateZingNineAbout">
	
		<h3><?php echo esc_html($corporate_zingNineAboutTitle); ?></h3>
		<p>
		<?php 

				if( '' != $corporate_zingNineAboutDesc ){

					echo esc_html($corporate_zingNineAboutDesc);

				}else{

					echo esc_html(corporate_zing_limitedstring($corporate_zingNineAboutContent, 150));

				}

		?>			
		</p>		
		
	</div>	
	
	<div class="corporateZingNineAwards">
	
		<?php if( '' != get_theme_mod('corporate_zing_nine_award_one')  ): ?>
		<img src="<?php echo esc_url(get_theme_mod('corporate_zing_nine_award_one')); ?>" />
		<?php endif; ?>
		
		<?php if( '' != get_theme_mod('corporate_zing_nine_award_two')  ): ?>
		<img src="<?php echo esc_url(get_theme_mod('corporate_zing_nine_award_two')); ?>" />
		<?php endif; ?>	
		
		<?php if( '' != get_theme_mod('corporate_zing_nine_award_three')  ): ?>
		<img src="<?php echo esc_url(get_theme_mod('corporate_zing_nine_award_three')); ?>" />
		<?php endif; ?>
		
		<?php if( '' != get_theme_mod('corporate_zing_nine_award_four')  ): ?>
		<img src="<?php echo esc_url(get_theme_mod('corporate_zing_nine_award_four')); ?>" />
		<?php endif; ?>			
		
	</div>
	
</div>