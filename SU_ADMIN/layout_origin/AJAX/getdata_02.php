 <?php
     $server = "localhost";
  $username ="root";
  $password ="holihks45";
  $database ="lat";

  $kon = mysql_connect ($server,$username,$password);
  mysql_select_db ($database,$kon);
	
    $id2  = @$_POST['kab'];
  
    $sql2 = mysql_query("SELECT * FROM kabupaten WHERE id_desa='$id2'");
	  echo "<option>--Pilih kabupaten--</option>";
      while($d2=mysql_fetch_array($sql2)){
         echo "<option value=$d2[id_kabupaten]>$d2[nama_kabupaten]</option> \n";
      }
	  ?>