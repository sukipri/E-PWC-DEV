

<b class="mx-2">List Karyawan</b>
<br>
<form method="post">
<div class="input-group mb-3 mx-2" style="max-width:20rem;">
  <input type="text" class="form-control" placeholder="Masukan Nama Staff..." name="txt_nama" required autocomplete="off">
  <button class="btn btn-success btn-sm" name="btn_nama">CARI</button>
</div>
<br>
<?PHP 
    if(isset($_POST['btn_nama'])){
        $txt_nama = @$SQL_SL($_POST['txt_nama']);
        
?>
<span class="badge bg-info mx-2">ENTRI LEMBUR</span> = Peng-entrian lembur yang bersifat diluar shift dinas malam
<br>
<span class="badge bg-dark mx-2">ENTRI LEMBUR</span> = Peng-entrian lembur yang dikhususkan u/ dinas malam
<br><br>
<table class="table table-bordered table-sm table-striped mx-2">
<tr class="table-dark">
    <td width="10%">NIP</td>
    <td width="30%">NAMA</td>
    <td width="30%">Total Jam Lembur / Bulan ini</td>
    <td>AKSI</td>
</tr>
<?PHP 
    #DATA PENCARIAN KARYAWAN  BAGIAN 01
    $epwc_sl_vkry01_sw = $CL_Q("$SL KaryNomor,KaryNomorYakkum,KaryNama,KaryJbtStruktural,UnitKode,UnitKode01 FROM Citarum.dbo.TKaryawan WHERE  UnitKode='$epwc_vkry01_sww[UnitKode]' AND KaryNama LIKE '%$txt_nama%' AND KaryStatus='10' ");
    while($epwc_sl_vkry01_sww = $CL_FAS($epwc_sl_vkry01_sw)){

        #DATA LEMBUR
        @$epwc_tot_sl_vlmbr01_sw = $CL_Q("$SL SUM(LemburBiasa) as jml01_lmbr FROM  Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$epwc_sl_vkry01_sww[KaryNomor]' AND LemburBulanRng='$DATE_Y$DATE_m'");
        @$epwc_tot_sl_vlmbr01_sww = $CL_FAS($epwc_tot_sl_vlmbr01_sw);

?>  
<tr>
    <td><?PHP echo $epwc_sl_vkry01_sww['KaryNomorYakkum'] ?></td>
    <td><?PHP echo $epwc_sl_vkry01_sww['KaryNama'] ?></td>
    <td><?PHP echo $epwc_tot_sl_vlmbr01_sww['jml01_lmbr'] ?></td>
    <td>
        <a href="<?PHP echo"?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_IN02&IDKRY=$epwc_sl_vkry01_sww[KaryNomor]"; ?>" class="badge bg-info"><i class="fas fa-info-circle"></i> ENTRI LEMBUR</a>
        &nbsp
        <a href="<?PHP echo"?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_IN02MLM&IDKRY=$epwc_sl_vkry01_sww[KaryNomor]"; ?>" class="badge bg-dark"><i class="fas fa-info-circle"></i> ENTRI LEMBUR MALAM</a>
    </td>
</tr>
<?PHP } ?>
<?PHP  
    #PENCARIAN KARYAWAN BAGIAN 02
    $epwc_sl02_vkry01_sw = $CL_Q("$SL KaryNomor,KaryNomorYakkum,KaryNama,KaryJbtStruktural,UnitKode,UnitKode01 FROM Citarum.dbo.TKaryawan WHERE   UnitKode='$epwc_vkry01_sww[UnitKode01]' AND KaryNama LIKE '%$txt_nama%' AND KaryStatus='10'   ");
    while($epwc_sl02_vkry01_sww = $CL_FAS($epwc_sl02_vkry01_sw)){
         #DATA LEMBUR
         $epwc_tot_sl02_vlmbr01_sw = $CL_Q("$SL SUM(LemburBiasa) as jml02_lmbr FROM  Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$epwc_sl02_vkry01_sww[KaryNomor]' AND LemburBulanRng='$DATE_Y$DATE_m'");
         $epwc_tot_sl02_vlmbr01_sww = $CL_FAS($epwc_tot_sl02_vlmbr01_sw);
?>  
<tr>
    <td><?PHP echo $epwc_sl02_vkry01_sww['KaryNomorYakkum'] ?></td>
    <td><?PHP echo $epwc_sl02_vkry01_sww['KaryNama'] ?></td>
    <td><?PHP echo $epwc_tot_sl02_vlmbr01_sww['jml02_lmbr'] ?></td>
    <td>
        <a href="<?PHP echo"?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_IN02&IDKRY=$epwc_sl02_vkry01_sww[KaryNomor]"; ?>" class="badge bg-info"><i class="fas fa-info-circle"></i> ENTRI LEMBUR</a>
        &nbsp
        <a href="<?PHP echo"?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_IN02MLM&IDKRY=$epwc_sl02_vkry01_sww[KaryNomor]"; ?>" class="badge bg-dark"><i class="fas fa-info-circle"></i> ENTRI LEMBUR MALAM</a>
    </td>
</tr>
<?PHP } ?>
<?PHP 
    #DATA PENCARIAN KARYAWAN STATUS '22' BAGIAN 1
    $epwc_sl03_vkry01_sw = $CL_Q("$SL KaryNomor,KaryNomorYakkum,KaryNama,KaryJbtStruktural,UnitKode,UnitKode01 FROM Citarum.dbo.TKaryawan WHERE  UnitKode='$epwc_vkry01_sww[UnitKode]' AND KaryNama LIKE '%$txt_nama%' AND KaryStatus='22' ");
    while($epwc_sl03_vkry01_sww = $CL_FAS($epwc_sl03_vkry01_sw)){

        #DATA LEMBUR
        @$epwc_tot_sl03_vlmbr01_sw = $CL_Q("$SL SUM(LemburBiasa) as jml01_lmbr FROM  Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$epwc_sl03_vkry01_sww[KaryNomor]' AND LemburBulanRng='$DATE_Y$DATE_m'");
        @$epwc_tot_sl03_vlmbr01_sww = $CL_FAS($epwc_tot_sl03_vlmbr01_sw);

?>  
<tr>
    <td><?PHP echo $epwc_sl03_vkry01_sww['KaryNomorYakkum'] ?></td>
    <td><?PHP echo $epwc_sl03_vkry01_sww['KaryNama'] ?></td>
    <td><?PHP echo $epwc_tot_sl03_vlmbr01_sww['jml01_lmbr'] ?></td>
    <td>
        <a href="<?PHP echo"?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_IN02&IDKRY=$epwc_sl03_vkry01_sww[KaryNomor]"; ?>" class="badge bg-info"><i class="fas fa-info-circle"></i> ENTRI LEMBUR</a>
        &nbsp
        <a href="<?PHP echo"?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_IN02MLM&IDKRY=$epwc_sl03_vkry01_sww[KaryNomor]"; ?>" class="badge bg-dark"><i class="fas fa-info-circle"></i> ENTRI LEMBUR MALAM</a>
    </td>
</tr>
<?PHP } ?>
</table>

<?PHP } ?>
    </form>