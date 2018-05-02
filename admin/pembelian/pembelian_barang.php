<?php  
	include "../../init/db.php";
	include "../admin_login.php";
	// print_r($_POST);
	$username=1;
	//if (isset($_POST)) {
		$id_transaksi = $_POST['id_transaksi'];
		$tgl_transaksi = $_POST['tgl_transaksi'];
		$id_supplier = $_POST['id_supplier'];
		
		$insert = "INSERT INTO pembelian_brg(id_transaksi,id_supplier,tgl_pembelian,username,grand_total,sisa_bayar,lunas) VALUES ('$id_transaksi','$id_supplier','$tgl_transaksi','$username','0','0','no')";

		if (mysqli_query($conn,$insert)) {
				echo "Success";	
			}else{
				print_r(mysqli_error($conn));
				
			}
	
?>