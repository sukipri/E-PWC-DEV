<?php
	if(isset($_GET['VALPASKAH'])){
		$ms_q = $ms_q("$up TGajiTHR set GajiOtorisasi='4' WHERE GajiTahun='$IDVAL01' AND GajiTHRJenis='P'");
		header("location:?HLM=FIN_M&SUB=FIN_M_FIN_GAJI_REKAP_THR_M&SUB_CHILD=FIN_M_FIN_GAJI_REKAP_THR_M_VAL");
	}
	//NATAL
	if(isset($_GET['VALNATAL'])){
		$ms_q = $ms_q("$up TGajiTHR set GajiOtorisasi='4' WHERE GajiTahun='$IDVAL01' AND GajiTHRJenis='N'");
		header("location:?HLM=FIN_M&SUB=FIN_M_FIN_GAJI_REKAP_THR_M&SUB_CHILD=FIN_M_FIN_GAJI_REKAP_THR_M_VAL");
	}
	//GAJI BULANAN
	if(isset($_GET['VALGAJI'])){
		$ms_q = $ms_q("$up TGaji set GajiOtorisasi='4' WHERE GajiBulan='$IDVAL01'");
		header("location:?HLM=FIN_M&SUB=FIN_M_FIN_GAJI_REKAP_THR_M&SUB_CHILD=FIN_M_FIN_GAJI_REKAP_THR_M_VAL");
	}
	//GAJI SHU
	if(isset($_GET['VALSHU'])){
		$ms_q = $ms_q("$up TGajiTHR set GajiOtorisasi='4' WHERE GajiTahun='$IDVAL01' AND GajiTHRJenis='B'");
		header("location:?HLM=FIN_M&SUB=FIN_M_FIN_GAJI_REKAP_THR_M&SUB_CHILD=FIN_M_FIN_GAJI_REKAP_THR_M_VAL");
	}
	
	///..UNREG............................................................................................................./
	
	if(isset($_GET['UNVALPASKAH'])){
		$ms_q = $ms_q("$up TGajiTHR set GajiOtorisasi='0' WHERE GajiTahun='$IDVAL01'");
		header("location:?HLM=FIN_M&SUB=FIN_M_FIN_GAJI_REKAP_THR_M&SUB_CHILD=FIN_M_FIN_GAJI_REKAP_THR_M_VAL");
	}
	//NATAL
	if(isset($_GET['UNVALNATAL'])){
		$ms_q = $ms_q("$up TGajiTHR set GajiOtorisasi='0' WHERE GajiTahun='$IDVAL01' AND KaryNomor='04181143'");
		header("location:?HLM=FIN_M&SUB=FIN_M_FIN_GAJI_REKAP_THR_M&SUB_CHILD=FIN_M_FIN_GAJI_REKAP_THR_M_VAL");
	}
	//GAJI BULANAN
	if(isset($_GET['UNVALGAJI'])){
		$ms_q = $ms_q("$up TGaji set GajiOtorisasi='0' WHERE GajiBulan='$IDVAL01'");
		header("location:?HLM=FIN_M&SUB=FIN_M_FIN_GAJI_REKAP_THR_M&SUB_CHILD=FIN_M_FIN_GAJI_REKAP_THR_M_VAL");
	}
	
	//GAJI SHU
	if(isset($_GET['UNVALSHU'])){
		$ms_q = $ms_q("$up TGajiTHR set GajiOtorisasi='0' WHERE GajiBulan='$IDVAL01' AND GajiTHRJenis='B'");
		header("location:?HLM=FIN_M&SUB=FIN_M_FIN_GAJI_REKAP_THR_M&SUB_CHILD=FIN_M_FIN_GAJI_REKAP_THR_M_VAL");
	}
?>