<?PHP 
#CONFIG
include"../../BJH12/config/connec_01_srv_pdo_open.php";
include"../secure/GR_01.php"; 
include"../sc/stack_Q.php"; //Query SQL
include"../../BJH12/sc/code_rand.php"; 
	//.........//
	header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
                $json_input = file_get_contents('php://input');
                $data_input = json_decode($json_input,true);

                $user_pwc = "PWC1001";
                $pass_pwc = "1001PWC";
                $input_user_pwc = @$_SESSION['x-username']=$user_pwc;

                #VARIABLE
                $kodebooking = $data_input['kodebooking'];
                $waktu = $data_input['waktu'];
                $conv_waktu = strtotime($waktu);

                $REGRAND = rand('9999','8888');
                $TXT_REGRAND = "PL-WS$REGRAND";
                if($user_pwc==$_SESSION['x-username']){ #OPEN AUTH USERNAME
                    #DATA TRAWATJALAN
                    $pwc_vrj01_sw = $ms_q("$sl JalanNoReg,rj_tgl_check_in FROM TRawatJalan WHERE JalanNoReg='$kodebooking'");
                    $pwc_vrj01_sww = $ms_fas($pwc_vrj01_sw);
                        if($pwc_vrj01_sww = ""){
                            $json_check_in  = array(
                                "message"=>"Ok",
                                "code"=>"200"
                            );
                            $json_check02_in  = array(
                                "metadata"=>$json_check_in
                            );
                            $json_data_check02_in= json_encode($json_check02_in);
                            echo "$json_data_check02_in";
                        }else{
                    #PROCCESSING
                    $pwc_save_check_01 = $ms_q("$up TRawatJalan SET rj_tgl_check_in='$waktu' WHERE JalanNoReg='$kodebooking'");
                if($pwc_save_check_01){ #VALIDASI DATA
                    $json_check  = array(
                        "message"=>"Ok",
                        "code"=>"200"
                    );
                    $json_check02  = array(
                        "metadata"=>$json_check
                    );
                    $json_data_check02= json_encode($json_check02);
                    echo "$json_data_check02";
                }else{
                    $json_check_gagal  = array(
                        "message"=>"Ok",
                        "code"=>"200"
                    );
                    $json_check02_gagal  = array(
                        "metadata"=>$json_check_gagal
                    );
                    $json_data_check02_gagal= json_encode($json_check02_gagal);
                    echo "$json_data_check02_gagal";
                }#VALIDASI DATA UPDATE CHECK
            } #VALIDASI DATA INSERT CHECK

                }else{
                    $json_respon[] = array(
                        "message"=> "Username atau Password Tidak Sesuai",
                        "code"=> 201
            
                    );
                    $userdata= json_encode($json_respon);
                    echo "$userdata";
                }
                

?>