<?PHP 
  //include"../css.php";   //style and control title meta
    include"../sc/stack_Q.php"; //Query SQL

    include"../config/connec_01_srv_02.php";


    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    date_default_timezone_set('Asia/Jakarta');
        //--Set up --
        $SETUP_DATE_D = date("d");
        $SET_DATE_02 = date("Ym");
        //--GET DATA--//
        $IDEMP01 = @$_GET['IDEMP01'];
                    //--VIew DATA JADWAL--//
                    $ep_vjdw01_sw = $ms_q("$sl Bulan,Gustu,NIK,T$SETUP_DATE_D FROM tJadwal WHERE NIK='$IDEMP01' AND Bulan='$SET_DATE_02' AND NOT T$SETUP_DATE_D='' ");
                    $row_vjdw01_sw = $ms_nr($ep_vjdw01_sw);
                    $ep_vjdw01_sww = $ms_fas($ep_vjdw01_sw);
                    #SUB DATA
                    $ep_sub_vjdw01_sw = substr($ep_vjdw01_sww["T".$SETUP_DATE_D],0,-1);

            $item_jdw[] = array(
                "Bulan" =>  $ep_vjdw01_sww['Bulan'],
                "date_cek" => "T".$SETUP_DATE_D,
                "tgl_sub"  => $ep_sub_vjdw01_sw,
                "tgl" => $ep_vjdw01_sww["T".$SETUP_DATE_D]
               
               );

               if($row_vjdw01_sw < 1){ 
                $json_jdw = array(
                  'result' => '404',
                  'response_code' => '14',
                  'response_code_desc' => 'Data tidak ditemukan ',
                  'set date' => $SET_DATE_02
                   ); 
                  }elseif($row_vjdw01_sw> 0){
                  $json_jdw = array(
                   'data_jdw' => $item_jdw
                    ); 
                   
                    }else{
                    $json_jdw = array(
                     'result' => '404',
                   'response_code' => '96',
                  'response_code_desc' => 'Error'
                   ); 
                             }
                   $edata_jdw = json_encode($json_jdw);
                  echo "$edata_jdw";

        

?>