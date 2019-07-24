<?php
/**
 * Repeated value handling overrite
 * @param  array $reset_options
 * @return void
 *
 * @since suitbuilder 1.0.0
 */
if ( ! function_exists( 'suitbuilder_customizer_get_repeated_all_value' ) ) :
    function suitbuilder_customizer_get_repeated_all_value ( $repeated, $repeated_saved_values_name ) {

        $suitbuilder_customizer_get_all_values = suitbuilder_customizer_get_all_values( );
        $get_repeated_all_value = array();
        for ( $i = 1; $i <= $repeated; $i++ ){
            foreach( $repeated_saved_values_name as $suitbuilder_repeated_saved_value_name ){
                if( isset($suitbuilder_customizer_get_all_values[$suitbuilder_repeated_saved_value_name.'_'.$i]) ){
                    $get_repeated_all_value[$i][$suitbuilder_repeated_saved_value_name] = $suitbuilder_customizer_get_all_values[$suitbuilder_repeated_saved_value_name.'_'.$i];
                }
            }
        }
        return $get_repeated_all_value;
    }
endif;