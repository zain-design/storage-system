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
        }

        // READ user(s)
        public function read_user($username, $type){
            $query = "SELECT * FROM users";

        }

        // UPDATE self
        public function edit_user($username, $password, $old_username){
            if ($password != ""){
                $query = "UPDATE users SET username = '" . $username . "', password = MD5('" . $password . "') WHERE username = '" . $old_username . "'";
            }
            else{
                $query = "UPDATE users SET username = '" . $username . "' WHERE username = '" . $old_username . "'";
            }
            
        }

        // DELETE user
        public function delete_user($username){
            $query = "DELETE FROM users WHERE username ='" . $username . "'";
        }
    }