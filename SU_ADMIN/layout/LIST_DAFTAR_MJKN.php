
<body>
		<h4><i class="fa fa-bars"></i>&nbsp;List Pendaftar MJKN</h4>
		<form method="post" action="">
		<table width="100%" border="0" class="table">
  <tr>
    <td><input type="date" name="tg1" class="form-control"></td>
    <td><input type="date" name="tg2" class="form-control"></td>
    <td><button name="cari" class="btn btn-info">Cari Data</button> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
  </form>

      <?php
				if(isset($_POST['cari'])){
					$tg1 = @$_POST['tg1'];
					$tg2 = @$_POST['tg2'];
					echo"<b>INTERVAL</b> $tg1 <> $tg2";
				$vps_jum = @$ms_q("SELECT  * FROM TRawatJalan where TanggalPesan BETWEEN '$tg1' AND '$tg2 23:59:00' AND JalanNoReg LIKE '%WS%' AND JalanNoReg LIKE '%PL-WS%' AND NOT JalanStatus='9' AND NOT JalanNoUrut='00'   ORDER BY JalanRMTanggal DESC"); #TOTAL AWAL
				$vps_jum_fns = @$ms_q("SELECT  * FROM TRawatJalan where TanggalPesan BETWEEN '$tg1' AND '$tg2 23:59:00' AND JalanNoReg LIKE '%WS%' AND JalanNoReg LIKE '%PL-WS%' AND JalanStatus='1' AND NOT JalanNoUrut='00'   ORDER BY JalanRMTanggal DESC"); #TOTAL Selesai
					$no = 1;
					
					$vpss_jum_nr = $ms_nr($vps_jum);
					$vpss_jum_fns_nr = $ms_nr($vps_jum_fns);
			?>
				<div class="alert alert-dismissible alert-success">
			 <i class="fas fa-info	"></i>
				<b>Informasi MJKN</b><br>
				<?PHP 
					echo"Pendaftar: $vpss_jum_nr"; 
					echo"<br>";
					echo"Selesai:  $vpss_jum_fns_nr";
				
				?>
				
			</div>
					<?PHP } ?>
</body>

