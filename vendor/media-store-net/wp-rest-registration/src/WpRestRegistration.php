<?php
/**
 * Created by Media-Store.net
 * User: Artur
 * Date: 24.11.2018
 * Time: 23:55
 */

namespace MediaStoreNet\WpRestRegistration;

/**
 * Class WpRestRegistration
 *
 * @package MediaStoreNet\WpRestRegistration
 */
class WpRestRegistration {

	/**
	 * Namespace to Register Route
	 *
	 * @var
	 */
	protected $_namespace;

	/**
	 * The Name of the Rest Route
	 * @var
	 */
	protected $_rest_name;

	/**
	 * A Callback Function to inject
	 * @var
	 */
	protected $_callback;

	/**
	 * Method of the Rest Route // GET, POST, DELETE
	 * By Default "GET"
	 *
	 * @var string
	 */
	protected $_method;

	/**
	 * ActionHook of Rest Route
	 * By Defalult "rest_api_init"
	 *
	 * @var string
	 */
	protected $_actionHook;

	/**
	 * WpRestRegistration constructor.
	 *
	 * @param $namespace
	 * @param $rest_name
	 * @param $callback
	 * @param string $method
	 * @param string $actionHook
	 */
	public function __construct( $namespace, $rest_name, $callback, $method = 'GET', $actionHook = 'rest_api_init' ) {
		$this->_namespace  = $namespace;
		$this->_rest_name  = $rest_name;
		$this->_callback   = $callback;
		$this->_method     = $method;
		$this->_actionHook = $actionHook;

		$this->init();
	}

	/**
	 * Initialisation Hook
	 */
	public function init() {

		add_action( $this->_actionHook, function () {
			register_rest_route( $this->_namespace, $this->_rest_name, array(
				'methods'  => $this->_method,
				'callback' => $this->_callback,
			) );
		} );

	}

}