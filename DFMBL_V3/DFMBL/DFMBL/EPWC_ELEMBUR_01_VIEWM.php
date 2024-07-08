<h4 class="mx-2">Verifikasi </h4>
<div class="list-group mx-2">
  <a href="?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEW03DATE" class="list-group-item list-group-item-action flex-column align-items-start active">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Pilih Berdasarkan Tanggal</h5>
      <small>By Date</small>
    </div>
    <p class="mb-1">Pilih Tanggal > Verifikasi lembur sesuai pilihan tanggal</p>
  </a>
  <a href="?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEW03" class="list-group-item list-group-item-action flex-column align-items-start  ">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Pilih berdasarkan Bulan & KaIns/Kabag</h5>
      <small>By Koor</small>
    </div>
    <p class="mb-1">Pilih Bulan > Pilih KaIns / Kabag > Lakukan Verifikasi lembur</p>
  </a>
</div>
<br><br>
<!--  -->
<div class="mx-2">
<h4>Data tabel lembur </h4>
<table class="table table-sm table-bordered table-striped">
<tr class="table-dark">
      <td width="20%">Bulan Lembur</td>
      <td>Butuh Verifikasi</td>
      <td>Pending</td>
      <td>Reject</td>
      <td>Nominal <b class="badge bg-success">Verified</b></td>
</tr>
<?PHP
  #DATA DISTINCT BULAN
    $pl_dis_bulan_vlem01_sw = $CL_Q("$SL DISTINCT TOP 5 LemburBulanRng FROM Citarum.dbo.TKaryLemburHari order by LemburBulanRng desc");
    while($pl_dis_bulan_vlem01_sww = $CL_FAS($pl_dis_bulan_vlem01_sw)){
      #DATA LEMBUR Pending Verif
      $pl_nr_sl_vlem01_sw = $CL_Q("$SL LemburID,LemburBulan,LemburBulanRng,LemburTanggal,KaryDir FROM Citarum.dbo.TKaryLemburHari WHERE KaryDir='$epwc_vkry01_sww[KaryNomorYakkum]' AND LemburBulanRng='$pl_dis_bulan_vlem01_sww[LemburBulanRng]' AND LemburApp='2' ");
      $pl_nr_sl_vlem01_sww = $CL_NR($pl_nr_sl_vlem01_sw);
      #DATA LEMBUR PENDING
      $pl_nr_pen_vlem01_sw = $CL_Q("$SL LemburID,LemburBulan,LemburBulanRng,LemburTanggal,KaryDir FROM Citarum.dbo.TKaryLemburHari WHERE KaryDir='$epwc_vkry01_sww[KaryNomorYakkum]' AND LemburBulanRng='$pl_dis_bulan_vlem01_sww[LemburBulanRng]' AND LemburApp='31' ");
      $pl_nr_pen_vlem01_sww = $CL_NR($pl_nr_pen_vlem01_sw);
      #DATA LEMBUR Reject
      $pl_nr_rjc_vlem01_sw = $CL_Q("$SL LemburID,LemburBulan,LemburBulanRng,LemburTanggal,KaryDir FROM Citarum.dbo.TKaryLemburHari WHERE KaryDir='$epwc_vkry01_sww[KaryNomorYakkum]' AND LemburBulanRng='$pl_dis_bulan_vlem01_sww[LemburBulanRng]' AND LemburApp='3' ");
      $pl_nr_rjc_vlem01_sww = $CL_NR($pl_nr_rjc_vlem01_sw);
      #DATA NOMINAL
      $pl_tot_vr_vlem01_sw = $CL_Q("$SL SUM(LemburBiasaJumlah) as totvr FROM Citarum.dbo.TKaryLemburHari WHERE KaryDir='$epwc_vkry01_sww[KaryNomorYakkum]' AND LemburBulanRng='$pl_dis_bulan_vlem01_sww[LemburBulanRng]' AND LemburApp='4' ");
      $pl_tot_vr_vlem01_sww = $CL_FAS($pl_tot_vr_vlem01_sw);
      
      
?>
<tr>
      <td><?PHP echo $pl_dis_bulan_vlem01_sww['LemburBulanRng'] ?></td>
      <td><?PHP echo $pl_nr_sl_vlem01_sww ?></td>
      <td><?PHP echo $pl_nr_pen_vlem01_sww ?></td>
      <td><?PHP echo $pl_nr_rjc_vlem01_sww ?></td>
      <td><?PHP echo number_format($pl_tot_vr_vlem01_sww['totvr']); ?></td>
</tr>
<?PHP } ?>
</table>
</div>