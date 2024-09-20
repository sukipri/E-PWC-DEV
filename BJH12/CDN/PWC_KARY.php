<?php
    /*VIEW DATA SET SIMRS */
        /*COINFIG */
        include_once"../config/connec_01_srv.php";
        include"../secure/GR_01.php"; //security enggine
        //include"sc/ID_IDF.php";  //Identifer ID PAGE
        //include"css.php";   //style and control title meta
            include"../sc/stack_Q.php"; //Query SQL
        include"../sc/code_rand.php"; 
    //.........//
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
        $kary_nomor= @$_GET['kary_nomor'];
        $vkary_sw = $ms_q("$call_sel TKaryawan WHERE NOT KaryStatus='91' AND NOT KaryStatus='92' AND NOT  KaryStatus='94' AND NOT KaryStatus='99' order by KaryNama asc "); 
            $cp_vkary_sw = $ms_nr($vkary_sw);
            while($vkary_sww = $ms_fas($vkary_sw)){
                $data_kary[] = array(
                    "nip"=> $vkary_sww['KaryNomorYakkum'],
                    "noktp"=>$vkary_sww['KaryNoKTP'],
                    "namakaryawan"=>$vkary_sww['KaryNama'],
                    "alamatkaryawan"=>$vkary_sww['KaryAlamat'],
                    "kotakaryawan"=>$vkary_sww['KaryKota'],
                    "jeniskelamin"=>$vkary_sww['KaryGender'],
                    "teleponkaryawan"=>$vkary_sww['KaryTelepon'],
                    "tempatlahir"=>$vkary_sww['KaryTmpLahir'],
                    "tanggallahir"=>$vkary_sww['KaryTglLahir']
                    
                    
                   );

            }
            if($cp_vkary_sw > 0){ 
                $json = array(
                   'Pasien' => $data_kary
                );
            }elseif($cp_vkary_sw < 1){
                $json = array(
                    'response_code' => '101',
                    'response_code_desc' => 'Data Gagal Ditampilkan'
                 );
            }
                $kary_data = json_encode($json);
                //echo "{\"bill\":" . $edata ."}";
                 echo "$kary_data";


?>