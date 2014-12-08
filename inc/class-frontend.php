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

	}

	/**
	 * Set up frontend filters
	 */
	private function setup_filters() {
		
	}

}
