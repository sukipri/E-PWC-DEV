<h5>DATA VIEW CP FORM PASIEN *Non Bedah</h5>
<br>
<form method="post">
<div class="input-group mb-3" style="max-width:40rem;">
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

?>
<?PHP 
    if(isset($_GET['GET_CPF01'])){
?>
<?PHP echo"<h5>INTERVAL ".FS_DATE($TG01)." - ". FS_DATE($TG02)."</h5>"; ?>
<table class="table table-sm table-bordered table-striped">
<tr class="table-dark">
    <td width="3%">#</td>
    <td width="30%">CONTENT</td>
    <td>Nilai</td>
</tr>
<?PHP 
    $cpf_cp_no = 1;
    $cpf_inap_vform01_sw = $CL_Q(" $SL DISTINCT idmain_inap_01 FROM  Citarum.dbo.tb_cpf01_form_01 WHERE form_tglinput_01 BETWEEN '$TG01' AND '$TG02 23:59:00' AND idmain_keg_03='$IDKEG03'");
    $cpf_nr_inap_vform01_sww = $CL_NR($cpf_inap_vform01_sw);
    while($cpf_inap_vform01_sww = $CL_FAS($cpf_inap_vform01_sw)){
        #DATA FORM
        $cpf_vform01_sw = $CL_Q(" $CL_SL  Citarum.dbo.tb_cpf01_form_01 WHERE idmain_inap_01='$cpf_inap_vform01_sww[idmain_inap_01]' ");
            $cpf_vform01_sww = $CL_FAS($cpf_vform01_sw);
        #DATA KEG_03
        $cpf_vkeg03_sw = $CL_Q("$SL idmain_keg_03,keg_nama_03 FROM Citarum.dbo.tb_cpf01_keg_03 WHERE idmain_keg_03='$cpf_vform01_sww[idmain_keg_03]'");
        $cpf_vkeg03_sww = $CL_FAS($cpf_vkeg03_sw);
        #DATA INAP
        $cpf_vinap01_sw = $CL_Q("$SL InapNoAdmisi,InapStatus FROM Citarum.dbo.TRawatInap WHERE InapNoAdmisi='$cpf_vform01_sww[idmain_inap_01]'");
        $cpf_vinap01_sww = $CL_FAS($cpf_vinap01_sw);
        #DATA PASIEN
        $cpf_vpasien01_sw = $CL_Q("$SL PasienNomorRM,PasienNama FROM Citarum.dbo.TPasien WHERE PasienNomorRM='$cpf_vform01_sww[idmain_pasien_01]'");
        $cpf_vpasien01_sww = $CL_FAS($cpf_vpasien01_sw);
            
       

?>
<tr>
    <td><?PHP echo $cpf_cp_no; ?></td>
    <td>
        <?PHP
             echo "<a href=?PG_SA=CPF01_CP_01_FORM&IDADM01=$cpf_inap_vform01_sww[idmain_inap_01]&IDRM01=$cpf_vform01_sww[idmain_pasien_01]&IDKEG03=$cpf_vkeg03_sww[idmain_keg_03]>".$cpf_vform01_sww['idmain_inap_01']."</a>";
             echo"<br>";
             echo $cpf_vform01_sww['idmain_pasien_01']."( $cpf_vpasien01_sww[PasienNama] )";
             echo"<br>";
             echo $cpf_vkeg03_sww['keg_nama_03'];
             echo"<br>";
             #echo $cpf_vform01_sww['idmain_keg_01'];
             echo"<br>";
              //CONDITION JIKA PERSENTASE AKHIR SUDAH TERUPLOAD
        $cpf_cek_vformp01_sw = $CL_Q("$SL idmain_formp_01,formp_tot_01 FROM Citarum.dbo.tb_cpf01_form_01_head_persen WHERE idmain_inap_01='$cpf_inap_vform01_sww[idmain_inap_01]'");
        $cpf_cek_vformp01_sww = $CL_FAS($cpf_cek_vformp01_sw);
        $cpf_nr_cek_vformp01_sww = $CL_NR($cpf_cek_vformp01_sw);
        #PENGKONDISIAN PERSENTASE TOTAL
        if($cpf_nr_cek_vformp01_sww > 0){
            echo"<span class='badge bg-info'>".$cpf_cek_vformp01_sww['formp_tot_01']."%</span>";
        }elseif($cpf_nr_cek_vformp01_sww <= 0){
            echo"";
        }
        ?>

    </td>
    <td>
        <?PHP 
    #KALKULASI
    $cpf_data_vform01_sw = $CL_Q(" $SL DISTINCT idmain_keg_01 FROM   Citarum.dbo.tb_cpf01_form_01 WHERE idmain_inap_01='$cpf_inap_vform01_sww[idmain_inap_01]' ");
        while($cpf_data_vform01_sww = $CL_FAS($cpf_data_vform01_sw)){
            #DATA KEGIATAN
            $cpf_nr_vkeg03rec_sw = $CL_Q("$SL idmain_keg_03_rec,idmain_keg_02,idmain_keg_03,idmain_keg_01 FROM Citarum.dbo.tb_cpf01_keg_03_rec WHERE idmain_keg_03='$cpf_vkeg03_sww[idmain_keg_03]' AND idmain_keg_01='$cpf_data_vform01_sww[idmain_keg_01]'");
            $cpf_nr_vkeg03rec_sww = $CL_NR($cpf_nr_vkeg03rec_sw);
            #DATA PENUNJANG
            $cpf_vkeg01_sw = $CL_Q("$SL idmain_keg_01,keg_nama_01 FROM Citarum.dbo.tb_cpf01_keg_01 WHERE idmain_keg_01='$cpf_data_vform01_sww[idmain_keg_01]' order by keg_urut_01 asc");  
            $cpf_vkeg01_sww = $CL_FAS($cpf_vkeg01_sw);

            //echo $cpf_vform01_sww['idmain_keg_01'];
            #KAL Pem.Penunjang
            $cpf_nr_1_vform01_sw = $CL_Q("$SL SUM(form_nilai02_01) as tot_nilai02 FROM Citarum.dbo.tb_cpf01_form_01  WHERE form_nilai02_01='1' AND idmain_inap_01='$cpf_inap_vform01_sww[idmain_inap_01]' AND idmain_keg_01='$cpf_vkeg01_sww[idmain_keg_01]'");
            $cpf_nr_1_vform01_sww = $CL_FAS($cpf_nr_1_vform01_sw);
        #HIT
            #HIT Pemeriksaan Penunjang 1
            $cpf_hit_penj_01 = $cpf_nr_1_vform01_sww['tot_nilai02'] / $cpf_nr_vkeg03rec_sww * 100 ;
        ?>
        <i class="fas fa-bookmark"></i> 
            <?PHP  if($cpf_hit_penj_01 > 90 ){
                    echo $cpf_vkeg01_sww['keg_nama_01']." | "."<span class='badge bg-success'>". ceil($cpf_hit_penj_01)."%"."</span>";
            }elseif($cpf_hit_penj_01 > 50){
                echo $cpf_vkeg01_sww['keg_nama_01']." | "."<span class='badge bg-warning'>". ceil($cpf_hit_penj_01)."%"."</span>";
            }elseif($cpf_hit_penj_01 < 50){
                echo $cpf_vkeg01_sww['keg_nama_01']." | "."<span class='badge bg-danger'>". ceil($cpf_hit_penj_01)."%"."</span>";
            } 
                  ?> 
        <br>

        <?PHP } ?>
    </td>
</tr>
<?PHP $cpf_cp_no++; }
    $cpf_totpersen_vformp01_sw = $CL_Q("$SL SUM(formp_tot_01) as tot_persen FROM Citarum.dbo.tb_cpf01_form_01_head_persen WHERE idmain_keg_03='$IDKEG03' AND formp_tglinput_01 BETWEEN '$TG01' AND '$TG02'");
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