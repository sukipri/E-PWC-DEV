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
                $nopeserta = $data_input['nopeserta'];
                if(empty($nopeserta)){
                    $metadata = array(
                        'message' => "Nomorpeserta kosong",
                        'code' => 201
                     );     
                     $userdata= json_encode($metadata);
                     echo "$userdata";
                }else{
            /*$nopeserta = "0000993133293";*/
    
        //...Proccess..//
            //--DATA PASIEN--/
            $vpsn01_sw = $ms_q("$sl PasienNomorRM,PasienNoKartuJamin FROM Citarum.dbo.TPasien WHERE PasienNoKartuJamin='$nopeserta' ");
                $vpsn01_sww = $ms_fas($vpsn01_sw);
                $vpsn01_nr_sw = $ms_nr($vpsn01_sw);
            //--DATA BEDAH--//
           $vbjdw01_sw = $ms_q("$call_sel Citarum.dbo.TBedahJadwal WHERE PasienNomorRM='$vpsn01_sww[PasienNomorRM]' order by JadwalTglDaftar desc ");
             $vbjdw01_sww = $ms_fas($vbjdw01_sw);
             $vbjdw01_nr_sw = $ms_nr( $vbjdw01_sw);
            //--KONVERSI TANGGAL--//
            $date_vbjdw01_sw = $ms_q("$sl CONVERT(date,'$vbjdw01_sww[JadwalTanggal]',23) as tgl_bedah FROM Citarum.dbo.TBedahJadwal WHERE JadwalNomor='$vbjdw01_sww[JadwalNomor]' ");
             $date_vbjdw01_sww = $ms_fas($date_vbjdw01_sw);
            $get_ok = $ms_nr($vbjdw01_sw);
            //--DATA PELAKU MEDIS--//
            $vplk01_sw = $ms_q("$sl PelakuKode,UnitKode,SpesKode FROM Citarum.dbo.TPelaku WHERE PelakuKode='$vbjdw01_sww[OpDokOperator]' ");
                $vplk01_sww = $ms_fas($vplk01_sw);
            $vspes01_sw = $ms_q("$sl SpesKode,SpesNama FROM Citarum.dbo.TSpesialis WHERE SpesKode='$vplk01_sww[SpesKode]' ");
                $vspes01_sww = $ms_fas($vspes01_sw);
             $vunit01_sw = $ms_q("$call_sel Citarum.dbo.TUnit WHERE UnitKode='$vplk01_sww[UnitKode]'");
                $vunit01_sww = $ms_fas($vunit01_sw);
                #KONVERSI
                $int_jdwsts01 = (int) $vbjdw01_sww['JadwalStatus'] ;
            if($vpsn01_nr_sw < 1 ){
                $metadata = array(
                    'message' => "Nomor Kartu Salah",
                    'code' => 201
                 );     
                 $userdata= json_encode($metadata);
                 echo "$userdata";
            }else{
            
                if($vbjdw01_nr_sw < 0){ #TINDAKAN OPERASI
                   
                     $metadata = array(
                        'message' => "Tidak ada riwayat tindakan",
                        'code' => 201
                     );     
                     $userdata= json_encode($metadata);
                     echo "$userdata";
                }else{

            //Konversi
            $tujuh_hari = mktime(0,0,0,date("n"),date("j")+7,date("Y"));
            $kembali = date("d-m-Y", $tujuh_hari); 
           
                $date_01 = "$date_html5 $time_html5";
                if($date_01 == $vbjdw01_sww['JadwalTanggal']){
                    $status_op = "0";
                }elseif($date_01 !== $vbjdw01_sww['JadwalTanggal'] ){
                    $status_op = "1";
                }

            //..Array data success
             $array_bjdw01_sw  = array(
             'kodebooking' => $vbjdw01_sww['JadwalNomor'],
             'tanggaloperasi' =>  $date_vbjdw01_sww['tgl_bedah'],
             'jenistindakan' => $vbjdw01_sww['OpNama'],
             'kodepoli'=>$vunit01_sww['PoliKodeBPJS'],
             'namapoli' =>   $vunit01_sww['UnitNama'],
             'terlaksana' => $int_jdwsts01,
             
             );

             
            if($get_ok){ 
                $json_view = array(
                'list' => $array_bjdw01_sw

           );
           $metadata = array(
            'message' => "OK",
            'code' => 200

        );
        
        
    }else{
        $json_view = array(
            'response_code' => 201,
            'response_code_desc' => 'Data Not Set'
         );
         $metadata = array(
            'message' => "Tidak ada riwayat tindakan",
            'code' => 201
         );
         }
    
        $json = array(
            'response' => $json_view,
            'metadata' => $metadata
         );

        $edata = json_encode($json);
         echo "$edata";
        } #AUTH JIKA TIDKA DITEMUKAN JADWAL OPERAS
    }
} # NO PESERTA KOSONG
        }else{ #AUTH USERNAME
            $json_respon = array(
                "message"=> "Username atau Password Tidak Sesuai / Token expired",
                "code"=> 201
    
            );
            $userdata= json_encode($json_respon);
            echo "$userdata";
        } #AUTH USERNAME


?>