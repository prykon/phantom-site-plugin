<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; //Exit if accessed directly
}

/**
 * Class Phantom_Site_Plugin_Menu
 */
class Phantom_Site_Plugin_Menu {
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
        if ( ! is_admin() ) {
            return;
        }
        add_action( 'admin_menu', [ $this, 'add_menu' ] );
    } // End construct()

    /**
    * Loads the subnav page
    * @since 0.1.0
    */
    public function add_menu() {
        add_menu_page(
            'Phantom Site',
            'Phantom Site',
            'activate_plugins',
            'phantom-site',
            [ $this, 'admin_page' ],
            'data:image/svg+xml;base64,PHN2ZyBpZD0ic3ZnIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB3aWR0aD0iNDAwIiBoZWlnaHQ9IjQwMCIgdmlld0JveD0iMCwgMCwgNDAwLDQwMCIgZmlsbD0iI2ZmZmZmZiI+PGcgaWQ9InN2ZyI+PHBhdGggaWQ9InBhdGgwIiBkPSJNMTUzLjg0NyA0NS41NDMgQyAxNTIuODY3IDQ2LjU4NSwxNTIuODU2IDQ2LjY5MywxNTIuNzEyIDU2LjE1NSBMIDE1Mi41NjcgNjUuNzE0IDEzMi4wNjkgNjUuNzE0IEwgMTExLjU3MSA2NS43MTQgMTEwLjY4MyA2Ni42NTkgQyAxMTAuMTk1IDY3LjE3OSwxMDkuNzk2IDY4LjA4NCwxMDkuNzk2IDY4LjY3MSBDIDEwOS43OTYgNjkuMjU3LDEwOS41MjAgNzAuMDEzLDEwOS4xODQgNzAuMzUwIEMgMTA4LjY3OCA3MC44NTUsMTA4LjU3MSA3Mi40NjIsMTA4LjU3MSA3OS41NjMgTCAxMDguNTcxIDg4LjE2MyA5OS4wMzAgODguMTYzIEMgODYuNzg1IDg4LjE2Myw4Ny4zOTYgODcuNDY0LDg3LjM2NSAxMDEuNTMxIEwgODcuMzQ3IDEwOS43OTYgNzcuNDE4IDEwOS43OTYgTCA2Ny40ODkgMTA5Ljc5NiA2Ni41MDAgMTEwLjg0OSBMIDY1LjUxMCAxMTEuOTAyIDY1LjM4OSAxNDMuNTAyIEwgNjUuMjY5IDE3NS4xMDIgNTUuNTU1IDE3NS4xMDIgQyA0Ni4xOTcgMTc1LjEwMiw0NS44MTIgMTc1LjEzNCw0NS4wNjMgMTc1Ljk2MSBDIDQ0LjIyOSAxNzYuODgzLDQzLjc5NSAzNTYuNTg0LDQ0LjYyNSAzNTcuNDE1IEMgNDQuODEyIDM1Ny42MDIsNTAuNzU2IDM1Ny44MDksNTcuODM1IDM1Ny44NzQgQyA3MS4zNzIgMzU3Ljk5OSw3Mi42NTMgMzU3Ljg0Niw3Mi42NTMgMzU2LjExMyBDIDcyLjY1MyAzNTUuNzgxLDcyLjgzNyAzNTUuNTEwLDczLjA2MSAzNTUuNTEwIEMgNzMuMzIxIDM1NS41MTAsNzMuNDY5IDM1Mi4zMjcsNzMuNDY5IDM0Ni43NzggQyA3My40NjkgMzM5LjE5Myw3My41NTQgMzM4LjAxNCw3NC4xMTUgMzM3Ljc5OSBDIDc0LjQ3MCAzMzcuNjYzLDc4LjU1NyAzMzcuNTM4LDgzLjE5NyAzMzcuNTIxIEMgOTIuMjkxIDMzNy40ODksOTMuNTYyIDMzNy4yMjUsOTQuNDg1IDMzNS4xNzkgQyA5NC43MDYgMzM0LjY4OCw5NS4wMjggMzM0LjI4Niw5NS4xOTkgMzM0LjI4NiBDIDk1LjM3MCAzMzQuMjg2LDk1LjUxMCAzMzAuMjgyLDk1LjUxMCAzMjUuMzg4IEMgOTUuNTEwIDMxNC41NzQsOTQuODQ1IDMxNS41MTAsMTAyLjUzMSAzMTUuNTEwIEwgMTA4LjU3MSAzMTUuNTEwIDEwOC41NzEgMzI0Ljg5OCBDIDEwOC41NzEgMzMxLjc3OCwxMDguNjk5IDMzNC4yODYsMTA5LjA0OCAzMzQuMjg2IEMgMTA5LjMxMCAzMzQuMjg2LDEwOS40MDAgMzM0LjQxMCwxMDkuMjQ4IDMzNC41NjIgQyAxMDguODg3IDMzNC45MjIsMTEwLjU5NSAzMzYuNzM1LDExMS4yOTYgMzM2LjczNSBDIDExMS41OTMgMzM2LjczNSwxMTEuODM3IDMzNi45MTgsMTExLjgzNyAzMzcuMTQzIEMgMTExLjgzNyAzMzcuNDAyLDExNS4wMjMgMzM3LjU1MSwxMjAuNTc5IDMzNy41NTEgQyAxMjUuMzg3IDMzNy41NTEsMTI5LjYxMiAzMzcuNjYzLDEyOS45NjcgMzM3Ljc5OSBDIDEzMC41MjkgMzM4LjAxNCwxMzAuNjEyIDMzOS4yMjIsMTMwLjYxMiAzNDcuMTA5IEMgMTMwLjYxMiAzNTQuMjkxLDEzMC43MzIgMzU2LjMzNSwxMzEuMTkyIDM1Ni45NjMgQyAxMzIuMDk5IDM1OC4yMDMsMTgwLjU1NCAzNTguMjAzLDE4MS40NjEgMzU2Ljk2MyBDIDE4MS45NDMgMzU2LjMwNCwxODIuMDQxIDM1Mi44MjEsMTgyLjA0MSAzMzYuMzMwIEMgMTgyLjA0MSAzMjEuNDQzLDE4Mi4xNjMgMzE2LjM2OCwxODIuNTMxIDMxNi4wMDAgQyAxODMuMjM1IDMxNS4yOTYsMjE2Ljc2NSAzMTUuMjk2LDIxNy40NjkgMzE2LjAwMCBDIDIxNy44MzcgMzE2LjM2OCwyMTcuOTU5IDMyMS40NDMsMjE3Ljk1OSAzMzYuMzMwIEMgMjE3Ljk1OSAzNTIuODE4LDIxOC4wNTcgMzU2LjMwNCwyMTguNTM4IDM1Ni45NjMgQyAyMTkuMTE4IDM1Ny43NTYsMjYyLjg1NCAzNTguNDgzLDI2Ni43OTIgMzU3Ljc2NSBDIDI2OC41NzkgMzU3LjQzOSwyNjguNjU4IDM1Ni45NjAsMjY4LjU3MSAzNDYuOTg2IEMgMjY4LjUxMSAzNDAuMDYzLDI2OC42MDkgMzM4LjE4NiwyNjkuMDQ0IDMzNy45MTEgQyAyNjkuMzQ1IDMzNy43MjAsMjczLjc3MCAzMzcuNTYxLDI3OC44NzggMzM3LjU1NyBDIDI4NC43OTIgMzM3LjU1MywyODguMTYzIDMzNy40MDMsMjg4LjE2MyAzMzcuMTQzIEMgMjg4LjE2MyAzMzYuOTE4LDI4OC40MDcgMzM2LjczNSwyODguNzA0IDMzNi43MzUgQyAyODkuNDA1IDMzNi43MzUsMjkxLjExMyAzMzQuOTIyLDI5MC43NTIgMzM0LjU2MiBDIDI5MC42MDAgMzM0LjQxMCwyOTAuNjkwIDMzNC4yODYsMjkwLjk1MiAzMzQuMjg2IEMgMjkxLjMwMSAzMzQuMjg2LDI5MS40MjkgMzMxLjc3OCwyOTEuNDI5IDMyNC44OTggTCAyOTEuNDI5IDMxNS41MTAgMjk3LjQ2OSAzMTUuNTEwIEMgMzA1LjE1NSAzMTUuNTEwLDMwNC40OTAgMzE0LjU3NCwzMDQuNDkwIDMyNS4zODggQyAzMDQuNDkwIDMzMC4yODIsMzA0LjYzMCAzMzQuMjg2LDMwNC44MDEgMzM0LjI4NiBDIDMwNC45NzIgMzM0LjI4NiwzMDUuMjk0IDMzNC42ODgsMzA1LjUxNSAzMzUuMTc5IEMgMzA2LjQzOCAzMzcuMjI1LDMwNy43MDkgMzM3LjQ4OSwzMTYuODAzIDMzNy41MjEgQyAzMjEuNDQzIDMzNy41MzgsMzI1LjUzMCAzMzcuNjYzLDMyNS44ODUgMzM3Ljc5OSBDIDMyNi40NDYgMzM4LjAxNCwzMjYuNTMxIDMzOS4xOTMsMzI2LjUzMSAzNDYuNzc4IEMgMzI2LjUzMSAzNTIuMzI3LDMyNi42NzkgMzU1LjUxMCwzMjYuOTM5IDM1NS41MTAgQyAzMjcuMTYzIDM1NS41MTAsMzI3LjM0NyAzNTUuNzgxLDMyNy4zNDcgMzU2LjExMyBDIDMyNy4zNDcgMzU3Ljg0NiwzMjguNjI4IDM1Ny45OTksMzQyLjE2NSAzNTcuODc0IEMgMzQ5LjI0NCAzNTcuODA5LDM1NS4xODggMzU3LjYwMiwzNTUuMzc1IDM1Ny40MTUgQyAzNTYuMjA1IDM1Ni41ODQsMzU1Ljc3MSAxNzYuODgzLDM1NC45MzcgMTc1Ljk2MSBDIDM1NC4xODggMTc1LjEzNCwzNTMuODAzIDE3NS4xMDIsMzQ0LjQ0NSAxNzUuMTAyIEwgMzM0LjczMSAxNzUuMTAyIDMzNC42MTEgMTQzLjUwMiBMIDMzNC40OTAgMTExLjkwMiAzMzMuNTAwIDExMC44NDkgTCAzMzIuNTExIDEwOS43OTYgMzIyLjU4MiAxMDkuNzk2IEwgMzEyLjY1MyAxMDkuNzk2IDMxMi42MzUgMTAxLjUzMSBDIDMxMi42MDQgODcuNDY0LDMxMy4yMTUgODguMTYzLDMwMC45NzAgODguMTYzIEwgMjkxLjQyOSA4OC4xNjMgMjkxLjQyOSA3OS41NjMgQyAyOTEuNDI5IDcyLjQ2MiwyOTEuMzIyIDcwLjg1NSwyOTAuODE2IDcwLjM1MCBDIDI5MC40ODAgNzAuMDEzLDI5MC4yMDQgNjkuMjMyLDI5MC4yMDQgNjguNjEzIEMgMjkwLjIwNCA2NS42NDksMjkwLjcwNyA2NS43MTQsMjY3Ljg3NCA2NS43MTQgTCAyNDcuNDMzIDY1LjcxNCAyNDcuMjg4IDU2LjE1NSBDIDI0Ny4xNDQgNDYuNjkzLDI0Ny4xMzMgNDYuNTg1LDI0Ni4xNTMgNDUuNTQzIEwgMjQ1LjE2NCA0NC40OTAgMjAwLjAwMCA0NC40OTAgTCAxNTQuODM2IDQ0LjQ5MCAxNTMuODQ3IDQ1LjU0MyBNMTc4LjM2NyAxMjMuNjczIEwgMTc4LjU3MSAxMzQuNDkwIDE4OS4yODYgMTM0LjU5OSBMIDIwMC4wMDAgMTM0LjcwNyAyMDAuMDAwIDE0NS43MjEgTCAyMDAuMDAwIDE1Ni43MzUgMTc4LjM2NyAxNTYuNzM1IEwgMTU2LjczNSAxNTYuNzM1IDE1Ni43MzUgMTc4LjM2NyBMIDE1Ni43MzUgMjAwLjAwMCAxNjcuNTUxIDIwMC4wMDAgTCAxNzguMzY3IDIwMC4wMDAgMTc4LjM2NyAyMTEuMDIwIEwgMTc4LjM2NyAyMjIuMDQxIDE1Ni4zMzMgMjIyLjA0MSBMIDEzNC4yOTkgMjIyLjA0MSAxMzQuMTkwIDIxMS4zMjcgTCAxMzQuMDgyIDIwMC42MTIgMTIzLjQ2OSAyMDAuNDA4IEwgMTEyLjg1NyAyMDAuMjA0IDExMi43NTMgMTY3LjQ1NiBMIDExMi42NDggMTM0LjcwNyAxMjMuMzY1IDEzNC41OTkgTCAxMzQuMDgyIDEzNC40OTAgMTM0LjE4NSAxMjQuMDgyIEMgMTM0LjI0MyAxMTguMzU3LDEzNC4zNzUgMTEzLjQ0MiwxMzQuNDgwIDExMy4xNjAgQyAxMzQuNjMxIDExMi43NTQsMTM5LjIzNSAxMTIuNjY4LDE1Ni40MTcgMTEyLjc1MiBMIDE3OC4xNjMgMTEyLjg1NyAxNzguMzY3IDEyMy42NzMgTTMwOC45ODAgMTIzLjY3MyBMIDMwOS4xODQgMTM0LjQ5MCAzMjAuMTAyIDEzNC41OTkgTCAzMzEuMDIwIDEzNC43MDcgMzMxLjAyMCAxNDUuNzE3IEwgMzMxLjAyMCAxNTYuNzI4IDMwOS4wODIgMTU2LjgzMyBMIDI4Ny4xNDMgMTU2LjkzOSAyODcuMTQzIDE3OC4zNjcgTCAyODcuMTQzIDE5OS43OTYgMjk4LjA2MSAxOTkuOTA1IEwgMzA4Ljk4MCAyMDAuMDEzIDMwOC45ODAgMjExLjAyNyBMIDMwOC45ODAgMjIyLjA0MSAyODYuOTQ2IDIyMi4wNDEgTCAyNjQuOTEyIDIyMi4wNDEgMjY0LjgwMyAyMTEuMzI3IEwgMjY0LjY5NCAyMDAuNjEyIDI1NC4wODIgMjAwLjQwOCBMIDI0My40NjkgMjAwLjIwNCAyNDMuMzY1IDE2Ny40NTYgTCAyNDMuMjYwIDEzNC43MDcgMjUzLjk3NyAxMzQuNTk5IEwgMjY0LjY5NCAxMzQuNDkwIDI2NC43OTggMTI0LjA4MiBDIDI2NC44NTUgMTE4LjM1NywyNjQuOTg3IDExMy40NDIsMjY1LjA5MiAxMTMuMTYwIEMgMjY1LjI0MyAxMTIuNzU0LDI2OS44NDggMTEyLjY2OCwyODcuMDI5IDExMi43NTIgTCAzMDguNzc2IDExMi44NTcgMzA4Ljk4MCAxMjMuNjczICIgc3Ryb2tlPSJub25lIj48L3BhdGg+PC9nPjwvc3ZnPg==',
            2
        );
    }

    private function get_plugin_base_url() {
        // Remove '/admin/' subdirectory from plugin base url
        $plugin_base_url = untrailingslashit( plugin_dir_url( __FILE__ ) );
        $plugin_base_url = explode( '/', $plugin_base_url );
        array_pop( $plugin_base_url );
        $plugin_base_url = implode( '/', $plugin_base_url );
        return $plugin_base_url;
    }

    public function admin_page() {
        if ( isset( $_GET["tab"] ) ) {
            $tab = sanitize_key( wp_unslash( $_GET["tab"] ) );
        } else {
            $tab = 'settings';
        }

        switch ($tab) {
            case 'settings':
                $this->settings();
                break;
            default:
                break;
        }
    }

    private function settings() {
        $content = get_option( 'phantom_site_content', [] );

        if ( ! $content ){
            $content = [];
        }

        if ( isset( $_POST['phantom_site_nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['phantom_site_nonce'] ) ), 'phantom_site' . get_current_user_id() ) ) {

            if ( isset( $_POST['title'] ) ) {
                $content['title'] = sanitize_text_field( wp_unslash( $_POST['title'] ) );
            }
            if ( isset( $_POST['description'] ) ) {
                $content['description'] = sanitize_text_field( wp_unslash( $_POST['description'] ) );
            }
            if ( isset( $_POST['location'] ) ) {
                $content['location'] = sanitize_text_field( wp_unslash( $_POST['location'] ) );
            }
            if ( isset( $_POST['logo_url'] ) ) {
                $content['logo_url'] = sanitize_text_field( wp_unslash( $_POST['logo_url'] ) );
            }
            if ( isset( $_POST['background_image_url'] ) ) {
                $content['background_image_url'] = sanitize_text_field( wp_unslash( $_POST['background_image_url'] ) );
            }
            if ( isset( $_POST['facebook_url'] ) ) {
                $content['facebook_url'] = sanitize_text_field( wp_unslash( $_POST['facebook_url'] ) );
            }
            if ( isset( $_POST['facebook_events_url'] ) ) {
                $content['facebook_events_url'] = sanitize_text_field( wp_unslash( $_POST['facebook_events_url'] ) );
            }
            if ( isset( $_POST['instagram_url'] ) ) {
                $content['instagram_url'] = sanitize_text_field( wp_unslash( $_POST['instagram_url'] ) );
            }
            if ( isset( $_POST['twitter_url'] ) ) {
                $content['twitter_url'] = sanitize_text_field( wp_unslash( $_POST['twitter_url'] ) );
            }
            if ( isset( $_POST['stats_population'] ) ) {
                $content['stats_population'] = sanitize_text_field( wp_unslash( $_POST['stats_population'] ) );
            }
            if ( isset( $_POST['stats_cities'] ) ) {
                $content['stats_cities'] = sanitize_text_field( wp_unslash( $_POST['stats_cities'] ) );
            }
            if ( isset( $_POST['stats_trainings'] ) ) {
                $content['stats_trainings'] = sanitize_text_field( wp_unslash( $_POST['stats_trainings'] ) );
            }
            if ( isset( $_POST['stats_churches'] ) ) {
                $content['stats_churches'] = sanitize_text_field( wp_unslash( $_POST['stats_churches'] ) );
            } else {
                wp_die( esc_attr__( 'Nonce not verified' ) );
            }

            update_option( 'phantom_site_content', $content, true );
            $content = get_option( 'phantom_site_content' );
        }

        if ( ! current_user_can( 'activate_plugins' ) ) {
            wp_die( esc_attr__( 'You do not have sufficient permissions to access this page.' ) );
        }
        ?>
<style>.cell-title{width: 150px;}</style>
<div class="wrap">
 <h2>Phantom Site Settings</h2>
 <h2 class="nav-tab-wrapper">
  <a href="<?php echo esc_attr( $link ) . 'admin.php?page=phantom-site&tab=settings' ?>" class="nav-tab <?php echo esc_html( ( $tab == 'settings' || ! isset( $tab ) ) ? 'nav-tab-active' : '' ); ?>">Settings</a>
 </h2>
 <form method="post">
  <div id="poststuff">
   <div id="post-body" class="metabox-holder columns-2">
    <div id="post-body-content">
        <?php wp_nonce_field( 'phantom_site' . get_current_user_id(), 'phantom_site_nonce' ); ?>
     <table class="widefat striped">
     <thead>
      <tr>
       <th colspan="2">Phantom Site Configuration</th>
      </tr>
     </thead>
     <tbody>
      <tr>
       <td class="cell-title">Title</td>
       <td>
        <input type="text" name="title" class="regular-text" value="<?php echo esc_html( $content['title'] ?? '' ); ?>" />
       </td>
      </tr>
      <tr>
       <td class="cell-title">Description</td>
       <td>
        <input type="text" name="description" class="regular-text" value="<?php echo esc_html( $content['description'] ?? '' ); ?>" />
       </td>
      </tr>
      <tr>
       <td class="cell-title">Logo</td>
       <td>
        <input type="text" name="logo_url" class="regular-text" value="<?php echo esc_html( $content['logo_url'] ?? '' ); ?>" />
       </td>
      </tr>
      <tr>
       <td class="cell-title">Background Image URL</td>
       <td class="cell-title">
        <input type="text" name="background_image_url" class="regular-text" value="<?php echo esc_html( $content['background_image_url'] ?? '' ); ?>" />
       </td>
      </tr>
      <tr>
       <td class="cell-title">Facebook URL</td>
       <td>
        <input type="text" name="facebook_url" class="regular-text" value="<?php echo esc_html( $content['facebook_url'] ?? '' ); ?>" />
       </td>
      </tr>
      <tr>
       <td class="cell-title">Facebook Events URL</td>
       <td>
        <input type="text" name="facebook_events_url" class="regular-text" value="<?php echo esc_html( $content['facebook_events_url'] ?? '' ); ?>" />
       </td>
      </tr>
      <tr>
       <td class="cell-title">Instagram URL</td>
       <td>
        <input type="text" name="instagram_url" class="regular-text" value="<?php echo esc_html( $content['instagram_url'] ?? '' ); ?>" />
       </td>
      </tr>
      <tr>
       <td class="cell-title">Twitter URL</td>`
       <td>
        <input type="text" name="twitter_url" class="regular-text" value="<?php echo esc_html( $content['twitter_url'] ?? '' ); ?>" />
       </td>`
      </tr>
      <tr>
       <td colspan="2">
        <button type="submit" class="button">Update</button>
       </td>
      </tr>
     </tbody>
    </table>
    <br>
    <table class="widefat striped">
     <thead>
      <tr>
       <th colspan="2">Location Configuration</th>
      </tr>
     </thead>
    <tbody>
     <tr>
      <td class="cell-title">Location Name</td>
      <td>
       <input type="text" name="location" class="regular-text" value="<?php echo esc_html( $content['location'] ?? '' ); ?>" />
      </td>
     </tr>
     <tr>
      <td class="cell-title">Population</td>
      <td>
       <input type="text" name="stats_population" class="regular-text" value="<?php echo esc_html( $content['stats_population'] ?? '' ); ?>" />
      </td>
     </tr>
     <tr>
      <td class="cell-title">Cities</td>
      <td>
       <input type="text" name="stats_cities" class="regular-text" value="<?php echo esc_html( $content['stats_cities'] ?? '' ); ?>" />
      </td>
     </tr>
     <tr>
      <td class="cell-title">Trainings Needed</td>
      <td>
        <input type="text" name="stats_trainings" class="regular-text" value="<?php echo esc_html( $content['stats_trainings'] ?? '' ); ?>" />
      </td>
     </tr>
     <tr>
      <td class="cell-title">New Churches Needed</td>
      <td>
        <input type="text" name="stats_churches" class="regular-text" value="<?php echo esc_html( $content['stats_churches'] ?? '' ); ?>" />
      </td>
     </tr>
     <tr>
      <td colspan="2">
       <button type="submit" class="button">Update</button>
      </td>
     </tr>
    </tbody>
   </table>
   <br>
   <table class="widefat striped">
   <thead>
    <tr>
     <th colspan="2">Phantom Site Settings</th>
    </tr>
   </thead>
   <tbody>
    <tr>
     <th>
      <label for="default_role">Site Type</label>
     </th>
     <td>
      <select name="site_type">
       <option value="math_class" selected>Math Class (default)</option>
      </select>
     </td>
    </tr>
    <tr>
     <th>
      <label>Under Construction Mode</label>
     </th>
     <td>                               
      <span class="activate">
       <a href="#" id="activate-under-construction-mode" class="edit" aria-label="Activate Under Construction Mode">Activate</a>
      </span>
     </td>
    </tr>
    <tr>
     <td colspan="2">
      <button type="submit" class="button">Update</button>
     </td>
    </tr>
   </tbody>
  </table>
 </div>
</div>
</div>
</form>
</div><!-- End wrap -->
        <?php
    }
}
Phantom_Site_Plugin_Menu::instance();