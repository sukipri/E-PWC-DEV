    <title>E{CP}Form</title>
<?php
        /* Himpunan INCLUDER */
		    include"../DIST/CFG/CFG_01.php";
            include"../DIST/CFG/CFG_02.php";
        
            ##DATA GET VIEW
			#DATA INAP
			$cpf_vw_vinap01_sw = $CL_Q("$CL_SL Citarum.dbo.TRawatInap WHERE InapNoAdmisi='$IDADM01'");
			$cpf_vw_vinap01_sww = $CL_FAS($cpf_vw_vinap01_sw);


			#DATA PASIEN
			$cpf_vw_vpasien01_sw = $CL_Q("$SL PasienNomorRM,PasienNama,PasienAlamat FROM TPasien WHERE PasienNomorRM='$IDRM01'");
			$cpf_vw_vpasien01_sww = $CL_FAS($cpf_vw_vpasien01_sw);
#--------------------------------------------#
			#DATA VIEW KEG 03
			$cpf_vw_vkeg03_sw = $CL_Q("$CL_SL Citarum.dbo.tb_cpf01_keg_03 WHERE idmain_keg_03='$IDKEG03'");
				$cpf_vw_vkeg03_sww = $CL_FAS($cpf_vw_vkeg03_sw);
			#DATA VIEW KEG02 03
			$cpf_vw_vkeg0203_sw = $CL_Q("$CL_SL Citarum.dbo.tb_cpf01_keg02_03 WHERE idmain_keg_03='$IDKEG03'");
				$cpf_vw_vkeg0203_sww = $CL_FAS($cpf_vw_vkeg0203_sw);	
			#DATA VIEW KEG 01
			$cpf_vw_vkeg01_sw = $CL_Q("$CL_SL Citarum.dbo.tb_cpf01_keg_01 WHERE idmain_keg_01='$IDKEG01'");
				$cpf_vw_vkeg01_sww = $CL_FAS($cpf_vw_vkeg01_sw);
#--------------------------------------------#
			#DATA VIEW KEG02  01
			$cpf_vw02_vkeg01_sw = $CL_Q("$CL_SL Citarum.dbo.tb_cpf01_keg02_01 WHERE idmain_keg_01='$IDKEG01'");
			$cpf_vw02_vkeg01_sww = $CL_FAS($cpf_vw02_vkeg01_sw);
			#DATA VIEW KEG 02
			$cpf_vw_vkeg02_sw = $CL_Q("$CL_SL Citarum.dbo.tb_cpf01_keg_02 WHERE idmain_keg_02='$IDKEG02'");
				$cpf_vw_vkeg02_sww = $CL_FAS($cpf_vw_vkeg02_sw);
			#DATA VIEW KEG 02
			$cpf_vw02_vkeg02_sw = $CL_Q("$CL_SL Citarum.dbo.tb_cpf01_keg02_02 WHERE idmain_keg_02='$IDKEG02'");
				$cpf_vw02_vkeg02_sww = $CL_FAS($cpf_vw02_vkeg02_sw);
#--------------------------------------------#
			#DATA VIEW KEG03  01
			$cpf_vw03_vkeg01_sw = $CL_Q("$CL_SL Citarum.dbo.tb_cpf01_keg03_01 WHERE idmain_keg_01='$IDKEG01'");
			$cpf_vw03_vkeg01_sww = $CL_FAS($cpf_vw03_vkeg01_sw);
			#DATA VIEW KEG03  02
			$cpf_vw03_vkeg02_sw = $CL_Q("$CL_SL Citarum.dbo.tb_cpf01_keg03_02 WHERE idmain_keg_02='$IDKEG02'");
			$cpf_vw03_vkeg02_sww = $CL_FAS($cpf_vw03_vkeg02_sw);
			#DATA VIEW KEG03  03
			$cpf_vw03_vkeg03_sw = $CL_Q("$CL_SL Citarum.dbo.tb_cpf01_keg03_03 WHERE idmain_keg_03='$IDKEG03'");
			$cpf_vw03_vkeg03_sww = $CL_FAS($cpf_vw03_vkeg03_sw);
#--------------------------------------------#
		#Citarum.dbo.tb_cpf01_form_01_head
		$cpf_vw_vformh_sw = $CL_Q("$CL_SL Citarum.dbo.tb_cpf01_form_01_head WHERE idmain_inap_01='$IDADM01'");
			$cpf_vw_vformh_sww = $CL_FAS($cpf_vw_vformh_sw);

			#DATA VIEW KEG  REC
			$cpf_vw_vkeg03rec_sw = $CL_Q("$CL_SL Citarum.dbo.tb_cpf01_keg_03_rec WHERE idmain_keg_03_rec='$IDKEG03REC'");
				$cpf_vw_vkeg03rec_sww = $CL_FAS($cpf_vw_vkeg03rec_sw);
				#TOTAL KEGIATAN 
				$cpf_vw_nr_vkeg03rec_sw = $CL_Q("$SL idmain_keg_03 FROM  Citarum.dbo.tb_cpf01_keg_03_rec WHERE idmain_keg_03='$IDKEG03'");
				$cpf_vw_nr_vkeg03rec_sww = $CL_NR($cpf_vw_nr_vkeg03rec_sw);
				#GENRATING rec_urut_01 
				$cpf_vw_gen_vkeg03rec_sw = $CL_Q("$SL  rec_urut_01 FROM Citarum.dbo.tb_cpf01_keg_03_rec WHERE idmain_keg_03='$IDKEG03' order by rec_urut_01 desc ");
				$cpf_vw_gen_vkeg03rec_sww = $CL_FAS($cpf_vw_gen_vkeg03rec_sw);
				if(empty($cpf_vw_vkeg03rec_sww['rec_urut_01'])){
					$cpf_vw_vkeg03rec_sww_gen = $cpf_vw_gen_vkeg03rec_sww['rec_urut_01'] + 1;
					
				}else{
					$cpf_vw_vkeg03rec_sww_gen = $cpf_vw_vkeg03rec_sww['rec_urut_01'];
				}

				#GENRATING rec_urut_01  KEG02 rec
				$cpf_vw_gen_vkeg0203rec_sw = $CL_Q("$SL  rec_urut_01 FROM Citarum.dbo.tb_cpf01_keg02_03_rec WHERE idmain_keg_03='$IDKEG03' order by rec_urut_01 desc ");
				$cpf_vw_gen_vkeg0203rec_sww = $CL_FAS($cpf_vw_gen_vkeg0203rec_sw);
				if(empty($cpf_vw_vkeg0203rec_sww['rec_urut_01'])){
					$cpf_vw_vkeg0203rec_sww_gen = $cpf_vw_gen_vkeg0203rec_sww['rec_urut_01'] + 1;
					
				}else{
					$cpf_vw_vkeg0203rec_sww_gen = $cpf_vw_vkeg0203rec_sww['rec_urut_01'];
				}

				#GENRATING rec_urut_01  KEG03 rec
				$cpf_vw_gen_vkeg0303rec_sw = $CL_Q("$SL  rec_urut_01 FROM Citarum.dbo.tb_cpf01_keg03_03_rec WHERE idmain_keg_03='$IDKEG03' order by rec_urut_01 desc ");
				$cpf_vw_gen_vkeg0303rec_sww = $CL_FAS($cpf_vw_gen_vkeg0303rec_sw);
				if(empty($cpf_vw_vkeg0303rec_sww['rec_urut_01'])){
					$cpf_vw_vkeg0303rec_sww_gen = $cpf_vw_gen_vkeg0303rec_sww['rec_urut_01'] + 1;
					
				}else{
					$cpf_vw_vkeg0303rec_sww_gen = $cpf_vw_vkeg0303rec_sww['rec_urut_01'];
				}
?>