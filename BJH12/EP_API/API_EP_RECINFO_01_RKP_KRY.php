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
$date_time = date("H:i:s");
$date_html5_kode = date("ymd");
$time_ack2 = date("His");
$RAND_DATA = rand('88','99');

//--GET DATA
$IDEMP01 = @$_GET['IDEMP01'];
$ep_ri_tgl01 = @$_GET['ep_ri_tgl01'];
$ep_ri_tgl02 = date("tomorrow");


        //--RECINFO DATA--//
            $epwc_vrecinfo01_sw = $ms_q("$call_sel TA_Record_Info WHERE ep_kode_01 LIKE '%GPS%' AND Per_Code='$IDEMP01' AND ( Date_Time BETWEEN '$SET_DATE_02-01' AND  '$SET_DATE_02-31 23:59:00') order by ID desc ");
            $epwc_cn_vrecinfo_sw = $ms_nr($epwc_vrecinfo01_sw);
                while($epwc_vrecinfo01_sww = $ms_fas($epwc_vrecinfo01_sw)){
                          
  
                          #Convert DATA FUNCTION
                          $ep_get02_vrecinfo01_sw = strtotime($epwc_vrecinfo01_sww['Date_Time']);

                          #Substring data
                          $epwc_sub_vrecinfo01_sww = substr($epwc_vrecinfo01_sww['Date_Time'],8,2); //>Ambil Tanggal
                          $epwc_sub_vrecinfo01_sww02 = substr($epwc_vrecinfo01_sww['Date_Time'],5,2); //> Ambil Bulan
                          $epwc_sub_vrecinfo01_sww03 = substr($epwc_vrecinfo01_sww['Date_Time'],0,-9); //> Ambil Bulan tanggal hari
    
                    #DATA KARYAWAN 
                    $ep_kary01_sw = $ms_q("$sl ID,Dept_ID,Dept_Name,Per_Name,Per_Code FROM HR_Personnel WHERE Per_Code='$epwc_vrecinfo01_sww[Per_Code]'");
                    $ep_kary01_sww = $ms_fas($ep_kary01_sw);
                    /* */
                     #DATA JADWAL
                    $epwc_tjdw01_sw = $ms_q("$sl Bulan,NIK,T$epwc_sub_vrecinfo01_sww FROM tJadwal WHERE NIK='$epwc_vrecinfo01_sww[Per_Code]' AND Bulan='$epwc_sub_vrecinfo01_sww02'");
                    $epwc_tjdw01_sww = $ms_fas($epwc_tjdw01_sw);
                    $epwc_date_d_sw = "T".$epwc_sub_vrecinfo01_sww;
                        #DATA Shift Get
                        /* */
                        $epwc_vshift01_sw = $ms_q("$call_sel tShif WHERE Kode='$epwc_vrecinfo01_sww[ep_tjd_shift_01]'");
                        $epwc_vshift01_sww = $ms_fas($epwc_vshift01_sw);

                        #counting jam keterlambatan dan kedatangan SQL
                        $ep_get_vrecinfo01_sw = $ms_q("$sl cast(Date_Time as time(0)) as ambil_waktu FROM TA_Record_Info WHERE ID='$epwc_vrecinfo01_sww[ID]' ");
                        $ep_get_vrecinfo01_sww = $ms_fas($ep_get_vrecinfo01_sw);

                        #JAM KETERLAMBATAN
                        $waktu_awal      =strtotime($epwc_vrecinfo01_sww['Date_Time']);
                        $waktu_ahir02 = date("$epwc_sub_vrecinfo01_sww03 $epwc_vshift01_sww[Masuk]:00");
                        $waktu_akhir    =strtotime($waktu_ahir02); 

                            $diff    =  $waktu_awal - $waktu_akhir;
                            $jam    =floor($diff / (60 * 60));
                            $abs_jam = abs($jam);
                            $menit    =$diff - $jam * (60 * 60);
                            $menit02 = $menit / 60;
                            $rn_menit02 = ceil($menit02);
                        
                        #JAM LEMBUR
                        $waktu_awal02     =strtotime($epwc_vrecinfo01_sww['Date_Time']);
                        $waktu_ahir0202 = date("$epwc_sub_vrecinfo01_sww03 $epwc_vshift01_sww[Keluar]:00");
                        $waktu_akhir02    =strtotime($waktu_ahir0202); 

                            $diff02    =  $waktu_awal02 - $waktu_akhir02;
                            $jam02    = floor($diff02 / (60 * 60));
                            $abs_jam02 = abs($jam02);
                            $menit02    =$diff02 - $jam02 * (60 * 60);
                            $menit0202 = $menit02 / 60;
                            $rn_menit0202 = ceil($menit0202);

                        $item_ri[] = array(
                            "ID"=>$epwc_vrecinfo01_sww['ID'],
                            "cek_telat"=>   $jam,
                            "cek_telat02"=>   $rn_menit02,
                            "cek_telat02a"=>   $jam02,
                            "cek_telat0202"=>   $rn_menit0202,
                            "cek_masuk" =>  $epwc_vshift01_sww['Masuk'],
                            "cek_keluar" =>  $epwc_vshift01_sww['Keluar'],
                             "jam_masuk"=>$ep_get_vrecinfo01_sww['ambil_waktu'],
                            "tgl_masuk"=>$epwc_vrecinfo01_sww['Date_Time'],
                            "idkry"=>$epwc_vrecinfo01_sww['Per_ID'],
                            "nip"=>$epwc_vrecinfo01_sww['Per_Code'],
                            "nama" =>$ep_kary01_sww['Per_Name'],
                            "jam_masuk02"=> "-",
                            "kode_masuk"=>$epwc_vrecinfo01_sww['ep_kode_01'],
                            "shift"=>$epwc_vrecinfo01_sww['ep_tjd_shift_01'],
                            "status"=>$epwc_vrecinfo01_sww['In_Out'],
                            "gps_kode"=>$epwc_vrecinfo01_sww['ep_kode_01']
                        );

                }
                if($epwc_cn_vrecinfo_sw > 0){
                $json_ri = array(
                    'data_ri' => $item_ri
                );
                
            }else{
                $json_ri = array(
                    'Metadata' => "Failed To Load",
                    'parameter_date' => $ep_ri_tgl01
                );
            }

                $edata_ri = json_encode($json_ri);
                echo "$edata_ri";

?>