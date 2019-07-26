<?php 
/**
 * Register the GitHub Gist shortcode
 */

function catch_instagram_assets() {
    // Scripts.
    wp_enqueue_script(
        'catch-instagram-block-js', // Handle.
        plugins_url( 'instagram-block/blocks.build.js', dirname( __FILE__ ) ), // Block.build.js: We register the block here. Built with Webpack.
        array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor' ), // Dependencies, defined above.
        // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.build.js' ), // Version: filemtime — Gets file modification time.
        false // Enqueue the script in the footer.
    );

    // Styles.
    wp_enqueue_style(
        'catch-instagram-block-editor-css', // Handle.
        plugins_url( 'instagram-block/blocks.editor.build.css', dirname( __FILE__ ) ), // Block editor CSS.
        array( 'wp-edit-blocks' ) // Dependency to include the CSS after it.
        // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.editor.build.css' ) // Version: filemtime — Gets file modification time.
    );
} // End function catch_guten_cgb_editor_assets().

// Hook: Editor assets.
add_action( 'enqueue_block_editor_assets', 'catch_instagram_assets' );

function catch_init() {
    global $pagenow;
    if( 'post.php' === $pagenow || 'post-new.php' == $pagenow ) {
        wp_enqueue_script('catch-instagram-feed-gallery-widget', plugins_url( 'instagram-block/catch-instagram-feed-gallery-widget-public.js', dirname( __FILE__ ) ), array('jquery'), '1.5', false);
    }
}
add_action( 'init', 'catch_init' );

// Hook the post rendering to the block
if ( function_exists( 'register_block_type' ) ) :
    register_block_type( 'catch-instagram-block/catch-instagram-block', array(
        'attributes' => array(
            'number' => array(
                'type'    => 'number',
                'default' => '6'
            ),
            'size' => array(
                'type'    => 'string',
                'default' => 'standard_resolution'
            ),
        ),
        'render_callback' => 'catch_instagram_block_render_shortcode',
    ) );
endif;

if( class_exists( 'Catch_Instagram_Feed_Gallery_Widget_Helper' ) ) {
    add_shortcode( 'catch-instagram-block', 'catch_instagram_block_render_shortcode' );
    function catch_instagram_block_render_shortcode( $atts ) {
        $instance['number']    = $atts['number'];
        $instance['size']      = $atts['size'];

        $catch_instagram_feed_gallery_widget_helper = new Catch_Instagram_Feed_Gallery_Widget_Helper();
        return $catch_instagram_feed_gallery_widget_helper->display( $instance );
    }
}