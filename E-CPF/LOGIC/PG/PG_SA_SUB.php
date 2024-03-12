<?php
    
    switch(@$SQL_SL($_GET['PG_SA_SUB'])){
  /*--------------------------*/
                /* CPF/
        /*---------------------------*/
            /*--CPF*/

            //--VIEW DATA--//
            case'CPF_VIEW_01_ALL':
                include"E-CPF/CPF_VIEW_01_ALL.php";
            break;
            case'CPF_VIEW_01_TGL':
                include"E-CPF/CPF_VIEW_01_TGL.php";
            break;
            case'CPF_VIEW_02_TGL':
                include"E-CPF/CPF_VIEW_02_TGL.php";
            break;
            case'CPF_LAP_01_M':
                include"E-CPF/CPF_LAP_01_M.php";
            break;
            case'CPF_VIEW_03_ALL':
                include"E-CPF/CPF_VIEW_03_ALL.php";
            break;
			
#-------------------------NEW CPF CONCEPT-----------------------------------#
				#CPF
				#MASTER SETUP FORM
				 case'CPF01_MD_KEG_01_IN':
					include"E-CPF/CPF01_MD_KEG_01_IN.php";
				 break;
				 case'CPF01_MD_KEG02_01_IN':
					include"E-CPF/CPF01_MD_KEG02_01_IN.php";
				 break;
				 case'CPF01_MD_KEG03_01_IN':
					include"E-CPF/CPF01_MD_KEG03_01_IN.php";
				 break;
				 case'CPF01_MD_KEG_01_IN02':
					include"E-CPF/CPF01_MD_KEG_01_IN02.php";
				 break;
				 case'CPF01_MD_KEG02_01_IN02':
					include"E-CPF/CPF01_MD_KEG02_01_IN02.php";
				 break;
				 case'CPF01_MD_KEG03_01_IN02':
					include"E-CPF/CPF01_MD_KEG03_01_IN02.php";
				 break;
				 case'CPF01_MD_KEG_01_IN03':
					include"E-CPF/CPF01_MD_KEG_01_IN03.php";
				 break;
				 case'CPF01_MD_KEG02_01_IN03':
					include"E-CPF/CPF01_MD_KEG02_01_IN03.php";
				 break;
				 case'CPF01_MD_KEG_01_IN03REC':
					include"E-CPF/CPF01_MD_KEG_01_IN03REC.php";
				 break;
				 case'CPF01_MD_KEG02_01_IN03REC':
					include"E-CPF/CPF01_MD_KEG02_01_IN03REC.php";
				 break;
				 case'CPF01_MD_KEG_01_IN03REC02':
					include"E-CPF/CPF01_MD_KEG_01_IN03REC02.php";
				 break;
				 case'CPF01_MD_KEG02_01_IN03REC02':
					include"E-CPF/CPF01_MD_KEG02_01_IN03REC02.php";
				 break;
				 case'CPF01_MD_KEG_01_FORM':
					include"E-CPF/CPF01_MD_KEG_01_FORM.php";
				 break;
				 case'CPF01_MD_KEG02_01_FORM':
					include"E-CPF/CPF01_MD_KEG02_01_FORM.php";
				 break;
				 case'CPF01_MD_KEG02_01_FORM_RWT':
					include"E-CPF/CPF01_MD_KEG02_01_FORM_RWT.php";
				 break;
				 case'CPF01_MD_KEG_01_FORM_RWT':
					include"E-CPF/CPF01_MD_KEG_01_FORM_RWT.php";
				 break;

           }
?>