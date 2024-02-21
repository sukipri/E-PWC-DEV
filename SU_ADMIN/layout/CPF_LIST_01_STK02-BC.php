<b>#DAFTAR  STATISTIK CLINICAL PATH WAY</b>
<br>
<table class="table table-sm table-bordered table-striped">
<tr class="table-info">
    <td width="10%">#</td>
 
    <td>LABORATORIUM</td>
    <td>RADIOLOGI</td>
    <td>DPJP</td>
    <td>ASSESMEN KEPERAWATAN</td>
    <td>ASSESMEN GIZI</td>
    <td>ASSESMEN FARMASI</td>
    <td>INJEKSI</td>
    <td>LAMA RAWAT</td>

    <td>N</td>
    <td>D</td>
    <td>Point</td>
</tr>
<?PHP 
 $pwc_vcpf01_sw = $ms_q("$sl DISTINCT form_jenis_01 FROM tb_cpf_form_01 order by form_jenis_01  ");
 while($pwc_vcpf01_sww = $ms_fas($pwc_vcpf01_sw)){
     #DATA CPF COUNTING
    $pwc_tot_vcpf01_sw = $ms_q("$call_sel tb_cpf_form_01 WHERE form_jenis_01='$pwc_vcpf01_sww[form_jenis_01]' ");
    $pwc_tot_vcpf01_sww = $ms_fas($pwc_tot_vcpf01_sw);
    $pwc_tot_nr_vcpf01_sw = $ms_nr($pwc_tot_vcpf01_sw);
    $pwc_tot_kolom01 = 
    #DATA COLEKTIF PER JENIS
    //$pwc_tot_vcpfj01_sw = $ms_q("$call_sel tb_cpf_form_01 WHERE form_jenis_01='$pwc_vcpf01_sww[form_jenis_01]' ");
    #KONVSERSI 
                #SUM LABORATORIUM
                 $pwc_hit_lab_cpf01 = $pwc_tot_vcpf01_sww['form_lab_ctbt_01'] + $pwc_tot_vcpf01_sww['form_lab_nlr_01'] + $pwc_tot_vcpf01_sww['form_lab_gds_01'] + $pwc_tot_vcpf01_sww['form_lab_swab_01'] ;
                 //echo "$pwc_vcpf01_sww[form_jenis_01]  [$pwc_lab_banding PTs]";
                 $pwc_hit_labsub_cpf01 = $pwc_tot_vcpf01_sww['form_lab_ctbt_01'] + $pwc_tot_vcpf01_sww['form_lab_nlr_01'] + $pwc_tot_vcpf01_sww['form_lab_gds_01'] + $pwc_tot_vcpf01_sww['form_lab_swab_01']  ;
                    if($pwc_hit_lab_cpf01 > 0){
                        $labpoint = 1;
                    }elseif($pwc_hit_lab_cpf01 < 0){
                        $labpoint = 0;
                    }
                    
                    $pwc_hit_labsub_cpf02 = $pwc_hit_labsub_cpf01 /  4 * 100;
                    $pwc_hit_lab_cpf02 = $pwc_hit_lab_cpf01 /  4 * 100;
                 #SUM RADIOLOGI
                  $pwc_hit_rad_cpf01 = $pwc_tot_vcpf01_sww['form_rad_thorax_01'] * 2 ;
                  $pwc_hit_radsub_cpf01 = $pwc_tot_vcpf01_sww['form_rad_thorax_01'] ;
                  $pwc_hit_radsub_cpf02 = $pwc_hit_radsub_cpf01 /  1 * 100  ;
                  $pwc_hit_rad_cpf02 = $pwc_hit_rad_cpf01 /  1 * 100  ;
                 #SUM DPJP
                  $pwc_hit_as02_cpf01 = $pwc_tot_vcpf01_sww['form_as02_dpjp_01'] +  $pwc_tot_vcpf01_sww['form_as02_ndpjp_01'];
                  $pwc_hit_as02sub_cpf01 = $pwc_tot_vcpf01_sww['form_as02_dpjp_01'] +  $pwc_tot_vcpf01_sww['form_as02_ndpjp_01'];
                  if($pwc_hit_as02_cpf01 > 0){
                    $aspoint = 1;
                  }elseif($pwc_hit_as02_cpf01 < 0){
                    $aspoint = 0;
                    }
                    $pwc_hit_as02sub_cpf02 =  $pwc_hit_as02sub_cpf01 /  2 * 100  ;
                   $pwc_hit_as02_cpf02 =  $pwc_hit_as02_cpf01 /  2 * 100  ;
                #SUM KEPERAWATAN
                    $pwc_hit_pj_cpf01 = $pwc_tot_vcpf01_sww['form_as02_pj_01'] + $pwc_tot_vcpf01_sww['form_as02_pj02_01'] + $pwc_tot_vcpf01_sww['form_as02_pj03_01'] + $pwc_tot_vcpf01_sww['form_as02_pj04_01'] + $pwc_tot_vcpf01_sww['form_as02_pj05_01'];
                    $pwc_hit_pjsub_cpf01 = $pwc_tot_vcpf01_sww['form_as02_pj_01'] + $pwc_tot_vcpf01_sww['form_as02_pj02_01'] + $pwc_tot_vcpf01_sww['form_as02_pj03_01'] + $pwc_tot_vcpf01_sww['form_as02_pj04_01'] + $pwc_tot_vcpf01_sww['form_as02_pj05_01'];
                    if($pwc_hit_pj_cpf01 > 0){
                      $pjpoint = 1;
                    }elseif($pwc_hit_pj_cpf01 < 0){
                        $pjpoint = 0;
                      }
                      $pwc_hit_pjsub_cpf02 =   $pwc_hit_pjsub_cpf01 /  $pwc_hit_pjsub_cpf01 * 100 ;
                    $pwc_hit_pj_cpf02 =   $pwc_hit_pj_cpf01 /  5 * 100 ;
                #SUM GIZI
                  $pwc_hit_gizi_cpf01 = $pwc_tot_vcpf01_sww['form_as02_gizi_01'] * 1 ;
                  $pwc_hit_gizisub_cpf01 = $pwc_tot_vcpf01_sww['form_as02_gizi_01'] ;
                  $pwc_hit_gizisub_cpf02 = $pwc_hit_gizisub_cpf01 /  1 * 100  ;
                  $pwc_hit_gizi_cpf02 = $pwc_hit_gizi_cpf01 /  1 * 100  ;
              #SUM FARMASI
              $pwc_hit_resep_cpf01 =  $pwc_tot_vcpf01_sww['form_as02_resep_01'] + $pwc_tot_vcpf01_sww['form_as02_reresep_01'] + $pwc_tot_vcpf01_sww['form_as02_reresep02_01'] + $pwc_tot_vcpf01_sww['form_as02_reresep03_01'] + $pwc_tot_vcpf01_sww['form_as02_reresep04_01'] + $pwc_tot_vcpf01_sww['form_as02_reresep05_01'];

              $pwc_hit_resepsub_cpf01 =  $pwc_tot_vcpf01_sww['form_as02_resep_01'] + $pwc_tot_vcpf01_sww['form_as02_reresep_01'] + $pwc_tot_vcpf01_sww['form_as02_reresep02_01'] + $pwc_tot_vcpf01_sww['form_as02_reresep03_01'] + $pwc_tot_vcpf01_sww['form_as02_reresep04_01'] + $pwc_tot_vcpf01_sww['form_as02_reresep05_01'];
              if($pwc_hit_resep_cpf01 > 0){
                $reseppoint = 1;
              }elseif($pwc_hit_resep_cpf01 < 0){
                  $reseppoint = 0;
                }
              $pwc_hit_resep_cpf02 =  $pwc_hit_resep_cpf01 / 6 * 100  ;
              $pwc_hit_resepsub_cpf02 =  $pwc_hit_resepsub_cpf01 /  $pwc_hit_resepsub_cpf01 * 100  ;
                #SUM INJEKSI
                $pwc_hit_injek_cpf01 =  $pwc_tot_vcpf01_sww['form_trp_cef_01'] + $pwc_tot_vcpf01_sww['form_trp_ceff02_01'] + $pwc_tot_vcpf01_sww['form_trp_ceff03_01'] + $pwc_tot_vcpf01_sww['form_trp_ceff04_01'] + $pwc_tot_vcpf01_sww['form_trp_ceff05_01'] + $pwc_tot_vcpf01_sww['form_trp_an_01'] + $pwc_tot_vcpf01_sww['form_trp_keto02_01'] + $pwc_tot_vcpf01_sww['form_trp_am_01'] + $pwc_tot_vcpf01_sww['form_trp_rt02_01'] + $pwc_tot_vcpf01_sww['form_trp_rt03_01'] + $pwc_tot_vcpf01_sww['form_trp_rt04_01'] + $pwc_tot_vcpf01_sww['form_trp_rt05_01'] ;
                
                $pwc_hit_injeksub_cpf01 =  $pwc_tot_vcpf01_sww['form_trp_cef_01'] + $pwc_tot_vcpf01_sww['form_trp_ceff02_01'] + $pwc_tot_vcpf01_sww['form_trp_ceff03_01'] + $pwc_tot_vcpf01_sww['form_trp_ceff04_01'] + $pwc_tot_vcpf01_sww['form_trp_ceff05_01'] + $pwc_tot_vcpf01_sww['form_trp_an_01'] + $pwc_tot_vcpf01_sww['form_trp_keto02_01'] + $pwc_tot_vcpf01_sww['form_trp_am_01'] + $pwc_tot_vcpf01_sww['form_trp_rt02_01'] + $pwc_tot_vcpf01_sww['form_trp_rt03_01'] + $pwc_tot_vcpf01_sww['form_trp_rt04_01'] + $pwc_tot_vcpf01_sww['form_trp_rt05_01'];
                if($pwc_hit_injek_cpf01 > 0){
                  $injekpoint = 1;
                }elseif($pwc_hit_injek_cpf01 < 0){
                    $injekpoint = 0;
                  }
                  $pwc_injek_banding =  $pwc_tot_nr_vcpf01_sw * 12;
                $pwc_hit_injeksub_cpf02 =   $pwc_hit_injeksub_cpf01 /  $pwc_hit_injeksub_cpf01 * 100  ;
                $pwc_hit_injek_cpf02 =   $pwc_hit_injek_cpf01 / $pwc_hit_injek_cpf01 * 100  ;

                #COUNTING TOTAL N / D
                $pwc_hit_n_cpf01_sw = $pwc_hit_lab_cpf01 + $pwc_hit_rad_cpf01 +  $pwc_hit_as02_cpf01 +  $pwc_hit_pj_cpf01 + $pwc_hit_gizi_cpf01 + $pwc_hit_resep_cpf01 + $pwc_hit_injek_cpf01 + 1 + 30;
                $pwc_hit_x_cpf01_sw = $pwc_hit_n_cpf01_sw * 8;
                $pwc_hit_d_cpf01_sw = $pwc_tot_nr_vcpf01_sw * 8;
                $pwc_hit_dn_cpf01_sw =  $pwc_hit_n_cpf01_sw / $pwc_hit_d_cpf01_sw * 100  ;


?>
<tr>
    <td><?PHP echo $pwc_vcpf01_sww['form_jenis_01'] ?></td>
    
    <td><?PHP echo ceil($pwc_hit_labsub_cpf02)."%"; ?></td>
    <td><?PHP echo ceil($pwc_hit_radsub_cpf02)."%"; ?></td>
    <td><?PHP echo  ceil($pwc_hit_as02sub_cpf02)."%"; ?></td>
    <td><?PHP echo ceil($pwc_hit_pjsub_cpf02)."%"; ?></td>
    <td><?PHP echo ceil($pwc_hit_gizisub_cpf02)."%"; ?></td>
    <td><?PHP echo ceil($pwc_hit_resepsub_cpf02)."%"; ?></td>
    <td><?PHP echo  ceil($pwc_hit_injeksub_cpf02)."%"; ?></td>
    <td><?PHP echo"100%"; ?></td>
    
      <!--   
    <td><?PHP echo $pwc_hit_n_cpf01_sw; ?></td>
    <td><?PHP echo $pwc_hit_d_cpf01_sw; ?> </td>
    <td>
        <?PHP if($pwc_hit_dn_cpf01_sw > 100){
          echo"100%";
        }elseif($pwc_hit_dn_cpf01_sw < 100){ ?>
        <?PHP echo ceil($pwc_hit_dn_cpf01_sw)."%"; ?>
        <?PHP } ?>
  </td>
        -->
    <td><?PHP echo ""; ?></td>
    <td><?PHP echo $pwc_hit_d_cpf01_sw; ?> </td>
    <td>
        <?PHP if($pwc_hit_dn_cpf01_sw > 100){
          echo"100%";
        }elseif($pwc_hit_dn_cpf01_sw < 100){ ?>
        <?PHP echo ceil($pwc_hit_dn_cpf01_sw)."%"; ?>
        <?PHP } ?>
  </td>
</tr>
<?PHP } ?>
</table>