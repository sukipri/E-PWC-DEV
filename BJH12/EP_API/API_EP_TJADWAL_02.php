<?php

        $SET_DATE = date("Y");
        
        //include"../css.php";   //style and control title meta
            include"../sc/stack_Q.php"; //Query SQL
 
         include"../config/connec_01_srv_02.php";
       

         header("Access-Control-Allow-Origin: *");
	    header("Content-Type: application/json; charset=UTF-8");

                ##-GET DATA--##
                $IDDEPT01 = @$_GET['IDDEPT01'];


                   //--KARYAWAN--//
                  $ep_kry01_sw = $ms_q("$sl ID,Dept_ID,Dept_Name,Per_Name,Per_Code FROM HR_Personnel WHERE Dept_ID='$IDDEPT01'");
                  $rows_kry = $ms_nr($ep_kry01_sw);
                    while($ep_kry01_sww = $ms_fas($ep_kry01_sw)){
                            //--DATA Jadwal--//
                            $ep_jdw01_sw = $ms_q("$call_sel  tJadwal WHERE Gustu='$IDDEPT01' AND NIK='$ep_kry01_sww[Per_Code]' AND LEFT(Bulan,4)='$SET_DATE' order by bulan desc");
                            while($ep_jdw01_sww = $ms_fas($ep_jdw01_sw)){
                                $ep_substr01_jdw = substr($ep_jdw01_sww['Bulan'],0,-2);
                                    
                                $item_jdw[] = array(
                                "bulan" => $ep_jdw01_sww['Bulan'],
                                "nip" => $ep_jdw01_sww['NIK'],
                                "bulan_cut" => $ep_substr01_jdw,
                                "t01" =>$ep_jdw01_sww['T01'],
                                "t02" =>$ep_jdw01_sww['T02'],
                                "t03" =>$ep_jdw01_sww['T03'],
                                "t04" =>$ep_jdw01_sww['T04'],
                                "t05" =>$ep_jdw01_sww['T05'],
                                "t06" =>$ep_jdw01_sww['T06'],
                                "t07" =>$ep_jdw01_sww['T07'],
                                "t08" =>$ep_jdw01_sww['T08'],
                                "t09" =>$ep_jdw01_sww['T09'],
                                "t10" =>$ep_jdw01_sww['T10'],
                                "t11" =>$ep_jdw01_sww['T11'],
                                "t12" =>$ep_jdw01_sww['T12'],
                                "t13" =>$ep_jdw01_sww['T13'],
                                "t14" =>$ep_jdw01_sww['T14'],
                                "t15" =>$ep_jdw01_sww['T15'],
                                "t16" =>$ep_jdw01_sww['T16'],
                                "t17" =>$ep_jdw01_sww['T17'],
                                "t18" =>$ep_jdw01_sww['T18'],
                                "t19" =>$ep_jdw01_sww['T19'],
                                "t20" =>$ep_jdw01_sww['T20'],
                                "t21" =>$ep_jdw01_sww['T21'],
                                "t22" =>$ep_jdw01_sww['T22'],
                                "t23" =>$ep_jdw01_sww['T23'],
                                "t24" =>$ep_jdw01_sww['T24'],
                                "t25" =>$ep_jdw01_sww['T25'],
                                "t26" =>$ep_jdw01_sww['T26'],
                                "t27" =>$ep_jdw01_sww['T27'],
                                "t28" =>$ep_jdw01_sww['T28'],
                                "t29" =>$ep_jdw01_sww['T29'],
                                "t30" =>$ep_jdw01_sww['T30'],
                                "t31" =>$ep_jdw01_sww['T31']


                                );
                            }

                            $item[] = array(
                                "nama_kry" => $ep_kry01_sww['Per_Name'],
                                 "data_jdw" => $item_jdw
                                
                                );

                        }



			//..JSON..//
			 if($rows_kry < 1){ 
		  $json_kry = array(
  			 'result' => '404',
			 'response_code' => '14',
			'response_code_desc' => 'Tidak Ada jadwal '
			 ); 
			}elseif($rows_kry> 0){
            $json_kry = array(
			 'data_kry' => $item
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