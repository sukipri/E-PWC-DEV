<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
	<?php
		$RM = @trim($_GET['RM']);
			
	?>
		<h4><i class="fa fa-bars"></i>&nbsp;Riwayat Rawat Jalan <?php echo"#$RM"; ?></h4>
		
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
				$tg = date('d');
				$hit_dt = $tg + 1;
	$vps = @$ms_q("SELECT *  FROM TRawatJalan where PasienNomorRM='$RM' order by TanggalPesan desc");
					$no = 1;
					while($vpss = $ms_fas($vps)){
					$vpl = $ms_q("$call_sel TUnit where UnitKode='$vpss[UnitKode]'");
						$vpll = $ms_fas($vpl);
				?>
          <tr>
            <td><?php echo"$no"; ?></td>
            <td>
			<?php echo"$vpss[JalanNoReg]"; ?>
			<?php
				if($vpss['AppJenisDaftar']==2){
				?>
				<a class="btn btn-success btn-sm">Success<?php echo"<b>&nbsp;#$vpss[JalanNoUrut]</b></a> "; ?></a>
				<?php }elseif($vpss['AppJenisDaftar']==1){?>
				<span class="badge badge-primary">On Proccess</span>
				<?php }elseif($vpss['AppJenisDaftar']==3){ ?>
				<a href="<?php echo"#"; ?>" class="btn btn-warning btn-sm">Need Approval</a>
				<?php } ?>
			</td>
            <td><?php echo"<a href=?HLM=DETAIL_RIWAYAT_RAWAT&IDDKT=$vpss[DokterKode]&RM=$vpss[PasienNomorRM]&REG=$vpss[JalanNoReg]&FNS=FNS#LENGKAP>$vpss[PasienNomorRM]</a>"; ?></td>
            <td><?php echo"$vpss[PasienNama]<br> Kode Waktu: <b>$vpss[WaktuPesan]</b>"; ?></td>
            <td><?php echo"$vpss[PasienAlamat]"; ?></td>
            <td><?php echo"$vpss[TanggalPesan]"; ?></td>
            <td><?php echo"$vpss[JalanRMTanggal] "; ?></td>
            <td><?php echo"$vpss[PasienGender]"; ?></td>
             <td>
			 <?php 
			 echo"$vpll[UnitNama]";
			 //if(empty($vpss['JalanNoUrut'])){ echo"Kosong"; }else{ echo"$vpss[JalanNoUrut]"; } 
			 ?>
			</td>
          </tr>
		  <?php $no++; }  ?>
        </table>
</body>
</html>
