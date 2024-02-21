<?php
    
    switch(@$SQL_SL($_GET['PG_SA'])){
     
  
        /*--------------------------*/
                /* E-CHECK */
        /*---------------------------*/

                //Master Data
                    case'EC_TITIK_01_VIEW':
                        include"E-CHECK/EC_TITIK_01_VIEW.php";
                    break;            
                    case'EC_CK_01_VIEW':
                        include"E-CHECK/EC_CK_01_VIEW.php";
                    break;
                   
                    //USER Akses
                    case'EC_USER_01_VIEW':
                        include"E-CHECK/EC_USER_01_VIEW.php";
                    break;
                        //->>>
                            case'EC_USER_IN_01':
                                include"E-CHECK/EC_USER_IN_01.php";
                            break;


    }
?>