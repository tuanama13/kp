<?php  
  ob_start();
	include "../init/db.php";
	include "user_login.php";
  	include "header.php";
  	include "sidebar.php";
  	//$kosong="kosong";
?>
	<section class="content">
	     <!-- Main content -->
	      <div class="row">
	        <div class="col-md-12">
	          <div class="box box-info">
	            <div class="box-header">
	              <h2 class="box-title"><b>Tentang Toko Karunia Jaya</b>
	                <!-- <small>List Toko-Toko Masih Memiliki Tagihan</small> -->
	              </h2>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body pad">
	            	
               		<div class="col-md-7" style="padding: 10px;">
               			<p>Toko Karunia Jaya adalah merupakan salah satu toko sparepart kendaraan roda dua yang melakukan penjualan secara grosir dan ecer yang berada di daerah Jalan Parit Pangeran Komplek Pangeran Permai No AA18 yang dipimpin oleh Bapak Fendy. Perusahaan ini pertama kali didirikan pada pertengahan tahun 2015. Setelah mengalami perkembangan yang cukup pesat, Toko Karunia Jaya mempekerjakan beberapa orang sebagai Tim Marketing untuk memasarkan barang Toko Karunia Jaya yang di sebar pada beberapa area di Pontianak.</p>

						<p>Toko Karunia Jaya mempunyai jasa penjualan Sparepart Kendaraan Roda Dua sebagai aset utama penjualannya. Toko Karunia Jaya didirikan dengan dana pribadi milik Pimpinan yang pada awalnya dimana Toko Karunia Jaya adalah rumah pribadi milik Bapak Fendy yang kemudian dialih fungsikan menjadi toko. Pada awalnya Toko Karunia Jaya hanya menjual secara langsung di toko, karena penjualan yang kurang maka Pimpinan Toko Karunia Jaya memutuskan untuk menjual ke bengkel-bengkel dengan mempekerjakan beberapa orang Tim Marketing yang bertugas menawarkan barang ke bengkel yang sudah dibagi area nya masing-masing.</p>
               		</div>
               		<div class="col-md-5" style="">
               			<img style="width: 100%; height: auto;" src="dist/img/img_tentang.jpg">
               		</div>
	            </div>
	          </div>
	          <!-- /.box -->
	       </div>
       </div>


	</section>

  <script>


  </script>
<?php  
  include 'footer.php';
   ob_end_flush()
?>