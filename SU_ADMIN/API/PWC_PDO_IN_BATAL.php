<?PHP 
    #CONFIG
    include_once"../config/connec_01_srv.php";
    include"../secure/GR_01.php"; //security enggine		
    include"../sc/stack_Q.php"; //Query SQL
    include"../sc/code_rand.php"; 
    #HEADER DATA
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST, GET");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
            $json_input = file_get_contents('php://input');
            $data_input = json_decode($json_input,true);
            $header = apache_request_headers();

    #VARIABLE AUTH
    $user_pwc = "PWC1001";
    $pass_pwc = "1001PWC";
    if($user_pwc==$header['x-username']){ #OPEN AUTH USERNAME

    #PARAMETER DATA
    $kodebooking = $data_input['kodebooking'];
    $keterangan = $data_input['keterangan'];
    
     $vrj01_sw = $ms_q("$sl JalanNoReg,PasienNomorRM,JalanRMTanggal,UnitKode,JalanNoUrut,DokterKode,UnitKode,JalanNoUrut,JalanStatus FROM TRawatJalan WHERE JalanNoReg='$kodebooking'");
     #CN
         $cn_vrj01_sw = $ms_nr($vrj01_sw) ;
     #FECTH
          $vrj01_sww = $ms_fas($vrj01_sw);
        if($vrj01_sww['JalanStatus']=="1"){

            $json_batal_antrean  = array(
                "message" => "Pasien Sudah Dilayani, Antrean Tidak Dapat Dibatalkan",
                "code" => 201
        
            );
            $json_batal_antrean02  = array(
                "metadata"=> $json_batal_antrean 
        
            );

         $edata_json_batal_antrean02 = json_encode($json_batal_antrean02);
          echo "$edata_json_batal_antrean02";

        }elseif($vrj01_sww['JalanStatus']=="9"){
            $json_sdhbatal_antrean  = array(
                "message" => "Antrean Tidak Ditemukan atau Sudah Dibatalkan",
                "code" => 201
        
            );
            $json_sdhbatal_antrean02  = array(
                "metadata"=> $json_sdhbatal_antrean 
        
            );

         $edata_json_sdhbatal_antrean02 = json_encode($json_sdhbatal_antrean02);
          echo "$edata_json_sdhbatal_antrean02";
        }else{

                if($cn_vrj01_sw > 0){
                    #UPDATE RECORDING DATA
                    $ms_q("$up TRawatJalan SET JalanStatus='9',ket='$keterangan' WHERE JalanNoReg='$kodebooking'");

                    $array_batal_01 = array(
                        "message"=> "Ok",
                        "code"=> "200"
                    );
                }else{
                    $array_batal_01 = array(
                        "message"=> "Antrean Tidak Ditemukan",
                        "code"=> "201"
                    );
                }
            
                $json = array(
                    'metadata' => $array_batal_01
                   );
        
                    $edata = json_encode($json);
                     echo "$edata";
                    } #ANTERAN BATAL
                    }else{ #AUTH USERNAME
                        $json_respon[] = array(
                            "message"=> "Username atau Password Tidak Sesuai",
                            "code"=> 201
                
                        );
                        $userdata= json_encode($json_respon);
                        echo "$userdata";
                    } #AUTH USERNAME

?>