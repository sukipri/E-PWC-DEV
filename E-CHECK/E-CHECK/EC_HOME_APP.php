<?php
		@ob_start();
		 @session_start();
			//..INCLUDER//
			include"../DIST/DIST_GET.php";
			include"../QR/qrlib.php";
			//.....///
		//..Sesiion open../
		 if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
 			include'../LOGIC/PG/PG_H_LOCATION.php';
       }else{
	//..Access Method.//
 	  $vus01_sw = $CL_Q("$CL_SL TBUser where namauser='$_SESSION[namauser]' AND akses='31'");
        $vus01_sww = $CL_FAS($vus01_sw);
			if($vus01_sww['akses']==31){ 
		
?>
 	<?php include"EC_HOME_APP_MENU01.php"; ?>
	<div style="padding-top:30px;"></div>
   <div class="container">
    	<?php include"EC_HOME_APP_MENU02.php"; ?>
    	<br><br>
        <?php include"../LOGIC/PG/PG_SA.php";  ?>
    </div>
    <br><br>
 <?php include"EC_FOOTER.php"; ?>

<?php
		//..Session Close..//
		}else{
		  include'../LOGIC/PG/PG_H_LOCATION.php';
		} }
		ob_flush();
	
	?>