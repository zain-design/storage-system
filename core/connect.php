<?php
	session_start();
	$conn_host = "localhost";
	$conn_username = "root";
	$conn_password = "";
	$conn_database = "storage_system";

	class Database{
		private $host = "localhost";
		private $user = "root";
		private $pass = "";
		private $db = "storage_system";
		public $conn;
		
		public function connect() {
			$this->conn = mysqli_connect($this->host,$this->user,$this->pass,$this->db);
			if(!$this->conn){
				echo "<p> Gagal menyambungkan ke Database </p>";
			}
			return $this->conn;
		}
	}
	$connect= mysqli_connect("localhost","root","","storage_system");
?>