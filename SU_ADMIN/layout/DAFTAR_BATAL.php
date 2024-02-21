<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
		<?php 
			$IDDKT = @$_GET['IDDKT'];
			$RM = @$_GET['RM'];
			$NO = @$_GET['NO'];
			$REG = @$_GET['REG'];
			$OKE = @$_GET['OKE'];
			$WAKTU = @$_GET['WAKTU'];
			$NOURUT = @$_GET['NOURUT'];
			$BTL = @$_GET['BTL'];
			$EML = @$_GET['EML'];
				$vrj_01 =  $ms_q("$sl jalanNoReg,PasienNomorRM,PasienNama from TRawatJalan  where JalanNoReg='$REG'");
				$vrjj_01 = $ms_fas($vrj_01);
		?>
			<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="?HLM=LIST_DAFTAR_TODAY">Pembatalan Pendaftaran</a></li>
  <li class="breadcrumb-item"><?php echo"#$RM-$REG/$vrjj_01[PasienNama]"; ?></li>
</ol>
			<?php
				if(isset($_POST['simpan'])){
					$alasan = @trim($_POST['alasan']);
					$alasan2 = @trim($_POST['alasan2']);
						if(empty($alasan)){
						$ms_q("$in TRawatJalanBatal(JalanNoReg,JalanBatalKet,UserID,UserDate)values('$REG','$alasan2','ADMIN-ONLINE','$date_html5')");
						header("location:MAIL/mail-proses-tolak.php?IDDKT=$IDDKT&RM=$RM&REG=$REG&KMAIL=MAIL&EML=$EML&ALS=$alasan");
						}else{
							
						$ms_q("$in TRawatJalanBatal(JalanNoReg,JalanBatalKet,UserID,UserDate)values('$REG','$alasan','ADMIN-ONLINE','$date_html5')");
						header("location:MAIL/mail-proses-tolak.php?IDDKT=$IDDKT&RM=$RM&REG=$REG&KMAIL=MAIL&EML=$EML&ALS=$alasan2"); }}
				?>
		
            <form name="form1" method="post" action="">
			#Berikan Alasan Penolakan
			  <table width="200" class="table">
			    <tr>
			      <td><label>
			        <input type="radio" name="alasan" value="Berkas Pendaftaran Tidak Lengkap">
			       Berkas Pendaftaran Tidak Lengkap</label></td>
		        </tr>
			    <tr>
			      <td><label>
			        <input type="radio" name="alasan" value="Data tidak valid">
			       Data tidak valid </label></td>
		        </tr>
			    <tr>
			      <td><label>
			        <input type="radio" name="alasan" value="Data tidak terbaca">
			       Data tidak terbaca</label></td>
		        </tr>
			    <tr>
			      <td><label>
			        <input type="radio" name="alasan" value="  Jumlah pasien sudah penuh">
			       Jumlah pasien sudah penuh </label></td>
		        </tr>
			    <tr>
			      <td><label>
			        <input type="radio" name="alasan" value="Dokter tidak praktek pada hari yang dimaksud">
			      Dokter tidak praktek pada hari yang dimaksud</label></td>
		        </tr>
			    <tr>
			      <td><label>Lainya</label><textarea name="alasan2" class="form-control"></textarea></td>
		        </tr>
			    <tr>
			      <td><button name="simpan" class="btn btn-info"><i class="fa fa-sign-in"></i>&nbsp;Kirim Data</button></td>
		        </tr>
		      </table>
            </form>
</body>
</html>
