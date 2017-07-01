<?php 

/* Slider */
function my_post_type_slider() {
	register_post_type( 'slider',
		array(
			'label'               => __('Slides'),
			'singular_label'      => __('Slides'),
			'_builtin'            => false,
			'exclude_from_search' => true, // Exclude from Search Results
			'capability_type'     => 'page',
			'public'              => true,
			'show_ui'             => true,
			'show_in_nav_menus'   => false,
			'rewrite' => array(
							'slug'       => 'slide-view',
							'with_front' => FALSE,
						),
			'query_var' => 'slide', // This goes to the WP_Query schema
			'menu_icon' => 'dashicons-slides',
			'supports'  => array(
								'title',
								'thumbnail',
								
							)
		)
	);
}
add_action('init', 'my_post_type_slider');

class dd_slider_meta {

	public function __construct() {

		if ( is_admin() ) {
			add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
			add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
		}

	}
	public function init_metabox() {

		add_action( 'add_meta_boxes',        array( $this, 'add_metabox' )         );
		add_action( 'save_post',             array( $this, 'save_metabox' ), 10, 2 );

	}
	public function add_metabox() {

		add_meta_box(
			'slider',
			__( 'Slider Options', 'text_domain' ),
			array( $this, 'render_metabox' ),
			'slider',
			'normal',
			'default'
		);

	}
	public function render_metabox( $post ) {

		// Retrieve an existing value from the database.
		$slider_caption = get_post_meta( $post->ID, 'slider_caption', true );
		$slider_link = get_post_meta( $post->ID, 'slider_link', true );

		// Set default values.
		if( empty( $slider_caption ) ) $slider_caption = '';
		if( empty( $slider_link ) ) $slider_link = '';

		// Form fields.
		echo '<table class="form-table">';

		echo '	<tr>';
		echo '		<th><label for="slider_caption" class="slider_caption_label">' . __( 'Caption', 'text_domain' ) . '</label>';
				echo '			<p class="description">' . __( 'Input your caption for slide (HTML tags are allowed).', 'text_domain' ) . '</p></th>';
		echo '		<td>';
		wp_editor( $slider_caption, 'slider_caption', array( 'media_buttons' => true ) );
		echo '		</td>';
		echo '	</tr>';

		echo '	<tr>';
		echo '		<th><label for="slider_link" class="slider_link_label">' . __( 'URL', 'text_domain' ) . '</label><p class="description">' . __( 'Input the slide URL (can be external link)', 'text_domain' ) . '</p></th>';
		echo '		<td>';
		echo '			<input type="text" id="slider_link" name="slider_link" class="slider_link_field" placeholder="' . esc_attr__( '', 'text_domain' ) . '" value="' . esc_attr( $slider_link ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '</table>';

	}

	public function save_metabox( $post_id, $post ) {
		// Sanitize user input.
		$slider_new_caption = isset( $_POST[ 'slider_caption' ] ) ? wp_kses_post( $_POST[ 'slider_caption' ] ) : '';
		$slider_new_link = isset( $_POST[ 'slider_link' ] ) ? esc_url( $_POST[ 'slider_link' ] ) : '';

		// Update the meta field in the database.
		update_post_meta( $post_id, 'slider_caption', $slider_new_caption );
		update_post_meta( $post_id, 'slider_link', $slider_new_link );

	}

}

new dd_slider_meta;

/* Header Image */
function my_post_type_header_image() {
	$labels = array(
		'name'               => _x( 'Header Images', 'post type general name'),
		'singular_name'      => _x( 'Header Image', 'post type singular name'),
		'menu_name'          => _x( 'Header Images', 'admin menu'),
		'name_admin_bar'     => _x( 'Header Image', 'add new on admin bar'),
		'add_new'            => _x( 'Add New', 'header image'),
		'add_new_item'       => __( 'Add New Header Image'),
		'new_item'           => __( 'New Header Image'),
		'edit_item'          => __( 'Edit Header Image'),
		'view_item'          => __( 'View Header Images'),
		'all_items'          => __( 'All Header Images'),
		'search_items'       => __( 'Search Header Images'),
		'not_found'          => __( 'No Header Image item found.'),
		'not_found_in_trash' => __( 'No Header Image items found in Trash.')
	);
	register_post_type( 'header_image',
		array(
			'labels'             => $labels,
			'_builtin'          => false,
			'public'            => true,
			'show_ui'           => true,
			'show_in_nav_menus' => true,
			'menu_position'		=> 4,
			'hierarchical'      => true,
			'capability_type'   => 'page',
			'menu_icon'         => 'dashicons-format-image',
			'supports' => array(
								'title',
								'thumbnail',
								)
		)
	);
}
add_action('init', 'my_post_type_header_image');

/* FAQs */
function phi_post_type_faq() {
	register_post_type('faq',
		array(
			'label'               => __("FAQs"),
			'singular_label'      => __("FAQs"),
			'public'              => false,
			'show_ui'             => true,
			'_builtin'            => false, // It's a custom post type, not built in
			'_edit_link'          => 'post.php?post=%d',
			'capability_type'     => 'post',
			'hierarchical'        => false,
			'rewrite'             => array('slug' => 'faq'), // Permalinks
			'query_var'           => 'faq', // This goes to the WP_Query schema
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-editor-help',
			'publicly_queryable'  => true,
			'exclude_from_search' => false,
			'supports'            => array(
										'title',
										'editor',
									),
		)
	);
	register_taxonomy(
		'faq_category',
		'faq',
		array(
			'hierarchical'  => true,
			'label'         => __("FAQ Categories"),
			'singular_name' => __("FAQ Category"),
			'show_admin_column' => true,
			'rewrite'       => true,
			'query_var'     => true
		)
	);
}
add_action('init', 'phi_post_type_faq');

/* ADD Featured image to CPT 
========================================================*/

// GET FEATURED IMAGE
function DD_CPT_get_featured_image($post_ID) {
    $post_thumbnail_id = get_post_thumbnail_id($post_ID);
    if ($post_thumbnail_id) {
        $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'admin_thumb', false);
        return $post_thumbnail_img[0];
    }
}
// ADD NEW COLUMN
function DD_CPT_columns_head($defaults) {
    $defaults['featured_image'] = 'Image';
    return $defaults;
}
 
// SHOW THE FEATURED IMAGE
function DD_CPT_columns_content($column_name, $post_ID) {
    if ($column_name == 'featured_image') {
        $post_featured_image = DD_CPT_get_featured_image($post_ID);
        if ($post_featured_image) {
            echo '<img src="' . $post_featured_image . '" />';
        }
    }
}
add_filter('manage_header_image_posts_columns', 'DD_CPT_columns_head');
add_action('manage_header_image_posts_custom_column', 'DD_CPT_columns_content', 10, 2);
add_filter('manage_slider_posts_columns', 'DD_CPT_columns_head');
add_action('manage_slider_posts_custom_column', 'DD_CPT_columns_content', 10, 2);