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
                          <input type="text" style="max-width:10rem;" readonly name="ec_titik_kode_01" class="form-control form-control-sm" value="<?php echo"$ec_cq_vtt01_sw"; ?>">
					</div>
                <!-- -->
                	<!-- -->
                	<div class="input-group input-group-sm mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Pantauan</span>
                          </div>
							<select style="max-width:10rem;" name="ec_idmain_kat_01" class="form-control form-control-sm" required>
                            	<option value=""></option>
                                <option value="01">Beresiko</option>
                                <option value="02">Tidak Beresiko</option>
                                
                                
                            
                            </select>
					</div>
                <!-- -->
                <!-- -->
                	<div class="input-group input-group-sm mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Nama Lokasi</span>
                          </div>
                          <input style="max-width:20rem;" type="text" autocomplete="off" name="ec_titik_nama_01" class="form-control form-control-sm" required>
					</div>
                <!-- -->
                <!-- -->
                	<div class="input-group input-group-sm mb-3">
                      <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Detail Lokasi</span>
                          </div>
                          <textarea name="ec_titik_lokasi_01" rows="10" class="form-control"></textarea>
					</div>
                <!-- -->
                <button name="ec_titik_simpan_01" class="btn btn-success btn-sm"><i class="	fas fa-save"></i>&nbsp;Simpan Data</button>
                
              </div>
		</div>      
        
        
        </form>
        
        <!-- -->
        	<?php include_once"../LOGIC/PRC/EXE_IN.php"; ?>
        <!-- -->
<?php
		//..Session Close..//
		}else{
		  include'../LOGIC/PG/PG_H_LOCATION.php';
		} }
		ob_flush();
	
	?>