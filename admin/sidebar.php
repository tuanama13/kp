<?php  
  session_start();
  $id = $_SESSION['id_karyawan'];
  include $_SERVER["DOCUMENT_ROOT"]."/init/db.php";
  $sql = mysqli_query($conn, "SELECT * FROM karyawan WHERE id_karyawan = '$id'"); 
  $result = mysqli_fetch_assoc($sql);
?>
  <!-- Main Header -->

  <header class="main-header">

    <!-- Logo -->
    <a href="../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>P</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b> Penjualan</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="../dist/img/user2-160x160.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <?php 
                 echo "<span class='hidden-xs'>".$result[nama]."</span>";
              ?>
              <!-- <span class="hidden-xs">Alexander Pierce</span> -->
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="../dist/img/user2-160x160.png" class="img-circle" alt="User Image">

                <p>
                  <?php  
                    echo "".$result[nama]." - ".$result[jabatan];
                  ?>
                   <small>Member since <?php echo $result[tgl_masuk]?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div> -->
                <!-- /.row -->
              <!-- </li> -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <!-- <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div> -->
                <div class="pull-right">
                  <a href="../log_out.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/user2-160x160.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <h4>Toko Karunia Jaya</h4>
          <!-- Status -->
         <!--  <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>
      </div>

      <!-- search form (Optional) -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class=""><a href="../index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <!-- <li><a href="../pembelian/pembelian.php"><i class="fa fa-tags"></i> <span>Pembelian</span></a></li> -->
        <li><a href="../invoice/transaksi.php"><i class="fa fa-tags"></i> <span>Cetak Faktur</span></a></li>
        <li><a href="../penagihan/penagihan.php"><i class="fa fa-history"></i> <span>Penagihan</span></a></li>
        <!-- <li><a href="barang.php"><i class="fa fa-tags"></i> <span>Barang</span></a></li> -->
        <li class="treeview">
          <a href="#"><i class="fa fa-users"></i> <span>  Karyawan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../karyawan/new_karyawan.php" > <i class="fa fa-plus"></i>Tambah Karyawan</a></li>
            <li><a href="../karyawan/list_karyawan.php"><i class="fa fa-list"></i>  List Karyawan</a></li>
          </ul>
        </li>

        <!-- <li class="treeview">
          <a href="#"><i class="fa fa-file-o"></i> <span>  Retur Barang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../retur/retur_brg.php" > <i class="fa fa-plus"></i>Retur Barang</a></li>
            <li><a href="../retur/list_retur.php"><i class="fa fa-list"></i>  List Retur Barang</a></li>
          </ul>
        </li> -->

        <li class="treeview">
          <a href="#"><i class="fa fa-dropbox"></i> <span>  Barang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../barang/barang.php" > <i class="fa fa-plus"></i>Tambah Barang</a></li>
            <li><a href="../barang/list_barang.php"><i class="fa fa-list"></i>  List Barang</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-building"></i> <span>  Toko</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../toko/insert_toko.php" > <i class="fa fa-plus"></i>Tambah Toko</a></li>
            <li><a href="../toko/list_toko.php"><i class="fa fa-list"></i>  List Toko</a></li>
          </ul>
        </li>

         <li class="treeview">
          <a href="#"><i class="fa fa-industry"></i> <span> Supplier</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../suplier/new_suplier.php" > <i class="fa fa-plus"></i>Tambah Supplier</a></li>
            <li><a href="../suplier/list_supplier.php"><i class="fa fa-list"></i>List Supplier</a></li>
          </ul>
        </li>

         <li class="treeview">
          <a href="#"><i class="fa fa-cart-plus"></i> <span> Pembelian</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../pembelian/pembelian.php" > <i class="fa fa-plus"></i>Tambah Pembelian</a></li>
            <!-- <li><a href="../pembelian/list_pembelian.php"><i class="fa fa-list"></i>List Pembelian</a></li> -->
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-user"></i> <span> User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../karyawan/new_user.php" > <i class="fa fa-plus"></i>Tambah User</a></li>
            <li><a href="../karyawan/list_user.php"><i class="fa fa-list"></i>List User</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-file-text"></i> <span> Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../laporan/laporan_tahun.php" > <i class="fa fa-file-o"></i>Laporan Penjualan</a></li>
            <li><a href="../laporan/laporan_pembelian.php" > <i class="fa fa-file-o"></i>Laporan Pembelian</a></li>
            <!-- <li><a href="#"><i class="fa fa-list"></i>Laporan Rektur</a></li> -->
            <li><a href="../laporan/laporan_barang_kosong.php"><i class="fa fa-file-o   "></i>Laporan Barang Kosong</a></li>
          </ul>
        </li>

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>