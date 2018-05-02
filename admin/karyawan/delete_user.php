<?php  
	include '../../init/db.php';
	include "../admin_login.php";

	if (!isset($_GET)) {
		header('Location :../index.php');
	}else{
		$id =$_GET['id'];


		$query = "Delete FROM user WHERE id_karyawan = '$id'";
		if(mysqli_query($conn,$query)){
		   		header('Location: list_user.php');
		}else{
			echo "".mysqli_error($conn);
		}
	}
?>