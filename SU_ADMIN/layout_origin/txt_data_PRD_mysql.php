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

if(isset($_POST['simpan'])){
			$nim = @$sql_escape($_POST['nim']);
			$nama = @$sql_escape($_POST['nama']);
			$email = @$sql_escape($_POST['email']);
			$alamat = @$sql_escape($_POST['kota']);
 $dbh->query("call getInsertMHS('$nim','$nama','$email','$alamat')");
  echo"<b>Data has been saved</b>";
 }

		 $result = $dbh->query('select * from getviewmhs');
   // tampilkan data
   while($row = $result->fetch(PDO::FETCH_ASSOC)) {
   	 echo "<b> $row[idmahasiswa] </b>  <i>$row[nama]</i> <u>$row[username]</u> <b>$row[passuser]</b> ";    
     echo "<br />";
   } 