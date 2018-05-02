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
        Penagihan
        <small>Form Penagihan</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li class=""></li> -->
        <li class="active">List Penagihan</li>
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
	              <h3 class="box-title">List Penagihan
	                <small>Semua Tagihan Yang Belum Lunas</small>
	              </h3>
                <!-- <a href="new_karyawan.php" class="btn btn-success pull-right">Tambah Karyawan</a> -->
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body pad">
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
                    $sql = "SELECT * FROM transaksi INNER JOIN toko USING(id_toko) WHERE grand_total<>0 AND sisa_hutang>=0 AND lunas ='' OR lunas ='no' ";
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
                              <td><button class='lunas btn btn-danger' data-row='$no' data-invoice='$rows[id_transaksi]' data-grand_total='$rows[grand_total]' data-tgl_transaksi='$rows[tgl_transaksi]' data-toko='$rows[id_toko]'>Pelunasan</button></td>
                              
                            </tr>
                        ";
                        $no++;
                      }
                    ?>
                  </tbody>
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

     $(document).on('click', '.lunas', function (e) {
        // $('#myModal').modal('shown');
        // var data-row = $(this).attr('data-row');
        var grand_total = $(this).attr('data-grand_total');
        var id_toko = $(this).attr('data-toko');
        var id_transaksi = $(this).attr('data-invoice');
        var tgl_transaksi = $(this).attr('data-tgl_transaksi');

        $.ajax({
            type  : "GET",
            data  : "id_transaksi="+id_transaksi+"&tgl_transaksi="+tgl_transaksi+"&grand_total="+grand_total+"&id_toko="+id_toko,
            url   : "pelunasan.php",
            success : function(result){
              window.location.href="penagihan.php";
              console.log(result);
              } 
          });
        // $.ajax({
        //   type  : "GET",
        //   data  : "id_transaksi="+id_transaksi+"&grand_total="+grand_total+"&id_toko="+id_toko,
        //   url   : "../invoice/cetak_faktur.php",
        //   success : function(result){  
        //     window.location.href="penagihan.php"; 
        //     console.log(result);       
        //   } 
        // });
     });
    </script>
   
  <?php  
    include '../footer.php';
   ?>