<span class="badge bg-info mx-2">LIST LAP MORMET</span>
<br>
<form method="post">
<div class="input-group mb-3 input-group-sm">
  <input type="date" class="form-control form-control-sm" name="tg01">
  <input type="date" class="form-control form-control-sm" name="tg02">
  <button class="btn btn-success btn-sm" name="btn_cari_data">CARI DATA</button>
</div>
<br>
<?PHP 
    if(isset($_POST['btn_cari_data'])){
        $tg01 = @$SQL_SL($_POST['tg01']);
        $tg02 = @$SQL_SL($_POST['tg02']);
?>
<table class="table table-sm table-bordered table-striped mx-2">
    <tr class="table table-dark">
    <td width="30%">DATE</td>
    <td>STATUS</td>
    <td>BIDANG</td>
    </tr>
    <?PHP 
        #DATA MORMET
        $epwc_vcek01_sw = $CL_Q("$CL_SL Citarum.dbo.TMorMetCekList WHERE TglCek BETWEEN '$tg01' AND '$tg02' order by TglCek desc");
            while($epwc_vcek01_sww = $CL_FAS($epwc_vcek01_sw)){          
        #DATA VAR ADM
        $epwc_vvar01_sw = $CL_Q("$CL_SL Citarum.dbo.TCekListVar WHERE VarKode='$epwc_vcek01_sww[KlpCek]'");
        $epwc_vvar01_sww = $CL_FAS($epwc_vvar01_sw);
    ?>
    <tr>
    <td><?PHP echo FS_DATE($epwc_vcek01_sww['TglCek']) ?></td>
    <td><?PHP echo $epwc_vcek01_sww['ListCek'] ?></td>
    <td><?PHP echo $epwc_vvar01_sww['VarNama'] ?></td>
    </tr>
    <?PHP } ?>
<table>
    <?PHP } ?>
    <a href="<?PHP echo"EPWC_PRINT_MORMET_01.php?IDTG01=$tg01&IDTG02=$tg02"; ?>" target="_blank" class="mx-2 badge bg-primary"><i class="fas fa-file-alt"></i> PRINT OUT</a>
</form>