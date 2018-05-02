<?php  
	include "../../init/db.php";
	include "../admin_login.php";
	
	$id_transaksi = isset( $_GET['id_transaksi']) ?  $_GET['id_transaksi'] : null;
	$grand_total = isset( $_GET['grand_total']) ?  $_GET['grand_total'] : null;
	$lunas = isset( $_GET['lunas']) ?  $_GET['lunas'] : null;
	
	if ($lunas = '1') {
		$lunas = "yes";
	}else{
		$lunas = "no";
	}

	// $nama_toko = isset( $_GET['nama_toko']) ?  $_GET['nama_toko'] : "-";
	// $alamat_toko = isset( $_GET['alamat_toko']) ?  $_GET['alamat_toko'] : "-";
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
	

	// print_r($lunas);
	$query = "UPDATE pembelian_brg SET grand_total = '$grand_total', lunas = '$lunas' WHERE id_transaksi = '$id_transaksi'";
	if(mysqli_query($conn,$query)){
	   		// header('Location: list_barang.php');
		echo "Sukses";
	}else{
		print_r(mysqli_error($conn));
	}
?>