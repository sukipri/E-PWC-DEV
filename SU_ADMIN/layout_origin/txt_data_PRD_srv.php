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
      <td>TextArea</td>
      <td align="center">   <button class="btn btn-success" name="simpan"><i class="fa fa-save"></i>&nbsp;Klik for save data</button></td>
    </tr>
  </table>
 
</form>
if(isset($_POST['simpan'])){
		//$id = @$_POST['ID'];
		$kode = @$_POST['kode'];
		$nama = @$_POST['nama'];
		$email = @$_POST['email'];
		$alamat = @$_POST['alamat'];
 $dbh_srv->exec("insertanggota '$kode','$nama','$email','$alamat'");
 echo"<b>Data has been saved";
 }
		$result = $dbh_srv->query('select * from getViewanggota');
   // tampilkan data
   while($row = $result->fetch(PDO::FETCH_ASSOC)){
   	 echo "<b> $row[kode] </b>  <i>$row[nama]</i> <u>$row[email]</u> <b>$row[passuser]</b> ";    
     echo "<br />";
   } 