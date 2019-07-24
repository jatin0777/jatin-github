<?php 
/*image alignment single post*/
if( ! function_exists( 'suitbuilder_single_post_image_align' ) ) :
    /**
     * suitbuilder default layout function
     *
     * @since  suitbuilder 1.0.0
     *
     * @param int
     * @return string
     */
    function suitbuilder_single_post_image_align( $post_id = null ){
        global $suitbuilder_customizer_all_values,$post;
        if( null == $post_id && isset ( $post->ID ) ){
            $post_id = $post->ID;
        }
        $suitbuilder_single_post_image_align = $suitbuilder_customizer_all_values['suitbuilder-single-post-image-align'];
       
        $suitbuilder_single_post_image_align_meta = get_post_meta( $post_id, 'suitbuilder-single-post-image-align', true );

        if( false != $suitbuilder_single_post_image_align_meta ) {
            $suitbuilder_single_post_image_align = $suitbuilder_single_post_image_align_meta;
        }
        return $suitbuilder_single_post_image_align;
    }
endif;