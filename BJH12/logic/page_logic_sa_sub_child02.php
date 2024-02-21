<?php  
			echo"<br><br>";
				switch(@$sql_sl($_GET['SUB_CHILD02'])){
					

						#####------E-Presece---------#####
						//--MASTER DATA--ENTRI DATA--//
                        #FLAG
						case'EP_MD_01_SD_FLAG_IN': 
							include"../EP/EP_MD_01_SD_FLAG_IN.php";
						break;
                        #JADWAL
                        case'EP_MD_01_SD_JADWAL_IN': 
							include"../EP/EP_MD_01_SD_JADWAL_IN.php";
						break;
						case'EP_MD_01_JDW_IN': 
							include"../EP/EP_MD_01_JDW_IN.php";
						break;
						case'EP_MD_01_JDW_IN02': 
							include"../EP/EP_MD_01_JDW_IN02.php";
						break;
						case'EP_MD_01_JDW_IN03': 
							include"../EP/EP_MD_01_JDW_IN03.php";
						break;
                        case'WS-EP_MD_01_SD_JADWAL_VIEW': 
							include"../EP/WS-EP_MD_01_SD_JADWAL_VIEW.php";
						break;
                        case'WS-EP_MD_01_SD_JADWAL_VIEW_GUSTU': 
							include"../EP/WS-EP_MD_01_SD_JADWAL_VIEW_GUSTU.php";
						break;
                        #GCODE
                        case'EP_MD_01_SD_GCODE_01':
                            include"../EP/EP_MD_01_SD_GCODE_01.php";
                        break;

						#DATA APP
						case'WS-EP_APP_01_RI_JADWAL_VIEW_RT':
                            include"../EP/WS-EP_APP_01_RI_JADWAL_VIEW_RT.php";
                        break;
						case'WS-EP_APP_01_RI_LAP_01':
                            include"../EP/WS-EP_APP_01_RI_LAP_01.php";
                        break;
						case'EP_APP_01_MNL_IN':
                            include"../EP/EP_APP_01_MNL_IN.php";
                        break;
						#Presensi Manual
						case'WS-EP_APP_01_RI_KOM_01_BLN':
							include"../EP/WS-EP_APP_01_RI_KOM_01_BLN.php";
						break;
						case'WS-EP_APP_01_RI_KOM_01_BLN02':
							include"../EP/WS-EP_APP_01_RI_KOM_01_BLN02.php";
						break;
						case'WS-EP_APP_01_RI_LBR':
							include"../EP/WS-EP_APP_01_RI_LBR.php";
						break;
						case'WS-EP_APP_01_RI_LBR02':
							include"../EP/WS-EP_APP_01_RI_LBR02.php";
						break;

					}
					

				?>