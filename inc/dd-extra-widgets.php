<?php 

function duck_diver_extra_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets Left', 'duck_diver_theme' ),
		'id'            => 'left-footer-widgets',
		'description'   => 'In the footer on the left side',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
		// Footer Widget Area 1
	// Location: at the top of the footer, above the copyright
	register_sidebar( array(
		'name'          => __("Footer 1"),
		'id'            => 'footer-sidebar-1',
		'description'   => __("Footer Column 1"),
		'before_widget' => '<div id="%1$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	// Footer Widget Area 2
	// Location: at the top of the footer, above the copyright
	register_sidebar( array(
		'name'          => __("Footer 2"),
		'id'            => 'footer-sidebar-2',
		'description'   => __("Footer Column 2"),
		'before_widget' => '<div id="%1$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	// Footer Widget Area 3
	// Location: at the top of the footer, above the copyright
	register_sidebar( array(
		'name'          => __("Footer 3"),
		'id'            => 'footer-sidebar-3',
		'description'   => __("Footer Column 3"),
		'before_widget' => '<div id="%1$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	// Cart Holder
register_sidebar(array(
		'name'          => __( "Cart Holder", "themeWoo" ),
		'id'            => 'cart-holder',
		'description'   => __( "Widget for cart in Header", "themeWoo" ),
		'before_widget' => '<div id="%1$s" class="cart-holder">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	));
	register_sidebar( array(
		'name'          => __("Header Right Logo"),
		'id'            => 'header-widget-2',
		'description'   => __("Extra Logo for the right side"),
		'before_widget' => '<div id="%1$s" class="header-logo-right">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'duck_diver_extra_widgets_init' );