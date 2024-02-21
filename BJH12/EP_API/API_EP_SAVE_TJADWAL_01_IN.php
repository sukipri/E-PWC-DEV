<?PHP 
//include"../css.php";   //style and control title meta
include"../sc/stack_Q.php"; //Query SQL

include"../config/connec_01_srv_02.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$json_input = file_get_contents('php://input');
$data_jdw = json_decode($json_input,true);
date_default_timezone_set('Asia/Jakarta');

#-Set DATA -#
$SETUP_DATE_D = date("d");
$SET_DATE_02 = date("Ym");
$date_html5 = date("Y-m-d");
$date_time = date("h:i:s");
$date_html5_kode = date("ymd");
$time_ack2 = date("his");
$RAND_DATA = rand('88','99');

//--GET DATA
$ep_ri_tgl01 = @$_GET['ep_ri_tgl01'];
$ep_ri_tgl02 = date("tomorrow");

                $IDEMP02 = @$data_jdw['IDEMP02'];
                $ep_bulan_01 = @$data_jdw['ep_bulan_01'];
                $ep_tgl_01 = @$data_jdw['ep_tgl_01'];
                $ep_shift_01 = @$data_jdw['ep_shift_01'];

                        #AUTH
                        $ep_cek_tjadwal01_sw = $ms_q("$sl bulan from tJadwal WHERE NIK='$IDEMP02' and Bulan='$ep_bulan_01'");
                            $ep_cek_tjadwal01_sww = $ms_nr($ep_cek_tjadwal01_sw);

                        #PROCCESSING
                                if($ep_cek_tjadwal01_sww > 0){

                            $ep_save_tjadwal_01 = $ms_q("$up TJadwal set $ep_tgl_01='$ep_shift_01' WHERE NIK='$IDEMP02' AND Bulan='$ep_bulan_01'");

                            if($ep_save_tjadwal_01){
                                $data_jadwal = array(
                                    "nip"=>$IDEMP02,
                                    "ket"=>"Data terunggah",
                                    "response"=>"00"
                                );
                            }else{
                                $data_jadwal  = array(
                                    "metadata"=>"GAGAL Unggah",
                                    "response"=>"502"
                                );
                            } 
                                }else{
                        $ep_save_tjadwal_01 = $ms_q("$in tJadwal(Bulan,Gustu,NIK,$ep_tgl_01)VALUES('$ep_bulan_01','0','$IDEMP02','$ep_shift_01')");
                    
                        if($ep_save_tjadwal_01){
                            $data_jadwal = array(
                                "nip"=>$IDEMP02,
                                "ket"=>"Data terunggah",
                                "response"=>"00"
                            );
                        }else{
                            $data_jadwal  = array(
                                "metadata"=>"GAGAL Unggah",
                                "response"=>"502"
                            );
                        } }
                            $json_jadwal = array(
                                "metadata"=>$data_jadwal
                            );

                            $edatajadwal = json_encode($json_jadwal);
                            echo $edatajadwal;



?>