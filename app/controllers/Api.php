<?php

class Api extends Controller {

	private $user = 'UserModel';

	public function index() {

		$data = ["message" => "Resource not found!!!"];


			$json = json_encode($data, JSON_PRETTY_PRINT);
			header('Content-Type: application/json');
			echo $json;

	}

	public function parseUser() {

		$request = isset($_SERVER['HTTP_REFERER']);
		
		if($request == 'http://localhost/bug-hunter/public/user') {
			$_SERVER['HTTP_AUTHORIZATION'] = base64_decode($_SERVER['HTTP_AUTHORIZATION']);
		}
		
		if($_SERVER['HTTP_AUTHORIZATION'] == 'bh1n3k4-t3ch-api') {
			$data = $this->model($this->user)->getAllUser();
			$response = [
				'status' => true,
				'message' => 'Success',
				'data' => $data
			];
			
			$json = json_encode($response, JSON_PRETTY_PRINT);
			header('Content-Type: application/json');
			echo $json;
		}else {
			$data = [
				'status' => false,
				'message' => 'Wrong Authorization!!'
			];


			$json = json_encode($data, JSON_PRETTY_PRINT);
			header('Content-Type: application/json');
			echo $json;
		}

	}
}



 ?>