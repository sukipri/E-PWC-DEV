<?php   include"../config/connec_01_srv.php";  ?>
<?php 
        $ACK01 = rand("999999","88888");
        $IDGJ01 = @$_GET['IDGJ01'];

 ?>
<?php // Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");

// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=DWN01-$ACK01-GAJI.xls"); 
include"FIn_M_FIN_GAJI_KOM_DWN_XLS.php";
?>