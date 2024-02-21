<?PHP 
        #DATA KARY
        $epwc_ls_vkary01_sw = $ms_q("$sl KaryNomor,UnitKode,KaryNama FROM Citarum.dbo.TKaryawan WHERE KaryNomorYakkum='$IDEMP01' ");
        $epwc_ls_vkary01_sww = $ms_fas($epwc_ls_vkary01_sw);
        #DATA UNIT
        $epwc_ls_vunit01_sw = $ms_q("$sl UnitKode,UnitNama FROM TUnitPrs WHERE UnitKode='$epwc_ls_vkary01_sww[UnitKode]'");
        $epwc_ls_vunit01_sww = $ms_fas($epwc_ls_vunit01_sw);
?>

<div class="card border-primary mb-3" style="max-width: 20rem;">
  <div class="card-header"><a class="badge bg-dark"><i class="fas fa-folder-open"></i>DATA LEMBUR *Personal</a></div>
  <div class="card-body">
    <h4 class="card-title"><?PHP echo $epwc_ls_vkary01_sww['KaryNama'] ?></h4>
    <?PHP echo "<b>#".$epwc_ls_vunit01_sww['UnitNama']."</b>"; ?>
  </div>
</div>
<br>
<table class="table table-sm table-bordered table-striped mx-2">
    <tr class="table-dark">
        <td>Tanggal Lembur</td>
        <td>Jumlah Jam</td>
        <td>Uraian</td>
        <td>Alasan</td>
        <td>Target</td>
        <td>Hasil</td>
        <td>Nominal</td>
        <td width="10%">AKSI</td>
    </tr>
    <?PHP 
        $no_lembur_01 = 1;
    #DATA LEMBUR
        $epwc_ls_vlem01_sw = $ms_q("SELECT  * FROM Citarum.dbo.TKaryLemburHari WHERE   KaryNomor='$IDEMP01' AND LemburBulan='$IDLBULAN01'   order by LemburTanggal desc  ");
        $epwc_nr_ls_vlem01_sw  = $ms_nr($epwc_ls_vlem01_sw);
            while($epwc_ls_vlem01_sww = $ms_fas($epwc_ls_vlem01_sw)){
        #DATA TANGGAL LEMBUR
        $epwc_ls02_vlem01_sw = $ms_q("$sl CONVERT(date,LemburTanggal) as lstgl FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$IDEMP01' AND LemburBulan='$IDLBULAN01' AND LemburTanggal='$epwc_ls_vlem01_sww[LemburTanggal]'"); 
                $epwc_ls02_vlem01_sww = $ms_fas($epwc_ls02_vlem01_sw);
               
        #DB PRESENSI Table Record Presensi
                $substr_karynomor = substr($epwc_ls_vlem01_sww['KaryNomor'],1);
                
            $epwc_ls_vrinfo01_sw = $ms_q("$sl Per_ID,Date_Time,In_Out FROM TJ_Main_Data.dbo.TA_Record_Info WHERE CONVERT(date,Date_Time)='$epwc_ls02_vlem01_sww[lstgl]' AND Per_ID='$substr_karynomor' AND In_Out='2'  ");
            $epwc_ls_vrinfo01_sww = $ms_fas($epwc_ls_vrinfo01_sw);
            #echo $epwc_ls_vlem01_sww['LemburTanggal']."|$substr_karynomor"."|";
    ?>
    <tr>
        <td><?PHP echo"$epwc_ls02_vlem01_sww[lstgl]<br><b>#$epwc_ls_vlem01_sww[LemburJenis]</b>"; ?></td>
        <td><?PHP echo"$epwc_ls_vlem01_sww[LemburBiasa]"; ?></td>
        <td><?PHP echo"$epwc_ls_vlem01_sww[LemburUraian]"; ?></td>
        <td><?PHP echo"$epwc_ls_vlem01_sww[LemburAlasan]"; ?></td>
        <td><?PHP echo"$epwc_ls_vlem01_sww[LemburTarget]"; ?></td>
        <td><?PHP echo"$epwc_ls_vlem01_sww[LemburHasil]";
                    echo"<br>";
                echo "<span class='badge bg-danger'>".$epwc_ls_vrinfo01_sww['Date_Time']."</span>";
        ?></td>
        <td><?PHP echo number_format($epwc_ls_vlem01_sww['LemburBiasaJumlah']); ?></td>
        <td>
            <?PHP
            /*
                if($epwc_ls_vlem01_sww['LemburApp']=="1"){
                    echo"<a href='' class='badge bg-info'>Proccessing</a>";
                }elseif($epwc_ls_vlem01_sww['LemburApp']=="2"){
                    echo"<a href='?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEW03&IDKRY=$epwc_ls_vlem01_sww[KaryNomor]&IDLTGL=$epwc_ls02_vlem01_sww[lstgl]&IDLBR01=$epwc_ls_vlem01_sww[LemburID]&UPAPPL02=UPAPPL02&IDKARYDIR=$epwc_ls_vlem01_sww[KaryDir]' class='badge bg-info'>Approve?</a>";
                    echo"&nbsp";
                    echo"<a href='?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEW03&IDKRY=$epwc_ls_vlem01_sww[KaryNomor]&IDLTGL=$epwc_ls02_vlem01_sww[lstgl]&IDLBR01=$epwc_ls_vlem01_sww[LemburID]&UPRJL02=UPRJL02&IDKARYDIR=$epwc_ls_vlem01_sww[KaryDir]' class='badge bg-dark'>Reject?</a>";
                }elseif($epwc_ls_vlem01_sww['LemburApp']=="4"){
                    echo"<a href='#' class='badge bg-success'>Approved</a>";
                }elseif($epwc_ls_vlem01_sww['LemburApp']=="3"){
                    echo"<a href='#' class='badge bg-dark'>rejected</a>";
                }
                */
            ?>
            <input type="hidden" name="<?PHP echo"txt_id_01$no_lembur_01"; ?>" value="<?PHP echo $epwc_ls_vlem01_sww['LemburID'] ?>">
                <?PHP 
                    if($epwc_ls_vlem01_sww['LemburApp']=="1"){
                        echo"<a href='#' class='badge bg-info'>Aprrove?</a>";
                        echo"&nbsp";
                        echo"<a href='#' class='badge bg-danger'>Reject</a>";
                    }elseif($epwc_ls_vlem01_sww['LemburApp']=="3"){
                        echo"<span class='badge bg-dark'>Rejected</span>";
                    }elseif($epwc_ls_vlem01_sww['LemburApp']=="2"){
                        echo"<span class='badge bg-success'>Approved.HO</span>";
                    }elseif($epwc_ls_vlem01_sww['LemburApp']=="4"){
                        echo"<span class='badge bg-success'>Approved.CEO</span>";
                        echo"&nbsp";
                    }else{echo"<span class='badge bg-dark'>Rejected</span>"; }
                   ?>


        </td>
    </tr>
                <?PHP $no_lembur_01++; } #DATA LEMBUR
         $epwc_tot_sl02_vlmbr01_sw = $ms_q("$sl SUM(LemburBiasa) as jml_lmbr FROM  Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$IDEMP01' AND LemburBulan='$IDLBULAN01' AND LemburApp='4'");
             $epwc_tot_sl02_vlmbr01_sww = $ms_fas($epwc_tot_sl02_vlmbr01_sw); #DATA TOTAL JAM LEMBUR

             $epwc_tot02_sl02_vlmbr01_sw = $ms_q("$sl SUM(LemburBiasaJumlah) as jml_nom FROM  Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$IDEMP01' AND LemburBulan='$IDLBULAN01' AND LemburApp='4'");
             $epwc_tot02_sl02_vlmbr01_sww = $ms_fas($epwc_tot02_sl02_vlmbr01_sw); #DATA TOTAL NOMINAL
             
             ?>
             <tr class="table-primary">
        <td><?PHP echo"-"; ?></td>
        <td><?PHP echo"$epwc_tot_sl02_vlmbr01_sww[jml_lmbr]"; ?></td>
        <td>-</td>
        <td><?PHP echo"-"; ?></td>
        <td><?PHP echo"-"; ?></td>
        <td><?PHP echo"-"; ?></td>
        <td><?PHP echo number_format($epwc_tot02_sl02_vlmbr01_sww['jml_nom']); ?></td>
        <td> - </td>
    </tr>
</table>