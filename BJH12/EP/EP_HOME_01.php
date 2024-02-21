	<?php 
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
		if(isset($_GET['LOGOUT'])){
			//header("location:../logic/LOGOUT.php");
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../logic/LOGOUT.php">';
		}
	?>
	<body>
    	<!--- -->
        <?PHP include"EP_MENU_01.php"; ?>
    	<br>
        <?php require"../logic/page_logic_sa_sub.php"; ?>
    
    </body>
    
    <?PHP } ?>