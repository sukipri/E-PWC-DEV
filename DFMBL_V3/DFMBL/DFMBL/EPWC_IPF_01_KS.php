<b>#DATA KASUS</b>
<?php
        #DATA ORDER
        $epwc_ctr_voipf01_sw = $CL_Q("$CL_SL Citarum.dbo.TOrderIPF order by OrderTgl desc");
            while($epwc_ctr_voipf01_sww = $CL_FAS($epwc_ctr_voipf01_sw)){
                #DATA UNIT
                $epwc_ctr_vunit01_sw = $CL_Q("$SL UnitKode,UnitNama FROM Citarum.dbo.TUnit WHERE UnitKode='$epwc_ctr_voipf01_sww[UnitKode]'");
                    $epwc_ctr_vunit01_sww = $CL_FAS($epwc_ctr_vunit01_sw);
                #DATA PELAKU
                $epwc_ctr_vplk01_sw = $CL_Q("$CL_SL TIPFUser WHERE UserKode='$epwc_ctr_voipf01_sww[OtoPengerja]'");
                    $epwc_ctr_vplk01_sww = $CL_FAS($epwc_ctr_vplk01_sw);

                
?>
    <?PHP if($epwc_ctr_voipf01_sww['OrderStatus']=="0"){ ?>
<div class="alert alert-dismissible alert-warning mx-2">
<?PHP echo $epwc_ctr_voipf01_sww['OrderTgl']; ?>
  <h5 class="alert-heading"><?PHP echo $epwc_ctr_vunit01_sww['UnitNama']."-".$epwc_ctr_voipf01_sww['UnitNamaDetil']; ?></h5>
    <p> <?PHP echo $epwc_ctr_voipf01_sww['OrderMasalahKet']; ?></p>
    <br>
    <a href="<?PHP echo"?PG_SA=EPWC_IPF_01_KS02&IDONOMOR01=$epwc_ctr_voipf01_sww[OrderNomor]"; ?>" class="btn btn-dark btn-sm">PROSES</a>
</div>
<?PHP }elseif($epwc_ctr_voipf01_sww['OrderStatus']=="2"){ ?>
<div class="alert alert-dismissible alert-success mx-2">
<?PHP echo $epwc_ctr_voipf01_sww['OrderTgl']; ?>
  <h4 class="alert-heading"><?PHP echo $epwc_ctr_vunit01_sww['UnitNama']."-".$epwc_ctr_voipf01_sww['UnitNamaDetil'];  ?></h4>
    <p> <?PHP echo $epwc_ctr_voipf01_sww['OrderMasalahKet']; ?></p>
    <br>
    <span class="badge bg-primary"><?PHP echo  $epwc_ctr_vplk01_sww['UserNama']; ?></span>
</div>
<?PHP } ?>
<?php } ?>
