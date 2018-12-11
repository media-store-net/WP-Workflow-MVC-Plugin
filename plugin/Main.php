<?php

namespace WPW\plugin;

use Amostajo\WPPluginCore\Plugin;

/**
 * Main class.
 * Registers HOOKS used within the plugin.
 * Acts like a bridge or router of actions between Wordpress and the plugin.
 *
 * @link http://wordpress-dev.evopiru.com/documentation/main-class/
 * @version 1.0
 */
class Main extends Plugin {
	/**
	 * Declares public HOOKS.
	 * - Can be removed if not used.
	 * @since 1.0
	 */
	public function init() {
		// add_action( 'save_post', [ &$this, 'save_post' ] );
		// 
		// $this->add_action( 'save_post', 'PostController@save' );
		// 
		// $this->add_shortcode( 'hello_world', 'view@shout', [ 'message' => 'Hello World!' ] );

		// Add Options to wp-options
		$this->mvc->action( 'OptionsController@initOptions' );
		// Setup TextDomain
		$this->mvc->action( 'LanguageController@init' );


		/**
		 * ACTIONS
		 */
		// Register the PostType, uncomment when using PostType
		$this->add_action( 'init', 'PostTypeController@register_post_type' );

		/**
		 * FILTERS
		 */

		/**
		 * SHORTCODES
		 */
	}

	/**
	 * Declares admin dashboard HOOKS.
	 * - Can be removed if not used.
	 * @since 1.0
	 */
	public function on_admin() {

		// Add Admin Menus
		$this->add_action( 'admin_menu', 'admin\AdminPagesController@menus' );
	}
}