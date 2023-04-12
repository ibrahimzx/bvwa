<?php

class FiturAdmin extends Controller {

	public function index() {

		if(isset($_POST['server'])) {
			$data['server'] = true;
		}elseif(isset($_POST['version'])) {
			$data['version'] = true;
		}elseif(isset($_POST['db'])){
			$data['db'] = true;
		}elseif(isset($_POST['web'])){
			$data['web'] = true;
		}

		$data['title'] = "Admin Area!"; 
		$this->view('templates/header', $data);
		$this->view('templates/sidebar');
		$this->view('administrator/index', $data);
		$this->view('templates/footer');
	}
}