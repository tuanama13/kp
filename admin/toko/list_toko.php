<?php  
  //fungsi already header(menangkal warnings)
  ob_start();
  include '../../init/db.php';
  include '../header.php';
  include '../sidebar.php';
  //$status = $_GET['status'];
 
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
        <li class="active">List Toko</li>
      </ol>
    </section>

     <?php 
        if (isset($_GET['status'])) {
          echo '<div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                      Data Berhasil diupdate.
                    </div>';
        }
       ?>

	<section class="content">
	     <!-- Main content -->
	      <div class="row">
	        <div class="col-md-12">
	          <div class="box box-info">
	            <div class="box-header">
	              <h3 class="box-title">List Toko 
	                <small>Semua Toko yang Terdaftar</small>
	              </h3>
                <a href="insert_toko.php" class="btn btn-success pull-right"><span class="fa fa-plus"></span> Tambah Toko</a>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body pad">
	             <table id="example" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Nama Toko</th>
                        <th>Alamat Toko</th>
                        <th>No. Telepon</th>
                        <th><></th>
                        <th><></th>
                      <!-- <th colspan="2" style="text-align: center">Action</th> -->
                    </tr>
                </thead>
                <tbody>
                  
                  <?php
                    $sql = "SELECT * FROM toko WHERE del=0";
                    // nilai 0 = delete no
                      $run_sql = mysqli_query($conn,$sql); 
                      while($rows = mysqli_fetch_assoc($run_sql)){
                          // $id = $rows['id_brg'];
                        echo "

                            <tr>
                              <td>$rows[nama_toko]</td>
                              <td>$rows[alamat_toko]</td>
                              <td>$rows[telp_toko]</td>
                              <td><a href='update-toko.php?id=$rows[id_toko]' class='btn btn-info'><span class='fa fa-pencil'></span></a></td>
                              <td><a href='delete_toko.php?id=$rows[id_toko]' class='btn btn-danger'><span class='fa fa-times'></span></a></td>
                            </tr>
                        ";
                      }
                    ?>
                  </tbody>
                </table>
	            </div>
	          </div>
	          <!-- /.box -->
	       </div>
       </div>


	</section>
</div> 
   <script>
     $(document).ready(function() {
        $('#example').DataTable();
      } );
     $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
      });
    </script>
   
  <?php  
    include '../footer.php';
   ?>