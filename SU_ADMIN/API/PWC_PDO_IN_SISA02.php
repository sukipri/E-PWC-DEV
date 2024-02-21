<?php
    /*COINFIG */
    include_once"../config/connec_01_srv.php";
    include"../secure/GR_01.php"; //security enggine		
    include"../sc/stack_Q.php"; //Query SQL
    include"../sc/code_rand.php"; 
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
    $_SESSION['x-username']=$user_pwc;
    if($user_pwc==$_SESSION['x-username']){ #OPEN AUTH USERNAME

        #PARAMETER VARIABLE
        $kodepoli = @$data_input['kodepoli'];
        $kodedokter = @$data_input['kodedokter'];
        $tanggalperiksa = @$data_input['tanggalperiksa'];
        $jampraktek = @$data_input['jampraktek'];

        #DATA POLI
        $vunit01_sw = $ms_q("$sl UnitKode,UnitNama,PoliKodeBPJS FROM Citarum.dbo.TUnit WHERE PoliKodeBPJS ='$kodepoli'");
        $vunit01_sww = $ms_fas($vunit01_sw);
        #DATA DOKTER
        $vplk01_sw = $ms_q("$sl PelakuKode,UnitKode,SpesKode,PelakuNama FROM Citarum.dbo.TPelaku WHERE PelakuKode='$kodedokter' ");
        $vplk01_sww = $ms_fas($vplk01_sw);
        
          #DATA RWAT JALAN
          $vrj01_sw = $ms_q("$sl JalanNoReg,PasienNomorRM,JalanRMTanggal,UnitKode,JalanNoUrut,DokterKode,UnitKode,JalanNoUrut,JalanStatus FROM Citarum.dbo.TRawatJalan WHERE (JalanRMTanggal BETWEEN '$tanggalperiksa 00:00:00' AND '$tanggalperiksa 23:59:00'  )  AND DokterKode='$kodedokter' AND UnitKode='$vunit01_sww[UnitKode]'");
          //..CN//
              $cn_vrj01_sw = $ms_nr($vrj01_sw);
          //Fetch//
               $vrj01_sww = $ms_fas($vrj01_sw);

            //--DATA JALANSTATUS RAWAT JALAN--//
               $vrj01_js_sw = $ms_q("$sl JalanNoReg,PasienNomorRM,JalanRMTanggal,UnitKode,JalanNoUrut,DokterKode,UnitKode,JalanNoUrut,JalanStatus FROM Citarum.dbo.TRawatJalan WHERE NOT JalanStatus='9' AND (JalanRMTanggal BETWEEN '$tanggalperiksa 00:00:00' AND '$tanggalperiksa 21:00:00'  )  AND DokterKode='$kodedokter' AND UnitKode='$vunit01_sww[UnitKode]' ");
                $cn_vrj01_js_sw = $ms_nr( $vrj01_js_sw) ;

                $vrj01_js_sw02 = $ms_q("$sl JalanNoReg,PasienNomorRM,JalanRMTanggal,UnitKode,JalanNoUrut,DokterKode,UnitKode,JalanNoUrut,JalanStatus FROM Citarum.dbo.TRawatJalan WHERE NOT JalanStatus='1' AND (JalanRMTanggal BETWEEN '$tanggalperiksa 00:00:00' AND '$tanggalperiksa 21:00:00'  )  AND DokterKode='$kodedokter' AND UnitKode='$vunit01_sww[UnitKode]'");
                $cn_vrj01_js_sw02 = $ms_nr($vrj01_js_sw02) ;

                #jadwal DOkter
                $pwc_vjdw01_sw = $ms_q("$sl DokterKode,KetHari,KetJam,Kuota,KuotaBPJS FROM JadwalDokter WHERE DokterKode='$kodedokter'");
                    $pwc_vjdw01_sww = $ms_fas($pwc_vjdw01_sw);
                    #KONVSERSI
                    $cn_hit_vrj01_js_sw = $cn_vrj01_js_sw - $cn_vrj01_js_sw02;
                    $cn_hit_vrj01_js_sw02 = $pwc_vjdw01_sww['KuotaBPJS'] - $cn_vrj01_js_sw;

                if($cn_vrj01_sw > 0){
                $array_vrj01_sw  = array(
                //'TEST_DATA'=>$vunit01_sww['UnitKode'],
                "namapoli"=> $vunit01_sww['UnitNama'],
                "namadokter"=> $vplk01_sww['PelakuNama'],
                "totalantrean"=> $cn_vrj01_js_sw,
                "sisaantrean"=>  $cn_hit_vrj01_js_sw02,
                "antreanpanggil"=> $vrj01_sww['JalanNoUrut'],
                "sisakuotajkn"=>  $cn_hit_vrj01_js_sw02,
                "kuotajkn"=> $pwc_vjdw01_sww['KuotaBPJS'],
                "sisakuotanonjkn"=> $cn_hit_vrj01_js_sw,
                "kuotanonjkn"=> $pwc_vjdw01_sww['KuotaBPJS'],
                "keterangan"=> ""
            );
                
                
                $metadata[] = array(
                    "message"=>"Ok",
                    "Code"=> "200"
                ); 

           }else{
            $array_vrj01_sw  = array(
                //TEST_DATA'=>$vunit01_sww['UnitKode'],
                'nomorantrean'=>"Antrean tidak ditemukan"
                );

            $metadata[] = array(
                "message"=>"Gagal",
                "Code"=> "201"
            ); 
           }

           $json = array(
            'response' => $array_vrj01_sw,
            'metadata' => $metadata
           );

            $edata = json_encode($json);
             echo "$edata";

            }else{ #AUTH USERNAME
                $json_respon[] = array(
                    "message"=> "Username atau Password Tidak Sesuai",
                    "code"=> 201
        
                );
                $userdata= json_encode($json_respon);
                echo "$userdata";
            } #AUTH USERNAME


?>