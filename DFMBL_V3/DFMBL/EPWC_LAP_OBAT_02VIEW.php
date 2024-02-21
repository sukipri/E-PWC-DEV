<h5 class="badge bg-info">GRAFIK OBAT PASIEN LUAR</h5>
<table class="table table-sm table-striped table-bordered">
    <tr class="table-dark">
        <td width="15%">UNIT</td>
        <td align="center">LEMBAR</td>
        <td align="center">RESEP</td>
    </tr>
    <?PHP 
       $epwc02_vdepo01_sw = $CL_Q("$SL DISTINCT UnitDepoKet FROM Citarum.dbo.VObatKmrJmlResep WHERE  ObatKmrTanggal BETWEEN '$tg01' AND '$tg02 23:59'");
       while($epwc02_vdepo01_sww = $CL_FAS($epwc02_vdepo01_sw)){
        $epwc02_vdepo01_sw02 = $CL_Q("$SL UnitDepo,UnitDepoKet FROM Citarum.dbo.VObatKmrJmlResep WHERE PasienNomorRM='Pasien Luar' AND  ObatKmrTanggal BETWEEN '$tg01' AND '$tg02 23:59' AND UnitDepoKet='$epwc02_vdepo01_sww[UnitDepoKet]'");
            $epwc02_vdepo01_sww02 = $CL_FAS($epwc02_vdepo01_sw02);
            #DATA LEMBAR
            $epwc02_vrsp01_sw = $CL_Q("$SL DISTINCT ObatKmrNomor FROM Citarum.dbo.VObatKmrJmlResep WHERE PasienNomorRM='Pasien Luar' AND ObatKmrTanggal BETWEEN '$tg01' AND '$tg02 23:59' AND UnitDepoKet='$epwc02_vdepo01_sww[UnitDepoKet]'  ");
                $epwc02_nr_vrsp01_sww = $CL_NR($epwc02_vrsp01_sw);
            #DATA RESEP
            $epwc02_vrsp01_sw02 = $CL_Q("$SL  ObatKmrNomor FROM Citarum.dbo.VObatKmrJmlResep WHERE PasienNomorRM='Pasien Luar' AND ObatKmrTanggal BETWEEN '$tg01' AND '$tg02 23:59' AND UnitDepoKet='$epwc02_vdepo01_sww[UnitDepoKet]' ");
                $epwc02_nr_vrsp01_sww02 = $CL_NR($epwc02_vrsp01_sw02);
                #KALKULATION NEW
                #$epwc02_case_vrsp01_sw02 = $CL_Q(SELECT CASE WHEN ObatKmrNoReg = 'PASIEN LUAR' THEN ObatKmrNomor ELSE PasienNomorRM END as case_jum FROM VObatKmrJmlResep WHERE ObatKmrTanggal BETWEEN '3/3/2023' AND '3/3/2023 23:59' AND ObatKmrJenis = 'J' AND UnitDepoKet='$epwc02_vdepo01_sww[UnitDepoKet]' GROUP BY CASE WHEN ObatKmrNoReg = 'PASIEN LUAR' THEN ObatKmrNomor ELSE PasienNomorRM END );
                #$epwc02_case_vrsp01_sww02 = $Cl_FA($epwc02_case_vrsp01_sw02);
                #KONVERSI
                $epwc02_nr_vrsp01_sww_prc =  $epwc02_nr_vrsp01_sww / 10;
                $epwc02_nr_vrsp01_sww02_prc =  $epwc02_nr_vrsp01_sww02 / 10;
    ?>
    <tr>
        <td><?PHP echo $epwc02_vdepo01_sww02['UnitDepoKet'] ?></td>
        <td>
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="1000" style="width: <?PHP echo  $epwc02_nr_vrsp01_sww_prc."%" ?>;"></div>
            <span class="badge bg-dark"><?PHP echo $epwc02_nr_vrsp01_sww ?></span>
        </div>
        <?PHP #echo $epwc02_case_vrsp01_sww02['case_jum'] ?>
        </td>
        <td>
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="1000" style="width: <?PHP echo  $epwc02_nr_vrsp01_sww02_prc."%" ?>;"></div>
            <span class="badge bg-dark"><?PHP echo $epwc02_nr_vrsp01_sww02 ?></span>
        </div>
        </td>
    </tr>
    <?PHP } ?>
</table>