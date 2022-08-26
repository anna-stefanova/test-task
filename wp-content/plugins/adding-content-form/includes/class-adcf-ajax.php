<?php
class ADCF_Ajax {

	public function __construct() {
		add_action( 'wp_ajax_created_property', [ $this, 'callback' ] );
		add_action( 'wp_ajax_nopriv_created_property', [ $this, 'callback' ] );

	}

	public function callback() {

		check_ajax_referer('adcf-ajax-nonce', 'nonce');

		$this->validation();
		$this->validation_thumbnail();

		$property_data = [
			'post_type' => 'property',
			'post_status' => 'publish',
			'post_title' => sanitize_text_field($_POST['property_title']),
			'post_content' => wp_kses_post($_POST['property_description']),
			'meta_input'   => [
				'square'     => sanitize_text_field( $_POST['property_square'] ),
				'price' => sanitize_text_field( $_POST['property_price'] ),
				'address' => sanitize_text_field( $_POST['property_address'] ),
				'living_area' => sanitize_text_field( $_POST['property_living_area'] ),
				'floor' => sanitize_text_field( $_POST['property_floor'] ),
			],
			'tax_input' => [
				'property_type' => $_POST['property_type'],
				'property_city' => $_POST['property_city']
			],

		];

		$post_id = wp_insert_post($property_data);

		$this->upload_thumbnail( $post_id );

		$this->set_term($post_id, $property_data['tax_input']);

		$this->success( 'Событие `' . $post_id . '` успешно создано' );

		wp_die();
	}

	public function upload_thumbnail( $post_id ) {
		if ( empty( $_FILES ) ) {
			return;
		}

		require_once( ABSPATH . 'wp-admin/includes/image.php' );
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		require_once( ABSPATH . 'wp-admin/includes/media.php' );

		add_filter( 'upload_mimes', function ( $mimes ) {
			return [
				'jpg|jpeg|jpe' => 'image/jpeg',
				'png'          => 'image/png',
				];
			}
		);

		$attachment_id = media_handle_upload( 'property_thumbnail', $post_id );

		if ( is_wp_error( $attachment_id ) ) {
			$response_message = 'Ошибка загрузки файла `' . $_FILES['property_thumbnail']['name'] . '`: ' . $attachment_id->get_error_message();
			$this->error( $response_message );
		}

		set_post_thumbnail( $post_id, $attachment_id );
	}


	public function set_term($post_id, $data) {
		foreach ($data as $key => $value) {
			wp_set_object_terms($post_id, $value, $key);
		}

	}

	//проверка на пустоту
	public function validation() {
		$error = [];
		$required = [
			'property_title' => 'Это обязательное поле. Укажите название недвижимости',
			'property_type' => 'Это обязательное поле. Выберите тип недвижимости',
			'property_city' => 'Это обязательное поле. Выберите город',
			'property_descriptions' => 'Это обязательное поле. Укажите описание недвижимости',
			'property_square' => 'Это обязательное поле. Укажите площадь недвижимости',
			'property_price' => 'Это обязательное поле. Укажите стоимость недвижимости',
			'property_address' => 'Это обязательное поле. Укажите адрес недвижимости',
			'property_living_area' => 'Это обязательное поле. Укажите жилую площадь недвижимости',
			];

		foreach ( $required as $key => $item ) {

			if ( empty( $_POST[ $key ]) ) {
				$error[ $key ] = $item;
			}
		}

		if ( $error ) {
			$this->error( $error );
		}
	}

	public function validation_thumbnail() {

		if ( ! empty( $_FILES ) ) {
			$size     = getimagesize( $_FILES['property_thumbnail']['tmp_name'] );
			$max_size = 1800;

			if ( $size[0] > $max_size || $size[1] > $max_size ) {
				$image_message = 'Изображение не может быть больше ' . $max_size . 'рх в высоту или ширину';
				$this->remove_image( $image_message );
			}
		}

	}

	public function success($message){
		wp_send_json_success([
			'response' => 'SUCCESS',
				'message' => $message,
			]
		);
	}

	public function error($message) {
		wp_send_json_error([
			'response' => 'ERROR',
			'message' => $message,
		]);
	}

	public function remove_image( $image_message ) {

		unlink( $_FILES['property_thumbnail']['tmp_name'] );

		$this->error( $image_message );;
	}
}
