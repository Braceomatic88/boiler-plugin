<?php
/*
	Plugin Name: Boiler Plugin
	Plugin URI: https://.com/
	Description: Boiler Plugin
	Version: 1.0.0
	Author: Second Melody
	Author URI: https://www.secondmelody.com
*/


defined( 'WPINC' ) || die;

include_once 'admin/boiler-plugin-cpt.php';
include_once 'admin/boiler-plugin-tax.php';

add_action( 'wp_enqueue_scripts', 'boiler_plugin_enqueue_public_assets', 100 );
function boiler_plugin_enqueue_public_assets() {
    wp_enqueue_style( 'boiler-plugin-style-css', plugins_url('css/style.css', __FILE__) );

    wp_enqueue_script( 'boiler-plugin-scripts-js', plugins_url( '/js/scripts.js' , __FILE__ ), array( 'jquery' ), '1.0.0', true );
}

// Add archive template
add_filter( 'template_include', 'boiler_plugin_archive_template' );
function boiler_plugin_archive_template( $template ) {

    if ( is_post_type_archive( 'boiler_plugin' ) ) {
        if ( file_exists( plugin_dir_path( __FILE__ ) . 'archive-boiler_plugin.php' ) ) {
            return plugin_dir_path( __FILE__ ) . 'archive-boiler_plugin.php';
        }
    }

    return $template;
}

// Add single post type template
add_filter('single_template', 'boiler_plugin_single_post_template');
function boiler_plugin_single_post_template($single) {

    global $wp_query, $post;

    /* Checks for single template by post type */
    if ( $post->post_type == 'boiler_plugin' ) {
        if ( file_exists( plugin_dir_path( __FILE__ ) . 'single-boiler_plugin.php' ) ) {
            return plugin_dir_path( __FILE__ ) . 'single-boiler_plugin.php';
        }
    }

    return $single;

}

//* Add custom image size for page loop
add_image_size( 'boiler-plugin-thumb', 300, 300, TRUE );

//* Shortcode for page loop
add_shortcode( 'boiler', 'boiler_page_loop');
function boiler_page_loop( $atts ) {
  
    ob_start();
  
    $args = array(
        'posts_per_page'        =>  -1,
        'post_type'             =>  'boiler_plugin',
        'order'                 =>  'ASC',
    ); 

    // The Query
    $the_query = new WP_Query( $args );

    // The Loop
    if ( $the_query->have_posts() ) {
        echo '<div class="boiler-plugin-container">';
        while ( $the_query->have_posts() ) {
            $the_query->the_post();

            ?>
                <img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/placeholder.jpg'; ?>" width="300" height="300">
            <?php

        }
        echo '</div>';
        wp_reset_postdata();
    } else {
        echo 'no posts yet';
    }

    return ob_get_clean();

}