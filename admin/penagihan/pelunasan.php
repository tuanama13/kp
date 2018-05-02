<?php
	// print_r($_GET);  
	include "../../init/db.php";

	if (isset($_GET)){
		$id_transaksi = $_GET['id_transaksi'];
		$tgl_transaksi = $_GET['tgl_transaksi'];
		$id_toko = $_GET['id_toko'];
		$grand_total = $_GET['grand_total'];
	}else{null;}

	$sql = "UPDATE transaksi SET lunas = 'yes', sisa_hutang = '0' WHERE id_transaksi = '$id_transaksi' AND id_toko = '$id_toko' AND tgl_transaksi = '$tgl_transaksi' AND grand_total='$grand_total'";

	if(mysqli_query($conn,$sql)){
		echo "Sukses";
	}else{
		print_r(mysqli_error($conn));
	}
?>