<b><i class="fas fa-folder-open"></i>Display Tempat Tidur</b>
<hr>
<table class="table table-sm table-bordered table-striped">
    <tr class="table-dark">
        <td>RUANG</td>
        <td>Kapasitas</td>
        <td>Terpakai</td>
        <td>Tersedia</td>
    </tr>
    <?PHP 
        $epwc_ls_vtt01_sw = $CL_Q("$CL_SL Citarum.dbo.VTmpTidurWeb order by RuangKode, NomorKamar asc");
            while($epwc_ls_vtt01_sww = $CL_FAS($epwc_ls_vtt01_sw)){
    ?>
    <tr>
        <td><?PHP echo $epwc_ls_vtt01_sww['Kamar'] ?></td>
        <td><?PHP echo $epwc_ls_vtt01_sww['DayaTampung'] ?></td>
        <td><?PHP echo $epwc_ls_vtt01_sww['JmlTerisi'] ?></td>
        <td><?PHP echo $epwc_ls_vtt01_sww['JmlKosong'] ?></td>
    </tr>
    <?PHP } ?>
</table> 