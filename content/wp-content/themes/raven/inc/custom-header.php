<?php

  // Add Custom header feature  
function raven_custom_header_setup() {
	 
  $raven_customhargs = array(
	'default-image' => get_template_directory_uri() . '/skins/images/defaulth.jpg',
	'flex-width'    => true,
	'width'         => 1200,
	'flex-height'    => true,
	'height'        => 500,
	'header-text'   => false,
  );
  
  add_theme_support( 'custom-header', $raven_customhargs );
  
}
add_action( 'after_setup_theme', 'raven_custom_header_setup' );  
?>