<?php
    if(isset($_SESSION["type"])){
        if($_SESSION["type"] == "admin"){
            header("location:admin.php");
        }
        if($_SESSION["type"] == "user"){
            header("location:dashboard.php");
        }
    }
?>