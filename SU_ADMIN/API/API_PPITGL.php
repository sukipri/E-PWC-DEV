<?PHP 
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

        #INPUT
        //$tanggal_awal = @$data_input['tanggal_awal'];
        //$tanggal_akhir = @$data_input['tanggal_akhir'];
        $GET_TGL01 = @$_GET['tgl01'];
        $GET_TGL02 = @$_GET['tgl02'];
          
        #DATA PPI
        $pwc_vppi01_sw = $ms_q("$sl * FROM Citarum.dbo.tPPI WHERE Tanggal BETWEEN '$GET_TGL01' AND '$GET_TGL02'  order by Tanggal desc ");
        $pwc_nr_vppi01_sw = $ms_nr($pwc_vppi01_sw);
            while($pwc_vppi01_sww = $ms_fas($pwc_vppi01_sw)){
                #DATA PPI DATE
                $pwc_tg_vppi01_sw = $ms_q("$sl convert(varchar,Tanggal, 23) as tg_23 FROM  Citarum.dbo.tPPI WHERE Nomor='$pwc_vppi01_sww[Nomor]'  ");
                 $pwc_tg_vppi01_sww = $ms_fas($pwc_tg_vppi01_sw);
                #DATA INAP
                $pwc_vinap01_sw = $ms_q("$sl InapNoAdmisi,PasienNomorRM FROM Citarum.dbo.TRawatInap WHERE InapNoAdmisi='$pwc_vppi01_sww[NoReg]'");
                $pwc_vinap01_sww = $ms_fas($pwc_vinap01_sw);
                $data_ppi [] = array(
                    "nomor" => $pwc_vppi01_sww['Nomor'],
                    "nomor_rm" => $pwc_vinap01_sww['PasienNomorRM'],
                    "tanggal" =>   $pwc_tg_vppi01_sww['tg_23'],
                    "noreg" => $pwc_vppi01_sww['NoReg'],
                    "ruang" => $pwc_vppi01_sww['Ruang'],
                    "infus" => $pwc_vppi01_sww['Infus'],
                    "plebitis" => $pwc_vppi01_sww['Plebitis'],
                    "dc" => $pwc_vppi01_sww['DC'],
                    "isk" => $pwc_vppi01_sww['ISK'],
                    "ventilator" => $pwc_vppi01_sww['Ventilator'],
                    "vap" => $pwc_vppi01_sww['VAP'],
                    "po" => $pwc_vppi01_sww['PO'],
                    "ilo" => $pwc_vppi01_sww['ILO'],
                    "pneumonia" => $pwc_vppi01_sww['Pneumonia'],
                    "hap" => $pwc_vppi01_sww['HAP'],
                    "TBL" => $pwc_vppi01_sww['TBL'],
                    "UD" => $pwc_vppi01_sww['UD'],
                    "iadp" => $pwc_vppi01_sww['IADP'],
                    "cvl" => $pwc_vppi01_sww['CVL'],
                    "ket" => $pwc_vppi01_sww['Ket']
                    
                );
            }
                if($pwc_nr_vppi01_sw > 0){
                    $json_ppi  = array(
                        "response" => $data_ppi,
                        "code"=>200
                    );
                }else{
                    $json_ppi  = array(
                        "response" => "DATA KOSONG",
                        "code"=>201
                    );
                }
                    
                    $data_json_ppi = json_encode($json_ppi);
                    echo $data_json_ppi;

            
          

?>