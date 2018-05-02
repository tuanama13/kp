<?php 
	//fungsi already header(menangkal warnings)
	ob_start();
	
	include '../../init/db.php';
  include "../admin_login.php";
	include '../header.php';
  include '../sidebar.php';
  	//include 'autonumber.php'; 

  	if (isset($_POST['submit'])) {

  		// fungsi untuk menghasilkan id autonumber
  		$sql = "SELECT max(id_supplier) as maxid FROM supplier WHERE id_supplier LIKE 'SPL%'";
		  $row = mysqli_fetch_assoc(mysqli_query($conn,$sql));
	   	$idmax=$row['maxid'];
      $row = mysqli_num_rows(mysqli_query($conn,$sql));
  		if ($row<=0) {
  			$id_supplier="SPL00001";
  		}else{
  			 $nourut = (int) substr($idmax, 3,5);
  			 $nourut++;
  			 $id_supplier = "SPL".sprintf("%05s", $nourut);
  		}
  		// tutup fungsi autonumber



  		//$id_toko = rand();
  		$nama = $_POST['nama_sup'];
  		$alamat = $_POST['alamat_sup'];
  		$telp = $_POST['telp_sup'];
      $email = $_POST['email_sup'];

  		$insert = "INSERT INTO supplier(id_supplier,nama_supplier,alamat_supplier,telp_supplier,email_supplier,del) VALUES ('$id_supplier','$nama','$alamat','$telp','$email',0)";

		if (mysqli_query($conn,$insert)) {
				 header('Location: list_supplier.php');
			}else{
				// echo '<div class="alert alert-danger" style="text-align:center"><h4>Query bermasalah</h4></div>';
        print mysqli_error($conn);
			}
  		
  	}
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Supplier
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li class="">Post</li> -->
        <li class="">Supplier</li>
        <li class="active">Tambah Supplier</li>
      </ol>
    </section>

	<section class="content">
	     <!-- Main content -->
	      <div class="row">
	        <div class="col-md-8">
	          <div class="box box-info">
	            <div class="box-header">
	              <h3 class="box-title">Tambah Supplier
	                <small>Form Penambahan Supplier</small>
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
                  		<label for="nama_sup">Nama Supplier</label>
                  		<input type="text" class="form-control" id="nama_sup" name="nama_sup" placeholder="Nama Supllier" >
                	</div>

                	<div class="form-group col-md-7">
                  		<label for="alamat_sup">Alamat Supplier</label>
                  		<!-- <input type="text" class="form-control" name="username" placeholder="Masukan Username" required> -->
                  		<textarea class="form-control" rows="5" name="alamat_sup" id="alamat_sup" placeholder="Alamat Supplier"></textarea>
                	</div>
                	<div class="form-group col-md-7">
                  		<label for="telp_sup">No. Telpon Supplier</label>
                  		<input type="number" class="form-control" name="telp_sup" placeholder="Masukan Nomor Telepon Supplier" required>
                	</div>

                  <div class="form-group col-md-7">
                      <label for="email_sup">Email Supplier</label>
                      <input type="email" class="form-control" name="email_sup" placeholder="Masukan Email Supplier">
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

   </div>
   <!-- <script type="text/javascript">
   		 $(document).on('click', '.pilih', function (e) {
   		 	var nama = $(this).attr('data-nama_karyawan');
   		 	var id_karyawan =  $(this).attr('data-id_karyawan');
   		 	var jabatan =  $(this).attr('data-jabatan');
   		 	$("[name='nama']").val(nama);
   		 	$("[name='jabatan']").val(jabatan);
   		 	$("[name='id_karyawan']").val(id_karyawan);
   		 	console.log(id_karyawan);
   		 	console.log(jabatan);

   		 	$('#myModal').modal('hide');
   		 });

   		 // $(document).on('keyup', '#jumlah_bayar', function (e) {
      //   	 	var pass1 = $("[name='password']").val();
      //   	 	var pass2 = $("[name='password2']").val();

      //   	 	if (pass2 != pass) {
      //   	 		document.getElementById('jumlah_total').innerHTML = "Password nya Beda!!";
      //   	 	}

      //   	 });
   </script> -->
   <?php  
   	include '../footer.php';
   ?>
