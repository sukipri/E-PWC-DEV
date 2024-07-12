<?PHP 
    if(isset($_GET['UPAPPL02'])){ #APPROVED
        $up_lbr_01 = $CL_Q("$UP Citarum.dbo.TKaryLemburHari SET LemburApp='4',KaryDir='$IDKARYDIR' WHERE LemburID='$IDLBR01' ");
        header("LOCATION:?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEW03");
    }
    if(isset($_GET['UPRJL02'])){ #REJECT
        $up_lbr_01 = $CL_Q("$UP Citarum.dbo.TKaryLemburHari SET LemburApp='3',KaryDir='$IDKARYDIR' WHERE LemburID='$IDLBR01' ");
        header("LOCATION:?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEW03");
    }
?>
<form method="post">
<div class="alert alert-dismissible alert-info mx-2">
<span class="mx-2"><b>DAFTAR PERMINTAAN LEMBUR / by date</b></span>
<p class="mx-2">Pilih Tanggal > Verifikasi lembur sesuai pilihan tanggal</p>
<!--  -->
<div class="input-group mb-3" style="max-width:30rem;">
  <input type="date" name="txt_caritgl" class="form-control form-control-sm">
  <button class="btn btn-dark btn-sm" name="btn_caritgl">Pilih</button>
</div>
<!--  -->
</div>
</form>
    <?PHP 
        if(isset($_POST['btn_caritgl'])){
            $txt_caritgl = @$SQL_SL($_POST['txt_caritgl']);

            echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEW03DATE&IDTG01=$txt_caritgl&VWTGL01=VWTGL01'>";
        }
    ?>
<!--  -->
  <?PHP if(@$SQL_SL($_GET['VWTGL01'])){ ?>
<!--  -->

        <?PHP       
                    #echo"<hr>";
        $epwc_nr_ls_vlem01_sw = $CL_Q("SELECT  * FROM Citarum.dbo.TKaryLemburHari WHERE   KaryDir='$epwc_vkry01_sww[KaryNomorYakkum]' AND LemburTanggal BETWEEN '$IDTG01' AND '$IDTG01 23:59:00'  order by LemburTanggal desc  ");
        $epwc_nr_ls_vlem01_sww = $CL_NR($epwc_nr_ls_vlem01_sw);
        echo"<a href='#' class='badge bg-dark btn-sm mx-2'><i class='far fa-calendar-alt'></i> $IDTG01</a>";
            echo"<a href='#' class='badge bg-info btn-sm mx-2'><i class='fas fa-file-alt'></i> TOTAL FORM $epwc_nr_ls_vlem01_sww</a>";
?>
<form method="post">
<table class="table table-sm table-bordered table-striped mx-2">
    <tr class="table-dark">
        <td width="4%">#</td>
        <td width="10%">Nama</td>
        <td>Bagian</td>
        <td>Tanggal Lembur</td>
        <td>Jumlah Jam</td>
        <td>Ket.Lembur</td>
        <td width="3%">Status</td>
        <td>Nominal</td>
        <td width="10%">AKSI</td>
    </tr>
    <?PHP 
        $no_lembur_01 = 1;
    #DATA LEMBUR
        $epwc_ls_vlem01_sw = $CL_Q("SELECT  * FROM Citarum.dbo.TKaryLemburHari WHERE   KaryDir='$epwc_vkry01_sww[KaryNomorYakkum]' AND LemburTanggal BETWEEN '$IDTG01' AND '$IDTG01 23:59:00'  order by LemburTanggal asc  ");
        $epwc_nr_ls_vlem01_sw  = $CL_NR($epwc_ls_vlem01_sw);
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
        <td><?PHP echo"$no_lembur_01"; ?></td>
        <td><?PHP echo"$epwc_ls_vkary01_sww[KaryNama]"; ?></td>
        <td><?PHP echo $epwc_ls_vunit01_sww['UnitNama']; ?></td>
        <td><?PHP echo"$epwc_ls02_vlem01_sww[lstgl]"; ?></td>
        <td><?PHP echo"$epwc_ls_vlem01_sww[LemburBiasa]"; ?></td>
        <td>
            <?PHP
                 echo"Uraian : $epwc_ls_vlem01_sww[LemburUraian]";
                 echo"<br>";
                 echo"Alasan : $epwc_ls_vlem01_sww[LemburAlasan]";
                 echo"<br>";
                 echo"Target : $epwc_ls_vlem01_sww[LemburTarget]";
                 echo"<br>";
                 echo"Hasil : $epwc_ls_vlem01_sww[LemburHasil]";

        
            ?>
        </td>
        <?PHP 
         if($epwc_ls_vlem01_sww['LemburApp']=="3"){
            echo"<td class=table-dark><span class='badge bg-dark'>Rejected</span></td>";
         }elseif($epwc_ls_vlem01_sww['LemburApp']=="31"){
            echo"<td class=table-secondary><span class='badge bg-info'>Pending</span></td>";
        }elseif($epwc_ls_vlem01_sww['LemburApp']=="2"){
            echo"<td class=table-info></td>";
        }elseif($epwc_ls_vlem01_sww['LemburApp']=="4"){
            echo"<td class=table-success><span class='badge bg-success'>Approved</span></td>";
         }
        ?>       
        <td><?PHP echo$NF($epwc_ls_vlem01_sww['LemburBiasaJumlah']); ?></td>
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
            <input type="hidden" name="<?PHP echo"txt_unitkode_01$no_lembur_01"; ?>" value="<?PHP echo  $epwc_ls_vkary01_sww['UnitKode'] ?>">
    <select name="<?PHP echo"slc_app_01$no_lembur_01"; ?>" class="form-control form-control-sm" required>
                <?PHP 
                    if($epwc_ls_vlem01_sww['LemburApp']=="3"){ ?>
                        <option value="3">REJECT</option>
                        <option value="4">APPROVE</option>
                        <option value="31">Pending</option>
                        <?PHP }elseif($epwc_ls_vlem01_sww['LemburApp']=="31"){ ?>
                            <option value="31">Pending</option>
                            <option value="4">APPROVE</option>
                            <option value="3">REJECT</option>
                        
                        <?PHP }elseif($epwc_ls_vlem01_sww['LemburApp']=="4"){ ?>
                            <option value="4">APPROVE</option>
                            <option value="3">REJECT</option>
                            <option value="31">Pending</option>
            <?PHP }else{ ?>
            <option value="">-Pilih-</option>
            <option value="31">Pending</option>
            <option value="4">APPROVE</option>
            <option value="3">REJECT</option>
            <?PHP } ?>

     </select>

        </td>
    </tr>
                <?PHP $no_lembur_01++; } ?>
</table>
                <button class="btn btn-success btn-sm mx-2" name="btn_simpan_01"><i class="fas fa-cloud-upload-alt"></i> UPLOAD</button>
                <br><br>
            </form>
        <?PHP 
            $no_lembur_02 = 1;
                if(isset($_POST['btn_simpan_01'])){ #PROCCESSING
                    while($no_lembur_02 <=  $epwc_nr_ls_vlem01_sw){
                         $slc_app_01 = @$_POST['slc_app_01'. $no_lembur_02];
                         $txt_id_01 = @$_POST['txt_id_01'. $no_lembur_02];
                         $txt_unitkode_01 = @$_POST['txt_unitkode_01'. $no_lembur_02];
                         #echo $slc_app_01."-".$txt_id_01."<br>";
                        $up_lbr_01 = $CL_Q("$UP Citarum.dbo.TKaryLemburHari SET LemburApp='$slc_app_01',UnitKode='$txt_unitkode_01' WHERE LemburID='$txt_id_01' ");

                        $no_lembur_02++; }
                        header("LOCATION:?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEW03DATE&IDTG01=$IDTG01&VWTGL01=VWTGL01");

                }
        ?>
<?PHP 
          $epwc_tot_vlem01_sw = $CL_Q("SELECT SUM(LemburBiasaJumlah) as tot_lembur FROM Citarum.dbo.TKaryLemburHari WHERE  (LemburApp='2' OR LemburApp='31') AND KaryDir='$epwc_vkry01_sww[KaryNomorYakkum]' AND LemburTanggal BETWEEN '$IDTG01' AND '$IDTG01 23:59:00'   ");
            $epwc_tot_vlem01_sww = $CL_FAS($epwc_tot_vlem01_sw); #TOTAL PENDING

            $epwc_tot02_vlem01_sw = $CL_Q("SELECT SUM(LemburBiasaJumlah) as tot02_lembur FROM Citarum.dbo.TKaryLemburHari WHERE  LemburApp='4' AND KaryDir='$epwc_vkry01_sww[KaryNomorYakkum]'  AND LemburTanggal BETWEEN '$IDTG01' AND '$IDTG01 23:59:00' ");
            $epwc_tot02_vlem01_sww = $CL_FAS($epwc_tot02_vlem01_sw); #TOTAL SUCCESSS
?>
<div class="alert alert-dismissible alert-secondary">
        <?PHP echo"<b>TOTAL Pending : Rp.".$NF($epwc_tot_vlem01_sww['tot_lembur']); ?>
</div>
<div class="alert alert-dismissible alert-success">
    <?PHP echo"<b>TOTAL Sending : Rp.".$NF($epwc_tot02_vlem01_sww['tot02_lembur']); ?>
</div>
<!--  -->
<?PHP } #CLOSE VWTGL01 ?>

<!--  -->