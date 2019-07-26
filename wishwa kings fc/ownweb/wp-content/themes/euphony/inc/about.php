<?php
/**
 * Euphony Theme page
 *
 * @package Euphony
 */

function euphony_about_admin_style( $hook ) {
	if ( 'appearance_page_euphony-about' === $hook ) {
		wp_enqueue_style( 'euphony-about-admin', get_theme_file_uri( 'assets/css/about-admin.css' ), null, '1.0' );
	}
}
add_action( 'admin_enqueue_scripts', 'euphony_about_admin_style' );

/**
 * Add theme page
 */
function euphony_menu() {
	add_theme_page( esc_html__( 'About Theme', 'euphony' ), esc_html__( 'About Theme', 'euphony' ), 'edit_theme_options', 'euphony-about', 'euphony_about_display' );
}
add_action( 'admin_menu', 'euphony_menu' );

/**
 * Display About page
 */
function euphony_about_display() {
	$theme = wp_get_theme();
	?>
	<div class="wrap about-wrap full-width-layout">
		<h1><?php echo esc_html( $theme ); ?></h1>
		<div class="about-theme">
			<div class="theme-description">
				<p class="about-text">
					<?php
					// Remove last sentence of description.
					$description = explode( '. ', $theme->get( 'Description' ) );

					array_pop( $description );

					$description = implode( '. ', $description );

					echo esc_html( $description . '.' );
				?></p>
				<p class="actions">
					<a href="https://catchthemes.com/themes/euphony" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Info', 'euphony' ); ?></a>

					<a href="https://catchthemes.com/demo/euphony" class="button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'euphony' ); ?></a>

					<a href="https://catchthemes.com/themes/euphony/#theme-instructions" class="button button-primary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'euphony' ); ?></a>

					<a href="https://wordpress.org/support/theme/euphony/reviews/#new-post" class="button button-secondary" target="_blank"><?php esc_html_e( 'Rate this theme', 'euphony' ); ?></a>

					<a href="https://catchthemes.com/themes/euphony-pro" class="green button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'euphony' ); ?></a>
				</p>
			</div>

			<div class="theme-screenshot">
				<img src="<?php echo esc_url( $theme->get_screenshot() ); ?>" />
			</div>

		</div>

		<nav class="nav-tab-wrapper wp-clearfix" aria-label="<?php esc_html_e( 'Secondary menu', 'euphony' ); ?>">
			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'euphony-about' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['page'] ) && 'euphony-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'About', 'euphony' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'euphony-about', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Free Vs Pro', 'euphony' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'euphony-about', 'tab' => 'changelog' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Changelog', 'euphony' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'euphony-about', 'tab' => 'import_demo' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'import_demo' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Import Demo', 'euphony' ); ?></a>
		</nav>

		<?php
			euphony_main_screen();

			euphony_free_vs_pro_screen();

			euphony_changelog_screen();

			euphony_import_demo();
		?>

		<div class="return-to-dashboard">
			<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
				<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
					<?php is_multisite() ? esc_html_e( 'Return to Updates', 'euphony' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'euphony' ); ?>
				</a> |
			<?php endif; ?>
			<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'euphony' ) : esc_html_e( 'Go to Dashboard', 'euphony' ); ?></a>
		</div>
	</div>
	<?php
}

/**
 * Output the main about screen.
 */
function euphony_main_screen() {
	if ( isset( $_GET['page'] ) && 'euphony-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) {
	?>
		<div class="feature-section two-col">
			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'euphony' ); ?></h2>
				<p><?php esc_html_e( 'All Theme Options are available via Customize screen.', 'euphony' ) ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'euphony' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Got theme support question?', 'euphony' ); ?></h2>
				<p><?php esc_html_e( 'Get genuine support from genuine people. Whether it\'s customization or compatibility, our seasoned developers deliver tailored solutions to your queries.', 'euphony' ) ?></p>
				<p><a href="https://catchthemes.com/support-forum" class="button button-primary"><?php esc_html_e( 'Support Forum', 'euphony' ); ?></a></p>
			</div>
		</div>
	<?php
	}
}

/**
 * Output the changelog screen.
 */
function euphony_free_vs_pro_screen() {
	if ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap vs-theme-table">
			<div id="compare" aria-labelledby="ui-id-2" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" style="display: block;" aria-hidden="false">
			   <div class="tab-containter">
			      <div class="wrapper">
			         <div class="tab-header">
			            <h2 class="entry-title">Free Vs Pro (Premium)</h2>
			         </div>
			         <div class="compare-table">
			            <div class="hentry">
			            	<table>
								<thead>
									<tr>
										<th>Free</th>
										<th>Features</th>
										<th>Pro (Premium)</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Responsive Design</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Super Easy Setup</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Color Options for various sections</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Base Color Scheme: Dark, Gray and Yellow</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Header Media</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Primary Menu</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Social on Header</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Social on Footer</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Comment Options</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Contant Info</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Excerpt Options</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Featured content: Post</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Featured content: Page</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Featured content: Category</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Featured content: Image</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Featured content: Custom Post Types</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Featured Slider: Post</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Featured Slider: Page</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Featured Slider: Category</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Featured Slider: Custom</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Font Family Options</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Footer Editor Options</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Gallery: Post</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Gallery: Page</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Gallery: Category</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Hero Content:Post</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Hero Content: Page</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Hero Content:Category</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Hero Content:Custom</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Default Layout: Right Sidebar ( Content, Primary Sidebar ) </td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td> Default Layout: Left Sidebar ( Primary Sidebar, Content ) </td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td> Default Layout: No Sidebar </td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td> Default Layout: No Sidebar: Full Width </td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Homepage Layout: Right Sidebar(Content, Primary Side)</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Homepage Layout: Left Sidebar(Primary Side, Content)</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Homepage Layout: No Sidebar</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Homepage Layout: No Sidebar:Full Width</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Homepage/Archive Layout: Left Sidebar</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Homepage Post Column: 1Column</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Homepage Post Column: 3Columns</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Blog/Archive Layout: Right Sidebar(Content, Primary Sidebar)</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Blog/Archive Layout: Left Sidebar(Primary Sidebar, Content)</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Blog/Archive Layout: No Sidebar</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Blog/Archive Layout: No Sidebar:Full Width</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Blog/Posts Column: 1Column</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Blog/Posts Column: 3Column</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Archive Content Layout: Show Excerpt</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Archive Content Layout: Full Content</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Archive Content Layout: Hide Content</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Archive Display Meta: Hide Meta</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Archive Display Meta: Show Meta</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Single Page/Post Image Layout: Post Thumbnail(1060*596)</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Single Page/Post Image Layout: Featured(664*373)</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Single Page/Post Image Layout: Original Image Size</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>WooCommerce Layout</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Logo Slider: Page</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Logo Slider: Post</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Logo Slider: Category</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Logo Slider: Custom</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Menu Options: Classic</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Menu Options: Modern</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Menu Options: Enable/disable search in Primary</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Portfolio: Page</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Portfolio: Post</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Portfolio: Category</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Portfolio: Custom</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Portfolio: Custom Post Type</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Pricing: Post</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Pricing: Page</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Pricing: Category</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Pricing: Custom</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Promotion Headline: Page</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Promotion Headline: Post</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Promotion Headline: Category</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Promotion Headline: Image</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Promotion Sale: Post</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Promotion Sale: Page</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Promotion Sale: Category</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Promotion Sale: Custom</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Pagination Options</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Reservation: Reservation Info(Left Section)</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Reservation: Reservation Form(Right Section)</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Scroll Up Options</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Section Sorter</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Services: Post</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Services: Page</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Services: Category</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Services: Image</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Services: Custom Post Type</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Skills</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Stats: Post</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Stats: Page</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Stats: Category</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Stats: Custom</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Team: Post</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Team: Page</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Team: Category</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Team: Custom</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Testimonials: Post</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Testimonials: Page</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Testimonials: Category</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Testimonials: Custom</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Testimonials: Custom Post Type</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Update Notifier</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Why Choose Us</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>WPML Ready</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>WooCommerce Ready</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
								</tbody>
							</table>
			            </div>
			         </div>
			      </div>
			   </div>
			</div>
		</div>
	<?php
	}
}

/**
 * Output the changelog screen.
 */
function euphony_changelog_screen() {
	if ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) {
		global $wp_filesystem;
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View changelog below:', 'euphony' ); ?></p>

			<?php
				$changelog_file = apply_filters( 'euphony_changelog_file', get_template_directory() . '/readme.txt' );

				// Check if the changelog file exists and is readable.
				if ( $changelog_file && is_readable( $changelog_file ) ) {
					WP_Filesystem();
					$changelog = $wp_filesystem->get_contents( $changelog_file );
					$changelog_list = euphony_parse_changelog( $changelog );

					echo wp_kses_post( $changelog_list );
				}
			?>
		</div>
	<?php
	}
}

/**
 * Parse changelog from readme file.
 * @param  string $content
 * @return string
 */
function euphony_parse_changelog( $content ) {
	// Explode content with ==  to juse separate main content to array of headings.
	$content = explode ( '== ', $content );

	$changelog_isolated = '';

	// Get element with 'Changelog ==' as starting string, i.e isolate changelog.
	foreach ( $content as $key => $value ) {
		if (strpos( $value, 'Changelog ==') === 0) {
	    	$changelog_isolated = str_replace( 'Changelog ==', '', $value );
	    }
	}

	// Now Explode $changelog_isolated to manupulate it to add html elements.
	$changelog_array = explode( '= ', $changelog_isolated );

	// Unset first element as it is empty.
	unset( $changelog_array[0] );

	$changelog = '<pre class="changelog">';
		
	foreach ( $changelog_array as $value) {
		// Replace all enter (\n) elements with </span><span> , opening and closing span will be added in next process.
		$value = preg_replace( '/\n+/', '</span><span>', $value );

		// Add openinf and closing div and span, only first span element will have heading class.
		$value = '<div class="block"><span class="heading">= ' . $value . '</span></div>';

		// Remove empty <span></span> element which newr formed at the end.
		$changelog .= str_replace( '<span></span>', '', $value );
	}

	$changelog .= '</pre>';

	return wp_kses_post( $changelog );
}

/**
 * Import Demo data for theme using catch themes demo import plugin
 */
function euphony_import_demo() {
	if ( isset( $_GET['tab'] ) && 'import_demo' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap demo-import-wrap">
			<div class="feature-section one-col">
			<?php if ( class_exists( 'CatchThemesDemoImportPlugin' ) ) { ?>
				<div class="col card">
					<h2 class="title"><?php esc_html_e( 'Import Demo', 'euphony' ); ?></h2>
					<p><?php esc_html_e( 'You can easily import the demo content using the Catch Themes Demo Import Plugin.', 'euphony' ) ?></p>
					<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=catch-themes-demo-import' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Import Demo', 'euphony' ); ?></a></p>
				</div>
				<?php } 
				else {
					$action = 'install-plugin';
					$slug   = 'catch-themes-demo-import';
					$install_url = wp_nonce_url(
						    add_query_arg(
						        array(
						            'action' => $action,
						            'plugin' => $slug
						        ),
						        admin_url( 'update.php' )
						    ),
						    $action . '_' . $slug
						); ?>
					<div class="col card">
					<h2 class="title"><?php esc_html_e( 'Install Catch Themes Demo Import Plugin', 'euphony' ); ?></h2>
					<p><?php esc_html_e( 'You can easily import the demo content using the Catch Themes Demo Import Plugin.', 'euphony' ) ?></p>
					<p><a href="<?php echo esc_url( $install_url ); ?>" class="button button-primary"><?php esc_html_e( 'Install Plugin', 'euphony' ); ?></a></p>
				</div>
				<?php } ?>
			</div>
		</div>
	<?php
	}
}
