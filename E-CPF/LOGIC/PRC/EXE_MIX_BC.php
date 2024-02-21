<?php
     /*-------------------------------------------------------*/
    /* Himpunan Eksekusi Porses Mixing execution Quering            */
    /*-----------------------------------------------------*/
?>
          
<?PHP 
            //--CPF_ENTRI_02_APN--//
            if(isset($_POST['cpf_apn_simpan_01'])){
               #DATA RELASI 
               $form_jenis_01 = @$SQL_SL($_POST['form_jenis_01']);
               $form_nama_01 = @$SQL_SL($_POST['form_nama_01']);
               $form_tglinput_01 = @$SQL_SL($_POST['form_tglinput_01']);
                //--VARIABLE Skreening--//
                $form_as_igd_01 = @$SQL_SL($_POST['form_as_igd_01']);
                $form_as_spes_01 = @$SQL_SL($_POST['form_as_spes_01']);
                $form_as_kdsu_01 = @$SQL_SL($_POST['form_as_kdsu_01']);
                $form_lab_ctbt_01 = @$SQL_SL($_POST['form_lab_ctbt_01']);
                $form_lab_nlr_01 = @$SQL_SL($_POST['form_lab_nlr_01']);
                $form_lab_gds_01 = @$SQL_SL($_POST['form_lab_gds_01']);
                $form_lab_swab_01 = @$SQL_SL($_POST['form_lab_swab_01']);
                $form_rad_thorax_01 = @$SQL_SL($_POST['form_rad_thorax_01']);
                $form_as02_dpjp_01 = @$SQL_SL($_POST['form_as02_dpjp_01']);
                $form_as02_ndpjp_01 = @$SQL_SL($_POST['form_as02_ndpjp_01']);
                $form_as02_pj_01 = @$SQL_SL($_POST['form_as02_pj_01']);
                $form_as02_pj02_01 = @$SQL_SL($_POST['form_as02_pj02_01']);
                $form_as02_pj03_01 = @$SQL_SL($_POST['form_as02_pj03_01']);
                $form_as02_pj04_01 = @$SQL_SL($_POST['form_as02_pj04_01']);
                $form_as02_pj05_01 = @$SQL_SL($_POST['form_as02_pj05_01']);
                $form_as02_gizi_01 = @$SQL_SL($_POST['form_as02_gizi_01']);
                $form_as02_resep_01 = @$SQL_SL($_POST['form_as02_resep_01']);
                $form_as02_reresep_01 = @$SQL_SL($_POST['form_as02_reresep_01']);
                $form_as02_reresep02_01 = @$SQL_SL($_POST['form_as02_reresep02_01']);
                $form_as02_reresep03_01 = @$SQL_SL($_POST['form_as02_reresep03_01']);
                $form_as02_reresep04_01 = @$SQL_SL($_POST['form_as02_reresep04_01']);
                $form_dg_medis_01 = @$SQL_SL($_POST['form_dg_medis_01']);
                $form_dg_kpr_01 = @$SQL_SL($_POST['form_dg_kpr_01']);
                $form_dg_kpr002_01 = @$SQL_SL($_POST['form_dg_kpr002_01']);
                $form_dg_kpr003_01 = @$SQL_SL($_POST['form_dg_kpr003_01']);
                $form_dg_kpr004_01 = @$SQL_SL($_POST['form_dg_kpr004_01']);
                $form_dg_kpr02_01 = @$SQL_SL($_POST['form_dg_kpr02_01']);
                $form_dg_kpr0202_01 = @$SQL_SL($_POST['form_dg_kpr0202_01']);
                $form_dg_kpr0203_01 = @$SQL_SL($_POST['form_dg_kpr0203_01']);
                $form_dg_kpr0204_01 = @$SQL_SL($_POST['form_dg_kpr0204_01']);
                $form_dg_gizi_01 = @$SQL_SL($_POST['form_dg_gizi_01']);
                $form_dp_aktivitas_01 = @$SQL_SL($_POST['form_dp_aktivitas_01']);
                $form_dp_terapi_01 = @$SQL_SL($_POST['form_dp_terapi_01']);
                $form_dp_gejala_01 = @$SQL_SL($_POST['form_dp_gejala_01']);
                $form_dp_diet_01 = @$SQL_SL($_POST['form_dp_diet_01']);
                $form_et_diag_01 = @$SQL_SL($_POST['form_et_diag_01']);
                $form_et_terapi_01 = @$SQL_SL($_POST['form_et_terapi_01']);
                $form_et_ic_01 = @$SQL_SL($_POST['form_et_ic_01']);
                $form_et_diet_01 = @$SQL_SL($_POST['form_et_diet_01']);
                $form_et_preop_01 = @$SQL_SL($_POST['form_et_preop_01']);
                $form_et_diet02_01 = @$SQL_SL($_POST['form_et_diet02_01']);
                $form_et_infeksi_01 = @$SQL_SL($_POST['form_et_infeksi_01']);
                $form_et_obat_01 = @$SQL_SL($_POST['form_et_obat_01']);
                $form_et_psnobat_01 = @$SQL_SL($_POST['form_et_psnobat_01']);
                $form_et_gunaobat_01 = @$SQL_SL($_POST['form_et_gunaobat_01']);
                $form_fet_let_01 = @$SQL_SL($_POST['form_fet_let_01']);
                $form_fet_let02_01 = @$SQL_SL($_POST['form_fet_let02_01']);
                $form_fet_let03_01 = @$SQL_SL($_POST['form_fet_let03_01']);
                $form_fet_let04_01 = @$SQL_SL($_POST['form_fet_let04_01']);
                $form_trp_cef_01 = @$SQL_SL($_POST['form_trp_cef_01']);
                $form_trp_an_01 = @$SQL_SL($_POST['form_trp_an_01']);
                $form_trp_keto_01 = @$SQL_SL($_POST['form_trp_keto_01']);
                $form_trp_keto02_01 = @$SQL_SL($_POST['form_trp_keto02_01']);
                $form_trp_keto03_01 = @$SQL_SL($_POST['form_trp_keto03_01']);
                $form_trp_keto04_01 = @$SQL_SL($_POST['form_trp_keto04_01']);
                $form_trp_am_01 = @$SQL_SL($_POST['form_trp_am_01']);
                $form_trp_rt_01 = @$SQL_SL($_POST['form_trp_rt_01']);
                $form_trp_rt02_01 = @$SQL_SL($_POST['form_trp_rt02_01']);
                $form_trp_rt03_01 = @$SQL_SL($_POST['form_trp_rt03_01']);
                $form_trp_rt04_01 = @$SQL_SL($_POST['form_trp_rt04_01']);
                $form_trp_rt05_01 = @$SQL_SL($_POST['form_trp_rt05_01']);
                $form_trp_rl_01 = @$SQL_SL($_POST['form_trp_rl_01']);
                $form_trp_rl02_01 = @$SQL_SL($_POST['form_trp_rl02_01']);
                $form_trp_rl03_01 = @$SQL_SL($_POST['form_trp_rl03_01']);
                $form_trp_rl04_01 = @$SQL_SL($_POST['form_trp_rl04_01']);
                $form_trp_met_01 = @$SQL_SL($_POST['form_trp_met_01']);
                $form_trp_mett_01 = @$SQL_SL($_POST['form_trp_mett_01']);
                $form_trp_mett02_01 = @$SQL_SL($_POST['form_trp_mett02_01']);
                $form_trp_mett03_01 = @$SQL_SL($_POST['form_trp_mett03_01']);
                $form_trp_mett04_01 = @$SQL_SL($_POST['form_trp_mett04_01']);
                $form_trp_mett05_01 = @$SQL_SL($_POST['form_trp_mett05_01']);
                $form_trp_ceff_01 = @$SQL_SL($_POST['form_trp_ceff_01']);
                $form_trp_ceff02_01 = @$SQL_SL($_POST['form_trp_ceff02_01']);
                $form_trp_ceff03_01 = @$SQL_SL($_POST['form_trp_ceff03_01']);
                $form_trp_ceff04_01 = @$SQL_SL($_POST['form_trp_ceff04_01']);
                $form_trp_ceff05_01 = @$SQL_SL($_POST['form_trp_ceff05_01']);
                $form_trp_ran_01 = @$SQL_SL($_POST['form_trp_ran_01']);
                $form_trp_para_01 = @$SQL_SL($_POST['form_trp_para_01']);
                $form_trp_pk_01 = @$SQL_SL($_POST['form_trp_pk_01']);
                $form_trp_fen_01 = @$SQL_SL($_POST['form_trp_fen_01']);
                $form_trp_pro_01 = @$SQL_SL($_POST['form_trp_pro_01']);
                $form_trp_atr_01 = @$SQL_SL($_POST['form_trp_atr_01']);
                $form_trp_iso_01 = @$SQL_SL($_POST['form_trp_iso_01']);
                $form_trp_sef_01 = @$SQL_SL($_POST['form_trp_sef_01']);
                $form_trp_n2o_01 = @$SQL_SL($_POST['form_trp_n2o_01']);
                $form_int_nic14_01 = @$SQL_SL($_POST['form_int_nic14_01']);
                $form_int_nic1402_01 = @$SQL_SL($_POST['form_int_nic1402_01']);
                $form_int_nic1403_01 = @$SQL_SL($_POST['form_int_nic1403_01']);
                $form_int_nic1404_01 = @$SQL_SL($_POST['form_int_nic1404_01']);
                $form_int_nic65_01 = @$SQL_SL($_POST['form_int_nic65_01']);
                $form_int_nic6502_01 = @$SQL_SL($_POST['form_int_nic6502_01']);
                $form_int_nic6503_01 = @$SQL_SL($_POST['form_int_nic6503_01']);
                $form_int_nic6504_01 = @$SQL_SL($_POST['form_int_nic6504_01']);
                $form_int_keto_01 = @$SQL_SL($_POST['form_int_keto_01']);
                $form_int_nic231_01 = @$SQL_SL($_POST['form_int_nic231_01']);
                $form_int_nic23102_01 = @$SQL_SL($_POST['form_int_nic23102_01']);
                $form_int_nic23103_01 = @$SQL_SL($_POST['form_int_nic23103_01']);
                $form_int_nic23104_01 = @$SQL_SL($_POST['form_int_nic23104_01']);
                $form_int_nic230_01 = @$SQL_SL($_POST['form_int_nic230_01']);
                $form_int_nic23002_01 = @$SQL_SL($_POST['form_int_nic23002_01']);
                $form_int_nic23003_01 = @$SQL_SL($_POST['form_int_nic23003_01']);
                $form_int_nic23004_01 = @$SQL_SL($_POST['form_int_nic23004_01']);
                $form_int_tetp_01 = @$SQL_SL($_POST['form_int_tetp_01']);
                $form_int_tetp02_01 = @$SQL_SL($_POST['form_int_tetp02_01']);
                $form_int_tetp03_01 = @$SQL_SL($_POST['form_int_tetp03_01']);
                $form_int_tetp04_01 = @$SQL_SL($_POST['form_int_tetp04_01']);
                $form_int_obatmayor_01 = @$SQL_SL($_POST['form_int_obatmayor_01']);
                $form_int_obatmayor02_01 = @$SQL_SL($_POST['form_int_obatmayor02_01']);
                $form_int_obatmayor03_01 = @$SQL_SL($_POST['form_int_obatmayor03_01']);
                $form_int_obatmayor04_01 = @$SQL_SL($_POST['form_int_obatmayor04_01']);
                $form_mon_rev_01 = @$SQL_SL($_POST['form_mon_rev_01']);
                $form_mon_rev02_01 = @$SQL_SL($_POST['form_mon_rev02_01']);
                $form_mon_rev03_01 = @$SQL_SL($_POST['form_mon_rev03_01']);
                $form_mon_rev04_01 = @$SQL_SL($_POST['form_mon_rev04_01']);
                $form_mon_skala_01 = @$SQL_SL($_POST['form_mon_skala_01']);
                $form_mon_skala02_01 = @$SQL_SL($_POST['form_mon_skala02_01']);
                $form_mon_skala03_01 = @$SQL_SL($_POST['form_mon_skala03_01']);
                $form_mon_skala04_01 = @$SQL_SL($_POST['form_mon_skala04_01']);
                $form_mon_imp_01 = @$SQL_SL($_POST['form_mon_imp_01']);
                $form_mon_imp02_01 = @$SQL_SL($_POST['form_mon_imp02_01']);
                $form_mon_imp03_01 = @$SQL_SL($_POST['form_mon_imp03_01']);
                $form_mon_imp04_01 = @$SQL_SL($_POST['form_mon_imp04_01']);
                $form_mon_tanda_01 = @$SQL_SL($_POST['form_mon_tanda_01']);
                $form_mon_tanda02_01 = @$SQL_SL($_POST['form_mon_tanda02_01']);
                $form_mon_tanda03_01 = @$SQL_SL($_POST['form_mon_tanda03_01']);
                $form_mon_tanda04_01 = @$SQL_SL($_POST['form_mon_tanda04_01']);
                $form_mon_pro_01 = @$SQL_SL($_POST['form_mon_pro_01']);
                $form_mon_pro02_01 = @$SQL_SL($_POST['form_mon_pro02_01']);
                $form_mon_pro03_01 = @$SQL_SL($_POST['form_mon_pro03_01']);
                $form_mon_pro04_01 = @$SQL_SL($_POST['form_mon_pro04_01']);
                $form_mon_verbal_01 = @$SQL_SL($_POST['form_mon_verbal_01']);
                $form_mon_verbal02_01 = @$SQL_SL($_POST['form_mon_verbal02_01']);
                $form_mon_verbal03_01 = @$SQL_SL($_POST['form_mon_verbal03_01']);
                $form_mon_verbal04_01 = @$SQL_SL($_POST['form_mon_verbal04_01']);
                $form_mon_terapi_01 = @$SQL_SL($_POST['form_mon_terapi_01']);
                $form_mon_terapi02_01 = @$SQL_SL($_POST['form_mon_terapi02_01']);
                $form_mon_terapi03_01 = @$SQL_SL($_POST['form_mon_terapi03_01']);
                $form_mon_terapi04_01 = @$SQL_SL($_POST['form_mon_terapi04_01']);
                $form_mon_cairan_01 = @$SQL_SL($_POST['form_mon_cairan_01']);
                $form_mon_cairan02_01 = @$SQL_SL($_POST['form_mon_cairan02_01']);
                $form_mon_cairan03_01 = @$SQL_SL($_POST['form_mon_cairan03_01']);
                $form_mon_cairan04_01 = @$SQL_SL($_POST['form_mon_cairan04_01']);
                $form_mon_infeksi_01 = @$SQL_SL($_POST['form_mon_infeksi_01']);
                $form_mon_infeksi02_01 = @$SQL_SL($_POST['form_mon_infeksi02_01']);
                $form_mon_infeksi03_01 = @$SQL_SL($_POST['form_mon_infeksi03_01']);
                $form_mon_infeksi04_01 = @$SQL_SL($_POST['form_mon_infeksi04_01']);
                $form_mon_asupan_01 = @$SQL_SL($_POST['form_mon_asupan_01']);
                $form_mon_ant_01 = @$SQL_SL($_POST['form_mon_ant_01']);
                $form_mon_bio_01 = @$SQL_SL($_POST['form_mon_bio_01']);
                $form_mon_fisik_01 = @$SQL_SL($_POST['form_mon_fisik_01']);
                $form_mon_interaksi_01 = @$SQL_SL($_POST['form_mon_interaksi_01']);
                $form_mon_efek_01 = @$SQL_SL($_POST['form_mon_efek_01']);
                $form_mon_td_01 = @$SQL_SL($_POST['form_mon_td_01']);
                $form_mob_mandiri_01 = @$SQL_SL($_POST['form_mob_mandiri_01']);
                $form_out_nyeri_01 = @$SQL_SL($_POST['form_out_nyeri_01']);
                $form_out_op_01 = @$SQL_SL($_POST['form_out_op_01']);
                $form_out_noc16_01 = @$SQL_SL($_POST['form_out_noc16_01']);
                $form_out_noc07_01 = @$SQL_SL($_POST['form_out_noc07_01']);
                $form_out_asupan_01 = @$SQL_SL($_POST['form_out_asupan_01']);
                $form_out_gizi_01 = @$SQL_SL($_POST['form_out_gizi_01']);
                $form_out_indikasi_01 = @$SQL_SL($_POST['form_out_indikasi_01']);
                $form_out_rasional_01 = @$SQL_SL($_POST['form_out_rasional_01']);
                $form_kp_pulang_01 = @$SQL_SL($_POST['form_kp_pulang_01']);
                $form_rp_resume_01 = @$SQL_SL($_POST['form_rp_resume_01']);
                $form_rp_kondisi_01 = @$SQL_SL($_POST['form_rp_kondisi_01']);
                $form_rp_pengantar_01 = @$SQL_SL($_POST['form_rp_pengantar_01']);
                $form_bdn_berat_01 = @$SQL_SL($_POST['form_bdn_berat_01']);
                $form_bdn_tinggi_01 = @$SQL_SL($_POST['form_bdn_tinggi_01']);

                 //--Proccessing--//
                    $cpf_save_apn_01 = $CL_Q("$IN tb_cpf_form_01 (idmain_cpf_form_01,InapNoAdmisi,PasienNomorRM,form_kode_01,form_jenis_01,form_nama_01,form_as_igd_01,form_as_spes_01,form_as_kdsu_01,form_lab_ctbt_01,form_lab_nlr_01,form_lab_gds_01,form_lab_swab_01,form_rad_thorax_01,form_as02_dpjp_01,form_as02_ndpjp_01,form_as02_pj_01,form_as02_pj02_01,form_as02_pj03_01,form_as02_pj04_01,form_as02_pj05_01,form_as02_gizi_01,form_as02_resep_01,form_as02_reresep_01,form_as02_reresep02_01,form_as02_reresep03_01,form_as02_reresep04_01,form_dg_medis_01,form_dg_kpr_01,form_dg_kpr002_01,form_dg_kpr003_01,form_dg_kpr004_01,form_dg_kpr02_01,form_dg_kpr0202_01,form_dg_kpr0203_01,form_dg_kpr0204_01,form_dg_gizi_01,form_dp_aktivitas_01,form_dp_terapi_01,form_dp_gejala_01,form_dp_diet_01,form_et_diag_01,form_et_terapi_01,form_et_ic_01,form_et_diet_01,form_et_preop_01,form_et_diet02_01,form_et_infeksi_01,form_et_obat_01,form_et_psnobat_01,form_et_gunaobat_01,form_fet_let_01,form_fet_let02_01,form_fet_let03_01,form_fet_let04_01,form_trp_cef_01,form_trp_ceff_01,form_trp_ceff02_01,form_trp_ceff03_01,form_trp_ceff04_01,form_trp_ceff05_01,form_trp_an_01,form_trp_keto_01,form_trp_keto02_01,form_trp_keto03_01,form_trp_keto04_01,form_trp_am_01,form_trp_rt_01,form_trp_rt02_01,form_trp_rt03_01,form_trp_rt04_01,form_trp_rt05_01,form_trp_rl_01,form_trp_rl02_01,form_trp_rl03_01,form_trp_rl04_01,form_trp_met_01,form_trp_mett_01,form_trp_mett02_01,form_trp_mett03_01,form_trp_mett04_01,form_trp_mett05_01,form_trp_ran_01,form_trp_para_01,form_trp_pk_01,form_trp_fen_01,form_trp_pro_01,form_trp_atr_01,form_trp_iso_01,form_trp_sef_01,form_trp_n2o_01,form_int_nic14_01,form_int_nic1402_01,form_int_nic1403_01,form_int_nic1404_01,form_int_nic65_01,form_int_nic6502_01,form_int_nic6503_01,form_int_nic6504_01,form_int_nic231_01,form_int_nic23102_01,form_int_nic23103_01,form_int_nic23104_01,form_int_nic230_01,form_int_nic23002_01,form_int_nic23003_01,form_int_nic23004_01,form_int_tetp_01,form_int_tetp02_01,form_int_tetp03_01,form_int_tetp04_01,form_int_obatmayor_01,form_int_obatmayor02_01,form_int_obatmayor03_01,form_int_obatmayor04_01,form_mon_rev_01,form_mon_rev02_01,form_mon_rev03_01,form_mon_rev04_01,form_mon_skala_01,form_mon_skala02_01,form_mon_skala03_01,form_mon_skala04_01,form_mon_imp_01,form_mon_imp02_01,form_mon_imp03_01,form_mon_imp04_01,form_mon_tanda_01,form_mon_tanda02_01,form_mon_tanda03_01,form_mon_tanda04_01,form_mon_pro_01,form_mon_pro02_01,form_mon_pro03_01,form_mon_pro04_01,form_mon_verbal_01,form_mon_verbal02_01,form_mon_verbal03_01,form_mon_verbal04_01,form_mon_terapi_01,form_mon_terapi02_01,form_mon_terapi03_01,form_mon_terapi04_01,form_mon_cairan_01,form_mon_cairan02_01,form_mon_cairan03_01,form_mon_cairan04_01,form_mon_infeksi_01,form_mon_infeksi02_01,form_mon_infeksi03_01,form_mon_infeksi04_01,form_mon_asupan_01,form_mon_ant_01,form_mon_bio_01,form_mon_fisik_01,form_mon_interaksi_01,form_mon_efek_01,form_mon_td_01,form_mob_mandiri_01,form_out_nyeri_01,form_out_op_01,form_out_noc16_01,form_out_noc07_01,form_out_asupan_01,form_out_gizi_01,form_out_indikasi_01,form_out_rasional_01,form_kp_pulang_01,form_rp_resume_01,form_rp_kondisi_01,form_rp_pengantar_01,form_bdn_berat_01,form_bdn_tinggi_01,form_tglinput_01,form_uploader)VALUES('$IDMAIN','$IDADM01','$IDRM01','$cpf_cq_vform01_sw','$form_jenis_01','$form_nama_01','$form_as_igd_01','$form_as_spes_01','$form_as_kdsu_01','$form_lab_ctbt_01','$form_lab_nlr_01','$form_lab_gds_01','$form_lab_swab_01','$form_rad_thorax_01','$form_as02_dpjp_01','$form_as02_ndpjp_01','$form_as02_pj_01','$form_as02_pj02_01','$form_as02_pj03_01','$form_as02_pj04_01','$form_as02_pj05_01','$form_as02_gizi_01','$form_as02_resep_01','$form_as02_reresep_01','$form_as02_reresep02_01','$form_as02_reresep03_01','$form_as02_reresep04_01','$form_dg_medis_01','$form_dg_kpr_01','$form_dg_kpr002_01','$form_dg_kpr003_01','$form_dg_kpr004_01','$form_dg_kpr02_01','$form_dg_kpr0202_01','$form_dg_kpr0203_01','$form_dg_kpr0204_01','$form_dg_gizi_01','$form_dp_aktivitas_01','$form_dp_terapi_01','$form_dp_gejala_01','$form_dp_diet_01','$form_et_diag_01','$form_et_terapi_01','$form_et_ic_01','$form_et_diet_01','$form_et_preop_01','$form_et_diet02_01','$form_et_infeksi_01','$form_et_obat_01','$form_et_psnobat_01','$form_et_gunaobat_01','$form_fet_let_01','$form_fet_let02_01','$form_fet_let03_01','$form_fet_let04_01','$form_trp_cef_01','$form_trp_ceff_01','$form_trp_ceff02_01','$form_trp_ceff03_01','$form_trp_ceff04_01','$form_trp_ceff05_01','$form_trp_an_01','$form_trp_keto_01','$form_trp_keto02_01','$form_trp_keto03_01','$form_trp_keto04_01','$form_trp_am_01','$form_trp_rt_01','$form_trp_rt02_01','$form_trp_rt03_01','$form_trp_rt04_01','$form_trp_rt05_01','$form_trp_rl_01','$form_trp_rl02_01','$form_trp_rl03_01','$form_trp_rl04_01','$form_trp_met_01','$form_trp_mett_01','$form_trp_mett02_01','$form_trp_mett03_01','$form_trp_mett04_01','$form_trp_mett05_01','$form_trp_ran_01','$form_trp_para_01','$form_trp_pk_01','$form_trp_fen_01','$form_trp_pro_01','$form_trp_atr_01','$form_trp_iso_01','$form_trp_sef_01','$form_trp_n2o_01','$form_int_nic14_01','$form_int_nic1402_01','$form_int_nic1403_01','$form_int_nic1404_01','$form_int_nic65_01','$form_int_nic6502_01','$form_int_nic6503_01','$form_int_nic6504_01','$form_int_nic231_01','$form_int_nic23102_01','$form_int_nic23103_01','$form_int_nic23104_01','$form_int_nic230_01','$form_int_nic23002_01','$form_int_nic23003_01','$form_int_nic23004_01','$form_int_tetp_01','$form_int_tetp02_01','$form_int_tetp03_01','$form_int_tetp04_01','$form_int_obatmayor_01','$form_int_obatmayor02_01','$form_int_obatmayor03_01','$form_int_obatmayor04_01','$form_mon_rev_01','$form_mon_rev02_01','$form_mon_rev03_01','$form_mon_rev04_01','$form_mon_skala_01','$form_mon_skala02_01','$form_mon_skala03_01','$form_mon_skala04_01','$form_mon_imp_01','$form_mon_imp02_01','$form_mon_imp03_01','$form_mon_imp04_01','$form_mon_tanda_01','$form_mon_tanda02_01','$form_mon_tanda03_01','$form_mon_tanda04_01','$form_mon_pro_01','$form_mon_pro02_01','$form_mon_pro03_01','$form_mon_pro04_01','$form_mon_verbal_01','$form_mon_verbal02_01','$form_mon_verbal03_01','$form_mon_verbal04_01','$form_mon_terapi_01','$form_mon_terapi02_01','$form_mon_terapi03_01','$form_mon_terapi04_01','$form_mon_cairan_01','$form_mon_cairan02_01','$form_mon_cairan03_01','$form_mon_cairan04_01','$form_mon_infeksi_01','$form_mon_infeksi02_01','$form_mon_infeksi03_01','$form_mon_infeksi04_01','$form_mon_asupan_01','$form_mon_ant_01','$form_mon_bio_01','$form_mon_fisik_01','$form_mon_interaksi_01','$form_mon_efek_01','$form_mon_td_01','$form_mob_mandiri_01','$form_out_nyeri_01','$form_out_op_01','$form_out_noc16_01','$form_out_noc07_01','$form_out_asupan_01','$form_out_gizi_01','$form_out_indikasi_01','$form_out_rasional_01','$form_kp_pulang_01','$form_rp_resume_01','$form_rp_kondisi_01','$form_rp_pengantar_01','$form_bdn_berat_01','$form_bdn_tinggi_01','$form_tglinput_01 $TIME_HTML5','$vus01_sww[idmain]')");

         if($cpf_save_apn_01){ ?>
             <meta http-equiv="refresh" content="0; url=<?php echo"?PG_SA=CPF_VIEW_01_ALL"; ?>">       
                
   <?PHP }else{
        include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
    }} 
    
          #LIB VARIABLE
          $form02_tglinput_01 = @$SQL_SL($_POST['form02_tglinput_01']);
          $form02_as_igd_01 = @$SQL_SL($_POST['form02_as_igd_01']);
          $form02_as_kep_01 = @$SQL_SL($_POST['form02_as_kep_01']);
          $form02_pn_ekg_01 = @$SQL_SL($_POST['form02_pn_ekg_01']);
          $form02_pn_hb_01 = @$SQL_SL($_POST['form02_pn_hb_01']);
          $form02_pn_gds_01 = @$SQL_SL($_POST['form02_pn_gds_01']);
          $form02_pn_ur_01 = @$SQL_SL($_POST['form02_pn_ur_01']);
          $form02_pn_cr_01 = @$SQL_SL($_POST['form02_pn_cr_01']);
          $form02_pn_na_01 = @$SQL_SL($_POST['form02_pn_na_01']);
          $form02_pn_nk_01 = @$SQL_SL($_POST['form02_pn_nk_01']);
          $form02_pn_ch_01 = @$SQL_SL($_POST['form02_pn_ch_01']);
          $form02_pn_trg_01 = @$SQL_SL($_POST['form02_pn_trg_01']);
          $form02_pn_dr_01 = @$SQL_SL($_POST['form02_pn_dr_01']);
          $form02_pn_serhiv_01 = @$SQL_SL($_POST['form02_pn_serhiv_01']);
          $form02_pn_cd4_01 = @$SQL_SL($_POST['form02_pn_cd4_01']);
          $form02_pn_uc_01 = @$SQL_SL($_POST['form02_pn_uc_01']);
          $form02_pn_tcm_01 = @$SQL_SL($_POST['form02_pn_tcm_01']);
          $form02_pn_hbs_01 = @$SQL_SL($_POST['form02_pn_hbs_01']);
          $form02_rad_trx_01 = @$SQL_SL($_POST['form02_rad_trx_01']);
          $form02_rad_usg_01 = @$SQL_SL($_POST['form02_rad_usg_01']);
          $form02_al_dpjp_01 = @$SQL_SL($_POST['form02_al_dpjp_01']);
          $form02_al_ndpjp_01 = @$SQL_SL($_POST['form02_al_ndpjp_01']);
          $form02_al_pj_01 = @$SQL_SL($_POST['form02_al_pj_01']);
          $form02_al_gizi_01 = @$SQL_SL($_POST['form02_al_gizi_01']);
          $form02_al_resep_01 = @$SQL_SL($_POST['form02_al_resep_01']);
          $form02_al_reresep_01 = @$SQL_SL($_POST['form02_al_reresep_01']);
          $form02_trp_inj_01 = @$SQL_SL($_POST['form02_trp_inj_01']);
          $form02_trp_rl_01 = @$SQL_SL($_POST['form02_trp_rl_01']);
          $form02_trp_gb_01 = @$SQL_SL($_POST['form02_trp_gb_01']);
          $form02_trp_met_01 = @$SQL_SL($_POST['form02_trp_met_01']);
          $form02_trp_gli_01 = @$SQL_SL($_POST['form02_trp_gli_01']);
          $form02_lr_01 = @$SQL_SL($_POST['form02_lr_01']);
          $form02_trp_str_01 = @$SQL_SL($_POST['form02_trp_str_01']);
          $form02_trp_inh_01 = @$SQL_SL($_POST['form02_trp_inh_01']);
          $form02_trp_rf_01 = @$SQL_SL($_POST['form02_trp_rf_01']);
          $form02_trp_prz_01 = @$SQL_SL($_POST['form02_trp_prz_01']);
          $form02_trp_eth_01 = @$SQL_SL($_POST['form02_trp_eth_01']);
          $form02_jenis_01 = @$SQL_SL($_POST['form02_jenis_01']);
          $form02_pn_lkp_01 = @$SQL_SL($_POST['form02_pn_lkp_01']);
          $form02_trp_cpt_01 = @$SQL_SL($_POST['form02_trp_cpt_01']);
          $form02_trp_val_01 = @$SQL_SL($_POST['form02_trp_val_01']);
          $form02_trp_ram_01 = @$SQL_SL($_POST['form02_trp_ram_01']);
          $form02_trp_am_01 = @$SQL_SL($_POST['form02_trp_am_01']);
          $form02_trp_dil_01 = @$SQL_SL($_POST['form02_trp_dil_01']);
          $form02_trp_hct_01 = @$SQL_SL($_POST['form02_trp_hct_01']);
          $form02_trp_bis_01 = @$SQL_SL($_POST['form02_trp_bis_01']);
          $form02_trp_ao_01 = @$SQL_SL($_POST['form02_trp_ao_01']);
          $form02_trp_tkd_01 = @$SQL_SL($_POST['form02_trp_tkd_01']);
          $form02_trp_at_01 = @$SQL_SL($_POST['form02_trp_at_01']);
          $form02_trp_vitk_01 = @$SQL_SL($_POST['form02_trp_vitk_01']);
          $form02_trp_prctm_01 = @$SQL_SL($_POST['form02_trp_prctm_01']);
          $form02_trp_arv_01 = @$SQL_SL($_POST['form02_trp_arv_01']);
          $form02_trp_cotri_01 = @$SQL_SL($_POST['form02_trp_cotri_01']);
      


     //--CPF_ENTRI_03_DM--//
     if(isset($_POST['cpf_dm_simpan_01'])){ 
         #PROCCESSING
         $cpf_save_dm_01 = $CL_Q("$IN tb_cpf_form02_01 (idmain_form02_01,InapNoAdmisi,PasienNomorRM,form02_as_igd_01,form02_as_kep_01,form02_kode_01,form02_pn_ekg_01,form02_pn_hb_01,form02_pn_gds_01,form02_pn_ur_01,form02_pn_cr_01,form02_pn_na_01,form02_rad_trx_01,form02_al_dpjp_01,form02_al_ndpjp_01,form02_al_pj_01,form02_al_gizi_01,form02_al_resep_01,form02_al_reresep_01,form02_trp_inj_01,form02_trp_rl_01,form02_trp_gb_01,form02_trp_met_01,form02_trp_gli_01,form02_lr_01,form02_tglinput_01,form02_trp_str_01,form02_trp_inh_01,form02_trp_rf_01,form02_trp_prz_01,form02_trp_eth_01,form02_jenis_01,form02_pn_lkp_01,form02_trp_cpt_01,form02_trp_val_01,form02_trp_ram_01,form02_trp_am_01,form02_trp_dil_01,form02_trp_hct_01,form02_trp_bis_01,form02_trp_ao_01,form02_pn_nk_01,form02_pn_ch_01,form02_pn_trg_01,form02_uploader,form02_pn_dr_01,form02_rad_usg_01,form02_trp_tkd_01,form02_trp_at_01,form02_trp_vitk_01,form02_trp_prctm_01,form02_pn_serhiv_01,form_pn_cd4_01,form02_pn_uc_01,form02_pn_tcm_01,form02_pn_hbs_01,form02_trp_arv_01,form02_trp_cotri_01)VALUES('$IDMAIN','$IDADM01','$IDRM01','$form02_as_igd_01','$form02_as_kep_01','$cpf_cq_vform02_sw','$form02_pn_ekg_01','$form02_pn_hb_01','$form02_pn_gds_01','$form02_pn_ur_01','$form02_pn_cr_01','$form02_pn_na_01','$form02_rad_trx_01','$form02_al_dpjp_01','$form02_al_ndpjp_01','$form02_al_pj_01','$form02_al_gizi_01','$form02_al_resep_01','$form02_al_reresep_01','$form02_trp_inj_01','$form02_trp_rl_01','$form02_trp_gb_01','$form02_trp_met_01','$form02_trp_gli_01','$form02_lr_01','$DATE_HTML5_SQL',' $form02_trp_str_01',' $form02_trp_inh_01',' $form02_trp_rf_01',' $form02_trp_prz_01',' $form02_trp_eth_01','$form02_jenis_01','$form02_pn_lkp_01','$form02_trp_cpt_01','$form02_trp_val_01','$form02_trp_ram_01','$form02_trp_am_01','$form02_trp_dil_01','$form02_trp_hct_01','$form02_trp_bis_01','$form02_trp_ao_01','$form02_pn_nk_01','$form02_pn_ch_01','$form02_pn_trg_01','$vus01_sww[idmain]','$form02_pn_dr_01','$form02_rad_usg_01','$form02_trp_tkd_01','$form02_trp_at_01','$form02_trp_vitk_01','$form02_trp_prctm_01','$form02_pn_serhiv_01','$form_pn_cd4_01','$form_pn_cd4_01','$form_pn_cd4_01','$form02_pn_hbs_01','$form02_trp_arv_01','$form02_trp_arv_01')");

         if($cpf_save_dm_01){ 
            echo"<meta http-equiv=refresh content=0; url=?PG_SA=CPF_ENTRI_03_DM&IDRM01=$IDRM&IDADM01=$IDADM01>";
   }else{
       include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
   }} 

     //--CPF_ENTRI_03_DM--// UPDATE
     if(isset($_POST['cpf_dm_up_01'])){ 
         #PROCCESSING
         $cpf_up_dm_01 = $CL_Q("$UP tb_cpf_form02_01 SET form02_as_igd_01='$form02_as_igd_01',form02_as_kep_01='$form02_as_kep_01',form02_pn_ekg_01='$form02_pn_ekg_01',form02_pn_hb_01='$form02_pn_hb_01',form02_pn_gds_01='$form02_pn_gds_01',form02_pn_ur_01='$form02_pn_ur_01',form02_pn_cr_01='$form02_pn_cr_01',form02_pn_na_01='$form02_pn_na_01',form02_rad_trx_01='$form02_rad_trx_01',form02_al_dpjp_01='$form02_al_dpjp_01',form02_al_ndpjp_01='$form02_al_ndpjp_01',form02_al_pj_01='$form02_al_pj_01',form02_al_gizi_01='$form02_al_gizi_01',form02_al_resep_01='$form02_al_resep_01',form02_al_reresep_01='$form02_al_reresep_01',form02_trp_inj_01='$form02_trp_inj_01',form02_trp_rl_01='$form02_trp_rl_01',form02_trp_gb_01='$form02_trp_gb_01',form02_trp_met_01='$form02_trp_met_01',form02_trp_gli_01='$form02_trp_gli_01',form02_lr_01='$form02_lr_01',form02_trp_str_01='$form02_trp_str_01',form02_trp_inh_01='$form02_trp_inh_01',form02_trp_rf_01='$form02_trp_rf_01',form02_trp_prz_01='$form02_trp_prz_01',form02_trp_eth_01='$form02_trp_eth_01',form02_jenis_01='$form02_jenis_01',form02_pn_lkp_01='$form02_pn_lkp_01',form02_trp_cpt_01='$form02_trp_cpt_01',form02_trp_val_01='$form02_trp_val_01',form02_trp_ram_01='$form02_trp_ram_01',form02_trp_am_01='$form02_trp_am_01',form02_trp_dil_01='$form02_trp_dil_01',form02_trp_hct_01='$form02_trp_hct_01',form02_trp_bis_01='$form02_trp_bis_01',form02_trp_ao_01='$form02_trp_ao_01',form02_pn_nk_01='$form02_pn_nk_01',form02_pn_ch_01='$form02_pn_ch_01',form02_pn_trg_01='$form02_pn_trg_01' , form02_pn_dr_01='$form02_pn_dr_01',form02_rad_usg_01='$form02_rad_usg_01',form02_trp_tkd_01='$form02_trp_tkd_01',form02_trp_at_01='$form02_trp_at_01',form02_trp_vitk_01='$form02_trp_vitk_01',form02_trp_prctm_01='$form02_trp_prctm_01',form02_pn_serhiv_01='$form02_pn_serhiv_01',form_pn_cd4_01='$form_pn_cd4_01',form02_pn_uc_01='$form02_pn_uc_01',form02_pn_tcm_01='$form02_pn_tcm_01',form02_pn_hbs_01='$form02_pn_hbs_01',form02_trp_arv_01='$form02_trp_arv_01',form02_trp_cotri_01='$form02_trp_cotri_01',form02_tglinput_01='$form02_tglinput_01' WHERE idmain_form02_01='$IDCFORM02'");

         if($cpf_up_dm_01){ 
            echo"<meta http-equiv=refresh content=0; url=?PG_SA=CPF_ENTRI_03_DM&IDRM01=$IDRM01&IDADM01=$IDADM01&UPDM01=UPDM01&IDCFORM02=$IDCFORM01>";
   }else{
       include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
   }} 
   
   
	################E-CPF NEW CONCEPT##########
	

   ?>
<!-- -->
