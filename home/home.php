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

        if ( isset( $_POST['callback_phone'] ) && isset( $_POST['phantom_site_phone_nonce'] ) ) {
            if ( wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['phantom_site_phone_nonce'] ) ), 'phantom_site_callback_phone' ) ) {
                add_action( 'template_redirect', [ $this, '_body_thanks' ], 20 );
            } else {
                add_action( 'template_redirect', [ $this, '_body' ], 20 );
            }
        } else {
            add_action( 'template_redirect', [ $this, '_body' ], 20 );
        }

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
        $content = get_option( 'phantom_site_content' );
        ?>
        <!--- basic page needs
        ================================================== -->
        <meta charset="utf-8" foo="bar">
        <title><?php echo esc_html( $content['title'] ?? '' ) ?></title>
        <meta name="robots" content="noindex, nofollow">
        <meta name="description" content="<?php echo esc_html( $content['description'] ?? '' ) ?>">
        <meta name="author" content="<?php echo esc_html( $content['title'] ?? '' ) ?>">
        <meta name="author" content="<?php echo esc_html( $content['title'] ?? '' ) ?>">

        <!-- mobile specific metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSS
        ================================================== -->
        <link rel="stylesheet" href="<?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>css/base.css">
        <link rel="stylesheet" href="<?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>css/vendor.css">
        <link rel="stylesheet" href="<?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>css/main.css">

        <!-- script
        ================================================== -->
        <script src="<?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>js/modernizr.js"></script>
        <script src="<?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>js/pace.min.js"></script>

        <!-- favicons
        ================================================== -->
        <link rel="shortcut icon" href="<?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>favicon.png" type="image/x-icon">
        <link rel="icon" href="<?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>favicon.png" type="image/x-icon">

        <style>
            .header-logo {
                z-index: 501;
                display: inline-block;
                margin: 0;
                padding: 0;
                position: absolute;
                left: 110px;
                top: 50%;
                -webkit-transform: translateY(-50%);
                -ms-transform: translateY(-50%);
                transform: translateY(-50%);
            }
            .header-logo a {
                display: block;
                padding: 0;
                outline: 0;
                border: none;
                -webkit-transition: all .3s ease-in-out;
                transition: all .3s ease-in-out;
                background-image: url(<?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>images/p4m-logo.png);
                background-repeat: no-repeat;
                background-size: 50px;
                background-position: left center;
                padding-left: 60px;
                font-size: 3em;
                font-weight: 900;
                color: #fff;
                font-family: 'times new roman';
            }
            @media only screen and (max-width: 1000px) {
                .header-logo a {
                    font-size: 1em;
                }
            }
        </style>
        <?php
        wp_head();
    }

    public function _body() {
        require_once( 'template.php' );
        exit;
    }

    public function _body_thanks() {
        require_once( 'template-thanks.php' );
        exit;
    }

    private function validate_phone( int $phone ) {
        $phone = esc_sql( trim( $phone ) );
        $phantom_workers = get_option( 'phantom_workers' );
        if ( ! empty( $phantom_workers ) && in_array( $phone, $phantom_workers ) ) {
            self::show_magic_link();
        } else {
            self::_head();
            self::thanks_body();
        }
    }

    private function show_magic_link() {
        ?> <h1>Do stuff...</h1> <?php
        exit;
    }
}
Phantom_Site_Plugin_Home::instance();