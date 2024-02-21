<?php   include"../config/connec_01_srv.php";  ?>
<?php 
        $ACK01 = rand("999999","88888");
        $IDKOP01 = $_GET['IDKOP01'];

 ?>
<?php // Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");

// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=BPD-$ACK01.xls"); 
include"EM_BPD_01_XLS.php";
?>