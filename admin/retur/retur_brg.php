<?php  
  //fungsi already header(menangkal warnings)
  ob_start();
  include '../../init/db.php';
  include '../header.php';
  include '../sidebar.php';
  //$status = $_GET['status'];

  date_default_timezone_set('Asia/Jakarta');
  $year = date("Y");
  $month = date("m");

    // fungsi untuk menghasilkan id autonumber
  $sql = "SELECT max(id_retur) as maxid FROM retur WHERE id_retur LIKE 'INVR%'";
  $row = mysqli_fetch_assoc(mysqli_query($conn,$sql));
  $idmax=$row['maxid'];
      // $row = mysqli_num_rows(mysqli_query($conn,$sql));
        if ($row<=0) {
            $id_retur="INVR".$year."".$month."0000001";
        }else{
             $nourut = (int) substr($idmax, 10,7);
             $nourut++;
             $id_retur = "INVR".$year."".$month."".sprintf("%07s", $nourut);
        }
        // tutup fungsi autonumber


  // $id_transaksi=rand();
  $id_user=1;
  $tgl_transaksi = date("Y-m-d");
 
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
      <h1>
        Barang
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li class="">Post</li> -->
        <li class="active">Barang</li>
      </ol>
    </section>

	<section class="content">
	     <!-- Main content -->
	      <div class="row">
	        <div class="col-md-12">
	          <div class="box box-info">
	            <div class="box-header">
	              <h3 class="box-title">Tambah Toko 
	                <small>Form Pengisian Data Toko</small>
	              </h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body pad">

	                <div class="form-group col-md-offset-2 col-md-6">
                      <!-- <label for="nama_toko">Nama Toko</label> -->
                        <div class="input-group-btn" >
                          <input type="text" class="form-control col-md-6 " style="margin-bottom: 5px" name="id_transaksi" id="id_transaksi" placeholder="ID Faktur" readonly>
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Pilih</button>
                        </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12 table-responsive">
                      <table class="table" id="tbl-laporan">
                      

                      </table>
                    </div>
                  </div>

                  <div class="box-footer col-md-offset-2 col-md-6">
                    <button class="simpan-retur btn btn-primary add-row" >Simpan Retur</button>
                  </div>

	            </div>
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
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title" id="myModalLabel">Data Supplier</h4>
        </div>
        <div class="modal-body">
            <table id="lookup-supplier" class="table table-bordered table-hover table-striped dt-responsive" width="100%">
              <thead>
                 <tr>
                   <th>ID Faktur</th>
                   <th>Nama Toko</th>
                   <th>Grand Total</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  $sql = mysqli_query($conn,'SELECT * FROM detail_transaksi INNER JOIN toko USING(id_toko) WHERE grand_total <> 0');
                  while ($row = mysqli_fetch_assoc($sql)) {
                      $id=$row['id_transaksi'];
                  ?>
                <tr class="pilih" data_nama-toko="<?php echo $row['nama_toko']; ?>" data_id-transaksi="<?php echo $row['id_transaksi']; ?>">
                    <td><?php echo $row['id_transaksi']; ?></td>
                    <td><?php echo $row['nama_toko']; ?></td>
                    <td><?php echo $row['grand_total']; ?></td>
                </tr>
                <?php
                  }
                ?>
              </tbody>
            </table>  
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Toko -->


   <script>
    var myTable ="";
    var sub_total=0;
    var sisa_hutang=0;
    var datar=0;
    var id_retur = "<?php echo $id_retur?>";
    
     $(document).ready(function() {
         // fungsi datatablesnya
         $("#lookup-supplier").dataTable();
              
    });

     // fungsi pilih baris tabel modal supplier
     $(document).on('click', '.pilih', function (e) { 
            // 
            var id_transaksi = $(this).attr('data_id-transaksi') ;
            //id_retur = ;
            $.ajax({
                type  : "GET",
                data  : "id_transaksi="+id_transaksi+"&id_retur="+id_retur,
                url   : "load_retur.php",
                success : function(result){
                    console.log(result);
                    document.getElementById('tbl-laporan').innerHTML = result;
                } 
            });

            document.getElementById("id_transaksi").value =$(this).attr('data_id-transaksi');
            $('#myModal').modal('hide');
            loadTotal();
          });
    
    // tutup fungsi input modal

    $(document).on('click', '.delete-row', function (e) {
              
              var r = $(this).attr('data_id-retur');
              var s = $(this).attr('data_id-brg');
              var t = $(this).attr('data_jumlah-brg');
              datar = $(this).attr('data_row');
               $('#'+datar).remove();
             
              
              $.ajax({
                 type  : "GET",
                 data  : "id_retur="+r+"&id_brg="+s+"&jumlah_brg="+t,
                 url   : "delete_retur.php",
                 success : function(result){
                  console.log(result);
                 } 
               });
           
              loadTotal();
    });

     $(document).on('click', '.simpan-retur', function (e) {

        var grand_total = document.getElementById("jumlah_total").innerText;
        $.ajax({
                 type  : "GET",
                 data  : "id_retur="+id_retur+"&grand_total="+grand_total,
                 url   : "simpan_retur.php",
                 success : function(result){
                  console.log(result);
                 } 
               });
     });





    function loadTotal(){
      var x ="";
      var y =0;
      $('.sub_total').each(function()
       {
        x = parseInt($(this).text());
        y+=x;
        console.log(x);
      });
      console.log(y);
      loadJumlah(y);
    }


    function loadSub(r){
      var jumlah_brg = document.getElementById("jumlah_brg"+r).value;
      // console.log(jumlah_brg);
      var harga = document.getElementById("harga"+r).innerText;
      var id_brg_edit = document.getElementById("id_brg"+r).innerText;
      // console.log(harga);
      sub_total =(jumlah_brg * harga);
      document.getElementById("sub_total"+r).innerHTML = sub_total;

      $.ajax({
        type  : "GET",
        data  : "id_retur="+id_retur+"&id_brg="+id_brg_edit+"&jumlah_brg="+jumlah_brg+"&sub_total="+sub_total,
        url   : "simpan_detail_retur.php",
        success : function(result){
          console.log(result);
        } 
      });

      // loadJumlah(sub_total);
    }

    function loadJumlah(r){
      document.getElementById('jumlah_total').innerHTML = r;
    }


    // $(document).on('keyup', '#jumlah_brg', function (e) {
    //    //var hitung = $('#jumlah_bayar').val();
    //     //sisa_hutang = sub_total- hitung;
    //     //$('#sisa_bayar').val(sisa_hutang);
    // });
    


     $('#myModal').on('shown.bs.modal', function () {
        $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
     });
     // myTable.responsive.recalc();
    </script>
   
  <?php  
    include '../footer.php';
   ?>