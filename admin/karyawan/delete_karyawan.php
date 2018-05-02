<?php  
	include '../../init/db.php';
	include "../admin_login.php";

	if (!isset($_GET)) {
		header('Location :../index.php');
	}else{

		$id =$_GET['id'];
		$query = "UPDATE karyawan SET del = 1 WHERE id_karyawan = '$id'";
		if(mysqli_query($conn,$query)){
		   		header('Location: list_karyawan.php');
		}else{
			die(mysqli_error());
		}
	}
?>