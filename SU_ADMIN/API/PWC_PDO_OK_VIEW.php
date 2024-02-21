<?PHP 
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
                if($user_pwc==$input_user_pwc){ #OPEN AUTH USERNAME
                $tanggalawal = $data_input['tanggalawal'];
                $tanggalakhir = $data_input['tanggalakhir'];
     
            /*
            $tanggalawal = "2020-12-01";
            $tanggalahir = "2020-12-31";
            */
            $vbjadwal01_sw = $ms_q("$call_sel TBedahJadwal WHERE JadwalTanggal BETWEEN '$tanggalawal' AND '$tanggalakhir'");
                $cp_vbjadwal01_sw = $ms_nr($vbjadwal01_sw);
                while($vbjadwal01_sww = $ms_fas($vbjadwal01_sw)){
                        //--DATE PASIEN--//
                        $vpsn01_sw = $ms_q("$sl PasienNomorRM,PasienNoKartuJamin FROM TPasien WHERE PasienNomorRM='$vbjadwal01_sww[PasienNomorRM]' ");
                        $vpsn01_sww = $ms_fas($vpsn01_sw);
                        //--DATE CONVERT--//
                        $date_vbjadwal01_sw = $ms_q("$sl CONVERT(date,'$vbjadwal01_sww[JadwalTanggal]',23) as tgl_bedah FROM TBedahJadwal WHERE JadwalNomor='$vbjadwal01_sww[JadwalNomor]' ");
                       $date_vbjadwal01_sww = $ms_fas($date_vbjadwal01_sw);
                    //..Ruang..//
                    $vrbedah01_sw = $ms_q("$call_sel TBedahRuang WHERE RuangKode='$vbjadwal01_sww[RuangKode]'");
                        $vrbedah01_sww = $ms_fas($vrbedah01_sw);
                    //--DATA DOKTER--//
                    $vplk01_sw = $ms_q("$sl PelakuKode,UnitKode,SpesKode FROM TPelaku WHERE PelakuKode='$vbjadwal01_sww[OpDokOperator]' ");
                        $vplk01_sww = $ms_fas($vplk01_sw);
                    $vspes01_sw = $ms_q("$sl SpesKode,SpesNama FROM TSpesialis WHERE SpesKode='$vplk01_sww[SpesKode]' ");
                        $vspes01_sww = $ms_fas($vspes01_sw);
                    $vunit01_sw = $ms_q("$call_sel TUnit WHERE UnitKode='$vplk01_sww[UnitKode]'");
                        $vunit01_sww = $ms_fas($vunit01_sw);

                    $jadwal[] = array(
                        "kodebooking"=>$vbjadwal01_sww["JadwalNomor"],
                        "tanggaloperasi"=>$date_vbjadwal01_sww["tgl_bedah"],
                        "jenistindakan"=>$vbjadwal01_sww["OpNama"],
                        "kodepoli"=>$vunit01_sww['PoliKodeBPJS'],
                        "namapoli"=>$vunit01_sww['UnitNama'],
                        "terlaksana"=>$vbjadwal01_sww["JadwalStatus"],
                        "nopeserta"=> $vpsn01_sww["PasienNoKartuJamin"],
                        "lastupdate"=>strtotime($vbjadwal01_sww["UserDate"])
                        
                       ); 

                }
                        if($cp_vbjadwal01_sw > 0){ 
                            $daftar = array(
                            'list' => $jadwal
                            );

                            $metadata[] = array(
                                "message"=>"Ok",
                                "Code"=> "202"
                            ); 
                            
                        }elseif($cp_vbjadwal01_sw  < 1){
                            $daftar = array(
                                'response_code' => '201',
                                'response_code_desc' => 'Data Gagal Ditampilkan'
                            );

                            $metadata[] = array(
                                "message"=>"Ok",
                                "Code"=> "201"
                            ); 
                        }
                        $json = array(
                            'response' => $daftar,
                            'metadata' => $metadata
                        );
                            $jadwaldata= json_encode($json);
                            echo "$jadwaldata";

                        }else{ #AUTH USERNAME
                            $json_respon[] = array(
                                "message"=> "Username atau Password Tidak Sesuai",
                                "code"=> 201
                    
                            );
                            $userdata= json_encode($json_respon);
                            echo "$userdata";
                        } #AUTH USERNAME

?>