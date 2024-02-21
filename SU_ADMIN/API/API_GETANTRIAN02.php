<?Php
  include"API_HEADER.php";

           
                           $user_pwc = "PWC1001";
                           $pass_pwc = "1001PWC";
                           $token =  $pwc_vtoken01_sww['token_kode_01'];
                           $input_user_pwc = @$header['x-username'];
                           $input_token_pwc = @$header['x-token'];
           
                           $REGRAND = rand('9999','8888');
                           $TXT_REGRAND = "PL-WS$REGRAND";
                           if($user_pwc==$input_user_pwc AND $token==$input_token_pwc){ #OPEN AUTH USERNAME
                    
                #VARIABLE DATA
                $nomorkartu = $data_input['nomorkartu'];
                $nik = $data_input['nik'];
                $nohp = $data_input['nohp'];
                $norm = $data_input['norm'];
                $kodedokter = $data_input['kodedokter'];
                $jampraktek = $data_input['jampraktek'];
                $jeniskunjungan = "1";
                $tanggalperiksa = $data_input['tanggalperiksa'];
                $kodepoli = $data_input['kodepoli'];
                $nomorreferensi = $data_input['nomorreferensi'];
           
                    #DATA PASIEN
                    $vpsn01_sw = $ms_q("$sl PasienNomorRM,PasienNama,PasienNoKartuJamin FROM Citarum.dbo.TPasien WHERE PasienNomorRM='$norm'");
                    $vpsn01_sww = $ms_fas($vpsn01_sw);
                    $vpsn01_nr_sww = $ms_fas($vpsn01_sw);
                    #DATA POLI
                    $vunit01_sw = $ms_q("$sl UnitKode,UnitNama,PoliKodeBPJS FROM Citarum.dbo.TUnit WHERE PoliKodeBPJS='$kodepoli'");
                    $vunit01_sww = $ms_fas($vunit01_sw);
                    #DATA RANDOM DOKTER
                    $vdkt01_sw = $ms_q("$sl PelakuKode,PelakuNama,UnitKode FROM Citarum.dbo.TPelaku WHERE UnitKode='$vunit01_sww[UnitKode]' AND PelakuStatus='A' AND NOT SpesKode='PAKET' AND PelakuBPJSKode='$kodedokter'");
                    $vdkt01_sww = $ms_fas($vdkt01_sw);
                        if( $vpsn01_nr_sww < 0 || empty($norm) ){
                            $json_fetch = array(
                                'code' => 202,
                                //'test'=> $vjdw01_sub_sw,
                                'message' => 'Nomor RM Tidak ditemukan , silahkan mendaftar sebagai pasien baru'
                             );
                            $json = array(
                                'metadata' => $json_fetch
                            );   
                            $edata = json_encode($json);
                             echo "$edata";
                        }else{
                

                    #KONVERSI
                    $tanggalperiksa_d = date('D',strtotime($tanggalperiksa));
                    $jampraktek_d = substr($jampraktek,0,5);
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

                        
                    #DATA JADWAL
                    $vjdw01_sw = $ms_q("$sl DokterKode,KetHari,KetJam,Kuota,KuotaBPJS FROM Citarum.dbo.JadwalDokter WHERE DokterKode='$vdkt01_sww[PelakuKode]' AND cast(KetHari as varchar)='$hari_sw'");
                    $vjdw01_sww = $ms_fas($vjdw01_sw);
                    $vjdw01_nr_sww = $ms_nr($vjdw01_sw);  
                    $vjdw01_sub_sw = substr($vjdw01_sww['KetJam'],0,5);
                    #DATA JADWAL HFIZ
                    $vjhfis01_sw = $ms_q("$call_sel TJadwalHFIZ WHERE KodeDok='$kodedokter' AND KodePoli='$kodepoli' AND  Jadwal='$jampraktek' AND Hari='$hari_sw'  ");
                    $vjhfis01_sww = $ms_fas($vjhfis01_sw);
                    $vjhfis01_nr_sww = $ms_nr($vjhfis01_sw);
                  
                      if( $vjhfis01_nr_sww <= 0){
                        $json_fetch = array(
                            'code' => 201,
                            'test'=> $hari_sw,
                            'message' => 'Jadwal Tidak Ditemukan'
                         );
                        $json = array(
                            'metadata' => $json_fetch
                        );   
                        $edata = json_encode($json);
                         echo "$edata";
                      }else{
                    /*......................*/

                    #NOMOR REGISTER
                    $vdc_hit_01 = $ms_q("SELECT TOP 1  JalanNoUrut FROM TRawatJalan where DokterKode = '$vdkt01_sww[PelakuKode]' AND JalanRMTanggal between '$tanggalperiksa' AND '$tanggalperiksa 23:59' and not JalanStatus='9'  AND WaktuPesan ='P' AND JalanNoUrut > 0 order by Convert(Integer,JalanNoUrut) desc");
                    #CEK DATA TRAWATJALAN
                    $vdc_cek_01 = $ms_q("SELECT TOP 1  JalanNoUrut FROM TRawatJalan where DokterKode = '$vdkt01_sww[PelakuKode]' AND JalanRMTanggal between '$tanggalperiksa' AND '$tanggalperiksa 23:59' and not JalanStatus='9'  AND WaktuPesan ='P' AND JalanNoUrut > 0 AND PasienNomorRM='$norm' order by Convert(Integer,JalanNoUrut) desc");
                    $vdcc_cek_01 = $ms_nr($vdc_cek_01);
                        if($vdcc_cek_01 > 0){ #OPEN AUTH CEK DATA
                            $json_antrian_gagal[] = array(
                                "message"=> "Nomor Antrean Hanya Dapat Diambil 1 Kali Pada Tanggal Yang Sama",
                                "code"=> 201                
                            );
                            $data_json_antrian_gagal= json_encode($json_antrian_gagal);
                            echo "$data_json_antrian_gagal";
                          }else{ #AUTH CEK DATA

                    $vdcc_hit_01 = $ms_fas($vdc_hit_01);
                    $vdcc_jum_01 = $vdcc_hit_01['JalanNoUrut'] + 1 ;	
                    $hit_zero_02 = sprintf('%02d', $vdcc_jum_01);
                    $hit_conv_zero_02 = is_int($hit_zero_02);

        #PROCCESSING
            $save_rj = $ms_q("$in TRawatJalan(JalanNoReg,PasienNomorRM,PasienNama,JalanCaraDaftar,AppJenisDaftar,JalanTanggal,UnitKode,DokterKode,JalanNoUrut,WaktuPesan,JalanStatus,JalanRMTanggal,JalanJenisPeriksa)VALUES('$TXT_REGRAND','$vpsn01_sww[PasienNomorRM]','$vpsn01_sww[PasienNama]','4','1','$date_html5','$vunit01_sww[UnitKode]','$vdkt01_sww[PelakuKode]','$hit_zero_02','P','0','$tanggalperiksa','M')");
            
        if($save_rj){ 
            $json_fetch = array(
               
               "nomorantrean"=> $hit_zero_02,
               "angkaantrean"=> $vdcc_jum_01,
               "kodebooking"=> $TXT_REGRAND,
               "norm"=> $norm,
               "namapoli"=> $vunit01_sww['UnitNama'],
               "namadokter"=> $vdkt01_sww['PelakuNama'],
               //'test'=> $vjdw01_sub_sw,
               "estimasidilayani"=> 1615869169000,
               "sisakuotajkn"=> 5,
               "kuotajkn"=> $vjdw01_sww['KuotaBPJS'],
               "sisakuotanonjkn"=> 5,
               "kuotanonjkn"=> $vjdw01_sww['Kuota'],
               "keterangan"=> "Peserta harap 60 menit lebih awal guna pencatatan administrasi."
                
            );
            $metadata = array(
                "message"=>"Ok",
                "code"=> 200
            ); 
                
            }else{
                $json_fetch = array(
                    'response_code' => 201,
                    'response_code_desc' => 'Data Not Set'
                );
                } 

                $json = array(
                    'response' => $json_fetch,
                    'metadata' => $metadata
                );   
                $edata = json_encode($json);
                echo "$edata";
            } #AUTH CEK DATA
        }
    } #RM
        }else{ #AUTH USERNAME
            $json_respon = array(
                "message"=> "Username atau Password Tidak Sesuai",
                "code"=> 201
    
            );
            $userdata= json_encode($json_respon);
            echo "$userdata";
        } #AUTH USERNAME
    

?>