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
    /*
     * Check if the Disciple.Tools theme is NOT loaded
     */
    $wp_theme = wp_get_theme();
    $is_theme_dt = strpos( $wp_theme->get_template(), "disciple-tools-theme" ) !== false || $wp_theme->name === "Disciple Tools";

    if ( $is_theme_dt ) {
        add_action( 'admin_notices', 'phantom_site_plugin_dt_existence_notice' );
        return false;
    }
    return Phantom_Site_Plugin::instance();
}

if ( ! function_exists( 'phantom_site_plugin_dt_existence_notice' ) ) {
    function phantom_site_plugin_dt_existence_notice() {
        $message = 'For security purposes, the Phantom Site Plugin should never coexist in a Disciple.Tools environment. Please install it on a separate, fresh WordPress instance. Thanks!';

        // Check if it's been dismissed...
        if ( ! get_option( 'phantom-site-plugin-dt-existence-notice', false ) ) { ?>
            <div class="notice notice-error phantom-site-plugin-dt-existence-notice" data-notice="phantom-site-plugin">
                <p><?php echo esc_html( $message );?></p>
            </div>
            <script>
                jQuery(function($) {
                    $( document ).on( 'click', '.phantom-site-plugin-dt-existence-notice .notice-dismiss', function () {
                        $.ajax( ajaxurl, {
                            type: 'POST',
                            data: {
                                action: 'dismissed_notice_handler',
                                type: 'phantom-site-plugin-dt-existence-notice',
                                security: '<?php echo esc_html( wp_create_nonce( 'wp_rest_dismiss' ) ) ?>'
                            }
                        })
                    });
                });
            </script>
        <?php }
    }
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
        require_once( 'home/home.php' );
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