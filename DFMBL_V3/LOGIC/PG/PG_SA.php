<?php
     //error_reporting(0);
    switch(@$SQL_SL($_GET['PG_SA'])){
        
        #E-PWC
                default:
                    ?>
                  <!-- <p class="px-3 lead"><?PHP #echo"Hello Selamat Datang <b>$epwc_vkry01_sww[KaryNama]</b>"; ?></p> -->
<?PHP
                break;
                #-------E-Presence----------#
                case'EPWC_EP_APP_01':
                    include"DFMBL/EPWC_EP_APP_01.php";
                break;
                case'EPWC_EP_APP_02':
                    include"DFMBL/EPWC_EP_APP_02.php";
                break;
                case'WS-EPWC_EP_APP_01_VIEW':
                    include"DFMBL/WS-EPWC_EP_APP_01_VIEW.php";
                break;
                case'WS-EPWC_EP_APP_01_VIEW02':
                    include"DFMBL/WS-EPWC_EP_APP_01_VIEW02.php";
                break;
                case'WS-EPWC_EP_APP_01_VIEW02_TB':
                    include"DFMBL/WS-EPWC_EP_APP_01_VIEW02_TB.php";
                break;
                case'WS-EPWC_EP_APP_01_JDW':
                    include"DFMBL/WS-EPWC_EP_APP_01_JDW.php";
                break;
                case'WS-EPWC_EP_APP_JDW_IN':
                    include"DFMBL/WS-EPWC_EP_APP_JDW_IN.php";
                break;
                case'WS-EPWC_EP_APP_JDW_IN02':
                    include"DFMBL/WS-EPWC_EP_APP_JDW_IN02.php";
                break;
                case'WS-EPWC_EP_APP_JDW_LBR':
                    include"DFMBL/WS-EPWC_EP_APP_JDW_LBR.php";
                break;
                case'WS-EPWC_EP_APP_JDW_LBR_APP':
                    include"DFMBL/WS-EPWC_EP_APP_JDW_LBR_APP.php";
                break;
                case'WS-EPWC_EP_APP_JDW_IN02_MNL':
                    include"DFMBL/WS-EPWC_EP_APP_JDW_IN02_MNL.php";
                break;
                case'WS-EPWC_EP_DATA_PRESENSI':
                    include"DFMBL/WS-EPWC_EP_DATA_PRESENSI.php";
                break;
                case'WS-EPWC_EP_DATA_PRESENSI02':
                    include"DFMBL/WS-EPWC_EP_DATA_PRESENSI02.php";
                break;
                #----------PROFILE----------#
                case'EPWC_PROFIL_01':
                    include"DFMBL/EPWC_PROFIL_01.php";
                break;
                #----------IPF---------------#
                case'EPWC_IPF_01_KS':
                    include"DFMBL/EPWC_IPF_01_KS.php";
                break;
                case'EPWC_IPF_01_KS02':
                    include"DFMBL/EPWC_IPF_01_KS02.php";
                break;
                #----------------MORMET-----------------------#
                case'EPWC_MORMET_01':
                    include"DFMBL/EPWC_MORMET_01.php";
                break;
                #----------------OTORISASI FARMASI-----------------------#
                case'EPWC_OTFARM_01_VIEW':
                    include"DFMBL/EPWC_OTFARM_01_VIEW.php";
                break;
                case'EPWC_OTFARM_01_VIEW02':
                    include"DFMBL/EPWC_OTFARM_01_VIEW02.php";
                break;
                 #----------LAYAN POLI---------------#
                 case'EPWC_LAYANPOLI_01':
                    include"DFMBL/EPWC_LAYANPOLI_01.php";
                break;      
                 #----------LEMBUR---------------#       
                 case'EPWC_ELEMBUR_01_IN':
                    include"DFMBL/EPWC_ELEMBUR_01_IN.php";
                break;
                case'EPWC_ELEMBUR_01_IN02':
                    include"DFMBL/EPWC_ELEMBUR_01_IN02.php";
                break;
                case'EPWC_ELEMBUR_01_VIEW02':
                    include"DFMBL/EPWC_ELEMBUR_01_VIEW02.php";
                break;
                case'EPWC_ELEMBUR_01_IN02MLM':
                    include"DFMBL/EPWC_ELEMBUR_01_IN02MLM.php";
                break;
                case'EPWC_ELEMBUR_01_VIEW02HIS':
                    include"DFMBL/EPWC_ELEMBUR_01_VIEW02HIS.php";
                break;
                case'EPWC_ELEMBUR_01_VIEW03':
                    include"DFMBL/EPWC_ELEMBUR_01_VIEW03.php";
                break;
                case'EPWC_ELEMBUR_01_VIEW04':
                    include"DFMBL/EPWC_ELEMBUR_01_VIEW04.php";
                break;
                 
    }
    
?>