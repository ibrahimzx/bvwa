<?php

class LoginModel {
	
	private $table = 'user';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function checkLogin($data)
	{
		$query = "SELECT * FROM user WHERE username = :username AND password = :password";
		$this->db->query($query);
		$this->db->bind('username', $data['username']);
		$this->db->bind('password', md5($data['password']));
		//$this->db->execute();
		//return $this->db->rowCount();
		$data =  $this->db->single();
		return $data;
	}

	public function isLoggedIn($sesi) {

		if(isset($sesi) == 'sudah_login') {
			return header('location: '. base_url . '/home');
		}

	}

	public function registrasi($data) {

		$query = "INSERT INTO user(nama, username, password, photo, saldo, level) VALUES(:nama,:username,:password, :photo, :saldo, :level)";

		$this->db->query($query);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('username', $data['username']);
		$this->db->bind('password', md5($data['password']));
		$this->db->bind('photo', 'avatar.png');
		$this->db->bind('saldo', 100000);
		$this->db->bind('level', 'user');


		$this->db->execute();
		return $this->db->rowCount();
	}

}