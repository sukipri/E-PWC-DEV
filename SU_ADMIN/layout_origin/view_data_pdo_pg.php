<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h4><i class="fa fa-puzzle-piece"></i>&nbsp;PDO PAGE VIEW PGSQL (1 Tables RDB)</h4>
<form id="form1" name="form1" method="post" action="">
  <table width="50%" border="0">
    <tr>
      <td width="54%"><input type="text" class="form-control" name="nim" placeholder="Entry Code Name..." required/></td>
      <td width="46%"><input type="text" class="form-control" name="nama" placeholder="Entry UserName" required/></td>
    </tr>
    <tr>
      <td><input type="password" class="form-control" name="pass" placeholder="Entry Password..." required/></td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <button name="simpan" class="btn btn-success">Save data</button>
</form>
	<?php
		if(isset($_POST['simpan'])){
			$nim = @$sql_escape($_POST['nim']);
			$nama = @$sql_escape($_POST['nama']);
			$pass = @$sql_escape($_POST['pass']);
				$pg_sql = $pg_q("$call_sel user_mhs");
			$hit_pg_sql = $pg_nr($pg_sql);
				$hit_pg = $hit_pg_sql + 1;
				$ack = rand('9999','77777');
				$md_ack = md($ack);
	$squeri = "insert into user_mhs(iduser_mhs,idmahasiswa,username,passuser)values('{$hit_pg}','$nim.$ack','$nama-$ack','$md_ack')";
		$hasil = $dbh_pg->query($squeri);	} ?>
<?php
		$result = $dbh_pg->query('SELECT * FROM user_mhs order by idmahasiswa asc limit 20');
   // tampilkan data
   while($row = $result->fetch(PDO::FETCH_ASSOC)) {
   	echo "<b> $row[idmahasiswa] </b>  <i>$row[username]</i> <u>$row[passuser]</u> ";    
     echo "<br />";
   }
		?>
		<br>
		<textarea name="textarea" rows="10" class="form-control">
<?php include"txt_data_pdo_pg.php"; ?>
</textarea>
</body>
</html>
