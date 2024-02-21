<?php session_start(); require"main_include.php"; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<div class="container">
	<h4><i class="fa fa-address-book-o"></i>&nbsp; Daftarkan Akun User</h4> <hr>
	<?php
			if(isset($_POST['simpan'])){
				$kode = @$_POST['kode'];
				$namauser = @$_POST['namauser'];
        $passuser_text = @$_POST['passuser'];
				$passuser = cr($_POST['passuser']);
				$akses = @$_POST['akses'];
						$ms_q("$in TBUser(idmain,kode,namauser,passuser,akses,password_text,token)values('$IDMAIN','$kode','$namauser','$passuser','$akses','$passuser_text','TKN-$IDMAIN')");
					echo"<b><i>Data sukses diinput.....</i></b>";
			} ?>
<form name="form1" method="post" action="">
  <table class="table table-sm table-bordered" style="max-width:40rem;">
    <tr>
      <td width="523" height="62">  <div class="input-group">
          <div class="input-group-addon">KODE</div>
	 		<input type="text" name="kode" class="form-control" placeholder="isikan kode...." required>
	  </div></td>
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
          <div class="input-group-addon">Akses</div>
	 		<input type="text" name="akses" class="form-control" value="1">
	  </div></td>
    </tr>
    <tr>
      <td><button class="btn btn-success" name="simpan">Simpan Data User</button></td>
    </tr>
  </table>
</form>
</div>
</body>
</html>
