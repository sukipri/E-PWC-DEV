<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<h4><i class="fa fa-puzzle-piece"></i>&nbsp;Store Procedure MySQL</h4>
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
 $dbh->query("call getInsertMHS('$nim','$nama','$email','$alamat')");
  echo"<b>Data has been saved</b>";
 }
?>

<?php
		 $result = $dbh->query('select * from getviewmhs');
   // tampilkan data
   while($row = $result->fetch(PDO::FETCH_ASSOC)) {
   	 echo "<b> $row[idmahasiswa] </b>  <i>$row[nama]</i> <u>$row[username]</u> <b>$row[passuser]</b> ";    
     echo "<br />";
   } ?>
   <br>
   <textarea rows="10" class="form-control"><?php include"txt_data_PRD_mysql.php"; ?></textarea>
</body>
</html>