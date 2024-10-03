<?php

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
              $IDJBULAN01 = @$SQL_SL($_GET['IDJBULAN01']); #PARAMER JDW BULAN
              $IDHARI = @$SQL_SL($_GET['IDHARI']); #PARAMER HARI
              $IDBULAN = @$SQL_SL($_GET['IDBULAN']); #PARAMER BUlan
              $IDTAHUN = @$SQL_SL($_GET['IDTAHUN']); #PARAMER TAHNUN
              $IDBTUKIN = @$SQL_SL($_GET['IDBTUKIN']); #PARAMER TAHNUN
        //--GET DML--//
                //-Question-//
                /**/
                        $cpf_vquest_sw = $CL_Q("$CL_SL  tb_qc_01 order by NEWID()");
                         $cpf_vquest_sww = $CL_FAS($cpf_vquest_sw);
                

                

?>