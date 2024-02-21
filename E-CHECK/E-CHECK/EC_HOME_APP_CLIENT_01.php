<?php
		@ob_start();
		 @session_start();
			//..INCLUDER//
			include"../DIST/DIST_GET.php";
			include"../QR/qrlib.php";
			//.....///
		//..Sesiion open../
		 if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
 			header("LOCATION:EC_HOME_APP_CLIENT_LOGIN.php?IDTT01=$IDTT01");
       }else{
	//..Access Method.//
 	  $vus01_sw = $CL_Q("$CL_SL TBUser where namauser='$_SESSION[namauser]' AND akses='312'");
        $vus01_sww = $CL_FAS($vus01_sw);
			
			if($vus01_sww['akses']==312){ 
		//echo"";
?>
		
	<?php include"EC_HOME_APP_MENU01.php"; ?>
    <br><br>
		<?php
			//USER ACCOUNT
				$ec_vuser01_sw = $CL_Q("$CL_SL TBUser WHERE namauser='$vus01_sww[namauser]' AND passuser='$vus01_sww[passuser]' AND akses='312'");
						$ec_vuser01_sww = $CL_FAS($ec_vuser01_sw);
			//TITIK
			$ec_vtt01_sw = $CL_Q("$CL_SL tb_ec_titik_01 WHERE idmain_titik_01='$IDTT01'");
				$ec_vtt01_sww = $CL_FAS($ec_vtt01_sw);
		
		?>
        <div class="container">
        <?php 
				echo"KODE <i>$ec_vuser01_sww[kode]</i>";
				echo"<br>";
				echo"User <i>$ec_vuser01_sww[namauser]</i>";
		
		?>
        <hr />
		<h5>#Entri Checking</h5>
        <br>
        <form method="post" action="">
        <div class="card border-primary mb-3" style="max-width: 20rem;">
  
            <div class="card-body">
       			<!-- -->
                	<input type="text" class="form-control form-control-sm" readonly name="ec_rec_kode_01" autocomplete="off" value="<?php echo"$ec_cq_vttr01_sw"; ?>">         
  				<!-- -->
                <!-- -->
                <br>
                Tempat
                <br>
                	<input type="text" class="form-control form-control-sm" readonly name="#" autocomplete="off" value="<?php echo"$ec_vtt01_sww[titik_nama_01]"; ?>">         
  				Waktu
                	<br />
                    <input type="text" class="form-control form-control-sm" readonly name="#" autocomplete="off" value="<?php echo"$DATE_HTML5_SQL $TIME_HTML5"; ?>">         
                <!-- -->
                <!-- -->
                <br>
                Lokasi
                <br>
                	<textarea class="form-control" readonly="readonly"><?php echo"$ec_vtt01_sww[titik_lokasi_01]"; ?></textarea>
  				<!-- -->	
                <!-- -->
                <br>
                Laporan
                <br>
                	<textarea required  class="form-control" name="ec_rec_laporan_01"></textarea>
  				<!-- -->
                 <!-- -->
                <br>
                Status
                <br>
                	<select name="ec_rec_status_01" class="form-control" required>
                    <option value=""></option>
                    <option value="A">Aman</option>
                    <option value="AB">Tidak Kondusif</option>
                  
                    
                    
                    </select>
  				<!-- -->
            </div>
            
    	</div>
	         <button name="ec_titik_rec_simpan_01" class="btn btn-success btn-sm"><i class="fas fa-save"></i>&nbsp;Simpan Data</button>
        </form>
     </div>
             
             <!-- -->
             	<?php  include"../LOGIC/PRC/EXE_IN.php"; ?>
             <!-- -->
<?php
		//..Session Close..//
		}else{
		 header("LOCATION:EC_HOME_APP_CLIENT_LOGIN.php");
		} }
		ob_flush();
	
	?>