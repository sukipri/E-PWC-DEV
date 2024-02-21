<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	 include"SU_admin/sc/stack_Q.php";
 	include"SU_admin/config/connec_01_srv.php";
		//$ID = @$_GET['ID'];
		//KBS', 'KBY', 'ODC', 'RTS'
		$vdkt =  $ms_q("$call_sel TPelaku where PelakuStatus='A' order by PelakuNama asc");
			$outp = "";
				while($vdktt = $ms_fas($vdkt)){
					$vpl = $ms_q("$call_sel TUnit where UnitKode='$vdktt[UnitKode]'");
						$vpll = $ms_fas($vpl);
				$teksawal = "$vpll[UnitNama]";
 			$txt_01 = str_replace("Klinik Sp.", "", $teksawal);
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"nama_dokter":"'  . $vdktt["PelakuNama"] . '",';
			$vjdl = $ms_q("$call_sel JadwalDokter where DokterKode='$vdktt[PelakuKode]'");
					$vjdl_nr = $ms_nr($vjdl);
					while($vjdll = $ms_fas($vjdl)){  $outp .= '"jadwal":"'. $vjdll["KetHari"]. '",'; }
 	$outp .= '"poli":"'. $txt_01     . '"}';
}
$outp ='{"dokter":['.$outp.']}';

echo($outp);
?>