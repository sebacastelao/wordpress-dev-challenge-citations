<?php

/**
 *
 * The plugin bootstrap file
 *
 * This file is responsible for starting the plugin using the main plugin class file.
 *
 * @since 0.0.1
 * @package Citation
 *
 * @wordpress-plugin
 * Plugin Name:     Citation Meta Box
 * Description:     Add Custom Meta Box to Posts in wp-admin. Create shortcode [citation].
 * Version:         0.0.1
 * Author:          Sebastian Castellucci - sebacastellucci@gmail.com
 * Author URI:      https://www.example.com
 * License:         GPL-2.0+
 * License URI:     http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:     Citation Meta Box
 * Domain Path:     /lang
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access not permitted.' );
}

if ( ! class_exists( 'citation' ) ) {

	/*
	 * main citation class
	 *
	 * @class citation
	 * @since 0.0.1
	 */
	class citation {

		/*
		 * citation plugin version
		 *
		 * @var string
		 */
		public $version = '4.7.5';

		/**
		 * The single instance of the class.
		 *
		 * @var citation
		 * @since 0.0.1
		 */
		protected static $instance = null;

		/**
		 * Main citation instance.
		 *
		 * @since 0.0.1
		 * @static
		 * @return citation - main instance.
		 */
		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * citation class constructor.
		 */
		public function __construct() {
			$this->load_plugin_textdomain();
			$this->define_constants();
			$this->includes();
			$this->define_actions();
		}

		public function load_plugin_textdomain() {
			load_plugin_textdomain( 'plugin-name', false, basename( dirname( __FILE__ ) ) . '/lang/' );
		}

		/**
		 * Include required core files
		 */
		public function includes() {
            // Example
			require_once __DIR__ . '/includes/list-table-url.php';

			// Load custom functions and hooks
			require_once __DIR__ . '/includes/includes.php';
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
		 * Define citation constants
		 */
		private function define_constants() {
			define( 'CITATION_PLUGIN_FILE', __FILE__ );
			define( 'CITATION_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
			define( 'CITATION_VERSION', $this->version );
			define( 'CITATION_PATH', $this->plugin_path() );
		}

		/**
		 * Define citation actions
		 */
		public function define_actions() {
			//
		}

		/**
		 * Define citation menus
		 */
		public function define_menus() {
            //
		}
	}

	$citation = new citation();
}
