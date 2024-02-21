<?php
            /* E-CHECK */
    /*-------------------------------------------------------*/
    /* Himpunan Data Code Variabel DAN FUNGSI  QUERING DBMS */
    /*-----------------------------------------------------*/


    /*_________________________________________________*/

        /* Numbering Field Code Quering */
                // titik_kode_01
                $ec_cn_vtt01_sw = $CL_Q("$SL titik_kode_01 FROM tb_ec_titik_01 ");
                $ec_nr_vtt01_cq = $CL_NR($ec_cn_vtt01_sw);
                $ec_hit_vtt01_cq = $ec_nr_vtt01_cq + 1;
                $ec_hit_zero_vtt01_cq = sprintf("%02d", $ec_hit_vtt01_cq);
                @$ec_cq_vtt01_sw = "TT$DATE_ymd-$ec_hit_zero_vtt01_cq"; 

                // titik_kode_01_rec
                $ec_cn_vttr01_sw = $CL_Q("$SL rec_kode_01 FROM tb_ec_titik_01_rec ");
                $ec_nr_vttr01_cq = $CL_NR($ec_cn_vttr01_sw);
                $ec_hit_vttr01_cq = $ec_nr_vttr01_cq + 1;
                $ec_hit_zero_vttr01_cq = sprintf("%02d", $ec_hit_vttr01_cq);
                @$ec_cq_vttr01_sw = "TT$DATE_ymd-$ec_hit_zero_vttr01_cq"; 

                // User STP 
                $ec_cn_vuser01_sw = $CL_Q("$SL kode FROM TBUser WHERE akses='31' OR akses='312' ");
                $ec_nr_vuser01_cq = $CL_NR($ec_cn_vuser01_sw);
                $ec_hit_vuser01_cq = $ec_nr_vuser01_cq + 1;
                $ec_hit_zero_vuser01_cq = sprintf("%02d", $ec_hit_vuser01_cq);
                @$ec_cq_vuser01_sw = "STP$DATE_ymd-$ec_hit_zero_vuser01_cq"; 




/*..E-CHECK......................................................................... */
                /*DATAVIEW */
                        //VIEW-UPDATE//
                        $IDTT01 = @$SQL_SL($_GET['IDTT01']);
                        $IDUSER01 = @$SQL_SL($_GET['IDUSER01']);
                        $IDPASS01= @$SQL_SL($_GET['IDPASS01']);
                        $IDMAIN01= @$SQL_SL($_GET['IDMAIN01']);
                        $IDAKSES01 = @$SQL_SL($_GET['IDAKSES01']);
                

?>