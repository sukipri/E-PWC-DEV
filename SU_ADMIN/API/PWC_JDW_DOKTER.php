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
        
        $IDDOKTER = @$_GET['IDDOKTER'];
                #DATA JADWAL DOKTER
                $pwc_jdkt01_sw = $ms_q("$call_sel Citarum.dbo.JadwalDokter WHERE DokterKode='$IDDOKTER' order by HariUrut asc");  
                    while($pwc_jdkt01_sww = $ms_fas($pwc_jdkt01_sw)){
                            #DATA DOKTER
                            $pwc_vplk01_sw = $ms_q("$sl PelakuKode,PelakuNama FROM Citarum.dbo.TPelaku WHERE PelakuKode='$pwc_jdkt01_sww[DokterKode]' ");
                            $pwc_vplk01_sww = $ms_fas($pwc_vplk01_sw);

                        #RETRIVING DATA
                        $pwc_data_jdkt01 [] = array(
                            "dokterkode"=>$pwc_jdkt01_sww['DokterKode'],
                            "dokternama"=> $pwc_vplk01_sww['PelakuNama'],
                            "kethari"=>$pwc_jdkt01_sww['KetHari'],
                            "ketjam"=>$pwc_jdkt01_sww['KetJam']
                        );
                        
                        $metadata[] = array(
                            "message"=>"Ok",
                            "Code"=> "200"
                        );
                    }

                    $json_jadwal = array(
                        'sw_jadwal' => $pwc_data_jdkt01,
                        'metadata' => $metadata
                    );

                    $jadwaldata= json_encode($json_jadwal);
          
                    //echo "{\"bill\":" . $edata ."}";
                    echo "$jadwaldata";



?>