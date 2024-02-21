<?php
    
    switch(@$SQL_SL($_GET['PG_SA_SUB'])){
/*--------------------------*/
        /*E-CHECK */
/*---------------------------*/
        //DATA TITIK
            case'EC_TITIK_01_IN':
                include"E-CHECK/EC_TITIK_01_IN.php";
            break;
            case'EC_TITIK_01_IN_VIEW':
                include"E-CHECK/EC_TITIK_01_IN_VIEW.php";
            break;
            case'EC_TITIK_01_UP':
                include"E-CHECK/EC_TITIK_01_UP.php";
            break;
        //CHECKING DATA REC
            case'EC_CK_01_IN':
                include"E-CHECK/EC_CK_01_IN.php";
            break;
            case'EC_CK_01_IN':
                include"E-CHECK/EC_CK_01_IN.php";
            break;
            case'EC_CK_01_IN_VIEW':
                include"E-CHECK/EC_CK_01_IN_VIEW.php";
            break;
            case'EC_CK_01_IN_VIEW_HARI':
                include"E-CHECK/EC_CK_01_IN_VIEW_HARI.php";
            break;
            case'EC_CK_01_IN_VIEW_ALL':
                include"E-CHECK/EC_CK_01_IN_VIEW_ALL.php";
            break;
        //USER Akses
            case'EC_USER_IN_01':
                include"E-CHECK/EC_USER_IN_01.php";
            break;

           }
?>