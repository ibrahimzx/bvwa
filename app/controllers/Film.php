<?php

class Film extends Controller {
	
	public function __construct()
	{	
		if($_SESSION['session_login'] != 'sudah_login') {
			Flasher::setMessage('Login','Tidak ditemukan.','danger');
			header('location: '. base_url . '/Home');
		}
	}
	
	public function index()
	{
		$data['title'] = 'Data Film';
		$id_user = $this->model('UserModel')->getUsername($_SESSION['username'])['id_user'];
		$getIdFilm = $this->model('CartModel')->cek($id_user);
		$ambilDataCart = $this->model('CartModel')->dataCart($id_user);

		$dataCart = [];

		foreach($ambilDataCart as $cart) {
			array_push($dataCart, $cart['id_film']);
		}

		$tampung = [];
		foreach($getIdFilm as $idFilm) {
			array_push($tampung, $idFilm['id_film']);
		}

		$data['pembelian'] = $tampung;
		$data['cart'] = $dataCart;
		$data['film'] = $this->model('FilmModel')->getAllFilm();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('film/index', $data);
		$this->view('templates/footer');
	}
	public function lihatlaporan()
	{
		$data['title'] = 'Data Laporan Film';
		$data['buku'] = $this->model('FilmModel')->getAllFilm();
		$this->view('film/lihatlaporan', $data);
	}

	public function laporan()
	{
		$data['buku'] = $this->model('FilmModel')->getAllFilm();

			$pdf = new FPDF('p','mm','A4');
			// membuat halaman baru
			$pdf->AddPage();
			// setting jenis font yang akan digunakan
			$pdf->SetFont('Arial','B',14);
			// mencetak string 
			$pdf->Cell(190,7,'LAPORAN FILM',0,1,'C');
			 
			// Memberikan space kebawah agar tidak terlalu rapat
			$pdf->Cell(10,7,'',0,1);
			 
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(85,6,'JUDUL',1);
			$pdf->Cell(30,6,'SUTRADARA',1);
			$pdf->Cell(15,6,'TAHUN',1);
			$pdf->Cell(25,6,'GENRE',1);
			  $pdf->Ln();
			$pdf->SetFont('Arial','',10);
			 
			foreach($data['buku'] as $row) {
			    $pdf->Cell(85,6,$row['judul'],1);
			    $pdf->Cell(30,6,$row['sutradara'],1);
			    $pdf->Cell(15,6,$row['tahun'],1); 
			    $pdf->Cell(25,6,$row['nama_kategori'],1);
			    $pdf->Ln(); 
			}
			
			$pdf->Output('D', 'Laporan Film.pdf', true);

	}
	public function cari()
	{
		$data['title'] = 'Data Film';
		$data['film'] = $this->model('FilmModel')->cariFilm();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('film/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id){

		$data['title'] = 'Detail Film';
		$data['kategori'] = $this->model('KategoriModel')->getAllKategori();
		$data['film'] = $this->model('FilmModel')->getFilmById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('film/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah Film';		
		$data['kategori'] = $this->model('KategoriModel')->getAllKategori();		
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('film/create', $data);
		$this->view('templates/footer');
	}

	public function simpanFilm(){
		if(empty($_POST)) {
			header('location: '. base_url . '/film');
			exit;			
		}		
		if( $this->model('FilmModel')->tambahFilm($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/film');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/film');
			exit;	
		}
	}

	public function updateFilm(){	
		if( $this->model('FilmModel')->updateDataFilm($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/film');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/film');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('FilmModel')->deleteFilm($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/film');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/film');
			exit;	
		}
	}
}