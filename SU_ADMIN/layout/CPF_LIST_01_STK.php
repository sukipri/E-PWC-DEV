<b>#DAFTAR  STATISTIK CLINICAL PATH WAY</b>
<br>
<table class="table table-sm table-bordered table-striped">
<tr class="table-info">
    <td  width="4%">#</td>
    <td width="8%">ASESMEN AWAL</td>
    <td width="8%">ASESMEN AWAL KEPERAWATAN</td>
    <td width="8%">LABORATORIUM</td>
    <td width="8%">RADIOLOGI</td>
    <td width="8%">ASESMEN LANJUTAN</td>
    <td width="8%">ASESMEN KEPERAWATAN</td>
    <td width="8%">ASESMEN GIZI</td>
    <td width="8%">ASESMEN FARMASI</td>
    <td width="8%">DIAGNOSIS</td>
    <td width="8%">DIAGNOSIS KEPERAWATAN</td>
    <td width="8%">DIAGNOSIS GIZI</td>

</tr>
<?PHP 
    #DATA CPF DISTINCT
    $pwc_vcpf01_sw = $ms_q("$sl DISTINCT form_jenis_01 FROM tb_cpf_form_01 order by form_jenis_01  ");
        while($pwc_vcpf01_sww = $ms_fas($pwc_vcpf01_sw)){
            #DATA CPF COUNTING
            $pwc_tot_vcpf01_sw = $ms_q("$call_sel tb_cpf_form_01 WHERE form_jenis_01='$pwc_vcpf01_sww[form_jenis_01]' ");
              $pwc_tot_vcpf01_sww = $ms_fas($pwc_tot_vcpf01_sw);
              $pwc_tot_nr_vcpf01_sw = $ms_nr($pwc_tot_vcpf01_sw);

            #KONVSERSI 
                 #SUM ASESMEN AWAL
                 $pwc_hit_asaw_cpf01 = $pwc_tot_vcpf01_sww['form_as_igd_01'] +  $pwc_tot_vcpf01_sww['form_as_spes_01'];
                 $pwc_hit_asaw_cpf02 = $pwc_hit_asaw_cpf01 /  $pwc_tot_nr_vcpf01_sw * 100 / 2 ;
                 $pwc_hit_asaw_cpf03 = $pwc_hit_asaw_cpf02 / 2;
                #ASESMEN AWAL KEPERAWATAN
                $pwc_hit_kdsu_cpf01 = $pwc_tot_vcpf01_sww['form_as_kdsu_01'];
                $pwc_hit_kdsu_cpf02 = $pwc_hit_kdsu_cpf01 / $pwc_tot_nr_vcpf01_sw * 100 ;
                $pwc_hit_kdsu_cpf03 = $pwc_hit_kdsu_cpf02 / 100;
                #LABORATORIUM
                $pwc_hit_lab_cpf01 = $pwc_tot_vcpf01_sww['form_lab_ctbt_01'] + $pwc_tot_vcpf01_sww['form_lab_nlr_01'] + $pwc_tot_vcpf01_sww['form_lab_gds_01'] + $pwc_tot_vcpf01_sww['form_lab_swab_01']  ;
                $pwc_hit_lab_cpf02 = $pwc_hit_lab_cpf01 / $pwc_tot_nr_vcpf01_sw * 100 / 4 ;
                $pwc_hit_lab_cpf03 = $pwc_hit_lab_cpf02 / 100;
                 #RADIOLOGI
                 $pwc_hit_rad_cpf01 = $pwc_tot_vcpf01_sww['form_rad_thorax_01'] ;
                 $pwc_hit_rad_cpf02 = $pwc_hit_rad_cpf01 / $pwc_tot_nr_vcpf01_sw * 100 / 1 ;
                 $pwc_hit_rad_cpf03 = $pwc_hit_rad_cpf02 / 100;
                #ASESMEN lANJUTAN
                $pwc_hit_asaw02_cpf01 = $pwc_tot_vcpf01_sww['form_as02_dpjp_01'] +  $pwc_tot_vcpf01_sww['form_as02_ndpjp_01'];
                $pwc_hit_asaw02_cpf02 = $pwc_hit_asaw02_cpf01 /  $pwc_tot_nr_vcpf01_sw * 100 / 2 ;
                 $pwc_hit_asaw02_cpf03 = $pwc_hit_asaw02_cpf02 / 2;
                #ASESMEN KEPERAWATAN02
                $pwc_hit_pj_cpf01 = $pwc_tot_vcpf01_sww['form_as02_pj_01'] + $pwc_tot_vcpf01_sww['form_as02_pj02_01'] + $pwc_tot_vcpf01_sww['form_as02_pj03_01'] + $pwc_tot_vcpf01_sww['form_as02_pj04_01'] + $pwc_tot_vcpf01_sww['form_as02_pj05_01'];
                $pwc_hit_pj_cpf02 = $pwc_hit_pj_cpf01 / $pwc_tot_nr_vcpf01_sw * 100 / 5 ;
                $pwc_hit_pj_cpf03 = $pwc_hit_pj_cpf02 / 100;
                  #ASESMEN KEPERAWATAN02
                  $pwc_hit_pj_cpf01 = $pwc_tot_vcpf01_sww['form_as02_pj_01'] + $pwc_tot_vcpf01_sww['form_as02_pj02_01'] + $pwc_tot_vcpf01_sww['form_as02_pj03_01'] + $pwc_tot_vcpf01_sww['form_as02_pj04_01'] + $pwc_tot_vcpf01_sww['form_as02_pj05_01'];
                  $pwc_hit_pj_cpf02 = $pwc_hit_pj_cpf01 / $pwc_tot_nr_vcpf01_sw * 100 / 5 ;
                  $pwc_hit_pj_cpf03 = $pwc_hit_pj_cpf02 / 100;
                #GIZI
                $pwc_hit_gizi_cpf01 = $pwc_tot_vcpf01_sww['form_as02_gizi_01'] ;
                $pwc_hit_gizi_cpf02 = $pwc_hit_gizi_cpf01 / $pwc_tot_nr_vcpf01_sw * 100 / 1 ;
                $pwc_hit_gizi_cpf03 = $pwc_hit_gizi_cpf02 / 100;
                #ASESMEN FARMASI
                $pwc_hit_resep_cpf01 = $pwc_tot_vcpf01_sww['form_as02_resep_01'] + $pwc_tot_vcpf01_sww['form_as02_reresep_01'] + $pwc_tot_vcpf01_sww['form_as02_reresep02_01'] + $pwc_tot_vcpf01_sww['form_as02_reresep03_01'] + $pwc_tot_vcpf01_sww['form_as02_reresep04_01'] + $pwc_tot_vcpf01_sww['form_as02_reresep05_01']   ;
                $pwc_hit_resep_cpf02 = $pwc_hit_resep_cpf01 / $pwc_tot_nr_vcpf01_sw * 100 / 6 ;
                $pwc_hit_resep_cpf03 = $pwc_hit_resep_cpf02 / 100;
                #DIAGNOSIS MEDIS
                $pwc_hit_dg_cpf01 = $pwc_tot_vcpf01_sww['form_dg_medis_01']  ;
                $pwc_hit_dg_cpf02 = $pwc_hit_dg_cpf01 / $pwc_tot_nr_vcpf01_sw * 100 / 1 ;
                $pwc_hit_dg_cpf03 = $pwc_hit_dg_cpf02 / 100;
                 #DIAGNOSIS KEPERAWATAN
                 $pwc_hit_dg02_cpf01 = $pwc_tot_vcpf01_sww['form_dg_kpr002_01'] +  $pwc_tot_vcpf01_sww['form_dg_kpr003_01'] + $pwc_tot_vcpf01_sww['form_dg_kpr004_01'] + $pwc_tot_vcpf01_sww['form_dg_kpr0202_01'] + $pwc_tot_vcpf01_sww['form_dg_kpr0203_01'] + $pwc_tot_vcpf01_sww['form_dg_kpr0204_01'] ;
                 $pwc_hit_dg02_cpf02 = $pwc_hit_dg02_cpf01 / $pwc_tot_nr_vcpf01_sw * 100 / 6 ;
                 $pwc_hit_dg02_cpf03 = $pwc_hit_dg02_cpf02 / 100;
                 #DIAGNOSIS GIZI
                 $pwc_hit_gizi02_cpf01 = $pwc_tot_vcpf01_sww['form_dg_gizi_01'] ;
                 $pwc_hit_gizi02_cpf02 = $pwc_hit_gizi02_cpf01 / $pwc_tot_nr_vcpf01_sw * 100 / 1 ;
                 $pwc_hit_gizi02_cpf03 = $pwc_hit_gizi02_cpf02 / 100;
                
                //echo $pwc_tot_nr_vcpf01_sw;
           
?>
<tr>
    <td><?PHP echo $pwc_vcpf01_sww['form_jenis_01'] ?></td>
    <td align="center"><?PHP echo ceil($pwc_hit_asaw_cpf02)."%"; ?> </td>
    <td align="center"><?PHP echo ceil($pwc_hit_kdsu_cpf02)."%"; ?> </td>
    <td align="center"><?PHP echo ceil($pwc_hit_lab_cpf02)."%"; ?> </td>
    <td align="center"><?PHP echo ceil($pwc_hit_rad_cpf02)."%"; ?> </td>
    <td align="center"><?PHP echo ceil($pwc_hit_asaw02_cpf02)."%"; ?> </td>
    <td align="center"><?PHP echo ceil($pwc_hit_pj_cpf02)."%"; ?> </td>
    <td align="center"><?PHP echo ceil($pwc_hit_gizi_cpf02)."%"; ?> </td>
    <td align="center"><?PHP echo ceil($pwc_hit_resep_cpf02)."%"; ?> </td>
    <td align="center"><?PHP echo ceil($pwc_hit_dg_cpf02)."%"; ?> </td>
    <td align="center"><?PHP echo ceil($pwc_hit_dg02_cpf02)."%"; ?> </td>
    <td align="center"><?PHP echo ceil($pwc_hit_gizi02_cpf02)."%"; ?> </td>
</tr>
<?PHP } ?>
</table>