<?php 
	include "../config/connec_01_mysql.php";
	include "../sc/stack_Q.php";
	
	$nim = "MX1001";
	$nama = "Mediatrix";
	$email = "mediatrix@mail.com";
	
	$call_q("$in mahasiswa(idmahasiswa,nama,email)values('$nim','$nama','$email')") or die("ERROR TO SAVE DATABASE");
?>