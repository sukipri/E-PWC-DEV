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
 
  echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?HLM=FIN_M&SUB=FIN_M_FIN_LEMBUR&SUB_CHILD=FIN_M_FIN_LEMBUR01&IDKLP01=$slc_bag&IDLBULAN01=$slc_bln&GETCARI01=GETCARI01'>";
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
        #kalkulasi 
        $kal_bulan01_sw = $IDLBULAN01 - 1;
        echo "Bulan Lembur<b> ".$kal_bulan01_sw."</b><br>";
        echo "Bulan Cair<b> ".$IDLBULAN01."</b><br>";
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
      $pl_ls_vkry01_sw = $ms_q("$sl KaryNomor,KaryNomorYakkum,KaryNama,UnitKode FROM Citarum.dbo.TKaryawan WHERE  UnitKode='$IDKLP01' AND (KaryStatus='10' OR KaryStatus='22')");
        while($pl_ls_vkry01_sww = $ms_fas($pl_ls_vkry01_sw)){
          $epwc_sub_vkry01_sw = substr($pl_ls_vkry01_sww['KaryNomorYakkum'],1);
          #DATA UNIT PRS
          $pl_ls_vunit01_sw = $ms_q("$sl UnitKode,UnitNama FROM Citarum.dbo.TUnitPrs WHERE UnitKode='$pl_ls_vkry01_sww[UnitKode]' ");
          $pl_ls_vunit01_sww = $ms_fas($pl_ls_vunit01_sw);
          
    ?>
    <tr>
       <td><?PHP echo $pl_ls_vkry01_sww['KaryNomor']."<br>".$pl_ls_vkry01_sww['KaryNama']; ?>
          <br>
          <?PHP 
              $pl_ls_vlem01_sw = $ms_q("$sl LemburID,LemburBulan,LemburBulanRng,KaryNomor,CONVERT(date,LemburTanggal,101) as lem_tgl,LemburBiasa,LemburBiasaJumlah,LemburApp,LemburJenis FROM Citarum.dbo.TkaryLemburHari WHERE KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburBulan='$IDLBULAN01' order by LemburTanggal asc");
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
                      <td><?PHP echo $pl_ls_vlem01_sww['lem_tgl']."<br><i>".$pl_ls_vlem01_sww['LemburID']."</i>"; ?></td>
                      <td><?PHP echo $pl_ls_vlem01_sww['LemburJenis'] ?></td>
                      <td><?PHP echo $pl_ls_vlem01_sww['LemburBiasa'] ?></td>
                      <td><?PHP echo number_format($pl_ls_vlem01_sww['LemburBiasaJumlah']) ?></td>
                      <td>
                        <?PHP 
                             if($pl_ls_vlem01_sww['LemburApp']=="1" OR $pl_ls_vlem01_sww['LemburApp']=="2"){
                                  echo"<a href='#' class='badge bg-info'>Proccessing</a>";
                                }elseif($pl_ls_vlem01_sww['LemburApp']=="31"){
                                  echo"<a href='#' class='badge bg-secondary'>Pending</a>";
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
                    <tr>
                      <td class="table-danger">LEM</td>
                      <?PHP  
                       $pl_ck01_ls_vlem01_sw = $ms_q("$sl DAY(LemburTanggal) as lhari FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburBulan='$IDLBULAN01' AND DAY(LemburTanggal)='1' " );
                       $pl_ck01_ls_vlem01_sww = $ms_fas($pl_ck01_ls_vlem01_sw);
                       #echo $pl_ck01_ls_vlem01_sww['lhari'];
                            if($pl_ck01_ls_vlem01_sww['lhari']=="1"){
                              echo" <td class='table-success'>01</td>";
                            }else{
                              echo" <td>01</td>";
                              
                            }

                            $pl_ck02_ls_vlem01_sw = $ms_q("$sl DAY(LemburTanggal) as lhari FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburBulan='$IDLBULAN01' AND DAY(LemburTanggal)='2' " );
                            $pl_ck02_ls_vlem01_sww = $ms_fas($pl_ck02_ls_vlem01_sw);
                            #echo $pl_ck02_ls_vlem01_sww['lhari'];
                                 if($pl_ck02_ls_vlem01_sww['lhari']=="2"){
                                   echo" <td class='table-success'>02</td>";
                                 }else{
                                   echo" <td>02</td>";
                                   
                                 }

                                 $pl_ck03_ls_vlem01_sw = $ms_q("$sl DAY(LemburTanggal) as lhari FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburBulan='$IDLBULAN01' AND DAY(LemburTanggal)='3' " );
                            $pl_ck03_ls_vlem01_sww = $ms_fas($pl_ck03_ls_vlem01_sw);
                            #echo $pl_ck03_ls_vlem01_sww['lhari'];
                                 if($pl_ck03_ls_vlem01_sww['lhari']=="3"){
                                   echo" <td class='table-success'>03</td>";
                                 }else{
                                   echo" <td>03</td>";
                                   
                                 }

                                 $pl_ck04_ls_vlem01_sw = $ms_q("$sl DAY(LemburTanggal) as lhari FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburBulan='$IDLBULAN01' AND DAY(LemburTanggal)='4' " );
                            $pl_ck04_ls_vlem01_sww = $ms_fas($pl_ck04_ls_vlem01_sw);
                            #echo $pl_ck04_ls_vlem01_sww['lhari'];
                                 if($pl_ck04_ls_vlem01_sww['lhari']=="4"){
                                   echo" <td class='table-success'>04</td>";
                                 }else{
                                   echo" <td>04</td>";
                                   
                                 }

                                 $pl_ck05_ls_vlem01_sw = $ms_q("$sl DAY(LemburTanggal) as lhari FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburBulan='$IDLBULAN01' AND DAY(LemburTanggal)='5' " );
                            $pl_ck05_ls_vlem01_sww = $ms_fas($pl_ck05_ls_vlem01_sw);
                            #echo $pl_ck05_ls_vlem01_sww['lhari'];
                                 if($pl_ck05_ls_vlem01_sww['lhari']=="5"){
                                   echo" <td class='table-success'>05</td>";
                                 }else{
                                   echo" <td>05</td>";
                                   
                                 }

                                 $pl_ck06_ls_vlem01_sw = $ms_q("$sl DAY(LemburTanggal) as lhari FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburBulan='$IDLBULAN01' AND DAY(LemburTanggal)='6' " );
                            $pl_ck06_ls_vlem01_sww = $ms_fas($pl_ck06_ls_vlem01_sw);
                            #echo $pl_ck06_ls_vlem01_sww['lhari'];
                                 if($pl_ck06_ls_vlem01_sww['lhari']=="6"){
                                   echo" <td class='table-success'>06</td>";
                                 }else{
                                   echo" <td>06</td>";
                                   
                                 }

                                 $pl_ck07_ls_vlem01_sw = $ms_q("$sl DAY(LemburTanggal) as lhari FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburBulan='$IDLBULAN01' AND DAY(LemburTanggal)='7' " );
                                 $pl_ck07_ls_vlem01_sww = $ms_fas($pl_ck07_ls_vlem01_sw);
                                 #echo $pl_ck07_ls_vlem01_sww['lhari'];
                                      if($pl_ck07_ls_vlem01_sww['lhari']=="7"){
                                        echo" <td class='table-success'>07</td>";
                                      }else{
                                        echo" <td>07</td>";
                                        
                                      }

                                 $pl_ck08_ls_vlem01_sw = $ms_q("$sl DAY(LemburTanggal) as lhari FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburBulan='$IDLBULAN01' AND DAY(LemburTanggal)='8' " );
                                 $pl_ck08_ls_vlem01_sww = $ms_fas($pl_ck08_ls_vlem01_sw);
                                 #echo $pl_ck08_ls_vlem01_sww['lhari'];
                                      if($pl_ck08_ls_vlem01_sww['lhari']=="8"){
                                        echo" <td class='table-success'>08</td>";
                                      }else{
                                        echo" <td>08</td>";
                                        
                                      }

                              $pl_ck09_ls_vlem01_sw = $ms_q("$sl DAY(LemburTanggal) as lhari FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburBulan='$IDLBULAN01' AND DAY(LemburTanggal)='9' " );
                                 $pl_ck09_ls_vlem01_sww = $ms_fas($pl_ck09_ls_vlem01_sw);
                                 #echo $pl_ck09_ls_vlem01_sww['lhari'];
                                      if($pl_ck09_ls_vlem01_sww['lhari']=="9"){
                                        echo" <td class='table-success'>09</td>";
                                      }else{
                                        echo" <td>09</td>";
                                        
                                      }

                                      $pl_ck10_ls_vlem01_sw = $ms_q("$sl DAY(LemburTanggal) as lhari FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburBulan='$IDLBULAN01' AND DAY(LemburTanggal)='10' " );
                                 $pl_ck10_ls_vlem01_sww = $ms_fas($pl_ck10_ls_vlem01_sw);
                                 #echo $pl_ck10_ls_vlem01_sww['lhari'];
                                      if($pl_ck10_ls_vlem01_sww['lhari']=="10"){
                                        echo" <td class='table-success'>10</td>";
                                      }else{
                                        echo" <td>10</td>";
                                        
                                      }

                           $pl_ck11_ls_vlem01_sw = $ms_q("$sl DAY(LemburTanggal) as lhari FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburBulan='$IDLBULAN01' AND DAY(LemburTanggal)='11' " );
                                 $pl_ck11_ls_vlem01_sww = $ms_fas($pl_ck11_ls_vlem01_sw);
                                 #echo $pl_ck11_ls_vlem01_sww['lhari'];
                                      if($pl_ck11_ls_vlem01_sww['lhari']=="11"){
                                        echo" <td class='table-success'>11</td>";
                                      }else{
                                        echo" <td>11</td>";
                                        
                                      }

                        $pl_ck12_ls_vlem01_sw = $ms_q("$sl DAY(LemburTanggal) as lhari FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburBulan='$IDLBULAN01' AND DAY(LemburTanggal)='12' " );
                                 $pl_ck12_ls_vlem01_sww = $ms_fas($pl_ck12_ls_vlem01_sw);
                                 #echo $pl_ck12_ls_vlem01_sww['lhari'];
                                      if($pl_ck12_ls_vlem01_sww['lhari']=="12"){
                                        echo" <td class='table-success'>12</td>";
                                      }else{
                                        echo" <td>12</td>";
                                        
                                      }

                                $pl_ck13_ls_vlem01_sw = $ms_q("$sl DAY(LemburTanggal) as lhari FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburBulan='$IDLBULAN01' AND DAY(LemburTanggal)='13' " );
                                 $pl_ck13_ls_vlem01_sww = $ms_fas($pl_ck13_ls_vlem01_sw);
                                 #echo $pl_ck13_ls_vlem01_sww['lhari'];
                                      if($pl_ck13_ls_vlem01_sww['lhari']=="13"){
                                        echo" <td class='table-success'>13</td>";
                                      }else{
                                        echo" <td>13</td>";
                                        
                                      }

                         $pl_ck14_ls_vlem01_sw = $ms_q("$sl DAY(LemburTanggal) as lhari FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburBulan='$IDLBULAN01' AND DAY(LemburTanggal)='14' " );
                                 $pl_ck14_ls_vlem01_sww = $ms_fas($pl_ck14_ls_vlem01_sw);
                                 #echo $pl_ck14_ls_vlem01_sww['lhari'];
                                      if($pl_ck14_ls_vlem01_sww['lhari']=="14"){
                                        echo" <td class='table-success'>14</td>";
                                      }else{
                                        echo" <td>14</td>";
                                        
                                      }

                          $pl_ck15_ls_vlem01_sw = $ms_q("$sl DAY(LemburTanggal) as lhari FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburBulan='$IDLBULAN01' AND DAY(LemburTanggal)='15' " );
                                 $pl_ck15_ls_vlem01_sww = $ms_fas($pl_ck15_ls_vlem01_sw);
                                 #echo $pl_ck15_ls_vlem01_sww['lhari'];
                                      if($pl_ck15_ls_vlem01_sww['lhari']=="15"){
                                        echo" <td class='table-success'>15</td>";
                                      }else{
                                        echo" <td>15</td>";
                                        
                                      }

                          $pl_ck16_ls_vlem01_sw = $ms_q("$sl DAY(LemburTanggal) as lhari FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburBulan='$IDLBULAN01' AND DAY(LemburTanggal)='16' " );
                                 $pl_ck16_ls_vlem01_sww = $ms_fas($pl_ck16_ls_vlem01_sw);
                                 #echo $pl_ck16_ls_vlem01_sww['lhari'];
                                      if($pl_ck16_ls_vlem01_sww['lhari']=="16"){
                                        echo" <td class='table-success'>16</td>";
                                      }else{
                                        echo" <td>16</td>";
                                        
                                      }

                                      
                          $pl_ck17_ls_vlem01_sw = $ms_q("$sl DAY(LemburTanggal) as lhari FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburBulan='$IDLBULAN01' AND DAY(LemburTanggal)='17' " );
                          $pl_ck17_ls_vlem01_sww = $ms_fas($pl_ck17_ls_vlem01_sw);
                          #echo $pl_ck17_ls_vlem01_sww['lhari'];
                               if($pl_ck17_ls_vlem01_sww['lhari']=="17"){
                                 echo" <td class='table-success'>17</td>";
                               }else{
                                 echo" <td>17</td>";
                                 
                               }

                    $pl_ck18_ls_vlem01_sw = $ms_q("$sl DAY(LemburTanggal) as lhari FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburBulan='$IDLBULAN01' AND DAY(LemburTanggal)='18' " );
                                 $pl_ck18_ls_vlem01_sww = $ms_fas($pl_ck18_ls_vlem01_sw);
                                 #echo $pl_ck18_ls_vlem01_sww['lhari'];
                                      if($pl_ck18_ls_vlem01_sww['lhari']=="18"){
                                        echo" <td class='table-success'>18</td>";
                                      }else{
                                        echo" <td>18</td>";
                                        
                                      }

                             $pl_ck19_ls_vlem01_sw = $ms_q("$sl DAY(LemburTanggal) as lhari FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburBulan='$IDLBULAN01' AND DAY(LemburTanggal)='19' " );
                                 $pl_ck19_ls_vlem01_sww = $ms_fas($pl_ck19_ls_vlem01_sw);
                                 #echo $pl_ck19_ls_vlem01_sww['lhari'];
                                      if($pl_ck19_ls_vlem01_sww['lhari']=="19"){
                                        echo" <td class='table-success'>19</td>";
                                      }else{
                                        echo" <td>19</td>";
                                        
                                      }

                   $pl_ck20_ls_vlem01_sw = $ms_q("$sl DAY(LemburTanggal) as lhari FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburBulan='$IDLBULAN01' AND DAY(LemburTanggal)='20' " );
                                      $pl_ck20_ls_vlem01_sww = $ms_fas($pl_ck20_ls_vlem01_sw);
                                      #echo $pl_ck20_ls_vlem01_sww['lhari'];
                                           if($pl_ck20_ls_vlem01_sww['lhari']=="20"){
                                             echo" <td class='table-success'>20</td>";
                                           }else{
                                             echo" <td>20</td>";
                                             
                                           }

                 $pl_ck21_ls_vlem01_sw = $ms_q("$sl DAY(LemburTanggal) as lhari FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburBulan='$IDLBULAN01' AND DAY(LemburTanggal)='21' " );
                                 $pl_ck21_ls_vlem01_sww = $ms_fas($pl_ck21_ls_vlem01_sw);
                                 #echo $pl_ck21_ls_vlem01_sww['lhari'];
                                      if($pl_ck21_ls_vlem01_sww['lhari']=="21"){
                                        echo" <td class='table-success'>21</td>";
                                      }else{
                                        echo" <td>21</td>";
                                        
                                      }
                     $pl_ck22_ls_vlem01_sw = $ms_q("$sl DAY(LemburTanggal) as lhari FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburBulan='$IDLBULAN01' AND DAY(LemburTanggal)='22' " );
                                           $pl_ck22_ls_vlem01_sww = $ms_fas($pl_ck22_ls_vlem01_sw);
                                           #echo $pl_ck22_ls_vlem01_sww['lhari'];
                                                if($pl_ck22_ls_vlem01_sww['lhari']=="22"){
                                                  echo" <td class='table-success'>22</td>";
                                                }else{
                                                  echo" <td>22</td>";
                                                  
                                                }


                          $pl_ck23_ls_vlem01_sw = $ms_q("$sl DAY(LemburTanggal) as lhari FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburBulan='$IDLBULAN01' AND DAY(LemburTanggal)='23' " );
                                                $pl_ck23_ls_vlem01_sww = $ms_fas($pl_ck23_ls_vlem01_sw);
                                                #echo $pl_ck23_ls_vlem01_sww['lhari'];
                                                     if($pl_ck23_ls_vlem01_sww['lhari']=="23"){
                                                       echo" <td class='table-success'>23</td>";
                                                     }else{
                                                       echo" <td>23</td>";
                                                       
                                                     }


                $pl_ck24_ls_vlem01_sw = $ms_q("$sl DAY(LemburTanggal) as lhari FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburBulan='$IDLBULAN01' AND DAY(LemburTanggal)='24' " );
                                                     $pl_ck24_ls_vlem01_sww = $ms_fas($pl_ck24_ls_vlem01_sw);
                                                     #echo $pl_ck24_ls_vlem01_sww['lhari'];
                                                          if($pl_ck24_ls_vlem01_sww['lhari']=="24"){
                                                            echo" <td class='table-success'>24</td>";
                                                          }else{
                                                            echo" <td>24</td>";
                                                            
                                                          }


                $pl_ck25_ls_vlem01_sw = $ms_q("$sl DAY(LemburTanggal) as lhari FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburBulan='$IDLBULAN01' AND DAY(LemburTanggal)='25' " );
                                                          $pl_ck25_ls_vlem01_sww = $ms_fas($pl_ck25_ls_vlem01_sw);
                                                          #echo $pl_ck25_ls_vlem01_sww['lhari'];
                                                               if($pl_ck25_ls_vlem01_sww['lhari']=="25"){
                                                                 echo" <td class='table-success'>25</td>";
                                                               }else{
                                                                 echo" <td>25</td>";
                                                                 
                                                               }


                          $pl_ck26_ls_vlem01_sw = $ms_q("$sl DAY(LemburTanggal) as lhari FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburBulan='$IDLBULAN01' AND DAY(LemburTanggal)='26' " );
                                                               $pl_ck26_ls_vlem01_sww = $ms_fas($pl_ck26_ls_vlem01_sw);
                                                               #echo $pl_ck26_ls_vlem01_sww['lhari'];
                                                                    if($pl_ck26_ls_vlem01_sww['lhari']=="26"){
                                                                      echo" <td class='table-success'>26</td>";
                                                                    }else{
                                                                      echo" <td>26</td>";
                                                                      
                                                                    }

                         $pl_ck27_ls_vlem01_sw = $ms_q("$sl DAY(LemburTanggal) as lhari FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburBulan='$IDLBULAN01' AND DAY(LemburTanggal)='27' " );
                                                                    $pl_ck27_ls_vlem01_sww = $ms_fas($pl_ck27_ls_vlem01_sw);
                                                                    #echo $pl_ck27_ls_vlem01_sww['lhari'];
                                                                         if($pl_ck27_ls_vlem01_sww['lhari']=="27"){
                                                                           echo" <td class='table-success'>27</td>";
                                                                         }else{
                                                                           echo" <td>27</td>";
                                                                           
                                                                         }
 $pl_ck28_ls_vlem01_sw = $ms_q("$sl DAY(LemburTanggal) as lhari FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburBulan='$IDLBULAN01' AND DAY(LemburTanggal)='28' " );
                                 $pl_ck28_ls_vlem01_sww = $ms_fas($pl_ck28_ls_vlem01_sw);
                                 #echo $pl_ck28_ls_vlem01_sww['lhari'];
                                      if($pl_ck28_ls_vlem01_sww['lhari']=="28"){
                                        echo" <td class='table-success'>28</td>";
                                      }else{
                                        echo" <td>28</td>";
                                        
                                      }

      $pl_ck29_ls_vlem01_sw = $ms_q("$sl DAY(LemburTanggal) as lhari FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburBulan='$IDLBULAN01' AND DAY(LemburTanggal)='29' " );
                                 $pl_ck29_ls_vlem01_sww = $ms_fas($pl_ck29_ls_vlem01_sw);
                                 #echo $pl_ck29_ls_vlem01_sww['lhari'];
                                      if($pl_ck29_ls_vlem01_sww['lhari']=="29"){
                                        echo" <td class='table-success'>29</td>";
                                      }else{
                                        echo" <td>29</td>";
                                        
                                      }

  $pl_ck30_ls_vlem01_sw = $ms_q("$sl DAY(LemburTanggal) as lhari FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburBulan='$IDLBULAN01' AND DAY(LemburTanggal)='30' " );
                                 $pl_ck30_ls_vlem01_sww = $ms_fas($pl_ck30_ls_vlem01_sw);
                                 #echo $pl_ck30_ls_vlem01_sww['lhari'];
                                      if($pl_ck30_ls_vlem01_sww['lhari']=="30"){
                                        echo" <td class='table-success'>30</td>";
                                      }else{
                                        echo" <td>30</td>";
                                        
                                      }

                 $pl_ck31_ls_vlem01_sw = $ms_q("$sl DAY(LemburTanggal) as lhari FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburBulan='$IDLBULAN01' AND DAY(LemburTanggal)='31' " );
                                      $pl_ck31_ls_vlem01_sww = $ms_fas($pl_ck31_ls_vlem01_sw);
                                      #echo $pl_ck31_ls_vlem01_sww['lhari'];
                                           if($pl_ck31_ls_vlem01_sww['lhari']=="31"){
                                             echo" <td class='table-success'>31</td>";
                                           }else{
                                             echo" <td>31</td>";
                                             
                                           }


                                      

                            
                      ?>
                    </tr>
                    <!-- COMPARASI DATA  -->
                    <tr>
                      <td class="table-warning">JDW</td>
                      <?PHP 
                      
                          $pl_tj01_ls_vjdw01_sw = $ms_q("$sl Bulan,NIK,T01 FROM TJ_main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw' AND Bulan='$kal_bulan01_sw' ");
                          $pl_tj01_ls_vjdw01_sww = $ms_fas($pl_tj01_ls_vjdw01_sw);
                          echo"<td>$pl_tj01_ls_vjdw01_sww[T01]</td>";

                          $pl_tj02_ls_vjdw02_sw = $ms_q("$sl Bulan,NIK,T02 FROM TJ_main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw' AND Bulan='$kal_bulan01_sw' ");
                          $pl_tj02_ls_vjdw02_sww = $ms_fas($pl_tj02_ls_vjdw02_sw);
                          echo"<td>$pl_tj02_ls_vjdw02_sww[T02]</td>";

                          $pl_tj03_ls_vjdw03_sw = $ms_q("$sl Bulan,NIK,T03 FROM TJ_main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw' AND Bulan='$kal_bulan01_sw' ");
                          $pl_tj03_ls_vjdw03_sww = $ms_fas($pl_tj03_ls_vjdw03_sw);
                          echo"<td>$pl_tj03_ls_vjdw03_sww[T03]</td>";

                          $pl_tj04_ls_vjdw04_sw = $ms_q("$sl Bulan,NIK,T04 FROM TJ_main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw' AND Bulan='$kal_bulan01_sw' ");
                          $pl_tj04_ls_vjdw04_sww = $ms_fas($pl_tj04_ls_vjdw04_sw);
                          echo"<td>$pl_tj04_ls_vjdw04_sww[T04]</td>";

                          $pl_tj05_ls_vjdw05_sw = $ms_q("$sl Bulan,NIK,T05 FROM TJ_main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw' AND Bulan='$kal_bulan01_sw' ");
                          $pl_tj05_ls_vjdw05_sww = $ms_fas($pl_tj05_ls_vjdw05_sw);
                          echo"<td>$pl_tj05_ls_vjdw05_sww[T05]</td>";

                          $pl_tj06_ls_vjdw06_sw = $ms_q("$sl Bulan,NIK,T06 FROM TJ_main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw' AND Bulan='$kal_bulan01_sw' ");
                          $pl_tj06_ls_vjdw06_sww = $ms_fas($pl_tj06_ls_vjdw06_sw);
                          echo"<td>$pl_tj06_ls_vjdw06_sww[T06]</td>";

                          $pl_tj07_ls_vjdw07_sw = $ms_q("$sl Bulan,NIK,T07 FROM TJ_main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw' AND Bulan='$kal_bulan01_sw' ");
                          $pl_tj07_ls_vjdw07_sww = $ms_fas($pl_tj07_ls_vjdw07_sw);
                          echo"<td>$pl_tj07_ls_vjdw07_sww[T07]</td>";

                          $pl_tj08_ls_vjdw08_sw = $ms_q("$sl Bulan,NIK,T08 FROM TJ_main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw' AND Bulan='$kal_bulan01_sw' ");
                          $pl_tj08_ls_vjdw08_sww = $ms_fas($pl_tj08_ls_vjdw08_sw);
                          echo"<td>$pl_tj08_ls_vjdw08_sww[T08]</td>";

                          $pl_tj09_ls_vjdw09_sw = $ms_q("$sl Bulan,NIK,T09 FROM TJ_main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw' AND Bulan='$kal_bulan01_sw' ");
                          $pl_tj09_ls_vjdw09_sww = $ms_fas($pl_tj09_ls_vjdw09_sw);
                          echo"<td>$pl_tj09_ls_vjdw09_sww[T09]</td>";

                          $pl_tj10_ls_vjdw10_sw = $ms_q("$sl Bulan,NIK,T10 FROM TJ_main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw' AND Bulan='$kal_bulan01_sw' ");
                          $pl_tj10_ls_vjdw10_sww = $ms_fas($pl_tj10_ls_vjdw10_sw);
                          echo"<td>$pl_tj10_ls_vjdw10_sww[T10]</td>";

                          $pl_tj11_ls_vjdw11_sw = $ms_q("$sl Bulan,NIK,T11 FROM TJ_main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw' AND Bulan='$kal_bulan01_sw' ");
                          $pl_tj11_ls_vjdw11_sww = $ms_fas($pl_tj11_ls_vjdw11_sw);
                          echo"<td>$pl_tj11_ls_vjdw11_sww[T11]</td>";

                          $pl_tj12_ls_vjdw12_sw = $ms_q("$sl Bulan,NIK,T12 FROM TJ_main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw' AND Bulan='$kal_bulan01_sw' ");
                          $pl_tj12_ls_vjdw12_sww = $ms_fas($pl_tj12_ls_vjdw12_sw);
                          echo"<td>$pl_tj12_ls_vjdw12_sww[T12]</td>";

                          $pl_tj13_ls_vjdw13_sw = $ms_q("$sl Bulan,NIK,T13 FROM TJ_main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw' AND Bulan='$kal_bulan01_sw' ");
                          $pl_tj13_ls_vjdw13_sww = $ms_fas($pl_tj13_ls_vjdw13_sw);
                          echo"<td>$pl_tj13_ls_vjdw13_sww[T13]</td>";

                          $pl_tj14_ls_vjdw14_sw = $ms_q("$sl Bulan,NIK,T14 FROM TJ_main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw' AND Bulan='$kal_bulan01_sw' ");
                          $pl_tj14_ls_vjdw14_sww = $ms_fas($pl_tj14_ls_vjdw14_sw);
                          echo"<td>$pl_tj14_ls_vjdw14_sww[T14]</td>";

                          $pl_tj15_ls_vjdw15_sw = $ms_q("$sl Bulan,NIK,T15 FROM TJ_main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw' AND Bulan='$kal_bulan01_sw' ");
                          $pl_tj15_ls_vjdw15_sww = $ms_fas($pl_tj15_ls_vjdw15_sw);
                          echo"<td>$pl_tj15_ls_vjdw15_sww[T15]</td>";

                          $pl_tj16_ls_vjdw16_sw = $ms_q("$sl Bulan,NIK,T16 FROM TJ_main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw' AND Bulan='$kal_bulan01_sw' ");
                          $pl_tj16_ls_vjdw16_sww = $ms_fas($pl_tj16_ls_vjdw16_sw);
                          echo"<td>$pl_tj16_ls_vjdw16_sww[T16]</td>";

                          $pl_tj17_ls_vjdw17_sw = $ms_q("$sl Bulan,NIK,T17 FROM TJ_main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw' AND Bulan='$kal_bulan01_sw' ");
                          $pl_tj17_ls_vjdw17_sww = $ms_fas($pl_tj17_ls_vjdw17_sw);
                          echo"<td>$pl_tj17_ls_vjdw17_sww[T17]</td>";

                          $pl_tj18_ls_vjdw18_sw = $ms_q("$sl Bulan,NIK,T18 FROM TJ_main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw' AND Bulan='$kal_bulan01_sw' ");
                          $pl_tj18_ls_vjdw18_sww = $ms_fas($pl_tj18_ls_vjdw18_sw);
                          echo"<td>$pl_tj18_ls_vjdw18_sww[T18]</td>";

                          $pl_tj19_ls_vjdw19_sw = $ms_q("$sl Bulan,NIK,T19 FROM TJ_main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw' AND Bulan='$kal_bulan01_sw' ");
                          $pl_tj19_ls_vjdw19_sww = $ms_fas($pl_tj19_ls_vjdw19_sw);
                          echo"<td>$pl_tj19_ls_vjdw19_sww[T19]</td>";

                          $pl_tj20_ls_vjdw20_sw = $ms_q("$sl Bulan,NIK,T20 FROM TJ_main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw' AND Bulan='$kal_bulan01_sw' ");
                          $pl_tj20_ls_vjdw20_sww = $ms_fas($pl_tj20_ls_vjdw20_sw);
                          echo"<td>$pl_tj20_ls_vjdw20_sww[T20]</td>";

                          $pl_tj21_ls_vjdw21_sw = $ms_q("$sl Bulan,NIK,T21 FROM TJ_main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw' AND Bulan='$kal_bulan01_sw' ");
                          $pl_tj21_ls_vjdw21_sww = $ms_fas($pl_tj21_ls_vjdw21_sw);
                          echo"<td>$pl_tj21_ls_vjdw21_sww[T21]</td>";

                          $pl_tj22_ls_vjdw22_sw = $ms_q("$sl Bulan,NIK,T22 FROM TJ_main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw' AND Bulan='$kal_bulan01_sw' ");
                          $pl_tj22_ls_vjdw22_sww = $ms_fas($pl_tj22_ls_vjdw22_sw);
                          echo"<td>$pl_tj22_ls_vjdw22_sww[T22]</td>";

                          $pl_tj23_ls_vjdw23_sw = $ms_q("$sl Bulan,NIK,T23 FROM TJ_main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw' AND Bulan='$kal_bulan01_sw' ");
                          $pl_tj23_ls_vjdw23_sww = $ms_fas($pl_tj23_ls_vjdw23_sw);
                          echo"<td>$pl_tj23_ls_vjdw23_sww[T23]</td>";

                          $pl_tj24_ls_vjdw24_sw = $ms_q("$sl Bulan,NIK,T24 FROM TJ_main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw' AND Bulan='$kal_bulan01_sw' ");
                          $pl_tj24_ls_vjdw24_sww = $ms_fas($pl_tj24_ls_vjdw24_sw);
                          echo"<td>$pl_tj24_ls_vjdw24_sww[T24]</td>";

                          $pl_tj25_ls_vjdw25_sw = $ms_q("$sl Bulan,NIK,T25 FROM TJ_main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw' AND Bulan='$kal_bulan01_sw' ");
                          $pl_tj25_ls_vjdw25_sww = $ms_fas($pl_tj25_ls_vjdw25_sw);
                          echo"<td>$pl_tj25_ls_vjdw25_sww[T25]</td>";

                          $pl_tj26_ls_vjdw26_sw = $ms_q("$sl Bulan,NIK,T26 FROM TJ_main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw' AND Bulan='$kal_bulan01_sw' ");
                          $pl_tj26_ls_vjdw26_sww = $ms_fas($pl_tj26_ls_vjdw26_sw);
                          echo"<td>$pl_tj26_ls_vjdw26_sww[T26]</td>";

                          $pl_tj27_ls_vjdw27_sw = $ms_q("$sl Bulan,NIK,T27 FROM TJ_main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw' AND Bulan='$kal_bulan01_sw' ");
                          $pl_tj27_ls_vjdw27_sww = $ms_fas($pl_tj27_ls_vjdw27_sw);
                          echo"<td>$pl_tj27_ls_vjdw27_sww[T27]</td>";

                          $pl_tj28_ls_vjdw28_sw = $ms_q("$sl Bulan,NIK,T28 FROM TJ_main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw' AND Bulan='$kal_bulan01_sw' ");
                          $pl_tj28_ls_vjdw28_sww = $ms_fas($pl_tj28_ls_vjdw28_sw);
                          echo"<td>$pl_tj28_ls_vjdw28_sww[T28]</td>";

                          $pl_tj29_ls_vjdw29_sw = $ms_q("$sl Bulan,NIK,T29 FROM TJ_main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw' AND Bulan='$kal_bulan01_sw' ");
                          $pl_tj29_ls_vjdw29_sww = $ms_fas($pl_tj29_ls_vjdw29_sw);
                          echo"<td>$pl_tj29_ls_vjdw29_sww[T29]</td>";

                          $pl_tj30_ls_vjdw30_sw = $ms_q("$sl Bulan,NIK,T30 FROM TJ_main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw' AND Bulan='$kal_bulan01_sw' ");
                          $pl_tj30_ls_vjdw30_sww = $ms_fas($pl_tj30_ls_vjdw30_sw);
                          echo"<td>$pl_tj30_ls_vjdw30_sww[T30]</td>";

                          $pl_tj31_ls_vjdw31_sw = $ms_q("$sl Bulan,NIK,T31 FROM TJ_main_Data.dbo.TJadwal WHERE NIK='$epwc_sub_vkry01_sw' AND Bulan='$kal_bulan01_sw' ");
                          $pl_tj31_ls_vjdw31_sww = $ms_fas($pl_tj31_ls_vjdw31_sw);
                          echo"<td>$pl_tj31_ls_vjdw31_sww[T31]</td>";


                          
                          
                      ?>
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