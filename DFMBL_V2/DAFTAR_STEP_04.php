<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Step 04</title>
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
			?>
		<?php 
				
			$vdkt =  $ms_q("$call_sel TPelaku where PelakuKode='$IDDKT'");
			$vdktt = $ms_fas($vdkt);
			$vpl = $ms_q("$call_sel TUnit where UnitKode='$vdktt[UnitKode]'");
			$vpll = $ms_fas($vpl);
			$vrj_01 =  $ms_q("$call_sel TRawatJalan  where JalanNoReg='$REG'");
			$vrjj_01 = $ms_fas($vrj_01);
			$vps =  $ms_q("$call_sel TPasien  where PasienNomorRM='$RM'");
			$vpss = $ms_fas($vps);
			$vrj = @$ms_q("select TNomor.NomorKode,TNomor.NomorAkhir from TNomor where TNomor.NomorKode='PL-$years$month-'");
				$vrjj = $ms_fas($vrj);
				$vrj_con= $ms_q("select CONVERT(varchar(10),[JalanRMTanggal],103) as tgl_rj from TRawatJalan where JalanNoReg='$REG'");
					$vrjj_con = $ms_fas($vrj_con);
					$hit_vrj = $vrjj['NomorAkhir'] + 1;
					$hit_zero = sprintf("%04d", $hit_vrj);
					$sub_01= substr($vpss['PasienTglLahir'],-4);
					$hit_sub = $years_big - $sub_01;
					$dt = "$date_html5 $time_html5";
				if(isset($_GET['LENGKAP'])){
					$ms_q("update TRawatJalan set AppJenisDaftar='3' where JalanNoReg='$REG'");
						header("location:DAFTAR_STEP_04.php?IDDKT=$IDDKT&RM=$RM&REG=$REG&OKEEE=OKEEE#LENGKAP");
			}
				?>
				<nav>
		 <div class="nav-wrapper blue accent-2">
	   <ul>
      <li><a href="#!!">Pendaftaran Selesai </a></li>
	  </div>
	  </nav>
	  <div class="pdt txt">
		<div class="container">
		<?php 
		  	if($vrjj_01['AppJenisDaftar']==3){ 
				echo"<b> <i>Menunggu Persetujuan Petugas....</i></b><br><font color=grey>*(Jadwal Pengkonfirmasian dilakukan jam 09-00 AM - 17-00 PM Kecuali Hari Minggu </font>";
				}elseif($vrjj_01['AppJenisDaftar']==4){
					$vrbt = $ms_q("$sl JalanNoReg,JalanBatalKet from TRawatJalanBatal where JalanNoReg='$REG'");
					$vrbtt = $ms_fas($vrbt);
					echo"<font color=red><b><i>Maaf, pendaftaran anda dibatalkan dikarenakan $vrbtt[JalanBatalKet]</i><b></font>";
				}elseif($vrjj_01['AppJenisDaftar']==2){
					if($vrjj_01['WaktuPesan']=="P"){
				echo"<b>Nomor Urut: &nbsp; <i>$vrjj_01[JalanNoUrut]</i>, Silahkan datang Pada $vrjj_con[tgl_rj] (Pagi 07:00-14:00)</b>";
				}elseif($vrjj_01['WaktuPesan']=="S"){
				echo"<b>Nomor Urut: &nbsp; <i>$vrjj_01[JalanNoUrut]</i>, Silahkan datang Pada $vrjj_con[tgl_rj] (Siang 14:00-21:00)</b>";
				}elseif($vrjj_01['WaktuPesan']=="M"){
				echo"<b>Nomor Urut: &nbsp; <i>$vrjj_01[JalanNoUrut]</i>, Silahkan datang Pada $vrjj_con[tgl_rj] (Lainya 21:00-06:00)</b>";
				}}
			?>
			<br>
		<label for="email">Dokter</label>
	 <input name="dokter" type="text" class="validate" readonly value="<?php echo"$vdktt[PelakuNama]"; ?>">
	 <label for="email">Poli</label>
		<input name="poli" type="text" class="validate" readonly value="<?php echo"$vpll[UnitNama]"; ?>">
	   <label for="email">No pendaftaran</label>
         <input name="noreg" type="text" class="validate" readonly value="<?php echo"$vrjj_01[JalanNoReg]"; ?>">
              <label for="email">No RM(Rekam Medis)</label>
		   <input name="rm" type="number" class="validate" readonly value="<?php echo"$vrjj_01[PasienNomorRM]"; ?>">
		   <label>Keterangan</label>
		  <ol>
		<li>Untuk melihat kembali status nomor antrian, anda bisa mengisikan di <i>textbox</i> "masukkan Nomor Rekam Medis (RM) <b>*terdapat pada link cek status daftar</b>", catat dan simpan Nomor Rekam Medis(RM).</li>
		<li>Jika sudah di verifikasi maka petugas akan mengirimkan pemberitahuan melalui email. <br>Jika verifikasi belum masuk, dapat dilihat di <i>link spam/junk</i></li>
		</ol>
		  </div>
		  </div>
</body>
</html>
