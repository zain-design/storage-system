<?php
	session_start();
	$connection = array("localhost","root","","storage_system");

	class Database{
		private $host = $connection[0];
		private $user = $connection[1];
		private $pass = $connection[2];
		private $db = $connection[3];
		public $conn;
		
		public function connect() {
			$this->conn = mysqli_connect($this->host,$this->user,$this->pass,$this->db);
			if(!$this->conn){
				echo "<p> Gagal menyambungkan ke Database </p>";
			}
			return $this->conn;
		}
	}
	$connect= mysqli_connect($connection[0],$connection[1],$connection[2],$connection[3]);
?>