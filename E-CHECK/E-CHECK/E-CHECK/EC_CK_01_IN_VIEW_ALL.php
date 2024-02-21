<?php
		@ob_start();
		 @session_start();
			//..INCLUDER//
			
			//.....///
		//..Sesiion open../
		 if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
 			include'../LOGIC/PG/PG_H_LOCATION.php';
       }else{
	
			if($vus01_sww['akses']==31){ 
		
?>
	<h5>#Data Checking / Today</h5>

        <table width="100%" border="0" class="table table-bordered table-sm table-striped" style="max-width:60rem;">
              <tr class="table-warning">
                <td width="3%">#</td>
                <td width="21%">ID</td>
                <td width="28%">Tanggal</td>
                <td width="28%">Titik</td>
                 <td width="20%">Laporan</td>
                 <td width="20%">Petugas</td>
              </tr>
              <?PHP
			  	
			  		$ec_rec_no = 1;
			  		$ec_vttr01_sw = $CL_Q("$CL_SL tb_ec_titik_01_rec  WHERE rec_tglinput_01 BETWEEN '$DATE_HTML5_SQL 00:00:00' AND '$DATE_HTML5_SQL 23:59:00' order by rec_tglinput_01 desc");
						while($ec_vttr01_sww = $CL_FAS($ec_vttr01_sw)){
							//TITIK//
							$ec_vtt01_sw = $CL_Q("$SL idmain_titik_01,titik_nama_01 FROM tb_ec_titik_01 WHERE idmain_titik_01='$ec_vttr01_sww[idmain_titik_01]'");
								$ec_vtt01_sww = $CL_FAS($ec_vtt01_sw);
								//User
									$vus01_sw02 = $CL_Q("$CL_SL TBUser where idmain='$ec_vttr01_sww[rec_uploader]'");
       									 $vus01_sww02 = $CL_FAS($vus01_sw02);
			  ?>
              <tr>
                <td><?php echo"$ec_rec_no"; ?></td>
                <td><?php echo"$ec_vttr01_sww[rec_kode_01]"; ?></td>
                <td><?php echo"$ec_vttr01_sww[rec_tglinput_01]"; ?></td>
                <td><?php echo"$ec_vtt01_sww[titik_nama_01]"; ?></td>
                <td><?php echo"$ec_vttr01_sww[rec_laporan_01]"; ?></td>
                <td><?php echo"$vus01_sww02[namauser]"; ?></td>
              </tr>
              <?PHP $ec_rec_no++; } ?>
    </table>

    
<?php
		//..Session Close..//
		}else{
		  include'../LOGIC/PG/PG_H_LOCATION.php';
		} }
		ob_flush();
	
	?>