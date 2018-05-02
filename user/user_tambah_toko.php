<?php  
	ob_start();

	include "../init/db.php";
	include "user_login.php";
  	include "header.php";
  	include "sidebar.php";

  	if (isset($_POST['submit'])) {

  		// fungsi untuk menghasilkan id autonumber
  		$sql = "SELECT max(id_toko) as maxid FROM toko WHERE id_toko LIKE 'TK%'";
		  $row = mysqli_fetch_assoc(mysqli_query($conn,$sql));
	   	$idmax=$row['maxid'];
      $row = mysqli_num_rows(mysqli_query($conn,$sql));
  		if ($row<=0) {
  			$id_toko_new="TK00001";
  		}else{
  			 $nourut = (int) substr($idmax, 2,5);
  			 $nourut++;
  			 $id_toko_new = "TK".sprintf("%05s", $nourut);
  		}
  		// tutup fungsi autonumber



  		//$id_toko = rand();
  		$nama = $_POST['nama'];
  		$alamat = $_POST['alamat'];
  		$telp = $_POST['telp'];

  		$insert = "INSERT INTO toko(id_toko,nama_toko,alamat_toko,telp_toko,del) VALUES ('$id_toko_new','$nama','$alamat','$telp',0)";
		if (mysqli_query($conn,$insert)) {
				 header('Location: user_list_toko.php');
			}else{
				echo '<div class="alert alert-danger" style="text-align:center"><h4>Query bermasalah</h4></div>';
			}
  		
  	}

?>
<section class="content">
	     <!-- Main content -->
	      <div class="row">
	        <div class="col-md-8">
	          <div class="box box-info">
	            <div class="box-header">
	              <h3 class="box-title">Tambah Toko
	                <small>Untuk Menambah Toko Baru</small>
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
                  		<label for="nama">Nama Toko</label>
                  		<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Toko" >
                	</div>

                	<div class="form-group col-md-7">
                  		<label for="alamat">Alamat Toko</label>
                  		<!-- <input type="text" class="form-control" name="username" placeholder="Masukan Username" required> -->
                  		<textarea class="form-control" rows="5" name="alamat" id="alamat" placeholder="Alamat Toko"></textarea>
                	</div>
                	<div class="form-group col-md-7">
                  		<label for="telp">No. Telpon Toko</label>
                  		<input type="number" class="form-control" name="telp" placeholder="Masukan Nomor Telepon" required>
                	</div>
                		      
	                <div class="box-footer col-md-7">
               			<button type="submit" class="btn btn-primary" name="submit" >Submit</button>
              	    </div>
	              </form>
	            </div>
	          </div>
	          <!-- /.box -->
	         </div>
	</section>


<?php  
  include 'footer.php';
   ob_end_flush()
?>