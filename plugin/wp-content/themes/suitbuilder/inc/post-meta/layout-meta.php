<?php
/**
 * suitbuilder Custom Metabox
 *
 * @package suitbuilder
 */
$suitbuilder_post_types = array(
    'post',
    'page'
);

add_action( 'add_meta_boxes', 'suitbuilder_add_layout_metabox' );

function suitbuilder_add_layout_metabox() {
    global $post;
    $frontpage_id = get_option( 'page_on_front' );
    if ( $post->ID == $frontpage_id ) {
        return;
    }

    global $suitbuilder_post_types;
    foreach ( $suitbuilder_post_types as $post_type ) {
        add_meta_box(
            'suitbuilder_layout_options', // $id
            esc_html__( 'Layout options', 'suitbuilder' ), // $title
            'suitbuilder_layout_options_callback', // $callback
            $post_type, // $page
            'normal', // $context
            'high'// $priority
        );
    }

}
/* suitbuilder sidebar layout */
$suitbuilder_default_layout_options = array(
    'left-sidebar' => array(
        'value'         => 'left-sidebar',
        'label'         => esc_html__( 'Left Sidebar', 'suitbuilder' ),
    ),
    'right-sidebar' => array(
        'value'         => 'right-sidebar',
        'label'         => esc_html__( 'Right Sidebar', 'suitbuilder' ),
    ),
    'no-sidebar' => array(
        'value'         => 'no-sidebar',
        'label'         => esc_html__( 'No Sidebar', 'suitbuilder' ),
    )
);

/* suitbuilder featured layout */
$suitbuilder_single_post_image_align_options = array(
    'full' => array(
        'value'     => 'full',
        'label'     => esc_html__( 'Full', 'suitbuilder' )
    ),
    'right' => array(
        'value'     => 'right',
        'label'     => esc_html__( 'Right ', 'suitbuilder' ),
    ),
    'left' => array(
        'value'     => 'left',
        'label'     => esc_html__( 'Left', 'suitbuilder' ),
    ),
    'no-image' => array(
        'value'     => 'no-image',
        'label'     => esc_html__( 'No Image', 'suitbuilder' )
    )
);

function suitbuilder_layout_options_callback() {

    global $post , $suitbuilder_default_layout_options, $suitbuilder_single_post_image_align_options;
    $suitbuilder_customizer_saved_values = suitbuilder_get_all_options( absint(1) );

    /*suitbuilder-single-post-image-align*/
    $suitbuilder_single_post_image_align = $suitbuilder_customizer_saved_values['suitbuilder-single-post-image-align'];
 
    /*suitbuilder default layout*/
    $suitbuilder_single_sidebar_layout = $suitbuilder_customizer_saved_values['suitbuilder-default-layout'];

    wp_nonce_field( basename( __FILE__ ), 'suitbuilder_layout_options_nonce' );
    ?>
    <table class="form-table page-meta-box">
        <!--Image alignment-->
        <tr>
            <td colspan="4"><em class="f13"><?php esc_html_e( 'Choose Sidebar Template', 'suitbuilder' ); ?></em></td>
        </tr>
        <tr>
            <td>
                <?php
                $suitbuilder_single_sidebar_layout_meta = get_post_meta( $post->ID, 'suitbuilder-default-layout', true );
                if ( false != $suitbuilder_single_sidebar_layout_meta ) {
                   $suitbuilder_single_sidebar_layout = $suitbuilder_single_sidebar_layout_meta;
                }
                foreach ( $suitbuilder_default_layout_options as $field ) {
                    ?>
                    <div class="hide-radio radio-image-wrapper" style="float:left; margin-right:30px;">
                        <input id="<?php echo esc_attr( $field['value'] );  ?>" type="radio" name="suitbuilder-default-layout" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( $field['value'], $suitbuilder_single_sidebar_layout ); ?> /> 
                        <label class="description" for="<?php echo esc_attr( $field['value'] ); ?>">
                            <?php echo esc_html( $field['label'] ); ?>
                        </label>
                    </div>
                <?php } // end foreach
                ?>
                <div class="clear"></div>
            </td>
        </tr>
        <tr>
            <td><em class="f13"><?php esc_html_e( 'You can set up the sidebar content', 'suitbuilder' ); ?> <a href="<?php echo esc_url( admin_url('/widgets.php') ); ?>"><?php esc_html_e( 'here', 'suitbuilder' ); ?></a></em></td>
        </tr>
        <!--Image alignment-->
        <tr>
            <td colspan="4"><?php esc_html_e( 'Featured Image Alignment', 'suitbuilder' ); ?></td>
        </tr>
        <tr>
            <td>
                <?php
                $suitbuilder_single_post_image_align_meta = get_post_meta( $post->ID, 'suitbuilder-single-post-image-align', true );
                if( false != $suitbuilder_single_post_image_align_meta ){
                    $suitbuilder_single_post_image_align = $suitbuilder_single_post_image_align_meta;
                }
                foreach ($suitbuilder_single_post_image_align_options as $field) {
                    ?>
                    <input id="<?php echo esc_attr( $field['value'] ); ?>" type="radio" name="suitbuilder-single-post-image-align" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( $field['value'], $suitbuilder_single_post_image_align ); ?>/> 
                    <label class="description" for="<?php echo esc_attr( $field['value'] ); ?>">
                        <?php echo esc_html( $field['label'] ); ?>
                    </label>
                <?php } // end foreach
                ?>
                <div class="clear"></div>
            </td>
        </tr>
    </table>

<?php }

/**
 * save the custom metabox data
 * @hooked to save_post hook
 */
function suitbuilder_save_sidebar_layout( $post_id ) {
    global $post;

    if ( isset( $_POST['suitbuilder_layout_options_nonce'] ) ) {
        $_POST[ 'suitbuilder_layout_options_nonce' ] = sanitize_text_field( wp_unslash( $_POST[ 'suitbuilder_layout_options_nonce' ] ) );
    }

    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'suitbuilder_layout_options_nonce' ] ) || !wp_verify_nonce( sanitize_key($_POST[ 'suitbuilder_layout_options_nonce' ] ), basename( __FILE__ ) ) ) {
        return;
    }

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( !current_user_can( 'edit_page', $post_id ) ) {
        return $post_id;
    }
    
    if(isset($_POST['suitbuilder-default-layout'])){
        $old = get_post_meta( $post_id, 'suitbuilder-default-layout', true );
        $new = sanitize_text_field( wp_unslash( $_POST['suitbuilder-default-layout'] ) );
        if ( $new && $new != $old ) {
            update_post_meta( $post_id, 'suitbuilder-default-layout', $new );
        } elseif ( '' == $new && $old ) {
            delete_post_meta( $post_id,'suitbuilder-default-layout', $old );
        }
    }

    /*image align*/
    if(isset($_POST['suitbuilder-single-post-image-align'])){
        $old = get_post_meta( $post_id, 'suitbuilder-single-post-image-align', true );
        $new = sanitize_text_field( wp_unslash( $_POST['suitbuilder-single-post-image-align'] ) );
        if ( $new && $new != $old ) {
            update_post_meta( $post_id, 'suitbuilder-single-post-image-align', $new );
        } elseif ( '' == $new && $old ) {
            delete_post_meta( $post_id, 'suitbuilder-single-post-image-align', $old );
        }
    }
}
add_action('save_post', 'suitbuilder_save_sidebar_layout');
