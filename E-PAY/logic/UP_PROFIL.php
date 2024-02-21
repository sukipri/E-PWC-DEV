<?php
    if(isset($_POST['up_01'])){
        $nama = @$sql_slash($_POST['nama']);
        $tlahir = @$sql_slash($_POST['tlahir']);
        $ttl = @$sql_slash($_POST['ttl']);
        $alamat = @$sql_slash($_POST['alamat']);
        $kota = @$sql_slash($_POST['kota']);
        $no_tlp = @$sql_slash($_POST['no_tlp']);
        $email = @$sql_slash($_POST['email']);
        $npwp = @$sql_slash($_POST['npwp']);
        $no_dapen = @$sql_slash($_POST['no_dapen']);
        $no_jamsostek = @$sql_slash($_POST['no_jamsostek']);
        $no_bpjs = @$sql_slash($_POST['no_bpjs']);
        $isi_text = "Nama >> $nama<br>Tempat LHR >> $tlahir <br>TTL >> $ttl <br>Alamat >> $alamat<br>Kota >> $kota<br>Telp >> $no_tlp <br>Email >> $email <br>Npwp >> $npwp <br> Dapen >> $no_dapen <br> BPJS >> $no_bpjs ";
        $save_log_profil = $ms_q("$in tb_log(idmain_log,kode_rls,kode,isi,tgl)values('$IDMAIN','$vkryy[KaryNomor]','$date_ack_tiny$time_ack_tiny','$isi_text','$date_html5')");
        $save_profil_01 = $ms_q("$up TKaryawan set KaryNama='$nama',KaryTmpLahir='$tlahir',KaryTglLahir='$ttl',KaryAlamat='$alamat',KaryEmail='$email',KaryTelepon='$no_tlp',KaryKota='$kota',KaryNPWP='$npwp',KaryYDPNo='$no_dapen',KaryNoJAMSOSTEK='$no_jamsostek',KaryNoBPJS='$no_bpjs',status='1' WHERE KaryNomor='$vkryy[KaryNomor]'");
        if($save_profil_01 && $save_log_profil){
               echo"<b>Data sedang diproses</b>.......";
		?>
            <meta http-equiv="refresh" content="2; url=<?php echo"?HLM=PROFIL_M_PROFIL"; ?>">
        <?php }else{  echo"<font color=red><b>Data Gagal diproses</b></font>......."; }} ?>  