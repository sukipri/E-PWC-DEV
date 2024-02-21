<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>
	<?php 
		error_reporting(0);
			include"config02.php";
			include"css.php";
	?>
<body>
		<?php include"MENU.php"; ?>
			<?php 
			$hit_tgl = "$years$month";
			$hit_tgl_02 = $hit_tgl - 1;
				
		//$ms_q("UPDATE TNomor set NomorKode='PL-$years$month-' where NomorKode='PL-$hit_tgl_02-'");
			$IDDKT = @$_GET['IDDKT'];
			$BCK = @$_GET['BCK'];
			$REG = @$_GET['REG'];
			$vdkt =  $ms_q("$call_sel TPelaku where PelakuKode='$IDDKT'");
			$vdktt = $ms_fas($vdkt);
			$vpl = $ms_q("$call_sel TUnit where UnitKode='$vdktt[UnitKode]'");
			$vpll = $ms_fas($vpl);
			$vrj = @$ms_q("select TNomor.NomorKode,TNomor.NomorAkhir from TNomor where TNomor.NomorKode='PL-$years$month-'");
				$vrjj = $ms_fas($vrj);
					$hit_vrj = $vrjj['NomorAkhir'];
					$hit_vrj_p = $vrjj['NomorAkhir'] + 1;
					$hit_zero = sprintf("%04d", $hit_vrj);
				//str_replcae
			$teksawal = "$vpll[UnitNama]";
 			$txt_01 = str_replace("Klinik Sp.", "", $teksawal);
				if(isset($_GET['BCK'])){
					$ms_q("$dl from TRawatJalan where JalanNoReg='$REG'");
					$ms_q("update TNomor set NomorAkhir='$hit_vrj' where NomorKode='PL-$years$month-'");
					} ?>
	<nav>
	 <div class="nav-wrapper">
	   <ul>
      <li><a href="#!!">Masukkan nomor RM & Jam periksa &raquo; Langkah 01</a></li>
      </ul>
	  </div>
	</nav>
		<div class="pdt txt">
		<div class="container">
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
						<font color="#CC3333"><strong>Maaf!!</strong> Nomor Rekam Medis Tidak Ditemukan</font>
						<?php }else{ ?>
						<?php
							if(empty($waktu)){
								?>
								<font color="#CC3333"><strong>Maaf!!</strong> Hari & Jam Praktik harus diisi</font>
					<?php }elseif($date_web==$dt_tgl){?>
								<b>Maaf!!</b> Pengindenan harus 1 hari sebelum periksa
							<?php
								}else{
							//echo"$noreg";
								$ms_q("$in TRawatJalan(JalanNoReg,PasienNomorRM,TanggalPesan,UnitKode,DokterKode,JalanCaraDaftar,JalanRMTanggal,JalanRMTanggal2,VarKode,AppJenisDaftar,AtKd)values('$noreg','$rm','$dt','$vdktt[UnitKode]','$IDDKT','4','$dt_tgl','$dt_tgl','4','1','$waktu')") or die("Maaf, Data gagal masuk Coba lagi");  
								 $ms_q("update TNomor set NomorAkhir='$hit_vrj_p' where NomorKode='PL-$years$month-'");
						 header("location:DAFTAR_STEP_03.php?IDDKT=$IDDKT&RM=$rm&REG=$noreg"); 
						  }}}
						  ?>
	
	<form method="post">

		  <label>Dokter</label>
		 <input name="dokter" type="text" class="validate" readonly="" value="<?php echo"$vdktt[PelakuNama]"; ?>">
		  <label for="email">Poli</label>
      <input name="poli" type="text" class="validate" readonly="" value="<?php echo"$txt_01"; ?>">
	   <label for="email">No pendaftaran</label>
         <input name="noreg" type="text" class="validate" readonly="" value="<?php if($hit_zero > 9999){ echo"PL-$years$month$hit_zero";}elseif($hit_zero < 9999){ echo"$vrjj[NomorKode]$hit_zero";} ?>">
              <label for="email">No RM(Rekam Medis)</label>
		   <input name="rm" type="number" class="validate" required>
		   
		    
		
           
		    <select name="waktu">
                  <option value = "">Hari & Jam Praktik</option>
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
			<input name="dt_tgl" type="date"  required placeholder="Tanggal Periksa">
			  <label>Tanggal Periksa</label>
        <br>             
     <button name="simpan" class="waves-effect waves-light btn"><i class="material-icons left">save</i>Simpan</button>
	  <a href="<?php echo"CARI_DOKTER.php?IDDKT=$vdktt[PelakuKode]#$vdktt[SpesKode]"; ?>"class="waves-effect waves-light blue btn"><i class="material-icons">arrow_back</i></a>
</form>  
		
 </div>
</div>    
</body>
</html>
