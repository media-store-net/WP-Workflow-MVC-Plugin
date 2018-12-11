<?php
/**
 * Created by Media-Store.net
 * User: Artur
 * Date: 09.12.2018
 * Time: 13:51
 */

namespace WPW\controllers;

/**
 * Class View
 * @override \Amastajo\LightweightMVC\View
 *
 * @package MediaStoreNet\controllers
 */
class View extends \Amostajo\LightweightMVC\View {

	/**
	 * View constructor.
	 *
	 * @param $views_path
	 */
	public function __construct( $views_path ) {
		parent ::__construct( $views_path );
	}

	/**
	 * Returns view with the parameters passed by.
	 * @overwrie of Frameworks View Class
	 *
	 * @param string $view  Name and location of the view within "theme/views" path.
	 * @param array $params View parameters passed by.
	 *
	 * @return string
	 */
	public function get( $view, $params = array() ) {
		$template = preg_replace( '/\./', '/', $view );
		// if a view is in child-theme path
		$child_path = get_stylesheet_directory() . '/views/' . $template . '.php';
		// if a view is in theme path
		$theme_path = get_template_directory() . '/views/' . $template . '.php';
		// call the view from plugin path
		$plugin_path = $this -> views_path . $template . '.php';

		if ( is_readable( $child_path ) ):
			$path = $child_path;
		elseif ( is_readable( $theme_path ) ):
			$path = $theme_path;
		elseif ( is_readable( $plugin_path ) ):
			$path = $plugin_path;
		else:
			$path = null;
		endif;

		if ( ! empty( $path ) ) {
			extract( $params );
			ob_start();
			include( $path );

			return ob_get_clean();
		} else {
			return;
		}
	}

	/**
	 * Displays view with the parameters passed by.
	 * @overwrite ofFrameworks View Class
	 *
	 * @param string $view  Name and location of the view within "theme/views" path.
	 * @param array $params View parameters passed by.
	 */
	public function show( $view, $params = array() ) {
		echo $this -> get( $view, $params );
	}
}