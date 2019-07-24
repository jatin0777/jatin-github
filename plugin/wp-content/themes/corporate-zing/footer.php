<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package corporate_zing
 */

?>

	</div><!-- #content -->

	<?php 

				if( 'no' != get_theme_mod('corporate_zing_show_quote') && "nine" != get_theme_mod('corporate_zing_layout_type') ): 

				$corporate_zingQuoteTitle = '';
				$corporate_zingQuoteDesc = '';
				$corporate_zingQuoteContent = '';

				if( '' != get_theme_mod('corporate_zing_quote_post') && 'select' != get_theme_mod('corporate_zing_quote_post') ){

					$corporate_zingQuoteId = get_theme_mod('corporate_zing_quote_post');

					if( ctype_alnum($corporate_zingQuoteId) ){

						$corporate_zingQuote = get_post( $corporate_zingQuoteId );

						$corporate_zingQuoteTitle = $corporate_zingQuote->post_title;
						$corporate_zingQuoteDesc = $corporate_zingQuote->post_excerpt;
						$corporate_zingQuoteContent = $corporate_zingQuote->post_content;

					}

				}



		?>		
		<div class="frontQuoteContainer">
		
			<div class="frontQuoteInnerContainer">
				
				<p>
				<?php 

					if( '' != $corporate_zingQuoteDesc ){

						echo esc_html($corporate_zingQuoteDesc);

					}else{

						echo esc_html(corporate_zing_limitedstring($corporate_zingQuoteContent, 300));

					}

				?>			
				</p>
				<p><span><?php echo esc_html($corporate_zingQuoteTitle); ?></span></p>
				
			</div><!-- .frontQuoteInnerContainer -->
			
		</div><!-- .frontQuoteContainer -->
	<?php endif; ?>

	<?php if( 'no' != get_theme_mod('corporate_zing_show_social') ): ?>
	<div class="frontpage-social">

			<?php if( '' != get_theme_mod('corporate_zing_facebook') ): ?>
			<a href="<?php echo esc_url(get_theme_mod('corporate_zing_facebook')); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/assets/images/facebook.png'; ?>"></a>
			<?php endif; ?>
			
			<?php if( '' != get_theme_mod('corporate_zing_flickr') ): ?>
			<a href="<?php echo esc_url(get_theme_mod('corporate_zing_flickr')); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/assets/images/flickr.png'; ?>"></a>
			<?php endif; ?>	

			<?php if( '' != get_theme_mod('corporate_zing_gplus') ): ?>
			<a href="<?php echo esc_url(get_theme_mod('corporate_zing_gplus')); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/assets/images/gplus.png'; ?>"></a>
			<?php endif; ?>	

			<?php if( '' != get_theme_mod('corporate_zing_linkedin') ): ?>
			<a href="<?php echo esc_url(get_theme_mod('corporate_zing_linkedin')); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/assets/images/linkedin.png'; ?>"></a>
			<?php endif; ?>	

			<?php if( '' != get_theme_mod('corporate_zing_reddit') ): ?>
			<a href="<?php echo esc_url(get_theme_mod('corporate_zing_reddit')); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/assets/images/reddit.png'; ?>"></a>
			<?php endif; ?>	

			<?php if( '' != get_theme_mod('corporate_zing_stumble') ): ?>
			<a href="<?php echo esc_url(get_theme_mod('corporate_zing_stumble')); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/assets/images/stumble.png'; ?>"></a>
			<?php endif; ?>		

			<?php if( '' != get_theme_mod('corporate_zing_twitter') ): ?>
			<a href="<?php echo esc_url(get_theme_mod('corporate_zing_twitter')); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/assets/images/twitter.png'; ?>"></a>
			<?php endif; ?>				
					
	</div><!-- .frontpage-social -->	
	<?php endif; ?>

	<footer id="colophon" class="site-footer">

		<div class="site-logo">
		
			<?php
			
				$corporate_zing_custom_logo_id = get_theme_mod( 'custom_logo' );
				$corporate_zing_logo = wp_get_attachment_image_src( $corporate_zing_custom_logo_id , 'full' );
				if ( has_custom_logo() ) {
						echo '<a href="' . esc_url(get_site_url()) . '"><img src="'. esc_url( $corporate_zing_logo[0] ) .'"></a>';
				} else {
						echo '<h1>'. esc_html(get_bloginfo( 'name' )) .'</h1>';
				}			
			
			?>
			<p><?php esc_html_e( 'All rights reserved.', 'corporate-zing' ); ?></p>
			<p>
			<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'corporate-zing' ), 'corporate zing', '<a href="https://themealley.com/">ThemeAlley</a>' );
			?>
			</a>
		</div><!-- .site-logo -->
		
		<div class="footer-widgets">
		
			<div class="footerWidgetContainer">
			<?php if ( dynamic_sidebar('footer-left') ){ } else { ?>
			
				<section class="widget">
					
					<div class="widgetContainerInner">
					
						<h2 class="widget-title"><span><?php _e( 'Pages', 'corporate-zing' ); ?></span></h2>
                        <ul>
                            <?php wp_list_pages('title_li='); ?>
                        </ul>						
					
					</div>
					
				</section>
			
			<?php } ?> 
			</div><!-- .footerWidgetContainer -->
			
			<div class="footerWidgetContainer">
			<?php if ( dynamic_sidebar('footer-middle') ){ } else { ?>
			
				<section class="widget">
					
					<div class="widgetContainerInner">
					
						<h2 class="widget-title"><span><?php _e( 'Meta', 'corporate-zing' ); ?></span></h2>
                        <ul>
                            <?php wp_register(); ?>
                            <li><?php wp_loginout(); ?></li>
                            <?php wp_meta(); ?>
                        </ul>						
					
					</div>
					
				</section>		
			
			<?php } ?> 			
			</div><!-- .footerWidgetContainer -->
			
			<div class="footerWidgetContainer">
			<?php if ( dynamic_sidebar('footer-right') ){ } else { ?>
			
				<section class="widget">
					
					<div class="widgetContainerInner">
					
						<h2 class="widget-title"><span><?php _e( 'Archives', 'corporate-zing' ); ?></span></h2>
                        <ul>
							 <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
                        </ul>						
					
					</div>
					
				</section>			
			
			<?php } ?> 			
			</div><!-- .footerWidgetContainer -->			
		
		</div><!-- .footer-widgets -->
		
	
	</footer><!-- #colophon -->
</div><!-- #page -->
</div><!-- .outerContainer -->
<?php wp_footer(); ?>

</body>
</html>
