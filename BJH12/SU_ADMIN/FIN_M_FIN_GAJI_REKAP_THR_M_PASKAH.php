<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
	<b>Preview Gaji</b>
        ( * Tekan F3 untuk melakukan pencarian )
        <form method="post" action="#SUKSES">
        
          <table width="100%" class="table table-bordered" border="0" style="max-width:70rem;">
            <tr class="table-info">
              <td width="3%">NO</td>
              <td width="15%">KARYAWAN</td>
              <td width="82%">&nbsp;</td>
            </tr>
            <?php
				$vkry_up = $ms_q("$sl KaryNomor,KaryNama,KaryNoUrut,UnitKode FROM TKaryawan WHERE NOT KaryStatus='91' AND NOT KaryStatus='99'  AND NOT KaryStatus='92'  AND NOT KaryStatus='94'  AND NOT KaryStatus='93' order by KaryNoUrut,Convert(Integer,ISNULL(KaryNoSub,9999)) asc");
						$no = 1;
						while($vkryy_up = $ms_fas($vkry_up)){
								$vun = $ms_q("$call_sel TUnitPrs WHERE UnitKode='$vkryy_up[UnitKode]'");
										$vunn = $ms_fas($vun);
								
			
			?>

            <tr>
              <td><?php echo"$no"; ?></td>
              <td><?php echo"$vkryy_up[KaryNama]<br>$vkryy_up[KaryNomor]"; ?></td>
              <td>
                <?php
					$vgj01_sw = $ms_q("$sl GajiTahun,GajiTHRJenis,KaryNomor,KaryNama,GajiTotal,GajiPph21,GajiBersih,GajiStatus,GajiOtorisasi,GajiDibayarkan FROM TGajiTHR WHERE KaryNomor='$vkryy_up[KaryNomor]' AND GajiTHRJenis='P' AND GajiStatus='1' AND GajiTahun='$YR' ");
						while($vgj01_sww = $ms_fas($vgj01_sw)){
							$nom_tot_01 = @$nf($vgj01_sww['GajiDibayarkan']);
							$nom_bersih_01 = @$nf($vgj01_sww['GajiBersih']);
							$nom_pajak_01 = @$nf($vgj01_sww['GajiPph21']);
				?>
                <!-- -->
             <table width="100%" border="0" class="table table-bordered table-sm">
                      <tr class="table-warning">
                        <td>PASKAH</td>
                        <td>PAJAK</td>
                        <td>DITERIMA</td>
                        <td>&nbsp;</td>
                      </tr>
              
                	<tr>
                        <td><?php echo"Rp.$nom_tot_01"; ?></td>
                        <td><?php echo"Rp.$nom_pajak_01"; ?></td>
                      <td><?php echo"Rp.$nom_bersih_01"; ?></td>
                        <td>
                        <?php if($vgj01_sww['GajiOtorisasi']=="1" OR $vgj01_sww['GajiOtorisasi']=="4" ){ ?>
                        <a class="badge bg-success" href="#">Terverif</a>
                        <?php }elseif($vgj01_sww['GajiOtorisasi']=="0"){ ?>
                          <a class="badge bg-danger" href="#">Belum Terverif</a>
                        <?php } ?>
					
                        </td>
                     </tr>
                     
		</table>
        
              <!-- -->
               <input type="hidden" name="<?php echo"nik$no"; ?>" value="<?php echo"$vkryy_up[KaryNomor]"; ?>">
                        <input type="hidden" name="<?php echo"gaji$no"; ?>" value="<?php echo"$vgj01_sww[GajiTahun]"; ?>">
                       
						
                          <?php if($vgj01_sww['GajiOtorisasi']=="1" OR $vgj01_sww['GajiOtorisasi']=="4" ){ ?>
                        	  <select name="<?php echo"pilih$no"; ?>" class="form-control" style="max-width:10rem;">
                           	<option value="1">Konfirmasi</option>
                            <option value="0">Pending</option>
                           </select>
                        
                          <?php }elseif($vgj01_sww['GajiOtorisasi']=="0"){ ?>
                          
                      
                           <select name="<?php echo"pilih$no"; ?>" class="form-control" style="max-width:10rem;">
                           	<option value="0">Pending</option>
                            <option value="1">Konfirmasi</option>
                           </select>
                         
                           <?php } ?>
                          
                           	<input type="hidden" name="<?php echo"nik$no"; ?>" value="<?php echo"$vkryy_up[KaryNomor]"; ?>">
                        <input type="hidden" name="<?php echo"gaji$no"; ?>" value="<?php echo"$vgj01_sww[GajiTahun]"; ?>">
              
              
              <!-- -->
		<?php } ?>

               
              <br>
          
              </td>
            </tr>
            <?php $no++; }?>
          </table>
          <!-- -->
       	<nav class="navbar fixed-bottom navbar-light bg-light">
  			  <button name="up" class="btn btn-warning"><i class="fas fa-check"></i>&nbsp;Konfirmasi Gaji</button>
           	<div class="txt_right">
          <?php
		  	$vgj_jum_acc = $ms_q("$call_sel TGajiTHR WHERE   GajiOtorisasi='1' OR  GajiOtorisasi='4' AND GajiTahun='$YR' AND GajiTHRJenis='P' order by GajiTahun desc");
				$vgjj_jum_acc = $ms_nr($vgj_jum_acc);
			$vgj_jum_bacc = $ms_q("$call_sel TGajiTHR WHERE   GajiOtorisasi='0' AND GajiTahun='$YR' AND GajiTHRJenis='P' order by GajiTahun desc");
				$vgjj_jum_bacc = $ms_nr($vgj_jum_bacc);
					echo"<b>Acc $vgjj_jum_acc - Belum Acc $vgjj_jum_bacc </b>";
		  
		  ?>
          </div>
			</nav>
        
          <div id="SUKSES"></div>
          <?php 
		  	$vkry_up_jum = $ms_q("$sl KaryNomor,KaryNama,KaryNoUrut,UnitKode FROM TKaryawan WHERE NOT KaryStatus='91' AND NOT KaryStatus='99'  AND NOT KaryStatus='92'  AND NOT KaryStatus='94'  AND NOT KaryStatus='93' order by KaryNoUrut,KaryNoSub,KaryNama asc");
			$jum_vkry = $ms_nr($vkry_up_jum);
					//echo"$jum_vkry";
		  		if(isset($_POST['up'])){
						//echo"Up Cliked";
					$no_gaji = 1; 
						while( $no_gaji <= $jum_vkry){
							$pilih = @$_POST['pilih'.$no_gaji];
							
							$gaji = @$_POST['gaji'.$no_gaji];	
							$nik = @$_POST['nik'.$no_gaji];
								$ms_q("$up TGajiTHR set GajiOtorisasi='$pilih' WHERE KaryNomor='$nik' AND GajiTahun='$gaji' AND GajiTHRJenis='P'");
								//echo"$pilih  - $nik<br>";
						$no_gaji++;}
			?>
            
            <div class="alert alert-dismissible alert-success">
  				<button type="button" class="close" data-dismiss="alert">&times;</button>
 			 <strong>Well done!</strong> You successfully Save <?php echo"</i>$jum_vkry</i> Data"; ?>
</div>      <meta http-equiv="refresh" content="0; url=?HLM=FIN_M&SUB=FIN_M_FIN_GAJI_REKAP_THR_M&SUB_CHILD=FIN_M_FIN_GAJI_REKAP_THR_M_PASKAH">
            <?php } ?>
        </form>
</body>
<?php } ?>