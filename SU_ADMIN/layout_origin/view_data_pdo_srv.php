<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h4><i class="fa fa-puzzle-piece"></i>&nbsp;PDO PAGE VIEW SQL Server 2008 (1 Tables RDB)</h4>
<form id="form1" name="form1" method="post" action="">
  <table width="50%" border="0">
    <tr>
      <td width="54%">
      <input type="text" class="form-control" name="nim" placeholder="Entry ID..." required value="<?php echo"$ack_small"; ?>"/></td>
      <td width="46%"><input type="text" class="form-control" name="kode" placeholder="Entry Code" value="<?php echo"CKH$ack_big"; ?>" required/></td>
    </tr>
    <tr>
      <td><input type="text" class="form-control" name="namauser" placeholder="Entry namauser..." required/></td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <button name="simpan" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Klik for save data</button>
</form>
	<?php
		if(isset($_POST['simpan'])){
			$nim = @@$_POST['nim'];
			$kode = @$_POST['kode'];
			$namauser = @$_POST['namauser'];
			$pass = md($namauser);
				$squeri = "insert into data_user(iduser,kode,namauser,passuser)values('$nim','$kode','$namauser','$pass')";
			$hasil = $dbh_srv->query($squeri);		
		}
	
	?>
<?php
		
	   $result = $dbh_srv->query('SELECT * FROM data_user order by iduser desc');
  	echo"<h4>PDO PAGE VIEW SQLServer (1 Tables RDB)</h4>";
   // tampilkan data
   while($row = $result->fetch(PDO::FETCH_ASSOC)) {
   		
     echo "<b> $row[iduser] </b>  <i>$row[kode]</i> <u>$row[namauser]</u> ";    
     echo "<br />";
   }


?><br>
<textarea name="textarea" rows="10" class="form-control">
<?php include"txt_data_pdo_srv.php"; ?>
</textarea>
</body>
</html>
