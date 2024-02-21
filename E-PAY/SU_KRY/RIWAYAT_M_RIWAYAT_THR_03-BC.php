<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
            <?php 	if($uu['akses']==4){  ?>
<body>
<br><br>
    <span style="font-size:20px "><a href="HOME.php"><i class="fas fa-angle-double-left"></i></a> &nbsp;  <a href="?HLM=RIWAYAT_M_RIWAYAT_THR">THR Paskah</a>  &nbsp; <a href="?HLM=RIWAYAT_M_RIWAYAT_THR_02">THR Natal</a>   &nbsp;  SHU   </span>
        <form method="post">
          <table width="362" border="0" class="table">
          <tr>
                <td width="268">
                <!-- <span class="badge green">N Natal</span>  <span class=" badge cyan">P Paskah</span> -->
                 <!-- <span class=" badge blue">B Bonus</span> -->
    			<select name="tahun" required>
                      <option value ="">Periode</option>
                        <?php
                                    $vgj_03 = $ms_q("$sl DISTINCT GajiTahun FROM TGajiTHR  WHERE KaryNomor='$vkryy[KaryNomor]' AND GajiStatus='1'  order by GajiTahun desc");
                                        while($vgjj_03 = $ms_fas($vgj_03)){
												//$txt_01 = "";
                                            echo"<option value=$vgjj_03[GajiTahun]>$vgjj_03[GajiTahun]  </option>";
                                        }
                        
                            ?>
                  </select>  
        
            </td>
            <td width="79"><button class="waves-effect green darken-2 waves-light btn" name="go">GO</button></td>
                <td width="10">&nbsp;</td>
            </tr>
          </table>
            <br><br>
             <?php
  			if(isset($_POST['go'])){
						$tahun = @$sql_slash($_POST['tahun']);
						echo"Date-Time $date_html5 $time_html5";
						echo"<br>";	
						echo"NIK  :$vkryy[KaryNomor]<br>";
						echo"Nama :$vkryy[KaryNama]<hr>";
						echo"<b>Periode Tahun SHU $tahun</b>";
            #KONVSERSI
            if($tahun==$YR){
              $persen_pot = "50";
            }elseif($tahun=="2022"){
              $persen_pot = "50";
            }elseif($tahun=="2021"){
              $persen_pot = "60";
            }elseif($tahun=="2020"){
              $persen_pot = "50";
            }elseif($tahun=="2019"){
              $persen_pot = "50";
            }elseif($tahun=="2018"){
              $persen_pot = "50";
            }elseif($tahun=="2017"){
              $persen_pot = "50";    
            }
						
 				 ?>
                
  	<?php
		$vthr_sw = $ms_q("$call_sel TGajiTHR WHERE KaryNomor='$vkryy[KaryNomor]' AND GajiTahun='$tahun' AND GajiOtorisasi='4' AND  GajiTHRJenis='B' AND NOT GajiTHRJenis='P'  order by GajiTahun desc");
				while($vthr_sww = $ms_fas($vthr_sw)){
						//--//
							$hit_gaji_total = $vthr_sww['GajiPokokJml'] +  $vthr_sww['GajiKeluargaJml'] + $vthr_sww['GajiFungsiJml'] + $vthr_sww['GajiJabatanJml'] + $vthr_sww['GajiKhususJml']  ;
							$hit_persen = $persen_pot / 100;
							$hit_gaji_total_bagi = $hit_gaji_total * $hit_persen ;
							//
						$nom_gaji_total_bagi = @$nf($hit_gaji_total_bagi);
						$nom_gaji_total = @$nf($hit_gaji_total);
						$nom_gajipokok_01 = @$nf($vthr_sww['GajiPokokJml']);
						$nom_gajikeluarga_01 = @$nf($vthr_sww['GajiKeluargaJml']);
						$nom_gajifungsi_01 = @$nf($vthr_sww['GajiFungsiJml']);
						$nom_gajikhusus_01 = @$nf($vthr_sww['GajiKhususJml']);
						$nom_gajijabatan_01 = @$nf($vthr_sww['GajiJabatanJml']);
						$nom_gajikompensasi_01 = @$nf($vthr_sww['GajiKompensasi']);
						$nom_gajilembur_01 = @$nf($vthr_sww['GajiLembur']);
						$nom_gajibonus_01 = @$nf($vthr_sww['GajiBonus']);
						$nom_pph_01 = @$nf($vthr_sww['GajiPph21']);
						$nom_gajibersih_01 = @$nf($vthr_sww['GajiBersih']);
						
	?>
    		<?php 
				if($vthr_sww['GajiTHRJenis']=="P"){?>
                <span class="badge"><b>#Paskah</b></span>
                <?php }elseif($vthr_sww['GajiTHRJenis']=="B" ){?>
                <span class="badge"><b>#SHU</b></span>
                <?php }elseif($vthr_sww['GajiTHRJenis']=="N"){ ?>
                <span class="badge"><b>#Natal</b></span>
             <?php } ?>
          	<table width="100%" border="0" class="striped">
                  <tr>
                    <td width="31%">Gaji Pokok</td>
                    <td width="69%"><?php echo"Rp.$nom_gajipokok_01"; ?></td>
                  </tr>
                  <tr>
                    <td>Tunj.Keluarga</td>
                    <td><?php echo"Rp.$nom_gajikeluarga_01"; ?></td>
                  </tr>
                  <tr>
                    <td>Tunj. Fungsi</td>
                    <td><?php echo"Rp.$nom_gajifungsi_01"; ?></td>
                  </tr>
                  <tr>
                    <td>Tunj.Khusus</td>
                    <td><?php echo"Rp.$nom_gajikhusus_01"; ?></td>
                  </tr>
                  <tr>
                    <td>Tunj Jabatan</td>
                    <td><?php echo"Rp.$nom_gajijabatan_01"; ?></td>
                  </tr>
                  <tr>
                    <td>Kompensasi</td>
                    <td><?php echo"Rp.0"; ?></td>
                  </tr>
                  <tr>
                    <td>Lembur</td>
                    <td><?php echo"Rp.0"; ?></td>
                  </tr>
                  <tr>
                    <td>Bonus</td>
                    <td><?php echo"Rp.0"; ?></td>
                  </tr>
                  <tr>
                    <td>Penghasilan Kotor</td>
                    <td>
						<?php echo"<b>Rp.$nom_gaji_total</b>"; ?>
                    </td>
                  </tr>
                  <tr>
                    <td><?PHP  echo $persen_pot."%"; ?></td>
                    <td><?php echo"Rp.$nom_gaji_total_bagi"; ?></td>
                  </tr>
                  <tr>
                    <td>PPh Ps.21 </td>
                    <td><?php echo"Rp.$nom_pph_01"; ?></td>
                  </tr>
                  <tr>
                    <td>
					<?php if($vthr_sww['GajiTHRJenis']=="P"){?>
              				<?php echo"THR Paskah $tahun"; ?>
                <?php }elseif($vthr_sww['GajiTHRJenis']=="B" ){?>
              <?php echo"SHU $tahun"; ?>
                <?php }elseif($vthr_sww['GajiTHRJenis']=="N"){ ?>
               <?php echo"THR Natal $tahun"; ?>
                <?php } ?>
                </td>
                    <td><?php echo"<b>Rp.$nom_gajibersih_01</b>"; ?></td>
                  </tr>
			</table>
            <hr>
<?php } } ?>
    </form>
</body>
  <?php
		}else{
		  include'../logic/H_LOCATION.php';
		} }
		ob_flush();
	?>