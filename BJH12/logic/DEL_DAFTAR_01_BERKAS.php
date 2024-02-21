<?php
        if(isset($_GET['DELDFB']))
        {
            $ms_q("$dl FROM tb_berkas WHERE idmain_berkas='$IDBKS01'");
            header("location:?HLM=EMP_M&SUB=EMP_M_EMP_UPDATE&IDEMP=$IDEMP");

        }

?>