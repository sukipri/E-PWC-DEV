<?PHP 
    $epwc_dt_vlmbr01_sw = $CL_Q("$SL DAY(LemburTanggal) as day_dt FROM  Citarum.dbo.TKaryLemburHari WHERE LemburID='$IDLBR01'");
      $epwc_dt_vlmbr01_sww  = $CL_FAS($epwc_dt_vlmbr01_sw);

      #SUBTRING substr("Hello world",6);
      $epwc_dtbulan = substr($epwc_vw_vlmbr01_sww['LemburBulanRng'],4);
      #echo  $epwc_dtbulan ;

?>
<b class="mx-2 badge bg-info"><?PHP echo"DATA <i>$epwc_vw_vkry01_sww[KaryNama]</i>"; ?></b>
<br>
<form method="post">
    <?PHP 
        #echo "$epwc_vw_vkry01_sww[GajiUP1Yakkum]";
    ?>
    
<div class="card border-primary mb-3 mx-2" style="max-width: 35rem;">
  <div class="card-header">FORM LEMBUR</div>
  <div class="card-body">
   <!--  -->
   <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">DATE</span>
        <!-- <input type="number" class="form-control" name="elembur_lemtgl_01" required> -->
        <select name="elembur_lemtgl_0101" class="form-control" required>
        <option value="">Tanggal</option>
        <?PHP 
            $no_lembur = 1;
                while($no_lembur <= 31){
                   $no_spritf =  sprintf("%'.02d\n", $no_lembur);
                   if($no_spritf==$epwc_dt_vlmbr01_sww['day_dt']){
                    echo"<option value=$no_spritf selected>$no_spritf</option>";
                   }else{
                    echo"<option value=$no_spritf>$no_spritf</option>";
                }
                $no_lembur++; 
                  
                }
        ?>
        
    </select>
      <select name="elembur_bulan_01" class="form-control" required>
        <option value="">Bulan Lembur</option>
        <?PHP 
            $no_lemburbulan = 1;
                while($no_lemburbulan <= 12){ #$epwc_dtbulan
                   $no_spritf =  sprintf("%'.02d\n", $no_lemburbulan);
                   if($no_spritf==$epwc_dtbulan){
                    echo"<option value=$no_spritf selected>$no_spritf</option>";
                   }else{
                    echo"<option value=$no_spritf>$no_spritf</option>";
                   }
                   $no_lemburbulan++; 
                }
        ?>
        
    </select>
    <input type="number" class="form-control" name="elembur_lemtgl_0102" required placeholder="Tahun..." value="<?PHP echo $DATE_Y; ?>">
    </div>

     <!--  -->
   <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Jenis Lembur</span>
        <!-- <input type="number" class="form-control" name="elembur_lemtgl_01" required> -->
        <select name="elembur_jenis_01" class="form-control" required>
       
        <?PHP  
            if($epwc_vw_vlmbr01_sww['LemburJenis']=="INFAL"){
                echo"<option value=INFAL>CUTI/INFAL</option>";
                echo"<option value=BIASA>LEMBUR BIASA</option>";
                echo"<option value=PP>PENYELESAIAN PEKERJAAN</option>";
                echo"<option value=DM>DINAS MALAM</option>";
            }elseif($epwc_vw_vlmbr01_sww['LemburJenis']=="BIASA"){
                echo"<option value=BIASA>LEMBUR BIASA</option>";
                echo"<option value=INFAL>CUTI/INFAL</option>";
                echo"<option value=PP>PENYELESAIAN PEKERJAAN</option>";
                echo"<option value=DM>DINAS MALAM</option>";
            }elseif($epwc_vw_vlmbr01_sww['LemburJenis']=="PP"){
                echo"<option value=PP>PENYELESAIAN PEKERJAAN</option>";
                echo"<option value=BIASA>LEMBUR BIASA</option>";
                echo"<option value=INFAL>CUTI/INFAL</option>";
                echo"<option value=DM>DINAS MALAM</option>";
            }elseif($epwc_vw_vlmbr01_sww['LemburJenis']=="DM"){
                echo"<option value=DM>DINAS MALAM</option>";
                echo"<option value=PP>PENYELESAIAN PEKERJAAN</option>";
                echo"<option value=BIASA>LEMBUR BIASA</option>";
                echo"<option value=INFAL>CUTI/INFAL</option>";
            }else{
                echo"<option value=></option>";
                echo"<option value=INFAL>CUTI/INFAL</option>";
                echo"<option value=BIASA>LEMBUR BIASA</option>";
                echo"<option value=PP>PENYELESAIAN PEKERJAAN</option>";
                echo"<option value=DM>DINAS MALAM</option>";
            }
        ?>
       
    </select>
    </div>
    Jika <span class="badge bg-primary">CUTI/INFAL</span> Silahkan mengganti jadwal dahulu
    <br>
    Jika <span class="badge bg-primary">Dinas Malam</span> Silahkan sesuaikan dengan jadwal masuk
    <br><br>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Jumlah Jam</span>
        <input type="number" class="form-control" name="elembur_jmljam_01" value="<?PHP echo $epwc_vw_vlmbr01_sww['LemburBiasa'] ?>">
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Uraian</span>
       <textarea class="form-control" name="elembur_ur_01"><?PHP echo $epwc_vw_vlmbr01_sww['LemburUraian'] ?></textarea>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Alasan</span>
        <textarea class="form-control" name="elembur_al_01"><?PHP echo $epwc_vw_vlmbr01_sww['LemburAlasan'] ?></textarea>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Target</span>
        <textarea class="form-control" name="elembur_tar_01">Harus Terselesaikan</textarea>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Hasil</span>
        <textarea class="form-control" name="elembur_has_01">Terselesaikan</textarea>
    </div>

    <ul>
        <li>#<b>KETENTUAN PENGISIAN FORM</b>
            <ul>
                <li>Isikan setiap memberikan lembur</li>
                <li>lakukan Approve di menu <i>APPROVE LEMBUR</i> u/ diteruskan ke Direksi</li>
    </li>    
    </ul>
    <br>
   <!--  -->
   <?PHP 
        if($_GET['UPLMBR01']){
            echo"<button class='btn btn-danger btn-sm' name='update_elembur_in02'>UPDATE DATA</button>"; 
        }else{
            echo"<button class='btn btn-success btn-sm' name='simpan_elembur_in02'>SIMPAN DATA</button>";
        }
   ?>
    
</div>

    </form>
    <?PHP include"../LOGIC/PRC/EXE_MIX.php"; ?>