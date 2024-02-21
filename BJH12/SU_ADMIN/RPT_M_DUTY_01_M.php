<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
	<form action="" method="post">
      <div class="input-group mb-3" style="max-width:20rem;">
              <select name="tahun" class="form-control">
              <?php
			  	$no_tahun = 2017;
					while($no_tahun <= 2021){
						if($no_tahun=="$YR"){
							echo"<option value=$no_tahun selected>$no_tahun</option>";
					 }else{
						 echo"<option value=$no_tahun>$no_tahun</option>";
						
					 } $no_tahun++;}
			  
			  ?>
              
              </select>
              <div class="input-group-append">
                <button name="cari" class="form-control"><i class="fas fa-search"></i>&nbsp;Cari</button>
              </div>
		</div>
    
    </form>
	<?php
	if(isset($_POST['cari'])){
			$tahun = @$sql_slash($_POST['tahun']);
	
	?>
    <table width="100%" class="table table-bordered" border="0">
      <tr class="table-primary">
        <td width="3%" rowspan="2">No</td>
        <td width="16%" rowspan="2">NIK</td>
        <td width="10%" rowspan="2">Nama</td>
        <td width="11%" rowspan="2">Jabatan</td>
        <td colspan="14"><?php echo"<center><b>Bulan & Total Jam Pelatihan $tahun</b></center>"; ?></td>
      </tr>
      <tr class="table-primary">
        <td style="max-width:4rem;">JAN</td>
        <td style="max-width:4rem;">FEB</td>
        <td style="max-width:4rem;">MAR</td>
        <td style="max-width:4rem;">APR</td>
        <td style="max-width:4rem;">MEI</td>
        <td style="max-width:4rem;">JUN</td>
        <td style="max-width:4rem;">JUL</td>
        <td style="max-width:4rem;">AGST</td>
        <td style="max-width:4rem;">SEP</td>
        <td style="max-width:4rem;">OKT</td>
        <td style="max-width:4rem;">NOV</td>
        <td style="max-width:4rem;">DES</td>
        <td style="max-width:4rem;">JML</td>
        <td style="max-width:4rem;">Rerata</td>
      </tr>
      	<?php
			//$vkpt = $ms_q("$call_sel tb_kary_part order by kode asc");
				$no = 1;
				//while($vkptt = $ms_fas($vkpt)){
					$vkry = $ms_q("$sl KaryNomor,KaryNama FROM TKaryawan WHERE NOT KaryStatus='91' AND NOT KaryStatus='99'  AND NOT KaryStatus='92'  AND NOT KaryStatus='94'  AND NOT KaryStatus='93' order by KaryNoUrut,Convert(float,ISNULL(KaryNoSub,9999)) asc");
						while($vkryy = $ms_fas($vkry)){
							
		?>
      <tr>
        <td style="max-width:3rem;"><?php echo"$no"; ?></td>
        <td style="max-width:10rem;"><?php echo"$vkryy[KaryNomor]"; ?></td>
        <td style="max-width:10rem;"><?php echo"$vkryy[KaryNama]"; ?></td>
        <td style="max-width:4rem;" align="center"><?php //echo"$vdvv[nama]"; ?></td>
        <td style="max-width:4rem;">&nbsp;</td>
        <td style="max-width:4rem;">&nbsp;</td>
        <td style="max-width:4rem;">&nbsp;</td>
        <td style="max-width:4rem;">&nbsp;</td>
        <td style="max-width:4rem;">&nbsp;</td>
        <td style="max-width:4rem;">&nbsp;</td>
        <td style="max-width:4rem;">&nbsp;</td>
        <td style="max-width:4rem;">&nbsp;</td>
        <td style="max-width:4rem;">
        <?php
			   $vsep_prt01 = $ms_q("$sl sum(Convert(float,(jam_pel))) as jampel01 FROM tb_kary_part WHERE idmain_kary='$vkryy[KaryNomor]' AND bulan='09' AND tahun='$tahun' ");
			   		$vsep_prt_jum01 = $ms_fas($vsep_prt01);
						echo"$vsep_prt_jum01[jampel01]";
		?>	
        </td>
        <td style="max-width:4rem;">
           <?php
			   $vokt_prt02 = $ms_q("$sl sum(Convert(float,(jam_pel))) as jampel02 FROM tb_kary_part WHERE idmain_kary='$vkryy[KaryNomor]' AND bulan='10' AND tahun='$tahun' ");
			   		$vokt_prt_jum02 = $ms_fas($vokt_prt02);
						echo"$vokt_prt_jum02[jampel02]";
		?>	
        </td>
        <td style="max-width:4rem;">     <?php
			   $vnov_prt03 = $ms_q("$sl sum(Convert(float,(jam_pel))) as jampel03 FROM tb_kary_part WHERE idmain_kary='$vkryy[KaryNomor]' AND bulan='11' AND tahun='$tahun' ");
			   		$vnov_prt_jum03 = $ms_fas($vnov_prt03);
						echo"$vnov_prt_jum03[jampel03]";
		?>	
        </td>
        <td style="max-width:4rem;">   <?php
			   $vdes_prt04 = $ms_q("$sl sum(Convert(float,jam_pel)) as jampel04 FROM tb_kary_part WHERE idmain_kary='$vkryy[KaryNomor]' AND bulan='12' AND tahun='$tahun' ");
			   		$vdes_prt_jum04 = $ms_fas($vdes_prt04);
						echo"$vdes_prt_jum04[jampel04]";
		?>	
        </td>
        <td style="max-width:4rem;">
           <?php
			   $vjum_prt = $ms_q("$sl sum(Convert(float,(jam_pel))) as jampel FROM tb_kary_part WHERE idmain_kary='$vkryy[KaryNomor]'  AND tahun='$tahun' ");
			   		$vjum_prt_jum = $ms_fas($vjum_prt);
						echo"$vjum_prt_jum[jampel]";
		?>	
        </td>
        <td style="max-width:4rem;">&nbsp;</td>
      </tr>
      <?php $no++;} ?>
    </table>
    <?php } ?>
</body>
<?php } ?>
