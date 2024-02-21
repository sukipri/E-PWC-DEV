<?php

$server = '192.168.9.202';
$username = 'edppwc';
$password = '7@kkum';
$dbx = "Citarum";
	/*
	$server = '192.168.9.208';
	$username = 'sa';
	$password = 'phoseidonathena';
	$dbx = "Citarum";
*/
	$con = mssql_connect($server,$username,$password);
	mssql_select_db($dbx,$con);
	if ($con) 
			{
			//echo"SUKSES";
			}
				else
			{
    				echo 'Connection Failed!';
				}
					?>