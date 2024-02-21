<?PHP 
#DATA PASIEN
 $pwc_vpsn01_sw = $ms_q("$sl PasienNomorRM,PasienNama,PasienAlamat FROM TPasien WHERE PasienNomorRM='$IDPSN01'");
    $pwc_vpsn01_sww = $ms_fas($pwc_vpsn01_sw);
    #DATA INAP
    $pwc_vri01_sw = $ms_q("$sl InapNoAdmisi,InapTglMasuk,PasienNomorRM,DokterKode,InapStatus FROM TRawatInap WHERE InapNoAdmisi='$IDINAP01'");
        $pwc_vri01_sww = $ms_fas($pwc_vri01_sw);
    #DATA KR COUNTING
    $pwc_cn_vkr01_sw = $ms_q("$sl idmain_kr_01,InapNoAdmisi,PasienNomorRM,kr_tgllhr_01,kr_tgljamlhr_01 FROM tb_vk_kr_01 WHERE kr_tgllhr_01='$date_html5'");
        $pwc_cn_vkr01_sww = $ms_nr($pwc_cn_vkr01_sw);
            #KONVERSI 
            $pwc_hit_vkr01_sw = $pwc_cn_vkr01_sww + 1;
            $pwc_zero_vkr01_sw = sprintf("%02d", $pwc_hit_vkr01_sw);
?>
<b>#ENTRI KODE REGISTRATION 03 <?PHP echo"<i>$pwc_vpsn01_sww[PasienNama]</i>"; ?></b>
<hr>
<form method="post">
<div class="input-group input-group-sm mb-3" style="max-width:22rem;">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">@KODE REGISTER</span>
  </div>
  <input type="text" class="form-control form-control-sm" placeholder="Kode Register" name="kr_kode_01" required autocomplete="off" value="<?PHP echo $pwc_zero_vkr01_sw; ?>">
</div>

<div class="input-group input-group-sm mb-3" style="max-width:22rem;">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">NAMA</span>
  </div>
  <input type="text" class="form-control form-control-sm" placeholder="Kode Register" name="kr_nama_01" required autocomplete="off" value="<?PHP echo $pwc_vpsn01_sww['PasienNama']; ?>">
</div>

<div class="input-group input-group-sm mb-3" style="max-width:26rem;">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">ALAMAT</span>
  </div>
  <textarea name="kr_alamat_01" class="form-control form-control-sm"><?PHP echo $pwc_vpsn01_sww['PasienAlamat'] ?></textarea>
</div>

<div class="input-group input-group-sm mb-3" style="max-width:22rem;">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Jam Lahir</span>
  </div>
  <input type="time" class="form-control form-control-sm" placeholder="Kode Register" name="kr_jamlhr_01" required>
</div>

<div class="input-group input-group-sm mb-3" style="max-width:22rem;">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">tanggal Lahir</span>
  </div>
  <input type="date" class="form-control form-control-sm" placeholder="Kode Register" name="kr_tgllhr_01" required>
</div>

<div class="input-group input-group-sm mb-3" style="max-width:15rem;">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">AS</span>
  </div>
  <input type="text" class="form-control form-control-sm" placeholder="AS" name="kr_as_01" required>
</div>

<div class="input-group input-group-sm mb-3" style="max-width:15rem;">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">bb</span>
  </div>
  <input type="text" class="form-control form-control-sm" placeholder="bb" name="kr_bb_01" required>
</div>

<div class="input-group input-group-sm mb-3" style="max-width:15rem;">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">pb</span>
  </div>
  <input type="text" class="form-control form-control-sm" placeholder="pb" name="kr_pb_01" required>
</div>

<div class="input-group input-group-sm mb-3" style="max-width:15rem;">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">N</span>
  </div>
  <select name="kr_n_01" class="form-control form-control-sm">
    <option value="1">TIDAK</option>
    <option value="2">YA</option>
</select>
</div>

<div class="input-group input-group-sm mb-3" style="max-width:15rem;">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">IUFD</span>
  </div>
 <select name="kr_iufd_01" class="form-control form-control-sm">
    <option value="1">TIDAK</option>
    <option value="2">YA</option>
</select>
</div>

<div class="input-group input-group-sm mb-3" style="max-width:15rem;">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">SC</span>
  </div>
  <select name="kr_sc_01" class="form-control form-control-sm">
    <option value="1">TIDAK</option>
    <option value="2">YA</option>
</select>
</div>

<div class="input-group input-group-sm mb-3" style="max-width:20rem;">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">indikasi</span>
  </div>
  <input type="text" class="form-control form-control-sm" autocomplete="off" placeholder="indikasi" name="kr_indikasi_01" value="-">
</div>

<div class="input-group input-group-sm mb-3" style="max-width:15rem;">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">dpjb</span>
  </div>
  <select name="kr_dpjp_01" class="form-control form-control-sm" required>
      <option value="0">GENERAL</option>
  <?PHP 
        #DATA DOKTER
        $pwc_vdkt01_sw = $ms_q("$sl PelakuKode,PelakuNama FROM TPelaku WHERE UnitKode='06'  order by PelakuNama asc");
            while($pwc_vdkt01_sww = $ms_fas($pwc_vdkt01_sw)){
                echo"<option value=$pwc_vdkt01_sww[PelakuKode]>$pwc_vdkt01_sww[PelakuNama]</option>";
            }
  ?>
  </select>
        </div>

<div class="input-group input-group-sm mb-3" style="max-width:15rem;">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">KET</span>
  </div>
  <textarea name="kr_ket_01" class="form-control form-control-sm">-</textarea>
</div>

<button class="btn btn-success btn-sm" name="kr_simpan_in_01">SIMPAN DATA</button>
</form>
<?php
    #KR_VK_01_IN03
    if(isset($_POST['kr_simpan_in_01'])){
        $kr_kode_01 = @$_POST['kr_kode_01'];
        $kr_nama_01 = @$_POST['kr_nama_01'];
        $kr_alamat_01 = @$_POST['kr_alamat_01'];
        $kr_jamlhr_01 = @$_POST['kr_jamlhr_01'];
        $kr_tgllhr_01 = @$_POST['kr_tgllhr_01'];
        $kr_tgljamlhr_01 = @$_POST['kr_tgljamlhr_01'];
        $kr_as_01 = @$_POST['kr_as_01'];
        $kr_bb_01 = @$_POST['kr_bb_01'];
        $kr_pb_01 = @$_POST['kr_pb_01'];
        $kr_n_01 = @$_POST['kr_n_01'];
        $kr_iufd_01 = @$_POST['kr_iufd_01'];
        $kr_sc_01 = @$_POST['kr_sc_01'];
        $kr_indikasi_01 = @$_POST['kr_indikasi_01'];
        $kr_dpjp_01 = @$_POST['kr_dpjp_01'];
        $kr_ket_01 = @$_POST['kr_ket_01'];
            #PROCCESSING
            $pwc_save_kr_01 = $ms_q("$in tb_vk_kr_01(idmain_kr_01,InapNoAdmisi,PasienNomorRM,kr_kode_01,kr_nama_01,kr_alamat_01,kr_jamlhr_01,kr_tgllhr_01,kr_tgljamlhr_01,kr_tglinput_01,kr_as_01,kr_bb_01,kr_pb_01,kr_n_01,kr_iufd_01,kr_sc_01,kr_indikasi_01,kr_dpjp_01,kr_ket_01,kr_status_01)VALUES('$IDMAIN','$IDINAP01','$IDPSN01','$kr_kode_01','$kr_nama_01','$kr_alamat_01','$kr_jamlhr_01','$kr_tgllhr_01','$kr_tgllhr_01 $kr_jamlhr_01','$DATE_HTML5_SQL $time_html5','$kr_as_01','$kr_bb_01','$kr_pb_01','$kr_n_01','$kr_iufd_01','$kr_sc_01','$kr_indikasi_01','$kr_dpjp_01','$kr_ket_01','2')");
                if($pwc_save_kr_01){
                    include"sd/NOTIF_SUCCESS.php";
                }else{
                    include"sd/NOTIF_FAILED.php";
                }
        
    }

?>