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
	}

	public function enqueue() {
		wp_register_style('adcf-styles', ADCF_URI . 'assets/adcf-style.css', [], filemtime(ADCF_DIR . 'assets/adcf-style.css'));
		wp_enqueue_style( 'adcf-styles' );

		wp_register_script('adcf-script', ADCF_URI . 'assets/adcf-script.js', ['jquery'], filemtime(ADCF_DIR . 'assets/adcf-script.js'), true);
		wp_enqueue_script( 'adcf-script' );
	}

	public static function instance() {
		if ( is_null(self::$instance) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

}