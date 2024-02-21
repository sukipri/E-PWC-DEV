<b>DATA STATISTIK CPF</b>
<hr>
<div class="container">
  <div class="row">
      <?PHP 
        $pwc_vcpf01_sw = $ms_q("$sl DISTINCT form_jenis_01 FROM tb_cpf_form_01 order by form_jenis_01 ");
            while($pwc_vcpf01_sww = $ms_fas($pwc_vcpf01_sw)){
            $pwc_nr_vcpf01_sw = $ms_q ("$sl form_jenis_01 FROM tb_cpf_form_01 WHERE form_jenis_01='$pwc_vcpf01_sww[form_jenis_01]'");
            $pwc_nr_vcpf01_sww = $ms_nr($pwc_nr_vcpf01_sw);
      ?>
    <div class="col-4">
      <!-- 2 of 3 (wider) -->
      <div class="alert alert-dismissible alert-success">
      <i class="fas fa-database"></i> <strong><?PHP echo"$pwc_vcpf01_sww[form_jenis_01]"; ?></strong>
      <br>
        <?PHP
            error_reporting(0);
            #LAB CTBT
            $pwc_lab_vcpf01_sw = $ms_q("$sl SUM(cast(form_lab_ctbt_01 as int)) as tot_lab FROM tb_cpf_form_01 WHERE form_jenis_01='$pwc_vcpf01_sww[form_jenis_01]' ");
            $pwc_lab_vcpf01_sww = $ms_fas($pwc_lab_vcpf01_sw);
            #LAB NLR
            $pwc_lab_vcpf01_sw02 = $ms_q("$sl SUM(cast(form_lab_nlr_01 as int)) as tot_lab02 FROM tb_cpf_form_01 WHERE form_jenis_01='$pwc_vcpf01_sww[form_jenis_01]' ");
            $pwc_lab_vcpf01_sww02 = $ms_fas($pwc_lab_vcpf01_sw02);
            #LAB GDS
            $pwc_lab_vcpf01_sw03 = $ms_q("$sl SUM(cast(form_lab_gds_01 as int)) as tot_lab03 FROM tb_cpf_form_01 WHERE form_jenis_01='$pwc_vcpf01_sww[form_jenis_01]' ");
            $pwc_lab_vcpf01_sww03 = $ms_fas($pwc_lab_vcpf01_sw03);
            #LAB NLR
            $pwc_lab_vcpf01_sw04 = $ms_q("$sl SUM(cast(form_lab_swab_01 as int)) as tot_lab04 FROM tb_cpf_form_01 WHERE form_jenis_01='$pwc_vcpf01_sww[form_jenis_01]' ");
            $pwc_lab_vcpf01_sww04 = $ms_fas($pwc_lab_vcpf01_sw04);
            
             #RAD
             $pwc_rad_vcpf01_sw04 = $ms_q("$sl SUM(cast(form_rad_thorax_01 as int)) as tot_rad FROM tb_cpf_form_01 WHERE form_jenis_01='$pwc_vcpf01_sww[form_jenis_01]' ");
             $pwc_rad_vcpf01_sww04 = $ms_fas($pwc_rad_vcpf01_sw04);

            #DPJP
            $pwc_dpjp_vcpf01_sw05 = $ms_q("$sl SUM(cast(form_as02_dpjp_01 as int)) as tot_dpjp FROM tb_cpf_form_01 WHERE form_jenis_01='$pwc_vcpf01_sww[form_jenis_01]' ");
            $pwc_dpjp_vcpf01_sww05 = $ms_fas($pwc_dpjp_vcpf01_sw05);
            #NDPJP
            $pwc_dpjp_vcpf01_sw06 = $ms_q("$sl SUM(cast(form_as02_ndpjp_01 as int)) as tot_ndpjp FROM tb_cpf_form_01 WHERE form_jenis_01='$pwc_vcpf01_sww[form_jenis_01]' ");
            $pwc_dpjp_vcpf01_sww06 = $ms_fas($pwc_dpjp_vcpf01_sw06);

            #KEPERAWATAN
            #PJ01
            $pwc_pj_vcpf01_sw = $ms_q("$sl SUM(cast(form_as02_pj_01 as int)) as tot_pj FROM tb_cpf_form_01 WHERE form_jenis_01='$pwc_vcpf01_sww[form_jenis_01]' ");
            $pwc_pj_vcpf01_sww = $ms_fas($pwc_pj_vcpf01_sw);
            #PJ02
            $pwc_pj_vcpf01_sw02 = $ms_q("$sl SUM(cast(form_as02_pj02_01 as int)) as tot_pj02 FROM tb_cpf_form_01 WHERE form_jenis_01='$pwc_vcpf01_sww[form_jenis_01]' ");
            $pwc_pj_vcpf01_sww02 = $ms_fas($pwc_pj_vcpf01_sw02);
            #PJ03
            $pwc_pj_vcpf01_sw03 = $ms_q("$sl SUM(cast(form_as02_pj03_01 as int)) as tot_pj03 FROM tb_cpf_form_01 WHERE form_jenis_01='$pwc_vcpf01_sww[form_jenis_01]' ");
            $pwc_pj_vcpf01_sww03 = $ms_fas($pwc_pj_vcpf01_sw03);
            #PJ04
            $pwc_pj_vcpf01_sw04 = $ms_q("$sl SUM(cast(form_as02_pj04_01 as int)) as tot_pj04 FROM tb_cpf_form_01 WHERE form_jenis_01='$pwc_vcpf01_sww[form_jenis_01]' ");
            $pwc_pj_vcpf01_sww04 = $ms_fas($pwc_pj_vcpf01_sw04);
            #PJ05
            $pwc_pj_vcpf01_sw05 = $ms_q("$sl SUM(cast(form_as02_pj05_01 as int)) as tot_pj05 FROM tb_cpf_form_01 WHERE form_jenis_01='$pwc_vcpf01_sww[form_jenis_01]' ");
            $pwc_pj_vcpf01_sww05 = $ms_fas($pwc_pj_vcpf01_sw05);

            #GIZI
            $pwc_gizi_vcpf01_sw = $ms_q("$sl SUM(cast(form_as02_pj05_01 as int)) as tot_gizi FROM tb_cpf_form_01 WHERE form_jenis_01='$pwc_vcpf01_sww[form_jenis_01]' ");
            $pwc_gizi_vcpf01_sww = $ms_fas($pwc_gizi_vcpf01_sw);

            #FARMASI
            #FRM01
            $pwc_frm_vcpf01_sw = $ms_q("$sl SUM(cast(form_as02_resep_01 as int)) as tot_frm FROM tb_cpf_form_01 WHERE form_jenis_01='$pwc_vcpf01_sww[form_jenis_01]' ");
            $pwc_frm_vcpf01_sww = $ms_fas($pwc_frm_vcpf01_sw);
            #FRM02
            $pwc_frm_vcpf01_sw02 = $ms_q("$sl SUM(cast(form_as02_reresep_01 as int)) as tot_frm02 FROM tb_cpf_form_01 WHERE form_jenis_01='$pwc_vcpf01_sww[form_jenis_01]' ");
            $pwc_frm_vcpf01_sww02 = $ms_fas($pwc_frm_vcpf01_sw02);
            #FRM03
            $pwc_frm_vcpf01_sw03 = $ms_q("$sl SUM(cast(form_as02_reresep02_01 as int)) as tot_frm03 FROM tb_cpf_form_01 WHERE form_jenis_01='$pwc_vcpf01_sww[form_jenis_01]' ");
            $pwc_frm_vcpf01_sww03 = $ms_fas($pwc_frm_vcpf01_sw03);
            #FRM04
            $pwc_frm_vcpf01_sw04 = $ms_q("$sl SUM(cast(form_as02_reresep03_01 as int)) as tot_frm04 FROM tb_cpf_form_01 WHERE form_jenis_01='$pwc_vcpf01_sww[form_jenis_01]' ");
            $pwc_frm_vcpf01_sww04 = $ms_fas($pwc_frm_vcpf01_sw04);
            #FRM04
            $pwc_frm_vcpf01_sw05 = $ms_q("$sl SUM(cast(form_as02_reresep04_01 as int)) as tot_frm05 FROM tb_cpf_form_01 WHERE form_jenis_01='$pwc_vcpf01_sww[form_jenis_01]' ");
            $pwc_frm_vcpf01_sww05 = $ms_fas($pwc_frm_vcpf01_sw05);
            #FRM05
            $pwc_frm_vcpf01_sw06 = $ms_q("$sl SUM(cast(form_as02_reresep05_01 as int)) as tot_frm06 FROM tb_cpf_form_01 WHERE form_jenis_01='$pwc_vcpf01_sww[form_jenis_01]' ");
            $pwc_frm_vcpf01_sww06 = $ms_fas($pwc_frm_vcpf01_sw06);

            #INJEKSI
            #INJEK01
            $pwc_injek_vcpf01_sw = $ms_q("$sl SUM(cast(form_trp_cef_01 as int)) as tot_injek FROM tb_cpf_form_01 WHERE form_jenis_01='$pwc_vcpf01_sww[form_jenis_01]' ");
            $pwc_injek_vcpf01_sww = $ms_fas($pwc_injek_vcpf01_sw);
            #INJEK02
            $pwc_injek_vcpf01_sw02 = $ms_q("$sl SUM(cast(form_trp_ceff02_01 as int)) as tot_injek02 FROM tb_cpf_form_01 WHERE form_jenis_01='$pwc_vcpf01_sww[form_jenis_01]' ");
            $pwc_injek_vcpf01_sww02 = $ms_fas($pwc_injek_vcpf01_sw02);
            #INJEK03
            $pwc_injek_vcpf01_sw03 = $ms_q("$sl SUM(cast(form_trp_ceff03_01 as int)) as tot_injek03 FROM tb_cpf_form_01 WHERE form_jenis_01='$pwc_vcpf01_sww[form_jenis_01]' ");
            $pwc_injek_vcpf01_sww03 = $ms_fas($pwc_injek_vcpf01_sw03);
            #INJEK04
            $pwc_injek_vcpf01_sw04 = $ms_q("$sl SUM(cast(form_trp_ceff04_01 as int)) as tot_injek04 FROM tb_cpf_form_01 WHERE form_jenis_01='$pwc_vcpf01_sww[form_jenis_01]' ");
            $pwc_injek_vcpf01_sww04 = $ms_fas($pwc_injek_vcpf01_sw04);
            #INJEK05
            $pwc_injek_vcpf01_sw05 = $ms_q("$sl SUM(cast(form_trp_ceff05_01 as int)) as tot_injek05 FROM tb_cpf_form_01 WHERE form_jenis_01='$pwc_vcpf01_sww[form_jenis_01]' ");
            $pwc_injek_vcpf01_sww05 = $ms_fas($pwc_injek_vcpf01_sw05);

            

            #KONVERSI LAB
            $pwc_hit_lab_cpf01_sw = $pwc_lab_vcpf01_sww['tot_lab'] + $pwc_lab_vcpf01_sww02['tot_lab02'] + $pwc_lab_vcpf01_sww03['tot_lab03'] + $pwc_lab_vcpf01_sww04['tot_lab04'];
            $pwc_hit_lab_cpf01_sw02 = $pwc_hit_lab_cpf01_sw /  $pwc_hit_lab_cpf01_sw * 100;
            #KOVERSI RAD
            $pwc_hit_rad_cpf01_sw =  $pwc_rad_vcpf01_sww04['tot_rad'];
            $pwc_hit_rad_cpf01_sw02 = $pwc_hit_rad_cpf01_sw /  $pwc_hit_rad_cpf01_sw * 100;
            #KOVERSI DPJP
            $pwc_hit_dpjp_cpf01_sw =  $pwc_dpjp_vcpf01_sww05['tot_dpjp'] + $pwc_dpjp_vcpf01_sww06['tot_ndpjp'] ;
            $pwc_hit_dpjp_cpf01_sw02 = $pwc_hit_dpjp_cpf01_sw /  $pwc_hit_dpjp_cpf01_sw * 100;
            #KOVERSI KEPERAWATAN
             $pwc_hit_pj_cpf01_sw = $pwc_pj_vcpf01_sww['tot_pj'] + $pwc_pj_vcpf01_sww02['tot_pj02'] + $pwc_pj_vcpf01_sww03['tot_pj03'] + $pwc_pj_vcpf01_sww04['tot_pj04'] + $pwc_pj_vcpf01_sww05['tot_pj05'] ;
             $pwc_hit_pj_cpf01_sw02 = $pwc_hit_pj_cpf01_sw /  $pwc_hit_pj_cpf01_sw * 100;
            #KOVERSI GIZI
            $pwc_hit_gizi_cpf01_sw =  $pwc_gizi_vcpf01_sww['tot_gizi'];
            $pwc_hit_gizi_cpf01_sw02 = $pwc_hit_gizi_cpf01_sw /  $pwc_hit_gizi_cpf01_sw * 100;
            #KOVERSI FARMASI
            $pwc_hit_frm_cpf01_sw =  $pwc_frm_vcpf01_sww['tot_frm'] +  $pwc_frm_vcpf01_sww02['tot_frm02'] + $pwc_frm_vcpf01_sww03['tot_frm03'] + $pwc_frm_vcpf01_sww04['tot_frm04'] + $pwc_frm_vcpf01_sww05['tot_frm05'] + $pwc_frm_vcpf01_sww06['tot_frm06'];
            $pwc_hit_frm_cpf01_sw02 = $pwc_hit_frm_cpf01_sw /  $pwc_hit_frm_cpf01_sw * 100;
            #KOVERSI INJEKSI
            $pwc_hit_injek_cpf01_sw =  $pwc_injek_vcpf01_sww['tot_injek'] +  $pwc_injek_vcpf01_sww02['tot_injek02'] + $pwc_injek_vcpf01_sww03['tot_injek03'] + $pwc_injek_vcpf01_sww04['tot_injek04'] + $pwc_injek_vcpf01_sww05['tot_injek05'];
            $pwc_hit_injek_cpf01_sw02 = $pwc_hit_injek_cpf01_sw /  $pwc_hit_injek_cpf01_sw * 100;
            #LAMA RAWAT
            $pwc_hit_lr_cpf01_sw = 1;
            $pwc_hit_lr_cpf01_sw02 = $pwc_hit_lr_cpf01_sw / $pwc_hit_lr_cpf01_sw * 100;
            
            #KONVERSI KONDISI
            #LAB
            if($pwc_hit_lab_cpf01_sw > 0){
                $pointlab = 1;
            }else{
                $pointlab = 0;
            }
            #rad
            if($pwc_hit_rad_cpf01_sw > 0){
                $pointrad = 1;
            }else{
                $pointrad = 0;
            }
            #dpjp
            if($pwc_hit_dpjp_cpf01_sw > 0){
                $pointdpjp = 1;
            }else{
                $pointdpjp = 0;
            }
            #PJ
            if($pwc_hit_pj_cpf01_sw > 0){
                $pointpj = 1;
            }else{
                $pointpj = 0;
            }
            #GIZI
            if($pwc_hit_frm_cpf01_sw > 0){
                $pointfrm = 1;
            }else{
                $pointfrm = 0;
            }
            #INJEK
            if($pwc_injek_cpf01_sww  > 0){
                $pointinjek = 1;
            }else{
                $pointinjek = 0;
            }
            #lamarawat
            if($pwc_lr_cpf01_sw > 0){
                $pointlr = 1;
            }else{
                $pointlr = 0;
            }

            
            #KONVSERSI TOTAL
            $pwc_hit_total_cpf_sw = $pwc_hit_lab_cpf01_sw +  $pwc_hit_rad_cpf01_sw + $pwc_hit_dpjp_cpf01_sw + $pwc_hit_pj_cpf01_sw + $pwc_hit_gizi_cpf01_sw +  $pwc_hit_frm_cpf01_sw + $pwc_hit_injek_cpf01_sw +  $pwc_hit_lr_cpf01_sw;
            $pwc_hit_total_cpf_sw02 = $pointlab + $pointrad + $pointdpjp + $pointpj + $pointgizi + $pointfrm + $pointinjek + $pointlr ;
            $pwc_hit_total_cpf_sw03 =  $pwc_hit_total_cpf_sw02 * $pwc_nr_vcpf01_sww ;
            $pwc_hit_total_cpf_sw_nr = $pwc_nr_vcpf01_sww *  $pwc_hit_total_cpf_sw02 ;
            $pwc_hit_total_cpf_sw02 = $pwc_hit_total_cpf_sw03 /   $pwc_hit_total_cpf_sw_nr * 100;

        ?>

            <?PHP echo"LAB ".  $pwc_hit_lab_cpf01_sw02."%"; ?>
            <br>
            <?PHP echo"RAD ".  $pwc_hit_rad_cpf01_sw02."%"; ?>
            <br>
            <?PHP echo"DPJP ".  $pwc_hit_dpjp_cpf01_sw02."%"; ?>
            <br>
            <?PHP echo"Ass.Kep ".  $pwc_hit_pj_cpf01_sw02."%"; ?>
            <br>
            <?PHP echo"Gizi ".  $pwc_hit_gizi_cpf01_sw02."%"; ?>
            <br>
            <?PHP echo"Farmasi ".  $pwc_hit_frm_cpf01_sw02."%"; ?>
            <br>
            <?PHP echo"Injeksi ".  $pwc_hit_injek_cpf01_sw02."%"; ?>
            <br>
            <?PHP echo"Lama Rawat ". $pwc_hit_lr_cpf01_sw02."%"; ?>
            <hr>
            <b><?PHP echo"N  $pwc_hit_total_cpf_sw03 / D  $pwc_hit_total_cpf_sw_nr = $pwc_hit_total_cpf_sw02 %  "; ?></b>
            <br>
        </div>
    </div>
    <?PHP } ?>
</div>