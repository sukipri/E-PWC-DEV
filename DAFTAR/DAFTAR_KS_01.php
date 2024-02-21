<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
	<?php
	include"config.php"; 
	include"css.php"; 
	?>

	<body>
	<?php include"MENU.php"; ?>
	<br><br><br>
	<div class="container">
	<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="#">FORM KRITIK & SARAN </a></li>
</ol>
<form method="post">
<div style="max-width:45rem;">
<!--  -->
#NAMA PELAPOR
<input type="text" class="form-control form-control-sm" name="ks_nama_01" required>
#KOLOM KRITIK & SARAN
<textarea class="form-control" required name="ks_isi_01" rows="14"></textarea>
#EMAIL <span class="badge bg-danger">(*gunakan email valid untuk menerima balasan dari kami)</span>
<input type="email" class="form-control form-control-sm" name="ks_email_01" required>
#Nomor Selular <span class="badge bg-danger">(*gunakan nomor seluler Aktif)</span>
<input type="text" class="form-control form-control-sm" name="ks_telp_01" required>
<button class="btn btn-success btn-sm" name="btn_simpan_ks_01">KIRIM Kritik & Saran</button> 
<!--  -->
</div>
</form>
<!--  -->
<?PHP 
    if(isset($_POST['btn_simpan_ks_01'])){
        $ks_email_01 = @$sql_slash($_POST['ks_email_01']);
        $ks_nama_01 = @$sql_slash($_POST['ks_nama_01']);
        $ks_telp_01 = @$sql_slash($_POST['ks_telp_01']);
        $ks_isi_01 = @$sql_slash($_POST['ks_isi_01']);
        #PROCCESSING
        $pwc_save_ks_01 = $ms_q("$in tb_ks_01(idmain_ks_01,ks_kode_01,ks_isi_01,ks_email_01,ks_tglinput_01,ks_status_01,ks_tipe_01,ks_nama_01,ks_telp_01)VALUES('$IDMAIN','KS-$IDKODE','$ks_isi_01','$ks_email_01','$DATE_HTML5_SQL $time_html5','1','1','$ks_nama_01','$ks_telp_01')");
        if($pwc_save_ks_01){
            echo"<span class='badge bg-success'>KRITIK & SARAN BERHASIL TERKIRIM... basalan akan dikirim di email anda</span>";
        }else{
            echo"<span class='badge bg-danger'>KRITIK & SARAN BERHASIL Gagal...</span>";
        }
    }
?>
  <!--  -->
	</div>
	</body>
</html>
