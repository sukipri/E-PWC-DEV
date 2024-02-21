	<?php
		//error_reporting(0);
		ob_start();
		session_start();
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	 	   include'../logic/H_LOCATION.php';
			} else {
		include"css.php";
		include"../CONFIG_INTERNAL.php";
		//User assigment
		$u = $ms_q("select * from TBUser where namauser='$_SESSION[namauser]'");
		$uu = $ms_fas($u);
			if($uu['akses']==5){ 
		
			?>
	<script type="text/javascript" language="JavaScript">
		function konfirmasi()
		 {
			tanya = confirm("are you sure to cancel / delete data ?");
		 if (tanya == true) return true;
		 else return false;
	 }
	</script>
	<script type="text/javascript" language="JavaScript">
		function konfirmasi_simpan()
		 {
			tanya = confirm("Are you sure to save data ?");
		 if (tanya == true) return true;
		 else return false;
	 }
	</script>
	<script type="text/javascript" language="JavaScript">
		function konfirmasi_simpan()
		 {
			tanya = confirm("Are you sure to save data ?");
		 if (tanya == true) return true;
		 else return false;
	 }
	</script>
	<script language="JavaScript" type="text/JavaScript">
	<!--
	function MM_openBrWindow(theURL,winName,features) { //v2.0
	  window.open(theURL,winName,features);
	}
//-->
</script>

		

	<style>
	body{padding:7em;}
	</style>
<body>

	<?php include"MENU_01.php";  ?>
	
	<?php require"../logic/page_logic_sa.php"; ?>
    <hr>
	<?php include_once"FOOTER.php"; ?>
	
</body>
	<?php
		}else{
		  include'../logic/H_LOCATION.php';
		} }
		ob_end_flush();
	?>
