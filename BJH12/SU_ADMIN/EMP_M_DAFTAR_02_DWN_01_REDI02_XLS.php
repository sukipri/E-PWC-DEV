<?php   include"../config/connec_01_srv.php";  ?>
<?php 
        $ACK01 = rand("999999","88888");
        $IDBG01 = @$_GET['IDBG01'];
 ?>
<?php // Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");

// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=DWN01-$ACK01.xls"); 
include"EMP_M_DAFTAR_02_DWN_01_XLS02.php";
?>