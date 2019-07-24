<?php
/*I have added it through action so that it is flexible to the developer to adapt change*/
add_action('suitbuilder_customizer_add_setting_control','suitbuilder_customizer_add_setting_control_callback', 12, 5);

if ( ! function_exists( 'suitbuilder_customizer_add_setting_control_callback' ) ) :
    /**
     * Function to add customizer setting and controls
     *
     * @access public
     * @since 1.0.0
     *
     * @param object $suitbuilder_customizer_wp_customize
     * @param string $suitbuilder_customizer_customizer_name common name for all setting and controls
     * @param array $suitbuilder_customizer_basic_control_types
     * @param string $suitbuilder_customizer_setting_control_key
     * @param array $suitbuilder_customizer_settings_control
     * @return void
     *
     */
    function suitbuilder_customizer_add_setting_control_callback( $suitbuilder_customizer_wp_customize, $suitbuilder_customizer_customizer_name, $suitbuilder_customizer_basic_control_types, $suitbuilder_customizer_setting_control_key, $suitbuilder_customizer_settings_control ){
        $suitbuilder_customizer_wp_customize->add_setting( esc_attr( $suitbuilder_customizer_customizer_name.'['.$suitbuilder_customizer_setting_control_key.']' ), $suitbuilder_customizer_settings_control['setting']);

        $suitbuilder_customizer_control_field_type = $suitbuilder_customizer_settings_control['control']['type'];

        /*check if basic control types*/
        if ( in_array( $suitbuilder_customizer_control_field_type, $suitbuilder_customizer_basic_control_types ) ) {
            $suitbuilder_customizer_wp_customize->add_control( esc_attr( $suitbuilder_customizer_customizer_name.'['.$suitbuilder_customizer_setting_control_key.']' ), $suitbuilder_customizer_settings_control['control']);

        }
        else {
            /*Check for default WP_Customize_Custom_Control defined*/
            $suitbuilder_customizer_Explode_Customize_Custom_Control_class_name = explode('_', strtolower( $suitbuilder_customizer_control_field_type ));
            $suitbuilder_customizer_Ucfirst_Customize_Custom_Control_class_name_array = array_map('ucfirst', $suitbuilder_customizer_Explode_Customize_Custom_Control_class_name);
            $suitbuilder_customizer_Implode_Customize_Custom_Control_class_name = implode('_', $suitbuilder_customizer_Ucfirst_Customize_Custom_Control_class_name_array);

            $suitbuilder_customizer_New_Customize_Custom_Control_class_name = 'WP_Customize_'.$suitbuilder_customizer_Implode_Customize_Custom_Control_class_name.'_Control';
            $suitbuilder_customizer_customizer_class_exist = false;
            if ( class_exists( $suitbuilder_customizer_New_Customize_Custom_Control_class_name ) ) {
                $suitbuilder_customizer_customizer_class_exist = true;
            }
            else{
                $suitbuilder_customizer_New_Customize_Custom_Control_class_name = 'Suitbuilder_Customizer_'.$suitbuilder_customizer_Implode_Customize_Custom_Control_class_name.'_Control';
                if ( class_exists( $suitbuilder_customizer_New_Customize_Custom_Control_class_name ) ) {
                    $suitbuilder_customizer_customizer_class_exist = true;
                }
            }
            if($suitbuilder_customizer_customizer_class_exist){
                $suitbuilder_customizer_wp_customize->add_control(
                    new $suitbuilder_customizer_New_Customize_Custom_Control_class_name(
                        $suitbuilder_customizer_wp_customize,
                        esc_attr( $suitbuilder_customizer_customizer_name.'['.$suitbuilder_customizer_setting_control_key.']'),
                        $suitbuilder_customizer_settings_control['control']
                    )
                );
            }

        }
    }
endif;