<?php
class Phantom_Site_Plugin_Home {
    public $root = 'phantom';
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

    /**
    * Constructor function
    * @access public
    * @since 0.1.0
    */
    public function __construct() {
        if ( is_admin() ) {
            return;
        }

        add_action( 'template_redirect', [ $this, '_head' ], 10 );
        add_action( 'template_redirect', [ $this, '_body' ], 20 );

        // load page elements
        add_action( 'wp_print_scripts', [ $this, '_print_scripts' ], 100 );
        add_action( 'wp_print_styles', [ $this, '_print_styles' ], 100 );
    } // End construct()

    public function _print_scripts() {
        $allowed_js = apply_filters( 'phantom_site_allowed_js', [ 'jquery' ] );
        global $wp_scripts;

        if ( isset( $wp_scripts ) ) {
            foreach ( $wp_scripts->queue as $key => $item) {
                if ( ! in_array( $item, $allowed_js ) ) {
                    unset( $wp_scripts->queue[$key] );
                }
            }
        }
    }

    public function _print_styles() {
        $allowed_css = apply_filters( 'phantom_site_allowed_css', [
            'foundation-css',
            'jquery-ui-site-css',
        ] );

        global $wp_styles;
        if ( isset( $wp_styles ) ) {
            foreach ( $wp_styles->queue as $key => $item ) {
                if ( ! in_array( $item, $allowed_css ) ) {
                    unset( $wp_styles->queue[$key] );
                }
            }
        }
    }

    public function _head() {
        if ( ! isset( $_SERVER['REQUEST_URI'] ) ) {
            return;
        }

        $content = get_option( 'phantom_site_content' );
        $base_url = trailingslashit( sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) );
        $plugin_base_url = $base_url . 'wp-content/plugins/phantom-site-plugin/';
    }

    public function _body() {
        require_once( 'template.php' );
        exit;
    }
}
Phantom_Site_Plugin_Home::instance();