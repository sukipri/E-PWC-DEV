	<?php
		error_reporting(0);
				include_once"../config/connec_01_srv.php";
				include"../secure/GR_01.php"; //security enggine
				 include"../sc/ID_IDF.php";  //Identifer ID PAGE
       			 include"../sc/stack_Q.php"; //Query SQL
				  include"../sc/code_rand.php"; 
		include"css.php"; 
	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<style>
 .txt{color:#FFFFFF;}
 .txt_hr{color:#000000;}
 .pd{padding:1em;}
</style>
<body onload="window.print();">
	<?php
		$IDLAB = @trim($_GET['IDLAB']);
		$RM = @trim($_GET['RM']);
		$IDDKT = @trim($_GET['IDDKT']);
		$v02 = $ms_q("$call_sel VHasilLab WHERE LabNomor='$IDLAB'");
			$v022 = $ms_fas($v02);
			$vlb_con= $ms_q("select CONVERT(varchar(10),[LabTanggal],103) as tgl_lb from TLab where LabNomor='$v022[LabNomor]'");
					$vlbb_con = $ms_fas($vlb_con);
	?>
<div class="container">
		<br><br>
	<?php echo"NO <b>$IDLAB</b>"; ?>
	<br><br>
  <table width="100%" border="1" rules="cols">
      <tr>
        <td width="13%">No.Reg</td>
        <td width="38%"><?php echo"$v022[LabNoReg]"; ?></td>
        <td width="14%">No.RM</td>
        <td width="35%"><?php echo"$v022[PasienNomorRM]"; ?></td>
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
	<br>
    <table width="100%"  border="1" rules="cols">
      <tr  align="center" bgcolor="#000000" class="txt">
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
	<br><br><br>
	<table width="100%">
      <tr align="center">
        <td width="52%"><br>
        <br><br><b>Pemeriksaa 1</b></td>
        <td width="48%">
		<?php echo"Semarang, $date_html5<br>Dicetak Jam $time_html5"; ?>
		<br>
		<br><br>
		<b>Pemeriksaa 2</b></td>
      </tr>
  </table>
</div>
</body>
</html>
