<?php
/**
 * Widget registration and area 
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Uno Blog 1.0
 *
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wg_theme_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'uno' ),
		'id'            => 'sidebar',
        'description'   => esc_html__( 'Uno Blog SideBar', 'uno' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="sidebar-title">',
		'after_title'   => '</h4>',
	) );
	
    /*
     * Pages Widget Variables and registration
    **/
	$footer_before_widget =  '<div id="%1$s" class="pages-widget col-md-123 col-sm-12 %2$s">';
	$footer_after_widget  =  '</div></div><!-- pages widget /-->';
	$footer_before_title  =  '<div class="pages-widget-top"><h5 class="widget-title">';
	$footer_after_title   =  '</h5></div>
                                <div class="pages-widget-container">';
                        
    register_sidebar( array(
        'name'          => esc_html__( 'Pages Content', 'uno' ),
        'id'            => 'pages-widget-area',
		'description'   => esc_html__( 'Appears only at pages.', 'uno' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="sidebar-title">',
		'after_title'   => '</h4>',
		/* 
        'before_widget' => $footer_before_widget,
        'after_widget'  => $footer_after_widget,
        'before_title'  => $footer_before_title,
        'after_title'   => $footer_after_title, */
    ) );
	
    /*
     * Footer Widget Variables and registration
    **/
	$footer_before_widget =  '<div id="%1$s" class="footer-widget col-md-3 col-sm-6 %2$s">';
	$footer_after_widget  =  '</div></div><!-- .widget /-->';
	$footer_before_title  =  '<div class="footer-widget-top"><h5 class="widget-title">';
	$footer_after_title   =  '</h5></div>
                                <div class="footer-widget-container">';
                        
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Content', 'uno' ),
        'id'            => 'footer-widget-area',
        'description'   => esc_html__( 'Appears at the bottom of the content on posts and pages.', 'uno' ),
        'before_widget' => $footer_before_widget,
        'after_widget'  => $footer_after_widget,
        'before_title'  => $footer_before_title,
        'after_title'   => $footer_after_title,
	) );
	
			
	/*
     * Woocomerce and Shop Side bar Registration.
    **/	
/*	if (class_exists('Woocommerce')){
		register_sidebar( array(
			'name'          => esc_html__( 'Shop Content - For WooCommerce Pages', 'uno' ),
			'id'            => 'woosidebar',
			'description'   => esc_html__( 'Appears at the side of Shop & Products pages.', 'uno' ),
			'before_widget' => '<div id="%1$s" class="widget col-md-3 col-sm-6 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		) );
	}*/
	
}
add_action( 'widgets_init', 'wg_theme_widgets_init' );