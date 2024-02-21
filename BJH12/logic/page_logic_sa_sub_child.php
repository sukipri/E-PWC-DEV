<?php  
			echo"<br><br>";
				switch(@$_GET['SUB_CHILD']){
					//kry
						case'EMP_M_AKUN_M_DAF':
							include"EMP_M_AKUN_M_DAF.php";
						break;
						case'EMP_M_AKUN_M_DAF_GL':
							include"EMP_M_AKUN_M_DAF_GL.php";
						break;
						case'EMP_M_AKUN_M_MNG':
							include"EMP_M_AKUN_M_MNG.php";
						break;
						case'EMP_M_AKUN_M_UNIT':
							include"EMP_M_AKUN_M_UNIT.php";	
						break;
						case'EMP_M_PESAN_M_01_NEW':
							include"EMP_M_PESAN_M_01_NEW.php";
						break;
						
					//DIV
						case'DIV_M_DIV_M_VAR_DTL':
							include"DIV_M_DIV_M_VAR_DTL.php";
						break;
					//KOP
						case'RPT_M_DUTY_01_M':
							include"RPT_M_DUTY_01_M.php";
						break;
					//FINANCE
						case'FIN_M_FIN_GAJI_POINT_M_01':
							include"FIN_M_FIN_GAJI_POINT_M_01.php";
						break;
						case'FIN_M_FIN_GAJI_REKAP_THR_M_NATAL':
							include"FIN_M_FIN_GAJI_REKAP_THR_M_NATAL.php";
						break;
						case'FIN_M_FIN_GAJI_REKAP_THR_M_PASKAH':
							include"FIN_M_FIN_GAJI_REKAP_THR_M_PASKAH.php";
						break;
						case'FIN_M_FIN_GAJI_REKAP_THR_M_SHU':
							include"FIN_M_FIN_GAJI_REKAP_THR_M_SHU.php";
						break;
						case'FIN_M_FIN_GAJI_REKAP_THR_M_VAL':
							include"FIN_M_FIN_GAJI_REKAP_THR_M_VAL.php";
						break;
						case'FIN_M_FIN_LEMBUR01':
							include"FIN_M_FIN_LEMBUR01.php";
						break;
						case'FIN_M_FIN_LEMBUR01_DTL':
							include"FIN_M_FIN_LEMBUR01_DTL.php";
						break;
						case'FIN_M_FIN_LEMBUR01_DTL02':
							include"FIN_M_FIN_LEMBUR01_DTL02.php";
						break;
						case'FIN_M_FIN_LEMBUR02':
							include"FIN_M_FIN_LEMBUR02.php";
						break;


						case'EP_MD_01':
							include"../EP/EP_MD_01.php";
						break;

						#E-Presece
						#Master DATA
						case'EP_MD_01_SD':
							include"../EP/EP_MD_01_SD.php";
						break;
						
						#DATA APP
						case'EP_APP_01_TRIAL_01':
							include"../EP/EP_APP_01_TRIAL_01.php";
						break;
						case'WS-EP_APP_01_TRIAL_02':
							include"../EP/WS-EP_APP_01_TRIAL_02.php";
						break;
						case'WS-EP_APP_01_RI_JADWAL_01':
							include"../EP/WS-EP_APP_01_RI_JADWAL_01.php";
						break;
						case'EP_APP_01_MNL':
                            include"../EP/EP_APP_01_MNL.php";
                        break;
						
						#E-SIP
						case'SIP_MD_01_NK_IN':
							include"../SIP/SIP_MD_01_NK_IN.php";
						break;
						case'SIP_MD_01_NK_VIEW':
							include"../SIP/SIP_MD_01_NK_VIEW.php";
						break;
						case'SIP_APP_01_FL_RKK':
							include"../SIP/SIP_APP_01_FL_RKK.php";
						break;
						case'SIP_APP_01_FL_SIP':
							include"../SIP/SIP_APP_01_FL_SIP.php";
						break;
								

					}
					

				?>