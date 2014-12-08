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
			$this->admin = new WP_Admin\Admin;
		} else {
			$this->frontend = new WP_Admin\Frontend;
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

	}

	/**
	 * Set up theme filters
	 */
	private function setup_filters() {
		
	}

}

/**
 * Load the theme
 */
function WP_Admin() {
	return WP_Admin::get_instance();
}
WP_Admin();
