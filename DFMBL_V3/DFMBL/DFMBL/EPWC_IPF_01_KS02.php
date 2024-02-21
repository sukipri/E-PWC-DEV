<b>#PENYELESAIAN KASUS</b>
<br>
<?php
        #DATA ORDER
        $epwc_ctr_voipf01_sw = $CL_Q("$CL_SL Citarum.dbo.TOrderIPF WHERE OrderNomor='$IDONOMOR01' ");
            $epwc_ctr_voipf01_sww = $CL_FAS($epwc_ctr_voipf01_sw);
                #DATA UNIT
                $epwc_ctr_vunit01_sw = $CL_Q("$SL UnitKode,UnitNama FROM Citarum.dbo.TUnit WHERE UnitKode='$epwc_ctr_voipf01_sww[UnitKode]'");
                    $epwc_ctr_vunit01_sww = $CL_FAS($epwc_ctr_vunit01_sw);
                #DATA PELAKU
                $epwc_ctr_vplk01_sw = $CL_Q("$CL_SL TIPFUser WHERE UserKode='$epwc_ctr_voipf01_sww[OtoPengerja]'");
                    $epwc_ctr_vplk01_sww = $CL_FAS($epwc_ctr_vplk01_sw);              
?>
<div style="max-width:40rem;" class="mx-2">
<form method="post">
<div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Tanggal Order</span>
  </div>
    <input type="text" class="form-control form-control-sm" value="<?PHP echo "$epwc_ctr_voipf01_sww[OrderTgl]";  ?>">
</div>

<div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Nomor Order</span>
  </div>
    <input type="text" class="form-control form-control-sm" value="<?PHP echo "$epwc_ctr_voipf01_sww[OrderNomor]";  ?>" readonly>
</div>

<div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Unit</span>
  </div>
    <input type="text" class="form-control form-control-sm" value="<?PHP echo "$epwc_ctr_vunit01_sww[UnitNama]";  ?>">
</div>

<b>Kategori</b>
    <?PHP if($epwc_ctr_voipf01_sww['OrderMasalah']=="1"){  ?>
            <span class="badge bg-warning">AC</span>
    <?PHP }elseif($epwc_ctr_voipf01_sww['OrderMasalah']=="2"){ ?>    
        <span class="badge bg-warning">Elektromedis</span>
        <?PHP }elseif($epwc_ctr_voipf01_sww['OrderMasalah']=="3"){ ?>    
            <span class="badge bg-warning">kelistrikan</span>
            <?PHP }elseif($epwc_ctr_voipf01_sww['OrderMasalah']=="4"){ ?>    
            <span class="badge bg-warning">Ruang</span>
            <?PHP }elseif($epwc_ctr_voipf01_sww['OrderMasalah']=="5"){ ?>    
            <span class="badge bg-warning">Mebelair</span>
            <?PHP }elseif($epwc_ctr_voipf01_sww['OrderMasalah']=="6"){ ?>    
            <span class="badge bg-warning">elektronika</span>
            <?PHP }elseif($epwc_ctr_voipf01_sww['OrderMasalah']=="7"){ ?>    
            <span class="badge bg-warning">Plumbing</span>
        <?PHP } ?> 
<br>
<div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Masalah</span>
  </div>
  <textarea class="form-control"><?PHP echo "$epwc_ctr_voipf01_sww[OrderMasalahKet]";  ?></textarea>   
</div>
<hr>
<div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Tgl Konfirmasi</span>
  </div>
  <input type="date" required class="form-control form-control-sm" name="epwc_ototgl_01">
</div>

<div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Eksekutor</span>
  </div>
  <select name="epwc_otopengerja_01" required class="form-control form-control-sm">
    <option value=""></option>
    <?PHP 
        $epwc_ctr_vipfus01_sw = $CL_Q("$CL_SL TIPFUser order by UserNama asc ");
            while($epwc_ctr_vipfus01_sww = $CL_FAS($epwc_ctr_vipfus01_sw)){
                echo"<option value=$epwc_ctr_vipfus01_sww[UserKode]>$epwc_ctr_vipfus01_sww[UserNama] </option>";
            }
    ?>
    </select>
</div>
<div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Tindakan</span>
  </div>
<select name="epwc_ordertindakan_01" required class="form-control form-control-sm">
    <option value=""></option>
    <?PHP 
            $epwc_ctr_vipfvar01_sw = $CL_Q("$CL_SL  TIpfvar ");
              while($epwc_ctr_vipfvar01_sww = $CL_FAS($epwc_ctr_vipfvar01_sw)){
                echo"<option value=$epwc_ctr_vipfvar01_sww[VarKode]>$epwc_ctr_vipfvar01_sww[VarNama]</option>";
              }
           
    ?>
    </select>
</div>

<div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Ket.Tindakan</span>
  </div>
  <textarea class="form-control" required name="epwc_otindakanket_01"></textarea>   
</div>

<button class="btn btn-success btn-sm" name="ipf_update_01">UPDATE DATA</button>
</form>
</div>
<?PHP include"../LOGIC/PRC/EXE_MIX.php"; ?>