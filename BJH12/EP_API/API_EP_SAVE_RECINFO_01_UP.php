<?PHP 
//include"../css.php";   //style and control title meta
include"../sc/stack_Q.php"; //Query SQL

include"../config/connec_01_srv_02.php";


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$json_input = file_get_contents('php://input');
$data_input = json_decode($json_input,true);
date_default_timezone_set('Asia/Jakarta');

    #GET DATA
    $IDRECINFO01 = @$_GET['IDRECINFO01'];

    $epwc_vrecinfo01_sw = $ms_q("$call_sel TA_Record_Info WHERE ID='$IDRECINFO01'");
    while($epwc_vrecinfo01_sww = $ms_fas($epwc_vrecinfo01_sw)){
        
            $item_ri[] = array(
                "ID"=>$epwc_vrecinfo01_sww['ID'],
                "idkry"=>$epwc_vrecinfo01_sww['Per_ID'],
                "nip"=>$epwc_vrecinfo01_sww['Per_Code'],
                "tgl_masuk"=>$epwc_vrecinfo01_sww['Date_Time'],
                "kode_masuk"=>$epwc_vrecinfo01_sww['ep_kode_01'],
                "shift"=>$epwc_vrecinfo01_sww['ep_tjd_shift_01'],
                "status"=>$epwc_vrecinfo01_sww['In_Out']
            );

    }

                    $json_ri = array(
                        'data_ri' => $item_ri
                    );

                    $edata_ri = json_encode($json_ri);
                    echo "$edata_ri";
?>