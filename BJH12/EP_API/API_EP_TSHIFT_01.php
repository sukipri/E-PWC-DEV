<?php
//include"../css.php";   //style and control title meta
include"../sc/stack_Q.php"; //Query SQL

include"../config/connec_01_srv_02.php";


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$json_input = file_get_contents('php://input');
$data_input = json_decode($json_input,true);
date_default_timezone_set('Asia/Jakarta');

            #DATA SHIFT
                $ep_vshift01_sw = $ms_q("$call_sel tshif order by kode asc ");
                    while($ep_vshift01_sww = $ms_fas($ep_vshift01_sw)){

                        $data_shif [] = array(
                            "kode" =>$ep_vshift01_sww['Kode'],
                            "masuk" =>$ep_vshift01_sww['Masuk'],
                            "keluar" =>$ep_vshift01_sww['Keluar'],
                            "ket" =>$ep_vshift01_sww['Ket'],

                        );
                    }
                            $json_shif = array(
                                "data_shif" =>$data_shif
                            );

                            $edatashif = json_encode($json_shif);
                            echo $edatashif;

?>