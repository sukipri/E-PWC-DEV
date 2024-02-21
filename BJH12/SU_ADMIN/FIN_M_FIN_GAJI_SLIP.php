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
              
                <!-- -->
                 <?php
			$vgj_02 = $ms_q("$sl TOP 1 KaryNomor,GajiBulan,GajiPokokAK,GajiPokokVar,GajiPokokJml,GajiJabatanAK,GajiJabatanVar,GajiJabatanJml,GajiFungsiAK,GajiFungsiVar,GajiFungsiJml,GajiKhususAK,GajiKhususVar,GajiKhususJml,GajiPeralihan,GajiKeluargaAK,GajiKeluargaJml,GajiKeluargaVar FROM TGaji WHERE  KaryNomor='$vkryy_up[KaryNomor]' AND GajiStatus='1' AND GajiBulan='$YR$MH'  order by GajiBulan desc");
						$vgjj_02 = $ms_fas($vgj_02);
								
								$nom_vgj01a = @$nf($vgjj_02['GajiPokokVar']);
								$nom_vgj01b = @$nf($vgjj_02['GajiPokokJml']);
								
								$nom_vgj02a = @$nf($vgjj_02['GajiJabatanVar']);
								$nom_vgj02b = @$nf($vgjj_02['GajiJabatanJml']);
								
								$nom_vgj03a = @$nf($vgjj_02['GajiFungsiVar']);
								$nom_vgj03b = @$nf($vgjj_02['GajiFungsiJml']);
								
								$nom_vgj04a = @$nf($vgjj_02['GajiKhususVar']);
								$nom_vgj04b = @$nf($vgjj_02['GajiKhususJml']);
								
								$nom_vgj05a = @$nf($vgjj_02['GajiPeralihan']);
								
								$nom_vgj06a = @$nf($vgjj_02['GajiKeluargaAK']);
								$nom_vgj06b = @$nf($vgjj_02['GajiKeluargaJml']);
								
		
		?>
                <table width="100%" border="0" class="table table-bordered">
                  <tr class="table-primary">
                    <td width="188">Point & Gaji pokok</td>
                    <td width="171">Point & Tunjangan jabatan</td>
                    <td width="215">Point & Tunjangan Fungsi</td>
                    <td width="214">Point & Tunjangan Khusus</td>
                  </tr>
                  <tr>
                    <td>
                    <i class="fas fa-money-bill-wave"></i>&nbsp<?php echo"$nom_vgj01a"; ?><br> 	
              		<i class="fas fa-award"></i>&nbsp<?php echo"$vgjj_02[GajiPokokAK]"; ?> <hr>
                      <i class="fas fa-calculator"></i>&nbsp<?php echo"$nom_vgj01b"; ?>
                      <?php echo"<b>@$vgjj_02[GajiBulan]</b>"; ?>
			
               
                    </td>
                    <td>
                   <i class="fas fa-money-bill-wave"></i>&nbsp<?php echo"$nom_vgj02a"; ?><br> 	
              		<i class="fas fa-award"></i>&nbsp<?php echo"$vgjj_02[GajiJabatanAK]"; ?> <hr>
                      <i class="fas fa-calculator"></i>&nbsp<?php echo"$nom_vgj02b"; ?>
                      <?php echo"<b>@$vgjj_02[GajiBulan]</b>"; ?>
                    </td>
                    <td>
                     <i class="fas fa-money-bill-wave"></i>&nbsp<?php echo"$nom_vgj03a"; ?><br> 	
              		<i class="fas fa-award"></i>&nbsp<?php echo"$vgjj_02[GajiFungsiAK]"; ?> <hr>
                      <i class="fas fa-calculator"></i>&nbsp<?php echo"$nom_vgj03b"; ?>
                      <?php echo"<b>@$vgjj_02[GajiBulan]</b>"; ?>
                    
                    </td>
                    <td>
                     <i class="fas fa-money-bill-wave"></i>&nbsp<?php echo"$nom_vgj04a"; ?><br> 	
              		<i class="fas fa-award"></i>&nbsp<?php echo"$vgjj_02[GajiKhususAK]"; ?> <hr>
                      <i class="fas fa-calculator"></i>&nbsp<?php echo"$nom_vgj04b"; ?>
                      <?php echo"<b>@$vgjj_02[GajiBulan]</b>"; ?>
                    </td>
                  </tr>
                  <tr class="table-primary">
                    <td>Tunjangan Peralihan</td>
                    <td>Tunjangan Keluarga</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><i class="fas fa-calculator"></i>&nbsp<?php echo"$nom_vgj05a"; ?></td>
                    <td>
                    <i class="fas fa-money-bill-wave"></i>&nbsp<?php echo"$nom_vgj06a"; ?><br> 	
              		<i class="fas fa-award"></i>&nbsp<?php echo"$vgjj_02[GajiKeluargaAK]"; ?> <hr>
                      <i class="fas fa-calculator"></i>&nbsp<?php echo"$nom_vgj06b"; ?>
                      <?php echo"<b>@$vgjj_02[GajiBulan]</b>"; ?>
                    </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                </table>
                <!-- -->
                
                <!-- -->
                <table width="100%" class=" table table-striped table-sm table-hover">
                  <tr class="table-warning">
                    <td colspan="7">POTONGAN RS &amp; BMKK</td>
                  </tr>
               <?php
				$vgj = $ms_q("$call_sel TGaji WHERE  KaryNomor='$vkryy_up[KaryNomor]' AND GajiStatus='1' AND GajiBulan='$YR$MH' order by GajiBulan desc");
					
										while($vgjj = $ms_fas($vgj)){
											
											$hit_astek = $vgjj['GajiPotAstek'] + $vgjj['GajiPotJamPensiun'];
							//POKOK
								$num_vgj = @$nf($vgjj['GajiPokokJml']);
								$num_vgj_k = @$nf($vgjj['GajiKeluargaJml']);
								$num_vgj_f = @$nf($vgjj['GajiFungsiJml']);
								$num_vgj_gk = @$nf($vgjj['GajiKhususJml']);
								$num_vgj_j = @$nf($vgjj['GajiJabatanJml']);
								$num_vgj_pr = @$nf($vgjj['GajiPeralihan']);
								$num_vgj_tkt = @$nf($vgjj['GajiTKT']);
								$num_vgj_kom = @$nf($vgjj['GajiKompensasi']);
								$num_vgj_in = @$nf($vgjj['GajiInsentif']);
								$num_vgj_lm = @$nf($vgjj['GajiLembur']);
								$num_vgj_bns = @$nf($vgjj['GajiBonus']);
								$num_vgj_bnsg = @$nf($vgjj['GajiBonusBagian']);
							//Potongan
								$num_vgj_ydp = @$nf($vgjj['GajiPotYDP']);
								$num_vgj_mn = @$nf($vgjj['GajiPotManulife']);
								$num_vgj_bpjs = @$nf($hit_astek);
								$num_vgj_pph = @$nf($vgjj['GajiPph21']);
							//Potongaan RS
								$num_vgj_obat = @$nf($vgjj['GajiPotObat']);
								$num_vgj_prw = @$nf($vgjj['GajiPotPerawatan']);
								$num_vgj_studi = @$nf($vgjj['GajiPotStudi']);
								$num_vgj_bank = @$nf($vgjj['GajiPotBank']);
								$num_vgj_srg = @$nf($vgjj['GajiPotSeragam']);
								$num_vgj_PPNI = @$nf($vgjj['GajiPotPPNI']);
								$num_vgj_lain = @$nf($vgjj['GajiPotLain']);
							//Potongan BMKK
								$num_vgj_bmkk = @$nf($vgjj['GajiBMKKIuran']);
								$num_vgj_bmkka = @$nf($vgjj['GajiBMKKAngsuran']);
								//$num_vgj_bmkk = @$nf($vgjj['GajiBMKKIuran']);
								$num_vgj_tb = @$nf($vgjj['GajiBMKKTabungan']);
								$num_vgj_mati = @$nf($vgjj['GajiBMKKKematian']);
								$num_vgj_ek = @$nf($vgjj['GajiBMKKPotElektronik']);
								$num_vgj_br = @$nf($vgjj['GajiBMKKPotBarang']);
								$num_vgj_pbmkk = @$nf($vgjj['GajiPotBMKK']);
									$num_vgj_bpl = @$nf($vgjj['GajiBMKKPotLain']);
								
							//Formulaa Total Gaji
								
						$hit_total = $vgjj['GajiPokokJml'] + $vgjj['GajiKeluargaJml'] +  $vgjj['GajiFungsiJml'] + $vgjj['GajiKhususJml'] + $vgjj['GajiJabatanJml'] + $vgjj['GajiPeralihan'] + $vgjj['GajiTKT'] + $vgjj['GajiKompensasi'] + $vgjj['GajiInsentif'] + $vgjj['GajiLembur'] + + $vgjj['GajiBonus'] +$vgjj['GajiBonusBagian'];
						$hit_total_pot = $vgjj['GajiPotYDP'] + $vgjj['GajiPotManulife'] + $hit_astek + $vgjj['GajiPph21'];
						$hit_total_pot_rs = $vgjj['GajiPotObat'] + $vgjj['GajiPotPerawatan'] + $vgjj['GajiPotStudi'] +$vgjj['GajiPotBank'] + $vgjj['GajiPotSeragam'] + $vgjj['GajiPotPPNI'] + $vgjj['GajiPotLain'];
						$hit_total_pot_bmkk = $vgjj['GajiBMKKIuran'] + $vgjj['GajiBMKKAngsuran'] + $vgjj['GajiBMKKTabungan'] + $vgjj['GajiBMKKKematian'] + $vgjj['GajiBMKKPotElektronik'] + $vgjj['GajiBMKKPotBarang'] + $vgjj['GajiBMKKPotLain'];
							$hit_total_02 = $hit_total - ($vgjj['GajiPotYDP'] + $hit_astek + $vgjj['GajiPotManulife'] + $vgjj['GajiPph21'] + $vgjj['GajiPotAJB']); 
								$hit_total_03 = $hit_total_02 - ($hit_total_pot_rs + $hit_total_pot_bmkk); 
									
									//pembulatan
										$num_gajibersih = @$nf($vgjj['GajiBersih']);
										$num_gajibayar = @$nf($vgjj['GajiDibayar']);
										$rn_total_03 = round($hit_total_03);
										$num_total_pot = @$nf($hit_total_pot);
										$num_total_rs = @$nf($hit_total_pot_rs);
										$num_total = @$nf($hit_total);
										$num_total_02 = @$nf($hit_total_02);
										$num_total_03 = @$nf($rn_total_03);
										$num_total_pot_bmkk = @$nf($hit_total_pot_bmkk);
			
			?>
                  <tr>
                    <td>Obat<br><b><?php echo"Rp.$num_vgj_obat"; ?></b></td>
                    <td>Perawatan<br><b><?php echo"Rp.$num_vgj_prw"; ?></b></td>
                    <td>Studi<br><b><?php echo"Rp.$num_vgj_studi"; ?> </b></td>
                    <td>Bank<br><b><?php echo"Rp.$num_vgj_bank"; ?></b></td>
                    <td>Seragam<br><b><?php echo"Rp.$num_vgj_srg"; ?></b></td>
                    <td>PPNI<br><b><?php echo"Rp.$num_vgj_PPNI"; ?></b></td>
                    <td>Pot.Lain<br><b><?php echo"Rp.$num_vgj_lain"; ?></b></td>
                  </tr>
                  <tr>
                 	 <td>Iuran<br><b><?php echo"Rp.$num_vgj_bmkk"; ?></b></td>
                    <td>Angsuran<br><b><?php echo"Rp.$num_vgj_bmkka"; ?></b></td>
                    <td>Elektronik<br><b><?php echo"Rp.$num_vgj_ek"; ?> </b></td>
                    <td>Tali asih<br><b><?php echo"Rp.$num_vgj_br"; ?></b></td>
                    <td>Tabungan <br><b><?php echo"Rp.$num_vgj_tb"; ?></b></td>
                    <td>Kematian<br><b><?php echo"Rp.$num_vgj_mati"; ?></b></td>
                    <td>Lain<br><b><?php echo"Rp.$num_vgj_bpl"; ?></b></td>
                  </tr>
                  <tr class="table-primary">
                    <td>LEMBUR<br><b><?php echo"Rp.$num_vgj_lm"; ?></b></td>
                    <td>GAJI KOTOR<br><b><?php echo"<b>Rp.$num_total</b>"; ?></b></td>
                    <td>Pot.Resmi<br><b><?php echo"Rp.$num_total_pot"; ?></b></td>
                    <td>Gaji Bersih<br><b><?php echo"Rp.$num_gajibersih"; ?></b></td>
                    <td>Pot.RS<br><b><?php echo"Rp.$num_total_rs"; ?></b></td>
                    <td>Pot.BMKK<br><b><?php echo"Rp.$num_total_pot_bmkk"; ?></b></td>
                    <td>GAJI DITERIMA<br><b><?php echo"Rp.$num_gajibayar"; ?></b></td>
                  </tr>
                  <tr>
                    <td colspan="6">
                   		 
                    	<input type="hidden" name="<?php echo"nik$no"; ?>" value="<?php echo"$vkryy_up[KaryNomor]"; ?>">
                        <input type="hidden" name="<?php echo"gaji$no"; ?>" value="<?php echo"$vgjj[GajiBulan]"; ?>">
                       
						
                          <?php if($vgjj['GajiOtorisasi']=="1" OR $vgjj['GajiOtorisasi']=="4"){ ?>
                        	  <select name="<?php echo"pilih$no"; ?>" class="form-control" style="max-width:10rem;">
                           	<option value="1">Konfirmasi</option>
                            <option value="0">Pending</option>
                           </select>
                        
                          <?php }else{ ?>
                          
                      
                           <select name="<?php echo"pilih$no"; ?>" class="form-control" style="max-width:10rem;">
                           	<option value="0">Pending</option>
                            <option value="1">Konfirmasi</option>
                           </select>
                         
                           <?php } ?>
                          
                           	<input type="hidden" name="<?php echo"nik$no"; ?>" value="<?php echo"$vkryy_up[KaryNomor]"; ?>">
                        <input type="hidden" name="<?php echo"gaji$no"; ?>" value="<?php echo"$vgjj[GajiBulan]"; ?>">
                        
					
            		 
                    </td>
                    <td>  <?php if($vgjj['GajiOtorisasi']=="1" OR $vgjj['GajiOtorisasi']=="4" ){ ?>
                             <a href="#" class="badge bg-success">#Terverif</a>
                          <?php }else{ ?>
                          
                            <a href="#" class="badge bg-danger">#Pending</a>
                          <?php } ?></td>
                  </tr>
                  
                <?php } ?>
              </table>
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
		  	$vgj_jum_acc = $ms_q("$call_sel TGaji WHERE   GajiOtorisasi='1' AND GajiBulan='$YR$MH' order by GajiBulan desc");
				$vgjj_jum_acc = $ms_nr($vgj_jum_acc);
			$vgj_jum_bacc = $ms_q("$call_sel TGaji WHERE   GajiOtorisasi='0' AND GajiBulan='$YR$MH' order by GajiBulan desc");
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
								$ms_q("$up TGaji set GajiOtorisasi='$pilih' WHERE KaryNomor='$nik' AND GajiBulan='$gaji'");
								//echo"$pilih  - $nik<br>";
						$no_gaji++;}
			?>
            
            <div class="alert alert-dismissible alert-success">
  				<button type="button" class="close" data-dismiss="alert">&times;</button>
 			 <strong>Well done!</strong> You successfully Save <?php echo"</i>$jum_vkry</i> Data"; ?>
</div>      <meta http-equiv="refresh" content="0; url=?HLM=FIN_M&SUB=FIN_M_FIN_GAJI_SLIP">
            <?php } ?>
        </form>
</body>
<?php } ?>