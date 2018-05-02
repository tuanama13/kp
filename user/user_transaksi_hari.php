<?php 
    session_start(); 
    include "../init/db.php";
    include "user_login.php";
  	include "header.php";
  	include "sidebar.php";
  	$id_user=$_SESSION['username'];
    date_default_timezone_set('Asia/Jakarta');
    $date_now = date("Y-m-d");

?>
<section class="content">
	     <!-- Main content -->
	      <div class="row">
	        <div class="col-md-12">
	          <div class="box box-info">
	            <div class="box-header">
	              <h3 class="box-title">List Transaksi
	                <small>Semua Transaksi Oleh, </small>
	              </h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body pad">
	             <table id="example" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No Invoice</th>
                        <th>Tanggal Transaksi</th>
                        <th>Nama Toko</th>
                        <th>Grand Total</th>
                        <th>Sisa Hutang</th>
                        <th>Tanggal Tagihan</th>
                      <!-- <th colspan="2" style="text-align: center">Action</th> -->
                    </tr>
                </thead>
                <tbody>
                  
                  <?php
                    $sql = "SELECT * FROM transaksi WHERE username='$id_user' AND tgl_transaksi='$date_now' AND grand_total <> 0";
                      $run_sql = mysqli_query($conn,$sql); 
                      while($rows = mysqli_fetch_assoc($run_sql)){
                          // $id = $rows['id_brg'];
                      	$sql2 = "SELECT * FROM toko WHERE id_toko ='".$rows['id_toko']."'";
		                // $run_sql2 = ;
		                $rows2 = mysqli_fetch_assoc(mysqli_query($conn,$sql2));
                        echo "

                            <tr class='pilih' data-toggle='modal' data-target='#myModal' data-invoice='$rows[id_transaksi]' data_grand-total='$rows[grand_total]' data-toko='$rows2[nama_toko]'>
                              <td>$rows[id_transaksi]</td>
                              <td>$rows[tgl_transaksi]</td>
                              <td>$rows2[nama_toko]</td>
                              <td>$rows[grand_total]</td>";
                            	if ($rows['sisa_hutang'] == 0) {
                      				echo "<td><span class='label label-success'>Lunas</span></td>";
                      			}else{
                      				echo "<td><span class='label label-warning'>$rows[sisa_hutang]</span></td>";
                      			}
                      	echo "
                              <td>$rows[tgl_tagihan]</td>
                            </tr>
                        ";
                      }
                    ?>

					<!-- <tr class="pilih" data-toggle="modal" data-target="#myModal"> -->


                  </tbody>
                </table>
	            </div>
	          </div>
	          <!-- /.box -->
	       </div>
       </div>
	</section>

<!-- Modal Toko-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Detail Transaksi</h4>
                    </div>
                    <div class="col-md-12 overflow-x:auto;">
                    	<table style="margin: 20px;">
                    		<tr>
                    			<td><b>No. Invoice</b></td>
                    			<td width="150px"></h4></td>
                    			<td><b>Nama Toko</b></td>
                    		</tr>
                    		<tr>
                    			<td><h4 id="id_invoice"></h4></td>
                    			<td></td>
                    			<td><h4 id="nama_toko"></h4></td>
                    		</tr>
                    	</table>                    	
                    </div>                    
                    <div class="modal-body"  id="modal-body">
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Toko -->




   <script>
     $(document).ready(function() {
        $('#example').DataTable();
      } );

     $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
      });

     $(document).on('click', '.pilih', function (e) {
     	// $('#myModal').modal('shown');
     	var grand_total = $(this).attr('data_grand-total');
     	var id_transaksi = $(this).attr('data-invoice');
     	var nama_toko = $(this).attr('data-toko');
     	console.log(id_transaksi);
     	document.getElementById('id_invoice').innerHTML = "#"+id_transaksi;
     	document.getElementById('nama_toko').innerHTML = nama_toko;

     	$.ajax({
        	type	: "GET",
        	data 	: "id_transaksi="+id_transaksi+"&grand_total="+grand_total,
        	url		: "load_transaksi.php",
        	success	: function(result){
        		console.log(result);
        		// setInterval(function(){
        		// 	$("#modal-body").load(result);
        		document.getElementById('modal-body').innerHTML = result;
        		// },1000);
        		// document.getElementById('modal-body').innerHTML = result;
            } 
        });
        // setInterval(function(){
        // 	$("#modal-body").load("load_transaksi.php");
        // },1000);
     });
            // tutup fungsi input modal
    </script>

<?php  
  include 'footer.php';
?>