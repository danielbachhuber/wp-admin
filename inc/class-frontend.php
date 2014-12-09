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
		add_action( 'wp_enqueue_scripts', array( $this, 'action_wp_enqueue_scripts_bust_cache' ), 100 );

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

	/**
	 * Bust cache for scripts and styles
	 */
	public function action_wp_enqueue_scripts_bust_cache() {
		global $wp_styles, $wp_scripts;

		// Find path of site root. Accounts for WP in subdir.
		$wp_dir = str_replace( home_url(), '', site_url() );
		$site_root_path = str_replace( $wp_dir, '', ABSPATH );

		foreach ( array( 'wp_styles', 'wp_scripts' ) as $resource ) {

			foreach ( (array) $$resource->queue as $name ) {

				if ( empty( $$resource->registered[$name] ) )
					continue;

				$src = $$resource->registered[$name]->src;

				// Admin scripts use path relative to site_url.
				if ( 0 === strpos( $src , '/' ) )
					$src = site_url( $src );
				
				// Skip external scripts.
				if ( false === strpos( $src, home_url() ) )
					continue;

				$file = str_replace( home_url( '/' ), $site_root_path, $src );

				if ( ! file_exists( $file ) )
					continue;

				$mtime = filectime( $file );
				$$resource->registered[$name]->ver = $$resource->registered[$name]->ver . '-' . $mtime;
				
			}
		}

	}

}
