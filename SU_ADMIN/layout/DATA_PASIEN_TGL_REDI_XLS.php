<?php   include"../config/connec_01_srv.php"; include"../sc/stack_Q.php";  ?>
<?php 
        $ACK01 = rand("999999","88888");
        
 ?>
<?php // Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");

// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=DPSN01-$ACK01.xls"); 
include"DATA_PASIEN_TGL_XLS.php";
?>