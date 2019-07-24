<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 *
 * @package Suitbuilder themes
 * @subpackage suitbuilder
 * @since suitbuilder 1.0.0
 */


/**
 * suitbuilder_action_after_content hook
 * @since suitbuilder 1.0.0
 *
 * @hooked null
 */
do_action( 'suitbuilder_action_after_content' );

/**
 * suitbuilder_action_before_footer hook
 * @since suitbuilder 1.0.0
 *
 * @hooked suitbuilder_before_footer - 10
 */
do_action( 'suitbuilder_action_before_footer' );

/**
 * suitbuilder_action_widget_before_footer hook
 * @since suitbuilder 1.0.0
 *
 * @hooked suitbuilder_widget_before_footer - 10
 */
do_action( 'suitbuilder_action_widget_before_footer' );

	

/**
 * suitbuilder_action_footer hook
 * @since suitbuilder 1.0.0
 *
 * @hooked suitbuilder_footer - 10
 */
do_action( 'suitbuilder_action_footer' );

/**
 * suitbuilder_action_after_footer hook
 * @since suitbuilder 1.0.0
 *
 * @hooked null
 */
do_action( 'suitbuilder_action_after_footer' );

/**
 * suitbuilder_action_after hook
 * @since suitbuilder 1.0.0
 *
 * @hooked suitbuilder_page_end - 10
 */
do_action( 'suitbuilder_action_after' );
?>
<?php wp_footer(); ?>
</body>
</html>