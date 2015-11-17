<?php
/**
 * Peloton functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @package Peloton
 * @subpackage Peloton
 * @since Peloton 1.0
 */

function peloton_theme_setup() {
    
	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
    
    // This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
        'primary' => 'Primary Menu',
        'responsive' => 'Responsive Verical Menu'
	) );
    
    add_image_size( 'custom-size', 350, 350, true );
    
}
add_action('after_setup_theme', 'peloton_theme_setup');

add_filter( 'image_size_names_choose', 'my_custom_sizes' );
 
function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'custom-size' => __( 'Member Photo' ),
    ) );
}


// ====================================
// ADD A MENU PAGE
// ====================================
require get_template_directory() . '/includes/pt_contact_menu.php';


// ====================================
// FOR METABOXES
// ====================================
require get_template_directory() . '/includes/pt_metaboxes.php';

// ====================================
// FOR CORPORATE TRANSACTION CPT
// ====================================
require get_template_directory() . '/includes/pt_cpt_corporate_transactions.php';

// ====================================
// FOR CORPORATE TRANSACTION PEOPLE
// ====================================
require get_template_directory() . '/includes/pt_cpt_people.php';

// ====================================
// FOR THEME OPTIONS
// ====================================
//require get_template_directory() . '/includes/pt_theme_options.php';



// ====================================
// CUSTOM ADMIN STYLES
// ====================================
function load_custom_wp_admin_style() {
        wp_register_style( 'custom_pt_admin_css', get_template_directory_uri() . '/assets/css/adminstyle.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_pt_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );
?>