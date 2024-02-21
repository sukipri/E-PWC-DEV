<b><i class="fas fa-folder-open"></i>RWAT JALAN TUNAI</b>
<h5 class="badge bg-info">GRAFIK TABEL OMZET RI</h5>
<table class="table table-sm table-bordered table-striped">
<tr class="table-dark">
    <td width="22%">Kasir</td>
    <td>Tunai</td>
    
</tr>
<?php
    $epwc_vksr01_sw = $CL_Q("$SL DISTINCT KasirNama FROM Citarum.dbo.VJalanTunaiMnj WHERE KasirTanggal BETWEEN '$tg01' AND '$tg02 23:59' ");
    while($epwc_vksr01_sww = $CL_FAS($epwc_vksr01_sw)){
        $epwc_ksr_vksr01_sw = $CL_Q("$SL KasirJenis,KasirKelompok,KasirNama,KasirNomor,KasirTanggal,KasirTunai FROM Citarum.dbo.VJalanTunaiMnj WHERE KasirNama='$epwc_vksr01_sww[KasirNama]' AND KasirTanggal  BETWEEN '$tg01' AND '$tg02 23:59' ");
        $epwc_ksr_vksr01_sww = $CL_FAS($epwc_ksr_vksr01_sw);
        #SUM KASIR TUNAI
        $epwc_sum_vksr01_sw = $CL_Q("$SL SUM(KasirTunai) as sum_tunai FROM Citarum.dbo.VJalanTunaiMnj WHERE KasirNama='$epwc_vksr01_sww[KasirNama]' AND KasirTanggal  BETWEEN '$tg01' AND '$tg02 23:59'  ");
        $epwc_sum_vksr01_sww = $CL_FAS($epwc_sum_vksr01_sw);

?>
<tr>
    <td><?PHP echo  $epwc_vksr01_sww['KasirNama'] ?></td>
    <td align="right"><?PHP echo  "Rp.".$NF($epwc_sum_vksr01_sww['sum_tunai']); ?></td>
</tr>
<?PHP } 
#TOTAL KASIR
$epwc_tot_vksr01_sw = $CL_Q("$SL SUM(KasirTunai) as tot_tunai FROM Citarum.dbo.VJalanTunaiMnj WHERE KasirTanggal  BETWEEN '$tg01' AND '$tg02 23:59'  ");
$epwc_tot_vksr01_sww = $CL_FAS($epwc_tot_vksr01_sw);
?>
<tr>
    <td>TOTAL</td>
    <td align="right"><b><?PHP echo "Rp".$NF($epwc_tot_vksr01_sww['tot_tunai']); ?></b></td>
</tr>
</table>