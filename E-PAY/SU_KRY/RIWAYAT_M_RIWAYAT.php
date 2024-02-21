<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
            <?php 	if($uu['akses']==4){  ?>
<body>
	<br>
	<span style="font-size:20px "><a href="HOME.php"><i class="fas fa-angle-double-left"></i></a> &nbsp; || Daftar gaji </span>
	<form method="post">
	  <table width="362" border="0" class="table">
      <tr>
            <td width="268">
	<select name="tahun" required>
                  <option value ="">Periode</option>
                  	<?php
								$vgj_02 = $ms_q("$sl GajiBulan,KaryNomor FROM TGaji  WHERE KaryNomor='$vkryy[KaryNomor]' AND GajiStatus='1' AND GajiOtorisasi='4' order by GajiBulan desc");
									while($vgjj_02 = $ms_fas($vgj_02)){
										echo"<option value=$vgjj_02[GajiBulan]>$vgjj_02[GajiBulan]</option>";
									}
					
						?>
              </select>  
    
		</td>
        <td width="79"><button class="waves-effect green darken-2 waves-light btn" name="go">GO</button></td>
            <td width="10">&nbsp;			</td>
        </tr>
        </table>
</form>
			<style>
			.fixed_btm {
			 background-color: #f8f6f6;
				position: fixed;
				width: 100%;
				height: 100px;
				opacity: 0.7;
				z-index: 1;
				top: 0;
				left: 0;
			} 
			</style>
			<?php
				if(isset($_POST['go'])){
					$tahun = @$_POST['tahun'];
					$bulan = @$_POST['bulan'];
						echo"<div>";
						echo"Date-Time $date_html5 $time_html5";
						echo"<br>";	
						echo"NIK  :$vkryy[KaryNomor]<br>";
						echo"Nama :$vkryy[KaryNama]<hr>";
						echo"<b>Periode Gaji $tahun $bulan</b>";	
						echo"</div>";
						$hit_date = "$tahun$bulan";
						$vgj = $ms_q("$call_sel TGaji WHERE GajiBulan='$hit_date' AND KaryNomor='$vkryy[KaryNomor]' AND GajiStatus='1'");
							$vgjj = $ms_fas($vgj);
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
                $num_vgj_mod = @$nf($vgjj['GajiMOD']);
								$num_vgj_bns = @$nf($vgjj['GajiBonus']);
								$num_vgj_bnsg = @$nf($vgjj['GajiBonusBagian']);
                $num_vgj_bnsrsp = @$nf($vgjj['GajiBonusResep']);
                $num_vgj_rapel = @$nf($vgjj['GajiRapel']);
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
                $num_vgj_skrl = @$nf($vgjj['GajiPotSukarela']);

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
								
						$hit_total = $vgjj['GajiPokokJml'] + $vgjj['GajiKeluargaJml'] +  $vgjj['GajiFungsiJml'] + $vgjj['GajiKhususJml'] + $vgjj['GajiJabatanJml'] + $vgjj['GajiPeralihan'] + $vgjj['GajiTKT'] + $vgjj['GajiKompensasi'] + $vgjj['GajiInsentif'] + $vgjj['GajiLembur'] +  $vgjj['GajiBonus'] + $vgjj['GajiBonusBagian'] + $vgjj['GajiBonusResep'] + $vgjj['GajiMOD'] + $vgjj['GajiRapel'] ;
						$hit_total_pot = $vgjj['GajiPotYDP'] + $vgjj['GajiPotManulife'] + $hit_astek + $vgjj['GajiPph21'];
						$hit_total_pot_rs = $vgjj['GajiPotObat'] + $vgjj['GajiPotPerawatan'] + $vgjj['GajiPotStudi'] +$vgjj['GajiPotBank'] + $vgjj['GajiPotSeragam'] + $vgjj['GajiPotPPNI'] + $vgjj['GajiPotSukarela'] + $vgjj['GajiPotLain'];
						$hit_total_pot_bmkk = $vgjj['GajiBMKKIuran'] + $vgjj['GajiBMKKAngsuran'] + $vgjj['GajiBMKKTabungan'] + $vgjj['GajiBMKKKematian'] + $vgjj['GajiBMKKPotElektronik'] + $vgjj['GajiBMKKPotBarang'] + $vgjj['GajiBMKKPotLain'];
							$hit_total_02 = $hit_total - ($vgjj['GajiPotYDP'] + $hit_astek + $vgjj['GajiPotManulife'] + $vgjj['GajiPph21']); 
								$hit_total_03 = $hit_total_02 - ($hit_total_pot_rs + $hit_total_pot_bmkk); 
								$hit_total_pphr = $hit_total_02 + $vgjj['GajiPphRetur'];
									//pembulatan
										$num_gajibersih = @$nf($vgjj['GajiBersih']);
										$num_gajibayar = @$nf($vgjj['GajiDibayar']);
                    $num_pot_rs = @$nf($hit_total_pot_rs);
                    $num_pot_bmkk = @$nf(	$hit_total_pot_bmkk);
										$num_total_pphr = @$nf($hit_total_pphr);
										$rn_total_03 = round($hit_total_03);
										$num_total_pot = @$nf($hit_total_pot);
										$num_total = @$nf($hit_total);
										$num_total_02 = @$nf($hit_total_02);
										$num_total_03 = @$nf($rn_total_03);
								
			 ?>
    <table width="100%" border="0" class="table striped" >
	
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
        <td>Rapel</td>
        <td align="right " style="text-align:right;"><?php echo"Rp.$num_vgj_rapel"; ?></td>
      </tr>
      
        <?PHP 
            if($vgjj['GajiMOD'] > 0){ ?>
       <tr>
        <td>MOD</td>
        <td align="right " style="text-align:right;"><?php echo"Rp.$num_vgj_mod"; ?></td>
      </tr>
        <?PHP }else{ ?>
        
          <?PHP } ?>
     
      <tr>
        <td>Bonus</td>
        <td align="right" style="text-align:right;"><?php echo"Rp.$num_vgj_bns"; ?></td>
      </tr>
      <tr>
        <td>Bonus Bagian</td>
        <td align="right" style="text-align:right;"><?php echo"Rp.$num_vgj_bnsg"; ?></td>
      </tr>
      <?PHP 
        if($vgjj['GajiBonusResep'] > 0 ){ ?>
      <tr>
        <td>Bonus Resep</td>
        <td align="right" style="text-align:right;"><?php echo"Rp.$num_vgj_bnsrsp"; ?></td>
      </tr>
        <?PHP }else{ ?>

          <?PHP } ?>
      <tr class="green lighten-2">
        <td>Penghasilan Kotor</td>
        <td align="right" style="text-align:right;"><?php echo"<b>Rp.$num_total</b>"; ?></td>
      </tr>
    </table>
    <br>
<table width="100%" border="0" class="table striped" >
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
    <td>Penghasilan Bersih</td>
        <td style="text-align:right;"><?php echo"<b>Rp.$num_total_02</b>"; ?></td>
  </tr>
  <tr class="green lighten-4">
    <td>PPH Ps.21 DTP</td>
    <td style="text-align:right;"><?php echo"Rp.$num_vgj_pphr"; ?></td>
  </tr>
  <tr class="green lighten-4">
    <td>Total Penghasilan</td>
    <td style="text-align:right;"><?php echo"<b>Rp.$num_gajibersih</b>"; ?></td>
  </tr>
    </table>
    <br>
<table width="100%" border="0" class="table striped">
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
        <td>Potongan Sukarela</td>
        <td style="text-align:right;"><?php echo"Rp.$num_vgj_skrl"; ?></td>
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
        <td style="text-align:right;"><?php echo"Rp.$num_vgj_bmkka"; ?>
        <?php
			$vpj_sw = $ms_q("$call_sel  TKaryawanPinjam WHERE KaryNomor='$vkryy[KaryNomor]' AND PinjamJenis='01'");
				$vpj_sww = $ms_fas($vpj_sw);
					$vgjj02_cl = $ms_q("$sl GajiBulan,GajiBMKKPotNomor,GajiBMKKAngsuran,KaryNomor FROM TGaji WHERE  GajiBMKKPotNomor='$vpj_sww[PinjamNomor]' AND GajiBulan BETWEEN '$vpj_sww[BulanMulaiPotong]' AND '$hit_date' AND KaryNomor='$vkryy[KaryNomor]' AND NOT GajiBMKKPotNomor=''");
							$vgjj02_cll = $ms_nr($vgjj02_cl);
			if($vpj_sww['Verif']=="2"){
				
			}else{
						//--//
							$hit_cl = $vgjj02_cll;
								if($hit_cl > 0) {
										echo"<b>$hit_cl x</b>";
								}elseif($hit_cl < 1){
								
				}}
							
		 ?>
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
        <td>ElekTronik</td>
        <td style="text-align:right;"><?php echo"Rp.$num_vgj_ek"; ?>
       
                  <?php
			$vpj02_sw = $ms_q("$call_sel  TKaryawanPinjam WHERE KaryNomor='$vkryy[KaryNomor]' AND PinjamJenis='04'");
				$vpj02_sww = $ms_fas($vpj02_sw);
				
					$vgjj03_cl = $ms_q("$sl GajiBMKKPotElektronikNomor,GajiBMKKPotElektronik FROM TGaji WHERE  GajiBMKKPotElektronikNomor='$vpj02_sww[PinjamNomor]' AND GajiBulan BETWEEN '$vpj02_sww[BulanMulaiPotong]' AND '$hit_date' AND KaryNomor='$vkryy[KaryNomor]' AND NOT GajiBMKKPotElektronikNomor=''");
							$vgjj03_cll = $ms_nr($vgjj03_cl);
				if($vpj02_sww['Verif']=="2"){
					
				}else{
				
						//--//
							$hit03_cl = $vgjj03_cll;
								if($hit03_cl > 0) {
										echo"<b>$hit03_cl x</b>";
				//}
								}elseif($hit03_cl < 1){
								}}
							
		 ?>
        </td>
      </tr>
      <tr class="green lighten-4">
        <td>Pot.lain</td>
         <td style="text-align:right;"><?php echo"Rp.$num_vgj_bpl"; ?></td>
      </tr>
      <tr class="green lighten-4">
        <td>Potongan RS</td>
        <td style="text-align:right;"><?php echo"<b>Rp.$num_pot_rs</b>"; ?></td>
      </tr>
      <tr class="green lighten-3">
        <td>Potongan BMKK</td>
        <td style="text-align:right;"><?php echo"<b>Rp.$num_pot_bmkk</b>"; ?></td>
      </tr>
      <tr class="green lighten-1">
        <td>Jumlah Diterima</td>
        <td style="text-align:right;"><?php echo"<b>Rp.$num_gajibayar</b>"; ?></td>
      </tr>
    </table>
    <br>
    	<a href="<?php echo"RIWAYAT_M_RIWAYAT_CETAK.php?PERIODE=$hit_date##"; ?>" target="_blank" class="btn green darken-3"><i class="fas fa-print"></i>&nbsp;Cetak</a>
         <br><br><br>
<?php } ?>
</body>
  <?php
		}else{
		  include'../logic/H_LOCATION.php';
		} }
		ob_flush();
	?>

