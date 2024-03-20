<?PHP 
 include"../config/connec_01_srv.php";
 include"../sc/stack_Q.php"; //Query SQL
 $IDLBULAN01 = @$_GET['IDLBULAN01'];
 $IDKLP01 = @$_GET['IDKLP01'];
 #DATA UNIT PRS
 $pl_ls_vunit01_sw = $ms_q("$sl UnitKode,UnitNama FROM Citarum.dbo.TUnitPrs WHERE UnitKode='$IDKLP01' ");
 $pl_ls_vunit01_sww = $ms_fas($pl_ls_vunit01_sw);
 header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=$pl_ls_vunit01_sww[UnitNama].xls");
?>
<?PHP echo "<h3>".$pl_ls_vunit01_sww['UnitNama']."</h3>"; ?>
<br>
<?PHP echo "<h3>Bulan TF : ".$IDLBULAN01."</h3>"; ?>
<table border="1" width="100%">
  <tr>
      <td>NIP</td>
      <td>NAMA</td>
      <td>Nominal TF</td>
  </tr>
  <?PHP 
    #DATA KARYAWAN
      $pl_ls_vkry01_sw = $ms_q("$sl KaryNomor,KaryNomorYakkum,KaryNama,UnitKode FROM Citarum.dbo.TKaryawan WHERE  UnitKode='$IDKLP01' AND (KaryStatus='10' OR KaryStatus='22')");
      while($pl_ls_vkry01_sww = $ms_fas($pl_ls_vkry01_sw)){
  ?>
  <tr>
      <td><?PHP echo $pl_ls_vkry01_sww['KaryNomorYakkum'] ?></td>
      <td><?PHP echo $pl_ls_vkry01_sww['KaryNama'] ?></td>
      <td align="right">
        <?PHP 
             #DATA LEMBUR TOTAL
             $pl_tot_vlem01_sw = $ms_q("$sl SUM(LemburBiasaJumlah) as tot_lem FROM Citarum.dbo.TKaryLemburhari WHERE LemburBulan='$IDLBULAN01' AND KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburApp='4'");
             $pl_tot_vlem01_sww = $ms_fas($pl_tot_vlem01_sw);
             echo number_format($pl_tot_vlem01_sww['tot_lem']);
        ?>
      </td>
  </tr>
  <?PHP } ?>

</table>