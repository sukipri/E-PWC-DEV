<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			#error_reporting(0);
			?>
			<body>
            <h5>#DATA ABSENSI</h5>
            <?PHP include_once"WS-EP_APP_01_RI_JADWAL_MENU.php"; ?>
            
            <br>
             <?php require"../logic/page_logic_sa_sub_child02.php"; ?>
          
            
            
            </body>
            
          <?PHP } ?>