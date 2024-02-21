<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
	<?php $RM = @trim($_GET['RM']); ?>
	<ol class="breadcrumb">
  <li class="breadcrumb-item"><i class="fa fa-circle-o-notch"></i>&nbsp;Data Lab Pasien</li>
  <li class="breadcrumb-item"><a href="">Cari Hasil Lab</a></li>
</ol>

    <form name="form1" method="post" action="">
      <table width="100%" border="0" class="table table-bordered">
        <tr class="success">
          <td>#</td>
          <td>Nomor</td>
          <td>Tanggal</td>
          <td>Nomor RM</td>
          <td>Nama</td>
          <td>Alamat</td>
          <td>Tgl Lahir</td>
		  <td>Dokter</td>
        </tr>
		<?php
			$vlb = $ms_q("$sl TOP 300 LabNomor,LabTanggal,PasienNomorRM,DokterKode from TLab where PasienNomorRM='$RM' order by LabTanggal desc");
			$no = 1;
				while($vlbb = $ms_fas($vlb)){
					$vdk = $ms_q("$sl PelakuKode,PelakuNama from TPelaku where PelakuKode='$vlbb[DokterKode]'");
						$vdkk = $ms_fas($vdk);
						 $vps =  $ms_q("$sl PasienNomorRM,PasienNama,PasienAlamat,PasienTglLahir from TPasien  where PasienNomorRM='$vlbb[PasienNomorRM]'  ");
			$vpss = $ms_fas($vps);
			$vlb_con= $ms_q("select CONVERT(varchar(10),[LabTanggal],103) as tgl_lb from TLab where LabNomor='$vlbb[LabNomor]'");
					$vlbb_con = $ms_fas($vlb_con);
		?>
        <tr>
          <td><?php echo"$no"; ?></td>
          <td><?php echo"<a href=?HLM=DATA_PASIEN_LAB_DETAIL&IDLAB=$vlbb[LabNomor]&RM=$vpss[PasienNomorRM]&IDDKT=$vdkk[PelakuKode]#VIEW_HASIL>$vlbb[LabNomor]</a>"; ?></td>
          <td><?php echo"$vlbb_con[tgl_lb]"; ?></td>
          <td><?php echo"$vlbb[PasienNomorRM]"; ?></td>
          <td><?php echo"$vpss[PasienNama]"; ?></td>
          <td><?php echo"$vpss[PasienAlamat]"; ?></td>
          <td><?php echo"$vpss[PasienTglLahir]"; ?></td>
		   <td><?php echo"$vdkk[PelakuNama]"; ?></td>
        </tr>
		<?php $no++; } ?>
      </table>
    </form>
	
</body>
</html>
