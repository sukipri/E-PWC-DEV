<?php
		
		 if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
 			include'../LOGIC/PG/PG_H_LOCATION.php';
       }else{

			if($vus01_sww['akses']==6 OR $vus01_sww['akses']==61 ){ 
		
?>
<body>
<?PHP
  #DATA CPF FORM02
  $cpf_vform02_sw = $CL_Q("$CL_SL tb_cpf_form02_01 WHERE idmain_form02_01='$IDCFORM02'");
        $cpf_vform02_sww =  $CL_FAS($cpf_vform02_sw);
	//--Data Pasien--//
	$cpf_vpsn01_sw = $CL_Q("$SL PasienNomorRM,PasienNama,PasienGender,PasienTglLahir FROM TPasien WHERE PasienNomorRM='$IDRM01'");
				$cpf_vpsn01_sww = $CL_FAS($cpf_vpsn01_sw);
	//DAta VIew Pasien--//
		$cpf_dvinap01_sw = $CL_Q("$CL_SL VPasienInap WHERE InapNoAdmisi='$IDADM01' ");
		$cpf_dvinap01_sww = $CL_FAS($cpf_dvinap01_sw);
	//--Data Rekam Medis--//
		$cpf_vrm01_sw = $CL_Q("$SL RMNoReg,PasienNomorRM,RMDiagRuang,RMDiagMasuk,RMDiagKode,RMDiagNama FROM TRekamMedis WHERE PasienNomorRM='$cpf_vpsn01_sww[PasienNomorRM]' AND RMNoReg='$IDADM01'");
				$cpf_vrm01_sww = $CL_FAS($cpf_vrm01_sw);		
	//--Data Rawat Inap--//
	$cpf_vinap01_sw = $CL_Q("$SL InapNoAdmisi,PasienNomorRM,InapTglMasuk,InapTglKeluar FROM TRawatInap WHERE InapNoAdmisi='$IDADM01'");
		$cpf_vinap01_sww = $CL_FAS($cpf_vinap01_sw);
				//-Konversi--///
				$cpf_tlahir_01_sw= substr($cpf_vpsn01_sww['PasienTglLahir'],-4);

        #KONVSERSI KODE ID
        if(isset($_GET['UPDM01'])){
            $KODE_DM = $cpf_vform02_sww['form02_kode_01'];
        }else{
          $KODE_DM = $cpf_cq_vform02_sw;
        }

?>
   <?PHP include"E-CPF/CPF_ENTRI_03_DM_HIT.php"; ?>
<form method="post">
<table width="100%" class="table table-bordered table-sm" style="max-width:40rem;" border="0">
          <tr>
            <td>
            <h2>CLINICAL PATHWAY FORM</h2>
            <br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <select name="form02_jenis_01" class="form-control" required>
                
                <?PHP 
                  if($cpf_vform02_sww['form02_jenis_01']=="DM"){
               ?>
                <option value="DM" selected>DIABETES MILITUS</optiosn>
               <?PHP 
                  }elseif($cpf_vform02_sww['form02_jenis_01']=="HPR"){
               ?>
                <option value="HPR" selected>HIPERTENSI</option>
               <?PHP 
                  }elseif($cpf_vform02_sww['form02_jenis_01']=="TBC"){
               ?>
               <option value="TBC" selected>TBC PARU GRADE I</option>
               <?PHP 
                  }elseif($cpf_vform02_sww['form02_jenis_01']=="LK"){
               ?>
                <option value="LK">LEUKEMIA</option>
               <?PHP 
                  }elseif($cpf_vform02_sww['form02_jenis_01']=="HIV"){
               ?>
                <option value="HIV">SUSPEK INFEKSI HIV/AIDS</option>
                  <?PHP }else{ ?>
                    <option value="">Kode Form</option>
                    <option value="DM">DIABETES MILITUS</option>
                    <option value="HPR">HIPERTENSI</option>
                    <option value="TBC">TBC PARU GRADE I</option>
                    <option value="LK">LEUKEMIA</option>
                    <option value="HIV">SUSPEK INFEKSI HIV/AIDS</option>
                 <?PHP } ?>
          </select>
         
          <input type="date" name="form02_tglinput_01" class="form-control form-control-sm" value="<?PHP echo $cpf_vform02_sww['form02_tglinput_01'] ?>">
              </div>
            </td>
          </tr>
          <tr class="table-info">
            <td>&nbsp;</td>
          </tr>
	</table>
    <table width="100%" border="0" class="table  table-sm">
      <tr>
        <td width="34%">
        	<!-- -->
            	<table width="59%" border="0" class="table table-sm table-striped">
                      <tr>
                        <td>
                        <div class="input-group input-group-sm mb-3" style="max-width:20rem;">
                              <span class="input-group-text" id="basic-addon1">Nama Pasien</span>
                            <input type="text" class="form-control"  autocomplete="off" name="" style="max-width:20rem;" placeholder="Nama Pasien..." value="<?PHP echo"$cpf_vpsn01_sww[PasienNama]"; ?>">
						</div>
					</td>
                      </tr>
                      <tr>
                        <td>
                        <div class="input-group input-group-sm mb-3" style="max-width:20rem;">
                              <span class="input-group-text" id="basic-addon1">Tanggal Lahir</span>
                            <input type="text" class="form-control form-control-sm"  autocomplete="off" name="" style="max-width:20rem;"  value="<?PHP echo"$cpf_vpsn01_sww[PasienTglLahir]"; ?>">
						</div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                         <div class="input-group input-group-sm mb-3" style="max-width:13rem;">
                              <span class="input-group-text" id="basic-addon1">Jenis Kelamin</span>
                            <input type="text" class="form-control form-control-sm"  autocomplete="off" name="" style="max-width:20rem;"  value="<?PHP echo"$cpf_vpsn01_sww[PasienGender]"; ?>">
						</div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                         <div class="input-group input-group-sm mb-3" style="max-width:30rem;">
                              <span class="input-group-text" id="basic-addon1">Diagnosa Masuk RS</span>
                            <input type="text" class="form-control form-control-sm"  autocomplete="off" name="" style="max-width:20rem;"  value="<?PHP echo"$cpf_vrm01_sww[RMDiagMasuk]"; ?>">
						  </div>
                          <ul>
                          <li>Penyakit Utama <br> <input type="text" class="form-control form-control-sm"  autocomplete="off" name="" style="max-width:20rem;"  value="<?PHP echo"$cpf_vrm01_sww[RMDiagNama]"; ?>"></li>
                          <li>Penyakit Penyerta<br> <input type="text" class="form-control form-control-sm"  autocomplete="off" name="" style="max-width:20rem;" ></li>
                          <li>Komplikasi <br><input type="text" class="form-control form-control-sm"  autocomplete="off" name="" style="max-width:20rem;"></li>
                       		</ul>
                       
                       </td>
                      </tr>
                      <tr>
                        <td>
                         <div class="input-group input-group-sm mb-3" style="max-width:30rem;">
                              <span class="input-group-text" id="basic-addon1">Tindakan</span>
                            <textarea name="" class="form-control"></textarea>
						</div>
                        </td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
            </table>

            <!--- --->
      
        </td>
        <td width="35%"><table width="59%" border="0" class="table table-sm table-striped">
          <tr>
            <td><div class="input-group input-group-sm mb-3" style="max-width:20rem;"> <span class="input-group-text" id="basic-addon2">berat Badan</span>
              <input type="text" class="form-control" name="form_bdn_berat_01"  autocomplete="off"  style="max-width:20rem;">
            </div></td>
          </tr>
          <tr>
            <td><div class="input-group input-group-sm mb-3" style="max-width:20rem;"> <span class="input-group-text" id="basic-addon2">Tinggi Badan</span>
              <input type="text" class="form-control form-control-sm"  autocomplete="off" name="form_bdn_tinggi_01"  style="max-width:20rem;">
            </div></td>
          </tr>
          <tr>
            <td><div class="input-group input-group-sm mb-3" style="max-width:20rem;"> <span class="input-group-text" id="basic-addon2">Tgl. Masuk RS</span>
              <input type="text" class="form-control form-control-sm"  autocomplete="off" name="input" style="max-width:20rem;"  value="<?PHP echo"$cpf_vinap01_sww[InapTglMasuk]"; ?>">
            </div></td>
          </tr>
          <tr>
            <td><div class="input-group input-group-sm mb-3" style="max-width:20rem;"> <span class="input-group-text" id="basic-addon2">Tgl. Keluar RS</span>
              <input type="text" class="form-control form-control-sm"  autocomplete="off" name="input" style="max-width:20rem;"  value="<?PHP echo"$cpf_vinap01_sww[InapTglKeluar]"; ?>">
            </div>
             </td>
          </tr>
          <tr>
            <td>
            <div class="input-group input-group-sm mb-3" style="max-width:20rem;"> <span class="input-group-text" id="basic-addon2">Kode ICD</span>
              <input type="text" class="form-control form-control-sm"  autocomplete="off" name="input" style="max-width:20rem;" >
            </div>
            </td>
          </tr>
          <tr>
            <td>
             <div class="input-group input-group-sm mb-3" style="max-width:20rem;"> <span class="input-group-text" id="basic-addon2">Kode ICD</span>
              <input type="text" class="form-control form-control-sm"  autocomplete="off" name="input" style="max-width:20rem;" >
            </div>
            </td>
          </tr>
          <tr>
            <td>
             <div class="input-group input-group-sm mb-3" style="max-width:20rem;"> <span class="input-group-text" id="basic-addon2">Kode ICD</span>
              <input type="text" class="form-control form-control-sm"  autocomplete="off" name="input" style="max-width:20rem;" >
            </div>
            </td>
          </tr>
          <tr>
            <td>
             <div class="input-group input-group-sm mb-3" style="max-width:20rem;"> <span class="input-group-text" id="basic-addon2">Kode ICD</span>
              <input type="text" class="form-control form-control-sm"  autocomplete="off" name="input" style="max-width:20rem;" >
            </div>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td width="31%"><table width="59%" border="0" class="table table-sm table-striped">
          <tr>
            <td><div class="input-group input-group-sm mb-3" style="max-width:20rem;"> <span class="input-group-text" id="basic-addon3">Nomor RM</span>
              <input type="text" class="form-control "  autocomplete="off" name="input2" style="max-width:20rem;">
            </div></td>
          </tr>
          <tr>
            <td><div class="input-group input-group-sm mb-3" style="max-width:20rem;"> <span class="input-group-text" id="basic-addon3">Lama Hari dirawat</span>
              <input type="text" class="form-control form-control-sm"  autocomplete="off" name="input2" style="max-width:20rem;">
            </div></td>
          </tr>
          <tr>
            <td><div class="input-group input-group-sm mb-3" style="max-width:20rem;"> <span class="input-group-text" id="basic-addon3">Rencana Rawat</span>
              <input type="text" class="form-control form-control-sm"  autocomplete="off" name="input2" style="max-width:20rem;">
            </div></td>
          </tr>
          <tr>
            <td><div class="input-group input-group-sm mb-3" style="max-width:20rem;"> <span class="input-group-text" id="basic-addon3">R.Rawat / Kelas</span>
              <input type="text" class="form-control form-control-sm"  autocomplete="off" name="input2" style="max-width:20rem;">
            </div></td>
          </tr>
          <tr>
            <td><div class="input-group input-group-sm mb-3" style="max-width:20rem;"> <span class="input-group-text" id="basic-addon3">Rujukan</span>
              <input type="text" class="form-control form-control-sm" autocomplete="off" name="input2" style="max-width:20rem;" >
            </div></td>
          </tr>
          <tr>
            <td><div class="input-group input-group-sm mb-3" style="max-width:20rem;"> <span class="input-group-text" id="basic-addon3">Biaya</span>
              <input type="text" class="form-control form-control-sm"  autocomplete="off" name="input2" style="max-width:20rem;" >
            </div></td>
          </tr>
          
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
</table>
<!-- -->
    
        <table class="table table-sm table-bordered">
            <tr class="table-dark">
                <td>KEGIATAN</td>
                <td>URAIAN KEGIATAN</td>
                <td>DILAKUKAN</td>
                <td>-</td>
            </tr>
            <tr>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
        </table>

<!--  -->
</form>
<?PHP include"../LOGIC/PRC/EXE_MIX.php"; ?>

<?PHP }} ?>