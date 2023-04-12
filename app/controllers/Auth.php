<?php

class Auth extends Controller {
 
	public function index()
	{

		if(isset($_SESSION['session_login'])) {
			$this->model('LoginModel')->isLoggedIn($_SESSION['session_login']);
		}
		$data['title'] = 'Halaman Login';
		$this->view('login/login', $data);
	}

	public function prosesLogin() {
		if($row = $this->model('LoginModel')->checkLogin($_POST) > 0 ) {
				$get = $this->model('UserModel')->getUsername($_POST['username']);
				$_SESSION['id_user'] = $get['id_user'];
				$_SESSION['username'] = $get['username'];
				$_SESSION['nama'] = $get['nama'];
				$_SESSION['saldo'] = $get['saldo'];
				$_SESSION['session_login'] = 'sudah_login';
				$name = "hak_akses";
				if($get['level'] == 'admin') {
					setcookie($name, 'admin', time() + 3600, "/");
				}else {
					setcookie($name, 'user', time() + 3600, "/");
				}
				header('location: '. base_url . '/home');
		} else {
			Flasher::setMessage('Username / Password','salah.','danger');
			header('location: '. base_url . '/Auth');
			exit;	
		}
	}


	public function prosesRegister() {

		if(!empty($_POST)) {
			if($_POST['password'] != $_POST['confirmPassword']) {
				Flasher::setMessage('Password tidak sesuai!!','lakukan registrasi ulang.','danger');
				header('location: '. base_url . '/Auth');
				exit;
			}

			if($_POST['nama'] != '' and $_POST['username'] and $_POST['password'] != '' and $_POST['confirmPassword'] != '') {
				$username = $this->model('UserModel')->cekUsername();

				if($username == true){
					Flasher::setMessage('Gagal','Username yang anda masukan sudah digunakan!','danger');
					header('location: '. base_url . '/Auth');
					exit;	
				}
				
				$row = $this->model('LoginModel')->registrasi($_POST);
				if($row > 0) {
					Flasher::setMessage('Registrasi sukses','silahkan login.','success');
					header('location: '. base_url . '/Auth');
					exit;
				}else {
					echo "Gagal";
				}
			}else {
				Flasher::setMessage('Belum Lengkap!!','lakukan registrasi ulang.','danger');
				header('location: '. base_url . '/Auth');
				exit;
			}

		}

	}

}