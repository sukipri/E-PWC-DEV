<?php 
			include"../../CONFIG/MSSQL/MS_CONNECT_01.php";
			include"../../DIST/CODE/CODE_02_DDL.php";
			include"../../QR/qrlib.php";
			
			$ec_vtt01_sw = $CL_Q("$CL_SL tb_ec_titik_01 WHERE titik_status_01='2' order by titik_nama_01 asc");
				while($ec_vtt01_sww = $CL_FAS($ec_vtt01_sw)){
			
			QRcode::png("http://182.253.60.178/E-PWC/E-CHECK/E-CHECK/EC_HOME_APP_CLIENT_01.php?IDTT01=$ec_vtt01_sww[idmain_titik_01]","image$ec_vtt01_sww[idmain_titik_01].png","H",5,5);
			echo"<center>";
			echo"<br>";
			echo"<img src=image$ec_vtt01_sww[idmain_titik_01].png>";
			echo"<br>";
			echo"$ec_vtt01_sww[titik_kode_01]";
			echo"<br>";
			echo"<b>$ec_vtt01_sww[titik_nama_01]</b>";
			echo"<hr>";
			echo"</center>";
				}
?>
