<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			error_reporting(0);
?>
    <?PHP 
        #CONDITONING
        if($_GET['IDPASIF01']=="PASIF"){
            include"../EP/WS-EP_APP_01_RI_LAP_01_USR02_PSF.php";
        }elseif($_GET['IDPASIF01']=="AKTIF"){ 
            include"../EP/WS-EP_APP_01_RI_LAP_01_USR02_AKTIF.php";
        } ?>