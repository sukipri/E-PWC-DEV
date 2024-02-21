<b><i class="fas fa-folder-open"></i>RADIOLOGI</b>
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
<span class="badge bg-info">GRAFIK TABEL RADIOLOGI RS PWC</span>
<br><br>
<table class="table table-sm table-bordered table-striped">
<tr class="table-dark">
    <td width="20%">RAWAT</td>
    <td>-</td>
</tr>
<?PHP 
    $epwc_jns_vrad01_sw = $CL_Q("$SL DISTINCT RadJenis FROM  Citarum.dbo.VperiksaRad WHERE (RadJenis='I' OR RadJenis='J') AND  RadTanggal BETWEEN '$tg01' AND '$tg02 23:59' ");
        while($epwc_jns_vrad01_sww = $CL_FAS($epwc_jns_vrad01_sw)){
?>
<tr>
    <td>
        <?PHP 
            if($epwc_jns_vrad01_sww['RadJenis']=="I"){
                echo"<b>INAP</b>";
            }elseif($epwc_jns_vrad01_sww['RadJenis']=="J"){
                echo"<b>JALAN</b>";
            }
        ?>
    </td>
    <td>
        <?PHP 
            $epwc_bpjs_vrad01_sw = $CL_Q("$SL RadJenis,PrshKode,PrshNama FROM  Citarum.dbo.VPeriksaRad WHERE RadTanggal BETWEEN '$tg01' AND '$tg02 23:59' AND RadJenis='$epwc_jns_vrad01_sww[RadJenis]' AND PrshKode='1-0113' ");
                $epwc_bpjs_nr_vrad01_sww = $CL_NR($epwc_bpjs_vrad01_sw);
                $epwc_prd_vrad01_sw = $CL_Q("$SL RadJenis,PrshKode,PrshNama FROM  Citarum.dbo.VPeriksaRad WHERE RadTanggal BETWEEN '$tg01' AND '$tg02 23:59' AND RadJenis='$epwc_jns_vrad01_sww[RadJenis]' AND NOT PrshKode='1-0113' ");
                $epwc_prd_nr_vrad01_sww = $CL_NR($epwc_prd_vrad01_sw);
                #KALKULATION
                $epwc_bpjs_nr_vrad01_sww_prc = $epwc_bpjs_nr_vrad01_sww / 10;
                $epwc_prd_nr_vrad01_sww_prc = $epwc_prd_nr_vrad01_sww / 10;

        ?>
        <span class="badge bg-info">BPJS</span>
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?PHP echo" $epwc_bpjs_nr_vrad01_sww_prc%"; ?>;"></div>
            <span class="badge bg-dark"><?PHP echo" $epwc_bpjs_nr_vrad01_sww"; ?></span>
        </div>
        <?PHP 
            #RADIOLOGI BPJS
            $epwc_vname_vrad01_sw = $CL_Q("$SL DISTINCT VarNama FROM Citarum.dbo.VPeriksaRad WHERE RadTanggal BETWEEN '$tg01' AND '$tg02 23:59' AND PrshKode='1-0113'");
                while($epwc_vname_vrad01_sww = $CL_FAS($epwc_vname_vrad01_sw)){
                    $epwc_vname_vrad01_sw02 = $CL_Q("$SL  VarNama FROM Citarum.dbo.VPeriksaRad WHERE RadTanggal BETWEEN '$tg01' AND '$tg02 23:59' AND RadJenis='$epwc_jns_vrad01_sww[RadJenis]' AND  PrshKode='1-0113' AND VarNama='$epwc_vname_vrad01_sww[VarNama]'");
                     $epwc_nr_vname_vrad01_sww02 = $CL_NR($epwc_vname_vrad01_sw02);
                        echo"$epwc_vname_vrad01_sww[VarNama]";
                        echo" <span class='badge bg-dark'>$epwc_nr_vname_vrad01_sww02</span>";
                        echo"<br>";
                    ?>
                
         <?PHP } ?>
        <hr>
        <span class="badge bg-secondary">UMUM</span>
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?PHP echo" $epwc_prd_nr_vrad01_sww_prc%"; ?>;"></div>
            <span class="badge bg-dark"><?PHP echo" $epwc_prd_nr_vrad01_sww"; ?></span>
        </div>
        <?PHP 
            #RADIOLOGI UMUM
            $epwc02_vname_vrad01_sw = $CL_Q("$SL DISTINCT VarNama FROM Citarum.dbo.VPeriksaRad WHERE RadTanggal BETWEEN '$tg01' AND '$tg02 23:59' AND NOT  PrshKode='1-0113'");
                while($epwc02_vname_vrad01_sww = $CL_FAS($epwc02_vname_vrad01_sw)){
                    $epwc02_vname_vrad01_sw02 = $CL_Q("$SL  VarNama FROM Citarum.dbo.VPeriksaRad WHERE RadTanggal BETWEEN '$tg01' AND '$tg02 23:59' AND RadJenis='$epwc_jns_vrad01_sww[RadJenis]' AND NOT  PrshKode='1-0113' AND VarNama='$epwc02_vname_vrad01_sww[VarNama]'");
                     $epwc02_nr_vname_vrad01_sww02 = $CL_NR($epwc02_vname_vrad01_sw02);
                        echo"$epwc02_vname_vrad01_sww[VarNama]";
                        echo" <span class='badge bg-dark'>$epwc02_nr_vname_vrad01_sww02</span>";
                        echo"<br>";
                    ?>
                
         <?PHP } ?>
    </td>
</tr>
<?PHP } ?>
</table>
<?PHP } ?>