<a class="badge bg-dark"><i class="fas fa-folder-open"></i>Management data lembur / Personal</a>
<form method="post">
<div class="input-group mb-3" style="max-width:40rem;">
<!-- <select name="txt_thn" class="form-control form-control-sm">
</select> -->
<select name="slc_carinip" class="form-control form-control-sm" required style="max-width:20rem;">
        <option value="">Nama Personil</option>
        <?PHP 
                $epwc_sl_vkry01_sw = $ms_q("$sl KaryNomor,KaryNomorYakkum,KaryNama FROM Citarum.dbo.TKaryawan WHERE (KaryStatus='10' OR KaryStatus='22')  order by KaryNama asc");
                while($epwc_sl_vkry01_sww = $ms_fas($epwc_sl_vkry01_sw)){
                    echo"<option value=$epwc_sl_vkry01_sww[KaryNomor]>$epwc_sl_vkry01_sww[KaryNama]</option>";
                }
            ?>
        </select>
        <select name="slc_bln" class="form-control form-control" required>
  <option value="">Bulan Pencairan</option>
  <?PHP 
      $pl_sl_vlbulan01_sw = $ms_q("$sl DISTINCT TOP 14  LemburBulan FROM Citarum.dbo.TKaryLemburHari order by LemburBulan desc");
        while($pl_sl_vlbulan01_sww  = $ms_fas($pl_sl_vlbulan01_sw)){
          echo"<option value=$pl_sl_vlbulan01_sww[LemburBulan]>$pl_sl_vlbulan01_sww[LemburBulan]</option>"; 
      }
?>
</select>
        <button class="btn btn-success btn-sm" name="btn_cari_01">CARI DATA</button>
        </div>
</form>
