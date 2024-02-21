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
		<?php
			$ec_vtt01_sw = $CL_Q("$CL_SL tb_ec_titik_01 WHERE idmain_titik_01='$IDTT01'");
				$ec_vtt01_sww = $CL_FAS($ec_vtt01_sw);
		
		?>
		<h5>#Entri Checking</h5>
        <br>
        <form method="post" action="">
        <div class="card border-primary mb-3" style="max-width: 20rem;">
  
            <div class="card-body">
       			<!-- -->
                	<input type="text" class="form-control form-control-sm" readonly name="#" autocomplete="off" value="<?php echo"$ec_cq_vttr01_sw"; ?>">         
  				<!-- -->
                <!-- -->
                <br>
                Tempat
                <br>
                	<input type="text" class="form-control form-control-sm" readonly name="#" autocomplete="off" value="<?php echo"$TOKEN01"; ?>">         
  				<!-- -->
                <!-- -->
                <br>
                Lokasi
                <br>
                	<input type="text" class="form-control form-control-sm" readonly name="#" autocomplete="off" value="<?php echo"$TOKEN01"; ?>">         
  				<!-- -->	
            </div>
            
    	</div>
        
        
        </form>
<?php
		//..Session Close..//
		}else{
		  include'../LOGIC/PG/PG_H_LOCATION.php';
		} }
		ob_flush();
	
	?>