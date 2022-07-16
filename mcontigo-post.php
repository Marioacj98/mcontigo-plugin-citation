<?php

/**
 *
 * The plugin bootstrap file
 *
 * This file is responsible for starting the plugin using the main plugin class file.
 *
 * @since 0.0.1
 * @package Plugin_Name
 *
 * @wordpress-plugin
 * Plugin Name:     MContigo - Post Citation and URL Checker
 * Description:     Add citations for each of your authors, or display them through a shortcode using [mc-citation post_id="id"]. Also, test the link structure of each of your posts and see a report on how to fix them.
 * Version:         1.0.1
 * Author:          Mario Cueto J.
 * Author URI:      https://mariocuetoj.com/
 * License:         GPL-2.0+
 * License URI:     http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:     mcontigo-post
 * Domain Path:     /lang
 */

include plugin_dir_path ( __FILE__ ) . 'includes/functions/post-citation.php';
include plugin_dir_path ( __FILE__ ) . 'includes/hooks/shortcode-post-citation.php';
include plugin_dir_path ( __FILE__ ) . 'includes/functions/post-notification.php';


if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access not permitted.' );
}

if ( ! class_exists( 'mcontigo_post' ) ) {

	/*
	 * main mcontigo_post class
	 *
	 * @class mcontigo_post
	 * @since 0.0.1
	 */
	class mcontigo_post {

		/*
		 * mcontigo_post plugin version
		 *
		 * @var string
		 */
		public $version = '4.7.5';

		/**
		 * The single instance of the class.
		 *
		 * @var mcontigo_post
		 * @since 0.0.1
		 */
		protected static $instance = null;

		/**
		 * Main mcontigo_post instance.
		 *
		 * @since 0.0.1
		 * @static
		 * @return mcontigo_post - main instance.
		 */
		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * mcontigo_post class constructor.
		 */
		public function __construct() {
			$this->load_plugin_textdomain();
			$this->define_constants();
			$this->includes();
			$this->define_actions();
		}

		public function load_plugin_textdomain() {
			load_plugin_textdomain( 'mcontigo-post', false, basename( dirname( __FILE__ ) ) . '/lang/' );
		}

		/**
		 * Include required core files
		 */
		public function includes() {
			
		}

		/**
		 * Get the plugin path.
		 *
		 * @return string
		 */
		public function plugin_path() {
			return untrailingslashit( plugin_dir_path( __FILE__ ) );
		}


		/**
		 * Define mcontigo_post constants
		 */
		private function define_constants() {
			define( 'MCONTIGO_POST_PLUGIN_FILE', __FILE__ );
			define( 'MCONTIGO_POST_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
			define( 'MCONTIGO_POST_VERSION', $this->version );
			define( 'MCONTIGO_POST_PATH', $this->plugin_path() );
		}

		/**
		 * Define mcontigo_post actions
		 */
		public function define_actions() {
			//
		}

		/**
		 * Define mcontigo_post menus
		 */
		public function define_menus() {
            //
		}
	}

	$mcontigo_post = new mcontigo_post();
}