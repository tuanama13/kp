<?php
session_start();

	//cek apakah user sudah login
	if(!isset($_SESSION['username'])){
	    header("Location:../../login.php");
	}

	//cek level user
	if($_SESSION['level']!="3"){
	    //die("Anda bukan Admin");
	    header("Location:../../login.php");
	}
?>