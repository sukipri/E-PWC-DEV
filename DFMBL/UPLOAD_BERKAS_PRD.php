<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
			$REG = @$_GET['REG'];
			?>
		<?php 
				
			$vdkt =  $ms_q("$call_sel TPelaku where PelakuKode='$IDDKT'");
			$vdktt = $ms_fas($vdkt);
			$vpl = $ms_q("$call_sel TUnit where UnitKode='$vdktt[UnitKode]'");
			$vpll = $ms_fas($vpl);
			$vrj_01 =  $ms_q("$call_sel TRawatJalan  where JalanNoReg='$REG'");
			$vrjj_01 = $ms_fas($vrj_01);
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
					header("location:UPLOAD_BERKAS.php?IDDKT=$IDDKT&RM=$RM&REG=$REG");
					}
				?>
				
				<div class="txt">
				
		<?php 
		
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
		 <div class="nav-wrapper">
	   <ul>
      <li><a href="#!!">Upload berkas  &raquo; Step 03</a></li>
	 <li> <a href="<?php echo"DAFTAR_STEP_04.php?IDDKT=$IDDKT&RM=$RM&REG=$REG&LENGKAP=LENGKAP#LENGKAP"; ?>" class="waves-effect waves-light btn small blue ">Selesai</a></li>
		</ul>
	  </div>
	</nav>
	
	<form method="post" enctype="multipart/form-data">
		<div class="pdt txt">
		<div class="container">
	
		 <input name="dokter" type="hidden" class="validate" readonly="" value="<?php echo"$vdktt[PelakuNama]"; ?>">
		<input name="poli" type="hidden" class="validate" readonly="" value="<?php echo"$vpll[UnitNama]"; ?>">
	   <label for="email">No pendaftaran</label>
         <input name="noreg" type="text" class="validate" readonly="" value="<?php echo"$vrjj_01[JalanNoReg]"; ?>">
              <label for="email">No RM(Rekam Medis)</label>
		   <input name="rm" type="number" class="validate" readonly="" value="<?php echo"$vrjj_01[PasienNomorRM]"; ?>">
		 <table class="table striped">
        <thead>
          <tr class="txt">
              <th>
			   
				  <?php 
		  //
		  	$vgbr_01 = $ms_q("$sl JalanNoReg,GambarStatus from TBGambar where JalanNoReg='$REG' AND GambarStatus='1'");
				$hit_vgbr_01 = $ms_nr($vgbr_01);
					if($hit_vgbr_01 < 1){
		   ?>
		    <label>Unggah Kartu Identtitas </label>
		    <input type="file" name="up_bpjs"   accept="image/jpeg">
		 <?php }elseif($hit_vgbr_01 > 0){ ?>
		  <label>Kartu Indentitas berhasil diunggah</label>
		<input type="file" name="up_bpjs"   accept="image/jpeg" disabled>
		   <?php } ?>
		   <br>
		   *Jika usia diatas 17 thn wajib menggungah Kartu Identitas
		
		 </th>
		    </tr>
           <tr class="txt">
              <th align="right"> <button name="simpan_bpjs" class="waves-effect waves-light btn small"><i class="material-icons left">file_upload</i> Unggah</button></th>
		    </tr>
			</thead>
	   </table>
	   <table class="table striped">
	   <?php
						$vgbr_02 =  $ms_q("$sl idmain_gambar,JalanNoReg,gambar,GambarStatus from TBGambar where JalanNoReg='$REG' order by GambarStatus asc");
							while($vgbrr_02 = $ms_fas($vgbr_02)){
				?>
                 	
                    <?php 
						if($vgbrr_02['GambarStatus']==1){
							echo" <tr class=success>";
					echo "<td>Kartu Identitas <a href=UPLOAD_BERKAS.php?IDDKT=$IDDKT&RM=$RM&REG=$REG&IDG=$vgbrr_02[idmain_gambar]#DELETE class=txt><b>X Hapus Gambar</a></td>";
						echo"</tr>";
						echo" <tr>";
					echo "<td><img src=../FL/$vgbrr_02[gambar] class=responsive-img></td>";
						echo"</tr>";
					}elseif($vgbrr_02['GambarStatus']==2){
						echo" <tr class=success>";
					echo "<td>Surat Rujukan <a href=UPLOAD_BERKAS.php?IDDKT=$IDDKT&RM=$RM&REG=$REG&IDG=$vgbrr_02[idmain_gambar]#DELETE class=txt><b>X Hapus Gambar</a></td>";
						echo"</tr>";
						echo" <tr>";
					echo "<td><img src=../FL/$vgbrr_02[gambar] class=responsive-img></td>";
						echo"</tr>";
					}elseif($vgbrr_02['GambarStatus']==3){
						echo" <tr class=success>";
					echo "<td>Surat kontrol <a href=UPLOAD_BERKAS.php?IDDKT=$IDDKT&RM=$RM&REG=$REG&IDG=$vgbrr_02[idmain_gambar]#DELETE class=txt><b>X Hapus Gambar</a></td>";
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
</html>
