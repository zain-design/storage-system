<?php
	include 'connect.php';
	
	if(isset($_POST['username'])){
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		
		$a = mysqli_query($connect, "SELECT * from users WHERE username='".$username."' AND password = '".$password."'");

		if(mysqli_num_rows($a) > 0){
			$row = mysqli_fetch_array($a);
			$_SESSION['type'] = $row[3];
			$_SESSION['username'] = $row[1];
			$_SESSION['islogin'] = true;
			
			if($_SESSION['type'] == "admin"){
				header("location:../dashboard.php");
			}
			else if($_SESSION['type'] == "kepala"){
				header("location:../dashboard.php");
			}
		}
		
		else{
			header("location:../login.php");
		}
		
		if (isset($_POST['remember'])) {
        	setcookie('login','true', time()+60);
      	}
	}
?>