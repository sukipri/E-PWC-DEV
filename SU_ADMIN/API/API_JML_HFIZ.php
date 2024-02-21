<?PHP 
 /*VIEW DATA SET SIMRS */
        /*COINFIG */
        include_once"../config/connec_01_srv.php";
        include"../secure/GR_01.php"; 
        include"../sc/stack_Q.php"; //Query SQL
        include"../sc/code_rand.php"; 

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        $json_input = file_get_contents('php://input');
        $data_input = json_decode($json_input,true);
        
        
                #DATA POLI SPESIALIS
					$pwc_hf_vpoli01_sw = $ms_q("$sl DISTINCT KodePoli FROM Citarum.dbo.TJadwalHFIZ");
					$pwc_hf_vpoli01_sww = $ms_nr($pwc_hf_vpoli01_sw);
					$pwc_hf_vdkt01_sw = $ms_q("$sl DISTINCT KodeDok FROM Citarum.dbo.TJadwalHFIZ");
					$pwc_hf_vdkt01_sww = $ms_nr($pwc_hf_vdkt01_sw);
     
                        #RETRIVING DATA
                        $pwc_data_jdkt01 [] = array(
                            "jpoli"=>$pwc_hf_vpoli01_sww,
							"jdkt"=>$pwc_hf_vdkt01_sww
                        );
                        
                        $metadata[] = array(
                            "message"=>"Ok",
                            "Code"=> "200"
                        );
                    

                    $json_jadwal = array(
                        'sw_jadwal' => $pwc_data_jdkt01,
                        'metadata' => $metadata
                    );

                    $jadwaldata= json_encode($json_jadwal);
          
                    //echo "{\"bill\":" . $edata ."}";
                    echo "$jadwaldata";



?>