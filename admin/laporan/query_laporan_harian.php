<?php 
	include '../../init/db.php';
  //include "../admin_login.php";
	$sql=""; 
	$tgl_laporan = isset( $_GET['tgl_laporan']) ?  $_GET['tgl_laporan'] : null;
	$tgl_laporan1 = isset( $_GET['tgl_laporan1']) ?  $_GET['tgl_laporan1'] : null;
	$tgl_laporan2 = isset( $_GET['tgl_laporan2']) ?  $_GET['tgl_laporan2'] : null;
	// print_r($_GET);
	if (!empty($tgl_laporan)) {
		$sql = mysqli_query($conn, "SELECT * FROM detail_transaksi WHERE tgl_transaksi ='$tgl_laporan' AND grand_total <> 0 ");
	}elseif(!empty($tgl_laporan1 && $tgl_laporan2)){
		$sql = mysqli_query($conn, "SELECT * FROM detail_transaksi WHERE tgl_transaksi BETWEEN '$tgl_laporan1' AND '$tgl_laporan2' AND grand_total <> 0 ");
	}
	
				
				print"
					<thead>
                        <tr>
                          <th>No. Invoice</th>
                          <th>Nama Toko</th>
                          <th>Nama Karyawan</th>
                          <th>Grand Total</th>
                          <th>Sisa Hutang</th>
                        </tr>
                      </thead>
                            <tbody>";
                                while ($row = mysqli_fetch_assoc($sql)) {
        
                                    print"<tr>
                                        <td>".$row['id_transaksi']."</td>
                                        <td>".$row['id_toko']."</td>
                                        <td>".$row['id_karyawan']."</td>
                                        <td>".$row['grand_total']."</td>
                                        <td>".$row['sisa_hutang']."</td>
                                    </tr>";
                                }
                                
                   print "  
                   			</tbody>";  
?>