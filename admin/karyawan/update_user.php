<?php  
	ob_start();
	
	include '../../init/db.php';
  include "../admin_login.php";
  include '../header.php';
	include '../sidebar.php';
	$id_karyawan = $_GET['id'];

	if (isset($_POST['submit'])) {
		$id_karyawan = $_POST['id_karyawan'];
		$username = $_POST['username'];
		$password = $_POST['password1'];

		$query = "UPDATE user SET username = '$username',password = '$password' WHERE id_karyawan = '$id_karyawan'";

		if (mysqli_query($conn, $query)) {
			header('Location: list_user.php');
      // echo "0000000000000000000000000000000000000000000000000000000000000Sukses";
		}else{
			mysqli_error($conn);
		}

	}
	
	$query = mysqli_query($conn,"SELECT * FROM user INNER JOIN karyawan USING(id_karyawan) WHERE id_karyawan='$id_karyawan'");
	$rows = mysqli_fetch_assoc($query); 
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
        <li class="active">Update User</li>
      </ol>
    </section>

	<section class="content">
	     <!-- Main content -->
	      <div class="row">
	        <div class="col-md-8">
	          <div class="box box-info">
	            <div class="box-header">
	              <h3 class="box-title">Update User Access
	                <small>Perubahan Data User Access</small>
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
	              	<?php 
	              		$query_nama = mysqli_query($conn,"SELECT nama FROM karyawan WHERE id_karyawan='$id_karyawan'");
	              		$rows_nama = mysqli_fetch_assoc($query_nama);   
	              	?>
	              	<input type="text" name="id_karyawan" value="<?php echo $id_karyawan ?>"  hidden>
					<div class="form-group col-md-7">
                  		<label for="nama">Nama Karyawan</label>
                  		<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $rows_nama['nama'] ?>" readonly>
                	</div>

					<div class="form-group col-md-7">
                  		<label for="jabatan">Jabatan</label>
                  		<input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $rows['jabatan'] ?>" readonly>
                	</div>

                	<div class="form-group col-md-7">
                  		<label for="username">Username</label>
                  		<input type="text" class="form-control" name="username" value="<?php echo $rows['username'] ?>" required>
                  		<!-- <textarea class="form-control" rows="5" name="alamat" id="alamat" placeholder="Alamat Karyawan"></textarea> -->
                	</div>
                	<div class="form-group col-md-7">
                  		<label for="password1">Password</label>
                  		<input type="password" class="form-control" name="password1" id="password1" required>
                	</div>
                	<div class="form-group col-md-7">
                  		<label for="password2">Ulangi Password</label>
                  		<input type="password" class="form-control" id="password2" name="password2" placeholder=" Ulangi Masukan Password" required>
                  		<div id="alert-password"><span id="confirmMessage" class="confirmMessage"></span></div>
                	</div>

                	<div class="form-group col-md-7" style="margin-left: 5px">
                    <label for="level">Pilih Level Akses</label>
                    <select class="form-control" name="level">
                      <option value="1" <?php if($rows['level'] == 1) { echo "selected='selected'";}else{'';} ?> >Level 1</option>
                      <option value="2"<?php if($rows['level'] == 2) { echo "selected='selected'";}else{ '';} ?> >Level 2</option>
                      <option value="3"<?php if($rows['level'] == 3) { echo "selected='selected'";}else{ '';} ?> >Level 3</option>
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
   </div>

   <script type="JavaScript">
   	function checkPass()
    {
          //Store the password field objects into variables ...
          var pass1 = document.getElementById('password1');
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

      $(document).on('change', '#password2', function (e) {
        //Store the password field objects into variables ...
          var pass1 = $('#password1').val();
          var pass2 = $('#password2').val();
          //Store the Confimation Message Object ...
          var message = $('#confirmMessage').val();
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
      });
   </script>
   <?php  
   	include '../footer.php';
   ?>