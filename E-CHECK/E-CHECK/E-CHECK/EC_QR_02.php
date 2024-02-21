<head><link href="<?php echo"https://bootswatch.com/4/lux/bootstrap.css"; ?>" rel="stylesheet" type="text/css" /> </head>
<body>
<?php
		include"../../CONFIG/MSSQL/MS_CONNECT_01.php";
			include"../../DIST/CODE/CODE_02_DDL.php";
			include"../../QR/qrlib.php";
?>
  <div class="row">
<?php 
			
			
			
			$ec_vtt01_sw = $CL_Q("$CL_SL tb_ec_titik_01 WHERE titik_status_01='2' order by titik_nama_01 asc");
				while($ec_vtt01_sww = $CL_FAS($ec_vtt01_sw)){
			?>
          
           		<div class="col-sm-1 col-md-4  py-2">
            		
          		 <?php QRcode::png("http://103.164.114.138/E-PWC/E-CHECK/E-CHECK/EC_HOME_APP_CLIENT_01.php?IDTT01=$ec_vtt01_sww[idmain_titik_01]","image$ec_vtt01_sww[idmain_titik_01].png","H",5,5); ?>
				<?PHP 
				echo"<center>";
				echo"<img src=http://pantiwilasa-citarum.co.id/WEB-PWC/OPT-03/IMG/LOGO/logo_new.png width=100 height=100>";
				echo"<br><br>";
				echo"<strong>- Scan Kontrol Satpam-</strong>";
				echo"<br>";
				echo"<img src=image$ec_vtt01_sww[idmain_titik_01].png width=110 height=110>";
				echo"<br>";
				echo"$ec_vtt01_sww[titik_kode_01]";
				echo"<br>";
				echo"<b>$ec_vtt01_sww[titik_nama_01]</b>";
				echo"<hr>";
				echo"</center>";
				echo"<br><br>";
			?>
            	 </div>
				<?php } ?>
                </div>

</body>