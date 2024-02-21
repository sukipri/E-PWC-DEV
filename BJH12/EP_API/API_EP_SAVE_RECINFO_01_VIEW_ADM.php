<?php
//include"../css.php";   //style and control title meta
include"../sc/stack_Q.php"; //Query SQL

include"../config/connec_01_srv_02.php";


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$json_input = file_get_contents('php://input');
$data_input = json_decode($json_input,true);
date_default_timezone_set('Asia/Jakarta');

    
        //--RECINFO DATA--//
            $epwc_vrecinfo01_sw = $ms_q("$sl TOP 10 * FROM TA_Record_Info  order by Date_Time desc ");
                while($epwc_vrecinfo01_sww = $ms_fas($epwc_vrecinfo01_sw)){

                    //--DATA Karyawan -TJ_MAIN _DATA--//
                    $ep_kry01_sw = $ms_q("$sl ID,Dept_ID,Dept_Name,Per_Name,Per_Code FROM HR_Personnel WHERE Per_Code='$epwc_vrecinfo01_sww[Per_Code] '");
            
                      $ep_kry01_sww = $ms_fas($ep_kry01_sw);
                    
                        $item_ri[] = array(
                            "ID"=>$epwc_vrecinfo01_sww['ID'],
                            "idkry"=>$epwc_vrecinfo01_sww['Per_ID'],
                            "nip"=>$epwc_vrecinfo01_sww['Per_Code'],
                            "tgl_masuk"=>$epwc_vrecinfo01_sww['Date_Time'],
                            "kode_masuk"=>$epwc_vrecinfo01_sww['ep_kode_01'],
                            "nama_kry"=>$ep_kry01_sww['Per_Name'],
                            "status"=>$epwc_vrecinfo01_sww['In_Out']
                        );

                }

                $json_ri = array(
                    'data_ri' => $item_ri
                );

                $edata_ri = json_encode($json_ri);
                echo "$edata_ri";

?>