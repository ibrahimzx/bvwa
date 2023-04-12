<?php

class Home extends Controller {
	public function __construct()
	{	
		if($_SESSION['session_login'] != 'sudah_login') {
			Flasher::setMessage('Login','Tidak ditemukan.','danger');
			header('location: '. base_url . '/auth');
		}
	} 
	 
	public function index()
	{	

		if(isset($_POST['url'])) {
			$url = $_POST['url'];

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			

			$output = curl_exec($ch);

			curl_close($ch);

			$json = json_decode($output, true);
			//$decode = json_decode($json, true);

			$data['dataku'] = $json;
		}
		$data['title'] = 'Halaman Home';
		
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('home/index', $data);
		$this->view('templates/footer');
	}

	
	public function profile() {

		$row = $this->model('UserModel')->getUsername($_SESSION['username']);
		$data['getData'] = [
			'id' => $row['id_user'],
			'nama' => $row['nama'],
			'username' => $row['username'],
			'photo' => $row['photo'],
			'level' => $row['level'],
		];

		$data['title'] = 'Halaman Profile';
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('home/profile', $data);
		$this->view('templates/footer');
	}



	function updateData() {

		$cek = false;
		$row = $this->model('UserModel')->getUsername($_SESSION['username']);
		if($_POST['password'] != $_POST['confirmPassword']) {
			Flasher::setMessage('Gagal','password tidak sama.','danger');
			header('location: '. base_url . '/home/profile');
		 	exit;
		}else if($_POST['nama'] == $row['nama']) {
			$cek = true;
		}

		$randomName = 'avatar.png';

		if($_FILES['photo']['size'] > 0) {
			$nama = $_FILES['photo']['name'];
			$ext = pathinfo($nama, PATHINFO_EXTENSION);
			$valid_ext = ['jpg', 'jpeg', 'png'];

			if(!in_array($ext, $valid_ext)) {
				Flasher::setMessage('Gagal','Extension file tidak valid','danger');
				header('location: '. base_url . '/home/profile');
		 		exit;
			}

			$randomName = bin2hex(random_bytes(10)) . '.' . $ext;
		}

		if($this->model('UserModel')->test($_POST, $_FILES['photo'], $randomName) > 0) {

			if($_FILES['photo']['size'] > 0) {
				if(!Uploader::ok($_FILES['photo'], $randomName, $row['photo']) AND $_FILES) {
					Flasher::setMessage('Gagal','diupdate','danger');
			 		header('location: '. base_url . '/home/profile');
					exit;
				}
			}

			Flasher::setMessage('Berhasil','diupdate','success');
			$_SESSION['nama'] = $_POST['nama'];
			header('location: '. base_url . '/home/profile');
			exit;
		}else {
			if($cek == true) {
				Flasher::setMessage('Berhasil','diupdate','success');
		 		header('location: '. base_url . '/home/profile');
				exit;
			}else {
				Flasher::setMessage('Gagal','diupdate','danger');
		 		header('location: '. base_url . '/home/profile');
				exit;
			}
		}
	}
	
}
