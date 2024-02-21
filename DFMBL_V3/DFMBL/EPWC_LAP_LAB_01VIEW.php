<b><i class="fas fa-folder-open"></i>LABORAT</b>
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
<span class="badge bg-info">GRAFIK LABORAT RS PWC</span>
<br><br>
<table class="table table-sm table-bordered table-striped">
<tr class="table-dark">
    <td width="20%">RAWAT</td>
    <td>-</td>
</tr>
<?PHP 
    $epwc_jn_vlab01_sw = $CL_Q("$SL DISTINCT LabJenis FROM Citarum.dbo.VPeriksaLab WHERE LabTanggal BETWEEN '$tg01' AND '$tg02 23:59'") ;
        while($epwc_jn_vlab01_sww = $CL_FAS($epwc_jn_vlab01_sw)){
?>
<tr>
    <td>
        <?PHP if($epwc_jn_vlab01_sww['LabJenis']=="I"){ echo"INAP"; }elseif($epwc_jn_vlab01_sww['LabJenis']=="J"){echo"JALAN";} ?>
    </td>
    <td>
        <?PHP 
            #BPJS
            $epwc_vlab01_sw = $CL_Q("$SL PrshKode,PrshNama,LabJenis FROM Citarum.dbo.VPeriksaLab WHERE LabTanggal BETWEEN '$tg01' AND '$tg02 23:59' AND LabJenis='$epwc_jn_vlab01_sww[LabJenis]' AND PrshKode='1-0113' ") ;
                $epwc_nr_vlab01_sww = $CL_NR($epwc_vlab01_sw);
            $epwc_vlab01_sw02 = $CL_Q("$SL PrshKode,PrshNama,LabJenis FROM Citarum.dbo.VPeriksaLab WHERE LabTanggal BETWEEN '$tg01' AND '$tg02 23:59' AND LabJenis='$epwc_jn_vlab01_sww[LabJenis]' AND NOT  PrshKode='1-0113' ") ;
                $epwc_nr_vlab01_sww02 = $CL_NR($epwc_vlab01_sw02);
                $epwc_nr_vlab01_sww_prc = $epwc_nr_vlab01_sww / 10;
                $epwc_nr_vlab01_sww02_prc = $epwc_nr_vlab01_sww02 / 10;
        ?>
        <b>BPJS</b>
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?PHP echo"$epwc_nr_vlab01_sww_prc%"; ?>;"></div>
            <span class="badge bg-dark"><?PHP echo"$epwc_nr_vlab01_sww"; ?></span>
        </div>
        <b>UMUM</b>
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?PHP echo" $epwc_nr_vlab01_sww02_prc%"; ?>;"></div>
            <span class="badge bg-dark"><?PHP echo"$epwc_nr_vlab01_sww02"; ?></span>
        </div>

    </td>
</tr>
<?PHP } ?>
</table>
<?PHP } ?>