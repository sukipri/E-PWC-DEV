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
  <div class="card border-primary mb-3" style="max-width: 20rem;">
  <div class="card-header">REDUDANSI CHEKING</div>
   <div class="card-body">
    <!--  -->
    <?PHP 
        #kalkulasi 
        $kal_bulan01_sw = $IDLBULAN01 - 1;
        echo "Bulan Lembur<b> ".$kal_bulan01_sw."</b><br>";
        echo "Bulan Cair<b> ".$IDLBULAN01."</b><br>";
    ?>
    
    <br>
        <i class="mx-2">*Status sudah terverif oleh pihak direksi</i>
  </div>
    </div>

<table class="table table-striped table-bordered table-sm">
      <tr class="table-dark">
            <td width="7%">#</td>
            <td width="32%">NIP / Nama</td>
            <td>Tanggal Lembur</td>
            <td>Redudansi</td>
            <td>Nominal</td>
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
            <td><?PHP echo $pl_ls_vkry01_sww['KaryNomor']."<br>".$pl_ls_vkry01_sww['KaryNama']."<br><b>".$pl_ls_vunit01_sww['UnitNama']."</b>"; ?></td>
            <td>
                <!--  -->
                    <?PHP 
                        #DATA LEMBUR
                       $pl_sl_vlem01_sw = $ms_q("$sl LemburBulan,KaryNomor,convert(varchar,LemburTanggal,105) as tlem,LemburJenis,LemburBiasa FROM Citarum.dbo.TKaryLemburHari WHERE LemburBulan='$IDLBULAN01' AND KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburApp='4' ");
                       while($pl_sl_vlem01_sww = $ms_fas($pl_sl_vlem01_sw)){

                            echo "<i class='fas fa-calendar-alt'></i> ".$pl_sl_vlem01_sww['tlem']." <b>$pl_sl_vlem01_sww[LemburJenis]</b> $pl_sl_vlem01_sww[LemburBiasa] Jam <br>";
                       }
                    ?>
                <!--  -->
            </td>
            <td align="center">
                       <!--  -->
                        <?PHP 
                            #CEKING REDUDANSI
                                #DATA SET 01
                             $pl_rd_sl_vlem01_sw = $ms_q("$sl LemburTanggal FROM Citarum.dbo.TKaryLemburHari WHERE LemburBulan='$IDLBULAN01' AND KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburApp='4'");
                             $pl_rd_nr_sl_vlem01_sw = $ms_nr($pl_rd_sl_vlem01_sw);
                             #DATA SET 02 DISTINCT
                             $pl_rd02_sl_vlem01_sw = $ms_q("$sl DISTINCT(LemburTanggal)  FROM Citarum.dbo.TKaryLemburHari WHERE LemburBulan='$IDLBULAN01' AND KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburApp='4'");
                             $pl_rd02_nr_sl_vlem01_sw = $ms_nr($pl_rd02_sl_vlem01_sw);

                             #KALKULASI
                             $pl_kal_vlem01_sww =  $pl_rd_nr_sl_vlem01_sw -  $pl_rd02_nr_sl_vlem01_sw;
                             if($pl_kal_vlem01_sww > 0){
                                echo "Ada yang Kembar bos Q sekitar <b>".$pl_kal_vlem01_sww." </b> tanggal ";
                             }else{
                                echo"<span class='badge bg-success'>AMAN BOSQ</span>";
                             }

                        ?>
                       <!--  -->
            </td>
            <td align="right">
                <!--  -->
                        <?PHP 
                            $pl_sum_sl_vlem01_sw = $ms_q("$sl SUM(LemburBiasaJumlah) as tnom FROM Citarum.dbo.TKaryLemburHari WHERE LemburBulan='$IDLBULAN01' AND KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburApp='4'");
                            $pl_sum_sl_vlem01_sww = $ms_fas($pl_sum_sl_vlem01_sw);

                            echo"<b>".$nf($pl_sum_sl_vlem01_sww['tnom'])."</b>";
                        ?>
                <!--  -->
            </td>
        </tr>
        <?PHP $no_kry++;} ?>
</table>
<br>
    <?PHP echo"<a href='FIN_M_FIN_LEMBUR01CEKALL-XLS.php?IDLBULAN01=$IDLBULAN01' target='_blank' class='btn btn-success'><i class='far fa-file-excel'></i> Download Excel</a>"; ?>

<?PHP } ?>