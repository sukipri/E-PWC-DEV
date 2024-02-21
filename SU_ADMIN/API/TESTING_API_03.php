<?php
    error_reporting(0);
    session_start();
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
    #PARAMETER HEADER
    $user_pwc = "PWC1001";
    $pass_pwc = "1001PWC";
    $input_user_pwc = $header['x-username'];
    $input_pass_pwc = $header['x-password'];

    $encoded_header = base64_encode("PWC1001");
    # base64 encodes the payload json
    $encoded_payload = base64_encode("1001PWC");
    #Setting the secret key
    $secret_key = 'RSPWC1001';

    #$encoded_payload = base64_encode('{"country": "Romania","name": "RSPWC1001","email": "daftarpwc@gmail.com"}');
    # base64 strings are concatenated to one that looks like this
    $header_payload = "$encoded_header-$encoded_payload";

    $token = openssl_random_pseudo_bytes(16);
    #Convert the binary data into hexadecimal representation.
    $token = bin2hex($token);

    # Creating the signature, a hash with the s256 algorithm and the secret key. The signature is also base64 encoded.
    $signature = base64_encode(hash_hmac('sha256', $header_payload,$token,$secret_key));


    # Creating the JWT token by concatenating the signature with the header and payload, that looks like this:
    $jwt_token = "$header_payload-$signature";
    $input_token_pwc = $header['x-token'];

         $pwc_vtoken01_sw = $ms_q("$call_sel tb_token_01");
            $pwc_vtoken01_sww = $ms_fas($pwc_vtoken01_sw);
            $pwc_nr_vtoken01_sw = $ms_nr($pwc_vtoken01_sw);
                #DATE KALKULASI 
                $pwc_tg01 = date("Y-m-d");
                $pwc_tg01_d = date("d");
                $pwc_hit_01 = $pwc_tg01_d + 1 ;
                $pwc_zero_tg01_01 = sprintf('%02d', $pwc_hit_01);
                $pwc_tg01_02 = date("Y-m-$pwc_zero_tg01_01");
                
                if($pwc_nr_vtoken01_sw <= 0){ # VALIDASI ENTRI TOKEN
                    $ms_q("$in tb_token_01(idmain_token_01,token_kode_01,token_tglinput_01,token_tglakhir_01,token_status_01)VALUES('$IDMAIN','$jwt_token','','','2')");
                }else{
                    $ms_q("$up tb_token_01 set token_kode_01='$jwt_token',token_tglinput_01='$DATE_HTML5_SQL',token_tglakhir_01='$pwc_tg01_02' WHERE idmain_token_01='1908077662220204020752'");
                }

        if($user_pwc==$input_user_pwc AND $pass_pwc==$input_pass_pwc){
                
    $json_data[] = array(
        "token" => "$jwt_token",
        "test" => $pwc_hit_01
    );
    $json_respon[] = array(
        "message"=>"Ok",
        "Code"=>"202"
    );
        $json_get_data = array(
            "response"=>$json_data,
            "metadata"=>$json_respon
        );

        $userdata= json_encode($json_get_data);
            #echo "{\"bill\":" . $edata ."}";
            echo "$userdata";

}else{
    $json_respon[] = array(
        "message"=> "Username atau Password Tidak Sesuai",
        "code"=> 201

    );
    $userdata= json_encode($json_respon);
    #echo "{\"bill\":" . $edata ."}";
    echo "$userdata";
}
?> 