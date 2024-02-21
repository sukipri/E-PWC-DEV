<?Php
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

                $user_pwc = "PWC1001";
                $pass_pwc = "1001PWC";
                $input_user_pwc = @$header['x-username'];

                $REGRAND = rand('9999','8888');
                $TXT_REGRAND = "PL-WS$REGRAND";
                if($user_pwc==$header['x-username']){ #OPEN AUTH USERNAME
                    
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
                    $vpsn01_sw = $ms_q("$sl PasienNomorRM,PasienNama,PasienNoKartuJamin FROM TPasien WHERE PasienNomorRM='$norm'");
                    $vpsn01_sww = $ms_fas($vpsn01_sw);
                    #DATA POLI
                    $vunit01_sw = $ms_q("$sl UnitKode,UnitNama,PoliKodeBPJS FROM TUnit WHERE PoliKodeBPJS='$kodepoli'");
                    $vunit01_sww = $ms_fas($vunit01_sw);
                    #DATA RANDOM DOKTER
                    $vdkt01_sw = $ms_q("SELECT PelakuKode,PelakuNama,UnitKode FROM TPelaku WHERE UnitKode='$vunit01_sww[UnitKode]' AND PelakuStatus='A' AND NOT SpesKode='PAKET' AND PelakuBPJSKode='$kodedokter'");
                    $vdkt01_sww = $ms_fas($vdkt01_sw);

                    #KONVERSI
                    $tanggalperiksa_d = date('D',strtotime($tanggalperiksa));
                    $jampraktek_d = substr($jampraktek,0,2);
                        if($tanggalperiksa_d=="Sun"){   
                            $hari_sw = "Minggu";
                        }elseif($tanggalperiksa_d=="Mon" ){
                            $hari_sw = "Senin";
                        }elseif($tanggalperiksa_d=="Tue" ){
                            $hari_sw = "Selasa";
                        }elseif($tanggalperiksa_d=="Wed" ){
                            $hari_sw = "Rabu";
                        }elseif($tanggalperiksa_d=="Thu" ){
                            $hari_sw = "Kamis";
                        }elseif($tanggalperiksa_d=="Fri" ){
                            $hari_sw = "Jumat";
                        }elseif($tanggalperiksa_d=="Sat" ){
                            $hari_sw = "Sabtu";
                        }

                        
                    #DATA JADWAL
                    $vjdw01_sw = $ms_q("$sl DokterKode,KetHari,KetJam,Kuota,KuotaBPJS FROM Citarum.dbo.JadwalDokter WHERE DokterKode='$kodedokter' AND cast(KetHari as varchar)='$hari_sw'");
                    $vjdw01_sww = $ms_fas($vjdw01_sw);
                    $vjdw01_nr_sww = $ms_nr($vjdw01_sw);
                    $vjdw01_sub_sw = substr($vjdw01_sww['KetJam'],0,2);
                        if( $vjdw01_sub_sw!==$jampraktek_d ){
                            $json_fetch = array(
                                'response_code' => 101,
                                'test'=> $vjdw01_sub_sw,
                                'response_code_desc' => 'Jadwal Tidak Ditemukan'
                             );
                            $json = array(
                                'metadata' => $json_fetch
                            );   
                            $edata = json_encode($json);
                             echo "$edata";
                           
                        }elseif($vjdw01_sub_sw==$jampraktek_d){
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
            $metadata[] = array(
                "message"=>"Ok",
                "Code"=> 200
            ); 
                
            }else{
                $json_fetch = array(
                    'response_code' => 101,
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
        }else{ #AUTH USERNAME
            $json_respon[] = array(
                "message"=> "Username atau Password Tidak Sesuai",
                "code"=> 201
    
            );
            $userdata= json_encode($json_respon);
            echo "$userdata";
        } #AUTH USERNAME
    

?>