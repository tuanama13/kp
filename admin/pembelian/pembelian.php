<?php  
  //fungsi already header(menangkal warnings)
  ob_start();
  include '../../init/db.php';
  include "../admin_login.php";
  include '../header.php';
  include '../sidebar.php';
  //$status = $_GET['status'];

  date_default_timezone_set('Asia/Jakarta');
  $year = date("Y");
  $month = date("m");
  $username=$_SESSION['username'];

 
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
      <h1>
        Pembelian
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li class="">Post</li> -->
        <li class="active">Pembelian</li>
      </ol>
    </section>

	<section class="content">
	     <!-- Main content -->
	      <div class="row">
	        <div class="col-md-12">
	          <div class="box box-info">
	            <div class="box-header">
	              <h3 class="box-title">Pembelian
	                <small>Form Pembelian Barang</small>
	              </h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body pad">
                   <div class="form-group col-md-offset-2 col-md-5">
                      <input type="text" class="form-control" name="no_invoice" id="no_invoice" placeholder="Nomor Invoice" onchange='document.getElementById("no_invoice").disabled = true; document.getElementById("tgl_transaksi").disabled = false;'>
                    </div>

                    <div class="form-group col-md-offset-2 col-md-5">
                      <label for="tgl_lahir">Tanggal Pembelian</label>
                      <input type="date" class="form-control" id="tgl_transaksi" name="tgl_transaksi" placeholder="Tanggal Pembelian" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" onchange='document.getElementById("tgl_transaksi").disabled = true; document.getElementById("btn-pilih-toko").disabled = false' required>
                  </div>

	                <div class="form-group col-md-offset-2 col-md-6">
                      <!-- <label for="nama_toko">Nama Toko</label> -->
                        <div class="input-group-btn ">
                          <input type="text" class="form-control col-md-6" name="nama_sup" id="nama_sup" placeholder="Pilih Nama Supplier" readonly>
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" id="btn-pilih-toko">Pilih</button>
                        </div>
                    </div>
                    
                    <!-- input barang -->
                    <div class="form-group col-md-offset-2 col-md-6">
                      <!-- <label for="nama_toko">Nama Barang</label> -->
                        <div class="input-group-btn ">
                          <input type="text" class="form-control col-md-6" name="barang" id="barang" placeholder="Nama Barang" readonly>
                          <button type="button" class="btn btn-success" name="browse" data-toggle="modal" data-target="#myModal-brg" id="btn-pilih-brg">Pilih</button>
                        </div>
                    </div>
                    

                    <div class="form-group col-md-offset-2 col-md-4">
                      <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah Barang">
                    </div>
                    <div class="form-group col-md-offset-2 col-md-6">
                      <input type="number" class="form-control" name="subtotal_brg" id="subtotal_brg" placeholder="Subtotal">
                    </div>

                    <!-- <hr> -->
                    <div class="box-footer col-md-offset-2 col-md-6">
                      <button class="btn btn-primary add-row" id="btn-tambah-brg">Tambah Barang</button>
                    </div>
                    <div class="form-group col-md-offset-2 col-md-8">
                      <h3>Tabel Pesanan Barang</h3>
                      <p>Barang yang dipesan akan muncul pada tabel ini</p>
                      <br>
                      <div class="table-responsive"> 
                        <table class="table" id="tbl-trans">
                          <thead>
                            <tr>
                              <th>Nama</th>
                             
                              <th>Jumlah</th>
                              <th>Subtotal</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                          </tbody>
                          <tfoot>
                            <tr>
                              <td colspan="4" ><b>Jumlah</b></td>
                              <td id="jumlah_total" style="background-color:#00c0ef; color: white; "></td>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>

                    <div class="box-footer col-md-offset-2 col-md-8">
                  
                      <div class="col-md-4 col-xs-6" style="margin-bottom:10px; font-size: large; border-style: solid; border-width: 5px;">
                        <label>
                          Lunas
                        </label>
                        <div class="radio " style="margin:10px;">
                          <label>
                            <input type="radio" name="rdLunas" id="rdLunas" value="1">
                           Lunas
                          </label>
                          <label>
                            <input type="radio" name="rdLunas" id="rdLunas" value="0" >
                            Belum Lunas
                          </label>
                        </div>
                       
                      </div> 
                      <div class=" ini col-md-6 col-xs-12" style="margin-bottom:10px">
                       
                      </div>
                      <div class="col-md-2 col-xs-12" style="margin-bottom:10px">          
                        <button type="button" class="btn btn-success" id="tombol_pesan" onclick="pesan()" style="width: 100px">Pesan</button>
                      </div>
                  </div>
      	       </div>

	          </div>
	           <!-- /.box -->
	       </div>
       </div>


	</section>
</div> 

 <!-- Modal Toko -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:800px">
      <div class="modal-content">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title" id="myModalLabel">Data Supplier</h4>
        </div>
        <div class="modal-body">
            <table id="lookup-supplier" class="table table-bordered table-hover table-striped">
              <thead>
                 <tr>
                   <th>Kode Supplier</th>
                   <th>Nama Supplier</th>
                   <th>Alamat Supplier</th>
                   <th>No. Telepon Supplier</th>
                   <th>Email Supplier</th>
                 </tr>
              </thead>
              <tbody>
                                <?php
                                $sql = mysqli_query($conn,'SELECT * FROM supplier WHERE del=0');
                                while ($row = mysqli_fetch_assoc($sql)) {
                                  $id=$row['id_supplier'];
                                ?>
                <tr class="pilih" data_nama-sup="<?php echo $row['nama_supplier']; ?>" data_id-sup="<?php echo $row['id_supplier']; ?>">
                    <td><?php echo $row['id_supplier']; ?></td>
                    <td><?php echo $row['nama_supplier']; ?></td>
                    <td><?php echo $row['alamat_supplier']; ?></td>
                    <td><?php echo $row['telp_supplier']; ?></td>
                    <td><?php echo $row['email_supplier']; ?></td>
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

        <!-- Modal Barang -->
        <div class="modal fade" id="myModal-brg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Data Barang</h4>
                    </div>
                    
                    <div class="modal-body">
                        <table id="lookup-brg" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                  <th>Stok</th>
                                    <th>Nama Barang</th>
                                    <th>Tipe</th>
                                    <th>Spesifikasi</th>
                                    <th>Merk</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                <?php
                              

                                $sql = mysqli_query($conn,'SELECT * FROM list_brg WHERE del = 0');
                                while ($row = mysqli_fetch_assoc($sql)) {
                                  //$id_brg=$row['id_brg'];
                                ?>
                                    <tr class="pilih-brg" data-kodebrg="<?php echo $row['nama_brg']; ?>"  data-hargabrg="<?php echo $row['harga']; ?>" data_brg="<?php echo $row['id_brg']; ?>" data-stok_brg="<?php echo $row['stok']; ?>">
                                        <td><?php echo $row['stok']; ?></td>
                                        <td><?php echo $row['nama_brg']; ?></td>
                                        <td><?php echo $row['type']; ?></td>
                                        <td><?php echo $row['spek']; ?></td>
                                        <td><?php echo $row['merk']; ?></td>
                                        <td><?php echo $row['harga']; ?></td>
                                    </tr>
                                <?php
                                }
                                // mysqli_refresh($conn,$sql);
                                mysqli_close($conn);
                                ?>
                                
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>

   <script>
    
    var sub_total=0;
    //var sisa_hutang=0;
    id_supplier = '';

     $(document).ready(function() {
        //$('#example').DataTable();
        loadAwal(true);
         $(function () {
                    $("#lookup-supplier").dataTable();
                    $("#lookup-brg").dataTable();
                });
    });

   

    function loadAwal(a) {
      document.getElementById("btn-pilih-brg").disabled = a;
      document.getElementById("tgl_transaksi").disabled = a;
      document.getElementById("btn-pilih-toko").disabled = a;
      document.getElementById("jumlah").disabled = a;
      document.getElementById("subtotal_brg").disabled = a;
      document.getElementById("btn-tambah-brg").disabled = a;
      document.getElementById("tombol_pesan").disabled = a;
      // document.getElementById("").disabled = true;
    }

     // fungsi memunculkan grand Total
     function loadJumlah(r){
            $("#barang").val("");
            $("#subtotal_brg").val("");
            $("#jumlah").val("");
            document.getElementById('jumlah_total').innerHTML = r;
              console.log(sub_total);
          }

      function pesan(){
          var lunas = $("input[type=radio]:checked").val();
          // console.log(lunas);
          if (sub_total == 0 || sub_total === undefined) {
              swal("Barang Belum Dipilih Silahkan Pilih Dulu Barang nya");
          }else if (lunas == '' || lunas === undefined){
               swal("Status Lunas nya Belum Dipilih Silahkan Pilih Dulu");
            $('#sisa_bayar').val(0);
          }else{
            var invoice = $("#no_invoice").val();
            
            
           
             $.ajax({
                type  : "GET",
                data  : "id_transaksi="+invoice+"&grand_total="+sub_total+"&lunas="+lunas,
                url   : "simpan_pembelian.php",
                success : function(result){
                  window.location="pembelian.php"
                  console.log(result);
                } 
              });
            }
          }

     // fungsi pilih baris tabel modal supplier
    $(document).on('click', '.pilih', function (e) {
        document.getElementById("nama_sup").value = $(this).attr('data_nama-sup');
        
        id_supplier = $(this).attr('data_id-sup');
        var invoice = $("#no_invoice").val();
        var tgl_transaksi = $("#tgl_transaksi").val();
        // var jumlah = $("#jumlah").val();
        $.ajax({
          type  : "POST",
          data  : "id_transaksi="+invoice+"&tgl_transaksi="+tgl_transaksi+"&id_supplier="+id_supplier,
          url   : "pembelian_barang.php",
          success : function(result){
             console.log(result);
          } 
        });
        $('#myModal').modal('hide');
                // console.log(id_toko);
        // loadAwal()
        document.getElementById("btn-pilih-toko").disabled = true; 
        document.getElementById("btn-pilih-brg").disabled = false; 
                
    });
    // tutup fungsi input modal

    //jika dipilih, data barang akan masuk ke input dan modal di tutup
    $(document).on('click', '.pilih-brg', function (e) {
        id_brg = $(this).attr('data_brg');
        stok_brg =  $(this).attr('data-stok_brg');
        console.log(stok_brg);
              //console.log(id_brg);
        document.getElementById("barang").value =$(this).attr('data-kodebrg');
        // document.getElementById("harga").value= $(this).attr('data-hargabrg');
        document.getElementById("jumlah").value = 1;
        document.getElementById("subtotal_brg").value = 0;
        $('#myModal-brg').modal('hide');
        // loadAwal(false);
        document.getElementById("jumlah").disabled = false;
        document.getElementById("subtotal_brg").disabled = false;
        document.getElementById("btn-tambah-brg").disabled = false;

                // $("#lookup-brg1").DataTable();
    });

    $(".add-row").click(function(){

      var a = $('#subtotal_brg').val();
      var b = $('#jumlah').val();
      var c = $('#barang').val();
      if (a == '' || a ==0) {
          swal("Sub Total Tidak Boleh Kosong");
      }else if(b == '' || b ==0){
          swal("Jumlah Barang Tidak Boleh Kosong");
      }else if(c == '' || c ==0){
          swal("Barang Tidak Boleh Kosong");
      }else{
              var invoice = $("#no_invoice").val();
              var barang = $("#barang").val();
              var subtotal_brg = parseInt($("#subtotal_brg").val());
              var jumlah = $("#jumlah").val();
              var rowid= 0;
                    //console.log(stok_brg);
                    // var stok = stok_brg;
                   
              sub_total= sub_total + subtotal_brg;

              $.ajax({
                 type  : "POST",
                 data  : "id_transaksi="+invoice+"&id_barang="+id_brg+"&jumlah_brg="+jumlah+"&sub_harga="+subtotal_brg,
                 url   : "pembelian_detail_transaksi.php",
                 success : function(result){
                         console.log(result);
                 } 
              });
              document.getElementById("jumlah_total").value=sub_total;
              var markup = "<tr id='"+rowid+"'' ><td>" + barang+ "</td><td>" + jumlah + "</td><td>"+ subtotal_brg +"</td><td><button type='button' class='delete-row btn btn-danger' data-sub='"+subtotal_brg+"' data-id_brg='"+id_brg+"' data-jumlah='"+jumlah+"' data-row ='"+rowid+"'>Delete Row</button></td></tr>";
              $("#tbl-trans tbody").append(markup);
              loadJumlah(sub_total);
              rowid = rowid+1;   
              document.getElementById("tombol_pesan").disabled = false;
          } 
                        
  });

        //fungsi hapus data di row
        $(document).on('click', '.delete-row', function (e) {
                var invoice = $("#no_invoice").val();
                r = $(this).attr('data-jumlah');
                t = $(this).attr('data-id_brg');
                s = $(this).attr('data-sub');
                datar = $(this).attr('data-row');
                sub_total=sub_total-s;
                $('#'+datar).remove();
                
                $.ajax({
                   type  : "GET",
                   data  : "id_transaksi="+invoice+"&kode_barang="+t+"&sub_harga="+s+"&jumlah="+r,
                   url   : "pembelian_delete_brg.php",
                   success : function(result){
                    console.log(result);
                   } 
                 });
             
                loadJumlah(sub_total);
                document.getElementById("btn-tambah-brg").disabled = true;
                document.getElementById("subtotal_brg").disabled = true;
                document.getElementById("jumlah").disabled = true;
            });
    </script>
   
  <?php  
    include '../footer.php';
   ?>