<?PHP 
    include"../sc/stack_Q.php"; //Query SQL

    include"../config/connec_01_srv_02.php";
    
    
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    $json_input = file_get_contents('php://input');
    $data_input = json_decode($json_input,true);
    date_default_timezone_set('Asia/Jakarta');

    #SET UP DATA
    $SETUP_DATE_D = date("d");
    $SET_DATE_02 = date("Ym");
    $date_html5 = date("Y-m-d");
    $date_time = date("H:i:s");
    $date_html5_kode = date("ymd");
    $time_ack2 = date("His");
    $RAND_DATA = rand('88','99');

                $epwc_tjdw01_sw = $ms_q("$sl Bulan,NIK,T$epwc_sub_vrecinfo01_sww FROM tJadwal WHERE NIK='$epwc_vrecinfo01_sww[Per_Code]' AND Bulan='$epwc_sub_vrecinfo01_sww02'");
                    while($epwc_tjdw01_sww = $ms_fas($epwc_tjdw01_sw)){
                    
                    
                    }
                



?>