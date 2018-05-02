<?php 
	//fungsi already header(menangkal warnings)
	ob_start();

	include '../../init/db.php';
	include "../admin_login.php";
  include '../header.php';
  include '../sidebar.php'; 

  	if (isset($_POST['submit'])) {
  		$username = $_POST['username'];
  		$password = $_POST['password'];
  		$level = $_POST['level'];
  		$id_karyawan = $_POST['id_karyawan'];

  		$insert = "INSERT INTO user(id_karyawan,username,password,level,del) VALUES ('$id_karyawan','$username','$password','$level',0)";

		if (mysqli_query($conn,$insert)) {
				 header('Location: list_user.php');
			}else{
				echo '<div class="alert alert-danger" style="text-align:center"><h4>Query bermasalah</h4></div>';
			}
  		
  	}
		
	// 	$nama = $_POST['nm_karyawan'];
	// 	$tgl = $_POST['tgl_lahir'];
	// 	$alamat = $_POST['alamat'];
	// 	$no_telepon = $_POST['no_telepon'];
	// 	$jabatan = $_POST['jabatan'];
	// 	$del = 1;

	// 	$insert = "INSERT INTO karyawan(id_karyawan,nama,alamat,no_telp,tgl_lahir,jabatan,del) VALUES ('$id','$nama','$alamat','$no_telepon','$tgl','$jabatan','$del')";

	// 	if (mysqli_query($conn,$insert)) {
	// 			header('Location: list_karyawan.php');
	// 		}else{
	// 			echo '<div class="alert alert-danger" style="text-align:center"><h4>Query bermasalah</h4></div>';
	// 		}
	// }
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
        <li class="active">New User</li>
      </ol>
    </section>

	<section class="content">
	     <!-- Main content -->
	      <div class="row">
	        <div class="col-md-8">
	          <div class="box box-info">
	            <div class="box-header">
	              <h3 class="box-title">Tambah User
	                <small>Form Untuk Menambah User Access</small>
	              </h3>
	              <!-- tools box -->
	              <!-- <div class="pull-right box-tools">
	                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
	                  <i class="fa fa-minus"></i></button>
	                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
	                  <i class="fa fa-times"></i></button>
	              </div> -->
	              <!-- /. tools -->
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body pad">
	              <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	              	<input type="text" name="id_karyawan"  hidden>
					<div class="form-group col-md-7">
						<label for="nama">Nama Karyawan</label>
							<div class="input-group-btn ">
								<input type="text" name="nama" class="form-control col-md-10" placeholder="Pilih Nama Karyawan" readonly>
                  			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Pilih</button>
                  			
               			</div>
					</div>

					<div class="form-group col-md-7">
                  		<label for="jabatan">Jabatan</label>
                  		<input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan Karyawan" readonly>
                	</div>

                	<div class="form-group col-md-7">
                  		<label for="username">Username</label>
                  		<input type="text" class="form-control" name="username" placeholder="Masukan Username" required>
                  		<!-- <textarea class="form-control" rows="5" name="alamat" id="alamat" placeholder="Alamat Karyawan"></textarea> -->
                	</div>
                	<div class="form-group col-md-7">
                  		<label for="password">Password</label>
                  		<input type="password" class="form-control" name="password" id="password" placeholder="Masukan Password" required>
                	</div>
                	<div class="form-group col-md-7">
                  		<label for="password2">Ulangi Password</label>
                  		<input type="password" class="form-control" id="password2" name="password2" placeholder="Ulangi Password" onkeyup="checkPass(); return false;" required>
                  		<div id="alert-password"><span id="confirmMessage" class="confirmMessage"></span></div>
                	</div>

                  <div class="form-group col-md-7" style="margin-left: 5px">
                    <label for="level">Pilih Level Akses</label>
                    <select class="form-control" name="level">
                      <option value="1">Level 1</option>
                      <option value="2">Level 2</option>
                      <option value="3">Level 3</option>
                    </select>
                  </div>
                  <div class="form-group col-md-4" style=" font-size: 15px; border-style: solid; border-width: 2px; border-color: black; padding: 5px; color:#F03434; ">
                    Note : <br>
                    Level 1 = Full Access | Admin <br>
                    Level 2 = Marketing <br>
                    Level 3 = Pimpinan <br>
                  </div>

                	<!-- <div id="alert">asss</div> -->
                		      
	                <div class="box-footer col-md-7">
               			<button type="submit" id="simpan" class="btn btn-primary" name="submit" >Submit</button>
              	    </div>
	              </form>
	            </div>
	          </div>
	          <!-- /.box -->
	         </div>
	</section>

	<!-- Modal Karyawan-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Data Karyawan</h4>
                    </div>
                    <div class="modal-body">
                        <table id="lookup" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID Karyawan</th>
                                    <th>Nama Karyawan</th>
                                    <th>Jabatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //Data mentah yang ditampilkan ke tabel    
                                // mysql_connect('localhost', 'root', '');
                                // mysql_select_db('harviacode');



                                $sql = mysqli_query($conn,'SELECT * FROM karyawan WHERE del=0');
                                while ($row = mysqli_fetch_assoc($sql)) {
                                	$id_karyawan=$row['id_karyawan'];
                                	$jabatan = $row['jabatan'];
                                ?>
                                    <tr class="pilih" data-nama_karyawan="<?php echo $row['nama']; ?>" data-id_karyawan="<?php echo $row['id_karyawan']; ?>" data-jabatan="<?php echo $row['jabatan']; ?>">
                                        <td><?php echo $row['id_karyawan']; ?></td>
                                        <td><?php echo $row['nama']; ?></td>
                                        <td><?php echo $row['jabatan']; ?></td>
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
        <!-- End Modal karyawan -->
   </div>
   <script type="text/javascript">
   		 $(document).on('click', '.pilih', function (e) {
     		 	var nama = $(this).attr('data-nama_karyawan');
     		 	var id_karyawan =  $(this).attr('data-id_karyawan');
     		 	var jabatan =  $(this).attr('data-jabatan');
     		 	$("[name='nama']").val(nama);
     		 	$("[name='jabatan']").val(jabatan);
     		 	$("[name='id_karyawan']").val(id_karyawan);
     		 	console.log(id_karyawan);
     		 	console.log(jabatan);

     		 	$('#myModal').modal('hide');
   		 });

        $(document).ready(function() {
        $('#lookup').DataTable();
      } );

   		 // $(document).on('keyup', '#jumlah_bayar', function (e) {
      //   	 	var pass1 = $("[name='password']").val();
      //   	 	var pass2 = $("[name='password2']").val();

      //   	 	if (pass2 != pass) {
      //   	 		document.getElementById('jumlah_total').innerHTML = "Password nya Beda!!";
      //   	 	}

      //   	 });
      function checkPass()
      {
          //Store the password field objects into variables ...
          var pass1 = document.getElementById('password');
          var pass2 = document.getElementById('password2');
          //Store the Confimation Message Object ...
          var message = document.getElementById('confirmMessage');
          //Set the colors we will be using ...
          var goodColor = "#66cc66";
          var badColor = "#ff6666";
          //Compare the values in the password field 
          //and the confirmation field
          if(pass1.value == pass2.value){
              //The passwords match. 
              //Set the color to the good color and inform
              //the user that they have entered the correct password 
              pass2.style.backgroundColor = goodColor;
              message.style.color = goodColor;
              message.innerHTML = "Passwords Match!";
              document.getElementById("simpan").disabled = false;
          }else{
              //The passwords do not match.
              //Set the color to the bad color and
              //notify the user.
              pass2.style.backgroundColor = badColor;
              message.style.color = badColor;
              message.innerHTML = "Passwords Do Not Match!";
              document.getElementById("simpan").disabled = true;

          }
      } 
   </script>
   <?php  
   	include '../footer.php';
   ?>