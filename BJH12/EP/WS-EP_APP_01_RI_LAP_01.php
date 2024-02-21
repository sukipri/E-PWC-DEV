<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			#error_reporting(0);
			?>
			<body>
          <b>#Data Laporan</b>
            <?PHP include_once"WS-EP_APP_01_RI_LAP_MENU.php"; ?>
            
            <br>
             <?php require"../logic/page_logic_sa_sub_child03.php"; ?>
          
            
            
            </body>
            
          <?PHP } ?>