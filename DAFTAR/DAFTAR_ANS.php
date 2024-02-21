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
  <li class="breadcrumb-item active">Masukan Nama Dokter *Asuransi</li>
</ol>
	<h4 class="display-3"><a href="#" class="btn btn-info btn-sm disabled">Cari  Dokter </a> &nbsp; <a href="DAFTAR_DOKTER_ANS.php" class="btn btn-warning btn-sm">Daftar Dokter</a></h4>
	<br>
	<form action="" method="post">
	<table width="200" border="0" class="table">
  <tr>
    <td> <input type="text" class="form-control"  name="nama" placeholder="Search" required=""></td>
    <td><button class="btn btn-info" name="cari">Cari Dokter</button></td>
  </tr>
	</table>
	<br>
	<?php
		 if(isset($_POST['cari'])){
		 	$nama= @$_POST['nama'];
			
	 ?>
	<table width="100%"  border="0" class="table table-bordered">
          <tr class="info">
            <td width="2%">#</td>
            <td width="33%">Nama Dokter</td>
            <td width="45%">Praktik</td>
            <td width="20%">##</td>
          </tr>
		  	<?php
				
				$vdkt =  $ms_q("$call_sel TPelaku where PelakuNama LIKE '%$nama%' AND PelakuStatus='A' AND  NOT PelakuNama LIKE '%PAKET%' order by PelakuNama asc");
				$no = 1;
							while($vdktt = $ms_fas($vdkt)){
						$vpl = $ms_q("$call_sel TUnit where UnitKode='$vdktt[UnitKode]'");
							$vpll = $ms_fas($vpl);
						$teksawal = "$vpll[UnitNama]";
 			//Memperbaiki kata Teima
		 		$txt_01 = str_replace("Klinik Sp.", "", $teksawal);
				?>
          <tr>
            <td><?php echo"$no"; ?></td>
            <td><?php echo"$vdktt[PelakuNama] <br> <b>$txt_01</b>"; ?></td>
            <td><?php
					$vjdl = $ms_q("$call_sel  JadwalDokter where DokterKode='$vdktt[PelakuKode]'");
					while($vjdll = $ms_fas($vjdl)){
							if($vjdll['shift']=="P"){
								echo"$vjdll[KetHari] $vjdll[KetJam]<br>";
					}elseif($vjdll['shift']=="S"){
					echo"$vjdll[KetHari] $vjdll[KetJam] <br>";
					}elseif($vjdll['shift']=="M"){
					echo"$vjdll[KetHari] $vjdll[KetJam] <br>";
					 }}?>
					</td>
            <td><a href="<?php echo"DAFTAR_STEP_02_ANS.php?IDDKT=$vdktt[PelakuKode]#$vdktt[SpesKode]"; ?>" class="btn btn-success"><i class="fa fa-map-marker"></i>&nbsp;Pilih Dokter</a></td>
          </tr>
		  <?php $no++; } ?>
        </table>
		<?php } ?>
	</form>
	</div>
	<?php include"footer.php"; ?>
</body>
</html>