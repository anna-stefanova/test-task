<?php
class ADCF_Ajax {

	public function __construct() {
		add_action( 'wp_ajax_created_event', [ $this, 'callback' ] );
		add_action( 'wp_ajax_nopriv_created_event', [ $this, 'callback' ] );
	}

	public function callback() {
		wp_die();
	}
}
