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
                                //Data mentah yang ditampilkan ke tabel    
                                // mysql_connect('localhost', 'root', '');
                                // mysql_select_db('harviacode');

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