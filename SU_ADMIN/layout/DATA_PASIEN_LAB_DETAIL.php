<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
	<?php
		$IDLAB = @trim($_GET['IDLAB']);
		$RM = @trim($_GET['RM']);
		$IDDKT = @trim($_GET['IDDKT']);
		$v02 = $ms_q("$call_sel VHasilLab WHERE LabNomor='$IDLAB'");
			$v022 = $ms_fas($v02);
			$vlb_con= $ms_q("select CONVERT(varchar(10),[LabTanggal],103) as tgl_lb from TLab where LabNomor='$v022[LabNomor]'");
					$vlbb_con = $ms_fas($vlb_con);
	?>
	<ol class="breadcrumb">
  <li class="breadcrumb-item"><i class="fa fa-circle-o-notch"></i>&nbsp;Data Lab Pasien</li>
  <li class="breadcrumb-item">Detail Lab</li>
  <li class="breadcrumb-item"><?php echo"RM $RM-Transaksi $IDLAB"; ?></li>
  <li class="breadcrumb-item"><?php echo"<a href=layout/CTK_LAB.php?IDLAB=$IDLAB&RM=$RM&IDDKT=$IDDKT#VIEW_HASIL target=_blank>Print Hasil Lab</a>"; ?></li>
</ol>

    <table width="100%" border="0" class="table">
      <tr>
        <td width="8%">No.Reg</td>
        <td width="39%"><?php echo"$v022[LabNoReg]"; ?></td>
        <td width="10%">No.RM</td>
        <td width="43%"><?php echo"$v022[PasienNomorRM]"; ?></td>
      </tr>
      <tr>
        <td>Tanggal</td>
        <td><?php echo"$vlbb_con[tgl_lb]"; ?></td>
        <td>Jenis Kelamin </td>
        <td><?php echo"$v022[PasienGender]"; ?></td>
      </tr>
      <tr>
        <td>Ruang</td>
        <td><?php echo"$v022[TTNama]"; ?></td>
        <td>Nama Pasien </td>
        <td><?php echo"$v022[PasienNama]"; ?></td>
      </tr>
      <tr>
        <td>Kelas</td>
        <td><?php echo"$v022[KelasKode]"; ?></td>
        <td>Alamat</td>
        <td><?php echo"$v022[PasienAlamat]"; ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>Dokter</td>
        <td><?php echo"$v022[DokterNama]"; ?></td>
      </tr>
    </table>
    <table width="100%" border="0" class="table table-bordered">
      <tr align="center" class="warning">
        <td>Pemeriksaan</td>
        <td>Hasil</td>
        <td>Satuan</td>
        <td>Harga Normal</td>
        <td>Keterangan</td>
      </tr>
	  <?php
	  	$v01 = $ms_q("$call_sel VHasilLab WHERE LabNomor='$IDLAB'");
			while($v011 = $ms_fas($v01)){
	  ?>
      <tr>
        <td><?php echo"$v011[LabNama]"; ?></td>
        <td align="center"><?php echo"$v011[LabHasil]"; ?></td>
        <td align="center"><?php echo"$v011[LabSatuan]"; ?></td>
        <td align="center"><?php echo"$v011[LabHargaNorm]"; ?></td>
        <td><?php //echo"$v011[LabNama]"; ?></td>
      </tr>
	  <?php } ?>
    </table>
</body>
</html>
