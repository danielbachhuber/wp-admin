<?php

class WP_Admin {

	private static $instance;

	public static function get_instance() {

		if ( ! isset( self::$instance ) ) {
			self::$instance = new WP_Admin;
			self::$instance->load();
		}
		return self::$instance;
	}

	/**
	 * Release the kracken
	 */
	private function load() {

		spl_autoload_register( array( $this, 'autoload_class' ) );

		if ( is_admin() ) {
			$this->admin = WP_Admin\Admin::get_instance();
		} else {
			$this->frontend = WP_Admin\Frontend::get_instance();
		}

		$this->setup_actions();
		$this->setup_filters();

	}

	/**
	 * Autoload our classes
	 */
	public function autoload_class( $class ) {

		$class = ltrim( $class, '\\' );
		if ( 0 !== stripos( $class, 'WP_Admin\\' ) ) {
			return;
		}

		$parts = explode( '\\', $class );
		array_shift( $parts ); // Don't need "WP_Admin\"
		$last = array_pop( $parts ); // File should be 'class-[...].php'
		$last = 'class-' . $last . '.php';
		$parts[] = $last;
		$file = dirname( __FILE__ ) . '/inc/' . str_replace( '_', '-', strtolower( implode( $parts, '/' ) ) );
		if ( file_exists( $file ) ) {
			require $file;
		}

	}

	/**
	 * Set up theme actions
	 */
	private function setup_actions() {

		add_action( 'after_setup_theme', array( $this, 'action_after_setup_theme' ) );

	}

	/**
	 * Set up theme filters
	 */
	private function setup_filters() {
		
	}

	/**
	 * Set up the theme
	 */
	public function action_after_setup_theme() {
		add_editor_style( get_template_directory_uri() . '/assets/css/editor-style.css' );
	}

}

/**
 * Load the theme
 */
function WP_Admin() {
	return WP_Admin::get_instance();
}
WP_Admin();
