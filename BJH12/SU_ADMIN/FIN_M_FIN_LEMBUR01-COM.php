<a class="badge bg-dark"><i class="fas fa-folder-open"></i>Komprasi LEMBUR <> JADWAL</a>
<form method="post">
<div class="input-group mb-3" style="max-width:30rem;">
<!-- <select name="txt_thn" class="form-control form-control-sm">

</select> -->
<select name="slc_bag" class="form-control form-control" required>
  <option value="">Bagian</option>
<?PHP 
    $pl_sl_vkry01_sw = $ms_q("$sl DISTINCT UnitKode FROM Citarum.dbo.TKaryawan WHERE KaryStatus='10' order by UnitKode asc");
      while($pl_sl_vkry01_sww = $ms_fas($pl_sl_vkry01_sw)){
      $pl_sl_vuprs01_sw = $ms_q("$sl UnitKode,UnitNama FROM Citarum.dbo.TUnitPrs WHERE UnitKode='$pl_sl_vkry01_sww[UnitKode]'");
          $pl_sl_vuprs01_sww = $ms_fas($pl_sl_vuprs01_sw);
          echo"<option value=$pl_sl_vuprs01_sww[UnitKode]>$pl_sl_vuprs01_sww[UnitNama]</option>";
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
<hr>

<?PHP 
 if(isset($_POST['btn_cari_01'])){
  $slc_bag = @$_POST['slc_bag'];
  $slc_bln = @$_POST['slc_bln'];
 
  echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?HLM=FIN_M&SUB=FIN_M_FIN_LEMBUR&SUB_CHILD=FIN_M_FIN_LEMBUR01-COM&IDKLP01=$slc_bag&IDLBULAN01=$slc_bln&GETCARI01=GETCARI01'>";
 }
    if(isset($_GET['GETCARI01'])){
      #echo $IDKLP01;
      #DATA SIMPLE GET
      $pl_sg_vunit01_sw = $ms_q("$sl UnitKode,UnitNama FROM Citarum.dbo.TUnitPrs WHERE UnitKode='$IDKLP01' ");
          $pl_sg_vunit01_sww = $ms_fas($pl_sg_vunit01_sw);
      #DATA SIMPLE GET
      $pl_sg_vkry01_sw = $ms_q("$sl KaryNomor,KaryNama FROM Citarum.dbo.TKaryawan WHERE UnitKode='$IDKLP01' AND (KaryJbtStruktural='08' OR KaryJbtStruktural='07' OR KaryJbtStruktural='06') AND KaryStatus='10' ");
          $pl_sg_vkry01_sww = $ms_fas($pl_sg_vkry01_sw);
  ?>
  <div class="card border-primary mb-3" style="max-width: 20rem;">
  <div class="card-header"><?PHP echo $pl_sg_vunit01_sww['UnitNama'] ?></div>
  <div class="card-body">
    <!--  -->
    <?PHP 
        echo "BULAN <b>".$IDLBULAN01."</b>";
        echo"<br>";
        echo $pl_sg_vkry01_sww['KaryNama'];
    ?>
  </div>
</div>
  <table class="table table-sm table-bordered table-striped">
    <tr class="table-dark">
       <td>NIP | Nama</td>
       <td>Total Nominal</td>
    </tr>
    <?PHP 
      $pl_ls_vkry01_sw = $ms_q("$sl KaryNomor,KaryNama,UnitKode FROM Citarum.dbo.TKaryawan WHERE  UnitKode='$IDKLP01' AND (KaryStatus='10' OR KaryStatus='22')");
        while($pl_ls_vkry01_sww = $ms_fas($pl_ls_vkry01_sw)){
          #DATA UNIT PRS
          $pl_ls_vunit01_sw = $ms_q("$sl UnitKode,UnitNama FROM Citarum.dbo.TUnitPrs WHERE UnitKode='$pl_ls_vkry01_sww[UnitKode]' ");
          $pl_ls_vunit01_sww = $ms_fas($pl_ls_vunit01_sw);
          
    ?>
    <tr>
       <td><?PHP echo $pl_ls_vkry01_sww['KaryNomor']."<br>".$pl_ls_vkry01_sww['KaryNama']; ?>
          <br>
          <?PHP 
              $pl_ls_vlem01_sw = $ms_q("$sl LemburBulan,LemburBulan,KaryNomor,CONVERT(date,LemburTanggal,101) as lem_tgl,LemburBiasa,LemburBiasaJumlah,LemburApp,LemburJenis FROM Citarum.dbo.TkaryLemburHari WHERE KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburBulan='$IDLBULAN01' order by LemburTanggal asc");
              $pl_nr_ls_vlem01_sww = $ms_nr($pl_ls_vlem01_sw);

                if($pl_nr_ls_vlem01_sww > 0){
          ?>
          <div id="" style="overflow:scroll; height:200px;">
          <table class="table">
                    <tr class="table-dark">
                      <td>DATE</td>
                      <td>Lembur</td>
                      <td>Jam</td>
                      <td>Nominal</td>
                      <td>Status</td>
                  </tr>
              
          <?php
              
              while($pl_ls_vlem01_sww = $ms_fas($pl_ls_vlem01_sw)){ ?>
               
                    <tr>
                      <td><?PHP echo $pl_ls_vlem01_sww['lem_tgl'] ?></td>
                      <td><?PHP echo $pl_ls_vlem01_sww['LemburJenis'] ?></td>
                      <td><?PHP echo $pl_ls_vlem01_sww['LemburBiasa'] ?></td>
                      <td><?PHP echo number_format($pl_ls_vlem01_sww['LemburBiasaJumlah']) ?></td>
                      <td>
                        <?PHP 
                             if($pl_ls_vlem01_sww['LemburApp']=="1" OR $pl_ls_vlem01_sww['LemburApp']=="2" OR $pl_ls_vlem01_sww['LemburApp']=="31"){
                                  echo"<a href='#' class='badge bg-info'>Proccessing</a>";
                              }elseif($pl_ls_vlem01_sww['LemburApp']=="3"){
                                  echo"<a href='#' class='badge bg-dark'>Rejected</a>";
                              }elseif($pl_ls_vlem01_sww['LemburApp']=="4"){
                                  echo"<a href='#' class='badge bg-success'>Approved</a>";
                              }
                        ?>
                      </td>
                  </tr>
              
          <?PHP } ?>
              </table>
           </div>
           
           <table class="table table-bordered table-sm">
                    <tr class="table-info">
                        <td>01</td>
                        <td>02</td>
                        <td>03</td>
                        <td>04</td>
                        <td>05</td>
                        <td>06</td>
                        <td>07</td>
                        <td>08</td>
                        <td>09</td>
                        <td>10</td>
                        <td>11</td>
                        <td>12</td>
                        <td>13</td>
                        <td>14</td>
                        <td>15</td>
                        <td>16</td>
                        <td>17</td>
                        <td>18</td>
                        <td>19</td>
                        <td>20</td>
                        <td>21</td>
                        <td>22</td>
                        <td>23</td>
                        <td>24</td>
                        <td>25</td>
                        <td>26</td>
                        <td>27</td>
                        <td>28</td>
                        <td>29</td>
                        <td>30</td>
                        <td>31</td>
                    </tr>
            </table>
           <?PHP }else{ } ?>
           
      </td>
       <td align="right">
       
          <?PHP 
              #DATA LEMBUR TOTAL
              $pl_tot_vlem01_sw = $ms_q("$sl SUM(LemburBiasaJumlah) as tot_lem FROM Citarum.dbo.TKaryLemburhari WHERE LemburBulan='$IDLBULAN01' AND KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburApp='4'");
              $pl_tot_vlem01_sww = $ms_fas($pl_tot_vlem01_sw);
              echo number_format($pl_tot_vlem01_sww['tot_lem']);
          ?>
         
       </td>
    </tr>
    <?PHP } ?>
    <tr>
       <td><a href="<?PHP echo"FIN_M_FIN_LEMBUR01_DTL-XLS.php?IDKLP01=$IDKLP01&IDLBULAN01=$IDLBULAN01";  ?>" target="_blank" class="btn btn-success"><i class="far fa-file-excel"></i> Download Data</button></td>
       <td align="right">
          <?PHP 
              #DATA LEMBUR TOTAL
              $pl_tot02_vlem01_sw = $ms_q("$sl SUM(LemburBiasaJumlah) as tot02_lem FROM Citarum.dbo.TKaryLemburhari WHERE LemburBulan='$IDLBULAN01' AND UnitKode='$IDKLP01' AND LemburApp='4'");
              $pl_tot02_vlem01_sww = $ms_fas($pl_tot02_vlem01_sw);
              echo number_format($pl_tot02_vlem01_sww['tot02_lem']);
          ?>
       </td>
    </tr>
  </table>
  <?PHP } ?>