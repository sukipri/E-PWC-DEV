
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
			?>
<body>
		<br><br>
		<div class="container">
	<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="DAFTAR.php">Pilih Dokter</a></li>
  <li class="breadcrumb-item"><a href="#">Masukkan Nomor RM & Tanggal Pesan</a></li>
   <li class="breadcrumb-item active"><a href="<?php echo"DAFTAR_STEP_03.php?IDDKT=$IDDKT&RM=$RM&REG=$REG#DAFTAR"; ?>">Detil data pasien</a></li>
    <li class="breadcrumb-item active"><a href="<?php echo"#"; ?>">Masukkan Berkas</a></li>
    <li class="breadcrumb-item active">Menunggu nomor antrian</li>
</ol>
<form action="" method="post" enctype="multipart/form-data">
  
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
		
		//str_replace
			$teksawal = "$vpll[UnitNama]";
 			$txt_01 = str_replace("Klinik Sp.", "", $teksawal);
			
				if(isset($_GET['LENGKAP'])){
					$ms_q("update TRawatJalan set AppJenisDaftar='3' where JalanNoReg='$REG'");
						header("location:DAFTAR_STEP_04.php?IDDKT=$IDDKT&RM=$RM&REG=$REG&OKEEE=OKEEE#LENGKAP");
			}
				?>
 <table width="100%" border="0" class="table table-bordered">
    <tr class="info">
          <td width="46%">
		  <div class="input-group">
          <div class="input-group-addon">Dokter</div>
	 		<input type="text" name="dokter" readonly class="form-control" value="<?php echo"$vdktt[PelakuNama]"; ?>">
	  </div>
	  <br>
	  <div class="input-group">
          <div class="input-group-addon">Poli</div>
	 		<input type="text" name="poli" readonly class="form-control" value="<?php echo"$txt_01"; ?>">
	  </div>
	  </td>
          <td width="54%">
		  <?php 
		  	if($vrjj_01['AppJenisDaftar']==3){ 
				echo"<b>Nomor Urut: &nbsp; <i>Menunggu Persetujuan Petugas....</i></b><br><font color=grey>*(Jadwal Pengkonfirmasian dilakukan jam 09-00 AM - 17-00 PM Kecuali Hari Minggu </font>";
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
		   </td>
        </tr>
        <tr>
          <td> 
		  <div class="input-group">
          <div class="input-group-addon">Nomor Reg</div>
	 		<input type="text" name="noreg"  class="form-control" readonly value="<?php echo"$REG"; ?>" required>
	  </div>
	  <br>
		  <div class="input-group">
          <div class="input-group-addon">Nomor RM</div>
	 		<input type="text" name="rm" readonly class="form-control" value="<?php echo"$vrjj_01[PasienNomorRM]"; ?>" required>
	  </div>
	  	  <br>
		  <div class="input-group">
          <div class="input-group-addon">Nomor Kartu JKN</div>
	 		<input type="text" name="jkn" readonly class="form-control" value="<?php echo"$vpss[PasienNoKartuJamin]"; ?>" required>
	  </div>
	  </td>
          <td>
		  <label>Keterangan</label>
		  <ol>
		<li>Untuk melihat kembali status nomor antrian, anda bisa mengisikan di <i>textbox</i> "masukkan Nomor Rekam Medis (RM)", catat dan simpan Nomor Rekam Medis(RM).</li>
		<li>Jika sudah di verifikasi maka petugas akan mengirimkan pemberitahuan melalui email. <br>Jika verifikasi belum masuk, dapat dilihat di <i>link spam/junk</i></li>
		</ol>
		  </td>
        </tr>
       
          <td height="37" align="center" bgcolor="#97FF97"><h4>Proses pendaftaran <i>online</i> selesai <br> Terimakasih atas kunjungan Anda </h4></td>
          <td align="right">
		  <?php if($vrjj_01['AppJenisDaftar']==2){ ?>
		  <a href="<?php echo"DAFTAR_PRINT.php?IDDKT=$IDDKT&REG=$REG&RM=$RM#$REG"; ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i>&nbsp;Cetak Pendaftaran</a>
		  <?php }else{ ?>
		   <a href="#" class="btn btn-primary btn-sm disabled"><i class="fa fa-print"></i>&nbsp;Cetak Pendaftaran</a>
		  <?php } ?>
		  </td>
        </tr>
      </table>
</form>
<br><br><br>
<?php include"footer.php"; ?>
</body>

