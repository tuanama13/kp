<?php  
	//fungsi already header(menangkal warnings)
	ob_start();

	include '../../init/db.php';
	include "../admin_login.php";
	include '../header.php';
  	include '../sidebar.php';

	if (isset($_POST['submit'])) {

		// fungsi untuk menghasilkan id autonumber
  		$sql = "SELECT max(id_karyawan) as maxid FROM karyawan WHERE id_karyawan LIKE 'KRY%'";
		$row = mysqli_fetch_assoc(mysqli_query($conn,$sql));
	   	$idmax=$row['maxid'];
	   	$row = mysqli_num_rows(mysqli_query($conn,$sql));
  		if ($row<=0) {
  			$id_karyawan="KRY0000001";
  		}else{
  			 $nourut = (int) substr($idmax, 3,7);
  			 $nourut++;
  			 $id_karyawan = "KRY".sprintf("%07s", $nourut);
  		}
  		// tutup fungsi autonumber


		// $id=rand();
		$nama = $_POST['nm_karyawan'];
		$tgl = $_POST['tgl_lahir'];
		$alamat = $_POST['alamat'];
		$no_telepon = $_POST['no_telepon'];
		$jabatan = $_POST['jabatan'];
		$tgl_masuk=date("Y-m-d");
		$del = 0;

		$insert = "INSERT INTO karyawan(id_karyawan,nama,alamat,no_telp,tgl_lahir,jabatan,tgl_masuk,del) VALUES ('$id_karyawan','$nama','$alamat','$no_telepon','$tgl','$jabatan','$tgl_masuk','$del')";

		if (mysqli_query($conn,$insert)) {
				header('Location: list_karyawan.php');
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
        Karyawan
        <small>Form Karyawan </small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li class="">Post</li> -->
        <li class="">Karyawan</li>
        <li class="active">Tambah Karyawan</li>
      </ol>
    </section>

	<section class="content">
	     <!-- Main content -->
	      <div class="row">
	        <div class="col-md-8">
	          <div class="box box-info">
	            <div class="box-header">
	              <h3 class="box-title">Tambah Karyawan
	                <small>Form Untuk Menambah Karyawan Baru</small>
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
                  		<label for="nama">Nama Karyawan</label>
                  		<input type="text" class="form-control" id="nm_karyawan" name="nm_karyawan" placeholder="Masukan Nama Karyawan" required>
                	</div>

                	<div class="form-group col-md-7">
                  		<label for="alamat">Alamat</label>
                  		<!-- <input type="" class="form-control" id="tipe_barang" name="tipe_barang" placeholder="Masukan Tipe Barang" required> -->
                  		<textarea class="form-control" rows="5" name="alamat" id="alamat" placeholder="Alamat Karyawan"></textarea>
                	</div>
                	<div class="form-group col-md-7">
                  		<label for="tgl_lahir">Tanggal Lahir</label>
                  		<input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="yyyy-mm-dd" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" required>
                	</div>
                	<div class="form-group col-md-7">
                  		<label for="no_telepon">Nomor Telepon</label>
                  		<input type="number" class="form-control" id="no_telepon" name="no_telepon" placeholder="08xxxxxxxxxx" required>
                	</div>
                	<div class="form-group col-md-7">
                  		<label for="jabatan">Jabatan</label>
                  		<input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan Karyawan" required>
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