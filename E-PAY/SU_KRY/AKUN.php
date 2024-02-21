	<?php
			ob_start();
		
		include"css.php";
		include"../CONFIG_INTERNAL.php";
	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<div class="container">
	<h5><a href="F_LOGIN.php"><i class="fas fa-angle-double-left"></i></a><i class="fa fa-address-book-o"></i>&nbsp; Daftarkan Akun User</h5> <hr>
	<?php
			if(isset($_POST['simpan'])){
				$kode = @trim($_POST['kode']);
				$namauser = @$_POST['namauser'];
				$passuser = cr($_POST['passuser']);
				$akses = @$_POST['akses'];
				$vkry = $ms_q("$sl KaryNomor FROM TKaryawan WHERE KaryNomor='$kode'");
						$jum_vkry = $ms_nr($vkry);
				if($jum_vkry < 1){
				?>
				   <div class="collection red accent-3">
                 			<a href="#!" class="collection-item active">Maaf NIK tidak terdaftar</a>
                       </div>
				<?php
				}else{
						$ms_q("$in TBUser(idmain,kode,namauser,passuser,akses)values('$IDMAIN','$kode','$namauser','$passuser','$akses')");
						header("location:SUCCESS.php");
					?>
                    	
                    <!--
                    <div class="collection">
                 			<a href="#!" class="collection-item active">Berhasil tersimpan</a>
                       </div>
                       -->
			<?php }} ?>
<form name="form1" method="post" action="">
  <table width="529" border="0">
    <tr>
      <td width="523" height="62">  <div class="input-group">
          <div class="input-group-addon">NIK</div>
	 		<input type="text" name="kode" class="form-control" placeholder="isikan kode...." required>
	  </div>
      </td>
    </tr>
    <tr>
      <td height="66"><div class="input-group">
          <div class="input-group-addon">Namauser</div>
	 		<input type="text" name="namauser" class="form-control" placeholder="isikan user...." required>
	  </div></td>
    </tr>
    <tr>
      <td height="65"><div class="input-group">
          <div class="input-group-addon">Passuser</div>
	 		<input type="password" name="passuser" class="form-control" placeholder="isikan password...." required>
	  </div></td>
    </tr>
    <tr>
      <td height="86"><div class="input-group">
          <div class="input-group-addon">Akses Karyawan</div>
	 		<input type="hidden" name="akses" class="form-control" value="4" readonly>
	  </div></td>
    </tr>
    <tr>
      <td>
      <button class="btn green" name="simpan">Simpan Data User</button>
      &nbsp;&nbsp;
      <a href="AKUN_CEK_NIK.php" class="btn btn-warning">Cek NIK</a>
      </td>
    </tr>
  </table>
</form>
</div>
<?php include_once"FOOTER.php"; ?>
</body>
</html>
