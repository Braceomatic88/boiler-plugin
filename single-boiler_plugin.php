<?php

// Add body class to the head.
add_filter( 'body_class', 'boiler_plugin_add_single_body_class' );
function boiler_plugin_add_single_body_class( $classes ) {

	$classes[] = 'boiler-plugin';

	return $classes;

}

// Add custom archive loop
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'boiler_plugin_single_loop' );
function boiler_plugin_single_loop() {

	?>
	<!-- HTML Here: Delete this function if a custom loop isn't needed -->
	<?php
}


genesis();