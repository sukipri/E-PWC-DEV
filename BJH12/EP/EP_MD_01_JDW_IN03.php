<?php 


		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../LOGIC/PG/PG_H_LOCATION.php";
	} else {
				#DATA_KRY
				$ep_dept01_sw = $ms_q("$call_sel TJ_Main_Data.dbo.HR_Personnel WHERE Per_Code='$IDEMP01'");
                    $ep_dept01_sww =$ms_fas($ep_dept01_sw);
                #DATA JADWAL
                $ep_vjdw01_sw = $ms_q("$sl Bulan,NIK FROM TJ_Main_data.dbo.tJadwal WHERE Bulan='$IDBLN01' AND NIK='$IDEMP01'");
                $ep_vjdw01_sww =$ms_fas($ep_vjdw01_sw);
?>
<div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <strong class="me-auto">SETUP > JADWAL</strong>
    </button>
  </div>
  <div class="toast-body">
    <b>ENTRI JADWAL / BUlan
  </div>
</div>
<br>
	<form method="post">
<div style="max-width:20rem;" class="mx-2">
<div class="input-group input-group-sm mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1">Nama</span>
		</div>
		<input type="text" class="form-control form-control-sm" autocomplete="off" name="ep_cari_nama_01" readonly require value="<?PHP echo  $ep_dept01_sww['Per_Name']; ?>">
	</div>
    
    <div class="input-group input-group-sm mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1"><?PHP echo"Bulan ".$ep_vjdw01_sww['Bulan']; ?></span>
		</div>
        <input type="hidden" value="<?PHP echo"$DATE_Y$DATE_m"; ?>" name="ep_bulan_01">
        <input type="hidden" value="<?PHP echo"$IDEMP02"; ?>" name="IDEMP02">
	
	</div>

    <?php 
			
					//$APIkey="17dd3619561411ce1bf65fe7a91ca7fba9fa9f2e3f8b7419eddda096d9024fcc";
						function curlsf($urlsf){
						$chsf01 = curl_init(); 
						curl_setopt($chsf01,CURLOPT_HTTPHEADER,array(
						"Content-Type: Application/JSON",          
						"Accept: Application/JSON"
					));
						curl_setopt($chsf01, CURLOPT_URL, $urlsf); 
						curl_setopt($chsf01, CURLOPT_RETURNTRANSFER, 1); 
						curl_setopt($chsf01, CURLOPT_CUSTOMREQUEST,"GET");
						curl_setopt($chsf01, CURLOPT_TIMEOUT, 60);  
						curl_setopt($chsf01, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($chsf01, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($chsf01, CURLPROTO_HTTPS , true);
						curl_setopt($chsf01, CURLINFO_HEADER_OUT, true);
						$outputsf = curl_exec($chsf01); 
						curl_close($chsf01);      
						return $outputsf;
					}
					
					$sendsf = curlsf("http://182.253.60.178/E-PWC/BJH12/EP_API/API_EP_TSHIFT_01.php");
					
					// mengubah JSON menjadi array
					@$data_shif = json_decode($sendsf, TRUE);
					
						//print_r($data);

?> 
		
    <?PHP 
            $ep_tgl_no = 1;
            
                while($ep_tgl_no <= 31 ){
                       $ep_conv_tgl_no = sprintf("%02d", $ep_tgl_no);
                    ?>
                    <div class="input-group input-group-sm mb-3" style="max-width:15rem;">
                    <div class="input-group-prepend">
			            <span class="input-group-text" id="basic-addon1"><?PHP echo"Hari $ep_tgl_no"; ?></span>
		          </div>
                    <input type="text" required name="<?PHP echo"T$ep_conv_tgl_no"; ?>" readonly value="<?PHP echo"T$ep_conv_tgl_no"; ?>"" class="form-control form-control-sm">
                    <option value=""></option>
                    <select name="<?PHP echo"ep_shift01_01$ep_tgl_no"; ?>" class="form-control form-control-sm" required>
                        <?PHP foreach($data_shif['data_shif'] as $baris_shif){
                            #DATA JDW COMPARASI
                             $ep_cek_vjdw01_sw = $ms_q("$sl Bulan,NIK,T$ep_conv_tgl_no FROM TJ_Main_Data.dbo.tJadwal WHERE Bulan='$IDBLN01' AND NIK='$IDEMP01'");
                             $ep_cek_vjdw01_sww =$ms_fas($ep_cek_vjdw01_sw);
                                #DATA JDW Comparasi
                                if($baris_shif['kode']==$ep_cek_vjdw01_sww['T'.$ep_conv_tgl_no]){
                                    echo"<option value=$baris_shif[kode] selected>$baris_shif[kode] - $baris_shif[masuk] - $baris_shif[keluar] - $baris_shif[ket]</option>";
                                }else{
                                    echo"<option value=$baris_shif[kode]>$baris_shif[kode] - $baris_shif[masuk] - $baris_shif[keluar] - $baris_shif[ket] </option>";
                        } }
                    ?>
                 </select>
                    </div>
                <?PHP $ep_tgl_no++; } ?>
                    <br>
                <button name="ep_simpan_bulan02_01" class="btn btn-success btn-sm"><i class="fas fa-cloud-upload-alt"></i>Unggah data</button>
				<br>
				<ol>
					<li>Masukan Jadwal Sesuai urutan Hari Dan shift</li>
					<li>Jika terjadi kesalahan entri bisa di update dengan cara yang sama , pilih hari dan shift lalu simpan</li>
				</ol>
    
    <!-- -->
    </div>
    </form>

            <?PHP include"../logic/EP_EXE_MIX.php" ?>
				<hr>
                <?PHP include"EP_MD_01_JDW_VIEW.php"; ?>

<?PHP } ob_start(); ?>