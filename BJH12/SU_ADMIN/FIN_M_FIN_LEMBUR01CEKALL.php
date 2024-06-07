<a class="badge bg-dark"><i class="fas fa-folder-open"></i>Ceking Data Redudansi</a>
<form method="post">
<div class="input-group mb-3" style="max-width:30rem;">
<!-- <select name="txt_thn" class="form-control form-control-sm">
</select> -->
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

<?PHP 
 if(isset($_POST['btn_cari_01'])){
  #$slc_bag = @$_POST['slc_bag'];
  $slc_bln = @$_POST['slc_bln'];
 
    echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?HLM=FIN_M&SUB=FIN_M_FIN_LEMBUR&SUB_CHILD=FIN_M_FIN_LEMBUR01CEKALL&IDLBULAN01=$slc_bln&GETCARI01=GETCARI01'>";
 }
    if(isset($_GET['GETCARI01'])){
      #echo $IDKLP01;
  ?>
<table class="table table-striped table-bordered table-sm">
      <tr class="table-dark">
            <td width="7%">#</td>
            <td>NIP / Nama</td>
            <td>-</td>
            <td>-</td>
        </tr>
        <?PHP 
             $no_kry = 1;
             $pl_ls_vkry01_sw = $ms_q("$sl KaryNomor,KaryNama,UnitKode FROM Citarum.dbo.TKaryawan WHERE   (KaryStatus='10' OR KaryStatus='22') order by KaryNama asc");
               while($pl_ls_vkry01_sww = $ms_fas($pl_ls_vkry01_sw)){
                   #DATA UNIT  
                   $pl_ls_vunit01_sw = $ms_q("$sl UnitKode,UnitNama FROM Citarum.dbo.TUnitPrs WHERE  UnitKode='$pl_ls_vkry01_sww[UnitKode]'");
                   $pl_ls_vunit01_sww = $ms_fas($pl_ls_vunit01_sw);
        ?>
        <tr>
                <td><?PHP echo $no_kry; ?></td>
            <td><?PHP echo $pl_ls_vkry01_sww['KaryNama']."<br><b>".$pl_ls_vunit01_sww['UnitNama']."</b>"; ?></td>
            <td>-</td>
            <td>-</td>
        </tr>
        <?PHP $no_kry++;} ?>
</table>

<?PHP } ?>