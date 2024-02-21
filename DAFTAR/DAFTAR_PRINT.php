<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<?php
		error_reporting(0);
		include"config.php"; 
		include"css.php"; 
	?>
	<body onload="window.print();">
	<style>
		.txt{font-size:12px; padding:0.5em;}
	</style>
			<?php include"../SU_admin/layout/KOP.php"; ?>
	<?php 
			$IDDKT = @$_GET['IDDKT'];
			$RM = @$_GET['RM'];
			$REG = @$_GET['REG'];
			?>
<body>
		<br>
		<div class="container">
		<ol class="breadcrumb">
  		<li class="breadcrumb-item"><i class="fa fa-print"></i>&nbsp;Cetak bukti pendaftaran</li>
		</ol>
		
		
	<?php 
				
			$vdkt =  $ms_q("$call_sel TPelaku where PelakuKode='$IDDKT'");
			$vdktt = $ms_fas($vdkt);
			$vpl = $ms_q("$call_sel TUnit where UnitKode='$vdktt[UnitKode]'");
			$vpll = $ms_fas($vpl);
			$vrj_01 =  $ms_q("$call_sel TRawatJalan  where JalanNoReg='$REG'");
			$vrjj_01 = $ms_fas($vrj_01);
			$vps =  $ms_q("$call_sel TPasien  where PasienNomorRM='$RM'");
			$vpss = $ms_fas($vps);
			$vjdl =  $ms_q("$sl KetHari,KetJam,shift,AtKd from JadwalDokter  where AtKd='$vrjj_01[AtKd]'");
			$vjdll = $ms_fas($vjdl);
			$vrj = @$ms_q("select TNomor.NomorKode,TNomor.NomorAkhir from TNomor where TNomor.NomorKode='PL-$years$month-'");
				$vrjj = $ms_fas($vrj);
				$vrj_con= $ms_q("select CONVERT(varchar(10),[JalanRMTanggal],101) as tgl_rj from TRawatJalan where JalanNoReg='$REG'");
				$vrjj_con = $ms_fas($vrj_con);
			$kalimat = "$vpll[UnitNama]";
			$sub_kalimat = substr($kalimat,6);
					$hit_vrj = $vrjj['NomorAkhir'] + 1;
					$hit_zero = sprintf("%04d", $hit_vrj);
					$sub_01= substr($vpss['PasienTglLahir'],-4);
					$hit_sub = $years_big - $sub_01;
					$dt = "$date_html5 $time_html5";
					//--//
					$hit_vdc_02 = $ms_q("SELECT  PasienNama,PasienNomorRM,JalanNoUrut,UserID1,JalanNoUrut FROM TRawatJalan where DokterKode = '$vrjj_01[DokterKode]' AND JalanRMTanggal between '$vrjj_con[tgl_rj]' and '$vrjj_con[tgl_rj] 23:59' AND NOT JalanStatus='9' and WaktuPesan = '$vrjj_01[WaktuPesan]' AND JalanNoUrut > 0 order by TanggalPesan desc");
								$hit_vdcc_02 = $ms_nr($hit_vdc_02);
								$vjdl02 =  $ms_q("$sl DokterKode,KetHari,KetJam,AtKd,Kuota from JadwalDokter  where AtKd='$vrjj_01[AtKd]'");
									$vjdll02 = $ms_fas($vjdl02);
									
								$hit01 = substr($vjdll02['KetJam'],0,-6);
								$hit_jam = $vrjj_01['JalanNoUrut'] * 4 ;
								$hit_jam_02 = $hit_jam / 60;
								$hit_jam_03 = $hit01 + $hit_jam_02;
								$nom_jam_03 = @number_format($hit_jam_03,2);
								//$zero_jam_03= sprintf("%04f", $hit_jam_03);
								//echo"$hit_vdcc_02<br>$vpss[DokterKode]<br>$vpss[WaktuPesan]";
								//echo"<br>$vrjj_con_02[tgl_rjj]";
									$sub_jam_03_01 = substr($nom_jam_03,0,2);
									$sub_jam_03_02 = substr($nom_jam_03,-2,4);
									//echo"$sub_jam_03_01 - ";
									//echo" $vpss[JalanNoUrut]";
									$text_jam = "Tindakan Pemeriksaan <b>+/- $sub_jam_03_01.00 Lebih $sub_jam_03_02 Menit</b>";
			//str_replace
			$teksawal = "$vpll[UnitNama]";
 			$txt_01 = str_replace("Klinik Sp.", "", $teksawal);
					/*
				if(isset($_GET['LENGKAP'])){
					$ms_q("update TRawatJalan set AppJenisDaftar='3' where JalanNoReg='$REG'");
						header("location:DAFTAR_STEP_04.php?IDDKT=$IDDKT&RM=$RM&REG=$REG&OKEEE=OKEEE#LENGKAP");
			} */
				?>

				
				
				
				

	  <table width="100%" border="0" class="table table-bordered">
    <tr class="info">
          <td colspan="2">
			<?php echo"<span class=txt><label>Dokter</label>&nbsp; $vdktt[PelakuNama]</span>"; ?>
  <br>
	<?php echo"<span class=txt><label>Poli</label>&nbsp;$txt_01"; ?>
		   </td>
        </tr>
        <tr>
          <td colspan="2">
		  <table width="100%" border="0" class="table">
		   <tr>
              <td><?php echo"<span class=txt><label>Nomor RM</label>&nbsp;$vrjj_01[PasienNomorRM]"; ?></td>
              <td> <?php echo"<span class=txt><label>Nama</label>&nbsp;$vpss[PasienNama]"; ?></td>
            </tr>
            <tr>
              <td><?php echo"<span class=txt><label>Nomor JKn</label>&nbsp;$vpss[PasienNoKartuJamin]"; ?></td>
              <td><?php echo"<span class=txt><label>Alamat</label>&nbsp;$vpss[PasienAlamat]"; ?></td>
            </tr>
            <tr>
              <td><?php echo"<span class=txt><label>Nomor Reg</label>&nbsp;$REG"; ?> </td>
              <td><?php echo"<span class=txt><label>Telp/Hp</label>&nbsp;$vpss[PasienHP]"; ?></td>
            </tr>
          </table> 
		 </td>
        </tr>
       
          <tr>
            <td width="69%" height="37"><?php 
		  	if($vrjj_01['AppJenisDaftar']==3){ 
				echo"<b>Nomor Urut: &nbsp; <i>Menunggu Persetujuan Administrasi...</i></b>";
				}elseif($vrjj_01['AppJenisDaftar']==4){
					echo"<font color=red><b><i>Maaf, Pendaftaran anda ditolak dikarenakan data anda tidak valid</i><b></font>";
				}elseif($vrjj_01['AppJenisDaftar']==2){
					if($vrjj_01['WaktuPesan']=="P"){
				echo"<b>Nomor Urut: &nbsp; <i>$vrjj_01[JalanNoUrut]</i>, Silahkan datang Pada Tanggal $vrjj_con[tgl_rj] di Poli $txt_01 <br>$vjdll[KetHari] (Pagi $vjdll[KetJam])</b><br>$text_jam";
				echo"<br><i>*$vrjj_01[ket]</i>";
				}elseif($vrjj_01['WaktuPesan']=="S"){
				echo"<b>Nomor Urut: &nbsp; <i>$vrjj_01[JalanNoUrut]</i>, Silahkan datang Pada Tanggal $vrjj_con[tgl_rj] di Poli $txt_01<br>$vjdll[KetHari] (Siang $vjdll[KetJam])</b><br>$text_jam";
				echo"<br><i>*$vrjj_01[ket]</i>";
				}elseif($vrjj_01['WaktuPesan']=="M"){
				echo"<b>Nomor Urut: &nbsp; <i>$vrjj_01[JalanNoUrut]</i>, <br> Silahkan datang Pada Tanggal $vrjj_01[JalanRMTanggal] di Poli  $txt_01 <br> $vjdll[KetHari] (Malam $vjdll[KetJam])</b><br>$text_jam";
				echo"<br><i>*$vrjj_01[ket]</i>";
				}}
			?></td>
            <td width="31%" height="37" align="center"><?php echo"<h4>Nomor Urut &nbsp;<label>$vrjj_01[JalanNoUrut]</label></h4>"; ?></td>
          </tr>
          <td height="37" colspan="2"><p>Hasil Cetak / Print Out harap dibawa ketika melakukan pemeriksaan
              </td>
          </tr>
      </table>
	
	
	<hr>
		<?php echo"Cetak pada tanggal <i>$date_html5</i>"; ?>
		</div>
</body>
</html>
