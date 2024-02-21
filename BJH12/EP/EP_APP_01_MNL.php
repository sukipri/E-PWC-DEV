<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
        #Presensi Manual
        <div style="padding-top:0.5rem;"></div>
        <?PHP include_once"EP_MENU_01_APP_MNL.php"; ?>
        
        <?php require"../logic/page_logic_sa_sub_child02.php"; ?>
<?PHP } ?>