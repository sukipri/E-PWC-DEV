	<?php  
			switch(@$_GET['HLM']){
					default:
						include"FIRST_PAGE.php";
					break;
					case'MENU_02':
						include"MENU_02.php";
					break;
		//KRY
				case'EMP_M':
					include"EMP_M.php";
				break;
		//KOP
				case'KOP_M':
					include"KOP_M.php";
				break;
		//APP_DUTY
				case'APP_DUTY_01':
					include"APP_DUTY_01.php";
				break;
				
				case'APP_DUTY_02':
					include"APP_DUTY_02.php";
				break;
				case'APP_DUTY_03':
					include"APP_DUTY_03.php";
				break;
				case'APP_DUTY_IN_01':
					include"APP_DUTY_IN_01.php";
				break;
				case'APP_DUTY_IN_01_UPDATE':
					include"APP_DUTY_IN_01_UPDATE.php";
				break;
				case'APP_DUTY_IN_01_UPDATE_ISI':
					include"APP_DUTY_IN_01_UPDATE_ISI.php";
				break;
				case'APP_DUTY_IN_01_UPDATE_PART':
					include"APP_DUTY_IN_01_UPDATE_PART.php";
				break;
		//DIVISION
				case'DIV_M':
					include"DIV_M.php";
				break;
		//FINANCE
				case'FIN_M':
					include"FIN_M.php";
				break;
		//Jadwal Tugas / rapat
				case'APP_DUTY_IN_DAFTAR':
					include"APP_DUTY_IN_DAFTAR.php";
				break;
		//REPORT
				case'RPT_M':
					include"RPT_M.php";
				break;


		#E-Presece
					//--BEGINING MENU--//
					case'EP_HOME_01':
						include"../EP/EP_HOME_01.php";
					break;

		#SIP
					case'SIP_HOME_01':
						include"../SIP/SIP_HOME_01.php";
					break;
				}

 	?> 