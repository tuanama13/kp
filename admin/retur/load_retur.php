<?php 
	include '../../init/db.php';

  $no = 0;
  if (isset( $_GET )) {
      $id_transaksi = $_GET['id_transaksi'];
      $id_retur = $_GET['id_retur'];
    }else{
      header('Location: retur_brg.php');
    }
    $tgl_retur = date("Y-m-d"); 

    $sql2 = mysqli_query($conn, "SELECT * FROM detail_transaksi WHERE id_transaksi= '$id_transaksi'");
    $row2 = mysqli_fetch_assoc($sql2);
    $id_toko = $row2['id_toko'];
    $id_karyawan = $row2['id_karyawan'];
    $grand_total= 0;

    $sql3 = mysqli_query($conn, "INSERT INTO retur (id_retur,id_transaksi,tgl_retur,id_toko,id_karyawan,grand_total) VALUES ('$id_retur','$id_transaksi','$tgl_retur','$id_toko','$id_karyawan','$grand_total')");
    // $row3 = mysqli_fetch_assoc($sql2);


	// $sql=""; 
	// $tgl_laporan = isset( $_GET['tgl_laporan']) ?  $_GET['tgl_laporan'] : null;
	// $tgl_laporan1 = isset( $_GET['tgl_laporan1']) ?  $_GET['tgl_laporan1'] : null;
	// $tgl_laporan2 = isset( $_GET['tgl_laporan2']) ?  $_GET['tgl_laporan2'] : null;
	// print_r($_GET);
		$sql = mysqli_query($conn, "SELECT * FROM tran INNER JOIN list_brg USING (id_brg) WHERE id_transaksi= '$id_transaksi'");
				
				print"
					<thead>
                        <tr>
                          <th>ID Barang</th>
                          <th>Nama Barang</th>
                          <th>Harga</th>
                          <th>Jumlah</th>
                          <th>Sub Total</th>
                        </tr>
                      </thead>
                            <tbody>";
                                while ($row = mysqli_fetch_assoc($sql)) {
        
                                    print"<tr id='".$no."'>
                                        <td id='id_brg".$no."'>".$row['id_brg']."</td>
                                        <td>".$row['nama_brg']."</td>
                                        <td id='harga".$no."'>".$row['harga']."</td>
                                        <td><input type='text' class='form-control' name='jumlah_brg".$no."' id='jumlah_brg".$no."' value='".$row['jumlah_brg']."' onkeyup='loadSub(".$no."), loadTotal()'></td>
                                        <td id='sub_total".$no."' class='sub_total'>".$row['sub_total']."</td>
                                        <td><button type='button' class='delete-row btn btn-danger' data_id-retur='".$id_retur."' data_id-brg='".$row['id_brg']."' data_jumlah-brg='".$row['jumlah_brg']."' data_row = '".$no."'>Delete</button></td>
                                    </tr>";
                                    $no++;

                                     $sql4 = mysqli_query($conn, "INSERT INTO detail_retur (id_retur,id_brg,harga,jumlah,sub_total) VALUES ('$id_retur','$row[id_brg]','$row[harga]','$row[jumlah_brg]','$row[sub_total]')");
                                }
                                
                   print "  
                   			</tbody> 
                        <tfoot>
                          <tr>
                            <td colspan='4' ><b>Jumlah</b></td>
                            <td id='jumlah_total' style='background-color:#00c0ef; color: white;' onload='loadTotal()'>$row2[grand_total]</td>
                          </tr>
                        </tfoot>";


?>