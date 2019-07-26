<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://catchplugins.com
 * @since      1.0.0
 *
 * @package    Essential_Widgets
 * @subpackage Essential_Widgets/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Essential_Widgets
 * @subpackage Essential_Widgets/admin
 * @author     Catch Plugins <info@catchplugins.com>
 */
class Essential_Widgets_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Essential_Widgets_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Essential_Widgets_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		if( isset( $_GET['page'] ) && 'essential-widgets' == $_GET['page'] ) {
			wp_enqueue_style( $this->plugin_name. '-display-dashboard-admin', plugin_dir_url( __FILE__ ) . 'css/essential-widgets-dasbhoard-admin.css', array(), $this->version, 'all' );
			wp_enqueue_style( $this->plugin_name. '-display-dashboard', plugin_dir_url( __FILE__ ) . 'css/admin-dashboard.css', array(), $this->version, 'all' );
		}
		global $pagenow;
		if( 'widgets.php' === $pagenow || 'customize.php' === $pagenow) {
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/essential-widgets-admin.css', array(), $this->version, 'all' );
		}

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Essential_Widgets_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Essential_Widgets_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		if( isset( $_GET['page'] ) && 'essential-widgets' == $_GET['page'] ) {
			wp_enqueue_script( 'minHeight', plugin_dir_url( __FILE__ ) . 'js/jquery.matchHeight.min.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( $this->plugin_name . '-admin-script', plugin_dir_url( __FILE__ ) . 'js/admin-scripts.js', array( 'minHeight', 'jquery' ), $this->version, false );
		}
		global $pagenow;
		if( 'widgets.php' === $pagenow || 'customize.php' === $pagenow ) {
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/essential-widgets-admin.js', array( 'jquery' ), $this->version, false );
		}

	}

	/**
	 * Essential Widgets: action_links
	 * Essential Widgets Settings Link function callback
	 *
	 * @param arrray $links Link url.
	 *
	 * @param arrray $file File name.
	 */
	public function action_links( $links, $file ) {
		if ( $file === $this->plugin_name . '/' . $this->plugin_name . '.php' ) {
			$settings_link = '<a href="' . esc_url( admin_url( 'admin.php?page=essential-widgets' ) ) . '">' . esc_html__( 'Settings', 'essential-widgets' ) . '</a>';

			array_unshift( $links, $settings_link );
		}
		return $links;
	}

	/**
	 * Essential Widgets: add_plugin_settings_menu
	 * add Essential Widgets to menu
	 */
	public function add_plugin_settings_menu() {
		add_menu_page(
			esc_html__( 'Essential Widgets', 'essential-widgets' ),
			esc_html__( 'Essential Widgets', 'essential-widgets' ),
			'manage_options',
			'essential-widgets',
			array( $this, 'settings_page' ),
			'',
			'99.01564'
		);
	}

	/**
	 * Essential Widgets: catch_web_tools_settings_page
	 * Essential Widgets Setting function
	 */
	public function settings_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'You do not have sufficient permissions to access this page.' ) );
		}

		require plugin_dir_path( __FILE__ ) . 'partials/essential-widgets-admin-display.php';
	}

	/**
	 * Essential Widgets: register_settings
	 * Essential Widgets Register Settings
	 */
	public function register_settings() {
		register_setting(
			'essential-widgets-group',
			'essential_widgets_options',
			array( $this, 'sanitize_callback' )
		);
	}

	public function ew_switch() {
		$value = ( 'true' == $_POST['value'] ) ? 1 : 0;

		$option_name = $_POST['option_name'];

		$option_value = essential_widgets_get_options();

		$option_value[$option_name] = $value;

		if( update_option( 'essential_widgets_options', $option_value ) ) {
	    	echo $value;
	    } else {
	    	esc_html_e( 'Connection Error. Please try again.', 'essential-widgets' );
	    }

		wp_die(); // this is required to terminate immediately and return a proper response
	}
}
