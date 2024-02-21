<?PHP 
if($cpf_vcform01_sww['form_jenis_01']=="HMD"){
    #--------HMD--------#
    #ASESMEN AWAL
    $cpf_as_vform01_sw = $cpf_vcform01_sww['form_as_kdsu_01'] +  $cpf_vcform01_sww['form_as_spes_01'];
    $cpf_as02_vform01_sw = ($cpf_as_vform01_sw  / 2) * 100;
    #LABORAT
    $cpf_lab_vform01_sw = $cpf_vcform01_sww['form_lab_ctbt_01'] + $cpf_vcform01_sww['form_lab_nlr_01'] + $cpf_vcform01_sww['form_lab_gds_01'] + $cpf_vcform01_sww['form_lab_swab_01'];
    $cpf_lab02_vform01_sw = ($cpf_lab_vform01_sw  / 4) * 100;
    #RADIOLOGI
    $cpf_rad_vform01_sw = $cpf_vcform01_sww['form_rad_thorax_01'];
    $cpf_rad02_vform01_sw = ($cpf_rad_vform01_sw / 1) * 100;
    #FARMASI
    $cpf_far_vform01_sw = $cpf_vcform01_sww['form_as02_resep_01'] + $cpf_vcform01_sww['form_as02_reresep02_01'] + $cpf_vcform01_sww['form_as02_reresep03_01'] + $cpf_vcform01_sww['form_as02_reresep04_01'] + $cpf_vcform01_sww['form_as02_reresep05_01'] ;
    $cpf_far02_vform01_sw = ($cpf_far_vform01_sw / 5) * 100;
    #ASESMEN LANJUTAN
    $cpf_al_vform01_sw = $cpf_vcform01_sww['form_as02_dpjp_01'] + $cpf_vcform01_sww['form_as02_ndpjp_01'];
    $cpf_al02_vform01_sw = ($cpf_al_vform01_sw / 5) * 100;
    #DIAGNOSIS
    $cpf_dg_vform01_sw = $cpf_vcform01_sww['form_dg_kpr002_01'] + $cpf_vcform01_sww['form_dg_kpr0202_01'];
    $cpf_dg02_vform01_sw = ($cpf_dg_vform01_sw / 6) * 100;
    #DIS PLANING
    $cpf_dp_vform01_sw = $cpf_vcform01_sww['form_dp_aktivitas_01'] + $cpf_vcform01_sww['form_dp_terapi_01'] +  $cpf_vcform01_sww['form_dp_gejala_01'] + $cpf_vcform01_sww['form_dp_diet_01'];
    $cpf_dp02_vform01_sw = ($cpf_dp_vform01_sw / 4) * 100;
    #EDUKASI INTER
    $cpf_et_vform01_sw = $cpf_vcform01_sww['form_et_diag_01'] + $cpf_vcform01_sww['form_et_terapi_01'] + $cpf_vcform01_sww['form_et_ic_01'];
    $cpf_et02_vform01_sw = ($cpf_et_vform01_sw / 3) * 100;
    #EDUKASI KONSELING GIZI
    $cpf_etgz_vform01_sw = $cpf_vcform01_sww['form_et_diet_01'];
    $cpf_etgz02_vform01_sw = ($cpf_etgz_vform01_sw / 1) * 100;
    #EDUKASI KEPERAWATAN
    $cpf_etkp_vform01_sw = $cpf_vcform01_sww['form_et_preop_01'] + $cpf_vcform01_sww['form_et_diet02_01'] + $cpf_vcform01_sww['form_et_infeksi_01'];
    $cpf_etkp02_vform01_sw = ($cpf_etkp_vform01_sw / 3) * 100;
    #EDUKASI FARMASI
    $cpf_etfr_vform01_sw = $cpf_vcform01_sww['form_et_obat_01'] + $cpf_vcform01_sww['form_et_psnobat_01'] + $cpf_vcform01_sww['form_et_gunaobat_01'];
    $cpf_etfr02_vform01_sw = ($cpf_etfr_vform01_sw / 3) * 100;
    #EDUKASI LMBAR EDUKASi
    $cpf_fet_vform01_sw = $cpf_vcform01_sww['form_fet_let02_01'] + $cpf_vcform01_sww['form_fet_let03_01'] + $cpf_vcform01_sww['form_fet_let04_01'];
    $cpf_fet02_vform01_sw = ($cpf_fet_vform01_sw / 3) * 100;
    #TERAPI MEDIKANOSA
    $cpf_trp_vform01_sw = $cpf_vcform01_sww['form_trp_cef_01'] + $cpf_vcform01_sww['form_trp_ceff02_01'] + $cpf_vcform01_sww['form_trp_ceff03_01'] + $cpf_vcform01_sww['form_trp_ceff05_01'] + $cpf_vcform01_sww['form_trp_an_01'] + $cpf_vcform01_sww['form_trp_keto02_01'] +  $cpf_vcform01_sww['form_trp_am_01'] + $cpf_vcform01_sww['form_trp_rt02_01'] + $cpf_vcform01_sww['form_trp_rt03_01'] + $cpf_vcform01_sww['form_trp_rt04_01'] + $cpf_vcform01_sww['form_trp_rt05_01'] ;
    $cpf_trp02_vform01_sw = ($cpf_trp_vform01_sw / 17) * 100;
    #INFUS
    $cpf_trpin_vform01_sw = $cpf_vcform01_sww['form_trp_rl02_01'] + $cpf_vcform01_sww['form_trp_rl03_01'] + $cpf_vcform01_sww['form_trp_rl04_01'] + $cpf_vcform01_sww['form_trp_met_01'] + $cpf_vcform01_sww['form_trp_mett02_01'] + $cpf_vcform01_sww['form_trp_mett03_01'] + $cpf_vcform01_sww['form_trp_mett04_01'] + $cpf_vcform01_sww['form_trp_mett05_01'] + $cpf_vcform01_sww['form_trp_ran_01'] + $cpf_vcform01_sww['form_trp_para_01'] + $cpf_vcform01_sww['form_trp_pk_01']  ;
    $cpf_trpin02_vform01_sw = ($cpf_trpin_vform01_sw / 3) * 100;
    #DOKTER DPJP
    $cpf_dpjp_vform01_sw = $cpf_vcform01_sww['form_mon_rev02_01'] + $cpf_vcform01_sww['form_mon_rev03_01'] + $cpf_vcform01_sww['form_mon_rev04_01'];
    $cpf_dpjp02_vform01_sw = ($cpf_dpjp_vform01_sw / 3) * 100;
     #KEPERAWTAN
     $cpf_mon_vform01_sw = $cpf_vcform01_sww['form_mon_skala02_01'] + $cpf_vcform01_sww['form_mon_skala03_01'] + $cpf_vcform01_sww['form_mon_skala04_01'] + $cpf_vcform01_sww['form_mon_imp02_01'] + $cpf_vcform01_sww['form_mon_imp03_01'] + $cpf_vcform01_sww['form_mon_imp03_01'] + $cpf_vcform01_sww['form_mon_tanda02_01'] + $cpf_vcform01_sww['form_mon_tanda03_01'] + $cpf_vcform01_sww['form_mon_tanda04_01'] + $cpf_vcform01_sww['form_mon_pro02_01'] + $cpf_vcform01_sww['form_mon_pro03_01'] + $cpf_vcform01_sww['form_mon_pro04_01'] + $cpf_vcform01_sww['form_mon_verbal02_01'] + $cpf_vcform01_sww['form_mon_verbal03_01'] + $cpf_vcform01_sww['form_mon_verbal04_01'] + $cpf_vcform01_sww['form_mon_terapi03_01'] + $cpf_vcform01_sww['form_mon_terapi04_01']  + $cpf_vcform01_sww['form_mon_cairan02_01'] + $cpf_vcform01_sww['form_mon_cairan03_01'] + $cpf_vcform01_sww['form_mon_cairan04_01'] + $cpf_vcform01_sww['form_mon_infeksi02_01']  ;
     $cpf_mon02_vform01_sw = ($cpf_mon_vform01_sw / 21) * 100;
    #GIZI MONITORA
    $cpf_gz_vform01_sw = $cpf_vcform01_sww['form_mon_asupan_01'] + $cpf_vcform01_sww['form_mon_ant_01'] + $cpf_vcform01_sww['form_mon_bio_01'];
    $cpf_gz02_vform01_sw = ($cpf_gz_vform01_sw / 3) * 100;
    #MOBI REHAB
    $cpf_mob_vform01_sw = $cpf_vcform01_sww['form_mob_mandiri_01'];
    $cpf_mob02_vform01_sw = ($cpf_mob_vform01_sw / 1) * 100;
    #HASIL MEDIS
    $cpf_hmed_vform01_sw = $cpf_vcform01_sww['form_out_nyeri_01'] + $cpf_vcform01_sww['form_out_op_01'] ;
    $cpf_hmed02_vform01_sw = ($cpf_mob_vform01_sw / 2) * 100;
    #TATA LAKSANA
    $cpf_int_vform01_sw = $cpf_vcform01_sww['form_int_nic1402_01'] + $cpf_vcform01_sww['form_int_nic1402_01'] + $cpf_vcform01_sww['form_int_nic1403_01'] + $cpf_vcform01_sww['form_int_nic1404_01'] + $cpf_vcform01_sww['form_int_nic6502_01'] + $cpf_vcform01_sww['form_int_nic6503_01'] + $cpf_vcform01_sww['form_int_nic6504_01'] + $cpf_vcform01_sww['form_int_nic23102_01'] + $cpf_vcform01_sww['form_int_nic23103_01'] + $cpf_vcform01_sww['form_int_nic6504_01'] + $cpf_vcform01_sww['form_int_nic23104_01'] + $cpf_vcform01_sww['form_int_nic23002_01'] + $cpf_vcform01_sww['form_int_nic23003_01'] + $cpf_vcform01_sww['form_int_nic23004_01'] + $cpf_vcform01_sww['form_int_nic23002_01'] ;
    $cpf_int02_vform01_sw = ($cpf_int_vform01_sw / 15) * 100;
    #INTERVENSI GIZI
    $cpf_intgz_vform01_sw = $cpf_vcform01_sww['form_int_tetp02_01'];
    $cpf_intgz02_vform01_sw = ($cpf_intgz_vform01_sw / 2) * 100;
    #Obat Anastesi
    $cpf_trpan_vform01_sw = $cpf_vcform01_sww['form_trp_fen_01'] + $cpf_vcform01_sww['form_trp_pro_01'] + $cpf_vcform01_sww['form_trp_atr_01'] + $cpf_vcform01_sww['form_trp_iso_01'] + $cpf_vcform01_sww['form_trp_sef_01'] + $cpf_vcform01_sww['form_trp_n2o_01'];
    $cpf_trpan02_vform01_sw = ($cpf_trpan_vform01_sw / 6) * 100;
    #Out Come MEDIS
    $cpf_otmd_vform01_sw = $cpf_vcform01_sww['form_out_nyeri_01'] + $cpf_vcform01_sww['form_out_op_01'] ;
    $cpf_otmd02_vform01_sw = ($cpf_otmd_vform01_sw / 2) * 100;
    #Out Come KEPERAWATAN
    $cpf_otkp_vform01_sw = $cpf_vcform01_sww['form_out_noc16_01'] + $cpf_vcform01_sww['form_out_noc07_01'] ;
    $cpf_otkp02_vform01_sw = ($cpf_otkp_vform01_sw / 2) * 100;
    #Out Come GIZI
    $cpf_otgz_vform01_sw = $cpf_vcform01_sww['form_out_gizi_01'] + $cpf_vcform01_sww['form_out_asupan_01'] ;
    $cpf_otgz02_vform01_sw = ($cpf_otgz_vform01_sw / 2) * 100;
    #Out Come Obat Rasional
    $cpf_otrs_vform01_sw = $cpf_vcform01_sww['form_out_indikasi_01'] + $cpf_vcform01_sww['form_out_rasional_01'] ;
    $cpf_otrs02_vform01_sw = ($cpf_otrs_vform01_sw / 2) * 100;
    #KRITERIA PULANG
    $cpf_kpl_vform01_sw = $cpf_vcform01_sww['form_kp_pulang_01'];
    $cpf_kpl02_vform01_sw = ($cpf_kpl_vform01_sw / 1) * 100;
    #Out Come Obat Rasional
    $cpf_rpl_vform01_sw = $cpf_vcform01_sww['form_rp_resume_01'] + $cpf_vcform01_sww['form_rp_kondisi_01'] + $cpf_vcform01_sww['form_rp_pengantar_01'] ;
    $cpf_rpl02_vform01_sw = ($cpf_rpl_vform01_sw / 3) * 100;

}elseif($cpf_vcform01_sww['form_jenis_01']=="APN"){
 #--------APN--------#
    #ASESMEN AWAL
    $cpf_as_vform01_sw = $cpf_vcform01_sww['form_as_kdsu_01'] +  $cpf_vcform01_sww['form_as_spes_01'];
    $cpf_as02_vform01_sw = ($cpf_as_vform01_sw  / 2) * 100;
    #LABORAT
    $cpf_lab_vform01_sw = $cpf_vcform01_sww['form_lab_ctbt_01'] + $cpf_vcform01_sww['form_lab_nlr_01'] + $cpf_vcform01_sww['form_lab_gds_01'] + $cpf_vcform01_sww['form_lab_swab_01'];
    $cpf_lab02_vform01_sw = ($cpf_lab_vform01_sw  / 4) * 100;
    #RADIOLOGI
    $cpf_rad_vform01_sw = $cpf_vcform01_sww['form_rad_thorax_01'];
    $cpf_rad02_vform01_sw = ($cpf_rad_vform01_sw / 1) * 100;
    #FARMASI
    $cpf_far_vform01_sw = $cpf_vcform01_sww['form_as02_resep_01'] + $cpf_vcform01_sww['form_as02_reresep02_01'] + $cpf_vcform01_sww['form_as02_reresep03_01'] + $cpf_vcform01_sww['form_as02_reresep04_01'] + $cpf_vcform01_sww['form_as02_reresep05_01'] ;
    $cpf_far02_vform01_sw = ($cpf_far_vform01_sw / 5) * 100;
    #ASESMEN LANJUTAN
    $cpf_al_vform01_sw = $cpf_vcform01_sww['form_as02_dpjp_01'] + $cpf_vcform01_sww['form_as02_ndpjp_01'];
    $cpf_al02_vform01_sw = ($cpf_al_vform01_sw / 5) * 100;
    #DIAGNOSIS
    $cpf_dg_vform01_sw = $cpf_vcform01_sww['form_dg_kpr002_01'] + $cpf_vcform01_sww['form_dg_kpr0202_01'];
    $cpf_dg02_vform01_sw = ($cpf_dg_vform01_sw / 6) * 100;
    #DIS PLANING
    $cpf_dp_vform01_sw = $cpf_vcform01_sww['form_dp_aktivitas_01'] + $cpf_vcform01_sww['form_dp_terapi_01'] +  $cpf_vcform01_sww['form_dp_gejala_01'] + $cpf_vcform01_sww['form_dp_diet_01'];
    $cpf_dp02_vform01_sw = ($cpf_dp_vform01_sw / 4) * 100;
    #EDUKASI INTER
    $cpf_et_vform01_sw = $cpf_vcform01_sww['form_et_diag_01'] + $cpf_vcform01_sww['form_et_terapi_01'] + $cpf_vcform01_sww['form_et_ic_01'];
    $cpf_et02_vform01_sw = ($cpf_et_vform01_sw / 3) * 100;
    #EDUKASI KONSELING GIZI
    $cpf_etgz_vform01_sw = $cpf_vcform01_sww['form_et_diet_01'];
    $cpf_etgz02_vform01_sw = ($cpf_etgz_vform01_sw / 1) * 100;
    #EDUKASI KEPERAWATAN
    $cpf_etkp_vform01_sw = $cpf_vcform01_sww['form_et_preop_01'] + $cpf_vcform01_sww['form_et_diet02_01'] + $cpf_vcform01_sww['form_et_infeksi_01'];
    $cpf_etkp02_vform01_sw = ($cpf_etkp_vform01_sw / 3) * 100;
    #EDUKASI FARMASI
    $cpf_etfr_vform01_sw = $cpf_vcform01_sww['form_et_obat_01'] + $cpf_vcform01_sww['form_et_psnobat_01'] + $cpf_vcform01_sww['form_et_gunaobat_01'];
    $cpf_etfr02_vform01_sw = ($cpf_etfr_vform01_sw / 3) * 100;
    #EDUKASI LMBAR EDUKASi
    $cpf_fet_vform01_sw = $cpf_vcform01_sww['form_fet_let02_01'] + $cpf_vcform01_sww['form_fet_let03_01'] + $cpf_vcform01_sww['form_fet_let04_01'];
    $cpf_fet02_vform01_sw = ($cpf_fet_vform01_sw / 3) * 100;
    #TERAPI MEDIKANOSA
    $cpf_trp_vform01_sw = $cpf_vcform01_sww['form_trp_cef_01'] + $cpf_vcform01_sww['form_trp_ceff02_01'] + $cpf_vcform01_sww['form_trp_ceff03_01'] + $cpf_vcform01_sww['form_trp_ceff05_01'] + $cpf_vcform01_sww['form_trp_an_01'] + $cpf_vcform01_sww['form_trp_keto02_01'] +  $cpf_vcform01_sww['form_trp_am_01'] + $cpf_vcform01_sww['form_trp_rt02_01'] + $cpf_vcform01_sww['form_trp_rt03_01'] + $cpf_vcform01_sww['form_trp_rt04_01'] + $cpf_vcform01_sww['form_trp_rt05_01'] ;
    $cpf_trp02_vform01_sw = ($cpf_trp_vform01_sw / 17) * 100;
    #INFUS
    $cpf_trpin_vform01_sw = $cpf_vcform01_sww['form_trp_rl02_01'] + $cpf_vcform01_sww['form_trp_rl03_01'] + $cpf_vcform01_sww['form_trp_rl04_01'] + $cpf_vcform01_sww['form_trp_met_01'] + $cpf_vcform01_sww['form_trp_mett02_01'] + $cpf_vcform01_sww['form_trp_mett03_01'] + $cpf_vcform01_sww['form_trp_mett04_01'] + $cpf_vcform01_sww['form_trp_mett05_01'] + $cpf_vcform01_sww['form_trp_ran_01'] + $cpf_vcform01_sww['form_trp_para_01'] + $cpf_vcform01_sww['form_trp_pk_01']  ;
    $cpf_trpin02_vform01_sw = ($cpf_trpin_vform01_sw / 3) * 100;
    #DOKTER DPJP
    $cpf_dpjp_vform01_sw = $cpf_vcform01_sww['form_mon_rev02_01'] + $cpf_vcform01_sww['form_mon_rev03_01'] + $cpf_vcform01_sww['form_mon_rev04_01'];
    $cpf_dpjp02_vform01_sw = ($cpf_dpjp_vform01_sw / 3) * 100;
     #KEPERAWTAN
     $cpf_mon_vform01_sw = $cpf_vcform01_sww['form_mon_skala02_01'] + $cpf_vcform01_sww['form_mon_skala03_01'] + $cpf_vcform01_sww['form_mon_skala04_01'] + $cpf_vcform01_sww['form_mon_imp02_01'] + $cpf_vcform01_sww['form_mon_imp03_01'] + $cpf_vcform01_sww['form_mon_imp03_01'] + $cpf_vcform01_sww['form_mon_tanda02_01'] + $cpf_vcform01_sww['form_mon_tanda03_01'] + $cpf_vcform01_sww['form_mon_tanda04_01'] + $cpf_vcform01_sww['form_mon_pro02_01'] + $cpf_vcform01_sww['form_mon_pro03_01'] + $cpf_vcform01_sww['form_mon_pro04_01'] + $cpf_vcform01_sww['form_mon_verbal02_01'] + $cpf_vcform01_sww['form_mon_verbal03_01'] + $cpf_vcform01_sww['form_mon_verbal04_01'] + $cpf_vcform01_sww['form_mon_terapi03_01'] + $cpf_vcform01_sww['form_mon_terapi04_01']  + $cpf_vcform01_sww['form_mon_cairan02_01'] + $cpf_vcform01_sww['form_mon_cairan03_01'] + $cpf_vcform01_sww['form_mon_cairan04_01'] + $cpf_vcform01_sww['form_mon_infeksi02_01']  ;
     $cpf_mon02_vform01_sw = ($cpf_mon_vform01_sw / 21) * 100;
    #GIZI MONITORA
    $cpf_gz_vform01_sw = $cpf_vcform01_sww['form_mon_asupan_01'] + $cpf_vcform01_sww['form_mon_ant_01'] + $cpf_vcform01_sww['form_mon_bio_01'];
    $cpf_gz02_vform01_sw = ($cpf_gz_vform01_sw / 3) * 100;
    #MOBI REHAB
    $cpf_mob_vform01_sw = $cpf_vcform01_sww['form_mob_mandiri_01'];
    $cpf_mob02_vform01_sw = ($cpf_mob_vform01_sw / 1) * 100;
    #HASIL MEDIS
    $cpf_hmed_vform01_sw = $cpf_vcform01_sww['form_out_nyeri_01'] + $cpf_vcform01_sww['form_out_op_01'] ;
    $cpf_hmed02_vform01_sw = ($cpf_mob_vform01_sw / 2) * 100;
    #TATA LAKSANA
    $cpf_int_vform01_sw = $cpf_vcform01_sww['form_int_nic1402_01'] + $cpf_vcform01_sww['form_int_nic1402_01'] + $cpf_vcform01_sww['form_int_nic1403_01'] + $cpf_vcform01_sww['form_int_nic1404_01'] + $cpf_vcform01_sww['form_int_nic6502_01'] + $cpf_vcform01_sww['form_int_nic6503_01'] + $cpf_vcform01_sww['form_int_nic6504_01'] + $cpf_vcform01_sww['form_int_nic23102_01'] + $cpf_vcform01_sww['form_int_nic23103_01'] + $cpf_vcform01_sww['form_int_nic6504_01'] + $cpf_vcform01_sww['form_int_nic23104_01'] + $cpf_vcform01_sww['form_int_nic23002_01'] + $cpf_vcform01_sww['form_int_nic23003_01'] + $cpf_vcform01_sww['form_int_nic23004_01'] + $cpf_vcform01_sww['form_int_nic23002_01'] ;
    $cpf_int02_vform01_sw = ($cpf_int_vform01_sw / 15) * 100;
    #INTERVENSI GIZI
    $cpf_intgz_vform01_sw = $cpf_vcform01_sww['form_int_tetp02_01'];
    $cpf_intgz02_vform01_sw = ($cpf_intgz_vform01_sw / 2) * 100;
    #Obat Anastesi
    $cpf_trpan_vform01_sw = $cpf_vcform01_sww['form_trp_fen_01'] + $cpf_vcform01_sww['form_trp_pro_01'] + $cpf_vcform01_sww['form_trp_atr_01'] + $cpf_vcform01_sww['form_trp_iso_01'] + $cpf_vcform01_sww['form_trp_sef_01'] + $cpf_vcform01_sww['form_trp_n2o_01'];
    $cpf_trpan02_vform01_sw = ($cpf_trpan_vform01_sw / 6) * 100;
    #Out Come MEDIS
    $cpf_otmd_vform01_sw = $cpf_vcform01_sww['form_out_nyeri_01'] + $cpf_vcform01_sww['form_out_op_01'] ;
    $cpf_otmd02_vform01_sw = ($cpf_otmd_vform01_sw / 2) * 100;
    #Out Come KEPERAWATAN
    $cpf_otkp_vform01_sw = $cpf_vcform01_sww['form_out_noc16_01'] + $cpf_vcform01_sww['form_out_noc07_01'] ;
    $cpf_otkp02_vform01_sw = ($cpf_otkp_vform01_sw / 2) * 100;
    #Out Come GIZI
    $cpf_otgz_vform01_sw = $cpf_vcform01_sww['form_out_gizi_01'] + $cpf_vcform01_sww['form_out_asupan_01'] ;
    $cpf_otgz02_vform01_sw = ($cpf_otgz_vform01_sw / 2) * 100;
    #Out Come Obat Rasional
    $cpf_otrs_vform01_sw = $cpf_vcform01_sww['form_out_indikasi_01'] + $cpf_vcform01_sww['form_out_rasional_01'] ;
    $cpf_otrs02_vform01_sw = ($cpf_otrs_vform01_sw / 2) * 100;
    #KRITERIA PULANG
    $cpf_kpl_vform01_sw = $cpf_vcform01_sww['form_kp_pulang_01'];
    $cpf_kpl02_vform01_sw = ($cpf_kpl_vform01_sw / 1) * 100;
    #Out Come Obat Rasional
    $cpf_rpl_vform01_sw = $cpf_vcform01_sww['form_rp_resume_01'] + $cpf_vcform01_sww['form_rp_kondisi_01'] + $cpf_vcform01_sww['form_rp_pengantar_01'] ;
    $cpf_rpl02_vform01_sw = ($cpf_rpl_vform01_sw / 3) * 100;

}elseif($cpf_vcform01_sww['form_jenis_01']=="HRN"){
 #--------HRN--------#
    #ASESMEN AWAL
    $cpf_as_vform01_sw = $cpf_vcform01_sww['form_as_kdsu_01'] +  $cpf_vcform01_sww['form_as_spes_01'];
    $cpf_as02_vform01_sw = ($cpf_as_vform01_sw  / 2) * 100;
    #LABORAT
    $cpf_lab_vform01_sw = $cpf_vcform01_sww['form_lab_ctbt_01'] + $cpf_vcform01_sww['form_lab_nlr_01'] + $cpf_vcform01_sww['form_lab_gds_01'] + $cpf_vcform01_sww['form_lab_swab_01'];
    $cpf_lab02_vform01_sw = ($cpf_lab_vform01_sw  / 4) * 100;
    #RADIOLOGI
    $cpf_rad_vform01_sw = $cpf_vcform01_sww['form_rad_thorax_01'];
    $cpf_rad02_vform01_sw = ($cpf_rad_vform01_sw / 1) * 100;
    #FARMASI
    $cpf_far_vform01_sw = $cpf_vcform01_sww['form_as02_resep_01'] + $cpf_vcform01_sww['form_as02_reresep02_01'] + $cpf_vcform01_sww['form_as02_reresep03_01'] + $cpf_vcform01_sww['form_as02_reresep04_01'] + $cpf_vcform01_sww['form_as02_reresep05_01'] ;
    $cpf_far02_vform01_sw = ($cpf_far_vform01_sw / 5) * 100;
    #ASESMEN LANJUTAN
    $cpf_al_vform01_sw = $cpf_vcform01_sww['form_as02_dpjp_01'] + $cpf_vcform01_sww['form_as02_ndpjp_01'];
    $cpf_al02_vform01_sw = ($cpf_al_vform01_sw / 5) * 100;
    #DIAGNOSIS
    $cpf_dg_vform01_sw = $cpf_vcform01_sww['form_dg_kpr002_01'] + $cpf_vcform01_sww['form_dg_kpr0202_01'];
    $cpf_dg02_vform01_sw = ($cpf_dg_vform01_sw / 6) * 100;
    #DIS PLANING
    $cpf_dp_vform01_sw = $cpf_vcform01_sww['form_dp_aktivitas_01'] + $cpf_vcform01_sww['form_dp_terapi_01'] +  $cpf_vcform01_sww['form_dp_gejala_01'] + $cpf_vcform01_sww['form_dp_diet_01'];
    $cpf_dp02_vform01_sw = ($cpf_dp_vform01_sw / 4) * 100;
    #EDUKASI INTER
    $cpf_et_vform01_sw = $cpf_vcform01_sww['form_et_diag_01'] + $cpf_vcform01_sww['form_et_terapi_01'] + $cpf_vcform01_sww['form_et_ic_01'];
    $cpf_et02_vform01_sw = ($cpf_et_vform01_sw / 3) * 100;
    #EDUKASI KONSELING GIZI
    $cpf_etgz_vform01_sw = $cpf_vcform01_sww['form_et_diet_01'];
    $cpf_etgz02_vform01_sw = ($cpf_etgz_vform01_sw / 1) * 100;
    #EDUKASI KEPERAWATAN
    $cpf_etkp_vform01_sw = $cpf_vcform01_sww['form_et_preop_01'] + $cpf_vcform01_sww['form_et_diet02_01'] + $cpf_vcform01_sww['form_et_infeksi_01'];
    $cpf_etkp02_vform01_sw = ($cpf_etkp_vform01_sw / 3) * 100;
    #EDUKASI FARMASI
    $cpf_etfr_vform01_sw = $cpf_vcform01_sww['form_et_obat_01'] + $cpf_vcform01_sww['form_et_psnobat_01'] + $cpf_vcform01_sww['form_et_gunaobat_01'];
    $cpf_etfr02_vform01_sw = ($cpf_etfr_vform01_sw / 3) * 100;
    #EDUKASI LMBAR EDUKASi
    $cpf_fet_vform01_sw = $cpf_vcform01_sww['form_fet_let02_01'] + $cpf_vcform01_sww['form_fet_let03_01'] + $cpf_vcform01_sww['form_fet_let04_01'];
    $cpf_fet02_vform01_sw = ($cpf_fet_vform01_sw / 3) * 100;
    #TERAPI MEDIKANOSA
    $cpf_trp_vform01_sw = $cpf_vcform01_sww['form_trp_cef_01'] + $cpf_vcform01_sww['form_trp_ceff02_01'] + $cpf_vcform01_sww['form_trp_ceff03_01'] + $cpf_vcform01_sww['form_trp_ceff05_01'] + $cpf_vcform01_sww['form_trp_an_01'] + $cpf_vcform01_sww['form_trp_keto02_01'] +  $cpf_vcform01_sww['form_trp_am_01'] + $cpf_vcform01_sww['form_trp_rt02_01'] + $cpf_vcform01_sww['form_trp_rt03_01'] + $cpf_vcform01_sww['form_trp_rt04_01'] + $cpf_vcform01_sww['form_trp_rt05_01'] ;
    $cpf_trp02_vform01_sw = ($cpf_trp_vform01_sw / 17) * 100;
    #INFUS
    $cpf_trpin_vform01_sw = $cpf_vcform01_sww['form_trp_rl02_01'] + $cpf_vcform01_sww['form_trp_rl03_01'] + $cpf_vcform01_sww['form_trp_rl04_01'] + $cpf_vcform01_sww['form_trp_met_01'] + $cpf_vcform01_sww['form_trp_mett02_01'] + $cpf_vcform01_sww['form_trp_mett03_01'] + $cpf_vcform01_sww['form_trp_mett04_01'] + $cpf_vcform01_sww['form_trp_mett05_01'] + $cpf_vcform01_sww['form_trp_ran_01'] + $cpf_vcform01_sww['form_trp_para_01'] + $cpf_vcform01_sww['form_trp_pk_01']  ;
    $cpf_trpin02_vform01_sw = ($cpf_trpin_vform01_sw / 3) * 100;
    #DOKTER DPJP
    $cpf_dpjp_vform01_sw = $cpf_vcform01_sww['form_mon_rev02_01'] + $cpf_vcform01_sww['form_mon_rev03_01'] + $cpf_vcform01_sww['form_mon_rev04_01'];
    $cpf_dpjp02_vform01_sw = ($cpf_dpjp_vform01_sw / 3) * 100;
     #KEPERAWTAN
     $cpf_mon_vform01_sw = $cpf_vcform01_sww['form_mon_skala02_01'] + $cpf_vcform01_sww['form_mon_skala03_01'] + $cpf_vcform01_sww['form_mon_skala04_01'] + $cpf_vcform01_sww['form_mon_imp02_01'] + $cpf_vcform01_sww['form_mon_imp03_01'] + $cpf_vcform01_sww['form_mon_imp03_01'] + $cpf_vcform01_sww['form_mon_tanda02_01'] + $cpf_vcform01_sww['form_mon_tanda03_01'] + $cpf_vcform01_sww['form_mon_tanda04_01'] + $cpf_vcform01_sww['form_mon_pro02_01'] + $cpf_vcform01_sww['form_mon_pro03_01'] + $cpf_vcform01_sww['form_mon_pro04_01'] + $cpf_vcform01_sww['form_mon_verbal02_01'] + $cpf_vcform01_sww['form_mon_verbal03_01'] + $cpf_vcform01_sww['form_mon_verbal04_01'] + $cpf_vcform01_sww['form_mon_terapi03_01'] + $cpf_vcform01_sww['form_mon_terapi04_01']  + $cpf_vcform01_sww['form_mon_cairan02_01'] + $cpf_vcform01_sww['form_mon_cairan03_01'] + $cpf_vcform01_sww['form_mon_cairan04_01'] + $cpf_vcform01_sww['form_mon_infeksi02_01']  ;
     $cpf_mon02_vform01_sw = ($cpf_mon_vform01_sw / 21) * 100;
    #GIZI MONITORA
    $cpf_gz_vform01_sw = $cpf_vcform01_sww['form_mon_asupan_01'] + $cpf_vcform01_sww['form_mon_ant_01'] + $cpf_vcform01_sww['form_mon_bio_01'];
    $cpf_gz02_vform01_sw = ($cpf_gz_vform01_sw / 3) * 100;
    #MOBI REHAB
    $cpf_mob_vform01_sw = $cpf_vcform01_sww['form_mob_mandiri_01'];
    $cpf_mob02_vform01_sw = ($cpf_mob_vform01_sw / 1) * 100;
    #HASIL MEDIS
    $cpf_hmed_vform01_sw = $cpf_vcform01_sww['form_out_nyeri_01'] + $cpf_vcform01_sww['form_out_op_01'] ;
    $cpf_hmed02_vform01_sw = ($cpf_mob_vform01_sw / 2) * 100;
    #TATA LAKSANA
    $cpf_int_vform01_sw = $cpf_vcform01_sww['form_int_nic1402_01'] + $cpf_vcform01_sww['form_int_nic1402_01'] + $cpf_vcform01_sww['form_int_nic1403_01'] + $cpf_vcform01_sww['form_int_nic1404_01'] + $cpf_vcform01_sww['form_int_nic6502_01'] + $cpf_vcform01_sww['form_int_nic6503_01'] + $cpf_vcform01_sww['form_int_nic6504_01'] + $cpf_vcform01_sww['form_int_nic23102_01'] + $cpf_vcform01_sww['form_int_nic23103_01'] + $cpf_vcform01_sww['form_int_nic6504_01'] + $cpf_vcform01_sww['form_int_nic23104_01'] + $cpf_vcform01_sww['form_int_nic23002_01'] + $cpf_vcform01_sww['form_int_nic23003_01'] + $cpf_vcform01_sww['form_int_nic23004_01'] + $cpf_vcform01_sww['form_int_nic23002_01'] ;
    $cpf_int02_vform01_sw = ($cpf_int_vform01_sw / 15) * 100;
    #INTERVENSI GIZI
    $cpf_intgz_vform01_sw = $cpf_vcform01_sww['form_int_tetp02_01'];
    $cpf_intgz02_vform01_sw = ($cpf_intgz_vform01_sw / 2) * 100;
    #Obat Anastesi
    $cpf_trpan_vform01_sw = $cpf_vcform01_sww['form_trp_fen_01'] + $cpf_vcform01_sww['form_trp_pro_01'] + $cpf_vcform01_sww['form_trp_atr_01'] + $cpf_vcform01_sww['form_trp_iso_01'] + $cpf_vcform01_sww['form_trp_sef_01'] + $cpf_vcform01_sww['form_trp_n2o_01'];
    $cpf_trpan02_vform01_sw = ($cpf_trpan_vform01_sw / 6) * 100;
    #Out Come MEDIS
    $cpf_otmd_vform01_sw = $cpf_vcform01_sww['form_out_nyeri_01'] + $cpf_vcform01_sww['form_out_op_01'] ;
    $cpf_otmd02_vform01_sw = ($cpf_otmd_vform01_sw / 2) * 100;
    #Out Come KEPERAWATAN
    $cpf_otkp_vform01_sw = $cpf_vcform01_sww['form_out_noc16_01'] + $cpf_vcform01_sww['form_out_noc07_01'] ;
    $cpf_otkp02_vform01_sw = ($cpf_otkp_vform01_sw / 2) * 100;
    #Out Come GIZI
    $cpf_otgz_vform01_sw = $cpf_vcform01_sww['form_out_gizi_01'] + $cpf_vcform01_sww['form_out_asupan_01'] ;
    $cpf_otgz02_vform01_sw = ($cpf_otgz_vform01_sw / 2) * 100;
    #Out Come Obat Rasional
    $cpf_otrs_vform01_sw = $cpf_vcform01_sww['form_out_indikasi_01'] + $cpf_vcform01_sww['form_out_rasional_01'] ;
    $cpf_otrs02_vform01_sw = ($cpf_otrs_vform01_sw / 2) * 100;
    #KRITERIA PULANG
    $cpf_kpl_vform01_sw = $cpf_vcform01_sww['form_kp_pulang_01'];
    $cpf_kpl02_vform01_sw = ($cpf_kpl_vform01_sw / 1) * 100;
    #Out Come Obat Rasional
    $cpf_rpl_vform01_sw = $cpf_vcform01_sww['form_rp_resume_01'] + $cpf_vcform01_sww['form_rp_kondisi_01'] + $cpf_vcform01_sww['form_rp_pengantar_01'] ;
    $cpf_rpl02_vform01_sw = ($cpf_rpl_vform01_sw / 3) * 100;

}elseif($cpf_vcform01_sww['form_jenis_01']=="STT"){
    #--------STT--------#
       #ASESMEN AWAL
       $cpf_as_vform01_sw = $cpf_vcform01_sww['form_as_kdsu_01'] +  $cpf_vcform01_sww['form_as_spes_01'];
       $cpf_as02_vform01_sw = ($cpf_as_vform01_sw  / 2) * 100;
       #LABORAT
       $cpf_lab_vform01_sw = $cpf_vcform01_sww['form_lab_ctbt_01'] + $cpf_vcform01_sww['form_lab_nlr_01'] + $cpf_vcform01_sww['form_lab_gds_01'] + $cpf_vcform01_sww['form_lab_swab_01'];
       $cpf_lab02_vform01_sw = ($cpf_lab_vform01_sw  / 4) * 100;
       #RADIOLOGI
       $cpf_rad_vform01_sw = $cpf_vcform01_sww['form_rad_thorax_01'];
       $cpf_rad02_vform01_sw = ($cpf_rad_vform01_sw / 1) * 100;
       #FARMASI
       $cpf_far_vform01_sw = $cpf_vcform01_sww['form_as02_resep_01'] + $cpf_vcform01_sww['form_as02_reresep02_01'] + $cpf_vcform01_sww['form_as02_reresep03_01'] + $cpf_vcform01_sww['form_as02_reresep04_01'] + $cpf_vcform01_sww['form_as02_reresep05_01'] ;
       $cpf_far02_vform01_sw = ($cpf_far_vform01_sw / 5) * 100;
       #ASESMEN LANJUTAN
       $cpf_al_vform01_sw = $cpf_vcform01_sww['form_as02_dpjp_01'] + $cpf_vcform01_sww['form_as02_ndpjp_01'];
       $cpf_al02_vform01_sw = ($cpf_al_vform01_sw / 5) * 100;
       #DIAGNOSIS
       $cpf_dg_vform01_sw = $cpf_vcform01_sww['form_dg_kpr002_01'] + $cpf_vcform01_sww['form_dg_kpr0202_01'];
       $cpf_dg02_vform01_sw = ($cpf_dg_vform01_sw / 6) * 100;
       #DIS PLANING
       $cpf_dp_vform01_sw = $cpf_vcform01_sww['form_dp_aktivitas_01'] + $cpf_vcform01_sww['form_dp_terapi_01'] +  $cpf_vcform01_sww['form_dp_gejala_01'] + $cpf_vcform01_sww['form_dp_diet_01'];
       $cpf_dp02_vform01_sw = ($cpf_dp_vform01_sw / 4) * 100;
       #EDUKASI INTER
       $cpf_et_vform01_sw = $cpf_vcform01_sww['form_et_diag_01'] + $cpf_vcform01_sww['form_et_terapi_01'] + $cpf_vcform01_sww['form_et_ic_01'];
       $cpf_et02_vform01_sw = ($cpf_et_vform01_sw / 3) * 100;
       #EDUKASI KONSELING GIZI
       $cpf_etgz_vform01_sw = $cpf_vcform01_sww['form_et_diet_01'];
       $cpf_etgz02_vform01_sw = ($cpf_etgz_vform01_sw / 1) * 100;
       #EDUKASI KEPERAWATAN
       $cpf_etkp_vform01_sw = $cpf_vcform01_sww['form_et_preop_01'] + $cpf_vcform01_sww['form_et_diet02_01'] + $cpf_vcform01_sww['form_et_infeksi_01'];
       $cpf_etkp02_vform01_sw = ($cpf_etkp_vform01_sw / 3) * 100;
       #EDUKASI FARMASI
       $cpf_etfr_vform01_sw = $cpf_vcform01_sww['form_et_obat_01'] + $cpf_vcform01_sww['form_et_psnobat_01'] + $cpf_vcform01_sww['form_et_gunaobat_01'];
       $cpf_etfr02_vform01_sw = ($cpf_etfr_vform01_sw / 3) * 100;
       #EDUKASI LMBAR EDUKASi
       $cpf_fet_vform01_sw = $cpf_vcform01_sww['form_fet_let02_01'] + $cpf_vcform01_sww['form_fet_let03_01'] + $cpf_vcform01_sww['form_fet_let04_01'];
       $cpf_fet02_vform01_sw = ($cpf_fet_vform01_sw / 3) * 100;
       #TERAPI MEDIKANOSA
       $cpf_trp_vform01_sw = $cpf_vcform01_sww['form_trp_cef_01'] + $cpf_vcform01_sww['form_trp_ceff02_01'] + $cpf_vcform01_sww['form_trp_ceff03_01'] + $cpf_vcform01_sww['form_trp_ceff05_01'] + $cpf_vcform01_sww['form_trp_an_01'] + $cpf_vcform01_sww['form_trp_keto02_01'] +  $cpf_vcform01_sww['form_trp_am_01'] + $cpf_vcform01_sww['form_trp_rt02_01'] + $cpf_vcform01_sww['form_trp_rt03_01'] + $cpf_vcform01_sww['form_trp_rt04_01'] + $cpf_vcform01_sww['form_trp_rt05_01'] ;
       $cpf_trp02_vform01_sw = ($cpf_trp_vform01_sw / 17) * 100;
       #INFUS
       $cpf_trpin_vform01_sw = $cpf_vcform01_sww['form_trp_rl02_01'] + $cpf_vcform01_sww['form_trp_rl03_01'] + $cpf_vcform01_sww['form_trp_rl04_01'] + $cpf_vcform01_sww['form_trp_met_01'] + $cpf_vcform01_sww['form_trp_mett02_01'] + $cpf_vcform01_sww['form_trp_mett03_01'] + $cpf_vcform01_sww['form_trp_mett04_01'] + $cpf_vcform01_sww['form_trp_mett05_01'] + $cpf_vcform01_sww['form_trp_ran_01'] + $cpf_vcform01_sww['form_trp_para_01'] + $cpf_vcform01_sww['form_trp_pk_01']  ;
       $cpf_trpin02_vform01_sw = ($cpf_trpin_vform01_sw / 3) * 100;
       #DOKTER DPJP
       $cpf_dpjp_vform01_sw = $cpf_vcform01_sww['form_mon_rev02_01'] + $cpf_vcform01_sww['form_mon_rev03_01'] + $cpf_vcform01_sww['form_mon_rev04_01'];
       $cpf_dpjp02_vform01_sw = ($cpf_dpjp_vform01_sw / 3) * 100;
        #KEPERAWTAN
        $cpf_mon_vform01_sw = $cpf_vcform01_sww['form_mon_skala02_01'] + $cpf_vcform01_sww['form_mon_skala03_01'] + $cpf_vcform01_sww['form_mon_skala04_01'] + $cpf_vcform01_sww['form_mon_imp02_01'] + $cpf_vcform01_sww['form_mon_imp03_01'] + $cpf_vcform01_sww['form_mon_imp03_01'] + $cpf_vcform01_sww['form_mon_tanda02_01'] + $cpf_vcform01_sww['form_mon_tanda03_01'] + $cpf_vcform01_sww['form_mon_tanda04_01'] + $cpf_vcform01_sww['form_mon_pro02_01'] + $cpf_vcform01_sww['form_mon_pro03_01'] + $cpf_vcform01_sww['form_mon_pro04_01'] + $cpf_vcform01_sww['form_mon_verbal02_01'] + $cpf_vcform01_sww['form_mon_verbal03_01'] + $cpf_vcform01_sww['form_mon_verbal04_01'] + $cpf_vcform01_sww['form_mon_terapi03_01'] + $cpf_vcform01_sww['form_mon_terapi04_01']  + $cpf_vcform01_sww['form_mon_cairan02_01'] + $cpf_vcform01_sww['form_mon_cairan03_01'] + $cpf_vcform01_sww['form_mon_cairan04_01'] + $cpf_vcform01_sww['form_mon_infeksi02_01']  ;
        $cpf_mon02_vform01_sw = ($cpf_mon_vform01_sw / 21) * 100;
       #GIZI MONITORA
       $cpf_gz_vform01_sw = $cpf_vcform01_sww['form_mon_asupan_01'] + $cpf_vcform01_sww['form_mon_ant_01'] + $cpf_vcform01_sww['form_mon_bio_01'];
       $cpf_gz02_vform01_sw = ($cpf_gz_vform01_sw / 3) * 100;
       #MOBI REHAB
       $cpf_mob_vform01_sw = $cpf_vcform01_sww['form_mob_mandiri_01'];
       $cpf_mob02_vform01_sw = ($cpf_mob_vform01_sw / 1) * 100;
       #HASIL MEDIS
       $cpf_hmed_vform01_sw = $cpf_vcform01_sww['form_out_nyeri_01'] + $cpf_vcform01_sww['form_out_op_01'] ;
       $cpf_hmed02_vform01_sw = ($cpf_mob_vform01_sw / 2) * 100;
       #TATA LAKSANA
       $cpf_int_vform01_sw = $cpf_vcform01_sww['form_int_nic1402_01'] + $cpf_vcform01_sww['form_int_nic1402_01'] + $cpf_vcform01_sww['form_int_nic1403_01'] + $cpf_vcform01_sww['form_int_nic1404_01'] + $cpf_vcform01_sww['form_int_nic6502_01'] + $cpf_vcform01_sww['form_int_nic6503_01'] + $cpf_vcform01_sww['form_int_nic6504_01'] + $cpf_vcform01_sww['form_int_nic23102_01'] + $cpf_vcform01_sww['form_int_nic23103_01'] + $cpf_vcform01_sww['form_int_nic6504_01'] + $cpf_vcform01_sww['form_int_nic23104_01'] + $cpf_vcform01_sww['form_int_nic23002_01'] + $cpf_vcform01_sww['form_int_nic23003_01'] + $cpf_vcform01_sww['form_int_nic23004_01'] + $cpf_vcform01_sww['form_int_nic23002_01'] ;
       $cpf_int02_vform01_sw = ($cpf_int_vform01_sw / 15) * 100;
       #INTERVENSI GIZI
       $cpf_intgz_vform01_sw = $cpf_vcform01_sww['form_int_tetp02_01'];
       $cpf_intgz02_vform01_sw = ($cpf_intgz_vform01_sw / 2) * 100;
       #Obat Anastesi
       $cpf_trpan_vform01_sw = $cpf_vcform01_sww['form_trp_fen_01'] + $cpf_vcform01_sww['form_trp_pro_01'] + $cpf_vcform01_sww['form_trp_atr_01'] + $cpf_vcform01_sww['form_trp_iso_01'] + $cpf_vcform01_sww['form_trp_sef_01'] + $cpf_vcform01_sww['form_trp_n2o_01'];
       $cpf_trpan02_vform01_sw = ($cpf_trpan_vform01_sw / 6) * 100;
       #Out Come MEDIS
       $cpf_otmd_vform01_sw = $cpf_vcform01_sww['form_out_nyeri_01'] + $cpf_vcform01_sww['form_out_op_01'] ;
       $cpf_otmd02_vform01_sw = ($cpf_otmd_vform01_sw / 2) * 100;
       #Out Come KEPERAWATAN
       $cpf_otkp_vform01_sw = $cpf_vcform01_sww['form_out_noc16_01'] + $cpf_vcform01_sww['form_out_noc07_01'] ;
       $cpf_otkp02_vform01_sw = ($cpf_otkp_vform01_sw / 2) * 100;
       #Out Come GIZI
       $cpf_otgz_vform01_sw = $cpf_vcform01_sww['form_out_gizi_01'] + $cpf_vcform01_sww['form_out_asupan_01'] ;
       $cpf_otgz02_vform01_sw = ($cpf_otgz_vform01_sw / 2) * 100;
       #Out Come Obat Rasional
       $cpf_otrs_vform01_sw = $cpf_vcform01_sww['form_out_indikasi_01'] + $cpf_vcform01_sww['form_out_rasional_01'] ;
       $cpf_otrs02_vform01_sw = ($cpf_otrs_vform01_sw / 2) * 100;
       #KRITERIA PULANG
       $cpf_kpl_vform01_sw = $cpf_vcform01_sww['form_kp_pulang_01'];
       $cpf_kpl02_vform01_sw = ($cpf_kpl_vform01_sw / 1) * 100;
       #Out Come Obat Rasional
       $cpf_rpl_vform01_sw = $cpf_vcform01_sww['form_rp_resume_01'] + $cpf_vcform01_sww['form_rp_kondisi_01'] + $cpf_vcform01_sww['form_rp_pengantar_01'] ;
       $cpf_rpl02_vform01_sw = ($cpf_rpl_vform01_sw / 3) * 100;
   
    }elseif($cpf_vcform01_sww['form_jenis_01']=="UDM"){
        #--------UDM--------#
           #ASESMEN AWAL
           $cpf_as_vform01_sw = $cpf_vcform01_sww['form_as_kdsu_01'] +  $cpf_vcform01_sww['form_as_spes_01'];
           $cpf_as02_vform01_sw = ($cpf_as_vform01_sw  / 2) * 100;
           #LABORAT
           $cpf_lab_vform01_sw = $cpf_vcform01_sww['form_lab_ctbt_01'] + $cpf_vcform01_sww['form_lab_nlr_01'] + $cpf_vcform01_sww['form_lab_gds_01'] + $cpf_vcform01_sww['form_lab_swab_01'];
           $cpf_lab02_vform01_sw = ($cpf_lab_vform01_sw  / 4) * 100;
           #RADIOLOGI
           $cpf_rad_vform01_sw = $cpf_vcform01_sww['form_rad_thorax_01'];
           $cpf_rad02_vform01_sw = ($cpf_rad_vform01_sw / 1) * 100;
           #FARMASI
           $cpf_far_vform01_sw = $cpf_vcform01_sww['form_as02_resep_01'] + $cpf_vcform01_sww['form_as02_reresep02_01'] + $cpf_vcform01_sww['form_as02_reresep03_01'] + $cpf_vcform01_sww['form_as02_reresep04_01'] + $cpf_vcform01_sww['form_as02_reresep05_01'] ;
           $cpf_far02_vform01_sw = ($cpf_far_vform01_sw / 5) * 100;
           #ASESMEN LANJUTAN
           $cpf_al_vform01_sw = $cpf_vcform01_sww['form_as02_dpjp_01'] + $cpf_vcform01_sww['form_as02_ndpjp_01'];
           $cpf_al02_vform01_sw = ($cpf_al_vform01_sw / 5) * 100;
           #DIAGNOSIS
           $cpf_dg_vform01_sw = $cpf_vcform01_sww['form_dg_kpr002_01'] + $cpf_vcform01_sww['form_dg_kpr0202_01'];
           $cpf_dg02_vform01_sw = ($cpf_dg_vform01_sw / 6) * 100;
           #DIS PLANING
           $cpf_dp_vform01_sw = $cpf_vcform01_sww['form_dp_aktivitas_01'] + $cpf_vcform01_sww['form_dp_terapi_01'] +  $cpf_vcform01_sww['form_dp_gejala_01'] + $cpf_vcform01_sww['form_dp_diet_01'];
           $cpf_dp02_vform01_sw = ($cpf_dp_vform01_sw / 4) * 100;
           #EDUKASI INTER
           $cpf_et_vform01_sw = $cpf_vcform01_sww['form_et_diag_01'] + $cpf_vcform01_sww['form_et_terapi_01'] + $cpf_vcform01_sww['form_et_ic_01'];
           $cpf_et02_vform01_sw = ($cpf_et_vform01_sw / 3) * 100;
           #EDUKASI KONSELING GIZI
           $cpf_etgz_vform01_sw = $cpf_vcform01_sww['form_et_diet_01'];
           $cpf_etgz02_vform01_sw = ($cpf_etgz_vform01_sw / 1) * 100;
           #EDUKASI KEPERAWATAN
           $cpf_etkp_vform01_sw = $cpf_vcform01_sww['form_et_preop_01'] + $cpf_vcform01_sww['form_et_diet02_01'] + $cpf_vcform01_sww['form_et_infeksi_01'];
           $cpf_etkp02_vform01_sw = ($cpf_etkp_vform01_sw / 3) * 100;
           #EDUKASI FARMASI
           $cpf_etfr_vform01_sw = $cpf_vcform01_sww['form_et_obat_01'] + $cpf_vcform01_sww['form_et_psnobat_01'] + $cpf_vcform01_sww['form_et_gunaobat_01'];
           $cpf_etfr02_vform01_sw = ($cpf_etfr_vform01_sw / 3) * 100;
           #EDUKASI LMBAR EDUKASi
           $cpf_fet_vform01_sw = $cpf_vcform01_sww['form_fet_let02_01'] + $cpf_vcform01_sww['form_fet_let03_01'] + $cpf_vcform01_sww['form_fet_let04_01'];
           $cpf_fet02_vform01_sw = ($cpf_fet_vform01_sw / 3) * 100;
           #TERAPI MEDIKANOSA
           $cpf_trp_vform01_sw = $cpf_vcform01_sww['form_trp_cef_01'] + $cpf_vcform01_sww['form_trp_ceff02_01'] + $cpf_vcform01_sww['form_trp_ceff03_01'] + $cpf_vcform01_sww['form_trp_ceff05_01'] + $cpf_vcform01_sww['form_trp_an_01'] + $cpf_vcform01_sww['form_trp_keto02_01'] +  $cpf_vcform01_sww['form_trp_am_01'] + $cpf_vcform01_sww['form_trp_rt02_01'] + $cpf_vcform01_sww['form_trp_rt03_01'] + $cpf_vcform01_sww['form_trp_rt04_01'] + $cpf_vcform01_sww['form_trp_rt05_01'] ;
           $cpf_trp02_vform01_sw = ($cpf_trp_vform01_sw / 17) * 100;
           #INFUS
           $cpf_trpin_vform01_sw = $cpf_vcform01_sww['form_trp_rl02_01'] + $cpf_vcform01_sww['form_trp_rl03_01'] + $cpf_vcform01_sww['form_trp_rl04_01'] + $cpf_vcform01_sww['form_trp_met_01'] + $cpf_vcform01_sww['form_trp_mett02_01'] + $cpf_vcform01_sww['form_trp_mett03_01'] + $cpf_vcform01_sww['form_trp_mett04_01'] + $cpf_vcform01_sww['form_trp_mett05_01'] + $cpf_vcform01_sww['form_trp_ran_01'] + $cpf_vcform01_sww['form_trp_para_01'] + $cpf_vcform01_sww['form_trp_pk_01']  ;
           $cpf_trpin02_vform01_sw = ($cpf_trpin_vform01_sw / 3) * 100;
           #DOKTER DPJP
           $cpf_dpjp_vform01_sw = $cpf_vcform01_sww['form_mon_rev02_01'] + $cpf_vcform01_sww['form_mon_rev03_01'] + $cpf_vcform01_sww['form_mon_rev04_01'];
           $cpf_dpjp02_vform01_sw = ($cpf_dpjp_vform01_sw / 3) * 100;
            #KEPERAWTAN
            $cpf_mon_vform01_sw = $cpf_vcform01_sww['form_mon_skala02_01'] + $cpf_vcform01_sww['form_mon_skala03_01'] + $cpf_vcform01_sww['form_mon_skala04_01'] + $cpf_vcform01_sww['form_mon_imp02_01'] + $cpf_vcform01_sww['form_mon_imp03_01'] + $cpf_vcform01_sww['form_mon_imp03_01'] + $cpf_vcform01_sww['form_mon_tanda02_01'] + $cpf_vcform01_sww['form_mon_tanda03_01'] + $cpf_vcform01_sww['form_mon_tanda04_01'] + $cpf_vcform01_sww['form_mon_pro02_01'] + $cpf_vcform01_sww['form_mon_pro03_01'] + $cpf_vcform01_sww['form_mon_pro04_01'] + $cpf_vcform01_sww['form_mon_verbal02_01'] + $cpf_vcform01_sww['form_mon_verbal03_01'] + $cpf_vcform01_sww['form_mon_verbal04_01'] + $cpf_vcform01_sww['form_mon_terapi03_01'] + $cpf_vcform01_sww['form_mon_terapi04_01']  + $cpf_vcform01_sww['form_mon_cairan02_01'] + $cpf_vcform01_sww['form_mon_cairan03_01'] + $cpf_vcform01_sww['form_mon_cairan04_01'] + $cpf_vcform01_sww['form_mon_infeksi02_01']  ;
            $cpf_mon02_vform01_sw = ($cpf_mon_vform01_sw / 21) * 100;
           #GIZI MONITORA
           $cpf_gz_vform01_sw = $cpf_vcform01_sww['form_mon_asupan_01'] + $cpf_vcform01_sww['form_mon_ant_01'] + $cpf_vcform01_sww['form_mon_bio_01'];
           $cpf_gz02_vform01_sw = ($cpf_gz_vform01_sw / 3) * 100;
           #MOBI REHAB
           $cpf_mob_vform01_sw = $cpf_vcform01_sww['form_mob_mandiri_01'];
           $cpf_mob02_vform01_sw = ($cpf_mob_vform01_sw / 1) * 100;
           #HASIL MEDIS
           $cpf_hmed_vform01_sw = $cpf_vcform01_sww['form_out_nyeri_01'] + $cpf_vcform01_sww['form_out_op_01'] ;
           $cpf_hmed02_vform01_sw = ($cpf_mob_vform01_sw / 2) * 100;
           #TATA LAKSANA
           $cpf_int_vform01_sw = $cpf_vcform01_sww['form_int_nic1402_01'] + $cpf_vcform01_sww['form_int_nic1402_01'] + $cpf_vcform01_sww['form_int_nic1403_01'] + $cpf_vcform01_sww['form_int_nic1404_01'] + $cpf_vcform01_sww['form_int_nic6502_01'] + $cpf_vcform01_sww['form_int_nic6503_01'] + $cpf_vcform01_sww['form_int_nic6504_01'] + $cpf_vcform01_sww['form_int_nic23102_01'] + $cpf_vcform01_sww['form_int_nic23103_01'] + $cpf_vcform01_sww['form_int_nic6504_01'] + $cpf_vcform01_sww['form_int_nic23104_01'] + $cpf_vcform01_sww['form_int_nic23002_01'] + $cpf_vcform01_sww['form_int_nic23003_01'] + $cpf_vcform01_sww['form_int_nic23004_01'] + $cpf_vcform01_sww['form_int_nic23002_01'] ;
           $cpf_int02_vform01_sw = ($cpf_int_vform01_sw / 15) * 100;
           #INTERVENSI GIZI
           $cpf_intgz_vform01_sw = $cpf_vcform01_sww['form_int_tetp02_01'];
           $cpf_intgz02_vform01_sw = ($cpf_intgz_vform01_sw / 2) * 100;
           #Obat Anastesi
           $cpf_trpan_vform01_sw = $cpf_vcform01_sww['form_trp_fen_01'] + $cpf_vcform01_sww['form_trp_pro_01'] + $cpf_vcform01_sww['form_trp_atr_01'] + $cpf_vcform01_sww['form_trp_iso_01'] + $cpf_vcform01_sww['form_trp_sef_01'] + $cpf_vcform01_sww['form_trp_n2o_01'];
           $cpf_trpan02_vform01_sw = ($cpf_trpan_vform01_sw / 6) * 100;
           #Out Come MEDIS
           $cpf_otmd_vform01_sw = $cpf_vcform01_sww['form_out_nyeri_01'] + $cpf_vcform01_sww['form_out_op_01'] ;
           $cpf_otmd02_vform01_sw = ($cpf_otmd_vform01_sw / 2) * 100;
           #Out Come KEPERAWATAN
           $cpf_otkp_vform01_sw = $cpf_vcform01_sww['form_out_noc16_01'] + $cpf_vcform01_sww['form_out_noc07_01'] ;
           $cpf_otkp02_vform01_sw = ($cpf_otkp_vform01_sw / 2) * 100;
           #Out Come GIZI
           $cpf_otgz_vform01_sw = $cpf_vcform01_sww['form_out_gizi_01'] + $cpf_vcform01_sww['form_out_asupan_01'] ;
           $cpf_otgz02_vform01_sw = ($cpf_otgz_vform01_sw / 2) * 100;
           #Out Come Obat Rasional
           $cpf_otrs_vform01_sw = $cpf_vcform01_sww['form_out_indikasi_01'] + $cpf_vcform01_sww['form_out_rasional_01'] ;
           $cpf_otrs02_vform01_sw = ($cpf_otrs_vform01_sw / 2) * 100;
           #KRITERIA PULANG
           $cpf_kpl_vform01_sw = $cpf_vcform01_sww['form_kp_pulang_01'];
           $cpf_kpl02_vform01_sw = ($cpf_kpl_vform01_sw / 1) * 100;
           #Out Come Obat Rasional
           $cpf_rpl_vform01_sw = $cpf_vcform01_sww['form_rp_resume_01'] + $cpf_vcform01_sww['form_rp_kondisi_01'] + $cpf_vcform01_sww['form_rp_pengantar_01'] ;
           $cpf_rpl02_vform01_sw = ($cpf_rpl_vform01_sw / 3) * 100;
       
       }
    
    /* <?PHP echo "<span class='badge bg-warning'>".ceil($cpf_int02_vform01_sw)."%</span>" ?> */
?>