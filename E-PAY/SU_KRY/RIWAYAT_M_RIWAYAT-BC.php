<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
            <?php 	if($uu['akses']==4){  ?>
<body>
	<br>
	<span style="font-size:20px ">-Riwayat Upah-</span>
	<form method="post">
	  <table width="200" border="0" class="table">
          <tr>
            <td width="135">
			<select name="tahun">
                  <option value = "">Tahun</option>
                  	<?php
						$no_tahun = 2008;
							while($no_tahun < 2030){
								echo"<option value=$no_tahun>$no_tahun</option>";
							$no_tahun++;}
					
						?>
              </select>  
			</td>
            <td width="55">
			<select name="bulan">
                  <option value = "">Bulan</option>
                  	<?php
						$no_bulan = 1;
							//$hit_bulan= $vdcc['JalanNoUrut'];
									
							while($no_bulan < 13){
								$hit_zero = sprintf("%02d", $no_bulan);
								echo"<option value=$hit_zero>$hit_zero</option>";
							$no_bulan++;}
					
						?>
              </select>  </td>
            <td width="55">
			<button class="waves-effect green darken-2 waves-light btn" name="go">GO</button>
			</td>
          </tr>
        </table>
	</form>
			<?php
				if(isset($_POST['go'])){
					$tahun = @$_POST['tahun'];
					$bulan = @$_POST['bulan'];
						$hit_date = "$tahun$bulan";
						$vgj = $ms_q("$call_sel TGaji WHERE GajiBulan='$hit_date' AND KaryNomor='$vkryy[KaryNomor]' AND GajiStatus='1'");
							$vgjj = $ms_fas($vgj);
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
								$num_vgj_bpjs = @$nf($vgjj['GajiPotPremi']);
								$num_vgj_pph = @$nf($vgjj['GajiPph21']);
								
							//Formulaa Total Gaji
						$hit_total = $vgjj['GajiPokokJml'] + $vgjj['GajiKeluargaJml'] +  $vgjj['GajiFungsiJml'] + $vgjj['GajiKhususJml'] + $vgjj['GajiJabatanJml'] + $vgjj['GajiPeralihan'] + $vgjj['GajiTKT'] + $vgjj['GajiKompensasi'] + $vgjj['GajiInsentif'] + $vgjj['GajiLembur'] + + $vgjj['GajiBonus'] +$vgjj['GajiBonusBagian'] ;
								$num_total = @$nf($hit_total);
								
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
        <td>Tuni.Fungsional</td>
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
      <tr>
        <td>TK&amp;T</td>
        <td align="right" style="text-align:right;"><?php echo"Rp.$num_vgj_tkt"; ?></td>
      </tr>
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
<table width="100%" border="0">
      <tr class="green lighten-3">
        <td colspan="2"><b>#Potongan Iuran</b></td>
  </tr>
      <tr>
        <td width="22%">Iur Dapen YAKKUM</td>
        <td width="78%" style="text-align:right;"><?php echo"Rp.$num_vgj_ydp"; ?></td>
      </tr>
      <tr>
        <td>Iur BPJS TK</td>
        <td style="text-align:right;"><?php echo"Rp.$num_vgj_bpjs"; ?></td>
      </tr>
      <tr>
        <td>Iur DPLK</td>
        <td style="text-align:right;">&nbsp;</td>
      </tr>
      <tr>
        <td>PPH Ps.21</td>
        <td style="text-align:right;"><?php echo"Rp.$num_vgj_pph"; ?></td>
      </tr>
    </table>
<?php } ?>
</body>
  <?php
		}else{
		  include'../logic/H_LOCATION.php';
		} }
		ob_flush();
	?>

