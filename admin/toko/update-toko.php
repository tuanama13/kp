<?php  
	ob_start();
	include '../header.php';
	include '../../init/db.php';
	include '../sidebar.php';
	$id_toko = $_GET['id'];

	if (isset($_POST['submit'])) {
		$id_toko = $_POST['id_toko'];
		$nama_toko = $_POST['nama_toko'];
		$alamat_toko = $_POST['alamat_toko'];
		$telp_toko = $_POST['telp_toko'];


		$query = "UPDATE toko SET nama_toko = '$nama_toko',alamat_toko = '$alamat_toko', telp_toko='$telp_toko' WHERE id_toko = '$id_toko'";

		if (mysqli_query($conn, $query)) {
			header('Location: list_toko.php');
		}else{
			mysqli_error($conn);
		}

	}
	
	$query = mysqli_query($conn,"SELECT * FROM toko WHERE id_toko='$id_toko'");
	$rows = mysqli_fetch_assoc($query); 
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Toko
        <small>Form Toko</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Toko</li>
        <li class="active">Update Toko</li>
      </ol>
    </section>

	<section class="content">
	     <!-- Main content -->
	      <div class="row">
	        <div class="col-md-8">
	          <div class="box box-info">
	            <div class="box-header">
	              <h3 class="box-title">Update Toko
	                <small>Form Perubahan Data Toko</small>
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
	              	<input type="text" name="id_toko" value="<?php echo $id_toko ?>"  hidden>
					<div class="form-group col-md-7">
                  		<label for="nama_toko">Nama Toko</label>
                  		<input type="text" class="form-control" id="nama_toko" name="nama_toko" value="<?php echo $rows['nama_toko'] ?>" readonly>
                	</div>

					<!-- <div class="form-group col-md-7">
                  		<label for="jabatan">Jabatan</label>
                  		<input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $rows['jabatan'] ?>" readonly>
                	</div> -->

                	<div class="form-group col-md-7">
                  		<label for="alamat_toko">ALamat</label>
                  		<textarea class="form-control" rows="5" name="alamat_toko" id="alamat_toko"><?php echo $rows['alamat_toko'] ?></textarea>
                	</div>
                	<div class="form-group col-md-7">
                  		<label for="telp_toko">No Telepon Toko</label>
                  		<input type="number" class="form-control" name="telp_toko" value="<?php echo $rows['telp_toko'] ?>" required>
                	</div>

                	<!-- <div id="alert">asss</div> -->
                		      
	                <div class="box-footer col-md-7">
               			<button type="submit" class="btn btn-primary" name="submit" >Submit</button>
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