<b><i class="fas fa-folder-open"></i>PEMBELIAN LOGISTIK</b>
<form method="post">
<div class="input-group mb-3" style="max-width:36rem;">
        <input type="date" class="form-control" name="tg01" required value="<?PHP echo $DATE_HTML5_SQL ?>">
        <input type="date" class="form-control" name="tg02" required value="<?PHP echo $DATE_HTML5_SQL ?>">
       <!-- <select name="jns01" class="form-control" required>
        <option value="">Acuan</option>
        <option value="PrshKode">PENANGGUNG</option>
        <option value="Poli">Poli</option>
        </select> -->
        <button class="btn btn-success btn-sm" name="btn_cari_01">CARI DATA</button>
        </div>

</form>
<hr>

<?PHP 
    if(isset($_POST['btn_cari_01'])){
            $tg01 = @$SQL_SL($_POST['tg01']);
            $tg02 = @$SQL_SL($_POST['tg02']);
        
?>
<?PHP echo"<b>INVTERVAL <i>".FS_DATE($tg01)." - ". FS_DATE($tg02)."</i></b>"; ?> 
<table class="table table-sm table-bordered table-striped">
    <tr class="table-dark">
        <td>No</td>
        <td>Tgl</td>
        <td>Sup</td>
        <td>Kd.Barang</td>
        <td>Nama</td>
        <td>Jml</td>
        <td>Harga</td>
        <td>Jml Jns</td>
    </tr>
    <?PHP 
        $epwc_vpemlog01_sw =  $CL_Q("$CL_SL Citarum.dbo.VLapTerimaLog WHERE TerimaTgl BETWEEN '$tg01' AND '$tg02 23:59:00' order by TerimaTgl desc");
            while($epwc_vpemlog01_sww = $CL_FAS($epwc_vpemlog01_sw)){
    ?>
    <tr>
        <td><?PHP echo $epwc_vpemlog01_sww['TerimaNomor'] ?></td>
        <td><?PHP echo $epwc_vpemlog01_sww['TerimaTgl'] ?></td>
        <td><?PHP echo $epwc_vpemlog01_sww['SuppNama'] ?></td>
        <td><?PHP echo $epwc_vpemlog01_sww['StokKode'] ?></td>
        <td><?PHP echo $epwc_vpemlog01_sww['StokNama'] ?></td>
        <td><?PHP echo $epwc_vpemlog01_sww['TerimaBanyak'] ?></td>
        <td><?PHP echo $NF($epwc_vpemlog01_sww['TerimaHarga']) ?></td>
        <td><?PHP echo $NF($epwc_vpemlog01_sww['TerimaJumlahDetil']) ?></td>
    </tr>
    <?PHP } 
     $epwc_tot_vpemlog01_sw =  $CL_Q("$SL SUM(TerimaJumlahDetil) as tot_jum FROM Citarum.dbo.VLapTerimaLog WHERE TerimaTgl BETWEEN '$tg01' AND '$tg02 23:59:00'");
      $epwc_tot_vpemlog01_sww = $CL_FAS($epwc_tot_vpemlog01_sw);
        ?>
        <tr>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td><?PHP echo "<b>".$NF($epwc_tot_vpemlog01_sww['tot_jum'])."</b>"; ?></td>
    </tr>
</table>
<?PHP } ?>