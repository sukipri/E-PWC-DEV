<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	include"config.php";
		//$ID = @$_GET['ID'];
		//KBS', 'KBY', 'ODC', 'RTS'
		$rs = $ms_q("$call_sel VKamarRekap where  NOT RuangKode='RTS' AND NOT RuangKode='KBY' AND NOT RuangKode='ODC' AND NOT RuangKode='KBS'  order by Kamar asc");
			$outp = "";
while($rss = $ms_fas($rs)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"Kamar":"'  . $rss["Kamar"] . '",';
    $outp .= '"Tampung":"'   . $rss["DayaTampung"] . '",';
	$outp .= '"Terisi":"'   . $rss["JmlTerisi"] . '",';
	$outp .= '"Kosong":"'   . $rss["JmlKosong"] . '",';
	$outp .= '"Laki-Laki":"'   . $rss["BolehLk"] . '",';
    $outp .= '"Wanita":"'. $rss["BolehPr"]     . '"}';
}
$outp ='{"daftar":['.$outp.']}';

echo($outp);
?>