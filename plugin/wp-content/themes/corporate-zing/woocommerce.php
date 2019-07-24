<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package corporate_zing
 */

get_header();
?>

	<div class="corporate_zing-woocommerce-content">
	
		<?php woocommerce_content(); ?>
	
	</div><!-- .corporate_zing-woocommerce-content -->

<?php
get_footer();
