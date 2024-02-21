<?php
      //include"../css.php";   //style and control title meta
      include"../sc/stack_Q.php"; //Query SQL

      include"../config/connec_01_srv_02.php";
  
  
      header("Access-Control-Allow-Origin: *");
      header("Content-Type: application/json; charset=UTF-8");
      $json_input = file_get_contents('php://input');
      $data_input = json_decode($json_input,true);
      date_default_timezone_set('Asia/Jakarta');

      #-Set DATA -#
      $SETUP_DATE_D = date("d");
      $SET_DATE_02 = date("Ym");
      $date_html5 = date("Y-m-d");
      $date_time = date("H:i:s");
      $date_html5_kode = date("ymd");
      $time_ack2 = date("His");
      $RAND_DATA = rand('88','99');

      //--GET DATA--//
      $IDLAT01 = @$_GET['IDLAT01'];
      $IDLONG01 =@$_GET['IDLONG01'];
      $IDKRY = @$_GET['IDKRY'];
      $IDEMP01 = @$_GET['IDEMP01'];

             
                  //--Rendering DATA--//
                        //JADWAL
                        $epwc_tjdw01_sw = $ms_q("$sl Bulan,NIK,T$SETUP_DATE_D FROM tJadwal WHERE NIK='$IDEMP01' AND Bulan='$SET_DATE_02'");
                         $epwc_tjdw01_sww = $ms_fas($epwc_tjdw01_sw);
                         $epwc_date_d_sw = "T".$SETUP_DATE_D;
                         //RECORDINFO
                        $epwc_vrecinfo01_sw = $ms_q("$sl ID,Per_ID,Per_Code FROM TA_Record_Info WHERE Per_Code='$IDEMP01'");
                         $epwc_cn_vrecinfo01_sw =  $ms_nr($epwc_vrecinfo01_sw);

                        #Konversi
                              $epwc_plus_vrecinfo_sw = $epwc_cn_vrecinfo01_sw + 1;


if(isset($_GET['WS-GEOKLIK02'])){

          //--Proccesing--//  
            $epwc_save_recinfo_01 = $ms_q("$in TA_Record_Info(Mach_Name,Per_ID,Per_Code,Per_Finger,Date_Time,In_Out,ep_kode_01,ep_lat_01,ep_long_01,ep_tjd_bulan_01,ep_tjd_hari_01,ep_tjd_shift_01)VALUES('0','$IDKRY','$IDEMP01','0','$date_html5  $date_time','2','GPS-$date_html5_kode-$time_ack2','$IDLAT01','$IDLONG01','$epwc_tjdw01_sww[Bulan]','T$SETUP_DATE_D','$epwc_tjdw01_sww[$epwc_date_d_sw]')");

            if($epwc_save_recinfo_01){
                  $metadata[] = array(
                        "message"=>"Absensi Tersimpan",
                        "Code"=> "200"
                  );
            }else{

                  $metadata[] = array(
                        "message"=>"Save Failed",
                        "Code"=> "201"
                  );
            }

                  $edata = json_encode($metadata);
                  //echo "{\"bill\":" . $edata ."}";
                  echo "$edata";


}

?>