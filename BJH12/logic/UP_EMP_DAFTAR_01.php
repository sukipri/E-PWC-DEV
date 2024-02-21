<?php
    if(isset($_GET['UPEMP'])){
        
        $save_pesan_01 = @$ms_q("$in tb_pesan(idmain_pesan,kode,untuk,dari,nama,isi,tgl,status)VALUES('$IDMAIN','$date_ack_tiny$time_ack_tiny','$vemm[KaryNomor]','$uu[namauser]','ACC PROFIL','Penggantian data telah disetujui','$date_html5','1')");
        $up_emp_daftar_01 = $ms_q("$up TKaryawan set status='2' WHERE KaryNomor='$vemm[KaryNomor]'");
        if( $up_emp_daftar_01){
               echo"<b>Data sedang diproses</b>.......";
		?>
            <meta http-equiv="refresh" content="0; url=<?php echo"?HLM=EMP_M&SUB=EMP_M_EMP_UPDATE&IDEMP=$vemm[KaryNomor]"; ?>">
        <?php }else{ echo"<font color=red><b>Data Gagal diproses</b></font>......."; }} ?>  