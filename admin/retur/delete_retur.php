<?php  
	include '../../init/db.php';
	// print_r($_GET);
	if (isset( $_GET )) {
      	$id_retur = $_GET['id_retur'];
      	$id_brg = $_GET['id_brg'];
      	$jumlah_brg = $_GET['jumlah_brg'];
	}else{
		header('Location: retur_brg.php');
	}

	$delete = "DELETE FROM detail_retur WHERE id_retur='$id_retur' AND id_brg ='$id_brg' AND jumlah =$jumlah_brg"; 
	if (mysqli_query($conn,$delete)) {
				// header('Location: user.php');
				echo "Sukses";
	}else{
			print mysqli_error($conn);
	}
?>