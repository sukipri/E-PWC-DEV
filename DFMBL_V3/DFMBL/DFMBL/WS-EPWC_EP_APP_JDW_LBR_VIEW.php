<table class="table table-sm table-bordered table-striped ">
    <tr class="table-info">
        <td width="3%">#</td>
        <td width="15%">Tanggal Entri</td>
        <td width="15%">Tanggal Lembur</td>
        <td width="20%">KET</td>
        <td width="20%" align="center">Lembur</td>
    </tr>
    <?PHP 
        $open_ctr_plbr_no = 1;
        $open_ctr_vlbr01_sw = $CL_Q("$CL_SL Citarum.dbo.tb_tj_prs_lbr_01 WHERE  KaryNomortj='$IDEMP02'  order by plbr_tglinput_01 desc");
        $open_ctr_nr_vlbr01_sw = $CL_NR($open_ctr_vlbr01_sw);
            while($open_ctr_vlbr01_sww = $CL_FAS($open_ctr_vlbr01_sw)){
                #DATA KARYAWAN
                $open_tj_vkry01_sw = $CL_Q("$SL ID,Per_Code,Per_Name FROM TJ_Main_Data.dbo.HR_Personnel WHERE Per_Code='$open_ctr_vlbr01_sww[KaryNomortj]'");
                    $open_tj_vkry01_sww = $CL_FAS($open_tj_vkry01_sw);
    ?>
    <tr>
        <td><?PHP echo $open_ctr_plbr_no; ?>
            <input type="hidden" name="<?PHP echo"ep_idmain_plbr_01$open_ctr_plbr_no"; ?>" value="<?PHP echo $open_ctr_vlbr01_sww['idmain_plbr_01']; ?>">
            </td>
        <td><?PHP echo  FS_DATE($open_ctr_vlbr01_sww['plbr_tglinput_01']); ?></td>
        <td><?PHP echo  FS_DATE($open_ctr_vlbr01_sww['plbr_tglmasuk_01']); ?></td>
        <td><i><?PHP echo $open_tj_vkry01_sww['Per_Code']; ?></i>
                <br>
             <?PHP echo $open_tj_vkry01_sww['Per_Name']; ?>
             <br>
             <?PHP 
                    if($open_ctr_vlbr01_sww['plbr_status_01']=="1"){
                  ?>
                    <span class="badge bg-primary">Terkirim (Menunggu Approve Direksi)</span>
                    <?PHP }elseif($open_ctr_vlbr01_sww['plbr_status_01']=="2"){ ?>
                          <span class="badge bg-warning">Terkirim (Menunggu Approve SDM)</span>
                      <?PHP }elseif($open_ctr_vlbr01_sww['plbr_status_01']=="4"){ ?>
                        <span class="badge bg-success">Terkonfirmasi</span>
                        <?PHP } ?>
        </td>
        <td align="center"><?PHP echo $open_ctr_vlbr01_sww['plbr_jmljam_01']." Jam";  ?></td>
    </tr>
    <?PHP $open_ctr_plbr_no++; }  ?>
    <?PHP 
        $open_ctr_tot_vlbr01_sw = $CL_Q("$SL SUM(plbr_jmljam_01) as tot_jmljam FROM Citarum.dbo.tb_tj_prs_lbr_01 WHERE plbr_status_01='4' AND  KaryNomortj='$IDEMP02'");
        $open_ctr_tot_vlbr01_sww = $CL_FAS($open_ctr_tot_vlbr01_sw);
    ?>
    <tr class="table-dark">
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td align="center"><b><?PHP echo $open_ctr_tot_vlbr01_sww['tot_jmljam']; ?></b> Jam</td>
    </tr>
    </table>