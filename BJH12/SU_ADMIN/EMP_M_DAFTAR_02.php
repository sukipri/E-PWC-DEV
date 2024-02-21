<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
		<b>#Data karyawan ||By Name</b>
    	<form method="post">
    	<div class="input-group mb-3" style="max-width:26rem;">
          <input type="text" class="form-control" name="nama" placeholder="Masukan Nama / NIK" aria-label="Masukan Nama / NIK" aria-describedby="basic-addon2" required>
          <div class="input-group-append">
          <button name="cari" class="btn btn-primary">Cari</button>
          &nbsp;
            <a href="<?php echo"?HLM=EMP_M&SUB=EMP_M_DAFTAR_02_DWN_01"; ?>" class="btn btn-info btn-sm"><i class="fas fa-cloud-download-alt"></i>&nbsp;Download Data</a>
          </div>
		</div>
        <?php if(isset($_POST['cari'])){ $nama  = @$sql_slash($_POST['nama']);  ?>
        	<?php
		$vem = $ms_q("$sl KaryNomor,KaryNomorYakkum,KaryNama,UnitKode,KaryJbtStruktural,KaryStatus FROM TKaryawan WHERE KaryNama LIKE '%$nama%' OR KaryNomor='$nama' AND  NOT KaryStatus='91' AND NOT KaryStatus='99'  AND NOT KaryStatus='92'  AND NOT KaryStatus='94'  AND NOT KaryStatus='93'  order by KaryNama asc");
									$jum_vem = $ms_nr($vem);
										$no = 1;
					echo"<h5>Total <i>$jum_vem</i></h5>";
	?>
<table width="100%" border="0" style="max-width:60rem;" class="table table-bordered table-striped">
  <tr class="table-primary">
    <td width="3%">#</td>
    <td width="20%">NIK</td>
    <td width="18%">Nama</td>
    <td width="21%">Bagian &amp; Posisi</td>
    <td width="16%">&nbsp;</td>
    <td width="22%">&nbsp;</td>
  </tr>
   <?php
   		
   
								
									while($vemm = $ms_fas($vem)){
									$vunt = $ms_q("$sl UnitKode,UnitNama FROM TUnitPrs WHERE  UnitKode='$vemm[UnitKode]' ");
											$vuntt = $ms_fas($vunt);
									$vkrv = $ms_q("$call_sel TKaryVar WHERE VarKode='$vemm[KaryJbtStruktural]' AND VarSeri='JABATAN' ");
										$vkrvv = $ms_fas($vkrv);
												//echo"$vuntt[UnitNama]";
										
												$jum_vkrp = @$ms_q("$sl sum(Convert(Integer,skp)) as jum_skp FROM tb_kary_part WHERE idmain_kary='$vemm[KaryNomor]'");
														$jum_vkrrp = @$ms_fas($jum_vkrp);
												$jum_kp_jam = @$ms_q("$sl sum(Convert(Integer,jam_pel)) as jum_jam FROM tb_kary_part WHERE idmain_kary='$vemm[KaryNomor]'");
														$jum_kpp_jam = @$ms_fas($jum_kp_jam);
										
							?>
  <tr>
    <td align="center"><?php echo"$no"; ?></td>
    <td align="center"><?php echo"$vemm[KaryNomor]"; ?></td>
    <td align="left"><?php echo"$vemm[KaryNama]"; ?></td>
    <td align="left"><?php echo"<b>BG</b> $vuntt[UnitNama]<br><br><b>PS</b> $vkrvv[VarNama]"; ?></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>

  <tr>
    <td colspan="6">
    <a href="<?php echo"?HLM=EMP_M&SUB=EMP_M_EMP_UPDATE&IDEMP=$vemm[KaryNomor]&IDEMP02=$vemm[KaryNomorYakkum]"; ?>" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i>&nbsp;Edit</a>    </td>
  </tr> 

  <?php $no++;} ?>
</table>
</form>
<?php } ?>
</body>
<?php } ?>
