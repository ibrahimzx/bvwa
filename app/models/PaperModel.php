<?php

class PaperModel {
	
	private $table = 'paper';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllPaper()
	{
		$this->db->query("SELECT * FROM " . $this->table);
		return $this->db->resultSet();
	}

	public function simpanPaper($data) {
		$query = "INSERT INTO paper (judul,file) VALUES(:judul,:file)";
		$this->db->query($query);
		$this->db->bind('judul', $data['judul']);
		$this->db->bind('file',$_FILES['paper']['name']);
		$this->db->execute();

		return $this->db->rowCount();

	}


	public function hapusPaper($id) {
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}
}

?>