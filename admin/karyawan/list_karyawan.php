<?php  
	//fungsi already header(menangkal warnings)
  ob_start();

 include '../../init/db.php';
 include "../admin_login.php";
 include '../header.php';
 include '../sidebar.php';

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
        <li class="active">List Karyawan</li>
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
	              <h3 class="box-title">List Karyawan
	                <small>Semua Karyawan Yang Telah Terdaftar</small>
	              </h3>
                <a href="new_karyawan.php" class="btn btn-success pull-right"><span class="fa fa-plus">  Tambah Karyawan</span></a>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body pad">
	             <table id="example" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Nama Karyawan</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>No. Telepon</th>
                        <th>Jabatan</th>
                        <th>Tanggal Masuk</th>
                        <th><></th>
                        <th><></th>
                      <!-- <th colspan="2" style="text-align: center">Action</th> -->
                    </tr>
                </thead>
                <tbody>
                  
                  <?php
                    $sql = "SELECT * FROM karyawan WHERE del=0";
                      $run_sql = mysqli_query($conn,$sql); 
                      while($rows = mysqli_fetch_assoc($run_sql)){
                          // $id = $rows['id_brg'];
                        echo "

                            <tr>
                              <td>$rows[nama]</td>
                              <td>$rows[tgl_lahir]</td>
                              <td>$rows[alamat]</td>
                              <td>$rows[no_telp]</td>
                              <td>$rows[jabatan]</td> 
                              <td>$rows[tgl_masuk]</td>                         
                              <td><a href='update_karyawan.php?id=$rows[id_karyawan]' class='btn btn-info'><span class='fa fa-pencil'></span></a></td>
                              <td><a href='delete_karyawan.php?id=$rows[id_karyawan]' class='btn btn-danger'><span class='fa fa-times'></a></td>
                            </tr>
                        ";
                      }
                    ?>
                  </tbody>
                  <!-- <span class="fa fa-pencil"></span> -->
                </table>
	            </div>
                <div class="modal fade" tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Modal title</h4>
                      </div>
                      <div class="modal-body">
                        <p>One fine body&hellip;</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <?php echo "<button type='button' class='btn btn-primary' href='delete.php?id=$rows[id_brg]' data-dismiss='modal'>Delete</button>";?>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
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