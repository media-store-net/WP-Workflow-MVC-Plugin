<?php
/**
 * Created by Media-Store.net
 * User: Artur
 * Date: 09.12.2018
 * Time: 14:57
 */

namespace WPW\controllers\admin;


use WPW\controllers\AbstractController;

/**
 * Class AdminPagesController
 * @package MediaStoreNet\controllers\admin
 */
class AdminPagesController extends AbstractController {

	/**
	 * Initialisation of Menus you will find in "plugin/Main.php"
	 */
	public function menus() {

		//create new top-level menu
		add_menu_page( 'WP Workflow Plugin', 'WP Workflow Plugin', 'manage_options', 'wpw_dashboard_page', array(
			&$this,
			'dashboard'
		), 'dashicons-admin-generic' );

		//create here submenu's

		/*add_submenu_page( 'Test', 'Test', 'Test', 'manage_options', 'wpw_test_page', array(
			&$this,
			'dashboard'
		) );*/

	}

	/**
	 *   Call the View for the Dashboard Admin Page,
	 *   you find it in "views/admin/pages/dashboard.php"
	 */
	public function dashboard() {
		$this->view->show( 'admin.pages.dashboard', [] );
	}

}