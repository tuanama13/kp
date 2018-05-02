<?php  
	include '../../init/db.php';

	$id =$_GET['id'];

	$query = "UPDATE toko SET del = 1 WHERE id_toko = '$id'";
	if(mysqli_query($conn,$query)){
	   		header('Location: list_toko.php');
	}else{
		die(mysqli_error());
	}
?>