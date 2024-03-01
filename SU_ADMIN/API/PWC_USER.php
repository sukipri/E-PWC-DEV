<?php
/*VIEW DATA SET SIMRS */
	/*COINFIG */
			include_once"../config/connec_01_srv.php";
				include"../secure/GR_01.php"; //security enggine
				 //include"sc/ID_IDF.php";  //Identifer ID PAGE
				//include"css.php";   //style and control title meta
       			 include"../sc/stack_Q.php"; //Query SQL
				  include"../sc/code_rand.php"; 
	//.........//
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
		
			$vuser01_sw = $ms_q("$call_sel TBUser order by namauser ");
				$rows = $ms_nr($vpl01_sw);
				while($vuser01_sww = $ms_fas($vuser01_sw)){
					//echo"$vpl01_sww[PelakuNama]";
			
 	 	//..Listing content..//
		  $item[] = array(
		   "Kode_Dokter"=>$vuser01_sww["PelakuKode"],
		   "Nama_Dokter"=>$vuser01_sww["PelakuNama"],
		   "Spes_Kode"=>$vuser01_sww["SpesKode"]
		   $item_user[] = array( "idmain"=>$vuser01_sww["idmain"],
		   "namauser"=>$vuser01_sww["namauser"],
		   "Spes_Kode"=>$vuser01_sww["SpesKode"]
		   
		  );
		}
			//..JSON..//
			 if($rows < 1){ 
		  $json = array(
  			 'result' => '404',
			 'response_code' => '14',
			'response_code_desc' => 'Tidak Ada Dokter '
			 ); 
			}elseif($rows  > 0){
			 $json = array(
			 'Kode_Dokter' => $item
			 ); 
			 
   						}else{
 			 $json = array(
  			 'result' => '404',
			 'response_code' => '96',
			'response_code_desc' => 'Error'
			 ); 
 					  }
			 $edata = json_encode($json);
			echo "$edata";
?>
