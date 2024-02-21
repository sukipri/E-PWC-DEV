<?php

        $SET_DATE = date("Y");
  
        //include"../css.php";   //style and control title meta
            include"../sc/stack_Q.php"; //Query SQL
 
         include"../config/connec_01_srv_02.php";
       

         header("Access-Control-Allow-Origin: *");
	    header("Content-Type: application/json; charset=UTF-8");
		
                   //--HR_Dept--//
                    $ep_dept01_sw = $ms_q("$sl ID,Dept_Name FROM HR_Dept order by Dept_name asc ");
                    $rows_dept = $ms_nr($ep_dept01_sw);   
                    while( $ep_dept01_sww = $ms_fas($ep_dept01_sw)){
                    

                            $item[] = array(
                                "id_gustu" => $ep_dept01_sww['ID'],
                                "gustu" => $ep_dept01_sww['Dept_Name']
                               
                                
                               );

                        }



			//..JSON..//
			 if($rows_dept < 1){ 
		  $json_dept = array(
  			 'result' => '404',
			 'response_code' => '14',
			'response_code_desc' => 'Tidak Ada jadwal '
			 ); 
			}elseif($rows_dept > 0){
            $json_dept = array(
			 'data_dept' => $item
			 ); 
			 
   						}else{
 			 $json_dept = array(
  			 'result' => '404',
			 'response_code' => '96',
			'response_code_desc' => 'Error'
			 ); 
 					  }
			 $edata_dept = json_encode($json_dept);
			echo "$edata_dept";

?>