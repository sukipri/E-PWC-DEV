<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<h4><i class="fa fa-puzzle-piece"></i>&nbsp;Store Procedure SQL Server</h4>
<form id="form1" name="form1" method="post" action="">
  <table width="50%" border="0">
    <tr>
      <td width="54%">
      <input type="text" readonly="" class="form-control" name="ID" placeholder="Entry ID..." required value="<?php echo"$ack_small"; ?>"/></td>
      <td width="46%"><input type="text" class="form-control" name="kode" placeholder="Entry Code" value="<?php echo"CKH$ack_big"; ?>" required/></td>
    </tr>
    <tr>
      <td><input type="text" class="form-control" name="nama" placeholder="Entry Full Name..." required/></td>
      <td><input type="email" class="form-control" name="email" placeholder="Email...." required/></td>
    </tr>
    <tr>
      <td><textarea class="form-control" name="alamat"></textarea></td>
      <td align="center">   <button class="btn btn-success" name="simpan"><i class="fa fa-save"></i>&nbsp;Klik for save data</button></td>
    </tr>
  </table>
 
</form>
<?php
	if(isset($_POST['simpan'])){
		//$id = @$_POST['ID'];
		$kode = @$_POST['kode'];
		$nama = @$_POST['nama'];
		$email = @$_POST['email'];
		$alamat = @$_POST['alamat'];
 $dbh_srv->exec("insertanggota '$kode','$nama','$email','$alamat'");
 echo"<b>Data has been saved";
 }
?>
<?php
		 $result = $dbh_srv->query('select * from getViewanggota');
   // tampilkan data
   while($row = $result->fetch(PDO::FETCH_ASSOC)) {
   	 echo "<b> $row[kode] </b>  <i>$row[nama]</i> <u>$row[email]</u> <b>$row[passuser]</b> ";    
     echo "<br />";
   } ?><br>
    <textarea rows="10" class="form-control"><?php include"txt_data_PRD_srv.php"; ?></textarea>
</body>
</html>