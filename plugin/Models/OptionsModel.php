<?php

namespace WPW\plugin\Models;

/**
 * Options Model
 * load options from get_option();
 *
 * @link
 * @since 1.0
 */
class OptionsModel {


	/**
	 * @var string
	 */
	protected static $_options_name;

	/**
	 * @var string
	 */
	protected static $_options_group;

	/**
	 * @var array
	 */
	protected static $_default_options;

	/**
	 * OptionsModel constructor.
	 *
	 * @param $options_name
	 * @param $options_group
	 * @param $default_options
	 */
	public function __construct( $options_name, $options_group, $default_options ) {

		self::$_options_name    = $options_name;
		self::$_options_group   = $options_group;
		self::$_default_options = $default_options;
	}

	/**
	 * Register Settings in WP
	 *
	 * @since 1.0
	 */
	public static function register_options() {
		register_setting( self::$_options_group, self::$_options_name );
	}

	/**
	 * Add Default Options to WP-Options Table at first time
	 *
	 * @since 1.0
	 */
	public static function add_options() {
		if ( add_option( self::$_options_name, self::$_default_options ) ) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Save the Options-Array
	 *
	 * @param array $options
	 *
	 * @return bool
	 *
	 * @since 1.0
	 */
	public static function set_options( $options = array() ) {
		if ( update_option( self::$_options_name, $options ) ):
			print '<script>window.location.reload();</script>';

			return true;
		else:
			return false;
		endif;
	}

	/**
	 * Load the Options from WP-Options Table
	 *
	 * @return array
	 * @since 3.0
	 */
	public static function get_options() {
		return (array) get_option( self::$_options_name );
	}

	/**
	 * Delete Options from WP-Options Table
	 *
	 * @since 3.0
	 */
	public static function delete_options() {
		delete_option( self::$_options_name );
	}
}