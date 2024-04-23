<?PHP 
 include"../config/connec_01_srv.php";
 include"../sc/stack_Q.php"; //Query SQL
 $IDLBULAN01 = @$_GET['IDLBULAN01'];
 header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=FILE-$IDLBULAN01.xls");
?>
<?PHP echo "<h3>Bulan TF : ".$IDLBULAN01."</h3>"; ?>
<hr>
  <table class="table table-sm table-bordered table-striped" border="1">
    <tr class="table-dark">
    <td width="3%">#</td>
        <td width="17%">NIP</td>
       <td>NIP | Nama</td>
       <td>Nom.Lembur Biasa</td>
       <td>Nom.Lembur Malam</td>
       <td>Nom.Total</td>
    </tr>
    <?PHP 
        $no_kry = 1;
      $pl_ls_vkry01_sw = $ms_q("$sl KaryNomor,KaryNama,UnitKode FROM Citarum.dbo.TKaryawan WHERE   (KaryStatus='10' OR KaryStatus='22') order by KaryNama asc");
        while($pl_ls_vkry01_sww = $ms_fas($pl_ls_vkry01_sw)){
          
    ?>
    <tr>
        <td><?PHP echo $no_kry; ?></td>
        <td><?PHP echo  $pl_ls_vkry01_sww['KaryNomor']; ?></td>
       <td><?PHP echo $pl_ls_vkry01_sww['KaryNama']; ?></td>
       <td align="right">
       
          <?PHP 
              #DATA LEMBUR BIASA TOTAL
              $pl_tot_vlem01_sw = $ms_q("$sl SUM(LemburBiasaJumlah) as tot_lem FROM Citarum.dbo.TKaryLemburhari WHERE LemburBulan='$IDLBULAN01' AND KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburApp='4' AND NOT LemburJenis='DM'");
              $pl_tot_vlem01_sww = $ms_fas($pl_tot_vlem01_sw);
              echo number_format($pl_tot_vlem01_sww['tot_lem'],0,",","."); 
          ?>
         
       </td>
       <td align="right">
       
          <?PHP 
              #DATA LEMBUR BIASA TOTAL
              $pl_tot02_vlem01_sw = $ms_q("$sl SUM(LemburBiasaJumlah) as tot_lem FROM Citarum.dbo.TKaryLemburhari WHERE LemburBulan='$IDLBULAN01' AND KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburApp='4' AND LemburJenis='DM'");
              $pl_tot02_vlem01_sww = $ms_fas($pl_tot02_vlem01_sw);
              echo number_format($pl_tot02_vlem01_sww['tot_lem'],0,",",".");
          ?>
         
       </td>
       
       <td align="right">
       
          <?PHP 
              #DATA LEMBUR TOTAL
              $pl_tot03_vlem01_sw = $ms_q("$sl SUM(LemburBiasaJumlah) as tot_lem03 FROM Citarum.dbo.TKaryLemburhari WHERE LemburBulan='$IDLBULAN01' AND KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburApp='4'");
              $pl_tot03_vlem01_sww = $ms_fas($pl_tot03_vlem01_sw);
              echo number_format($pl_tot03_vlem01_sww['tot_lem03'],0,",",".");
          ?>
         
       </td>
    </tr>
    <?PHP $no_kry++; } 

      #DATA LEMBUR BIASA TOTAL All
      $pl_totall01_vlem01_sw = $ms_q("$sl SUM(LemburBiasaJumlah) as tot_all01 FROM Citarum.dbo.TKaryLemburhari WHERE LemburBulan='$IDLBULAN01' AND  LemburApp='4' AND NOT LemburJenis='DM'");
      $pl_totall01_vlem01_sww = $ms_fas($pl_totall01_vlem01_sw);

      #DATA LEMBUR Malam TOTAL All
      $pl_totall02_vlem01_sw = $ms_q("$sl SUM(LemburBiasaJumlah) as tot_all02 FROM Citarum.dbo.TKaryLemburhari WHERE LemburBulan='$IDLBULAN01'  AND LemburApp='4' AND LemburJenis='DM'");
      $pl_totall02_vlem01_sww = $ms_fas($pl_totall02_vlem01_sw);

         #DATA LEMBUR TOTAL All
         $pl_totall_vlem01_sw = $ms_q("$sl SUM(LemburBiasaJumlah) as tot_all FROM Citarum.dbo.TKaryLemburhari WHERE LemburBulan='$IDLBULAN01' AND  LemburApp='4'");
         $pl_totall_vlem01_sww = $ms_fas($pl_totall_vlem01_sw);
         
    ?>
            <tr class="table-dark">
            <td width="3%">-</td>
                <td width="17%">-</td>
            <td>-</td>
            <td><?PHP echo number_format($pl_totall01_vlem01_sww['tot_all01'],0,",","."); ?></td>
            <td><?PHP echo number_format($pl_totall02_vlem01_sww['tot_all02'],0,",","."); ?></td>
            <td><?PHP echo number_format($pl_totall_vlem01_sww['tot_all'],0,",","."); ?></td>
            </tr>
        </table>
