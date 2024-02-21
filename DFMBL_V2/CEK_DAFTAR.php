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
		 <nav>
    <div class="nav-wrapper blue accent-2">
	   <ul>
      <li><a href="#!!"><b>Cek status Daftar &raquo; isikan Nomor RM</b></a></li>
      </ul>
	  </div>
  </nav>	
  	<form method="post">
    <div class="pdt txt">
		<div class="container">

	 <input name="nama" placeholder="Masukan Nomor RM" type="number" class="validate" required>  
	 <button class="waves-effect waves-light btn blue" name="cari"><i class="material-icons">search</i></button>
	 <?php
	 			if(isset($_POST['cari'])){
					$nama = @trim($_POST['nama']);
	 ?>
		<?php
		
			$vps = @$ms_q("select TOP 5 * FROM   TRawatJalan where PasienNomorRM='$nama' AND JalanCaraDaftar='4' AND NOT AppJenisDaftar='1' order by TanggalPesan desc");
				$jum_vps = $ms_nr($vps);
				
					if($jum_vps < 1){
						echo"<font color=#40C1FF><b>Maaf, Nomor RM tidak ditemukan</b></font>";
						}else{
					$no = 1;
					while($vpss = $ms_fas($vps)){
					$vpl = $ms_q("$sl UnitNama from TUnit where UnitKode='$vpss[UnitKode]'");
						$vpll = $ms_fas($vpl);
						$vdkt =  $ms_q("$sl PelakuKode,PelakuNama from TPelaku where PelakuKode='$vpss[DokterKode]'");
							$vdktt = $ms_fas($vdkt);
							$vjdl =  $ms_q("$sl KetHari,KetJam,AtKd from JadwalDokter  where AtKd='$vpss[AtKd]'");
							$vjdll = $ms_fas($vjdl);
						$vrj_con_02= $ms_q("select CONVERT(varchar(10),[JalanRMTanggal],103) as tgl_rjj from TRawatJalan where JalanNoReg='$vpss[JalanNoReg]'");
						$vrjj_con_02 = $ms_fas($vrj_con_02);
						$vrj_con_03= $ms_q("select CONVERT(varchar(10),[TanggalPesan],103) as tgl_rjjj from TRawatJalan where JalanNoReg='$vpss[JalanNoReg]'");
						$vrjj_con_03 = $ms_fas($vrj_con_03);
						//--//
							$hit_vdc_02 = $ms_q("SELECT  PasienNama,PasienNomorRM,JalanNoUrut,UserID1,JalanNoUrut FROM TRawatJalan where DokterKode = '$vpss[DokterKode]' AND JalanRMTanggal between '$vrjj_con_02[tgl_rjj]' and '$vrjj_con_02[tgl_rjj] 23:59' AND NOT JalanStatus='9' and WaktuPesan = '$vpss[WaktuPesan]' AND JalanNoUrut > 0 order by TanggalPesan desc");
								$hit_vdcc_02 = $ms_nr($hit_vdc_02);
								$vjdl02 =  $ms_q("$sl DokterKode,KetHari,KetJam,AtKd,Kuota from JadwalDokter  where AtKd='$vpss[AtKd]'");
									$vjdll02 = $ms_fas($vjdl02);
									
								$hit01 = substr($vjdll02['KetJam'],0,-6);
								$hit_jam = $vpss['JalanNoUrut'] * 4 ;
								$hit_jam_02 = $hit_jam / 60;
								$hit_jam_03 = $hit01 + $hit_jam_02;
								$nom_jam_03 = @number_format($hit_jam_03,2);
								//$zero_jam_03= sprintf("%04f", $hit_jam_03);
								//echo"$hit_vdcc_02<br>$vpss[DokterKode]<br>$vpss[WaktuPesan]";
								//echo"<br>$vrjj_con_02[tgl_rjj]";
									$sub_jam_03_01 = substr($nom_jam_03,0,2);
									$sub_jam_03_02 = substr($nom_jam_03,-2,4);
									//echo"$sub_jam_03_01 - ";
									//echo" $vpss[JalanNoUrut]";
									$text_jam = "Tindakan Pemeriksaan <b>+/- $sub_jam_03_01.00 Lebih $sub_jam_03_02 Menit</b>";
		?>
			<br>
			<a href="<?php echo"DAFTAR_STEP_04.php?IDDKT=$vpss[DokterKode]&RM=$vpss[PasienNomorRM]&REG=$vpss[JalanNoReg]&OKEEE=OKEEE#LENGKAP"; ?>" class="txt">
			<?php echo"Nomor RM <b>$vpss[PasienNomorRM]</b>"; ?></a> &nbsp;<?php echo"$vpss[PasienNama]"; ?>
			<br>
			<?php echo"Periksa <b>$vrjj_con_02[tgl_rjj]</b> Pesan <b>$vrjj_con_03[tgl_rjjj]</b>"; ?>
			<br>
			 <?php 
			 echo"Dokter <b>$vdktt[PelakuNama]</b>";
			?>
			<br>
			<?php 
		  	if($vpss['AppJenisDaftar']==3){ 
				echo"<b>Nomor Urut: &nbsp; <i>Menunggu Persetujuan Petugas....</i></b><br><font color=grey>*(Jadwal Pengkonfirmasian dilakukan jam 09-00 AM - 17-00 PM Kecuali Hari Minggu </font>";
				}elseif($vpss['AppJenisDaftar']==4){
					$vrbt = $ms_q("$sl JalanNoReg,JalanBatalKet from TRawatJalanBatal where JalanNoReg='$vpss[JalanNoReg]'");
					$vrbtt = $ms_fas($vrbt);
					echo"<font color=red><b><i>Maaf, pendaftaran anda dibatalkan dikarenakan $vrbtt[JalanBatalKet]</i></b></font>";
				}elseif($vpss['AppJenisDaftar']==2){
					if($vpss['WaktuPesan']=="P"){
				echo"<font color=green><b>Nomor Urut: &nbsp; <i>$vpss[JalanNoUrut]</i>, Silahkan datang pada tanggal $vrjj_con_02[tgl_rjj] ($vjdll[KetJam])</b></font><br>$text_jam";
				echo"<b>*$vpss[ket]</b>";
				}elseif($vpss['WaktuPesan']=="S"){
				echo"<font color=green><b>Nomor Urut: &nbsp; <i>$vpss[JalanNoUrut]</i>, Silahkan datang pada tanggal $vrjj_con_02[tgl_rjj] ($vjdll[KetJam])</b></font><br>$text_jam";
				echo"<b>*$vpss[ket]</b>";
				}elseif($vpss['WaktuPesan']=="M"){
				echo"<font color=green><b>Nomor Urut: &nbsp; <i>$vpss[JalanNoUrut]</i>, Silahkan datang pada tanggal $vrjj_con_02[tgl_rjj] ($vjdll[KetJam])</b></font><br>$text_jam";
				echo"<b>*$vpss[ket]</b>";
				}}
			?>
			<hr>
			<?php }}} ?>
		
	</div>
	</div>	 
	 </form>
</body>
</html>
