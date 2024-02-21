<b><i class="fas fa-folder-open"></i>RAWAT INAP</b>
<h5 class="badge bg-info">GRAFIK TABEL OMZET RI</h5>
<table class="table table-sm table-bordered table-striped">
<tr class="table-dark">
    <td width="22%">ASURANSI</td>
    <td>Tunai</td>
    <td>Piutang</td>
</tr>
<?php
    $epwc02_vfin01_sw = $CL_Q("$SL DISTINCT PrshKode FROM Citarum.dbo.VInapMnj WHERE InapBayarTgl BETWEEN '$tg01' AND '$tg02 23:59'");
        while($epwc02_vfin01_sww = $CL_FAS($epwc02_vfin01_sw)){
            #DATA PRSH
            $epwc02_prsh_vfin01_sw = $CL_Q("$SL InapNoAdmisi,PrshNama FROM Citarum.dbo.VInapMnj WHERE PrshKode='$epwc02_vfin01_sww[PrshKode]' AND InapBayarTgl BETWEEN '$tg01' AND '$tg02 23:59'  ");
            $epwc02_prsh_vfin01_sww = $CL_FAS($epwc02_prsh_vfin01_sw);
            #DATA KALKULASI LUNAS
            $epwc02_sum_vfin01_sw = $CL_Q("$SL SUM(InapLunas) as sum_lunas FROM Citarum.dbo.VInapMnj WHERE PrshKode='$epwc02_vfin01_sww[PrshKode]' AND InapBayarTgl BETWEEN '$tg01' AND '$tg02 23:59' ");
            $epwc02_sum_vfin01_sww = $CL_FAS($epwc02_sum_vfin01_sw);
            #DATA KALKULASI PIUTANG
            $epwc02_sum02_vfin01_sw = $CL_Q("$SL SUM(InapTagihan) as sum_tagih FROM Citarum.dbo.VInapMnj WHERE PrshKode='$epwc02_vfin01_sww[PrshKode]' AND InapBayarTgl BETWEEN '$tg01' AND '$tg02 23:59' ");
            $epwc02_sum02_vfin01_sww = $CL_FAS($epwc02_sum02_vfin01_sw);
?>
<tr>
    <td><?PHP echo  $epwc02_prsh_vfin01_sww['PrshNama'] ?></td>
    <td align="right"><?PHP echo  "Rp.".$NF($epwc02_sum_vfin01_sww['sum_lunas']); ?></td>
    <td align="right"><?PHP echo  "Rp.".$NF($epwc02_sum02_vfin01_sww['sum_tagih']); ?></td>
</tr>
<?PHP } 
#DATA KALKULASI LUNAs
$epwc02_tot_vfin01_sw = $CL_Q("$SL SUM(InapLunas) as sum_tot_lunas FROM Citarum.dbo.VInapMnj WHERE  InapBayarTgl BETWEEN '$tg01' AND '$tg02 23:59' ");
$epwc02_tot_vfin01_sww = $CL_FAS($epwc02_tot_vfin01_sw);
#DATA KALKULASI PIUTANG
$epwc02_tot02_vfin01_sw = $CL_Q("$SL SUM(InapTagihan) as sum_tot_tagih FROM Citarum.dbo.VInapMnj WHERE  InapBayarTgl BETWEEN '$tg01' AND '$tg02 23:59' ");
$epwc02_tot02_vfin01_sww = $CL_FAS($epwc02_tot02_vfin01_sw);
?>
<tr>
    <td>TOTAL</td>
    <td align="right"><b><?PHP echo "Rp".$NF($epwc02_tot_vfin01_sww['sum_tot_lunas']); ?></b></td>
    <td align="right"><b><?PHP echo "Rp".$NF($epwc02_tot02_vfin01_sww['sum_tot_tagih']); ?></b></td>
</tr>
</table>