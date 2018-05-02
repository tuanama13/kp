<?php  
  ob_start();
	include "../init/db.php";
  include "user_login.php";
  	include "header.php";
  	include "sidebar.php";
  	//$kosong="kosong";
?>
	<section class="content">
	     <!-- Main content -->
	      <div class="row">
	        <div class="col-md-12">
	          <div class="box box-info">
	            <div class="box-header">
	              <h2 class="box-title">List Toko 
	                <small>List Toko-Toko Yang Pernah Menjadi Pelanggan</small>
	              </h2>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body pad">
                <a href="user_tambah_toko.php" class="btn btn-success" style="margin-bottom: 10px;">Tambah Toko</a>
	             <table id="example" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Nama Toko</th>
                        <th>Alamat Toko</th>
                        <th>No. Telepon</th>
                       
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

   <script>
     $(document).ready(function() {
        $('#example').DataTable();
      } );
     $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
      });
    </script>
<?php  
  include 'footer.php';
   ob_end_flush()
?>