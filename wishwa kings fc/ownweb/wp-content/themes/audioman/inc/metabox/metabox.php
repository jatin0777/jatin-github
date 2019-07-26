<?php
/**
 * The template for displaying meta box in page/post
 *
 * This adds Select Sidebar, Header Featured Image Options, Single Page/Post Image
 * This is only for the design purpose and not used to save any content
 *
 * @package Audioman
 */



/**
 * Class to Renders and save metabox options
 *
 * @since Audioman 1.0
 */
class Audioman_Metabox {
	private $meta_box;

	private $fields;

	/**
	* Constructor
	*
	* @since Audioman 1.0
	*
	* @access public
	*
	*/
	public function __construct( $meta_box_id, $meta_box_title, $post_type ) {

		$this->meta_box = array (
			'id'        => $meta_box_id,
			'title'     => $meta_box_title,
			'post_type' => $post_type,
		);

		// Add metaboxes
		add_action( 'add_meta_boxes', array( $this, 'add' ) );

		add_action( 'save_post', array( $this, 'save' ) );
	}

	/**
	* Add Meta Box for multiple post types.
	*
	* @since Audioman 1.0
	*
	* @access public
	*/
	public function add( $post_type ) {
		add_meta_box( $this->meta_box['id'], $this->meta_box['title'], array( $this, 'show' ), $post_type, 'side', 'high' );
	}

	/**
	* Renders metabox
	*
	* @since Audioman 1.0
	*
	* @access public
	*/
	public function show() {
		global $post;

		$header_image_options = array(
			'default' => esc_html__( 'Default', 'audioman' ),
			'enable'  => esc_html__( 'Enable', 'audioman' ),
			'disable' => esc_html__( 'Disable', 'audioman' ),
		);

		// Use nonce for verification
		wp_nonce_field( basename( __FILE__ ), 'audioman_custom_meta_box_nonce' );
		
		?>
		<p class="post-attributes-label-wrapper"><label class="post-attributes-label" for="audioman-header-image"><?php esc_html_e( 'Header Featured Image Options', 'audioman' ); ?></label></p>
		<select class="widefat" name="audioman-header-image" id="audioman-header-image">
			 <?php
				$meta_value = get_post_meta( $post->ID, 'audioman-header-image', true );
				
				if ( empty( $meta_value ) ){
					$meta_value='default';
				}
				
				foreach ( $header_image_options as $field =>$label ) {	
				?>
					<option value="<?php echo esc_attr( $field ); ?>" <?php selected( $meta_value, $field ); ?>><?php echo esc_html( $label ); ?></option>
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
	 * @since Audioman 1.0
	 *
	 * @access public
	 */
	public function save( $post_id ) {
		global $post_type;

		$post_type_object = get_post_type_object( $post_type );

		if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )                      // Check Autosave
		|| ( ! isset( $_POST['post_ID'] ) || $post_id != $_POST['post_ID'] )        // Check Revision
		|| ( ! in_array( $post_type, $this->meta_box['post_type'] ) )                  // Check if current post type is supported.
		|| ( ! check_admin_referer( basename( __FILE__ ), 'audioman_custom_meta_box_nonce') )    // Check nonce - Security
		|| ( ! current_user_can( $post_type_object->cap->edit_post, $post_id ) ) )  // Check permission
		{
		  return $post_id;
		}

		if ( ! update_post_meta ( $post_id, 'audioman-header-image', sanitize_key( $new ) ) ) {
			add_post_meta( $post_id, 'audioman-header-image', sanitize_key( $new ), true );
		}
	}
}

$audioman_metabox = new Audioman_Metabox(
	'audioman-options',                  //metabox id
	esc_html__( 'Audioman Options', 'audioman' ), //metabox title
	array( 'page', 'post' )             //metabox post types
);
