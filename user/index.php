<?php
	session_start();  
	include "../init/db.php";
	include "user_login.php";
	include "header.php";
	include "sidebar.php";

	$id_kar= $_SESSION['id_karyawan'];
	// echo $id_kar;
	$sql =  mysqli_query($conn, "SELECT * FROM karyawan WHERE id_karyawan='$id_kar'");
    $result = mysqli_fetch_assoc($sql);

?>
<section class="content">
<div class="container-fluid">
	<div class="jumbotron">
	    <div class="container">
	        <h1 style="color:white">Selamat Datang, <?php echo $result['nama']; ?></h1>
	        <p style="color:white">Ini Adalah Aplikasi Pemesanan Toko Karunia Jaya</p>
	    </div>
	</div>
	<!-- tutup Jumbotron -->

	<div class="row">
		<div class="col-md-4 col-xs-12">
			<div class="card-box bg-list-brg" onclick="list_brg()">
				<div class="inner">
					<h1>Data Barang</h1>
					<p>Berisi tentang Informasi Tentang Barang</p>
				</div>
				<div class="icon">
	         		<i class="fa fa-clipboard"></i>
	         	</div>
			</div>
		</div>	

		<div class="col-md-4 col-xs-12">
			<div class="card-box bg-pesan-brg" style="background-color: #00a65a" onclick="pesan()">
				<div class="inner">
					<h1>Pesan Barang</h1>
					<p>Untuk Melakukan Pesanan</p>
				</div>
				<div class="icon">
	         		<i class="fa fa-shopping-cart"></i>
	         	</div>
	         </div>
		</div>
		<div class="col-md-4 col-xs-12">
			<div class="card-box bg-tagihan" style="background-color: #22A7F0" onclick="tagihan()">
				<div class="inner">
					<h1>Cek Tagihan</h1>
					<p>Untuk Melakukan Pengecekan Tagihan</p>
				</div>
				<div class="icon">
	         		<i class="fa fa-list-alt"></i>
	         	</div>
	         </div>
		</div>	
	</div>
	<!-- tutup row1 -->

	<div class="row">
			<div class="col-md-4 col-xs-12">
				<div class="card-box bg-list-toko" style="background-color: #605ca8" onclick="list_toko()">
					<div class="inner">
						<h1>Data Toko</h1>
						<p>Berisi tentang Informasi Tentang Toko Langganan</p>
					</div>
					<div class="icon">
		         		<i class="fa fa-building"></i>
		         	</div>
				</div>
			</div>	

			<div class="col-md-4 col-xs-12">
				<div class="card-box bg-transaksi" style="background-color: #f56954" onclick="transaksi()">
					<div class="inner">
						<h1>Transaksi Hari Ini</h1>
						<p>Berisi tentang Informasi Tentang Barang</p>
					</div>
					<div class="icon">
		         		<i class="fa fa-tags"></i>
		         	</div>
				</div>
			</div>	
			<div class="col-md-4 col-xs-12">
				<div class="card-box bg-about" style="background-color: #8E44AD" onclick="tentang()">
					<div class="inner">
						<h1>Tentang</h1>
						<p>Berisi tentang Informasi Tentang Toko Karunia Jaya</p>
					</div>
					<div class="icon">
		         		<i class="fa fa-info-circle"></i>
		         	</div>
				</div>
			</div>	
		</div>
		<!-- tutup row2 -->
		
	</div>
</section>
<script>
	function pesan() {
		window.location.href="user2.php";
	}

	function list_brg() {
		window.location.href="user_list_brg.php";
	}

	function list_toko() {
		window.location.href="user_list_toko.php";
	}

	function transaksi() {
		window.location.href="user_transaksi_hari.php";
	}
	function tagihan() {
		window.location.href="user_tagihan.php";
	}
	function tentang() {
		window.location.href="user_tentang.php";
	}
</script>


<?php  
	include 'footer.php';
?>