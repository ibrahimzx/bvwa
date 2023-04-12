<?php

class Paper extends Controller {

	public function __construct()
	{	
		if($_SESSION['session_login'] != 'sudah_login') {
			Flasher::setMessage('Login','Tidak ditemukan.','danger');
			header('location: '. base_url . '/auth');
		}
	} 


	public function index() {

		$data['title'] = "Halaman Paper";
		$data['paper'] = $this->model('PaperModel')->getAllPaper();

		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('paper/index', $data);
		$this->view('templates/footer');

	}



	public function add() {
		$data['title'] = "Halaman Tambah Paper";

		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('paper/create', $data);
		$this->view('templates/footer');
	}

	public function tambahPaper() {
		if(!empty($_POST) && !empty($_FILES['paper']['size']) > 0) {

			$dir = '/bug-hunter/public/dist/files/';
			if(!empty($_POST['uploadFolder'])) {
				if(is_dir($_SERVER['DOCUMENT_ROOT'] . $_POST['uploadFolder'])) {
					$dir = $_POST['uploadFolder'];
				}else {
					die('Folder tidak ada anak muda!!');
				}
			}
			$namaFile = $_FILES['paper']['name'];
			$ext = pathinfo($namaFile, PATHINFO_EXTENSION);
			$tmpName = $_FILES['paper']['tmp_name'];
			$path = $_SERVER['DOCUMENT_ROOT'] . $dir . basename($namaFile);
			$valid_ext = ['html', 'pdf'];
			if(in_array($ext, $valid_ext)){
				if(!move_uploaded_file($tmpName, $path)) {
					die('Gagal');
				}
			}else{
				Flasher::setMessage('Gagal,','Extension harus pdf/html','danger');
				header('location: '. base_url . '/paper');
				exit;
			}
			if($this->model('PaperModel')->simpanPaper($_POST) > 0) {
				Flasher::setMessage('Berhasil','Ditambahkan','success');
				header('location: '. base_url . '/paper');
				exit;	
			}else {
				Flasher::setMessage('Gagal','Ditambahkan','danger');
				header('location: '. base_url . '/paper');
				exit;
			}
		}
	}


	public function hapus() {

		if(isset($_POST)) {
			$id = $_POST['id'];
			$file = $_POST['file'];
			if($this->model('PaperModel')->hapusPaper($id) > 0) {
				$path = $_SERVER['DOCUMENT_ROOT'] . '/bug-hunter/public/dist/files/' . $file;
				if(file_exists($path)) {
					unlink($path);
				}

				Flasher::setMessage('Berhasil','Diihapus','success');
				header('location: '. base_url . '/paper');
				exit;	
			}else {
				Flasher::setMessage('Gagal','Diihapus','danger');
				header('location: '. base_url . '/paper');
				exit;
			}

		}
	}


	public function download() {
		if(!empty($_POST['file'])) {
			$path = $_SERVER["DOCUMENT_ROOT"];
			$file = $path . '/bug-hunter/public/dist/files/' . $_POST['file'];
			header('Content-Type: application/octet-stream');  
			header("Content-Transfer-Encoding: utf-8");   
			header("Content-disposition: attachment; filename=\"" . basename($file) . "\"");   
			readfile($file);  
		}

	}
}


?>