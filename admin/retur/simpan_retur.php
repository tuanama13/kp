<?php  
	include '../../init/db.php';

	if (isset( $_GET )) {
		$grand_total = $_GET['grand_total'];
      	$id_retur = $_GET['id_retur'];
	}else{
		header('Location: retur_brg.php');
	}

	// print_r($_GET);

	$simpan = "UPDATE retur SET grand_total = '$grand_total' WHERE id_retur = '$id_retur'";
	// $simpan_data_barang = "UPDATE detail_retur SET ";
	if (mysqli_query($conn,$simpan)) {
				// header('Location: user.php');
				echo "Sukses";
	}else{
			print mysqli_error($conn);
	}
?>