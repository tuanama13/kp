 <?php
    require "../init/db.php";
    include "user_login.php";
    $sql = mysqli_query($conn,'SELECT * FROM list_brg WHERE del = 0');

    print"<table id='lookup-brg' class='table table-striped table-bordered dt-responsive' cellspacing='0' width='100%'>
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
                            <tbody>";
    while ($row = mysqli_fetch_assoc($sql)) {
                                    //$id_brg=$row['id_brg'];
     
                            echo "<tr class='pilih-brg' data-kodebrg='".$row['nama_brg']."'  data-hargabrg='".$row['harga']."' data_brg='".$row['id_brg']."' data-stok_brg='".$row['stok']."'>
                                        <td>$row['stok']</td>
                                        <td><?php echo $row['nama_brg']; ?></td>
                                        <td><?php echo $row['type']; ?></td>
                                        <td><?php echo $row['spek']; ?></td>
                                        <td><?php echo $row['merk']; ?></td>
                                        <td><?php echo $row['harga']; ?></td>
                                    </tr>";
    
         }
            print"</tbody>
                        </table>  
                   ";
        
         ?>
                           