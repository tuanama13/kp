<?php 
    session_start();
    include "../init/db.php";
    include "user_login.php";
    include "header.php";
    include "sidebar.php";
    date_default_timezone_set('Asia/Jakarta');
    $year = date("Y");
    $month = date("m");
    $namaToko="";
    $alamatToko="";

    // fungsi untuk menghasilkan id autonumber
        $sql = "SELECT max(id_transaksi) as maxid FROM transaksi WHERE id_transaksi LIKE 'INV%'";
        $row = mysqli_fetch_assoc(mysqli_query($conn,$sql));
        $idmax=$row['maxid'];
      $row = mysqli_num_rows(mysqli_query($conn,$sql));
        if ($row<=0) {
            $id_transaksi="INV".$year."".$month."0000001";
        }else{
             $nourut = (int) substr($idmax, 9,7);
             $nourut++;
             $id_transaksi = "INV".$year."".$month."".sprintf("%07s", $nourut);
        }
        // tutup fungsi autonumber




	// $id_transaksi=rand();
	$id_user=$_SESSION['username'];
	$tgl_transaksi = date("Y-m-d");

    $date = date_create(date('Y-m-d'));
    date_add($date, date_interval_create_from_date_string('30 days'));
    $tgl_tagihan = date_format($date, 'Y-m-d');

	
?>

<section class="content">
  <div class="container-fluid">
    <section class="content">

       <!-- Main content -->
        <div class="row">
          <div class="col-md-12">
            <div class="box box-info">
              <div class="box-header">
                <h1 class="box-title">Pesan Barang
                  <small>Pesanan Barang Dapat Dilakukan Disini</small>
                </h1>
              </div>
	
                    <!-- input pilih toko -->
                    <div class="form-group col-md-offset-2 col-md-6">
                      <!-- <label for="nama_toko">Nama Toko</label> -->
                        <div class="input-group-btn ">
                          <input type="text" class="form-control col-md-6" name="nama_toko" id="nama_toko" placeholder="Pilih Nama Toko" readonly>
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" id="pilih-toko">Pilih</button>
                        </div>
                        <div class="checkbox" style="margin-left: 20px; margin-bottom: -20px;">
                          <input type="checkbox" name="alamat_beda" id="alamat_beda">Alamat Beda  
                        </div>
                    </div>
                    
                    <div id="alamatnya" class="form-group col-md-offset-2 col-md-6" style="margin-bottom: 5px">
                    </div>
                    
                    <!-- input barang -->
                    <div class="form-group col-md-offset-2 col-md-6" style="margin-top:">
                      <!-- <label for="nama_toko">Nama Barang</label> -->
                        <div class="input-group-btn ">
                          <input type="text" class="form-control col-md-6" name="barang" id="barang" placeholder="Nama Barang" readonly>
                          <button type="button" class="btn btn-success" name="browse" id="btn-pilih-brg" data-toggle="modal" data-target="#myModal-brg">Pilih</button>
                        </div>
                    </div>
                    
                    <!-- input barang -->
                    <div class="form-group col-md-offset-2 col-md-6">
                      <input type="number" class="form-control" name="harga" id="harga" placeholder="Rp. xxx.xxx" readonly>
                    </div>

                    <div class="form-group col-md-offset-2 col-md-4">
                      <input type="number" class="form-control" name="jumlah" id="jumlah" onchange="cekStok()" placeholder="Jumlah Barang">
                    </div>

                    <!-- <hr> -->
                    <div class="box-footer col-md-offset-2 col-md-6">
                      <button class="btn btn-primary add-row" id="add-row" >Tambah Barang</button>
                    </div>

		
	
	<!-- Modal Toko-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Data Toko</h4>
                    </div>
                    <div class="modal-body">
                        <table id="lookup-toko" class="table table-bordered table-hover table-striped dt-responsive">
                            <thead>
                                <tr>
                                    <th>Kode Toko</th>
                                    <th>Nama Toko</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                
                                $sql = mysqli_query($conn,'SELECT * FROM toko WHERE del=0');
                                while ($row = mysqli_fetch_assoc($sql)) {
                                	$id=$row['id_toko'];
                                ?>
                                    <tr class="pilih" data-kodetoko="<?php echo $row['nama_toko']; ?>" data-idtoko="<?php echo $row['id_toko']; ?>">
                                        <td><?php echo $row['id_toko']; ?></td>
                                        <td><?php echo $row['nama_toko']; ?></td>
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

        <!-- Modal Barang-->
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
                               // mysqli_close($conn);
                                ?>
                              
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Barang -->


          <div class="form-group col-md-offset-2 col-md-8">
            <h3>Tabel Pesanan Barang</h3>
            <p>Barang yang dipesan akan muncul pada tabel ini</p>
            <br>
            <div class="table-responsive"> 
            	<table class="table" id="tbl-trans">
            		<thead>
            			<tr>
            				<th>Nama</th>
            				<th>Harga</th>
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
            <div class=" col-md-6 col-xs-12" style="margin-bottom:10px">
              <input type="number" class="form-control" id="jumlah_bayar" name="jumlah_bayar" placeholder="Jumlah Bayar Toko" required>  
            </div>
            <div class=" col-md-4 col-xs-12" style="margin-bottom:10px">
              <input type="number" class="form-control" name="sisa_bayar" id="sisa_bayar" readonly>
            </div>  
            <div class="col-md-2 col-xs-12" style="margin-bottom:10px">          
              <button type="button" class="btn btn-success" id="tombol_pesan" onclick="pesan()" style="width: 100px">Pesan</button>
            </div>
          </div>
  </div>
</div>
</section>
</div>
</section>

	
	 <script>
        //$(document).ready(function(){
          var rowid =0;
	 	var id_brg ="";
	 	var id_toko ="";
	 	var sub_total=0;
	 	var sisa_hutang=0;
	 	var id_transaksi = "<?php echo $id_transaksi ?>";
        var stok_brg = 0;
    // $(document).ready(function() {
        $("#lookup-toko").DataTable();
        $("#lookup-brg").DataTable();
        // $("#lookup-brg1").DataTable();
        $(document).ready(function() {
          loadAwal(true);
        });


			//jika dipilih, data toko akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("nama_toko").value = $(this).attr('data-kodetoko');
                id_toko = $(this).attr('data-idtoko');
                
                var tgl_transaksi = "<?php echo $tgl_transaksi ?>";
                var id_user = "<?php echo $id_user ?>";
                var tgl_tagihan = "<?php echo $tgl_tagihan ?>";
                var namaToko = "<?php echo $namaToko ?>";
                var alamatToko = "<?php echo $alamatToko ?>";
                $.ajax({
             		type	: "POST",
             		data 	: "id_transaksi="+id_transaksi+"&tgl_transaksi="+tgl_transaksi+"&id_toko="+id_toko+"&id_karyawan="+id_user+"&grand_total="+sub_total+"&sisa_hutang="+sisa_hutang+"&tgl_tagihan="+tgl_tagihan+"&nama_toko"+namaToko+"&alamat_toko"+alamatToko,
             		url		: "user_detail_transaksi.php",
             		success	: function(result){
             			console.log(result);
             		} 
             	});
                // console.log(id_toko);
                $('#myModal').modal('hide');
                // loadAwal(false);
                document.getElementById("pilih-toko").disabled = true;
                document.getElementById("nama_toko").disabled = true;
                document.getElementById("btn-pilih-brg").disabled = false;
                document.getElementById("alamat_beda").disabled = false;
                // document.getElementById("jumlah").disabled = true;
            });
            // tutup fungsi input modal

            //jika dipilih, data barang akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilih-brg', function (e) {
            	  id_brg = $(this).attr('data_brg');
                stok_brg =  $(this).attr('data-stok_brg');
                // console.log(stok_brg);
                if (stok_brg < 1) {
                	 swal("Barang Yang dipilih Kosong");
                }else{
                	//console.log(id_brg);
	                document.getElementById("barang").value =$(this).attr('data-kodebrg');
	                document.getElementById("harga").value= $(this).attr('data-hargabrg');
	                document.getElementById("jumlah").value = 1;
	                $('#myModal-brg').modal('hide');
	                // $("#lookup-brg1").DataTable();
	                loadAwal(false);
                }
            	
            });
           

            function cekStok(){
                var a = $('#jumlah').val();
                if ( a > stok_brg) {
                    swal("Jumlah Barang Pesanan Melebihi Stok");
                    document.getElementById('add-row').disabled=true;
                }else{
                    document.getElementById('add-row').disabled=false;
                }
            }
            // fungsi menambah pesanan dalam tabel
            $(".add-row").click(function(){
            
              // var a = $('#subtotal_brg').val();
              var a = $('#jumlah').val();
              if (a == '' || a ==0) {
                 swal("Jumlah Barang Tidak Boleh Kosong");
              // }else if(cekStok()) {
                //swal("Jumlah Barang Tidak Boleh Kosong");
              }else{
                //$("#lookup-brg tbody").load("load_brg.php");
                var barang = $("#barang").val();
                var harga = $("#harga").val();
                var jumlah = $("#jumlah").val();
                //console.log(stok_brg);
                // var stok = stok_brg;
                var sub = harga*jumlah;
                sub_total= sub_total+sub;

                 $.ajax({
                    type  : "POST",
                    data  : "id_transaksi="+id_transaksi+"&id_barang="+id_brg+"&harga_brg="+harga+"&jumlah_brg="+jumlah+"&sub_harga="+sub+"&stok_brg="+stok_brg,
                    url   : "user_transaksi.php",
                    success : function(result){
                     console.log(result);
                    } 
                  });

                 
                 // fungsi untuk menambah row tabel pesanan
                document.getElementById("jumlah_total").value=sub_total;
                var markup = "<tr id='"+rowid+"'' ><td>" + barang+ "</td><td>" + harga + "</td><td>" + jumlah + "</td><td>"+ sub +"</td><td><button type='button' class='delete-row btn btn-danger' data-sub='"+sub+"' data-id_brg='"+id_brg+"' data-jumlah='"+jumlah+"' data-row ='"+rowid+"'>Delete Row</button></td></tr>";
                $("#tbl-trans tbody").append(markup);
                loadJumlah(sub_total);
                rowid = rowid+1; 
                document.getElementById("add-row").disabled = true;
                document.getElementById("jumlah").disabled = true;
              }

        	});
            // tutup menambah pesanan dalam tabel

            $(document).on('click', '.delete-row', function (e) {
              
              r = $(this).attr('data-jumlah');
              t = $(this).attr('data-id_brg');
              s = $(this).attr('data-sub');
              datar = $(this).attr('data-row');
              sub_total=sub_total-s;
              $('#'+datar).remove();
              
              $.ajax({
                 type  : "GET",
                 data  : "id_transaksi="+id_transaksi+"&kode_barang="+t+"&sub_harga="+s+"&jumlah="+r,
                 url   : "user_delete.php",
                 success : function(result){
                  console.log(result);
                 } 
               });
           
              loadJumlah(sub_total);
          });
          
          // fungsi disable load awal page
          function loadAwal(a) {
              document.getElementById("btn-pilih-brg").disabled = a;
              document.getElementById("tombol_pesan").disabled = a;
              document.getElementById("jumlah").disabled = a;
              document.getElementById("add-row").disabled = a;
              document.getElementById("alamat_beda").disabled = a;
              document.getElementById("jumlah_bayar").disabled = a;
              // document.getElementById("").disabled = true;
          }



        	// fungsi load jumlah total
        	function loadJumlah(r){
             $("#barang").val("");
            $("#harga").val("");
            $("#jumlah").val("");
        		document.getElementById('jumlah_total').innerHTML = r;
            	console.log(sub_total);
        	}
        	
        	 $(document).on('keyup', '#jumlah_bayar', function (e) {
        	 	var hitung = $('#jumlah_bayar').val();
        	 	sisa_hutang = sub_total- hitung;
        	 	$('#sisa_bayar').val(sisa_hutang);
        	 });

        	 // fungsi pesan barang
        	function pesan(){
            var a = $('#jumlah_bayar').val();
        		if (a == '' || a === undefined) {
                swal("Jumlah Bayar Masih Kosong");
            }else if(a > sub_total) {
                swal("Jumlah Bayar Melebihi Harga Yang Harus Dibayarkan");
                $('#jumlah_bayar').val(0);
                $('#sisa_bayar').val(sub_total);
            }else if (sub_total == 0 || a === undefined){
                swal("Data Barang Pesanan Tidak ada Silahkan Pilih Barang Pesanan Anda");
            }else{
              sisa_hutang = $("[name='sisa_bayar']").val();
              var namaToko = $("#nama-toko").val();
              var alamatToko = $("#alamat-toko").val();
              if (namaToko === undefined) {
                  namaToko = "";
              }
              if (alamatToko === undefined) {
                  alamatToko = "";
              }
               $.ajax({
                  type  : "GET",
                  data  : "id_transaksi="+id_transaksi+"&grand_total="+sub_total+"&sisa_hutang="+sisa_hutang+"&nama_toko="+namaToko+"&alamat_toko="+alamatToko,
                  url   : "simpan_transaksi.php",
                  success : function(result){
                    window.location="index.php"
                    // console.log(result);
                  } 
                });
            }
        	}
          
          $(document).on('change', '#alamat_beda', function (e) {
            if ($(this).is(':checked')) {
              var x = document.createElement("TEXTAREA");
              var y = document.createElement("INPUT");
              y.setAttribute("id", "nama-toko");
              y.setAttribute("class", "form-control");
              y.setAttribute("style", "margin-bottom:10px");
              y.setAttribute("placeholder", "Nama Toko");
              x.setAttribute("id", "alamat-toko");
              x.setAttribute("class", "form-control");
              x.setAttribute("placeholder", "Alamat Pengiriman");
              $("#alamatnya").append(y);
              $("#alamatnya").append(x);
          }else{
            $('#nama-toko').remove();
            $('#alamat-toko').remove();
          }
          });
        </script>
<!-- </body>
</html> -->
<?php  
  include 'footer.php';
?>