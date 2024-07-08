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
<!--  -->
<div class="input-group mb-3" style="max-width:30rem;">
  <input type="date" name="txt_caritgl" class="form-control form-control-sm">
  <button class="btn btn-dark btn-sm" name="btn_caritgl">Pilih</button>
</div>
<!--  -->
</div>
</form>
    <?PHP 
        if(isset($_POST['btn_caritgl'])){
            $txt_caritgl = @$SQL_SL($_POST['txt_caritgl']);

            echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEW03DATE&IDTG01=$txt_caritgl&VWTGL01=VWTGL01'>";
        }
    ?>
<!--  -->
  <?PHP if(@$SQL_SL($_GET['VWTGL01'])){ ?>
<!--  -->

        <?PHP       
                    #echo"<hr>";
        $epwc_nr_ls_vlem01_sw = $CL_Q("SELECT  * FROM Citarum.dbo.TKaryLemburHari WHERE   KaryDir='$epwc_vkry01_sww[KaryNomorYakkum]' AND LemburTanggal BETWEEN '$IDTG01' AND '$IDTG01 23:59:00'    order by LemburTanggal desc  ");
        $epwc_nr_ls_vlem01_sww = $CL_NR($epwc_nr_ls_vlem01_sw);
        echo"<a href='#' class='badge bg-dark btn-sm mx-2'><i class='far fa-calendar-alt'></i> $IDTG01</a>";
            echo"<a href='#' class='badge bg-info btn-sm mx-2'><i class='fas fa-file-alt'></i> TOTAL FORM $epwc_nr_ls_vlem01_sww</a>";
?>


<!--  -->
<?PHP } #CLOSE VWTGL01 ?>

<!--  -->