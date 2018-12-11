<?php

/**
 * Main Configuration File.
 * --------------------------
 */

return [

	'namespace' => 'WPW',

	'paths' => [

		'controllers' => WPW_DIR . 'controllers/',
		'views'       => WPW_DIR . 'views/',

	],

	'addons' => [],

	'cache' => [

		// Enables or disables cache
		'enabled'     => true,
		// files, sqlite, auto (files), apc, wincache, xcache, memcache, memcached
		'storage'     => 'auto',
		// Default path for files
		'path'        => WPW_DIR . 'cache/',
		// It will create a path by PATH/securityKey
		'securityKey' => '',
		// FallBack Driver
		'fallback'    => [
			'memcache' => 'files',
			'apc'      => 'sqlite',
		],
		// .htaccess protect
		'htaccess'    => true,
		// Default Memcache Server
		'server'      => [
			[ '127.0.0.1', 11211, 1 ],
		],

	],

	'log' => [

		'path' => WPW_DIR . 'logs/',

	],

];