<?php 
session_start();

if(isset($_SESSION["id"]) && isset($_SESSION["pwd"])){
	
    require 'functions.php' ;
}
else{
	echo "<script>alert('Please Login');window.location='../pages/login/login';</script>";
		exit();
	
}


?>