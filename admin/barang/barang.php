<?php  
	//fungsi already header(menangkal warnings)
	ob_start();

	// include (basename(dirname(__FILE__)).'/init/db.php');
	//echo dirname( __DIR__ ) . '/init/db.php' ;
	include '../../init/db.php';
  include "../admin_login.php";
	include '../header.php';
  include '../sidebar.php';

	if (isset($_POST['submit'])) {
		// fungsi untuk menghasilkan id autonumber
  		$sql = "SELECT max(id_brg) as maxid FROM list_brg WHERE id_brg LIKE 'BR%'";
		$row = mysqli_fetch_assoc(mysqli_query($conn,$sql));
	   	$idmax=$row['maxid'];
	   	$row = mysqli_num_rows(mysqli_query($conn,$sql));
  		if ($row<=0) {
  			$id_brg_new="BR0000001";
  		}else{
  			 $nourut = (int) substr($idmax, 2,7);
  			 $nourut++;
  			 $id_brg_new = "BR".sprintf("%07s", $nourut);
  		}
  		// tutup fungsi autonumber


		// $id=rand();
		$nama = $_POST['nm_barang'];
		$type = $_POST['tipe_barang'];
		$spek = $_POST['spek_barang'];
		$merk = $_POST['merk_barang'];
		$harga = $_POST['harga_barang'];
		$harga_beli = $_POST['harga_beli'];
		$satuan = $_POST['satuan_barang'];
		$stok = $_POST['stok_barang'];
		$del = 0;

		$insert = "INSERT INTO list_brg(id_brg,nama_brg,type,spek,merk,harga,harga_beli,satuan,stok,del) VALUES ('$id_brg_new','$nama','$type','$spek','$merk','$harga','$harga_beli','$satuan','$stok','$del')";

		if (mysqli_query($conn,$insert)) {
				header('Location: list_barang.php');
			}else{
				echo '<div class="alert alert-danger" style="text-align:center"><h4>Query bermasalah</h4></div>';
			}
	}
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Barang
        <small>Form Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Barang</li>
        <li class="active">Tambah Barang</li>
      </ol>
    </section>

	<section class="content">
	     <!-- Main content -->
	      <div class="row">
	        <div class="col-md-8">
	          <div class="box box-info">
	            <div class="box-header">
	              <h3 class="box-title">Tambah Barang
	                <small>Form Untuk Penambahan Barang Baru</small>
	              </h3>
	              <!-- tools box -->
	              <!-- <div class="pull-right box-tools">
	                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
	                  <i class="fa fa-minus"></i></button>
	                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
	                  <i class="fa fa-times"></i></button>
	              </div> -->
	              <!-- /. tools -->
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body pad">
	              <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		      		<div class="form-group col-md-7">
                  		<label for="judul">Nama Item</label>
                  		<input type="text" class="form-control" id="nm_barang" name="nm_barang" placeholder="Masukan Nama Barang" required>
                	</div>

                	<div class="form-group col-md-7">
                  		<label for="tipe">Tipe</label>
                  		<input type="text" class="form-control" id="tipe_barang" name="tipe_barang" placeholder="Masukan Tipe Barang" required>
                	</div>
                	<div class="form-group col-md-7">
                  		<label for="spek">Spesifikasi</label>
                  		<input type="text" class="form-control" id="spek_barang" name="spek_barang" placeholder="Masukan Spesifikasi Barang" required>
                	</div>
                	<div class="form-group col-md-7">
                  		<label for="merk">Merk</label>
                  		<input type="text" class="form-control" id="merk_barang" name="merk_barang" placeholder="Masukan Merk Barang" required>
                	</div>
                	<div class="form-group col-md-7" hidden>
                  		<label for="harga-beli">Harga Beli</label>
                  		<input type="number" class="form-control" id="harga_beli" name="harga_beli" placeholder="Masukan Harga Beli Barang" required>
                	</div>
                	<div class="form-group col-md-7">
                  		<label for="harga">Harga</label>
                  		<input type="number" class="form-control" id="harga_barang" name="harga_barang" placeholder="Masukan Harga Jual Barang" required>
                	</div>
                	<div class="form-group col-md-7">
                  		<label for="stok">Stok</label>
                  		<input type="number" class="form-control" id="stok_barang" name="stok_barang" placeholder="Masukan Jumlah Stok Barang" required>
                	</div>
                	<div class="form-group col-md-7">
                  		<label for="satuan">Satuan</label>
                  		<input type="text" class="form-control" id="satuan_barang" name="satuan_barang" placeholder="Masukan Satuan Barang" required>
                	</div>
	      
	                <div class="box-footer col-md-7">
               			<button type="submit" class="btn btn-primary" name="submit">Submit</button>
              	    </div>
	              </form>
	            </div>
	          </div>
	          <!-- /.box -->
	         </div>

	</section>
   </div>
   <?php  
   	include '../footer.php';
   ?>