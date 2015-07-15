<?php

add_action( 'wp_enqueue_scripts', 'contact_form_scripts' );
function contact_form_scripts() {

	wp_enqueue_style( 'contact_css', get_template_directory_uri().'/contact-form/contact.css' );
	wp_enqueue_script( 'contact_js', get_template_directory_uri().'/contact-form/contact.js', array('jquery') );

}