 	<?php
        if(isset($_GET['ACC_BERKAS'])){
            $ms_q("$up TKaryawan set status='1' WHERE KaryNomor='$vkryy[KaryNomor]'");
            ?>
            <meta http-equiv="refresh" content="2; url=<?php echo"?HLM=PROFIL_M_PROFIL_BERKAS"; ?>">
       <?php  }
     ?>

     <?php 
		
		if(isset($_POST['simpan_berkas'])){
			$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
			$nama = @$_FILES['up_berkas']['name'];
			$en_nama = cr($nama);
            $x = explode('.', $nama);
            $nama_berkas = @$sql_slash($_POST['nama_berkas']);
            $tipe_berkas = @$sql_slash($_POST['tipe_berkas']);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['up_berkas']['size'];
			$file_tmp = $_FILES['up_berkas']['tmp_name'];	
			 $nama_f= "$tipe_berkas-$en_nama$ack_big$time_ack2.jpeg";

			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 9044070){			
					move_uploaded_file($file_tmp, '../../FL02/'.$nama_f);
					$save_berkas_01 = $ms_q("insert into tb_berkas(idmain_berkas,idmain_kary,kode,nama,berkas,tgl,tipe)values('$IDMAIN','$vkryy[KaryNomor]','$date_ack_tiny$time_ack_tiny','$nama_berkas','$nama_f','$date_html5','$tipe_berkas')");
                     //$ms_q("$up TKaryawan set status='1' WHERE KaryNomor='$vkryy[KaryNomor]'");
                    //$ms_q("$up TRawatJalan set AppKhusus='2' where JalanNoReg='$KDREG'"); 
                    if($save_berkas_01){
						echo 'Failed';
					}else{
                        echo "<b>Sukses terupload...</b>";
                        ?>
                        <meta http-equiv="refresh" content="2; url=<?php echo"?HLM=PROFIL_M_PROFIL_BERKAS"; ?>">
					<?php }
				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		}
		
		?>