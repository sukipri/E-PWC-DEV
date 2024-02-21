<?php
 error_reporting(0);
 session_start();
 include"../../BJH12/config/connec_01_srv_pdo_open.php";
 include"../secure/GR_01.php"; 
 include"../sc/stack_Q.php"; //Query SQL
 include"../sc/code_rand.php"; 
 header("Access-Control-Allow-Origin: *");
 header("Content-Type: application/json");
 header("Access-Control-Allow-Methods: POST, GET");
 header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
         $json_input = file_get_contents('php://input');
         $data_input = json_decode($json_input,true);
         $header = apache_request_headers();
 
         
                #DATA VIEW TOKEN
                $pwc_vtoken01_sw = $ms_q("$call_sel Citarum.dbo.tb_token_01");
                $pwc_vtoken01_sww = $ms_fas($pwc_vtoken01_sw);
                $pwc_nr_vtoken01_sw = $ms_nr($pwc_vtoken01_sw);
            
                            $user_pwc = "PWC1001";
                            $pass_pwc = "1001PWC";
                            $token =  $pwc_vtoken01_sww['token_kode_01'];
                            $input_user_pwc = @$header['x-username'];
                            $input_token_pwc = @$header['x-token'];
            
                            $REGRAND = rand('9999','8888');
                            $TXT_REGRAND = "PL-WS$REGRAND";
                            if($user_pwc==$input_user_pwc AND $token==$input_token_pwc){ #OPEN AUTH USERNAME

        #REQUEST DATA
        $kodebooking = @$data_input['kodebooking'];
          #DATA RAWAT JALAN
          $vrj01_sw = $ms_q("$sl JalanNoReg,PasienNomorRM,JalanRMTanggal,UnitKode,JalanNoUrut,DokterKode,UnitKode,JalanNoUrut,JalanStatus,JalanRMTanggal FROM Citarum.dbo.TRawatJalan WHERE JalanNoReg='$kodebooking'");
              #COUNTING
              $cn_vrj01_sw = $ms_nr($vrj01_sw) ;
            #COUINTING
               $vrj01_sww = $ms_fas($vrj01_sw);
                #SUB 
               $sub_vrj01_sw = substr($vrj01_sww['JalanRMTanggal'],0,-9);

             #DATA JALAN STATUS
             $vrj01_js_sw = $ms_q("$sl JalanNoReg,PasienNomorRM,JalanRMTanggal,UnitKode,JalanNoUrut,DokterKode,UnitKode,JalanNoUrut,JalanStatus FROM Citarum.dbo.TRawatJalan WHERE NOT JalanStatus='9' AND (JalanRMTanggal BETWEEN '$sub_vrj01_sw 00:00:00' AND '$sub_vrj01_sw 21:00:00')  AND DokterKode='$vrj01_sww[DokterKode]' AND UnitKode='$vrj01_sww[UnitKode]' ");
             $cn_vrj01_js_sw = $ms_nr( $vrj01_js_sw) ;

             $vrj01_js_sw02 = $ms_q("$sl JalanNoReg,PasienNomorRM,JalanRMTanggal,UnitKode,JalanNoUrut,DokterKode,UnitKode,JalanNoUrut,JalanStatus FROM Citarum.dbo.TRawatJalan WHERE NOT JalanStatus='1' AND (JalanRMTanggal BETWEEN '$sub_vrj01_sw 00:00:00' AND '$sub_vrj01_sw 21:00:00')  AND DokterKode='$vrj01_sww[DokterKode]' AND UnitKode='$vrj01_sww[UnitKode]'");
             $cn_vrj01_js_sw02 = $ms_nr($vrj01_js_sw02) ;
            #KONVSERSI
            $hit_vrj01_js_sw = $cn_vrj01_js_sw - $cn_vrj01_js_sw02;

        #DOKTER
        $vplk01_sw = $ms_q("$sl PelakuKode,UnitKode,SpesKode,PelakuNama FROM Citarum.dbo.TPelaku WHERE PelakuKode='$vrj01_sww[DokterKode]' ");
        $vplk01_sww = $ms_fas($vplk01_sw);

        #UNIT POLI
        $vunit01_sw = $ms_q("$sl UnitKode,UnitNama,PoliKodeBPJS FROM Citarum.dbo.TUnit WHERE UnitKode ='$vrj01_sww[UnitKode]'");
              $vunit01_sww = $ms_fas($vunit01_sw);

            if($cn_vrj01_sw > 0){
            $array_vrj01_sw  = array(
                'nomorantrean'=>$vrj01_sww['JalanNoUrut'],
                'namapoli'=> $vunit01_sww['UnitNama'],
                'namadokter'=>$vplk01_sww['PelakuNama'],
                'sisaantrean'=>$hit_vrj01_js_sw,
                'antreanpanggil'=>"0",
                'waktutunggu'=>"0",
                'keterangan'=>"0"  );
                
                $metadata = array(
                    "message"=>"Ok",
                    "code"=> 200
                ); 

           }else{
            $array_vrj01_sw  = array(
                'nomorantrean'=>"Antrean tidak ditemukan"
                );


            $metadata = array(
                "message"=>"Gagal",
                "ode"=> 201
            ); 
           }

           $json = array(
            'response' => $array_vrj01_sw,
            'metadata' => $metadata
           );

            $edata = json_encode($json);
             echo "$edata";

            }else{ #AUTH USERNAME
                $json_respon = array(
                    "message"=> "Username atau Password Tidak Sesuai",
                    "code"=> 201
        
                );
                $userdata= json_encode($json_respon);
                echo "$userdata";
            } #AUTH USERNAME


?>