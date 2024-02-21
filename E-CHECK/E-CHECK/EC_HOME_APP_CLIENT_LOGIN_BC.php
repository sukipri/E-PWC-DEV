 <?php
		include"../DIST/DIST_GET.php";
			include"../QR/qrlib.php";
		
?>
	<?php include"EC_HOME_APP_MENU01.php"; ?>
    <div class="container">
    <br><br>
  		<h5>#Masukan Identitas anda</h5>
    <form method="post">
   		 <div class="card border-primary mb-3" style="max-width: 20rem;">
  
            <div class="card-body">
            
            	<!-- -->
             	   <input type="text" autocomplete="off" class="form-control" name="us_nama" required placeholder="Username.." />
                   <br />
                   <input type="password" autocomplete="off" class="form-control" name="us_pass" required placeholder="Password.." />
                <!-- -->
                <br /><br />
          		  <button name="ec_acs_login" class="btn btn-success"><i class="fas fa-sign-in-alt"></i>&nbsp;LOGIN</button>
            
            </div>
            
            </div>
    
    </form>
    			
                	<?php 
						if(isset($_POST['ec_acs_login'])){
							$us_nama = @$SQL_SL($_POST['us_nama']);
							$us_pass = @EN_HS_MD5($SQL_SL($_POST['us_pass']));
							
							/*Prccess LOGIN */
								$ec_vuser01_sw = $CL_Q("$CL_SL TBUser WHERE namauser='$us_nama' AND passuser='$us_pass' AND akses='312'");
									$ec_vuser01_sww = $CL_FAS($ec_vuser01_sw);
							
									if($us_nama==$ec_vuser01_sww['namauser'] AND $us_pass==$ec_vuser01_sww['passuser']){
											
										//header("location:");
					?>
					 <meta http-equiv="refresh" content="0; url=<?php echo"EC_HOME_APP_CLIENT_01.php?IDTT01=$IDTT01&IDUSER01=$ec_vuser01_sww[namauser]&IDPASS01=$ec_vuser01_sww[passuser]"; ?>"> 
                    <?php }else{ echo"Password Dan User Salah"; ?>
                    		
                    <?php } ?>
                    <?PHP } ?>
</div>