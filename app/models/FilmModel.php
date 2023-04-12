<?php

class FilmModel {
	
	private $table = 'film';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllFilm()
	{
		$this->db->query("SELECT film.*, kategori.nama_kategori FROM " . $this->table . " JOIN kategori ON kategori.id = film.kategori_id");
		return $this->db->resultSet();
	}

	public function getFilmById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_film=:id_film');
		$this->db->bind('id_film',$id);
		return $this->db->single();
	}

	public function tambahFilm($data)
	{
		$query = "INSERT INTO film (judul, sutradara, tahun, kategori_id) VALUES(:judul, :sutradara,:tahun, :kategori_id)";
		$this->db->query($query);
		$this->db->bind('judul', $data['judul']);
		$this->db->bind('sutradara', $data['sutradara']);
		$this->db->bind('tahun', $data['tahun']);
		$this->db->bind('kategori_id', $data['kategori_id']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataFilm($data)
	{
		$query = "UPDATE film SET judul=:judul, sutradara=:sutradara, tahun=:tahun, kategori_id=:kategori_id WHERE id_film=:id_film";
		$this->db->query($query);
		$this->db->bind('id_film',$data['id_film']);
		$this->db->bind('judul', $data['judul']);
		$this->db->bind('sutradara', $data['sutradara']);
		$this->db->bind('tahun', $data['tahun']);
		$this->db->bind('kategori_id', $data['kategori_id']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteFilm($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariFilm()
	{
		$key = @$_POST['key'];
		$this->db->query("SELECT film.*, kategori.nama_kategori FROM " . $this->table . " JOIN kategori ON kategori.id = film.kategori_id WHERE judul LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}
}