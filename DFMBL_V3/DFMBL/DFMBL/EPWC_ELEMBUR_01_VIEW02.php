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
*Tekan F3 pada keyboard untuk melakukan pencarian
<br>
<span class="badge bg-success mx-2">Approved.HO</span> = Status Sudah Terkirim ke Direksi</span>
<br>
<span class="badge bg-success mx-2">Approved.CEO</span> = Status Sudah Disetujui Direksi
<hr>
<?PHP 
  #UNIT KODE
  /* */
  $epwc_ls_vkry01_sw = $CL_Q("$SL KaryNomor,KaryNama  FROM Citarum.dbo.TKaryawan WHERE  (UnitKode='$epwc_vkry01_sww[UnitKode]' OR UnitKode='$epwc_vkry01_sww[UnitKode01]') AND (KaryStatus='10' OR KaryStatus='22')  ");
  while($epwc_ls_vkry01_sww = $CL_FAS($epwc_ls_vkry01_sw)){
    echo"<a class='btn btn-info btn-sm mx-2'>$epwc_ls_vkry01_sww[KaryNama]</a>";
   
?>

<table class="table table-sm table-bordered table-striped mx-2">
    <tr class="">
        <td width="10%"><b>Bulan</b></td>
        <td>Nama</td>
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
        $epwc_ls_vlem01_sw = $CL_Q("SELECT   * FROM Citarum.dbo.TKaryLemburHari WHERE NOT LemburApp='0' AND NOT LemburBulanRng LIKE '%2023%' AND Uploader='$epwc_vkry01_sww[KaryNomor]' AND KaryNomor='$epwc_ls_vkry01_sww[KaryNomor]' order by LemburTanggal asc  ");
            while($epwc_ls_vlem01_sww = $CL_FAS($epwc_ls_vlem01_sw)){
        #DATA TANGGAL LEMBUR
        $epwc_ls02_vlem01_sw = $CL_Q("$SL CONVERT(date,LemburTanggal) as lstgl FROM Citarum.dbo.TKaryLemburHari WHERE KaryNomor='$epwc_ls_vlem01_sww[KaryNomor]' AND LemburTanggal='$epwc_ls_vlem01_sww[LemburTanggal]' order by LemburTanggal desc"); 
                $epwc_ls02_vlem01_sww = $CL_FAS($epwc_ls02_vlem01_sw);
                #DATA KARYAWAN
        $epwc_ls02_vkry01_sw = $CL_Q("$SL KaryNomor,KaryNama FROM Citarum.dbo.TKaryawan WHERE KaryNomor='$epwc_ls_vlem01_sww[KaryNomor]'");
        $epwc_ls02_vkry01_sww = $CL_FAS($epwc_ls02_vkry01_sw);
               
    ?>
    <tr>
        <td><?PHP 
        echo"<a href='#'>$epwc_ls_vlem01_sww[LemburBulanRng]</a>"; 
        echo"<br>";
        echo"<b>#".$epwc_ls_vlem01_sww['LemburJenis']."</b>";
        ?></td>
        <td><?PHP echo $epwc_ls_vkry01_sww['KaryNama']; ?></td>
        <td><?PHP echo"$epwc_ls02_vlem01_sww[lstgl]<br><span class='badge bg-secondary'>$epwc_ls_vlem01_sww[UnitKode]</span>"; ?></td>
        <td><?PHP echo"$epwc_ls_vlem01_sww[LemburBiasa]"; ?></td>
        <td><?PHP echo"$epwc_ls_vlem01_sww[LemburUraian]"; ?></td>
        <td><?PHP echo"$epwc_ls_vlem01_sww[LemburAlasan]"; ?></td>
        <td><?PHP echo"$epwc_ls_vlem01_sww[LemburTarget]"; ?></td>
        <td><?PHP echo"$epwc_ls_vlem01_sww[LemburHasil]"; ?></td>
        <td>
            <?PHP
                if($epwc_ls_vlem01_sww['LemburApp']=="1"){ #?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_IN02&IDKRY=04181102
                    echo"<a href='?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEW02&IDKRY=$epwc_ls_vlem01_sww[KaryNomor]&IDLTGL=$epwc_ls02_vlem01_sww[lstgl]&IDLBR01=$epwc_ls_vlem01_sww[LemburID]&UPAPPL01=UPAPPL01&IDKARYDIR=$epwc_vkry01_sww[KaryDir]' class='badge bg-info'>Aprrove?</a>";
                    echo"&nbsp";
                    echo"<a href='?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEW02&IDKRY=$epwc_ls_vlem01_sww[KaryNomor]&IDLTGL=$epwc_ls02_vlem01_sww[lstgl]&IDLBR01=$epwc_ls_vlem01_sww[LemburID]&UPRJL01=UPRJL01&IDKARYDIR=$epwc_vkry01_sww[KaryDir]' class='badge bg-danger'>Reject</a>";
                    echo"&nbsp";
                    echo"<a href='?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_IN02&IDKRY=04181102' class='badge bg-danger'>Update</a>";
                }elseif($epwc_ls_vlem01_sww['LemburApp']=="3"){
                    echo"<span class='badge bg-dark'>Rejected</span>";
                }elseif($epwc_ls_vlem01_sww['LemburApp']=="2"){
                    echo"<span class='badge bg-success'>Approved.HO</span>";
                    echo"<br>";
                    echo"<a href='?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEW02&IDKRY=$epwc_ls_vlem01_sww[KaryNomor]&IDLTGL=$epwc_ls02_vlem01_sww[lstgl]&IDLBR01=$epwc_ls_vlem01_sww[LemburID]&UPRJL01=UPRJL01&IDKARYDIR=$epwc_vkry01_sww[KaryDir]' class='badge bg-primary'>Reject</a>";
                    echo"&nbsp";
                    echo"<a href='?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_IN02&IDKRY=$epwc_ls_vlem01_sww[KaryNomor]&IDLBR01=$epwc_ls_vlem01_sww[LemburID]&UPLMBR01=UPLMBR01' class='badge bg-danger'>Update</a>";
                }elseif($epwc_ls_vlem01_sww['LemburApp']=="4"){
                    echo"<span class='badge bg-success'>Approved.CEO</span>";
                    echo"&nbsp";
                }else{echo"<span class='badge bg-dark'>Rejected</span>"; }
            ?>
        </td>
    </tr>
                <?PHP } ?>
</table>
<?PHP } ?>  
<!--  -->