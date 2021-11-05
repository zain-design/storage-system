<?php
    include_once "connect.php";

    class User{
        private $usrcon;
        private $data;

        function __construct(){
            $database = new Database();
            $db = $database->connect();
            $this->usrcon= $db;
        }

        public function check_login($username, $password){
            $query = "SELECT * FROM users WHERE username ='" . $username . "' and password = '" . $password . "'";
            $result = $this->usrcon->query($query) or die($this->usrcon->error);
            $check = count($result);
			
            if($check > 0){
				$row = $result->fetch_assoc();
				$_SESSION["username"] = $row['username'];
				$_SESSION["type"] = $row['type'];
				$_SESSION["islogin"] = true;

				header("location:index.php");
				return true;
			}
			else {
				header("location:login.php");
				return false;
			}
        }

        public function logout() {
			session_destroy();
			header("location:index.php");
		}

        // CREATE user
        public function register_user($username, $password, $type){
            $query = "INSERT INTO petugas VALUES ('" . $username . "', MD5('" . $password . "'), '" . $type . "')";
            $result = $this->usrcon->query($query) or die($this->usrcon->error);
        }

        // READ user(s)
        public function read_user($username, $type){
            $query = "SELECT * FROM users";

            if (($username != "") && ($type != "")){
                $query = $query . " WHERE username = '" . $username . "' AND type ='" . $type . "'";
            } else if ($username =! ""){ 
                $query = $query . " WHERE username = '" . $username . "'";
            } else if ($type != ""){
                $query = $query . " WHERE type = '" . $type . "'";
            }
            $result = $this->usrcon->query($query) or die($this->usrcon->error);

        }

        // UPDATE self
        public function edit_user($username, $password, $old_username){
            if ($password != ""){
                $query = "UPDATE users SET username = '" . $username . "', password = MD5('" . $password . "') WHERE username = '" . $old_username . "'";
            }
            else{
                $query = "UPDATE users SET username = '" . $username . "' WHERE username = '" . $old_username . "'";
            }
            $result = $this->usrcon->query($query) or die($this->usrcon->error);
            
        }

        // DELETE user
        public function delete_user($username){
            $query = "DELETE FROM users WHERE username ='" . $username . "'";
            $result = $this->usrcon->query($query) or die($this->usrcon->error);
        }

        // CREATE item
        public function create_item($barcode, $item_name, $item_qty){
            $query = "INSERT INTO items VALUES ('" . $barcode . "','" . $item_name . "','" . $item_qty . "'";
            $result = $this->usrcon->query($query) or die($this->usrcon->error);
        }

        // READ items
        public function read_items($search){
            $query = "SELECT * FROM items WHERE barcode LIKE '%" . $search . "%' OR item_name LIKE '%" . $search . "%' OR item_qty = '" . $search . "'";
            $result = $this->usrcon->query($query) or die($this->usrcon->error);
        }

        // UPDATE items
        public function update_item_details($barcode, $item_name, $old_barcode){
            $query = "UPDATE items SET barcode = '" . $barcode . "', item_name = '" . $item_name . "' WHERE barcode = '" . $old_barcode . "'";
            $result = $this->usrcon->query($query) or die($this->usrcon->error);
        }

        public function update_item_qty($barcode, $item_qty){
            $query = "UPDATE items SET item_qty = " . $item_qty . " WHERE barcode = '" . $barcode . "'";
            $result = $this->usrcon->query($query) or die($this->usrcon->error);
        }

        // DELETE item
        public function delete_item($barcode){
            $query = "DELETE FROM items WHERE barcode ='" . $barcode . "'";
            $result = $this->usrcon->query($query) or die($this->usrcon->error);
        }

    }