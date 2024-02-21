<?php
    //KOP
                    $vkop = $ms_q("$sl kode FROM tb_kop ");
				    $nr_vkop = $ms_nr($vkop);
					$hit_vkop = $nr_vkop + 1;
					$hit_zero = sprintf("%02d", $hit_vkop);
                    $c_kode_vkop= "KOP$date_ack_tiny$hit_zero";
    //KOP Detail
                    $vkopd = $ms_q("$sl kode FROM tb_kop_detail ");
			    	$nr_vkopd = $ms_nr($vkopd);
					$hit_vkopd = $nr_vkopd + 1;
					$hit_zero = sprintf("%02d", $hit_vkopd);
				    $c_kode_vkopd= "KOPD$date_ack_tiny$hit_zero";
    //KARY
                    $vkry = $ms_q("$sl kode FROM tb_kary ");
			    	$nr_vkry = $ms_nr($vkry);
					$hit_vkry = $nr_vkry + 1;
					$hit_zero = sprintf("%02d", $hit_vkry);
                    $c_kode_vkry= "KRY$date_ack_tiny$hit_zero";
    //KARY Part
                    $vkryp = $ms_q("$sl kode FROM tb_kary_part ");
				    $nr_vkryp = $ms_nr($vkryp);
					$hit_vkryp = $nr_vkryp + 1;
					$hit_zero = sprintf("%02d", $hit_vkryp);
                    $c_kode_vkryp= "KRYP$date_ack_tiny$hit_zero";   
     //KARY Tembusan
                    $vkryt = $ms_q("$sl kode FROM tb_kary_tembusan ");
                    $nr_vkryt = $ms_nr($vkryt);
                    $hit_vkryt = $nr_vkryt + 1;
                    $hit_zero = sprintf("%02d", $hit_vkryt);
                    $c_kode_vkryt= "KRYT$date_ack_tiny$hit_zero";            
    //DIVISION
                    $vdiv = $ms_q("$sl kode FROM tb_divisi ");
				    $nr_vdiv = $ms_nr($vdiv);
					$hit_vdiv = $nr_vdiv + 1;
					$hit_zero = sprintf("%02d", $hit_vdiv);
                    $c_kode_vdiv= "DIV$date_ack_tiny$hit_zero";
    //DIVISION
                    $vdivp = $ms_q("$sl kode FROM tb_divisi_posisi ");
				    $nr_vdivp = $ms_nr($vdivp);
					$hit_vdivp = $nr_vdivp + 1;
					$hit_zero = sprintf("%02d", $hit_vdivp);
                    $c_kode_vdivp= "DIVP$date_ack_tiny$hit_zero";
    //FINANCE
                    $vbyj = $ms_q("$sl kode FROM tb_biaya_jenis ");
				    $nr_vbyj = $ms_nr($vbyj);
					$hit_vbyj = $nr_vbyj + 1;
					$hit_zero = sprintf("%02d", $hit_vbyj);
                    $c_kode_vbyj= "BYJ$date_ack_tiny$hit_zero";
    
    //FINANCE Record
                    $vbyjr = $ms_q("$sl kode FROM tb_biaya_rekam_kop ");
				    $nr_vbyjr = $ms_nr($vbyjr);
					$hit_vbyjr = $nr_vbyjr + 1;
					$hit_zero = sprintf("%02d", $hit_vbyjr);
                    $c_kode_vbyjr= "BYJR$date_ack_tiny$hit_zero";
    //Pembiayaan Jenis
                    $vpj = $ms_q("$sl kode FROM tb_pembiayaan_jenis ");
				    $nr_vpj = $ms_nr($vpj);
					$hit_vpj = $nr_vpj + 1;
					$hit_zero = sprintf("%02d", $hit_vpj);
                    $c_kode_vpj= "PJ$date_ack_tiny$hit_zero";
     //Pembiayaan 
                    $vpb = $ms_q("$sl kode FROM tb_pembiayaan ");
                    $nr_vpb  = $ms_nr($vpb );
                    $hit_vpb  = $nr_vpb  + 1;
                    $hit_zero = sprintf("%02d", $hit_vpb);
                    $c_kode_vpb = "PB$date_ack_tiny$hit_zero";
    //Pembiayaan rekam
                    $vpbr = $ms_q("$sl kode FROM tb_pembiayaan_rekam ");
                    $nr_vpbr  = $ms_nr($vpbr);
                    $hit_vpbr  = $nr_vpbr  + 1;
                    $hit_zero = sprintf("%02d", $hit_vpbr);
                    $c_kode_vpbr = "PBR$date_ack_tiny$hit_zero";
    //Kop Catatan
                    $vct = $ms_q("$sl kode FROM tb_cat_tugas ");
                    $nr_vct  = $ms_nr($vct);
                    $hit_vct  = $nr_vct  + 1;
                    $hit_zero = sprintf("%02d", $hit_vct);
                    $c_kode_vct = "CT$date_ack_tiny$hit_zero";
    //Kop Catatan rekam
                    $vctr = $ms_q("$sl kode FROM tb_cat_rekam ");
                    $nr_vctr  = $ms_nr($vctr);
                    $hit_vctr  = $nr_vctr  + 1;
                    $hit_zero = sprintf("%02d", $hit_vctr);
                    $c_kode_vctr = "CTR$date_ack_tiny$hit_zero";

         //Kelompok bidang
                    $vkbd = $ms_q("$sl kode FROM tb_kel_bidang ");
                    $nr_vkbd  = $ms_nr($vkbd);
                    $hit_vkbd  = $nr_vkbd  + 1;
                    $hit_zero = sprintf("%02d", $hit_vkbd);
                    $c_kode_vkbd = "KBD$date_ack_tiny$hit_zero";
     //Kelompok bidang rekam
                    $vkbdr = $ms_q("$sl kode FROM tb_kel_bidang_rekam ");
                    $nr_vkbdr  = $ms_nr($vkbdr);
                    $hit_vkbdr  = $nr_vkbdr  + 1;
                    $hit_zero = sprintf("%02d", $hit_vkbdr);
                    $c_kode_vkbdr = "KBDR$date_ack_tiny$hit_zero";

     //Kop Detail IN
                    $vkpin = $ms_q("$sl kode FROM tb_kop_in_detail ");
                    $nr_vkpin  = $ms_nr($vkpin);
                    $hit_vkpin  = $nr_vkpin  + 1;
                    $hit_zero = sprintf("%02d", $hit_vkpin);
                    $c_kode_vkpin = "KPIN$date_ack_tiny$hit_zero";
    
      //Kop Detail IN
                    $vvar = $ms_q("$sl kode FROM tb_kary_var_dtl ");
                    $nr_vvar  = $ms_nr($vvar);
                    $hit_vvar  = $nr_vvar  + 1;
                    $hit_zero = sprintf("%02d", $hit_vvar);
                    $c_kode_vvar = "VAR$date_ack_tiny$hit_zero";
                    //
//
    /* Numbering */

        $no_uni = 1;
    /* */
        //GET ID
            $IDEMP01 = @$sql_slash($_GET['IDEMP01']);
            $IDBLN01 = @$sql_slash($_GET['IDBLN01']);
            $IDGJ01 = @$sql_slash($_GET['IDGJ01']);
            $IDRECINFO01 = @$sql_slash($_GET['IDRECINFO01']);
            $IDBKS01 = @$sql_slash($_GET['IDBKS01']);
            $IDLAT01 = @$sql_slash($_GET['IDLAT01']);
            $IDLONG01 = @$sql_slash($_GET['IDLONG01']);
            $IDLONG01 = @$sql_slash($_GET['BLN']);
            $IDLONG01 = @$sql_slash($_GET['IDLONG01']);
            $GTG01 = @$sql_slash($_GET['GTG01']);
            $GTG02 = @$sql_slash($_GET['GTG02']);
            $IDPLBR01 = @$sql_slash($_GET['IDPLBR01']);
            $IDSIPK01 = @$sql_slash($_GET['IDSIPK01']);      
            $IDKLP01= @$sql_slash($_GET['IDKLP01']); #PARAMER KELOMPOK
            $IDLBULAN01= @$sql_slash($_GET['IDLBULAN01']); #PARAMER KELOMPOK

        //GET DEL UP ACTION
            $UPKRY01 = @$sql_slash($_GET['UPKRY01']);
            $DELDFB= @$sql_slash($_GET['DELDFB']);
			$IDVAL01 = @$sql_slash($_GET['IDVAL01']);



                ?>