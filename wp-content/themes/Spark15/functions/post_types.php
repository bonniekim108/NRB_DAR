<?php 
	
	/** 
	  * Register Post Types
	**/

	// register_post_type( $post_type, $args );


	//Project Post Type
	$label = array(
		'name'	=>	'Projects'
		,'singular_name'	=> 'Project'
	);

	$projectArgs = array(
		'labels'	=>	$label
		,'public'	=>	true
		,'supports'	=>	array('title','thumbnail')
	);

	register_post_type( 'Project', $projectArgs );	

	//Team Post Type
	add_action( 'init', 'oa_my_taxonomies', 0 );
	function oa_my_taxonomies(){
		register_taxonomy( 
			'member_type', 
			'member', 
	        array(  
	            // 'hierarchical' => true, 
	            'public' => true, 
	            'label' => 'Member Type',  //Display name
	            'query_var' => true,
	            'rewrite' => array(
	                'slug' => 'member_type' // This controls the base slug that will display before each term
	        	) 
	        )
		);
	}
	$label = array(
		'name'	=>	'Team'
		,'singular_name'	=> 'Member'
	);

	$teamArgs = array(
		'labels'	=>	$label
		,'public'	=>	true
		,'rewrite' => array('slug' => 'member')
		,'supports'	=>	array('title', 'thumbnail')
		,'taxonomies' => array( 'member_type')
	);

	register_post_type( 'member', $teamArgs );	

	// flush_rewrite_rules();
?>