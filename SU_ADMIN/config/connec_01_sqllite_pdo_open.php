<?php
	
	class MyDB extends SQLite3 {
		function __construct() {
		   $this->open('//192.168.3.22/antrian/DATA.db');
		}
	 }
	 
	 $db = new MyDB();
	 if(!$db) {
		echo $db->lastErrorMsg();
	 } else {
		echo "Opened database successfully\n";
	 }
  
	 $sql =<<<EOF
		SELECT * from ANTRI WHERE TANGGAL=;
  EOF;
  
	 $ret = $db->query($sql);
	 while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
		echo "ID = ". $row['TANGGAL'] . "\n";
	 }
	 echo "Operation done successfully\n";
	 $db->close();

	 ?>