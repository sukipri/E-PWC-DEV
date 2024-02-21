<?php
    require_once "vendor/autoload.php";
     $kode_sep = "0173B0760120P000924";
     $data = "1954";
     $secretKey = "3wI4D0BC26";
     $userkey = "0b6ce0658965c7205734d96e9eaa25a7";
     $tg1 = date("Y-m-d");
     $url = "https://apijkn-dev.bpjs-kesehatan.go.id/antreanrs_dev/";
           // Computes the timestamp
            date_default_timezone_set('UTC');
            $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'));
             // Computes the signature by hashing the salt with the secret key as the key
     $signature = hash_hmac('sha256', $data."&".$tStamp, $secretKey,true);
   
     // base64 encode…
     $encodedSignature = base64_encode($signature);
     
   
     // urlencode…
     //$encodedSignature = urlencode($encodedSignature);
   
     echo "X-cons-id: " .$data ." ";
     echo "X-timestamp:" .$tStamp ." ";
     echo "X-signature: " .$encodedSignature;
     echo"<br>";

     $ch = curl_init();
     curl_setopt($ch,CURLOPT_HTTPHEADER,array(
         "X-cons-id: $data",
         "X-timestamp:$tStamp",
         "X-signature:$encodedSignature",
         "user_key:$userkey",
         "Content-Type: Application/JSON",          
            "Accept: Application/JSON"
     ));
     curl_setopt($ch, CURLOPT_SSLVERSION, 6);
     curl_setopt($ch , CURLOPT_URL ,$url."jadwaldokter/kodepoli/OBG/tanggal/2022-01-10");
     //curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
     curl_setopt($ch, CURLOPT_TIMEOUT, 60);  
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch, CURLPROTO_HTTPS , true);
     curl_setopt($ch, CURLINFO_HEADER_OUT, true);
     #DATA DECODE
     $send = curl_exec($ch);
     $send02 = base64_decode($send);
	 $j_son = json_decode($send,true);
     /*
     foreach($j_son['response'] as $baris_list){
        echo $baris_list['hari'];
    } */
        echo"$send";
        echo"<br>";
        echo $j_son['metadata']['code'];

    

        
?>