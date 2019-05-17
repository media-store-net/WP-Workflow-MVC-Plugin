<?php
/**
 * Created by Media-Store.net
 * User: Artur
 * Date: 17.05.2019
 * Time: 12:52
 */

namespace WPW\core;


use WPW\controllers\LanguageController;
use WPW\controllers\OptionsController;
use WPW\controllers\PostTypeController;
use WPW\controllers\View;
use WPW\plugin\Models\OptionsModel;
use WPW\plugin\Models\Post;
use WPW\plugin\Models\PostTypeModel;

class Container {

	private $selfInstance;

	private $config;

	private $aliases = [];

	private $instances = [];

	public function __construct() {

		global $config;
		$this->config  = $config;
		$this->aliases = $this->getObjectAliases();

		if ( ! $this->selfInstance ):
			return $this->selfInstance;
		endif;
		$this->selfInstance = true;

	}

	public function make( $objectName ) {
		if ( ! empty( $this->instances[ $objectName ] ) ) {
			return $this->instances[ $objectName ];
		}

		try {
			if ( isset( $this->aliases[ $objectName ] ) ) {
				$this->instances[ $objectName ] = $this->aliases[$objectName]();

				return $this->instances[ $objectName ];
			} else {
				throw new \InvalidArgumentException( sprintf( 'Alias "%s" konnte nicht gefunden werden', $objectName ) );
			}
		} catch ( \InvalidArgumentException $e ) {
			echo sprintf( '%s in %s on line %s', $e->getMessage(), $e->getFile(), $e->getLine() );
		}
	}

	private function getObjectAliases() {
		return [
			'OptionsModel'       => function () {
				return new OptionsModel( 'wpw_options', 'wpw_group', $this->config['defaultOptions'] );
			},
			'PostTypeModel'      => function () {
				return new PostTypeModel();
			},
			'Post'               => function () {
				return new Post();
			},
			'OptionsController'  => function () {
				return new OptionsController();
			},
			'LanguageController' => function () {
				return new LanguageController();
			},
			'PostTypeController' => function () {
				return new PostTypeController();
			},
			'currentUser'        => function () {
				if ( ! function_exists( 'wp_get_current_user' ) ) {
					include( ABSPATH . "wp-includes/pluggable.php" );
				}
				$current_user = wp_get_current_user();

				return $current_user;
			},
			'View'               => function () {
				return new View( $this->config['paths']['views'] );
			}
		];
	}

}
