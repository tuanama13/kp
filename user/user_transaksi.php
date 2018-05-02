<?php  
	include "../init/db.php";
	include "user_login.php";

	if (isset($_POST)){
		$id_transaksi = $_POST['id_transaksi'];
		$id_barang = $_POST['id_barang'];
		$harga_brg = $_POST['harga_brg'];
		$jumlah_brg = $_POST['jumlah_brg'];
		$sub_harga = $_POST['sub_harga'];
		$stok_brg = $_POST['stok_brg'];

		$insert = "INSERT INTO detail_transaksi (id_transaksi,id_brg,harga,jumlah_brg,sub_total) VALUES ('$id_transaksi','$id_barang',$harga_brg,$jumlah_brg,$sub_harga)";

		if (mysqli_query($conn,$insert)) {
			print_r("Sukses");
		}else{
			//mysqli_error($conn);
			print_r(mysqli_error($conn));
		}

		$sisa_stok= $stok_brg - $jumlah_brg; 
		$sql ="UPDATE list_brg SET stok =$sisa_stok WHERE id_brg='$id_barang'";
		if (mysqli_query($conn,$sql)) {
			print_r("Sukses");
		}else{	
			print_r(mysqli_error($conn));
		}
	}else{null;}

?>