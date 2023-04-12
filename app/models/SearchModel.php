<?php


class SearchModel {

	//private $table = 'paper';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function searchData($table, $judul) {
		$this->db->query("SELECT * FROM {$table} WHERE judul LIKE '%$judul'");
		return $this->db->resultSet();
	}

}