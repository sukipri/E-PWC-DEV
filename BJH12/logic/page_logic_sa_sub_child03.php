<?php  
			echo"<br><br>";
				switch(@$_GET['SUB_CHILD03']){
                ##E-PRESENCE
                    #DATA APP  
                    case'WS-EP_APP_01_RI_LAP_01_DAY':
                        include"../EP/WS-EP_APP_01_RI_LAP_01_DAY.php";
                    break;
                    case'WS-EP_APP_01_RI_LAP_01_DAY_IN':
                        include"../EP/WS-EP_APP_01_RI_LAP_01_DAY_IN.php";
                    break;
                    case'WS-EP_APP_01_RI_LAP_01_INOUT':
                        include"../EP/WS-EP_APP_01_RI_LAP_01_INOUT.php";
                    break;
                    case'WS-EP_APP_01_RI_LAP_01_DAY_OUT':
                        include"../EP/WS-EP_APP_01_RI_LAP_01_DAY_OUT.php";
                    break;
                    case'WS-EP_APP_01_RI_LAP_01_KRY':
                        include"../EP/WS-EP_APP_01_RI_LAP_01_KRY.php";
                    break;
                    case'WS-EP_APP_01_RI_LAP_01_KRY02':
                        include"../EP/WS-EP_APP_01_RI_LAP_01_KRY02.php";
                    break;
                    case'WS-EP_APP_01_RI_JADWAL_01_UP':
                        include"../EP/WS-EP_APP_01_RI_JADWAL_01_UP.php";
                    break;
                    case'WS-EP_APP_01_RI_LAP_01_USR01':
                        include"../EP/WS-EP_APP_01_RI_LAP_01_USR01.php";
                    break;
                    case'WS-EP_APP_01_RI_LAP_01_USR02':
                        include"../EP/WS-EP_APP_01_RI_LAP_01_USR02.php";
                    break;
                    case'WS-EP_APP_01_RI_LAP_01_BLN':
                        include"../EP/WS-EP_APP_01_RI_LAP_01_BLN.php";
                    break;
                    case'WS-EP_APP_01_RI_LAP_LBR':
                        include"../EP/WS-EP_APP_01_RI_LAP_LBR.php";
                    break;
                    case'WS-EP_APP_01_RI_LAP_LBR02':
                        include"../EP/WS-EP_APP_01_RI_LAP_LBR02.php";
                    break;

					}
					

				?>