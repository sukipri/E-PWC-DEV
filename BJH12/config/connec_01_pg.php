<?php
$conn_string = "host=localhost port=5432 dbname=hdesk user=postgres password=zeus";

$connection = pg_connect($conn_string);

if (!$connection) {
print("Connection Failed");
exit;
}
else //print("Connection Success");
	
?>