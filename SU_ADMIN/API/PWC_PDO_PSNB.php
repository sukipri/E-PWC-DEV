<?PHP 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

    $json_psnb = array(
        "response"=>"Data tidak tersedia",
        "code"=>201
    );
        $json_psnb02 = array(
            "metadata"=>$json_psnb
        );
    $data_json_psnb = json_encode($json_psnb02);
    echo $data_json_psnb;

?>