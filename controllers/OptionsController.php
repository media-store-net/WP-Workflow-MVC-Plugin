<?php
/**
 * Created by Media-Store.net
 * User: Artur
 * Date: 05.04.2018
 * Time: 18:07
 *
 * @since 3.0
 */

namespace WPW\controllers;

use WPW\plugin\Models\OptionsModel;

/**
 * Class OptionsController
 * @package wpi\controllers
 */
class OptionsController extends AbstractController {

	/**
	 * @var bool
	 */
	private $called = false;

	/**
	 * @var OptionsModel
	 */
	private $optionsModel;

	/**
	 * OptionsController constructor.
	 */
	public function __construct() {
		parent::__construct();

		if ( $this->called ) {
			return $this;
		}

		$this->optionsModel = new OptionsModel( 'wpw_options', 'wpw_group', $this->getOptionsArray() );

		$this->called = true;
	}

	public function getOptionsArray() {
		return array();
	}

	/**
	 * Init Options at first time
	 *
	 * @return bool
	 * @since 3.0
	 */
	public function initOptions() {

		return ( $this->optionsModel )::add_options();
	}


	/**
	 * @return array
	 */
	public function getAll() {
		return ( $this->optionsModel )::get_options();
	}

	/**
	 * Find a Option by his name and return it
	 *
	 * @param array|mixed $names
	 *
	 * @return array|mixed
	 */
	public function getByName( $names ) {

		$options = $this->getAll();

		if ( is_array( $names ) ):
			$output = array();
			foreach ( $names as $key => $value ) {
				$output[ $value ] = $options[ $key ][ $value ];
			}

			return $output;

		else:
			return $options[ $names ];
		endif;
	}

	/**
	 * Save All Options in the DB
	 *
	 * @param array $options
	 *
	 * @return bool
	 */
	public function saveAll( $options ) {
		if ( ( $this->optionsModel )::set_options( $options ) ):
			return true;
		endif;

		return false;
	}

	/**
	 *
	 * @param string|array $names
	 *
	 * @param array $option
	 */
	public function saveByName( $names, $option ) {
		$options = $this->getAll();

		if ( is_array( $names ) ):
			foreach ( $names as $name ) {
				$options[ $name ] = $option[ $name ];
			}
		else:
			$options[ $names ] = $option;
		endif;

		$this->saveAll( $options );
	}

	/**
	 * Remove the Options Table from DB
	 */
	public function delete() {
		( $this->optionsModel )::delete_options();
	}

	/**
	 * @return bool
	 */
	public function is_valid() {
		if ( (int) $this->getByName( 'valid' ) != 0 ):

			return true;
		endif;

		return false;
	}

	/**
	 * @param $state
	 */
	public function set_valid( $state ) {
		$this->saveByName( 'valid', $state );
	}
}