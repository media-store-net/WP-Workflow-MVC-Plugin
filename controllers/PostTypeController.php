<?php
/**
 * Created by Media-Store.net.
 * User: Artur
 * Date: 07.04.2018
 * Time: 13:10
 */

namespace WPW\controllers;

use WPW\plugin\Models\PostTypeModel;

/**
 * Class PostTypeController
 * Register the Post Type
 *
 * @author Artur Voll
 * @since 3.0
 *
 * @package wpi\controllers
 */
class PostTypeController extends AbstractController {

	/**
	 * Register the Post Type
	 */
	public function register_post_type() {
		global $langName;

		$typeLabels = array(
			'name'               => __( 'WP Workflows', $langName ), // Name im Plural
			'singular_name'      => __( 'WP Workflow', $langName ), //Singular Name
			'menu_name'          => __( 'Workflows', $langName ), //Name im Menu
			'all_items'          => __( 'All Workflows', $langName ),
			'add_new'            => __( 'New Workflow', $langName ),
			'add_new_item'       => __( 'Add new Workflow', $langName ),
			'edit_item'          => __( 'Edit Workflow', $langName ),
			'new_item'           => __( 'Add new Workflow', $langName ),
			'view_item'          => __( 'View Workflow', $langName ),
			'search_items'       => __( 'Search Workflows', $langName ),
			'not_found'          => __( 'No Workfloaws found', $langName ),
			'not_found_in_trash' => __( 'No Workflows in Trash', $langName )
		);

		$type = new PostTypeModel();
		$type->set_name( 'wpw_type' );
		$type->post_type_args(
			array(
				'labels'                => $typeLabels,
				'description'           => __( 'Description.', 'Post-Type für WPWorkflow by Media-Store.net' ),
				'public'                => true,
				'publicly_queryable'    => true,
				'show_ui'               => true,
				'show_in_menu'          => true,
				'query_var'             => true,
				'rewrite'               => array( 'slug' => 'slug' ),
				'capability_type'       => 'post',
				'has_archive'           => true,
				'hierarchical'          => false,
				'menu_position'         => 5,
				'menu_icon'             => 'dashicons-admin-home',
				'show_in_rest'          => true,
				'rest_base'             => 'WPW',
				'rest_controller_class' => 'WP_REST_Posts_Controller',
				'supports'              => array(
					'title',
					'editor',
					'author',
					'thumbnail',
					'excerpt',
					'comments',
					'custom-fields'
				)
			)
		);
		$type->register_post_type();
	}
}