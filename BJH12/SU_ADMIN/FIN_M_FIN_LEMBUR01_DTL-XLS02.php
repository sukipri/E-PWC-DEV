<?PHP 
 include"../config/connec_01_srv.php";
 include"../sc/stack_Q.php"; //Query SQL
 $IDLBULAN01 = @$_GET['IDLBULAN01'];
 header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=FILE-$IDLBULAN01.xls");
?>
<?PHP echo "<h3>Bulan TF : ".$IDLBULAN01."</h3>"; #No_NIP_Nama_Bagian_Jam Lembur Biasa_Rp Lembur Biasa_Jam Lembur Malam_Rp Lembur Malam_Total Jam Lembur_Total Rupiah Lembur ?>
<hr>
  <table class="table table-sm table-bordered table-striped" border="1">
    <tr class="table-dark">
    <td width="3%">#</td>
        <td>No_NIP_Nama</td>
        <td width="17%">Bagian</td>
       <td>Lembur Biasa_Jam</td>
       <td>Lembur Biasa_Rp</td>
       <td>Lembur Malam_Total Jam</td>
       <td>Lembur Malam_Rp</td>
       <td>Lembur_Total Rupiah Lembur</td>
       <td>Total Jam</td>
    </tr>
    <?PHP 
        $no_kry = 1;
      $pl_ls_vkry01_sw = $ms_q("$sl KaryNomor,KaryNama,UnitKode FROM Citarum.dbo.TKaryawan WHERE   (KaryStatus='10' OR KaryStatus='22') order by KaryNama asc");
        while($pl_ls_vkry01_sww = $ms_fas($pl_ls_vkry01_sw)){
          #DATA UNIT  
          $pl_ls_vunit01_sw = $ms_q("$sl UnitKode,UnitNama FROM Citarum.dbo.TUnitPrs WHERE  UnitKode='$pl_ls_vkry01_sww[UnitKode]'");
          $pl_ls_vunit01_sww = $ms_fas($pl_ls_vunit01_sw);

             #DATA LEMBUR BIASA TOTAL
             $pl_tot_vlem01_sw = $ms_q("$sl SUM(LemburBiasaJumlah) as tot_lem FROM Citarum.dbo.TKaryLemburhari WHERE LemburBulan='$IDLBULAN01' AND KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburApp='4' AND NOT LemburJenis='DM'");
             $pl_tot_vlem01_sww = $ms_fas($pl_tot_vlem01_sw);
             
              #DATA LEMBUR BIASA TOTAL
              $pl_tot02_vlem01_sw = $ms_q("$sl SUM(LemburBiasaJumlah) as tot_lem02 FROM Citarum.dbo.TKaryLemburhari WHERE LemburBulan='$IDLBULAN01' AND KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburApp='4' AND LemburJenis='DM'");
              $pl_tot02_vlem01_sww = $ms_fas($pl_tot02_vlem01_sw);

               #DATA LEMBUR TOTAL
               $pl_tot03_vlem01_sw = $ms_q("$sl SUM(LemburBiasaJumlah) as tot_lem03 FROM Citarum.dbo.TKaryLemburhari WHERE LemburBulan='$IDLBULAN01' AND KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburApp='4'");
               $pl_tot03_vlem01_sww = $ms_fas($pl_tot03_vlem01_sw);

               #DATA JAM SUB TOTAL
               $pl_totjam_vlem01_sw = $ms_q("$sl SUM(LemburBiasa) as totjam FROM Citarum.dbo.TKaryLemburhari WHERE LemburBulan='$IDLBULAN01' AND KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburApp='4'");
               $pl_totjam_vlem01_sww = $ms_fas($pl_totjam_vlem01_sw);
               
  

                #PEMBULATAN
                $pl_tot_vlem01_sww_rd = round($pl_tot_vlem01_sww['tot_lem']);
                $pl_tot_vlem01_sww_rd02 = round($pl_tot02_vlem01_sww['tot_lem02']);
                $pl_tot_vlem01_sww_rd03 = round($pl_tot03_vlem01_sww['tot_lem03']);
               
          
    ?>
    <tr>
    <td><?PHP echo $no_kry; ?></td>
       <td><?PHP echo $pl_ls_vkry01_sww['KaryNama']; ?></td>
        <td><?PHP echo  $pl_ls_vunit01_sww['UnitNama']; ?></td>
       <td>
       <?PHP 
              #DATA JAM BIASA
              $pl_totjamb_vlem01_sw = $ms_q("$sl SUM(LemburBiasa) as totjamb FROM Citarum.dbo.TKaryLemburhari WHERE LemburBulan='$IDLBULAN01' AND KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburApp='4' AND NOT LemburJenis='DM' ");
              $pl_totjamb_vlem01_sww = $ms_fas($pl_totjamb_vlem01_sw);
              echo $pl_totjamb_vlem01_sww['totjamb'];
          ?>
       </td>
       <td align="right">
       
          <?PHP 
             
              echo number_format($pl_tot_vlem01_sww['tot_lem'],0,".","."); 
          ?>
         
       </td>
       <td>
       <?PHP 
              #DATA JAM Malam
              $pl_totjamdm_vlem01_sw = $ms_q("$sl SUM(LemburBiasa) as totjamdm FROM Citarum.dbo.TKaryLemburhari WHERE LemburBulan='$IDLBULAN01' AND KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburApp='4' AND  LemburJenis='DM' ");
              $pl_totjamdm_vlem01_sww = $ms_fas($pl_totjamdm_vlem01_sw);
              echo $pl_totjamdm_vlem01_sww['totjamdm'];
          ?>
       </td>
       <td align="right">
       
          <?PHP 
               
               echo number_format($pl_tot02_vlem01_sww['tot_lem02'],0,".","."); 
          ?>
         
       </td>
       
       <td align="right">
       
          <?PHP 
            echo number_format($pl_tot03_vlem01_sww['tot_lem03'],0,".","."); 
          ?>
         
       </td>
       <td><?PHP echo $pl_totjam_vlem01_sww['totjam']; ?></td>
    </tr>
    <?PHP $no_kry++; } 

      #DATA LEMBUR BIASA TOTAL All
      $pl_totall01_vlem01_sw = $ms_q("$sl SUM(LemburBiasaJumlah) as tot_all01 FROM Citarum.dbo.TKaryLemburhari WHERE LemburBulan='$IDLBULAN01' AND  LemburApp='4' AND NOT LemburJenis='DM'");
      $pl_totall01_vlem01_sww = $ms_fas($pl_totall01_vlem01_sw);

      #DATA LEMBUR Malam TOTAL All
      $pl_totall02_vlem01_sw = $ms_q("$sl SUM(LemburBiasaJumlah) as tot_all02 FROM Citarum.dbo.TKaryLemburhari WHERE LemburBulan='$IDLBULAN01'  AND LemburApp='4' AND LemburJenis='DM'");
      $pl_totall02_vlem01_sww = $ms_fas($pl_totall02_vlem01_sw);

         #DATA LEMBUR TOTAL All
         $pl_totall_vlem01_sw = $ms_q("$sl SUM(LemburBiasaJumlah) as tot_all FROM Citarum.dbo.TKaryLemburhari WHERE LemburBulan='$IDLBULAN01' AND  LemburApp='4'");
         $pl_totall_vlem01_sww = $ms_fas($pl_totall_vlem01_sw);

          #DATA JAM TOTAL
          $pl_totjamall_vlem01_sw = $ms_q("$sl SUM(LemburBiasa) as totjamall FROM Citarum.dbo.TKaryLemburhari WHERE LemburBulan='$IDLBULAN01'  AND LemburApp='4'");
          $pl_totjamall_vlem01_sww = $ms_fas($pl_totjamall_vlem01_sw);

         #PEMBULATAN
           $pl_totall01_vlem01_sww_rd = round($pl_totall01_vlem01_sww['tot_all01'],2);
           $pl_totall02_vlem01_sww_rd02 = round($pl_totall02_vlem01_sww['tot_all02'],2);
           $pl_totall_vlem01_sww_rd03 = round($pl_totall_vlem01_sww['tot_all'],2);
         
    ?>
            <tr class="table-dark">
            <td width="3%">-</td>
                <td width="17%">-</td>
            <td>-</td>
            <td>-</td>
            <td><?PHP echo number_format(  $pl_totall01_vlem01_sww_rd,0,",",","); ?></td>
            <td>-</td>
            <td><?PHP echo number_format( $pl_totall02_vlem01_sww_rd02,0,",",","); ?></td>
            <td><?PHP echo number_format( $pl_totall_vlem01_sww_rd03,0,",",","); ?></td>
            <td><?PHP echo $pl_totjamall_vlem01_sww['totjamall'] ?></td>
            </tr>
        </table>
