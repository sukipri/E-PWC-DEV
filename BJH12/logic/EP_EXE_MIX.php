<?php
        ##MIXING PROCESSING DATA ENTRI & UPDATE##

                //--EP_MD_01_SD_FLAG_IN--//

                        if(isset($_POST['ep_flag_simpan_01'])){
                            $ep_flag_kode_01 = $sql_sl($_POST['ep_flag_kode_01']);
                            $ep_flag_ket_01 = $sql_sl($_POST['ep_flag_ket_01']);
                            $ep_flag_ins_01 = $sql_sl($_POST['ep_flag_ins_01']);
                            
                                 #Proccessing
                                $ep_save_flag_01 = $ms_q("$in tb_ep_flag_01(idmain_ep_flag_01,flag_kode_01,flag_ket_01,flag_ins_01)VALUES('$IDMAIN','$ep_flag_kode_01','$ep_flag_ket_01','$ep_flag_ins_01')");

                                if($ep_save_flag_01){
                                             include_once"../sd/NOTIF_SUCCESS.php";
                                         }else{
                                            include_once"../sd/NOTIF_FAILED.php";
                                }
                        }

                            #---||----#

                             //--EP_MD_01_SD_JADWAL_IN--//
                            if(isset($_POST['ep_jadwal_simpan_01'])){
                                    $ep_jadwal_kode_01 = @$sql_sl($_POST['ep_jadwal_kode_01']);
                                    $ep_jadwal_flag_01 = @$sql_sl($_POST['ep_jadwal_flag_01']);
                                    $ep_jadwal_nama_01 = @$sql_sl($_POST['ep_jadwal_nama_01']);
                                    $ep_jadwal_hari_01 = @$sql_sl($_POST['ep_jadwal_hari_01']);
                                    $ep_jadwal_jam_01 = @$sql_sl($_POST['ep_jadwal_jam_01']);
                                    $ep_jadwal_jam_02 = @$sql_sl($_POST['ep_jadwal_jam_02']);
                                    $ep_jadwal_ket_01 = @$sql_sl($_POST['ep_jadwal_ket_01']);
                                    
                                        #Proccessing
                                        $ep_save_jadwal_01 = $ms_q("$in tb_ep_jadwal_01(idmain_ep_jadwal_01,jadwal_flag_01,jadwal_kode_01,jadwal_nama_01,jadwal_hari_01,jadwal_jam_01,jadwal_ket_01,jadwal_tglinput_01,jadwal_status_01,jadwal_uploader,jadwal_jam_02)VALUES('$IDMAIN','$ep_jadwal_flag_01','$ep_jadwal_kode_01','$ep_jadwal_nama_01','$ep_jadwal_hari_01','$ep_jadwal_jam_01','$ep_jadwal_ket_01','$date_html5','2','$uu[idmain]','$ep_jadwal_jam_02')");

                                        if($ep_save_jadwal_01){
                                            include_once"../sd/NOTIF_SUCCESS.php";
                                        }else{
                                           include_once"../sd/NOTIF_FAILED.php";
                               }
                            }

                            #--GEo--#
                                if(isset($_POST['ep_geo_simpan_01'])){
                                    $ep_geo_kode_01 = @$sql_sl($_POST['ep_geo_kode_01']);
                                    $ep_geo_nama_01 = @$sql_sl($_POST['ep_geo_nama_01']);
                                    $ep_geo_lat_01 = @$sql_sl($_POST['ep_geo_lat_01']);
                                    $ep_geo_long_01 = @$sql_sl($_POST['ep_geo_long_01']);
                                    $ep_geo_latacuan_01 = @$sql_sl($_POST['ep_geo_latacuan_01']);
                                    $ep_geo_longacuan_01 = @$sql_sl($_POST['ep_geo_longacuan_01']);
                                    $ep_geo_ket_01 = @$sql_sl($_POST['ep_geo_ket_01']);
                                    
                                    #Proccessing
                                    $ep_save_geo_01 = $ms_q("$in tb_ep_geo_01 (idmain_geo_01,geo_kode_01,geo_nama_01,geo_lat_01,geo_long_01,geo_ket_01,geo_status_01,geo_latacuan_01,geo_longacuan_01)VALUES('$IDMAIN','$ep_geo_kode_01','$ep_geo_nama_01','$ep_geo_lat_01','$ep_geo_long_01','$ep_geo_ket_01','2','$ep_geo_latacuan_01','$ep_geo_longacuan_01')");

                                    if($ep_save_geo_01){
                                        include_once"../sd/NOTIF_SUCCESS.php";
                                    }else{
                                       include_once"../sd/NOTIF_FAILED.php";
                           }
                                }
         
                        #WS-EP_APP_01_RI_JADWAL_01_UP
                                if(isset($_POST['ep_tj_up_prs01'])){
                                    $ep_tj_ri_tgl01 = @$sql_sl($_POST['ep_tj_ri_tgl01']);
                                    $ep_tj_ri_shift_01 = @$sql_sl($_POST['ep_tj_ri_shift_01']);

                                        #PROCCESSING
                                        $ep_tj_up_ri01 = $ms_q("$up TJ_Main_DATA.dbo.TA_Record_Info SET Date_Time='$ep_tj_ri_tgl01',ep_tjd_shift_01='$ep_tj_ri_shift_01' WHERE ID='$IDRECINFO01'");
                                        if($ep_tj_up_ri01){
                                                header("LOCATION:?HLM=EP_HOME_01&SUB=EP_APP_01&SUB_CHILD=WS-EP_APP_01_RI_JADWAL_01&SUB_CHILD02=WS-EP_APP_01_RI_LAP_01&SUB_CHILD03=WS-EP_APP_01_RI_JADWAL_01_UP&IDEMP01=$IDEMP01&IDRECINFO01=$IDRECINFO01");
                                        }else{
                                            include_once"../sd/NOTIF_FAILED.php";
                                        }}
                                       
                        #WS-EP_APP_01_RI_KOM_01_BLN
                        if(isset($_POST['open_ctr_simpan_prs_01'])){
                            $open_ep_no02 = 1;
                            while($open_ep_no02 <=  $epwc_cn_vrecinfo_sw){
                                $ep_tj_ri_id_01 = @$_POST['ep_tj_ri_id_01'.$open_ep_no02];
                                $ep_tj_ri_nip_01 = @$_POST['ep_tj_ri_nip_01'.$open_ep_no02];
                                $ep_tj_ri_tgl01_01 = @trim($_POST['ep_tj_ri_tgl01_01'.$open_ep_no02]);
                                $ep_tj_ri_shift_01 = @$_POST['ep_tj_ri_shift_01'.$open_ep_no02];
                                $ep_tj_ri_tgl02_01 = @trim($_POST['ep_tj_ri_tgl02_01'.$open_ep_no02]);
                                $ep_tj_ri_jam_01 = @trim($_POST['ep_tj_ri_jam_01'.$open_ep_no02]);
                                $ep_tj_ri_telat_01 = @$_POST['ep_tj_ri_telat_01'.$open_ep_no02];

                                    #Proccessing
                                    $open_ctr_save_prs_01 = $ms_q("$in Citarum.dbo.tb_tj_prs_rekap_01(idmain_prekap_01,ID,KaryNomortj,prekap_tglinput_01,prekap_tglmasuk_01,prekap_shift_01,prekap_jam_01,prekap_tgl_01,prekap_telat_01,prekap_status_01)VALUES('$open_ep_no02-$IDMAIN','$ep_tj_ri_id_01','$ep_tj_ri_nip_01','$DATE_HTML5_SQL $time_html5','$ep_tj_ri_tgl01_01','$ep_tj_ri_shift_01','$ep_tj_ri_tgl02_01','$ep_tj_ri_jam_01','$ep_tj_ri_telat_01','1')");
                                $open_ep_no02++;
                                }
                                if($open_ctr_save_prs_01){
                                    echo"<span class=bg-success>SUKSESS</span>";
                                }else{
                                    echo"<b><span class=bg-danger>FAILED</b></span>";
                                     }
                            }     

            #EP_MD_01_JDW_IN02
                if(isset($_POST['ep_btn_jdw_01'])){
                    $ep_bulan_01 = @$_POST['ep_bulan_01'];

                    
                        #PROCCESING
                        $ep_save_tjadwal_01 = $ms_q("$in TJ_Main_Data.dbo.tJadwal(Bulan,Gustu,NIK)VALUES('$ep_bulan_01','0','$IDEMP01')");

                        if($ep_save_tjadwal_01){
                            header("LOCATION:?HLM=EP_HOME_01&SUB=EP_MD_01&SUB_CHILD=EP_MD_01_SD&SUB_CHILD02=EP_MD_01_JDW_IN02&IDEMP01=$IDEMP01");
                        }else{
                            echo"<b>Data gagal disimpan</b>";
                        }
    
                }

            #EP_MD_01_JDW_IN03
            if(isset($_POST['ep_simpan_bulan02_01'])){
                $ep_jdwin_no = 1;
                
                while( $ep_jdwin_no <= 31  ){
                    $ep_conv02_tgl_no = sprintf("%02d",$ep_jdwin_no);
                    $ep_tgl_01 = @$_POST['T'.$ep_conv02_tgl_no];
                    $ep_shift01_01 = @$_POST['ep_shift01_01'.$ep_jdwin_no];
                    #PROCCESING
                         $ep_save_tjadwal_01 = $ms_q("$up TJ_Main_Data.dbo.TJadwal set $ep_tgl_01='$ep_shift01_01' WHERE NIK='$IDEMP01' AND Bulan='$IDBLN01'");
                    $ep_jdwin_no++; }

                    if($ep_save_tjadwal_01){
                        header("LOCATION:?HLM=EP_HOME_01&SUB=EP_MD_01&SUB_CHILD=EP_MD_01_SD&SUB_CHILD02=EP_MD_01_JDW_IN03&IDEMP01=$IDEMP01&IDBLN01=$IDBLN01");
                    }else{
                        echo"<b>Data gagal disimpan</b>";
                    }
            }

                #WS-EP_APP_01-RI_LBR02
                if(isset($_POST['ep_save_plbr_01'])){
                    $open_ctr_plbr_no02 = 1;
                        while($open_ctr_plbr_no02 <= $open_ctr_nr_vlbr01_sw ){
                            $ep_idmain_plbr_01 = @$sql_sl($_POST['ep_idmain_plbr_01'.$open_ctr_plbr_no02]);

                            #PROCCESSING
                            $ep_up_plbr_01 = $ms_q("$up Citarum.dbo.tb_tj_prs_lbr_01 SET plbr_status_01='4' WHERE idmain_plbr_01='$ep_idmain_plbr_01'");
                            
                        $open_ctr_plbr_no02++; }
                        if($ep_up_plbr_01){
                            echo"UNGGAH DATA SUKSES";
                        }
                }

                  #WS-EP_APP_01-RI_LBR02 GET
                  if(isset($_GET['SAVEPLBR01'])){
                      
                        #PROCCESSING
                        $ep_up_plbr_02 = $ms_q("$up Citarum.dbo.tb_tj_prs_lbr_01 SET plbr_status_01='4' WHERE idmain_plbr_01='$IDPLBR01'");
                        if($ep_up_plbr_02){
                                header("location:?HLM=EP_HOME_01&SUB=EP_APP_01&SUB_CHILD=EP_APP_01_MNL&SUB_CHILD02=WS-EP_APP_01_RI_LBR02&GTG01=$GTG01&GTG02=$GTG02");
                        }else{

                        }

                  }

?>