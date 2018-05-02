<?php  
  //session_start();
 
  // session_status();
  // print_r($_SESSION) ;
  $id = $_SESSION['id_karyawan'];
  // echo $id;
  $sql = mysqli_query($conn, "SELECT * FROM karyawan WHERE id_karyawan = '$id'"); 
  $result = mysqli_fetch_assoc($sql);
  //include '../init/db.php';
?>

<body class="skin-blue sidebar-mini">
  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Karunia Jaya</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <!-- <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a> -->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications Menu -->
          <!-- Tasks Menu -->
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
              <li class="user-body">
                <div class="row">
                 <!--  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div> -->
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <!-- <a href="#" class="btn btn-default btn-flat">Profile</a> -->
                </div>
                <div class="pull-right">
                  <a href="log_out.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
