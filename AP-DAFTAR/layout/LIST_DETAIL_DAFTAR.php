<body>
	<?php 
			$IDDKT = @$_GET['IDDKT'];
			$RM = @$_GET['RM'];
			$NO = @$_GET['NO'];
			$REG = @$_GET['REG'];
			$OKE = @$_GET['OKE'];
			$WAKTU = @$_GET['WAKTU'];
			$NOURUT = @$_GET['NOURUT'];
			$BTL = @$_GET['BTL'];
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
				$vpr =  $ms_q("$sl PrshKode,PrshNama from TPerusahaan  where PrshKode='$vrjj_01[PrshKode]'");
				$vprr = $ms_fas($vpr);
				$vjdl =  $ms_q("$sl DokterKode,KetHari,KetJam,AtKd,Kuota from JadwalDokter  where AtKd='$vrjj_01[AtKd]'");
				$vjdll = $ms_fas($vjdl);
				
					$vrj_con= $ms_q("select CONVERT(varchar(10),[JalanRMTanggal],101) as tgl_rj from TRawatJalan where JalanNoReg='$REG'");
					$vrjj_con = $ms_fas($vrj_con);
					$vrj_con_02= $ms_q("select CONVERT(varchar(10),[JalanRMTanggal],105) as tgl_rjj from TRawatJalan where JalanNoReg='$REG'");
					$vrjj_con_02 = $ms_fas($vrj_con_02);
					$hit_vrj = $vrjj['NomorAkhir'] + 1;
					$hit_zero = sprintf("%04d", $hit_vrj);
					$sub_01= substr($vpss['PasienTglLahir'],-4);
					$hit_sub = $years_big - $sub_01;
					$dt = "$date_html5 $time_html5";
					//str_replcae
				$teksawal = "$vpll[UnitNama]";
 			$txt_01 = str_replace("Klinik Sp.", "", $teksawal);
			
				$vdc = $ms_q("SELECT TOP 1 JalanNoUrut 
FROM TRawatJalan
where DokterKode = '$IDDKT' AND JalanRMTanggal between '$vrjj_con[tgl_rj]' and '$vrjj_con[tgl_rj] 23:59'
      and WaktuPesan = '$WAKTU'
 order by JalanNoUrut desc");
					$vdcc = $ms_fas($vdc);
					$hit_vdc = $vdcc['JalanNoUrut'] + 1;
					$hit_zero = sprintf("%02d", $hit_vdc);
					//BPJS
				if(isset($_GET['OKE'])){
					$ms_q("UPDATE TRawatJalan set JalanNoUrut='$NO',AppJenisDaftar='2' where JalanNoReg='$REG'");
						if($vrjj_01['WaktuPesan']=="P"){
					header("location:MAIL/mail-proses.php?IDDKT=$IDDKT&RM=$RM&REG=$REG&KMAIL=MAIL&NO=$NO&EML=$vpss[PasienEmail]&TG=$vrjj_con_02[tgl_rjj]&WAKTU=($vjdll[KetJam])&HARI=$vjdll[KetHari]");
					 }elseif($vrjj_01['WaktuPesan']=="S"){
					 header("location:MAIL/mail-proses.php?IDDKT=$IDDKT&RM=$RM&REG=$REG&KMAIL=MAIL&NO=$NO&EML=$vpss[PasienEmail]&TG=$vrjj_con_02[tgl_rjj]&WAKTU=($vjdll[KetJam])&HARI=$vjdll[KetHari]");
					 }elseif($vrjj_01['WaktuPesan']=="M"){
					 header("location:MAIL/mail-proses.php?IDDKT=$IDDKT&RM=$RM&REG=$REG&KMAIL=MAIL&NO=$NO&EML=$vpss[PasienEmail]&TG=$vrjj_con_02[tgl_rjj]&WAKTU=($vjdll[KetJam])&HARI=$vjdll[KetHari]");
					 } }
					 
					 //Pribadi
					 if(isset($_GET['OKE_PRD'])){
					 $ket = "Sebelum ke Poli Silahkan menuju Kasir Pendaftaran,untuk Melakukan Pembayaran terlebih dahulu";
					$ms_q("UPDATE TRawatJalan set JalanNoUrut='$NO',AppJenisDaftar='2',ket='$ket' where JalanNoReg='$REG'");
						if($vrjj_01['WaktuPesan']=="P"){
					header("location:MAIL/mail-proses-prd.php?IDDKT=$IDDKT&RM=$RM&REG=$REG&KMAIL=MAIL&NO=$NO&EML=$vpss[PasienEmail]&TG=$vrjj_con_02[tgl_rjj]&WAKTU=($vjdll[KetJam])&HARI=$vjdll[KetHari]");
					 }elseif($vrjj_01['WaktuPesan']=="S"){
					 header("location:MAIL/mail-proses-prd.php?IDDKT=$IDDKT&RM=$RM&REG=$REG&KMAIL=MAIL&NO=$NO&EML=$vpss[PasienEmail]&TG=$vrjj_con_02[tgl_rjj]&WAKTU=($vjdll[KetJam])&HARI=$vjdll[KetHari]");
					 }elseif($vrjj_01['WaktuPesan']=="M"){
					 header("location:MAIL/mail-proses-prd.php?IDDKT=$IDDKT&RM=$RM&REG=$REG&KMAIL=MAIL&NO=$NO&EML=$vpss[PasienEmail]&TG=$vrjj_con_02[tgl_rjj]&WAKTU=($vjdll[KetJam])&HARI=$vjdll[KetHari]");
					 } }
					 //Harus Kependaftaran
					 if(isset($_GET['OKE_PDF'])){
					 	$ket = "Sebelum ke Poli Silahkan menuju pendaftaran Umum / Asuransi,untuk cek berkas khusus";
					$ms_q("UPDATE TRawatJalan set JalanNoUrut='$NO',AppJenisDaftar='2',ket='$ket' where JalanNoReg='$REG'");
						if($vrjj_01['WaktuPesan']=="P"){
					header("location:MAIL/mail-proses-pdf.php?IDDKT=$IDDKT&RM=$RM&REG=$REG&KMAIL=MAIL&NO=$NO&EML=$vpss[PasienEmail]&TG=$vrjj_con_02[tgl_rjj]&WAKTU=($vjdll[KetJam])&HARI=$vjdll[KetHari]");
					 }elseif($vrjj_01['WaktuPesan']=="S"){
					 header("location:MAIL/mail-proses-pdf.php?IDDKT=$IDDKT&RM=$RM&REG=$REG&KMAIL=MAIL&NO=$NO&EML=$vpss[PasienEmail]&TG=$vrjj_con_02[tgl_rjj]&WAKTU=($vjdll[KetJam])&HARI=$vjdll[KetHari]");
					 }elseif($vrjj_01['WaktuPesan']=="M"){
					 header("location:MAIL/mail-proses-pdf.php?IDDKT=$IDDKT&RM=$RM&REG=$REG&KMAIL=MAIL&NO=$NO&EML=$vpss[PasienEmail]&TG=$vrjj_con_02[tgl_rjj]&WAKTU=($vjdll[KetJam])&HARI=$vjdll[KetHari]");
					 } }
					if(isset($_GET['NOURUT'])){
					$ms_q("UPDATE TRawatJalan set JalanNoUrut='$NOURUT',AppJenisDaftar='2' where JalanNoReg='$REG'");
					header("location:?HLM=LIST_DAFTAR_TODAY");}
					
					if(isset($_GET['BTL'])){
					$ms_q("UPDATE TRawatJalan set JalanNoUrut='0',AppJenisDaftar='4',JalanStatus='9' where JalanNoReg='$REG'");
					header("location:?HLM=DAFTAR_BATAL&IDDKT=$IDDKT&RM=$RM&REG=$REG&BTL=BTL&EML=$vpss[PasienEmail]");}
					
					if(isset($_POST['upd'])){
						$jkn = @trim($_POST['jkn']);
						$nama = @trim($_POST['nama']);
						$tlp = @trim($_POST['tlp']);
						$email = @trim($_POST['email']);
						$ms_q("$up Tpasien set PasienNama='$nama',PasienTelp='$tlp',PasienNoKartuJamin='$jkn',PasienEmail='$email' where PasienNomorRM='$RM'");
						header("location:?HLM=LIST_DETAIL_DAFTAR&IDDKT=$IDDKT&RM=$RM&WAKTU=$WAKTU&REG=$REG&LENGKAP=LENGKAP#LENGKAP");
					}?>
					
	<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="?HLM=LIST_DAFTAR_TODAY">Pendaftar</a></li>
  <li class="breadcrumb-item"><?php echo"#$RM &nbsp;";  echo $vrjj_con['tgl_rj']; ?></li>
</ol>
	<form method="post" action="">
	  <table width="100%" border="0" class="table table-bordered">
    <tr>
          <td width="46%">
		  <div class="input-group">
          <div class="input-group-addon">Dokter</div>
	 		<input type="text" name="dokter" readonly="" class="form-control" value="<?php echo"$vdktt[PelakuNama]"; ?>">
	  </div>
	  <br>
	  <div class="input-group">
          <div class="input-group-addon">Poli</div>
	 		<input type="text" name="poli" readonly="" class="form-control" value="<?php echo"$txt_01"; ?>">
	  </div>
	  </td>
          <td width="54%">
		 <label>Hari Praktik</label><br>
       <?php echo"<h4>Periksa <i>$vrjj_con_02[tgl_rjj] $vjdll[KetJam]</i> <br><b>Penanggung <i>$vprr[PrshNama]</i></b></h4>"; ?>
	   <?php echo"No Urut <b><i>$vrjj_01[JalanNoUrut]</i></b><br>"; ?>
	   
	   <?php
	   	if($vrjj_01['JalanStatus']==9){
		?>
		<b><font color="#CC3333"><b><i>Dibatalkan, Dengan alasan khusus</i></b></font></b>
		<?php }else{  ?>
		
	   <?php } ?>
        </td>
        </tr>
        <tr>
          <td> 
		  <div class="input-group">
          <div class="input-group-addon">Nomor Reg</div>
	 		<input type="text" name="noreg"  class="form-control" readonly="" value="<?php echo"$REG"; ?>" required>
	  </div>
	  <br>
		  <div class="input-group">
          <div class="input-group-addon">Nomor RM</div>
	 		<input type="text" name="rm" readonly="" class="form-control" value="<?php echo"$vrjj_01[PasienNomorRM]"; ?>" required>
	  </div>
	    <br>
		
	<?php
						if($vrjj_01['PrshKode']=="0-0000"){
				?>
		  
		  <?php }elseif($vrjj_01['PrshKode']=="1-0113"){ ?>
		   <table width="462" border="0" class="table">
          <tr>
            <td width="350">  <div class="input-group">
          <div class="input-group-addon">Nomor Kartu JKN</div>
	 		<input type="text" name="jkn" class="form-control" value="<?php echo"$vpss[PasienNoKartuJamin]"; ?>" required>
	  </div></td>
            <td width="102"><button name="upd" class="btn btn-info"><i class="fa fa-sign-in"></i>&nbsp;Update Profil</button></td>
          </tr>
          <tr>
            <td colspan="2">  	<font color="#CC3300"><b>*(Nomor JKN Wajib disi</b></font></td>
          </tr>
        </table>
		<?php }else{ ?>
			 <table width="462" border="0" class="table">
          <tr>
            <td width="350">  <div class="input-group">
          <div class="input-group-addon">Nomor Kartu Asuransi</div>
	 		<input type="text" name="jkn" class="form-control" value="<?php echo"$vpss[PasienNoKartuJamin]"; ?>" required>
	  </div></td>
            <td width="102"><button name="upd" class="btn btn-info"><i class="fa fa-sign-in"></i>&nbsp;Update Profil</button></td>
          </tr>
          <tr>
            <td colspan="2">  	<font color="#CC3300"><b>*(Nomor Asuransi Wajib disi</b></font></td>
          </tr>
        </table>
		
			  <?php } ?>
      
</td>
          <td>
		    <?php
			/*
				$vrj_01_02 =  $ms_q("$call_sel TRawatJalan  where AtKd='$vjdll[AtKd]' AND DokterKode='$IDDKT' AND JalanRMTanggal between '$vrjj_con[tgl_rj]' and '$vrjj_con[tgl_rj] 23:59' and WaktuPesan = '$WAKTU'");
				$vrjj_01_02_jum = $ms_nr($vrj_01_02);
				echo"$vrjj_01_02_jum";
				*/
				echo"<i>//$vjdll[Kuota] Pasien</i><br>";
				echo"<i>Selanjutnya $hit_zero</i><br>";
				if(empty($vjdll['Kuota'])){
				?>
				<div class="input-group">
          <div class="input-group-addon">Nomor antrian berikutnya</div>
		
		 <input type="text" name="no" readonly="" value="<?php echo"$hit_zero"; ?>" class="form-control">
		</div>
				
				<?php } else{ 
						//echo"ADA";
					if($hit_vdc >= $vjdll['Kuota']){ echo"<font color=red><b>Pasien Sudah Penuh</b></font>";}else{ ?>
					<div class="input-group">
          <div class="input-group-addon">Nomor antrian berikutnya</div>
		
		 <input type="text" name="no" readonly="" value="<?php echo"$hit_zero"; ?>" class="form-control">
		</div>
		<?php } ?>
		 <?php } ?>
		<?php
			$FNS = @trim($_GET['FNS']);
				if(isset($_GET['FNS'])){
				?>
				<a href="#" class="btn btn-info btn-sm"><i class="fa fa-wheelchair"></i>&nbsp;Detail Lengkap Data Pasien</a>
				<?php } ?>
		  </td>
        </tr>
        <tr>
          <td height="37">
		    <div class="input-group">
          <div class="input-group-addon">Nama</div>
	 		<input type="text" name="nama"   class="form-control" value="<?php echo"$vpss[PasienNama]"; ?>" required>
	  </div>
	  <br>
	     <div class="input-group">
          <div class="input-group-addon">Telepon</div>
	 		<input type="text" name="tlp"  class="form-control" value="<?php echo"$vpss[PasienTelp]"; ?>" required>
	  </div>
	   <br>
	     <div class="input-group">
          <div class="input-group-addon">Email</div>
	 		<input type="email" name="email" class="form-control" value="<?php echo"$vpss[PasienEmail]"; ?>" required>
	  </div>
	   <br>
	     <div class="input-group">
          <div class="input-group-addon">Tanggal Lahir</div>
	 		<input type="text" name="tgl_lahir" readonly=""  class="form-control" value="<?php echo"$vpss[PasienTglLahir]"; ?>" required>
	  </div>
	   <br>
	     <div class="input-group">
          <div class="input-group-addon">Umur</div>
	 		<input type="text" name="umur" readonly=""  class="form-control" value="<?php echo"$hit_sub"; ?>" required>
	  </div>
	  <br>
	   <textarea class="form-control" readonly="" name="al"><?php echo"$vpss[PasienAlamat]"; ?></textarea>
		 <input type="text" name="al2" readonly=""  class="form-control" value="<?php echo"$vpss[PasienKelurahan]"; ?>" required>
		 <input type="text" name="al3" readonly=""  class="form-control" value="<?php echo"$vpss[PasienKecamatan]"; ?>" required>
		  <input type="text" name="al4" readonly=""  class="form-control" value="<?php echo"$vpss[PasienKota]"; ?>" required>
		   <input type="text" name="al5" readonly=""  class="form-control" value="<?php echo"$vpss[PasienProv]"; ?>" required>
		   <?php
		   	if($vrjj_01['AppJenisDaftar']==2){
		   ?> 
		  <center> <h4><font color="#007D00"><b>Telah Terverifikasi</b></font></h4>
		    <a href="<?php echo"layout/CTK_LAMPIRAN.php?IDDKT=$IDDKT&REG=$REG&RM=$RM#$REG"; ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i>&nbsp;Cetak Data Pendaftar</a>
			 <a href="<?php echo"layout/CTK_LAMPIRAN_02.php?IDDKT=$IDDKT&REG=$REG&RM=$RM#$REG"; ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i>&nbsp;Cetak Lampiran Pendaftar</a>
			 </center>
		   <?php }elseif($vrjj_01['AppJenisDaftar']==3){ ?>
		   <h4><font color="#FF4646"><center><b>Belum Terverifikasi</b></center></font></h4>
		     <?php }elseif($vrjj_01['AppJenisDaftar']==4){ ?>
			<h4><font color="#CC3333"><center><b>Dibatalkan</b></center></font></h4>
			<?php
				$vrbt = $ms_q("$sl JalanNoReg,JalanBatalKet from TRawatJalanBatal where JalanNoReg='$REG'");
					$vrbtt = $ms_fas($vrbt);
			 echo"<font color=blue><b>Alasan <i>$vrbtt[JalanBatalKet]</i></b></font>";
			  ?>
		   <?php }?>
		  </td>
		  <td>
		    <table width="100%" class="table table-bordered">
				<?php
						$vgbr_02 =  $ms_q("$sl JalanNoReg,gambar,GambarStatus from TBGambar where JalanNoReg='$REG' order by GambarStatus asc");
							while($vgbrr_02 = $ms_fas($vgbr_02)){
				?>
                 	
                     <?php 
						if($vgbrr_02['GambarStatus']==1){
							echo" <tr class=success>";
					echo "<td>Kartu BPJSK/KTP/ID CARD <a href=layout/CTK_LAMPIRAN_03.php?IDDKT=$IDDKT&REG=$REG&RM=$RM&IDG=$vgbrr_02[gambar] target=_blank>#Cetak Berkas</a></td>";
						echo"</tr>";
						echo" <tr>";
					echo "<td><img src=../FL/$vgbrr_02[gambar] class=img-responsive></td>";
						echo"</tr>";
					}elseif($vgbrr_02['GambarStatus']==2){
						echo" <tr class=success>";
					echo "<td>Surat Rujukan <a href=layout/CTK_LAMPIRAN_03.php?IDDKT=$IDDKT&REG=$REG&RM=$RM&IDG=$vgbrr_02[gambar] target=_blank>#Cetak Berkas</a></td>";
						echo"</tr>";
						echo" <tr>";
					echo "<td><img src=../FL/$vgbrr_02[gambar] class=img-responsive></td>";
						echo"</tr>";
					}elseif($vgbrr_02['GambarStatus']==3){
						echo" <tr class=success>";
					echo "<td>Surat kontrol <a href=layout/CTK_LAMPIRAN_03.php?IDDKT=$IDDKT&REG=$REG&RM=$RM&IDG=$vgbrr_02[gambar] target=_blank>#Cetak Berkas</a></td>";
					echo"</tr>";
					echo" <tr>";
					echo "<td><img src=../FL/$vgbrr_02[gambar] class=img-responsive></td>";
						echo"</tr>";
					}
					
					?>
               
				 <?php } ?>
               
                </table>
		  </td>
        </tr>
       
          <td height="37">
		  <?php 
		  	if($vrjj_01['AppJenisDaftar']=='2'){
			}elseif($vrjj_01['AppJenisDaftar']=='3'){
		  ?>
		  		<?php
						if($vrjj_01['PrshKode']=="0-0000"){
				?>
		  <a href="<?php echo"?HLM=LIST_DETAIL_DAFTAR&IDDKT=$vrjj_01[DokterKode]&NO=$hit_zero&RM=$vrjj_01[PasienNomorRM]&REG=$vrjj_01[JalanNoReg]&OKE_PRD=OKE_PRD";?>" class="btn btn-success"><i class="fa fa-send-o"></i>&nbsp;Setujui, Jika data benar</a>
		  <?php }elseif($vrjj_01['PrshKode']=="1-0113"){ ?>
		    <a href="<?php echo"?HLM=LIST_DETAIL_DAFTAR&IDDKT=$vrjj_01[DokterKode]&NO=$hit_zero&RM=$vrjj_01[PasienNomorRM]&REG=$vrjj_01[JalanNoReg]&OKE=OKE";?>" class="btn btn-success"><i class="fa fa-send-o"></i>&nbsp;Setujui, Jika data benar</a>
			<?php }else{ ?>
			  <a href="<?php echo"?HLM=LIST_DETAIL_DAFTAR&IDDKT=$vrjj_01[DokterKode]&NO=$hit_zero&RM=$vrjj_01[PasienNomorRM]&REG=$vrjj_01[JalanNoReg]&OKE_PDF=OKE_PDF";?>" class="btn btn-success"><i class="fa fa-send-o"></i>&nbsp;Setujui, Jika data benar</a>
			  <?php } ?>
			  <!-- Untuk ACC -->
		  <a href="<?php echo"?HLM=LIST_DETAIL_DAFTAR&IDDKT=$vrjj_01[DokterKode]&NO=$hit_zero&RM=$vrjj_01[PasienNomorRM]&REG=$vrjj_01[JalanNoReg]&BTL=BTL";?>" class="btn btn-danger" onClick="return konfirmasi()"><i class="fa fa-send-o"></i>&nbsp;Tolak / Batalkan</a>
		  <?php } ?>
		  <!-- REvisi -->
		  <br> <br>
		  
		    <a href="<?php echo"?HLM=LIST_DETAIL_DAFTAR&IDDKT=$vrjj_01[DokterKode]&NO=$hit_zero&RM=$vrjj_01[PasienNomorRM]&REG=$vrjj_01[JalanNoReg]&BTL=BTL";?>" class="btn btn-danger" onClick="return konfirmasi()"><i class="fa fa-send-o"></i>&nbsp; Batalkan *Revisi</a>
		  </td>
          <td> <?php 
		  	if($vrjj_01['AppJenisDaftar']=='2'){
			}elseif($vrjj_01['AppJenisDaftar']=='3'){
		  ?>
		  <a href="<?php echo"?HLM=LIST_DETAIL_DAFTAR&IDDKT=$vrjj_01[DokterKode]&NO=$hit_zero&RM=$vrjj_01[PasienNomorRM]&REG=$vrjj_01[JalanNoReg]&OKE_PDF=OKE_PDF";?>" class="btn btn-warning"><i class="fa fa-send-o"></i>&nbsp;Setujui, Jika data terlampir berkas tertentu</a>
		<br>*<i>Tombol setujui data terlampir</i> digunakan untuk <i>Approval</i> Pasien yang diwajibkan menuju pendaftaran sebelum ke poli
		 <?php } ?>
		 </td>
        </tr>
      </table>
	  
	</form>
	</div>
</body>
