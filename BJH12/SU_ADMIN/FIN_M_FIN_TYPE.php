<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
	<?php
			//hapus pembiayaan
				$IDPB = @$sql_slash($_GET['IDPB']);	
					if(isset($_GET['DELPB'])){
						$ms_q("$dl from tb_pembiayaan WHERE idmain_pembiayaan='$IDPB'");
							header("location:?HLM=FIN_M&SUB=FIN_M_FIN_TYPE");
					}
	
		//entri pembiayaan jenis
		if(isset($_POST['pilih'])){
			$jbiaya = $sql_slash($_POST['jbiaya']);
				$ms_q("$in tb_pembiayaan_jenis VALUES('$IDMAIN','$c_kode_vpj','$jbiaya')");
					header("location:?HLM=FIN_M&SUB=FIN_M_FIN_TYPE");
		}
		
		//pembiayaan
		if(isset($_POST['simpan'])){
			$jbiaya_02  = @$sql_slash($_POST['jbiaya_02']);
			$jenjang    = @$sql_slash($_POST['jenjang']);
			$nominal = $sql_slash($_POST['nominal']);
			$lokasi = $sql_slash($_POST['lokasi']);
				if(empty($jbiaya_02) && empty($jenjang) && empty($nominal) && empty($lokasi)){
					echo"<font color=red><b>Field Masih ada yang kosong</b></font>";
					echo "<META HTTP-EQUIV=Refresh Content=3; URL=?HLM=FIN_M&SUB=FIN_M_FIN_TYPE>";
					}else{
				$save = $ms_q("$in tb_pembiayaan values('$IDMAIN','$jbiaya_02','$c_kode_vpb','$jenjang','$nominal','$lokasi')");
		
				if ($save) { echo "<META HTTP-EQUIV=Refresh Content=2; URL=?HLM=FIN_M&SUB=FIN_M_FIN_TYPE>";  ?>
						<div class="alert alert-dismissible alert-success">
							 <strong>Well done!</strong> You successfully save...
						</div>
						<?php }else{ ?>
						<div class="alert alert-dismissible alert-danger">
							 <strong>Ula laaa!</strong> Save is Failed
						</div>
	<?php }}} ?>
	<h5>Entri Pembiayaan Seminar / Pelatihan</h5>
    <form method="post">
    	 <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#buyer01"><i class="fas fa-plus"></i>&nbsp; Tambah jenis pembiayaan</a>
         
           <div class="modal fade" id="buyer01" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Entri Jenis Pembiayaan</h5>
                          </div>
                          <div class="modal-body">
                           Jenis Biaya
                            	<input type="text" name="jbiaya" class="form-control" placeholder="Jenis Pembiayaan...">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button  class="btn btn-primary" name="pilih">Save changes</button>
                          </div>
                        </div>
                      </div>
      </div>
    
   	  <table width="100%" style="max-width:100%;" border="0" class="table table-bordered">
          <tr>
            <td width="42%">
            	          </td>
            <td width="58%" rowspan="2">
            <div class="card border-primary mb-3" style="max-width: 40rem;">
              <div class="card-header">Pertinjauan singkat</div>
              <div class="card-body">
              	<?php
					$vpby_02 = $ms_q("$sl idmain_pembiayaan,idmain_pembiayaan_jenis,jenjang,nominal,lokasi FROM tb_pembiayaan order by jenjang asc");
						while($vpbyy_02 = $ms_fas($vpby_02)){
								$vpbyj_02 = $ms_q("$call_sel tb_pembiayaan_jenis WHERE idmain_pembiayaan_jenis='$vpbyy_02[idmain_pembiayaan_jenis]'");
									$vpbyyj_02 = $ms_fas($vpbyj_02);
										$nom_vpbyy_02 = @$nf($vpbyy_02['nominal']);
								echo"^$vpbyyj_02[nama] <b>$vpbyy_02[jenjang] - $vpbyy_02[lokasi]  </b><br> <i>Rp.$nom_vpbyy_02</i>";
								?>
               	<br><a href="<?php echo"?HLM=FIN_M&SUB=FIN_M_FIN_TYPE&IDPB=$vpbyy_02[idmain_pembiayaan]&DELPB=DELPB"; ?>" onClick="return konfirmasi()">Hapus</a><br>
                                   
						<?php } ?>
                
              </div>
			</div>
            </td>
          </tr>
          <tr>
            <td>
              <!-- -->
              <table class="table table-bordered" width="100%" border="0">
   	    <tr>
   	      <td><select name="jbiaya_02" class="form-control" style="max-width:20rem;">
                <option value="">Jenis Biaya</option>
                <?php 
					$vpby = $ms_q("$call_sel tb_pembiayaan_jenis order by nama asc");
						while($vpbyy = $ms_fas($vpby)){
							echo"<option value=$vpbyy[idmain_pembiayaan_jenis]>$vpbyy[nama]</option>";
						}
				
				?>
                </select> </td>
        </tr>
   	    <tr>
   	      <td><b>Jenjang</b><input type="text" name="jenjang" class="form-control" style="max-width:20rem;"> </td>
        </tr>
   	    <tr>
   	      <td><b>Nominal</b><input type="number" name="nominal" class="form-control" style="max-width:20rem;"></td>
        </tr>
   	    <tr>
   	      <td>   <select name="lokasi" class="form-control" style="max-width:20rem;">
            <option value="">Lokasi</option>
            	<option value="Jateng / DIY"> Jateng / DIY</option>
                <option value="Luar Propinsi"> Luar Propinsi</option>
                <option value="Luar Negeri"> Luar Negeri</option>
            </select>  </td>
        </tr>
   	    <tr>
   	      <td> <button  class="btn btn-primary" name="simpan">S.A.V.E</button></td>
        </tr>
      </table>
            <!-- -->
            </td>
          </tr>
        </table>
   	
    
</form>
</body>
<?php } ?>