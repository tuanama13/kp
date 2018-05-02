<?php  
  //fungsi already header(menangkal warnings)
  ob_start();
  include '../../init/db.php';
  include "../admin_login.php";
  include '../header.php';
  include '../sidebar.php';
  //$status = $_GET['status'];

  date_default_timezone_set('Asia/Jakarta');
  $date_now = date("Y-m-d");
 
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
      <h1>
        Cetak Faktur
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li class="">Post</li> -->
        <li class="active">Cetak Faktur</li>
      </ol>
    </section>

	<section class="content">
	     <!-- Main content -->
	      <div class="row">
	        <div class="col-md-12">
	          <div class="box box-info">
	            <div class="box-header">
	              <h3 class="box-title">Faktur 
	                <small>Form Faktur Masuk Hari Ini</small>
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
                        <th>Status</th>
                        <th>Detail</th>
                        <!-- <th><></th> -->
                      <!-- <th colspan="2" style="text-align: center">Action</th> -->
                    </tr>
                </thead>
                <tbody>
                  
                  <?php
                    $sql = "SELECT * FROM transaksi WHERE tgl_transaksi='$date_now' AND grand_total <> 0";
                      $run_sql = mysqli_query($conn,$sql); 
                      while($rows = mysqli_fetch_assoc($run_sql)){
                          // $id = $rows['id_brg'];
                        $sql2 = "SELECT * FROM toko WHERE id_toko ='".$rows['id_toko']."'";
                    // $run_sql2 = ;
                    $rows2 = mysqli_fetch_assoc(mysqli_query($conn,$sql2));
                        echo "

                            <tr class=''>
                              <td>$rows[id_transaksi]</td>
                              <td>$rows[tgl_transaksi]</td>
                              <td>$rows2[nama_toko]</td>
                              <td>$rows[grand_total]</td>";
                              if ($rows['sisa_hutang'] == 0) {
                              echo "<td><span class='label label-success'>Lunas</span></td>";
                            }else{
                              echo "<td><span class='label label-danger'>$rows[sisa_hutang]</span></td>";
                            }
                        echo "
                              <td>$rows[tgl_tagihan]</td>";
                            if ($rows['status'] == 'shipped' ) {
                              echo "<td><span class='label label-success'>$rows[status]</span></td>";
                            }else{
                              echo "<td><span class='label label-warning'>$rows[status]</span></td>";
                            }
                              
                         echo "<td><button class='pilih btn btn-info' data-toggle='modal' data-target='#myModal' data-invoice='$rows[id_transaksi]' data_grand-total='$rows[grand_total]' data-toko='$rows2[nama_toko]'><span class='fa fa-eye'></span></button></td>
                            </tr>
                        ";
                        // echo "<td><button class='cetak btn btn-info' data-invoice='$rows[id_transaksi]' data-grand_total='$rows[grand_total]'  data-toko='$rows[id_toko]'><span class='fa fa-print'>  Cetak</span></button></td>
                        //     </tr>
                        // ";
                      }
                    ?>

          <!-- <tr class="pilih" data-toggle="modal" data-target="#myModal"> -->


                  </tbody>
                </table>
	                
	          </div>
	          <!-- /.box -->
	       </div>
       </div>


	</section>
</div> 
 <!-- Modal Toko-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                        <h4 class="modal-title" id="myModalLabel">Detail Transaksi</h4>
                    </div>
                    <div class="cetakBody">
                      <?php  
                        $sql = "SELECT * FROM transaksi WHERE tgl_transaksi='$date_now' AND grand_total <> 0";
                        $run_sql = mysqli_query($conn,$sql); 
                        $rows = mysqli_fetch_assoc($run_sql);
                            // $id = $rows['id_brg'];
                       
                        echo "<button type='button' class='cetak btn btn-info' data-invoice='$rows[id_transaksi]' data-grand_total='$rows[grand_total]'  data-toko='$rows[id_toko]'><span class='fa fa-print'></span> Cetak</button>";
                      ?>
                    </div>
                      
                    
                   
                    <div class="col-md-12 overflow-x:auto;">

                      <table style="margin: 20px;">

                        <tr>
                          <td><b>No. Invoice</b></td>
                          <td width="150px"></td>
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
    
    var sub_total=0;
    var sisa_hutang=0;

     $(document).ready(function() {
        $('#example').DataTable();                   
    });


     // fungsi pilih baris tabel modal supplier
    $(document).on('click', '.pilih', function (e) {
      // $('#myModal').modal('shown');
      var grand_total = $(this).attr('data_grand-total');
      var id_transaksi = $(this).attr('data-invoice');
      var nama_toko = $(this).attr('data-toko');
      console.log(id_transaksi);
      document.getElementById('id_invoice').innerHTML = "#"+id_transaksi;
      document.getElementById('nama_toko').innerHTML = nama_toko;

      $.ajax({
          type  : "GET",
          data  : "id_transaksi="+id_transaksi+"&grand_total="+grand_total,
          url   : "load_transaksi.php",
          success : function(result){
            console.log(result);
            // setInterval(function(){
            //  $("#modal-body").load(result);
            document.getElementById('modal-body').innerHTML = result;
            
            } 
        });
       
     });


    $(document).on('click', '.cetak', function (e) {
      // $('#myModal').modal('shown');
      var grand_total = $(this).attr('data-grand_total');
      var id_transaksi = $(this).attr('data-invoice');
      var id_toko = $(this).attr('data-toko');
      console.log(id_transaksi);
      console.log(grand_total);
      console.log(id_toko);
      // document.getElementById('id_invoice').innerHTML = "#"+id_transaksi;
      // document.getElementById('nama_toko').innerHTML = nama_toko;

      $.ajax({
          type  : "GET",
          data  : "id_transaksi="+id_transaksi+"&grand_total="+grand_total+"&id_toko="+id_toko,
          url   : "cetak_faktur.php",
          success : function(result){  
            window.location.href = "transaksi.php";          
          } 
        });
       
     });
    // tutup fungsi input modal


     // $('#myModal').on('shown.bs.modal', function () {
     //    $('#myInput').focus()
     //  });
    </script>
   
  <?php  
    include '../footer.php';
   ?>