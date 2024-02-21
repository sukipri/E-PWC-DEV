 <?php
     $server = "localhost";
  $username ="root";
  $password ="holihks45";
  $database ="lat";

  $kon = mysql_connect ($server,$username,$password);
  mysql_select_db ($database,$kon);
	
    $id  = $_POST['kecamatan'];
  
    $sql = mysql_query("SELECT * FROM desa WHERE id_kecamatan='$id'");
	  echo "<option>--Pilih desa--</option>";
      while($d=mysql_fetch_array($sql)){
         echo "<option value=$d[id_desa]>$d[nama_desa]</option> \n";
      }
	  ?>