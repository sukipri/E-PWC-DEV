<?PHP 
    $pwc_vw_vks01_sw = $ms_q("$call_sel tb_ks_01 WHERE idmain_ks_01='$IDKS01'");
    $pwc_vw_vks01_sww = $ms_fas($pwc_vw_vks01_sw);
    if(@$_GET['UPKS01']){
        $pwc_ks_up_01 = @$ms_q("$UP tb_ks_01 set ks_status_01='2' WHERE idmain_ks_01='$IDKS01'");
    }
?>
<b>DATA KRITIK & SARAN Customer <?PHP echo $pwc_vw_vks01_sww['ks_nama_01'] ?></b>
<hr>
<!--  -->
<form method="post">
#KOLOM KRITIK & SARAN Customer
<br>
<?PHP 
    $pwc_vw_vks01_sw02 = $ms_q("$call_sel tb_ks_01 WHERE ks_email_01='$pwc_vw_vks01_sww[ks_email_01]'");
    while($pwc_vw_vks01_sww02 = $ms_fas($pwc_vw_vks01_sw02)){
?>
    <?PHP if($pwc_vw_vks01_sww02['ks_tipe_01']=="1"){ ?>
   <p><i class="far fa-bookmark"></i> <?PHP echo $pwc_vw_vks01_sww02['ks_isi_01'] ?></p>
    <?PHP }elseif($pwc_vw_vks01_sww02['ks_tipe_01']=="2"){ ?>
        <p><i class="fas fa-bookmark"></i> <?PHP echo $pwc_vw_vks01_sww02['ks_isi_01'] ?></p>
    <?PHP } ?>
    <br>
<?PHP } ?>
#REPLY Customer
<textarea class="form-control" required name="ks_isi_01" rows="6"></textarea>
#EMAIL <span class="badge bg-info">(*Email Customer)</span>
<input type="email" class="form-control form-control-sm" style="max-width:30rem;" value="<?PHP echo $pwc_vw_vks01_sww['ks_email_01'] ?>" name="ks_email_01" required>
<br>
<button class="btn btn-warning btn-sm" name="btn_simpan_ks_01">KIRIM Kritik & Saran</button>
</form> 
<!--  -->
<?PHP 
    if(isset($_POST['btn_simpan_ks_01'])){
        $ks_email_01 = @$sql_slash($_POST['ks_email_01']);
        $ks_isi_01 = @$sql_slash($_POST['ks_isi_01']);
        //echo"$ks_email_01";
        #PROCCESSING
        $pwc_save_ks_01 = $ms_q("$in tb_ks_01(idmain_ks_01,ks_kode_01,ks_isi_01,ks_email_01,ks_tglinput_01,ks_status_01,ks_tipe_01,uploader)VALUES('$IDMAIN','KS-$IDKODE','$ks_isi_01','$ks_email_01','$DATE_HTML5_SQL $time_html5','1','2','$uu[idmain]')");
		$pwc_up_status_ks_01 = $ms_q("$up tb_ks_01 set ks_status_01='2' WHERE idmain_ks_01='$IDKS01' ");
        include"layout/KS_MAIL_01.php";
        echo"<br>";
        if($pwc_save_ks_01){
            echo"<span class='badge bg-success'>KRITIK & SARAN BERHASIL Berhasil...</span>";
        }else{
            echo"<span class='badge bg-danger'>KRITIK & SARAN BERHASIL Gagal...</span>";
        }
    }
?>


