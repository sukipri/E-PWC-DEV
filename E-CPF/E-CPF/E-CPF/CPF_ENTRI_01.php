<?php
		
		 if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
 			include'../LOGIC/PG/PG_H_LOCATION.php';
       }else{

			if($vus01_sww['akses']==6 OR $vus01_sww['akses']==61 ){ 
		
?>
<body>
	<h3>Pencarian Pasien...</h3>
    <form method="post">
	<div class="input-group input-group-sm mb-3" style="max-width:20rem;">
      <input type="text" class="form-control form-control-sm" name="cpf_nomorrm_01" required autocomplete="off" placeholder="Cari Nomor RM.." aria-label="Recipient's username" aria-describedby="basic-addon2">
      <button class="btn btn-primary btn-sm" name="cpf_cari_rm_01">Cari Data</button>
	</div>
    	<b>#Riwayat Pemeriksaan</b>
			<!-- -->
            <?PHP 
					if(isset($_POST['cpf_cari_rm_01'])){
						$cpf_nomorrm_01 = @$SQL_SL($_POST['cpf_nomorrm_01']);
			?>
           <table width="100%" border="0" class="table table-bordered table-striped table-sm">
                  <tr>
                    <td width="10%">#</td>
                    <td width="15%">pasien</td>
                     <td width="28%">Tanggal Masuk</td>
                    <td width="20%">##</td>
                  </tr>
                <?PHP
					$cpf_inap_no = 1;
						$cpf_vinap01_sw = $CL_Q("$SL InapNoAdmisi,PasienNomorRM,InapTglMasuk FROM Citarum.dbo.TRawatInap WHERE PasienNomorRM='$cpf_nomorrm_01' order by InapTglMasuk desc");
							while($cpf_vinap01_sww = $CL_FAS($cpf_vinap01_sw)){
								//--Data Pasien--//
								$cpf_vpsn01_sw = $CL_Q("$SL PasienNomorRM,PasienNama FROM TPasien WHERE PasienNomorRM='$cpf_vinap01_sww[PasienNomorRM]'");
									$cpf_vpsn01_sww = $CL_FAS($cpf_vpsn01_sw);
								//--Data Rekam Medis--//
								$cpf_vrm01_sw = $CL_Q("$SL RMNoReg,PasienNomorRM,RMDiagRuang,RMDiagMasuk,RMDiagKode,RMDiagNama FROM TRekamMedis WHERE PasienNomorRM='$cpf_vpsn01_sww[PasienNomorRM]' AND RMNoReg='$cpf_vinap01_sww[InapNoAdmisi]'");
									$cpf_vrm01_sww = $CL_FAS($cpf_vrm01_sw);
								
				?>
                  <tr>
                    <td><?PHP echo"$cpf_vinap01_sww[InapNoAdmisi]"; ?></td>
                    <td><?PHP echo"$cpf_vpsn01_sww[PasienNama]"; ?></td>
                    <td><?PHP echo"$cpf_vinap01_sww[InapTglMasuk]"; ?>
	                    <hr>
                    	<?PHP echo"Diagnosa <b>$cpf_vrm01_sww[RMDiagNama]</b>"; ?>
                    </td>
                    <td align="center">
                    	<?PHP 
								$cpf_cn_vcform01_sw = $CL_Q("$SL idmain_cpf_form_01,InapNoAdmisi,PasienNomorRM FROM tb_cpf_form_01 WHERE InapNoAdmisi='$cpf_vinap01_sww[InapNoAdmisi]'  ");
		   							$cpf_cn_vcform01_sww = $CL_NR($cpf_cn_vcform01_sw);
									
									if($cpf_cn_vcform01_sww > 0){
						?>
                        	<span class="nadge-danger">Maaf No Admisi Sudah digunakan</span>
                        <?PHP }else{ ?>
						
							<!--
                        <a href="<?PHP //echo"?PG_SA=CPF_ENTRI_02_APN&IDRM01=$cpf_vpsn01_sww[PasienNomorRM]&IDADM01=$cpf_vinap01_sww[InapNoAdmisi]"; ?>" class="btn btn-dark btn-sm"><i class="fas fa-file-export"></i>&nbsp;Proses Entri CPF *Rumah-Sakit </a>
						<br>
						<a href="<?PHP //echo"?PG_SA=CPF_ENTRI_03_DM&IDRM01=$cpf_vpsn01_sww[PasienNomorRM]&IDADM01=$cpf_vinap01_sww[InapNoAdmisi]"; ?>" class="btn btn-primary btn-sm"><i class="fas fa-file-export"></i>&nbsp;Proses Entri CPF *Nasional </a>
						-->
						
                    	<?PHP } ?>
						<b>-Non-Bedah-</b> <br>
							<?PHP 
								#DATA KASUS
								$cpf_vkeg03_sw = $CL_Q("$CL_SL Citarum.dbo.tb_cpf01_keg_03 order by keg_nama_03 asc");
									while($cpf_vkeg03_sww = $CL_FAS($cpf_vkeg03_sw)){
										echo"<a href='?PG_SA=CPF01_CP_01_FORM&IDADM01=$cpf_vinap01_sww[InapNoAdmisi]&IDRM01=$cpf_vinap01_sww[PasienNomorRM]&IDKEG03=$cpf_vkeg03_sww[idmain_keg_03]' class='btn btn-outline-success btn-sm'><i class='fas fa-download'></i> $cpf_vkeg03_sww[keg_nama_03]</a>";
										echo"&nbsp";
									}
							?>
							<br><br>
							<b>-Bedah-</b> <br>
							<?PHP 
								#DATA KASUS
								$cpf_vkeg0203_sw = $CL_Q("$CL_SL Citarum.dbo.tb_cpf01_keg02_03 order by keg_nama_03 asc");
									while($cpf_vkeg0203_sww = $CL_FAS($cpf_vkeg0203_sw)){
										echo"<a href='?PG_SA=CPF01_CP02_01_FORM&IDADM01=$cpf_vinap01_sww[InapNoAdmisi]&IDRM01=$cpf_vinap01_sww[PasienNomorRM]&IDKEG03=$cpf_vkeg0203_sww[idmain_keg_03]' class='btn btn-outline-danger btn-sm'><i class='fas fa-download'></i> $cpf_vkeg0203_sww[keg_nama_03]</a>";
										echo"&nbsp";
									}
							?>
							<br><br>
							<b>-Obsgin-</b> <br>
							<?PHP 
								#DATA KASUS
								$cpf_vkeg0303_sw = $CL_Q("$CL_SL Citarum.dbo.tb_cpf01_keg03_03 order by keg_nama_03 asc");
									while($cpf_vkeg0303_sww = $CL_FAS($cpf_vkeg0303_sw)){
										echo"<a href='?PG_SA=CPF01_CP03_01_FORM&IDADM01=$cpf_vinap01_sww[InapNoAdmisi]&IDRM01=$cpf_vinap01_sww[PasienNomorRM]&IDKEG03=$cpf_vkeg0303_sww[idmain_keg_03]' class='btn btn-outline-primary btn-sm'><i class='fas fa-download'></i> $cpf_vkeg0303_sww[keg_nama_03]</a>";
										echo"&nbsp";
									}
							?>


                    </td>
                  </tr>
                    <?PHP $cpf_inap_no++; } ?>
	</table>
  	<?PHP } ?>
 	</form>
</body>
<?PHP }} ?>