<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

	<?php 
		
			include"config02.php";
			include"css.php";
			$IDDKT = @$_GET['IDDKT'];
			$vdkt =  $ms_q("$call_sel TPelaku where PelakuKode='$IDDKT'");
			$vdktt = $ms_fas($vdkt);
			$vpl = $ms_q("$call_sel TUnit where UnitKode='$vdktt[UnitKode]'");
			$vpll = $ms_fas($vpl);
	?>
<body>
	<?php include"MENU.php"; ?>
		 <nav>
    <div class="nav-wrapper blue accent-2">
	   <ul>
      <li><a href="#!!">Cek Nomor Antrian</a></li>
      </ul>
	  </div>
  </nav>
  <div class="pdt txt">
  <a href="CARI_NO_ANTRIAN_DOKTER.php" class="waves-effect waves-light btn grey"><i class="material-icons">chevron_left</i></a>
		<div class="container">
<form name="form1" method="post" action="">
  <table width="100%" border="0" class="table striped">
    <tr>
      <td>
	  <select name="dokter">
                  <option value = "">Pilih Dokter</option>
                  	      <?php
		  $vdkt =  $ms_q("$sl PelakuKode,PelakuNama,PelakuStatus,UnitKode from TPelaku where PelakuStatus='A' AND PelakuKode='$IDDKT' order by PelakuNama asc");
				while($vdktt = $ms_fas($vdkt)){
					$vpl = $ms_q("$sl UnitKode,UnitNama from TUnit where UnitKode='$vdktt[UnitKode]'");
				$vpll = $ms_fas($vpl);
					echo"<option value=$vdktt[PelakuKode] selected>$vdktt[PelakuNama] //$vpll[UnitNama]</option>";
				}?>
               </select>
	  </td>
      </tr>
    <tr>
      <td>
	
 
	  <select name="waktu">
                  <option value = "">Hari & Jam Praktik</option>
				  
                  	<?php
					$vjdl = $ms_q("$call_sel  JadwalDokter where DokterKode='$IDDKT'");
					while($vjdll = $ms_fas($vjdl)){
							if($vjdll['shift']=="P"){
								echo"<option value=$vjdll[shift]>$vjdll[KetHari] $vjdll[KetJam]</option>";
								}elseif($vjdll['shift']=="S"){
								echo"<option value=$vjdll[shift]>$vjdll[KetHari] $vjdll[KetJam]</option>";
							}elseif($vjdll['shift']=="M"){
								echo"<option value=$vjdll[shift]>$vjdll[KetHari] $vjdll[KetJam]</option>";
								}}
			?>
               </select>
	  </td>
    </tr>
    <tr>
      <td>
	   
			   <input name="dt_tgl" type="text" class="datepicker"  required placeholder="Tanggal Periksa">
			  <label>Tanggal Periksa</label>
	  	  </td>
      </tr>
    <tr>
      <td>  <button name="simpan" class="waves-effect waves-light btn"><i class="material-icons left">save</i>Simpan</button></td>
    </tr>
  </table>
</form>
	<?php
		if(isset($_POST['simpan'])){
			$dokter = @$_POST['dokter'];
			$dt_tgl = @$_POST['dt_tgl'];
			$waktu = @$_POST['waktu'];
			
		$vdc = $ms_q("SELECT TOP 1 JalanNoUrut 
FROM TRawatJalan
where DokterKode = '$dokter' AND JalanRMTanggal between '$dt_tgl' and '$dt_tgl 23:59'
      and WaktuPesan = '$waktu'
 order by JalanNoUrut desc");
					$vdcc = $ms_fas($vdc);
					$hit_vdc = $vdcc['JalanNoUrut'];
					$hit_zero = sprintf("%02d", $hit_vdc);
						echo"<center><h5><b>Pasien yang  Mendaftar  <br>$dt_tgl <br><font color=green>$hit_zero</b></font></h5></center>";
						}
	?>
</div></div>
</body>
</html>
