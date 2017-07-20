<?php 
// Require Extra Files and Functions

	require_once('lessc.inc.php');
	require_once('less-compile.php'); // Less Compiler
	require_once('cpt-init.php'); 
	require_once('dd-extra-widgets.php');
	require_once('aq_resizer.php'); // Aqua Resizer
	// require_once('functions-woo.php'); // WooCommerce Functionality

// Enqueue Custom Style from LessCompile
function dd_enqueue_styles(){
		wp_enqueue_style('dd-custom-css', get_template_directory_URI() . '/custom.css');
}
add_action('wp_print_styles', 'dd_enqueue_styles', 99);
// Add Admin Style
function load_custom_wp_admin_style() {
        wp_register_style( 'custom_wp_admin_css', get_template_directory_URI() . '/admin/admin.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

// Add Custom Image Sizes
add_image_size( 'admin_thumb', 80, 80, true); //Featured Image for Blog
add_image_size( 'slider-post-thumbnail', 2000, 600, true ); // Slider Thumbnail

// Enqueue Custom Scripts
add_action( 'wp_enqueue_scripts', 'dd_custom_scripts' );
function dd_custom_scripts() {
		wp_register_script( 'duck-custom', get_template_directory_uri() . '/js/duck-custom.js', array ('jquery'), '1.0', true);
		wp_enqueue_script('duck-custom');
		wp_register_script( 'magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array ('jquery'), '1.1.0', true);
		wp_enqueue_script('magnific-popup');
}

function dd_icon_shortcode($atts){
	$atts = shortcode_atts(
		array(
			'icon' => '',
			'size' => '14',
			'color' => '#000'
		), $atts, 'dd_icon' );
		$output = '<i class="dd-'.$atts['icon'].'" style="font-size: '.$atts['size'].'px; color: '.$atts['color'].';"></i>';
		
		return $output;
	}
	
add_shortcode('dd-icon', 'dd_icon_shortcode');

//Column Code
function duck_diver_columns( $atts, $content = null) {
	extract(shortcode_atts(array(
		'class' => '',
		'id' 	=> '',
	), $atts));
	// add divs to the content
		$return = '<div class="' . $class .'"';
		if ($id !== ''){
			 $return .= 'id="'.$id.'"';
		}
	$return .= '>';
	$return .= do_shortcode( $content );
	$return .= '</div>';

	return $return;
}
add_shortcode ('column', 'duck_diver_columns');
add_shortcode ('div', 'duck_diver_columns');
add_shortcode ('col' , 'duck_diver_columns');


// Add Category Column to FAQ

add_filter( 'manage_taxonomies_for_faq_columns', 'faq_type_columns' );
function faq_type_columns( $taxonomies ) {
    $taxonomies[] = 'faq_category';
    return $taxonomies;
}

?>