<?php
    if(isset($_GET['UPPSNR'])){
            $ms_q("$up tb_pesan set status='2' WHERE idmain_pesan='$IDPSN01'");

    }

?>