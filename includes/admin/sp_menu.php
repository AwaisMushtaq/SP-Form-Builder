<?php 

class SP_Menu {

	public function __construct() {

		add_action( 'admin_menu', [ $this, 'menu_page' ] );

	}

	public function menu_page() {

		add_menu_page(
			__( 'SP Form Builder', 'sp-fb' ),
			'SP Form Builder',
			'manage_options',
			'sp-form-builder',
			[ $this, 'forms' ],
			'dashicons-forms',
			3
		);

		add_submenu_page(
			'sp-form-builder',
			__( 'All Form', 'sp-fb' ),
			'All Form',
			'manage_options',
			'sp-form-builder',
			[ $this, 'forms' ],
		);

		add_submenu_page(
			'sp-form-builder',
			__( 'Add New', 'sp-fb' ),
			'Add New',
			'manage_options',
			'sp-new-form',
			[ $this, 'add_form' ],
		);

	}

	public function forms() {
		echo "<h1> All Forms </h1>";
	}

	public function add_form() {

		$file = SP_FB_PATH . '/templates/admin/add_form.php';
		if ( file_exists( $file ) ) {
			require_once $file;
		}

	}

}