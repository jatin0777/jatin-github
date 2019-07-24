<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package suitbuilder
 */

get_header();
?>
<div id="content" class="site-content container">
   	<div class="row w-100 m-0">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<article class="page type-page">                       
					<div class="entry-content">
						<section class="pagenotfound py-5">
							<div class="container position-relative">
								<div class="404-content">
									<h2 ><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'suitbuilder') ?></h2>
									<p><?php esc_html_e('It looks like nothing was found at this location.','suitbuilder') ?></p>
						
									<div class="container">	
										<div class="theme-btn-group py-4">                
											<?php
												get_search_form();
											?>

										</div>
									</div>
								</div>
							</div><!-- container -->
						</section><!-- page not found -->
					</div><!-- .entry-content -->
				</article>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
</div>
<?php
get_footer();
