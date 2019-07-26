<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       catchplugins.com
 * @since      1.0.0
 *
 * @package    Essential_Content_types
 * @subpackage Essential_Content_types/admin/partials
 */

?>

<div class="wrap">
    <h1 class="wp-heading-inline"><?php esc_html_e( 'Essential Widgets', 'essential-widgets' ); ?></h1>
    <div id="plugin-description">
        <p><?php esc_html_e( 'Essential Widgets is a WordPress plugin for widgets that allows you to create and add amazing widgets with high customization option on your website without affecting your wallet.', 'essential-widgets' ); ?></p>
    </div>
    <div class="catchp-content-wrapper">
        <div class="catchp_widget_settings">
            <form id="essential-widgets-main" method="post" action="options.php">

                <h2 class="nav-tab-wrapper">
                    <a class="nav-tab nav-tab-active" id="dashboard-tab" href="#dashboard"><?php esc_html_e( 'Dashboard', 'essential-widgets' ); ?></a>
                    <a class="nav-tab" id="features-tab" href="#features"><?php esc_html_e( 'Features', 'essential-widgets' ); ?></a>
                    <a class="nav-tab" id="premium-extensions-tab" href="#premium-extensions"><?php esc_html_e( 'Compare Table', 'essential-widgets' ); ?></a>
                </h2>

                <div id="dashboard" class="wpcatchtab nosave active">

                    <?php require_once plugin_dir_path( dirname( __FILE__ ) ) . 'partials/dashboard-display.php'; ?>

                    <div id="ctp-switch" class="content-wrapper col-3 ew-main">
                        <div class="header">
                            <h2><?php esc_html_e( 'Catch Themes & Catch Plugins Tabs', 'essential-widgets' ); ?></h2>
                        </div> <!-- .Header -->

                        <div class="content">

                            <p><?php echo esc_html__( 'If you want to turn off Catch Themes & Catch Plugins tabs option in Add Themes and Add Plugins page, please uncheck the following option.', 'essential-widgets' ); ?>
                            </p>
                            <table>
                                <tr>
                                    <td>
                                        <?php echo esc_html__( 'Turn On Catch Themes & Catch Plugin tabs', 'essential-widgets' );  ?>
                                    </td>
                                    <td>
                                        <?php $ctp_options = ctp_get_options(); ?>
                                        <div class="module-header <?php echo $ctp_options['theme_plugin_tabs'] ? 'active' : 'inactive'; ?>">
                                            <div class="switch">
                                                <input type="checkbox" id="ctp_options[theme_plugin_tabs]" class="ctp-switch" rel="theme_plugin_tabs" <?php checked( true, $ctp_options['theme_plugin_tabs'] ); ?> >
                                                <label for="ctp_options[theme_plugin_tabs]"></label>
                                            </div>
                                            <div class="loader"></div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            
                        </div>
                    </div><!-- #ctp-switch -->

                    <div id="go-premium" class="content-wrapper col-2">

                        <div class="header">
                            <h2><?php esc_html_e( 'Go Premium!', 'essential-widgets' ); ?></h2>
                        </div> <!-- .Header -->

                        <div class="content">
                            <button type="button" class="button dismiss">
                                <span class="screen-reader-text"><?php esc_html_e( 'Dismiss this item.', 'essential-widgets' ); ?></span>
                                <span class="dashicons dashicons-no-alt"></span>
                            </button>
                            <ul class="catchp-lists">
                                <li><strong><?php esc_html_e( 'EW: About', 'essential-widgets' ); ?></strong></li>
                                <li><strong><?php esc_html_e( 'EW: Advertisement Code', 'essential-widgets' ); ?></strong></li>
                                <li><strong><?php esc_html_e( 'EW: Advertisement Images', 'essential-widgets' ); ?></strong></li>
                                <li><strong><?php esc_html_e( 'EW: Featured Embeds', 'essential-widgets' ); ?></strong></li>
                                <li><strong><?php esc_html_e( 'EW: Featured Images', 'essential-widgets' ); ?></strong></li>
                                <li><strong><?php esc_html_e( 'EW: Featured Pages', 'essential-widgets' ); ?></strong></li>
                                <li><strong><?php esc_html_e( 'EW: Featured Posts', 'essential-widgets' ); ?></strong></li>
                                <li><strong><?php esc_html_e( 'EW: Gallery Images', 'essential-widgets' ); ?></strong></li>
                                <li><strong><?php esc_html_e( 'EW: Gallery Pages', 'essential-widgets' ); ?></strong></li>
                                <li><strong><?php esc_html_e( 'EW: Gallery Posts', 'essential-widgets' ); ?></strong></li>
                                <li><strong><?php esc_html_e( 'EW: Image', 'essential-widgets' ); ?></strong></li>
                                <li><strong><?php esc_html_e( 'EW: Image Slider', 'essential-widgets' ); ?></strong></li>
                                <li><strong><?php esc_html_e( 'EW: Newletter', 'essential-widgets' ); ?></strong></li>
                                <li><strong><?php esc_html_e( 'EW: Video', 'essential-widgets' ); ?></strong></li>
                                <li><strong><?php esc_html_e( 'EW: Tabbed Recent/Popular Posts', 'essential-widgets' ); ?></strong></li>
                            </ul>

                            <a href="https://catchplugins.com/plugins/essential-widgets-pro/" target="_blank"><?php esc_html_e( 'Find out why you should upgrade to Essential Widgets Premium »', 'essential-widgets' ); ?></a>
                        </div> <!-- .Content -->
                    </div> <!-- #go-premium -->

                </div><!-- .dashboard -->

                <div id="features" class="wpcatchtab save">
                    <div class="content-wrapper col-3">
                        <div class="header">
                            <h3><?php esc_html_e( 'Features', 'essential-widgets' ); ?></h3>

                        </div><!-- .header -->
                        <div class="content">
                            <ul class="catchp-lists">
                                <li>
                                    <strong><?php esc_html_e( 'EW: Archives', 'essential-widgets' ); ?></strong>
                                    <p><?php esc_html_e( 'The Archives widget comes with various customization options. Choose a title, limit the number of posts, select the archive type, post type, order and more with the Archives widget.', 'essential-widgets' ); ?></p>
                                </li>

                                <li>
                                    <strong><?php esc_html_e( 'EW: Authors', 'essential-widgets' ); ?></strong>
                                    <p><?php esc_html_e( 'Displaying the author’s information is kind of a must-have feature if your website has multiple authors. Our new WordPress widgets plugin allows you to add Authors widget. With this widget, you can show the list of the authors on your website, the number of posts, select feed type, and more.', 'essential-widgets' ); ?></p>
                                </li>

                                <li>
                                    <strong><?php esc_html_e( 'EW: Categories', 'essential-widgets' ); ?></strong>
                                    <p><?php esc_html_e( 'Essential Widgets Pro supports Categories widget. The widget provides you with various customizable options such as the title of the widget, taxonomy option, order option, number of categories to show, display as a list or none, number of posts to display, sort by option, select feed type ton display and display as text or image.', 'essential-widgets' ); ?></p>
                                </li>

                                <li>
                                    <strong><?php esc_html_e( 'EW: Menus', 'essential-widgets' ); ?></strong>
                                    <p><?php esc_html_e( 'Bored with the same default menu? Our new WordPress plugin for widgets, Essential Widgets Pro supports Menus widget. With the Menus widget filled with various customization options, you can display your menus elegantly anywhere you want on your website.', 'essential-widgets' ); ?></p>
                                </li>

                                <li>
                                    <strong><?php esc_html_e( 'EW: Pages', 'essential-widgets' ); ?></strong>
                                    <p><?php esc_html_e( 'Display a list of pages with the Pages widget. With various customization options being provided to you, you can showcase the pages that are more important on your website wherever you want with Essential Widgets Pro.', 'essential-widgets' ); ?></p>
                                </li>

                                <li>
                                    <strong><?php esc_html_e( 'EW: Posts', 'essential-widgets' ); ?></strong>
                                    <p><?php esc_html_e( 'Essential Widgets Pro supports Posts widget. With the widget and its customizable options, you can easily display a list of posts on your website. You can add a title, select the post type, number of items to display, order, sort by, and more.', 'essential-widgets' ); ?></p>
                                </li>

                                <li>
                                    <strong><?php esc_html_e( 'EW: Tags', 'essential-widgets' ); ?></strong>
                                    <p><?php esc_html_e( 'And last, but definitely not the least, the Tags widget. You can display a list of tags as cloud or list, select the order of the tags, sort by option and the number of items to be displayed. The widget also provides you with more customization options including the unit, separator, search, text type, and more.', 'essential-widgets' ); ?></p>
                                </li>
                            </ul>
                        <a href="https://catchplugins.com/plugins/essential-widgets-pro/" target="_blank"><?php esc_html_e( 'Upgrade to Essential Widgets Premium »', 'essential-widgets' ); ?></a>
                        </div><!-- .content -->
                    </div><!-- content-wrapper -->
                </div> <!-- Featured -->

                <div id="premium-extensions" class="wpcatchtab  save">

                    <div class="about-text">
                        <h2><?php esc_html_e( 'Get Essential Widgets Pro -', 'essential-widgets' ); ?> <a href="https://catchplugins.com/plugins/essential-widgets-pro/" target="_blank"><?php esc_html_e( 'Get It Here!', 'essential-widgets' ); ?></a></h2>
                        <p><?php esc_html_e( 'You are currently using the free version of Essential Widgets.', 'essential-widgets' ); ?><br />
<a href="https://catchplugins.com/plugins/" target="_blank"><?php esc_html_e( 'If you have purchased from catchplugins.com, then follow this link to the installation instructions (particularly step 1).', 'essential-widgets' ); ?></a></p>
                    </div>

                    <div class="content-wrapper">
                        <div class="header">
                            <h3><?php esc_html_e( 'Compare Table', 'essential-widgets' ); ?></h3>

                        </div><!-- .header -->
                        <div class="content">

                            <table class="widefat fixed striped posts">
                                <thead>
                                    <tr>
                                        <th id="title" class="manage-column column-title column-primary"><?php esc_html_e( 'Features', 'essential-widgets' ); ?></th>
                                        <th id="free" class="manage-column column-free"><?php esc_html_e( 'Free', 'essential-widgets' ); ?></th>
                                        <th id="pro" class="manage-column column-pro"><?php esc_html_e( 'Pro', 'essential-widgets' ); ?></th>
                                    </tr>
                                </thead>

                                <tbody id="the-list" class="ui-sortable">
                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'EW: Menus', 'essential-widgets' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'EW: Pages', 'essential-widgets' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'EW: Posts', 'essential-widgets' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'EW: Tags', 'essential-widgets' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'EW: Archives', 'essential-widgets' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'EW: Authors', 'essential-widgets' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'EW: Categories', 'essential-widgets' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'EW: About', 'essential-widgets' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'EW: Advertisement Codes', 'essential-widgets' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'EW: Advertisement Images', 'essential-widgets' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'EW: Featured Embeds', 'essential-widgets' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'EW: Featured Images', 'essential-widgets' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'EW: Featured Pages', 'essential-widgets' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'EW: Featured Posts', 'essential-widgets' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'EW: Gallery Images', 'essential-widgets' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'EW: Gallery Pages', 'essential-widgets' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'EW: Gallery Posts', 'essential-widgets' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'EW: Newsletter', 'essential-widgets' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'EW: Image', 'essential-widgets' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'EW: Video', 'essential-widgets' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'EW: Image Slider', 'essential-widgets' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'EW: Tabbed Recent/Popular Posts', 'essential-widgets' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                </tbody>

                            </table>

                        </div><!-- .content -->
                    </div><!-- content-wrapper -->
                </div>

            </form><!-- #essential-widgets-main -->

        </div><!-- .catchp_widget_settings -->


        <?php require_once plugin_dir_path( dirname( __FILE__ ) ) . '/partials/sidebar.php'; ?>
    </div> <!-- .catchp-content-wrapper -->

    <?php require_once plugin_dir_path( dirname( __FILE__ ) ) . '/partials/footer.php'; ?>
</div><!-- .wrap -->
