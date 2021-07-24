<?php
class Phantom_Site_Plugin_Home {
    private static $_instance = null;

    /**
    * Phantom_Site_Plugin_Menu Instance
    * Ensures only one instance of Phantom_Site_Plugin_Menu is loaded or can be loaded.
    *
    * @access public
    * @since 0.1.0
    * @static
    * @return Phantom_Site_Plugin_Menu instance
    */
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
    * Constructor function
    * @access public
    * @since 0.1.0
    */
    public function __construct() {
        if ( is_admin() ) {
            return;
        }
        add_action( 'template_redirect', [ $this, 'display_body' ], 20 );
    }

    /**
     * Display the body of the template
     * @access public
     * @since 0.1.0
     */
    public function display_body() {
        if ( ! isset( $_SERVER['REQUEST_URI'] ) ) {
            return;
        }
        $base_url = trailingslashit( sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) );
        require_once( 'template.php' );
        exit;
    }
}
Phantom_Site_Plugin_Home::instance();