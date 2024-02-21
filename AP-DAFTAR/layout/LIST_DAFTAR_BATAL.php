<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
		<h4><i class="fa fa-bars"></i>&nbsp;List Pendaftar Dibatalkan &nbsp; </h4>
		
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
	$vps = @$ms_q("SELECT TOP 100 *  FROM TRawatJalan where  JalanStatus='9' OR AppJenisDaftar='4' order by TanggalPesan desc");
					$no = 1;
					while($vpss = $ms_fas($vps)){
					$vpl = $ms_q("$call_sel TUnit where UnitKode='$vpss[UnitKode]'");
						$vpll = $ms_fas($vpl);
					$vdk = $ms_q("$sl PelakuKode,PelakuNama from TPelaku where PelakuKode='$vpss[DokterKode]'");
						$vdkk = $ms_fas($vdk);
					$vpr =  $ms_q("$sl PrshKode,PrshNama from TPerusahaan  where PrshKode='$vpss[PrshKode]'");
						$vprr = $ms_fas($vpr);
				?>
          <tr>
            <td><?php echo"$no"; ?></td>
            <td>
			<?php echo"$vpss[JalanNoReg]"; ?>
			<b><font color="#CC3333"><b><i>Canceled</i></b></font></b>
			<br>
			 <?php
		   	if($vpss['JalanCaraDaftar']==4){
		   ?>
		  <b><font color="#009900">ONLINE</font></b>
		   <?php }else{ ?>
		  <b>OFFLINE</b>
		   <?php }?>
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
			  echo"<b>$vprr[PrshNama]</b>";
			
			 //if(empty($vpss['JalanNoUrut'])){ echo"Kosong"; }else{ echo"$vpss[JalanNoUrut]"; } 
			 ?>
			</td>
          </tr>
		  <?php $no++; }  ?>
        </table>
</body>
</html>
