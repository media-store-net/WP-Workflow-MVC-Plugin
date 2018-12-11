<?php
/*

Plugin Name: WP Workflow MVC

Plugin URI: A Wordpress Plugin Template that comes with composer and a lightweight MVC framework for Wordpress.

Description: A Wordpress Plugin Template that comes with composer and a lightweight MVC framework for Wordpress.

Version: 1.0

Author: Artur Voll

Author URI: https://media-store.net

*/

//------------------------------------------------------------
//
// NOTE:
//
// Try NOT to add any code line in this file.
//
// Use "plugin\Main.php" to add your hooks.
//
//------------------------------------------------------------

$langName = 'wpw';
define( 'WPW_DIR', plugin_dir_path( __FILE__ ) );

require_once( WPW_DIR . 'boot/bootstrap.php' );

// Set UpdateChecker, only if Premium Plugin

/*$updateChecker = Puc_v4_Factory ::buildUpdateChecker(
	'https://bitbucket.org/pcservice-voll/...',
	__FILE__,
	'name'
);
$updateChecker -> setAuthentication( array(
	'consumer_key'    => '',
	'consumer_secret' => ''
) );
$updateChecker -> setBranch( 'master' );*/


/**********************************
 **** Uninstall Option ***********
 **********************************/

register_uninstall_hook( __FILE__, 'wpw_uninstall' );

function wpw_uninstall() {
	// Neue Options
	/*$new_options = new \wpi\controllers\OptionsController();
	$new_options -> delete();*/

	error_log( 'Plugin gelöscht' );

}