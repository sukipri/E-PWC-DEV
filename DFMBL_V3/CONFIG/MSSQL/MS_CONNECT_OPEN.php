<?php

$server_open = '192.168.9.202';
$username_open = 'edppwc';
$password_open = '7@kkum';
	/*
	$server = '192.168.9.208';
	$username = 'sa';
	$password = 'phoseidonathena';
	$dbx = "Citarum";
*/
	
	$con_open = mssql_connect($server_open,$username_open,$password_open);
	
	/*
	$open_tj_vrecinfo01_sw = mssql_query("select * from TJ_Main_Data.dbo.TA_Record_Info WHERE ID='512187'");
	$open_tj_vrecinfo01_sww = mssql_fetch_assoc($open_tj_vrecinfo01_sw);
	echo"$open_tj_vrecinfo01_sww[ID]";
	
			$op_tj_vjdw01_sw = mssql_query("select TOP 10 * from TJ_Main_Data.dbo.tJadwal ");
				while($op_tj_vjdw01_sww = mssql_fetch_assoc($op_tj_vjdw01_sw)){
					echo $op_tj_vjdw01_sww['Bulan']."<br>";
				}
				$op_ctr_vkry01_sw = mssql_query("select TOP 10 * from Citarum.dbo.TKaryawan ");
				while($op_ctr_vkry01_sww = mssql_fetch_assoc($op_ctr_vkry01_sw)){
					echo $op_ctr_vkry01_sww['KaryNama']."<br>";
				}
			*/
		if($con_open){
			//echo"sukses";
		}else { echo"FAILED";}

			?>