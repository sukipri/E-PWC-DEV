<?PHP 
//error_reporting(0);
session_start();
include"../../BJH12/config/connec_01_srv_pdo_open.php";
include"../secure/GR_01.php"; 
include"../sc/stack_Q.php"; //Query SQL
include"../sc/code_rand.php"; 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        $json_input = file_get_contents('php://input');
        $data_input = json_decode($json_input,true);
        $header = apache_request_headers();

        
               #DATA VIEW TOKEN
               $pwc_vtoken01_sw = $ms_q("$call_sel Citarum.dbo.tb_token_01");
               $pwc_vtoken01_sww = $ms_fas($pwc_vtoken01_sw);
               $pwc_nr_vtoken01_sw = $ms_nr($pwc_vtoken01_sw);

?>