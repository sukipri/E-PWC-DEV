<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
		<h4><i class="fa fa-bars"></i>&nbsp;List Pendaftar Bulan ini &nbsp; <a href="?HLM=LIST_DAFTAR_TODAY" class="btn btn-warning btn-sm">Belum Disetujui</a>&nbsp; <a href="?HLM=LIST_DAFTAR_TODAY_APP" class="btn btn-warning btn-sm"> Disetujui</a>&nbsp; <a href="#" class="btn btn-primary btn-sm disabled"><i class="fa fa-search"></i>&nbsp;Cari Pendaftar</a></h4>
		 <form name="form1" method="post" action="">
      <table width="594" border="0">
        <tr>
          <td width="253"><input type="text" name="nama" class="form-control" required placeholder="Masukan Nama/No RM"></td>
          <td width="156"><button name="cari" class="btn btn-success">Cari Pasien</button></td>
        </tr>
      </table>
    </form>
		<?php 
			if(isset($_POST['cari'])){
				$nama = @trim($_POST['nama']);
		?>
        <table width="100%" border="0" class="table table-bordered">
          <tr class="info">
            <td width="2%">#</td>
            <td width="13%">NO REG</td>
            <td width="7%">NO RM</td>
            <td width="15%">Nama</td>
            <td width="15%">Alamat</td>
            <td width="10%">Tgl Pesan</td>
            <td width="11%">Tgl Periksa </td>
            <td width="5%">Gender</td>
         <td width="22%">Dokter,Poli,Penanggung</td>
          </tr>
		  	<?php
				$tg = date('d');
				$hit_dt = $tg + 1;
	$vps = @$ms_q("SELECT *  FROM TRawatJalan where JalanNoReg='$nama' OR PasienNomorRM='$nama' order by TanggalPesan desc");
					$no = 1;
					while($vpss = $ms_fas($vps)){
					$vpl = $ms_q("$call_sel TUnit where UnitKode='$vpss[UnitKode]'");
						$vpll = $ms_fas($vpl);
					$vdk = $ms_q("$sl PelakuKode,PelakuNama from TPelaku where PelakuKode='$vpss[DokterKode]'");
						$vdkk = $ms_fas($vdk);
					$vpr =  $ms_q("$sl PrshKode,PrshNama from TPerusahaan  where PrshKode='$vpss[PrshKode]'");
						$vprr = $ms_fas($vpr);
					$vps_01 =  $ms_q("$sl PasienNomorRM,PasienNoKartuJamin from TPasien  where PasienNomorRM='$vpss[PasienNomorRM]'");
						$vpss_01 = $ms_fas($vps_01);
				?>
          <tr>
            <td><?php echo"$no"; ?></td>
            <td>
			<?php echo"$vpss[JalanNoReg]"; ?>
			<?php
				if($vpss['AppJenisDaftar']==2){
				?>
				<a class="btn btn-success btn-sm">Success<?php echo"<b>&nbsp;#$vpss[JalanNoUrut]</b></a> "; ?>
				<?php }elseif($vpss['AppJenisDaftar']==4){?>
				<span class="badge badge-primary">Ditolak</span>
				<?php }elseif($vpss['AppJenisDaftar']==3){ ?>
				<a href="<?php echo"?HLM=LIST_DETAIL_DAFTAR&IDDKT=$vpss[DokterKode]&RM=$vpss[PasienNomorRM]&WAKTU=$vpss[WaktuPesan]&REG=$vpss[JalanNoReg]&LENGKAP=LENGKAP#LENGKAP"; ?>" class="btn btn-warning btn-sm">Butuh Persetujuan</a>
				<?php } ?>
			</td>
            <td><?php echo"<a href=?HLM=LIST_DETAIL_DAFTAR&IDDKT=$vpss[DokterKode]&RM=$vpss[PasienNomorRM]&WAKTU=$vpss[WaktuPesan]&REG=$vpss[JalanNoReg]&LENGKAP=LENGKAP#LENGKAP>$vpss[PasienNomorRM]</a>"; ?></td>
            <td><?php echo"$vpss[PasienNama]<br> Kode Waktu: <b>$vpss[WaktuPesan]</b>"; ?></td>
            <td><?php echo"$vpss[PasienAlamat]"; ?></td>
            <td><?php echo"$vpss[TanggalPesan]"; ?></td>
            <td><?php echo"$vpss[JalanRMTanggal] "; ?></td>
            <td><?php echo"$vpss[PasienGender]"; ?></td>
             <td>
			 <?php 
			  echo"$vdkk[PelakuNama]<br>";
			 echo"$vpll[UnitNama]<br>";
			  echo"<b>$vprr[PrshNama]</b><br>";
					 if($vpss['PrshKode']=="1-0113"){
			  			 echo"<i>$vpss_01[PasienNoKartuJamin]</i>";
						 }else{ }
						//if(empty($vpss['JalanNoUrut'])){ echo"Kosong"; }else{ echo"$vpss[JalanNoUrut]"; } 
			 ?>
			</td>
          </tr>
		  <?php $no++; }  ?>
        </table>
		<?php } ?>
</body>
</html>
