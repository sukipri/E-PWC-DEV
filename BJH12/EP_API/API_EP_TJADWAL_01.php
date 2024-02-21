<?php

        $SET_DATE = date("Y");
  
        //include"../css.php";   //style and control title meta
            include"../sc/stack_Q.php"; //Query SQL
 
         include"../config/connec_01_srv_02.php";
       

         header("Access-Control-Allow-Origin: *");
	    header("Content-Type: application/json; charset=UTF-8");
		
                    //--TJadwal--// 
                    $ep_tjadwal01_sw = $ms_q("$call_sel tjadwal WHERE Bulan LIKE  '%$SET_DATE%' order by bulan desc ");
                    $rows_jadwal = $ms_nr($ep_tjadwal01_sw);
                   
                         //--Loopping Prooccesing--//
                        while($ep_tjadwal01_sww = $ms_fas($ep_tjadwal01_sw)){
                //--Dept--//
                    $ep_dept01_sw = $ms_q("$sl ID,Dept_Name FROM HR_Dept WHERE ID='$ep_tjadwal01_sww[Gustu]'");
                    $ep_dept01_sww = $ms_fas($ep_dept01_sw);
                //--Karyawan--//
                    $ep_kary01_sw = $ms_q("$sl ID,Dept_ID,Dept_Name,Per_Name,Per_Code FROM HR_Personnel WHERE Per_Code='$ep_tjadwal01_sww[NIK]'  ");
                    $ep_kary01_sww = $ms_fas($ep_kary01_sw);
                    

                            $item[] = array(
                                "bulan" => $ep_tjadwal01_sww['Bulan'],
                                "gustu" =>  $ep_dept01_sww['Dept_Name'],
                                "nip" => $ep_tjadwal01_sww['NIK'],
                                "nama" =>$ep_kary01_sww['Per_Name'],
                                "t01" =>$ep_tjadwal01_sww['T01'],
                                "t02" =>$ep_tjadwal01_sww['T02'],
                                "t03" =>$ep_tjadwal01_sww['T03'],
                                "t04" =>$ep_tjadwal01_sww['T04'],
                                "t05" =>$ep_tjadwal01_sww['T05'],
                                "t06" =>$ep_tjadwal01_sww['T06'],
                                "t07" =>$ep_tjadwal01_sww['T07'],
                                "t08" =>$ep_tjadwal01_sww['T08'],
                                "t09" =>$ep_tjadwal01_sww['T09'],
                                "t10" =>$ep_tjadwal01_sww['T10'],
                                "t11" =>$ep_tjadwal01_sww['T11'],
                                "t12" =>$ep_tjadwal01_sww['T12'],
                                "t13" =>$ep_tjadwal01_sww['T13'],
                                "t14" =>$ep_tjadwal01_sww['T14'],
                                "t15" =>$ep_tjadwal01_sww['T15'],
                                "t16" =>$ep_tjadwal01_sww['T16'],
                                "t17" =>$ep_tjadwal01_sww['T17'],
                                "t18" =>$ep_tjadwal01_sww['T18'],
                                "t19" =>$ep_tjadwal01_sww['T19'],
                                "t20" =>$ep_tjadwal01_sww['T20'],
                                "t21" =>$ep_tjadwal01_sww['T21'],
                                "t22" =>$ep_tjadwal01_sww['T22'],
                                "t23" =>$ep_tjadwal01_sww['T23'],
                                "t24" =>$ep_tjadwal01_sww['T24'],
                                "t25" =>$ep_tjadwal01_sww['T25'],
                                "t26" =>$ep_tjadwal01_sww['T26'],
                                "t27" =>$ep_tjadwal01_sww['T27'],
                                "t28" =>$ep_tjadwal01_sww['T28'],
                                "t29" =>$ep_tjadwal01_sww['T29'],
                                "t30" =>$ep_tjadwal01_sww['T30'],
                                "t31" =>$ep_tjadwal01_sww['T31'],
            
                                
                               );

                        }

			//..JSON..//
			 if($rows_jadwal < 1){ 
		  $json_jadwal = array(
  			 'result' => '404',
			 'response_code' => '14',
			'response_code_desc' => 'Tidak Ada jadwal '
			 ); 
			}elseif($rows_jadwal  > 0){
            $json_jadwal = array(
			 'data_jadwal' => $item
			 ); 
			 
   						}else{
 			 $json_jadwal = array(
  			 'result' => '404',
			 'response_code' => '96',
			'response_code_desc' => 'Error'
			 ); 
 					  }
			 $edata_jadwal = json_encode($json_jadwal);
			echo "$edata_jadwal";

?>