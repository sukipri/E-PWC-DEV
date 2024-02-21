<?php
    @session_start();
    if(isset($_POST['wb_user_login_01'])){
        $wb_user_nama_01 = @$SQL_ESC($CONN01,$_POST['wb_user_nama_01']);
        $wb_user_pass_01 = @$SQL_ESC($CONN01,$_POST['wb_user_pass_01']);
//---//
    /* LOGIN ACCESS MANUALY USER AUTH */
    $user_01 = "WB1001";
    $pass_01 = "ROOT";
        //Konversi
        $user_session_01 = $_SESSION['user_01']= $user_01;
        $pass_session_01 = $_SESSION['pass_01']= $pass_01;
            //Session
            if($user_session_01 == $wb_user_nama_01 AND $pass_session_01 ==$wb_user_pass_01 ){
                echo"Session_tepat";
            }else{
                    echo"Session Salah $wb_user_nama_01";

            }
            
//-----/
        }


?>