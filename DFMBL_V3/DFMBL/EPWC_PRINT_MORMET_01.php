
<?PHP include"../DIST/DIST_GET.php"; ?>
<h2>#LIST LAP MORMET <?PHP echo FS_DATE($IDTG01)." - ".FS_DATE($IDTG02); ?></h2>
<div class="container">
<table class="table table-sm table-bordered table-striped mx-2">
    <tr class="table table-dark">
    <td width="55%">DATE</td>
    <td>STATUS</td>
    <td>BIDANG</td>
    </tr>
    <?PHP 
        #DATA MORMET
        $epwc_vcek01_sw = $CL_Q("$CL_SL Citarum.dbo.TMorMetCekList WHERE TglCek BETWEEN '$IDTG01' AND '$IDTG02' order by TglCek desc");
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
            </div>