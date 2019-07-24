<?php
if ( !function_exists('suitbuilder_excerpt_length') ) :
     /**
     * Excerpt length
     *
     * @since suitbuilder 1.0.0
     *
     * @param null
     * @return int
     */
    function suitbuilder_excerpt_length( $length ) {
        global $suitbuilder_customizer_all_values;

        if( is_admin() ){
            return $length;
        }

        $excerpt_length = $suitbuilder_customizer_all_values['suitbuilder-latest-blog-excerpt-lenght'];        
        if ( !$excerpt_length ) {
            $excerpt_length = $length;
        }
        return absint( $excerpt_length );
    }
endif;
add_filter( 'excerpt_length', 'suitbuilder_excerpt_length' );


if ( ! function_exists( 'suitbuilder_implement_read_more' ) ) :

    /**
     * Implement read more in excerpt.
     *
     * @since 1.0.0
     *
     * @param string $more The string shown within the more link.
     * @return string The excerpt.
     */
    function suitbuilder_implement_read_more( $more ) {
        global $suitbuilder_customizer_all_values;

        $flag_apply_excerpt_read_more = apply_filters( 'suitbuilder_filter_excerpt_read_more', true );
        if ( true !== $flag_apply_excerpt_read_more ) {
            return $more;
        }

        $output = $more;

        if( 1 == $suitbuilder_customizer_all_values['suitbuilder-latest-blog-enable-button'] ){
            $read_more_text = esc_html__('Read more','suitbuilder');
        }
        if ( ! empty( $read_more_text ) ) {
            $output = ' <div class="read-more-text"><a href="' . esc_url( get_permalink() ) . '" class="read-more">' . $read_more_text . '</a></div>';
            $output = apply_filters( 'suitbuilder_filter_read_more_link' , $output );
        }
        return $output;

    }

endif;

add_action( 'excerpt_more', 'suitbuilder_implement_read_more' );