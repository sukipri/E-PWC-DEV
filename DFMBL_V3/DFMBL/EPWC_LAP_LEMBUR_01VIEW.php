<b><i class="fas fa-folder-open"></i>DATA LEMBUR *Bagian / Divisi</b>
<form method="post">
<div class="input-group mb-3" style="max-width:30rem;">
<!-- <select name="txt_thn" class="form-control form-control-sm">

</select> -->
<select name="txt_bln" class="form-control form-control" required>
<?PHP 
    $epwc_sl_vlb01_sw = $CL_Q("$SL  DISTINCT LemburBulan  FROM Citarum.dbo.VLemburRekap order by LemburBulan desc");
     while($epwc_sl_vlb01_sww = $CL_FAS($epwc_sl_vlb01_sw)){
        echo"<option value=$epwc_sl_vlb01_sww[LemburBulan]>$epwc_sl_vlb01_sww[LemburBulan]</option>";
     }
?>
</select>
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
    $txt_bulan = @$_POST['txt_bln'];
    echo "<b>Interval</b> <i>".$txt_bulan."</i>";
    ?>
<table class="table table-sm table-bordered table-striped">
    <tr class="table-dark">
        <td width="25%">Unit</td>
        <td width="10%">Jam Lembur Biasa</td>
        <td>Rupiah Lembur Biasa</td>
        <td>Jam Lembur Jaga Malam </td>
        <td>Rupiah Lembur Malam</td>
        <td>Lembur Lain</td>
        <td>Sub Total</td>
    </tr>
    <?PHP 
   
    $epwc_fs_vulb01_sw = $CL_Q("$SL DISTINCT Klp FROM Citarum.dbo.VLemburRekap WHERE LemburBulan = '$txt_bulan'"); #UNIT
    while($epwc_fs_vulb01_sww = $CL_FAS($epwc_fs_vulb01_sw)){
        $epwc_fs_vjlb01_sw = $CL_Q("$SL SUM(JamLembur) as tot_jlb FROM  Citarum.dbo.VLemburRekap WHERE Klp='$epwc_fs_vulb01_sww[Klp]' AND LemburBulan = '$txt_bulan'"); #SUM JAM LEMBUR
        $epwc_fs_vjlb01_sww = $CL_FAS($epwc_fs_vjlb01_sw);
        $epwc_fs_vrlb01_sw = $CL_Q("$SL SUM(RupiahLembur) as tot_rlb FROM  Citarum.dbo.VLemburRekap WHERE Klp='$epwc_fs_vulb01_sww[Klp]' AND LemburBulan = '$txt_bulan'"); #SUM Rupiah LEMBUR
        $epwc_fs_vrlb01_sww = $CL_FAS($epwc_fs_vrlb01_sw);
        $epwc_fs_vjmlb01_sw = $CL_Q("$SL SUM(LemburJagaMalam) as tot_jmlb FROM  Citarum.dbo.VLemburRekap WHERE Klp='$epwc_fs_vulb01_sww[Klp]' AND LemburBulan = '$txt_bulan'"); #SUM Jam LEMBUR Jaga Malam
        $epwc_fs_vjmlb01_sww = $CL_FAS($epwc_fs_vjmlb01_sw);
        $epwc_fs_vlnlb01_sw = $CL_Q("$SL SUM(LemburLain) as tot_lnlb FROM  Citarum.dbo.VLemburRekap WHERE Klp='$epwc_fs_vulb01_sww[Klp]' AND LemburBulan = '$txt_bulan'"); #SUM LEMBUR Lain
        $epwc_fs_vlnlb01_sww = $CL_FAS($epwc_fs_vlnlb01_sw);
        $epwc_fs_vljlb01_sw = $CL_Q("$SL SUM(LemburJumlah) as tot_ljlb FROM  Citarum.dbo.VLemburRekap WHERE Klp='$epwc_fs_vulb01_sww[Klp]' AND LemburBulan = '$txt_bulan'"); #SUM Lembur Jumlah
        $epwc_fs_vljlb01_sww = $CL_FAS($epwc_fs_vljlb01_sw);
        #Kalkulasi
        $hit_fs_vrlmlb01_sw = $epwc_fs_vljlb01_sww['tot_ljlb'] - $epwc_fs_vlnlb01_sww['tot_lnlb'] - $epwc_fs_vrlb01_sww['tot_rlb'];
    ?>
    <tr>
        <td><?PHP echo $epwc_fs_vulb01_sww['Klp'] ?></td>
        <td align="right"><?PHP echo  $NF($epwc_fs_vjlb01_sww['tot_jlb']).""; ?></td>
        <td align="right"><?PHP echo  "Rp.".$NF($epwc_fs_vrlb01_sww['tot_rlb']); ?></td>
        <td align="right"><?PHP echo  "".$NF($epwc_fs_vjmlb01_sww['tot_jmlb']).""; ?></td>
        <td align="right"><?PHP echo "Rp.".$NF($hit_fs_vrlmlb01_sw); ?></td>
        <td align="right"><?PHP echo  "Rp.".$NF($epwc_fs_vlnlb01_sww['tot_lnlb']); ?></td> 
        <td align="right"><?PHP echo  "Rp.".$NF( $epwc_fs_vljlb01_sww['tot_ljlb']); ?></td>
    </tr>
    <?PHP } 

        $epwc_fs02_vrlb01_sw = $CL_Q("$SL SUM(RupiahLembur) as tot02_rlb FROM  Citarum.dbo.VLemburRekap WHERE  LemburBulan = '$txt_bulan'"); #SUM OTAL embur Jumlah
        $epwc_fs02_vrlb01_sww = $CL_FAS($epwc_fs02_vrlb01_sw); #TOTAL LEMBUR BIASA
        $epwc_fs02_vlnlb01_sw = $CL_Q("$SL SUM(LemburLain) as tot02_lnlb FROM  Citarum.dbo.VLemburRekap WHERE  LemburBulan = '$txt_bulan'"); #SUM OTAL embur Jumlah
        $epwc_fs02_vlnlb01_sww = $CL_FAS($epwc_fs02_vlnlb01_sw); #TOTAL LEMBUR Lain
        $epwc_fs02_vljlb01_sw = $CL_Q("$SL SUM(LemburJumlah) as tot02_ljlb FROM  Citarum.dbo.VLemburRekap WHERE  LemburBulan = '$txt_bulan'"); #SUM OTAL embur Jumlah
        $epwc_fs02_vljlb01_sww = $CL_FAS($epwc_fs02_vljlb01_sw); #TOTAL GLOBAL
        #KALKULASI
        $hit_fs02_vrlmlb01_sw = $epwc_fs02_vljlb01_sww['tot02_ljlb'] - $epwc_fs02_vlnlb01_sww['tot02_lnlb'] - $epwc_fs02_vrlb01_sww['tot02_rlb'];
    ?>
</table>
<div class="alert alert-dismissible alert-primary">
  <b>Total Lembur Biasa</b>
  <br>
  <?PHP echo"Rp.".$NF( $epwc_fs02_vrlb01_sww['tot02_rlb']); ?>
</div>
<div class="alert alert-dismissible alert-info">
  <b>Total Lembur Malam</b>
  <br>
  <?PHP echo"Rp.".$NF($hit_fs02_vrlmlb01_sw); ?>
</div>
<div class="alert alert-dismissible alert-success">
  <b>Total Lembur Global</b>
  <br>
  <?PHP echo"Rp.".$NF($epwc_fs02_vljlb01_sww['tot02_ljlb']); ?>
</div>

<?PHP } ?>