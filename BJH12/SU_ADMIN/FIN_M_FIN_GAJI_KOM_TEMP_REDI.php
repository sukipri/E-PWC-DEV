<?php   include"../config/connec_01_srv.php";  ?>
<?php 
        $ACK01 = rand("999999","88888");

 ?>
<?php // Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");

// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=TEMP-$ACK01-GAJI.xls"); 
include"FIN_M_FIN_GAJI_KOM_TEMP_XLS.php";
?>