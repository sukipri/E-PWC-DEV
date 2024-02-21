<?php
    $SET_DATE = date("Y");
            
    //include"../css.php";   //style and control title meta
        include"../sc/stack_Q.php"; //Query SQL

    include"../config/connec_01_srv_02.php";


    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

        ##-GET DATA--##
        $IDEMP01 = @$_GET['IDEMP01'];

                //--DATA KARYAWAN--//
                $ep_kry01_sw = $ms_q("$sl ID,Dept_ID,Dept_Name,Per_Name,Per_Code FROM HR_Personnel WHERE Per_Code='$IDEMP01'");
                  $rows_kry = $ms_nr($ep_kry01_sw);
                    $ep_kry01_sww = $ms_fas($ep_kry01_sw);

                    $item_kry[] = array(
                                "id" => $ep_kry01_sww['ID'],
                                "nip" => $ep_kry01_sww['Per_Code'],
                                "nama" => $ep_kry01_sww['Per_Name']

                    );

                  //..JSON..//
			 if($rows_kry < 1){ 
                $json_kry = array(
                     'result' => '404',
                   'response_code' => '14',
                  'response_code_desc' => 'Data tidak ditemukan '
                   ); 
                  }elseif($rows_kry> 0){
                  $json_kry = array(
                   'data_kry' => $item_kry
                    ); 
                   
                                 }else{
                    $json_kry = array(
                     'result' => '404',
                   'response_code' => '96',
                  'response_code_desc' => 'Error'
                   ); 
                             }
                   $edata_kry = json_encode($json_kry);
                  echo "$edata_kry";


?>