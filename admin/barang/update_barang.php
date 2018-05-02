<?php  
	//fungsi already header(menangkal warnings)
	ob_start();


	include '../../init/db.php';
	include "../admin_login.php";
	include '../header.php';
  	include '../sidebar.php';
	// $id = isset( $_GET['id']) ?  $_GET['id'] : null;
	if (isset( $_GET['id'])) {
    	$id = $_GET['id'];
  	}else{
    	header('Location: list_barang.php');
  	}

	if (isset($_POST['submit'])) {
	// 	$id=rand();
	// 	$nama = $_POST['nm_barang'];
	// 	$type = $_POST['tipe_barang'];
	// 	$spek = $_POST['spek_barang'];
	// 	$merk = $_POST['merk_barang'];
	// 	$harga = $_POST['harga_barang'];
	// 	$satuan = $_POST['satuan_barang'];
	// 	$del = 1;

	// 	$insert = "INSERT INTO list_brg(id_brg,nama_brg,type,spek,merk,harga,satuan,del) VALUES ('$id','$nama','$type','$spek','$merk','$harga','$satuan','$del')";

	// 	if (mysqli_query($conn,$insert)) {
	// 			header('Location: list_barang.php');
	// 		}else{
	// 			echo '<div class="alert alert-danger" style="text-align:center"><h4>Query bermasalah</h4></div>';
	// 		}
		//$id1 = $_GET['id'];
	  $nama     = $_POST['nm_barang'];
	  $type    = $_POST['tipe_barang'];
	  $spek  = $_POST['spek_barang'];
	  $merk = $_POST['merk_barang'];
	  $harga  = $_POST['harga_barang'];
	  $harga_beli  = $_POST['harga_beli'];
	  $satuan  = $_POST['satuan_barang'];
	  $stok = $_POST['stok_barang'];

	   $query = "UPDATE list_brg SET nama_brg = '$nama',type = '$type',spek ='$spek',merk = '$merk',harga = '$harga',harga_beli = '$harga_beli', satuan = '$satuan',stok='$stok' WHERE id_brg = '$id'";

	   // UPDATE `list_brg` SET `nama_brg` = 'sada' WHERE `list_brg`.`id_brg` = 232640912;

	   if(mysqli_query($conn,$query)){
	   		header('Location: list_barang.php?status=sukses');
	   }else{
	   		echo '<div class="alert alert-danger" style="text-align:center"><h4>Query bermasalah</h4></div>';
	   }
	  
	}

	// echo $_GET['id'];
	$query = mysqli_query($conn,"SELECT * FROM list_brg WHERE id_brg='$id'");
	$rows = mysqli_fetch_assoc($query);
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
        <li class="active">Update Barang</li>
      </ol>
    </section>

	<section class="content">
	     <!-- Main content -->
	      <div class="row">
	        <div class="col-md-8">
	          <div class="box box-info">
	            <div class="box-header">
	              <h3 class="box-title">Update Barang
	                <small>Data Barang Yang Akan Diubah</small>
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
	              <form role="form" action="<?php $_SERVER["PHP_SELF"];?>" method="post">
		      		<div class="form-group col-md-7">
                  		<label for="judul">Nama Item</label>
                  		<input type="text" class="form-control" id="nm_barang" name="nm_barang" value="<?php echo $rows['nama_brg']?>"  required>
                	</div>

                	<div class="form-group col-md-7">
                  		<label for="tipe">Tipe</label>
                  		<input type="text" class="form-control" id="tipe_barang" name="tipe_barang" value="<?php echo $rows['type'];?>" required>
                	</div>
                	<div class="form-group col-md-7">
                  		<label for="spek">Spesifikasi</label>
                  		<input type="text" class="form-control" id="spek_barang" name="spek_barang" value="<?php echo $rows['spek'];?>" required>
                	</div>
                	<div class="form-group col-md-7">
                  		<label for="merk">Merk</label>
                  		<input type="text" class="form-control" id="merk_barang" name="merk_barang" value="<?php echo $rows['merk'];?>" required>
                	</div>
                	<div class="form-group col-md-7" hidden>
                  		<label for="harga_beli">Harga Beli</label>
                  		<input type="number" class="form-control" id="harga_beli" name="harga_beli" value="<?php echo $rows['harga_beli'];?>" required>
                	</div>
                	<div class="form-group col-md-7">
                  		<label for="harga">Harga</label>
                  		<input type="number" class="form-control" id="harga_barang" name="harga_barang" value="<?php echo $rows['harga'];?>" required>
                	</div>
                	<div class="form-group col-md-7">
                  		<label for="stok">Stok</label>
                  		<input type="number" class="form-control" id="stok_barang" name="stok_barang" value="<?php echo $rows['stok'];?>" required>
                	</div>
                	<div class="form-group col-md-7">
                  		<label for="satuan">Satuan</label>
                  		<input type="text" class="form-control" id="satuan_barang" name="satuan_barang" value="<?php echo $rows['satuan'];?>" required>
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