<?php
    
    switch(@$SQL_SL($_GET['PG_SA_SUB_02'])){
/*--------------------------*/
        /* CPF*/
/*---------------------------*/

                    case'CPF_LAP_01_M_ALL':
                        include"E-CPF/CPF_LAP_01_M_ALL.php";
                    break;
                    case'CPF_LAP_01_M_TGL':
                        include"E-CPF/CPF_LAP_01_M_TGL.php";
                    break;
                    case'CPF_LAP_01_M_PNYT':
                        include"E-CPF/CPF_LAP_01_M_PNYT.php";
                    break;

    }

    /*--------------------------*/
        /* CLOSE SWITCH */
    /*---------------------------*/
?>