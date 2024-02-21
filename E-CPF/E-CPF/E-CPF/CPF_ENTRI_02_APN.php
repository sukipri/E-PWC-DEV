<?php
		
		 if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
 			include'../LOGIC/PG/PG_H_LOCATION.php';
       }else{

			if($vus01_sww['akses']==6 OR $vus01_sww['akses']==61 ){ 
		
?>
<body>
<?PHP
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

?>
<form method="post">
<table width="100%" class="table table-bordered table-sm" style="max-width:40rem;" border="0">
          <tr>
            <td>
            <h2>CLINICAL PATHWAY FORM</h2>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <select name="form_jenis_01" class="form-control form-control-sm" required>
                <option value="">Kode Form</option>
                <option value="APN">Appendicitis</option>
                 <option value="HMD">Haemorrhoid</option>
                 <option value="HRN">Hernia</option>
                 <option value="STT">Soft Tissue Tumor</option>
                 <option value="UDM">Ulkus DM</option>
          </select>
              </div>
              <input style="max-width:15rem;" type="text" name="form_nama_01" class="form-control form-control-sm" placeholder="keterangan Form.." required autocomplete="off">
              <input style="max-width:12rem;" type="date" name="form_tglinput_01" class="form-control form-control-sm"  req autocomplete="off">
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
<br>
	<?PHP echo"<h3>FORM CODE #$cpf_cq_vform01_sw</h3>"; ?>
 <div style="overflow:auto;width:auto;height:80%;padding:2px;border:1px solid #eee">
    <table width="100%" border="0" class="table  table-sm ">
      <tr>
        <td height="131">
        <!-- -->
        <table width="100%" class="table table-bordered table-sm" border="0">
              <tr>
                <td width="26%" rowspan="4" align="center" style="padding-top:50px;"><b>KEGIATAN</b></td>
                <td width="22%" rowspan="4" align="center" style="padding-top:50px;"><b>URAIAN KEGIATAN</b></td>
                <td colspan="5" align="center" class="table-info">HARI PENYAKIT</td>
                <td width="21%" rowspan="4" align="center" style="padding-top:50px;">KETERANGAN</td>
              </tr>
              <tr>
                <td width="7%"  align="center">0</td>
                <td width="7%"  align="center">1</td>
                <td width="5%"  align="center">2</td>
                <td width="6%"  align="center">3</td>
                <td width="6%"  align="center">4</td>
              </tr>
              <tr>
                <td colspan="5" align="center" class="table-info">HARI RAWAT</td>
              </tr>
              <tr>
                <td align="center">0</td>
                <td align="center">1</td>
                <td align="center">2</td>
                <td align="center">3</td>
                <td align="center">4</td>
              </tr>
              <tr>
                <td class="table-primary"><b>1.ASESMEN AWAL</b></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>ASESMEN AWAL MEDIS</td>
                <td>Dokter IGD</td>
                <!-- 
                <td align="center"><input req name="form_as_igd_01" type="radio" value="0"></td>
                <td align="center"><input req name="form_as_igd_01" type="radio" value="1"></td>
                <td align="center"> <input req  name="form_as_igd_01" type="radio" value="2"></td>
                <td align="center"> <input req   name="form_as_igd_01" type="radio" value="3"></td>
                -->
                <td align="center"><input req  name="form_as_igd_01" type="radio" value="0"></td>
                <td align="center"><input req  name="form_as_igd_01" type="radio" value="1"></td>
                <td align="center"> -</td>
                <td align="center"> -</td>
                <td align="center">&nbsp;</td>
                <td>Pasien Masuk Melalui IGD</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Dokter Spesialis</td>
                <td align="center"><input req  name="form_as_spes_01" type="radio" value="0"></td>
                <td align="center"><input req  name="form_as_spes_01" type="radio" value="1"></td>
                <td align="center">-</td>
                <td align="center">-</td>
                <td align="center">&nbsp;</td>
                <td>Pasien Masuk Melalui RJ</td>
              </tr>
              <tr>
                <td>ASESMEN AWAL KEPERAWATAN</td>
                <td><p>Perawat Primer: Kondisi Umum, Tingkat kesadaran, tanda-tanda  vital, riwayat alergi, skrining gizi,nyeri, status fungsional, risiko jatuh, kebutuhan  edukasi dan budaya</p></td>
                <td align="center"><input req  name="form_as_kdsu_01" type="radio" value="0"></td>
                <td align="center"><input req  name="form_as_kdsu_01" type="radio" value="1"></td>
                <td align="center">-</td>
                <td align="center">-</td>
                <td align="center">&nbsp;</td>
                <td>Dilanjutkan dengan asesmen bio,psiko, sosial, spiritual dan budaya</td>
            </tr>
              <tr class="table-dark">
                <td colspan="8">&nbsp;</td>
              </tr>
              <tr>
                <td class="table-primary"><b>2.LABORATORIUM</b></td>
                <td>CT-BT</td>
                <td align="center"><input req  name="form_lab_ctbt_01" type="radio" value="0"></td>
                <td align="center"><input req  name="form_lab_ctbt_01" type="radio" value="1"></td>
                <td align="center">-</td>
                <td align="center">-</td>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Darah Rutin - NLR</td>
                <td align="center"><input req  name="form_lab_nlr_01" type="radio" value="0"></td>
                <td align="center"><input req  name="form_lab_nlr_01" type="radio" value="1"></td>
                <td align="center">-</td>
                <td align="center">-</td>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>GDS</td>
                <td align="center"><input req  name="form_lab_gds_01" type="radio" value="0"></td>
                <td align="center"><input req  name="form_lab_gds_01" type="radio" value="1"></td>
                <td align="center">-</td>
                <td align="center">-</td>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Swab Antigen</td>
                <td align="center"><input req  name="form_lab_swab_01" type="radio" value="0"></td>
                <td align="center"><input req  name="form_lab_swab_01" type="radio" value="1"></td>
                <td align="center">-</td>
                <td align="center">-</td>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="8" class="table-dark">&nbsp;</td>
              </tr>
              <tr>
                <td class="table-primary"><b>3.RADIOLOGI / IMAGING</b></td>
                <td>ROTGEN THORAX</td>
                <td align="center"><input req  name="form_rad_thorax_01" type="radio" value="0"></td>
                <td align="center"><input req  name="form_rad_thorax_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_rad_thorax_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_rad_thorax_01" type="radio" value="3"></td>
                <td align="center">&nbsp;</td>
                <td>Usai di atas &gt;40th</td>
              </tr>
              <tr>
                <td colspan="8" class="table-dark">&nbsp;</td>
              </tr>
              <tr>
                <td class="table-primary"><b>4.KONSULTASI</b></td>
                <td>&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="8" class="table-dark">&nbsp;</td>
              </tr>
              <tr>
                <td class="table-primary"><b>5.Asesmen Lanjutan</b></td>
                <td>&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>ASSESMEN MEDIS</td>
                <td>Dokter DPJP</td>
                <td align="center"><input req  name="form_as02_dpjp_01" type="radio" value="0"></td>
                <td align="center"><input req  name="form_as02_dpjp_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_as02_dpjp_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_as02_dpjp_01" type="radio" value="3"></td>
                <td align="center"><input req  name="form_as02_dpjp_01" type="radio" value="4"></td>
                <td>Visite Harian/Follow Up</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Dokter Non DPJP/dr Ruangan</td>
                <td align="center"><input req  name="form_as02_ndpjp_01" type="radio" value="0"></td>
                 <td align="center"><input req  name="form_as02_ndpjp_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_as02_ndpjp_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_as02_ndpjp_01" type="radio" value="3"></td>
                <td align="center"><input req  name="form_as02_ndpjp_01" type="radio" value="4"></td>
                <td>Atas Indikasi/Emergency</td>
              </tr>
              <tr>
                <td>ASSESMEN KEPERAWATAN</td>
                <td>Perawat Penanggung Jawab</td>
                <td align="center"><input   name="form_as02_pj_01" type="checkbox" value="0"></td>
         	    <td align="center"><input req  name="form_as02_pj02_01" type="checkbox" value="1"></td>
                <td align="center"><input req  name="form_as02_pj03_01" type="checkbox" value="2"></td>
                <td align="center"><input req  name="form_as02_pj04_01" type="checkbox" value="3"></td>
                <td align="center"><input req  name="form_as02_pj05_01" type="checkbox" value="4"></td>
                <td>Dilakukan dalam 3 shift;</td>
              </tr>
              <tr>
                <td>ASSESMEN GIZI</td>
                <td>Ahli gizi melakukan  pengkajian  gizi lanjut dengan menggunakan form pengkajian gizi dan mendokumentasikan dalam  ADIME</td>
                <td align="center"><input req  name="form_as02_gizi_01" type="radio" value="0"></td>
                  <td align="center"><input req  name="form_as02_gizi_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_as02_gizi_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_as02_gizi_01" type="radio" value="3"></td>
                <td align="center"><input req  name="form_as02_gizi_01" type="radio" value="4"></td>
                <td>Lihat resiko mal nutrisi melalui skrining gizi dan mengkaji data antropometri, biokimia, fisik/klinis , riwayat personal. Asesmen dilakukan dalam waktu 48 jam</td>
              </tr>
              <tr>
                <td>ASSESMEN FARMASI</td>
                <td>Telaah Resep</td>
                <td align="center"><input req  name="form_as02_resep_01" type="radio" value="0"></td>
                 <td align="center"><input req  name="form_as02_resep_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_as02_resep_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_as02_resep_01" type="radio" value="3"></td>
                <td align="center"><input req  name="form_as02_resep_01" type="radio" value="4"></td>
                <td rowspan="2">Dilanjutkan  dengan intervensi farmasi yang sesuai hasil telaah dan rekonsiliasi</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><p>Rekonsiliasi Resep</p></td>
                <td align="center"><input  name="form_as02_reresep_01" type="checkbox" value="0"></td>
                 <td align="center"><input req  name="form_as02_reresep02_01" type="checkbox" value="1"></td>
                <td align="center"><input req  name="form_as02_reresep03_01" type="checkbox" value="2"></td>
                <td align="center"><input req  name="form_as02_reresep04_01" type="checkbox" value="3"></td>
                <td align="center"><input req  name="form_as02_reresep05_01" type="checkbox" value="4"></td>
              </tr>
              <tr>
                <td colspan="8" class="table-dark">&nbsp;</td>
              </tr>
              <tr>
                <td class="table-primary"><b>6.DIAGNOSIS</b></td>
                <td>&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>DIAGNOSIS MEDIS</td>
                <td>&nbsp;</td>
                <td align="center"><input req  name="form_dg_medis_01" type="radio" value="0"></td>
                 <td align="center"><input req  name="form_dg_medis_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_dg_medis_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_dg_medis_01" type="radio" value="3"></td>
                <td align="center"><input req  name="form_dg_medis_01" type="radio" value="4"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>DIAGNOSIS KEPERAWATAN</td>
                <td>Kode : 000132 Nyeri Akut</td>
                <td align="center"><input  name="form_dg_kpr_01" type="checkbox" value="0"></td>
                 <td align="center"><input req  name="form_dg_kpr002_01" type="checkbox" value="1"></td>
                <td align="center"><input req  name="form_dg_kpr003_01" type="checkbox" value="2"></td>
                <td align="center"><input req  name="form_dg_kpr004_01" type="checkbox" value="3"></td>
                <td align="center"><input req  name="form_dg_kpr004_01" type="checkbox" value="4"></td>
                <td rowspan="2">Masalah keperawatan yang dijumpai setiap hari. Dibuat oleh perawat penanggung jawab</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Kode : 00004 Resiko Infeksi</td>
                <td align="center"><input  name="form_dg_kpr02_01" type="checkbox" value="0"></td>
               <td align="center"><input req  name="form_dg_kpr0202_01" type="checkbox" value="1"></td>
                <td align="center"><input req  name="form_dg_kpr0203_01" type="checkbox" value="2"></td>
                <td align="center"><input req  name="form_dg_kpr0204_01" type="checkbox" value="3"></td>
                <td align="center"><input req  name="form_dg_kpr0205_01" type="checkbox" value="4"></td>
              </tr>
              <tr>
                <td>DIAGNOSIS GIZI</td>
                <td>Prediksi suboptimal asupan energi berkaitan rencana tindakan bedah/oprasi ditandai dengan asupan energi lebih rendah dari kebutuhan (NI 1.4)</td>
                <td align="center"><input req  name="form_dg_gizi_01" type="radio" value="0"></td>
                 <td align="center"><input req  name="form_dg_gizi_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_dg_gizi_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_dg_gizi_01" type="radio" value="3"></td>
                <td align="center"><input req  name="form_dg_gizi_01" type="radio" value="4"></td>
                <td>Sesuai dengan data asesmen, kemungkinan  ada diagnosis lain atau diagnosis berubah selama perawatan</td>
              </tr>
              <tr>
                <td class="table-dark">&nbsp;</td>
                <td class="table-dark">&nbsp;</td>
                <td class="table-dark">&nbsp;</td>
                <td class="table-dark">&nbsp;</td>
                <td class="table-dark">&nbsp;</td>
                <td class="table-dark">&nbsp;</td>
                <td class="table-dark">&nbsp;</td>
                <td class="table-dark">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="8" class="table-dark">&nbsp;</td>
              </tr>
              <tr>
                <td class="table-primary"><b>8.DISCHARGE PLANNING</b></td>
                <td>Informasi tentang aktivitas yang dapat dilakukan sesuai dengan tingkat kondisi pasien</td>
                <td align="center"><input req  name="form_dp_aktivitas_01" type="radio" value="0"></td>
        		<td align="center"><input req  name="form_dp_aktivitas_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_dp_aktivitas_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_dp_aktivitas_01" type="radio" value="3"></td>
                <td align="center"><input req  name="form_dp_aktivitas_01" type="radio" value="4"></td>
                <td rowspan="4" style="padding-top:60px;">Program Pendidikan Pasien dan Keluarga</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Terapi yang diberikan mliputi kegunaan obat, dosis dan efek samping</td>
                <td align="center"><input req  name="form_dp_terapi_01" type="radio" value="0"></td>
               	<td align="center"><input req  name="form_dp_terapi_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_dp_terapi_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_dp_terapi_01" type="radio" value="3"></td>
                <td align="center"><input req  name="form_dp_terapi_01" type="radio" value="4"></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Menjelaskan gejala kekambuhan penyakit dan hal yang dilakukan untuk mengatasi gejala yang muncul</td>
                <td align="center"><input req  name="form_dp_gejala_01" type="radio" value="0"></td>
               <td align="center"><input req  name="form_dp_gejala_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_dp_gejala_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_dp_gejala_01" type="radio" value="3"></td>
                <td align="center"><input req  name="form_dp_gejala_01" type="radio" value="4"></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Diet yang dapat dikonsumsi selama pemulihan kondisi yaitu diet lunak yang tidak merangsang dan tinggi energi serta protein</td>
                <td align="center"><input req  name="form_dp_diet_01" type="radio" value="0"></td>
               <td align="center"><input req  name="form_dp_diet_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_dp_diet_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_dp_diet_01" type="radio" value="3"></td>
                <td align="center"><input req  name="form_dp_diet_01" type="radio" value="4"></td>
              </tr>
              <tr>
                <td colspan="8" class="table-dark">&nbsp;</td>
              </tr>
              <tr>

                <td height="40" class="table-primary"><b>8.EDUKASI TERINTEGRASI</b></td>
                <td>&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="40"><p>EDUKASI/INFORMASI MEDIS</p></td>
                <td>Penjelasan Diagnosis</td>
                <td align="center"><input req  name="form_et_diag_01" type="radio" value="0"></td>
                <td align="center"><input req  name="form_et_diag_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_et_diag_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_et_diag_01" type="radio" value="3"></td>
                <td align="center"><input req  name="form_et_diag_01" type="radio" value="3"></td>
                <td rowspan="3">Oleh semua pemberi asuhan berdasarkan kebutuhan dan juga berdasarkan Discharge Planning.
                Pengisian formulir informasi dan edukasi terintergrasi oleh pasien dan atau keluarga
				</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Rencana Terapi</td>
                <td align="center"><input req  name="form_et_terapi_01" type="radio" value="0"></td>
                <td align="center"><input req  name="form_et_terapi_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_et_terapi_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_et_terapi_01" type="radio" value="3"></td>
                <td align="center"><input req  name="form_et_terapi_01" type="radio" value="3"></td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Informed Consent</td>
                <td align="center"><input req  name="form_et_ic_01" type="radio" value="0"></td>
                 <td align="center"><input req  name="form_et_ic_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_et_ic_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_et_ic_01" type="radio" value="3"></td>
                <td align="center"><input req  name="form_et_ic_01" type="radio" value="3"></td>
              </tr>
              <tr>
                <td height="21">EDUKASI DAN KONSELING GIZI</td>
                <td>Diet pra dan paska bedah, Diet Cair, saring lunak, biasa bertahap, tinggi Energi dan Tinggi Protein selama pemulihan.</td>
                <td align="center"><input req  name="form_et_diet_01" type="radio" value="0"></td>
              	<td align="center"><input req  name="form_et_diet_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_et_diet_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_et_diet_01" type="radio" value="3"></td>
                <td align="center"><input req  name="form_et_diet_01" type="radio" value="3"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">EDUKASI KEPERAWATAN</td>
                <td>Edukasi pre operasi</td>
                <td align="center"><input req  name="form_et_preop_01" type="radio" value="0"></td>

               <td align="center"><input req  name="form_et_preop_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_et_preop_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_et_preop_01" type="radio" value="3"></td>
                <td align="center"><input req  name="form_et_preop_01" type="radio" value="3"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Diet selama perawatan</td>
                <td align="center"><input req  name="form_et_diet02_01" type="radio" value="0"></td>
             <td align="center"><input req  name="form_et_diet02_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_et_diet02_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_et_diet02_01" type="radio" value="3"></td>
                <td align="center"><input req  name="form_et_diet02_01" type="radio" value="4"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Tanda-Tanda Infeksi</td>
                <td align="center"><input req  name="form_et_infeksi_01" type="radio" value="0"></td>
               <td align="center"><input req  name="form_et_infeksi_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_et_infeksi_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_et_infeksi_01" type="radio" value="3"></td>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">EDUKASI FARMASI</td>
                <td>Edukasi awal cara penggunaan obat yang tepat</td>
                <td align="center"><input req  name="form_et_obat_01" type="radio" value="0"></td>
        		 <td align="center"><input req  name="form_et_obat_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_et_obat_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_et_obat_01" type="radio" value="3"></td>
                <td align="center"><input req  name="form_et_obat_01" type="radio" value="4"></td>
                <td rowspan="3">Meningkatkan kepatuhan pasien meminum/menggunakan obat</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Evaluasi kepatuhan pasien dalam penggunaan obat </td>
                <td align="center"><input req  name="form_et_psnobat_01" type="radio" value="0"></td>
               <td align="center"><input req  name="form_et_psnobat_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_et_psnobat_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_et_psnobat_01" type="radio" value="3"></td>
                <td align="center"><input req  name="form_et_psnobat_01" type="radio" value="4"></td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Edukasi akhir cara penggunaan obat yang tepat. </td>
                <td align="center"><input req  name="form_et_gunaobat_01" type="radio" value="0"></td>
    			 <td align="center"><input req  name="form_et_gunaobat_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_et_gunaobat_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_et_gunaobat_01" type="radio" value="3"></td>
                <td align="center"><input req  name="form_et_gunaobat_01" type="radio" value="4"></td>
              </tr>
              <tr>
                <td height="21" colspan="8" class="table-dark">&nbsp;</td>
              </tr>
              <tr>
                <td height="21" class="table-primary">PENGISIAN FORMULIR INFORMASI DAN EDUKASI TERINTEGRASI</td>
                <td>Lembar Edukasi Terintegrasi</td>
                <td align="center"><input   name="form_fet_let_01" type="checkbox" value="0"></td>
               <td align="center"><input req  name="form_fet_let02_01" type="checkbox" value="1"></td>
                <td align="center"><input req  name="form_fet_let03_01" type="checkbox" value="2"></td>
                <td align="center"><input req  name="form_fet_let04_01" type="checkbox" value="3"></td>
                <td align="center"><input req  name="form_fet_let04_01" type="checkbox" value="4"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21" colspan="8" class="table-dark">&nbsp;</td>
              </tr>
              <tr>
                <td height="21" class="table-primary">TERAPI/MEDIKAMENTOSA</td>
                <td>&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">Injeksi</td>
                <td>Cefazolin 1 gr</td>
                <td align="center"><input req  name="form_trp_cef_01" type="radio" value="0"></td>
                <td align="center"><input req  name="form_trp_cef_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_trp_cef_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_trp_cef_01" type="radio" value="3"></td>
                <td align="center"><input req  name="form_trp_cef_01" type="radio" value="4"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Anti Nyeri</td>
                <td align="center"><input req  name="form_trp_an_01" type="radio" value="0"></td>
               <td align="center"><input req  name="form_trp_an_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_trp_an_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_trp_an_01" type="radio" value="3"></td>
                <td align="center"><input req  name="form_trp_an_01" type="radio" value="4"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Ketorolac inj</td>
                <td align="center"><input   name="form_trp_keto_01" type="checkbox" value="0"></td>
              <td align="center"><input req  name="form_trp_keto02_01" type="checkbox" value="1"></td>
                <td align="center"><input req  name="form_trp_keto03_01" type="checkbox" value="2"></td>
                <td align="center"><input req  name="form_trp_keto04_01" type="checkbox" value="3"></td>
                <td align="center"><input req  name="form_trp_keto05_01" type="checkbox" value="4"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Anti Muntah</td>
                <td align="center"><input req  name="form_trp_am_01" type="radio" value="0"></td>
                <td align="center"><input req  name="form_trp_am_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_trp_am_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_trp_am_01" type="radio" value="3"></td>
                <td align="center"><input req  name="form_trp_am_01" type="radio" value="4"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Ondancetron inj/Ranitidin tab</td>
                <td align="center"><input req  name="form_trp_rt_01" type="checkbox" value="0"></td>
        	  	 <td align="center"><input req  name="form_trp_rt02_01" type="checkbox" value="1"></td>
                <td align="center"><input req  name="form_trp_rt03_01" type="checkbox" value="2"></td>
                <td align="center"><input req  name="form_trp_rt04_01" type="checkbox" value="3"></td>
                <td align="center"><input req  name="form_trp_rt05_01" type="checkbox" value="4"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">CAIRAN INFUS</td>
                <td>RL</td>
                <td align="center"><input  name="form_trp_rl_01" type="checkbox" value="0"></td>
                <td align="center"><input req  name="form_trp_rl02_01" type="checkbox" value="1"></td>
                <td align="center"><input req  name="form_trp_rl03_01" type="checkbox" value="2"></td>
                <td align="center"><input req  name="form_trp_rl04_01" type="checkbox" value="3"></td>
                <td align="center"><input req  name="form_trp_rl05_01" type="checkbox" value="4"></td>
                <td>Varian</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Metronidazole 500 mg 3x1 tab  5 hari)</td>
                <td align="center"><input req  name="form_trp_met_01" type="radio" value="0"></td>
                 <td align="center"><input req  name="form_trp_met_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_trp_met_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_trp_met_01" type="radio" value="3"></td>
                <td align="center"><input req  name="form_trp_met_01" type="radio" value="4"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Ceftriaxon 2 x 1gr</td>
                <td align="center"><input req  name="form_trp_ceff_01" type="checkbox" value="0"></td>
                 <td align="center"><input req  name="form_trp_ceff02_01" type="checkbox" value="1"></td>
                <td align="center"><input req  name="form_trp_ceff03_01" type="checkbox" value="2"></td>
                <td align="center"><input req  name="form_trp_ceff04_01" type="checkbox" value="3"></td>
                <td align="center"><input req  name="form_trp_ceff05_01" type="checkbox" value="4"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>metronidazale inf 3 x 500 mg</td>
                <td align="center"><input req  name="form_trp_mett_01" type="checkbox" value="0"></td>
                 <td align="center"><input req  name="form_trp_mett02_01" type="checkbox" value="1"></td>
                <td align="center"><input req  name="form_trp_mett03_01" type="checkbox" value="2"></td>
                <td align="center"><input req  name="form_trp_mett04_01" type="checkbox" value="3"></td>
                <td align="center"><input req  name="form_trp_mett05_01" type="checkbox" value="4"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Ranitidine 2x1 tab = 6</td>
                <td align="center"><input req  name="form_trp_ran_01" type="radio" value="0"></td>
                <td align="center"><input req  name="form_trp_ran_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_trp_ran_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_trp_ran_01" type="radio" value="3"></td>
                <td align="center"><input req  name="form_trp_ran_01" type="radio" value="4"></td>
                <td>Obat Pulang</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Paracetamol 500 mg 3x1 tab = 10</td>
                <td align="center"><input req  name="form_trp_para_01" type="radio" value="0"></td>
                <td align="center"><input req  name="form_trp_para_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_trp_para_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_trp_para_01" type="radio" value="3"></td>
                <td align="center"><input req  name="form_trp_para_01" type="radio" value="4"></td>
                <td>Obat Pulang</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>PK/antiseptik</td>
                <td align="center"><input req  name="form_trp_pk_01" type="radio" value="0"></td>
                 <td align="center"><input req  name="form_trp_pk_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_trp_pk_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_trp_pk_01" type="radio" value="3"></td>
                <td align="center"><input req  name="form_trp_pk_01" type="radio" value="4"></td>
                <td>Untuk Pulang</td>
              </tr>
              <tr>
                <td height="21">Obat ANestesi</td>
                <td>Fentanyl</td>
                <td align="center"><input req  name="form_trp_fen_01" type="radio" value="0"></td>
              <td align="center"><input req  name="form_trp_fen_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_trp_fen_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_trp_fen_01" type="radio" value="3"></td>
                <td align="center"><input req  name="form_trp_fen_01" type="radio" value="4"></td>
                <td rowspan="6">Tergantung Pilihan GA/RA</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Propofol</td>
                <td align="center"><input req  name="form_trp_pro_01" type="radio" value="0"></td>
               <td align="center"><input req  name="form_trp_pro_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_trp_pro_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_trp_pro_01" type="radio" value="3"></td>
                <td align="center"><input req  name="form_trp_pro_01" type="radio" value="4"></td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Atracurium Besylate</td>
                <td align="center"><input req  name="form_trp_atr_01" type="radio" value="0"></td>
               <td align="center"><input req  name="form_trp_atr_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_trp_atr_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_trp_atr_01" type="radio" value="3"></td>
                <td align="center"><input req  name="form_trp_atr_01" type="radio" value="4"></td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Isoflurane</td>
                <td align="center"><input req  name="form_trp_iso_01" type="radio" value="0"></td>
                <td align="center"><input req  name="form_trp_iso_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_trp_iso_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_trp_iso_01" type="radio" value="3"></td>
                <td align="center"><input req  name="form_trp_iso_01" type="radio" value="4"></td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Sefoflurane</td>
                <td align="center"><input req  name="form_trp_sef_01" type="radio" value="0"><</td>
              <td align="center"><input req  name="form_trp_sef_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_trp_sef_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_trp_sef_01" type="radio" value="3"></td>
                <td align="center"><input req  name="form_trp_sef_01" type="radio" value="4"></td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>N2O, 02</td>
                <td align="center"><input req  name="form_trp_n2o_01" type="radio" value="0"></td>
              	<td align="center"><input req  name="form_trp_n2o_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_trp_n2o_01" type="radio" value="2"></td>
                <td align="center"><input req  name="form_trp_n2o_01" type="radio" value="3"></td>
                <td align="center"><input req  name="form_trp_n2o_01" type="radio" value="4"></td>
              </tr>
              <tr>
                <td height="21" colspan="8" class="table-dark">&nbsp;</td>
              </tr>
              <tr>
                <td height="21" class="table-primary">TATA LAKSANA /INTERVENSI</td>
                <td>&nbsp;</td>
                <td align="center">&nbsp;</td>
             	<td align="center">&nbsp;</td>
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
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">TATA LAKSANA /INTERVENSI KEPERAWATAN</td>
                <td>NIC : 1400 Manajemen Nyeri</td>
                <td align="center"><input  name="form_int_nic14_01" type="checkbox" value="0"></td>
              <td align="center"><input   name="form_int_nic1402_01" type="checkbox" value="1"></td>
                <td align="center"><input   name="form_int_nic1403_01" type="checkbox" value="2"></td>
                <td align="center"><input   name="form_int_nic1404_01" type="checkbox" value="3"></td>
                <td align="center"><input   name="form_int_nic1404_01" type="checkbox" value="4"></td>
                <td rowspan="4">MENGACU PADA NIC</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>NIC : 6540 Control Infeksi </td>
                <td align="center"><input   name="form_int_nic65_01" type="checkbox" value="0"></td>
            	<td align="center"><input  name="form_int_nic6502_01" type="checkbox" value="1"></td>
                <td align="center"><input   name="form_int_nic6503_01" type="checkbox" value="2"></td>
                <td align="center"><input  name="form_int_nic6504_01" type="checkbox" value="3"></td>
                <td align="center"><input  name="form_int_nic6504_01" type="checkbox" value="4"></td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>NIC : 2317 Kolaborasi Obat IV</td>
                <td align="center"><input  name="form_int_nic231_01" type="checkbox" value="0"></td>
                <td align="center"><input   name="form_int_nic23102_01" type="checkbox" value="1"></td>
                <td align="center"><input   name="form_int_nic23103_01" type="checkbox" value="2"></td>
                <td align="center"><input   name="form_int_nic23104_01" type="checkbox" value="3"></td>
                <td align="center"><input   name="form_int_nic23104_01" type="checkbox" value="4"></td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>NIC : 2304 Kolaborasi Obat Oral</td>
                <td align="center"><input   name="form_int_nic230_01" type="checkbox" value="0"></td>
               <td align="center"><input   name="form_int_nic23002_01" type="checkbox" value="1"></td>
                <td align="center"><input name="form_int_nic23003_01" type="checkbox" value="2"></td>
                <td align="center"><input  name="form_int_nic23004_01" type="checkbox" value="3"></td>
                <td align="center"><input  name="form_int_nic23004_01" type="checkbox" value="4"></td>
              </tr>
              <tr>
                <td height="21">TATA LAKSANA /INTERVENSI  GIZI</td>
                <td>Diet cair/saring/biasa secara bertahap pasca bedah. Diet TETP (Tinggi Energi Tinggi Protein) selama pemulihan</td>
                <td align="center"><input   name="form_int_tetp_01" type="checkbox" value="0"></td>
               <td align="center"><input   name="form_int_tetp02_01" type="checkbox" value="1"></td>
                <td align="center"><input   name="form_int_tetp03_01" type="checkbox" value="2"></td>
                <td align="center"><input  name="form_int_tetp04_01" type="checkbox" value="3"></td>
                <td align="center"><input  name="form_int_tetp04_01" type="checkbox" value="4"></td>
                <td>Bentuk makanan , kebutuhan zat gizi di disesuaikan dengan usia dan kondisi klinis secara bertahap</td>
              </tr>
              <tr>
                <td height="21">TATA LAKSANA /INTERVENSI  FARMASI</td>
                <td>Konfirmasi obat dan rekomendasi pada DPJP bila terjadi masalah dalam pengobatan (Dosis, Kontraindikasi, Interaksi Obat Mayor)</td>
                <td align="center"><input   name="form_int_obatmayor_01" type="checkbox" value="0"></td>
               	<td align="center"><input  name="form_int_obatmayor02_01" type="checkbox" value="1"></td>
                <td align="center"><input   name="form_int_obatmayor03_01" type="checkbox" value="2"></td>
                <td align="center"><input   name="form_int_obatmayor04_01" type="checkbox" value="3"></td>
                <td align="center"><input   name="form_int_obatmayor04_01" type="checkbox" value="4"></td>
                <td>menyusun software interaksi dilanjutkan dengan intervensi farmasi sesuai hasil monitoring</td>
              </tr>
              <tr>
                <td height="21" colspan="8" class="table-dark">&nbsp;</td>
              </tr>
              <tr>
                <td height="21" class="table-primary">MONITORING DAN EVALUASI</td>
                <td>&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">DOKTER DPJP</td>
                <td>Asesmen Ulang dan Review Verifikasi Rencana Asuhan</td>
                <td align="center"><input   name="form_mon_rev_01" type="checkbox" value="0"></td>
                <td align="center"><input   name="form_mon_rev02_01" type="checkbox" value="1"></td>
                <td align="center"><input   name="form_mon_rev03_01" type="checkbox" value="2"></td>
                <td align="center"><input   name="form_mon_rev04_01" type="checkbox" value="3"></td>
                <td align="center"><input   name="form_mon_rev04_01" type="checkbox" value="4"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">KEPERAWATAN</td>
                <td>Monitoring penurunan skala nyeri pasien</td>
                <td align="center"><input  name="form_mon_skala_01" type="checkbox" value="0"></td>
               <td align="center"><input   name="form_mon_skala02_01" type="checkbox" value="1"></td>
                <td align="center"><input   name="form_mon_skala03_01" type="checkbox" value="2"></td>
                <td align="center"><input   name="form_mon_skala04_01" type="checkbox" value="3"></td>
                <td align="center"><input   name="form_mon_skala04_01" type="checkbox" value="4"></td>
                <td>Mengacu pada  NOC</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Monitoring Implementasi mandiri teknik relaksasi untuk menurunkan nyeri</td>
                <td align="center"><input   name="form_mon_imp_01" type="checkbox" value="0"></td>
             	<td align="center"><input   name="form_mon_imp02_01" type="checkbox" value="1"></td>
                <td align="center"><input   name="form_mon_imp03_01" type="checkbox" value="2"></td>
                <td align="center"><input   name="form_mon_imp04_01" type="checkbox" value="3"></td>
                <td align="center"><input   name="form_mon_imp05_01" type="checkbox" value="4"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Monitoring tanda-tanda kecemasan yang dialami pasien</td>
                <td align="center"><input   name="form_mon_tanda_01" type="checkbox" value="0"></td>
                <td align="center"><input   name="form_mon_tanda02_01" type="checkbox" value="1"></td>
                <td align="center"><input   name="form_mon_tanda03_01" type="checkbox" value="2"></td>
                <td align="center"><input   name="form_mon_tanda04_01" type="checkbox" value="3"></td>
                <td align="center"><input   name="form_mon_tanda05_01" type="checkbox" value="4"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Evaluasi pemahaman pasien tentang prosedur tindakan yang akan dilakukan</td>
                <td align="center"><input   name="form_mon_pro_01" type="checkbox" value="0"></td>
                <td align="center"><input   name="form_mon_pro02_01" type="checkbox" value="1"></td>
                <td align="center"><input   name="form_mon_pro03_01" type="checkbox" value="2"></td>
                <td align="center"><input   name="form_mon_pro04_01" type="checkbox" value="3"></td>
                <td align="center"><input   name="form_mon_pro05_01" type="checkbox" value="4"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Monitoring ekspresi non verbal pasien (pasien menunjukkan ekspresi  lebih tenang dan pasien mengungkapkan lebih aman dan nyaman</td>
                <td align="center"><input   name="form_mon_verbal_01" type="checkbox" value="0"></td>
                   <td align="center"><input   name="form_mon_verbal02_01" type="checkbox" value="1"></td>
                    <td align="center"><input   name="form_mon_verbal03_01" type="checkbox" value="2"></td>
                    <td align="center"><input  name="form_mon_verbal04_01" type="checkbox" value="3"></td>
                    <td align="center"><input  name="form_mon_verbal05_01" type="checkbox" value="4"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Monitoring implementasi mandiri terapi relaksasi untuk menurunkan  kecemasan</td>
                <td align="center"><input  name="form_mon_terapi_01" type="checkbox" value="0"></td>
                 <td align="center"><input  name="form_mon_terapi02_01" type="checkbox" value="1"></td>
                    <td align="center"><input  name="form_mon_terapi03_01" type="checkbox" value="2"></td>
                    <td align="center"><input   name="form_mon_terapi04_01" type="checkbox" value="3"></td>
                    <td align="center"><input   name="form_mon_terapi05_01" type="checkbox" value="4"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Monitoring keseimbangan cairan</td>
                <td align="center"><input   name="form_mon_cairan_01" type="checkbox" value="0"></td>
                <td align="center"><input   name="form_mon_cairan02_01" type="checkbox" value="1"></td>
                    <td align="center"><input   name="form_mon_cairan03_01" type="checkbox" value="2"></td>
                    <td align="center"><input   name="form_mon_cairan04_01" type="checkbox" value="3"></td>
                    <td align="center"><input   name="form_mon_cairan05_01" type="checkbox" value="4"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Monitoring tanda-tanda infeksi</td>
                <td align="center"><input   name="form_mon_infeksi_01" type="checkbox" value="0"></td>
                	 <td align="center"><input req  name="form_mon_infeksi02_01" type="checkbox" value="1"></td>
                    <td align="center"><input req  name="form_mon_infeksi03_01" type="checkbox" value="2"></td>
                    <td align="center"><input req  name="form_mon_infeksi04_01" type="checkbox" value="3"></td>
                    <td align="center"><input req  name="form_mon_infeksi05_01" type="checkbox" value="4"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">GIZI</td>
                <td>Monitoring asupan makanan</td>
                <td align="center"><input req  name="form_mon_asupan_01" type="radio" value="0"></td>
                <td align="center"><input req  name="form_mon_asupan_01" type="radio" value="1"></td>
                    <td align="center"><input req  name="form_mon_asupan_01" type="radio" value="2"></td>
                    <td align="center"><input req  name="form_mon_asupan_01" type="radio" value="3"></td>
                    <td align="center"><input req  name="form_mon_asupan_01" type="radio" value="4"></td>
                <td rowspan="4">Sesuai dengan masalah gizi dan tanda gejala yang akan dilihat kemajuannya.
                					Mengacu pada IDNT (International Diestetics dan Nutrition Terminology)
				</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Monitoring Antropomeri</td>
                <td align="center"><input req  name="form_mon_ant_01" type="radio" value="0"></td>
                 <td align="center"><input req  name="form_mon_ant_01" type="radio" value="1"></td>
                    <td align="center"><input req  name="form_mon_ant_01" type="radio" value="2"></td>
                    <td align="center"><input req  name="form_mon_ant_01" type="radio" value="3"></td>
                    <td align="center"><input req  name="form_mon_ant_01" type="radio" value="4"></td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Monitoring Biokimia</td>
                <td align="center"><input req  name="form_mon_bio_01" type="radio" value="0"></td>
                <td align="center"><input req  name="form_mon_bio_01" type="radio" value="1"></td>
                    <td align="center"><input req  name="form_mon_bio_01" type="radio" value="2"></td>
                    <td align="center"><input req  name="form_mon_bio_01" type="radio" value="3"></td>
                    <td align="center"><input req  name="form_mon_bio_01" type="radio" value="4"></td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Monitoring Fisik/Klinis terkait Gizi</td>
                <td align="center"><input req  name="form_mon_fisik_01" type="radio" value="0"></td>
              		  <td align="center"><input req  name="form_mon_fisik_01" type="radio" value="1"></td>
                    <td align="center"><input req  name="form_mon_fisik_01" type="radio" value="2"></td>
                    <td align="center"><input req  name="form_mon_fisik_01" type="radio" value="3"></td>
                    <td align="center"><input req  name="form_mon_fisik_01" type="radio" value="4"></td>
              </tr>
              <tr>
                <td height="21">FARMASI</td>
                <td>Monitoring Interaksi Obat</td>
                <td align="center"><input req  name="form_mon_interaksi_01" type="radio" value="0"></td>
                  <td align="center"><input req  name="form_mon_interaksi_01" type="radio" value="1"></td>
                    <td align="center"><input req  name="form_mon_interaksi_01" type="radio" value="2"></td>
                    <td align="center"><input req  name="form_mon_interaksi_01" type="radio" value="3"></td>
                    <td align="center"><input req  name="form_mon_interaksi_01" type="radio" value="4"></td>
                <td rowspan="3">Menyusun software interaksi dilanjutkan dengan intervensi farmasi yang sesuai </td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Monitoring Efek Samping Obat</td>
                <td align="center"><input req  name="form_mon_efek_01" type="radio" value="0"></td>
                  <td align="center"><input req  name="form_mon_efek_01" type="radio" value="1"></td>
                    <td align="center"><input req  name="form_mon_efek_01" type="radio" value="2"></td>
                    <td align="center"><input req  name="form_mon_efek_01" type="radio" value="3"></td>
                    <td align="center"><input req  name="form_mon_efek_01" type="radio" value="4"></td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Monitoring efektivitas obat dengan melihat TD</td>
                <td align="center"><input req  name="form_mon_td_01" type="radio" value="0"></td>
                	 <td align="center"><input req  name="form_mon_td_01" type="radio" value="1"></td>
                    <td align="center"><input req  name="form_mon_td_01" type="radio" value="2"></td>
                    <td align="center"><input req  name="form_mon_td_01" type="radio" value="3"></td>
                    <td align="center"><input req  name="form_mon_td_01" type="radio" value="4"></td>
              </tr>
              <tr>
                <td height="21" colspan="8" class="table-dark">&nbsp;</td>
              </tr>
              <tr>
                <td height="21" class="table-primary">MOBILISASI/REHABILITASI</td>
                <td>&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
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
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">KEPERAWATAN</td>
                <td>Dibantu sebagian/Mandiri</td>
                <td align="center"><input req  name="form_mob_mandiri_01" type="radio" value="0"></td>
               <td align="center"><input req  name="form_mob_mandiri_01" type="radio" value="1"></td>
                    <td align="center"><input req  name="form_mob_mandiri_01" type="radio" value="2"></td>
                    <td align="center"><input req  name="form_mob_mandiri_01" type="radio" value="3"></td>
                    <td align="center"><input req  name="form_mob_mandiri_01" type="radio" value="4"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21" colspan="8" class="table-dark">&nbsp;</td>
              </tr>
              <tr>
                <td height="21" class="table-primary">OUTCOME / HASIL</td>
                <td>&nbsp;</td>
                <td align="center">&nbsp;</td>
                	 <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">MEDIS</td>
                <td>Nyeri daerah operasi (-)</td>
                <td align="center"><input req  name="form_out_nyeri_01" type="radio" value="0"></td>
              		 <td align="center"><input req  name="form_out_nyeri_01" type="radio" value="1"></td>
                    <td align="center"><input req  name="form_out_nyeri_01" type="radio" value="2"></td>
                    <td align="center"><input req  name="form_out_nyeri_01" type="radio" value="3"></td>
                    <td align="center"><input req  name="form_out_nyeri_01" type="radio" value="4"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Luka Operasi kering dan bersih</td>
                <td align="center"><input req  name="form_out_op_01" type="radio" value="0"></td>
                 <td align="center"><input req  name="form_out_op_01" type="radio" value="1"></td>
                    <td align="center"><input req  name="form_out_op_01" type="radio" value="2"></td>
                    <td align="center"><input req  name="form_out_op_01" type="radio" value="3"></td>
                    <td align="center"><input req  name="form_out_op_01" type="radio" value="4"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">KEPERAWATAN</td>
                <td>NOC : 1605 Control Nyeri</td>
                <td align="center"><input req  name="form_out_noc16_01" type="radio" value="0"></td>
                 <td align="center"><input req  name="form_out_noc16_01" type="radio" value="1"></td>
                    <td align="center"><input req  name="form_out_noc16_01" type="radio" value="2"></td>
                    <td align="center"><input req  name="form_out_noc16_01" type="radio" value="3"></td>
                    <td align="center"><input req  name="form_out_noc16_01" type="radio" value="4"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>NOC : 0703 Severity Infeksi</td>
                <td align="center"><input req  name="form_out_noc07_01" type="radio" value="0"></td>
               <td align="center"><input req  name="form_out_noc07_01" type="radio" value="1"></td>
                    <td align="center"><input req  name="form_out_noc07_01" type="radio" value="2"></td>
                    <td align="center"><input req  name="form_out_noc07_01" type="radio" value="3"></td>
                    <td align="center"><input req  name="form_out_noc07_01" type="radio" value="4"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">GIZI</td>
                <td>Asupan makanan > 80%</td>
                <td align="center"><input req  name="form_out_asupan_01" type="radio" value="0"></td>
                <td align="center"><input req  name="form_out_asupan_01" type="radio" value="1"></td>
                    <td align="center"><input req  name="form_out_asupan_01" type="radio" value="2"></td>
                    <td align="center"><input req  name="form_out_asupan_01" type="radio" value="3"></td>
                    <td align="center"><input req  name="form_out_asupan_01" type="radio" value="4"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Opimalisasi Status Gizi</td>
                <td align="center"><input req  name="form_out_gizi_01" type="radio" value="0"></td>
               <td align="center"><input req  name="form_out_gizi_01" type="radio" value="1"></td>
                    <td align="center"><input req  name="form_out_gizi_01" type="radio" value="2"></td>
                    <td align="center"><input req  name="form_out_gizi_01" type="radio" value="3"></td>
                    <td align="center"><input req  name="form_out_gizi_01" type="radio" value="4"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">FARMASI</td>
                <td>Terapi obat sesuai indikasi</td>
                <td align="center"><input req  name="form_out_indikasi_01" type="radio" value="0"></td>
                <td align="center"><input req  name="form_out_indikasi_01" type="radio" value="1"></td>
                    <td align="center"><input req  name="form_out_indikasi_01" type="radio" value="2"></td>
                    <td align="center"><input req  name="form_out_indikasi_01" type="radio" value="3"></td>
                    <td align="center"><input req  name="form_out_indikasi_01" type="radio" value="4"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Obat rasional</td>
                <td align="center"><input req  name="form_out_rasional_01" type="radio" value="0"></td>
               	<td align="center"><input req  name="form_out_rasional_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_out_rasional_01" type="radio" value="2"></td>
                 <td align="center"><input req  name="form_out_rasional_01" type="radio" value="3"></td>
                 <td align="center"><input req  name="form_out_rasional_01" type="radio" value="4"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21" colspan="8" class="table-dark">&nbsp;</td>
              </tr>
              <tr>
                <td height="21">KRITERIA PULANG</td>
                <td>&nbsp;</td>
                <td align="center"><input req  name="form_kp_pulang_01" type="radio" value="0"></td>
              <td align="center"><input req  name="form_kp_pulang_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_kp_pulang_01" type="radio" value="2"></td>
                 <td align="center"><input req  name="form_kp_pulang_01" type="radio" value="3"></td>
                 <td align="center"><input req  name="form_kp_pulang_01" type="radio" value="4"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21">RENCANA PULANG/EDUKASI PELAYANAN LANJUTAN</td>
                <td>Resume Medis dan Keperawatan</td>
                <td align="center"><input req  name="form_rp_resume_01" type="radio" value="0"></td>
                <td align="center"><input req  name="form_rp_resume_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_rp_resume_01" type="radio" value="2"></td>
                 <td align="center"><input req  name="form_rp_resume_01" type="radio" value="3"></td>
                 <td align="center"><input req  name="form_rp_resume_01" type="radio" value="4"></td>
                <td rowspan="3">Pasien membawa Resume Perawatan/Surat Rujukan/ Surat Kontrol/ Homecare saat pulang</td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Penjelasan diberikan sesuai dengan keadaan umum pasien</td>
                <td align="center"><input req  name="form_rp_kondisi_01" type="radio" value="0"></td>
               <td align="center"><input req  name="form_rp_kondisi_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_rp_kondisi_01" type="radio" value="2"></td>
                 <td align="center"><input req  name="form_rp_kondisi_01" type="radio" value="3"></td>
                 <td align="center"><input req  name="form_rp_kondisi_01" type="radio" value="4"></td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>Surat pengantar kontrol</td>
                <td align="center"><input req  name="form_rp_pengantar_01" type="radio" value="0"></td>
               <td align="center"><input req  name="form_rp_pengantar_01" type="radio" value="1"></td>
                <td align="center"><input req  name="form_rp_pengantar_01" type="radio" value="2"></td>
                 <td align="center"><input req  name="form_rp_pengantar_01" type="radio" value="3"></td>
                 <td align="center"><input req  name="form_rp_pengantar_01" type="radio" value="4"></td>
              </tr>
              <tr>
                <td height="21">VARIAN</td>
                <td>&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
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
    <button class="btn btn-success" name="cpf_apn_simpan_01">Simpan Data</button>
    </form>
	<?PHP include"../LOGIC/PRC/EXE_MIX.php"; ?>

</body>
<?PHP }} ?>