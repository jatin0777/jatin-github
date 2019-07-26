<?php
if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

class Antreas_Customize_Dimensions_Control extends WP_Customize_Control {

	public function enqueue() {
		wp_enqueue_script( 'antreas-dimensions-control', ANTREAS_ASSETS_JS . 'customizer-controls/dimensions-control.js', array( 'jquery', 'customize-controls' ), ANTREAS_VERSION );
	}

	public function get_dimensions() {

		$current_value = $this->value();

		if ( ! $current_value ) {
			$current_value = array(
				'width'  => '',
				'height' => '',
			);

			$custom_logo = get_theme_mod( 'custom_logo' );
			if ( $custom_logo ) {
				$logo = wp_get_attachment_image_src( $custom_logo, 'full' );
				if ( is_array( $logo ) ) {
					$current_value['width']  = $logo[1];
					$current_value['height'] = $logo[2];
				}
			}
		}

		return $current_value;

	}

	public function render_content() {

		$dimensions = $this->get_dimensions();
		?>

	 	<div class="antreas-logo-dimensions">
			<div>
				<label for="<?php echo esc_attr( $this->id ); ?>-width"><?php esc_html_e( 'Logo Width:', 'antreas' ); ?></label>
				<input type="number" min="0" id="<?php echo esc_attr( $this->id ); ?>-width" value="<?php echo esc_attr( $dimensions['width'] ); ?>">
			</div>
			 <div>
				<label for="<?php echo esc_attr( $this->id ); ?>-height"><?php esc_html_e( 'Logo Height:', 'antreas' ); ?></label>
				<input type="number" min="0" id="<?php echo esc_attr( $this->id ); ?>-height" value="<?php echo esc_attr( $dimensions['height'] ); ?>">
			</div>
		</div>

		<?php
	}

}
