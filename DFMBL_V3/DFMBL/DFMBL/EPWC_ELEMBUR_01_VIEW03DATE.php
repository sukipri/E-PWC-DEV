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
</div>
</form>