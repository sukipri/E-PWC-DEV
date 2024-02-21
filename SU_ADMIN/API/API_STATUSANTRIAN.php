<?PHP 
  include"API_HEADER.php";
  
             $user_pwc = "PWC1001";
             $pass_pwc = "1001PWC";
             $token =  $pwc_vtoken01_sww['token_kode_01'];
             $input_user_pwc = @$header['x-username'];
             $input_token_pwc = @$header['x-token'];

             $REGRAND = rand('9999','8888');
             $TXT_REGRAND = "PL-WS$REGRAND";
             if($user_pwc==$input_user_pwc AND $token==$input_token_pwc){ #OPEN AUTH USERNAME
         
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

            #KONVERSI
            $tanggalperiksa_d = date('D',strtotime($tanggalperiksa));
            $jampraktek_d = substr($jampraktek,0,5);
            $jampraktek_d2 = substr($jampraktek,-5);
                if($tanggalperiksa_d=="Sun"){   
                    $hari_sw = 7;
                }elseif($tanggalperiksa_d=="Mon" ){
                    $hari_sw = 1;
                }elseif($tanggalperiksa_d=="Tue" ){
                    $hari_sw = 2;
                }elseif($tanggalperiksa_d=="Wed" ){
                    $hari_sw = 3;
                }elseif($tanggalperiksa_d=="Thu" ){
                    $hari_sw = 4;
                }elseif($tanggalperiksa_d=="Fri" ){
                    $hari_sw = 5;
                }elseif($tanggalperiksa_d=="Sat" ){
                    $hari_sw = 6;
                }

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
                    //echo "$data_tanggal_gagal";
                }else {  #AUTH TANGGAL TIDAK SESUAI

                #DATA UNIT
                $open_vunit01_sw = $ms_q("$sl UnitKode,UnitNama,UnitGrup,PoliKodeBPJS FROM Citarum.dbo.TUnit WHERE PoliKodeBPJS='$kodepoli' ");
                    $open_nr_vunit01_sw = $ms_nr($open_vunit01_sw);
                    $open_vunit01_sww = $ms_fas($open_vunit01_sw);
                    #DATA DOKTER
                    $open_vdkt01_sw = $ms_q("$sl PelakuKode,PelakuNama,UnitKode FROM Citarum.dbo.TPelaku WHERE PelakuBPJSKode='$kodedokter'");
                        $open_vdkt01_sww = $ms_fas($open_vdkt01_sw);
                    #DATA RAWAT JALAN
                    $open_vrj01_sw = $ms_q("$sl JalanNoReg,PasienNomorRM,DokterKode,JalanNoUrut,JalanStatus FROM Citarum.dbo.TRawatJalan WHERE DokterKode='$open_vdkt01_sww[PelakuKode]' AND (JalanRMTanggal  BETWEEN '$tanggalperiksa $jampraktek_d' AND '$tanggalperiksa $jampraktek_d2' ) AND NOT JalanStatus='9' AND NOT JalanStatus='1' AND UnitKode='$open_vunit01_sww[UnitKode]'");
                        $open_nr_vrj01_sw = $ms_nr($open_vrj01_sw);
                        $open_vrj01_sww = $ms_fas($open_vrj01_sw);
                    #JADAWL DOKTER
                    $open_vjdw01_sw = $ms_q("$sl DokterKode,KetJam,Kuota,Kuota2,KuotaBPJS FROM Citarum.dbo.JadwalDokter WHERE DokterKode='$open_vdkt01_sww[PelakuKode]'");
                        $open_vjdw01_sww = $ms_fas($open_vjdw01_sw);
                      #DATA JADWAL HFIZ
                      $vjhfis01_sw = $ms_q("$call_sel TJadwalHFIZ WHERE KodeDok='$kodedokter' AND KodePoli='$kodepoli' AND  Jadwal='$jampraktek' AND Hari='$hari_sw'  ");
                      $vjhfis01_sww = $ms_fas($vjhfis01_sw); #ARRAY
                      $vjhfis01_nr_sww = $ms_nr($vjhfis01_sw); #NUMERIK
                    #KONVERSI DATA
                    $open_conv_kuota_01 =   $vjhfis01_sww['KapasitasPas'] - $open_nr_vrj01_sw ;
                    $open_conv_kuota_02 =  $open_vjdw01_sww['Kuota'] -  $open_nr_vrj01_sw;
                    #LOGIC KONVERSI  BPJS
                   
                    if($open_conv_kuota_01 > $open_vjdw01_sww['KuotaBPJS']){
                        $value_conv_kuotabpjs01 = "0";
                    }else{
                        $value_conv_kuotabpjs01 =  $open_conv_kuota_01;
                    }
                    #LOGIC KONVERSI  NON BPJS
                    if( $open_conv_kuota_02 > $open_vjdw01_sww['Kuota']){
                        $value_conv_kuota01 = "0";
                    }else{
                        $value_conv_kuota01 =   $open_conv_kuota_02;
                    }
                        

                    if($open_nr_vunit01_sw > 0){ #OPEN AUTH POLI
                        $json_poli_sw  = array(
                            "namapoli"=> $open_vunit01_sww['UnitNama'],
                            "namadokter"=> $open_vdkt01_sww['PelakuNama'],
                            "totalantrean"=>  $open_nr_vrj01_sw,
                            "sisaantrean"=> $open_nr_vrj01_sw,
                           //"test"=>   $open_vdkt01_sww['PelakuKode'],
                            "antreanpanggil"=> $open_vrj01_sww['JalanNoUrut'],
                            "sisakuotajkn"=> $value_conv_kuotabpjs01,
                            "kuotajkn"=> $vjhfis01_sww['KapasitasPas'],
                            "sisakuotanonjkn"=>99,
                            "kuotanonjkn"=>  99,
                            "keterangan"=> ""
                            
                        );     
                        $json_berhasil = array(
                            "metadata"=>"Ok",
                            "code"=>200
                        );    
                        $json_poli_sw02 = array(
                            "response"=>$json_poli_sw,
                            "metadata"=>$json_berhasil
                        
                        ); 
                        $data_berhasil= json_encode($json_poli_sw02);
                        echo "$data_berhasil";

                    }else{ #AUTH PENcARIAN POLI
                        $json_poli_gagal  = array(
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
                            $json_respon = array(
                                "message"=> "Username atau Password Tidak Sesuai",
                                "code"=> 201
                    
                            );
                            $userdata= json_encode($json_respon);
                            echo "$userdata";
                        } #AUTH USERNAME
                    
?>