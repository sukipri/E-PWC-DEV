<?PHP error_reporting(0); ?>
<h5>REPORTING CP *Obsgin</h5>
<br>
<form method="post">
<div class="input-group mb-3" style="max-width:45rem;">
  <input type="date" class="form-control form-control-sm" required name="tg01" value="<?PHP echo $DATE_HTML5_SQL ?>" required>
  <input type="date" class="form-control form-control-sm" required name="tg02" value="<?PHP echo $DATE_HTML5_SQL ?>" required>
    <select name="list01" class="form-control form-control-sm" required>
    <?PHP 
        $cpf_vkeg03_sw = $CL_Q("$SL idmain_keg_03,keg_nama_03 FROM Citarum.dbo.tb_cpf01_keg03_03 ");
        echo"<option value=>-Kasus Bedah-</option>";
            while($cpf_vkeg03_sww = $CL_FAS($cpf_vkeg03_sw)){
                echo"<option value=$cpf_vkeg03_sww[idmain_keg_03]>$cpf_vkeg03_sww[keg_nama_03]</option>";
            }
    ?>
    </select>
  <button class="btn btn-success btn-sm" name="btn_tgl_01">CARI DATA</button>
</div>
</form>
<!--  -->
<?PHP 
    if(isset($_POST['btn_tgl_01'])){
    $tg01 = @$_POST['tg01'];
    $tg02 = @$_POST['tg02'];
    $list01 = @$_POST['list01'];
    $cpf_vkeg03_sw02 = $CL_Q("$SL idmain_keg_03,keg_nama_03 FROM Citarum.dbo.tb_cpf01_keg03_03 WHERE idmain_keg_03='$list01' ");
        $cpf_vkeg03_sww02 = $CL_FAS($cpf_vkeg03_sw02);
?>
<?PHP echo"<h5>INTERVAL ".FS_DATE($tg01)." - ". FS_DATE($tg02)." | <b>#CASE $cpf_vkeg03_sww02[keg_nama_03] </b></h5>"; ?>
<hr>
<div class="card border-primary mb-3" style="max-width: 43rem;">
  <div class="card-header">TOTAL KALKULASI CP</div>
  <div class="card-body">
   <!--  -->
   <?PHP 
    #KALKULASI 
    $cpf_disnr_vfhead01_sw = $CL_Q("$SL DISTINCT idmain_inap_01 FROM Citarum.dbo.tb_cpf01_form03_01_head WHERE head_tglinput_01 BETWEEN '$tg01' AND '$tg02 23:59:00' AND idmain_keg_03='$list01'");
    $cpf_nr_inap_vform01_sww = $CL_NR($cpf_disnr_vfhead01_sw);
    $cpf_disnr_vfhead01_sww = $CL_NR($cpf_disnr_vfhead01_sw); #DATA DIS INAP
    $cpf_totcp_vfhead01_sw = $CL_Q("$SL SUM(head_tot_01) as tot_cp FROM Citarum.dbo.tb_cpf01_form03_01_head WHERE head_tglinput_01 BETWEEN '$tg01' AND '$tg02 23:59:00' AND idmain_keg_03='$list01' ");
    $cpf_totcp_vfhead01_sww = $CL_FAS($cpf_totcp_vfhead01_sw); #DATA SUM TOTAL CP head
    #KALKULASI TOTAL
    $hit_totcp_vfhead_sw_prc = 1 / 100 * 100;
    $hit_totcp_vfhead_sw_prc02 = $cpf_totcp_vfhead01_sww['tot_cp'] / $cpf_disnr_vfhead01_sww;
    $hit_totcp_vfhead_sw = $hit_totcp_vfhead_sw_prc02 / 10 * $hit_totcp_vfhead_sw_prc;
?>
    <b>
        <?PHP 
            echo "Total CP  = ".$cpf_disnr_vfhead01_sww." FORM  <span class='badge bg-info'>".ceil($hit_totcp_vfhead_sw) ."% </span>";
            echo"<br>";
            #DATA KAL FORM HEAD
        $cpf_lskal_vfhead01_sw = $CL_Q("$SL DISTINCT idmain_keg_01  FROM Citarum.dbo.tb_cpf01_form03_01_head WHERE head_tglinput_01 BETWEEN '$tg01' AND '$tg02 23:59:00' AND idmain_keg_03='$list01' ");
        while($cpf_lskal_vfhead01_sww = $CL_FAS($cpf_lskal_vfhead01_sw)){
            #DATA KEG01
            $cpf_lskal_vkeg01_sw = $CL_Q("$SL idmain_keg_01,keg_nama_01 FROM Citarum.dbo.tb_cpf01_keg03_01 WHERE idmain_keg_01='$cpf_lskal_vfhead01_sww[idmain_keg_01]' order by keg_urut_01 asc");
            $cpf_lskal_vkeg01_sww = $CL_FAS($cpf_lskal_vkeg01_sw);
        #DATA SUM
        $cpf_sum_vfhead01_sw = $CL_Q("$SL SUM(head_tot_01) as sum_tot01 FROM Citarum.dbo.tb_cpf01_form03_01_head WHERE idmain_keg_01='$cpf_lskal_vfhead01_sww[idmain_keg_01]' AND head_tglinput_01 BETWEEN '$tg01' AND '$tg02 23:59:00' AND idmain_keg_03='$list01'  ");
        $cpf_sum_vfhead01_sww = $CL_FAS($cpf_sum_vfhead01_sw);
            #HIT AND RUN
            $cpf_htot_prc = 1 / 100 * 100;
            $cpf_htot_vcp01_sw =  $cpf_sum_vfhead01_sww['sum_tot01'] /  $cpf_disnr_vfhead01_sww *   $cpf_htot_prc;
              #echo $cpf_lskal_vkeg01_sww['keg_nama_01']." <span class='badge bg-success'> ".ceil($cpf_htot_vcp01_sw)."%</span>";
            if($cpf_htot_vcp01_sw > 85){
                echo $cpf_lskal_vkeg01_sww['keg_nama_01']." <span class='badge bg-success'> ".ceil($cpf_htot_vcp01_sw)."%</span>";
            echo"<br>";
            }elseif($cpf_htot_vcp01_sw > 70){
            echo $cpf_lskal_vkeg01_sww['keg_nama_01']." <span class='badge bg-warning'> ".ceil($cpf_htot_vcp01_sw)."%</span>";
            echo"<br>";
             }elseif($cpf_htot_vcp01_sw > 0){
            echo $cpf_lskal_vkeg01_sww['keg_nama_01']." <span class='badge bg-danger'> ".ceil($cpf_htot_vcp01_sw)."%</span>";
            echo"<br>";
            }
        }
         ?>

    </b>
   <!--  -->
  </div>
</div>

<br>
<table class="table table-sm table-striped table-bordered">
    <tr class="table-dark">
        <td width="12%">CP</td>
        <td width="60%">Penunjang</td>
        <td>UPLOADER</td>
    </tr>
    <?php
     #KALKULASI
     $cpf_data_vfhead01_sw = $CL_Q(" $SL DISTINCT  idmain_inap_01 FROM  Citarum.dbo.tb_cpf01_form03_01_head WHERE head_tglinput_01 BETWEEN '$tg01' AND '$tg02 23:59:00' AND idmain_keg_03='$list01' ");
     while($cpf_data_vfhead01_sww = $CL_FAS($cpf_data_vfhead01_sw)){
        #UPLOADER CPF HEAD
        $cpf_upl_vfhead01_sw = $CL_Q("$SL idmain_cpf01_form_01_head,uploader FROM Citarum.dbo.tb_cpf01_form03_01_head WHERE idmain_inap_01='$cpf_data_vfhead01_sww[idmain_inap_01]'");
        $cpf_upl_vfhead01_sww  = $CL_FAS($cpf_upl_vfhead01_sw);
        #USER -> UPLOADER HEAD
        $cpf_upl_vusr01_sw = $CL_Q("$SL idmain,namauser FROM Citarum.dbo.TBUser WHERE idmain='$cpf_upl_vfhead01_sww[uploader]'");
        $cpf_upl_vusr01_sww = $CL_FAS($cpf_upl_vusr01_sw);
    ?>
    <tr>
        <td><?PHP echo $cpf_data_vfhead01_sww['idmain_inap_01'] ?></td>
        <td>
            <!-- - -->
            <?PHP 
                   $cpf_ls_vkeg01_sw = $CL_Q("$SL idmain_keg_01 FROM Citarum.dbo.tb_cpf01_form03_01_head WHERE idmain_inap_01='$cpf_data_vfhead01_sww[idmain_inap_01]'");
                    while($cpf_ls_vkeg01_sww = $CL_FAS($cpf_ls_vkeg01_sw)){ #DATA KEG
                    #KEG 01
                    $cpf_ls02_vkeg01_sw = $CL_Q("$SL idmain_keg_01,keg_nama_01 FROM Citarum.dbo.tb_cpf01_keg03_01 WHERE idmain_keg_01='$cpf_ls_vkeg01_sww[idmain_keg_01]' order by keg_urut_01 asc");  
                     $cpf_ls02_vkeg01_sww = $CL_FAS($cpf_ls02_vkeg01_sw);

                $cpf_ls_vfhead01_sw = $CL_Q(" $SL idmain_cpf01_form_01_head,idmain_inap_01,head_kode_01,head_tot_01,head_tot02_02,head_tglinput_01,head_status_01,idmain_keg_03,idmain_keg_01,uploader FROM  Citarum.dbo.tb_cpf01_form03_01_head WHERE head_tglinput_01 BETWEEN '$tg01' AND '$tg02 23:59:00' AND idmain_keg_03='$list01' AND idmain_inap_01='$cpf_data_vfhead01_sww[idmain_inap_01]' AND idmain_keg_01='$cpf_ls_vkeg01_sww[idmain_keg_01]' ");
                    $cpf_ls_vfhead01_sww = $CL_FAS($cpf_ls_vfhead01_sw);

                        echo"<i class='fas fa-file-medical'></i>  $cpf_ls02_vkeg01_sww[keg_nama_01] ";
                        echo "<span class='badge bg-secondary'><b>".$cpf_ls_vfhead01_sww['head_tot_01']."%</b> </span>";
                        echo"<br>";
                    }

                ?>
            <!--  -->
        </td>
        <td><?PHP echo $cpf_upl_vusr01_sww['namauser']  ?></td>
    </tr>
    <?PHP $cpf_cp_no++; } 
    $cpf_totpersen_vformp01_sw = $CL_Q("$SL SUM(formp_tot_01) as tot_persen FROM Citarum.dbo.tb_cpf01_form03_01_head_persen WHERE  formp_tglinput_01 BETWEEN '$tg01' AND '$tg02 23:59:00' AND idmain_keg_03='$list01'");
    $cpf_totpersen_vformp01_sww = $CL_FAS($cpf_totpersen_vformp01_sw);
            #KALKULASI
            $cpf_kal_totpersen_vformp01_sw = $cpf_totpersen_vformp01_sww['tot_persen'] / $cpf_nr_inap_vform01_sww;
            $cpf_kal_totpersen_bulat_vformp01_sw = ceil($cpf_kal_totpersen_vformp01_sw);
?>
<tr class="">
    <td width="3%">-</td>
    <td width="30%" align="center">

        <?PHP
            echo"$cpf_totpersen_vformp01_sww[tot_persen] %";
            echo"<hr>"; 
            echo"$cpf_nr_inap_vform01_sww";
            echo"<br>";
            
         ?>
    </td>
    <td><?PHP echo "<h4>Hasil = <span class='badge bg-info'>".$cpf_kal_totpersen_bulat_vformp01_sw."%</span></h4>"; ?></td>
</tr>
</table>
<?PHP } ?>