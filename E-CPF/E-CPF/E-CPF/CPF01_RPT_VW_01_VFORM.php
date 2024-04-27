<?PHP error_reporting(0); ?>
<h5>REPORTING CP *Non Bedah</h5>
<br>
<form method="post">
<div class="input-group mb-3" style="max-width:35rem;">
  <input type="date" class="form-control form-control-sm" required name="tg01" value="<?PHP echo $TG01 ?>" required>
  <input type="date" class="form-control form-control-sm" required name="tg02" value="<?PHP echo $TG02 ?>" required>
  <select name="list01" class="form-control form-control-sm" required>
    <?PHP 
        $cpf_vkeg03_sw = $CL_Q("$SL idmain_keg_03,keg_nama_03 FROM Citarum.dbo.tb_cpf01_keg_03 ");
        echo"<option value=>Kasus</option>";
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
    $TG01 = @$_POST['tg01'];
    $TG02 = @$_POST['tg02'];
    $IDKEG03 = @$_POST['list01'];
    
        echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?PG_SA=CPF01_RPT_VW_01_VFORM&TG01=$TG01&TG02=$TG02&IDKEG03=$IDKEG03&GET_CPF01=GET_CPF01'>";
    }

    $cpf_vkeg03_sw02 = $CL_Q("$SL idmain_keg_03,keg_nama_03,keg_rawat_03 FROM Citarum.dbo.tb_cpf01_keg_03 WHERE idmain_keg_03='$IDKEG03' ");
        $cpf_vkeg03_sww02 = $CL_FAS($cpf_vkeg03_sw02);
        #echo $cpf_vkeg03_sww02['keg_rawat_03']
?>
    <?PHP if(isset($_GET['GET_CPF01'])){ ?>
<?PHP echo"<h5>INTERVAL ".FS_DATE($TG01)." - ". FS_DATE($TG02)." | <b>#CASE $cpf_vkeg03_sww02[keg_nama_03] </b></h5>"; ?>
<hr>
<div class="card border-primary mb-3" style="max-width: 35rem;">
  <div class="card-header">TOTAL KALKULASI CP</div>
  <div class="card-body">
   <!--  -->
   <?PHP 
    #KALKULASI 
    $cpf_disnr_vfhead01_sw = $CL_Q("$SL DISTINCT idmain_inap_01 FROM Citarum.dbo.tb_cpf01_form_01_head WHERE head_tglinput_01 BETWEEN '$TG01' AND '$TG02 23:59:00' AND idmain_keg_03='$IDKEG03'");
    $cpf_disnr_vfhead01_sww = $CL_NR($cpf_disnr_vfhead01_sw); #DATA DIS INAP
    $cpf_totcp_vfhead01_sw = $CL_Q("$SL SUM(head_tot_01) as tot_cp FROM Citarum.dbo.tb_cpf01_form_01_head WHERE head_tglinput_01 BETWEEN '$TG01' AND '$TG02 23:59:00' AND idmain_keg_03='$IDKEG03' ");
    $cpf_totcp_vfhead01_sww = $CL_FAS($cpf_totcp_vfhead01_sw); #DATA SUM TOTAL CP head
    #KALKULASI TOTAL
    $hit_totcp_vfhead_sw_prc = 100 / 100 * 100;
    $hit_totcp_vfhead_sw_prc02 = $cpf_totcp_vfhead01_sww['tot_cp'] / $cpf_disnr_vfhead01_sww;
    $hit_totcp_vfhead_sw = $hit_totcp_vfhead_sw_prc02 / 5 * $hit_totcp_vfhead_sw_prc;
    
    #KALKULASI NUMERATOR / DENOM 
    $cpf_totkal_ls_vform01_sw = $CL_Q("$SL SUM(form_nilai_01) as totform FROM Citarum.dbo.tb_cpf01_form_01 WHERE form_tglinput_01 BETWEEN '$TG01' AND '$TG02 23:59:00' AND idmain_keg_03='$IDKEG03' ");
    $cpf_totkal_ls_vform01_sww = $CL_FAS($cpf_totkal_ls_vform01_sw);
    $cpf_kaldenum_ls_vform01_sww = $cpf_vkeg03_sww02['keg_rawat_03'] * $cpf_disnr_vfhead01_sww;
    $cpf_kal_ls_vform01_sww = $cpf_totkal_ls_vform01_sww['totform'] / $cpf_kaldenum_ls_vform01_sww;
    $cpf_kal02_ls_vform01_sww = $cpf_kal_ls_vform01_sww * 100;
    #echo ceil($cpf_kal02_ls_vform01_sww);
    
?>
    <h4>
        <?PHP 
            echo "Total CP  = ".$cpf_disnr_vfhead01_sww."";
            echo"<br>";
            #echo "N/D * 100  = ".$cpf_totkal_ls_vform01_sww['totform']." : ".$cpf_kaldenum_ls_vform01_sww."<span class='badge bg-info'>".ceil($cpf_kal02_ls_vform01_sww)."%</span>";
            echo "Numerator = ".$cpf_totkal_ls_vform01_sww['totform'];
            echo"<br>";
            echo "Denom = ".$cpf_kaldenum_ls_vform01_sww;
            echo"<hr>";
            echo"<span class='badge bg-info'>".ceil($cpf_kal02_ls_vform01_sww)."%</span>";
            echo"<br>";
            #DATA KAL FORM HEAD
        $cpf_lskal_vfhead01_sw = $CL_Q("$SL DISTINCT idmain_keg_01  FROM Citarum.dbo.tb_cpf01_form_01_head WHERE head_tglinput_01 BETWEEN '$TG01' AND '$TG02 23:59:00' AND idmain_keg_03='$IDKEG03' ");
        while($cpf_lskal_vfhead01_sww = $CL_FAS($cpf_lskal_vfhead01_sw)){
            #DATA KEG01
            $cpf_lskal_vkeg01_sw = $CL_Q("$SL idmain_keg_01,keg_nama_01 FROM Citarum.dbo.tb_cpf01_keg_01 WHERE idmain_keg_01='$cpf_lskal_vfhead01_sww[idmain_keg_01]' order by keg_urut_01 asc");
            $cpf_lskal_vkeg01_sww = $CL_FAS($cpf_lskal_vkeg01_sw);
        #DATA SUM
        $cpf_sum_vfhead01_sw = $CL_Q("$SL SUM(head_tot_01) as sum_tot01 FROM Citarum.dbo.tb_cpf01_form_01_head WHERE idmain_keg_01='$cpf_lskal_vfhead01_sww[idmain_keg_01]' AND head_tglinput_01 BETWEEN '$TG01' AND '$TG02 23:59:00' AND idmain_keg_03='$IDKEG03'  ");
        $cpf_sum_vfhead01_sww = $CL_FAS($cpf_sum_vfhead01_sw);
            #HIT AND RUN
            $cpf_htot_prc = 1 / 100 * 100;
            $cpf_htot_vcp01_sw =  $cpf_sum_vfhead01_sww['sum_tot01'] /  $cpf_disnr_vfhead01_sww *   $cpf_htot_prc;
              #echo $cpf_lskal_vkeg01_sww['keg_nama_01']." <span class='badge bg-success'> ".ceil($cpf_htot_vcp01_sw)."%</span>";

            #KALKULASI Numerator / Denom Per Sub kasus

            /*
            if($cpf_htot_vcp01_sw > 85){
                echo $cpf_lskal_vkeg01_sww['keg_nama_01']." <span class='badge bg-success'> ".ceil($cpf_htot_vcp01_sw)."%</span>";
            echo"<br>";
            }elseif($cpf_htot_vcp01_sw > 70){
            echo $cpf_lskal_vkeg01_sww['keg_nama_01']." <span class='badge bg-warning'> ".ceil($cpf_htot_vcp01_sw)."%</span>";
            echo"<br>";
             }elseif($cpf_htot_vcp01_sw > 0){
            echo $cpf_lskal_vkeg01_sww['keg_nama_01']." <span class='badge bg-danger'> ".ceil($cpf_htot_vcp01_sw)."%</span>";
            echo"<br>";
            } */
        }
         ?>

    </h4>
   <!--  -->
  </div>
</div>

<br>
<table class="table table-sm table-striped table-bordered">
    <tr class="table-dark">
        <td width="12%">CP</td>
        <td width="40%">Penunjang</td>
        <td>UPLOADER</td>
    </tr>
    <?php
     #KALKULASI
     $cpf_data_vfhead01_sw = $CL_Q(" $SL DISTINCT  idmain_inap_01 FROM  Citarum.dbo.tb_cpf01_form_01_head WHERE head_tglinput_01 BETWEEN '$TG01' AND '$TG02 23:59:00' AND idmain_keg_03='$IDKEG03' ");
     while($cpf_data_vfhead01_sww = $CL_FAS($cpf_data_vfhead01_sw)){
        #UPLOADER CPF HEAD
        $cpf_upl_vfhead01_sw = $CL_Q("$SL idmain_cpf01_form_01_head,uploader FROM Citarum.dbo.tb_cpf01_form_01_head WHERE idmain_inap_01='$cpf_data_vfhead01_sww[idmain_inap_01]'");
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
                   $cpf_ls_vkeg01_sw = $CL_Q("$SL idmain_keg_01 FROM Citarum.dbo.tb_cpf01_form_01_head WHERE idmain_inap_01='$cpf_data_vfhead01_sww[idmain_inap_01]'");
                    while($cpf_ls_vkeg01_sww = $CL_FAS($cpf_ls_vkeg01_sw)){ #DATA KEG
                    #KEG 01
                    $cpf_ls02_vkeg01_sw = $CL_Q("$SL idmain_keg_01,keg_nama_01 FROM Citarum.dbo.tb_cpf01_keg_01 WHERE idmain_keg_01='$cpf_ls_vkeg01_sww[idmain_keg_01]' order by keg_urut_01 asc");  
                     $cpf_ls02_vkeg01_sww = $CL_FAS($cpf_ls02_vkeg01_sw);

                $cpf_ls_vfhead01_sw = $CL_Q(" $SL idmain_cpf01_form_01_head,idmain_inap_01,head_kode_01,head_tot_01,head_tot02_02,head_tglinput_01,head_status_01,idmain_keg_03,idmain_keg_01,uploader FROM  Citarum.dbo.tb_cpf01_form_01_head WHERE head_tglinput_01 BETWEEN '$TG01' AND '$TG02 23:59:00' AND idmain_keg_03='$IDKEG03' AND idmain_inap_01='$cpf_data_vfhead01_sww[idmain_inap_01]' AND idmain_keg_01='$cpf_ls_vkeg01_sww[idmain_keg_01]' ");
                    $cpf_ls_vfhead01_sww = $CL_FAS($cpf_ls_vfhead01_sw);

                        echo"<i class='fas fa-file-medical'></i>  $cpf_ls02_vkeg01_sww[keg_nama_01] ";
                        echo "<span class='badge bg-info'><b>".$cpf_ls_vfhead01_sww['head_tot_01']."%</b> </span>";
                        echo"<br>";
                    }

                ?>
            <!--  -->
        </td>
        <td><?PHP echo $cpf_upl_vusr01_sww['namauser']  ?></td>
    </tr>
    <?PHP } ?>
</table>
<?PHP } ?>