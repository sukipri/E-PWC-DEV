<?php

   // buat koneksi dengan database
   $dbh = new PDO('mysql:host=localhost;dbname=hdesk', "root", "");
  
   // set error mode
   $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  
   // jalankan query
   $result = $dbh->query('SELECT * FROM mahasiswa');
  
   // tampilkan data
   while($row = $result->fetch(PDO::FETCH_ASSOC)) {
   $rs_data = $dbh->query("select user_mhs.passuser from user_mhs where idmahasiswa='$row[idmahasiswa]'");
			$rs_dataa = $rs_data->fetch(PDO::FETCH_ASSOC);
     echo "$row[idmahasiswa] - $rs_dataa[passuser] ";    
     echo "<br />";
   }
 
   // hapus koneksi
  


?>