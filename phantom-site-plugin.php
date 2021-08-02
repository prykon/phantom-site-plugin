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
    * @access private
    * @since 0.1.0
    */
    private function __construct() {
        $this->check_script_url();
        $this->i18n();
        require_once( 'home/home.php' );
        require_once( 'admin/admin.php' );
    }

    /**
     * Checks what script url is requested and returns it
     * @since 0.1.0
     * @access public
     */
    public function check_script_url() {
        if ( ! isset( $_SERVER['REQUEST_URI'] ) ) {
            return;
        }

        $path = sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) );

        if ( preg_match( '/manifest\.json$/', $path ) ) {
            $this->display_manifest();
            die();
        }

        else if ( preg_match( '/phantom-app\.js$/', $path ) || preg_match( '/phantom-app\.js\S+=.+?$/', $path ) ) {
            $this->display_phantom_app();
            die();
        }

        else if ( preg_match( '/serviceworker\.js$/', $path ) ) {
            $this->display_serviceworker();
            die();
        }

        else if (preg_match( '/wp-admin.*?/', $path ) ) {
            return;
        }

        else if ( $path !== '/' ) {
            http_response_code( 404 );
            die();
        }
    }

    /**
     * Display the PWA manifest.json
     * @since 0.1.0
     * @access private
     */
    private function display_manifest() {
        $path = esc_attr( plugin_dir_url( __FILE__ ) );
        header( 'Content-Type: application/x-javascript' );
        $output = [];
        $output['short_name'] = 'Math Class';
        $output['name'] = 'We provide high quality education. For free.';
        $output['icons'];
        $output['icons'][0]['src'] = trailingslashit( plugin_dir_url( __FILE__ ) ) . 'home/images/logo-512.png';
        $output['icons'][0]['type'] = 'image/png';
        $output['icons'][0]['sizes'] = '512x512';
        $output['icons'][1]['src'] = trailingslashit( plugin_dir_url( __FILE__ ) ) . 'home/images/logo-192.png';
        $output['icons'][1]['type'] = 'image/png';
        $output['icons'][1]['sizes'] = '192x192';
        $output['icons'][2]['src'] = trailingslashit( plugin_dir_url( __FILE__ ) ) . 'home/images/logo-180.png';
        $output['icons'][2]['type'] = 'image/png';
        $output['icons'][2]['sizes'] = '180x180';
        $output['icons'][3]['src'] = trailingslashit( plugin_dir_url( __FILE__ ) ) . 'home/images/logo-120.png';
        $output['icons'][3]['type'] = 'image/png';
        $output['icons'][3]['sizes'] = '120x120';
        $output['icons'][4]['src'] = trailingslashit( plugin_dir_url( __FILE__ ) ) . 'home/images/logo-60.png';
        $output['icons'][4]['type'] = 'image/png';
        $output['icons'][4]['sizes'] = '60x60';
        $output['icons'][5]['src'] = trailingslashit( plugin_dir_url( __FILE__ ) ) . 'home/images/logo-30.png';
        $output['icons'][5]['type'] = 'image/png';
        $output['icons'][5]['sizes'] = '30x30';
        $output['icons'][6]['src'] = trailingslashit( plugin_dir_url( __FILE__ ) ) . 'home/favicon_square.png';
        $output['icons'][6]['type'] = 'image/png';
        $output['icons'][6]['sizes'] = '920x920';
        $output['icons'][6]['purpose'] = 'any maskable';
        $output['start_url'] = $path;
        $output['background_color'] = '#26BFB5';
        $output['display'] = 'standalone';
        $output['orientation'] = 'portrait';
        $output['scope'] = $path;
        $output['theme_color'] = '#26BFB5';
        $output['description'] = 'Free math classes';
        echo json_encode( $output );
    }

    /**
     * Display the PWA phantom-app.js
     * @since 0.1.0
     * @access private
     */
    private function display_phantom_app() {
        $path = esc_attr( plugin_dir_url( __FILE__ ) );
        header( 'content-type: application/x-javascript' );
        ?>
        // Ensure that the browser supports the service worker API
        if (navigator.serviceWorker) {
        // Start registration process on every page load
        window.addEventListener('load', () => {
            navigator.serviceWorker
                // The register function takes as argument
                // the file path to the worker's file
                .register('<?php echo esc_attr( $path ); ?>serviceworker.js')
                // Gives us registration object
                .then(reg => console.log('Service Worker Registered'))
                .catch(swErr => console.log(
                        `Service Worker Installation Error: ${swErr}}`));
            });

            window.addEventListener('beforeinstallprompt', (event) => {
              console.log('👍', 'beforeinstallprompt', event);
              // Stash the event so it can be triggered later.
              window.deferredPrompt = event;
              // Remove the 'hidden' class from the install button container
              divInstall.classList.toggle('hidden', false);
            });
        }
        <?php
    }

    /**
     * Display the PWA serviceworker.js
     * @since 0.1.0
     * @access private
     */
    private function display_serviceworker() {
        $path = esc_attr( plugin_dir_url( __FILE__ ) );
        header( 'content-type: application/x-javascript' );
        ?>
        var cacheName = 'math-class-cache';
        var cacheAssets = [
          '<?php echo esc_attr( trailingslashit( $path ) ); ?>wp-content/plugins/phantom-site-plugin/home/images/g-quote1.jpg',
          '<?php echo esc_attr( trailingslashit( $path ) ); ?>wp-content/plugins/phantom-site-plugin/home/images/g-quote2.jpg',
          '<?php echo esc_attr( trailingslashit( $path ) ); ?>wp-content/plugins/phantom-site-plugin/home/images/g-quote3.jpg',
          '<?php echo esc_attr( trailingslashit( $path ) ); ?>'wp-content/plugins/phantom-site-plugin/home/images/apple-splash-2048-2732.png',
          '/'
        ];

        // Call install Event
        self.addEventListener('install', e => {
          // Wait until promise is finished
          e.waitUntil(
            caches.open(cacheName)
            .then(cache => {
              console.log(`Service Worker: Caching Files: ${cache}`);
              cache.addAll(cacheAssets)
                // When everything is set
                .then(() => self.skipWaiting())
            })
          );
        })

        // Call Activate Event
        self.addEventListener('activate', e => {
          console.log('Service Worker: Activated');
          // Clean up old caches by looping through all of the
          // caches and deleting any old caches or caches that
          // are not defined in the list
          e.waitUntil(
            caches.keys().then(cacheNames => {
              return Promise.all(
                cacheNames.map(
                  cache => {
                    if (cache !== cacheName) {
                      console.log('Service Worker: Clearing Old Cache');
                      return caches.delete(cache);
                    }
                  }
                )
              )
            })
          );
        })

        // Call Fetch Event
        self.addEventListener('fetch', e => {
          console.log('Service Worker: Fetching');
          e.respondWith(
            fetch(e.request)
            .then(res => {
              // The response is a stream and in order the browser
              // to consume the response and in the same time the
              // cache consuming the response it needs to be
              // cloned in order to have two streams.
              const resClone = res.clone();
              // Open cache
              caches.open(cacheName)
                .then(cache => {
                  // Add response to cache
                  cache.put(e.request, resClone);
                });
              return res;
            }).catch(
              err => caches.match(e.request)
              .then(res => res)
            )
          );
        });
        <?php
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