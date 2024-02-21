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
      <li><a href="#!!">Pelengkapan Berkas</a></li>
      </ul>
	  </div>
  </nav>	
  	<form method="post">
    <div class="pdt txt">
		<div class="container">

	 <input name="nama" placeholder="Masukan Nomor RM" type="text" class="validate" required>  
	 <button class="waves-effect waves-light btn blue" name="cari"><i class="material-icons">search</i></button> *( 6 digit
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
		?>
			<br>
			<a href="<?php echo"DAFTAR_STEP_04.php?IDDKT=$vpss[DokterKode]&RM=$vpss[PasienNomorRM]&REG=$vpss[JalanNoReg]&OKEEE=OKEEE#LENGKAP"; ?>" class="txt">
			<?php echo"Nomor RM <b>$vpss[PasienNomorRM]</b> //<i>$vpss[JalanNoReg]</i>"; ?></a> &nbsp;<?php echo"$vpss[PasienNama]"; ?>
			<br>
			<?php echo"Periksa <b>$vrjj_con_02[tgl_rjj]</b> Pesan <b>$vrjj_con_03[tgl_rjjj]</b>"; ?>
			<br>
			 <?php 
			 echo"Dokter <b>$vdktt[PelakuNama]</b> ";
			?>
			<br>
			<?php
						if($vpss['PrshKode']=="0-0000"){
				?>
				<a href="<?php echo"UPLOAD_BERKAS_PRD.php?IDDKT=$vpss[DokterKode]&RM=$vpss[PasienNomorRM]&REG=$vpss[JalanNoReg]##"; ?>" class="waves-effect waves-light btn green">Lengkapi Berkas</a>
			  <?php }elseif($vpss['PrshKode']=="1-0113"){ ?>
			  <a href="<?php echo"UPLOAD_BERKAS.php?IDDKT=$vpss[DokterKode]&RM=$vpss[PasienNomorRM]&REG=$vpss[JalanNoReg]##"; ?>" class="waves-effect waves-light btn green">Lengkapi Berkas</a>
			  <?php }else{ ?>
			    <a href="<?php echo"UPLOAD_BERKAS_ANS.php?IDDKT=$vpss[DokterKode]&RM=$vpss[PasienNomorRM]&REG=$vpss[JalanNoReg]##"; ?>" class="waves-effect waves-light btn green">Lengkapi Berkas</a>
				<?php } ?>
			<hr>
			<?php  }}} ?>
		
	</div>
	</div>	 
	 </form>
</body>
</html>
