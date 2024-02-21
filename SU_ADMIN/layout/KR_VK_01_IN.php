<b>#ENTRI KODE REGISTRATION 01</b>
<hr>
<form method="post">

<div class="input-group input-group-sm mb-3" style="max-width:20rem;">
  <input type="text" class="form-control form-control-sm" name="vk_txt_cari_01" placeholder="Entri RM / Nama..." required autocomplete="off">
  <div class="input-group-append">
    <button class="btn btn-success btn-sm" name="vk_btn_cari_01">CARI DATA</button>
  </div>
</div>
    <?PHP 
        if(isset($_POST['vk_btn_cari_01'])){
            $vk_txt_cari_01 = $sql_slash($_POST['vk_txt_cari_01']);
        #DATA PASIEN
        $pwc_vpsn01_sw = $ms_q("$sl PasienNomorRM,PasienNama,PasienAlamat FROM TPasien WHERE PasienNomorRM='$vk_txt_cari_01' OR PasienNama LIKE '%$vk_txt_cari_01%' ");
            while($pwc_vpsn01_sww = $ms_fas($pwc_vpsn01_sw)){
    ?>
        <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto"><?PHP echo "#$pwc_vpsn01_sww[PasienNomorRM] ".$pwc_vpsn01_sww['PasienNama']; ?></strong>
                </button>
            </div>
            <div class="toast-body">
               <?PHP echo $pwc_vpsn01_sww['PasienAlamat']; ?>
               <br>
               <a href="<?PHP echo"?HLM=KR_VK_01_IN02&IDPSN01=$pwc_vpsn01_sww[PasienNomorRM]"; ?>" class="badge bg-primary">PILIH >> </a>

     </div>
    </div>
    <br>
    <?PHP }} ?>
</form>