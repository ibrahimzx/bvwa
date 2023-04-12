<?php


class Search extends Controller {

	public function index() {


		if(isset($_POST['gass'])) {
			$table = $_POST['kategori'];
			$judul = $_POST['cari'];
			$cari = $this->model('SearchModel')->searchData($table, $judul);

			if($cari > 0) {
				$data['hasil'] = $cari;
				$data['kategori'] = $table;
			}
		}


		$data['title'] = 'Halaman Search';
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('search/index', $data);
		$this->view('templates/footer');
	}
}