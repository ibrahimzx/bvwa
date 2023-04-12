<?php

class Cart extends Controller {
	
	public function index($id = null) {

		if(!isset($id)) {
			echo "id tidak ditemukan";
			exit;
		}

		$data['title'] = 'Halaman Keranjang';
		$data['user'] = $this->model('UserModel')->getUserById($id);
		$data['cart'] = $this->model('CartModel')->getData($id);

		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('cart/index', $data);
		$this->view('templates/footer');
	}

	public function addBuku($id_buku) {

		$row = $this->model('UserModel')->getUsername($_SESSION['username']);
		$id_user = $row['id_user'];
		if(!empty($id_buku)) {
			if($this->model('CartModel')->add($id_user, intval($id_buku), null) > 0) {
				Flasher::setMessage('Berhasil','ditambahkan ke cart','success');
				header('location: '. base_url . '/buku');
				exit;
			}else{
				Flasher::setMessage('','Cart sudah ada','danger');
				header('location: '. base_url . '/buku');
				exit;	
			}
		}
	}

	public function addFilm($id_film) {
		$row = $this->model('UserModel')->getUsername($_SESSION['username']);
		$id_user = $row['id_user'];
		if(!empty($id_film)) {
			if($this->model('CartModel')->add($id_user, null, intval($id_film)) > 0) {
				Flasher::setMessage('Berhasil','ditambahkan ke cart','success');
				header('location: '. base_url . '/film');
				exit;
			}else{
				Flasher::setMessage('', 'cart sudah ada','danger');
				header('location: '. base_url . '/film');
				exit;	
			}
		}
	}


	public function hapus($id) {

		if($this->model('CartModel')->hapus($id) > 0) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/cart/' . $_SESSION['id_user']);
			exit;
		}else{
			Flasher::setMessage('Gagal', 'dihapus','danger');
			header('location: '. base_url . '/cart/' . $_SESSION['id_user']);
			exit;	
		}
	}

	public function beliBuku($id) {
		if(!empty($id)) {
			$row = $this->model('UserModel')->getUsername($_SESSION['username']);
			$harga = isset($_POST['harga']) ? $_POST['harga'] : header('Location: ' . base_url . '/buku');
			$id_user = $row['id_user'];
			if($row['saldo'] >= $harga) {
				$updateSaldo = $row['saldo'] - $harga;
				$this->model('CartModel')->updateSaldo($id_user, $updateSaldo);
				if($this->model('CartModel')->singleBeliBuku($id_user, $id, $harga) > 0) {
					$_SESSION['saldo'] = $updateSaldo;
					Flasher::setMessage('Berhasil','terbeli, uang anda dikurangi ' . Flasher::rupiah($harga),'success');
					header('location: '. base_url . '/buku');
					exit;
				}else {
					Flasher::setMessage('Gagal', 'dibeli','danger');
					header('location: '. base_url . '/buku');
					exit;	
				}
			}else {
				Flasher::setMessage('Gagal', 'Saldo anda tidak cukup','danger');
				header('location: '. base_url . '/buku');
				exit;		
			}
		}else {
			Flasher::setMessage('Gagal', 'Buku tidak ada!','danger');
			header('location: '. base_url . '/buku');
			exit;
		}

	}


	public function beliFilm($id) {
		if(!empty($id)) {
			$row = $this->model('UserModel')->getUsername($_SESSION['username']);
			$harga = isset($_POST['harga']) ? $_POST['harga'] : header('Location: ' . base_url . '/film');
			$id_user = $row['id_user'];
			if($row['saldo'] >= $harga) {
				$updateSaldo = $row['saldo'] - $harga;
				$this->model('CartModel')->updateSaldo($id_user, $updateSaldo);
				if($this->model('CartModel')->singleBeliFilm($id_user, $id, $harga) > 0) {
					$_SESSION['saldo'] = $updateSaldo;
					Flasher::setMessage('Berhasil','terbeli, uang anda dikurangi ' . Flasher::rupiah($harga),'success');
					header('location: '. base_url . '/film');
					exit;
				}else {
					Flasher::setMessage('Gagal', 'dibeli','danger');
					header('location: '. base_url . '/film');
					exit;	
				}
			}else {
				Flasher::setMessage('Gagal', 'Saldo anda tidak cukup','danger');
				header('location: '. base_url . '/film');
				exit;		
			}
		}else {
			Flasher::setMessage('Gagal', 'film tidak ada!','danger');
			header('location: '. base_url . '/film');
			exit;
		}
	}

}

 ?>