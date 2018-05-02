<?php  
	include "../init/db.php";
	include "user_login.php";

	if (isset($_POST)){
		$id_transaksi = $_POST['id_transaksi'];
		$tgl_transaksi = $_POST['tgl_transaksi'];
		$id_toko = $_POST['id_toko'];
		$id_karyawan = $_POST['id_karyawan'];
		$grand_total = $_POST['grand_total'];
		$sisa_hutang = $_POST['sisa_hutang'];
		$tgl_tagihan = $_POST['tgl_tagihan'];
		$nama_toko = $_POST['nama_toko'];
		$alamat_toko = $_POST['alamat_toko'];

		$insert = "INSERT INTO transaksi(id_transaksi,tgl_transaksi,id_toko,username,grand_total,sisa_hutang,tgl_tagihan,nama_toko_hantaran,alamat_toko_hantaran) VALUES ('$id_transaksi','$tgl_transaksi','$id_toko','$id_karyawan','$grand_total','$sisa_hutang','$tgl_tagihan','$nama_toko','$alamat_toko')";

		if (mysqli_query($conn,$insert)) {
				// header('Location: user.php');
				//$result["Success"];
			}else{
				print_r(mysqli_error($conn));
				// print_r(mysqli_error($conn));
			}
	}else{null;}

		
	//}
	//$result["error"]="nothing";
	
?>