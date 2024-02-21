<?php
try {
  // buat koneksi dengan database
  $dbh = new PDO('mysql:host=localhost;dbname=hdesk', "root", "");
  
  // set error mode
  $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  
 		/*letak mengisi data query database......
		
		 // jalankan query
   		$result = $dbh->query('SELECT * FROM mahasiswa_ilkom');
  
   // tampilkan data
   while($row = $result->fetch()) {
     echo "$row[0] $row[1] $row[2] $row[3] $row[4]";    
     echo "<br />";
   }
   
   */
		
		
  // hapus koneksi
  $dbh = null;
}
catch (PDOException $e) {
  // tampilkan pesan kesalahan jika koneksi gagal
  print "Something wrong....: " . $e->getMessage() . "<br/>";
  die();
}
?>