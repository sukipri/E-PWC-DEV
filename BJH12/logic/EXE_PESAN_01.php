<?php
        if(isset($_POST['kirim'])){
                $untuk = @$sql_slash($_POST['untuk']);
                //$dari = @$sql_slash($_POST['dari']);
                $nama = @$sql_slash($_POST['nama']);
                $isi = @$sql_slash($_POST['isi']);
                    $save_pesan_01 = @$ms_q("$in tb_pesan(idmain_pesan,kode,untuk,dari,nama,isi,tgl,status)VALUES('$IDMAIN','$date_ack_tiny$time_ack_tiny','$untuk','$uu[namauser]','$nama','$isi','$date_html5','1')");
    if($save_pesan_01){
               echo"<b>Data sedang diproses</b>.......";
		?>
            <meta http-equiv="refresh" content="2; url=<?php echo"?HLM=EMP_M&SUB=EMP_M_PESAN_M&SUB_CHILD=EMP_M_PESAN_M_01_NEW"; ?>">
        <?php }else{ echo"<font color=red><b>Data Gagal diproses</b></font>......."; }} ?>  