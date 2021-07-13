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
	  		'data:image/svg+xml;base64,PHN2ZyBpZD0ic3ZnIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB3aWR0aD0iNDAwIiBoZWlnaHQ9IjQwMCIgdmlld0JveD0iMCwgMCwgNDAwLDQwMCI+PGcgaWQ9InN2Z2ciPjxwYXRoIGlkPSJwYXRoMCIgZD0iTTE1My44NDcgNDUuNTQzIEMgMTUyLjg2NyA0Ni41ODUsMTUyLjg1NiA0Ni42OTMsMTUyLjcxMiA1Ni4xNTUgTCAxNTIuNTY3IDY1LjcxNCAxMzIuMDY5IDY1LjcxNCBMIDExMS41NzEgNjUuNzE0IDExMC42ODMgNjYuNjU5IEMgMTEwLjE5NSA2Ny4xNzksMTA5Ljc5NiA2OC4wODQsMTA5Ljc5NiA2OC42NzEgQyAxMDkuNzk2IDY5LjI1NywxMDkuNTIwIDcwLjAxMywxMDkuMTg0IDcwLjM1MCBDIDEwOC42NzggNzAuODU1LDEwOC41NzEgNzIuNDYyLDEwOC41NzEgNzkuNTYzIEwgMTA4LjU3MSA4OC4xNjMgOTkuMDMwIDg4LjE2MyBDIDg2Ljc4NSA4OC4xNjMsODcuMzk2IDg3LjQ2NCw4Ny4zNjUgMTAxLjUzMSBMIDg3LjM0NyAxMDkuNzk2IDc3LjQxOCAxMDkuNzk2IEwgNjcuNDg5IDEwOS43OTYgNjYuNTAwIDExMC44NDkgTCA2NS41MTAgMTExLjkwMiA2NS4zODkgMTQzLjUwMiBMIDY1LjI2OSAxNzUuMTAyIDU1LjU1NSAxNzUuMTAyIEMgNDYuMTk3IDE3NS4xMDIsNDUuODEyIDE3NS4xMzQsNDUuMDYzIDE3NS45NjEgQyA0NC4yMjkgMTc2Ljg4Myw0My43OTUgMzU2LjU4NCw0NC42MjUgMzU3LjQxNSBDIDQ0LjgxMiAzNTcuNjAyLDUwLjc1NiAzNTcuODA5LDU3LjgzNSAzNTcuODc0IEMgNzEuMzcyIDM1Ny45OTksNzIuNjUzIDM1Ny44NDYsNzIuNjUzIDM1Ni4xMTMgQyA3Mi42NTMgMzU1Ljc4MSw3Mi44MzcgMzU1LjUxMCw3My4wNjEgMzU1LjUxMCBDIDczLjMyMSAzNTUuNTEwLDczLjQ2OSAzNTIuMzI3LDczLjQ2OSAzNDYuNzc4IEMgNzMuNDY5IDMzOS4xOTMsNzMuNTU0IDMzOC4wMTQsNzQuMTE1IDMzNy43OTkgQyA3NC40NzAgMzM3LjY2Myw3OC41NTcgMzM3LjUzOCw4My4xOTcgMzM3LjUyMSBDIDkyLjI5MSAzMzcuNDg5LDkzLjU2MiAzMzcuMjI1LDk0LjQ4NSAzMzUuMTc5IEMgOTQuNzA2IDMzNC42ODgsOTUuMDI4IDMzNC4yODYsOTUuMTk5IDMzNC4yODYgQyA5NS4zNzAgMzM0LjI4Niw5NS41MTAgMzMwLjI4Miw5NS41MTAgMzI1LjM4OCBDIDk1LjUxMCAzMTQuNTc0LDk0Ljg0NSAzMTUuNTEwLDEwMi41MzEgMzE1LjUxMCBMIDEwOC41NzEgMzE1LjUxMCAxMDguNTcxIDMyNC44OTggQyAxMDguNTcxIDMzMS43NzgsMTA4LjY5OSAzMzQuMjg2LDEwOS4wNDggMzM0LjI4NiBDIDEwOS4zMTAgMzM0LjI4NiwxMDkuNDAwIDMzNC40MTAsMTA5LjI0OCAzMzQuNTYyIEMgMTA4Ljg4NyAzMzQuOTIyLDExMC41OTUgMzM2LjczNSwxMTEuMjk2IDMzNi43MzUgQyAxMTEuNTkzIDMzNi43MzUsMTExLjgzNyAzMzYuOTE4LDExMS44MzcgMzM3LjE0MyBDIDExMS44MzcgMzM3LjQwMiwxMTUuMDIzIDMzNy41NTEsMTIwLjU3OSAzMzcuNTUxIEMgMTI1LjM4NyAzMzcuNTUxLDEyOS42MTIgMzM3LjY2MywxMjkuOTY3IDMzNy43OTkgQyAxMzAuNTI5IDMzOC4wMTQsMTMwLjYxMiAzMzkuMjIyLDEzMC42MTIgMzQ3LjEwOSBDIDEzMC42MTIgMzU0LjI5MSwxMzAuNzMyIDM1Ni4zMzUsMTMxLjE5MiAzNTYuOTYzIEMgMTMyLjA5OSAzNTguMjAzLDE4MC41NTQgMzU4LjIwMywxODEuNDYxIDM1Ni45NjMgQyAxODEuOTQzIDM1Ni4zMDQsMTgyLjA0MSAzNTIuODIxLDE4Mi4wNDEgMzM2LjMzMCBDIDE4Mi4wNDEgMzIxLjQ0MywxODIuMTYzIDMxNi4zNjgsMTgyLjUzMSAzMTYuMDAwIEMgMTgzLjIzNSAzMTUuMjk2LDIxNi43NjUgMzE1LjI5NiwyMTcuNDY5IDMxNi4wMDAgQyAyMTcuODM3IDMxNi4zNjgsMjE3Ljk1OSAzMjEuNDQzLDIxNy45NTkgMzM2LjMzMCBDIDIxNy45NTkgMzUyLjgxOCwyMTguMDU3IDM1Ni4zMDQsMjE4LjUzOCAzNTYuOTYzIEMgMjE5LjExOCAzNTcuNzU2LDI2Mi44NTQgMzU4LjQ4MywyNjYuNzkyIDM1Ny43NjUgQyAyNjguNTc5IDM1Ny40MzksMjY4LjY1OCAzNTYuOTYwLDI2OC41NzEgMzQ2Ljk4NiBDIDI2OC41MTEgMzQwLjA2MywyNjguNjA5IDMzOC4xODYsMjY5LjA0NCAzMzcuOTExIEMgMjY5LjM0NSAzMzcuNzIwLDI3My43NzAgMzM3LjU2MSwyNzguODc4IDMzNy41NTcgQyAyODQuNzkyIDMzNy41NTMsMjg4LjE2MyAzMzcuNDAzLDI4OC4xNjMgMzM3LjE0MyBDIDI4OC4xNjMgMzM2LjkxOCwyODguNDA3IDMzNi43MzUsMjg4LjcwNCAzMzYuNzM1IEMgMjg5LjQwNSAzMzYuNzM1LDI5MS4xMTMgMzM0LjkyMiwyOTAuNzUyIDMzNC41NjIgQyAyOTAuNjAwIDMzNC40MTAsMjkwLjY5MCAzMzQuMjg2LDI5MC45NTIgMzM0LjI4NiBDIDI5MS4zMDEgMzM0LjI4NiwyOTEuNDI5IDMzMS43NzgsMjkxLjQyOSAzMjQuODk4IEwgMjkxLjQyOSAzMTUuNTEwIDI5Ny40NjkgMzE1LjUxMCBDIDMwNS4xNTUgMzE1LjUxMCwzMDQuNDkwIDMxNC41NzQsMzA0LjQ5MCAzMjUuMzg4IEMgMzA0LjQ5MCAzMzAuMjgyLDMwNC42MzAgMzM0LjI4NiwzMDQuODAxIDMzNC4yODYgQyAzMDQuOTcyIDMzNC4yODYsMzA1LjI5NCAzMzQuNjg4LDMwNS41MTUgMzM1LjE3OSBDIDMwNi40MzggMzM3LjIyNSwzMDcuNzA5IDMzNy40ODksMzE2LjgwMyAzMzcuNTIxIEMgMzIxLjQ0MyAzMzcuNTM4LDMyNS41MzAgMzM3LjY2MywzMjUuODg1IDMzNy43OTkgQyAzMjYuNDQ2IDMzOC4wMTQsMzI2LjUzMSAzMzkuMTkzLDMyNi41MzEgMzQ2Ljc3OCBDIDMyNi41MzEgMzUyLjMyNywzMjYuNjc5IDM1NS41MTAsMzI2LjkzOSAzNTUuNTEwIEMgMzI3LjE2MyAzNTUuNTEwLDMyNy4zNDcgMzU1Ljc4MSwzMjcuMzQ3IDM1Ni4xMTMgQyAzMjcuMzQ3IDM1Ny44NDYsMzI4LjYyOCAzNTcuOTk5LDM0Mi4xNjUgMzU3Ljg3NCBDIDM0OS4yNDQgMzU3LjgwOSwzNTUuMTg4IDM1Ny42MDIsMzU1LjM3NSAzNTcuNDE1IEMgMzU2LjIwNSAzNTYuNTg0LDM1NS43NzEgMTc2Ljg4MywzNTQuOTM3IDE3NS45NjEgQyAzNTQuMTg4IDE3NS4xMzQsMzUzLjgwMyAxNzUuMTAyLDM0NC40NDUgMTc1LjEwMiBMIDMzNC43MzEgMTc1LjEwMiAzMzQuNjExIDE0My41MDIgTCAzMzQuNDkwIDExMS45MDIgMzMzLjUwMCAxMTAuODQ5IEwgMzMyLjUxMSAxMDkuNzk2IDMyMi41ODIgMTA5Ljc5NiBMIDMxMi42NTMgMTA5Ljc5NiAzMTIuNjM1IDEwMS41MzEgQyAzMTIuNjA0IDg3LjQ2NCwzMTMuMjE1IDg4LjE2MywzMDAuOTcwIDg4LjE2MyBMIDI5MS40MjkgODguMTYzIDI5MS40MjkgNzkuNTYzIEMgMjkxLjQyOSA3Mi40NjIsMjkxLjMyMiA3MC44NTUsMjkwLjgxNiA3MC4zNTAgQyAyOTAuNDgwIDcwLjAxMywyOTAuMjA0IDY5LjIzMiwyOTAuMjA0IDY4LjYxMyBDIDI5MC4yMDQgNjUuNjQ5LDI5MC43MDcgNjUuNzE0LDI2Ny44NzQgNjUuNzE0IEwgMjQ3LjQzMyA2NS43MTQgMjQ3LjI4OCA1Ni4xNTUgQyAyNDcuMTQ0IDQ2LjY5MywyNDcuMTMzIDQ2LjU4NSwyNDYuMTUzIDQ1LjU0MyBMIDI0NS4xNjQgNDQuNDkwIDIwMC4wMDAgNDQuNDkwIEwgMTU0LjgzNiA0NC40OTAgMTUzLjg0NyA0NS41NDMgTTE3OC4zNjcgMTIzLjY3MyBMIDE3OC41NzEgMTM0LjQ5MCAxODkuMjg2IDEzNC41OTkgTCAyMDAuMDAwIDEzNC43MDcgMjAwLjAwMCAxNDUuNzIxIEwgMjAwLjAwMCAxNTYuNzM1IDE3OC4zNjcgMTU2LjczNSBMIDE1Ni43MzUgMTU2LjczNSAxNTYuNzM1IDE3OC4zNjcgTCAxNTYuNzM1IDIwMC4wMDAgMTY3LjU1MSAyMDAuMDAwIEwgMTc4LjM2NyAyMDAuMDAwIDE3OC4zNjcgMjExLjAyMCBMIDE3OC4zNjcgMjIyLjA0MSAxNTYuMzMzIDIyMi4wNDEgTCAxMzQuMjk5IDIyMi4wNDEgMTM0LjE5MCAyMTEuMzI3IEwgMTM0LjA4MiAyMDAuNjEyIDEyMy40NjkgMjAwLjQwOCBMIDExMi44NTcgMjAwLjIwNCAxMTIuNzUzIDE2Ny40NTYgTCAxMTIuNjQ4IDEzNC43MDcgMTIzLjM2NSAxMzQuNTk5IEwgMTM0LjA4MiAxMzQuNDkwIDEzNC4xODUgMTI0LjA4MiBDIDEzNC4yNDMgMTE4LjM1NywxMzQuMzc1IDExMy40NDIsMTM0LjQ4MCAxMTMuMTYwIEMgMTM0LjYzMSAxMTIuNzU0LDEzOS4yMzUgMTEyLjY2OCwxNTYuNDE3IDExMi43NTIgTCAxNzguMTYzIDExMi44NTcgMTc4LjM2NyAxMjMuNjczIE0zMDguOTgwIDEyMy42NzMgTCAzMDkuMTg0IDEzNC40OTAgMzIwLjEwMiAxMzQuNTk5IEwgMzMxLjAyMCAxMzQuNzA3IDMzMS4wMjAgMTQ1LjcxNyBMIDMzMS4wMjAgMTU2LjcyOCAzMDkuMDgyIDE1Ni44MzMgTCAyODcuMTQzIDE1Ni45MzkgMjg3LjE0MyAxNzguMzY3IEwgMjg3LjE0MyAxOTkuNzk2IDI5OC4wNjEgMTk5LjkwNSBMIDMwOC45ODAgMjAwLjAxMyAzMDguOTgwIDIxMS4wMjcgTCAzMDguOTgwIDIyMi4wNDEgMjg2Ljk0NiAyMjIuMDQxIEwgMjY0LjkxMiAyMjIuMDQxIDI2NC44MDMgMjExLjMyNyBMIDI2NC42OTQgMjAwLjYxMiAyNTQuMDgyIDIwMC40MDggTCAyNDMuNDY5IDIwMC4yMDQgMjQzLjM2NSAxNjcuNDU2IEwgMjQzLjI2MCAxMzQuNzA3IDI1My45NzcgMTM0LjU5OSBMIDI2NC42OTQgMTM0LjQ5MCAyNjQuNzk4IDEyNC4wODIgQyAyNjQuODU1IDExOC4zNTcsMjY0Ljk4NyAxMTMuNDQyLDI2NS4wOTIgMTEzLjE2MCBDIDI2NS4yNDMgMTEyLjc1NCwyNjkuODQ4IDExMi42NjgsMjg3LjAyOSAxMTIuNzUyIEwgMzA4Ljc3NiAxMTIuODU3IDMwOC45ODAgMTIzLjY3MyAiIHN0cm9rZT0ibm9uZSIgZmlsbD0iIzAwMDAwMCIgZmlsbC1ydWxlPSJldmVub2RkIj48L3BhdGg+PC9nPjwvc3ZnPg==',
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
	  	$slug = 'phantom-site';

        if ( ! current_user_can( 'activate_plugins' ) ) {
            wp_die( esc_attr__( 'You do not have sufficient permissions to access this page.' ) );
        }
        ?>
        <div class="wrap">
            <h2>Phantom Site Settings</h2>
            <form method="post">
            	<table class="form-table" role="presentation">
	            	<tr>
	            		<th scope="row">
	            			<label for="default_role">Site Type</label>
	            		</th>
	            		<td>
	            			<fieldset>
	            				<label><input type="radio" name="site_type" id="math_class_site" value='math_class' checked="checked"/> <img src="<?php echo esc_url( self::get_plugin_base_url() ); ?>/home/images/logo.png" class="avatar avatar-32 photo" height="32" width="32" loading="lazy"/> Math Class (default)</label><br />
	            			</fieldset>
	            		</td>
	            	</tr>
	            	<tr>
	            		<th scope="row">
	            			<label>Under Construction Mode</label>
	            		</th>
	            		<td>								
							<div class="row-actions visible">
								<span class="activate">
									<a href="#" id="activate-under-construction-mode" class="edit" aria-label="Activate Under Construction Mode">Activate</a>
								</span>
							</div>
	            		</td>
	            	</tr>
	            	<tr>
	            		<td>
		            		<input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"  />
	            		</td>
	            	</tr>
	            </table>
            </form>
        </div><!-- End wrap -->
        <?php
	}
}

Phantom_Site_Plugin_Menu::instance();