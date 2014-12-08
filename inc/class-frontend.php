<?php

namespace WP_Admin;

class Frontend {

	private static $instance;

	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new Frontend;
			self::$instance->setup_actions();
			self::$instance->setup_filters();
		}
		return self::$instance;
	}


	/**
	 * Set up frontend actions
	 */
	private function setup_actions() {

		add_action( 'wp_enqueue_scripts', array( $this, 'action_wp_enqueue_scripts' ) );

	}

	/**
	 * Set up frontend filters
	 */
	private function setup_filters() {
		
	}

	/**
	 * Enqueue scripts and styles
	 */
	public function action_wp_enqueue_scripts() {

		wp_enqueue_style( 'wp-admin-theme', get_template_directory_uri() . '/assets/css/theme.css' );

	}

}
