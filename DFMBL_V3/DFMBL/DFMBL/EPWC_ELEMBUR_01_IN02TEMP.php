<b class="mx-2 badge bg-info"><?PHP echo"Entri Templat Uraian lembur"; ?></b>
<br>

<form method="post">
<div class="card border-primary mb-3 mx-2" style="max-width: 52rem;">
  <div class="card-header">FORM TEMPLAT LEMBUR</div>
  <div class="card-body">
<!--  -->

    <code>Exm : Menggantikan shift siang</code>
<div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Uraian</span>
       <textarea class="form-control" name="lemtmp_uisi_01" required><?PHP echo $epwc_vw_vlemtmp01_sww['lemtmp_uisi_01'] ?></textarea>
    </div>

    
    <code>Exm : Karena yang bersangkutan izin sakit</code>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Alasan</span>
        <textarea class="form-control" name="lemtmp_aisi_01" required><?PHP echo $epwc_vw_vlemtmp01_sww['lemtmp_aisi_01'] ?></textarea>
    </div>
    <br>
        <?PHP 
            if(isset($_GET['UPLEMTMP01'])){
                echo"<button class='btn btn-danger btn-sm' name='btn_tempupdate'>UPDATE DATA</button>";
            }else{
                echo"<button class='btn btn-success btn-sm' name='btn_tempsimpan'>SIMPAN DATA</button>";
            }
        ?>
<!--  -->

</div>
</div>

<table class="mx-2 table table-sm table-bordered table-striped">
    <tr class="table-dark">
        <td width="5%">#</td>
        <td>Uraian</td>
        <td>Alasan</td>
    </tr>
    <?PHP 
        $no_lemtemp = 1;
        $epwc_ls_vlemtmp01_sw = $CL_Q("$CL_SL Citarum.dbo.tb_lembur_01_lemtmp WHERE (UnitKode='$epwc_vkry01_sww[UnitKode]' OR UnitKode01='$epwc_vkry01_sww[UnitKode01]') AND KaryNomor='$epwc_vkry01_sww[KaryNomor]' ");
            while($epwc_ls_vlemtmp01_sww = $CL_FAS($epwc_ls_vlemtmp01_sw)){ #DATA TEMPLATE
    ?>
    <tr>
        <td><?PHP echo $no_lemtemp; ?></td>
        <td><?PHP echo $epwc_ls_vlemtmp01_sww['lemtmp_uisi_01'] ?>
            <br>
            <a href="<?PHP echo"?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_IN02TEMP&IDLEMTMP01=$epwc_ls_vlemtmp01_sww[idmain_lemtmp_01]&UPLEMTMP01=UPLEMTMP01"; ?>" class="badge bg-primary">Edit</a>
    </td>
        <td><?PHP echo $epwc_ls_vlemtmp01_sww['lemtmp_aisi_01'] ?></td>
    </tr>
    <?PHP  $no_lemtemp++; } ?>
</table>
    <?PHP 
        #VARIABLE
        $lemtmp_uisi_01 = @$SQL_SL($_POST['lemtmp_uisi_01']);
        $lemtmp_aisi_01 = @$SQL_SL($_POST['lemtmp_aisi_01']);

        if(isset($_POST['btn_tempsimpan'])){  #PROCCESSING INSERT
            $save_lemtmp_01 = $CL_Q("$IN Citarum.dbo.tb_lembur_01_lemtmp(idmain_lemtmp_01,KaryNomor,UnitKode,lemtmp_uisi_01,lemtmp_aisi_01,UnitKode01)VALUES('$IDMAIN','$epwc_vkry01_sww[KaryNomor]','$epwc_vkry01_sww[UnitKode]','$lemtmp_uisi_01','$lemtmp_aisi_01','$epwc_vkry01_sww[UnitKode01]')");
            if($save_lemtmp_01){
                echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_IN02TEMP'>";
            }else{
                include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
            }

        }

        if(isset($_POST['btn_tempupdate'])){  #PROCCESSING UPDATE
            $update_lemtmp_01 = $CL_Q("$UP Citarum.dbo.tb_lembur_01_lemtmp SET lemtmp_uisi_01='$lemtmp_uisi_01',lemtmp_aisi_01='$lemtmp_aisi_01' WHERE idmain_lemtmp_01='$IDLEMTMP01'");
            if($update_lemtmp_01){
                echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_IN02TEMP'>";
            }else{
                include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
            }

        }
        
    ?>