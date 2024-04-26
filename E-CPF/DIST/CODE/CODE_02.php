<?php
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
                $TG01 = @$SQL_SL($_GET['TG01']);
                $TG02 = @$SQL_SL($_GET['TG02']);
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