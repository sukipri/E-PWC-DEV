<?php
     /*-------------------------------------------------------*/
    /* Himpunan Eksekusi Porses Inserting data      NA-SITE -E-CHECK */
    /*-----------------------------------------------------*/
?>

<?php
     /*-------------------------------------------------------*/
    /* E-CHECK        */
    /*-----------------------------------------------------*/
?>
        <?php
        /* FORM titik_01 */
            if(isset($_POST['ec_titik_simpan_01'])){
                $ec_titik_kode_01 = @$SQL_SL($_POST['ec_titik_kode_01']);
                $ec_idmain_kat_01 = @$SQL_SL($_POST['ec_idmain_kat_01']);
                $ec_titik_nama_01 = @$SQL_SL($_POST['ec_titik_nama_01']);
                $ec_titik_lokasi_01 = @$SQL_SL($_POST['ec_titik_lokasi_01']);

                    $ec_save_titik_01 = $CL_Q("$IN tb_ec_titik_01(idmain_titik_01,idmain_kat_01,titik_kode_01,titik_nama_01,titik_lokasi_01,titik_tglinput_01,titik_status_01,titik_uploader)VALUES('$IDMAIN','$ec_idmain_kat_01','$ec_titik_kode_01','$ec_titik_nama_01','$ec_titik_lokasi_01','$DATE_HTML5_SQL','2','$vus01_sww[idmain]')");

                    if($ec_save_titik_01){
                                include"../LAYOUT/NOTIF/NF_SAVE_SUCCESS.php";
                                
                    }else{
                        include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
                    }} ?>
<!-- -->

<?php
        /* FORM titik_01 */
            if(isset($_POST['ec_titik_rec_simpan_01'])){
                        $ec_rec_kode_01 = @$SQL_SL($_POST['ec_rec_kode_01']);
                        $ec_rec_laporan_01 = @$SQL_SL($_POST['ec_rec_laporan_01']);
                        $ec_rec_status_01 = @$SQL_SL($_POST['ec_rec_status_01']);

                         $ec_save_titik_rec_01 = $CL_Q("$IN tb_ec_titik_01_rec(idmain_titik_01_rec,idmain_titik_01,rec_kode_01,rec_laporan_01,rec_tglinput_01,rec_status_01,rec_uploader)VALUES('$IDMAIN','$IDTT01','$ec_rec_kode_01','$ec_rec_laporan_01','$DATE_HTML5_SQL $TIME_HTML5','$ec_rec_status_01','$vus01_sww[idmain]')");

                    if($ec_save_titik_rec_01){ ?>
                         <meta http-equiv="refresh" content="0; url=<?php echo"EC_SUCCESS.php?IDTT01=$IDTT01&IDUSER01=$vus01_sww[idmain]&IDPASS01=IDPASS01&IDMAIN01=$IDMAIN"; ?>">       
                                
                   <?php  }else{
                        include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
                    }} ?>
<!-- -->
<?php 
 /* FORM User */
            if(isset($_POST['ec_user_simpan_01'])){
                        $ec_user_kode_01 = @$SQL_SL($_POST['ec_user_kode_01']);
                        $ec_user_nama_01 = @$SQL_SL($_POST['ec_user_nama_01']);
                        $ec_user_pass_01 = @$SQL_SL($_POST['ec_user_pass_01']);
                        $ec_en_user_pass_01 = EN_HS_MD5($ec_user_pass_01);
                         $ec_save_user_01 = $CL_Q("$IN TBUser(idmain,kode,namauser,passuser,akses,password_text,token)VALUES('$IDMAIN','$ec_user_kode_01','$ec_user_nama_01','$ec_en_user_pass_01','312','$ec_user_pass_01','OSDPWEP')  ");

                    if($ec_save_user_01){ ?>
                         <meta http-equiv="refresh" content="0; url=<?php echo"?PG_SA=EC_USER_01_VIEW"; ?>">       
                                
                   <?php  }else{
                        include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
                    }} ?>