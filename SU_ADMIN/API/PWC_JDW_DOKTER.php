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
		#$IDDOKTER = "27518";
                #DATA JADWAL DOKTER
                $pwc_jdkt01_sw = $ms_q("$call_sel Citarum.dbo.TJadwalHFIZ WHERE KodeDok='$IDDOKTER' order by hari");  
                    while($pwc_jdkt01_sww = $ms_fas($pwc_jdkt01_sw)){
                            #DATA DOKTER
                            #$pwc_vplk01_sw = $ms_q("$sl PelakuKode,PelakuNama FROM TPelaku WHERE PelakuKode='$pwc_jdkt01_sww[DokterKode]' ");
                            #$pwc_vplk01_sww = $ms_fas($pwc_vplk01_sw);
						#KOLASE HARI DIC
						if($pwc_jdkt01_sww['Hari']=='1'){
						$harinama = "Senin";
						}elseif($pwc_jdkt01_sww['Hari']=='2'){
						$harinama = "Selasa";
						}elseif($pwc_jdkt01_sww['Hari']=='3'){
						$harinama = "Rabu";
						}elseif($pwc_jdkt01_sww['Hari']=='4'){
						$harinama = "Kamis";
						}elseif($pwc_jdkt01_sww['Hari']=='5'){
						$harinama = "Jumat";
						}elseif($pwc_jdkt01_sww['Hari']=='6'){
						$harinama = "Sabtu";
						}

                        #RETRIVING DATA
                        $pwc_data_jdkt01 [] = array(
                            "dokterkode"=>$pwc_jdkt01_sww['KodeDok'],
                            "dokternama"=> $pwc_jdkt01_sww['NamaDok'],
                            "hari"=>$pwc_jdkt01_sww['Hari'],
							"harinama"=>$harinama,
                            "jam"=>$pwc_jdkt01_sww['Jadwal']
                        );
                        }
                        $metadata[] = array(
                            "message"=>"Ok",
                            "Code"=> "200"
                        );
                    

                    $json_jadwal = array(
                        'swjdw' => $pwc_data_jdkt01,
                        'metadata' => $metadata
                    );

                    $jadwaldata= json_encode($json_jadwal);
          
                    //echo "{\"bill\":" . $edata ."}";
                    echo "$jadwaldata";



?>