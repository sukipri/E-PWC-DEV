<?php 
@ob_start();
@session_start();
   //..INCLUDER//
	#GET_DATA
	include"../CONFIG/MSSQL/MS_CONNECT_02.php";
	include"../DIST/CODE/CODE_01.php";
	include"../DIST/CODE/CODE_02_DDL.php";
	include"../DIST/CFG/CFG_02.php";
	
	$IDEMP02 = @$SQL_SL($_GET['IDEMP02']);
	$IDEMP01 = @$SQL_SL($_GET['IDEMP01']);



		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
		include"../LOGIC/PG/PG_H_LOCATION.php";
	} else {
				#DATA_KRY
				$ep_dept01_sw = $CL_Q("$CL_SL HR_Personnel WHERE Per_Code='$IDEMP02'");
                    $ep_dept01_sww = $CL_FAS($ep_dept01_sw);
?>
<h4><a href="http://182.253.60.178/E-PWC/DFMBL_V3/DFMBL/EPWC_HOME_01.php?NAVI=EPWC_MENU_01_EP&PG_SA=WS-EPWC_EP_APP_JDW_IN" class="btn  btn-warning btn-sm mx-2"><i class="fas fa-angle-double-left"></i>BACK</a> Entri Jadwal</h4>
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
			<span class="input-group-text" id="basic-addon1">Tanggal</span>
		</div>
        <input type="hidden" value="<?PHP echo"$DATE_Y$DATE_m"; ?>" name="ep_bulan_01">
        <input type="hidden" value="<?PHP echo"$IDEMP02"; ?>" name="IDEMP02">
		<select name="ep_tgl_01" class="form-control form-control-sm" required>
        <option value=""></option>
        <?PHP 
            $ep_tgl_no = 0;
            
                while($ep_tgl_no <= 31 ){
                    $ep_conv_tgl_no = sprintf("%02d", $ep_tgl_no);
                        echo"<option value=T$ep_conv_tgl_no>$ep_conv_tgl_no</option>";
                $ep_tgl_no++; }

        ?>
    </select>
	</div>

    <?php 
				  ##-GET DATA--##
				    
				 
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
      <div class="input-group input-group-sm mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1">Shift</span>
		</div>
            <select name="ep_shift_01" class="form-control form-control-sm" required>
                <option value=""></option>

                <?PHP foreach($data_shif['data_shif'] as $baris_shif){
                    echo"<option value=$baris_shif[kode]>$baris_shif[kode] - $baris_shif[masuk] - $baris_shif[keluar] - $baris_shif[ket]  </option>";
                }
                    ?>

            </select>
            </div>
                    <br>
                <button name="ep_btn_cari_01_mnl" class="btn btn-success btn-sm"><i class="fas fa-cloud-upload-alt"></i>Unggah data</button>
				<br>
				<ol>
					<li>Masukan Jadwal Sesuai urutan Hari Dan shift</li>
					<li>Jika terjadi kesalahan entri bisa di update dengan cara yang sama , pilih hari dan shift lalu simpan</li>
					
				</ol>
    
    <!-- -->
    </div>
    </form>

                <?PHP include"../LOGIC/PRC/EXE_MIX_MNL.php" ?>
				<hr>
				<?PHP include"WS-EPWC_EP_APP_JDW_IN02_MNL_VIEW.php"; ?>

    



<?PHP } ob_start(); ?>