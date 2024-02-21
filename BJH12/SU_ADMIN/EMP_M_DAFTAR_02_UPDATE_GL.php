<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
		<b>#Data karyawan ||Update Global</b>
  <form method="post" action="">
		<table width="100%" border="0"  class="table table-bordered  table-sm">
           <?php
    $vem = $ms_q("$call_sel TKaryawan WHERE   NOT KaryStatus='91' AND NOT KaryStatus='99'  AND NOT KaryStatus='92'  AND NOT KaryStatus='94'  AND NOT KaryStatus='93'  order by KaryNoUrut,Convert(Integer,ISNULL(KaryNoSub,9999)) asc");
					$jum_vem = $ms_nr($vem);
										$no = 1;
					echo"<h5> -Karyawan Aktif <i>$jum_vem</i>-</h5>";
   		
   
								
									while($vemm = $ms_fas($vem)){
										$vem_tgl= $ms_q("select CONVERT(varchar(10),[KaryTglLahir],103) as tgl_lahir from TKaryawan where KaryNomor='$vemm[KaryNomor]'");
											$vemm_tgl = $ms_fas($vem_tgl);
									$vunt = $ms_q("$sl UnitKode,UnitNama FROM TUnitPrs WHERE  UnitKode='$vemm[UnitKode]' ");
											$vuntt = $ms_fas($vunt);
									$vkrv = $ms_q("$call_sel TKaryVar WHERE VarKode='$vemm[KaryJbtStruktural]' AND VarSeri='JABATAN' ");
										$vkrvv = $ms_fas($vkrv);
											$vkrv02 = $ms_q("$call_sel TKaryVar WHERE VarKode='$vemm[KaryProfesi]' AND VarSeri='PROFESI'");
												$vkrvv02 = $ms_fas($vkrv02);
													
											
												//echo"$vuntt[UnitNama]";
										
												$jum_vkrp = @$ms_q("$sl sum(Convert(Integer,skp)) as jum_skp FROM tb_kary_part WHERE idmain_kary='$vemm[KaryNomor]'");
														$jum_vkrrp = @$ms_fas($jum_vkrp);
												$jum_kp_jam = @$ms_q("$sl sum(Convert(Integer,jam_pel)) as jum_jam FROM tb_kary_part WHERE idmain_kary='$vemm[KaryNomor]'");
														$jum_kpp_jam = @$ms_fas($jum_kp_jam);
										
												?>
          <tr class="table-primary">
            <td width="3%"><?php echo"#$no"; ?></td>
            <td width="7%" align="center">KODE UNIT</td>
            <td width="20%" align="center">PROFESI</td>
            <td width="20%" align="center">NOMOR INDUK PEGAWAI</td>
            <td width="20%" align="center">NAMA LENGKAP</td>
            <td width="20%" align="center">GELAR DEPAN</td>
            <td width="20%" align="center">GELAR BELAKANG</td>
            <td width="20%" align="center">NIK (Kependudukan)</td>
            <td width="20%" align="center">NOMOR KK</td>
            <td width="20%" align="center">JENIS KELAMIN</td>
          </tr>
  
  
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center"><input type="text" name="<?php echo"unit_kode$no"; ?>" class="form-control form-control-sm" value="<?php echo"$vemm[UnitKode]"; ?>" style="max-width:5rem;"></td>
    <td align="left">
    <select name="<?php echo"unit_nama$no"; ?>" class="form-control form-control-sm">
    	<?php
			$vkrv03 = $ms_q("$call_sel TKaryVar WHERE  VarSeri='PROFESI'");
					while($vkrvv03 = $ms_fas($vkrv03)){
							if($vkrvv03['VarKode']==$vkrvv02['VarKode']){
						echo"<option value=$vkrvv03[VarKode] selected>$vkrvv03[VarNama]</option>";	
					}else{
						echo"<option value=$vkrvv03[VarKode]>$vkrvv03[VarNama]</option>";	
					}}
		?>
    </select>
    <!-- <input type="text" name="<?php //echo"unit_nama$no"; ?>" class="form-control form-control-sm" value="<?php //echo"$vkrvv02[VarNama]"; ?>"> -->
    </td>
    <td align="left"><input type="text" readonly name="<?php echo"nik$no"; ?>" class="form-control form-control-sm" value="<?php echo"$vemm[KaryNomor]"; ?>"></td>
    <td align="left">
 	<!-- Posisi<br><input type="text" name="unit01" class="form-control form-control-sm" value="<?php //echo"$vkrvv[VarNama]"; ?>"> -->
	<?php //echo"<b>BG</b> $vuntt[UnitNama]<br><br><b>PS</b> $vkrvv[VarNama]"; ?>
    <input type="text" name="<?php echo"nama$no"; ?>" class="form-control form-control-sm" value="<?php echo"$vemm[KaryNama]"; ?>"></td>
    <td align="center"><input type="text" name="<?php echo"g_depan$no"; ?>" class="form-control form-control-sm" value="<?php echo"$vemm[KaryGelarDepan]"; ?>" style="max-width:15rem;"></td>
    <td align="center"><input type="text" name="<?php echo"g_belakang$no"; ?>" class="form-control form-control-sm" value="<?php echo"$vemm[KaryGelarBelakang]"; ?>"></td>
    <td align="center"><input type="text" name="<?php echo"no_ktp$no"; ?>" class="form-control form-control-sm" value="<?php echo"$vemm[KaryNoKTP]"; ?>" ></td>
    <td align="center"><input type="text" name="no_kk" class="form-control form-control-sm" value="<?php echo"$vemm[KaryNoKTP]"; ?>"></td>
    <td align="center"><input type="text" name="<?php echo"jenis_kelamin$no"; ?>" class="form-control form-control-sm" value="<?php echo"$vemm[KaryGender]"; ?>"></td>
    </tr>
  <tr class="table-primary">
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="left">ALAMAT</td>
    <td align="left">TELP</td>
    <td align="left">TEMPAT LAHIR</td>
    <td align="center">TGL LAHIR</td>
    <td align="center">AGAMA</td>
    <td align="center">ASAL GEREJA</td>
    <td align="center">STATUS MENIKAH</td>
    <td align="center">GOLONGAN DARAH</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="left"><textarea class="form-control" name="<?php echo"alamat$no" ?>"><?php echo"$vemm[KaryAlamat]"; ?></textarea></td>
    <td align="left"><input type="text" value="<?php echo"$vemm[KaryTelepon]"; ?>" name="<?php echo"telp$no" ?>" class="form-control form-control-sm"></td>
    <td align="left"><input type="text" value="<?php echo"$vemm[KaryTmpLahir]"; ?>" name="<?php echo"t_lahir$no" ?>" class="form-control form-control-sm"></td>
    <td align="center"><input type="text" value="<?php echo"$vemm_tgl[tgl_lahir]"; ?>" name="<?php echo"ttl$no" ?>" class="form-control form-control-sm"></td>
    <td align="center">
    	<select name="<?php echo"agama$no"; ?>" class="form-control form-control-sm">
        <?php
			$vkrv04 = $ms_q("$call_sel TKaryVar WHERE VarSeri='AGAMA'");
				while($vkrvv04 = $ms_fas($vkrv04)){
						if($vkrvv04['VarKode']==$vemm['KaryAgama']){
					echo"<option value=$vkrvv04[VarKode] selected>$vkrvv04[VarNama]</option>";	
				}else{
					echo"<option value=$vkrvv04[VarKode]>$vkrvv04[VarNama]</option>";	
				}}
		?>
        </select>
    <!-- <input type="text" value="<?php //echo"$vkrvv04[VarNama]"; ?>" name="<?php echo"agama$no" ?>" class="form-control form-control-sm"> -->
    </td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <!-- 
  <tr>
    <td colspan="6">
    <a href="<?php //echo"?HLM=EMP_M&SUB=EMP_M_EMP_UPDATE&IDEMP=$vemm[KaryNomor]"; ?>" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i>&nbsp;Edit</a>    </td>
  </tr>
  -->
  <?php $no++;} ?>
</table>
 	<nav class="navbar fixed-bottom navbar-light bg-light">
	  <button name="up" class="btn btn-warning"><i class="fas fa-check"></i>&nbsp;Update Data</button>
           	<!--
            <div class="txt_right">
          <?php
		  	//$vgj_jum_acc = $ms_q("$call_sel TGaji WHERE   GajiOtorisasi='1' AND GajiBulan='$YR$MH' order by GajiBulan desc");
				//$vgjj_jum_acc = $ms_nr($vgj_jum_acc);
			//$vgj_jum_bacc = $ms_q("$call_sel TGaji WHERE   GajiOtorisasi='0' AND GajiBulan='$YR$MH' order by GajiBulan desc");
				//$vgjj_jum_bacc = $ms_nr($vgj_jum_bacc);
					//echo"<b>Acc $vgjj_jum_acc - Belum Acc $vgjj_jum_bacc </b>";
		  
		  ?>
          </div>
          -->
	</nav>
        <?php
			if(isset($_POST['up'])){
			$no_kary = 1;
				while($no_kary <= $jum_vem){
				$unit_kode = @$sql_slash($_POST['unit_kode'.$no_kary]);
				$unit_nama = @$sql_slash($_POST['unit_nama'.$no_kary]);
				$nik = @$sql_slash($_POST['nik'.$no_kary]);
				$nama = @$sql_slash($_POST['nama'.$no_kary]);
				$g_depan = @$sql_slash($_POST['g_depan'.$no_kary]);
				$g_belakang = @$sql_slash($_POST['g_belakang'.$no_kary]);
				$no_ktp = @$sql_slash($_POST['no_ktp'.$no_kary]);
				$alamat = @$sql_slash($_POST['alamat'.$no_kary]);
				$telp = @$sql_slash($_POST['telp'.$no_kary]);
				$ttl = @$sql_slash($_POST['ttl'.$no_kary]);
				$agama = @$sql_slash($_POST['agama'.$no_kary]);
				$t_lahir = @$sql_slash($_POST['t_lahir'.$no_kary]);
				$jenis_kelamin = @$sql_slash($_POST['jenis_kelaming'.$no_kary]);
					
					//echo"INDEX-$no_kary $nik $nama <br>";
						$update_kary_01 = $ms_q("$up TKaryawan set KaryNama='$nama',KaryGender='$jenis_kelamin',KaryGelarDepan='$g_depan',KaryGelarBelakang='$g_belakang',KaryAlamat='$alamat',KaryNoKTP='$no_ktp',KaryTelepon='$telp',KaryTmpLahir='$t_lahir',KaryTglLahir='$ttl',KaryAgama='$agama' WHERE KaryNomor='$nik'");
			
				
		
			$no_kary++; }?> 
    <meta http-equiv="refresh" content="0; url=?HLM=EMP_M&SUB=EMP_M_DAFTAR_02_UPDATE_GL">
            <?php } ?>
</form>
</body>
<?php } ?>