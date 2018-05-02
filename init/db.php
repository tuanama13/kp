<?php  
	$server = 'sql204.epizy.com';
	$user = 'epiz_21665828';
	$pass = 'AImFURUNbxoJ';
	$dbase = 'epiz_21665828_kp';

	$conn = mysqli_connect($server, $user, $pass, $dbase);

	if(!$conn){
		die("Koneksi Gagal : ".mysqli_connect_error());
	}
?>