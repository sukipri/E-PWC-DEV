<?php
		$dbh_pg = new PDO('pgsql:host=localhost;port=5432;dbname=hdesk;user=postgres;password=zeus');
  			$dbh_pg->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

?>