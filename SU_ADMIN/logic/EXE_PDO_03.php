<?php
    //Save Proccesing Pendaftaran Online step 03 Upload systems 
    
    //web
        if(isset($_POST['simpan_nomor'])){
            $no_jkn = @$sql_slash(trim($_POST['no_jkn']));
            $no_rujukan = @$sql_slash(trim($_POST['no_rujukan']));
               
    //validastion bridging BPJS
//echo"$vrjj_012[JalanNoRujukan]";
$kode_rujukan =  $no_rujukan;
$data = "1954";
$secretKey = "3wI4D0BC26";
$tg1 = date("Y-m-d");
$url = "https://new-api.bpjs-kesehatan.go.id:8080/new-vclaim-rest/Rujukan/$kode_rujukan";
     // Computes the timestamp
      date_default_timezone_set('UTC');
      $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'));
       // Computes the signature by hashing the salt with the secret key as the key
$signature = hash_hmac('sha256', $data."&".$tStamp, $secretKey, true);

// base64 encode…
$encodedSignature = base64_encode($signature);

// urlencode…
//$encodedSignature = urlencode($encodedSignature);

//echo "X-cons-id: " .$data ." ";
//echo "X-timestamp:" .$tStamp ." ";
// echo "X-signature: " .$encodedSignature;
// echo"<hr>";
$ch = curl_init();
curl_setopt($ch,CURLOPT_HTTPHEADER,array(
    "X-cons-id: $data",
    "X-timestamp:$tStamp",
    "X-signature:$encodedSignature",
    "Content-Type: Application/JSON",          
       "Accept: Application/JSON"
));
curl_setopt($ch, CURLOPT_SSLVERSION, 6);
curl_setopt($ch , CURLOPT_URL ,$url);
//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_TIMEOUT, 60);  
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLPROTO_HTTPS , true);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
//--//
$send = curl_exec($ch);
 $j_son = json_decode($send,true);
if($send===false){
    die("error fetching data: ".curl_error($ch));

}
$cek_rujukan = $j_son['response']['rujukan']['noKunjungan'];
$cek_jkn = $j_son['response']['rujukan']['peserta']['noKartu'];
    //echo"$cek_rujukan";
    if($cek_rujukan==$no_rujukan AND $cek_jkn==$no_jkn ){
        echo"<font color=green><b>Rujukan Valid, Silahkan 'klik jika data benar' tapi tunggu Tombol aktif dahulu....</b></font>";
        //Procccess    
            $up_jkn_01 = $ms_q("$up TPasien set PasienNoKartuJamin='$no_jkn' WHERE PasienNomorRM='$vpss[PasienNomorRM]'");
            $up_rujukan_01 = $ms_q("$up TRawatJalan set JalanNoRujukan='$no_rujukan',AppJenisDaftar='3' WHERE JalanNoReg='$REG' ")    ;
        ?>
            <meta http-equiv="refresh" content="3; url=<?php echo"?IDDKT=$IDDKT&RM=$RM&REG=$REG"; ?>">
        <?php }else{ echo"Rujukan Tidak Valid Mohon diisi dengan benar";}
            //--//
                //header("location:?IDDKT=$IDDKT&RM=$RM&REG=$REG#DSPD");
        }

        //---------------------------------//
            //android
        if(isset($_POST['simpan_nomor_02'])){
            $no_jkn = @$sql_slash($_POST['no_jkn']);
            $no_rujukan = @$sql_slash($_POST['no_rujukan']);

            //--BPJS//
$kode_rujukan =  $no_rujukan;
$data = "1954";
$secretKey = "3wI4D0BC26";
$tg1 = date("Y-m-d");
$url = "https://new-api.bpjs-kesehatan.go.id:8080/new-vclaim-rest/Rujukan/$kode_rujukan";
     // Computes the timestamp
      date_default_timezone_set('UTC');
      $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'));
       // Computes the signature by hashing the salt with the secret key as the key
$signature = hash_hmac('sha256', $data."&".$tStamp, $secretKey, true);

// base64 encode…
$encodedSignature = base64_encode($signature);

// urlencode…
//$encodedSignature = urlencode($encodedSignature);

//echo "X-cons-id: " .$data ." ";
//echo "X-timestamp:" .$tStamp ." ";
// echo "X-signature: " .$encodedSignature;
// echo"<hr>";
$ch = curl_init();
curl_setopt($ch,CURLOPT_HTTPHEADER,array(
    "X-cons-id: $data",
    "X-timestamp:$tStamp",
    "X-signature:$encodedSignature",
    "Content-Type: Application/JSON",          
       "Accept: Application/JSON"
));
curl_setopt($ch, CURLOPT_SSLVERSION, 6);
curl_setopt($ch , CURLOPT_URL ,$url);
//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_TIMEOUT, 60);  
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLPROTO_HTTPS , true);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
//--//
$send = curl_exec($ch);
 $j_son = json_decode($send,true);
if($send===false){
    die("error fetching data: ".curl_error($ch));

}
$cek_rujukan = $j_son['response']['rujukan']['noKunjungan'];
$cek_jkn = $j_son['response']['rujukan']['peserta']['noKartu'];
    //echo"$cek_rujukan";
    if($cek_rujukan==$no_rujukan AND $cek_jkn==$no_jkn ){
        echo"<font color=green><b>Rujukan Valid, Silahkan 'klik jika data benar' tapi tunggu Tombol aktif dahulu....</b></font>";
        //Procccess    
                $up_jkn_01 = $ms_q("$up TPasien set PasienNoKartuJamin='$no_jkn' WHERE PasienNomorRM='$vpss[PasienNomorRM]'");
                $up_rujukan_01 = $ms_q("$up TRawatJalan set JalanNoRujukan='$no_rujukan' WHERE JalanNoReg='$KDREG' ")    ;
                ?>
                <meta http-equiv="refresh" content="3; url=<?php echo"?IDDKT=$IDDKT&RM=$RM&REG=$KDREG&KDREG02=$KDREG02&KDREG=$KDREG"; ?>">
                <?php }else{ echo"<center><font color=red><b>Rujukan Tidak Valid Mohon diisi dengan benar</b></font></center>";}
                    //--//    
            //header("location:?IDDKT=$IDDKT&RM=$RM&REG=$KDREG&KDREG02=$KDREG02&KDREG=$KDREG");
        }
?>