<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<?php
		error_reporting(0);
		include"config.php"; 
		include"css.php"; 
	?>
	<body>
	<?php include"MENU.php"; ?>
	<?php 
				$IDDKT = @$_GET['IDDKT'];
			$RM = @$_GET['RM'];
			$REG = @$_GET['REG'];
			$vdkt =  $ms_q("$call_sel TPelaku where PelakuKode='$IDDKT'");
			$vdktt = $ms_fas($vdkt);
			$vpl = $ms_q("$call_sel TUnit where UnitKode='$vdktt[UnitKode]'");
			$vpll = $ms_fas($vpl);
			$vrj_01 =  $ms_q("$call_sel TRawatJalan  where JalanNoReg='$REG'");
			$vrjj_01 = $ms_fas($vrj_01);
			$vjdl =  $ms_q("$sl KetHari,KetJam,shift,AtKd from JadwalDokter  where AtKd='$vrjj_01[AtKd]'");
			$vjdll = $ms_fas($vjdl);
			$vps =  $ms_q("$call_sel TPasien  where PasienNomorRM='$RM'");
			$vpss = $ms_fas($vps);
			$vrj = @$ms_q("select TNomor.NomorKode,TNomor.NomorAkhir from TNomor where TNomor.NomorKode='PL-$years$month-'");
				$vrjj = $ms_fas($vrj);
			
				$vrj_con_02= $ms_q("select CONVERT(varchar(10),[JalanRMTanggal],103) as tgl_rjj from TRawatJalan where JalanNoReg='$vrjj_01[JalanNoReg]'");
				$vrjj_con_02 = $ms_fas($vrj_con_02);
					$hit_vrj = $vrjj['NomorAkhir'] + 1;
					$hit_zero = sprintf("%04d", $hit_vrj);
					$sub_01= substr($vpss['PasienTglLahir'],-4);
					$hit_sub = $years_big - $sub_01;
					$dt = "$date_html5 $time_html5";
					
					//str_replace
			$teksawal = "$vpll[UnitNama]";
 			$txt_01 = str_replace("Klinik Sp.", "", $teksawal);
				?>
		<br><br>
		<div class="container">
	<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="DAFTAR.php">Pilih Dokter</a></li>
  <li class="breadcrumb-item"><a href="<?php echo"#"; ?>">Masukan Nomor RM & Tanggal Pesan</a></li>
   <li class="breadcrumb-item active">Detail Data Pasien *(Pribadi</li>
</ol>
		   <?php
		  		if(isset($_POST['simpan'])){
					$nama = trim($_POST['nama']);
					$tlp = trim($_POST['tlp']);
					$email = trim($_POST['email']);
					$umur = trim($_POST['umur']);
					$al = trim($_POST['al']);
					$al2 = trim($_POST['al2']);
					$al3 = trim($_POST['al3']);
					$al4 = trim($_POST['al4']);
					$al5 = trim($_POST['al5']);
					
					$penanggung = trim($_POST['penanggung']);
						if(empty($tlp) && empty($email)){
								echo"<font color=red><b>*Maaf Isikan Nomor Telp/Hp & Email</b></font>";
								}else{
					?>
					<?php
						$ms_q("UPDATE TRawatJalan set PasienGender='$vpss[PasienGender]',PasienNama='$nama',PasienAlamat='$al',PasienKota='$al4',PasienWilayah='$al5',PasienUmurThn='$umur',PasienUmurBln='0',PasienUmurHr='0',JalanTanggal='$dt',HariPesan='$vjdll[KetHari]',WaktuPesan='$vjdll[shift]',JalanAsalPasien='4',JalanPasBaru='L1',JalanCaraDaftar='4',JalanStatus='0',PrshKode='$penanggung',UserID1='WEB',UserDate1='$date_html5' where JalanNoReg='$REG'");
						$ms_q("UPDATE TPasien set PasienTelp='$tlp',PasienHp='$tlp',PasienEmail='$email' where PasienNomorRM='$RM'");
						header("location:UPLOAD_BERKAS_PRD.php?IDDKT=$IDDKT&RM=$RM&REG=$REG"); 
					 ?>
						 <div class="alert alert-dismissible alert-success">
  			<button type="button" class="close" data-dismiss="alert">&times;</button>
  				<strong>Great..</strong> Data Berhasil Dimasukan </div>
							
						  <?php }} ?>
	<form method="post" action="">
	  <table width="100%" border="0" class="table table-bordered">
    <tr class="info">
          <td width="46%">
		  <div class="input-group">
          <div class="input-group-addon">Dokter</div>
	 		<input type="text" name="dokter" readonly="" class="form-control" value="<?php echo"$vdktt[PelakuNama]"; ?>">
	  </div>
	  <br>
	  <div class="input-group">
          <div class="input-group-addon">Poli</div>
	 		<input type="text" name="poli" readonly="" class="form-control" value="<?php echo"$txt_01"; ?>">
	  </div>
	  </td>
          <td width="54%">&nbsp;
		  
		 </td>
        </tr>
        <tr>
          <td> 
		  <div class="input-group">
          <div class="input-group-addon">Nomor Reg</div>
	 		<input type="text" name="noreg"  class="form-control" readonly="" value="<?php echo"$REG"; ?>" required>
	  </div>
	  <br>
		  <div class="input-group">
          <div class="input-group-addon">Nomor RM</div>
	 		<input type="text" name="rm" readonly="" class="form-control" value="<?php echo"$vrjj_01[PasienNomorRM]"; ?>" required>
	  </div>
	  </td>
          <td>
		  <?php echo"<h4>Periksa <i>$vrjj_con_02[tgl_rjj] $vjdll[KetJam]</i></h4>"; ?>
		
		 </td>
        </tr>
        <tr class="info">
          <td height="37">
		    <div class="input-group">
          <div class="input-group-addon">Nama</div>
	 		<input type="text" name="nama" readonly=""  class="form-control" value="<?php echo"$vpss[PasienNama]"; ?>" required>
	  </div>
	  <br>
	     <div class="input-group">
          <div class="input-group-addon">Telepon</div>
	 		<input type="text" name="tlp" class="form-control" required value="<?php echo"$vpss[PasienTelp]"; ?>"> 
	  </div>
			<font color="#CC3333">*(Wajib memasukan Nomor Hp/Telp</font>
	   <br><br>
	      <div class="input-group">
          <div class="input-group-addon">Email</div>
	 		<input type="email" name="email" class="form-control" required value="<?php echo"$vpss[PasienEmail]"; ?>"> 
	  </div>
			<font color="#CC3333"> *(wajib memasukan Email</font>
	   <br><br>
	     <div class="input-group">
          <div class="input-group-addon">Tanggal Lahir</div>
	 		<input type="text" name="tgl_lhr" readonly=""  class="form-control" value="<?php echo"$vpss[PasienTglLahir]"; ?>" required>
	  </div>
	   <br>
	     <div class="input-group">
          <div class="input-group-addon">Umur</div>
	 		<input type="text" name="umur" readonly=""  class="form-control" value="<?php echo"$hit_sub"; ?>" required>
	  </div>
		  </td>
		  <td>
		 <textarea class="form-control" readonly="" name="al"><?php echo"$vpss[PasienAlamat]"; ?></textarea>
		 <input type="text" name="al2" readonly=""  class="form-control" value="<?php echo"$vpss[PasienKelurahan]"; ?>" required>
		 <input type="text" name="al3" readonly=""  class="form-control" value="<?php echo"$vpss[PasienKecamatan]"; ?>" required>
		  <input type="text" name="al4" readonly=""  class="form-control" value="<?php echo"$vpss[PasienKota]"; ?>" required>
		   <input type="text" name="al5" readonly=""  class="form-control" value="<?php echo"$vpss[PasienProv]"; ?>" required>
		   
		  </td>
        </tr>
       
          <td height="37">
		
		    <select name="penanggung" class="form-control" required>
			<option value="0-0000">Pribadi</option>
				
		  <!--
		    <option value="">Penjamin..</option>
		  <option value="1-0113">BPJS</option>
		   <optgroup label="Asuransi">
   					<?php 
					
		 			//$vp = $ms_q("$sl PrshKode,PrshNama from TPerusahaan where not PrshNama LIKE '%BPJS%' AND PrshStatus='A' order by PrshNama asc");
					//while($vpp = $ms_fas($vp)){
						//echo"<option value=$vpp[PrshKode]>$vpp[PrshNama]</option>";
					//}?>
 				 </optgroup>
 				 
  				</optgroup>
				-->

		  </select>
		  </td>
          <td>
		  <button class="btn btn-success" name="simpan"><i class="fa fa-send-o"></i>&nbsp;Klik, Jika data benar</button>
		   <a href="<?php echo"DAFTAR_STEP_02.php?IDDKT=$IDDKT&RM=$RM&REG=$REG&BCK=BCK"; ?>" onClick="return konfirmasi()" class="btn btn-danger"><i class="fa fa-send-o"></i>&nbsp;Klik, Jika data salah</a>
		  <br><br>
			*(Mohon diperiksa dengan teliti apakah data diri anda sudah benar
		  </td>
        </tr>
      </table>

						 
	</form>
	</div>
	<?php include"footer.php"; ?>
</body>
</html>
