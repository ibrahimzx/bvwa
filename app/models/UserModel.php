	<?php

class UserModel {
	
	private $table = 'user';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllUser()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getUserById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_user=:id_user');
		$this->db->bind('id_user',$id);
		return $this->db->single();
	}

	public function tambahUser($data)
	{
		$query = "INSERT INTO user (nama,username,password,level) VALUES(:nama,:username,:password, :level)";
		$this->db->query($query);
		$this->db->bind('nama',$data['nama']);
		$this->db->bind('username',$data['username']);
		$this->db->bind('password', md5($data['password']));
		$this->db->bind('level', 'user');
		$this->db->execute();

		return $this->db->rowCount();
	}

	

	public function cekUsername(){
		$username = $_POST['username'];
		$this->db->query("SELECT * FROM user WHERE username = :username");
		$this->db->bind('username', $username);
		return $this->db->single();
	}

	public function getusername($data){

		$this->db->query("SELECT * FROM user WHERE username = :username");
		$this->db->bind('username', $data);
		return $this->db->single();
	}


	public function test($data, $file, $namaFile) {
		if(empty($data['password']) AND empty($file['name'])){
			$query = "UPDATE user SET nama=:nama WHERE id_user=:id_user";
			$this->db->query($query);
			$this->db->bind('id_user',$data['id']);
			$this->db->bind('nama',$data['nama']);
		}else if(!empty($data['password']) AND empty($file['name'])){
			$query = "UPDATE user SET nama=:nama, password=:password WHERE id_user=:id_user";
			$this->db->query($query);
			$this->db->bind('id_user',$data['id']);
			$this->db->bind('nama',$data['nama']);
			$this->db->bind('password', md5($data['password']));
		}else if(empty($data['password']) AND !empty($file)) {
			$query = "UPDATE user SET nama=:nama, photo=:photo WHERE id_user=:id_user";
			$this->db->query($query);
			$this->db->bind('id_user',$data['id']);
			$this->db->bind('nama',$data['nama']);
			$this->db->bind('photo', $namaFile);		
		}else {	
			$query = "UPDATE user SET nama=:nama, password=:password, photo=:photo WHERE id_user=:id_user";
			$this->db->query($query);
			$this->db->bind('id_user',$data['id']);
			$this->db->bind('nama',$data['nama']);
			$this->db->bind('password', md5($data['password']));
			$this->db->bind('photo', $namaFile);
		}
		
		
		$this->db->execute();
		return $this->db->rowCount();

	}


	public function updateFile($data, $file) {
		if(empty($_POST['password'])) {
			$query = "UPDATE user SET nama=:nama, photo=:photo WHERE id=:id";
			$this->db->query($query);
			$this->db->bind('id',$data['id']);
			$this->db->bind('nama',$data['nama']);
			$this->db->bind('photo', $data['photo']);
		}
		$this->db->execute();
		return $this->db->rowCount();
	}


	public function updateData($data) {
		if(empty($_POST['password'])) {
			$query = "UPDATE user SET nama=:nama WHERE id_user=:id_user";
			$this->db->query($query);
			$this->db->bind('id_user',$data['id']);
			$this->db->bind('nama',$data['nama']);
		}else {
			$query = "UPDATE user SET nama=:nama, password=:password WHERE id_user=:id_user";
			$this->db->query($query);
			$this->db->bind('id_user',$data['id']);
			$this->db->bind('nama',$data['nama']);
			$this->db->bind('password', md5($data['password']));
		}

		$this->db->execute();
		return $this->db->rowCount();
	}	

	public function updateDataUser($data, $files)
	{
		if(empty($_POST['password']) && $_FILES['photo']['size'] > 0) {
			$query = "UPDATE user SET nama=:nama, photo=:photo WHERE id=:id";
			$this->db->query($query);
			$this->db->bind('id_user',$data['id']);
			$this->db->bind('nama',$data['nama']);
			$this->db->bind('photo',$files);
		} else if($_FILES['photo']['size'] == 0 && !empty($_POST['password'])) {
			$query = "UPDATE user SET nama=:nama, password=:password WHERE id=:id";
			$this->db->query($query);
			$this->db->bind('id_user',$data['id']);
			$this->db->bind('nama',$data['nama']);
			$this->db->bind('password',md5($data['password']));
		} else if(empty($_POST['password']) && $_FILES['photo']['size'] == 0) {
			$query = "UPDATE user SET nama=:nama WHERE id=:id";
			$this->db->query($query);
			$this->db->bind('id_user',$data['id']);
			$this->db->bind('nama',$data['nama']);
		} else {
			$query = "UPDATE user SET nama=:nama, password=:password, photo=:photo WHERE id=:id";
			$this->db->query($query);
			$this->db->bind('id_user',$data['id']);
			$this->db->bind('nama',$data['nama']);
			$this->db->bind('password', md5($data['password']));
			$this->db->bind('photo', $files);
		}
		
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function deleteUser($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id_user',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariUser()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE nama LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}
}