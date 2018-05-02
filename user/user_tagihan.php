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
	              <h2 class="box-title">List Tagihan
	                <small>List Toko-Toko Masih Memiliki Tagihan</small>
	              </h2>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body pad">
                <!-- <a href="user_tambah_toko.php" class="btn btn-success" style="margin-bottom: 10px;">Tambah Toko</a> -->
	             <table id="example" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID Faktur</th>
                        <th>Nama Toko</th>
                        <th>Grand Total</th>
                        <th>Sisa Tagihan</th>
                        <th><></th>
                       
                      <!-- <th colspan="2" style="text-align: center">Action</th> -->
                    </tr>
                </thead>
                <tbody>
                  
                  <?php
                   $no =0;
                    $sql = "SELECT * FROM transaksi INNER JOIN toko USING(id_toko) WHERE grand_total<>0 AND sisa_hutang<>0";
                    // nilai 0 = delete no
                      $run_sql = mysqli_query($conn,$sql); 
                      while($rows = mysqli_fetch_assoc($run_sql)){
                          // $id = $rows['id_brg'];

                        echo "

                            <tr id=$no class='pilih' data-toggle='modal' data-target='#myModal' data-invoice='$rows[id_transaksi]' data_grand-total='$rows[grand_total]' data-toko='$rows[nama_toko]' data-tagihan='$rows[sisa_hutang]'>
                              <td>$rows[id_transaksi]</td>
                              <td>$rows[nama_toko]</td>
                              <td>$rows[grand_total]</td>
                              <td><span class='label label-warning'>$rows[sisa_hutang]</span></td>
                              <td><button class='lunas btn btn-danger' data-row='$no' data-invoice='$rows[id_transaksi]' data-grand_total='$rows[grand_total]'  data-toko='$rows[id_toko]'>Bayar</button></td>
                              
                            </tr>
                        ";
                        $no++;
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
      var sisa_bayar = $(this).attr('data-tagihan');
      var id_transaksi = $(this).attr('data-invoice');
      var nama_toko = $(this).attr('data-toko');
      console.log(id_transaksi);
      document.getElementById('id_invoice').innerHTML = "#"+id_transaksi;
      document.getElementById('nama_toko').innerHTML = nama_toko;

      $.ajax({
          type  : "GET",
          data  : "id_transaksi="+id_transaksi+"&grand_total="+grand_total+"&sisa_bayar="+sisa_bayar,
          url   : "load_tagihan.php",
          success : function(result){
            // console.log(result);
            // setInterval(function(){
            //  $("#modal-body").load(result);
            document.getElementById('modal-body').innerHTML = result;
            // },1000);
            // document.getElementById('modal-body').innerHTML = result;
            } 
        });
        // setInterval(function(){
        //  $("#modal-body").load("load_transaksi.php");
        // },1000);
     });

      $(document).on('click', '.lunas', function (e) {
      // $('#myModal').modal('shown');
      // var data-row = $(this).attr('data-row');
      var grand_total = $(this).attr('data-grand_total');
      var id_toko = $(this).attr('data-toko');
      var id_transaksi = $(this).attr('data-invoice');

      $.ajax({
          type  : "GET",
          data  : "id_transaksi="+id_transaksi+"&grand_total="+grand_total+"&id_toko="+id_toko,
          url   : "user_bayar.php",
          success : function(result){
            window.location.href="user_tagihan.php";
            } 
        });
     });

    </script>
<?php  
  include 'footer.php';
   ob_end_flush()
?>