<span class="badge bg-primary mx-2">PREVIEW LEMBUR</span>
<br>
<table class="table table-sm table-bordered table-striped mx-2">
    <tr class="table-dark">
        <td width="10%">Bulan</td>
        <td>Tanggal Lembur</td>
        <td>Jumlah Jam</td>
        <td>Uraian</td>
        <td>Alasan</td>
        <td>Target</td>
        <td>Hasil</td>
        <td>STATUS</td>
    </tr>
    <?PHP 
    #DATA LEMBUR
        $epwc_ls_vlem01_sw = $CL_Q("SELECT TOP 20 * FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$IDKRY' order by LemburTanggal desc  ");
            while($epwc_ls_vlem01_sww = $CL_FAS($epwc_ls_vlem01_sw)){
        #DATA TANGGAL LEMBUR
        $epwc_ls02_vlem01_sw = $CL_Q("$SL CONVERT(date,LemburTanggal) as lstgl FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$IDKRY' AND LemburTanggal='$epwc_ls_vlem01_sww[LemburTanggal]' order by LemburTanggal desc"); 
                $epwc_ls02_vlem01_sww = $CL_FAS($epwc_ls02_vlem01_sw);
               
    ?>
    <tr>
        <td><?PHP echo"<a href='?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_IN02&IDKRY=$epwc_ls_vlem01_sww[KaryNomor]&IDLTGL=$epwc_ls02_vlem01_sww[lstgl]&IDLBR01=$epwc_ls_vlem01_sww[LemburID]&UPLMBR01=UPLMBR01'>$epwc_ls_vlem01_sww[LemburBulan]</a>"; ?></td>
        <td><?PHP echo"$epwc_ls02_vlem01_sww[lstgl]"; ?></td>
        <td><?PHP echo"$epwc_ls_vlem01_sww[LemburBiasa]"; ?></td>
        <td><?PHP echo"$epwc_ls_vlem01_sww[LemburUraian]"; ?></td>
        <td><?PHP echo"$epwc_ls_vlem01_sww[LemburAlasan]"; ?></td>
        <td><?PHP echo"$epwc_ls_vlem01_sww[LemburTarget]"; ?></td>
        <td><?PHP echo"$epwc_ls_vlem01_sww[LemburHasil]"; ?></td>
        <td>
            <?PHP
                if($epwc_ls_vlem01_sww['LemburApp']=="1"){
                    echo"<span class='badge bg-info'>Belum Verif</span>";
                }elseif($epwc_ls_vlem01_sww['LemburApp']=="2"){
                    echo"<span class='badge bg-success'>Sudah Verif</span>";
                }
            ?>
        </td>
    </tr>
                <?PHP } ?>
</table>