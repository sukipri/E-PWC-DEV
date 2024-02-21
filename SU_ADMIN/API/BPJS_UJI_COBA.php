<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
            $json_input = file_get_contents('php://input');
            $data_input = json_decode($json_input,true);
   $kode_sep = "0173B0760120P000924";
   $data = "1954";
   $secretKey = "3wI4D0BC26";
   $userkey =  "0b6ce0658965c7205734d96e9eaa25a7";
   $tg1 = date("Y-m-d");
   $url = "https://apijkn-dev.bpjs-kesehatan.go.id/antreanrs_dev/";
         // Computes the timestamp
          date_default_timezone_set('UTC');
          $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'));
          $data_time = "$data&$tStamp";
           // Computes the signature by hashing the salt with the secret key as the key
   $signature = hash_hmac('sha256', $data_time, $secretKey,$userkey);
 
   // base64 encode…
   $encodedSignature = base64_encode($signature);
 
   // urlencode…
   //$encodedSignature = urlencode($encodedSignature);
/*  */
   echo "X-cons-id: " .$data ." ";
   echo "X-timestamp:" .$tStamp ." ";
   echo "X-signature: " .$encodedSignature;
 
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_HTTPHEADER,array(
        "X-cons-id: $data",
        "X-timestamp:$tStamp",
        "X-signature:$encodedSignature",
		"Content-Type: Application/JSON",          
       	"Accept: Application/JSON"
    ));

    curl_setopt($ch, CURLOPT_SSLVERSION, 6);
    curl_setopt($ch , CURLOPT_URL ,$url."antrean/add");
	//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);  
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLPROTO_HTTPS , true);
	curl_setopt($ch, CURLINFO_HEADER_OUT, true);

    $data_pasien[] = array(
        "kodebooking"=>"PL-2201-0009", 
            "jenispasien"=>"JKN", 
            "nomorkartu"=>"0002086419161", 
            "nik"=>"3212345678987654", 
            "nohp"=>"085635228888", 
            "kodepoli"=>"INT", 
            "namapoli"=>"PENYAKIT DALAM", 
            "pasienbaru"=>0, 
            "norm"=>"123345", 
            "tanggalperiksa"=>"2022-01-17", 
            "kodedokter"=>33358, 
            "namadokter"=>"dr. Fathur Nur Kholis, Sp.PD", 
            "jampraktek"=>"18:00-20:00", 
            "jeniskunjungan"=>1, 
            "nomorreferensi"=>"0001R0040116A000001", 
            "nomorantrean"=>"06", 
            "angkaantrean"=>6, 
            "estimasidilayani"=>1615869169000, 
            "sisakuotajkn"=>14, 
            "kuotajkn"=>20, 
            "sisakuotanonjkn"=>4, 
            "kuotanonjkn"=>10, 
            "keterangan"=>"Pasien datang diharap datang lebih awal 30 menit"        
        
       );
  
      if($data_pasien == true){ 
        $json = array(
            'response_code' => '202',
            'response_code_desc' => 'OKEEE'
        );
         }elseif($data_pasien == false){
        $json = array(
            'response_code' => '101',
            'response_code_desc' => 'Data Gagal Ditampilkan'
         );
        }

        $psn_data = json_encode($json);
        //echo "{\"bill\":" . $edata ."}";
         echo "$psn_data";
  
			//echo phpinfo();

?>