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
                    echo"<option value=$no_spritf>$no_spritf</option>";
                $no_lembur++; 
                }
        ?>
        
    </select>
      <select name="elembur_bulan_01" class="form-control" required>
        <option value="">Bulan Lembur</option>
        <?PHP 
            $no_lembur = 1;
                while($no_lembur <= 12){
                   $no_spritf =  sprintf("%'.02d\n", $no_lembur);
                    echo"<option value=$no_spritf>$no_spritf</option>";
                $no_lembur++; 
                }
        ?>
        
    </select>
    <input type="number" class="form-control" name="elembur_lemtgl_0102" required placeholder="Tahun...">
    </div>

     <!--  -->
   <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Jenis Lembur</span>
        <!-- <input type="number" class="form-control" name="elembur_lemtgl_01" required> -->
        <select name="elembur_jenis_01" class="form-control" required>
        <option value=""></option>
        <option value="INFAL">CUTI/INFAL</option>
        <option value="BIASA">LEMBUR BIASA</option>
        <option value="PP">PENYELESAIAN PEKERJAAN</option>
        <option value="DM">DINAS MALAM</option>
       
    </select>
    </div>
    Jika <span class="badge bg-primary">CUTI/INFAL</span> Silahkan mengganti jadwal dahulu
    <br>
    Jika <span class="badge bg-primary">Dinas Malam</span> Silahkan sesuaikan dengan jadwal masuk
    <br><br>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Jumlah Jam</span>
        <input type="number" class="form-control" name="elembur_jmljam_01">
    </div>

    <!-- <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Jumlah Nominal</span>
        <input type="number"   readonly="" class="form-control" name="elembur_##_01">
    </div> -->

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Uraian</span>
       <textarea class="form-control" name="elembur_ur_01">0</textarea>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Alasan</span>
        <textarea class="form-control" name="elembur_al_01">0</textarea>
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
    <button class="btn btn-success btn-sm" name="simpan_elembur_in02">SIMPAN DATA</button>
</div>

    </form>
    <?PHP include"../LOGIC/PRC/EXE_MIX.php"; ?>