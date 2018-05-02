<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Toko Karunia Jaya</title>
  <!-- <base href="admin/"> -->
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="plugins/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/DataTables1/datatables.min.css">
  <!-- <add key="webpages:Enabled" value="true" /> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
  <!-- <link rel="stylesheet" href="plugins/bootstrap-table-master/src/bootstrap-table.css"> -->


  <!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<style>    
    .jumbotron {
      position: relative;
      background: #000 url("dist/img/photo2.png") center center;
      width: 100%;
      height: 300px;
      background-size: cover;
      overflow: hidden;
      -webkit-filter: grayscale(40%); /* Safari */
      filter: grayscale(40%);
      box-shadow: 0 4px 4px;
    }
    .jumbotron > h1 {
      color:#FFFFFF;
    }

    .main-footer {
     position: inherit;
      margin-top: 150px;  /*negative value of footer height */*/
      height: 100px;
      bottom: -100px;
      clear:both;
      /*padding-top:20px;*/
      margin-left: 0px;
    }

    .form-group{
      margin-top: 25px;
    }

    .card-box{
      margin-bottom: 30px;
      position: relative;
      box-shadow: 0 2px 2px;
      background-color: #f39c12;
      height: 300px;
      border-radius: 10px;
    }

    .bg-list-brg:hover,
    .bg-list-brg:active
    {
      background-color: #db8b0b !important;
    }

    .bg-pesan-brg:hover,
    .bg-pesan-brg:active
    {
      background-color: #008d4c !important;
    }

    .bg-list-toko:hover,
    .bg-list-toko:active
    {
      background-color: #555299 !important;
    }

    .bg-transaksi:hover,
    .bg-transaksi:active
    {
      background-color: #ca195a !important;
    }

    .bg-about:hover,
    .bg-about:active
    {
      background-color: #913D88 !important;
    }

    .bg-tagihan:hover,
    .bg-tagihan:active
    {
      background-color: #3498DB !important;
    }


    .card-box > .inner{
      padding: 30px;
      padding-top: 60px;
      color: white;
    }

    .card-box > .inner > h1 {
      font-size: 70px;
    }

     .card-box > .inner > p {
        font-size: 18px;
      }

    .card-box .icon {
      -webkit-transition: all 0.3s linear;
      -o-transition: all 0.3s linear;
      transition: all 0.3s linear;
      position: absolute;
      top: -30px;
      right: 30px;
      z-index: 0;
      font-size: 240px;
      color: rgba(0, 0, 0, 0.15);
    }
    .card-box > .card-box-footer {
      margin-top: 42px;
      position: relative;
      text-align: center;
      padding: 3px 0;
      color: #fff;
      color: rgba(255, 255, 255, 255);
      display: block;
      z-index: 10;
      background: rgba(0, 0, 0, 0.1);
      text-decoration: none;
    }

    @media (max-width: 767px) {
      .jumbotron>.container{
		margin-top: -20px;
      }
      .card-box {
        text-align: center;
      }
      .card-box .icon {
         -webkit-transition: all 0.3s linear;
      -o-transition: all 0.3s linear;
      transition: all 0.3s linear;
      position: absolute;
      top: 50px;
      right: 65px;
      z-index: 0;
      font-size: 180px;
      color: rgba(0, 0, 0, 0.15);

      }

      .card-box > .inner{
        padding-top: 20px;
      }

      .card-box > .inner > h1 {
        font-size: 25px;
      }
      .card-box >.inner > p {
        font-size: 15px;
      }

      .card-box > .card-box-footer {
        margin-top: 23px;
      }
    }

    @media (max-width: @screen-xs-min) {
      .modal-xs { width: @modal-sm; }
    }

</style>
  <!-- REQUIRED JS SCRIPTS -->
  <script language="JavaScript" src="https://code.jquery.com/jquery-1.12.4.js" type="text/javascript"></script>


  <script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
  <script language="JavaScript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js" type="text/javascript"></script>
   <script language="JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js" type="text/javascript"></script>
  <script language="JavaScript" src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js" type="text/javascript"></script>

<!-- jQuery 2.2.3 -->
<!-- <script src="plugins/jQuery/jquery-2.2.3.min.js"></script> -->
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- <script src="plugins/bootstrap-table-master/src/bootstrap-table.js"></script> -->

<!-- <script src="plugins/bootstrap-table-master/src/extensions/editable/bootstrap-table-editable.js"></script> -->

<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->

<!-- <script src="plugins/DataTables1/js/dataTables.bootstrap.min.js"></script> -->
<!-- <script src="plugins/DataTables1/datatables.min.js"></script> -->
<!-- <base href="admin/"> -->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<!-- <body class="hold-transition skin-red sidebar-mini">
  <div class="wrapper"> -->