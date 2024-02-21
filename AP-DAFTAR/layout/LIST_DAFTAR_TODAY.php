<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
		<h4><i class="fa fa-bars"></i>&nbsp;Daftar pasien inden <i>online</i> &nbsp; <a href="#" class="btn btn-warning btn-sm disabled">Belum Disetujui</a>&nbsp; <a href="?HLM=LIST_DAFTAR_TODAY_APP" class="btn btn-warning btn-sm"> Disetujui</a>&nbsp; <a href="?HLM=LIST_DAFTAR_CARI" class="btn btn-primary btn-sm"><i class="fa fa-search"></i>&nbsp;Cari Pendaftar</a></h4>
		
        <table width="100%" border="0" class="table table-bordered">
          <tr class="info">
            <td width="2%">#</td>
            <td width="12%">No REG</td>
            <td width="6%">No RM</td>
            <td width="14%">Nama</td>
            <td width="14%">Alamat</td>
            <td width="9%">Tgl Pesan</td>
            <td width="10%">Tgl Periksa </td>
            <td width="29%">Dokter,Poli,Penanggung</td>
         <td width="4%">VIA</td>
          </tr>
		  	<?php
				$tg = date('d');
				$hit_dt = $tg + 1;
	$vps = @$ms_q("SELECT *  FROM TRawatJalan where   JalanCaraDaftar='4' AND AppJenisDaftar='3' order by TanggalPesan desc");
					$no = 1;
					while($vpss = $ms_fas($vps)){
					$vpl = $ms_q("$call_sel TUnit where UnitKode='$vpss[UnitKode]'");
						$vpll = $ms_fas($vpl);
					$vdk = $ms_q("$sl PelakuKode,PelakuNama from TPelaku where PelakuKode='$vpss[DokterKode]'");
						$vdkk = $ms_fas($vdk);
					$vpr =  $ms_q("$sl PrshKode,PrshNama from TPerusahaan  where PrshKode='$vpss[PrshKode]'");
						$vprr = $ms_fas($vpr);
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
			<?php
				if($vpss['AppJenisDaftar']==2){
				?>
				<a class="btn btn-success btn-sm">Success<?php echo"<b>&nbsp;#$vpss[JalanNoUrut]</b></a> "; ?>
				<?php }elseif($vpss['AppJenisDaftar']==1){?>
				<span class="badge badge-primary">On Proccess</span>
				<?php }elseif($vpss['AppJenisDaftar']==3){ ?>
				<a href="<?php echo"?HLM=LIST_DETAIL_DAFTAR&IDDKT=$vpss[DokterKode]&RM=$vpss[PasienNomorRM]&WAKTU=$vpss[WaktuPesan]&REG=$vpss[JalanNoReg]&LENGKAP=LENGKAP#LENGKAP"; ?>" class="btn btn-warning btn-sm">Butuh Persetujuan</a>
				<?php } ?>
			</td>
            <td><?php echo"<a href=?HLM=LIST_DETAIL_DAFTAR&IDDKT=$vpss[DokterKode]&RM=$vpss[PasienNomorRM]&WAKTU=$vpss[WaktuPesan]&REG=$vpss[JalanNoReg]&LENGKAP=LENGKAP#LENGKAP>$vpss[PasienNomorRM]</a>"; ?></td>
            <td><?php echo"$vpss[PasienNama]<br> Kode Waktu: <b>$vpss[WaktuPesan]</b>"; ?><br> <?php echo"Gender $vpss[PasienGender]"; ?></td>
            <td><?php echo"$vpss[PasienAlamat]"; ?></td>
                 <td><?php echo"$vrjj_con_02[tgl_rjj]"; ?></td>
            <td><?php echo"$vrjj_con[tgl_rj] "; ?></td>
            <td><?php 
			  echo"$vdkk[PelakuNama]<br>";
			 echo"$txt_01<br>";
			  echo"<b>$vprr[PrshNama]</b>";
			
			 //if(empty($vpss['JalanNoUrut'])){ echo"Kosong"; }else{ echo"$vpss[JalanNoUrut]"; } 
			 ?></td>
             <td align="center"><?php
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
