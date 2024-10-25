<?PHP 
  include"API_HEADER.php";
  function milliseconds() {
    $mt = explode(' ', microtime());
    return intval( $mt[1] * 1E3 ) + intval( round( $mt[0] * 1E3 ) );
}
        
                        $user_pwc = "PWC1001";
                        $pass_pwc = "1001PWC";
                        $token =  $pwc_vtoken01_sww['token_kode_01'];
                        $input_user_pwc = @$header['x-username'];
                        $input_token_pwc = @$header['x-token'];
        
                        $REGRAND = rand('9999','8888');
                        $TXT_REGRAND = "PL-WS$REGRAND";
                        if($user_pwc==$input_user_pwc AND $token==$input_token_pwc){ #OPEN AUTH USERNAME

                $tanggalawal = $data_input['tanggalawal'];
                $tanggalakhir = $data_input['tanggalakhir'];
     
            /*
            $tanggalawal = "2020-12-01";
            $tanggalahir = "2020-12-31";
            */
            $vbjadwal01_sw = $ms_q("$call_sel Citarum.dbo.TBedahJadwal WHERE JadwalTanggal BETWEEN '$tanggalawal' AND '$tanggalakhir 23:59:00' order by JadwalTanggal desc");
                $cp_vbjadwal01_sw = $ms_nr($vbjadwal01_sw);
                while($vbjadwal01_sww = $ms_fas($vbjadwal01_sw)){
                        //--DATE PASIEN--//
                        $vpsn01_sw = $ms_q("$sl PasienNomorRM,PasienNoKartuJamin FROM Citarum.dbo.TPasien WHERE PasienNomorRM='$vbjadwal01_sww[PasienNomorRM]' ");
                        $vpsn01_sww = $ms_fas($vpsn01_sw);
                        //--DATE CONVERT--//
                        $date_vbjadwal01_sw = $ms_q("$sl CONVERT(date,'$vbjadwal01_sww[JadwalTanggal]',23) as tgl_bedah FROM Citarum.dbo.TBedahJadwal WHERE JadwalNomor='$vbjadwal01_sww[JadwalNomor]' ");
                       $date_vbjadwal01_sww = $ms_fas($date_vbjadwal01_sw);
                    //..Ruang..//
                    $vrbedah01_sw = $ms_q("$call_sel Citarum.dbo.TBedahRuang WHERE RuangKode='$vbjadwal01_sww[RuangKode]'");
                        $vrbedah01_sww = $ms_fas($vrbedah01_sw);
                    //--DATA DOKTER--//
                    $vplk01_sw = $ms_q("$sl PelakuKode,PelakuNama,UnitKode,SpesKode FROM Citarum.dbo.TPelaku WHERE PelakuKode='$vbjadwal01_sww[OpDokOperator]' ");
                        $vplk01_sww = $ms_fas($vplk01_sw);
                    $vspes01_sw = $ms_q("$sl SpesKode,SpesNama FROM Citarum.dbo.TSpesialis WHERE SpesKode='$vplk01_sww[SpesKode]' ");
                        $vspes01_sww = $ms_fas($vspes01_sw);
						$vunit01_sw = $ms_q("$call_sel Citarum.dbo.TUnit WHERE UnitKode='$vplk01_sww[UnitKode]'");
                        $vunit01_sww = $ms_fas($vunit01_sw);
                        #KONVERSI
                        $int_jdwsts01 = (int) $vbjadwal01_sww['JadwalStatus'] ;
						$micro_jdw01 = microtime($vbjadwal01_sww["UserDate"]);

                    $jadwal [] = array(
                        "kodebooking"=>$vbjadwal01_sww["JadwalNomor"],
                        "tanggaloperasi"=>$date_vbjadwal01_sww["tgl_bedah"],
                        "Dokter"=> $vplk01_sww['PelakuNama'],
                        "jenistindakan"=>$vbjadwal01_sww["OpNama"],
                        "kodepoli"=>$vunit01_sww ['PoliKodeBPJS'],
                        "namapoli"=>$vunit01_sww['UnitNama'],
                        "terlaksana"=>$int_jdwsts01,
                        "nopeserta"=> $vpsn01_sww["PasienNoKartuJamin"],
                        "lastupdate"=> 	round(microtime($vbjadwal01_sww['UserDate']) * 1000)
						
                       ); 

                }
                        if($cp_vbjadwal01_sw > 0){ 
                            $daftar  = array(
                            'list' => $jadwal
                            );
                            
                             $metadata = array(
                                "message"=>"Ok",
                                "code"=> 200
                            ); 
                            
                        }elseif($cp_vbjadwal01_sw  < 1){
                            $daftar = array(
                                'response_code' => 201,
                                'response_code_desc' => 'Data Gagal Ditampilkan'
                            );

                            $metadata = array(
                                "message"=>"Ok",
                                "code"=> 201
                            ); 
                        }
                        $json  = array(
                            'response' => $daftar,
                            'metadata' => $metadata
                        );
                            $jadwaldata  = json_encode($json);
                            echo "$jadwaldata";

                        }else{ #AUTH USERNAME
                            $json_respon = array(
                                "message"=> "Username atau Password Tidak Sesuai",
                                "code"=> 201
                    
                            );
                            $userdata = json_encode($json_respon);
                            echo "$userdata";
                        } #AUTH USERNAME

?>