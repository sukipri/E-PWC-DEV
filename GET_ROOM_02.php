<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
 include"SU_admin/sc/stack_Q.php";
 include"SU_admin/config/connec_01_srv.php";
		//$ID = @$_GET['ID'];
		$rs = $ms_q("$call_sel VKamarRekapKelasDKK order by KelasKodeDKK asc");
			$outp = "";
while($rss = $ms_fas($rs)) {
		$terpakai_tot = $rss['JmlIsiLk'] + $rss['JmlIsiPr'];
		$kosong_tot = $rss['DayaTampung'] - $terpakai_tot;
			
    if ($outp != "") {$outp .= ",";}
		$tgl = date("d/m/Y");
    $outp .= '{"kode_ruang":"'  . $rss["KelasKodeDKK"] . '",';
	 $outp .= '"tipe_pasien":"'   . '0000'. '",';
    $outp .= '"total_TT":"'   . $rss["DayaTampung"]. '",';
	$outp .= '"terpakai_total":"'   . $terpakai_tot. '",';
	$outp .= '"kosong_total":"'   . $kosong_tot. '",';
	$outp .= '"terpakai_male":"'   . $rss["JmlIsiLk"]. '",';
    $outp .= '"terpakai_female":"'. $rss["JmlIsiPr"]     . '",';
	$outp .= '"kosong_male":"'   . $rss["BolehLk"]. '",';
	$outp .= '"kosong_female":"'   . $rss["BolehPr"]. '",';
	$outp .= '"waiting":"'   . '0'. '",';
    $outp .= '"tgl_update":"'. $tgl     . '"}';
}
$outp ='{"Daftar Kamar":['.$outp.']}';

echo($outp);
?>