<a class="badge bg-dark"><i class="fas fa-folder-open"></i>DATA LEMBUR *Personal</a>
<form method="post">
<div class="input-group mb-3" style="max-width:35rem;">
<!-- <select name="txt_thn" class="form-control form-control-sm"> -->
        <input type="number" class="form-control form-control-sm" required name="txt_nik_01" placeholder="Masukan Nomor Induk Kepegawaian....">
        <select name="slc_bln" class="form-control form-control" required style="max-width:10rem;">
<?PHP 
    $epwc_sl_vlb01_sw = $ms_q("$sl  DISTINCT TOP 12 LemburBulanRng  FROM Citarum.dbo.TKaryLemburHari order by LemburBulanRng desc");
     while($epwc_sl_vlb01_sww = $ms_fas($epwc_sl_vlb01_sw)){
        echo"<option value=$epwc_sl_vlb01_sww[LemburBulanRng]>$epwc_sl_vlb01_sww[LemburBulanRng]</option>";
     }
?>
</select>
        <button class="btn btn-success btn-sm" name="btn_cari_01">CARI DATA</button>
        </div>

</div>
<?PHP 
    if(isset($_POST['btn_cari_01'])){
        $txt_nik_01 = @$sql_slash($_POST['txt_nik_01']);
        $slc_bulan = @$sql_slash($_POST['slc_bln']);
        #echo $txt_nik_01;
?>
<table class="table table-sm table-bordered table-striped mx-2">
    <tr class="table-dark">
        <td width="10%">Nama</td>
        <td>Bagian</td>
        <td>Tanggal Lembur</td>
        <td>Jumlah Jam</td>
        
        <td>Nominal</td>
        <td width="10%">AKSI</td>
    </tr>
    <?PHP 
        $no_lembur_01 = 1;
    #DATA LEMBUR
        $epwc_ls_vlem01_sw = $ms_q("SELECT TOP 40  * FROM Citarum.dbo.TKaryLemburHari WHERE   KaryNomor='$txt_nik_01' AND LemburBulanRng='$slc_bulan'   order by LemburTanggal desc  ");
        $epwc_nr_ls_vlem01_sw  = $ms_nr($epwc_ls_vlem01_sw);
            while($epwc_ls_vlem01_sww = $ms_fas($epwc_ls_vlem01_sw)){
        #DATA TANGGAL LEMBUR
        $epwc_ls02_vlem01_sw = $ms_q("$sl CONVERT(date,LemburTanggal) as lstgl FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$txt_nik_01' AND LemburBulanRng='$slc_bulan' order by LemburTanggal desc"); 
                $epwc_ls02_vlem01_sww = $ms_fas($epwc_ls02_vlem01_sw);
        #DATA KARY
        $epwc_ls_vkary01_sw = $ms_q("$sl KaryNomor,UnitKode,KaryNama FROM Citarum.dbo.TKaryawan WHERE KaryNomorYakkum='$txt_nik_01' ");
        $epwc_ls_vkary01_sww = $ms_fas($epwc_ls_vkary01_sw);
        #DATA UNIT
        $epwc_ls_vunit01_sw = $ms_q("$sl UnitKode,UnitNama FROM TUnitPrs WHERE UnitKode='$epwc_ls_vkary01_sww[UnitKode]'");
        $epwc_ls_vunit01_sww = $ms_fas($epwc_ls_vunit01_sw);
               
    ?>
    <tr>
        <td><?PHP echo"<a href='?HLM=FIN_M&SUB=FIN_M_FIN_LEMBUR&SUB_CHILD=FIN_M_FIN_LEMBUR01_DTL02&IDLBULAN01=$epwc_ls_vlem01_sww[LemburBulan]&IDEMP01=$epwc_ls_vlem01_sww[KaryNomor]'>".$epwc_ls_vkary01_sww['KaryNama']."</a>"; ?></td>
        <td><?PHP echo $epwc_ls_vunit01_sww['UnitNama']; ?></td>
        <td><?PHP echo"$epwc_ls02_vlem01_sww[lstgl]"; ?></td>
        <td><?PHP echo"$epwc_ls_vlem01_sww[LemburBiasa]"; ?></td>
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
    <select name="<?PHP echo"slc_app_01$no_lembur_01"; ?>" class="form-control form-control-sm" required>
                <?PHP 
                    if($epwc_ls_vlem01_sww['LemburApp']=="3"){ ?>
                        <option value="3">REJECT</option>
                        <option value="4">APPROVE</option>
                        <?PHP }elseif($epwc_ls_vlem01_sww['LemburApp']=="4"){ ?>
                            <option value="4">APPROVE</option>
                            <option value="3">REJECT</option>
            <?PHP }else{ ?>
            <option value=""></option>
            <option value="4">APPROVE</option>
            <option value="3">REJECT</option>
            <?PHP } ?>

     </select>
        </td>
    </tr>
                <?PHP $no_lembur_01++; } ?>
</table>
<?PHP } ?>