<b><i class="fas fa-folder-open"></i>RAWAT JALAN PIUTANG</b>
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
<h5 class="badge bg-info">GRAFIK TABEL OMZET RJ</h5>
<table class="table table-sm table-bordered table-striped">
<tr class="table-dark">
    <td width="22%">ASURANSI</td>
    <td>Piutang</td>
</tr>
<?php
    $epwc_vfin01_sw = $CL_Q("$SL DISTINCT PrshKode FROM Citarum.dbo.VJalanPiutangMnj WHERE JalanTanggal BETWEEN '$tg01' AND '$tg02 23:59'");
        while($epwc_vfin01_sww = $CL_FAS($epwc_vfin01_sw)){
            #DATA PRSH
            $epwc_prsh_vfin01_sw = $CL_Q("$SL JalanNomor,PrshNama FROM Citarum.dbo.VJalanPiutangMnj WHERE PrshKode='$epwc_vfin01_sww[PrshKode]' AND JalanTanggal BETWEEN '$tg01' AND '$tg02 23:59'  ");
            $epwc_prsh_vfin01_sww = $CL_FAS($epwc_prsh_vfin01_sw);
            #DATA KALKULASI
            $epwc_sum_vfin01_sw = $CL_Q("$SL SUM(JalanAsuransi) as sum_asu FROM Citarum.dbo.VJalanPiutangMnj WHERE PrshKode='$epwc_vfin01_sww[PrshKode]' AND JalanTanggal BETWEEN '$tg01' AND '$tg02 23:59' ");
            $epwc_sum_vfin01_sww = $CL_FAS($epwc_sum_vfin01_sw);
?>
<tr>
    <td><?PHP echo  $epwc_prsh_vfin01_sww['PrshNama'] ?></td>
    <td align="right"><?PHP echo  "Rp.".$NF($epwc_sum_vfin01_sww['sum_asu']); ?></td>
</tr>
<?PHP } 
#DATA KALKULASI
$epwc_tot_vfin01_sw = $CL_Q("$SL SUM(JalanAsuransi) as sum_tot FROM Citarum.dbo.VJalanPiutangMnj WHERE  JalanTanggal BETWEEN '$tg01' AND '$tg02 23:59' ");
$epwc_tot_vfin01_sww = $CL_FAS($epwc_tot_vfin01_sw);
?>
<tr>
    <td>TOTAL</td>
    <td align="right"><b><?PHP echo "Rp".$NF($epwc_tot_vfin01_sww['sum_tot']); ?></b></td>
</tr>
</table>
<br>
<?PHP include"EPWC_LAP_FIN_02VIEW.php"; ?>
<br>
<?PHP include"EPWC_LAP_FIN_03VIEW.php"; ?>
<?PHP } ?>