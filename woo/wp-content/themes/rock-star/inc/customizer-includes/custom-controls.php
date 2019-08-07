<?php
/**
* The template for adding Customizer Custom Controls
*
* @package Catch Themes
* @subpackage Rock Star
* @since Rock Star 0.3
*/

//Custom control for dropdown category multiple select
class rock_star_customize_dropdown_categories_control extends WP_Customize_Control {
	public $type = 'dropdown-categories';

	public $name;

	public function render_content() {
		$dropdown = wp_dropdown_categories(
			array(
				'name'             => $this->name,
				'echo'             => 0,
				'hide_empty'       => false,
				'show_option_none' => false,
				'hide_if_empty'    => false,
				'show_option_all'  => esc_html__( 'All Categories', 'rock-star' )
			)
		);

		$dropdown = str_replace('<select', '<select multiple = "multiple" style = "height:95px;" ' . $this->get_link(), $dropdown );

		printf(
			'<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
			$this->label,
			$dropdown
		);

		echo '<p class="description">'. esc_html__( 'Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.', 'rock-star' ) . '</p>';
	}
}

//Custom control for dropdown category multiple select
class rock_star_important_links extends WP_Customize_Control {
    public $type = 'important-links';

    public function render_content() {
    	//Add Theme instruction, Support Forum, Changelog, Donate link, Review, Facebook, Twitter, Google+, Pinterest links
        $important_links = array(
			'theme_instructions' => array(
				'link'	=> esc_url( 'https://catchthemes.com/theme-instructions/rock-star/' ),
				'text' 	=> esc_html__( 'Theme Instructions', 'rock-star' ),
			),
			'support' => array(
				'link'	=> esc_url( 'https://catchthemes.com/support/' ),
				'text' 	=> esc_html__( 'Support', 'rock-star' ),
			),
			'changelog' => array(
				'link'	=> esc_url( 'https://catchthemes.com/changelogs/rock-star-theme/' ),
				'text' 	=> esc_html__( 'Changelog', 'rock-star' ),
			)
		);

		foreach ( $important_links as $important_link) {
			echo '<p><a target="_blank" href="' . $important_link['link'] .'" >' . esc_attr( $important_link['text'] ) .' </a></p>';
		}
    }
}