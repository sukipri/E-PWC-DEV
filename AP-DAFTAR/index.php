		<?php header("location:../SU_ADMIN/layout/AD_LOGIN.php"); ?>
		
		 <?php 
 	ob_start();
			//error_reporting(0);
 		session_start();
		 require"main_include.php"; 
			//$dbh_srv = new PDO('mssql:host=zeus-pc;dbname=Citarum', "sa", "phoseidonathena");
  			//$dbh_srv->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){

	    include"layout/F_LOGIN.PHP";
		} else {
				$u = $ms_q("$call_sel TBUser where kode='$_SESSION[namauser]'");
					$uu = $ms_fas($u);
					  ?>
        <?php 
		/*
		//PDO connection Mysql
		 	$dbh = new PDO('mysql:host=localhost;dbname=hdesk', "root", "");
  			$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		//PDO Connection SQLSrv
			$dbh_srv = new PDO('mssql:host=HKS-MEIKA-PC;dbname=BJPOS', "sa", "holihks45");
  			$dbh_srv->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		//PDO Connection PostgreSQL
			$dbh_pg = new PDO('pgsql:host=localhost;port=5432;dbname=hdesk;user=postgres;password=zeus');
  			$dbh_pg->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			*/
			 ?>
	<script type="text/javascript" language="JavaScript">
 	function konfirmasi()
	 {
	 	tanya = confirm("Anda yakin ingin membatalkan ?");
	 if (tanya == true) return true;
	 else return false;
 }

 </script>
 <?php
			if($uu['akses']==3){
		?>
	<html>	
	<body>
   	 	<?php require"layout/navbar_01.php"; ?>
    <p><br></p>                      
    <div class="container">
     	<?php require"logic/page_logic.php"; ?>
    </div>
		<?php require"layout/footer.php"; ?>
	</body>
	</html>
	<?php }else{
		header("location:../");
		} ?>
	<?php }ob_flush(); ?>