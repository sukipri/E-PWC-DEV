<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
		<b>Rekap Gaji</b>
        ( * Tekan F3 untuk melakukan pencarian )
        <form method="post">
    
          <table width="100%" style="max-width:40rem;" border="0" class="table table-borderless">
            <tr>
              <td width="49%"><input type="text" name="nik" required class="form-control" autocomplete="off" placeholder="Masukan Nama..."></td>
              <td width="51%"><button class="btn btn-success" name="go"><i class="fas fa-search"></i> Cari</button>
            </td>
            </tr>
          </table>
      
        	<br>
        <?php
		$IDKRY = @$sql_slash($_GET['IDKRY']);
		$IDGAJI = @$sql_slash($_GET['IDGAJI']);
		$IDPINJAM = @$sql_slash($_GET['IDPINJAM']);
		$IDTHNPINJAM = @$sql_slash($_GET['IDTHNPINJAM']);
			if(isset($_GET['TUTUP'])){
				$save_pinjam = $ms_q("$up TKaryawanPinjam  set Verif='2' WHERE KaryNomor='$IDKRY' AND PinjamNomor='$IDPINJAM' AND BulanMulaiPotong='$IDTHNPINJAM' ");	
		if($save_pinjam){ ?>
				<div class="alert alert-dismissible alert-success">
  						<strong>Well done!</strong> You successfully Update <a href="#" class="alert-link">this important alert message</a>.
				</div>
                
                <?php }else{ ?>
			
            <?php }} ?>
          	
			
            
		<?php		
		if(isset($_GET['PILIH'])){
				$save = $ms_q("$up Tgaji set GajiOtorisasi='1' WHERE KaryNomor='$IDKRY' AND GajiBulan='$IDGAJI' ");
				
			
		}
		
		if(isset($_GET['BATAL'])){
				$save = $ms_q("$up Tgaji set GajiOtorisasi='0' WHERE KaryNomor='$IDKRY' AND GajiBulan='$IDGAJI' ");
				
			
		}
			if(isset($_POST['go'])){
				
				$nik = @$sql_slash($_POST['nik']);
				
		
				
					$vkry_up = $ms_q("$sl KaryNomor,KaryNama,KaryNoUrut,UnitKode,KaryBMKKPotElektronikNomor,KaryBMKKPotElektronikAngsuran,KaryBMKKPotAngsuran,KaryBMKKPotNomor FROM TKaryawan WHERE  KaryNama LIKE '%$nik%' AND NOT KaryStatus='91' AND NOT KaryStatus='99'  AND NOT KaryStatus='92'  AND NOT KaryStatus='94'  AND NOT KaryStatus='93' order by KaryNoUrut,KaryNoSub,KaryNama asc");
						$no = 1;
						while($vkryy_up = $ms_fas($vkry_up)){
								$vun = $ms_q("$call_sel TUnitPrs WHERE UnitKode='$vkryy_up[UnitKode]'");
										$vunn = $ms_fas($vun);
											

								
		?>
        
        
        <div class="card border-primary mb-3"  style="max-width: 60rem;">
          <div class="card-header"><?php echo"<b>#$no</b>";  ?><br><?php echo"$vkryy_up[KaryNama]"; ?><br><?php echo"$vkryy_up[KaryNomor]"; ?><br><?php echo"$vunn[UnitNama]"; ?></div>
          <div class="card-body">
           <!-- -->
           <ul>
           	<?php
				$vgj = $ms_q("$sl TOP 10 * FROM TGaji WHERE  KaryNomor='$vkryy_up[KaryNomor]' AND GajiStatus='1' order by GajiBulan desc");
										while($vgjj = $ms_fas($vgj)){
			
			?>
            	<?php 
					if($vgjj['GajiOtorisasi']=="0"){
				?>
                <a href="<?php echo"#gaji$vgjj[GajiBulan]$no"; ?>"   data-toggle="modal" data-target="<?php echo"#gaji$vgjj[GajiBulan]$no"; ?>"> <i class="fas fa-plus"></i>&nbsp; <?php echo"$vgjj[GajiBulan]"; ?></a>&nbsp;<b><i class="fas fa-toggle-off"></i></b><br>
                <?php }elseif($vgjj['GajiOtorisasi']=="1" OR $vgjj['GajiOtorisasi']=="4" ){ ?>
                  <a href="<?php echo"#gaji$vgjj[GajiBulan]$no"; ?>"   data-toggle="modal" data-target="<?php echo"#gaji$vgjj[GajiBulan]$no"; ?>"><i class="fas fa-plus"></i>&nbsp; <?php echo"$vgjj[GajiBulan]"; ?></a>&nbsp;<b><i class="fas fa-toggle-on"></i></b><br>
                <?php } ?>
                 <!-- Modal 1 -->
        <div class="modal fade" id="<?php echo"gaji$vgjj[GajiBulan]$no"; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Preview Gaji</h5>
                          </div>
                          <div class="modal-body">
                         <?php echo"<b>Periode $vgjj[GajiBulan]</b>"; ?>
                         
                         <!-- content gaji -->
                         
                         <?php 
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
								$num_vgj_pphr = @$nf($vgjj['GajiPphRetur']);
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
								$num_vgj_bpl = @$nf($vgjj['GajiBMKKPotLain']);
								
							//Formulaa Total Gaji
								
						$hit_total = $vgjj['GajiPokokJml'] + $vgjj['GajiKeluargaJml'] +  $vgjj['GajiFungsiJml'] + $vgjj['GajiKhususJml'] + $vgjj['GajiJabatanJml'] + $vgjj['GajiPeralihan'] + $vgjj['GajiTKT'] + $vgjj['GajiKompensasi'] + $vgjj['GajiInsentif'] + $vgjj['GajiLembur'] + + $vgjj['GajiBonus'] +$vgjj['GajiBonusBagian'] ;
						$hit_total_pot = $vgjj['GajiPotYDP'] + $vgjj['GajiPotManulife'] + $hit_astek + $vgjj['GajiPph21'];
						$hit_total_pot_rs = $vgjj['GajiPotObat'] + $vgjj['GajiPotPerawatan'] + $vgjj['GajiPotStudi'] +$vgjj['GajiPotBank'] + $vgjj['GajiPotSeragam'] + $vgjj['GajiPotPPNI'] + $vgjj['GajiPotLain'];
						$hit_total_pot_bmkk = $vgjj['GajiBMKKIuran'] + $vgjj['GajiBMKKAngsuran'] + $vgjj['GajiBMKKTabungan'] + $vgjj['GajiBMKKKematian'] + $vgjj['GajiBMKKPotElektronik'] + $vgjj['GajiBMKKPotBarang'] + $vgjj['GajiBMKKPotLain'];
							$hit_total_02 = $hit_total - ($vgjj['GajiPotYDP'] + $hit_astek + $vgjj['GajiPotManulife'] + $vgjj['GajiPph21']); 
								$hit_total_03 = $hit_total_02 - ($hit_total_pot_rs + $hit_total_pot_bmkk); 
									
									//pembulatan
										$num_gajibersih = @$nf($vgjj['GajiBersih']);
										$num_gajibayar = @$nf($vgjj['GajiDibayar']);
										$rn_total_03 = round($hit_total_03);
										$num_total_pot = @$nf($hit_total_pot);
										$num_total = @$nf($hit_total);
										$num_total_02 = @$nf($hit_total_02);
										$num_total_03 = @$nf($rn_total_03);
										$num_total_pot_bmkk = @$nf($hit_total_pot_bmkk);
						 
						 ?>
                         
                         <!-- Content 2 -->
          <table width="100%" border="0" class="table table-striped" >
	
      <tr>
        <td colspan="2" class="green lighten-1"><b>#Penghasilan</b></td>
      </tr>
      <tr>
        <td width="242">Gaji Pokok</td>
        <td width="836" align="right" style="text-align:right;"><?php echo"RP.$num_vgj"; ?></td>
      </tr>
      <tr>
        <td>Tunjangan Keluarga</td>
        <td align="right" style="text-align:right;"><?php echo"Rp.$num_vgj_k"; ?></td>
      </tr>
      <tr>
        <td>Tunjangan Fungsional</td>
        <td align="right" style="text-align:right;"><?php echo"Rp.$num_vgj_f"; ?></td>
      </tr>
      <tr>
        <td>Tunjangan Khusus</td>
        <td align="right" style="text-align:right;"><?php echo"Rp.$num_vgj_gk"; ?></td>
      </tr>
      <tr>
        <td>Tunjangan Jabatan</td>
        <td align="right" style="text-align:right;"><?php echo"Rp.$num_vgj_j"; ?></td>
      </tr>
      <tr>
        <td>Tunjangan Peralihan</td>
        <td align="right" style="text-align:right;"><?php echo"Rp.$num_vgj_pr"; ?></td>
      </tr>
      <!--
      <tr>
        <td>TK&amp;T</td>
        <td align="right" style="text-align:right;"><?php echo"Rp.$num_vgj_tkt"; ?></td>
      </tr>
      -->
      <tr>
        <td>Kompensasi</td>
        <td align="right" style="text-align:right;"><?php echo"Rp.$num_vgj_kom"; ?></td>
      </tr>
      <tr>
        <td>Insentif</td>
        <td align="right" style="text-align:right;"><?php echo"Rp.$num_vgj_in"; ?></td>
      </tr>
      <tr>
        <td>Lembur</td>
        <td align="right " style="text-align:right;"><?php echo"Rp.$num_vgj_lm"; ?></td>
      </tr>
      <tr>
        <td>Bonus</td>
        <td align="right" style="text-align:right;"><?php echo"Rp.$num_vgj_bns"; ?></td>
      </tr>
      <tr>
        <td>Bonus Bagian</td>
        <td align="right" style="text-align:right;"><?php echo"Rp.$num_vgj_bnsg"; ?></td>
      </tr>
      <tr class="green lighten-2">
        <td>Penghasilan Kotor</td>
        <td align="right" style="text-align:right;"><?php echo"<b>Rp.$num_total</b>"; ?></td>
      </tr>
    </table>
    <br>
<table width="100%" border="0" class="table table-striped" >
      <tr class="green lighten-3">
        <td colspan="2"><b>#Potongan Iuran & Pajak</b></td>
  </tr>
      <tr>
        <td width="22%">Iuran Dapen YAKKUM</td>
        <td width="78%" style="text-align:right;"><?php echo"Rp.$num_vgj_ydp"; ?></td>
      </tr>
      <tr>
        <td>Iuran BPJS TK</td>
        <td style="text-align:right;"><?php echo"Rp.$num_vgj_bpjs"; ?></td>
      </tr>
      <tr>
        <td>Iuran DPLK</td>
        <td style="text-align:right;"><?php echo"Rp.$num_vgj_mn"; ?></td>
      </tr>
      <tr>
        <td>PPH Ps.21</td>
        <td style="text-align:right;"><?php echo"Rp.$num_vgj_pph"; ?></td>
      </tr>
      <tr class="green lighten-5">
        <td>Jumlah Potongan</td>
        <td style="text-align:right;"><?php echo"<b>Rp.$num_total_pot</b>"; ?></td>
      </tr>
      <tr class="green lighten-4">
        <td>PPH Ps.21 DTP</td>
        <td style="text-align:right;"><?php echo"Rp.$num_vgj_pphr"; ?></td>
      </tr>
      <tr class="green lighten-4">
    <td>Penghasilan Bersih</td>
        <td style="text-align:right;"><?php echo"<b>Rp.$num_gajibersih</b>"; ?></td>
  </tr>
    </table>
    <br>
<table width="100%" border="0" class="table table-striped">
      <tr>
        <td colspan="2" class="green lighten-1"><b>Potongan Lainya</b></td>
      </tr>
      <tr>
        <td width="22%">Obat</td>
        <td width="78%" style="text-align:right;"><?php echo"Rp.$num_vgj_obat"; ?></td>
      </tr>
      <tr>
        <td>Biaya perawatan</td>
        <td style="text-align:right;"><?php echo"Rp.$num_vgj_prw"; ?></td>
      </tr>
      <tr>
        <td>Study</td>
        <td style="text-align:right;"><?php echo"Rp.$num_vgj_studi"; ?></td>
      </tr>
      <tr>
        <td>Bank</td>
        <td style="text-align:right;"><?php echo"Rp.$num_vgj_bank"; ?></td>
      </tr>
      <tr>
        <td>Seragam</td>
        <td style="text-align:right;"><?php echo"Rp.$num_vgj_srg"; ?></td>
      </tr>
      <tr>
        <td>PPNI</td>
        <td style="text-align:right;"><?php echo"Rp.$num_vgj_PPNI"; ?></td>
      </tr>
      <tr>
        <td>Lain-Lain</td>
        <td style="text-align:right;"><?php echo"Rp.$num_vgj_lain"; ?></td>
      </tr>
      <tr>
        <td colspan="2" class="green lighten-1"><b>Potongan BMKK</b></td>
  </tr>
      <tr>
        <td>Iuran BMKK</td>
        <td style="text-align:right;"><?php echo"Rp.$num_vgj_bmkk"; ?></td>
      </tr>
      <tr>
        <td>Angsuran</td>
        <td style="text-align:right;">
			<?php echo"Rp.$num_vgj_bmkka"; ?>
            
            <?php
			$vpj_sw = $ms_q("$call_sel  TKaryawanPinjam WHERE KaryNomor='$vkryy_up[KaryNomor]' AND PinjamJenis='01'");
				$vpj_sww = $ms_fas($vpj_sw);
					$vgjj02_cl = $ms_q("$sl GajiBMKKPotNomor,GajiBMKKAngsuran FROM TGaji WHERE  GajiBMKKPotNomor='$vpj_sww[PinjamNomor]' AND GajiBulan BETWEEN '$vpj_sww[BulanMulaiPotong]' AND '$vgjj[GajiBulan]' AND  NOT GajiBMKKPotNomor=''");
							$vgjj02_cll = $ms_nr($vgjj02_cl);
						//--//
				if($vpj_sww['Verif']=="2"){
					
				}else{
							$hit_cl = $vgjj02_cll;
								if($vgjj02_cll > 0) {
										echo"<b>$hit_cl x</b>";
										?>
                                        <a href="<?php echo"?HLM=FIN_M&SUB=FIN_M_FIN_GAJI&IDKRY=$vkryy_up[KaryNomor]&IDGAJI=$vgjj[GajiBulan]&IDPINJAM=$vpj_sww[PinjamNomor]&IDTHNPINJAM=$vpj_sww[BulanMulaiPotong]&TUTUP=TUTUP#gaji$vgjj[GajiBulan]$no"; ?>" class="badge badge-info">Tutup Angsuran</a>	
								<?php }elseif($vgjj02_cll < 1){ }} ?>
					
        
        </td>
      </tr>
      <tr>
        <td>Tali Asih</td>
        <td style="text-align:right;"><?php echo"Rp.$num_vgj_br"; ?></td>
      </tr>
      <tr>
        <td>Tabungan</td>
        <td style="text-align:right;"><?php echo"Rp.$num_vgj_tb"; ?></td>
      </tr>
      <tr>
        <td>kematian</td>
        <td style="text-align:right;"><?php echo"Rp.$num_vgj_mati"; ?></td>
      </tr>
      <tr>
        <td> Elektronik <br>
     
        <?php //echo"$vkryy_up[KaryBMKKPotElektronikNomor]"; ?>
        </td>
        <td style="text-align:right;">
			<?php echo"Rp.$num_vgj_ek"; ?>
                  <?php
			$vpj02_sw = $ms_q("$call_sel  TKaryawanPinjam WHERE KaryNomor='$vkryy_up[KaryNomor]' AND PinjamJenis='04'");
				$vpj02_sww = $ms_fas($vpj02_sw);
					$vgjj03_cl = $ms_q("$sl GajiBulan,GajiBMKKPotElektronikNomor,GajiBMKKPotElektronik FROM TGaji WHERE  GajiBMKKPotElektronikNomor='$vpj02_sww[PinjamNomor]' AND GajiBulan BETWEEN '$vpj02_sww[BulanMulaiPotong]' AND '$vgjj[GajiBulan]' AND  NOT GajiBMKKPotElektronikNomor='' order by GajiBulan desc");
							$vgjj03_cll = $ms_nr($vgjj03_cl);
			if($vpj02_sww['Verif']=="2"){
				
			}else{
					
						//--//
							$hit03_cl = $vgjj03_cll;
								if($hit03_cl > 0 ){
								echo"<b>$hit03_cl x</b>";
								?>
                                <a href="<?php echo"?HLM=FIN_M&SUB=FIN_M_FIN_GAJI&IDKRY=$vkryy_up[KaryNomor]&IDGAJI=$vgjj[GajiBulan]&IDPINJAM=$vpj02_sww[PinjamNomor]&IDTHNPINJAM=$vpj02_sww[BulanMulaiPotong]&TUTUP=TUTUP#gaji$vgjj[GajiBulan]$no"; ?>" class="badge badge-primary">Tutup Angsuran</a>	
								<?php }elseif($hit03_cl < 1 ) { ?>
									
			<?php }} ?>
        </td>
      </tr>
      <tr class="green lighten-4">
        <td>Potongan RS</td>
        <td style="text-align:right;"><?php echo"<b>Rp.$hit_total_pot_rs</b>"; ?></td>
      </tr>
      <tr class="green lighten-3">
        <td>Potongan BMKK</td>
        <td style="text-align:right;"><?php echo"<b>Rp.$num_total_pot_bmkk</b>"; ?></td>
      </tr>
      <tr class="green lighten-1">
        <td>Jumlah Diterima</td>
        <td style="text-align:right;"><?php echo"<b>Rp.$num_gajibayar</b>"; ?></td>
      </tr>
    </table>
                         
                         <!-- -->
                         
                            <hr>
                            <!-- <input type="text" name="jbt_struk" class="form-control" placeholder="Structural Position..."> -->
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <!-- <button  class="btn btn-primary" name="pilih">Konfirmasi Gaji</button> -->
                            <?php 
							if($vgjj['GajiOtorisasi']=="0"){
							?>
                            <a href="<?php echo"?HLM=FIN_M&SUB=FIN_M_FIN_GAJI&IDKRY=$vkryy_up[KaryNomor]&IDGAJI=$vgjj[GajiBulan]&PILIH=PILIH#gaji$vgjj[GajiBulan]$no"; ?>" class="btn btn-primary">Konfrimasi Gaji</a>
                            <?php }elseif($vgjj['GajiOtorisasi']=="1"){  ?>
                            
                            <a href="<?php echo"?HLM=FIN_M&SUB=FIN_M_FIN_GAJI&IDKRY=$vkryy_up[KaryNomor]&IDGAJI=$vgjj[GajiBulan]&BATAL=BATAL#gaji$vgjj[GajiBulan]$no"; ?>" class="btn btn-primary">Batalkan Konfirmasi</a>
                            <?php } ?>
							 
                          </div>
                        </div>
                      </div>
              </div>
            
            <?php } ?>
             </ul>
            </div>
 		 </div>
        <?php /*} */$no++;}}?>
        </form>
        
</body>
<?php } ?>