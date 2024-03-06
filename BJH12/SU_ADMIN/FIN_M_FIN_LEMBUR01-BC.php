<a class="badge bg-dark"><i class="fas fa-folder-open"></i>DATA LEMBUR *Bagian / Divisi</a>
<form method="post">
<div class="input-group mb-3" style="max-width:30rem;">
<!-- <select name="txt_thn" class="form-control form-control-sm">

</select> -->
<select name="txt_bln" class="form-control form-control" required>
<?PHP 
    $epwc_sl_vlb01_sw = $ms_q("$sl  DISTINCT TOP 12 LemburBulan  FROM Citarum.dbo.VLemburRekap order by LemburBulan desc");
     while($epwc_sl_vlb01_sww = $ms_fas($epwc_sl_vlb01_sw)){
        echo"<option value=$epwc_sl_vlb01_sww[LemburBulan]>$epwc_sl_vlb01_sww[LemburBulan]</option>";
     }
?>
</select>
        <button class="btn btn-success btn-sm" name="btn_cari_01">CARI DATA</button>
        </div>
</form>
<hr>
<?PHP 
 if(isset($_POST['btn_cari_01'])){ 
    $txt_bulan = @$_POST['txt_bln'];
    echo "<b>Interval</b> <i>".$txt_bulan."</i>";
    ?>
<table class="table table-sm table-bordered table-striped">
    <tr class="table-dark">
        <td width="25%">Unit</td>
        <td width="10%">Jam Lembur Biasa</td>
        <td>Rupiah Lembur </td>
        <td>- </td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
    </tr>
    <?PHP 
   
    $epwc_fs_vulb01_sw = $ms_q("$sl DISTINCT Klp FROM Citarum.dbo.VLemburRekap WHERE LemburBulan = '$txt_bulan'"); #UNIT
    while($epwc_fs_vulb01_sww = $ms_fas($epwc_fs_vulb01_sw)){
        $epwc_fs_vjlb01_sw = $ms_q("$sl SUM(JamLembur) as tot_jlb FROM  Citarum.dbo.VLemburRekap WHERE Klp='$epwc_fs_vulb01_sww[Klp]' AND LemburBulan = '$txt_bulan'"); #SUM JAM LEMBUR
        $epwc_fs_vjlb01_sww = $ms_fas($epwc_fs_vjlb01_sw);
        $epwc_fs_vrlb01_sw = $ms_q("$sl SUM(RupiahLembur) as tot_rlb FROM  Citarum.dbo.VLemburRekap WHERE Klp='$epwc_fs_vulb01_sww[Klp]' AND LemburBulan = '$txt_bulan'"); #SUM Rupiah LEMBUR
        $epwc_fs_vrlb01_sww = $ms_fas($epwc_fs_vrlb01_sw);
        $epwc_fs_vjmlb01_sw = $ms_q("$sl SUM(LemburJagaMalam) as tot_jmlb FROM  Citarum.dbo.VLemburRekap WHERE Klp='$epwc_fs_vulb01_sww[Klp]' AND LemburBulan = '$txt_bulan'"); #SUM Jam LEMBUR Jaga Malam
        $epwc_fs_vjmlb01_sww = $ms_fas($epwc_fs_vjmlb01_sw);
        $epwc_fs_vlnlb01_sw = $ms_q("$sl SUM(LemburLain) as tot_lnlb FROM  Citarum.dbo.VLemburRekap WHERE Klp='$epwc_fs_vulb01_sww[Klp]' AND LemburBulan = '$txt_bulan'"); #SUM LEMBUR Lain
        $epwc_fs_vlnlb01_sww = $ms_fas($epwc_fs_vlnlb01_sw);
        $epwc_fs_vljlb01_sw = $ms_q("$sl SUM(LemburJumlah) as tot_ljlb FROM  Citarum.dbo.VLemburRekap WHERE Klp='$epwc_fs_vulb01_sww[Klp]' AND LemburBulan = '$txt_bulan'"); #SUM Lembur Jumlah
        $epwc_fs_vljlb01_sww = $ms_fas($epwc_fs_vljlb01_sw);
        #Kalkulasi
        $hit_fs_vrlmlb01_sw = $epwc_fs_vljlb01_sww['tot_ljlb'] - $epwc_fs_vlnlb01_sww['tot_lnlb'] - $epwc_fs_vrlb01_sww['tot_rlb'];
    ?>
    <tr>
        <td><?PHP echo "<a href='?HLM=FIN_M&SUB=FIN_M_FIN_LEMBUR&SUB_CHILD=FIN_M_FIN_LEMBUR01_DTL&IDLBULAN01=$txt_bulan&IDKLP01=$epwc_fs_vulb01_sww[Klp]'>".$epwc_fs_vulb01_sww['Klp']."</a>" ?></td>
        <td align="right"><?PHP echo  number_format($epwc_fs_vjlb01_sww['tot_jlb']).""; ?></td>
        <td align="right"><?PHP echo  "Rp.".number_format($epwc_fs_vrlb01_sww['tot_rlb']); ?></td>
        <td align="right"><?PHP #echo  "".number_format($epwc_fs_vjmlb01_sww['tot_jmlb']).""; ?></td>
        <td align="right"><?PHP #echo "Rp.".number_format($hit_fs_vrlmlb01_sw); ?></td>
        <td align="right"><?PHP #echo  "Rp.".number_format($epwc_fs_vlnlb01_sww['tot_lnlb']); ?></td> 
        <td align="right"><?PHP #echo  "Rp.".number_format( $epwc_fs_vljlb01_sww['tot_ljlb']); ?></td>
    </tr>
    <?PHP } 

        $epwc_fs02_vrlb01_sw = $ms_q("$sl SUM(RupiahLembur) as tot02_rlb FROM  Citarum.dbo.VLemburRekap WHERE  LemburBulan = '$txt_bulan'"); #SUM OTAL embur Jumlah
        $epwc_fs02_vrlb01_sww = $ms_fas($epwc_fs02_vrlb01_sw); #TOTAL LEMBUR BIASA
        $epwc_fs02_vlnlb01_sw = $ms_q("$sl SUM(LemburLain) as tot02_lnlb FROM  Citarum.dbo.VLemburRekap WHERE  LemburBulan = '$txt_bulan'"); #SUM OTAL embur Jumlah
        $epwc_fs02_vlnlb01_sww = $ms_fas($epwc_fs02_vlnlb01_sw); #TOTAL LEMBUR Lain
        $epwc_fs02_vljlb01_sw = $ms_q("$sl SUM(RupiahLembur) as tot02_ljlb FROM  Citarum.dbo.VLemburRekap WHERE  LemburBulan = '$txt_bulan'"); #SUM OTAL embur Jumlah
        $epwc_fs02_vljlb01_sww = $ms_fas($epwc_fs02_vljlb01_sw); #TOTAL GLOBAL
        #KALKULASI
        $hit_fs02_vrlmlb01_sw = $epwc_fs02_vljlb01_sww['tot02_ljlb'] - $epwc_fs02_vlnlb01_sww['tot02_lnlb'] - $epwc_fs02_vrlb01_sww['tot02_rlb'];
    ?>
</table>
<div class="alert alert-dismissible alert-success">
  <b>Total Lembur</b>
  <br>
  <?PHP echo"Rp.".number_format( $epwc_fs02_vrlb01_sww['tot02_rlb']); ?>
</div>
<!-- <div class="alert alert-dismissible alert-info">
  <b>Total Lembur Malam</b>
  <br>
  <?PHP #echo"Rp.".number_format($hit_fs02_vrlmlb01_sw); ?>
</div> -->
<!-- <div class="alert alert-dismissible alert-success">
  <b>Total Lembur Global</b>
  <br>
  <?PHP #echo"Rp.".number_format($epwc_fs02_vljlb01_sww['tot02_ljlb']); ?>
</div> -->

<?PHP } ?>