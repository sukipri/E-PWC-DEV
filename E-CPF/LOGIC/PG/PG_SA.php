<?php
     //error_reporting(0);
    switch(@$SQL_SL($_GET['PG_SA'])){
     
  
        /*--------------------------*/
                /* CPF/
        /*---------------------------*/
            /*--CPF*/

                case'CPF_MNG_01_M':
                    include"E-CPF/CPF_MNG_01_M.php";
                break;
                case'CPF_MNG_03_M':
                    include"E-CPF/CPF_MNG_03_M.php";
                break;

                //-ENTRI CPF--//
                 case'CPF_ENTRI_01':
                    include"E-CPF/CPF_ENTRI_01.php";
                break;

                //--ENTRI--//
                case'CPF_ENTRI_02_HMD':
                    include"E-CPF/CPF_ENTRI_02_HMD.php";
                break;
                case'CPF_ENTRI_02_HRN':
                    include"E-CPF/CPF_ENTRI_02_HRN.php";
                break;
                case'CPF_ENTRI_02_STT':
                    include"E-CPF/CPF_ENTRI_02_STT.php";
                break;
                case'CPF_ENTRI_02_STT':
                    include"E-CPF/CPF_ENTRI_02_STT.php";
                break;
                case'CPF_ENTRI_02_UDM':
                    include"E-CPF/CPF_ENTRI_02_UDM.php";
                break;   
                case'CPF_ENTRI_02_APN':
                    include"E-CPF/CPF_ENTRI_02_APN.php";
                break; 
                case'CPF_ENTRI_03_DM':
                    include"E-CPF/CPF_ENTRI_03_DM.php";
                break; 
				
#-------------------------NEW CPF CONCEPT-----------------------------------#
				#CPF
				 case'CPF01_ENTRI_03_DM':
					include"E-CPF/CPF01_ENTRI_03_DM.php"; 
				  break;
				#MASTER SETUP FORM
				 case'CPF01_MD_KEG_01':
					include"E-CPF/CPF01_MD_KEG_01.php";
				 break;
                 case'CPF01_MD_KEG02_01':
					include"E-CPF/CPF01_MD_KEG02_01.php";
				 break;
                 case'CPF01_MD_KEG03_01':
					include"E-CPF/CPF01_MD_KEG03_01.php";
				 break;
				 case'CPF01_MD_KEG_01_IN':
					include"E-CPF/CPF01_MD_KEG_01_IN.php";
				 break;
                //--UPDATE--//
                case'CPF_UPDATE_02_HMD':
                    include"E-CPF/CPF_UPDATE_02_HMD.php";
                break;
				#CLINICAL PATH WAY
				 case'CPF01_CP_01_FORM':
					include"E-CPF/CPF01_CP_01_FORM.php";
				 break;
                 case'CPF01_CP02_01_FORM':
					include"E-CPF/CPF01_CP02_01_FORM.php";
				 break;
                 case'CPF01_CP03_01_FORM':
					include"E-CPF/CPF01_CP03_01_FORM.php";
				 break;
				 case'CPF01_CP_01_FORMVIEW':
					include"E-CPF/CPF01_CP_01_FORMVIEW.php";
				 break;
                 case'CPF01_CP_01_FORMVIEW02':
					include"E-CPF/CPF01_CP_01_FORMVIEW02.php";
				 break;
                 case'CPF01_CP_01_FORMVIEW03':
					include"E-CPF/CPF01_CP_01_FORMVIEW03.php";
				 break;
				 #REPORT VIEW
				 case'CPF01_RPT_VW_01_VFORM':
					include"E-CPF/CPF01_RPT_VW_01_VFORMNEW.php";
                    #include"E-CPF/CPF01_RPT_VW_01_VFORM.php";
				 break;
                 case'CPF01_RPT_VW02_01_VFORM':
					include"E-CPF/CPF01_RPT_VW02_01_VFORM.php";
				 break;
                 case'CPF01_RPT_VW03_01_VFORM':
					include"E-CPF/CPF01_RPT_VW03_01_VFORM.php";
				 break;

                //--VIEW--//
                case'CPF_VIEW_01_ALL':
                    include"E-CPF/CPF_VIEW_01_ALL.php";
                break;
                
                


    }
    
?>