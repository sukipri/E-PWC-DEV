<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
		<h4><i class="fa fa-bars"></i>&nbsp;List Pendaftar Rawat Jalan Online/Offline</h4>
		<form method="post" action="">
		<table width="100%" border="0" class="table">
  <tr>
    <td><input type="date" name="tg1" class="form-control"></td>
    <td><input type="date" name="tg2" class="form-control"></td>
    <td><button name="cari" class="btn btn-info">Cari Data</button> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
  </form>

        <table width="100%" border="0" class="table table-bordered">
          <tr class="info">
                 <td width="2%">#</td>
            <td width="14%">NO REG</td>
            <td width="12%">NO RM</td>
            <td width="17%">Nama</td>
            <td width="19%">Alamat</td>
            <td width="11%">Tgl Pesan</td>
            <td width="6%">Tgl RM </td>
            <td width="6%">Gender</td>
         <td width="19%">Poli</td>
          </tr>
		  	<?php
				if(isset($_POST['cari'])){
					$tg1 = @$_POST['tg1'];
					$tg2 = @$_POST['tg2'];
				$vps = @$ms_q("SELECT  * FROM TRawatJalan where NOT JalanCaraDaftar='4' AND TanggalPesan BETWEEN '$tg1' AND '$tg2' ORDER BY JalanRMTanggal DESC");
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
						//str_replcae
			$teksawal = "$vpll[UnitNama]";
 			$txt_01 = str_replace("Klinik Sp.", "", $teksawal);
			?>
           <tr>
            <td><?php echo"$no"; ?></td>
            <td>
			<?php echo"$vpss[JalanNoReg]"; ?>
			<?php echo"<h4><b>&nbsp;#$vpss[JalanNoUrut]</b> </h4> "; ?>
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
			 echo"$txt_01<br>";
			  echo"<b>$vprr[PrshNama]</b><br>";
					 if($vpss['PrshKode']=="1-0113"){
			  			 echo"<i>$vpss_01[PasienNoKartuJamin]</i>";
						 }else{ }
						//if(empty($vpss['JalanNoUrut'])){ echo"Kosong"; }else{ echo"$vpss[JalanNoUrut]"; } 
			 ?>
			 <?php
	   	if($vpss['JalanStatus']==9){
		?>
		<b><font color="#CC3333"><b><i>Dibatalkan, Dengan alasan khusus</i></b></font></b>
		<?php }else{  ?>
		
	   <?php } ?>
			</td>
          </tr>
		  <?php $no++; }}  ?>

        </table>
</body>
</html>
