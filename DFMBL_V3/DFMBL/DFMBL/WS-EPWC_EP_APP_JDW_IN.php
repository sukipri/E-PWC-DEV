<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			#error_reporting(0);
?>
	<!-- 
	<div class="alert alert-dismissible alert-danger">
		<strong>masih dalam Pembuatan jangan digunakan</strong>
	</div>
	-->

<span class="mx-2 h5"><b>#ENTRI JADWAL</b></span>
	<form method="post">
<div style="max-width:20rem;" class="mx-2">
<!-- -->
	<div class="input-group input-group-sm mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1">Nama</span>
		</div>
		<input autocomplete="off" type="text" class="form-control form-control-sm" name="ep_cari_nama_01" required>
	</div>
		<br>
		<button name="ep_btn_cari_01" class="btn btn-success btn-sm">CARI DATA</button>
<hr>

	<?PHP 	
		if(isset($_POST['ep_btn_cari_01'])){
			$ep_cari_nama_01 = @$SQL_SL($_POST['ep_cari_nama_01']);
		$epwc_vkry01_sw02 = $CL_Q("$SL KaryNomor,KaryNomorYakkum,KaryNama,KaryJbtStruktural,UnitKode FROM Citarum.dbo.TKaryawan WHERE KaryNama LIKE '%$ep_cari_nama_01%'  AND (UnitKode='$epwc_vkry01_sww[UnitKode]' OR UnitKode='$epwc_vkry01_sww[UnitKode01]') AND (KaryStatus='10' OR KaryStatus='22') ");
			while($epwc_vkry01_sww02 = $CL_FAS($epwc_vkry01_sw02)){
						#SUB NIP 
							$epwc_sub_vkry01_sw = substr($epwc_vkry01_sww02['KaryNomorYakkum'],1);
			?>
						<div class="alert alert-dismissible alert-secondary">
								<i class="fas fa-user-alt"></i>&nbsp<?PHP echo $epwc_vkry01_sww02['KaryNomorYakkum']." ".$epwc_vkry01_sww02['KaryNama']; ?>
								<br>
								<a href="<?PHP echo"WS-EPWC_EP_APP_JDW_IN02_MNL.php?&IDEMP02=$epwc_sub_vkry01_sw&IDEMP01=$epwc_sub_vkry01_sw"; ?>" class="badge bg-danger"><i class="far fa-calendar"></i>&nbsp Entri jadwal / Day</a>
								&nbsp
								<!-- 
								<a href="<?PHP //echo"WS-EPWC_EP_APP_JDW_IN0301_MNL.php?&IDEMP02=$epwc_sub_vkry01_sw&IDEMP01=$epwc_sub_vkry01_sw"; ?>" class="badge bg-primary"><i class="fas fa-calendar-alt"></i>&nbspEntri jadwal / Month</a>
								&nbsp
								<a href="<?PHP //echo"?NAVI=EPWC_MENU_01_EP&PG_SA=WS-EPWC_EP_APP_JDW_LBR&IDEMP02=$epwc_sub_vkry01_sw&IDEMP01=$epwc_sub_vkry01_sw"; ?>" class="badge bg-success"><i class="fas fa-calendar-alt"></i>&nbsp Entri Lembur</a>
								-->
					</div>
							<?PHP } } ?>
<!-- -->
	</div>	
				<ol>
					<li>Cari Berdasarkan Nama Karyawan</li>
					<li>Klik <i>Entri jadwal</i> untuk memasukan Jadwal</li>

				</ol>
	</form>

		


<?PHP } ?>