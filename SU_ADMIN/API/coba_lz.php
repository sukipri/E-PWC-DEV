<?php 
        require_once 'vendor/autoload.php';
        /* function decrypt dan kompresi dijadikan satu */       
           #data AUTH
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
                
                $key = "$data$secretKey$tStamp";
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
            $string = $j_son['response'];
            //echo $string;
            //echo bin2hex("48656c6c6f20576f726c6421");
            $encrypt_method = 'AES-256-CBC';
            $key_hash = bin2hex(hash('sha256', $key));

            // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
            $iv = substr(bin2hex(hash('sha256', $key)), 0, 16);
            $output = openssl_decrypt(base64_decode($j_son['response']), $encrypt_method, $key_hash, OPENSSL_RAW_DATA, $iv);
        
            // function lzstring decompress 
            // download libraries lzstring : https://github.com/nullpunkt/lz-string-php
            // $json = \LZCompressor\LZString::decompressFromEncodedURIComponent($output);
        
            header('Content-Type: application/json');
            echo $output;
    ?>