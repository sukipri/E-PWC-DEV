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
	<h5>#Data Checking </h5>
    <form method="post">
   	  <div class="input-group input-group-sm mb-3" style="max-width:30rem;">
				<input type="date" class="form-control form-control-sm" required name="rec_tglinput_01">
				<input type="date" class="form-control form-control-sm" required name="rec_tglinput02_01">
                
          <div class="input-group-append">
            <button name="ec_btncari_rec_01" class="btn btn-success btn-sm"><i class="fas fa-search"></i>&nbsp;Cari data</button>
          </div>
	</div>
    </form>
    	<br>
        <?php 
				if(isset($_POST['ec_btncari_rec_01'])){
					$rec_tglinput_01 = @$_POST['rec_tglinput_01'];
					$rec_tglinput02_01 = @$_POST['rec_tglinput02_01'];
					//$rec_uploader = @$_POST['rec_uploader'];
					echo FS_DATE($rec_tglinput_01) ."<>".  FS_DATE($rec_tglinput02_01);
		?>
          <div style="overflow:auto;width:70rem;;height:600px;padding:2px;border:1px solid #eee">
        <table width="100%" border="0" class="table table-bordered table-sm table-striped" style="max-width:70rem;">
              <tr class="table-warning">
                <td width="3%">#</td>
                <td width="21%">ID</td>
                <td width="28%">Tanggal</td>
                <td width="28%">Titik</td>
                 <td width="20%">Laporan</td>
                 <td width="20%">Pelapor</td>
              </tr>
              <?PHP
			  	
			  		$ec_rec_no = 1;
			  		$ec_vttr01_sw = $CL_Q("$CL_SL tb_ec_titik_01_rec  WHERE (rec_tglinput_01 BETWEEN '$rec_tglinput_01 00:00:00' AND '$rec_tglinput02_01 23:59:00')  order by rec_tglinput_01 desc");
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
    </div>
    <?php } ?>

    
<?php
		//..Session Close..//
		}else{
		  include'../LOGIC/PG/PG_H_LOCATION.php';
		} }
		ob_flush();
	
	?>