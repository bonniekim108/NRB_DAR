<?php
/*
*	Spark Post Styles
*
*/

function my_mce_before_init_insert_formats( $init_array ) {  
	// Define the style_formats array
	$style_formats = array(  
		// Each array child is a format with it's own settings
		array(  
			'title' => 'P1',  
			'selector' => 'p,h1,h2,h3,h4,h5,h6',
			'block'	=> 'p', 
			'classes' => 'p1',
			'wrapper' => false,
		),
		array(  
			'title' => 'P2',  
			'selector' => 'p,h1,h2,h3,h4,h5,h6',
			'block'	=> 'p', 
			'classes' => 'p2',
			'wrapper' => false,
		),
		array(  
			'title' => 'P3',  
			'selector' => 'p,h1,h2,h3,h4,h5,h6',
			'block'	=> 'p', 
			'classes' => 'p3',
			'wrapper' => false,
		),
		array(  
			'title' => 'P4',  
			'selector' => 'p,h1,h2,h3,h4,h5,h6',
			'block'	=> 'p', 
			'classes' => 'p4',
			'wrapper' => false,
		),
		array(  
			'title' => 'P5',  
			'selector' => 'p,h1,h2,h3,h4,h5,h6',
			'block'	=> 'p', 
			'classes' => 'p5',
			'wrapper' => false,
		),

		array(  
			'title' => 'Q1',  
			'selector' => 'p,h1,h2,h3,h4,h5,h6',
			'block'	=> 'p', 
			'classes' => 'q1',
			'wrapper' => false,
		),
		array(  
			'title' => 'Q2',  
			'selector' => 'p,h1,h2,h3,h4,h5,h6',
			'block'	=> 'p', 
			'classes' => 'q2',
			'wrapper' => false,
		),
		array(  
			'title' => 'Thick Rule',  
			'selector' => 'p,h1,h2,h3,h4,h5,h6',  
			'classes' => 'rule-1',
			'wrapper' => false,
		),
		array(  
			'title' => 'Thin Rule',  
			'selector' => 'p,h1,h2,h3,h4,h5,h6',  
			'classes' => 'rule-2',
			'wrapper' => false,
		),
		array(  
			'title' => 'Break 1',  
			'selector' => 'p,h1,h2,h3,h4,h5,h6',   
			'classes' => 'break-1',
			'wrapper' => false,
		),
		array(  
			'title' => 'Break 2',  
			'selector' => 'p,h1,h2,h3,h4,h5,h6',   
			'classes' => 'break-2',
			'wrapper' => false,
		),

		// Columns
		array(  
			'title' => '1 Column',  
			'selector' => 'p,h1,h2,h3,h4,h5,h6',
			'block'	=> 'p', 
			'classes' => 'span-1',
			'wrapper' => false,
		),
		array(  
			'title' => '2 Column',  
			'selector' => 'p,h1,h2,h3,h4,h5,h6',
			'block'	=> 'p', 
			'classes' => 'span-2',
			'wrapper' => false,
		),
		array(  
			'title' => '3 Column',  
			'selector' => 'p,h1,h2,h3,h4,h5,h6',
			'block'	=> 'p', 
			'classes' => 'span-3',
			'wrapper' => false,
		),
		array(  
			'title' => '4 Column',  
			'selector' => 'p,h1,h2,h3,h4,h5,h6',
			'block'	=> 'p', 
			'classes' => 'span-4',
			'wrapper' => false,
		),
		array(  
			'title' => '5 Column',  
			'selector' => 'p,h1,h2,h3,h4,h5,h6',
			'block'	=> 'p', 
			'classes' => 'span-5',
			'wrapper' => false,
		),
		array(  
			'title' => '6 Column',  
			'selector' => 'p,h1,h2,h3,h4,h5,h6',
			'block'	=> 'p', 
			'classes' => 'span-6',
			'wrapper' => false,
		),
		array(  
			'title' => '7 Column',  
			'selector' => 'p,h1,h2,h3,h4,h5,h6',
			'block'	=> 'p', 
			'classes' => 'span-7',
			'wrapper' => false,
		),
		array(  
			'title' => '8 Column',  
			'selector' => 'p,h1,h2,h3,h4,h5,h6',
			'block'	=> 'p', 
			'classes' => 'span-8',
			'wrapper' => false,
		),
		array(  
			'title' => '9 Column',  
			'selector' => 'p,h1,h2,h3,h4,h5,h6',
			'block'	=> 'p', 
			'classes' => 'span-9',
			'wrapper' => false,
		),
		array(  
			'title' => '10 Column',  
			'selector' => 'p,h1,h2,h3,h4,h5,h6',
			'block'	=> 'p', 
			'classes' => 'span-10',
			'wrapper' => false,
		),
		array(  
			'title' => '11 Column',  
			'selector' => 'p,h1,h2,h3,h4,h5,h6',
			'block'	=> 'p', 
			'classes' => 'span-11',
			'wrapper' => false,
		),
		array(  
			'title' => '12 Column',  
			'selector' => 'p,h1,h2,h3,h4,h5,h6',
			'block'	=> 'p', 
			'classes' => 'span-12',
			'wrapper' => false,
		),
		array(  
			'title' => '13 Column',  
			'selector' => 'p,h1,h2,h3,h4,h5,h6',
			'block'	=> 'p', 
			'classes' => 'span-13',
			'wrapper' => false,
		),
		array(  
			'title' => '14 Column',  
			'selector' => 'p,h1,h2,h3,h4,h5,h6',
			'block'	=> 'p', 
			'classes' => 'span-14',
			'wrapper' => false,
		),
		array(  
			'title' => '15 Column',  
			'selector' => 'p,h1,h2,h3,h4,h5,h6',
			'block'	=> 'p', 
			'classes' => 'span-15',
			'wrapper' => false,
		),
		array(  
			'title' => '16 Column',  
			'selector' => 'p,h1,h2,h3,h4,h5,h6',
			'block'	=> 'p', 
			'classes' => 'span-16',
			'wrapper' => false,
		)
	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

function wpb_mce_buttons_2($buttons) {
	array_unshift($buttons, 'styleselect');
	return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');