

<?PHP 
    if(isset($_GET['UPAPPL01'])){ #APPROVED
        $up_lbr_01 = $CL_Q("$UP Citarum.dbo.TKaryLemburHari SET LemburApp='2',KaryDir='$IDKARYDIR' WHERE LemburID='$IDLBR01' ");
        header("LOCATION:?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEW02");
    }
    if(isset($_GET['UPRJL01'])){ #REJECT
        $del_lbr_01 = $CL_Q("$DL FROM  Citarum.dbo.TKaryLemburHari WHERE LemburID='$IDLBR01' ");
        header("LOCATION:?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEW02");
    }
?>
<span class="mx-2"><b>Daftar Approvement Lembur </b></span>
<form method="post">
<div class="input-group mb-3 mx-2">
  <input type="text" class="form-control" name="txt_nama_01" required>
  <select name="slc_bulan_01" class="form-control form-control-sm" required>
        <?PHP 
            $epwc_sl_vlb01_sw = $CL_Q("$SL  DISTINCT TOP 12 LemburBulan  FROM Citarum.dbo.TKaryLemburHari order by LemburBulan desc");
            while($epwc_sl_vlb01_sww = $CL_FAS($epwc_sl_vlb01_sw)){
            echo"<option value=$epwc_sl_vlb01_sww[LemburBulan]>$epwc_sl_vlb01_sww[LemburBulan]</option>";
            }
        ?>
    </select>
    <button class="btn btn-success btn-sm" name="btn_cari_01">CARI</button>
        </div>
        </form>
<hr>
<?PHP 
    if(isset($_POST['btn_cari_01'])){
        $txt_nama_01 = @$_POST['txt_nama_01'];
        $slc_bulan_01 = @$_POST['slc_bulan_01'];
  #UNIT KODE
  $epwc_ls_vkry01_sw = $CL_Q("$SL KaryNomor,KaryNama  FROM Citarum.dbo.TKaryawan WHERE  KaryNama LIKE '%$txt_nama_01%' AND KaryStatus='10' AND UnitKode='$epwc_vkry01_sww[UnitKode]' OR UnitKode='$epwc_vkry01_sww[UnitKode01]'  ");
  while($epwc_ls_vkry01_sww = $CL_FAS($epwc_ls_vkry01_sw)){
    echo"<a class='btn btn-info btn-sm mx-2'>$epwc_ls_vkry01_sww[KaryNama]</a>";
?>

<table class="table table-sm table-bordered table-striped mx-2">
    <tr class="">
        <td width="10%"><b>Bulan</b></td>
        <td><b>Tanggal Lembur</b></td>
        <td><b>Jumlah Jam</b></td>
        <td><b>Uraian</b></td>
        <td><b>Alasan</b></td>
        <td><b>Target</b></td>
        <td><b>Hasil</b></td>
        <td width="10%">###</td>
    </tr>
    <?PHP 
    #DATA LEMBUR
        $epwc_ls_vlem01_sw = $CL_Q("SELECT TOP 20  * FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$epwc_ls_vkry01_sww[KaryNomor]' AND NOT LemburApp='0' AND  LemburBulanRng='$slc_bulan_01' order by LemburTanggal desc  ");
            while($epwc_ls_vlem01_sww = $CL_FAS($epwc_ls_vlem01_sw)){
        #DATA TANGGAL LEMBUR
        $epwc_ls02_vlem01_sw = $CL_Q("$SL CONVERT(date,LemburTanggal) as lstgl FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$epwc_ls_vlem01_sww[KaryNomor]' AND LemburTanggal='$epwc_ls_vlem01_sww[LemburTanggal]' order by LemburTanggal desc"); 
                $epwc_ls02_vlem01_sww = $CL_FAS($epwc_ls02_vlem01_sw);
               
    ?>
    <tr>
        <td><?PHP echo"<a href='#'>$epwc_ls_vlem01_sww[LemburBulanRng]</a>"; ?></td>
        <td><?PHP echo"$epwc_ls02_vlem01_sww[lstgl]"; ?></td>
        <td><?PHP echo"$epwc_ls_vlem01_sww[LemburBiasa]"; ?></td>
        <td><?PHP echo"$epwc_ls_vlem01_sww[LemburUraian]"; ?></td>
        <td><?PHP echo"$epwc_ls_vlem01_sww[LemburAlasan]"; ?></td>
        <td><?PHP echo"$epwc_ls_vlem01_sww[LemburTarget]"; ?></td>
        <td><?PHP echo"$epwc_ls_vlem01_sww[LemburHasil]"; ?></td>
        <td>
            <?PHP
                if($epwc_ls_vlem01_sww['LemburApp']=="1"){
                    echo"<a href='?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEW02&IDKRY=$epwc_ls_vlem01_sww[KaryNomor]&IDLTGL=$epwc_ls02_vlem01_sww[lstgl]&IDLBR01=$epwc_ls_vlem01_sww[LemburID]&UPAPPL01=UPAPPL01&IDKARYDIR=$epwc_vkry01_sww[KaryDir]' class='badge bg-info'>Aprrove?</a>";
                    echo"&nbsp";
                    echo"<a href='?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEW02&IDKRY=$epwc_ls_vlem01_sww[KaryNomor]&IDLTGL=$epwc_ls02_vlem01_sww[lstgl]&IDLBR01=$epwc_ls_vlem01_sww[LemburID]&UPRJL01=UPRJL01&IDKARYDIR=$epwc_vkry01_sww[KaryDir]' class='badge bg-danger'>Reject</a>";
                }elseif($epwc_ls_vlem01_sww['LemburApp']=="3"){
                    echo"<span class='badge bg-dark'>Rejected</span>";
                }elseif($epwc_ls_vlem01_sww['LemburApp']=="2"){
                    echo"<span class='badge bg-success'>Approved.HO</span>";
                    echo"&nbsp";
                    echo"<a href='?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEW02&IDKRY=$epwc_ls_vlem01_sww[KaryNomor]&IDLTGL=$epwc_ls02_vlem01_sww[lstgl]&IDLBR01=$epwc_ls_vlem01_sww[LemburID]&UPRJL01=UPRJL01&IDKARYDIR=$epwc_vkry01_sww[KaryDir]' class='badge bg-danger'>Reject</a>";
                }elseif($epwc_ls_vlem01_sww['LemburApp']=="4"){
                    echo"<span class='badge bg-success'>Approved.CEO</span>";
                    echo"&nbsp";
                }else{echo"<span class='badge bg-dark'>Rejected</span>"; }
            ?>
        </td>
    </tr>
                <?PHP } ?>
</table>
<?PHP } } ?>  