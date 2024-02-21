<?php
		
		 if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
 			include'../LOGIC/PG/PG_H_LOCATION.php';
       }else{
			
			if($vus01_sww['akses']==6 OR $vus01_sww['akses']==61 ){ 
		
?>
<body>
<?PHP
		//--DATA CPF--//
		$cpf_vcform01_sw = $CL_Q("$CL_SL tb_cpf_form_01 WHERE idmain_cpf_form_01='$IDCFORM01'");
			$cpf_vcform01_sww = $CL_FAS($cpf_vcform01_sw);
	//--Data Pasien--//
	$cpf_vpsn01_sw = $CL_Q("$SL PasienNomorRM,PasienNama,PasienGender,PasienTglLahir FROM TPasien WHERE PasienNomorRM='$cpf_vcform01_sww[PasienNomorRM]'");
				$cpf_vpsn01_sww = $CL_FAS($cpf_vpsn01_sw);
	//DAta VIew Pasien--//
		$cpf_dvinap01_sw = $CL_Q("$CL_SL VPasienInap WHERE InapNoAdmisi='$cpf_vcform01_sww[InapNoAdmisi]' ");
		$cpf_dvinap01_sww = $CL_FAS($cpf_dvinap01_sw);
	//--Data Rekam Medis--//
		$cpf_vrm01_sw = $CL_Q("$SL RMNoReg,PasienNomorRM,RMDiagRuang,RMDiagMasuk,RMDiagKode,RMDiagNama FROM TRekamMedis WHERE PasienNomorRM='$cpf_vpsn01_sww[PasienNomorRM]' AND RMNoReg='$cpf_vcform01_sww[InapNoAdmisi]'");
				$cpf_vrm01_sww = $CL_FAS($cpf_vrm01_sw);		
	//--Data Rawat Inap--//
	$cpf_vinap01_sw = $CL_Q("$SL InapNoAdmisi,PasienNomorRM,InapTglMasuk,InapTglKeluar FROM TRawatInap WHERE InapNoAdmisi='$IDADM01'");
		$cpf_vinap01_sww = $CL_FAS($cpf_vinap01_sw);
		
				//-Konversi--///
				$cpf_tlahir_01_sw= substr($cpf_vpsn01_sww['PasienTglLahir'],-4);

?>
<form method="post">
<table width="100%" class="table table-bordered table-sm" style="max-width:40rem;" border="0">
          <tr>
            <td>
            <h2>CLINICAL PATHWAY FORM</h2>
				<?PHP echo"<b>$cpf_vcform01_sww[form_nama_01] - $cpf_vcform01_sww[form_kode_01]"; ?>

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
                            <input type="text" class="form-control "  autocomplete="off" name="" style="max-width:20rem;" placeholder="Nama Pasien..." value="<?PHP echo"$cpf_vpsn01_sww[PasienNama]"; ?>">
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
                            <textarea name="" class="form-control"><?PHP echo"$cpf_dvinap01_sww[NamaTind]"; ?></textarea>
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
              <input type="text" class="form-control" name="form_bdn_berat_01"  autocomplete="off"  style="max-width:20rem;" value="<?PHP echo"$cpf_vcform01_sww[form_bdn_berat_01]"; ?>">
            </div></td>
          </tr>
          <tr>
            <td><div class="input-group input-group-sm mb-3" style="max-width:20rem;"> <span class="input-group-text" id="basic-addon2">Tinggi Badan</span>
              <input type="text" class="form-control form-control-sm"  autocomplete="off" name="form_bdn_tinggi_01"  style="max-width:20rem;" value="<?PHP echo"$cpf_vcform01_sww[form_bdn_tinggi_01]"; ?>">
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
              <input type="text" class="form-control form-control-sm"  autocomplete="off" name="input" style="max-width:20rem;" value="<?PHP echo"$cpf_dvinap01_sww[RMDiagKode]"; ?>" >
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
              <input type="text" class="form-control "  autocomplete="off" name="input2" style="max-width:20rem;" value="<?PHP echo"$cpf_vpsn01_sww[PasienNomorRM]"; ?>">
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
<br>
	
	<?PHP echo"<h3>FORM CODE #$cpf_cq_vform01_sw</h3>"; ?>
 <div style="overflow:auto;width:auto;height:80%;padding:2px;border:1px solid #eee;">
    <table width="100%" border="0" class="table  table-sm ">
      <tr>
        <td height="131">
        <!-- -->
        <table width="100%" class="table table-bordered table-sm" border="0">
              <tr>
                <td width="21%" rowspan="4" align="center" style="padding-top:50px;"><b>KEGIATAN</b></td>
                <td width="28%" rowspan="4" align="center" style="padding-top:50px;"><b>URAIAN KEGIATAN</b></td>
                <td colspan="3" align="center" class="table-info">HARI PENYAKIT</td>
                <td width="24%" rowspan="4" align="center" style="padding-top:50px;">KETERANGAN</td>
              </tr>
              <tr>
                <td width="10%"  align="center">1</td>
                <td width="8%"  align="center">2</td>
                <td width="9%"  align="center">3</td>
              </tr>
              <tr>
                <td colspan="3" align="center" class="table-info">HARI RAWAT</td>
              </tr>
              <tr>
                <td align="center">1</td>
                <td align="center">2</td>
                <td align="center">3</td>
              </tr>
              <tr>
                <td class="table-primary"><b>1.ASESMEN AWAL</b></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>ASESMEN AWAL MEDIS</td>
                <td>Dokter IGD</td>
                <td colspan="3" align="center">
                
                  <select name="form_as_igd_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_igd = 0;
					while($cpf_form_no_igd <= 3){
						if($cpf_vcform01_sww['form_as_igd_01']==$cpf_form_no_igd){
						echo"<option value=$cpf_form_no_igd selected>$cpf_form_no_igd</option>";	
						}else{
						echo"<option value=$cpf_form_no_igd>$cpf_form_no_igd</option>";	
						}
					$cpf_form_no_igd++; } 
				
				?>

                </select>
                </td>
                <td>Pasien Masuk Melalui IGD</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Dokter Spesialis</td>
                 <td colspan="3" align="center">
                
                  <select name="form_as_spes_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_spes = 0;
					while($cpf_form_no_spes <= 3){
						if($cpf_vcform01_sww['form_as_spes_01']==$cpf_form_no_spes){
						echo"<option value=$cpf_form_no_spes selected>$cpf_form_no_spes</option>";	
						}else{
						echo"<option value=$cpf_form_no_spes>$cpf_form_no_spes</option>";	
						}
					$cpf_form_no_spes++; } 
				
				?>
                </select>
                </td>
                <td>Pasien Masuk Melalui RJ</td>
              </tr>
              <tr>
                <td>-</td>
                <td>-</td>
                <td colspan="3">
                  <!-- POINT ASSESMEN AWAL MEDIS -->
                  <?PHP 
                      #POINT COUNTING
                     if($cpf_vcform01_sww['form_as_igd_01']=="0"){
                        $POINT_IGD_01 = 0 ;
                     }else{
                      $POINT_IGD_01 = 1 ;
                     }
                     if($cpf_vcform01_sww['form_as_spes_01']=="0"){
                      $POINT_SPES_01 = 0 ;
                   }else{
                    $POINT_SPES_01 = 1 ;
                   }
                    #COUNTING
                    $IGD_CN_01 = $POINT_IGD_01 + $POINT_SPES_01;
                  ?>
                  POINT <span class="badge bg-warning"><?PHP echo $IGD_CN_01; ?>
                  <!-- -->
                </td>
                <td>-</td>
              </tr>
              <tr>
                <td>ASESMEN AWAL KEPERAWATAN</td>
                <td><p>Perawat Primer: Kondisi Umum, Tingkat kesadaran, tanda-tanda  vital, riwayat alergi, skrining gizi,nyeri, status fungsional, risiko jatuh, kebutuhan  edukasi dan budaya</p></td>
                  <td colspan="3" align="center">
                
                  <select name="form_as_kdsu_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_kdsu = 0;
					while($cpf_form_no_kdsu <= 3){
						if($cpf_vcform01_sww['form_as_kdsu_01']==$cpf_form_no_kdsu){
						echo"<option value=$cpf_form_no_kdsu selected>$cpf_form_no_kdsu</option>";	
						}else{
						echo"<option value=$cpf_form_no_kdsu>$cpf_form_no_kdsu</option>";	
						}
					$cpf_form_no_kdsu++; } 
				
				?>
                </select>
                </td>
                <td>Dilanjutkan dengan asesmen bio,psiko, sosial, spiritual dan budaya</td>
            </tr>
            <tr>
                <td>-</td>
                <td>-</td>
                <td colspan="3">
                  <!-- POINT ASESMEN KEPERAWATAN -->
                  <?PHP 
                      #POINT COUNTING
                     if($cpf_vcform01_sww['form_as_kdsu_01']=="0"){
                        $POINT_KDSU_01 = 0 ;
                     }else{
                      $POINT_KDSU_01 = 1 ;
                     }
                  ?>
                  POINT <span class="badge bg-warning"><?PHP echo $POINT_KDSU_01; ?>
                  <!-- -->
                </td>
                <td>-</td>
              </tr>
              <tr class="table-dark">
                <td colspan="6">&nbsp;</td>
              </tr>
              <tr>
                <td class="table-primary"><b>2.LABORATORIUM</b></td>
                <td>CT-BT</td>
                <td colspan="3" align="center">
                
                  <select name="form_lab_ctbt_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_ctbt = 0;
					while($cpf_form_no_ctbt <= 3){
						if($cpf_vcform01_sww['form_lab_ctbt_01']==$cpf_form_no_ctbt){
						echo"<option value=$cpf_form_no_ctbt selected>$cpf_form_no_ctbt</option>";	
						}else{
						echo"<option value=$cpf_form_no_ctbt>$cpf_form_no_ctbt</option>";	
						}
					$cpf_form_no_ctbt++; } 
				
				?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Darah Rutin - NLR</td>
                <td colspan="3" align="center">
                
                  <select name="form_lab_nlr_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_nlr = 0;
					while($cpf_form_no_nlr <= 3){
						if($cpf_vcform01_sww['form_lab_nlr_01']==$cpf_form_no_nlr){
						echo"<option value=$cpf_form_no_nlr selected>$cpf_form_no_nlr</option>";	
						}else{
						echo"<option value=$cpf_form_no_nlr>$cpf_form_no_nlr</option>";	
						}
					$cpf_form_no_nlr++; } 
				
				?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>GDS</td>
                  <td colspan="3" align="center">
                
                  <select name="form_lab_gds_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_gds = 1;
					while($cpf_form_no_gds<= 3){
						if($cpf_vcform01_sww['form_lab_gds_01']==$cpf_form_no_gds){
						echo"<option value=$cpf_form_no_gds selected>$cpf_form_no_gds</option>";	
						}else{
						echo"<option value=$cpf_form_no_gds>$cpf_form_no_gds</option>";	
						}
					$cpf_form_no_gds++; } 
				
				?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Swab Antigen</td>
                <td colspan="3" align="center">
                
                  <select name="form_lab_swab_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_swab = 1;
					while($cpf_form_no_swab<= 3){
						if($cpf_vcform01_sww['form_lab_swab_01']==$cpf_form_no_swab){
						echo"<option value=$cpf_form_no_swab selected>$cpf_form_no_swab</option>";	
						}else{
						echo"<option value=$cpf_form_no_swab>$cpf_form_no_swab</option>";	
						}
					$cpf_form_no_swab++; } 
				
				?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>-</td>
                <td>-</td>
                <td colspan="3">
                  <!-- POINT LABORATORIUM -->
                  <?PHP 
                      #POINT COUNTING
                     if($cpf_vcform01_sww['form_lab_ctbt_01']=="0"){
                        $POINT_CTBT_01 = 0 ;
                     }else{
                      $POINT_CTBT_01 = 1 ;
                     }
                     if($cpf_vcform01_sww['form_lab_nlr_01']=="0"){
                        $POINT_NLR_01 = 0 ;
                     }else{
                      $POINT_NLR_01 = 1 ;
                     }
                     if($cpf_vcform01_sww['form_lab_gds_01']=="0"){
                      $POINT_GDS_01 = 0 ;
                   }else{
                    $POINT_GDS_01 = 1 ;
                   }
                   if($cpf_vcform01_sww['form_lab_swab_01']=="0"){
                    $POINT_SWAB_01 = 0 ;
                 }else{
                  $POINT_SWAB_01 = 1 ;
                 }
                  #COUNTING
                  $CN_LAB_01 = $POINT_CTBT_01 + $POINT_NLR_01 + $POINT_GDS_01  + $POINT_SWAB_01
                  ?>

                  POINT <span class="badge bg-warning"><?PHP echo $CN_LAB_01; ?>
                  <!-- -->
                </td>
                <td>-</td>
              </tr>		
              <tr>
                <td colspan="6" class="table-dark">&nbsp;</td>
              </tr>
              <tr>
                <td class="table-primary"><b>3.RADIOLOGI / IMAGING</b></td>
                <td>ROTGEN THORAX</td>
                <td colspan="3">
                <select name="form_rad_thorax_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_thorax = 1;
					while($cpf_form_no_thorax<= 3){
						if($cpf_vcform01_sww['form_rad_thorax_01']==$cpf_form_no_thorax){
						echo"<option value=$cpf_form_no_thorax selected>$cpf_form_no_thorax</option>";	
						}else{
						echo"<option value=$cpf_form_no_thorax>$cpf_form_no_thorax</option>";	
						}
					$cpf_form_no_thorax++; } 
				
				?>
                </select>
                </td>
                <td>Usai di atas &gt;40th</td>
              </tr>
              <tr>
                <td>-</td>
                <td>-</td>
                <td colspan="3">
                  <!-- POINT ASESMEN KEPERAWATAN -->
                  <?PHP 
                      #POINT COUNTING
                     if($cpf_vcform01_sww['form_rad_thorax_01']=="0"){
                        $POINT_THORAX_01 = 0 ;
                     }else{
                      $POINT_THORAX_01 = 1 ;
                     }
                  ?>
                  POINT <span class="badge bg-warning"><?PHP echo $POINT_THORAX_01; ?>
                  <!-- -->
                </td>
                <td>-</td>
              </tr>		
              <tr>
                <td colspan="6" class="table-dark">&nbsp;</td>
              </tr>
              <tr>
                <td class="table-primary"><b>4.KONSULTASI</b></td>
                <td>&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="6" class="table-dark">&nbsp;</td>
              </tr>
              <tr>
                <td class="table-primary"><b>5.Asesmen Lanjutan</b></td>
                <td>&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>ASSESMEN MEDIS</td>
                <td>Dokter DPJP</td>
               <td colspan="3">
                <select name="form_as02_dpjp_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_dpjp = 1;
					while($cpf_form_no_dpjp<= 3){
						if($cpf_vcform01_sww['form_as02_dpjp_01']==$cpf_form_no_dpjp){
						echo"<option value=$cpf_form_no_dpjp selected>$cpf_form_no_dpjp</option>";	
						}else{
						echo"<option value=$cpf_form_no_dpjp>$cpf_form_no_dpjp</option>";	
						}
					$cpf_form_no_dpjp++; } 
				
				?>
                </select>
                </td>
                <td>Visite Harian/Follow Up</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Dokter Non DPJP/dr Ruangan</td>
               <td colspan="3">
                <select name="form_as02_ndpjp_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_ndpjp = 1;
					while($cpf_form_no_ndpjp<= 3){
						if($cpf_vcform01_sww['form_as02_ndpjp_01']==$cpf_form_no_ndpjp){
						echo"<option value=$cpf_form_no_ndpjp selected>$cpf_form_no_ndpjp</option>";	
						}else{
						echo"<option value=$cpf_form_no_ndpjp>$cpf_form_no_ndpjp</option>";	
						}
					$cpf_form_no_ndpjp++; } 
				
				?>
                </select>
                </td>
                <td>Atas Indikasi/Emergency</td>
              </tr>
              <tr>
                <td>-</td>
                <td>-</td>
                <td colspan="3">
                  <!-- POINT dpjp -->
                  <?PHP 
                      #POINT COUNTING
                     if($cpf_vcform01_sww['form_as02_dpjp_01']=="0"){
                        $POINT_DPJP_01 = 0 ;
                     }else{
                      $POINT_DPJP_01 = 1 ;
                     }
                     if($cpf_vcform01_sww['form_as02_ndpjp_01']=="0"){
                      $POINT_NDPJP_01 = 0 ;
                   }else{
                    $POINT_NDPJP_01 = 1 ;
                   }
                    #COUTING
                    $CN_POINT_DPJP_01 = $POINT_DPJP_01 + $POINT_NDPJP_01;
                  ?>
                  POINT <span class="badge bg-warning"><?PHP echo $CN_POINT_DPJP_01; ?>
                  <!-- -->
                </td>
                <td>-</td>
              </tr>	
              <tr>
                <td>ASSESMEN KEPERAWATAN</td>
                <td>Perawat Penanggung Jawab</td>
         	   <td colspan="3">
                <select name="form_as02_pj_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_pj = 0;
					while($cpf_form_no_pj<= 3){
						if($cpf_vcform01_sww['form_as02_pj_01']==$cpf_form_no_pj){
						echo"<option value=$cpf_form_no_pj selected>$cpf_form_no_pj</option>";	
						}else{
						echo"<option value=$cpf_form_no_pj>$cpf_form_no_pj</option>";	
						}
					$cpf_form_no_pj++; } 
				
				?>
                </select>
                </td>
                <td>Dilakukan dalam 3 shift;</td>
              </tr>
              <tr>
                <td>-</td>
                <td>-</td>
                <td colspan="3">
                  <!-- POINT ASESMEN KEPERAWATAN  02-->
                  <?PHP 
                      #POINT COUNTING
                     if($cpf_vcform01_sww['form_as02_pj_01']=="0"){
                        $POINT_PJ_01 = 0 ;
                     }else{
                      $POINT_PJ_01 = 1 ;
                     }
                      
                  ?>
                  POINT <span class="badge bg-warning"><?PHP echo  $POINT_PJ_01; ?>
                  <!-- -->
                </td>
                <td>-</td>
              </tr>		
					
              <tr>
                <td>ASSESMEN GIZI</td>
                <td>Ahli gizi melakukan  pengkajian  gizi lanjut dengan menggunakan form pengkajian gizi dan mendokumentasikan dalam  ADIME</td>
                   <td colspan="3">
                <select name="form_as02_pj_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_pj = 1;
					while($cpf_form_no_pj<= 3){
						if($cpf_vcform01_sww['form_as02_pj_01']==$cpf_form_no_pj){
						echo"<option value=$cpf_form_no_pj selected>$cpf_form_no_pj</option>";	
						}else{
						echo"<option value=$cpf_form_no_pj>$cpf_form_no_pj</option>";	
						}
					$cpf_form_no_pj++; } 
				
				?>
                </select>
                </td>
                <td>Lihat resiko mal nutrisi melalui skrining gizi dan mengkaji data antropometri, biokimia, fisik/klinis , riwayat personal. Asesmen dilakukan dalam waktu 48 jam</td>
              </tr>

              <tr>
                <td>-</td>
                <td>-</td>
                <td colspan="3">
                  <!-- POINT ASESMEN GIZI  -->
                  <?PHP 
                      #POINT COUNTING
                     if($cpf_vcform01_sww['form_as02_gizi_01']=="0"){
                        $POINT_GIZI_01 = 0 ;
                     }else{
                      $POINT_GIZI_01 = 1 ;
                     }
                  ?>
                  POINT <span class="badge bg-warning"><?PHP echo $POINT_GIZI_01; ?>
                  <!-- -->
                </td>
                <td>-</td>
              </tr>	

              <tr>
                <td>ASSESMEN FARMASI</td>
                <td>Telaah Resep</td>
                <td colspan="3">
                <select name="form_as02_resep_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_resep = 1;
					while($cpf_form_no_resep<= 3){
						if($cpf_vcform01_sww['form_as02_resep_01']==$cpf_form_no_resep){
						echo"<option value=$cpf_form_no_resep selected>$cpf_form_no_resep</option>";	
						}else{
						echo"<option value=$cpf_form_no_resep>$cpf_form_no_resep</option>";	
						}
					$cpf_form_no_resep++; } 
				
				?>
                </select>
                </td>
                <td rowspan="2">Dilanjutkan  dengan intervensi farmasi yang sesuai hasil telaah dan rekonsiliasi</td>
              </tr>
             
              <tr>
                <td>&nbsp;</td>
                <td><p>Rekonsiliasi Resep</p></td>
                 <td colspan="3">
                <select name="form_as02_reresep_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_reresep = 0;
					while($cpf_form_no_reresep<= 3){
						if($cpf_vcform01_sww['form_as02_reresep_01']==$cpf_form_no_reresep){
						echo"<option value=$cpf_form_no_reresep selected>$cpf_form_no_reresep</option>";	
						}else{
						echo"<option value=$cpf_form_no_reresep>$cpf_form_no_reresep</option>";	
						}
					$cpf_form_no_reresep++; } 
				
				?>
                </select>
                </td>
              </tr>
              
              <tr>
                <td>-</td>
                <td>-</td>
                <td colspan="3">
                  <!-- POINT ASESMEN FARMASi -->
                  <?PHP 
                      #POINT COUNTING
                     if($cpf_vcform01_sww['form_as02_resep_01']=="0"){
                        $POINT_RESEP_01 = 0 ;
                     }else{
                      $POINT_RESEP_01 = 1 ;
                     }
                     if($cpf_vcform01_sww['form_as02_reresep_01']=="0"){
                      $POINT_RERESEP_01 = 0 ;
                   }else{
                    $POINT_RERESEP_01 = 1 ;
                   }
                   #COUNTING
                   $CN_POINT_RESEP_01 = $POINT_RESEP_01 + $POINT_RERESEP_01;
                  ?>
                  POINT <span class="badge bg-warning"><?PHP echo $CN_POINT_RESEP_01; ?>
                  <!-- -->
                </td>
                <td>-</td>
              </tr>	
              <tr>
                <td colspan="6" class="table-dark">&nbsp;</td>
              </tr>
              <tr>
                <td class="table-primary"><b>6.DIAGNOSIS</b></td>
                <td>&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>DIAGNOSIS MEDIS</td>
                <td>&nbsp;</td>
                 <td colspan="3">
                <select name="form_dg_medis_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_medis = 0;
					while($cpf_form_no_medis<= 3){
						if($cpf_vcform01_sww['form_dg_medis_01']==$cpf_form_no_medis){
						echo"<option value=$cpf_form_no_medis selected>$cpf_form_no_medis</option>";	
						}else{
						echo"<option value=$cpf_form_no_medis>$cpf_form_no_medis</option>";	
						}
					$cpf_form_no_medis++; } 
				
				?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>-</td>
                <td>-</td>
                <td colspan="3">
                  <!-- POINT DIAGNOSIS MEDIS -->
                  <?PHP 
                      #POINT COUNTING
                     if($cpf_vcform01_sww['form_dg_medis_01']=="0"){
                        $POINT_MEDIS_01 = 0 ;
                     }else{
                      $POINT_MEDIS_01 = 1 ;
                     }
                  ?>
                  POINT <span class="badge bg-warning"><?PHP echo $POINT_MEDIS_01; ?>
                  <!-- -->
                </td>
                <td>-</td>
              </tr>		
              <tr>
                <td>DIAGNOSIS KEPERAWATAN</td>
                <td>Kode : 000132 Nyeri Akut</td>
                 <td colspan="3">
                <select name="form_dg_kpr_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_kpr = 0;
					while($cpf_form_no_kpr<= 3){
						if($cpf_vcform01_sww['form_dg_kpr_01']==$cpf_form_no_kpr){
						echo"<option value=$cpf_form_no_kpr selected>$cpf_form_no_kpr</option>";	
						}else{
						echo"<option value=$cpf_form_no_kpr>$cpf_form_no_kpr</option>";	
						}
					$cpf_form_no_kpr++; } 
				
				?>
                </select>
                </td>
                <td rowspan="2">Masalah keperawatan yang dijumpai setiap hari. Dibuat oleh perawat penanggung jawab</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Kode : 00004 Resiko Infeksi</td>
              <td colspan="3">
                <select name="form_dg_kpr02_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
              $cpf_form_no_kpr02 = 0;
              while($cpf_form_no_kpr02<= 3){
                if($cpf_vcform01_sww['form_dg_kpr02_01']==$cpf_form_no_kpr02){
                echo"<option value=$cpf_form_no_kpr02 selected>$cpf_form_no_kpr02</option>";	
                }else{
                echo"<option value=$cpf_form_no_kpr02>$cpf_form_no_kpr02</option>";	
                }
              $cpf_form_no_kpr02++; } 
				
				?>
                </select>
                </td>
              </tr>
              
              <tr>
                <td>-</td>
                <td>-</td>
                <td colspan="3">
                  <!-- POINT DIAGNOSIS NYERI AKUT *& INFEKSI -->
                  <?PHP 
                      #POINT COUNTING
                     if($cpf_vcform01_sww['form_dg_kpr_01']=="0"){
                        $POINT_KPR_01 = 0 ;
                     }else{
                      $POINT_KPR_01 = 1 ;
                     }
                     if($cpf_vcform01_sww['form_dg_kpr02_01']=="0"){
                      $POINT_KPR02_01 = 0 ;
                   }else{
                    $POINT_KPR02_01 = 1 ;
                   }
                   #COUTNING
                   $CN_POINT_KPR_01 = $POINT_KPR_01 +  $POINT_KPR02_01;
                  ?>
                  POINT <span class="badge bg-warning"><?PHP echo  $CN_POINT_KPR_01; ?>
                  <!-- -->
                </td>
                <td>-</td>
              </tr>	
              <tr>
                <td>DIAGNOSIS GIZI</td>
                <td>Prediksi suboptimal asupan energi berkaitan rencana tindakan bedah/oprasi ditandai dengan asupan energi lebih rendah dari kebutuhan (NI 1.4)</td>
                 <td colspan="3">
                <select name="form_dg_gizi_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
                $cpf_form_no_gizi = 0;
                while($cpf_form_no_gizi<= 3){
                  if($cpf_vcform01_sww['form_dg_gizi_01']==$cpf_form_no_gizi){
                    echo"<option value=$cpf_form_no_gizi selected>$cpf_form_no_gizi</option>";	
                  }else{
                    echo"<option value=$cpf_form_no_gizi>$cpf_form_no_gizi</option>";	
                  }
                $cpf_form_no_gizi++; } 
				
				      ?>
                </select>
                </td>
                <td>Sesuai dengan data asesmen, kemungkinan  ada diagnosis lain atau diagnosis berubah selama perawatan</td>
              </tr>
              <tr>
                <td>-</td>
                <td>-</td>
                <td colspan="3">
                  <!-- POINT DIAGNOSIS GIZI -->
                  <?PHP 
                      #POINT COUNTING
                     if($cpf_vcform01_sww['form_dg_gizi_01']=="0"){
                        $POINT_GIZI_02 = 0 ;
                     }else{
                      $POINT_GIZI_02 = 1 ;
                     }
                  ?>
                  POINT <span class="badge bg-warning"><?PHP echo $POINT_GIZI_02; ?>
                  <!-- -->
                </td>
                <td>-</td>
              </tr>	
              <tr>
                <td class="table-dark">&nbsp;</td>
                <td class="table-dark">&nbsp;</td>
                <td class="table-dark">&nbsp;</td>
                <td class="table-dark">&nbsp;</td>
                <td class="table-dark">&nbsp;</td>
                <td class="table-dark">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="6" class="table-dark">&nbsp;</td>
              </tr>
              <tr>
                <td class="table-primary"><b>8.DISCHARGE PLANNING</b></td>
                <td>Informasi tentang aktivitas yang dapat dilakukan sesuai dengan tingkat kondisi pasien</td>
        		<td colspan="3">
                <select name="form_dp_aktivitas_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_aktivitas = 0;
					while($cpf_form_no_aktivitas<= 3){
						if($cpf_vcform01_sww['form_dp_aktivitas_01']==$cpf_form_no_aktivitas){
							echo"<option value=$cpf_form_no_aktivitas selected>$cpf_form_no_aktivitas</option>";	
						}else{
							echo"<option value=$cpf_form_no_aktivitas>$cpf_form_no_aktivitas</option>";	
						}
					$cpf_form_no_aktivitas++; } 
				
				?>
                </select>
                </td>
                <td rowspan="4" style="padding-top:60px;">Program Pendidikan Pasien dan Keluarga</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Terapi yang diberikan mliputi kegunaan obat, dosis dan efek samping</td>
               <td colspan="3">
                <select name="form_dp_terapi_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_terapi = 0;
					while($cpf_form_no_terapi<= 3){
						if($cpf_vcform01_sww['form_dp_terapi_01']==$cpf_form_no_terapi){
							echo"<option value=$cpf_form_no_terapi selected>$cpf_form_no_terapi</option>";	
						}else{
							echo"<option value=$cpf_form_no_terapi>$cpf_form_no_terapi</option>";	
						}
					$cpf_form_no_terapi++; } 
				
				?>
                </select>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Menjelaskan gejala kekambuhan penyakit dan hal yang dilakukan untuk mengatasi gejala yang muncul</td>
               <td colspan="3">
                <select name="form_dp_gejala_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
                $cpf_form_no_gejala = 0;
                while($cpf_form_no_gejala<= 3){
                  if($cpf_vcform01_sww['form_dp_gejala_01']==$cpf_form_no_gejala){
                    echo"<option value=$cpf_form_no_gejala selected>$cpf_form_no_gejala</option>";	
                  }else{
                    echo"<option value=$cpf_form_no_gejala>$cpf_form_no_gejala</option>";	
                  }
                $cpf_form_no_gejala++; } 
				
				?>
                </select>
                </td>
              </tr>
              
              <tr>
                <td>&nbsp;</td>
                <td>Diet yang dapat dikonsumsi selama pemulihan kondisi yaitu diet lunak yang tidak merangsang dan tinggi energi serta protein</td>
               <td colspan="3">
                <select name="form_dp_diet_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_diet = 0;
					while($cpf_form_no_diet<= 3){
						if($cpf_vcform01_sww['form_dp_diet_01']==$cpf_form_no_diet){
							echo"<option value=$cpf_form_no_diet selected>$cpf_form_no_diet</option>";	
						}else{
							echo"<option value=$cpf_form_no_diet>$cpf_form_no_diet</option>";	
						}
					$cpf_form_no_diet++; } 
				
				?>
                </select>
                </td>
              </tr>
              
              <tr>
                <td>-</td>
                <td>-</td>
                <td colspan="3">
                  <!-- POINT Discharge Planing-->
                  <?PHP 
                      #POINT COUNTING
                     if($cpf_vcform01_sww['form_dp_aktivitas_01']=="0"){
                        $POINT_AKTIVITAS_01 = 0 ;
                     }else{
                      $POINT_AKTIVITAS_01 = 1 ;
                     }
                     if($cpf_vcform01_sww['form_dp_terapi_01']=="0"){
                      $POINT_TERAPI_01 = 0 ;
                   }else{
                    $POINT_TERAPI_01 = 1 ;
                      }
                      if($cpf_vcform01_sww['form_dp_gejala_01']=="0"){
                        $POINT_GEJALA_01 = 0 ;
                    }else{
                      $POINT_GEJALA_01 = 1 ;
                    }
                    if($cpf_vcform01_sww['form_dp_diet_01']=="0"){
                      $POINT_DIET_01 = 0 ;
                    }else{
                    $POINT_DIET_01 = 1 ;
                  }
                  #COUNTING
                  $CN_POINT_DP_01 = $POINT_AKTIVITAS_01 + $POINT_TERAPI_01 + $POINT_GEJALA_01 + $POINT_DIET_01;

                  ?>
                  POINT <span class="badge bg-warning"><?PHP echo $CN_POINT_DP_01; ?>
                  <!-- -->
                </td>
                <td>-</td>
              </tr>		
              
              <tr>
                <td colspan="6" class="table-dark">&nbsp;</td>
              </tr>
              
              <tr>
                <td height="40" class="table-primary"><b>8.EDUKASI TERINTEGRASI</b></td>
                <td>&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td height="40"><p>EDUKASI/INFORMASI MEDIS</p></td>
                <td>Penjelasan Diagnosis</td>
               <td colspan="3">
                <select name="form_et_diag_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_diag = 0;
					while($cpf_form_no_diag<= 3){
						if($cpf_vcform01_sww['form_et_diag_01']==$cpf_form_no_diag){
							echo"<option value=$cpf_form_no_diag selected>$cpf_form_no_diag</option>";	
						}else{
							echo"<option value=$cpf_form_no_diag>$cpf_form_no_diag</option>";	
						}
					$cpf_form_no_diag++; } 
				
				?>
                </select>
                </td>
                <td rowspan="3">Oleh semua pemberi asuhan berdasarkan kebutuhan dan juga berdasarkan Discharge Planning.
                Pengisian formulir informasi dan edukasi terintergrasi oleh pasien dan atau keluarga
				</td>
              </tr>
              
              <tr>
                <td height="21">&nbsp;</td>
                <td>Rencana Terapi</td>
               <td colspan="3">
                <select name="form_et_terapi_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_terapi = 0;
					while($cpf_form_no_terapi<= 3){
						if($cpf_vcform01_sww['form_et_terapi_01']==$cpf_form_no_terapi){
							echo"<option value=$cpf_form_no_terapi selected>$cpf_form_no_terapi</option>";	
						}else{
							echo"<option value=$cpf_form_no_terapi>$cpf_form_no_terapi</option>";	
						}
					$cpf_form_no_terapi++; } 
				
				?>
                </select>
                </td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Informed Consent</td>
                  <td colspan="3">
                <select name="form_et_ic_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_ic = 0;
					while($cpf_form_no_ic<= 3){
						if($cpf_vcform01_sww['form_et_ic_01']==$cpf_form_no_ic){
							echo"<option value=$cpf_form_no_ic selected>$cpf_form_no_ic</option>";	
						}else{
							echo"<option value=$cpf_form_no_ic>$cpf_form_no_ic</option>";	
						}
					$cpf_form_no_ic++; } 
				
				?>
                </select>
                </td>
              </tr>
              <tr>
                <td>-</td>
                <td>-</td>
                <td colspan="3">
                  <!-- POINT EDUKASI Terintegrasi -->
                  <?PHP 
                      #POINT COUNTING
                     if($cpf_vcform01_sww['form_et_diag_01']=="0"){
                        $POINT_DIAG_01 = 0 ;
                     }else{
                      $POINT_DIAG_01 = 1 ;
                     }
                     if($cpf_vcform01_sww['form_et_terapi_01']=="0"){
                      $POINT_TERAPI_02 = 0 ;
                   }else{
                    $POINT_TERAPI_02 = 1 ;
                   }
                   if($cpf_vcform01_sww['form_et_ic_01']=="0"){
                    $POINT_IC_01 = 0 ;
                 }else{
                  $POINT_IC_01 = 1 ;
                 }
                  #COUNTING
                  $CN_POINT_DIAG_01 = $POINT_DIAG_01 + $POINT_TERAPI_02 + $POINT_IC_01;
                  ?>
                  POINT <span class="badge bg-warning"><?PHP echo $CN_POINT_DIAG_01; ?>
                  <!-- -->
                </td>
                <td>-</td>
              </tr>	
              <tr>
                <td height="21">EDUKASI DAN KONSELING GIZI</td>
                <td>Diet pra dan paska bedah, Diet Cair, saring lunak, biasa bertahap, tinggi Energi dan Tinggi Protein selama pemulihan.</td>
              	 <td colspan="3">
                <select name="form_et_diet_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_et_diet = 0;
					while($cpf_form_no_et_diet<= 3){
						if($cpf_vcform01_sww['form_et_diet_01']==$cpf_form_no_et_diet){
							echo"<option value=$cpf_form_no_et_diet selected>$cpf_form_no_et_diet</option>";	
						}else{
							echo"<option value=$cpf_form_no_et_diet>$cpf_form_no_et_diet</option>";	
						}
					$cpf_form_no_et_diet++; } 
				
				?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>-</td>
                <td>-</td>
                <td colspan="3">
                  <!-- POINT DIET ET -->
                  <?PHP 
                      #POINT COUNTING
                     if($cpf_vcform01_sww['form_et_diet_01']=="0"){
                        $POINT_DIET_02 = 0 ;
                     }else{
                      $POINT_DIET_02 = 1 ;
                     }
                  ?>
                  POINT <span class="badge bg-warning"><?PHP echo  $POINT_DIET_02; ?>
                  <!-- -->
                </td>
                <td>-</td>
              </tr>	
              <tr>
                <td height="21">EDUKASI KEPERAWATAN</td>
                <td>Edukasi pre operasi</td>
               <td colspan="3">
                <select name="form_et_preop_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_et_preop = 0;
					while($cpf_form_no_et_preop<= 3){
						if($cpf_vcform01_sww['form_et_preop_01']==$cpf_form_no_et_preop){
							echo"<option value=$cpf_form_no_et_preop selected>$cpf_form_no_et_preop</option>";	
						}else{
							echo"<option value=$cpf_form_no_et_preop>$cpf_form_no_et_preop</option>";	
						}
					$cpf_form_no_et_preop++; } 
				
				?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Diet selama perawatan</td>
         <td colspan="3">
                <select name="form_et_diet02_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_et_diet02 = 0;
					while($cpf_form_no_et_diet02<= 3){
						if($cpf_vcform01_sww['form_et_diet02_01']==$cpf_form_no_et_diet02){
							echo"<option value=$cpf_form_no_et_diet02 selected>$cpf_form_no_et_diet02</option>";	
						}else{
							echo"<option value=$cpf_form_no_et_diet02>$cpf_form_no_et_diet02</option>";	
						}
					$cpf_form_no_et_diet02++; } 
				
				?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Tanda-Tanda Infeksi</td>
               <td colspan="3">
                <select name="form_et_infeksi_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_et_infeksi = 0;
					while($cpf_form_no_et_infeksi<= 3){
						if($cpf_vcform01_sww['form_et_infeksi_01']==$cpf_form_no_et_infeksi){
							echo"<option value=$cpf_form_no_et_infeksi selected>$cpf_form_no_et_infeksi</option>";	
						}else{
							echo"<option value=$cpf_form_no_et_infeksi>$cpf_form_no_et_infeksi</option>";	
						}
					$cpf_form_no_et_infeksi++; } 
				
				?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>-</td>
                <td>-</td>
                <td colspan="3">
                  <!-- POINT Pre Operasi ET -->
                  <?PHP 
                      #POINT COUNTING
                     if($cpf_vcform01_sww['form_et_preop_01']=="0"){
                        $POINT_PREOP_01 = 0 ;
                     }else{
                      $POINT_PREOP_01 = 1 ;
                     }
                     if($cpf_vcform01_sww['form_et_diet02_01']=="0"){
                      $POINT_DIET02_01 = 0 ;
                   }else{
                    $POINT_DIET02_01 = 1 ;
                   }
                   if($cpf_vcform01_sww['form_et_infeksi_01']=="0"){
                    $POINT_INFEKSI_01 = 0 ;
                 }else{
                  $POINT_INFEKSI_01 = 1 ;
                 }
                  #COUNTING
                  $CN_POINT_PREOP_01 = $POINT_PREOP_01 + $POINT_DIET02_01 + $POINT_INFEKSI_01;
                  ?>
                  POINT <span class="badge bg-warning"><?PHP echo $CN_POINT_PREOP_01; ?>
                  <!-- -->
                </td>
                <td>-</td>
              </tr>		
					
              <tr>
                <td height="21">EDUKASI FARMASI</td>
                <td>Edukasi awal cara penggunaan obat yang tepat</td>
        		<td colspan="3">
                <select name="form_et_obat_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_et_obat = 0;
					while($cpf_form_no_et_obat<= 3){
						if($cpf_vcform01_sww['form_et_obat_01']==$cpf_form_no_et_obat){
							echo"<option value=$cpf_form_no_et_obat selected>$cpf_form_no_et_obat</option>";	
						}else{
							echo"<option value=$cpf_form_no_et_obat>$cpf_form_no_et_obat</option>";	
						}
					$cpf_form_no_et_obat++; } 
				
				?>
                </select>
                </td>
                <td rowspan="3">Meningkatkan kepatuhan pasien meminum/menggunakan obat</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Evaluasi kepatuhan pasien dalam penggunaan obat </td>
              <td colspan="3">
                <select name="form_et_psnobat_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_et_psnobat = 0;
					while($cpf_form_no_et_psnobat<= 3){
						if($cpf_vcform01_sww['form_et_psnobat_01']==$cpf_form_no_et_psnobat){
							echo"<option value=$cpf_form_no_et_psnobat selected>$cpf_form_no_et_psnobat</option>";	
						}else{
							echo"<option value=$cpf_form_no_et_psnobat>$cpf_form_no_et_psnobat</option>";	
						}
					$cpf_form_no_et_psnobat++; } 
				
				?>
                </select>
                </td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Edukasi akhir cara penggunaan obat yang tepat. </td>
    			  <td colspan="3">
                <select name="form_et_gunaobat_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_et_gunaobat = 0;
					while($cpf_form_no_et_gunaobat<= 3){
						if($cpf_vcform01_sww['form_et_gunaobat_01']==$cpf_form_no_et_gunaobat){
							echo"<option value=$cpf_form_no_et_gunaobat selected>$cpf_form_no_et_gunaobat</option>";	
						}else{
							echo"<option value=$cpf_form_no_et_gunaobat>$cpf_form_no_et_gunaobat</option>";	
						}
					$cpf_form_no_et_gunaobat++; } 
				
				?>
                </select>
                </td>
              </tr>
              <tr>
                <td>-</td>
                <td>-</td>
                <td colspan="3">
                  <!-- POINT Obat ET -->
                  <?PHP 
                      #POINT COUNTING
                     if($cpf_vcform01_sww['form_et_obat_01']=="0"){
                        $POINT_OBAT_01 = 0 ;
                     }else{
                      $POINT_OBAT_01 = 1 ;
                     }
                     if($cpf_vcform01_sww['form_et_psnobat_01']=="0"){
                      $POINT_PSNOBAT_01 = 0 ;
                    }else{
                      $POINT_PSNOBAT_01 = 1 ;
                    }
                    if($cpf_vcform01_sww['form_et_gunaobat_01']=="0"){
                      $POINT_GUNAOBAT_01 = 0 ;
                   }else{
                    $POINT_GUNAOBAT_01 = 1 ;
                   }
                   #COUNTING
                   $CN_POINT_OBAT_01 = $POINT_OBAT_01 + $POINT_PSNOBAT_01 + $POINT_GUNAOBAT_01;
                  ?>
                  POINT <span class="badge bg-warning"><?PHP echo $CN_POINT_OBAT_01; ?>
                  <!-- -->
                </td>
                <td>-</td>
              </tr>	
              <tr>
                <td height="21" colspan="6" class="table-dark">&nbsp;</td>
              </tr>
             
              <tr>
                <td height="21" class="table-primary">PENGISIAN FORMULIR INFORMASI DAN EDUKASI TERINTEGRASI</td>
                <td>Lembar Edukasi Terintegrasi</td>
              <td colspan="3">
                <select name="form_fet_let_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_fet_let_01 = 0;
					while($cpf_form_no_fet_let_01<= 3){
						if($cpf_vcform01_sww['form_fet_let_01']==$cpf_form_no_fet_let_01){
							echo"<option value=$cpf_form_no_fet_let_01 selected>$cpf_form_no_fet_let_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_fet_let_01>$cpf_form_no_fet_let_01</option>";	
						}
					$cpf_form_no_fet_let_01++; } 
				
				?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>-</td>
                <td>-</td>
                <td colspan="3">
                  <!-- POINT FORM EDUKASI FET -->
                  <?PHP 
                      #POINT COUNTING
                     if($cpf_vcform01_sww['form_fet_let_01']=="0"){
                        $POINT_LET_01 = 0 ;
                     }else{
                      $POINT_LET_01 = 1 ;
                     }
                  ?>
                  POINT <span class="badge bg-warning"><?PHP echo $POINT_LET_01; ?>
                  <!-- -->
                </td>
                <td>-</td>
              </tr>		
              <tr>
                <td height="21" colspan="6" class="table-dark">&nbsp;</td>
              </tr>
              <tr>
                <td height="21" class="table-primary">TERAPI/MEDIKAMENTOSA</td>
                <td>&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">Injeksi</td>
                <td>Cefazolin 1 gr</td>
             <td colspan="3">
                <select name="form_trp_cef_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_trp_cef_01 = 0;
					while($cpf_form_no_trp_cef_01<= 3){
						if($cpf_vcform01_sww['form_trp_cef_01']==$cpf_form_no_trp_cef_01){
							echo"<option value=$cpf_form_no_trp_cef_01 selected>$cpf_form_no_trp_cef_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_trp_cef_01>$cpf_form_no_trp_cef_01</option>";	
						}
					$cpf_form_no_trp_cef_01++; } 
				
				?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Anti Nyeri</td>
               <td colspan="3">
                <select name="form_trp_an_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_trp_an_01 = 0;
					while($cpf_form_no_trp_an_01<= 3){
						if($cpf_vcform01_sww['form_trp_an_01']==$cpf_form_no_trp_an_01){
							echo"<option value=$cpf_form_no_trp_an_01 selected>$cpf_form_no_trp_an_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_trp_an_01>$cpf_form_no_trp_an_01</option>";	
						}
					$cpf_form_no_trp_an_01++; } 
				
				?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Ketorolac inj</td>
              <td colspan="3">
                <select name="form_trp_keto_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_trp_keto_01 = 0;
					while($cpf_form_no_trp_keto_01<= 3){
						if($cpf_vcform01_sww['form_trp_keto_01']==$cpf_form_no_trp_keto_01){
							echo"<option value=$cpf_form_no_trp_keto_01 selected>$cpf_form_no_trp_keto_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_trp_keto_01>$cpf_form_no_trp_keto_01</option>";	
						}
					$cpf_form_no_trp_keto_01++; } 
				
				?>
                </select>

                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Anti Muntah</td>
               <td colspan="3">
                <select name="form_trp_am_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_trp_am_01 = 0;
					while($cpf_form_no_trp_am_01<= 3){
						if($cpf_vcform01_sww['form_trp_am_01']==$cpf_form_no_trp_am_01){
							echo"<option value=$cpf_form_no_trp_am_01 selected>$cpf_form_no_trp_am_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_trp_am_01>$cpf_form_no_trp_am_01</option>";	
						}
					$cpf_form_no_trp_am_01++; } 
				
				?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Ondancetron inj/Ranitidin tab</td>
        		  <td colspan="3">
                <select name="form_trp_rt_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_trp_rt_01 = 0;
					while($cpf_form_no_trp_rt_01<= 3){
						if($cpf_vcform01_sww['form_trp_rt_01']==$cpf_form_no_trp_rt_01){
							echo"<option value=$cpf_form_no_trp_rt_01 selected>$cpf_form_no_trp_rt_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_trp_rt_01>$cpf_form_no_trp_rt_01</option>";	
						}
					$cpf_form_no_trp_rt_01++; } 
				
				?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>-</td>
                <td>-</td>
                <td colspan="3">
                  <!-- POINT TERAPI MEDIKAMETOSA -->
                  <?PHP 
                      #POINT COUNTING
                     if($cpf_vcform01_sww['form_trp_cef_01']=="0"){
                        $POINT_CEF_01 = 0 ;
                     }else{
                      $POINT_CEF_01 = 1 ;
                     }
                     if($cpf_vcform01_sww['form_trp_an_01']=="0"){
                      $POINT_AN_01 = 0 ;
                   }else{
                    $POINT_AN_01 = 1 ;
                   }
                   if($cpf_vcform01_sww['form_trp_keto_01']=="0"){
                    $POINT_KETO_01 = 0 ;
                    }else{
                      $POINT_KETO_01 = 1 ;
                    }
                    if($cpf_vcform01_sww['form_trp_am_01']=="0"){
                      $POINT_AM_01 = 0 ;
                  }else{
                    $POINT_AM_01 = 1 ;
                  }
                  if($cpf_vcform01_sww['form_trp_rt_01']=="0"){
                    $POINT_RT_01 = 0 ;
                }else{
                  $POINT_RT_01 = 1 ;
                }
                #COUNTING
                $CN_POINT_TRP_01 = $POINT_CEF_01 + $POINT_AN_01 + $POINT_KETO_01 + $POINT_AM_01 + $POINT_RT_01;

                  ?>
                  POINT <span class="badge bg-warning"><?PHP echo  $CN_POINT_TRP_01; ?>
                  <!-- -->
                </td>
                <td>-</td>
              </tr>	
              <tr>
                <td height="21">CAIRAN INFUS</td>
                <td>RL</td>
               <td colspan="3">
                <select name="form_trp_rp_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_trp_rl_01 = 0;
					while($cpf_form_no_trp_rl_01<= 3){
						if($cpf_vcform01_sww['form_trp_rl_01']==$cpf_form_no_trp_rl_01){
							echo"<option value=$cpf_form_no_trp_rl_01 selected>$cpf_form_no_trp_rl_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_trp_rl_01>$cpf_form_no_trp_rl_01</option>";	
						}
					$cpf_form_no_trp_rl_01++; } 
				
				?>
                </select>
                </td>
                <td>Varian</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Metronidazole 500 mg 3x1 tab  5 hari)</td>
                <td colspan="3">
                <select name="form_trp_met_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_trp_met_01 = 0;
					while($cpf_form_no_trp_met_01<= 3){
						if($cpf_vcform01_sww['form_trp_met_01']==$cpf_form_no_trp_met_01){
							echo"<option value=$cpf_form_no_trp_met_01 selected>$cpf_form_no_trp_met_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_met_met_01>$cpf_form_no_trp_met_01</option>";	
						}
					$cpf_form_no_trp_met_01++; } 
				
				?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Ranitidine 2x1 tab = 6</td>
                <td colspan="3">
                <select name="form_trp_ran_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_trp_ran_01 = 0;
					while($cpf_form_no_trp_ran_01<= 3){
						if($cpf_vcform01_sww['form_trp_ran_01']==$cpf_form_no_trp_ran_01){
							echo"<option value=$cpf_form_no_trp_ran_01 selected>$cpf_form_no_trp_ran_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_trp_ran_01>$cpf_form_no_trp_ran_01</option>";	
						}
					$cpf_form_no_trp_ran_01++; } 
				
				?>
                </select>
                </td>
                <td>Obat Pulang</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Paracetamol 500 mg 3x1 tab = 10</td>
                <td colspan="3">
                <select name="form_trp_para_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_trp_para_01 = 0;
					while($cpf_form_no_trp_para_01<= 3){
						if($cpf_vcform01_sww['form_trp_para_01']==$cpf_form_no_trp_para_01){
							echo"<option value=$cpf_form_no_trp_para_01 selected>$cpf_form_no_trp_para_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_trp_para_01>$cpf_form_no_trp_para_01</option>";	
						}
					$cpf_form_no_trp_para_01++; } 
				
				?>
                </select>
                </td>
                <td>Obat Pulang</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>PK/antiseptik</td>
                <td colspan="3">
                <select name="form_trp_pk_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_trp_pk_01 = 0;
					while($cpf_form_no_trp_pk_01<= 3){
						if($cpf_vcform01_sww['form_trp_pk_01']==$cpf_form_no_trp_pk_01){
							echo"<option value=$cpf_form_no_trp_pk_01 selected>$cpf_form_no_trp_pk_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_trp_pk_01>$cpf_form_no_trp_pk_01</option>";	
						}
					$cpf_form_no_trp_pk_01++; } 
				
				?>
                </select>
                </td>
                <td>Untuk Pulang</td>
              </tr>
              <tr>
                <td>-</td>
                <td>-</td>
                <td colspan="3">
                  <!-- POINT ASESMEN KEPERAWATAN -->
                  <?PHP 
                      #POINT COUNTING
                     if($cpf_vcform01_sww['form_trp_rl_01']=="0"){
                        $POINT_RL_01 = 0 ;
                     }else{
                      $POINT_RL_01 = 1 ;
                     }
                     if($cpf_vcform01_sww['form_trp_met_01']=="0"){
                      $POINT_MET_01 = 0 ;
                   }else{
                    $POINT_MET_01 = 1 ;
                   }
                   if($cpf_vcform01_sww['form_trp_ran_01']=="0"){
                    $POINT_RAN_01 = 0 ;
                  }else{
                    $POINT_RAN_01 = 1 ;
                    }
                    if($cpf_vcform01_sww['form_trp_para_01']=="0"){
                      $POINT_PARA_01 = 0 ;
                      }else{
                        $POINT_PARA_01 = 1 ;
                      }
                      if($cpf_vcform01_sww['form_trp_pk_01']=="0"){
                        $POINT_PK_01 = 0 ;
                    }else{
                      $POINT_PK_01 = 1 ;
                    }
                #COUNTING
                $CN_POINT_RL_01 = $POINT_RL_01 +  $POINT_MET_01 + $POINT_RAN_01 + $POINT_PARA_01 + $POINT_PK_01;
                  ?>
                  POINT <span class="badge bg-warning"><?PHP echo $CN_POINT_RL_01; ?>
                  <!-- -->
                </td>
                <td>-</td>
              </tr>	
              <tr>
                <td height="21">Obat ANestesi</td>
                <td>Fentanyl</td>
               <td colspan="3">
                <select name="form_trp_fen_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_trp_fen_01 = 0;
					while($cpf_form_no_trp_fen_01<= 3){
						if($cpf_vcform01_sww['form_trp_fen_01']==$cpf_form_no_trp_fen_01){
							echo"<option value=$cpf_form_no_trp_fen_01 selected>$cpf_form_no_trp_fen_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_trp_fen_01>$cpf_form_no_trp_fen_01</option>";	
						}
					$cpf_form_no_trp_fen_01++; } 
				
				?>
                </select>
                </td>
                <td rowspan="6">Tergantung Pilihan GA/RA</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Propofol</td>
              <td colspan="3">
                <select name="form_trp_pro_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_trp_pro_01 = 0;
					while($cpf_form_no_trp_pro_01<= 3){
						if($cpf_vcform01_sww['form_trp_pro_01']==$cpf_form_no_trp_pro_01){
							echo"<option value=$cpf_form_no_trp_pro_01 selected>$cpf_form_no_trp_pro_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_trp_pro_01>$cpf_form_no_trp_pro_01</option>";	
						}
					$cpf_form_no_trp_pro_01++; } 
				
				?>
                </select>
                </td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Atracurium Besylate</td>
              <td colspan="3">
                <select name="form_trp_atr_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_trp_atr_01 = 0;
					while($cpf_form_no_trp_atr_01<= 3){
						if($cpf_vcform01_sww['form_trp_atr_01']==$cpf_form_no_trp_atr_01){
							echo"<option value=$cpf_form_no_trp_atr_01 selected>$cpf_form_no_trp_atr_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_trp_atr_01>$cpf_form_no_trp_atr_01</option>";	
						}
					$cpf_form_no_trp_atr_01++; } 
				
				?>
                </select>
                </td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Isoflurane</td>
               <td colspan="3">
                <select name="form_trp_iso_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_trp_iso_01 = 0;
					while($cpf_form_no_trp_iso_01<= 3){
						if($cpf_vcform01_sww['form_trp_iso_01']==$cpf_form_no_trp_iso_01){
							echo"<option value=$cpf_form_no_trp_iso_01 selected>$cpf_form_no_trp_iso_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_trp_iso_01>$cpf_form_no_trp_iso_01</option>";	
						}
					$cpf_form_no_trp_iso_01++; } 
				
				?>
                </select>
                </td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Sefoflurane</td>
              <td colspan="3">
                <select name="form_trp_sef_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_trp_sef_01 = 0;
					while($cpf_form_no_trp_sef_01<= 3){
						if($cpf_vcform01_sww['form_trp_sef_01']==$cpf_form_no_trp_sef_01){
							echo"<option value=$cpf_form_no_trp_sef_01 selected>$cpf_form_no_trp_sef_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_trp_sef_01>$cpf_form_no_trp_sef_01</option>";	
						}
					$cpf_form_no_trp_sef_01++; } 
				
				?>
                </select>
                </td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>N2O, 02</td>
              	 <td colspan="3">
                <select name="form_trp_n2o_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_trp_n2o_01 = 0;
					while($cpf_form_no_trp_n2o_01<= 3){
						if($cpf_vcform01_sww['form_trp_n2o_01']==$cpf_form_no_trp_n2o_01){
							echo"<option value=$cpf_form_no_trp_n2o_01 selected>$cpf_form_no_trp_n2o_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_trp_n2o_01>$cpf_form_no_trp_n2o_01</option>";	
						}
					$cpf_form_no_trp_n2o_01++; } 
				
				?>
                </select>
                </td>
              </tr>
              <tr>
                <td>-</td>
                <td>-</td>
                <td colspan="3">
                  <!-- POINT TRP Obat Anastesis -->
                  <?PHP 
                      #POINT COUNTING
                     if($cpf_vcform01_sww['form_trp_fen_01']=="0"){
                        $POINT_FEN_01 = 0 ;
                     }else{
                      $POINT_FEN_01 = 1 ;
                     }
                     if($cpf_vcform01_sww['form_trp_pro_01']=="0"){
                      $POINT_PRO_01 = 0 ;
                   }else{
                    $POINT_PRO_01 = 1 ;
                   }
                   if($cpf_vcform01_sww['form_trp_atr_01']=="0"){
                    $POINT_ATR_01 = 0 ;
                  }else{
                    $POINT_ATR_01 = 1 ;
                  }
                  if($cpf_vcform01_sww['form_trp_iso_01']=="0"){
                    $POINT_ISO_01 = 0 ;
                  }else{
                    $POINT_ISO_01 = 1 ;
                  }
                  if($cpf_vcform01_sww['form_trp_sef_01']=="0"){
                    $POINT_SEF_01 = 0 ;
                }else{
                  $POINT_SEF_01 = 1 ;
                }
                if($cpf_vcform01_sww['form_trp_n2o_01']=="0"){
                  $POINT_N20_01 = 0 ;
              }else{
                $POINT_N20_01 = 1 ;
              }
              #COUNTING 
              $CN_POINT_FEN_01 = $POINT_FEN_01 + $POINT_PRO_01 + $POINT_ATR_01 + $POINT_ISO_01 + $POINT_SEF_01 + $POINT_N20_01;
                  ?>
                  POINT <span class="badge bg-warning"><?PHP echo $CN_POINT_FEN_01; ?>
                  <!-- -->
                </td>
                <td>-</td>
              </tr>
              <tr>
                <td height="21" colspan="6" class="table-dark">&nbsp;</td>
              </tr>
              <tr>
                <td height="21" class="table-primary">TATA LAKSANA /INTERVENSI</td>
                <td>&nbsp;</td>
             	<td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">TATA LAKSANA /INTERVENSI MEDIS</td>
                <td>&nbsp;</td>
             <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">TATA LAKSANA /INTERVENSI KEPERAWATAN</td>
                <td>NIC : 1400 Manajemen Nyeri</td>
              	<td colspan="3">
                <select name="form_int_nic14_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_int_nic14_01 = 0;
					while($cpf_form_no_int_nic14_01<= 3){
						if($cpf_vcform01_sww['form_int_nic14_01']==$cpf_form_no_int_nic14_01){
							echo"<option value=$cpf_form_no_int_nic14_01 selected>$cpf_form_no_int_nic14_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_int_nic14_01>$cpf_form_no_int_nic14_01</option>";	
						}
					$cpf_form_no_int_nic14_01++; } 
				
				?>
                </select>
                </td>
                <td rowspan="4">MENGACU PADA NIC</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>NIC : 6540 Control Infeksi </td>
            	<td colspan="3">
                <select name="form_int_nic65_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_int_nic65_01 = 0;
					while($cpf_form_no_int_nic65_01<= 3){
						if($cpf_vcform01_sww['form_int_nic65_01']==$cpf_form_no_int_nic65_01){
							echo"<option value=$cpf_form_no_int_nic65_01 selected>$cpf_form_no_int_nic65_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_int_nic65_01>$cpf_form_no_int_nic65_01</option>";	
						}
					$cpf_form_no_int_nic65_01++; } 
				
				?>
                </select>
                </td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>NIC : 2317 Kolaborasi Obat IV</td>
                <td colspan="3">
                <select name="form_int_nic231_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_int_nic231_01 = 0;
					while($cpf_form_no_int_nic231_01<= 3){
						if($cpf_vcform01_sww['form_int_nic231_01']==$cpf_form_no_int_nic231_01){
							echo"<option value=$cpf_form_no_int_nic231_01 selected>$cpf_form_no_int_nic231_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_int_nic231_01>$cpf_form_no_int_nic231_01</option>";	
						}
					$cpf_form_no_int_nic231_01++; } 
				
				?>
                </select>
                </td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>NIC : 2304 Kolaborasi Obat Oral</td>
              <td colspan="3">
                <select name="form_int_nic230_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_int_nic230_01 = 0;
					while($cpf_form_no_int_nic230_01<= 3){
						if($cpf_vcform01_sww['form_int_nic230_01']==$cpf_form_no_int_nic230_01){
							echo"<option value=$cpf_form_no_int_nic230_01 selected>$cpf_form_no_int_nic230_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_int_nic230_01>$cpf_form_no_int_nic230_01</option>";	
						}
					$cpf_form_no_int_nic230_01++; } 
				
				?>
                </select>
                </td>
              </tr>
              <tr>
                <td>-</td>
                <td>-</td>
                <td colspan="3">
                  <!-- POINT TATA LAKSANA /INTERVENSI KEPERAWATAN -->
                  <?PHP 
                      #POINT COUNTING
                     if($cpf_vcform01_sww['form_int_nic14_01']=="0"){
                        $POINT_NIC14_01 = 0 ;
                     }else{
                      $POINT_NIC14_01 = 1 ;
                     }
                     if($cpf_vcform01_sww['form_int_nic65_01']=="0"){
                      $POINT_NIC65_01 = 0 ;
                   }else{
                    $POINT_NIC65_01 = 1 ;
                   }
                   if($cpf_vcform01_sww['form_int_nic231_01']=="0"){
                    $POINT_NIC231_01 = 0 ;
                    }else{
                      $POINT_NIC231_01 = 1 ;
                    }
                    if($cpf_vcform01_sww['form_int_nic230_01']=="0"){

                      $POINT_NIC230_01 = 0 ;
                  }else{
                    $POINT_NIC230_01 = 1 ;
                  }
                  #COUNTING
                  $CN_POINT_INT_01 = $POINT_NIC14_01 + $POINT_NIC65_01 + $POINT_NIC230_01 + $POINT_NIC231_01;
                  ?>
                  POINT <span class="badge bg-warning"><?PHP echo $CN_POINT_INT_01; ?>
                  <!-- -->
                </td>
                <td>-</td>
              </tr>	
              <tr>
                <td height="21">TATA LAKSANA /INTERVENSI  GIZI</td>
                <td>Diet cair/saring/biasa secara bertahap pasca bedah. Diet TETP (Tinggi Energi Tinggi Protein) selama pemulihan</td>
               <td colspan="3">
                <select name="form_int_tetp_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_int_tetp_01 = 0;
					while($cpf_form_no_int_tetp_01<= 3){
						if($cpf_vcform01_sww['form_int_tetp_01']==$cpf_form_no_int_tetp_01){
							echo"<option value=$cpf_form_no_int_tetp_01 selected>$cpf_form_no_int_tetp_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_int_tetp_01>$cpf_form_no_int_tetp_01</option>";	
						}
					$cpf_form_no_int_tetp_01++; } 
				
				?>
                </select>
                </td>
                <td>Bentuk makanan , kebutuhan zat gizi di disesuaikan dengan usia dan kondisi klinis secara bertahap</td>
              </tr>
              <tr>
                <td height="21">TATA LAKSANA /INTERVENSI  FARMASI</td>
                <td>Konfirmasi obat dan rekomendasi pada DPJP bila terjadi masalah dalam pengobatan (Dosis, Kontraindikasi, Interaksi Obat Mayor)</td>
               	<td colspan="3">
                <select name="form_int_obatmayor_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_int_obatmayor_01 = 0;
					while($cpf_form_no_int_obatmayor_01<= 3){
						if($cpf_vcform01_sww['form_int_obatmayor_01']==$cpf_form_no_int_obatmayor_01){
							echo"<option value=$cpf_form_no_int_obatmayor_01 selected>$cpf_form_no_int_obatmayor_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_int_obatmayor_01>$cpf_form_no_int_obatmayor_01</option>";	
						}
					$cpf_form_no_int_obatmayor_01++; } 
				
				?>
                </select>
                </td>
                <td>menyusun software interaksi dilanjutkan dengan intervensi farmasi sesuai hasil monitoring</td>
              </tr>
              <tr>
                <td>-</td>
                <td>-</td>
                <td colspan="3">
                  <!-- POINT INT TATA LAKSANA /INTERVENSI GIZI -->
                  <?PHP 
                      #POINT COUNTING
                     if($cpf_vcform01_sww['form_int_tetp_01']=="0"){
                        $POINT_TETP_01 = 0 ;
                     }else{
                      $POINT_TETP_01 = 1 ;
                     }
                     if($cpf_vcform01_sww['form_int_obatmayor_01']=="0"){
                      $POINT_OM_01 = 0 ;
                   }else{
                    $POINT_OM_01 = 1 ;
                   }
                   #COUNTING
                   $CN_POINT_TETP_01 = $POINT_TETP_01 + $POINT_OM_01;
                  ?>
                  POINT <span class="badge bg-warning"><?PHP echo $CN_POINT_TETP_01; ?>
                  <!-- -->
                </td>
                <td>-</td>
              </tr>	
              <tr>
                <td height="21" colspan="6" class="table-dark">&nbsp;</td>
              </tr>
              <tr>
                <td height="21" class="table-primary">MONITORING DAN EVALUASI</td>
                <td>&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">DOKTER DPJP</td>
                <td>Asesmen Ulang dan Review Verifikasi Rencana Asuhan</td>
               	<td colspan="3">
                <select name="form_mon_rev_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_mon_rev_01 = 0;
					while($cpf_form_no_mon_rev_01<= 3){
						if($cpf_vcform01_sww['form_mon_rev_01']==$cpf_form_no_mon_rev_01){
							echo"<option value=$cpf_form_no_mon_rev_01 selected>$cpf_form_no_mon_rev_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_mon_rev_01>$cpf_form_no_mon_rev_01</option>";	
						}
					$cpf_form_no_mon_rev_01++; } 
				
				?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>-</td>
                <td>-</td>
                <td colspan="3">
                  <!-- POINT MONITOR EVALUASI DOKTER DPJP  -->
                  <?PHP 
                      #POINT COUNTING
                     if($cpf_vcform01_sww['form_mon_rev_01']=="0"){
                        $POINT_REV_01 = 0 ;
                     }else{
                      $POINT_REV_01 = 1 ;
                     }
                  ?>
                  POINT <span class="badge bg-warning"><?PHP echo  $POINT_REV_01; ?>
                  <!-- -->
                </td>
                <td>-</td>
              </tr>	
              <tr>
                <td height="21">KEPERAWATAN</td>
                <td>Monitoring penurunan skala nyeri pasien</td>
              	<td colspan="3">
                <select name="form_mon_skala_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_mon_skala_01 = 0;
					while($cpf_form_no_mon_skala_01<= 3){
						if($cpf_vcform01_sww['form_mon_skala_01']==$cpf_form_no_mon_skala_01){
							echo"<option value=$cpf_form_no_mon_skala_01 selected>$cpf_form_no_mon_skala_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_mon_skala_01>$cpf_form_no_mon_skala_01</option>";	
						}
					$cpf_form_no_mon_skala_01++; } 
				
				?>
                </select>
                </td>
                <td>Mengacu pada  NOC</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Monitoring Implementasi mandiri teknik relaksasi untuk menurunkan nyeri</td>
             	<td colspan="3">
                <select name="form_mon_imp_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_mon_imp_01 = 0;
					while($cpf_form_no_mon_imp_01<= 3){
						if($cpf_vcform01_sww['form_mon_imp_01']==$cpf_form_no_mon_imp_01){
							echo"<option value=$cpf_form_no_mon_imp_01 selected>$cpf_form_no_mon_imp_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_mon_imp_01>$cpf_form_no_mon_imp_01</option>";	
						}
					$cpf_form_no_mon_imp_01++; } 
				
				?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Monitoring tanda-tanda kecemasanyang dialami pasien</td>
               <td colspan="3">
                <select name="form_mon_tanda_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_mon_tanda_01 = 0;
					while($cpf_form_no_mon_tanda_01<= 3){
						if($cpf_vcform01_sww['form_mon_tanda_01']==$cpf_form_no_mon_tanda_01){
							echo"<option value=$cpf_form_no_mon_tanda_01 selected>$cpf_form_no_mon_tanda_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_mon_tanda_01>$cpf_form_no_mon_tanda_01</option>";	
						}
					$cpf_form_no_mon_tanda_01++; } 
				
				?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Evaluasi pemahaman pasien tentang prosedur tindakan yang akan dilakukan</td>
               <td colspan="3">
                <select name="form_mon_pro_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_mon_pro_01 = 0;
					while($cpf_form_no_mon_pro_01<= 3){
						if($cpf_vcform01_sww['form_mon_pro_01']==$cpf_form_no_mon_pro_01){
							echo"<option value=$cpf_form_no_mon_pro_01 selected>$cpf_form_no_mon_pro_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_mon_pro_01>$cpf_form_no_mon_pro_01</option>";	
						}
					$cpf_form_no_mon_pro_01++; } 
				
				?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Monitoring ekspresi non verbal pasien (pasien menunjukkan ekspresi  lebih tenang dan pasien mengungkapkan lebih aman dan nyaman</td>
                    <td colspan="3">
                <select name="form_mon_verbal_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_mon_verbal_01 = 0;
					while($cpf_form_no_mon_verbal_01<= 3){
						if($cpf_vcform01_sww['form_mon_verbal_01']==$cpf_form_no_mon_verbal_01){
							echo"<option value=$cpf_form_no_mon_verbal_01 selected>$cpf_form_no_mon_verbal_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_mon_verbal_01>$cpf_form_no_mon_verbal_01</option>";	
						}
					$cpf_form_no_mon_verbal_01++; } 
				
				?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Monitoring implementasi mandiri terapi relaksasi untuk menurunkan  kecemasan</td>
                  <td colspan="3">
                <select name="form_mon_terapi_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_mon_terapi_01 = 0;
					while($cpf_form_no_mon_terapi_01<= 3){
						if($cpf_vcform01_sww['form_mon_terapi_01']==$cpf_form_no_mon_terapi_01){
							echo"<option value=$cpf_form_no_mon_terapi_01 selected>$cpf_form_no_mon_terapi_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_mon_terapi_01>$cpf_form_no_mon_terapi_01</option>";	
						}
					$cpf_form_no_mon_terapi_01++; } 
				
				?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Monitoring keseimbangan cairan</td>
                <td colspan="3">
                <select name="form_mon_cairan_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_mon_cairan_01 = 0;
					while($cpf_form_no_mon_cairan_01<= 3){
						if($cpf_vcform01_sww['form_mon_cairan_01']==$cpf_form_no_mon_cairan_01){
							echo"<option value=$cpf_form_no_mon_cairan_01 selected>$cpf_form_no_mon_cairan_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_mon_cairan_01>$cpf_form_no_mon_cairan_01</option>";	
						}
					$cpf_form_no_mon_cairan_01++; } 
				
				?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Monitoring tanda-tanda infeksi</td>
                	 <td colspan="3">
                <select name="form_mon_infeksi_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_mon_infeksi_01 = 0;
					while($cpf_form_no_mon_infeksi_01<= 3){
						if($cpf_vcform01_sww['form_mon_infeksi_01']==$cpf_form_no_mon_infeksi_01){
							echo"<option value=$cpf_form_no_mon_infeksi_01 selected>$cpf_form_no_mon_infeksi_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_mon_infeksi_01>$cpf_form_no_mon_infeksi_01</option>";	
						}
					$cpf_form_no_mon_infeksi_01++; } 
				
				?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>-</td>
                <td>-</td>
                <td colspan="3">
                  <!-- POINT MON Monitoring penurunan skala nyeri pasien -->
                  <?PHP 
                      #POINT COUNTING
                     if($cpf_vcform01_sww['form_mon_skala_01']=="0"){
                        $POINT_SKALA_01 = 0 ;
                     }else{
                      $POINT_SKALA_01 = 1 ;
                     }
                     if($cpf_vcform01_sww['form_mon_imp_01']=="0"){
                      $POINT_IMP_01 = 0 ;
                   }else{
                    $POINT_IMP_01 = 1 ;
                   }
                   if($cpf_vcform01_sww['form_mon_tanda_01']=="0"){
                    $POINT_TANDA_01 = 0 ;
                 }else{
                  $POINT_TANDA_01 = 1 ;
                      }
                      if($cpf_vcform01_sww['form_mon_pro_01']=="0"){
                        $POINT_PRO_01 = 0 ;
                    }else{
                      $POINT_PRO_01 = 1 ;
                    }
                    if($cpf_vcform01_sww['form_mon_verbal_01']=="0"){
                      $POINT_VERBAL_01 = 0 ;
                    }else{
                      $POINT_VERBAL_01 = 1 ;
                    }
                    if($cpf_vcform01_sww['form_mon_terapi_01']=="0"){
                      $POINT_TERAPI_03 = 0 ;
                    }else{
                      $POINT_TERAPI_03 = 1 ;
                    }
                    if($cpf_vcform01_sww['form_mon_cairan_01']=="0"){
                      $POINT_CAIRAN_01 = 0 ;
                    }else{
                      $POINT_CAIRAN_01 = 1 ;
                    }
                    if($cpf_vcform01_sww['form_mon_infeksi_01']=="0"){
                      $POINT_INFEKSI_01 = 0 ;
                    }else{
                      $POINT_INFEKSI_01 = 1 ;
                    }
                  #COUNTING
                  $CN_POINT_SKALA_01 = $POINT_SKALA_01 + $POINT_IMP_01 + $POINT_TANDA_01 + $POINT_PRO_01 + $POINT_VERBAL_01 + $POINT_TERAPI_03 + $POINT_CAIRAN_01 + $POINT_INFEKSI_01 ;
                  ?>
                  POINT <span class="badge bg-warning"><?PHP echo  $CN_POINT_SKALA_01; ?>
                  <!-- -->
                </td>
                <td>-</td>
              </tr>	
              <tr>
                <td height="21">GIZI</td>
                <td>Monitoring asupan makanan</td>
               <td colspan="3">
                <select name="form_mon_asupan_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_mon_asupan_01 = 0;
					while($cpf_form_no_mon_asupan_01<= 3){
						if($cpf_vcform01_sww['form_mon_asupan_01']==$cpf_form_no_mon_asupan_01){
							echo"<option value=$cpf_form_no_mon_asupan_01 selected>$cpf_form_no_mon_asupan_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_mon_asupan_01>$cpf_form_no_mon_asupan_01</option>";	
						}
					$cpf_form_no_mon_asupan_01++; } 
				
				?>
                </select>
                </td>
                <td rowspan="4">Sesuai dengan masalah gizi dan tanda gejala yang akan dilihat kemajuannya.
                					Mengacu pada IDNT (International Diestetics dan Nutrition Terminology)
				</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Monitoring Antropomeri</td>
                <td colspan="3">
                <select name="form_mon_ant_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_mon_ant_01 = 0;
					while($cpf_form_no_mon_ant_01<= 3){
						if($cpf_vcform01_sww['form_mon_ant_01']==$cpf_form_no_mon_ant_01){
							echo"<option value=$cpf_form_no_mon_ant_01 selected>$cpf_form_no_mon_ant_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_mon_ant_01>$cpf_form_no_mon_ant_01</option>";	
						}
					$cpf_form_no_mon_ant_01++; } 
				
				?>
                </select>
                </td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Monitoring Biokimia</td>
               <td colspan="3">
                <select name="form_mon_bio_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_mon_bio_01 = 0;
					while($cpf_form_no_mon_bio_01<= 3){
						if($cpf_vcform01_sww['form_mon_bio_01']==$cpf_form_no_mon_bio_01){
							echo"<option value=$cpf_form_no_mon_bio_01 selected>$cpf_form_no_mon_bio_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_mon_bio_01>$cpf_form_no_mon_bio_01</option>";	
						}
					$cpf_form_no_mon_bio_01++; } 
				
				?>
                </select>
                </td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Monitoring Fisik/Klinis terkait Gizi</td>
              		   <td colspan="3">
                <select name="form_mon_fisik_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_mon_fisik_01 = 0;
					while($cpf_form_no_mon_fisik_01<= 3){
						if($cpf_vcform01_sww['form_mon_fisik_01']==$cpf_form_no_mon_fisik_01){
							echo"<option value=$cpf_form_no_mon_fisik_01 selected>$cpf_form_no_mon_fisik_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_mon_fisik_01>$cpf_form_no_mon_fisik_01</option>";	
						}
					$cpf_form_no_mon_fisik_01++; } 
				
				?>
                </select>
                </td>
              </tr>
              <tr>
                <td>-</td>
                <td>-</td>
                <td colspan="3">
                  <!-- POINT MON GIZI -->
                  <?PHP 
                      #POINT COUNTING
                     if($cpf_vcform01_sww['form_mon_asupan_01']=="0"){
                        $POINT_ASUPAN_01 = 0 ;
                     }else{
                      $POINT_ASUPAN_01 = 1 ;
                     }
                     if($cpf_vcform01_sww['form_mon_ant_01']=="0"){
                      $POINT_ANT_01 = 0 ;
                   }else{
                    $POINT_ANT_01 = 1 ;
                   }
                   if($cpf_vcform01_sww['form_mon_bio_01']=="0"){
                    $POINT_BIO_01 = 0 ;
                  }else{
                    $POINT_BIO_01 = 1 ;
                    }
                    if($cpf_vcform01_sww['form_mon_fisik_01']=="0"){
                      $POINT_FISIK_01 = 0 ;
                  }else{
                    $POINT_FISIK_01 = 1 ;
                  }
                  #COUNTING
                  $CN_POINT_ASUPAN_01 = $POINT_ASUPAN_01 + $POINT_ANT_01 + $POINT_BIO_01 + $POINT_FISIK_01;
                  ?>
                  POINT <span class="badge bg-warning"><?PHP echo  $CN_POINT_ASUPAN_01; ?>
                  <!-- -->
                </td>
                <td>-</td>
              </tr>
              <tr>
                <td height="21">FARMASI</td>
                <td>Monitoring Interaksi Obat</td>
                <td colspan="3">
                <select name="form_mon_interaksi_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_mon_interaksi_01 = 0;
					while($cpf_form_no_mon_interaksi_01<= 3){
						if($cpf_vcform01_sww['form_mon_interaksi_01']==$cpf_form_no_mon_interaksi_01){
							echo"<option value=$cpf_form_no_mon_interaksi_01 selected>$cpf_form_no_mon_interaksi_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_mon_interaksi_01>$cpf_form_no_mon_interaksi_01</option>";	
						}
					$cpf_form_no_mon_interaksi_01++; } 
				
				?>
                </select>
                </td>
                <td rowspan="3">Menyusun software interaksi dilanjutkan dengan intervensi farmasi yang sesuai </td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Monitoring Efek Samping Obat</td>
                  <td colspan="3">
                <select name="form_mon_efek_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_mon_efek_01 = 0;
					while($cpf_form_no_mon_efek_01<= 3){
						if($cpf_vcform01_sww['form_mon_efek_01']==$cpf_form_no_mon_efek_01){
							echo"<option value=$cpf_form_no_mon_efek_01 selected>$cpf_form_no_mon_efek_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_mon_efek_01>$cpf_form_no_mon_efek_01</option>";	
						}
					$cpf_form_no_mon_efek_01++; } 
				
				?>
                </select>
                </td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Monitoring efektivitas obat dengan melihat TD</td>
              <td colspan="3">
                <select name="form_mon_td_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_mon_td_01 = 0;
					while($cpf_form_no_mon_td_01<= 3){
						if($cpf_vcform01_sww['form_mon_td_01']==$cpf_form_no_mon_td_01){
							echo"<option value=$cpf_form_no_mon_td_01 selected>$cpf_form_no_mon_td_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_mon_td_01>$cpf_form_no_mon_td_01</option>";	
						}
					$cpf_form_no_mon_td_01++; } 
				
				?>
                </select>
                </td>
              </tr>
              <tr>
                <td>-</td>
                <td>-</td>
                <td colspan="3">
                  <!-- POINT MON FARMASI -->
                  <?PHP 
                      #POINT COUNTING
                     if($cpf_vcform01_sww['form_mon_interaksi_01']=="0"){
                        $POINT_INTER_01 = 0 ;
                     }else{
                      $POINT_INTER_01 = 1 ;
                     }
                     if($cpf_vcform01_sww['form_mon_efek_01']=="0"){
                      $POINT_EFEK_01 = 0 ;
                   }else{
                    $POINT_EFEK_01 = 1 ;
                   }
                   if($cpf_vcform01_sww['form_mon_td_01']=="0"){
                    $POINT_TD_01 = 0 ;
                 }else{
                  $POINT_TD_01 = 1 ;
                 }
                 #COUNTING
                 $CN_POINT_INTER_01 = $POINT_INTER_01 + $POINT_EFEK_01 + $POINT_TD_01;
                  ?>
                  POINT <span class="badge bg-warning"><?PHP echo  $CN_POINT_INTER_01; ?>
                  <!-- -->
                </td>
                <td>-</td>
              </tr>	
              <tr>
                <td height="21" colspan="6" class="table-dark">&nbsp;</td>
              </tr>
              <tr>
                <td height="21" class="table-primary">MOBILISASI/REHABILITASI</td>
                <td>&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">MEDIS</td>
                <td>&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">KEPERAWATAN</td>
                <td>Dibantu sebagian/Mandiri</td>
               <td colspan="3">
                <select name="form_mob_mandiri_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_mob_mandiri_01 = 0;
					while($cpf_form_no_mob_mandiri_01<= 3){
						if($cpf_vcform01_sww['form_mob_mandiri_01']==$cpf_form_no_mob_mandiri_01){
							echo"<option value=$cpf_form_no_mob_mandiri_01 selected>$cpf_form_no_mob_mandiri_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_mob_mandiri_01>$cpf_form_no_mob_mandiri_01</option>";	
						}
					$cpf_form_no_mob_mandiri_01++; } 
				
				?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>-</td>
                <td>-</td>
                <td colspan="3">
                  <!-- POINT MOB KEPERAWATAN -->
                  <?PHP 
                      #POINT COUNTING
                     if($cpf_vcform01_sww['form_mob_mandiri_01']=="0"){
                        $POINT_MAN_01 = 0 ;
                     }else{
                      $POINT_MAN_01 = 1 ;
                     }
                  ?>
                  POINT <span class="badge bg-warning"><?PHP echo $POINT_MAN_01; ?>
                  <!-- -->
                </td>
                <td>-</td>
              </tr>		
              <tr>
                <td height="21" colspan="6" class="table-dark">&nbsp;</td>
              </tr>
              <tr>
                <td height="21" class="table-primary">OUTCOME / HASIL</td>
                <td>&nbsp;</td>
                	 <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">MEDIS</td>
                <td>Nyeri daerah operasi (-)</td>
              <td colspan="3">
                <select name="form_out_nyeri_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_out_nyeri_01 = 0;
					while($cpf_form_no_out_nyeri_01<= 3){
						if($cpf_vcform01_sww['form_out_nyeri_01']==$cpf_form_no_out_nyeri_01){
							echo"<option value=$cpf_form_no_out_nyeri_01 selected>$cpf_form_no_out_nyeri_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_out_nyeri_01>$cpf_form_no_out_nyeri_01</option>";	
						}
					$cpf_form_no_out_nyeri_01++; } 
				
				?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Luka Operasi kering dan bersih</td>
                <td colspan="3">
                <select name="form_out_op_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_out_op_01 = 0;
					while($cpf_form_no_out_op_01<= 3){
						if($cpf_vcform01_sww['form_out_op_01']==$cpf_form_no_out_op_01){
							echo"<option value=$cpf_form_no_out_op_01 selected>$cpf_form_no_out_op_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_out_op_01>$cpf_form_no_out_op_01</option>";	
						}
					$cpf_form_no_out_op_01++; } 
				
				?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>-</td>
                <td>-</td>
                <td colspan="3">
                  <!-- POINT OUT MEDIS -->
                  <?PHP 
                      #POINT COUNTING
                     if($cpf_vcform01_sww['form_out_nyeri_01']=="0"){
                        $POINT_NYERI_01 = 0 ;
                     }else{
                      $POINT_NYERI_01 = 1 ;
                     }
                     if($cpf_vcform01_sww['form_out_op_01']=="0"){
                      $POINT_OP_01 = 0 ;
                    }else{
                      $POINT_OP_01 = 1 ;
                    }
                    #COUNTING
                    $CN_POINT_NYERI_01 = $POINT_NYERI_01 + $POINT_OP_01;
                  ?>
                  POINT <span class="badge bg-warning"><?PHP echo $CN_POINT_NYERI_01; ?>
                  <!-- -->
                </td>
                <td>-</td>
              </tr>
              <tr>
                <td height="21">KEPERAWATAN</td>
                <td>NOC : 1605 Control Nyeri</td>
                <td colspan="3">
                <select name="form_out_noc16_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_out_noc16_01 = 0;
					while($cpf_form_no_out_noc16_01<= 3){
						if($cpf_vcform01_sww['form_out_noc16_01']==$cpf_form_no_out_noc16_01){
							echo"<option value=$cpf_form_no_out_noc16_01 selected>$cpf_form_no_out_noc16_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_out_noc16_01>$cpf_form_no_out_noc16_01</option>";	
						}
					$cpf_form_no_out_noc16_01++; } 
				
				?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>NOC : 0703 Severity Infeksi</td>
                <td colspan="3">
                <select name="form_out_noc07_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_out_noc07_01 = 0;
					while($cpf_form_no_out_noc07_01<= 3){
						if($cpf_vcform01_sww['form_out_noc07_01']==$cpf_form_no_out_noc07_01){
							echo"<option value=$cpf_form_no_out_noc07_01 selected>$cpf_form_no_out_noc07_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_out_noc07_01>$cpf_form_no_out_noc07_01</option>";	
						}
					$cpf_form_no_out_noc07_01++; } 
				
				?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>-</td>
                <td>-</td>
                <td colspan="3">
                  <!-- POINT OUT KEPERAWATAN -->
                  <?PHP 
                      #POINT COUNTING
                     if($cpf_vcform01_sww['form_out_noc16_01']=="0"){
                        $POINT_NOC16_01 = 0 ;
                     }else{
                      $POINT_NOC16_01 = 1 ;
                     }
                     if($cpf_vcform01_sww['form_out_noc07_01']=="0"){
                      $POINT_NOC07_01 = 0 ;
                   }else{
                    $POINT_NOC07_01 = 1 ;
                   }
                   #COUNTING
                   $CN_POINT_NOC16_01 = $POINT_NOC16_01 + $POINT_NOC07_01;
                  ?>
                  POINT <span class="badge bg-warning"><?PHP echo  $CN_POINT_NOC16_01; ?>
                  <!-- -->
                </td>
                <td>-</td>
              </tr>	
              <tr>
                <td height="21">GIZI</td>
                <td>Asupan makanan > 80%</td>
               <td colspan="3">
                <select name="form_out_asupan_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_out_asupan_01 = 1;
					while($cpf_form_no_out_asupan_01<= 3){
						if($cpf_vcform01_sww['form_out_asupan_01']==$cpf_form_no_out_asupan_01){
							echo"<option value=$cpf_form_no_out_asupan_01 selected>$cpf_form_no_out_asupan_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_out_asupan_01>$cpf_form_no_out_asupan_01</option>";	
						}
					$cpf_form_no_out_asupan_01++; } 
				
				?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Opimalisasi Status Gizi</td>
              <td colspan="3">
               
                 <select name="form_out_gizi_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_out_gizi_01 = 0;
					while($cpf_form_no_out_gizi_01<= 3){
						if($cpf_vcform01_sww['form_out_gizi_01']==$cpf_form_no_out_gizi_01){
							echo"<option value=$cpf_form_no_out_gizi_01 selected>$cpf_form_no_out_gizi_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_out_gizi_01>$cpf_form_no_out_gizi_01</option>";	
						}
					$cpf_form_no_out_gizi_01++; } 
				
				?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>-</td>
                <td>-</td>
                <td colspan="3">
                  <!-- POINT OUT GIZI -->
                  <?PHP 
                      #POINT COUNTING
                     if($cpf_vcform01_sww['form_out_asupan_01']=="0"){
                        $POINT_ASUPAN_02 = 0 ;
                     }else{
                      $POINT_ASUPAN_02 = 1 ;
                     }
                     if($cpf_vcform01_sww['form_out_gizi_01']=="0"){
                      $POINT_GIZI_03 = 0 ;
                   }else{
                    $POINT_GIZI_03 = 1 ;
                   }
                   #COUNTING
                   $CN_POINT_ASUPAN_02 = $POINT_ASUPAN_02 + $POINT_GIZI_03;
                  ?>
                  POINT <span class="badge bg-warning"><?PHP echo  $CN_POINT_ASUPAN_02; ?>
                  <!-- -->
                </td>
                <td>-</td>
              </tr>	
              <tr>
                <td height="21">FARMASI</td>
                <td>Terapi obat sesuai indikasi</td>
              <td colspan="3">
                <select name="form_out_indikasi_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_out_indikasi_01 = 0;
					while($cpf_form_no_out_indikasi_01<= 3){
						if($cpf_vcform01_sww['form_out_indikasi_01']==$cpf_form_no_out_indikasi_01){
							echo"<option value=$cpf_form_no_out_indikasi_01 selected>$cpf_form_no_out_indikasi_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_out_indikasi_01>$cpf_form_no_out_indikasi_01</option>";	
						}
					$cpf_form_no_out_indikasi_01++; } 
				
				?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Obat rasional</td>
                <td colspan="3">
                <select name="form_out_rasional_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_out_rasional_01 = 0;
					while($cpf_form_no_out_rasional_01<= 3){
						if($cpf_vcform01_sww['form_out_rasional_01']==$cpf_form_no_out_rasional_01){
							echo"<option value=$cpf_form_no_out_rasional_01 selected>$cpf_form_no_out_rasional_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_out_rasional_01>$cpf_form_no_out_rasional_01</option>";	
						}
					$cpf_form_no_out_rasional_01++; } 
				
				?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>-</td>
                <td>-</td>
                <td colspan="3">
                  <!-- POINT OUT FARMASI -->
                  <?PHP 
                      #POINT COUNTING
                     if($cpf_vcform01_sww['form_out_indikasi_01']=="0"){
                        $POINT_INDK_01 = 0 ;
                     }else{
                      $POINT_INDK_01 = 1 ;
                     }
                     if($cpf_vcform01_sww['form_out_rasional_01']=="0"){
                      $POINT_RASI_01 = 0 ;
                   }else{
                    $POINT_RASI_01 = 1 ;
                   }
                   #COUNTING
                   $CN_POINT_INDK_01 = $POINT_INDK_01 + $POINT_RASI_01;
                  ?>
                  POINT <span class="badge bg-warning"><?PHP echo  $CN_POINT_INDK_01; ?>
                  <!-- -->
                </td>
                <td>-</td>
              </tr>		
              <tr>
                <td height="21" colspan="6" class="table-dark">&nbsp;</td>
              </tr>
              <tr>
                <td height="21">KRITERIA PULANG</td>
                <td>&nbsp;</td>
              <td colspan="3">
                <select name="form_kp_pulang_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_kp_pulang_01 = 0;
					while($cpf_form_no_kp_pulang_01<= 3){
						if($cpf_vcform01_sww['form_kp_pulang_01']==$cpf_form_no_kp_pulang_01){
							echo"<option value=$cpf_form_no_kp_pulang_01 selected>$cpf_form_no_kp_pulang_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_kp_pulang_01>$cpf_form_no_kp_pulang_01</option>";	
						}
					$cpf_form_no_kp_pulang_01++; } 
				
				?>
                </select>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>-</td>
                <td>-</td>
                <td colspan="3">
                  <!-- POINT KP  -->
                  <?PHP 
                      #POINT COUNTING
                     if($cpf_vcform01_sww['form_kp_pulang_01']=="0"){
                        $POINT_PLNG_01 = 0 ;
                     }else{
                      $POINT_PLNG_01 = 1 ;
                     }
                  ?>
                  POINT <span class="badge bg-warning"><?PHP echo $POINT_PLNG_01; ?>
                  <!-- -->
                </td>
                <td>-</td>
              </tr>	
              <tr>
                <td height="21">RENCANA PULANG/EDUKASI PELAYANAN LANJUTAN</td>
                <td>Resume Medis dan Keperawatan</td>
                  <td colspan="3">
                <select name="form_rp_resume_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_rp_resume_01 = 0;
					while($cpf_form_no_rp_resume_01<= 3){
						if($cpf_vcform01_sww['form_rp_resume_01']==$cpf_form_no_rp_resume_01){
							echo"<option value=$cpf_form_no_rp_resume_01 selected>$cpf_form_no_rp_resume_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_rp_resume_01>$cpf_form_no_rp_resume_01</option>";	
						}
					$cpf_form_no_rp_resume_01++; } 
				
				?>
                </select>
                </td>
                <td rowspan="3">Pasien membawa Resume Perawatan/Surat Rujukan/ Surat Kontrol/ Homecare saat pulang</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Penjelasan diberikan sesuai dengan keadaan umum pasien</td>
               <td colspan="3">
                <select name="form_rp_kondisi_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_rp_kondisi_01 = 0;
					while($cpf_form_no_rp_kondisi_01<= 3){
						if($cpf_vcform01_sww['form_rp_kondisi_01']==$cpf_form_no_rp_kondisi_01){
							echo"<option value=$cpf_form_no_rp_kondisi_01 selected>$cpf_form_no_rp_kondisi_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_rp_kondisi_01>$cpf_form_no_rp_kondisi_01</option>";	
						}
					$cpf_form_no_rp_kondisi_01++; } 
				
				?>
                </select>
                </td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Surat pengantar kontrol</td>
              <td colspan="3">
                <select name="form_rp_pengantar_01" class="form-control form-control-sm">
                  <option value="0">0</option>
                <?PHP 
					$cpf_form_no_rp_pengantar_01 = 0;
					while($cpf_form_no_rp_pengantar_01<= 3){
						if($cpf_vcform01_sww['form_rp_pengantar_01']==$cpf_form_no_rp_pengantar_01){
							echo"<option value=$cpf_form_no_rp_pengantar_01 selected>$cpf_form_no_rp_pengantar_01</option>";	
						}else{
							echo"<option value=$cpf_form_no_rp_pengantar_01>$cpf_form_no_rp_pengantar_01</option>";	
						}
					$cpf_form_no_rp_pengantar_01++; } 
				
				?>
                </select>
                </td>
              </tr>
              <tr>
                <td>-</td>
                <td>-</td>
                <td colspan="3">
                  <!-- POINT EDUKASI PELAYANAN -->
                  <?PHP 
                      #POINT COUNTING
                     if($cpf_vcform01_sww['form_rp_resume_01']=="0"){
                      $POINT_RES_01 = 0 ;
                     }else{
                      $POINT_RES_01 = 1 ;
                     }
                     if($cpf_vcform01_sww['form_rp_kondisi_01']=="0"){
                      $POINT_KOND_01 = 0 ;
                     }else{
                      $POINT_KOND_01 = 1 ;
                     }
                     if($cpf_vcform01_sww['form_rp_pengantar_01']=="0"){
                      $POINT_PENG_01 = 0 ;
                     }else{
                      $POINT_PENG_01 = 1 ;
                     }
                     #COUNTING
                     $CN_POINT_RES_01 = $POINT_RES_01 + $POINT_KOND_01 + $POINT_PENG_01;
                     
                  ?>
                  POINT <span class="badge bg-warning"><?PHP echo  $CN_POINT_RES_01; ?>
                  <!-- -->
                </td>
                <td>-</td>
              </tr>		
              <tr>
                <td height="21">VARIAN</td>
                <td>&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
		</table>

        <!-- -->
        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table>
    </div>
    <br>
    <button class="btn btn-success" name="cpf_hmd_up_01">Simpan Data</button>
    &nbsp 
    <?PHP include"E-CPF/CPF_UPDATE_02_HMD_CN.php"; ?>
    
    </form>
	<?PHP include"../LOGIC/PRC/EXE_UP.php"; ?>

</body>
<?PHP }} ?>