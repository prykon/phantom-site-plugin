<?php
/*
 Plugin Name: Phantom Site Plugin
 Plugin URI: https://github.com/prykon/phantom-site-plugin
 Description: Send DT Magic Links to users discretely
 Text Domain: phantom-site-plugin
 Version: 0.1.0
 Author: prykon
 Author URI: https://github.com/prykon
 Github Plugin URI: https://github.com/prykon/phantom-site-plugin
 */

 if ( ! defined( 'ABSPATH' ) ) {
 	exit; //Exit if accessed directly
 }

 /**
  * Gets the instance of the Phantom_Site_Plugin class
  *
  * @since 0.1.0
  * @access public
  * @return object|bool
  */
 function phantom_site_plugin() {
 	return Phantom_Site_Plugin::instance();
 }

 add_action( 'after_setup_theme', 'phantom_site_plugin' );

 /**
  *
  * Singleton class for setting up the plugin
  *
  * @since 0.1.0
  * @access public
  */
 class Phantom_Site_Plugin {
 	private static $_instance = null;

 	/**
	 * Phantom_Site_Plugin_Menu Instance
	 * 
	 * Ensures only one instance of Phantom_Site_Plugin_Menu is loaded or can be loaded.
	 * 
	 * @since 0.1.0
	 * @static
	 * @return Phantom_Site_Plugin_Menu instance
	 */
 	public static function instance() {
 		if ( is_null( self::$_instance ) ) {
 			self::$_instance = new self();
 		}
 		return self::$_instance;
 	} // End instance()

 	private function __construct() {
 		require_once( 'home/home.php');
 		require_once( 'admin/admin.php' );
 		$this->i18n();
 	}

 	/**
     * Loads the translation files
     *
     * @since  0.1.0
     * @access public
     * @return void
     */
    public function i18n() {
        $domain = 'phantom-site-plugin';
        load_plugin_textdomain( $domain, false, trailingslashit( dirname( plugin_basename( __FILE__ ) ) ). 'languages' );
    }
 }