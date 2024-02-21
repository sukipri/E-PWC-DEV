<?php
     /*----------------------------------------------*/
    /* Himpunan Data Code Variabel DAN FUNGSI NON QUERING DBMS */
    /*----------------------------------------------*/

    /*Code Line 01 */
        /*NOTE->Himpunan REQUEST data Non DB */
            date_default_timezone_set('Asia/Jakarta');
            //..VAR URL HOST HOME
                $MY_HOST = @$_SERVER['HTTP_HOST'];
                $MY_DOM = @$_SERVER['REQUEST_URI'];

            //..VAR Random && Numeric
                $RAND_LG = rand('999999','888888');
			    $RAND_MD = rand('9999','7777');
                $RAND_SM = rand('9','9');
                $NF = @number_format;
            
            //...VAR DATE AND TIME 
                $DATE_Ymd = date("Ymd");
                $DATE_Y = date("Y");
                $DATE_m = date("m");
                $DATE_d= date("d");
                $DATE_ymd = date("ymd");
                $TIME_his = date("his");
                $TIME_his02 = date("h-i-s");
                $DATE_AM = date("A");
                $TIME_HTML5 = date("H:i:s");
                $DATE_HTML5 = date("d-m-Y");
                $DATE_HTML5_SQL = date("Y-m-d");
                $DATE_HTML5_TINY = date("y-m-d");
                $DATE_TXT_NOW = date("D F Y");

            //FUNCTION DATE AND TIME
                function FS_DATE($fsdate)
                {
                    $MONTH= array (1 =>   'January',
                                'February',
                                'March',
                                'April',
                                'May',
                                'June',
                                'July',
                                'Agust',
                                'September',
                                'October',
                                'November',
                                'December'
                            );
                    $split = explode('-', $fsdate);
                    return $split[2] . ' ' . $MONTH[ (int)$split[1] ] . ' ' . $split[0];
                }

            
        /*GENERATING variabel SET */
            // COVERTING VARIABEL  AND FUNCTION Encryption
              //..hasing..//
                $GEN_EN_HS_WH = hash('whirlpool','$RAND_LG'); //NOTE-> Metode hasing format(has(['tipe_hasing'],'Varibel hasing'))
                $GEN_EN_HS_MD5 = hash('md5','$RAND_LG');   
                $GEN_EN_HS_SHA1 = hash('sha1','$RAND_LG');  
                $GEN_EN_HS_CR32 = crc32($RAND_LG); 

             //..Encoding..//
                $GEN_EN_BSE = base64_encode($RAND_LG);

            //..Encryption..(FUNCTION) BLOWWFISH//
                 function GEN_EN_BF($string, $key) { //NOTE-> Untuk Peng-enkripsian data
                        $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
                        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
                        $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $key, utf8_encode($string), MCRYPT_MODE_ECB, $iv);
                        return $encrypted_string;
                        //NOTE->BLOWFISH ENkripsi Algorthm
                         /* echo GEN_EN_BF("$RAND_LG",'$IDMAIN'); */
                    }
                    function GEN_DE_BF($encrypted_string, $key) { //NOTE-> untuk Pen-deskripsian enkripsi data
                        $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
                        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
                        $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $key, $encrypted_string, MCRYPT_MODE_ECB, $iv);
                        return $decrypted_string;
                     }
            //...Encoding encryption Function.. ENCODING ENKRIPTION//
                    function EN_HS_WH($data_wh){
                        $filter_wh = whirlpool($data_wh); 
                        return $filter_wh; 
                            } //NOTE-> HASHING Whirpool 

                    function EN_HS_MD5($data_md5){
                        $filter_md5 = md5($data_md5); 
                         return $filter_md5; 
                             } //NOTE-> HASHING MD5
                             
                    function EN_HS_CR32($data_cr32){
                         $filter_cr32 = crc32($data_cr32); 
                            return $filter_cr32; 
                             } //NOTE-> HASHING CR32

                    function EN_BSE($data_bse){
                         $filter_bse = base64_encode($data_bse); 
                            return $filter_bse; 
                             } //NOTE-> Encoding Bas64
                   
            /*Xss Security Variabel*/
                     $SQL_ESC = @mysqli_real_escape_string;
                     $TR = @trim;
                     $SQL_SL = @addslashes;
                     $HTML_ent = @htmlentities;
                     $HTML_SP = @htmlspecialchars;
                     $STRU = @strtoupper;


                     
                     
                     
            /*______________________________*/
            //     Show data variabel        //
            /*_______________________________*/
            
            //VARIABEL CONVERTING ID GENERATING SET
                $IDMAIN = "STP$GEN_EN_BSE$DATE_ymd$TIME_his";
                $TOKEN01 = "PWCQ839238";
                
                ?>
	            