<a class="badge bg-dark"><i class="fas fa-folder-open"></i>DATA LEMBUR *All / Divisi</a>
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
<hr>

<?PHP 
 if(isset($_POST['btn_cari_01'])){
  #$slc_bag = @$_POST['slc_bag'];
  $slc_bln = @$_POST['slc_bln'];
 
    echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?HLM=FIN_M&SUB=FIN_M_FIN_LEMBUR&SUB_CHILD=FIN_M_FIN_LEMBUR01ALL&IDLBULAN01=$slc_bln&GETCARI01=GETCARI01'>";
 }
    if(isset($_GET['GETCARI01'])){
      #echo $IDKLP01;
  ?>
  <div class="card border-primary mb-3" style="max-width: 20rem;">
  <div class="card-header"><?PHP echo $IDLBULAN01; ?></div>
  <div class="card-body">
        <b>DATA LEMBUR KARYAWAN</b>
  </div>
</div>
<div id="" style="overflow:scroll; height:750px;">
  <table class="table table-sm table-bordered table-striped">
    <tr class="table-dark">
    <td width="3%">#</td>
        <td>Nama</td>
        <td width="17%">Bagian</td>
       <td>Tot.Jam Lembur Biasa</td>
       <td>Nom.Lembur Biasa</td>
       <td>Tot.Jam Lembur Malam</td>
       <td>Nom.Lembur Malam</td>
       <td>Nom.Lembur Total</td>
       <td>Total Jam</td>
       <td class="table-warning" width="5%">Belum Ter-Verif</td>
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
              #DATA LEMBUR BIASA TOTAL
              $pl_tot_vlem01_sw = $ms_q("$sl SUM(LemburBiasaJumlah) as tot_lem FROM Citarum.dbo.TKaryLemburhari WHERE LemburBulan='$IDLBULAN01' AND KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburApp='4' AND NOT LemburJenis='DM'");
              $pl_tot_vlem01_sww = $ms_fas($pl_tot_vlem01_sw);
              echo number_format(ceil($pl_tot_vlem01_sww['tot_lem']));
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
              #DATA LEMBUR Malam TOTAL
              $pl_tot02_vlem01_sw = $ms_q("$sl SUM(LemburBiasaJumlah) as tot_lem02 FROM Citarum.dbo.TKaryLemburhari WHERE LemburBulan='$IDLBULAN01' AND KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburApp='4' AND LemburJenis='DM'");
              $pl_tot02_vlem01_sww = $ms_fas($pl_tot02_vlem01_sw);
              echo number_format($pl_tot02_vlem01_sww['tot_lem02']);
          ?>
         
       </td>
       <td align="right">
       
          <?PHP 
              #DATA LEMBUR TOTAL
              $pl_tot03_vlem01_sw = $ms_q("$sl SUM(LemburBiasaJumlah) as tot_lem03 FROM Citarum.dbo.TKaryLemburhari WHERE LemburBulan='$IDLBULAN01' AND KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburApp='4'");
              $pl_tot03_vlem01_sww = $ms_fas($pl_tot03_vlem01_sw);
              echo number_format($pl_tot03_vlem01_sww['tot_lem03']);
          ?>
         
       </td>
       <td align="center">
       <?PHP 
              #DATA JAM SUB TOTAL
              $pl_totjam_vlem01_sw = $ms_q("$sl SUM(LemburBiasa) as totjam FROM Citarum.dbo.TKaryLemburhari WHERE LemburBulan='$IDLBULAN01' AND KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND LemburApp='4'");
              $pl_totjam_vlem01_sww = $ms_fas($pl_totjam_vlem01_sw);
              echo $pl_totjam_vlem01_sww['totjam'];
          ?>
       </td>
       <td>
          <?PHP 
                $pl_cek_vlem01_sw = $ms_q("$sl LemburBulan,LemburBulanRng,KaryNomor FROM Citarum.dbo.TKaryLemburhari WHERE  KaryNomor='$pl_ls_vkry01_sww[KaryNomor]' AND (LemburApp='2' OR LemburApp='31') AND LemburBulan='$IDLBULAN01'");
                $pl_nr_cek_vlem01_sww = $ms_nr($pl_cek_vlem01_sw);

                    echo"<b>".$pl_nr_cek_vlem01_sww."</b>";
            ?>
       </td>
    </tr>
    <?PHP $no_kry++; } ?>
        </table>
        </div>

<table class="table table-sm table-bordered table-striped">
    <tr>
       <td></td>
       
       <td align="right" class="table-dark">
          <?PHP 
              #DATA LEMBUR biasa TOTAL
              $pl_totav_vlem01_sw = $ms_q("$sl SUM(LemburBiasaJumlah) as tot_av FROM Citarum.dbo.TKaryLemburhari WHERE LemburBulan='$IDLBULAN01'  AND LemburApp='4' AND NOT LemburJenis='DM'");
              $pl_totav_vlem01_sww = $ms_fas($pl_totav_vlem01_sw);
              #DATA LEMBUR MALAM TOTAL
              $pl_totav02_vlem01_sw = $ms_q("$sl SUM(LemburBiasaJumlah) as tot_av02 FROM Citarum.dbo.TKaryLemburhari WHERE LemburBulan='$IDLBULAN01'  AND LemburApp='4' AND LemburJenis='DM'");
              $pl_totav02_vlem01_sww = $ms_fas($pl_totav02_vlem01_sw);
              #DATA LEMBUR  TOTAL GLobal
              $pl_totavg_vlem01_sw = $ms_q("$sl SUM(LemburBiasaJumlah) as tot_avg FROM Citarum.dbo.TKaryLemburhari WHERE LemburBulan='$IDLBULAN01'  AND LemburApp='4'");
              $pl_totavg_vlem01_sww = $ms_fas($pl_totavg_vlem01_sw);

              echo "Total lembur Biasa ".number_format($pl_totav_vlem01_sww['tot_av']);
              echo"<br>";
              echo "Total lembur Malam ".number_format($pl_totav02_vlem01_sww['tot_av02']);
              echo"<br>";
              echo "<b>Total lembur Global</b>  ".number_format($pl_totavg_vlem01_sww['tot_avg']);
          ?>
       </td>
    </tr>
    <tr>
       <td width="50%">
        <?PHP 
            #DATA CEKING VERIFIKATOR Direktur UnVerif
            $pl_nr_dir01_vlem01_sw = $ms_q("$sl KaryNomor,KaryDir FROM Citarum.dbo.TKaryLemburhari WHERE KaryDir='04000671' AND  (LemburApp='2') AND LemburBulan='$IDLBULAN01'");
            $pl_nr_dir01_vlem01_sww = $ms_nr($pl_nr_dir01_vlem01_sw);
             #DATA CEKING VERIFIKATOR Direktur Pending atau Reject
             $pl_nr_dirpen01_vlem01_sw = $ms_q("$sl KaryNomor,KaryDir FROM Citarum.dbo.TKaryLemburhari WHERE KaryDir='04000671' AND  (LemburApp='3' OR LemburApp='31') AND LemburBulan='$IDLBULAN01'");
             $pl_nr_dirpen01_vlem01_sww = $ms_nr($pl_nr_dirpen01_vlem01_sw);

            #DATA CEKING VERIFIKATOR Direktur
            $pl_nr_dir02_vlem01_sw = $ms_q("$sl KaryNomor,KaryDir FROM Citarum.dbo.TKaryLemburhari WHERE KaryDir='04130956' AND  (LemburApp='2' OR LemburApp='31') AND LemburBulan='$IDLBULAN01'");
            $pl_nr_dir02_vlem01_sww = $ms_nr($pl_nr_dir02_vlem01_sw);
            #DATA CEKING VERIFIKATOR Direktur Pending atau Reject
            $pl_nr_dirpen02_vlem01_sw = $ms_q("$sl KaryNomor,KaryDir FROM Citarum.dbo.TKaryLemburhari WHERE KaryDir='04130956' AND  (LemburApp='3' OR LemburApp='31') AND LemburBulan='$IDLBULAN01'");
            $pl_nr_dirpen02_vlem01_sww = $ms_nr($pl_nr_dirpen02_vlem01_sw);

            #DATA CEKING VERIFIKATOR Direktur
            $pl_nr_dir03_vlem01_sw = $ms_q("$sl KaryNomor,KaryDir FROM Citarum.dbo.TKaryLemburhari WHERE KaryDir='04100869' AND  (LemburApp='2' OR LemburApp='31') AND LemburBulan='$IDLBULAN01'");
            $pl_nr_dir03_vlem01_sww = $ms_nr($pl_nr_dir03_vlem01_sw);
            #DATA CEKING VERIFIKATOR Direktur Pending atau Reject
            $pl_nr_dirpen03_vlem01_sw = $ms_q("$sl KaryNomor,KaryDir FROM Citarum.dbo.TKaryLemburhari WHERE KaryDir='04100869' AND  (LemburApp='3' OR LemburApp='31') AND LemburBulan='$IDLBULAN01'");
            $pl_nr_dirpen03_vlem01_sww = $ms_nr($pl_nr_dirpen03_vlem01_sw);

            // #DATA Samples
            // $pl_nrt_dir01_vlem01_sw = $ms_q("$sl KaryNomor,KaryDir,Uploader FROM Citarum.dbo.TKaryLemburhari WHERE KaryDir='04000671' AND  (LemburApp='2' OR LemburApp='31') AND LemburBulan='$IDLBULAN01'");
            // while($pl_nrt_dir01_vlem01_sww = $ms_fas($pl_nrt_dir01_vlem01_sw)){
            //     echo "KRY ".$pl_nrt_dir01_vlem01_sww['KaryNomor']." DIR ".$pl_nrt_dir01_vlem01_sww['KaryDir']." UP ".$pl_nrt_dir01_vlem01_sww['Uploader']."<br>";  } 04100869
           
        ?>
        <div class="alert alert-dismissible alert-info">
               <i class="fas fa-info"></i>
                <strong>drg. Kriswidiati, M.Kes</strong> <?PHP echo "<span class='badge bg-dark'>".$pl_nr_dir01_vlem01_sww."</span> Belum diverifikasi"; ?>
                <br>
                <i class="fas fa-info"></i>
                <strong>drg. Kriswidiati, M.Kes</strong> <?PHP echo "Menolak <span class='badge bg-dark'>".$pl_nr_dirpen01_vlem01_sww."</span> Form"; ?>
        </div>

        <div class="alert alert-dismissible alert-info">
               <i class="fas fa-info"></i>
                <strong>dr. Tiurlan Pardamean BR. Sibarani</strong> <?PHP echo "<span class='badge bg-dark'>".$pl_nr_dir02_vlem01_sww."</span> Belum diverifikasi"; ?>
                <br>
                <i class="fas fa-info"></i>
                <strong>dr. Tiurlan Pardamean BR. Sibarani</strong> <?PHP echo "Menolak <span class='badge bg-dark'>".$pl_nr_dirpen02_vlem01_sww."</span> Form"; ?>
        </div>

        <div class="alert alert-dismissible alert-info">
               <i class="fas fa-info"></i>
                <strong>dr. Santi Kristiani, Sp.PK</strong> <?PHP echo "<span class='badge bg-dark'>".$pl_nr_dir03_vlem01_sww."</span> Belum diverifikasi"; ?>
                <br>
                <i class="fas fa-info"></i>
                <strong>dr. Santi Kristiani, Sp.PK</strong> <?PHP echo "Menolak <span class='badge bg-dark'>".$pl_nr_dirpen03_vlem01_sww."</span> Form"; ?>
        </div>

       </td>
       <td>

       <b><?PHP echo"Data Pending "; ?></b>
       <div id="" style="overflow:scroll; height:750px;">
       <table class="table">
                <tr class="table-primary">
                    <td>Nama</td>
                    <td>Otorisator</td>
                    <td width="30%">Tanggal</td>
                </tr>
                <?PHP 
                    #DATA LEMBUR PENDDING
                    $pl_pen_ls_vlem01_sw = $ms_q("$sl LemburBulan,LemburBulanRNg,KaryNomor,LemburApp,KaryDir,CONVERT(date,LemburTanggal) as ltgl FROM Citarum.dbo.TKaryLemburHari WHERE (LemburApp='3' OR LemburApp='31') AND LemburBulan='$IDLBULAN01'");
                    while($pl_pen_ls_vlem01_sww = $ms_fas($pl_pen_ls_vlem01_sw)){
                        #DATA KARYAWAN
                        $pl_pen_ls_vkry01_sw = $ms_q("$sl KaryNomor,KaryNama FROM Citarum.dbo.TKaryawan WHERE  KaryNomor='$pl_pen_ls_vlem01_sww[KaryNomor]'");
                            $pl_pen_ls_vkry01_sww = $ms_fas($pl_pen_ls_vkry01_sw);
                        #DATA KARYAWAN DIREKSI
                        #DATA KARYAWAN
                        $pl_pen_ls_vdkry01_sw = $ms_q("$sl KaryNomor,KaryNama FROM Citarum.dbo.TKaryawan WHERE  KaryNomorYakkum='$pl_pen_ls_vlem01_sww[KaryDir]'");
                            $pl_pen_ls_vdkry01_sww = $ms_fas($pl_pen_ls_vdkry01_sw);

                ?>
                <tr>
                    <td>
                        <?PHP echo $pl_pen_ls_vkry01_sww['KaryNama'];
                                echo"<br>";
                                if($pl_pen_ls_vlem01_sww['LemburApp']=="3"){
                                    echo"<a href='#' class='badge bg-dark'>Reject</a>";
                                  }elseif($pl_pen_ls_vlem01_sww['LemburApp']=="31"){
                                    echo"<a href='#' class='badge bg-secondary'>Pending</a>";
                                    }
                    
                    ?>
                    </td>
                    <td><?PHP echo $pl_pen_ls_vdkry01_sww['KaryNama'] ?></td>
                    <td><?PHP echo $pl_pen_ls_vlem01_sww['ltgl']; ?></td>
                </tr>
                <?PHP } ?>
            </table>

       </td>
    </tr>
  </table>
  </div>
      <a href="<?PHP echo"FIN_M_FIN_LEMBUR01_DTL-XLS02.php?IDLBULAN01=$IDLBULAN01";  ?>" target="_blank" class="btn btn-success"><i class="far fa-file-excel"></i> Download Data</button>
  <?PHP } ?>