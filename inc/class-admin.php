<?php

namespace WP_Admin;

class Admin {

	private static $instance;

	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new Admin;
			self::$instance->setup_actions();
			self::$instance->setup_filters();
		}
		return self::$instance;
	}

	/**
	 * Set up admin actions
	 */
	private function setup_actions() {

	}

	/**
	 * Set up admin filters
	 */
	private function setup_filters() {
		
	}

}
