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
	<h5 class="">#Entri Titik</h5>
    <br>
		<form method="post" action="">
  			<div class="card border-primary mb-3" style="max-width: 32rem;">
            
              <div class="card-body">
              	<!-- -->
                	<div class="input-group input-group-sm mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                          </div>
                          <input type="text" style="max-width:10rem;" readonly name="ec_titik_kode_01" class="form-control form-control-sm" value="<?php echo"$ec_vtt01_sww[titik_kode_01]"; ?>">
					</div>
               	 <!-- -->
                	<!-- -->
                	<div class="input-group input-group-sm mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Pantauan</span>
                          </div>
							<select style="max-width:10rem;" name="ec_idmain_kat_01" class="form-control form-control-sm" required>
                            	<option value=""></option>
                                <?php
									$ec_no_kat_01 = 1;
										while($ec_no_kat_01 <= 3){
											if($ec_vtt01_sww['idmain_kat_01']=="0$ec_no_kat_01"){
								?>
                                	<option value="<?php echo"$ec_no_kat_01"; ?>" selected><?php echo"Beresiko $ec_no_kat_01"; ?></option>
                                <?php }else{ ?>
                               		<option value="<?php echo"$ec_no_kat_01"; ?>"><?php echo"Beresiko $ec_no_kat_01"; ?></option>
                            	<?php }$ec_no_kat_01++; } ?>
                            </select>
					</div>
                <!-- -->
                <!-- -->
                	<div class="input-group input-group-sm mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Nama Lokasi</span>
                          </div>
                          <input style="max-width:20rem;" type="text" autocomplete="off" name="ec_titik_nama_01" class="form-control form-control-sm" required value="<?php echo"$ec_vtt01_sww[titik_nama_01]"; ?>">
					</div>
                <!-- -->
                <!-- -->
                	<div class="input-group input-group-sm mb-3">
                      <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Detail Lokasi</span>
                          </div>
                          <textarea name="ec_titik_lokasi_01" rows="10" class="form-control"><?php echo"$ec_vtt01_sww[titik_lokasi_01]"; ?></textarea>
					</div>
                <!-- -->
                <!-- -->
                	<div class="input-group input-group-sm mb-3">
                      <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">STATUS</span>
                          </div>
                          <?php if($ec_vtt01_sww['titik_status_01']=="2"){ ?>
							<a href="#" class="btn btn-success btn-sm">#Aktif</a>
                           <?php } ?>
					</div>
                <!-- -->
               	 <button name="ec_titik_up_01" class="btn btn-success btn-sm"><i class="	fas fa-save"></i>&nbsp;Update Data</button>
                
              </div>
		</div>      
       </form>
        
        <!-- -->
        	<?php include_once"../LOGIC/PRC/EXE_UP.php"; ?>
        <!-- -->
<?php
		//..Session Close..//
		}else{
		  include'../LOGIC/PG/PG_H_LOCATION.php';
		} }
		ob_flush();
	
	?>