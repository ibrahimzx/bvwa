<?php

	class CartModel {

		private $table = 'cart';
		private $db; 

		public function __construct()
		{
			$this->db = new Database;
		}

		public function getData ($user) {
			$id_user = $user;
			$query = "SELECT id_cart, judul, jenis, harga from cart join buku on cart.id_buku = buku.id_buku where id_user=$id_user UNION SELECT id_cart, judul, jenis, harga from cart JOIN film on cart.id_film = film.id_film where id_user={$id_user}";
			$this->db->query($query);
			return $this->db->resultSet();
		}


		public function add($id_user, $id_buku, $id_film) {
			if(!is_null($id_buku)) {
				$query = "INSERT INTO cart(id_user, id_buku, id_film, jenis) SELECT :id_user, :id_buku, :id_film, :jenis FROM DUAL WHERE NOT EXISTS (SELECT id_buku FROM cart where id_buku=:id_buku AND id_user = :id_user)";
				$this->db->query($query);
				$this->db->bind('id_user', $id_user);
				$this->db->bind('id_buku', $id_buku);
				$this->db->bind('id_film', NULL);
				$this->db->bind('jenis', 'Buku');
			}elseif(!is_null($id_film)) {
				$query = "INSERT INTO cart(id_user, id_buku, id_film, jenis) SELECT :id_user, :id_buku, :id_film, :jenis FROM DUAL WHERE NOT EXISTS (SELECT id_film FROM cart where id_film=:id_film AND id_user = :id_user)";
				$this->db->query($query);
				$this->db->query($query);
				$this->db->bind('id_user', $id_user);
				$this->db->bind('id_buku', NULL);
				$this->db->bind('id_film', $id_film);
				$this->db->bind('jenis', 'Film');
			}
			$this->db->execute();
			return $this->db->rowCount();
		}


		public function singleBeliBuku($id_user, $id_buku, $harga) {
			$query = "INSERT INTO transaksi(id_user, id_buku, harga, tanggal, keterangan) VALUES(:id_user, :id_buku, :harga, :tanggal, :keterangan)";
			$this->db->query($query);
			$this->db->bind('id_user', $id_user);
			$this->db->bind('id_buku', $id_buku);
			$this->db->bind('tanggal', date("Y-m-d"));
			$this->db->bind('harga', $harga);			
			$this->db->bind('keterangan', 'User id ' . $id_user . ' membeli buku id ' . $id_buku);

			$this->db->execute();

			return $this->db->rowCount();
		}

		public function singleBeliFilm($id_user, $id_film, $harga) {
			$query = "INSERT INTO transaksi(id_user, id_film, harga, tanggal, keterangan) VALUES(:id_user, :id_film, :harga, :tanggal, :keterangan)";

			$this->db->query($query);
			$this->db->bind('id_user', $id_user);
			$this->db->bind('id_film', $id_film);
			$this->db->bind('harga', $harga);
			$this->db->bind('tanggal', date('Y-m-d'));
			$this->db->bind('keterangan', 'User id ' . $id_user . ' membeli buku id ' . $id_film);

			$this->db->execute();
			return $this->db->rowCount();
		}

		public function cek($id_user) {
			$query = "SELECT * FROM transaksi WHERE id_user=:id_user";
			$this->db->query($query);
			$this->db->bind('id_user', $id_user);

			$this->db->execute();

			return $this->db->resultSet();
		}


		public function dataCart($id_user) {


			$query = "SELECT * FROM cart WHERE id_user= :id_user";
			$this->db->query($query);
			$this->db->bind('id_user', $id_user);

			$this->db->execute();

			return $this->db->resultSet();
		}

		public function updateSaldo($id_user, $saldo) { 
			
			$query = "UPDATE user SET saldo = :saldo WHERE id_user = :id_user";
			$this->db->query($query);
			$this->db->bind('saldo', $saldo);
			$this->db->bind('id_user', $id_user);
			$this->db->execute();

			return $this->db->rowCount();

		}


		public function hapus($id)
		{
			$this->db->query('DELETE FROM ' . $this->table . ' WHERE id_cart=:id_cart');
			$this->db->bind('id_cart',$id);
			$this->db->execute();

			return $this->db->rowCount();
		}


	}

 ?>