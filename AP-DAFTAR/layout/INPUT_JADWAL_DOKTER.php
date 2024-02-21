<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
	<ol class="breadcrumb">
  <li class="breadcrumb-item"><i class="fa fa-child"></i>&nbsp;Dokter</li>
  <li class="breadcrumb-item">Entri Jadwal Dokter</li>
</ol>
<br>

<form name="form1" method="post" action="">
  <table width="100%" border="0" class="table table-bordered">
    <tr>
      <td colspan="2">
        <div class="input-group">
          <div class="input-group-addon">Dokter</div>
          <select name="kd" class="form-control" required>
            <option value="">Pilih Dokter...</option>
            <?php
		  $vdkt =  $ms_q("$sl PelakuKode,PelakuNama,PelakuStatus,UnitKode from TPelaku where PelakuStatus='A' order by PelakuNama asc");
				while($vdktt = $ms_fas($vdkt)){
					$vpl = $ms_q("$sl UnitKode,UnitNama from TUnit where UnitKode='$vdktt[UnitKode]'");
				$vpll = $ms_fas($vpl);
					echo"<option value=$vdktt[PelakuKode]>$vdktt[PelakuNama] //$vpll[UnitNama]</option>";
				}?>
          </select>
      </div></td>
      <td width="46%" rowspan="4">
	  	<?php
			if(isset($_POST['simpan'])){
				$kd = @trim($_POST['kd']);
				$hari = @trim($_POST['hari']);
				$kdjam = @trim($_POST['kdjam']);
				$jam = @trim($_POST['jam']);
				$jam2 = @trim($_POST['jam2']);
					$hit_jam = "$jam-$jam2";
							$ms_q("$in JadwalDokter(DokterKode,AutoNomor,KetHari,KetJam,shift)values('$kd','','$hari','$hit_jam','$kdjam')");
							?>
							<div class="alert alert-dismissible alert-success">
  			<button type="button" class="close" data-dismiss="alert">&times;</button>
  				<strong>Great..</strong> Data Berhasil Dimasukan </div>
						<?php }?>
		</td>
    </tr>
    <tr>
      <td>
        <div class="input-group">
          <div class="input-group-addon">Hari</div>
          <select name="hari" class="form-control" required>
            <?php
		  	$namahari = array("Senin","Selasa","Rabu","kamis","Jumat","Sabtu","Minggu");
			$no_hari = 0;
		  ?>
            <option value="">Pilih Hari...</option>
            <?php
					while($no_hari <= 6){
						echo"<option value=$namahari[$no_hari]>$namahari[$no_hari]</option>";
							$no_hari++;
						}
			?>
          </select>
      </div></td>
      <td><span class="input-group">
        <select name="kdjam" class="form-control" required>
      <option value="">Kode Jam...</option>
	   <option value="P">Pagi</option>
	    <option value="S">Siang</option>
		<option value="M">Lainya</option>

        </select>
      </span></td>
    </tr>
    <tr>
      <td width="34%"><input type="text" name="jam" class="form-control" required></td>
      <td width="20%"><input type="text" name="jam2" class="form-control" required></td>
    </tr>
    <tr>
      <td colspan="2" align="left"><button class="btn btn-success" name="simpan"><i class="fa fa-pencil"></i>&nbsp;Simpan Data</button></td>
    </tr>
  </table>
</form>
</body>
</html>
