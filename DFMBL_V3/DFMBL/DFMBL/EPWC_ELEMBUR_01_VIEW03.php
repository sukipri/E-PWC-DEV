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
<span class="mx-2"><b>DAFTAR PERMINTAAN LEMBUR</b></span>
<br>
<p class="mx-2">Pilih Periode bulan untuk memulai verifikasi & pengecekan data lembur <a class="btn btn-secondary btn-sm">YYYY/MM</a></p>
<hr>

<?PHP 
    $epwc_sl_vblmbr01_sw = $CL_Q("$SL DISTINCT LemburBulanRng FROM TKaryLemburHari WHERE LemburBulanRng LIKE '%$DATE_Y%'");
        while($epwc_sl_vblmbr01_sww = $CL_FAS($epwc_sl_vblmbr01_sw)){
            echo"<a href='?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEW03&NAVIBLN01=NAVIBLN01&IDBLMBR01=$epwc_sl_vblmbr01_sww[LemburBulanRng]' class='btn btn-secondary btn-sm mx-2'><i class='fas fa-bookmark'></i> $epwc_sl_vblmbr01_sww[LemburBulanRng]</a>";
        }
?>
<hr>

<?PHP 
    if(isset($_GET['NAVIBLN01'])){ ?>

<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Koordinator</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Daftar Koordinator</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
           <?PHP 
                $epwc_sg_vkunit01_sw = $CL_Q("$SL KaryNomor,KaryNama,KaryDir FROM Citarum.dbo.Tkaryawan WHERE  KaryDir='$epwc_vkry01_sww[KaryNomorYakkum]' AND (KaryJbtStruktural='08' OR KaryJbtStruktural='07') order by KaryNama asc  ");
                while($epwc_sg_vkunit01_sww = $CL_FAS($epwc_sg_vkunit01_sw)){
                    $epwc_nr02_vlem01_sw = $CL_Q("SELECT  * FROM Citarum.dbo.TKaryLemburHari WHERE   KaryDir='$epwc_vkry01_sww[KaryNomorYakkum]' AND LemburBulanRng='$IDBLMBR01' AND Uploader='$epwc_sg_vkunit01_sww[KaryNomor]' AND LemburApp='2'");
                    $epwc_nr02_ls_vlem01_sw  = $CL_NR($epwc_nr02_vlem01_sw);
                    echo"<a href='?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEW03&NAVIBLN01=NAVIBLN01&IDBLMBR01&IDKRY=$epwc_sg_vkunit01_sww[KaryNomor]&IDBLMBR01=$IDBLMBR01' class='dropdown-item'><i class='fas fa-bookmark'></i> $epwc_sg_vkunit01_sww[KaryNama] <span class='badge bg-danger'>$epwc_nr02_ls_vlem01_sw</span></a>";
                    }
           ?>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br>      
        <?PHP       
                    #echo"<hr>";
        $epwc_nr_ls_vlem01_sw = $CL_Q("SELECT  * FROM Citarum.dbo.TKaryLemburHari WHERE   KaryDir='$epwc_vkry01_sww[KaryNomorYakkum]' AND LemburBulanRng='$IDBLMBR01' AND Uploader='$IDKRY'   order by LemburTanggal desc  ");
        $epwc_nr_ls_vlem01_sww = $CL_NR($epwc_nr_ls_vlem01_sw);
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
        $epwc_ls_vlem01_sw = $CL_Q("SELECT  * FROM Citarum.dbo.TKaryLemburHari WHERE   KaryDir='$epwc_vkry01_sww[KaryNomorYakkum]' AND LemburBulanRng='$IDBLMBR01' AND Uploader='$IDKRY'  order by LemburTanggal asc  ");
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
        <td><?PHP echo"$epwc_ls_vlem01_sww[LemburUraian]"; ?></td>
        <td><?PHP echo"$epwc_ls_vlem01_sww[LemburAlasan]"; ?></td>
        <td><?PHP echo"$epwc_ls_vlem01_sww[LemburTarget]"; ?></td>
        <td><?PHP echo"$epwc_ls_vlem01_sww[LemburHasil]"; ?></td>
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
                        header("LOCATION:?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEW03&NAVIBLN01=NAVIBLN01&IDBLMBR01=$IDBLMBR01&IDKRY=$IDKRY");

                }
        ?>
<?PHP 
          $epwc_tot_vlem01_sw = $CL_Q("SELECT SUM(LemburBiasaJumlah) as tot_lembur FROM Citarum.dbo.TKaryLemburHari WHERE  LemburApp='2' AND KaryDir='$epwc_vkry01_sww[KaryNomorYakkum]' AND LemburBulanRng='$IDBLMBR01' AND Uploader='$IDKRY'  ");
            $epwc_tot_vlem01_sww = $CL_FAS($epwc_tot_vlem01_sw); #TOTAL PENDING

            $epwc_tot02_vlem01_sw = $CL_Q("SELECT SUM(LemburBiasaJumlah) as tot02_lembur FROM Citarum.dbo.TKaryLemburHari WHERE  LemburApp='4' AND KaryDir='$epwc_vkry01_sww[KaryNomorYakkum]'  AND LemburBulanRng='$IDBLMBR01' AND Uploader='$IDKRY' ");
            $epwc_tot02_vlem01_sww = $CL_FAS($epwc_tot02_vlem01_sw); #TOTAL SUCCESSS
?>
<div class="alert alert-dismissible alert-info">
                <?PHP echo"<b>TOTAL Pending : Rp.".$NF($epwc_tot_vlem01_sww['tot_lembur']); ?>
</div>
<div class="alert alert-dismissible alert-success">
                <?PHP echo"<b>TOTAL Sending : Rp.".$NF($epwc_tot02_vlem01_sww['tot02_lembur']); ?>
</div>

<?PHP } ?>