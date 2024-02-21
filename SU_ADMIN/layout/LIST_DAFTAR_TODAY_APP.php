<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
		<h4><i class="fa fa-bars"></i>&nbsp;Daftar pasien inden <i>online</i> &nbsp; <a href="?HLM=LIST_DAFTAR_TODAY" class="btn btn-warning btn-sm">Belum Disetujui</a>&nbsp; <a href="#" class="btn btn-warning btn-sm disabled"> Disetujui</a>&nbsp; <a href="?HLM=LIST_DAFTAR_CARI" class="btn btn-primary btn-sm"><i class="fa fa-search"></i>&nbsp;Cari Pendaftar</a></h4>
		
        <table width="100%" border="0" class="table table-bordered">
          <tr class="info">
            <td width="2%">#</td>
            <td width="11%">NO REG</td>
            <td width="5%">NO RM</td>
            <td width="13%">Nama</td>
            <td width="13%">Alamat</td>
            <td width="8%">Tgl Pesan</td>
            <td width="9%">Tgl Periksa </td>
            <td width="35%">GendDokter,Poli,Penanggunger</td>
         <td width="4%">VIA</td>
          </tr>
		  	<?php
				$tg = date('d');
				$hit_dt = $tg + 1;
	$vps = @$ms_q("SELECT TOP 50 *  FROM TRawatJalan where  AppJenisDaftar='2' AND NOT JalanStatus='9' order by TanggalPesan desc");
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
				$vrj_con= $ms_q("select CONVERT(varchar(10),[JalanRMTanggal],103) as tgl_rj from TRawatJalan where JalanNoReg='$vpss[JalanNoReg]'");
					$vrjj_con = $ms_fas($vrj_con);
					$vrj_con_02= $ms_q("select CONVERT(varchar(10),[TanggalPesan],103) as tgl_rjj from TRawatJalan where JalanNoReg='$vpss[JalanNoReg]'");
					$vrjj_con_02 = $ms_fas($vrj_con_02);
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
            <td><?php echo"$vpss[PasienNama]<br> Kode Waktu: <b>$vpss[WaktuPesan]</b>"; ?> <br> <?php echo"Gender $vpss[PasienGender]"; ?></td>
            <td><?php echo"$vpss[PasienAlamat]"; ?></td>
            <td><?php echo"$vrjj_con_02[tgl_rjj]"; ?></td>
            <td><?php echo"$vrjj_con[tgl_rj] "; ?></td>
            <td><?php 
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
              <?php } ?></td>
             <td>
			 <?php
			 		if($vpss['UserID1']=="MOBILE"){
			 ?>
               <h2><i class="fa fa-mobile"></i></h2>
               <?php }elseif($vpss['UserID1']=="WEB"){ ?>
               <h4><i class="fa fa-desktop"></i></h4>
               <?php }else{ ?>
			   	<h4><font color="#006633">ONLINE</font></h4>
				<?php } ?>
			  </td>
          </tr>
		  <?php $no++; }  ?>
        </table>
</body>
</html>
