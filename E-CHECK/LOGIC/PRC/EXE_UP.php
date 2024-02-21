<?php
    /*-------------------------------------------------------*/
    /* Himpunan Eksekusi Porses UPDATING data      E-CHECK  */
    /*-----------------------------------------------------*/
?>

<?php
     /*-------------------------------------------------------*/
    /* E-CHECK        */
    /*-----------------------------------------------------*/
    if(isset($_POST['ec_titik_up_01'])){
        $ec_titik_kode_01 = @$SQL_SL($_POST['ec_titik_kode_01']);
        $ec_idmain_kat_01 = @$SQL_SL($_POST['ec_idmain_kat_01']);
        $ec_titik_nama_01 = @$SQL_SL($_POST['ec_titik_nama_01']);
        $ec_titik_lokasi_01 = @$SQL_SL($_POST['ec_titik_lokasi_01']);

            $ec_update_titik_01 = $CL_Q("$UP tb_ec_titik_01 set idmain_kat_01='$ec_idmain_kat_01',titik_nama_01='$ec_titik_nama_01',titik_lokasi_01='$ec_titik_lokasi_01' WHERE idmain_titik_01='$IDTT01'");

            if($ec_update_titik_01){
                     header("LOCATION:$MY_DOM");
                        
            }else{
                include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
            }} 

?>