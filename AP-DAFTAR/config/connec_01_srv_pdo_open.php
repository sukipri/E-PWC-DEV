<?php
		$dbh = new PDO('mssql:host=HKS-MEIKA-PC;dbname=BJPOS', "sa", "holihks45");
  		$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
?>