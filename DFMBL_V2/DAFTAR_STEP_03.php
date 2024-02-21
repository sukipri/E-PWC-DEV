<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
	<?php 
		error_reporting(0);
			include"config02.php";
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
			//str_replcae
			$teksawal = "$vpll[UnitNama]";
 			$txt_01 = str_replace("Klinik Sp.", "", $teksawal);
				?>
				<nav>
		 <div class="nav-wrapper blue accent-2">
	   <ul>
      <li><a href="#!!">Cek data diri Anda  &raquo; Langkah 02</a></li>
      </ul>
	  </div>
	</nav>
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
						$ms_q("UPDATE TRawatJalan set PasienGender='$vpss[PasienGender]',PasienNama='$nama',PasienAlamat='$al',PasienKota='$al4',PasienWilayah='$al5',PasienUmurThn='$umur',PasienUmurBln='0',PasienUmurHr='0',JalanTanggal='$dt',HariPesan='$vjdll[KetHari]',WaktuPesan='$vjdll[shift]',JalanAsalPasien='4',JalanPasBaru='L1',JalanCaraDaftar='4',JalanStatus='0',PrshKode='$penanggung',UserID1='MOBILE',UserDate1='$date_html5',JalanJenisPeriksa='M' where JalanNoReg='$REG'");
						$ms_q("UPDATE TPasien set PasienTelp='$tlp',PasienHp='$tlp',PasienEmail='$email' where PasienNomorRM='$RM'");
						header("location:UPLOAD_BERKAS.php?IDDKT=$IDDKT&RM=$RM&REG=$REG"); 
					 ?>
						 <div class="alert alert-dismissible alert-success">
  			<button type="button" class="close" data-dismiss="alert">&times;</button>
  				<strong>Great..</strong> Data Berhasil Dimasukan </div>
							
						  <?php }} ?>
		<form method="post">
	<div class="pdt txt">
		<div class="container">
		 <label>Dokter</label>
		 <input name="dokter" type="text" class="validate" readonly value="<?php echo"$vdktt[PelakuNama]"; ?>">
		  <label for="email">Poli</label>
      <input name="poli" type="text" class="validate" readonly value="<?php echo"$txt_01"; ?>">
	   <label for="email">No pendaftaran</label>
         <input name="noreg" type="text" class="validate" readonly value="<?php echo"$vrjj_01[JalanNoReg]"; ?>">
              <label for="email">No RM(Rekam Medis)</label>
		   <input name="rm" type="number" class="validate" readonly value="<?php echo"$vrjj_01[PasienNomorRM]"; ?>">
		   
		  <select name="waktu" required>
                  <?php
					$vjdl = $ms_q("$call_sel  JadwalDokter where AtKd='$vrjj_01[AtKd]'");
					$vjdll = $ms_fas($vjdl);
						echo"<option value=$vjdll[AtKd] selected>$vjdll[KetHari] $vjdll[KetJam]</option>";
							
			?>
               </select>  
			   <?php echo"Tanggal Periksa <b>$vrjj_con_02[tgl_rjj]</b>"; ?>
			   <br>
		   <label>Nama</label>
		 <input name="nama" type="text" class="validate" readonly value="<?php echo"$vpss[PasienNama]"; ?>">
		  <label>Alamat</label>
		<textarea name="al" class="materialize-textarea"><?php echo"$vpss[PasienAlamat]"; ?></textarea>
		 <input type="hidden" name="al2" readonly  class="form-control" value="<?php echo"$vpss[PasienKelurahan]"; ?>" required>
		 <input type="hidden" name="al3" readonly  class="form-control" value="<?php echo"$vpss[PasienKecamatan]"; ?>" required>
		  <input type="hidden" name="al4" readonly  class="form-control" value="<?php echo"$vpss[PasienKota]"; ?>" required>
		   <input type="hidden" name="al5" readonly  class="form-control" value="<?php echo"$vpss[PasienProv]"; ?>" required>
		   <input type="hidden" name="umur" readonly  class="form-control" value="<?php echo"$hit_sub"; ?>" required>
		  <label>No HP *wajib diisi</label>
		 <input name="tlp" type="number" class="validate" required value="<?php echo"$vpss[PasienHP]"; ?>">
		<label>Email *wajib diisi</label>
		 <input name="email" type="email" class="validate" required  value="<?php echo"$vpss[PasienEmail]"; ?>">
		 <br>
		<select name="penanggung">
      <optgroup label="">
     	   <option value="1-0113">BPJS</option>
  </optgroup>
   <!--
	 <option value="0-0000">PRIBADI</option>
      <optgroup label="Asuransi">
    	 <?php 
	 		//$vp = $ms_q("$sl PrshKode,PrshNama from TPerusahaan where not PrshNama LIKE '%BPJS%' AND PrshStatus='A' order by PrshNama asc");
					//while($vpp = $ms_fas($vp)){
						//echo"<option value=$vpp[PrshKode]>$vpp[PrshNama]</option>";
					//}?>
     	 </optgroup>
		 -->
    </select>
	<br>
		  <button name="simpan" class="waves-effect waves-light btn"><i class="material-icons left">save</i>Simpan</button>
		  <a href="<?php echo"DAFTAR_STEP_02.php?IDDKT=$IDDKT&RM=$RM&REG=$REG&BCK=BCK"; ?>" onClick="return konfirmasi()" class="waves-effect waves-light btn red"><i class="material-icons left">arrow_back</i></a>
		  </div>
		  </div>
		</form>
</body>
</html>
