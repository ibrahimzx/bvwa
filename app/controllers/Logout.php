<?php

class Logout {
	public function index(){
		if (isset($_COOKIE['hak_akses'])) {
		    unset($_COOKIE['hak_akses']);
		    setcookie('key', '', time() - 3600, '/'); // empty value and old timestamp
		}
		session_start();
		session_destroy();
		header('location: '. base_url . '/Auth');
	}
}