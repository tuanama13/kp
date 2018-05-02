<?php 
  session_start();
  ob_start();
  include "../init/db.php";
  // include "admin_login.php";


  //cek apakah user sudah login
  if(!isset($_SESSION['username'])){
      // die("Anda belum login");
    header("Location:../login.php");
  }

  //cek level user
  if($_SESSION['level']!="3"){
      //die("Anda bukan Admin");
      header("Location:../login.php");
  }
  include "header.php"; 
  include "sidebar_p.php";
  // include_once dirname(dirname(__FILE__)) . '/cloud/files/formSubmit.php';
   $date = date("Y-m-d");
   $month = date("m");
    // $month = date;
?>
<!-- <!DOCTYPE html> -->
  <base href="admin/">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard Admin
        <!-- <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard active"></i> Dashboard</a></li>
        <!-- <li class="active">Here</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
      <div class="container-fluid">
          <!-- Widget Small box -->
          <div class="row">
            <div class="col-lg-4 col-xs-12">
              <div class="small-box bg-aqua">
                <div class="inner">
                  <?php  
                     $sql2 = "SELECT SUM(grand_total) AS Pendapatan FROM transaksi WHERE tgl_transaksi = '$date' AND grand_total <> 0";
                    // nilai 0 = delete no
                      $run_sql2 = mysqli_query($conn,$sql2); 
                      $rows2 = mysqli_fetch_assoc($run_sql2);

                  ?>
                  <h3><?php echo "Rp. ".number_format($rows2['Pendapatan'],0,".",".") ?></h3>
                  <p>Pendapatan Hari Ini</p>
                </div>
                <div class="icon">
                  <i class="fa fa-shopping-cart"></i>
                </div>
                <a href="../laporan/laporan_tahun.php" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
                </a>

              </div>
            </div>

            <div class="col-lg-4 col-xs-12">
              <div class="small-box bg-yellow">
                <div class="inner">
                  <?php  
                     $SQL_month = "SELECT SUM(grand_total) AS Pendapatan_Bulanan FROM transaksi WHERE MONTH(tgl_transaksi) = '$month' AND grand_total <> 0";
                    // nilai 0 = delete no
                      $run_sqlmonth = mysqli_query($conn,$SQL_month); 
                      $rowsmonth = mysqli_fetch_assoc($run_sqlmonth);

                  ?>
                  <h3><?php echo "Rp. ".number_format($rowsmonth['Pendapatan_Bulanan'],0,".",".") ?></h3>
                  <p>Pendapatan Bulan Ini</p>
                </div>
                <div class="icon">
                  <i class="fa fa-shopping-cart"></i>
                </div>
                <a href="../laporan/laporan_tahun.php" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>

              </div>
            </div>
          
            <div class="col-lg-4 col-xs-12">
              <div class="small-box bg-red">
                <div class="inner">
                  <?php  
                     $SQL_Hutang = "SELECT SUM(sisa_hutang) AS Hutang_Bulan_Ini FROM transaksi WHERE MONTH(tgl_tagihan) = '$month' AND sisa_hutang <> 0 AND grand_total <> 0";
                    // nilai 0 = delete no
                      $run_sqlHutang = mysqli_query($conn,$SQL_Hutang); 
                      $rowsHutang = mysqli_fetch_assoc($run_sqlHutang);

                  ?>
                  <h3><?php echo "Rp. ".number_format($rowsHutang['Hutang_Bulan_Ini'],0,".",".") ?></h3>
                  <p>Tagihan Bulan Ini</p>
                </div>
                <div class="icon">
                  <i class="fa fa-shopping-cart"></i>
                </div>
                <a href="../laporan/laporan_tahun.php" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>

              </div>
            </div>
          </div>

      <div class="row">
        <div class="col-lg-6 col-xs-12">
          <div class="box">
          <div class="box-header">
            <div class="box-title">Transaksi Hari ini</div>
            <div class="box-title pull-right">Tgl : <?php echo date("d/m/Y") ?></div>
          </div>
          <div class="box-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID Faktur</th>
                  <th>Nama Toko</th>
                  <th>Nama Karyawan</th>
                  <th>Grand Total</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php  
               
                  $sql = "SELECT * FROM transaksi INNER JOIN toko USING(id_toko) WHERE tgl_transaksi = '$date' AND grand_total <> 0 LIMIT 5";
                    // nilai 0 = delete no
                      $run_sql = mysqli_query($conn,$sql); 
                      while($rows = mysqli_fetch_assoc($run_sql)){
                          // $id = $rows['id_brg'];
                        echo "

                            <tr>
                              <td>$rows[id_transaksi]</td>
                              <td>$rows[nama_toko]</td>
                              <td>$rows[username]</td>
                              <td>$rows[grand_total]</td>";
                              if ($rows['status'] == "ordered") {
                                echo "<td><span class='label label-warning'>$rows[status]</span></td>";
                              }else{
                                echo "<td><span class='label label-success'>$rows[status]</span></td>";
                              }
                            echo "</tr>";
                        
                      }
                ?>
                <tr></tr>
              </tbody>
            </table>
          </div>
          <div class="box-footer">
            <a href="../laporan/laporan_tahun.php">More Info</a>
          </div>
        </div>
        </div>
        <div class="col-lg-6 col-xs-12">
          <div class="box">
          <div class="box-header">
            <div class="box-title">Barang Hampir Kosong</div>
          </div>
          <div class="box-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID Barang</th>
                  <th>Nama Barang</th>
                  <th>Tipe</th>
                  <th>Spesifikasi</th>
                  <th>Merk</th>
                  <th>Stok</th>
                </tr>
              </thead>
              <tbody>
                <?php  
                  $sql = "SELECT * FROM list_brg WHERE stok <= 5 AND del =0 ORDER BY stok ASC LIMIT 5";
                  $run_sql = mysqli_query($conn,$sql); 
                  while($rows = mysqli_fetch_assoc($run_sql)){
                    echo "
                                <tr>
                                  <td>$rows[id_brg]</td>
                                  <td>$rows[nama_brg]</td>
                                  <td>$rows[type]</td>
                                  <td>$rows[spek]</td> 
                                  <td>$rows[merk]</td>";
                                  if ($rows['stok'] <= 5) {
                                    echo "<td><span class='label label-danger'>$rows[stok]</span></td>";
                                  }
                                echo "</tr>";
                    }
                ?>
              </tbody>
            </table>
          </div>
          <div class="box-footer">
             <a href="../laporan/laporan_barang_kosong.php">More Info</a>
          </div>
        </div>
        </div>
      </div> 
      <!-- Default box -->
     <!--  <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div> -->
         <!-- /box-body -->
        <!-- <div class="box-footer">
          Footer
        </div> -->
        <!-- /.box-footer-->
      <!-- </div> -->
      <!-- /.box -->
      

      <!-- Default box -->
      <!-- <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body"> -->
          <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
        <!-- </div> -->
        <!-- /.box-body -->
        <!-- <div class="box-footer">
          Footer
        </div> -->
        <!-- /.box-footer-->
      <!-- </div> -->
      <!-- /.box -->


      <!-- Default box -->
      <!-- <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body"> -->
          <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
        <!-- </div> -->
        <!-- /.box-body -->
      <!--   <div class="box-footer">
          Footer
        </div> -->
        <!-- /.box-footer-->
      <!-- </div> -->
      <!-- /.box -->
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <?php  
    include 'footer.php';
   ?>
<!-- ./wrapper -->
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
