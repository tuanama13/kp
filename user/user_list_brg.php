<?php  
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
	              <h3 class="box-title">List Barang
	                <small>Semua Barang Yang Dijual</small>
	              </h3>
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
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Satuan</th>
                        
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
                              <td>$rows[harga]</td>";
                            if ($rows['stok'] == 0) {
                      			echo "<td><span class='label label-danger'>Kosong</span></td>";
                      		}elseif($rows['stok'] <= 7){
                      			echo "<td><span class='label label-warning'>$rows[stok]</span></td>";
                      		}else{
                            echo "<td><span class='label label-success'>$rows[stok]</span></td>";
                          }
                        echo "      
                              
                              <td>$rows[satuan]</td>
                              
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
?>