<?php
		@ob_start();
		 @session_start();
			//..INCLUDER//
			include"../DIST/DIST_GET.php";
			//include"../QR/qrlib.php";
			//.....///
		//..Sesiion open../
		 if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
 			include'../LOGIC/PG/PG_H_LOCATION.php';
       }else{
	//..Access Method.//
 	  $vus01_sw = $CL_Q("$CL_SL Citarum.dbo.TBUser where namauser='$_SESSION[namauser]' AND akses='6'");
        $vus01_sww = $CL_FAS($vus01_sw);
			if($vus01_sww['akses']==6){
		
?>

<body>
		<?PHP include"CPF_MENU_01.php"; ?>
		
        <div style="padding-top:30px"></div>
        <!-- -->
        <!-- <div class="container"> -->
			<div class="mx-4">
        	<?PHP include"../LOGIC/PG/PG_SA.php"; ?>
		</div>
		<div style="padding-top:7%"></div>
		<hr>
		<span class="mx-2"><?PHP echo"$DATE_Y RS Panti Wilasa Citarum"; ?> &copy LULABY</span>
		

</body>
<?php
		//..Session Close..//
		}else{
		  include'../LOGIC/PG/PG_H_LOCATION.php';
		} }
		ob_flush();
	
	?>