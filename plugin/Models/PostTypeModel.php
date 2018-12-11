<?php
/**
 * Created by Media-Store.net.
 * User: Artur
 * Date: 06.04.2018
 * Time: 23:41
 */

namespace WPW\plugin\Models;

use Amostajo\LightweightMVC\Model;
use Amostajo\LightweightMVC\Traits\FindTrait;

/**
 * Class PostTypeModel
 *
 * @author Artur Voll
 *
 * @since 1.0
 *
 * @package MediaStoreNet\plugin\Models
 */
class PostTypeModel extends Model {

	use FindTrait;

	/**
	 * @var string
	 */
	public $name;

	/**
	 * @var array
	 */
	protected $args;

	/**
	 * Returns the PostType Name
	 * will be used to Register the PostType and Filters and so on.
	 *
	 * @since 1.0
	 * @return string
	 */
	public function get_name() {
		return $this->name;
	}

	/**
	 * @param $name
	 *
	 * @return $this
	 */
	public function set_name( $name ) {
		$this->name = $name;

		return $this;
	}

	/**
	 * @param $args array
	 *
	 * @return $this
	 */
	public function post_type_args( $args ) {

		$this->args = $args;

		return $this;
	}

	/**
	 * Register PostType to WP
	 */
	public function register_post_type() {
		register_post_type( $this->get_name(), $this->post_type_args( $this->args ) );
		// Refresh Permalinks
		flush_rewrite_rules();
	}

	/**
	 * @return array
	 */
	public function AllPosts() {
		return get_posts( array( 'post_type' => $this->get_name(), 'posts_per_page' => - 1 ) );
	}

	/**
	 * @return int
	 */
	public function CountPosts() {
		return count( $this->AllPosts() );
	}
}