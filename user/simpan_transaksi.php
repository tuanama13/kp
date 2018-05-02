<?php  
	include "../init/db.php";
	include "user_login.php";
	$id_transaksi = isset( $_GET['id_transaksi']) ?  $_GET['id_transaksi'] : null;
	$grand_total = isset( $_GET['grand_total']) ?  $_GET['grand_total'] : null;
	$sisa_hutang = isset( $_GET['sisa_hutang']) ?  $_GET['sisa_hutang'] : null;
	$nama_toko = isset( $_GET['nama_toko']) ?  $_GET['nama_toko'] : "-";
	$alamat_toko = isset( $_GET['alamat_toko']) ?  $_GET['alamat_toko'] : "-";
	// if (isset($_GET)){
	// 	$id_transaksi = $_GET['id_transaksi'];
	// 	$grand_total = $_GET['grand_total'];
	// 	$sisa_hutang = $_GET['sisa_hutang'];
	// 	if (empty($_GET['nama_toko'])) {
	// 		$nama_toko = "-";
	// 	}else{
	// 		$nama_toko = $_GET['nama_toko'];
	// 	}

	// 	if (empty($_GET['alamat_toko'])) {
	// 		$alamat_toko = "-";
	// 	}else{
	// 		$alamat_toko = $_GET['alamat_toko'];
	// 	}
		
		
	// }else{null;}
	

	// print_r($_GET);
	$query = "UPDATE transaksi SET grand_total = $grand_total, sisa_hutang = $sisa_hutang, nama_toko_hantaran = '$nama_toko', alamat_toko_hantaran='$alamat_toko', status='ordered' WHERE id_transaksi = '$id_transaksi'";
	if(mysqli_query($conn,$query)){
	   		// header('Location: list_barang.php');
		echo "Sukses";
	}else{
		print_r(mysqli_error($conn));
	}
?>