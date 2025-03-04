<?php
/*
 * Theme Nav Options
 * @package Evior
 * @since 1.0.0
 * */

if ( !defined('ABSPATH') ){
    exit(); // exit if access directly
}


// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'eviornav';

  //
  // Create profile options
  CSF::createNavMenuOptions( $prefix, array(
    'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
  ) );

  //
  // Create a section
  CSF::createSection( $prefix, array(
    'fields' => array(
	
	array(
		'id' => 'enable_mega_menu',
		'title' => esc_html__('Enable Mega Menu','evior'),
		'type' => 'switcher',
		'default' => false,
	),
		

    array(
	  'id'          => 'select_megamenu_template',
	  'type'        => 'select',
	  'title'       => 'Select Mega Menu',
	  'placeholder' => 'Select Mega Menu',
	  'chosen'      => true,
	  //'ajax'        => true,
	  'options'     => 'posts',
		'query_args'  => array(
		'post_type' => 'megamenu'
	),
	  'dependency' => array( 'enable_mega_menu', '==', 'true' ),
	),




    )
  ) );
  
  

}




