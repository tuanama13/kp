<?php  
	//fungsi already header(menangkal warnings)
	ob_start();

	include '../../init/db.php';
	include "../admin_login.php";
	include '../header.php';
	include '../sidebar.php';
	$id = $_GET['id'];

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
	  	$nama = $_POST['nm_karyawan'];
		$tgl = $_POST['tgl_lahir'];
		$alamat = $_POST['alamat'];
		$no_telepon = $_POST['no_telepon'];
		$jabatan = $_POST['jabatan'];
	  

	   $query = "UPDATE karyawan SET nama = '$nama',alamat = '$alamat',no_telp ='$no_telepon',tgl_lahir = '$tgl',jabatan = '$jabatan' WHERE id_karyawan = '$id'";

	   // UPDATE `list_brg` SET `nama_brg` = 'sada' WHERE `list_brg`.`id_brg` = 232640912;

	   if(mysqli_query($conn,$query)){
	   		header('Location: list_karyawan.php?status=sukses');
	   }else{
	   		echo '<div class="alert alert-danger" style="text-align:center"><h4>Query bermasalah</h4></div>';
	   }
	 }
	// }else{
	// 	header("Location:list_karyawan.php");
	// }

	// echo $_GET['id'];
	$query = mysqli_query($conn,"Select * from karyawan where id_karyawan='$id'");
	$rows = mysqli_fetch_assoc($query);
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Karyawan
        <small>Form Karyawan </small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Karyawan</li>
        <li class="active">Update Karyawan</li>
      </ol>
    </section>

	<section class="content">
	     <!-- Main content -->
	      <div class="row">
	        <div class="col-md-8">
	          <div class="box box-info">
	            <div class="box-header">
	              <h3 class="box-title">Update Karyawan
	                <small>Form Untuk Mengubah Data Karyawan</small>
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
                  		<label for="nama">Nama Karyawan</label>
                  		<input type="text" class="form-control" id="nm_karyawan" name="nm_karyawan" value="<?php echo $rows['nama']?>" required>
                	</div>

                	<div class="form-group col-md-7">
                  		<label for="alamat">Alamat</label>
                  		<!-- <input type="" class="form-control" id="tipe_barang" name="tipe_barang" placeholder="Masukan Tipe Barang" required> -->
                  		<textarea class="form-control" rows="5" name="alamat" id="alamat"><?php echo $rows['alamat']?></textarea>
                	</div>
                	<div class="form-group col-md-7">
                  		<label for="tgl_lahir">Tanggal Lahir</label>
                  		<input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo $rows['tgl_lahir']?>" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" required>
                	</div>
                	<div class="form-group col-md-7">
                  		<label for="no_telepon">Nomor Telepon</label>
                  		<input type="number" class="form-control" id="no_telepon" name="no_telepon" value="<?php echo $rows['no_telp']?>" required>
                	</div>
                	<div class="form-group col-md-7">
                  		<label for="jabatan">Jabatan</label>
                  		<input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $rows['jabatan']?>" required>
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