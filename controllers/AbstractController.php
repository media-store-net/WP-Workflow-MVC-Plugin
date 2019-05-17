<?php
/**
 * Created by Media-Store.net
 * User: Artur
 * Date: 09.12.2018
 * Time: 13:47
 */

namespace WPW\controllers;

use Amostajo\LightweightMVC\Controller;

/**
 * Class AbstractController
 * extends LightweightMVC\Controller and set default $view to config->view
 *
 * @author  Artur Voll
 *
 * @since   1.0
 *
 * @package MediaStoreNet\controllers
 */
class AbstractController extends Controller {

	/**
	 * View class object.
	 * @var View
	 */
	protected $view;

	/**
	 * @var \WP_User
	 */
	protected $user;

	/**
	 * AbstractController constructor.
	 */
	public function __construct() {
		$config = include( WPW_DIR . 'config/plugin.php' );
		parent::__construct( $config['paths']['views'] );
		$wpwContainer = new \wpw\core\Container();

		$this->view = $wpwContainer->make( 'View' );
		$this->user = $wpwContainer->make( 'currentUser' );
	}
}
