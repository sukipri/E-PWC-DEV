<?php
            /* ARGONET */
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
        //--tb_cpf_form_01--//
        $cpf_cn_vform01_sw = $CL_Q("$SL form_kode_01 FROM tb_cpf_form_01 ");
        $cpf_nr_vform01_cq = $CL_NR($cpf_cn_vform01_sw);
        $cpf_hit_vform01_cq = $cpf_nr_vform01_cq + 1;
        $cpf_hit_zero_vform01_cq = sprintf("%02d", $cpf_hit_vform01_cq);
        @$cpf_cq_vform01_sw = "CPF$DATE_ymd-$cpf_hit_zero_vform01_cq"; 

         //--tb_cpf_form_01--//
         $cpf_cn_vform02_sw = $CL_Q("$SL form02_kode_01 FROM tb_cpf_form02_01 ");
         $cpf_nr_vform02_cq = $CL_NR($cpf_cn_vform02_sw);
         $cpf_hit_vform02_cq = $cpf_nr_vform02_cq + 1;
         $cpf_hit_zero_vform02_cq = sprintf("%02d", $cpf_hit_vform02_cq);
         @$cpf_cq_vform02_sw = "CPN$DATE_ymd-$cpf_hit_zero_vform02_cq"; 

        //--GET VIEW--//
              $IDRM01 = @$SQL_SL($_GET['IDRM01']);
              $IDADM01 = @$SQL_SL($_GET['IDADM01']);
              $IDCFORM01= @$SQL_SL($_GET['IDCFORM01']);
              $IDCFORM02= @$SQL_SL($_GET['IDCFORM02']);
              $IDFJNS01 = @$SQL_SL($_GET['IDFJNS01']);
			  $IDKEG03 = @$SQL_SL($_GET['IDKEG03']);
			  $IDKEG02 = @$SQL_SL($_GET['IDKEG02']);
			  $IDKEG01 = @$SQL_SL($_GET['IDKEG01']);
			  $IDKEG03REC = @$SQL_SL($_GET['IDKEG03REC']);
			  
        //--GET DML--//
		$IDDELKEG01 = @$SQL_SL($_GET['IDDELKEG01']);
		$IDDELKEG03REC = @$SQL_SL($_GET['IDDELKEG03REC']);
                $IDDELKEG0203REC = @$SQL_SL($_GET['IDDELKEG0203REC']);
                
               //-Question-//
                /**/
                        $cpf_vquest_sw = $CL_Q("$CL_SL  tb_qc_01 order by NEWID()");
                         $cpf_vquest_sww = $CL_FAS($cpf_vquest_sw);
                

                

?>