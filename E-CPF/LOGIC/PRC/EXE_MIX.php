      
<?PHP 
	/*-------------------------------------------------------*/
    /* 	################E-CPF NEW CONCEPT##########            */
    /*-----------------------------------------------------*/

		###### INSERT AND UPDATE ###############
		
		#CPF01_MD_KEG_01_IN -Non Bedah-
		#VARIABLE
		$keg_urut_01 = @$SQL_SL($_POST['keg_urut_01']);
		$keg_nama_01 = @$SQL_SL($_POST['keg_nama_01']);
		$keg_ket_01 = @$SQL_SL($_POST['keg_ket_01']);
		#PROCCESSING INSERT DATA -NON BEDAH-
		if(isset($_POST['keg_simpan_01'])){ 
		$keg_save_01 = $CL_Q("$IN Citarum.dbo.tb_cpf01_keg_01(idmain_keg_01,keg_kode_01,keg_nama_01,keg_ket_01,keg_status_01)VALUES('$IDMAIN','KG01- $DATE_ymd$TIME_his','$keg_nama_01','$keg_ket_01','2')");
		if($keg_save_01){
			header("LOCATION:?PG_SA=CPF01_MD_KEG_01&PG_SA_SUB=CPF01_MD_KEG_01_IN");
		}else{
			include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
		} }
		#PROCCESSING UPDATE -NON BEDAH-
		if(isset($_POST['keg_up_01'])){
			$keg_up_01 = $CL_Q("$UP Citarum.dbo.tb_cpf01_keg_01 SET keg_nama_01='$keg_nama_01',keg_ket_01='$keg_ket_01',keg_urut_01='$keg_urut_01' WHERE idmain_keg_01='$IDKEG01'");	
			if($keg_up_01){
				header("LOCATION:?PG_SA=CPF01_MD_KEG_01&PG_SA_SUB=CPF01_MD_KEG_01_IN");
			}else{
				include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
			} }
		/*-----------------------------------------------------*/
		#PROCCESSING INSERT DATA -BEDAH-
		if(isset($_POST['keg02_simpan_01'])){ 
			$keg_save_01 = $CL_Q("$IN Citarum.dbo.tb_cpf01_keg02_01(idmain_keg_01,keg_kode_01,keg_nama_01,keg_ket_01,keg_status_01)VALUES('$IDMAIN','KG02- $DATE_ymd$TIME_his','$keg_nama_01','$keg_ket_01','2')");
			if($keg_save_01){
				header("LOCATION:?PG_SA=CPF01_MD_KEG02_01&PG_SA_SUB=CPF01_MD_KEG02_01_IN");
			}else{
				include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
			} }
		#PROCCESSING UPDATE -BEDAH-
		if(isset($_POST['keg02_up_01'])){
			$keg_up_01 = $CL_Q("$UP Citarum.dbo.tb_cpf01_keg02_01 SET keg_nama_01='$keg_nama_01',keg_ket_01='$keg_ket_01',keg_urut_01='$keg_urut_01' WHERE idmain_keg_01='$IDKEG01'");	
			if($keg_up_01){
				header("LOCATION:?PG_SA=CPF01_MD_KEG02_01&PG_SA_SUB=CPF01_MD_KEG02_01_IN");
			}else{
				include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
			} }
/*-----------------------------------------------------*/
			#PROCCESSING INSERT DATA -OBSGIN-
		if(isset($_POST['keg03_simpan_01'])){ 
			$keg_save_01 = $CL_Q("$IN Citarum.dbo.tb_cpf01_keg03_01(idmain_keg_01,keg_kode_01,keg_nama_01,keg_ket_01,keg_status_01)VALUES('$IDMAIN','KG02- $DATE_ymd$TIME_his','$keg_nama_01','$keg_ket_01','2')");
			if($keg_save_01){
				header("LOCATION:?PG_SA=CPF01_MD_KEG03_01&PG_SA_SUB=CPF01_MD_KEG03_01_IN");
			}else{
				include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
			} }
		#PROCCESSING UPDATE -OBSGIN-
		if(isset($_POST['keg03_up_01'])){
			$keg_up_01 = $CL_Q("$UP Citarum.dbo.tb_cpf01_keg03_01 SET keg_nama_01='$keg_nama_01',keg_ket_01='$keg_ket_01',keg_urut_01='$keg_urut_01' WHERE idmain_keg_01='$IDKEG01'");	
			if($keg_up_01){
				header("LOCATION:?PG_SA=CPF01_MD_KEG03_01&PG_SA_SUB=CPF01_MD_KEG03_01_IN");
			}else{
				include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
			} }
/*-----------------------------------------------------*/
		#CPF01_MD_KEG_01_IN02 -Non BEdah-
			#VARIABLE
			$idmain_keg_01 = @$SQL_SL($_POST['idmain_keg_01']);
			$keg_rawat_02 = @$SQL_SL($_POST['keg_rawat_02']);
			$keg_nama_02 = @$SQL_SL($_POST['keg_nama_02']);
			$keg_ket_02 = @$SQL_SL($_POST['keg_ket_02']);
			#PROCCESSING INSERT
			if(isset($_POST['keg_simpan_02'])){
			$keg_save_02 = $CL_Q("$IN Citarum.dbo.tb_cpf01_keg_02(idmain_keg_02,idmain_keg_01,keg_nama_02,keg_ket_02,keg_status_02)VALUES('$IDMAIN','$idmain_keg_01','$keg_nama_02','$keg_ket_02','2')");
			if($keg_save_02){
				header("LOCATION:?PG_SA=CPF01_MD_KEG_01&PG_SA_SUB=CPF01_MD_KEG_01_IN02");
			}else{
				include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
			} }
			#PROCCESSING UPDATE
			if(isset($_POST['keg_up_02'])){
			$keg_up_02 = $CL_Q("$UP Citarum.dbo.tb_cpf01_keg_02 SET idmain_keg_01='$idmain_keg_01',keg_nama_02='$keg_nama_02',keg_ket_02='$keg_ket_02',keg_rawat_02='$keg_rawat_02' WHERE idmain_keg_02='$IDKEG02'");
			if($keg_up_02){
				header("LOCATION:?PG_SA=CPF01_MD_KEG_01&PG_SA_SUB=CPF01_MD_KEG_01_IN02");
			}else{
				include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
			} }
/*-----------------------------------------------------*/
		#CPF01_MD_KEG02_01_IN02 -OBSGIN-
			#PROCCESSING INSERT
			if(isset($_POST['keg02_simpan_02'])){
			$keg_save_02 = $CL_Q("$IN Citarum.dbo.tb_cpf01_keg02_02(idmain_keg_02,idmain_keg_01,keg_nama_02,keg_ket_02,keg_status_02)VALUES('$IDMAIN','$idmain_keg_01','$keg_nama_02','$keg_ket_02','2')");
			if($keg_save_02){
				header("LOCATION:?PG_SA=CPF01_MD_KEG02_01&PG_SA_SUB=CPF01_MD_KEG02_01_IN02");
			}else{
				include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
			} }
			#PROCCESSING UPDATE
			if(isset($_POST['keg02_up_02'])){
			$keg_up_02 = $CL_Q("$UP Citarum.dbo.tb_cpf01_keg02_02 SET idmain_keg_01='$idmain_keg_01',keg_nama_02='$keg_nama_02',keg_ket_02='$keg_ket_02',keg_rawat_02='$keg_rawat_02' WHERE idmain_keg_02='$IDKEG02'");
			if($keg_up_02){
				header("LOCATION:?PG_SA=CPF01_MD_KEG02_01&PG_SA_SUB=CPF01_MD_KEG02_01_IN02");
			}else{
				include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
			} }
/*-----------------------------------------------------*/
		#CPF01_MD_KEG02_01_IN02 -Bedah-
			#PROCCESSING INSERT
			if(isset($_POST['keg03_simpan_02'])){
				$keg_save_02 = $CL_Q("$IN Citarum.dbo.tb_cpf01_keg03_02(idmain_keg_02,idmain_keg_01,keg_nama_02,keg_ket_02,keg_status_02)VALUES('$IDMAIN','$idmain_keg_01','$keg_nama_02','$keg_ket_02','2')");
				if($keg_save_02){
					header("LOCATION:?PG_SA=CPF01_MD_KEG03_01&PG_SA_SUB=CPF01_MD_KEG03_01_IN02");
				}else{
					include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
				} }
				#PROCCESSING UPDATE
				if(isset($_POST['keg03_up_02'])){
				$keg_up_02 = $CL_Q("$UP Citarum.dbo.tb_cpf01_keg03_02 SET idmain_keg_01='$idmain_keg_01',keg_nama_02='$keg_nama_02',keg_ket_02='$keg_ket_02',keg_rawat_02='$keg_rawat_02' WHERE idmain_keg_02='$IDKEG02'");
				if($keg_up_02){
					header("LOCATION:?PG_SA=CPF01_MD_KEG03_01&PG_SA_SUB=CPF01_MD_KEG03_01_IN02");
				}else{
					include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
				} }
		/*-----------------------------------------------------*/
		#CPF01_MD_KEG_01_IN03 -Non Bedah-
		#VARIABLE
			$keg_rawat_03 = @$SQL_SL($_POST['keg_rawat_03']);
			$keg_nama_03 = @$SQL_SL($_POST['keg_nama_03']);
			$keg_ket_03 = @$SQL_SL($_POST['keg_ket_03']);
			#PROCCESSING INSERT
			if(isset($_POST['keg_simpan_03'])){
			$keg_save_02 = $CL_Q("$IN Citarum.dbo.tb_cpf01_keg_03(idmain_keg_03,keg_kode_03,keg_nama_03,keg_ket_03,keg_status_03)VALUES('$IDMAIN','KG03-$DATE_ymd$TIME_his','$keg_nama_03','$keg_ket_03','2')");
			if($keg_save_02){
				header("LOCATION:?PG_SA=CPF01_MD_KEG_01&PG_SA_SUB=CPF01_MD_KEG_01_IN03");
			}else{
				include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
			} }
			#PROCCESSING UPDATE
			if(isset($_POST['keg_up_03'])){
				$keg_up_03 = $CL_Q("$UP Citarum.dbo.tb_cpf01_keg_03 SET keg_nama_03='$keg_nama_03',keg_ket_03='$keg_ket_03',keg_rawat_03='$keg_rawat_03' WHERE idmain_keg_03='$IDKEG03' ");
			if($keg_up_03){
				header("LOCATION:?PG_SA=CPF01_MD_KEG_01&PG_SA_SUB=CPF01_MD_KEG_01_IN03REC");
			}else{
				include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
			} }
/*-----------------------------------------------------*/
			#CPF01_MD_KEG02_01_IN03  -Bedah-
				#PROCCESSING INSERT
				if(isset($_POST['keg02_simpan_03'])){
					$keg_save_02 = $CL_Q("$IN Citarum.dbo.tb_cpf01_keg02_03(idmain_keg_03,keg_kode_03,keg_nama_03,keg_ket_03,keg_status_03)VALUES('$IDMAIN','KG03-$DATE_ymd$TIME_his','$keg_nama_03','$keg_ket_03','2')");
					if($keg_save_02){
						header("LOCATION:?PG_SA=CPF01_MD_KEG02_01&PG_SA_SUB=CPF01_MD_KEG02_01_IN03");
					}else{
						include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
					} }
					#PROCCESSING UPDATE
					if(isset($_POST['keg02_up_03'])){
						$keg_up_03 = $CL_Q("$UP Citarum.dbo.tb_cpf01_keg02_03 SET keg_nama_03='$keg_nama_03',keg_ket_03='$keg_ket_03',keg_rawat_03='$keg_rawat_03' WHERE idmain_keg_03='$IDKEG03' ");
					if($keg_up_03){
						header("LOCATION:?PG_SA=CPF01_MD_KEG02_01&PG_SA_SUB=CPF01_MD_KEG02_01_IN03REC");
					}else{
						include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
					} }
/*-----------------------------------------------------*/
			#CPF01_MD_KEG03_01_IN03  -Obsgin-
				#PROCCESSING INSERT
				if(isset($_POST['keg03_simpan_03'])){
					$keg_save_02 = $CL_Q("$IN Citarum.dbo.tb_cpf01_keg03_03(idmain_keg_03,keg_kode_03,keg_nama_03,keg_ket_03,keg_status_03)VALUES('$IDMAIN','KG03-$DATE_ymd$TIME_his','$keg_nama_03','$keg_ket_03','2')");
					if($keg_save_02){
						header("LOCATION:?PG_SA=CPF01_MD_KEG02_01&PG_SA_SUB=CPF01_MD_KEG02_01_IN03");
					}else{
						include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
					} }
					#PROCCESSING UPDATE
					if(isset($_POST['keg03_up_03'])){
						$keg_up_03 = $CL_Q("$UP Citarum.dbo.tb_cpf01_keg03_03 SET keg_nama_03='$keg_nama_03',keg_ket_03='$keg_ket_03',keg_rawat_03='$keg_rawat_03' WHERE idmain_keg_03='$IDKEG03' ");
					if($keg_up_03){
						header("LOCATION:?PG_SA=CPF01_MD_KEG02_01&PG_SA_SUB=CPF01_MD_KEG02_01_IN03REC");
					}else{
						include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
					} }
			
		/*-----------------------------------------------------*/
		#CPF01_MD_KEG_01_IN03REC  -Non Bedah-
		if(isset($_GET['SAVEKEG03REC'])){
		 #PROCCESSING
		 $keg_save_03rec = $CL_Q("$IN Citarum.dbo.tb_cpf01_keg_03_rec(idmain_keg_03_rec,idmain_keg_02,idmain_keg_03,rec_kode_01,idmain_keg_01)VALUES('$IDMAIN','$IDKEG02','$IDKEG03','REC01-$DATE_ymd$TIME_his','$IDKEG01')");
		if($keg_save_03rec){
				header("LOCATION:?PG_SA=CPF01_MD_KEG_01&PG_SA_SUB=CPF01_MD_KEG_01_IN03REC02&IDKEG03=$IDKEG03");
			}else{
				include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
			} }
/*-----------------------------------------------------*/
		#CPF01_MD_KEG02_01_IN03REC -Bedah-
		if(isset($_GET['SAVEKEG0203REC'])){
			#PROCCESSING
			$keg_save_03rec = $CL_Q("$IN Citarum.dbo.tb_cpf01_keg02_03_rec(idmain_keg_03_rec,idmain_keg_02,idmain_keg_03,rec_kode_01,idmain_keg_01)VALUES('$IDMAIN','$IDKEG02','$IDKEG03','REC01-$DATE_ymd$TIME_his','$IDKEG01')");
		   if($keg_save_03rec){
				   header("LOCATION:?PG_SA=CPF01_MD_KEG02_01&PG_SA_SUB=CPF01_MD_KEG02_01_IN03REC02&IDKEG03=$IDKEG03");
			   }else{
				   include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
			   } }
/*-----------------------------------------------------*/
		#CPF01_MD_KEG_01_IN03REC -Non Bedah-
		#VARIABLE
		$rec_rawat_01 = @$SQL_SL($_POST['rec_rawat_01']);
		$rec_urut_01 = @$SQL_SL($_POST['rec_urut_01']);
		#PROCCESSING UPDATE VALUES
		if(isset($_POST['rec_up_01'])){
		$rec_up_01 = $CL_Q("$UP  Citarum.dbo.tb_cpf01_keg_03_rec SET rec_rawat_01='$rec_rawat_01',rec_urut_01='$rec_urut_01' WHERE idmain_keg_03_rec='$IDKEG03REC'");
		if($rec_up_01){
				header("LOCATION:?PG_SA=CPF01_MD_KEG_01&PG_SA_SUB=CPF01_MD_KEG_01_FORM&IDKEG03=$IDKEG03");
			}else{
				include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
			} }
/*-----------------------------------------------------*/
		#CPF01_MD_KEG02_01_IN03REC -Bedah-
		#PROCCESSING UPDATE VALUES
		if(isset($_POST['rec02_up_01'])){
			$rec02_up_01 = $CL_Q("$UP  Citarum.dbo.tb_cpf01_keg02_03_rec SET rec_rawat_01='$rec_rawat_01',rec_urut_01='$rec_urut_01' WHERE idmain_keg_03_rec='$IDKEG03REC'");
			if($rec02_up_01){
					header("LOCATION:?PG_SA=CPF01_MD_KEG02_01&PG_SA_SUB=CPF01_MD_KEG02_01_FORM&IDKEG03=$IDKEG03");
				}else{
					include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
				} }
/*-----------------------------------------------------*/
		#CPF01_CP_01_FORM -Non Bedah-
		#PROCCESSING INSERT
		if(isset($_POST['cp_simpan_01'])){
			#echo "OKEE";
			$cpf_cp_02 = 1;
			while($cpf_cp_02 <= $cpf_nr_vkeg03rec_sww){
			$rec_angka_01 = @$_POST['rec_angka_01'.$cpf_cp_02];
			$idmain_kegf_01 = @$_POST['idmain_kegf_01'.$cpf_cp_02];
			$idmain_keg_03_rec = @$_POST['idmain_keg_03_rec'.$cpf_cp_02];
			$cpf_save_form_01 = $CL_Q("$IN tb_cpf01_form_01(idmain_cpf01_form_01,idmain_pasien_01,idmain_inap_01,idmain_keg_03_rec,form_kode_01,form_nilai_01,form_nilai02_01,idmain_keg_03,form_uploader,form_status_01,idmain_keg_01,form_tglinput_01)VALUES('$IDMAIN-$cpf_cp_02','$IDRM01','$IDADM01','$idmain_keg_03_rec','CP$IDKODE-$cpf_cp_02','$rec_angka_01','0','$IDKEG03','$vus01_sww[idmain]','1','$idmain_kegf_01','$DATE_HTML5_SQL $TIME_HTML5')"); #QUERING DATA
			#echo"$rec_angka_01<br>";
			#echo"$cpf_cp_02<br>"; 
			$cpf_cp_02++; } 
			header("LOCATION:?PG_SA=CPF01_CP_01_FORM&IDADM01=$IDADM01&IDRM01=$IDRM01&IDKEG03=$IDKEG03");
			}
		#PROCCESSING UPDATE form_nilai_01
		if(isset($_POST['cp_up_01'])){
			#echo "OKEE";
			$cpf_cp_02 = 1;
			while($cpf_cp_02 <= $cpf_nr_vkeg03rec_sww){
			$rec_angka_01 = @$_POST['rec_angka_01'.$cpf_cp_02];
			$idmain_keg_03_rec = @$_POST['idmain_keg_03_rec'.$cpf_cp_02];
			$idmain_cpf01_form_01 = @$_POST['idmain_cpf01_form_01'.$cpf_cp_02];
			$cpf_up_form_01 = $CL_Q("$UP tb_cpf01_form_01 SET form_nilai_01='$rec_angka_01' WHERE idmain_cpf01_form_01='$idmain_cpf01_form_01' "); #QUERING DATA
			#echo"$rec_angka_01<br>";
			#echo"$cpf_cp_02<br>"; 
			$cpf_cp_02++; } 
			header("LOCATION:?PG_SA=CPF01_CP_01_FORM&IDADM01=$IDADM01&IDRM01=$IDRM01&IDKEG03=$IDKEG03");
			}
		#PROCCESSING UPLOAD form_nilai02_01
		if(isset($_POST['cp_upload_01'])){
			#echo "OKEE";
			$cpf_cp_02 = 1;
			while($cpf_cp_02 <= $cpf_nr_vkeg03rec_sww){
			$idmain_cpf01_form_01 = @$_POST['idmain_cpf01_form_01'.$cpf_cp_02];
			$form_nilai02_01 = @$_POST['form_nilai02_01'.$cpf_cp_02];
			$cpf_upload_form_01 = $CL_Q("$UP tb_cpf01_form_01 SET form_nilai02_01='$form_nilai02_01' WHERE idmain_cpf01_form_01='$idmain_cpf01_form_01' "); #QUERING DATA
			#echo"$rec_angka_01<br>";
			#echo"$cpf_cp_02<br>"; 
			$cpf_cp_02++; } 
			header("LOCATION:?PG_SA=CPF01_CP_01_FORM&IDADM01=$IDADM01&IDRM01=$IDRM01&IDKEG03=$IDKEG03");
			}
		#PROCCESSING UPDATE form_01_head 
		if(isset($_POST['cp_tutup_01'])){
			$cpf_keg01_no02 = 1;
			$idmain_keg_01 = @$_POST['idmain_keg_01'];
			while($cpf_keg01_no02 <=  $cpf_nr_vkeg01_sw){
				$head_tot_01 = @$_POST['head_tot_01'.$cpf_keg01_no02];
				$head_tot_02 = @$_POST['head_tot_02'.$cpf_keg01_no02];
				$idmain_keg_01 = @$_POST['idmain_keg_01'.$cpf_keg01_no02];
				#echo $head_tot_01."<br>";
				$cpf_save_form_01_head = $CL_Q("$IN tb_cpf01_form_01_head(idmain_cpf01_form_01_head,idmain_inap_01,head_kode_01,head_tot_01,head_tot02_02,head_tglinput_01,head_status_01,idmain_keg_03,idmain_keg_01,uploader)VALUES('$IDMAIN-$cpf_keg01_no02','$IDADM01','HD-$IDKODE-$cpf_keg01_no02','$head_tot_01','$head_tot_02','$DATE_HTML5_SQL $TIME_HTML5','1','$IDKEG03','$idmain_keg_01','$vus01_sww[idmain]')");
			$cpf_keg01_no02++; }
			header("LOCATION:?PG_SA=CPF01_CP_01_FORM&IDADM01=$IDADM01&IDRM01=$IDRM01&IDKEG03=$IDKEG03");
		}
/*-----------------------------------------------------*/

		#CPF01_CP02_01_FORM -Bedah-
		#PROCCESSING INSERT
		if(isset($_POST['cp02_simpan_01'])){
			#echo "OKEE";
			$cpf_cp_02 = 1;
			while($cpf_cp_02 <= $cpf_nr_vkeg03rec_sww){
			$rec_angka_01 = @$_POST['rec_angka_01'.$cpf_cp_02];
			$idmain_kegf_01 = @$_POST['idmain_kegf_01'.$cpf_cp_02];
			$idmain_keg_03_rec = @$_POST['idmain_keg_03_rec'.$cpf_cp_02];
			$cpf_save_form_01 = $CL_Q("$IN tb_cpf01_form02_01(idmain_cpf01_form_01,idmain_pasien_01,idmain_inap_01,idmain_keg_03_rec,form_kode_01,form_nilai_01,form_nilai02_01,idmain_keg_03,form_uploader,form_status_01,idmain_keg_01,form_tglinput_01)VALUES('$IDMAIN-$cpf_cp_02','$IDRM01','$IDADM01','$idmain_keg_03_rec','CP$IDKODE-$cpf_cp_02','$rec_angka_01','0','$IDKEG03','$vus01_sww[idmain]','1','$idmain_kegf_01','$DATE_HTML5_SQL $TIME_HTML5')"); #QUERING DATA
			#echo"$rec_angka_01<br>";
			#echo"$cpf_cp_02<br>"; 
			$cpf_cp_02++; } 
			header("LOCATION:?PG_SA=CPF01_CP02_01_FORM&IDADM01=$IDADM01&IDRM01=$IDRM01&IDKEG03=$IDKEG03");
			}
		#PROCCESSING UPDATE form_nilai_01
		if(isset($_POST['cp02_up_01'])){
			#echo "OKEE";
			$cpf_cp_02 = 1;
			while($cpf_cp_02 <= $cpf_nr_vkeg03rec_sww){
			$rec_angka_01 = @$_POST['rec_angka_01'.$cpf_cp_02];
			$idmain_keg_03_rec = @$_POST['idmain_keg_03_rec'.$cpf_cp_02];
			$idmain_cpf01_form_01 = @$_POST['idmain_cpf01_form_01'.$cpf_cp_02];
			$cpf_up_form_01 = $CL_Q("$UP tb_cpf01_form02_01 SET form_nilai_01='$rec_angka_01' WHERE idmain_cpf01_form_01='$idmain_cpf01_form_01' "); #QUERING DATA
			#echo"$rec_angka_01<br>";
			#echo"$cpf_cp_02<br>"; 
			$cpf_cp_02++; } 
			header("LOCATION:?PG_SA=CPF01_CP02_01_FORM&IDADM01=$IDADM01&IDRM01=$IDRM01&IDKEG03=$IDKEG03");
			}
		#PROCCESSING UPLOAD form_nilai02_01
		if(isset($_POST['cp02_upload_01'])){
			#echo "OKEE";
			$cpf_cp_02 = 1;
			while($cpf_cp_02 <= $cpf_nr_vkeg03rec_sww){
			$idmain_cpf01_form_01 = @$_POST['idmain_cpf01_form_01'.$cpf_cp_02];
			$form_nilai02_01 = @$_POST['form_nilai02_01'.$cpf_cp_02];
			$cpf_upload_form_01 = $CL_Q("$UP tb_cpf01_form02_01 SET form_nilai02_01='$form_nilai02_01' WHERE idmain_cpf01_form_01='$idmain_cpf01_form_01' "); #QUERING DATA
			#echo"$rec_angka_01<br>";
			#echo"$cpf_cp_02<br>"; 
			$cpf_cp_02++; } 
			header("LOCATION:?PG_SA=CPF01_CP02_01_FORM&IDADM01=$IDADM01&IDRM01=$IDRM01&IDKEG03=$IDKEG03");
			}
		#PROCCESSING UPDATE form_01_head 
		if(isset($_POST['cp02_tutup_01'])){
			$cpf_keg01_no02 = 1;
			$idmain_keg_01 = @$_POST['idmain_keg_01'];
			while($cpf_keg01_no02 <=  $cpf_nr_vkeg01_sw){
				$head_tot_01 = @$_POST['head_tot_01'.$cpf_keg01_no02];
				$head_tot_02 = @$_POST['head_tot_02'.$cpf_keg01_no02];
				$idmain_keg_01 = @$_POST['idmain_keg_01'.$cpf_keg01_no02];
				#echo $head_tot_01."<br>";
				$cpf_save_form_01_head = $CL_Q("$IN tb_cpf01_form02_01_head(idmain_cpf01_form_01_head,idmain_inap_01,head_kode_01,head_tot_01,head_tot02_02,head_tglinput_01,head_status_01,idmain_keg_03,idmain_keg_01,uploader)VALUES('$IDMAIN-$cpf_keg01_no02','$IDADM01','HD-$IDKODE-$cpf_keg01_no02','$head_tot_01','$head_tot_02','$DATE_HTML5_SQL $TIME_HTML5','1','$IDKEG03','$idmain_keg_01','$vus01_sww[idmain]')");
			$cpf_keg01_no02++; }
			header("LOCATION:?PG_SA=CPF01_CP02_01_FORM&IDADM01=$IDADM01&IDRM01=$IDRM01&IDKEG03=$IDKEG03");
		}
	/*-----------------------------------------------------*/	
		
		#######DELETE QUERY############
		
		#CPF01_MD_KEG_01_IN
		if(isset($_GET['DELKEG01'])){
			#PROCCESSING
			$keg_del_01 = $CL_Q("$DL FROM Citarum.dbo.tb_cpf01_keg_01 WHERE idmain_keg_01='$IDDELKEG01'");
		if($keg_del_01){
			header("LOCATION:?PG_SA=CPF01_MD_KEG_01&PG_SA_SUB=CPF01_MD_KEG_01_IN");
		}else{
			include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
		} }
/*-----------------------------------------------------*/	
		#CPF01_MD_KEG02_01_IN
		if(isset($_GET['DELKEG0201'])){ 
			#PROCCESSING
			$keg_del_01 = $CL_Q("$DL FROM Citarum.dbo.tb_cpf01_keg02_01 WHERE idmain_keg_01='$IDDELKEG01'");
		if($keg_del_01){
			header("LOCATION:?PG_SA=CPF01_MD_KEG02_01&PG_SA_SUB=CPF01_MD_KEG02_01_IN");
		}else{
			include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
		} }
/*-----------------------------------------------------*/	
		if(isset($_GET['DELKEG0301'])){
			#PROCCESSING
			$keg_del_01 = $CL_Q("$DL FROM Citarum.dbo.tb_cpf01_keg03_01 WHERE idmain_keg_01='$IDDELKEG01'");
		if($keg_del_01){
			header("LOCATION:?PG_SA=CPF01_MD_KEG03_01&PG_SA_SUB=CPF01_MD_KEG03_01_IN");
		}else{
			include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
		} }
/*-----------------------------------------------------*/	
		#CPF01_MD_KEG_01_IN03REC02
		if(isset($_GET['DELKEG03REC'])){
			#PROCCESSING
			$keg_del_03rec = $CL_Q("$DL FROM Citarum.dbo.tb_cpf01_keg_03_rec WHERE idmain_keg_03_rec='$IDDELKEG03REC'");
			
		if($keg_del_03rec){
			header("LOCATION:?PG_SA=CPF01_MD_KEG_01&PG_SA_SUB=CPF01_MD_KEG_01_IN03REC02&IDKEG03=$IDKEG03");
		}else{
			include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
		} }
/*-----------------------------------------------------*/	
		#CPF01_MD_KEG02_01_IN03REC02
		if(isset($_GET['DELKEG0203REC'])){
			#PROCCESSING
			$keg_del_0203rec = $CL_Q("$DL FROM Citarum.dbo.tb_cpf01_keg02_03_rec WHERE idmain_keg_03_rec='$IDDELKEG0203REC'");
			
		if($keg_del_0203rec){
			header("LOCATION:?PG_SA=CPF01_MD_KEG02_01&PG_SA_SUB=CPF01_MD_KEG02_01_IN03REC02&IDKEG03=$IDKEG03");
			#include"../LAYOUT/NOTIF/NF_SAVE_SUCCESS.php";
		}else{
			include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
		} }
/*-----------------------------------------------------*/	
		
		
	
   ?>
<!-- -->
