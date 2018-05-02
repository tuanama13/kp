<?php  
	include '../../init/db.php';
	if (isset( $_GET )) {
		$id_brg = $_GET['id_brg'];
      	$id_retur = $_GET['id_retur'];
      	$jumlah_brg = $_GET['jumlah_brg'];
      	$sub_total = $_GET['sub_total'];
	}else{
		header('Location: retur_brg.php');
	}

	// print_r($_GET);
	$simpan = "UPDATE detail_retur SET jumlah = '$jumlah_brg', sub_total = '$sub_total' WHERE id_retur = '$id_retur' AND  id_brg='$id_brg'";
	// $simpan_data_barang = "UPDATE detail_retur SET ";
	if (mysqli_query($conn,$simpan)) {
				// header('Location: user.php');
				echo "Sukses detail";
	}else{
			print mysqli_error($conn);
	}
?>