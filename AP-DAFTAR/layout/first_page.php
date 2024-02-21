	<?php
			//Approve
				$vap = $ms_q("$sl AppJenisDaftar FROM TRawatJalan where AppJenisDaftar='2'");
					$hit_vap = $ms_nr($vap);
			//cancel
				$vap1 = $ms_q("$sl AppJenisDaftar FROM TRawatJalan where AppJenisDaftar='4'");
					$hit_vap1 = $ms_nr($vap1);
		?>
<div class="jumbotron">
  <h3><?php echo"Selamat Datang, $uu[namauser]"; ?></h3>
    <img src="../../images/kop.jpg">
	<br><br>
  <div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
 <h3>Jumlah pasien online yang di <i>Approve</i> <?php echo"<b>$hit_vap</b>"; ?></h3>
</div><div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
 <h3>Jumlah pasien online yang di <i>Cancel</i> <?php echo"<b>$hit_vap1</b>"; ?></h3>
</div>
