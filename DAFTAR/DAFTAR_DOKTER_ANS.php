<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<?php
	include"config.php"; 
	include"css.php"; 
	?>

	<body>
	<?php include"MENU.php"; ?>
	<br><br><br>
	<div class="container">
	<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="DAFTAR.php">Pilih Dokter</a></li>
  <li class="breadcrumb-item active">Masukan Nama Dokter</li>
	</ol>
	<h4 class="display-3"><a href="DAFTAR.php" class="btn btn-info btn-sm">Cari  Dokter </a> &nbsp; <a href="#" class="btn btn-warning btn-sm disabled">Daftar Dokter</a></h4>
	<br>
	<form action="" method="post">
	<table width="100%"  border="0" class="table table-bordered">
          <tr class="info">
            <td width="2%">#</td>
            <td width="33%">Nama Dokter</td>
            <td width="45%">Praktik</td>
            <td width="20%">##</td>
          </tr>
		  	<?php
				
				$vdkt =  $ms_q("$call_sel TPelaku where PelakuStatus='A' AND  NOT PelakuNama LIKE '%PAKET%' order by PelakuNama asc");
				$no = 1;
							while($vdktt = $ms_fas($vdkt)){
						$vpl = $ms_q("$call_sel TUnit where UnitKode='$vdktt[UnitKode]'");
							$vpll = $ms_fas($vpl);
				$teksawal = "$vpll[UnitNama]";
 			$txt_01 = str_replace("Klinik Sp.", "", $teksawal);
				?>
          <tr>
            <td><?php echo"$no"; ?></td>
            <td><?php echo"$vdktt[PelakuNama] <br> <b>P$txt_01</b>"; ?></td>
            <td><?php
					$vjdl = $ms_q("$call_sel JadwalDokter where DokterKode='$vdktt[PelakuKode]'");
					$vjdl_nr = $ms_nr($vjdl);
					while($vjdll = $ms_fas($vjdl)){
						if($vjdl_nr < 0 ){
							echo"Tidak Ada Praktik";
							}elseif($vjdl_nr > 0){
							echo"$vjdll[KetHari] $vjdll[KetJam]<br>";
					} }
						
			?></td>
            <td><a href="<?php echo"DAFTAR_STEP_02_ANS.php?IDDKT=$vdktt[PelakuKode]#$vdktt[SpesKode]"; ?>" class="btn btn-success"><i class="fa fa-map-marker"></i>&nbsp;Pilih Dokter</a></td>
          </tr>
		  <?php $no++; } ?>
        </table>
	</form>
	</div>
	<?php include"footer.php"; ?>
</body>
</html>