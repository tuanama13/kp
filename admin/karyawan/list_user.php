<?php  
	//fungsi already header(menangkal warnings)
  ob_start();

 include '../../init/db.php';
 include "../admin_login.php";
 include '../header.php';
 include '../sidebar.php';
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1>
        User Access
        <small>Form User Access</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">User Access</li>
        <li class="active">List User</li>
      </ol>
    </section>
	<section class="content">
	     <!-- Main content -->
	      <div class="row">
	        <div class="col-md-12">
	          <div class="box box-info">
	            <div class="box-header">
	              <h3 class="box-title">List User Access
	                <small>Semua User Access yang Terdaftar</small>
	              </h3>
                <a href="new_user.php" class="btn btn-success pull-right"><span class="fa fa-plus">  Tambah User</span></a>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body pad">
	             <table id="example" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                <thead>
                    <tr>
                    	<th>Nama Karyawan</th>
                        <th>Username</th>
                        
                        <th>Level</th>
                        <th>1</th>
                        <th>2</th>
                      <!-- <th colspan="2" style="text-align: center">Action</th> -->
                    </tr>
                </thead>
                <tbody>
                  
                  <?php
                    		// $sql2 = "SELECT nama FROM karyawan WHERE id_karyawan=";
		                    // $run_sql2 = mysqli_query($conn,$sql2);
		                    // $rows2 = mysqli_fetch_assoc($run_sql2)

                    $sql = "SELECT * FROM user INNER JOIN karyawan USING(id_karyawan)";
                    $run_sql = mysqli_query($conn,$sql);
                   //$rows = mysqli_fetch_assoc($run_sql);
                    while($rows = mysqli_fetch_assoc($run_sql)){
                      //     $sql2 = "SELECT nama FROM karyawan WHERE id_karyawan=$rows[id_karyawan]";
		                    // $run_sql2 = mysqli_query($conn,$sql2);
		                    // $rows2 = mysqli_fetch_assoc($run_sql2);
                        echo "
                            <tr>
                              <td>$rows[nama]</td>
                              <td>$rows[username]</td>
                              
                              <td>$rows[level]</td>                          
                              <td><a href='update_user.php?id=$rows[id_karyawan]' class='btn btn-info'><span class='fa fa-pencil'></span></a></td>
                              <td><a href='delete_user.php?id=$rows[id_karyawan]' class='btn btn-danger'><span class='fa fa-times'></span></a></td>
                            </tr>
                        ";
                      }
                    ?>
                  </tbody>
                </table>
	            </div>
	          </div>
	          <!-- /.box -->
	       </div>
       </div>
	</section>
</div> 

<script>
     $(document).ready(function() {
        $('#example').DataTable();
      } );
     $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
      });
</script>
   
<?php  
    include '../footer.php';
?>