<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage Careerpress
 * @since Careerpress 1.0.0
 */

/**
 * careerpress_footer_primary_content hook
 *
 * @hooked careerpress_add_contact_section -  10
 *
 */
do_action( 'careerpress_footer_primary_content' );

/**
 * careerpress_content_end_action hook
 *
 * @hooked careerpress_content_end -  10
 *
 */
do_action( 'careerpress_content_end_action' );

/**
 * careerpress_content_end_action hook
 *
 * @hooked careerpress_footer_start -  10
 * @hooked Careerpress_Footer_Widgets->add_footer_widgets -  20
 * @hooked careerpress_footer_site_info -  40
 * @hooked careerpress_footer_end -  100
 *
 */
do_action( 'careerpress_footer' );

/**
 * careerpress_page_end_action hook
 *
 * @hooked careerpress_page_end -  10
 *
 */
do_action( 'careerpress_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>
