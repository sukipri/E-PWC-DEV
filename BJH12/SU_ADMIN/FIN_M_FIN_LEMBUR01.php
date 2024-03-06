<a class="badge bg-dark"><i class="fas fa-folder-open"></i>DATA LEMBUR *Bagian / Divisi</a>
<form method="post">
<div class="input-group mb-3" style="max-width:30rem;">
<!-- <select name="txt_thn" class="form-control form-control-sm">

</select> -->
<select name="slc_bag" class="form-control form-control" required>
  <option value=""></option>
<?PHP 
    $pl_sl_vkry01_sw = $ms_q("$sl DISTINCT UnitKode FROM Citarum.dbo.TKaryawan WHERE KaryStatus='10'");
      while($pl_sl_vkry01_sww = $ms_fas($pl_sl_vkry01_sw)){
      $pl_sl_vuprs01_sw = $ms_q("$sl UnitKode,UnitNama FROM Citarum.dbo.TUnitPrs WHERE UnitKode='$pl_sl_vkry01_sww[UnitKode]'");
          $pl_sl_vuprs01_sww = $ms_fas($pl_sl_vuprs01_sw);
          echo"<option values=$pl_sl_vuprs01_sww[UnitKode]>$pl_sl_vuprs01_sww[UnitNama]</option>";
        }
?>
</select>

<select name="slc_bln" class="form-control form-control" required>
  <option value=""></option>
  <?PHP 
      $pl_sl_vlbulan01_sw = $ms_q("$sl DISTINCT TOP 14  LemburBulan FROM Citarum.dbo.TKaryLemburHari order by LemburBUlan desc");
      while($pl_sl_vlbulan01_sww  = $ms_fas($pl_sl_vlbulan01_sw)){
        echo"<option value=$pl_sl_vlbulan01_sww[LemburBulan]>$pl_sl_vlbulan01_sww[LemburBulan]</option>";
      }
?>
</select>
        <button class="btn btn-success btn-sm" name="btn_cari_01">CARI DATA</button>
        </div>
</form>
<hr>
<?PHP 
 if(isset($_POST['btn_cari_01'])){  ?>


  
<?PHP } ?>