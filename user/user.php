<?php 
	include "../init/db.php";
 //  include "header.php";
  // include "sidebar.php";
    $year = date("Y");
    $month = date("m");

    // fungsi untuk menghasilkan id autonumber
        $sql = "SELECT max(id_transaksi) as maxid FROM detail_transaksi WHERE id_transaksi LIKE 'INV%'";
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
	$id_user=1;
	$tgl_transaksi = date("Y-m-d");

    $date = date_create(date('Y-m-d'));
    date_add($date, date_interval_create_from_date_string('30 days'));
    $tgl_tagihan = date_format($date, 'Y-m-d');

	// $sql_trans= "INSERT INTO detail_transaksi (id_transaksi,tgl_transaksi,id_toko,id_karyawan,grand_total,sisa_hutang,tgl_tagihan) VALUES (?,?,?,?,?,?,?)";
?>
<!DOCTYPE html>
<html>
<head>
	<title>user</title>
	       <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../plugins/DataTables1/datatables.min.css">
        <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="../plugins/DataTables1/datatables.min.js"></script>
        <style>
            body{
                margin: 15px;
            }
            .pilih:hover{
                cursor: pointer;
            }
        </style>
</head>
<body>
<section class="content">
  <div class="container-fluid">
	<!-- <form action="action" onsubmit="dummy(); return false"> -->
		<input type="text" name="nama_toko" id="nama_toko" placeholder="NamaToko">
		<button type="button" name="browse" data-toggle="modal" data-target="#myModal">....</button>
		<br>
		<input type="text" name="barang" id="barang" placeholder="Nama Barang">
		<button type="button" name="browse" data-toggle="modal" data-target="#myModal-brg">...</button>
		<br>
		<input type="number" name="harga" id="harga" placeholder="Rp. 000000xxx">
		<br>
		<input type="number" name="jumlah" id="jumlah" placeholder="Jumlah Barang">
		<br>
		<button class="add-row">Tambah Barang</button>
	<!-- </form> -->
	
	<!-- Modal Toko-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:800px">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Lookup Kode Toko</h4>
                    </div>
                    <div class="modal-body">
                        <table id="lookup-toko" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Kode Toko</th>
                                    <th>Nama Toko</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //Data mentah yang ditampilkan ke tabel    
                                // mysql_connect('localhost', 'root', '');
                                // mysql_select_db('harviacode');



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
            <div class="modal-dialog" style="width:800px">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Data Barang</h4>
                    </div>
                    
                    <div class="modal-body">
                        <table id="lookup-brg" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                	<th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                <?php
                                //Data mentah yang ditampilkan ke tabel    
                                // mysql_connect('localhost', 'root', '');
                                // mysql_select_db('harviacode');

                                $sql = mysqli_query($conn,'SELECT * FROM list_brg WHERE del = 0');
                                while ($row = mysqli_fetch_assoc($sql)) {
                                	//$id_brg=$row['id_brg'];
                                ?>
                                    <tr class="pilih-brg" data-kodebrg="<?php echo $row['nama_brg']; ?>"  data-hargabrg="<?php echo $row['harga']; ?>" data_brg="<?php echo $row['id_brg']; ?>" data-stok_brg="<?php echo $row['stok']; ?>">
                                        <td><?php echo $row['id_brg']; ?></td>
                                        <td><?php echo $row['nama_brg']; ?></td>
                                        <td><?php echo $row['harga']; ?></td>
                                        <td><?php echo $row['stok']; ?></td>
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
        <!-- End Modal Barang -->





	<table id="tbl-trans" border="2">
		<thead>
			<tr>
				<td>Nama</td>
				<td>Harga</td>
				<td>Jumlah</td>
				<td>Subtotal</td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
		<tfoot>
			<tr>
				<td colspan="4" >Jumlah</td>
				<td id="jumlah_total"></td>
			</tr>
		</tfoot>
	</table>

	<input type="number" id="jumlah_bayar" name="jumlah_bayar" placeholder="Jumlah Bayar Toko" required>
	<input type="number" name="sisa_bayar" id="sisa_bayar" readonly>
	<button type="button" id="tombol_pesan" onclick="pesan()">Pesan</button>
  </div>
</section>
	<!-- script modalnya -->
	 <script type="text/javascript">
    
	 	var id_brg ="";
	 	var id_toko ="";
	 	var sub_total=0;
	 	var sisa_hutang=0;
	 	var id_transaksi = "<?php echo $id_transaksi ?>";
    var stok_brg = "";

    // fungsi untuk menghapus barang pesanan dari tabel
          // function deleteRow(r,s,t){
            // $(".delete-row").click(function(){
            //     $(this).parents("tr").remove();
            
           //console.log(t);
           // console.log(r);
           //   console.log(s);
           //   console.log(t);
           // t = $(this).attr('data-id_brg');
           // r = $(this).attr('data-row');
           // s = $(this).attr('data-sub');
           // var kode_barang = $(this).attr('data_brg');
           // sub_total=sub_total-s;

           // $.ajax({
           //       type  : "GET",
           //       data  : "id_transaksi="+id_transaksi+"&kode_barang="+t+"&sub_harga="+s,
           //       url   : "user_delete.php",
           //       success : function(result){
           //       console.log(result);
           //       } 
           //     });
           //     var i = r.parentNode.rowIndex;
           //    document.getElementById("tbl-trans").deleteRow(i);
           //    $(this).parents(i).remove();
           // //console.log(i);
           // // console.log(s);
           // console.log(sub_total);
           // loadJumlah(sub_total);
          // }); 
          // tutup fungsi hapus pesanan
              // var r ="";
              // var s ="";
              // var t ="";
        // $(document).ready(function(){
          $(document).on('click', '.delete-row', function (r) {
              
              // var i = r.parentNode.parentNode.rowIndex;
              // document.getElementById("tbl-trans").deleteRow(i);
              t = $(this).attr('data-id_brg');
              s = $(this).attr('data-sub');
              sub_total=sub_total-s;
              $('#this').remove();
              //sub_total=sub_total-s;
              console.log(r);
              console.log(s);
              console.log(t);
              loadJumlah(sub_total);
              
          });

          // fungsi menambah pesanan dalam tabel
            $(".add-row").click(function(){
            
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
                 // console.log(result);
                } 
              });


             //fungsi refres data barang
             setInterval(function(){
                $(".modal-body").load("load_brg.php");
              },1000);

             // fungsi untuk menambah row tabel pesanan
            document.getElementById("jumlah_total").value=sub_total;
            var markup = "<tr id='this'><td>" + barang+ "</td><td>" + harga + "</td><td>" + jumlah + "</td><td>"+ sub +"</td><td><button type='button' class='delete-row' data-sub='"+sub+"' data-id_brg='"+id_brg+"'>Delete Row</button></td></tr>";
            $("#tbl-trans tbody").append(markup);
            loadJumlah(sub_total);
              // t = $(this).attr('data-id_brg');
              // r = $(this).attr('data-row');
              // s = $(this).attr('data-sub');
              // //sub_total=sub_total-s;
              // console.log(r);
              // console.log(s);
              // console.log(t);
            // console.log(id_brg);
          });
            // tutup menambah pesanan dalam tabel
        // });

			//jika dipilih, data toko akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("nama_toko").value = $(this).attr('data-kodetoko');
                id_toko = $(this).attr('data-idtoko');
                
                var tgl_transaksi = "<?php echo $tgl_transaksi ?>";
                var id_user = "<?php echo $id_user ?>";
                var tgl_tagihan = "<?php echo $tgl_tagihan ?>";

                $.ajax({
             		type	: "POST",
             		data 	: "id_transaksi="+id_transaksi+"&tgl_transaksi="+tgl_transaksi+"&id_toko="+id_toko+"&id_karyawan="+id_user+"&grand_total="+sub_total+"&sisa_hutang="+sisa_hutang+"&tgl_tagihan="+tgl_tagihan,
             		url		: "user_detail_transaksi.php",
             		success	: function(result){
             			// console.log(result);
             		} 
             	});
                // console.log(id_toko);
                $('#myModal').modal('hide');
            });
            // tutup fungsi input modal



            //jika dipilih, data barang akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilih-brg', function (e) {
            	  id_brg = $(this).attr('data_brg');
                stok_brg =  $(this).attr('data-stok_brg');
                // console.log(stok_brg);

            	//console.log(id_brg);
                document.getElementById("barang").value =$(this).attr('data-kodebrg');
                document.getElementById("harga").value= $(this).attr('data-hargabrg')

                $('#myModal-brg').modal('hide');
            });
           

            


        	// fungsi load jumlah total
        	function loadJumlah(r){
        		document.getElementById('jumlah_total').innerHTML = r;
            	console.log(sub_total);
        	}

        	// tutup fungsi jumlah total
        	 $(document).on('keyup', '#jumlah_bayar', function (e) {
        	 	var hitung = $('#jumlah_bayar').val();
        	 	sisa_hutang = sub_total- hitung;
        	 	$('#sisa_bayar').val(sisa_hutang);
        	 });

        	 // fungsi pesan barang
        	function pesan(){
        		sisa_hutang = $("[name='sisa_bayar']").val();
        		 $.ajax({
             		type	: "GET",
             		data 	: "id_transaksi="+id_transaksi+"&grand_total="+sub_total+"&sisa_hutang="+sisa_hutang,
             		url		: "simpan_transaksi.php",
             		success	: function(result){
             			console.log(result);
             		} 
             	});
        	}
        	// tutup fungsi pesan barang



        	

             // tabel lookup obat
          $(function () {
            $("#lookup-toko").dataTable();
            $("#lookup-brg").dataTable();
          });


            // function dummy() {
            //     var kode_obat = document.getElementById("nama_toko").value;
            //     alert('kode obat ' + kode_obat + ' berhasil tersimpan');
            // }
        // });
    </script>
<!-- </body>
</html> -->
<?php  
  include 'footer.php';
?>