<?php
	$host = "localhost";
	$db ="bjerp";
	$user="root";
	$pass="holihks45";
			$con = mysql_connect($host,$user,$pass) or die("FAILED...");
			mysql_select_db($db,$con) or die("ERROR TO OPEN DATABASE")	;
		
?>
