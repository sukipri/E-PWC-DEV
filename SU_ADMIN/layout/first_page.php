	<?php
			//Approve
				$vap = $ms_q("$sl AppJenisDaftar FROM TRawatJalan where AppJenisDaftar='2'");
					$hit_vap = $ms_nr($vap);
					$num_vap = number_format($hit_vap);
			//cancel
				$vap1 = $ms_q("$sl AppJenisDaftar FROM TRawatJalan where AppJenisDaftar='4'");
					$hit_vap1 = $ms_nr($vap1);
					$num_vap1 = number_format($hit_vap1);
				//BPJS
					$vap2 = $ms_q("$sl AppJenisDaftar FROM TRawatJalan where PrshKode='1-0113' AND JalanCaraDaftar='4' AND AppJenisDaftar='2' AND JalanTanggal  BETWEEN '$years_big-01-01' AND '$years_big-12-31 23:59:00' ");
					$hit_vap2 = $ms_nr($vap2);
					$num_vap2 = number_format($hit_vap2);
					//BPJS_offline
					$vap21 = $ms_q("$sl AppJenisDaftar FROM TRawatJalan where PrshKode='1-0113' AND not JalanCaraDaftar='4' AND NOT JalanStatus='9' AND JalanRMTanggal BETWEEN '$years_big-01-01' AND '$years_big-$month-$day 23:59'");
					$hit_vap21 = $ms_nr($vap21);
					$num_vap21 = number_format($hit_vap21);
				//pribadi
					$vap3 = $ms_q("$sl AppJenisDaftar FROM TRawatJalan where PrshKode='0-0000' AND JalanCaraDaftar='4' AND AppJenisDaftar='2' AND JalanRMTanggal BETWEEN '$years_big-01-01' AND '$years_big-$month-$day 23:59'");
					$hit_vap3 = $ms_nr($vap3);
					$num_vap3 = number_format($hit_vap3);
				//asuransi
					$vap4 = $ms_q("$sl AppJenisDaftar FROM TRawatJalan where NOT PrshKode='0-0000' AND NOT PrshKode='1-0113'  AND JalanCaraDaftar='4' AND AppJenisDaftar='2' AND JalanRMTanggal BETWEEN '$years_big-01-01' AND '$years_big-$month-$day 23:59'");
					$hit_vap4 = $ms_nr($vap4);
					$num_vap4 = number_format($hit_vap4);
		?>
<div class="jumbotron">
  <h3><?php echo"Selamat Datang, $uu[namauser]"; ?></h3>
    <img src="../../images/kop.jpg">
	<br><br>


	<table width="200" border="0" class="table">
	  <tr>
		<td>
		 <div class="alert alert-dismissible alert-success">
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
	 <h3>Jumlah pasien online yang di <i>Approve</i> <?php echo"<br><center><b>$num_vap</b></center>"; ?></h3>
	</div>	</td>
		<td> <div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
 <h3>Jumlah pasien online yang di <i>Cancel</i> <?php echo"<br><center><b>$num_vap1</b></center>"; ?></h3>
</div></td>
	  </tr>
	  <tr>
		<td colspan="2"><h3>#PENANGGUNG</h3></td>
	  </tr>
	  <tr>
	    <td> <div class="alert alert-dismissible alert-warning">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
 <h3>Jumlah pasien <i>BPJS</i> Online <?php echo"<br><center><b>$num_vap2</b></center>"; ?></h3>
</div></td>
	    <td><div class="alert alert-dismissible alert-info">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
 <h3>Jumlah pasien <i>Pribadi</i> Online <?php echo"<br><center><b>$num_vap3</b></center>"; ?></h3>
</div></td>
      </tr>
	  <tr>
	    <td>
		<div class="alert alert-dismissible alert-info">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
 <h3>Jumlah pasien <i>Asuransi</i> Online <?php echo"<br><center><b>$num_vap4</b></center>"; ?></h3>
</div>		</td>
	    <td>&nbsp;</td>
      </tr>
	  <tr class="primary">
	    <td colspan="2">OFFLINE</td>
      </tr>
	  <tr>
	    <td>	<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
 <h3>Jumlah pasien <i>BPJS</i> Offline <?php echo"<br><center><b>$num_vap21</b></center>"; ?></h3>
</div>	</td>
        <td>&nbsp;</td>
	  </tr>
	</table>
</div>