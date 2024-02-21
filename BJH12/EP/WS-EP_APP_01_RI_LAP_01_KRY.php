<form method="post">
<div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <strong class="me-auto">Note</strong>
    <small>11 mins ago</small>
      <span aria-hidden="true"></span>
    </button>
  </div>
  <div class="toast-body">
    Yang tersortir hanya pengguna Presensi <i>GPS Method</i>
  </div>
</div>
<br>    
<span class="badge bg-info">#Lap Random / Karyawan</span>
<div class="input-group mb-3" style="max-width:20rem;">
  <input type="text" class="form-control form-control-sm" autocomplete="off" required name="ep_cari_nama_01">
  <div class="input-group-append">
    <button class="btn btn-success btn-sm" name="ep_btn_cari_01">CARI DATA</button>
  </div>
</div>
</form>
<br>
    <?PHP 
        if(isset($_POST['ep_btn_cari_01'])){
			$ep_cari_nama_01 = @$sql_sl($_POST['ep_cari_nama_01']);
		$epwc_vkry01_sw02 = $ms_q("$sl KaryNomor,KaryNomorYakkum,KaryNama,KaryJbtStruktural,UnitKode FROM TKaryawan WHERE KaryNama LIKE '%$ep_cari_nama_01%'");
			while($epwc_vkry01_sww02 = $ms_fas($epwc_vkry01_sw02)){
                #SUB DDATA
                $epwc_sub_vkry01_sw = substr($epwc_vkry01_sww02['KaryNomorYakkum'],1);
             ?>

                <div class="alert alert-dismissible alert-secondary" style="max-width:20rem;">
                <strong><?PHP echo $epwc_vkry01_sww02['KaryNama']; ?></strong>
                <br>
                <a href="<?PHP echo"?HLM=EP_HOME_01&SUB=EP_APP_01&SUB_CHILD=WS-EP_APP_01_RI_JADWAL_01&SUB_CHILD02=WS-EP_APP_01_RI_LAP_01&SUB_CHILD03=WS-EP_APP_01_RI_LAP_01_KRY02&IDEMP01=$epwc_sub_vkry01_sw"; ?>" class="badge bg-info">Information</a>
                </div>
 <?PHP } } ?>