<?php  
	include '../../init/db.php';
	include "../admin_login.php";

	// $id =$_GET['id'];
	$id = isset( $_GET['id']) ?  $_GET['id'] : null;

	$query = "UPDATE supplier SET del = 1 WHERE id_supplier = '$id'";
	if(mysqli_query($conn,$query)){
	   		header('Location: list_supplier.php');
	}else{
		die(mysqli_error());
	}
?>