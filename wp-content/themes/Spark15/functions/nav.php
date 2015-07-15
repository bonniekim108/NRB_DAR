<?php 
	
	/** 
	  * Register Sidebars
	**/

add_action( 'init', 'spark_menus' );

function spark_menus() {
	register_nav_menus(
		array(
			'main' => __( 'Main Menu' )
		)
	);
}


?>
