<?php  
  //fungsi already header(menangkal warnings)
  ob_start();


  include '../../init/db.php';
  include "../admin_login.php";
  include '../header.php';
  include '../sidebar.php';
  //$status = $_GET['status'];
 
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
        <li class="active">List Barang</li>
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
	              <h3 class="box-title">List Barang
	                <small>List Barang-Barang yang Sudah Dimasukan</small>
	              </h3>
                <a href="barang.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah Barang</a>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body pad">
	             <table id="example" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Type Barang</th>
                        <th>Spesifikasi</th>
                        <th>Merk</th>
                        <!-- <th>Harga Beli</th> -->
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Satuan</th>
                        <th><></th>
                        <th><></th>
                      <!-- <th colspan="2" style="text-align: center">Action</th> -->
                    </tr>
                </thead>
                <tbody>
                  
                  <?php
                    $sql = "SELECT * FROM list_brg WHERE del=0";
                      $run_sql = mysqli_query($conn,$sql); 
                      while($rows = mysqli_fetch_assoc($run_sql)){
                          // $id = $rows['id_brg'];
                        echo "

                            <tr>
                              <td>$rows[nama_brg]</td>
                              <td>$rows[type]</td>
                              <td>$rows[spek]</td>
                              <td>$rows[merk]</td>
                              
                              <td>$rows[harga]</td>
                              <td>$rows[stok]</td>
                              <td>$rows[satuan]</td>
                              <td><a href='update_barang.php?id=$rows[id_brg]' class='btn btn-info'><span class='fa fa-pencil'></span></a></td>
                              <td><a href='delete_barang.php?id=$rows[id_brg]' class='btn btn-danger'><span class='fa fa-times'></span></a></td>
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