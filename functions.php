<?php

// FUNCTION TO GET FIELD FROM GRIZZLY TABLE
function get_grizzly_option($field) {
	$grizzly_fields = get_option('grizzly_fields');
	$json = json_decode($grizzly_fields);
	if(!empty($json->$field)){
		return $json->$field;
	} else {
		return false;
	}
}

/**
* Required files
*/
include_once get_template_directory() . '/installer/installer.php';
include_once get_template_directory() . '/functionaliteiten/widgetize.php';
include_once get_template_directory() . '/functionaliteiten/thema-opties.php';
include_once get_template_directory() . '/functionaliteiten/duplicate.php';
include_once get_template_directory() . '/functionaliteiten/shortcodes.php';
include_once get_template_directory() . '/functionaliteiten/disable.php';


/**
 * Modify DIVI
 */

add_action( 'wp_print_styles', 'deregister_my_styles', 100 );

function deregister_my_styles() {
	wp_deregister_style( 'et-builder-modules-style' );

	// TODO: fix hieronder, WP topbar css
	// wp_deregister_style( 'dashicons' );
}

/**
* Enqueue scripts
*/
function grizzly_enqueue_scripts() {
	wp_enqueue_style( 'fontawesome', 'https://pro.fontawesome.com/releases/v5.10.2/css/all.css' );
	wp_enqueue_style( 'style.css', get_stylesheet_uri() );
	wp_enqueue_style( 'grizzly-divi-styles', get_template_directory_uri().'/includes/css/divi.css' );
	wp_enqueue_style( 'grizzly-blokken', get_template_directory_uri().'/includes/css/grizzly-blokken.css' );
	
    wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.2.1.slim.min.js' );
	wp_enqueue_script( 'script', get_template_directory_uri() . '/includes/js/script.js');
}
add_action( 'wp_enqueue_scripts', 'grizzly_enqueue_scripts' );

function admin_style() {
	wp_enqueue_style('admin-styles', get_template_directory_uri().'/admin.css');
}
add_action('admin_enqueue_scripts', 'admin_style');


/**
* Add theme support
*/
function grizzly_wp_setup() {
	add_theme_support( 'custom-logo' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'yoast-seo-breadcrumbs' );
	
	// WOOCOMMERCE
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'grizzly_wp_setup' );