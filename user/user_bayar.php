<?php  
	include "../init/db.php";
	include "user_login.php";

	if (isset($_GET)){
		$id_transaksi = $_GET['id_transaksi'];
		$id_toko = $_GET['id_toko'];
		$grand_total = $_GET['grand_total'];
		
		$sql = mysqli_query($conn,"UPDATE transaksi SET sisa_hutang = 0 WHERE id_transaksi = '$id_transaksi' AND id_toko = '$id_toko' AND grand_total='$grand_total'");

		if(mysqli_query($conn,$query)){
			echo "Sukses";
		}else{
			print_r(mysqli_error($conn));
		}
	}else{null;}

	
?>