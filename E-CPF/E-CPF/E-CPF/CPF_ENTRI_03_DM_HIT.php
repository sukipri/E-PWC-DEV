<?PHP 

 #-------------------------------------#
#---------DIABETES MILETUS -----------#
#-------------------------------------# 
    if( $cpf_vform02_sww['form02_jenis_01']=="DM"){
    
    #ASESMEN AWAL MEDIS
    $cpf_as_vcpf01_sw = $cpf_vform02_sww['form02_as_igd_01'] + $cpf_vform02_sww['form02_as_kep_01'];
    $cpf_as02_vcpf01_sw = ($cpf_as_vcpf01_sw / 2) * 100;
    #LAB
    $cpf_lab_vcpf01_sw = $cpf_vform02_sww['form02_pn_ekg_01'] + $cpf_vform02_sww['form02_pn_gds_01'] + $cpf_vform02_sww['form02_pn_hb_01'] + $cpf_vform02_sww['form02_pn_ur_01'] + $cpf_vform02_sww['form02_pn_na_01'] + $cpf_vform02_sww['form02_pn_lkp_01'] + $cpf_vform02_sww['form02_pn_cr_01'] + $cpf_vform02_sww['form02_pn_nk_01'] + $cpf_vform02_sww['form02_pn_ch_01'] + $cpf_vform02_sww['form02_pn_trg_01'];
    $cpf_lab02_vcpf01_sw = $cpf_lab_vcpf01_sw / 11 * 100;
    #RADIOLOGI
     $cpf_rad_vcpf01_sw = $cpf_vform02_sww['form02_rad_trx_01'] ;
     $cpf_rad02_vcpf01_sw = $cpf_rad_vcpf01_sw / 1 * 100;
    #ASESMEN LANJUTAN DPJP
    $cpf_al_vcpf01_sw = $cpf_vform02_sww['form02_al_dpjp_01'] + $cpf_vform02_sww['form02_al_ndpjp_01'];
    $cpf_al02_vcpf01_sw = $cpf_al_vcpf01_sw / 5 * 100;
    #ASESMEN LANJUTAN PJ
    $cpf_alpj_vcpf01_sw = $cpf_vform02_sww['form02_al_pj_01'];
    $cpf_alpj02_vcpf01_sw = $cpf_alpj_vcpf01_sw / 5 * 100;
    #ASESMEN LANJUTAN GIZI
    $cpf_algz_vcpf01_sw = $cpf_vform02_sww['form02_al_gizi_01'];
    $cpf_algz02_vcpf01_sw = $cpf_algz_vcpf01_sw / 2 * 100;
    #ASESMEN LANJUTAN REsep
    $cpf_alrsp_vcpf01_sw = $cpf_vform02_sww['form02_al_resep_01'] + $cpf_vform02_sww['form02_al_reresep_01'];
    $cpf_alrsp02_vcpf01_sw = $cpf_alrsp_vcpf01_sw / 7 * 100;
     #TERAPI MEDIKAMENTOSA
     $cpf_trp_vcpf01_sw = $cpf_vform02_sww['form02_trp_rl_01'] + $cpf_vform02_sww['form02_trp_met_01'] + $cpf_vform02_sww['form02_trp_gli_01'] + $cpf_vform02_sww['form02_trp_gb_01']  ;
     $cpf_trp_vcpf01_sw = $cpf_trp_vcpf01_sw / 28 * 100;
     #LAMA RAWAT
    $cpf_lr_vcpf01_sw = $cpf_vform02_sww['form02_lr_01'] ;
    $cpf_lr_vcpf01_sw = $cpf_lr_vcpf01_sw / 7 * 100;

    #----TOTAL-----#
    $cpf_tot_vcpf01_sw = $cpf_as02_vcpf01_sw + $cpf_lab02_vcpf01_sw + $cpf_rad02_vcpf01_sw +  $cpf_al02_vcpf01_sw +  $cpf_alrsp02_vcpf01_sw  + $cpf_trp_vcpf01_sw + $cpf_lr_vcpf01_sw;
    $cpf_tot02_vcpf01_sw = $cpf_tot_vcpf01_sw / 9 * 100;


#-------------------------------------#
#---------TUBER KOLOSIS --------------#
#-------------------------------------#
}elseif( $cpf_vform02_sww['form02_jenis_01']=="TBC"){

     #ASESMEN AWAL MEDIS
     $cpf_as_vcpf01_sw = $cpf_vform02_sww['form02_as_igd_01'] + $cpf_vform02_sww['form02_as_kep_01'];
     $cpf_as02_vcpf01_sw = ($cpf_as_vcpf01_sw / 2) * 100;
      #ASESMEN AWAL MEDIS
    $cpf_as_vcpf01_sw = $cpf_vform02_sww['form02_as_igd_01'] + $cpf_vform02_sww['form02_as_kep_01'];
    $cpf_as02_vcpf01_sw = ($cpf_as_vcpf01_sw / 2) * 100;  
    #LAB
    $cpf_lab_vcpf01_sw = $cpf_vform02_sww['form02_pn_lkp_01'] ;
    $cpf_lab02_vcpf01_sw = $cpf_lab_vcpf01_sw / 1 * 100;
     #RADIOLOGI
     $cpf_rad_vcpf01_sw = $cpf_vform02_sww['form02_rad_trx_01'];
     $cpf_rad02_vcpf01_sw = $cpf_rad_vcpf01_sw / 1 * 100;
    #ASESMEN LANJUTAN DPJP
    $cpf_al_vcpf01_sw = $cpf_vform02_sww['form02_al_dpjp_01'] + $cpf_vform02_sww['form02_al_ndpjp_01'];
    $cpf_al02_vcpf01_sw = $cpf_al_vcpf01_sw / 7 * 100;
    #ASESMEN LANJUTAN PJ
    $cpf_alpj_vcpf01_sw = $cpf_vform02_sww['form02_al_pj_01'];
    $cpf_alpj02_vcpf01_sw = $cpf_alpj_vcpf01_sw / 7 * 100;
    #ASESMEN LANJUTAN GIZI
    $cpf_algz_vcpf01_sw = $cpf_vform02_sww['form02_al_gizi_01'];
    $cpf_algz02_vcpf01_sw = $cpf_algz_vcpf01_sw / 0 * 100;
    #ASESMEN LANJUTAN REsep
    $cpf_alrsp_vcpf01_sw = $cpf_vform02_sww['form02_al_resep_01'] + $cpf_vform02_sww['form02_al_reresep_01'];
    $cpf_alrsp02_vcpf01_sw = $cpf_alrsp_vcpf01_sw / 1 * 100;
     #TERAPI MEDIKAMENTOSA
     $cpf_trp_vcpf01_sw = $cpf_vform02_sww['form02_trp_rf_01'] + $cpf_vform02_sww['form02_trp_inh_01'] + $cpf_vform02_sww['form02_trp_prz_01'] + $cpf_vform02_sww['form02_trp_eth_01']  ;
     $cpf_trp_vcpf01_sw = $cpf_trp_vcpf01_sw / 28 * 100;
     #LAMA RAWAT
     $cpf_lr_vcpf01_sw = $cpf_vform02_sww['form02_lr_01'] ;
     $cpf_lr_vcpf01_sw = $cpf_lr_vcpf01_sw / 7 * 100;

#-------------------------------------#
#---------HIPERTENSI -----------------#
#-------------------------------------#
}elseif( $cpf_vform02_sww['form02_jenis_01']=="HPR"){

  #ASESMEN AWAL MEDIS
  $cpf_as_vcpf01_sw = $cpf_vform02_sww['form02_as_igd_01'] + $cpf_vform02_sww['form02_as_kep_01'];
  $cpf_as02_vcpf01_sw = ($cpf_as_vcpf01_sw / 2) * 100;
   #ASESMEN AWAL MEDIS
 $cpf_as_vcpf01_sw = $cpf_vform02_sww['form02_as_igd_01'] + $cpf_vform02_sww['form02_as_kep_01'];
 $cpf_as02_vcpf01_sw = ($cpf_as_vcpf01_sw / 2) * 100;
 #LAB
 $cpf_lab_vcpf01_sw = $cpf_vform02_sww['form02_pn_dr_01'] + $cpf_vform02_sww['form02_pn_cr_01'] + $cpf_vform02_sww['form02_pn_ur_01'] + $cpf_vform02_sww['form02_pn_nk_01']  + $cpf_vform02_sww['form02_pn_ch_01'] + $cpf_vform02_sww['form02_pn_trg_01']  ;
 $cpf_lab02_vcpf01_sw = $cpf_lab_vcpf01_sw / 6 * 100;
  #RADIOLOGI
  $cpf_rad_vcpf01_sw = $cpf_vform02_sww['form02_rad_trx_01'] ;
  $cpf_rad02_vcpf01_sw = $cpf_rad_vcpf01_sw / 1 * 100;
 #ASESMEN LANJUTAN DPJP
 $cpf_al_vcpf01_sw = $cpf_vform02_sww['form02_al_dpjp_01'] + $cpf_vform02_sww['form02_al_ndpjp_01'];
 $cpf_al02_vcpf01_sw = $cpf_al_vcpf01_sw / 5 * 100;
 #ASESMEN LANJUTAN PJ
 $cpf_alpj_vcpf01_sw = $cpf_vform02_sww['form02_al_pj_01'];
 $cpf_alpj02_vcpf01_sw = $cpf_alpj_vcpf01_sw / 5 * 100;
 #ASESMEN LANJUTAN GIZI
 $cpf_algz_vcpf01_sw = $cpf_vform02_sww['form02_al_gizi_01'];
 $cpf_algz02_vcpf01_sw = $cpf_algz_vcpf01_sw / 1 * 100;
 #ASESMEN LANJUTAN REsep
 $cpf_alrsp_vcpf01_sw = $cpf_vform02_sww['form02_al_resep_01'] + $cpf_vform02_sww['form02_al_reresep_01'];
 $cpf_alrsp02_vcpf01_sw = $cpf_alrsp_vcpf01_sw / 7 * 100;
  #TERAPI MEDIKAMENTOSA
  $cpf_trp_vcpf01_sw = $cpf_vform02_sww['form02_trp_rl_01'] + $cpf_vform02_sww['form02_trp_cpt_01'] + $cpf_vform02_sww['form02_trp_val_01'] + $cpf_vform02_sww['form02_trp_ram_01'] + $cpf_vform02_sww['form02_trp_dil_01'] + $cpf_vform02_sww['form02_trp_hct_01'] + $cpf_vform02_sww['form02_trp_bis_01'] + $cpf_vform02_sww['form02_trp_ao_01'] ;
  $cpf_trp_vcpf01_sw = $cpf_trp_vcpf01_sw / 45 * 100;
  #LAMA RAWAT
  $cpf_lr_vcpf01_sw = $cpf_vform02_sww['form02_lr_01'] ;
  $cpf_lr_vcpf01_sw = $cpf_lr_vcpf01_sw / 5 * 100;

#-------------------------------------#
#---------HIPERTENSI -----------------#
#-------------------------------------#
}elseif( $cpf_vform02_sww['form02_jenis_01']=="LK"){

    #ASESMEN AWAL MEDIS
    $cpf_as_vcpf01_sw = $cpf_vform02_sww['form02_as_igd_01'] + $cpf_vform02_sww['form02_as_kep_01'];
    $cpf_as02_vcpf01_sw = ($cpf_as_vcpf01_sw / 2) * 100;
    #ASESMEN AWAL MEDIS
   $cpf_as_vcpf01_sw = $cpf_vform02_sww['form02_as_igd_01'] + $cpf_vform02_sww['form02_as_kep_01'];
   $cpf_as02_vcpf01_sw = ($cpf_as_vcpf01_sw / 2) * 100;
   #LAB
   $cpf_lab_vcpf01_sw = $cpf_vform02_sww['form02_pn_dr_01'] + $cpf_vform02_sww['form02_pn_gds_01'] ;
   $cpf_lab02_vcpf01_sw = $cpf_lab_vcpf01_sw / 2 * 100;
    #RADIOLOGI
    $cpf_rad_vcpf01_sw = $cpf_vform02_sww['form02_rad_usg_01'] ;
    $cpf_rad02_vcpf01_sw = $cpf_rad_vcpf01_sw / 1 * 100;
   #ASESMEN LANJUTAN DPJP
   $cpf_al_vcpf01_sw = $cpf_vform02_sww['form02_al_dpjp_01'] + $cpf_vform02_sww['form02_al_ndpjp_01'];
   $cpf_al02_vcpf01_sw = $cpf_al_vcpf01_sw / 7 * 100;
   #ASESMEN LANJUTAN PJ
   $cpf_alpj_vcpf01_sw = $cpf_vform02_sww['form02_al_pj_01'];
   $cpf_alpj02_vcpf01_sw = $cpf_alpj_vcpf01_sw / 7 * 100;
   #ASESMEN LANJUTAN GIZI
   $cpf_algz_vcpf01_sw = $cpf_vform02_sww['form02_al_gizi_01'];
   $cpf_algz02_vcpf01_sw = $cpf_algz_vcpf01_sw / 1 * 100;
   #ASESMEN LANJUTAN REsep
   $cpf_alrsp_vcpf01_sw = $cpf_vform02_sww['form02_al_resep_01'] + $cpf_vform02_sww['form02_al_reresep_01'];
   $cpf_alrsp02_vcpf01_sw = $cpf_alrsp_vcpf01_sw / 9 * 100;
    #TERAPI MEDIKAMENTOSA
    $cpf_trp_vcpf01_sw = $cpf_vform02_sww['form02_trp_rl_01'] + $cpf_vform02_sww['form02_trp_tkd_01'] + $cpf_vform02_sww['form02_trp_at_01'] + $cpf_vform02_sww['form02_trp_vitk_01'] + $cpf_vform02_sww['form02_trp_prctm_01'] ;
    $cpf_trp_vcpf01_sw = $cpf_trp_vcpf01_sw / 29 * 100;
    #LAMA RAWAT
    $cpf_lr_vcpf01_sw = $cpf_vform02_sww['form02_lr_01'] ;
    $cpf_lr_vcpf01_sw = $cpf_lr_vcpf01_sw / 7 * 100;


}
?>