<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
 include"SU_admin/sc/stack_Q.php";
 include"SU_admin/config/connec_01_srv.php";
		//$ID = @$_GET['ID'];
		$rs = $ms_q("$call_sel VKamarRekap order by Kamar asc");
			$outp = "";
while($rss = $ms_fas($rs)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"Nama Kamar":"'  . $rss["Kamar"] . '",';
    $outp .= '"Daya Tampung":"'   . $rss["DayaTampung"]        . '",';
	$outp .= '"Jumlah Terisi":"'   . $rss["JmlTerisi"]        . '",';
	$outp .= '"Jumlah Kosong":"'   . $rss["JmlKosong"]        . '",';
	$outp .= '"Boleh Laki-Laki":"'   . $rss["BolehLk"]        . '",';
    $outp .= '"Boleh Wanita":"'. $rss["BolehPr"]     . '"}';
}
$outp ='{"Daftar Kamar":['.$outp.']}';

echo($outp);
?>