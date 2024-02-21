<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			error_reporting(0);
			?>
			<body>
            		<?PHP 
							#--DATA VIEW GEO--#
							
							
					
					?>
           <!-- -->
         <table width="100%" border="0" class="table table-sm">
                  <tr>
                    <td width="35%">
                    <!-- -->
                      <form method="post">
            <div class="card border-primary mb-3" style="max-width: 27rem;">
                      <div class="card-header"> </b>#SET GCODE</b></div>
                      <div class="card-body">
                      <!-- -->
                      	<div class="input-group input-group-sm mb-3">
                    	<span class="input-group-text" id="basic-addon1">Geo Kode</span>
                                          <input type="text" class="form-control form-control-sm" name="ep_geo_kode_01" required autocomplete="off">
                                    </div>
                        <!-- -->
                   		 <!-- -->
                     	<div class="input-group input-group-sm mb-3">
                          <span class="input-group-text" id="basic-addon1">Geo Nama</span>
                                          <input type="text" class="form-control form-control-sm" name="ep_geo_nama_01" required autocomplete="off">
                        </div>
                        <!-- -->
                        <!-- -->
                     	<div class="input-group input-group-sm mb-3">
                          <span class="input-group-text" id="basic-addon1">Geo Latt</span>
                            <input type="text" class="form-control form-control-sm" name="ep_geo_lat_01" required autocomplete="off">
                        </div>
                        <!-- -->   
                        <div class="input-group input-group-sm mb-3">
                          <span class="input-group-text" id="basic-addon1">Geo Long</span>
                            <input type="text" class="form-control form-control-sm" name="ep_geo_long_01" required autocomplete="off">
                        </div>
                        <!-- -->    
                        <!-- -->   
                        <div class="input-group input-group-sm mb-3">
                          <span class="input-group-text" id="basic-addon1">Geo Lat Acuan</span>
                            <input type="text" class="form-control form-control-sm" name="ep_geo_latacuan_01" required autocomplete="off">
                        </div>
                        <!-- -->    
                        <!-- -->   
                        <div class="input-group input-group-sm mb-3">
                          <span class="input-group-text" id="basic-addon1">Geo Long Acuan</span>
                            <input type="text" class="form-control form-control-sm" name="ep_geo_longacuan_01" required autocomplete="off">
                        </div>
                        <!-- -->    
                         <!-- -->   
                        <div class="input-group input-group-sm mb-3">
                          <span class="input-group-text" id="basic-addon1">Geo Ket</span>
                            <textarea class="form-control" name="ep_geo_ket_01"></textarea>
                        </div>
                        <!-- -->    
                        
                         <br>
                           <button name="ep_geo_simpan_01" class="btn btn-success btn-sm"><i class="fas fa-paper-plane"></i>&nbsp;Simpan Data</button>
                      	</div>
			</div>
        </form>
        <!--- -->
        <?PHP include"../logic/EP_EXE_MIX.php"; ?>
                    <!-- -->
                    </td>
                    <td width="65%">
                    <?PHP include"EP_MD_01_SD_GCODE_01_VIEW.php"; ?>
                    
                    </td>
                  </tr>
		</table>

        
        <!-- -->
            </body>
            
            <?PHP } ?>