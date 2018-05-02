<?php  
	session_start();
  include 'init/db.php';
  if (isset($_POST['submit_login'])) {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
      $get_username = mysqli_real_escape_string($conn,$_POST['username']);
      $get_password = mysqli_real_escape_string($conn,$_POST['password']);


      $sql =mysqli_query($conn, "SELECT * FROM user WHERE username = '$get_username' AND password = '$get_password'");
      //$result = mysqli_fetch_assoc(mysqli_query($conn,$sql));
      if ($sql) {
        if (mysqli_num_rows($sql)== 1) {
          $result = mysqli_fetch_assoc($sql);
            // echo $result['level'];
          if ($result['level'] == 1) {
            $_SESSION['id_karyawan']=$result['id_karyawan'];
            $_SESSION['username']=$result['username'];
            $_SESSION['level']=$result['level'];
            header('Location: admin/');
          }else if($result['level'] == 2){
            $_SESSION['id_karyawan']=$result['id_karyawan'];
            $_SESSION['username']=$result['username'];
            $_SESSION['level']=$result['level'];
            header('Location: user/');
          }else if($result['level'] == 3){
            $_SESSION['id_karyawan']=$result['id_karyawan'];
            $_SESSION['username']=$result['username'];
            $_SESSION['level']=$result['level'];
            header('Location: admin/index_p.php');
          }
        }else{
         // header('Location: ../admin/login.php?login=wrong');
          echo'<div class="alert alert-danger" style="text-align:center"><h4>Username atau Password Yang Dimasukan Salah!</h4></div>';
        }     
      }else{
        //header('Location: ../admin/login.php?login=error');
        echo'<div class="alert alert-danger" style="text-align:center"><h4>Maaf Sedang Terjadi Error</h4></div>';
      }
    }else{
     //header('Location: ../admin/login.php?login=empty');
      echo'<div class="alert alert-danger" style="text-align:center"><h4>Anda Belum Memasukan Username atau Password!!</h4></div>';
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Toko Karunia Jaya | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <style type="text/css">
    .btn{
        border-radius: 12px;
    }

    .login-page{
      background-image: url("dist/img/back1.jpeg") ; 
      background-repeat:no-repeat;
      /*background-size:contain;*/
      background-position:center center;
      background-attachment: fixed;
      background-color: #999;
      height: 100%; 
      width: 100%;
      /*z-index: -2;
      -webkit-filter: blur(20px);
      filter: blur(20px); */
    }

 /*   .login-box-blur:before{
      -webkit-filter: blur(30px);
      filter: blur(30px);
    }
*/
    
    .login-box-body{
      background: inherit;
     /* -webkit-filter: blur(30px);
      filter: blur(30px);*/
      overflow: hidden;
    }
    .login-box-body:before{
      /*background: none;*/
      content: ‘’;
      background: inherit; 
      -webkit-filter: blur(30px);
      filter: blur(30px);
    }


    @media only screen and (max-width: 760px) {
      .login-logo{
        margin-top: 35%;
      }
      /*.login-box-body{
        margin-left: 50px;
        margin-right: 50px;
      }*/
    }

    @media
      only screen and (-webkit-min-device-pixel-ratio: 2),
      only screen and (min--moz-device-pixel-ratio: 2),
      only screen and (-moz-min-device-pixel-ratio: 2),
      only screen and (-o-min-device-pixel-ratio: 2/1),
      only screen and (min-device-pixel-ratio: 2),
      only screen and (min-resolution: 192dpi),
      only screen and (min-resolution: 2dppx) { 
          /* styles for Retina-type displays */
    }

  </style>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#">Toko <b> Karunia Jaya</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-blur">
    <div class="login-box-body">
      <p class="login-box-msg">Silahkan Masuk Untuk Memulai</p>

      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <button type="submit" name="submit_login" class="btn btn-primary btn-block btn-flat btn-sign">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    

    </div>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
