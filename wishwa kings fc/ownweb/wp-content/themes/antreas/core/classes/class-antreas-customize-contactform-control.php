<?php
if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

class Antreas_Customize_ContactForm_Control extends WP_Customize_Control {

	public function enqueue() {
		wp_enqueue_script( 'antreas-contactform-control', ANTREAS_ASSETS_JS . 'customizer-controls/contactform-control.js', array( 'jquery', 'customize-controls' ), ANTREAS_VERSION );
	}

	public function is_kaliforms_active() {
		return defined( 'KALIFORMS_VERSION' );
	}

	public function get_kaliforms() {
		$contact_forms = array();

		$args       = array(
			'post_type'      => 'kaliforms_forms',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
		);
		$kali_forms = new WP_Query( $args );
		if ( $kali_forms->have_posts() ) {
			foreach ( $kali_forms->posts as $kali_form ) {
				$contact_forms[ $kali_form->ID ] = $kali_form->post_title;
			}
		}
		return $contact_forms;
	}

	public function render_content() {

		$form_id       = antreas_get_option( 'form_id' );
		$plugin_data  = array(
			'label'      => 'Kali Forms',
			'slug'       => 'kali-forms',
			'backendUrl' => 'post-new.php?post_type=kaliforms_forms',
		);
		?>

		<?php if ( ! $this->is_kaliforms_active() ) : ?>
			<p><?php _e( 'There are no contact form plugins activated. Please activate KaliForms.', 'antreas' ); ?></p>
		<?php else: ?>
			<?php $forms = $this->get_kaliforms(); ?>
			<div class="cpotheme_contact_control__<?php echo $plugin_data['slug']; ?>">
				<?php if ( ! empty( $forms ) ) : ?>
					<span class="customize-control-title"><?php _e( 'Select form', 'antreas' ); ?></span>
					<select>
						<option value="default"><?php _e( 'Select form', 'antreas' ); ?></option>
						<?php foreach ( $forms as $id => $form_title ) : ?>
							<option value="<?php echo $id; ?>" <?php echo $form_id == $id ? 'selected' : ''; ?>><?php echo $form_title; ?></option>
						<?php endforeach; ?>
					</select>
				<?php else: ?>
					<?php printf(  '<p>%s <a href="' . admin_url( $plugin_data['backendUrl'] ) . '">%s</a></p>', __( 'In order to use contact section you need to', 'antreas' ), __( 'add a contact form', 'antreas' ) );  ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php
	}

}
