<?PHP 
    
        #WS-EPWC-EP_APP_JDW_IN02_MNL.php
        if(isset($_POST['ep_btn_cari_01_mnl'])){
            $IDEMP02 = @$_POST['IDEMP02'];
            $ep_bulan_01 = @$_POST['ep_bulan_01'];
            $ep_tgl_01 = @$_POST['ep_tgl_01'];
            $ep_shift_01 = @$_POST['ep_shift_01'];

                    #AUTH
                    $ep_cek_tjadwal01_sw = $CL_Q("$SL bulan from TJ_Main_Data.dbo.tJadwal WHERE NIK='$IDEMP02' and Bulan='$ep_bulan_01'");
                        $ep_cek_tjadwal01_sww = $CL_NR($ep_cek_tjadwal01_sw);

                    #PROCCESSING
                            if($ep_cek_tjadwal01_sww > 0){

                        $ep_save_tjadwal_01 = $CL_Q("$UP TJ_Main_Data.dbo.TJadwal set $ep_tgl_01='$ep_shift_01' WHERE NIK='$IDEMP02' AND Bulan='$ep_bulan_01'");

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
                    $ep_save_tjadwal_01 = $CL_Q("$IN TJ_Main_Data.dbo.tJadwal(Bulan,Gustu,NIK,$ep_tgl_01)VALUES('$ep_bulan_01','0','$IDEMP02','$ep_shift_01')");
                
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


        }
                #WS-EPWC_EP_APP_JDW_IN0301_MNL
                if(isset($_POST['ep_simpan_bulan01_mnl'])){
                    $ep_bulan_01_mnl = @$_POST['ep_bulan_01_mnl'];
                    

                        #PROCCESING
                        $ep_save_tjadwal_01 = $CL_Q("$IN TJ_Main_Data.dbo.tJadwal(Bulan,Gustu,NIK)VALUES('$ep_bulan_01_mnl','0','$IDEMP02')");

                        if($ep_save_tjadwal_01){
                            header("LOCATION:WS-EPWC_EP_APP_JDW_IN0301_MNL.php?&IDEMP02=$IDEMP02&IDEMP01=$IDEMP01");
                        }else{
                            echo"<b>Data gagal disimpan</b>";
                        }
    
                }

                #WS-EPWC_EP_APP_JDW_IN03_MNL
                if(isset($_POST['ep_simpan_bulan02_mnl'])){
                    $ep_jdwin_no = 1;
                    
                    while( $ep_jdwin_no <= 31  ){
                        $ep_conv02_tgl_no = sprintf("%02d",$ep_jdwin_no);
                        $ep_tgl_01 = @$_POST['T'.$ep_conv02_tgl_no];
                        $ep_shift01_01 = @$_POST['ep_shift01_01'.$ep_jdwin_no];
                        #PROCCESING
                             $ep_save_tjadwal_01 = $CL_Q("$UP TJ_Main_Data.dbo.TJadwal set $ep_tgl_01='$ep_shift01_01' WHERE NIK='$IDEMP02' AND Bulan='$IDBLN01'");
                        $ep_jdwin_no++; }

                        if($ep_save_tjadwal_01){
                            header("LOCATION:WS-EPWC_EP_APP_JDW_IN0301_MNL.php?&IDEMP02=$IDEMP02&IDEMP01=$IDEMP01");
                        }else{
                            echo"<b>Data gagal disimpan</b>";
                        }
    
                }

?>