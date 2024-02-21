<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<?php
		error_reporting(0);
		include"config.php"; 
		include"css.php"; 
	?>
	<body>
	<?php include"MENU.php"; ?>
	<?php 
			$hit_tgl = "$years$month";
			$hit_tgl_02 = $hit_tgl - 1;
			$ON = "O";	
		//$ms_q("UPDATE TNomor set NomorKode='PL-$years$month-' where NomorKode='PL-$hit_tgl_02-'");
			$IDDKT = @trim($sql_slash($_GET['IDDKT']));
						//if($IDDKT==""){ echo"KOSONG";}else{ echo"ADA";}
			$BCK = @trim($sql_slash($_GET['BCK']));
			$REG = @trim($sql_slash($_GET['REG']));
			$vdkt =  $ms_q("$call_sel TPelaku where PelakuKode='$IDDKT'");
			$vdktt = $ms_fas($vdkt);
			$vpl = $ms_q("$call_sel TUnit where UnitKode='$vdktt[UnitKode]'");
			$vpll = $ms_fas($vpl);
			$vrj = @$ms_q("select TNomor.NomorKode,TNomor.NomorAkhir from TNomor where TNomor.NomorKode='PL-$years$month-'");
				$vrjj = $ms_fas($vrj);
			//$vuni = $ms_q("$sl UnitKode,REPLACE(UnitNama,'Sp.','') as UnitNama FROM ($sl UnitKode,REPLACE(UnitNama,'Klinik','') AS UnitNama From TUnit where UnitKode=')");
					$hit_vrj = $vrjj['NomorAkhir'];
					$hit_vrj_p = $vrjj['NomorAkhir'] + 1;
					$hit_zero = sprintf("%02d", $hit_vrj);
					//echo"$hit_zero";
			// substr
			/*
			$kalimat = "$vpll[UnitNama]";
			$sub_kalimat = substr($kalimat,6);
				*/
				//teks yang akan kita ganti
 				$teksawal = "$vpll[UnitNama]";
 			//Memperbaiki kata Teima
		 		$txt_01 = str_replace("Klinik Sp.", "", $teksawal);
				//echo"$txt_01";
						if(isset($_GET['BCK'])){
					$ms_q("$dl from TRawatJalan where JalanNoReg='$REG'");
					$ms_q("update TNomor set NomorAkhir='$hit_vrj' where NomorKode='PL-$years$month-'");
					} ?>
		<br><br><br><br>
		<div class="container">
	<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="DAFTAR.php">Pilih Dokter</a></li>
  <li class="breadcrumb-item active">Masukan Nomor RM & Tanggal Pesan *(BPJS</li>
</ol>
	<form method="post" action="">
	  <table width="100%" border="0" class="table table-bordered">
        <tr>
          <td width="46%" height="180">
		  <div class="input-group">
          <div class="input-group-addon">Dokter</div>
	 		<input type="text" name="dokter" readonly class="form-control" value="<?php echo"$vdktt[PelakuNama]"; ?>">
	  </div>
	  <br>
	  <div class="input-group">
          <div class="input-group-addon">Poli</div>
	 		<input type="text" name="poli" readonly class="form-control" value="<?php echo"$txt_01"; ?>">
	  </div>	  </td>
          <td width="54%">
		<div class="input-group">
        		  <div class="input-group-addon">Hari & Jam Praktik</div>
				  
			  <select name="waktu" size="8" class="form-control"  required>
		  <option value="" selected></option>
		  	<?php
					$vjdl = $ms_q("$call_sel  JadwalDokter where DokterKode='$vdktt[PelakuKode]'");
					while($vjdll = $ms_fas($vjdl)){
							if($vjdll['shift']=="P"){
								echo"<option value=$vjdll[AtKd]>$vjdll[KetHari] $vjdll[KetJam]</option>";
								}elseif($vjdll['shift']=="S"){
								echo"<option value=$vjdll[AtKd]>$vjdll[KetHari] $vjdll[KetJam]</option>";
							}elseif($vjdll['shift']=="M"){
								echo"<option value=$vjdll[AtKd]>$vjdll[KetHari] $vjdll[KetJam]</option>";
								}}
			?>
		  </select>
		  </div>
		
        </td>
        </tr>
        <tr>
          <td> 
		  <div class="input-group">
          <div class="input-group-addon">Nomor Reg</div>
	 		<input type="text" name="noreg"  class="form-control" readonly value="<?php if($hit_zero > 9999){ echo"PL-$month$ON$hit_zero";}elseif($hit_zero < 9999){ echo"PL-$month$ON$hit_zero";} ?>" required>
	  </div>
	  <br>
		  <div class="input-group">
          <div class="input-group-addon">Nomor RM</div>
	 		<input type="text" name="rm"  class="form-control" required>
	  </div>
	  </td>
          <td>
		  
		  	<!--
            <div class="form-group">
                <label for="dtp_input1" class="col-md-3 control-label">Buat Perjanjian</label>
                <div class="input-group date form_datetime col-md-8" data-date="<?php //echo"$years_big-$month-16T05:25:07Z"; ?>" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                    <input class="form-control"  type="text" value="" required>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
				
				<input type="hidden" id="dtp_input1" name="dt_tgl" value="" /><br/>
            </div>
			-->
				  <div class="input-group">
        		  <div class="input-group-addon">Tanggal Periksa</div>
	 		      <input type="date" name="dt_tgl"  class="form-control" required>
			  </div>
			<br>
			 
		 </td>
        </tr>
        <tr>
          <td height="37"><button class="btn btn-danger" name="simpan">Simpan Data</button></td>
          <td>
		  <?php
		  		if(isset($_POST['simpan'])){
					$dt_tgl = trim($_POST['dt_tgl']);
					$rm = @trim($_POST['rm']);
					$noreg = @trim($_POST['noreg']);
					$waktu = @trim($_POST['waktu']);
					$dt = "$date_html5 $time_html5";
						$vp =  $ms_q("select TPasien.PasienNomorRM from TPasien where PasienNomorRM='$rm'");
							$vpp = $ms_nr($vp);
					if($vpp < 1){
							?>
							<div class="alert alert-dismissible alert-danger">
  			<button type="button" class="close" data-dismiss="alert">&times;</button>
  				<strong>Maaf</strong> Nomor Rekam Medis Tidak Ditemukan
							</div>
						<?php }else{  ?>
						
						<?php
							if(empty($waktu)){
								?>
								<div class="alert alert-dismissible alert-danger">
  			<button type="button" class="close" data-dismiss="alert">&times;</button>
  				<strong>Maaf</strong> Hari & Jam Praktik harus diisi
							</div>
							<?php //JalanDiagKode1,JalanDiagNama1,JalanKasus1,JalanDiagKode2,JalanDiagNama2,JalanKasus2,JalanDiagKode3,JalanDiagNama3,JalanKasus3,JalanTindKode1,JalanTindNama1,JalanTindKode2,JalanTindNama2,JalanTindKode3,JalanTindNama3, ?>
								<?php
								}else{
							//echo"$noreg";
								$ms_q("$in TRawatJalan(JalanNoReg,PasienNomorRM,PasienGender,PasienNama,PasienAlamat,PasienKota,PasienWilayah,JalanTanggal,TanggalPesan,UnitKode,DokterKode,JalanCaraDaftar,JalanStatus,JalanRMTanggal,JalanRMTanggal2,VarKode,AppJenisDaftar,AtKd)values('$noreg','$rm','','','','','','$dt','$dt','$vdktt[UnitKode]','$IDDKT','4','0','$dt_tgl','$dt_tgl','4','1','$waktu')") or die("Maaf, Data gagal masuk Coba lagi");  
								 $ms_q("update TNomor set NomorAkhir='$hit_vrj_p' where NomorKode='PL-$years$month-'");
						 header("location:DAFTAR_STEP_03.php?IDDKT=$IDDKT&RM=$rm&REG=$noreg"); 
						  }}}
						  ?>
		  </td>
        </tr>
      </table>
	</form>
	</div>
	<?php include"footer.php"; ?>
</body>
</html>
