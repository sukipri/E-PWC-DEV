<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
 include"SU_admin/sc/stack_Q.php";
 include"SU_admin/config/connec_01_srv.php";
		//$ID = @$_GET['ID'];
		$rs = $ms_q("$call_sel VKamarRekapKelas order by KelasKodeDKK asc");
			$outp = "";
while($rss = $ms_fas($rs)) {
	$tot_terpakai = $rss['JmlIsiLk'] + $rss['JmlIsiPr'];
	$tot_kosong =  $rss['DayaTampung']-$tot_terpakai;
			
    if ($outp != "") {$outp .= ",";}
		$tgl = date("d/m/Y");
    $outp .= '{"kode_nama":"'  . $rss["KelasNama"] . '",';
	 $outp .= '"Tipe_pasien":"'   . '0000'. '",';
    $outp .= '"Total_TT":"'   . $rss["DayaTampung"]. '",';
	$outp .= '"Terpakai":"'   . $tot_terpakai. '",';
	$outp .= '"Kosong":"'   . $tot_kosong. '",';
	$outp .= '"Terpakai_male":"'   . $rss["JmlIsiLk"]. '",';
    $outp .= '"Terpakai_female":"'. $rss["JmlIsiPr"]     . '",';
	$outp .= '"Kosong_male":"'   . $rss["BolehLk"]. '",';
	$outp .= '"Kosong_female":"'   . $rss["BolehPr"]. '",';
	$outp .= '"Waiting":"'   . '0'. '",';
    $outp .= '"tgl_update":"'. $tgl     . '"}';
}
$outp ='{"daftar":['.$outp.']}';

echo($outp);
?>