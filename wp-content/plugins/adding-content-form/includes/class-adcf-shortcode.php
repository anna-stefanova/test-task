<?php

class ADCF_Shortcode {

	public function __construct() {
		add_shortcode('adcf_form', [$this, 'shortcode_form']);
	}

	public function shortcode_form() {
		ob_start();?>
		Это форма добавления недвижимости с главной страницы
		<?php
		return ob_get_clean();
	}
}