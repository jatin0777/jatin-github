<?php
if ( ! function_exists( 'suitbuilder_customizer_get_all_values' ) ) :
    /**
     * Function to get all value
     *
     * @access public
     * @since 1.0.0
     *
     * @param string $suitbuilder_customizer_name
     * @return array || other values
     *
     */
    function suitbuilder_customizer_get_all_values( $suitbuilder_customizer_name_args = null ){
        if( $suitbuilder_customizer_name_args ){
            $suitbuilder_customizer_name = $suitbuilder_customizer_name_args;
        }
        elseif(defined('SUITBUILDER_CUSTOMIZER_NAME')){
            $suitbuilder_customizer_name = SUITBUILDER_CUSTOMIZER_NAME;
        }
        else{
            $suitbuilder_customizer_name = 'suitbuilder_customizer_options';
        }

        if (defined('SUITBUILDER_CUSTOMIZER_OPTION_MODE') && SUITBUILDER_CUSTOMIZER_OPTION_MODE == 1 ) {
            $customizer_values = get_option( $suitbuilder_customizer_name);
        }
        else{
            $customizer_values = get_theme_mod( $suitbuilder_customizer_name );
        }

        return $customizer_values;
    }
endif;