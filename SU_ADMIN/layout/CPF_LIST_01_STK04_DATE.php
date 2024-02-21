<b>DATA STATISTIK CPF NASIONAL</b>
<form method="post">
<div class="input-group input-group-sm mb-3" style="max-width:40rem;">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Tgl Awal - Akhir</span>
  </div>
  <input type="date" class="form-control form-control-sm" name="tg01" required>
  <input type="date" class="form-control form-control-sm" name="tg02" required>
  <button class="btn btn-success btn-sm" name="cari_data">CARI DATA</butoon>
</div>
</form>
<!--  -->
<hr>
<?PHP 
    if(isset($_POST['cari_data'])){
        $tg01 = @$_POST['tg01'];
        $tg02 = @$_POST['tg02'];
        echo"#$tg01 - $tg02";
?>
<div class="container">
  <div class="row">
    <?PHP 
        $cpf_vform02_sw = $ms_q("$sl DISTINCT form02_jenis_01 FROM  Citarum.dbo.tb_cpf_form02_01");
          while($cpf_vform02_sww = $ms_fas($cpf_vform02_sw)){
            #DATA FORM02
            $cpf_nr_vform02_sw02 = $ms_q("$sl form02_jenis_01 FROM  Citarum.dbo.tb_cpf_form02_01 WHERE form02_jenis_01='$cpf_vform02_sww[form02_jenis_01]' AND (form02_tglinput_01 BETWEEN '$tg01' AND '$tg02')");
              $cpf_nr_vform02_sww02 = $ms_nr($cpf_nr_vform02_sw02);
             
    ?>
    <div class="col-4">
      <!-- 2 of 3 (wider) -->
      <div class="alert alert-dismissible alert-success">
      <i class="fas fa-database"></i> <strong><?PHP echo $cpf_vform02_sww['form02_jenis_01']; ?></strong>
      <br>
      <?PHP 
      #----------------DATA VIEW---------------#
        #DATA ASESMEN AWAL
        $cpf_asw_vcpf02_sw = $ms_q("$sl SUM(cast(form02_as_igd_01 as int)) AS tot_asw_01 FROM Citarum.dbo.tb_cpf_form02_01 WHERE form02_jenis_01='$cpf_vform02_sww[form02_jenis_01]' ");
        $cpf_asw_vcpf02_sww = $ms_fas($cpf_asw_vcpf02_sw); #IGD
        $cpf_ask_vcpf02_sw = $ms_q("$sl SUM(cast(form02_as_kep_01 as int)) AS tot_ask_01 FROM Citarum.dbo.tb_cpf_form02_01 WHERE form02_jenis_01='$cpf_vform02_sww[form02_jenis_01]' ");
        $cpf_ask_vcpf02_sww = $ms_fas($cpf_ask_vcpf02_sw); #KEP

         #DATA LAB
         $cpf_labekg_vcpf02_sw = $ms_q("$sl SUM(cast(form02_pn_ekg_01 as int)) AS tot_labekg_01 FROM Citarum.dbo.tb_cpf_form02_01 WHERE form02_jenis_01='$cpf_vform02_sww[form02_jenis_01]' ");
         $cpf_labekg_vcpf02_sww = $ms_fas($cpf_labekg_vcpf02_sw); #LAB EKG
         $cpf_labgds_vcpf02_sw = $ms_q("$sl SUM(cast(form02_pn_gds_01 as int)) AS tot_labgds_01 FROM Citarum.dbo.tb_cpf_form02_01 WHERE form02_jenis_01='$cpf_vform02_sww[form02_jenis_01]' ");
         $cpf_labgds_vcpf02_sww = $ms_fas($cpf_labgds_vcpf02_sw); #LAB GDS
         $cpf_labdr_vcpf02_sw = $ms_q("$sl SUM(cast(form02_pn_dr_01 as int)) AS tot_labdr_01 FROM Citarum.dbo.tb_cpf_form02_01 WHERE form02_jenis_01='$cpf_vform02_sww[form02_jenis_01]' ");
         $cpf_labdr_vcpf02_sww = $ms_fas($cpf_labdr_vcpf02_sw); #LAB DARAH RUTIN

           #DATA RADIOLOGI
           $cpf_radt_vcpf02_sw = $ms_q("$sl SUM(cast(form02_rad_trx_01 as int)) AS tot_radtrx_01 FROM Citarum.dbo.tb_cpf_form02_01 WHERE form02_jenis_01='$cpf_vform02_sww[form02_jenis_01]' ");
           $cpf_radt_vcpf02_sww = $ms_fas($cpf_radt_vcpf02_sw); #RAD TRX
            
         #DATA ASESMEN LANJUTAN
         $cpf_ald_vcpf02_sw = $ms_q("$sl SUM(cast(form02_al_dpjp_01 as int)) AS tot_ald_01 FROM Citarum.dbo.tb_cpf_form02_01 WHERE form02_jenis_01='$cpf_vform02_sww[form02_jenis_01]' ");
         $cpf_ald_vcpf02_sww = $ms_fas($cpf_ald_vcpf02_sw); #AL DPJP
         $cpf_alnd_vcpf02_sw = $ms_q("$sl SUM(cast(form02_al_ndpjp_01 as int)) AS tot_alnd_01 FROM Citarum.dbo.tb_cpf_form02_01 WHERE form02_jenis_01='$cpf_vform02_sww[form02_jenis_01]' ");
         $cpf_alnd_vcpf02_sww = $ms_fas($cpf_alnd_vcpf02_sw); #AL NDPJP
         $cpf_alpj_vcpf02_sw = $ms_q("$sl SUM(cast(form02_al_pj_01 as int)) AS tot_alpj_01 FROM Citarum.dbo.tb_cpf_form02_01 WHERE form02_jenis_01='$cpf_vform02_sww[form02_jenis_01]' ");
         $cpf_alpj_vcpf02_sww = $ms_fas($cpf_alpj_vcpf02_sw); #AL P.JAWAB
         $cpf_algz_vcpf02_sw = $ms_q("$sl SUM(cast(form02_al_gizi_01 as int)) AS tot_algz_01 FROM Citarum.dbo.tb_cpf_form02_01 WHERE form02_jenis_01='$cpf_vform02_sww[form02_jenis_01]' ");
         $cpf_algz_vcpf02_sww = $ms_fas($cpf_algz_vcpf02_sw); #AL GIZI
         $cpf_alrs_vcpf02_sw = $ms_q("$sl SUM(cast(form02_al_resep_01 as int)) AS tot_alrs_01 FROM Citarum.dbo.tb_cpf_form02_01 WHERE form02_jenis_01='$cpf_vform02_sww[form02_jenis_01]' ");
         $cpf_alrs_vcpf02_sww = $ms_fas($cpf_alrs_vcpf02_sw); #AL REEP
         $cpf_alrrs_vcpf02_sw = $ms_q("$sl SUM(cast(form02_al_reresep_01 as int)) AS tot_alrrs_01 FROM Citarum.dbo.tb_cpf_form02_01 WHERE form02_jenis_01='$cpf_vform02_sww[form02_jenis_01]' ");
         $cpf_alrrs_vcpf02_sww = $ms_fas($cpf_alrrs_vcpf02_sw); #RE RESEP

          #DATA TERAPI
          $cpf_trps_vcpf02_sw = $ms_q("$sl SUM(cast(form02_trp_str_01 as int)) AS tot_trps_01 FROM Citarum.dbo.tb_cpf_form02_01 WHERE form02_jenis_01='$cpf_vform02_sww[form02_jenis_01]' ");
          $cpf_trps_vcpf02_sww = $ms_fas($cpf_trps_vcpf02_sw); #TRP STR
          $cpf_trpin_vcpf02_sw = $ms_q("$sl SUM(cast(form02_trp_inj_01 as int)) AS tot_trpin_01 FROM Citarum.dbo.tb_cpf_form02_01 WHERE form02_jenis_01='$cpf_vform02_sww[form02_jenis_01]' ");
          $cpf_trpin_vcpf02_sww = $ms_fas($cpf_trpin_vcpf02_sw); #TRP INJEKSI
          $cpf_trprl_vcpf02_sw = $ms_q("$sl SUM(cast(form02_trp_rl_01 as int)) AS tot_trprl_01 FROM Citarum.dbo.tb_cpf_form02_01 WHERE form02_jenis_01='$cpf_vform02_sww[form02_jenis_01]' ");
          $cpf_trprl_vcpf02_sww = $ms_fas($cpf_trprl_vcpf02_sw); #TRP INJEKSI
          $cpf_trprf_vcpf02_sw = $ms_q("$sl SUM(cast(form02_trp_rf_01 as int)) AS tot_trprf_01 FROM Citarum.dbo.tb_cpf_form02_01 WHERE form02_jenis_01='$cpf_vform02_sww[form02_jenis_01]' ");
          $cpf_trprf_vcpf02_sww = $ms_fas($cpf_trprf_vcpf02_sw); #TRP RF
          $cpf_trpgli_vcpf02_sw = $ms_q("$sl SUM(cast(form02_trp_gli_01 as int)) AS tot_trpgli_01 FROM Citarum.dbo.tb_cpf_form02_01 WHERE form02_jenis_01='$cpf_vform02_sww[form02_jenis_01]' ");
          $cpf_trpgli_vcpf02_sww = $ms_fas($cpf_trpgli_vcpf02_sw); #TRP GLI
          $cpf_trppz_vcpf02_sw = $ms_q("$sl SUM(cast(form02_trp_prz_01 as int)) AS tot_trppz_01 FROM Citarum.dbo.tb_cpf_form02_01 WHERE form02_jenis_01='$cpf_vform02_sww[form02_jenis_01]' ");
          $cpf_trppz_vcpf02_sww = $ms_fas($cpf_trppz_vcpf02_sw); #TRP PZ
          $cpf_trpeth_vcpf02_sw = $ms_q("$sl SUM(cast(form02_trp_eth_01 as int)) AS tot_trpeth_01 FROM Citarum.dbo.tb_cpf_form02_01 WHERE form02_jenis_01='$cpf_vform02_sww[form02_jenis_01]' ");
          $cpf_trpeth_vcpf02_sww = $ms_fas($cpf_trpeth_vcpf02_sw); #TRP eth
          $cpf_trpcpt_vcpf02_sw = $ms_q("$sl SUM(cast(form02_trp_cpt_01 as int)) AS tot_trpcpt_01 FROM Citarum.dbo.tb_cpf_form02_01 WHERE form02_jenis_01='$cpf_vform02_sww[form02_jenis_01]' ");
          $cpf_trpcpt_vcpf02_sww = $ms_fas($cpf_trpcpt_vcpf02_sw); #TRP CPT
          $cpf_trpval_vcpf02_sw = $ms_q("$sl SUM(cast(form02_trp_val_01 as int)) AS tot_trpval_01 FROM Citarum.dbo.tb_cpf_form02_01 WHERE form02_jenis_01='$cpf_vform02_sww[form02_jenis_01]' ");
          $cpf_trpval_vcpf02_sww = $ms_fas($cpf_trpval_vcpf02_sw); #TRP VAL
          $cpf_trpram_vcpf02_sw = $ms_q("$sl SUM(cast(form02_trp_ram_01 as int)) AS tot_trpram_01 FROM Citarum.dbo.tb_cpf_form02_01 WHERE form02_jenis_01='$cpf_vform02_sww[form02_jenis_01]' ");
          $cpf_trpram_vcpf02_sww = $ms_fas($cpf_trpram_vcpf02_sw); #TRP RAM
          $cpf_trpdil_vcpf02_sw = $ms_q("$sl SUM(cast(form02_trp_dil_01 as int)) AS tot_trpdil_01 FROM Citarum.dbo.tb_cpf_form02_01 WHERE form02_jenis_01='$cpf_vform02_sww[form02_jenis_01]' ");
          $cpf_trpdil_vcpf02_sww = $ms_fas($cpf_trpdil_vcpf02_sw); #TRP am
          $cpf_trphct_vcpf02_sw = $ms_q("$sl SUM(cast(form02_trp_hct_01 as int)) AS tot_trphct_01 FROM Citarum.dbo.tb_cpf_form02_01 WHERE form02_jenis_01='$cpf_vform02_sww[form02_jenis_01]' ");
          $cpf_trphct_vcpf02_sww = $ms_fas($cpf_trphct_vcpf02_sw); #TRP HCT
          $cpf_trpbis_vcpf02_sw = $ms_q("$sl SUM(cast(form02_trp_bis_01 as int)) AS tot_trpbis_01 FROM Citarum.dbo.tb_cpf_form02_01 WHERE form02_jenis_01='$cpf_vform02_sww[form02_jenis_01]' ");
          $cpf_trpbis_vcpf02_sww = $ms_fas($cpf_trpbis_vcpf02_sw); #TRP BIS
          $cpf_trpao_vcpf02_sw = $ms_q("$sl SUM(cast(form02_trp_ao_01 as int)) AS tot_trpao_01 FROM Citarum.dbo.tb_cpf_form02_01 WHERE form02_jenis_01='$cpf_vform02_sww[form02_jenis_01]' ");
          $cpf_trpao_vcpf02_sww = $ms_fas($cpf_trpao_vcpf02_sw); #TRP AO

          #------KONVSERI -----------------#
             #KONVERSI ASESMEN AWAL
              $cpf_hit_as_vcpf01_sw = $cpf_asw_vcpf02_sww['tot_asw_01'] + $cpf_ask_vcpf02_sww['tot_ask_01'];
              $cpf_dic_as_cpf = $cpf_nr_vform02_sww02 * 2;
              $cpf_hit02_as_vcpf01_sw = $cpf_hit_as_vcpf01_sw / $cpf_dic_as_cpf    ;
              $cpf_hit03_as_vcpf01_sw = $cpf_hit02_as_vcpf01_sw * 100;
              #KONVERSI LAB
              $cpf_hit_lab_vcpf01_sw =  $cpf_labekg_vcpf02_sww['tot_labekg_01'] + $cpf_labgds_vcpf02_sww['tot_labgds_01'] +  $cpf_labdr_vcpf02_sww['tot_labdr_01'] + 1;
              $cpf_par_lab = $cpf_nr_vform02_sww02 * 3;
              $cpf_dic_lab_cpf = $cpf_nr_vform02_sww02 * $cpf_hit_lab_vcpf01_sw;
              $cpf_hit02_lab_vcpf01_sw =  $cpf_par_lab / $cpf_dic_lab_cpf ;
              $cpf_hit03_lab_vcpf01_sw = $cpf_hit02_lab_vcpf01_sw * 100;
             #KONVERSI RAD
              $cpf_hit_rad_vcpf01_sw = $cpf_radt_vcpf02_sww['tot_radtrx_01'];
              $cpf_dic_rad_cpf = $cpf_nr_vform02_sww02 * 1;
              $cpf_hit02_rad_vcpf01_sw = $cpf_hit_rad_vcpf01_sw / $cpf_dic_rad_cpf;
              $cpf_hit03_rad_vcpf01_sw = $cpf_hit02_rad_vcpf01_sw * 100;
              #KONVSERSI ASESMEN LANJUTAN
              $cpf_hit_al_vcpf01_sw =  $cpf_ald_vcpf02_sww['tot_ald_01'] + $cpf_alnd_vcpf02_sww['tot_alnd_01'] + $cpf_alpj_vcpf02_sww['tot_alpj_01'] + $cpf_algz_vcpf02_sww['tot_algz_01'] + $cpf_alrs_vcpf02_sww['tot_alrs_01'] + $cpf_alrrs_vcpf02_sww['tot_alrrs_01'];
              $cpf_dic_al_cpf = $cpf_nr_vform02_sww02 * 6;
              $cpf_hit02_al_vcpf01_sw = $cpf_hit_al_vcpf01_sw / $cpf_hit_al_vcpf01_sw;
              $cpf_hit03_al_vcpf01_sw = $cpf_hit02_al_vcpf01_sw * 100;
              #KONVSERI TERAPI
              $cpf_hit_trp_vcpf01_sw = $cpf_trps_vcpf02_sww['tot_trps_01'] + $cpf_trpin_vcpf02_sww['tot_trpin_01'] + $cpf_trprl_vcpf02_sww['tot_trprl_01'] + $cpf_trprf_vcpf02_sww['tot_trprf_01'] + $cpf_trppz_vcpf02_sww['tot_trppz_01'] + $cpf_trpgli_vcpf02_sww['tot_trpgli_01'] + $cpf_trpeth_vcpf02_sww['tot_trpeth_01']  + $cpf_trpval_vcpf02_sww['tot_trpval_01'] + $cpf_trpcpt_vcpf02_sww['tot_trpcpt_01'] + $cpf_trpval_vcpf02_sww['tot_trpval_01'] + $cpf_trpram_vcpf02_sww['tot_trpram_01'] + $cpf_trphct_vcpf02_sww['tot_trphct_01'] + $cpf_trpbis_vcpf02_sww['tot_trpbis_01'] + $cpf_trpao_vcpf02_sww['tot_trpao_01'];
              $cpf_par_trp = $cpf_nr_vform02_sww02 * 14;
              $cpf_dic_trp_cpf = $cpf_nr_vform02_sww02 * $cpf_hit_trp_vcpf01_sw;
              $cpf_hit02_trp_vcpf01_sw =  $cpf_par_trp / $cpf_dic_trp_cpf ;
              $cpf_hit03_trp_vcpf01_sw = $cpf_hit02_trp_vcpf01_sw * 100;

      
    if($cpf_vform02_sww['form02_jenis_01']=="DM"){
      //echo"$cpf_nr_vform02_sww02 X $cpf_hit_trp_vcpf01_sw<br>";
         #PREVIEW DATA
         echo  "AA - ".$cpf_hit03_as_vcpf01_sw."%"; //echo $cpf_dic_as_cpf;
         echo"<br>";
         echo  "LAB - ".$cpf_hit03_lab_vcpf01_sw."%"; //echo $cpf_dic_as_cpf;
         echo"<br>";
         echo  "RAD - ". $cpf_hit03_rad_vcpf01_sw."%"; //echo $cpf_dic_as_cpf;
         echo"<br>";
         echo  "AL ".$cpf_hit03_al_vcpf01_sw."%";
         echo"<br>";
         echo  "TRPI ". ceil($cpf_hit03_trp_vcpf01_sw)."%";
         echo"<br>";
         echo"L.RAWAT 100%";
    }
       
      ?>
        </div>
    </div>
    <?PHP } ?>
</div>
<?PHP } ?>