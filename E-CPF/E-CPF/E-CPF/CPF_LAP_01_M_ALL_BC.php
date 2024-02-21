<?php
		
		 if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
 			include'../LOGIC/PG/PG_H_LOCATION.php';
       }else{

			if($vus01_sww['akses']==6 OR $vus01_sww['akses']==61 ){ 
		
?>
	<body>
    		<b>#DATA CPF *All</b>	
            	
				
				<table width="100%" class="table table-sm table-bordered table-striped" style="max-width:60rem" border="0">
                      <tr class="table-dark">
                        <td width="2%">#</td>
                        <td width="41%">KETERANGAN</td>
                        <td width="19%">#COUNTING</td>
                        <td width="19%">#DIVISION</td>
                        <td width="19%">&nbsp;</td>
                      </tr>
                      <?PHP 
					  		$cpf_form_no_01 = 1;
					  		$cpf_vcpf01_sw = $CL_Q("$CL_SL  tb_cpf_form_01 order by form_tglinput_01 desc");
								while($cpf_vcpf01_sww = $CL_FAS($cpf_vcpf01_sw)){
									//-DATA PASIEN--//
									$cpf_vpsn01_sw = $CL_Q("$SL PasienNomorRM,PasienNama,PasienGender,PasienTglLahir FROM TPasien WHERE PasienNomorRM='$cpf_vcpf01_sww[PasienNomorRM]'");
										$cpf_vpsn01_sww = $CL_FAS($cpf_vpsn01_sw);
								
									//--KONVERSI summation CPF_FORM_01 --//
										$cpf_sum_vcpf01_sw = $cpf_vcpf01_sww['form_as_igd_01'] + $cpf_vcpf01_sww['form_as_spes_01'] + $cpf_vcpf01_sww['form_as_spes_01'] + $cpf_vcpf01_sww['form_as_kdsu_01'] + $cpf_vcpf01_sww['form_lab_ctbt_01'] + $cpf_vcpf01_sww['form_lab_nlr_01'] + $cpf_vcpf01_sww['form_lab_swab_01'] + $cpf_vcpf01_sww['form_rad_thorax_01'] + $cpf_vcpf01_sww['form_as02_dpjp_01'] + $cpf_vcpf01_sww['form_as02_pj_01'] + $cpf_vcpf01_sww['form_as02_gizi_01'] + $cpf_vcpf01_sww['form_as02_resep_01'] + $cpf_vcpf01_sww['form_as02_reresep_01'] + $cpf_vcpf01_sww['form_dg_medis_01'] + $cpf_vcpf01_sww['form_dg_kpr_01'] + $cpf_vcpf01_sww['form_dg_gizi_01'] + $cpf_vcpf01_sww['form_dp_terapi_01'] + $cpf_vcpf01_sww['form_dp_gejala_01'] + $cpf_vcpf01_sww['form_dp_diet_01'] + $cpf_vcpf01_sww['form_et_diag_01'] + $cpf_vcpf01_sww['form_et_terapi_01'] + $cpf_vcpf01_sww['form_et_ic_01'] + $cpf_vcpf01_sww['form_et_diet_01'] + $cpf_vcpf01_sww['form_et_preop_01'] + $cpf_vcpf01_sww['form_et_diet02_01'] + $cpf_vcpf01_sww['form_et_infeksi_01']   + $cpf_vcpf01_sww['form_et_obat_01'] + $cpf_vcpf01_sww['form_et_psnobat_01'] + $cpf_vcpf01_sww['form_et_gunaobat_01'] + $cpf_vcpf01_sww['form_trp_cef_01'] + $cpf_vcpf01_sww['form_trp_an_01'] + $cpf_vcpf01_sww['form_trp_keto_01'] + $cpf_vcpf01_sww['form_trp_am_01'] + $cpf_vcpf01_sww['form_trp_rl_01'] + $cpf_vcpf01_sww['form_trp_met_01'] + $cpf_vcpf01_sww['form_trp_ran_01'] + $cpf_vcpf01_sww['form_trp_para_01'] + $cpf_vcpf01_sww['form_trp_pk_01'] + $cpf_vcpf01_sww['form_trp_fen_01'] + $cpf_vcpf01_sww['form_trp_pro_01'] + $cpf_vcpf01_sww['form_trp_atr_01'] + $cpf_vcpf01_sww['form_trp_iso_01'] + $cpf_vcpf01_sww['form_trp_sef_01'] + $cpf_vcpf01_sww['form_trp_n2o_01'] + $cpf_vcpf01_sww['form_int_nic14_01'] + $cpf_vcpf01_sww['form_int_nic65_01'] + $cpf_vcpf01_sww['form_int_nic231_01'] + $cpf_vcpf01_sww['form_int_nic230_01']+ $cpf_vcpf01_sww['form_int_tetp_01'] + $cpf_vcpf01_sww['form_int_obatmayor_01'] + $cpf_vcpf01_sww['form_mon_rev_01'] + $cpf_vcpf01_sww['form_mon_skala_01'] + $cpf_vcpf01_sww['form_mon_imp_01'] + $cpf_vcpf01_sww['form_mon_tanda_01'] + $cpf_vcpf01_sww['form_mon_pro_01'] + $cpf_vcpf01_sww['form_mon_verbal_01'] + $cpf_vcpf01_sww['form_mon_terapi_01'] + $cpf_vcpf01_sww['form_mon_cairan_01'] + $cpf_vcpf01_sww['form_mon_infeksi_01'] + $cpf_vcpf01_sww['form_mon_asupan_01'] + $cpf_vcpf01_sww['form_mon_ant_01'] + $cpf_vcpf01_sww['form_mon_bio_01'] + $cpf_vcpf01_sww['form_mon_fisik_01'] + $cpf_vcpf01_sww['form_mon_interaksi_01'] + $cpf_vcpf01_sww['form_mon_td_01'] + $cpf_vcpf01_sww['form_mob_mandiri_01'] + $cpf_vcpf01_sww['form_out_nyeri_01'] + $cpf_vcpf01_sww['form_out_op_01'] + $cpf_vcpf01_sww['form_out_noc16_01'] + $cpf_vcpf01_sww['form_out_noc07_01'] + $cpf_vcpf01_sww['form_out_gizi_01'] + $cpf_vcpf01_sww['form_out_indikasi_01'] + $cpf_vcpf01_sww['form_out_rasional_01'] + $cpf_vcpf01_sww['form_kp_pulang_01'] + $cpf_vcpf01_sww['form_rp_resume_01'] + $cpf_vcpf01_sww['form_rp_kondisi_01'] + $cpf_vcpf01_sww['form_rp_pengantar_01'] + $cpf_vcpf01_sww['form_var_varian_01'] + $cpf_vcpf01_sww['form_lab_gds_01'] + $cpf_vcpf01_sww['form_dg_kpr02_01'] + $cpf_vcpf01_sww['form_dp_aktivitas_01'] + $cpf_vcpf01_sww['form_fet_let_01'] + $cpf_vcpf01_sww['form_trp_rt_01'] + $cpf_vcpf01_sww['form_mon_efek_01'] + $cpf_vcpf01_sww['form_out_asupan_01'];
										
										//--KONVERSI DIVISION  CPF_FORM_01 --//
										$cpf_div_vcpf01_sw = $cpf_sum_vcpf01_sw / 3;
										
					  
					  ?>
                      <tr>
                        <td><?PHP echo"$cpf_form_no_01"; ?></td>
                        <td><?PHP echo"<b>$cpf_vcpf01_sww[form_jenis_01]</b> - $cpf_vcpf01_sww[form_nama_01]"; ?>
                        	<br>
                         	   <?PHP echo"$cpf_vcpf01_sww[InapNoAdmisi] - $cpf_vcpf01_sww[PasienNomorRM] ($cpf_vpsn01_sww[PasienNama])"; ?>
                        
                        </td>
                        <td align="center"><a href="#"><b><?PHP echo"$cpf_sum_vcpf01_sw"; ?></b></a></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <?PHP $cpf_form_no_01++; } ?>
        </table>

				
				
    </body>

<?PHP }} ?>