<head>
<script>
function disable() {
    document.getElementById("mySelect").disabled=true;
}
function enable() {
    document.getElementById("mySelect").disabled=false;
}
</script>
</head>
	<?php 
		error_reporting(0);
			include"config02.php";
			include"css.php";
	?>
<body>
		<?php include"MENU.php"; ?>
		<?php 
			$IDDKT = @$_GET['IDDKT'];
			$RM = @$_GET['RM'];
			$KDREG02 = @$_GET['KDREG'];
			$KDREG = @$_GET['REG'];
			?>
		<?php 
				
			$vdkt =  $ms_q("$call_sel TPelaku where PelakuKode='$IDDKT'");
			$vdktt = $ms_fas($vdkt);
			$vpl = $ms_q("$call_sel TUnit where UnitKode='$vdktt[UnitKode]'");
			$vpll = $ms_fas($vpl);
			$vrj_01 =  $ms_q("$call_sel TRawatJalan  where JalanNoReg='$KDREG'");
			$vrjj_01 = $ms_fas($vrj_01);
				$vrj_01_sw = $ms_q("$sl JalanNoReg,PasienNomorRM,PasienNama,JalanNoRujukan,AppJenisDaftar,AppKhusus,JalanRMTanggal FROM TRawatJalan WHERE PasienNomorRM='$RM' AND JalanStatus='1' AND PrshKode='1-0113' order by JalanRMTanggal desc");
					$vrj_01_sww = $ms_fas($vrj_01_sw);
								$vrj_con02= $ms_q("select CONVERT(varchar(10),[JalanRMTanggal],103) as tgl_rj02 from TRawatJalan where JalanNoReg='$vrj_01_sww[JalanNoReg]'");
										$vrjj_con02 = $ms_fas($vrj_con02);
			//--//
			//--//
				$vrj_con= $ms_q("select CONVERT(varchar(10),[JalanRMTanggal],103) as tgl_rj from TRawatJalan where JalanNoReg='$KDREG'");
					$vrjj_con = $ms_fas($vrj_con);
			//--//
			$vps =  $ms_q("$call_sel TPasien  where PasienNomorRM='$RM'");
			$vpss = $ms_fas($vps);
			$vrj = @$ms_q("select TNomor.NomorKode,TNomor.NomorAkhir from TNomor where TNomor.NomorKode='PL-$years$month-'");
				$vrjj = $ms_fas($vrj);
					$hit_vrj = $vrjj['NomorAkhir'] + 1;
					$hit_zero = sprintf("%04d", $hit_vrj);
					$sub_01= substr($vpss['PasienTglLahir'],-4);
					$hit_sub = $years_big - $sub_01;
					$dt = "$date_html5 $time_html5";
					
					$IDG = @trim($_GET['IDG']);
				$FL = @trim($_GET['FL']);
			if(isset($_GET['IDG'])){
				  $folder="../FL/$FL";
					unlink($folder);
				 $ms_q("$dl from TBGambar where idmain_gambar='$IDG'");
					header("location:UPLOAD_BERKAS.php?IDDKT=$IDDKT&RM=$RM&REG=$KDREG");
					}
				?>
				 <?php include"../SU_ADMIN/logic/EXE_PDO_03_ANDR.php"; ?>
				<div class="txt">
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
					$ms_q("insert into TBGambar(idmain_gambar,PasienNomorRM,JalanNoReg,nama,gambar,GambarStatus)values('$IDMAIN_TINY','$RM','$KDREG','$nama','$nama_f','2')");
					if($query){
						echo 'Failed';
					}else{
						//echo "Uploaded";
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
					$ms_q("insert into TBGambar(idmain_gambar,PasienNomorRM,JalanNoReg,nama,gambar,GambarStatus)values('$IDMAIN_TINY','$RM','$KDREG','$nama','$nama_f','1')");
					if($query){
						echo 'Failed';
					}else{
						//echo "Uploaded";
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
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 9044070){			
					move_uploaded_file($file_tmp, '../FL/'.$nama_f);
					$ms_q("insert into TBGambar(idmain_gambar,PasienNomorRM,JalanNoReg,nama,gambar,GambarStatus)values('$IDMAIN_TINY','$RM','$KDREG','$nama','$nama_f','3')");
					$ms_q("$up TRawatJalan set AppKhusus='2' where JalanNoReg='$KDREG'"); 
					if($query){
						echo 'Failed';
					}else{
						//echo "Uploaded";
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
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 9044070){			
					move_uploaded_file($file_tmp, '../FL/'.$nama_f);
					$ms_q("insert into TBGambar(idmain_gambar,PasienNomorRM,JalanNoReg,nama,gambar,GambarStatus)values('$IDMAIN_TINY','$RM','$KDREG','$nama','$nama_f','3')");
					$ms_q("$up TRawatJalan set AppKhusus='2' where JalanNoReg='$KDREG'"); 
					if($query){
						echo 'Failed';
					}else{
						//echo "Uploaded";
					}
				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		}
		
		?>
		</div>
			<nav>
		 <div class="nav-wrapper blue accent-2">
	   <ul>
      <li><a href="#!!">Upload berkas  &raquo; Step 03</a></li>
	  <?php 
		  //
		  	//$vgbr = $ms_q("$sl JalanNoReg from TBGambar where JalanNoReg='$KDREG'");
				//$hit_vgbr = $ms_nr($vgbr);
					//if($hit_vgbr < 2){
				if($vrjj_01['AppJenisDaftar']=="1"){
						
		   ?>
		 	 <li><a href="#" class="waves-effect waves-light btn small blue disabled">Selesai</a></li>
				 <?php }elseif($vrjj_01['AppJenisDaftar']=="3"){ ?>
		  <li> <a href="<?php echo"DAFTAR_STEP_04.php?IDDKT=$IDDKT&RM=$RM&REG=$KDREG&LENGKAP=LENGKAP#LENGKAP"; ?>" class="waves-effect waves-light btn small blue ">Selesai</a></li>
		   <?php } ?>
      </ul>
	  </div>
	</nav>
	
	<form method="post" enctype="multipart/form-data">
		<div class="pdt txt">
		<div class="container">
	
		 <input name="dokter" type="hidden" class="validate" readonly value="<?php echo"$vdktt[PelakuNama]"; ?>">
		<input name="poli" type="hidden" class="validate" readonly value="<?php echo"$vpll[UnitNama]"; ?>">
	   <label for="email">No pendaftaran</label>
         <input name="noreg" type="text" class="validate" readonly value="<?php echo"$vrjj_01[JalanNoReg]"; ?>">
              <label for="email">No RM(Rekam Medis)</label>
		   <input name="rm" type="number" class="validate" readonly value="<?php echo"$vrjj_01[PasienNomorRM]"; ?>">
		 <table class="table striped">
        <thead>
          <tr class="txt">
              <th>
			   
				  <?php 
		  //
		  	//$vgbr_01 = $ms_q("$sl JalanNoReg,GambarStatus from TBGambar where JalanNoReg='$KDREG' AND GambarStatus='1'");
				//$hit_vgbr_01 = $ms_nr($vgbr_01);
					//if($hit_vgbr_01 < 1){
		   ?>
		    <label>Nomor JKN</label>
            <input autocomplete="off" type="text" name="no_jkn" value="<?Php echo"$vpss[PasienNoKartuJamin]"; ?>">
		 	 <!-- <input type="file" name="up_bpjs" media="capture" accept="image/jpeg"> -->
		 <?php //}elseif($hit_vgbr_01 > 0){ ?>
		  <!--
          <label>Kartu BPJSK berhasil diunggah</label>
		<input type="file" name="up_bpjs"   accept="image/jpeg" disabled>
		   -->
		   <?php //} ?>
		
		 </th>
		    </tr>
           <tr class="txt">
              <th align="right"><!-- button name="simpan_bpjs" class="waves-effect waves-light btn small"><i class="material-icons left">file_upload</i> Unggah</button> --></th>
		    </tr>
			 <tr class="txt">
              <th>
			
				<?php 
		  /*
		  	$vgbr_02 = $ms_q("$sl JalanNoReg,GambarStatus from TBGambar where JalanNoReg='$KDREG' AND GambarStatus='2'");
				$hit_vgbr_02 = $ms_nr($vgbr_02);
					if($hit_vgbr_02 < 4){
		   */
		   ?>
		       <label>Nomor rujukan </label>
		 	 <!-- <input type="file" name="up"   accept="image/jpeg"> -->
             <input autocomplete="off" type="text" name="no_rujukan" value="<?Php echo"$vrjj_01[JalanNoRujukan]"; ?>">
		 <?php //}elseif($hit_vgbr_02 > 4){ ?>
         
         	 
		     <!--
             <label class="txt">Surat rujukan berhasil diunggah</label>
		<input type="file" name="up"   accept="image/jpeg" disabled>
		   -->
		   <?php //} ?>
		 </th>
		    </tr>
           <tr class="txt">
               <th align="right">
               <label>Tgl Periksa </label>
             <input autocomplete="off" type="text" class="form-control" readonly value="<?php echo"$vrjj_con[tgl_rj]"; ?>" name="tg_periksa" required>
             <br>
             <label>Tgl Terahir Periksa </label>
             <input autocomplete="off" type="text" class="form-control" readonly value="<?php echo"$vrjj_con02[tgl_rj02]"; ?>" name="tg_periksa" required>
               </th>
          </tr>
           <tr class="txt">
              <th align="right"> <button name="simpan_nomor_02" class="waves-effect waves-light btn small"><i class="material-icons left">file_upload</i> Kirim Data</button></th>
		    </tr>
			 <tr class="txt">
              <th>
              <br><br><br>
			    <label><font color="#990000">*Unggah Surat kronologi (Untuk pasien Trauma atau Jatuh) </font></label>
                 <br>
                 <input type="file" name="up_berkas"   accept="image/jpeg">
                 <br>
                 <font color="#666666">*(jika Upload tidak berfungsi silahkan mengkases via web (Google Chrome) di smartphone anda atau komputer , Ketik di pencarian situs 'RSPWC' lalu klik link 'RSPWC'</font>
                 <br><br>
                 <button name="simpan_berkas" class="waves-effect waves-light btn small"><i class="material-icons left">file_upload</i> Unggah Kronologi</button>
                <hr>
                    <label><font color="#990000">*Unggah Surat kontrol  <font color="#990000"><b>*( Wajib untuk pasien Kontrol </b> </font></label>
                 <br>
                 <font color="#666666">*(jika Upload tidak berfungsi silahkan mengkases via web (Google Chrome) di smartphone anda atau komputer , Ketik di pencarian situs 'RSPWC' lalu klik link 'RSPWC'</font>
                 <br>
                 <input type="file" name="up_kontrol"   accept="image/jpeg">
                 <br><br>
                 <button name="simpan_kontrol" class="waves-effect waves-light btn small"><i class="material-icons left">file_upload</i> Unggah Surat Kontrol</button>
         		</th>
		    </tr>
           <tr class="txt">
              <th align="right">&nbsp; </th>
		    </tr>
       </thead>
	   </table>
	   <table class="table striped">
	   <?php
						$vgbr_02 =  $ms_q("$sl idmain_gambar,JalanNoReg,gambar,GambarStatus from TBGambar where JalanNoReg='$KDREG' order by GambarStatus asc");
							while($vgbrr_02 = $ms_fas($vgbr_02)){
				?>
                 	
                    <?php 
						if($vgbrr_02['GambarStatus']==1){
							echo" <tr class=success>";
					echo "<td>Kartu BPJSK <a href=UPLOAD_BERKAS.php?IDDKT=$IDDKT&RM=$RM&REG=$KDREG&IDG=$vgbrr_02[idmain_gambar]#DELETE class=txt><b>X Hapus Gambar</a></td>";
						echo"</tr>";
						echo" <tr>";
					echo "<td><img src=../FL/$vgbrr_02[gambar] class=responsive-img></td>";
						echo"</tr>";
					}elseif($vgbrr_02['GambarStatus']==2){
						echo" <tr class=success>";
					echo "<td>Surat Rujukan <a href=UPLOAD_BERKAS.php?IDDKT=$IDDKT&RM=$RM&REG=$KDREG&IDG=$vgbrr_02[idmain_gambar]#DELETE class=txt><b>X Hapus Gambar</a></td>";
						echo"</tr>";
						echo" <tr>";
					echo "<td><img src=../FL/$vgbrr_02[gambar] class=responsive-img></td>";
						echo"</tr>";
					}elseif($vgbrr_02['GambarStatus']==3){
						echo" <tr class=success>";
					echo "<td>Surat kontrol <a href=UPLOAD_BERKAS.php?IDDKT=$IDDKT&RM=$RM&REG=$KDREG&IDG=$vgbrr_02[idmain_gambar]#DELETE class=txt><b>X Hapus Gambar</a></td>";
					echo"</tr>";
					echo" <tr>";
					echo "<td><img src=../FL/$vgbrr_02[gambar] class=responsive-img></td>";
						echo"</tr>";
					}
					
					?>
               
				 <?php } ?>
				</table>
               
	   
		  </div></div>
		   </form>
</body>
