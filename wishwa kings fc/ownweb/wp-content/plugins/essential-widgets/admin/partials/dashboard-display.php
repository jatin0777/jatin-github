<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://catchplugins.com
 * @since      1.0.0
 *
 * @package    Essential_Widgets
 * @subpackage Essential_Widgets/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div id="essential-widgets" class="ew-main">
    <div class="content-wrapper">
        <div class="header">
            <h2><?php esc_html_e( 'Settings', 'essential-widgets' ); ?></h2>
        </div> <!-- .Header -->
        <div class="content">

            <p class="info">
                <span class="dashicons dashicons-info"></span> <?php esc_html_e( 'Switch the widgets On/Off as necessary in the section below.', 'essential-widgets' ); ?> <br />
                <a class="" href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Click here to manage the widgets', 'essential-widgets' ); ?></a>
            </p>

            <div class="module-container ew-options">
            	<?php
                    $options = essential_widgets_get_options( 'essential_widgets_options' );
                    $widget_list = essential_widgets_list();
                    foreach ( $widget_list as $key => $value ) :
                ?>
                    <div id="module-<?php echo $key; ?>" class="catch-modules">
                        <div class="module-header <?php echo $options[$key] ? 'active' : 'inactive'; ?>">
                            <h3 class="module-title"><?php echo $value; ?></h3>
                            <div class="switch">
                                <input type="checkbox" id="<?php echo $key; ?>" class="input-switch" rel="<?php echo $key; ?>" <?php checked( true, $options[$key] ); ?> >
                                <label for="<?php echo $key; ?>"></label>
                            </div>
                            <div class="loader"></div>
                        </div><!-- .module-header -->
                    </div><!-- .catch-modules -->
                <?php endforeach; ?>
            </div><!-- .module-container -->
        </div><!-- .content -->
    </div><!-- .content-wrapper -->
</div> <!-- .ect-main-->