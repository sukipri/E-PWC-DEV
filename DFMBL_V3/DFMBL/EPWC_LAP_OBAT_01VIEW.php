<b><i class="fas fa-folder-open"></i>OBAT</b>
<form method="post">
<div class="input-group mb-3" style="max-width:36rem;">
        <input type="date" class="form-control" name="tg01" required value="<?PHP echo $DATE_HTML5_SQL ?>">
        <input type="date" class="form-control" name="tg02" required value="<?PHP echo $DATE_HTML5_SQL ?>">
       <!-- <select name="jns01" class="form-control" required>
        <option value="">Acuan</option>
        <option value="PrshKode">PENANGGUNG</option>
        <option value="Poli">Poli</option>
        </select> -->
        <button class="btn btn-success btn-sm" name="btn_cari_01">CARI DATA</button>
        </div>

</form>
<hr>
<?PHP 
        if(isset($_POST['btn_cari_01'])){
            $tg01 = @$SQL_SL($_POST['tg01']);
            $tg02 = @$SQL_SL($_POST['tg02']);  
    ?>
 <?PHP echo"<b>INVTERVAL <i>".FS_DATE($tg01)." - ". FS_DATE($tg02)."</i></b>"; ?> 
<h5 class="badge bg-info">GRAFIK OBAT PASIEN  ( *Tanpa Pasien Non Resep )</h5>
<table class="table table-sm table-striped table-bordered">
    <tr class="table-dark">
        <td width="15%">UNIT</td>
        <td align="center">LEMBAR</td>
        <td align="center">RESEP</td>
    </tr>
    <?PHP 
       $epwc_vdepo01_sw = $CL_Q("$SL DISTINCT UnitDepoKet FROM Citarum.dbo.VObatKmrJmlResep WHERE NOT PasienNomorRM='Pasien Luar' AND  ObatKmrTanggal BETWEEN '$tg01' AND '$tg02 23:59'");
       while($epwc_vdepo01_sww = $CL_FAS($epwc_vdepo01_sw)){
        $epwc_vdepo01_sw02 = $CL_Q("$SL UnitDepo,UnitDepoKet FROM Citarum.dbo.VObatKmrJmlResep WHERE  NOT PasienNomorRM='Pasien Luar' AND   ObatKmrTanggal BETWEEN '$tg01' AND '$tg02 23:59' AND UnitDepoKet='$epwc_vdepo01_sww[UnitDepoKet]'");
            $epwc_vdepo01_sww02 = $CL_FAS($epwc_vdepo01_sw02);
            #DATA LEMBAR
            $epwc_vrsp01_sw = $CL_Q("$SL DISTINCT PasienNomorRM FROM Citarum.dbo.VObatKmrJmlResep WHERE  NOT PasienNomorRM='Pasien Luar' AND ObatKmrTanggal BETWEEN '$tg01' AND '$tg02 23:59' AND UnitDepoKet='$epwc_vdepo01_sww[UnitDepoKet]'  ");
                $epwc_nr_vrsp01_sww = $CL_NR($epwc_vrsp01_sw);
            #DATA RESEP
            $epwc_vrsp01_sw02 = $CL_Q("$SL  ObatKmrNomor FROM Citarum.dbo.VObatKmrJmlResep WHERE NOT PasienNomorRM='Pasien Luar' AND  ObatKmrTanggal BETWEEN '$tg01' AND '$tg02 23:59' AND UnitDepoKet='$epwc_vdepo01_sww[UnitDepoKet]' ");
                $epwc_nr_vrsp01_sww02 = $CL_NR($epwc_vrsp01_sw02);
                #KALKULATION NEW
                #$epwc_case_vrsp01_sw02 = $CL_Q(SELECT CASE WHEN ObatKmrNoReg = 'PASIEN LUAR' THEN ObatKmrNomor ELSE PasienNomorRM END as case_jum FROM VObatKmrJmlResep WHERE ObatKmrTanggal BETWEEN '3/3/2023' AND '3/3/2023 23:59' AND ObatKmrJenis = 'J' AND UnitDepoKet='$epwc_vdepo01_sww[UnitDepoKet]' GROUP BY CASE WHEN ObatKmrNoReg = 'PASIEN LUAR' THEN ObatKmrNomor ELSE PasienNomorRM END );
                #$epwc_case_vrsp01_sww02 = $Cl_FA($epwc_case_vrsp01_sw02);
                #KONVERSI
                $epwc_nr_vrsp01_sww_prc =  $epwc_nr_vrsp01_sww / 10;
                $epwc_nr_vrsp01_sww02_prc =  $epwc_nr_vrsp01_sww02 / 10;
    ?>
    <tr>
        <td><?PHP echo $epwc_vdepo01_sww02['UnitDepoKet'] ?></td>
        <td>
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="1000" style="width: <?PHP echo  $epwc_nr_vrsp01_sww_prc."%" ?>;"></div>
            <span class="badge bg-dark"><?PHP echo $epwc_nr_vrsp01_sww ?></span>
        </div>
        <?PHP #echo $epwc_case_vrsp01_sww02['case_jum'] ?>
        </td>
        <td>
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="1000" style="width: <?PHP echo  $epwc_nr_vrsp01_sww02_prc."%" ?>;"></div>
            <span class="badge bg-dark"><?PHP echo $epwc_nr_vrsp01_sww02 ?></span>
        </div>
        </td>
    </tr>
    <?PHP } ?>
</table>
<br>
<?PHP //include"EPWC_LAP_OBAT_02VIEW.php"; ?>
<?PHP } ?>