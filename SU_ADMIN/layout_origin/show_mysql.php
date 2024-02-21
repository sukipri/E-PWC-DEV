<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="50%" border="0">
    <tr>
      <td width="54%"><input type="text" class="form-control" name="nim" placeholder="Entry NIM..." required/></td>
      <td width="46%"><input type="text" class="form-control" name="nama" placeholder="Entry Name" required/></td>
    </tr>
    <tr>
      <td><input type="text" class="form-control" name="email" placeholder="Entry Email..." required/></td>
      <td><input type="text" class="form-control" name="kota" placeholder="Entry City..." required/></td>
    </tr>
  </table>
  <button name="simpan" class="btn btn-success">Save data</button>
</form>
	<?php
		if(isset($_POST['simpan'])){
			$nim = @$sql_escape($_POST['nim']);
			$nama = @$sql_escape($_POST['nama']);
			$email = @$sql_escape($_POST['email']);
			$alamat = @$sql_escape($_POST['kota']);
				$squeri = "insert into mahasiswa(idmahasiswa,nama,email,alamat)values('$nim','$nama','$email','$alamat')";
			$hasil = $call_q($squeri);	} ?>
<?php
		$result = $call_q('SELECT * FROM mahasiswa order by idmahasiswa asc limit 20');
  		echo"<h4>PAGE VIEW MySql (2 Tables RDB)</h4>";
   // tampilkan data
   while($row = $call_fas($result)) {
   		$rs_data = $call_q("select user_mhs.passuser from user_mhs where idmahasiswa='$row[idmahasiswa]'");
			$rs_dataa = $call_fas($rs_data);
     echo "<b> $row[nama] </b>  <i>$row[alamat]</i> <u>$row[email]</u> ";    
     echo "<br />";
   }
		?>
</body>
</html>
