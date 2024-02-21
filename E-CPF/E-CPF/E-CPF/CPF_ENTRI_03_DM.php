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
<?PHP echo"<h3>FORM CODE #$KODE_DM</h3>"; ?>
 <div style="overflow:auto;width:auto;height:80%;padding:2px;border:1px solid #eee">
 <!--  -->
<table class="table table-sm table-striped table-bordered">
<tr class="table-info">
    <td width="25%">KEGIATAN</td>
    <td width="25%">URAIAN KEGIATAN</td>
    <td width="10%">HARI PENYAKIT / Hari Rawat</td>
    <td>KET</td>
</tr>
<tr>
    <td><b>1.Asesmen Awal</b></td>
    <td>-</td>
    <td>-</td>
    <td>-</td>
</tr>
<!-- ASESMEN AWAL MEDIS -->
<tr>
    <td>ASESMEN AWAL MEDIS</td>
    <td>Dokter IGD/Spesialis</td>
    <td>
        <select name="form02_as_igd_01" class="form-control form-control-sm">
            <option value=""></option>
        <?PHP 
            $as_igd_no = 1;
            while($as_igd_no <= 1){
                if($cpf_vform02_sww['form02_as_igd_01']==$as_igd_no){
                  echo"<option value=$as_igd_no selected>$as_igd_no</option>";  
                }else{
                echo"<option value=$as_igd_no>$as_igd_no</option>";
            }
            $as_igd_no++;}
        ?>
        </select>
    </td>
    <td>-</td>
</tr>
<!--  -->
<tr>
    <td> ASESMEN AWAL KEPERAWATAN</td>
    <td>Perawat Primer: Kondisi Umum, Tingkat kesadaran, tanda-tanda vital,
         riwayat alergi, skrining gizi,nyeri, status fungsional, risiko jatuh, 
         kebutuhan edukasi dan budaya</td>
    <td>
        <select name="form02_as_kep_01" class="form-control form-control-sm">
            <option value=""></option>
        <?PHP 
            $as_kep_no = 1;
            while($as_kep_no <= 1){
              if($cpf_vform02_sww['form02_as_kep_01']==$as_kep_no){
                echo"<option value=$as_kep_no selected>$as_kep_no</option>";
              }else{
                echo"<option value=$as_kep_no>$as_kep_no</option>";
              }
            $as_kep_no++;}
        ?>
        </select>
    </td>
    <td>Dilanjutkan dengan asesmen bio,psiko, sosial, spiritual dan budaya</td>
</tr>

<!-- HASIL -->
<tr>
    <td> -</td>
    <td>-</td>
    <td class="table-success"> <?PHP echo $cpf_as02_vcpf01_sw."%";?>
              <input type="hidden" name="dm01" value="<?PHP echo $cpf_as02_vcpf01_sw; ?>">
    </td>
    <td>-</td>
</tr>
<!--  -->
<tr class="table-dark">
    <td>-</td>
    <td>-</td>
    <td>- </td>
    <td>-</td>
</tr>
<!--  -->
<tr>
    <td>PEMERIKSAAN PENUNJANG</td>
    <td>EKG</td>
    <td>
    <select name="form02_pn_ekg_01" class="form-control form-control-sm">
            <option value=""></option>
        <?PHP 
            $pn_ekg_no = 1;
            while($pn_ekg_no <= 1){
              if($cpf_vform02_sww['form02_pn_ekg_01']==$pn_ekg_no){
                echo"<option value=$pn_ekg_no selected>$pn_ekg_no</option>";
              }else{
                echo"<option value=$pn_ekg_no>$pn_ekg_no</option>";
              }
            $pn_ekg_no++;}
        ?>
        </select>
    </td>
    <td>Usia di atas >40th</td>
</tr>
<!--  -->
<tr>
    <td><b>2.Laboratorium</b></td>
    <td>Hb, Ht, L, Tr</td>
    <td>
    <select name="form02_pn_hb_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $pn_hb_no = 1;
            while($pn_hb_no <= 1){
              if($cpf_vform02_sww['form02_pn_hb_01']==$pn_hb_no){
                echo"<option value=$pn_hb_no selected>$pn_hb_no</option>";
              }else{
                echo"<option value=$pn_hb_no>$pn_hb_no</option>";
              }
            $pn_hb_no++;}
        ?>
        </select>
    </td>
    <td>-</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>GDS</td>
    <td>
    <select name="form02_pn_gds_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $pn_gds_no = 1;
            while($pn_gds_no <= 7){
              if($cpf_vform02_sww['form02_pn_gds_01']==$pn_gds_no){
                echo"<option value=$pn_gds_no selected>$pn_gds_no</option>";
              }else{
                echo"<option value=$pn_gds_no>$pn_gds_no</option>";
              }
            $pn_gds_no++;}
        ?>
        </select>
    </td>
    <td>-</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>Darah Rutin</td>
    <td>
    <select name="form02_pn_dr_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $pn_dr_no = 1;
            while($pn_dr_no <= 7){
              if($cpf_vform02_sww['form02_pn_dr_01']==$pn_dr_no){
                echo"<option value=$pn_dr_no selected>$pn_dr_no</option>";
              }else{
                echo"<option value=$pn_dr_no>$pn_dr_no</option>";
              }
              $pn_dr_no++;}
        ?>
        </select>
    </td>
    <td>-</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>Ureum</td>
    <td>
    <select name="form02_pn_ur_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $pn_ur_no = 1;
            while($pn_ur_no <= 1){
              if($cpf_vform02_sww['form02_pn_ur_01']==$pn_ur_no){
                echo"<option value=$pn_ur_no selected>$pn_ur_no</option>";
              }else{
                echo"<option value=$pn_ur_no>$pn_ur_no</option>";
              }
            $pn_ur_no++;}
        ?>
        </select>
    </td>
    <td>-</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>Creatinin</td>
    <td>
    <select name="form02_pn_cr_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $pn_cr_no = 1;
            while($pn_cr_no <= 1){
              if($cpf_vform02_sww['form02_pn_cr_01']==$pn_cr_no){
                echo"<option value=$pn_cr_no selected>$pn_cr_no</option>";
              }else{
                echo"<option value=$pn_cr_no>$pn_cr_no</option>";
              }
            $pn_cr_no++;}
        ?>
        </select>
    </td>
    <td>-</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>Na,K</td>
    <td>
    <select name="form02_pn_na_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $pn_na_no = 1;
            while($pn_na_no <= 1){
              if($cpf_vform02_sww['form02_pn_na_01']==$pn_na_no){
                echo"<option value=$pn_na_no selected>$pn_na_no</option>";
              }else{
                echo"<option value=$pn_na_no>$pn_na_no</option>";
              }
            $pn_na_no++;}
        ?>
        </select>
    </td>
    <td>-</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>D. Lengkap, LED, SGOT/SGPT, Bill Direct/Inderect,  GI/II, Na, K, Sputum BTA 3x S/P/S</td>
    <td>
    <select name="form02_pn_lkp_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $pn_lkp_no = 1;
            while($pn_lkp_no <= 1){
              if($cpf_vform02_sww['form02_pn_lkp_01']==$pn_lkp_no){
                echo"<option value=$pn_lkp_no selected>$pn_lkp_no</option>";
              }else{
                echo"<option value=$pn_lkp_no>$pn_lkp_no</option>";
              }
            $pn_lkp_no++;}
        ?>
        </select>
    </td>
    <td>-</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>Natrium , Kalium</td>
    <td>
    <select name="form02_pn_nk_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $pn_nk_no = 1;
            while($pn_nk_no <= 1){
              if($cpf_vform02_sww['form02_pn_nk_01']==$pn_nk_no){
                echo"<option value=$pn_nk_no selected>$pn_nk_no</option>";
              }else{
                echo"<option value=$pn_nk_no>$pn_nk_no</option>";
              }
            $pn_nk_no++;}
        ?>
        </select>
    </td>
    <td>-</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>Cholesterol Total</td>
    <td>
    <select name="form02_pn_ch_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $pn_ch_no = 1;
            while($pn_ch_no <= 1){
              if($cpf_vform02_sww['form02_pn_ch_01']==$pn_ch_no){
                echo"<option value=$pn_ch_no selected>$pn_ch_no</option>";
              }else{
                echo"<option value=$pn_ch_no>$pn_ch_no</option>";
              }
            $pn_ch_no++;}
        ?>
        </select>
    </td>
    <td>-</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>Trigliserida,HDL/LDL Cholesterol</td>
    <td>
    <select name="form02_pn_trg_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $pn_trg_no = 1;
            while($pn_trg_no <= 1){
              if($cpf_vform02_sww['form02_pn_trg_01']==$pn_trg_no){
                echo"<option value=$pn_trg_no selected>$pn_trg_no</option>";
              }else{
                echo"<option value=$pn_trg_no>$pn_trg_no</option>";
              }
            $pn_trg_no++;}
        ?>
        </select>
    </td>
    <td>-</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>Serologi HIV</td>
    <td>
    <select name="form02_pn_serhiv_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $pn_serhiv_no = 1;
            while($pn_serhiv_no <= 1){
              if($cpf_vform02_sww['form02_pn_serhiv_01']==$pn_serhiv_no){
                echo"<option value=$pn_serhiv_no selected>$pn_serhiv_no</option>";
              }else{
                echo"<option value=$pn_serhiv_no>$pn_serhiv_no</option>";
              }
            $pn_serhiv_no++;}
        ?>
        </select>
    </td>
    <td>-</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>CD4</td>
    <td>
    <select name="form02_pn_cd4_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $pn_cd4_no = 1;
            while($pn_cd4_no <= 1){
              if($cpf_vform02_sww['form02_pn_cd4_01']==$pn_cd4_no){
                echo"<option value=$pn_cd4_no selected>$pn_cd4_no</option>";
              }else{
                echo"<option value=$pn_cd4_no>$pn_cd4_no</option>";
              }
            $pn_cd4_no++;}
        ?>
        </select>
    </td>
    <td>-</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>UC</td>
    <td>
    <select name="form02_pn_uc_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $pn_uc_no = 1;
            while($pn_uc_no <= 1){
              if($cpf_vform02_sww['form02_pn_uc_01']==$pn_uc_no){
                echo"<option value=$pn_uc_no selected>$pn_uc_no</option>";
              }else{
                echo"<option value=$pn_uc_no>$pn_uc_no</option>";
              }
            $pn_uc_no++;}
        ?>
        </select>
    </td>
    <td>-</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>TCM</td>
    <td>
    <select name="form02_pn_tcm_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $pn_tcm_no = 1;
            while($pn_tcm_no <= 1){
              if($cpf_vform02_sww['form02_pn_tcm_01']==$pn_tcm_no){
                echo"<option value=$pn_tcm_no selected>$pn_tcm_no</option>";
              }else{
                echo"<option value=$pn_tcm_no>$pn_tcm_no</option>";
              }
            $pn_tcm_no++;}
        ?>
        </select>
    </td>
    <td>-</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>hbsAg</td>
    <td>
    <select name="form02_pn_hbs_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $pn_hbs_no = 1;
            while($pn_hbs_no <= 1){
              if($cpf_vform02_sww['form02_pn_hbs_01']==$pn_hbs_no){
                echo"<option value=$pn_hbs_no selected>$pn_hbs_no</option>";
              }else{
                echo"<option value=$pn_hbs_no>$pn_hbs_no</option>";
              }
            $pn_hbs_no++;}
        ?>
        </select>
    </td>
    <td>-</td>
</tr>
<!-- HASIL -->
<tr>
    <td> -</td>
    <td>-</td>
    <td class="table-success">
      <?PHP echo ceil($cpf_lab02_vcpf01_sw)."%"; ?>
      <input type="hidden" name="lab01" value="<?PHP echo $cpf_lab02_vcpf01_sw; ?>">
    </td>
    <td>-</td>
</tr>
<!--  -->
<tr class="table-dark">
    <td>-</td>
    <td>-</td>
    <td>-</td>
    <td>-</td>
</tr>
<!--  -->
<tr>
    <td><b>3.RADIOLOGI/ IMAGING</b></td>
    <td>Thorax</td>
    <td>
    <select name="form02_rad_trx_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $rad_trx_no = 1;
            while($rad_trx_no <= 1){
              if($cpf_vform02_sww['form02_rad_trx_01']==$rad_trx_no){
                echo"<option value=$rad_trx_no selected>$rad_trx_no</option>";
              }else{
                echo"<option value=$rad_trx_no>$rad_trx_no</option>";
              }
            $rad_trx_no++;}
        ?>
        </select>
    </td>
    <td>Usia di atas >40th</td>
</tr>
<!--  -->
<tr>
    <td>-</b></td>
    <td>USG</td>
    <td>
    <select name="form02_rad_usg_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $rad_usg_no = 1;
            while($rad_usg_no <= 1){
              if($cpf_vform02_sww['form02_rad_usg_01']==$rad_usg_no){
                echo"<option value=$rad_usg_no selected>$rad_usg_no</option>";
              }else{
                echo"<option value=$rad_usg_no>$rad_usg_no</option>";
              }
              $rad_usg_no++;}
        ?>
        </select>
    </td>
    <td>Usia di atas >40th</td>
</tr>

<!-- HASIL -->
<tr>
    <td> -</td>
    <td>-</td>
    <td class="table-success">
      <?PHP echo ceil($cpf_rad02_vcpf01_sw)."%"; ?>
      <input type="hidden" name="lab01" value="<?PHP echo $cpf_rad02_vcpf01_sw; ?>">
    </td>
    <td>-</td>
</tr>
<!--  -->
<tr class="table-dark">
    <td>-</td>
    <td>-</td>
    <td>-</td>
    <td>-</td>
</tr>
<!--  -->
<tr>
    <td>Asesmen Lanjutan</td>
    <td>-</td>
    <td>-</td>
    <td>-</td>
</tr>
<!--  -->
<tr>
    <td><b>4.ASSESMEN MEDIS</b></td>
    <td>Dokter DPJP</td>
    <td>
    <select name="form02_al_dpjp_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $al_dpjp_no = 2;
            while($al_dpjp_no <= 7){
              if($cpf_vform02_sww['form02_al_dpjp_01']==$al_dpjp_no){
                echo"<option value=$al_dpjp_no selected>$al_dpjp_no</option>";
              }else{
                echo"<option value=$al_dpjp_no>$al_dpjp_no</option>";
              }
            $al_dpjp_no++;}
        ?>
        </select>
    </td>
    <td>Visite Harian/Follow Up</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>Dokter Non DPJP/dr Ruangan</td>
    <td>
    <select name="form02_al_ndpjp_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $al_ndpjp_no = 1;
            while($al_ndpjp_no <= 1){
              if($cpf_vform02_sww['form02_al_ndpjp_01']==$al_ndpjp_no){
                echo"<option value=$al_ndpjp_no selected>$al_ndpjp_no</option>";
              }else{
                echo"<option value=$al_ndpjp_no>$al_ndpjp_no</option>";
              }
            $al_ndpjp_no++;}
        ?>
        </select>
    </td>
    <td>Visite Harian/Follow Up</td>
</tr>
<!-- HASIL -->
<tr>
    <td> -</td>
    <td>-</td>
    <td class="table-success">
      <?PHP echo ceil($cpf_al02_vcpf01_sw)."%" ?>
      <input type="hidden" name="al01" value="<?PHP echo $cpf_al02_vcpf01_sw; ?>"></td>
    <td>-</td>
</tr>
<!--  -->
<tr>
    <td><b>5.ASSESMEN KEPERAWATAN</b></td>
    <td>Perawat Penanggung Jawab</td>
    <td>
    <select name="form02_al_pj_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $al_pj_no = 1;
            while($al_pj_no <= 7){
              if($cpf_vform02_sww['form02_al_pj_01']==$al_pj_no){
                echo"<option value=$al_pj_no selected>$al_pj_no</option>";
              }else{
                echo"<option value=$al_pj_no>$al_pj_no</option>";
              }
            $al_pj_no++;}
        ?>
        </select>
    </td>
    <td>Dilakukan dalam 3 shift</td>
</tr>
<!-- HASIL -->
<tr>
    <td> -</td>
    <td>-</td>
    <td class="table-success">
      <?PHP echo ceil($cpf_alpj02_vcpf01_sw)."%" ?>
      <input type="hidden" name="alpj01" value="<?PHP echo $cpf_alpj02_vcpf01_sw; ?>"></td>
    <td>-</td>
</tr>
<!--  -->
<tr>
    <td><b>6.ASSESMEN GIZI</b></td>
    <td> ahli gizi melakukan  pengkajian gizi lanjut dengan menggunakan 
      form pengkajian gizi dan mendokumentasikan dalam ADIME</td>
    <td>
    <select name="form02_al_gizi_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $al_gizi_no = 1;
            while($al_gizi_no <= 7){
              if($cpf_vform02_sww['form02_al_gizi_01']==$al_gizi_no){
                echo"<option value=$al_gizi_no selected>$al_gizi_no</option>";
              }else{
                echo"<option value=$al_gizi_no>$al_gizi_no</option>";
              }
            $al_gizi_no++;}
        ?>
        </select>
    </td>
    <td>Lihat resiko mal nutrisi melalui skrining gizi dan mengkaji data antropometri, biokimia, fisik/klinis , riwayat personal. 
      Asesmen dilakukan dalam waktu 48 jam</td>
</tr>
<!-- HASIL -->
<tr>
    <td> -</td>
    <td>-</td>
    <td class="table-success">
      <?PHP echo ceil($cpf_algz02_vcpf01_sw)."%" ?>
      <input type="hidden" name="algz01" value="<?PHP echo $cpf_as02_vcpf01_sw; ?>"></td>
    <td>-</td>
</tr>
<!--  -->
<tr>
    <td><b>7.ASSESMEN FARMASI</b></td>
    <td>Telaah Resep</td>
    <td>
    <select name="form02_al_resep_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $al_resep_no = 1;
            while($al_resep_no <= 7){
              if($cpf_vform02_sww['form02_al_resep_01']==$al_resep_no){
                echo"<option value=$al_resep_no selected>$al_resep_no</option>";
              }else{
                echo"<option value=$al_resep_no>$al_resep_no</option>";
              }
            $al_resep_no++;}
        ?>
        </select>
    </td>
    <td>Dilanjutkan  dengan intervensi farmasi yang sesuai hasil telaah dan rekonsiliasi</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>Rekonsiliasi Resep</td>
    <td>
    <select name="form02_al_reresep_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $al_reresep_no = 1;
            while($al_reresep_no <= 7){
              if($cpf_vform02_sww['form02_al_reresep_01']==$al_reresep_no){
              echo"<option value=$al_reresep_no selected>$al_reresep_no</option>";
              }else{
                echo"<option value=$al_reresep_no>$al_reresep_no</option>";
              }
            $al_reresep_no++;}
        ?>
        </select>
    </td>
    <td>Dilanjutkan  dengan intervensi farmasi yang sesuai hasil telaah dan rekonsiliasi</td>
</tr>
<!-- HASIL -->
<tr>
    <td> -</td>
    <td>-</td>
    <td class="table-success">
      <?PHP echo ceil($cpf_alrsp02_vcpf01_sw)."%" ?>
      <input type="hidden" name="alrsp01" value="<?PHP echo $cpf_as02_vcpf01_sw; ?>"></td>
    <td>-</td>
</tr>
<!--  -->
<tr class="table-dark">
    <td>-</td>
    <td>-</td>
    <td>-</td>
    <td>-</td>
</tr>
<!--  -->
<tr>
    <td><b>8.TERAPI/MEDIKAMENTOSA</b></td>
    <td>-</td>
    <td>-</td>
    <td>-</td>
</tr>
<!--  -->
<tr>
    <td>a.Injeksi</td>
    <td>Strepto</td>
    <td>
    <select name="form02_trp_str_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $trp_str_no = 1;
            while($trp_str_no <= 7){
              if($cpf_vform02_sww['form02_trp_str_01']==$trp_str_no){
                echo"<option value=$trp_str_no selected>$trp_str_no</option>";
              }else{
                echo"<option value=$trp_str_no>$trp_str_no</option>";
                }
            $trp_str_no++;}
        ?>
       
        </select>
    </td>
    <td> Tergantung kondisi pasien </td>
</tr>
<!--  -->
<tr>
    <td>a.Injeksi</td>
    <td>insulin</td>
    <td>
    <select name="form02_trp_inj_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $trp_inj_no = 1;
            while($trp_inj_no <= 7){
              if($cpf_vform02_sww['form02_trp_inj_01']==$trp_inj_no){
                echo"<option value=$trp_inj_no selected>$trp_inj_no</option>";
              }else{
                echo"<option value=$trp_inj_no>$trp_inj_no</option>";
                }
            $trp_inj_no++;}
        ?>
        </select>
    </td>
    <td>Tentative </td>
</tr>
<!--  -->
<tr>
    <td>a.Cairan Infus</td>
    <td>RL</td>
    <td>
    <select name="form02_trp_rl_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $trp_rl_no = 1;
            while($trp_rl_no <= 7){
              if($cpf_vform02_sww['form02_trp_rl_01']==$trp_rl_no){
                echo"<option value=$trp_rl_no selected>$trp_rl_no</option>";
              }else{
                echo"<option value=$trp_rl_no>$trp_rl_no</option>";
              }
            $trp_rl_no++;}
        ?>
        </select>
    </td>
    <td>-</td>
</tr>
<!--  -->
<tr>
    <td>Obat Oral</td>
    <td>INH</td>
    <td>
    <select name="form02_trp_inh_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $trp_inh_no = 1;
            while($trp_inh_no <= 7){
              if($cpf_vform02_sww['form02_trp_inh_01']==$trp_inh_no){
                echo"<option value=$trp_inh_no selected>$trp_inh_no</option>";
              }else{
                echo"<option value=$trp_inh_no>$trp_inh_no</option>";
                }
            $trp_inh_no++;}
        ?>
        </select>
    </td>
    <td>-</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>Rifampicin</td>
    <td>
    <select name="form02_trp_rf_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $trp_rf_no = 1;
            while($trp_rf_no <= 7){
              if($cpf_vform02_sww['form02_trp_rf_01']==$trp_rf_no){
                echo"<option value=$trp_rf_no selected>$trp_rf_no</option>";
              }else{
                echo"<option value=$trp_rf_no>$trp_rf_no</option>";
                }
            $trp_rf_no++;}
        ?>
        </select>
    </td>
    <td>-</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>Transfusi komponen darah</td>
    <td>
    <select name="form02_trp_tkd_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $trp_tkd_no = 1;
            while($trp_tkd_no <= 1){
              if($cpf_vform02_sww['form02_trp_tkd_01']==$trp_tkd_no){
                echo"<option value=$trp_tkd_no selected>$trp_tkd_no</option>";
              }else{
                echo"<option value=$trp_tkd_no>$trp_tkd_no</option>";
                }
              $trp_tkd_no++;}
        ?>
        </select>
    </td>
    <td>-</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>Asam Tranexamat</td>
    <td>
    <select name="form02_trp_at_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $trp_at_no = 1;
            while($trp_at_no <= 7){
              if($cpf_vform02_sww['form02_trp_at_01']==$trp_at_no){
                echo"<option value=$trp_at_no selected>$trp_at_no</option>";
              }else{
                echo"<option value=$trp_at_no>$trp_at_no</option>";
                }
                $trp_at_no++;}
        ?>
        </select>
    </td>
    <td>-</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>VITAMIN K</td>
    <td>
    <select name="form02_trp_vitk_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $trp_vitk_no = 1;
            while($trp_vitk_no <= 7){
              if($cpf_vform02_sww['form02_trp_vitk_01']==$trp_vitk_no){
                echo"<option value=$trp_vitk_no selected>$trp_vitk_no</option>";
              }else{
                echo"<option value=$trp_vitk_no>$trp_vitk_no</option>";
                }
                $trp_vitk_no++;}
        ?>
        </select>
    </td>
    <td>-</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>Paracetamol 500 mg</td>
    <td>
    <select name="form02_trp_prctm_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $trp_prctm_no = 1;
            while($trp_prctm_no <= 7){
              if($cpf_vform02_sww['form02_trp_prctm_01']==$trp_prctm_no){
                echo"<option value=$trp_prctm_no selected>$trp_prctm_no</option>";
              }else{
                echo"<option value=$trp_prctm_no>$trp_prctm_no</option>";
                }
                $trp_prctm_no++;}
        ?>
        </select>
    </td>
    <td>Kalau Perlu</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>Pirazinamid</td>
    <td>
    <select name="form02_trp_prz_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $trp_prz_no = 1;
            while($trp_prz_no <= 7){
              if($cpf_vform02_sww['form02_trp_prz_01']==$trp_prz_no){
                echo"<option value=$trp_prz_no selected>$trp_prz_no</option>";
              }else{
                echo"<option value=$trp_prz_no>$trp_prz_no</option>";
                }
            $trp_prz_no++;}
        ?>
        </select>
    </td>
    <td>-</td>
</tr>
<tr>
    <td>-</td>
    <td>Ethambutol</td>
    <td>
    <select name="form02_trp_eth_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $trp_eth_no = 1;
            while($trp_eth_no <= 7){
              if($cpf_vform02_sww['form02_trp_eth_01']==$trp_eth_no){
                echo"<option value=$trp_eth_no selected>$trp_eth_no</option>";
              }else{
                echo"<option value=$trp_eth_no>$trp_eth_no</option>";
                }
            $trp_eth_no++;}
        ?>
        </select>
    </td>
    <td>-</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>Glibenclamide</td>
    <td>
    <select name="form02_trp_gb_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $trp_gb_no = 1;
            while($trp_gb_no <= 7){
              if($cpf_vform02_sww['form02_trp_gb_01']==$trp_gb_no){
                echo"<option value=$trp_gb_no selected>$trp_gb_no</option>";
              }else{
                echo"<option value=$trp_gb_no>$trp_gb_no</option>";
              }
                
            $trp_gb_no++;}
        ?>
        </select>
    </td>
    <td>Obat Pulang</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>Metformin</td>
    <td>
    <select name="form02_trp_met_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $trp_met_no = 1;
            while($trp_met_no <= 7){
              if($cpf_vform02_sww['form02_trp_met_01']==$trp_met_no){
                echo"<option value=$trp_met_no selected>$trp_met_no</option>";
              }else{
                echo"<option value=$trp_met_no>$trp_met_no</option>";
              }
            $trp_met_no++;}
        ?>
        </select>
    </td>
    <td>Obat Pulang</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>Glimepiride</td>
    <td>
    <select name="form02_trp_gli_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $trp_gli_no = 1;
            while($trp_gli_no <= 7){
              if($cpf_vform02_sww['form02_trp_gli_01']==$trp_gli_no){
                echo"<option value=$trp_gli_no selected>$trp_gli_no</option>";
              }else{
                echo"<option value=$trp_gli_no>$trp_gli_no</option>";
              }
                
            $trp_gli_no++;}
        ?>
        </select>
    </td>
    <td>Obat Pulang</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>Captopril 6,2-50mg/kali</td>
    <td>
    <select name="form02_trp_cpt_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $trp_cpt_no = 1;
            while($trp_cpt_no <= 7){
              if($cpf_vform02_sww['form02_trp_cpt_01']==$trp_cpt_no){
                echo"<option value=$trp_cpt_no selected>$trp_cpt_no</option>";
              }else{
                echo"<option value=$trp_cpt_no>$trp_cpt_no</option>";
              }
                
            $trp_cpt_no++;}
        ?>
        </select>
    </td>
    <td>Obat Pulang</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>valsartan </td>
    <td>
    <select name="form02_trp_val_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $trp_val_no = 1;
            while($trp_val_no <= 7){
              if($cpf_vform02_sww['form02_trp_val_01']==$trp_val_no){
                echo"<option value=$trp_val_no selected>$trp_val_no</option>";
              }else{
                echo"<option value=$trp_val_no>$trp_val_no</option>";
              }
                
            $trp_val_no++;}
        ?>
        </select>
    </td>
    <td>Obat Pulang</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>Ramipril</td>
    <td>
    <select name="form02_trp_ram_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $trp_ram_no = 1;
            while($trp_ram_no <= 7){
              if($cpf_vform02_sww['form02_trp_ram_01']==$trp_ram_no){
                echo"<option value=$trp_ram_no selected>$trp_ram_no</option>";
              }else{
                echo"<option value=$trp_ram_no>$trp_ram_no</option>";
              }
                
            $trp_ram_no++;}
        ?>
        </select>
    </td>
    <td>Obat Pulang</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>Amlodipin</td>
    <td>
    <select name="form02_trp_am_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $trp_am_no = 1;
            while($trp_am_no <= 7){
              if($cpf_vform02_sww['form02_trp_am_01']==$trp_am_no){
                echo"<option value=$trp_am_no selected>$trp_am_no</option>";
              }else{
                echo"<option value=$trp_am_no>$trp_am_no</option>";
              }
                
            $trp_am_no++;}
        ?>
        </select>
    </td>
    <td>Obat Pulang</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>Diltiazem</td>
    <td>
    <select name="form02_trp_dil_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $trp_dil_no = 1;
            while($trp_dil_no <= 7){
              if($cpf_vform02_sww['form02_trp_dil_01']==$trp_dil_no){
                echo"<option value=$trp_dil_no selected>$trp_dil_no</option>";
              }else{
                echo"<option value=$trp_dil_no>$trp_dil_no</option>";
              }
                
            $trp_dil_no++;}
        ?>
        </select>
    </td>
    <td>Obat Pulang</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>HCT</td>
    <td>
    <select name="form02_trp_hct_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $trp_hct_no = 1;
            while($trp_hct_no <= 7){
              if($cpf_vform02_sww['form02_trp_hct_01']==$trp_hct_no){
                echo"<option value=$trp_hct_no selected>$trp_hct_no</option>";
              }else{
                echo"<option value=$trp_hct_no>$trp_hct_no</option>";
              }
                
            $trp_hct_no++;}
        ?>
        </select>
    </td>
    <td>Obat Pulang</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>Bisoprolol</td>
    <td>
    <select name="form02_trp_bis_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $trp_bis_no = 1;
            while($trp_bis_no <= 7){
              if($cpf_vform02_sww['form02_trp_bis_01']==$trp_bis_no){
                echo"<option value=$trp_bis_no selected>$trp_bis_no</option>";
              }else{
                echo"<option value=$trp_bis_no>$trp_bis_no</option>";
              }
                
            $trp_bis_no++;}
        ?>
        </select>
    </td>
    <td>Obat Pulang</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>Adalat Oros</td>
    <td>
    <select name="form02_trp_ao_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $trp_ao_no = 1;
            while($trp_ao_no <= 7){
              if($cpf_vform02_sww['form02_trp_ao_01']==$trp_ao_no){
                echo"<option value=$trp_ao_no selected>$trp_ao_no</option>";
              }else{
                echo"<option value=$trp_ao_no>$trp_ao_no</option>";
              }
                
            $trp_ao_no++;}
        ?>
        </select>
    </td>
    <td>Obat Pulang</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>ARV dalam sediaan FDC atau lepasan.</td>
    <td>
    <select name="form02_trp_arv_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $trp_arv_no = 1;
            while($trp_arv_no <= 7){
              if($cpf_vform02_sww['form02_trp_arv_01']==$trp_arv_no){
                echo"<option value=$trp_arv_no selected>$trp_arv_no</option>";
              }else{
                echo"<option value=$trp_arv_no>$trp_arv_no</option>";
              }    
              $trp_arv_no++;}
        ?>
        </select>
    </td>
    <td>Tergantung indikasi medis</td>
</tr>
<!--  -->
<tr>
    <td>-</td>
    <td>Cotrimoxazole 1 X 960</td>
    <td>
    <select name="form02_trp_cotri_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $trp_cotri_no = 1;
            while($trp_cotri_no <= 7){
              if($cpf_vform02_sww['form02_trp_cotri_01']==$trp_cotri_no){
                echo"<option value=$trp_cotri_no selected>$trp_cotri_no</option>";
              }else{
                echo"<option value=$trp_cotri_no>$trp_cotri_no</option>";
              }    
              $trp_cotri_no++;}
        ?>
        </select>
    </td>
    <td>Jika CD4 < 200/Stadium 3</td>
</tr>
<!-- HASIL -->
<tr>
    <td> -</td>
    <td>-</td>
    <td class="table-success">
      <?PHP echo ceil($cpf_trp_vcpf01_sw)."%" ?>
      <input type="hidden" name="trp01" value="<?PHP echo $cpf_trp02_vcpf01_sw; ?>"></td>
    <td>-</td>
</tr>
<!--  -->
<tr class="table-dark">
    <td>-</td>
    <td>-</td>
    <td>-</td>
    <td>-</td>
</tr>
<!--  -->
<tr>
    <td><b>9.Lama Rawat</b></td>
    <td>-</td>
    <td>
    <select name="form02_lr_01" class="form-control form-control-sm">
        <option value=""></option>
        <?PHP 
            $trp_lr_no = 1;
            while($trp_lr_no <= 7){
              if($cpf_vform02_sww['form02_lr_01']==$trp_lr_no){
                echo"<option value=$trp_lr_no selected>$trp_lr_no</option>";
              }else{
                echo"<option value=$trp_lr_no>$trp_lr_no</option>";
              }
               
            $trp_lr_no++;}
        ?>
        </select>
    </td>
    <td>-</td>
</tr>
<!-- HASIL -->
<tr>
    <td> -</td>
    <td>-</td>
    <td class="table-success">
      <?PHP echo ceil($cpf_lr_vcpf01_sw)."%" ?>
      <input type="hidden" name="lr01" value="<?PHP echo $cpf_lr02_vcpf01_sw; ?>"></td>
    <td>-</td>
</tr>
<!--  -->
<!-- HASIL  TOTAL -->
<tr class="table-info">
    <td> -</td>
    <td>-</td>
    <td class="table-secondary"><?PHP echo ceil($cpf_tot02_vcpf01_sw)."%"; ?></td>
    <td>-</td>
</tr>
</table>
</div>
<br>
<?PHP if(isset($_GET['UPDM01'])){ ?>
<button class="btn btn-outline-warning" name="cpf_dm_up_01">UPDATE DATA</button>
&nbsp
<button class="btn btn-outline-primary" name="cpf_dm_up02_01">UNGGAH GLOBAL</button>
<?PHP }else{ ?>
  <button class="btn btn-outline-success" name="cpf_dm_simpan_01">SIMPAN DATA</button>
  <?PHP } ?>
<!--  -->
</form>
<?PHP include"../LOGIC/PRC/EXE_MIX.php"; ?>

<?PHP }} ?>