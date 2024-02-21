<?php
//include"../css.php";   //style and control title meta
include"../sc/stack_Q.php"; //Query SQL

include"../config/connec_01_srv_02.php";


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$json_input = file_get_contents('php://input');
$data_input = json_decode($json_input,true);
date_default_timezone_set('Asia/Jakarta');

#-Set DATA -#
$SETUP_DATE_D = date("d");
$SET_DATE_02 = date("Ym");
$date_html5 = date("Y-m-d");
$date_time = date("h:i:s");
$date_html5_kode = date("ymd");
$time_ack2 = date("his");
$RAND_DATA = rand('88','99');

    //--GET DATA
        $IDEMP01 = @$_GET['IDEMP01'];

            //--BANK DATA--//
                $epwc_shift_sw = "ep_tjd_shift_01='A' OR ep_tjd_shift_01='B' OR ep_tjd_shift_01='C' OR ep_tjd_shift_01='D' OR ep_tjd_shift_01='E' OR ep_tjd_shift_01='F' OR ep_tjd_shift_01='G' OR ep_tjd_shift_01='H' OR ep_tjd_shift_01='I' OR ep_tjd_shift_01='J' OR ep_tjd_shift_01='K' OR ep_tjd_shift_01='L' OR ep_tjd_shift_01='M' OR ep_tjd_shift_01='N' OR ep_tjd_shift_01='O' OR ep_tjd_shift_01='P' OR ep_tjd_shift_01='Q' OR ep_tjd_shift_01='R' OR ep_tjd_shift_01='S' OR ep_tjd_shift_01='T' OR ep_tjd_shift_01='U' OR ep_tjd_shift_01='V' OR ep_tjd_shift_01='W' OR ep_tjd_shift_01='X' OR ep_tjd_shift_01='Y' OR ep_tjd_shift_01='Z'";
            

        //--RECINFO DATA--//
            $epwc_vrecinfo01_sw = $ms_q("$call_sel TJ_Main_data.dbo.TA_Record_Info WHERE Per_Code='$IDEMP01' AND (Date_Time BETWEEN '$date_html5  00:00:00' AND '$date_html5  23:59:00' ) AND  ($epwc_shift_sw) AND NOT In_Out='1'   order by Date_Time desc ");
            $epwc_cn_vrecinfo01_sw = $ms_nr($epwc_vrecinfo01_sw);
               $epwc_vrecinfo01_sww = $ms_fas($epwc_vrecinfo01_sw);

               /*
                        $item_ri[] = array(
                            "ID"=>$epwc_vrecinfo01_sww['ID'],
                            "idkry"=>$epwc_vrecinfo01_sww['Per_ID'],
                            "nip"=>$epwc_vrecinfo01_sww['Per_Code'],
                            "tgl_masuk"=>$epwc_vrecinfo01_sww['Date_Time'],
                            "kode_masuk"=>$epwc_vrecinfo01_sww['ep_kode_01']
                        );
                            */
                    if($epwc_cn_vrecinfo01_sw > 0){
                        $json_riv[] = array(
                            'status' => "2",
                            'ket' => "Sudah Melakukan absensi",
                            'tgl' => $date_html5
                        );
                    }else{
                        $json_riv[] = array(
                            'status' => "1",
                            'ket' => "Belum Melakukan Absensi",
                            'tgl' => $date_html5

                        );

                    }


                $edata_riv = json_encode($json_riv);
                echo "$edata_riv";

?>