<?php  
	include "../../init/db.php";
	include "../admin_login.php";

	// $result["message"]=$_POST['kode_brg'];
	// $result["message"]=$_POST['sub_harga'];
	// echo json_encode($result);
	$id_transaksi = $_GET['id_transaksi'];
	$kode_barang = $_GET['kode_barang'];
	$sub_harga = $_GET['sub_harga'];
	$jumlah_brg = $_GET['jumlah'];

	print_r($_GET);

	$delete = "DELETE FROM detail_pembelian_brg WHERE id_transaksi='$id_transaksi' AND id_brg ='$kode_barang' AND sub_total =$sub_harga"; 
	if (mysqli_query($conn,$delete)) {
				// header('Location: user.php');
				echo "Sukses";
	}else{
			echo "Error ".mysqli_error($conn);
			
				//$result["error"]="bermasalah";
	}
	$sql ="SELECT stok FROM list_brg WHERE id_brg ='$kode_barang'";
	$row = mysqli_fetch_assoc(mysqli_query($conn,$sql));
	$stok = $row['stok'];

	
	
	if ($stok<=0) {
		$hitung = $jumlah_brg - $stok;
	}else{
		$hitung = $stok - $jumlah_brg;
	}
	$sql2 = "UPDATE list_brg SET stok ='$hitung' WHERE  id_brg='$kode_barang'";
	if (mysqli_query($conn,$sql2)){
				// header('Location: user.php');
				echo "Sukses";
	}else{
			echo "Error ".mysqli_error($conn);
			
				//$result["error"]="bermasalah";
	}
?>