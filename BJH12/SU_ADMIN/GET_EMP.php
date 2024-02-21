<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
 include"../sc/stack_Q.php";
 include"../config/connec_01_srv.php";
		//$ID = @$_GET['ID'];
		$rs = $ms_q("$sl KaryNomor,KaryNama FROM TKaryawan order by KaryNama asc");
			$outp = "";
			$no = 1;
while($rss = $ms_fas($rs)) {
    if ($outp != "") {$outp .= ",";}

    $outp .= '{"Nama":"'   . $rss["KaryNama"] . '",';
	$outp .= '"No":"'   . $no . '",';
	$outp .= '"Nomor":"'. $rss["KaryNomor"]     . '"}';
	$no++; }
$outp ='{"karyawan":['.$outp.']}';

echo($outp);
?>