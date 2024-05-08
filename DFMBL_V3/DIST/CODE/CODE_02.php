<?php
            /* E-PWC */
    /*-------------------------------------------------------*/
    /* Himpunan Data Code Variabel DAN FUNGSI  QUERING DBMS */
    /*-----------------------------------------------------*/


    /*_________________________________________________*/

        /* Numbering Field Code Quering 
                // titik_kode_01
                $ec_cn_vtt01_sw = $CL_Q("$SL titik_kode_01 FROM tb_ec_titik_01 ");
                $ec_nr_vtt01_cq = $CL_NR($ec_cn_vtt01_sw);
                $ec_hit_vtt01_cq = $ec_nr_vtt01_cq + 1;
                $ec_hit_zero_vtt01_cq = sprintf("%02d", $ec_hit_vtt01_cq);
                @$ec_cq_vtt01_sw = "TT$DATE_ymd-$ec_hit_zero_vtt01_cq"; 
                // titik_kode_01
               */
  

        //--GET VIEW--//
              $IDRM01 = @$SQL_SL($_GET['IDRM01']); #NOMOR REKAM MEDIS
              $IDADM01 = @$SQL_SL($_GET['IDADM01']); #NOMORADMISI
              $IDCFORM01= @$SQL_SL($_GET['IDCFORM01']); 
              $IDFJNS01 = @$SQL_SL($_GET['IDFJNS01']);
              $IDLAT01 = @$SQL_SL($_GET['IDLAT01']); #ID LAT *Presensi
              $IDLONG01 = @$SQL_SL($_GET['IDLONG01']); #LONG *Presensi
              $LOCATED = @$SQL_SL($_GET['LOCATED']); #LOKASI *Presensi
              $IDKRY = @$SQL_SL($_GET['IDKRY']); #*Presensi
              $IDEMP02 = @$SQL_SL($_GET['IDEMP02']);
              $IDPLBR01 = @$SQL_SL($_GET['IDPLBR01']);
              $IDONOMOR01 = @$SQL_SL($_GET['IDONOMOR01']);
              $IDOFARM01 = @$SQL_SL($_GET['IDOFARM01']); #*Order FARMASI
              $IDTG01 = @$SQL_SL($_GET['IDTG01']); #PARAMETER TGL
              $IDTG02 = @$SQL_SL($_GET['IDTG02']); #PARAMER TANGGAL
              $IDLTGL = @$SQL_SL($_GET['IDLTGL']); #PARAMER TANGGAL LEMBUR AS ID
              $IDLBR01 = @$SQL_SL($_GET['IDLBR01']); #PARAMER LEMBURID
              $IDKARYDIR = @$SQL_SL($_GET['IDKARYDIR']); #PARAMER KARY DIR
              $IDBLMBR01 = @$SQL_SL($_GET['IDBLMBR01']); #PARAMER LEMBUR
              $IDLEMTMP01 = @$SQL_SL($_GET['IDLEMTMP01']); #PARAMER IDLEMBURTMP
        //--GET DML--//
                //-Question-//
                /**/
                        $cpf_vquest_sw = $CL_Q("$CL_SL  tb_qc_01 order by NEWID()");
                         $cpf_vquest_sww = $CL_FAS($cpf_vquest_sw);
                

                

?>