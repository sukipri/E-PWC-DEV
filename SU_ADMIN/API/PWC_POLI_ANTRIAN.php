<?PHP 
error_reporting(0);
session_start();
/*VIEW DATA SET SIMRS */
        /*COINFIG */
        include"../../BJH12/config/connec_01_srv_pdo_open.php";
        include"../secure/GR_01.php"; 
        include"../sc/stack_Q.php"; //Query SQL
        include"../sc/code_rand.php"; 
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST, GET");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
                    $json_input = file_get_contents('php://input');
                    $data_input = json_decode($json_input,true);
                    $header = apache_request_headers();
    #LOGIN USER
    $user_pwc = "PWC1001";
    $pass_pwc = "1001PWC";
    $input_user_pwc = @$header['x-username'];
    if($user_pwc==$header['x-username']){ #OPEN AUTH USERNAME
         
    #PARAMETER
        $kodepoli = @$data_input['kodepoli'];
        $kodedokter = @$data_input['kodedokter'];
        $tanggalperiksa = @$data_input['tanggalperiksa'];
        $jampraktek = @$data_input['jampraktek'];

            #SUB KONDISI Tanggal Periksa
            $tanggalperiksa_ln = strlen($tanggalperiksa);
            $tanggalperiksa_crt01 = date_create($date_html5);
            $tanggalperiksa_crt02 = date_create($tanggalperiksa);
            $tanggalperiksa_diff = date_diff($tanggalperiksa_crt01,$tanggalperiksa_crt02);
            $tanggalperiksa_realdiff = $tanggalperiksa_diff->format("%R%a");
                

            if($tanggalperiksa_realdiff < 0){ #Open AUTH Tanggal Backdate
                $json_tglbck_gagal = array(
                    "message"=> "Tanggal Periksa Tidak Berlaku",
                    "code"=> 201                 
                ); 
                $json_tglbck_gagal= json_encode($json_tglbck_gagal);
                echo "$json_tglbck_gagal";

                }else{ #Tanggal BackDate

                if($tanggalperiksa_ln < 10){ #OPEN AUTH TANGGAL TIDAK SESUAI
                    $json_tanggal_gagal = array(
                        "message"=> "Format Tanggal Tidak Sesuai, format yang benar adalah yyyy-mm-dd",
                        "code"=> 201                 
                    ); 
                    $data_tanggal_gagal= json_encode($json_tanggal_gagal);
                    echo "$data_tanggal_gagal";
                }else {  #AUTH TANGGAL TIDAK SESUAI

                #DATA UNIT
                $open_vunit01_sw = $ms_q("$sl UnitKode,UnitNama,UnitGrup,PoliKodeBPJS FROM Citarum.dbo.TUnit WHERE PoliKodeBPJS='$kodepoli' ");
                    $open_nr_vunit01_sw = $ms_nr($open_vunit01_sw);
                    $open_vunit01_sww = $ms_fas($open_vunit01_sw);
                    #DATA DOKTER
                    $open_vdkt01_sw = $ms_q("$sl PelakuKode,PelakuNama,UnitKode FROM Citarum.dbo.TPelaku WHERE PelakuKode='$kodedokter'");
                        $open_vdkt01_sww = $ms_fas($open_vdkt01_sw);
                    #DATA RAWAT JALAN
                    $open_vrj01_sw = $ms_q("$sl JalanNoReg,PasienNomorRM,DokterKode,JalanNoUrut FROM Citarum.dbo.TRawatJalan WHERE DokterKode='$open_vdkt01_sww[PelakuKode]' AND JalanRMTanggal BETWEEN '$tanggalperiksa' AND '$tanggalperiksa 23:59:00' AND NOT JalanStatus='9' ");
                        $open_nr_vrj01_sw = $ms_nr($open_vrj01_sw);
                        $open_vrj01_sww = $ms_fas($open_vrj01_sw);
                    #JADAWL DOKTER
                    $open_vjdw01_sw = $ms_q("$sl DokterKode,KetJam,Kuota,KuotaBPJS FROM JadwalDokter WHERE DokterKode='$kodedokter'");
                        $open_vjdw01_sww = $ms_fas($open_vjdw01_sw);
                    #KONVERSI DATA
                    $open_conv_kuota_01 =  $open_vjdw01_sww['KuotaBPJS'] - $open_nr_vrj01_sw;
                    $open_conv_kuota_02 =  $open_vjdw01_sww['Kuota'] - $open_nr_vrj01_sw;
                        

                    if($open_nr_vunit01_sw > 0){ #OPEN AUTH POLI
                        $json_poli_sw [] = array(
                            "namapoli"=> $open_vunit01_sww['UnitNama'],
                            "namadokter"=> $open_vdkt01_sww['PelakuNama'],
                            "totalantrean"=>  $open_nr_vrj01_sw,
                            "sisaantrean"=> 4,
                            //"test"=>  $tanggalperiksa_realdiff,
                            "antreanpanggil"=> $open_vrj01_sww['JalanNoUrut'],
                            "sisakuotajkn"=> $open_conv_kuota_01,
                            "kuotajkn"=> $open_vjdw01_sww['KuotaBPJS'],
                            "sisakuotanonjkn"=> $open_conv_kuota_02,
                            "kuotanonjkn"=>  $open_vjdw01_sww['Kuota'],
                            "keterangan"=> ""
                            
                        );     
                        $json_berhasil[] = array(
                            "metadata"=>"Ok",
                            "Code"=>200
                        );    
                        $json_poli_sw02 = array(
                            "response"=>$json_poli_sw,
                            "metadata"=>$json_berhasil
                        
                        ); 
                        $data_berhasil= json_encode($json_poli_sw02);
                        echo "$data_berhasil";

                    }else{ #AUTH PENcARIAN POLI
                        $json_poli_gagal [] = array(
                            "message"=> "Poli Tidak Ditemukan",
                            "code"=> 201    
                        
                        );
                        $json_gagal = array(
                            "metadata"=>$json_poli_gagal
                        );
                        $data_gagal= json_encode($json_gagal);
                        echo "$data_gagal";

                   } #AUTH PENCARIAN POLI
                } #AUTH TANGGAL  TIDAK SESUAI
            } 

                        }else{ #AUTH USERNAME
                            $json_respon[] = array(
                                "message"=> "Username atau Password Tidak Sesuai",
                                "code"=> 201
                    
                            );
                            $userdata= json_encode($json_respon);
                            echo "$userdata";
                        } #AUTH USERNAME
                    
?>