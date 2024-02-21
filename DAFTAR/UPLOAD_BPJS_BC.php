<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<?php
		error_reporting(0);
		include"config.php"; 
		include"css.php"; 
	?>
	<body>
	<?php include"MENU.php"; ?>
	<?php 
			$IDDKT = @trim($sql_slash($_GET['IDDKT']));
			$RM = @trim($sql_slash($_GET['RM']));
			$REG = @trim($sql_slash($_GET['REG']));
			?>
<body>
		<br><br>
		<div class="container">
	<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="DAFTAR.php">Pilih Dokter</a></li>
  <li class="breadcrumb-item"><a href="#">Masukkan Nomor RM & Tanggal Pesan</a></li>
   <li class="breadcrumb-item active"><a href="<?php echo"DAFTAR_STEP_03.php?IDDKT=$IDDKT&RM=$RM&REG=$REG#DAFTAR"; ?>">Detil Data Pasien</a></li>
    <li class="breadcrumb-item active">Unggah Berkas *(BPJS</li>
</ol>
<form action="" method="post" enctype="multipart/form-data">
  
	<?php 
				
			$vdkt =  $ms_q("$call_sel TPelaku where PelakuKode='$IDDKT'");
			$vdktt = $ms_fas($vdkt);
			$vpl = $ms_q("$call_sel TUnit where UnitKode='$vdktt[UnitKode]'");
			$vpll = $ms_fas($vpl);
			//-//
			$vrj_01 =  $ms_q("$call_sel TRawatJalan  where JalanNoReg='$REG'");
			$vrjj_01 = $ms_fas($vrj_01);
				$vrj_01_sw = $ms_q("$sl JalanNoReg,PasienNomorRM,PasienNama,JalanNoRujukan,AppJenisDaftar,AppKhusus,JalanRMTanggal FROM TRawatJalan WHERE PasienNomorRM='$RM' AND JalanStatus='1' AND  PrshKode='1-0113' order by JalanRMTanggal desc");
					$vrj_01_sww = $ms_fas($vrj_01_sw);
								$vrj_con02= $ms_q("select CONVERT(varchar(10),[JalanRMTanggal],103) as tgl_rj02 from TRawatJalan where JalanNoReg='$vrj_01_sww[JalanNoReg]'");
										$vrjj_con02 = $ms_fas($vrj_con02);
			//--//
			$vps =  $ms_q("$call_sel TPasien  where PasienNomorRM='$RM'");
			$vpss = $ms_fas($vps);
			//--//
			$vrj = @$ms_q("select TNomor.NomorKode,TNomor.NomorAkhir from TNomor where TNomor.NomorKode='PL-$years$month-'");
				$vrjj = $ms_fas($vrj);
				//--//
				$vrj_con= $ms_q("select CONVERT(varchar(10),[JalanRMTanggal],103) as tgl_rj from TRawatJalan where JalanNoReg='$REG'");
					$vrjj_con = $ms_fas($vrj_con);
					//--//
					$hit_vrj = $vrjj['NomorAkhir'] + 1;
					$hit_zero = sprintf("%04d", $hit_vrj);
					$sub_01= substr($vpss['PasienTglLahir'],-4);
					$hit_sub = $years_big - $sub_01;
					$dt = "$date_html5 $time_html5";
					
			//str_replace
			$teksawal = "$vpll[UnitNama]";
 			$txt_01 = str_replace("Klinik Sp.", "", $teksawal);
			
		$IDG = @trim($_GET['IDG']);
		$FL = @trim($_GET['FL']);
			if(isset($_GET['IDG'])){
				  $folder="../FL/$FL";
					unlink($folder);
				 $ms_q("$dl from TBGambar where idmain_gambar='$IDG'");
					header("location:UPLOAD_BERKAS.php?IDDKT=$IDDKT&RM=$RM&REG=$REG");
					}
			
				?>

				
				
				
				

	  <table width="100%" border="0" class="table table-bordered">
    <tr class="info">
          <td width="46%">
		  <div class="input-group">
          <div class="input-group-addon">Dokter</div>
	 		<input type="text" name="dokter" readonly class="form-control" value="<?php echo"$vdktt[PelakuNama]"; ?>">
	  </div>
	  <br>
	  <div class="input-group">
          <div class="input-group-addon">Poli</div>
	 		<input type="text" name="poli" readonly class="form-control" value="<?php echo"$txt_01"; ?>">
	  </div>
	  </td>
          <td width="54%">
		  <!-- <b>Nomor Kartu JKN</b><br> -->
	
	<!-- <b>Unggah surat rujukan</b><br> -->
	 <table width="437" border="1" rules="all">
      <tr>
        <td width="135" align="center"><b>Nomor Rujukan</b><!-- <input type="file" name="up" class="form-control"  accept="image/jpeg"> --></td>
        <td width="286"><input autocomplete="off" type="text" class="form-control" value="<?Php echo"$vrjj_01[JalanNoRujukan]"; ?>"  name="no_rujukan" required><!-- <button class="btn btn-success" name="simpan_rujukan"><i class="fa fa-send-o"></i>&nbsp;Unggah Berkas</button> --></td>
      </tr>
    </table>
    <br>
    <table width="437" border="1" rules="all">
      <tr>
        <td width="133" align="center"><b>Nomor Kartu JKN</b><!-- <input type="file" name="up_bpjs" class="form-control"  accept="image/jpeg"> --></td>
        <td width="288"> <input autocomplete="off" type="text" class="form-control" value="<?php echo"$vpss[PasienNoKartuJamin]"; ?>" name="no_jkn" required><!-- <button class="btn btn-success" name="simpan_bpjs"><i class="fa fa-send-o"></i>&nbsp;Unggah Berkas</button> --></td>
      </tr>
    </table>
   	<br>
    <table width="437" border="1" rules="all">
      <tr>
        <td width="133" align="center"><b>Tgl Periksa</b><!-- <input type="file" name="up_bpjs" class="form-control"  accept="image/jpeg"> --></td>
        <td width="288"> <input autocomplete="off" type="text" class="form-control" readonly value="<?php echo"$vrjj_con[tgl_rj]"; ?>" name="tg_periksa" required><!-- <button class="btn btn-success" name="simpan_bpjs"><i class="fa fa-send-o"></i>&nbsp;Unggah Berkas</button> --></td>
      </tr>
    </table>
   <br>
    <table width="437" border="1" rules="all">
      <tr>
        <td width="133" align="center"><b>Tgl terahir Periksa</b><!-- <input type="file" name="up_bpjs" class="form-control"  accept="image/jpeg"> --></td>
        <td width="288"> <input autocomplete="off" type="text" class="form-control" readonly value="<?php echo"$vrjj_con02[tgl_rj02]"; ?>" name="tg_periksa" required><!-- <button class="btn btn-success" name="simpan_bpjs"><i class="fa fa-send-o"></i>&nbsp;Unggah Berkas</button> --></td>
      </tr>
    </table>
   <br>
   	 <button class="btn btn-warning" name="simpan_nomor"><i class="fa fa-send-o"></i>&nbsp;Kirim Data</button>    
	</td>
        </tr>
        <tr>
          <td rowspan="3"> 
		  <div class="input-group">
          <div class="input-group-addon">Nomor Reg</div>
	 		<input type="text" name="noreg"  class="form-control" readonly value="<?php echo"$REG"; ?>" required>
	      </div>		  <br>
		  <div class="input-group">
          <div class="input-group-addon">Nomor RM</div>
	 		<input type="text" name="rm" readonly class="form-control" value="<?php echo"$vrjj_01[PasienNomorRM]"; ?>" required>
	      </div></td>
          <td>
		 </td>
        </tr>
        <tr>
          <td>
		  <b>Unggah Surat Kronologi  (<font color="#990000">* Untuk pasien kecelakaan atau jatuh </font>)</b><br>
		  <table width="437" border="1" rules="all">
      <tr>
        <td colspan="2"><p>
          <label>
          <input type="radio" name="ktk" onclick="enable()" value="2">
  	Unggah</label>
          <label>
          <input type="radio" name="ktk" onclick="disable()" value="1" checked>
  Lewati</label>     
        </p></td>
        </tr>
      <tr>
        <td width="279"><input type="file" id="mySelect" name="up_berkas" class="form-control" accept="image/jpeg" disabled></td>
        <td width="142"> <button class="btn btn-success"  name="simpan_berkas"><i class="fa fa-send-o"></i>&nbsp;Unggah Kronologi</button></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
      </tr>
          </table>
          <hr>
		  <table width="437" border="1" rules="all">
		    <tr>
		      <td colspan="2"><p>Unggah Surat Kontrol <font color="#990000"><b>*(Wajib untuk pasien kontrol</b></font></p></td>
	        </tr>
		    <tr>
		      <td width="279"><input type="file"  name="up_kontrol" class="form-control" accept="image/jpeg"></td>
		      <td width="142"><button class="btn btn-success"  name="simpan_kontrol"><i class="fa fa-send-o"></i>&nbsp;Unggah Surat Kontrol</button></td>
	        </tr>
		    </table>
	      </td>
        </tr>
        <tr>
          <td align="center">
		  <?php 
		  /*
		if(isset($_POST['simpan_rujukan'])){
			$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
			$nama = @$_FILES['up']['name'];
			$en_nama = cr($nama);
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['up']['size'];
			$file_tmp = $_FILES['up']['tmp_name'];	
			 $nama_f= "$en_nama$ack_big$time_ack2.jpeg";
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 9044070){			
					move_uploaded_file($file_tmp, '../FL/'.$nama_f);
					$ms_q("insert into TBGambar(idmain_gambar,PasienNomorRM,JalanNoReg,nama,gambar,GambarStatus)values('$IDMAIN_TINY','$RM','$REG','$nama','$nama_f','2')");
					if($query){
						echo 'Failed';
					}else{
						echo "Uploaded";
					}
				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		}
		*/
		?>
		<?php 
			/*
		if(isset($_POST['simpan_bpjs'])){
			$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
			$nama = @$_FILES['up_bpjs']['name'];
			$en_nama = cr($nama);
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['up_bpjs']['size'];
			$file_tmp = $_FILES['up_bpjs']['tmp_name'];	
			 $nama_f= "$en_nama$ack_big$time_ack2.jpeg";
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 9044070){			
					move_uploaded_file($file_tmp, '../FL/'.$nama_f);
					$ms_q("insert into TBGambar(idmain_gambar,PasienNomorRM,JalanNoReg,nama,gambar,GambarStatus)values('$IDMAIN_TINY','$RM','$REG','$nama','$nama_f','1')");
					if($query){
						echo 'Failed';
					}else{
						echo "Uploaded";
					}
				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		}
		*/
		?>
		<?php 
		
		if(isset($_POST['simpan_berkas'])){
			$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
			$nama = @$_FILES['up_berkas']['name'];
			$en_nama = cr($nama);
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['up_berkas']['size'];
			$file_tmp = $_FILES['up_berkas']['tmp_name'];	
			 $nama_f= "$en_nama$ack_big$time_ack2.jpeg";
 				$ktk = @trim($_POST['ktk']);
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 9044070){			
					move_uploaded_file($file_tmp, '../FL/'.$nama_f);
					$ms_q("insert into TBGambar(idmain_gambar,PasienNomorRM,JalanNoReg,nama,gambar,GambarStatus)values('$IDMAIN_TINY','$RM','$REG','$nama','$nama_f','3')");
					$ms_q("$up TRawatJalan set AppKhusus='$ktk' where JalanNoReg='$REG'"); 
					if($query){
						echo 'Failed';
					}else{
						echo "Uploaded";
					}
				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		}
		
		?>
        
        <?php 
		
		if(isset($_POST['simpan_kontrol'])){
			$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
			$nama = @$_FILES['up_kontrol']['name'];
			$en_nama = cr($nama);
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['up_kontrol']['size'];
			$file_tmp = $_FILES['up_kontrol']['tmp_name'];	
			 $nama_f= "$en_nama$ack_big$time_ack2.jpeg";
 				$ktk = @trim($_POST['ktk']);
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 9044070){			
					move_uploaded_file($file_tmp, '../FL/'.$nama_f);
					$ms_q("insert into TBGambar(idmain_gambar,PasienNomorRM,JalanNoReg,nama,gambar,GambarStatus)values('$IDMAIN_TINY','$RM','$REG','$nama','$nama_f','3')");
					$ms_q("$up TRawatJalan set AppKhusus='$ktk' where JalanNoReg='$REG'"); 
					if($query){
						echo 'Failed';
					}else{
						echo "Uploaded";
					}
				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		}
		
		?>

			    <table width="100%" class="table table-bordered">
				<?php
						$vgbr_02 =  $ms_q("$sl idmain_gambar,JalanNoReg,gambar,GambarStatus from TBGambar where JalanNoReg='$REG' order by GambarStatus asc");
							while($vgbrr_02 = $ms_fas($vgbr_02)){
				?>
                 	
                    <?php 
						if($vgbrr_02['GambarStatus']==1){
							echo" <tr class=success>";
						echo "<td>Kartu BPJSK <a href=UPLOAD_BERKAS.php?IDDKT=$IDDKT&RM=$RM&REG=$REG&IDG=$vgbrr_02[idmain_gambar]#DELETE class=btn><b>X Hapus Gambar</a></a></td>";
						echo"</tr>";
						echo" <tr>";
						echo "<td><img src=../FL/$vgbrr_02[gambar] class=img-responsive></td>";
						echo"</tr>";
					}elseif($vgbrr_02['GambarStatus']==2){
						echo" <tr class=success>";
					echo "<td>Surat Rujukan <a href=UPLOAD_BERKAS.php?IDDKT=$IDDKT&RM=$RM&REG=$REG&IDG=$vgbrr_02[idmain_gambar]&FL=$vgbrr_02[gambar]#DELETE class=btn><b>X Hapus Gambar</a></a></td>";
						echo"</tr>";
						echo" <tr>";
					echo "<td><img src=../FL/$vgbrr_02[gambar] class=img-responsive></td>";
						echo"</tr>";
					}elseif($vgbrr_02['GambarStatus']==3){
						echo" <tr class=success>";
					echo "<td>Surat kontrol  <a href=UPLOAD_BERKAS.php?IDDKT=$IDDKT&RM=$RM&REG=$REG&IDG=$vgbrr_02[idmain_gambar]&FL=$vgbrr_02[gambar]#DELETE class=btn><b>X Hapus Gambar</a></a></td>";
					echo"</tr>";
					echo" <tr>";
					echo "<td><img src=../FL/$vgbrr_02[gambar] class=img-responsive></td>";
						echo"</tr>";
					}
					
					?>
               
				 <?php } ?>
               
          </table>		  </td>
        </tr>
       
          <td height="37">
		  <?php 
		  //
		  	//$vgbr = $ms_q("$sl JalanNoReg from TBGambar where JalanNoReg='$REG'");
				//$hit_vgbr = $ms_nr($vgbr);
					//if($hit_vgbr < 2){
			if($vrjj_01['AppJenisDaftar']=="1"){
		   ?>
		  <a href="#" class="btn btn-primary disabled"><i class="fa fa-send-o"></i>&nbsp;Klik, Jika data benar</a>
		 <?php //}elseif($hit_vgbr > 1){ ?>
         <?php }elseif($vrjj_01['AppJenisDaftar']=="3"){ ?>
		   <a href="<?php echo"DAFTAR_STEP_04.php?IDDKT=$IDDKT&RM=$RM&REG=$REG&LENGKAP=LENGKAP#LENGKAP"; ?>" class="btn btn-primary"><i class="fa fa-send-o"></i>&nbsp;Klik, Jika data benar</a>
		   <?php } ?>
		  </td>
          <td>&nbsp;</td>
        </tr>
      </table>
</form>
		<?php include"../SU_ADMIN/logic/EXE_PDO_03.php"; ?>
<br><br><br>
<?php include"footer.php"; ?>
</body>
</html>
