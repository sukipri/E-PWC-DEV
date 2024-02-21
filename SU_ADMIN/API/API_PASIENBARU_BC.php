<?PHP 
    include"API_HEADER.php";
  
    #VARIBLE ENTRI
    $nomorkartu = @$data_input['nomorkartu'];
    $nik = @$data_input['nik'];
    $nomorkk = @$data_input['nomorkk'];
    $nama = @$data_input['nama'];
    $jeniskelamin = @$data_input['jeniskelamin'];
    $tanggallahir = @$data_input['tanggallahir'];
    $nohp = @$data_input['nohp'];
    $alamat = @$data_input['alamat'];
    $kodeprop = @$data_input['kodeprop'];
    $namaprop = @$data_input['namaprop'];
    $kodedati2 = @$data_input['kodedati2'];
    $namadati2 = @$data_input['namadati2'];
    $kodekec = @$data_input['kodekec'];
    $namakec = @$data_input['namakec'];
    $kodekel = @$data_input['kodekel'];
    $namakel = @$data_input['namakel'];
    $rw = @$data_input['rw'];
    $rt = @$data_input['rt'];


                $user_pwc = "PWC1001";
                $pass_pwc = "1001PWC";
                $token =  $pwc_vtoken01_sww['token_kode_01'];
                $input_user_pwc = @$header['x-username'];
                $input_token_pwc = @$header['x-token'];

                $REGRAND = rand('4444','8888');
#DATA PASIEN KONVERSI
$pwc_vpsn01_sw = $ms_q("$sl PasienNomorRM FROM Citarum.dbo.TPasien order by PasienTglInput desc ");
$pwc_vpsn01_sww = $ms_fas($pwc_vpsn01_sw);
$pwc_nr_vpsn01_sw = $ms_nr($pwc_vpsn01_sw);
$pwc_hit_vpsn01_sw = $pwc_vpsn01_sww['PasienNomorRM'] + 1;
$TXT_REGRAND = $pwc_hit_vpsn01_sw;

                if($user_pwc==$input_user_pwc AND $token==$input_token_pwc){ #OPEN AUTH USERNAME
                  #VALIDASI DATA
                if(empty($nomorkartu)){ #NOMOR KARTU
                    $json_psn01 = array(
                        "response"=>"Nomor kartu masih kosong",
                        "code"=>201
                    );
                    $json_psn02 = array(
                        "metadata"=>$json_psn01
                    );
                    
                    $data_json_psn01= json_encode($json_psn02);
                    echo "$data_json_psn01";
                
                }elseif(empty($nik)){ #NIK
                    $json_psn01 = array(
                        "response"=>"NIK masih kosong",
                        "code"=>201
                    );
                    $json_psn02 = array(
                        "metadata"=>$json_psn01
                    );
                    
                    $data_json_psn01= json_encode($json_psn02);
                    echo "$data_json_psn01";

                }elseif(empty($nomorkk)){ #NOMOR KK
                    $json_psn01 = array(
                        "response"=>"Nomor KK masih kosong",
                        "code"=>201
                    );
                    $json_psn02 = array(
                        "metadata"=>$json_psn01
                    );
                    
                    $data_json_psn01= json_encode($json_psn02);
                    echo "$data_json_psn01";

                }elseif(empty($nama)){ #NAMA
                    $json_psn01 = array(
                        "response"=>"Nama masih kosong",
                        "code"=>201
                    );
                    $json_psn02 = array(
                        "metadata"=>$json_psn01
                    );
                    
                    $data_json_psn01= json_encode($json_psn02);
                    echo "$data_json_psn01";

                }elseif(empty($jeniskelamin)){ #JENIS KELAMIN
                    $json_psn01 = array(
                        "response"=>"Jenis Kelamin masih kosong",
                        "code"=>201
                    );
                    $json_psn02 = array(
                        "metadata"=>$json_psn01
                    );
                    
                    $data_json_psn01= json_encode($json_psn02);
                    echo "$data_json_psn01";

                }elseif(empty($nohp)){ #NO HP
                    $json_psn01 = array(
                        "response"=>"Nomor HP masih kosong",
                        "code"=>201
                    );
                    $json_psn02 = array(
                        "metadata"=>$json_psn01
                    );
                    
                    $data_json_psn01= json_encode($json_psn02);
                    echo "$data_json_psn01";

                }elseif(empty($alamat)){ #alamat
                    $json_psn01 = array(
                        "response"=>"Alamat masih kosong",
                        "code"=>201
                    );
                    $json_psn02 = array(
                        "metadata"=>$json_psn01
                    );
                    
                    $data_json_psn01= json_encode($json_psn02);
                    echo "$data_json_psn01";
                }else{ 
              
                        #VALIDASI PASIEN SUDAH TERINPUT
                        $pwc_vpsn01_sw = $ms_q("$sl PasienNOID,PasienNoKartuJamin FROM Citarum.dbo.TPasien WHERE PasienNOID='$nik'"); #DATA PASIEN ROW
                            $pwc_nr_vpsn01_sw = $ms_nr($pwc_vpsn01_sw);
                        if($pwc_nr_vpsn01_sw > 0){
                            $json_psn01 = array(
                                "response"=>"NIK sudah pernah digunakan",
                                "code"=>201
                            );
                            $json_psn02 = array(
                                "metadata"=>$json_psn01
                            );
                            
                            $data_json_psn01= json_encode($json_psn02);
                            echo "$data_json_psn01";
                        }else{

                    #TRAWAT JALAN
                    $pwc_save_psn_01 = $ms_q("$in Citarum.dbo.TPasien(PasienNomorRM,PasienNama,PasienGender,PasienAlamat,PasienKelurahan,PasienKecamatan,PasienKota,PasienProv,PasienRT,PasienRW,PasienTelp,PasienHP,PasienTglLahir,PasienNOID,PasienNoKartuJamin,PasienNoKK,PasienProp21Kode,PasienKota21Kode,PasienKec21Kode,PasienKel21Kode,psn_tipe_01)VALUES('$TXT_REGRAND','$nama','$jeniskelamin','$alamat','$namakel','$namakec','$namadati2','$namaprop','$rt','$rw','$nohp','$nohp','$tanggallahir','$nik','$nomorkartu','$nomorkk','$kodeprop','$kodedati2','$kodekec','$kodekel','WS-PSN')");
                    if($pwc_save_psn_01){
                        $json_psn01_rm = array(
                            "norm"=>"$TXT_REGRAND"
                        );
                        $json_psn01 = array(
                            "response"=>"Harap datang ke admisi untuk melengkapi berkas Rekam Medis",
                            "code"=>200
                        );
                        $json_psn02 = array(
                            "response"=>$json_psn01_rm,
                            "metadata"=>$json_psn01
                        );

                        $data_json_psn01= json_encode($json_psn02);
                        echo "$data_json_psn01";
                        
                    }else{
                        $json_psn01 = array(
                            "response"=>"Gagal Simpan",
                            "code"=>201
                        );
                        $json_psn02 = array(
                            "metadata"=>$json_psn01
                        );
                        $data_json_psn01= json_encode($json_psn02);
                        echo "$data_json_psn01";
                    }
                } #VALIDASI FILEDS
            } #VALIDASI PASIEN JIKA SUDAH ADA
                }else{ #AUTH USERNAME
                    $json_respon[] = array(
                        "message"=> "Username atau Password Tidak Sesuai / Token expired",
                        "code"=> 201
            
                    );
                    $userdata= json_encode($json_respon);
                    echo "$userdata";
                } #AUTH USERNAME
        

?>