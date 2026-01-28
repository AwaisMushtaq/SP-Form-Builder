<?php 

/*
 * Plugin Name:       SP Form Builder
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Create Basic Drag & Drop Forms. 
 * Version:           1.0.0
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Author:            Awais Mushtaq
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       sp-fb
 * Domain Path:       /languages
 */

class SP_FB {

	public $ver = "";
	public $classPrefix = [ 'front', 'admin' ];

	public function __construct() {

		$this->ver = ( defined( 'WP_DEBUG' ) && WP_DEBUG ) ? time() : get_bloginfo( 'version' );
		$this->paths();
		add_action( 'wp_enqueue_scripts', [ $this, 'assets' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'admin_assets' ] );
		spl_autoload_register( [ $this, 'autoload' ] );
		$this->includeClasses();

	}

	public function paths() {

		defined( 'SP_FB_PATH' ) || define( 'SP_FB_PATH', plugin_dir_path(__FILE__) );
		defined( 'SP_FB_URL' ) || define( 'SP_FB_URL', plugin_dir_url(__FILE__) );

	}

	public function assets() {

		// Style 

		wp_enqueue_style( 'sp-fb-style', SP_FB_URL . '/assets/css/style.css', [], $this->ver, 'all' );

		// Script

		wp_enqueue_script( 'sp-fb-script', SP_FB_URL . '/assets/js/script.js', ['jquery'], $this->ver, true );

		 wp_localize_script( 'sp-fb-script', 'woo_ajax', array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'nonce'    => wp_create_nonce( 'woo_ajax_nonce' ),
        ));

	}

	public function admin_assets() {

		// Style 

		wp_enqueue_style( 'sp-fb-admin-style', SP_FB_URL . '/assets/admin/css/style.css', [], $this->ver, 'all' );

		// Script

		wp_enqueue_script( 'sp-fb-admin-script', SP_FB_URL . '/assets/admin/js/script.js', ['jquery'], $this->ver, true );

	}

	public function autoload( $class_name ) {

		if ( strpos( $class_name, 'SP' ) !== 0 ) {
            return;
        }

        if ( ! empty( $this->classPrefix ) ) {
        	foreach( $this->classPrefix as $prefix ) {
        		$file = strtolower( SP_FB_PATH . "includes\\".$prefix."\\" . $class_name . ".php" );
				if ( file_exists( $file ) ) {
					require_once $file;
				}
        	}
        }	

	}

	public function includeClasses() {

		new SP_Menu();

	}

}

new SP_FB();