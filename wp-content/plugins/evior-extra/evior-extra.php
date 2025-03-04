<?php
/*
Plugin Name: Evior Extra
Plugin URI: https://gossipthemes.com/evior-extra
Description: This is a helper plugin for Evior Theme.
Author: Gossip Themes
Version: 1.0
Author URI: https://gossipthemes.com
*/

/**  Related Theme Type */

global $related_theme_type;
$related_theme_type = array('Evior','Evior Child');
//define current theme name
$current_theme = !empty( wp_get_theme() ) ? wp_get_theme()->get('Name') : '';
define('CURRENT_THEME_NAME',$current_theme);


/*
 * Define Plugin Dir Path
 * @since 1.0.0
 * */
define('EVIOR_EXTRA_SELF_PATH','evior-extra/evior-extra.php');
define('EVIOR_EXTRA_ROOT_PATH',plugin_dir_path(__FILE__));
define('EVIOR_EXTRA_ROOT_URL',plugin_dir_url(__FILE__));
define('EVIOR_EXTRA_LIB',EVIOR_EXTRA_ROOT_PATH.'/lib');
define('EVIOR_EXTRA_INC',EVIOR_EXTRA_ROOT_PATH .'/inc');
define('EVIOR_EXTRA_ADMIN',EVIOR_EXTRA_INC .'/admin');
define('EVIOR_EXTRA_ADMIN_ASSETS',EVIOR_EXTRA_ROOT_URL .'inc/admin/assets');
define('EVIOR_EXTRA_CSS',EVIOR_EXTRA_ROOT_URL .'assets/css');
define('EVIOR_EXTRA_JS',EVIOR_EXTRA_ROOT_URL .'assets/js');
define('EVIOR_EXTRA_ELEMENTOR',EVIOR_EXTRA_INC .'/elementor');
define('EVIOR_EXTRA_SHORTCODES',EVIOR_EXTRA_INC .'/shortcodes');
define('EVIOR_EXTRA_WIDGETS',EVIOR_EXTRA_INC .'/widgets');

/** Plugin version **/
define('EVIOR_CORE_VERSION','1.0.0');

//initial file
include_once ABSPATH .'wp-admin/includes/plugin.php';

if ( is_plugin_active(EVIOR_EXTRA_SELF_PATH) ) {

	if ( !in_array(CURRENT_THEME_NAME,$GLOBALS['related_theme_type']) && file_exists(EVIOR_EXTRA_INC .'/cs-framework-functions.php') ) {
		
		require_once EVIOR_EXTRA_INC .'/cs-framework-functions.php';
		
	}

	//plugin core file include
	
	if ( file_exists(EVIOR_EXTRA_INC .'/class-evior-extra-init.php') ) {
		require_once EVIOR_EXTRA_INC .'/class-evior-extra-init.php';
	}

	
	//Demo data import 
	
	if (file_exists(EVIOR_EXTRA_INC .'/demo-import.php')){
		require_once EVIOR_EXTRA_INC .'/demo-import.php';
	}
	
}


include_once( EVIOR_EXTRA_ADMIN . '/custom-post-type-base.php');
/**
 * Megamenu
 */
$megamenu_args = array(
    'menu_icon' => 'dashicons-grid-view'
);

$megamenu = new Evior_Register_Custom_Post_Type( 'Megamenu', 'Mega Menus', $megamenu_args);



