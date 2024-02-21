<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
			<body>
            <!-- -->
           		<?PHP include"EP_MENU_01_ME_SD.php"; ?>
              <!-- -->
                <?php require"../logic/page_logic_sa_sub_child02.php"; ?>
              
            </body>
            
     <?PHP } ?>