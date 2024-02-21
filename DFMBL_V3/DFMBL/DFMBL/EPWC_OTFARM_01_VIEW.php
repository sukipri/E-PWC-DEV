<b class="mx-2">LIST OTORISASI BARANG</b>
<br>
<!-- <div class="container"> -->
    <form method="post">
        <div class="input-group mb-3" style="max-width:40rem;">
        <input type="date" value="<?PHP echo $DATE_HTML5_SQL ?>" class="form-control" name="tg01" required>
        <input type="date" value="<?PHP echo $DATE_HTML5_SQL ?>" class="form-control" name="tg02" required>
        <select name="jns01" class="form-control" required>
        <option value="">Order Jenis</option>
        <option value="I">Inap</option>
        <option value="J">Jalan</option>
        </select>
        <button class="btn btn-success" name="btn_cari">CARI DATA</button>
        </div>
</form>
<?PHP 
    if(isset($_POST['btn_cari'])){
        $tg01 = @$SQL_SL($_POST['tg01']);
        $tg02 = @$SQL_SL($_POST['tg02']);
        $jns01 = @$SQL_SL($_POST['jns01']);
            #KONVERTER
                if($jns01=="I"){ $jns_txt = "Inap"; }elseif($jns01=="J"){ $jns_txt = "Jalan";}
                echo "<b class=mx-2>INTERVAL</b> ".$tg01." - ".$tg02." <span class='badge bg-danger'>Rawat $jns_txt</span>";
?>
<table class="table table-bordered table-sm table-striped mx-2" style="max-width:70rem;">
<tr class="table-dark">
    <td>STATUS</td>
    <td>No.ORDER</td>
    <td>TANGGAL ORDER</td>
    <td>SUPPLIER</td>
    <td>JUMLAH</td>
    <td>ID.Oto</td>
    <td>TANGGAL Oto</td>
</tr>
<?PHP 
/* OrderNomor,OrderTgl,SuppKode,UnitKode,OrderJenis,OrderReff,OrderBayarHr,OrderDisc,OrderDiscPrs,OrderPPN,OrderPPNPrs,OrderTotal,
OrderStatus,OrderKeterangan,UserID,UserDate,OtorisasiStatus,OtorisasiID,OtorisasiDate,OrderAskes,CetakStatus,CetakID,CetakDate,OrderKetBatal */
    #DATA ORDER FARM
    $epwc_vofrm01_sw = $CL_Q("$SL OrderNomor , OrderTgl ,SuppKode, OrderJenis , OtorisasiStatus ,OrderTotal FROM Citarum.dbo.TOrderFrm WHERE NOT OtorisasiStatus='9' AND (OrderTgl BETWEEN '$tg01' AND '$tg02 23:59:00') AND OrderJenis='$jns01' ");
        while($epwc_vofrm01_sww = $CL_FAS($epwc_vofrm01_sw)){
    #DATA SUPP
    $epwc_ls_vsup01_sw = $CL_Q("$SL SuppKode,SuppNama FROM Citarum.dbo.TSupplier WHERE SuppKode='$epwc_vofrm01_sww[SuppKode]'");
    $epwc_ls_vsup01_sww = $CL_FA($epwc_ls_vsup01_sw);
?>
<tr>
    <td>-</td>
    <td>
        <?PHP
            if($epwc_vofrm01_sww['OtorisasiStatus']=="0"){ echo "<a href=?NAVI=EPWC_OTFARM_01&PG_SA=EPWC_OTFARM_01_VIEW02&IDOFARM01=$epwc_vofrm01_sww[OrderNomor] class='badge bg-info'>".$epwc_vofrm01_sww['OrderNomor']."</a>"; 
            }elseif($epwc_vofrm01_sww['OtorisasiStatus']=="1"){ echo "<a href=?NAVI=EPWC_OTFARM_01&PG_SA=EPWC_OTFARM_01_VIEW02&IDOFARM01=$epwc_vofrm01_sww[OrderNomor] class='badge bg-success'>".$epwc_vofrm01_sww['OrderNomor']."</a>";}
        ?>
    </td>
    <td><?PHP echo $epwc_vofrm01_sww['OrderTgl']; ?></td>
    <td><?PHP echo $epwc_ls_vsup01_sww['SuppNama'] ?></td>
    <td><?PHP echo $NF($epwc_vofrm01_sww['OrderTotal']) ?></td>
    <td>-</td>
    <td>-</td>
</tr>
<?PHP } ?>
</table>
<?PHP } ?>
<!-- </div> -->
