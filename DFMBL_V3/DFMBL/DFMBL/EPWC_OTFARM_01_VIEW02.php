<?PHP 
    #DATA ORDER OtorisasiStatus
    $epwc_vofarm01_sw = $CL_Q("$CL_SL Citarum.dbo.TOrderFrm WHERE OrderNomor='$IDOFARM01'");
    $epwc_vofarm01_sww = $CL_FAS($epwc_vofarm01_sw);
    #DATA SUPP
    $epwc_ls_vsup01_sw = $CL_Q("$SL SuppKode,SuppNama FROM Citarum.dbo.TSupplier WHERE SuppKode='$epwc_vofarm01_sww[SuppKode]'");
    $epwc_ls_vsup01_sww = $CL_FA($epwc_ls_vsup01_sw);

?>
<br>
<div class="card border-primary mb-3 mx-2" style="max-width: 20rem;">
  <div class="card-header">VERIFIKASI SURAT PESENANAN</div>
  <div class="card-body">
    <!-- <h4 class="card-title"></h4> -->
    <p class="card-text">
    <?PHP 
        echo "<i class='fas fa-hashtag'></i> ".$epwc_vofarm01_sww['OrderNomor'];
        echo"<br>";
        echo "<i class='fas fa-calendar'></i> ".$epwc_vofarm01_sww['OrderTgl'];
        echo"<br>";
        echo "<i class='fas fa-flag '></i> ".$epwc_ls_vsup01_sww['SuppNama'];
     ?>
    </p>
  </div>
</div>
<form method="post">
<table class="table table-sm table-bordered table-striped mx-2" style="max-width:100rem;">
<tr class="table-dark">
    <td>Kode</td>
    <td>Nama Barang</td>
    <td>saldo</td>
    <td>Re-Order</td>
    <td>JO</td>
    <td>Satuan</td>
    <td>Diajukan</td>
    <td>Satuan</td>
    <td>Act.Oto</td>
    <td width="10%">Harga</td>
    <td width="10%">Jumlah harga</td>
    <td width="10%">Jumlah</td>
    <td>Disc 1</td>
    <td>Disc 2</td>
    <td>Jumlah</td>
</tr>
<?PHP 
#DATA ODER FAMR DTL
    $ofarmd01_no = 1;
    $epwc_vofarmd01_sw = $CL_Q("$CL_SL Citarum.dbo.TOrderFrmDetil WHERE OrderNomor='$IDOFARM01'");
    $epwc_nr_vofarmd01_sw = $CL_NR($epwc_vofarmd01_sw );
    while($epwc_vofarmd01_sww = $CL_FAS($epwc_vofarmd01_sw)){
?>
<tr>
    <td><?PHP echo $epwc_vofarmd01_sww['ObatKode']; ?></td>
    <td><?PHP echo $epwc_vofarmd01_sww['ObatNama']; ?></td>
    <td><?PHP echo ceil($epwc_vofarmd01_sww['ObatSaldo']); ?></td>
    <td><?PHP echo $epwc_vofarmd01_sww['ObatMinimal']; ?></td>
    <td><?PHP echo ceil($epwc_vofarmd01_sww['ObatJO']); ?></td>
    <td><?PHP echo $epwc_vofarmd01_sww['ObatSatuan'] ?></td>
    <td><?PHP echo ceil($epwc_vofarmd01_sww['OrderDiajukan']); ?></td>
    <td><?PHP echo $epwc_vofarmd01_sww['ObatSatuan']; ?></td>
    <td align="center">
        <!-- <input type="checkbox" id="vehicle1" name=<?PHP #echo"acc$ofarmd01_no"; ?>" value="1">  -->
        <!-- <select name="<?PHP #echo"acc$ofarmd01_no"; ?>" required> -->
        
        <?PHP 
        /*
            if($epwc_vofarmd01_sww['OtorisasiStatus']=="0"){
                echo"<option value=0>UnVerif</option>";
                echo"<option value=1>Verif</option>";
            }elseif($epwc_vofarmd01_sww['OtorisasiStatus']=="1"){
                echo"<option value=1>Verif</option>";
                echo"<option value=0>UnVerif</option>";
            }
            */
        ?>
       
        <!-- </select> -->
        <input type="hidden" name="<?PHP echo"ano$ofarmd01_no"; ?>" value="<?PHP echo $epwc_vofarmd01_sww['OrderAutoNomor'] ?>">
        <input type="hidden" name="<?PHP echo"hrg$ofarmd01_no"; ?>" value="<?PHP echo $epwc_vofarmd01_sww['OrderHarga'] ?>">
        <input type="hidden" name="<?PHP echo"dis$ofarmd01_no"; ?>" value="<?PHP echo $epwc_vofarmd01_sww['OrderDisc1'] ?>">
        <input type="hidden" name="<?PHP echo"dis02$ofarmd01_no"; ?>" value="<?PHP echo $epwc_vofarmd01_sww['OrderDisc2'] ?>">
    <?PHP if($epwc_vofarmd01_sww['OtorisasiStatus']=="0"){  ?>
        <!-- <a  class="btn btn-primary btn-sm">APPROVE?</a> -->
        <a href="<?PHP echo"#?NAVI=EPWC_OTFARM_01&PG_SA=EPWC_OTFARM_01_VIEW02&IDOFARM01=$IDOFARM01&ID"; ?>" class="badge bg-primary">NOT APPROVED</a>
    <?PHP }elseif($epwc_vofarmd01_sww['OtorisasiStatus']=="1") { ?>
        <a href="<?PHP echo"#?NAVI=EPWC_OTFARM_01&PG_SA=EPWC_OTFARM_01_VIEW02&IDOFARM01=$IDOFARM01"; ?>" class="badge bg-success">APPROVED</a>
    <?PHP } ?>
    </td>
    <td align="right"><?PHP echo "Rp".$NF($epwc_vofarmd01_sww['OrderHarga']); ?></td>
    <td align="right"><?PHP echo "Rp".$NF($epwc_vofarmd01_sww['OrderJumlah'],'0'); ?></td>
        <td align="right"><?PHP #echo $epwc_vofarm01_sww['OtorisasiID'] ?>
        <?PHP 
            if($epwc_vofarmd01_sww['OtorisasiStatus']=="0"){
        ?>
            <input type="number" name="<?PHP echo"OrderBanyak$ofarmd01_no"; ?>" value="<?PHP echo "0"; ?>" style="max-width:40%">
        <?PHP  }elseif($epwc_vofarmd01_sww['OtorisasiStatus']=="1"){ ?>
            <input type="number" name="<?PHP echo"OrderBanyak$ofarmd01_no"; ?>" value="<?PHP echo ceil($epwc_vofarmd01_sww['OrderBanyak']) ?>" style="max-width:40%">
        <?PHP } ?>
    </td>
    <td><?PHP echo $epwc_vofarmd01_sww['OrderDisc1'] ?></td>
    <td><?PHP echo $epwc_vofarmd01_sww['OrderDisc2'] ?></td>
    <td>Jumlah</td>
</tr>
<?PHP $ofarmd01_no++; }
#TOTAL JUMLAH HARGA
 $epwc_tot_vofarmd01_sw = $CL_Q("$SL SUM(OrderJumlah) as tot_ojum FROM Citarum.dbo.TOrderFrmDetil   WHERE OrderNomor='$IDOFARM01'");
    $epwc_tot_vofarmd01_sww = $CL_FAS($epwc_tot_vofarmd01_sw);
    #TOTAL DISKON
    $epwc_totd_vofarmd01_sw = $CL_Q("$SL SUM(OrderDisc1) as totd_ojum FROM Citarum.dbo.TOrderFrmDetil  WHERE OrderNomor='$IDOFARM01'");
    $epwc_totd_vofarmd01_sww = $CL_FAS($epwc_totd_vofarmd01_sw);
    
 ?>
<tr class="table-dark">
    <td>-</td>
    <td>-</td>
    <td>-</td>
    <td>-</td>
    <td>-</td>
    <td>-</td>
    <td>-</td>
    <td>-</td>
    <td>-</td>
    <td width="10%">-</td>
    <td width="10%" align="right">
        <?PHP 
         if($epwc_vofarm01_sww['OtorisasiStatus']=="0"){
            echo"<b>Total Disc</b> 0%";
            echo"<br>";        
            echo "<b>Total </b> 0";;
         }elseif($epwc_vofarm01_sww['OtorisasiStatus']=="1"){
            echo"<b>Total Disc</b> ".$NF($epwc_totd_vofarmd01_sww['totd_ojum'])."%";
            echo"<br>";        
            echo "<b>Total</b>  Rp.".$NF($epwc_tot_vofarmd01_sww['tot_ojum']);
         }
     ?>
    </td>
    <td width="10%">-</td>
    <td>-</td>
    <td>-</td>
    <td>-</td>
</tr>
</table>
    <button class="btn btn-info btn-sm mx-2" name="btn_simpan_order">SIMPAN DATA</button>
    &nbsp 
    <button class="btn btn-danger btn-sm mx-2" name="btn_btl_order">RESET DATA</button>
    </form> 
        <?PHP include"../LOGIC/PRC/EXE_MIX.php";  ?>