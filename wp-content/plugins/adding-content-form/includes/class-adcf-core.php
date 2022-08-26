<?php

class ADCF_Core {
	private static $instance;

	public function __construct() {
		$this->hooks();
		$this->includes();
	}

	public function hooks() {
		add_action('wp_enqueue_scripts', [$this, 'enqueue']);
	}

	public function includes() {
		require_once ADCF_DIR . 'includes/class-adcf-shortcode.php';
		new ADCF_Shortcode();

		require_once ADCF_DIR . 'includes/class-adcf-ajax.php';
		new ADCF_Ajax();
	}

	public function enqueue() {
		wp_register_style('adcf-styles', ADCF_URI . 'assets/adcf-style.css', [], filemtime(ADCF_DIR . 'assets/adcf-style.css'));
		wp_enqueue_style('adcf-styles' );
		wp_enqueue_script('jquery');

		wp_register_script('adcf-script', ADCF_URI . 'assets/adcf-script.js', ['jquery'], filemtime(ADCF_DIR . 'assets/adcf-script.js'), true);

		wp_register_script('adcf-ajax', ADCF_URI . 'assets/adcf-ajax.js', ['jquery'], filemtime(ADCF_DIR . 'assets/adcf-ajax.js'), true);

		wp_localize_script('adcf-ajax', 'adcf_ajax',
			[
				'url'   => admin_url( 'admin-ajax.php' ),
				'nonce' => wp_create_nonce( 'adcf-ajax-nonce' ),
			]
		);
	}

	public static function instance() {
		if ( is_null(self::$instance) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

}