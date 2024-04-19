<span class="mx-2"><b>Histori Lembur</b></span>
<hr>
<form method="post">
<div class="input-group mb-3" style="max-width:30rem;">
    <!-- <input type="date" required name="tg01" class="form-control">
    <input type="date" required name="tg02" class="form-control"> -->
    <select name="slc_bln" class="form-control form-control" required>
  <option value="">Bulan Pencairan</option>

  <?PHP 
      $pl_sl_vlbulan01_sw = $CL_Q("$SL  DISTINCT TOP 14  LemburBulan FROM Citarum.dbo.TKaryLemburHari order by LemburBulan desc");
      while($pl_sl_vlbulan01_sww  = $CL_FAS($pl_sl_vlbulan01_sw)){
        echo"<option value=$pl_sl_vlbulan01_sww[LemburBulan]>$pl_sl_vlbulan01_sww[LemburBulan]</option>";
      }
?>
</select>
  <button class="btn btn-success btn-sm" name="btn_cari">CARI DATA</button>
</div>
</form>
<?PHP 

    if(isset($_POST['btn_cari'])){
        #$tg01 = @$SQL_SL($_POST['tg01']);
        #$tg02 = @$SQL_SL($_POST['tg02']);
        $slc_bln = @$SQL_SL($_POST['slc_bln']);
?>
<table class="table table-sm table-bordered table-striped mx-2">
    <tr class="table-dark">
        <!-- <td width="10%">Nama</td> -->
        <td>Bagian</td>
        <td>Tanggal Lembur</td>
        <td>Jumlah Jam</td>
        <td>Uraian</td>
        <td>Alasan</td>
        <td>Target</td>
        <td>Hasil</td>
        <td>Nominal</td>
        <td width="10%">###</td>
    </tr>
    <?PHP 
  
    #DATA LEMBUR
        $epwc_ls_vlem01_sw = $CL_Q("$CL_SL  Citarum.dbo.TKaryLemburHari WHERE LemburBulan='$slc_bln' AND NOT LemburBiasa='0' AND  KaryNomor='$epwc_vkry01_sww[KaryNomor]'  order by LemburTanggal asc  ");
            while($epwc_ls_vlem01_sww = $CL_FAS($epwc_ls_vlem01_sw)){
        #DATA TANGGAL LEMBUR
        $epwc_ls02_vlem01_sw = $CL_Q("$SL CONVERT(date,LemburTanggal) as lstgl FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$epwc_ls_vlem01_sww[KaryNomor]' AND LemburTanggal='$epwc_ls_vlem01_sww[LemburTanggal]' order by LemburTanggal desc"); 
                $epwc_ls02_vlem01_sww = $CL_FAS($epwc_ls02_vlem01_sw);
        #DATA KARY
        $epwc_ls_vkary01_sw = $CL_Q("$SL KaryNomor,UnitKode,KaryNama FROM Citarum.dbo.TKaryawan WHERE KaryNomor='$epwc_ls_vlem01_sww[KaryNomor]' ");
        $epwc_ls_vkary01_sww = $CL_FAS($epwc_ls_vkary01_sw);
        #DATA UNIT
        $epwc_ls_vunit01_sw = $CL_Q("$SL UnitKode,UnitNama FROM TUnitPrs WHERE UnitKode='$epwc_ls_vkary01_sww[UnitKode]'");
        $epwc_ls_vunit01_sww = $CL_FAS($epwc_ls_vunit01_sw);
               
    ?>
    <tr>
        <!-- <td><?PHP #echo"$epwc_ls_vkary01_sww[KaryNama]"; ?></td> -->
        <td><?PHP echo $epwc_ls_vunit01_sww['UnitNama']; ?></td>
        <td><?PHP echo"$epwc_ls02_vlem01_sww[lstgl]"; ?></td>
        <td><?PHP echo"$epwc_ls_vlem01_sww[LemburBiasa]"; ?></td>
        <td><?PHP echo"$epwc_ls_vlem01_sww[LemburUraian]"; ?></td>
        <td><?PHP echo"$epwc_ls_vlem01_sww[LemburAlasan]"; ?></td>
        <td><?PHP echo"$epwc_ls_vlem01_sww[LemburTarget]"; ?></td>
        <td><?PHP echo"$epwc_ls_vlem01_sww[LemburHasil]"; ?></td>
        <td><?PHP echo$NF($epwc_ls_vlem01_sww['LemburBiasaJumlah']); ?></td>
        <td>
            <?PHP
                if($epwc_ls_vlem01_sww['LemburApp']=="1" OR $epwc_ls_vlem01_sww['LemburApp']=="2" OR $epwc_ls_vlem01_sww['LemburApp']=="31"){
                    echo"<a href='#' class='badge bg-info'>Proccessing</a>";
                }elseif($epwc_ls_vlem01_sww['LemburApp']=="3"){
                    echo"<a href='#' class='badge bg-dark'>Rejected</a>";
                }elseif($epwc_ls_vlem01_sww['LemburApp']=="4"){
                    echo"<a href='#' class='badge bg-success'>Approved</a>";
                }
            ?>
        </td>
    </tr>
                <?PHP }
                $epwc_tot_vlem01_sw = $CL_Q("$SL SUM(LemburBiasaJumlah) as tot_jum FROM  Citarum.dbo.TKaryLemburHari WHERE LemburBulan='$slc_bln' AND NOT LemburBiasa='0' AND  KaryNomor='$epwc_vkry01_sww[KaryNomor]' AND LemburApp='4'");
                $epwc_tot_vlem01_sww = $CL_FAS($epwc_tot_vlem01_sw);
                ?>
         <tr>
        <!-- <td><?PHP #echo"$epwc_ls_vkary01_sww[KaryNama]"; ?></td> -->
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td class="table-primary"><?PHP echo $NF($epwc_tot_vlem01_sww['tot_jum']); ?></td>
        <td>-</td>
    </tr>
</table>
<?PHP } ?>
