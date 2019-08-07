<?php
/**
 * The template for displaying meta box in page/post
 *
 * This adds Layout Options, Select Sidebar, Header Freatured Image Options, Single Page/Post Image Layout
 * This is only for the design purpose and not used to save any content
 *
 * @package Catch Themes
 * @subpackage Rock Star
 * @since Rock Star 0.3
 */


/**
 * Class to Renders and save metabox options
 *
 * @since Rock Star 0.3
 */
class rock_star_metabox {
	private $meta_box;

	private $fields;

	/**
	* Constructor
	*
	* @since Rock Star 0.3
	*
	* @access public
	*
	*/
	public function __construct( $meta_box_id, $meta_box_title, $post_type ) {

		$this->meta_box = array (
							'id' 		=> $meta_box_id,
							'title' 	=> $meta_box_title,
							'post_type' => $post_type,
							);

		$this->fields = array(
								'rock-star-layout-option',
								'rock-star-header-image',
								'rock-star-featured-image',
							);


		// Add metaboxes
		add_action( 'add_meta_boxes', array( $this, 'add' ) );

		add_action( 'save_post', array( $this, 'save' ) );
   	}

	/**
	* Add Meta Box for multiple post types.
	*
	* @since Rock Star 0.3
	*
	* @access public
	*/
	public function add( $post_type ) {
		add_meta_box( $this->meta_box['id'], $this->meta_box['title'], array( $this, 'show' ), $post_type, 'side', 'high' );
	}

	/**
	* Renders metabox
	*
	* @since Rock Star 0.3
	*
	* @access public
	*/
	public function show() {
		global $post;

		$layout_options			= rock_star_metabox_layouts();
		$featured_image_options	= rock_star_metabox_featured_image_options();
		$header_image_options 	= rock_star_metabox_header_featured_image_options();


	    // Use nonce for verification
	    wp_nonce_field( basename( __FILE__ ), 'rock_star_custom_meta_box_nonce' );

	    // Begin the field table and loop  ?>
	     <p class="post-attributes-label-wrapper"><label class="post-attributes-label" for="rock-star-layout-option"><?php esc_html_e( 'Layout Options', 'rock-star' ); ?></label></p>
		<select class="widefat" name="rock-star-layout-option" id="rock-star-layout-option">
			 <?php
				$meta_value = get_post_meta( $post->ID, 'rock-star-layout-option', true );

				if ( empty( $meta_value ) ){
					$meta_value = 'default';
				}

				foreach ( $layout_options as $field =>$label ) {
				?>
					<option value="<?php echo esc_attr( $label['value'] ); ?>" <?php selected( $meta_value, $label['value'] ); ?>><?php echo esc_html( $label['label'] ); ?></option>
				<?php
				} // end foreach
			?>
		</select>

		<p class="post-attributes-label-wrapper"><label class="post-attributes-label" for="rock-star-header-image"><?php esc_html_e( 'Header Featured Image Options', 'rock-star' ); ?></label></p>
		<select class="widefat" name="rock-star-header-image" id="rock-star-header-image">
			 <?php
				$meta_value = get_post_meta( $post->ID, 'rock-star-header-image', true );

				if ( empty( $meta_value ) ){
					$meta_value = 'default';
				}

				foreach ( $header_image_options as $field =>$label ) {
				?>
					<option value="<?php echo esc_attr( $label['value'] ); ?>" <?php selected( $meta_value, $label['value'] ); ?>><?php echo esc_html( $label['label'] ); ?></option>
				<?php
				} // end foreach
			?>
		</select>

		<p class="post-attributes-label-wrapper"><label class="post-attributes-label" for="rock-star-featured-image"><?php esc_html_e( 'Single Page/Post Image Layout', 'rock-star' ); ?></label></p>
		<select class="widefat" name="rock-star-featured-image" id="rock-star-featured-image">
			 <?php
				$meta_value = get_post_meta( $post->ID, 'rock-star-featured-image', true );

				if ( empty( $meta_value ) ){
					$meta_value = 'default';
				}

				foreach ( $featured_image_options as $field =>$label ) {
				?>
					<option value="<?php echo esc_attr( $label['value'] ); ?>" <?php selected( $meta_value, $label['value'] ); ?>><?php echo esc_html( $label['label'] ); ?></option>
				<?php
				} // end foreach
			?>
		</select>
	<?php
	}

	/**
	 * Save custom metabox data
	 *
	 * @action save_post
	 *
	 * @since Rock Star 0.3
	 *
	 * @access public
	 */
	public function save( $post_id ) {
		global $post_type;

		$post_type_object = get_post_type_object( $post_type );

	    if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )                      // Check Autosave
	    || ( ! isset( $_POST['post_ID'] ) || $post_id != $_POST['post_ID'] )        // Check Revision
	    || ( ! in_array( $post_type, $this->meta_box['post_type'] ) )                  // Check if current post type is supported.
	    || ( ! check_admin_referer( basename( __FILE__ ), 'rock_star_custom_meta_box_nonce') )    // Check nonce - Security
	    || ( ! current_user_can( $post_type_object->cap->edit_post, $post_id ) ) )  // Check permission
	    {
	      return $post_id;
	    }

	    foreach ( $this->fields as $field ) {
			$old = get_post_meta( $post_id, $field, true);

			$new = $_POST[ $field ];

			delete_post_meta( $post_id, $field );

			if ( '' == $new || array() == $new ) {
				return;
			}
			else {
				if ( ! update_post_meta ($post_id, $field, sanitize_key ( $new ) ) ) {
					add_post_meta($post_id, $field, sanitize_key ( $new ), true );
				}
			}
		} // end foreach
	}
}

$rock_star_metabox = new rock_star_metabox(
	'rock-star-options', 					//metabox id
	__( 'Rock Star Options', 'rock-star' ), //metabox title
	array( 'page', 'post' )				//metabox post types
);
