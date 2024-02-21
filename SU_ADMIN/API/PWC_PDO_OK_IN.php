<?Php
/*VIEW DATA SET SIMRS */
	/*COINFIG */
			include_once"../config/connec_01_srv.php";
				include"../secure/GR_01.php"; //security enggine
				 //include"sc/ID_IDF.php";  //Identifer ID PAGE
				//include"css.php";   //style and control title meta
       			 include"../sc/stack_Q.php"; //Query SQL
				  include"../sc/code_rand.php"; 
	//.........//
	header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
                $json_input = file_get_contents('php://input');
                $data_input = json_decode($json_input,true);


    $APIKEY = "PWC1001";
    $REGRAND = rand('999','888');
    $OrderNomor = "JB-WS$years$month$REGRAND";
    //$APIKEYGET = @$sql_slashes($_GET['APIKEYGET']);
    	
        /* */
        $OrderTanggal = @$data_input['OrderTanggal']; 
        $PasienNoJKN = @$data_input['PasienNoJKN'];
        $RuangKode = @$data_input['RuangKode'];
        //$PasienNoKTP = @$data_input['PasienNoKTP']; 
        //$PasienNomorRM = @$data_input['PasienNomorRM'];
       // $PasienNama = @$data_input['PasienNama']; 
        //$PasienAlamat = @$data_input['PasienAlamat']; 
        //$PasienKota = @$data_input['PasienKota']; 
        $OpNama = @$data_input['OpNama']; 
        $OpKode = @$data_input['OpKode']; 
   
    /*
    $OrderTanggal = "2021-03-30"; 
    $PasienNoJKN = "38432842394238";
    $RuangKode = "06";
    $PasienNoKTP = "9348593459034"; 
    $PasienNomorRM = "345691";
    $PasienNama = "YERIMIA NGAHU,TN"; 
    $PasienAlamat = ""; 
    $PasienKota = ""; 
    $OpNama = "SCTP"; 
    */
        //-GET DATA Pasien--//
    $vpsn01_sw = $ms_q("$sl PasienNomorRM,PasienNama,PasienAlamat,PasienNoKartuJamin FROM TPasien WHERE PasienNoKartuJamin='$PasienNoJKN'");
    $vpsn01_sww = $ms_fas($vpsn01_sw);
    $cn_vpsn01_sww = $ms_nr($vpsn01_sw);
        if($cn_vpsn01_sww < 1){

            $json_meta = array(
                'response_code' => '404',
                'response_code_desc' => 'Maaf data pasien tidak terdaftar'
                );
                $json = array(
                    'metadata' => $json_meta
                 );

                $edata = json_encode($json);
                //echo "{\"bill\":" . $edata ."}";
                 echo "$edata";

        }elseif($cn_vpsn01_sww > 0){

        
        //...Proccess..//
            $save_ok= $ms_q("$in TBedahJadwal(JadwalNomor,JadwalTanggal,JadwalTglDaftar,RuangKode,PasienNomorRM,PasienNama,OpKode,OpNama,PrshKode)VALUES('$OrderNomor','$OrderTanggal','$date_html5 00:00:00','$RuangKode','$vpsn01_sww[PasienNomorRM]','$vpsn01_sww[PasienNama]','$OpKode','$OpNama','1-0113')");

        if($save_ok){ 

            $json_fetch = array(
               'kodebooking' => $OrderNomor,
               'response_code_desc' => $OrderTanggal,
               'jenistindakan' =>  $OpNama,
               'kodepoli' => $RuangKode,
               'namapoli' => ''


            );

            $json_meta = array(
                
               'response_code' => '00',
               'response_code_desc' => 'Pendaftaran Berhasil'
           );
        
        
    }else{
        $json_meta = array(
        'response_code' => '404',
        'response_code_desc' => 'Pendaftaran Gagal'
        );
        }
    
        $json = array(
            'Response' => $json_fetch,
            'metadata' => $json_meta
         );

        $edata = json_encode($json);
        //echo "{\"bill\":" . $edata ."}";
         echo "$edata";
        }

?>