<?php  
	include "../../init/db.php";
	include "../admin_login.php";

	if (isset($_POST)){
		$id_transaksi = $_POST['id_transaksi'];
		$id_barang = $_POST['id_barang'];
		//$harga_brg = $_POST['harga_brg'];
		$jumlah_brg = $_POST['jumlah_brg'];
		$sub_harga = $_POST['sub_harga'];
		//$stok_brg = $_POST['stok_brg'];
	}else{null;}

		$insert = "INSERT INTO detail_pembelian_brg (id_transaksi,id_brg,jumlah_beli,sub_total) VALUES ('$id_transaksi','$id_barang','$jumlah_brg','$sub_harga')";

		if (mysqli_query($conn,$insert)) {
			
		}else{
			//mysqli_error($conn);
				print_r(mysqli_error($conn));
		}

		$sql ="SELECT stok FROM list_brg WHERE id_brg ='$id_barang'";
		$row = mysqli_fetch_assoc(mysqli_query($conn,$sql));
		$stok = $row['stok'];

			$sisa_stok= $stok + $jumlah_brg; 
			$sql ="UPDATE list_brg SET stok =$sisa_stok WHERE id_brg='$id_barang'";
			if (mysqli_query($conn,$sql)) {
			
			}else{
				
				print_r(mysqli_error($conn));
			}

?>