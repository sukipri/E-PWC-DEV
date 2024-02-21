<?PHP 
 include"../config/connec_01_srv.php";
 $IDLBULAN01 = @$_GET['IDLBULAN01'];
 $IDKLP01 = @$_GET['IDKLP01'];
 header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=CTK_LEMBUR.xls");
#DATA V LEMBUR
$epwc_vw_vulb01_sw = mssql_query("SELECT DISTINCT Klp FROM Citarum.dbo.VLemburRekap WHERE Klp='$IDKLP01'"); #UNIT
   $epwc_vw_vulb01_sww = mssql_fetch_assoc($epwc_vw_vulb01_sw);
?>
<a class="badge bg-info"><i class="fas fa-folder-open"></i> <?PHP echo"$epwc_vw_vulb01_sww[Klp]"; ?></a>
<table class="table table-sm table-striped table-bordered">
<tr class="table-dark">
        <td width="20%">NAMA</td>
        <td width="10%">Jam Lembur Biasa</td>
        <td>Rupiah Lembur Biasa</td>
        <td>Jam Lembur Jaga Malam </td>
        <td>Rupiah Lembur Malam</td>
        <td>TOTAL LEMBUR</td>
    </tr>
<?PHP 
  $epwc_fs_vulb01_sw = mssql_query("$call_sel  Citarum.dbo.VLemburRekap WHERE LemburBulan = '$IDLBULAN01' AND Klp='$IDKLP01'"); #UNIT
        while($epwc_fs_vulb01_sww = mssql_fetch_assoc($epwc_fs_vulb01_sw)){
            #KALKULASI
            $hit_vlrekap_01 = $epwc_fs_vulb01_sww['LemburJumlah'] - $epwc_fs_vulb01_sww['RupiahLembur'];
   ?>
    <tr>
        <td width="20%"><?PHP echo $epwc_fs_vulb01_sww['KaryNomor']."<br>"."<a href='?HLM=FIN_M&SUB=FIN_M_FIN_LEMBUR&SUB_CHILD=FIN_M_FIN_LEMBUR01_DTL02&IDLBULAN01=$IDLBULAN01&IDEMP01=$epwc_fs_vulb01_sww[KaryNomor]'>".$epwc_fs_vulb01_sww['KaryNama']."</a>" ?></td>
        <td width="10%"><?PHP echo $epwc_fs_vulb01_sww['JamLembur'] ?></td>
        <td width="10%"><?PHP echo number_format($epwc_fs_vulb01_sww['RupiahLembur']); ?></td>
        <td width="10%"><?PHP #echo $epwc_fs_vulb01_sww['LemburJagaMalam'] ?></td>
        <td width="10%"><?PHP #echo number_format($hit_vlrekap_01); ?></td>
        <td width="10%"><?PHP echo number_format($epwc_fs_vulb01_sww['LemburJumlah']); ?></td>
    </tr>
<?PHP } 
          $epwc_tot_vrlb01_sw = mssql_query("SELECT SUM(RupiahLembur) as tot_jml FROM  Citarum.dbo.VLemburRekap WHERE  LemburBulan = '$IDLBULAN01' AND Klp='$IDKLP01'"); #SUM OTAL embur Jumlah
          $epwc_tot_vrlb01_sww = mssql_fetch_assoc($epwc_tot_vrlb01_sw); 
?>
</table>
<a href="#" class="btn btn-dark btn-sm"><i class="fas fa-file-excel"></i> Download Excel</a>
<br><br>
<div class="alert alert-dismissible alert-success">
  <b>Total Lembur</b>
  <br>
  <?PHP echo"Rp.".number_format( $epwc_tot_vrlb01_sww['tot_jml']); ?>
</div>