<?php 
/*
* @packge Evior Extra
* @since 1.0.0
 */
function evior_import() { 
  return array(
  
    array(
      'import_file_name'             => __('Main Demo','evior-extra'),
      'page_title'                   => __('Import Demo Data','evior-extra'),
      'local_import_file'            => EVIOR_EXTRA_ROOT_PATH.'/demo/demo-data.xml',
      'local_import_widget_file'     => EVIOR_EXTRA_ROOT_PATH.'/demo/widget.wie',
      'local_import_customizer_file' => EVIOR_EXTRA_ROOT_PATH.'/demo/evior-customizer.dat',
	  	'import_preview_image_url'     => 'https://splendidwebz.com/demo-img/ev.jpg',
      'import_notice'                => __( 'This import maybe finish on 2-3 minutes', 'evior-extra' ),
	  	'preview_url'                  => 'https://gossip-themes.com/evior',

  ),    

   array(
			'import_file_name'             => __('News Demo','evior-extra'),
			'page_title'                   => __('Import Demo Data','evior-extra'),
			'local_import_file'            => EVIOR_EXTRA_ROOT_PATH.'/demo/demo-data2.xml',
			'local_import_widget_file'     => EVIOR_EXTRA_ROOT_PATH.'/demo/widget2.wie',
			'local_import_customizer_file' => EVIOR_EXTRA_ROOT_PATH.'/demo/evior-customizer2.dat',
			'import_preview_image_url'     => 'https://splendidwebz.com/demo-img/ev2.png',
			'import_notice'                => __( 'This import maybe finish on 2-5 minutes', 'evior-extra' ),
			'preview_url'                  => 'https://pcbuildreview.com/evior-news',

  ), 

  

);
}
add_filter( 'pt-ocdi/import_files', 'evior_import' );


add_action( 'pt-ocdi/after_import',  'evior_after_import' );

if(!function_exists( 'evior_after_import')):
function evior_after_import($selected_import) {
	
if ( 'Demo' === $selected_import['import_file_name'] ) {

	$main_menu = get_term_by('name', 'Main Menu', 'nav_menu');

    set_theme_mod( 'nav_menu_locations', array(
        'primary' => $main_menu->term_id,
     ) );

	//Set Front page

	$front_page_id = get_page_by_title( 'Home One' );
	$blog_page_id  = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );
	
}}
endif;
