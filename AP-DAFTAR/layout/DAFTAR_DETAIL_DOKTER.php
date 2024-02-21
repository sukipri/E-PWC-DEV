<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
			<?php
				$IDDKT = @trim($_GET['IDDKT']);
				  $vdkt =  $ms_q("$sl PelakuKode,PelakuNama,PelakuAlamat,PelakuTelepon,PelakuStatus,UnitKode from TPelaku where PelakuStatus='A' AND PelakuKode='$IDDKT' order by PelakuNama asc");
				$vdktt = $ms_fas($vdkt);
				$vpl = $ms_q("$sl UnitKode,UnitNama FROM  TUnit where UnitKode='$vdktt[UnitKode]'");
						$vpll = $ms_fas($vpl);
					//str_replcae
			$teksawal = "$vpll[UnitNama]";
 			$txt_01 = str_replace("Klinik Sp.", "", $teksawal);
			?>
	<ol class="breadcrumb">
  <li class="breadcrumb-item"><i class="fa fa-child"></i>&nbsp;Dokter</li>
  <li class="breadcrumb-item">Entri Jadwal Dokter</li>
</ol>
<br>

<form name="form1" method="post" action="">
<h4>FORM SUNTING DOKTER</h4>
  <table width="100%" border="0" class="table table-bordered">
    <tr>
      <td>
        <div class="input-group">
          <div class="input-group-addon">Kode</div>
          <input type="text" class="form-control" value="<?php echo"$IDDKT"; ?>" readonly="">
      </div></td>
      <td><div class="input-group">
          <div class="input-group-addon">Dokter</div>
       <input type="text" class="form-control" value="<?php echo"$vdktt[PelakuNama]"; ?>" readonly="">
      <td width="46%" rowspan="4">
	  <div class="input-group">
        		  <div class="input-group-addon">Hari & Jam Praktik</div>
				
		  	<?php
					$vjdl = $ms_q("$call_sel  JadwalDokter where DokterKode='$vdktt[PelakuKode]'");
					while($vjdll = $ms_fas($vjdl)){
								echo"<ul><li><a href=?HLM=EDIT_JADWAL_DOKTER&IDJDW=$vjdll[AtKd]###>$vjdll[KetHari] $vjdll[KetJam]</li></ul> ";
							}
			?>
		 
		  </div>
	   </td>
    </tr>
    <tr>
      <td><?php echo"Poli $txt_01"; ?></td>
      <td><?php echo"$vdktt[PelakuAlamat]"; ?></td>
    </tr>
    <tr>
      <td width="21%"><?php echo"$vdktt[PelakuTelepon]"; ?></td>
      <td width="33%">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="left">&nbsp;</td>
    </tr>
  </table>
  <br>
  <h4>Daftar Penanganan pasien</h4>
  <table width="100%" class="table table-bordered">
    <tr class="warning">
	<td width="3%" height="24">#</td>
      <td width="34%">#RM/Nama/Alamat</td>
      <td width="55%">#Tanggal Periksa/Pesan </td>
      <td width="8%">###</td>
    </tr>
	<?php
	$vps = @$ms_q("$sl TOP 100 JalanNoReg,PasienNomorRM,PasienNama,PasienAlamat,TanggalPesan,DokterKode,JalanCaraDaftar,JalanRMTanggal  FROM TRawatJalan where DokterKode='$IDDKT' order by TanggalPesan desc");
	$no = 1;
					while($vpss = $ms_fas($vps)){
				$vrj_kon= $ms_q("select CONVERT(varchar(10),[JalanRMTanggal],103) as tgl_rj from TRawatJalan where JalanNoReg='$vpss[JalanNoReg]'");
					$vrjj_kon = $ms_fas($vrj_kon);
					$vrj_kon_02= $ms_q("select CONVERT(varchar(10),[TanggalPesan],103) as tgl_rjj from TRawatJalan where JalanNoReg='$vpss[JalanNoReg]'");
					$vrjj_kon_02 = $ms_fas($vrj_kon_02);
	?>
    <tr>
	<td><?php echo"$no"; ?></td>
      <td><?php echo"$vpss[PasienNomorRM] <br>$vpss[PasienNama]<br>$vpss[PasienAlamat]"; ?></td>
      <td>
	  <?php echo"PR $vrjj_kon[tgl_rj]<br>PS $vrjj_kon_02[tgl_rjj]"; ?>
	  <br>
	   <?php
		   	if($vpss['JalanCaraDaftar']==4){
		   ?>
		  <b><font color="#009900">ONLINE</font></b>
		   <?php }else{ ?>
		  <b>OFFLINE</b>
		   <?php }?>
	  </td>
      <td width="8%">&nbsp;</td>
    </tr>
	<?php $no++; } ?>
  </table>
</form>
</body>
</html>
