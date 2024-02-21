<?PHP 
   header("Access-Control-Allow-Origin: *");
   header("Content-Type: application/json; charset=UTF-8");
        $user_pwc = "PWC1001";
        $pass_pwc = "1001PWC";
        $input_user_pwc = @$_SESSION['x-username']=$user_pwc;

        $REGRAND = rand('9999','8888');
        $TXT_REGRAND = "PL-WS$REGRAND";
        if($user_pwc==$_SESSION['x-username']){ #OPEN AUTH USERNAME

                $kodedokter = @$data_input['kodedokter'];
                $kodedokter = @$data_input['kodedokter'];


        
        }

?>