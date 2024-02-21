<body>
	<?php 
			$IDDKT = @trim($sql_slash($_GET['IDDKT']));
			$RM = @trim($sql_slash($_GET['RM']));
			$NO = @trim($sql_slash($_GET['NO']));
			$REG = @trim($sql_slash($_GET['REG']));
			$OKE = @trim($sql_slash($_GET['OKE']));
			$WAKTU = @trim($sql_slash($_GET['WAKTU']));
			$NOURUT = @trim($sql_slash($_GET['NOURUT']));
			$BTL = @trim($sql_slash($_GET['BTL']));
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
					//--Terahir melakukan pemeriksaan-//
					$vrj_01_sw = $ms_q("$sl JalanNoReg,PasienNomorRM,PasienNama,JalanNoRujukan,AppJenisDaftar,AppKhusus,JalanRMTanggal FROM TRawatJalan WHERE PasienNomorRM='$RM' AND JalanStatus='1' AND PrshKode='1-0113' order by JalanRMTanggal desc");
					$vrj_01_sww = $ms_fas($vrj_01_sw);
								$vrj_con03= $ms_q("select CONVERT(varchar(10),[JalanRMTanggal],103) as tgl_rj02 from TRawatJalan where JalanNoReg='$vrj_01_sww[JalanNoReg]'");
									$vrjj_con03 = $ms_fas($vrj_con03);
					//--//
					
					
					//$hit_vrj = $vrjj['NomorAkhir'] + 1;
					//$hit_zero = sprintf("%04d", $hit_vrj);
					$sub_01= substr($vpss['PasienTglLahir'],-4);
					$hit_sub = $years_big - $sub_01;
					$dt = "$date_html5 $time_html5";
					//str_replcae
				$teksawal = "$vpll[UnitNama]";
 			$txt_01 = str_replace("Klinik Sp.", "", $teksawal);
			
				$vdc = $ms_q("SELECT TOP 1 JalanNoUrut FROM TRawatJalan where DokterKode = '$IDDKT' AND JalanRMTanggal between '$vrjj_con[tgl_rj]' and '$vrjj_con[tgl_rj] 23:59' and not JalanStatus='9'  AND WaktuPesan = '$WAKTU' AND JalanNoUrut > 0 order by Convert(Integer,JalanNoUrut) desc");
					$vdcc = $ms_fas($vdc);
						
					$hit_vdc = $vdcc['JalanNoUrut'] + 1;
					$hit_zero = sprintf("%02d", $hit_vdc);
					//BPJS
				if(isset($_GET['OKE'])){
					$ms_q("UPDATE TRawatJalan set JalanNoUrut='$NO',AppJenisDaftar='2' where JalanNoReg='$REG'"); #UPDATE RWAAT JALAN BPJS
						if($vrjj_01['WaktuPesan']=="P"){
					//header("location:MAIL/mail-proses.php?IDDKT=$IDDKT&RM=$RM&REG=$REG&KMAIL=MAIL&NO=$NO&EML=$vpss[PasienEmail]&TG=$vrjj_con_02[tgl_rjj]&WAKTU=($vjdll[KetJam])&HARI=$vjdll[KetHari]");
						header("location:?HLM=DAFTAR_ACC&IDDKT=$IDDKT&RM=$RM&REG=$REG&KMAIL=MAIL&NO=$NO&EML=$vpss[PasienEmail]&TG=$vrjj_con_02[tgl_rjj]&WAKTU=($vjdll[KetJam])&HARI=$vjdll[KetHari]");
					 }elseif($vrjj_01['WaktuPesan']=="S"){
					header("location:?HLM=DAFTAR_ACC&IDDKT=$IDDKT&RM=$RM&REG=$REG&KMAIL=MAIL&NO=$NO&EML=$vpss[PasienEmail]&TG=$vrjj_con_02[tgl_rjj]&WAKTU=($vjdll[KetJam])&HARI=$vjdll[KetHari]");
					 }elseif($vrjj_01['WaktuPesan']=="M"){
					header("location:?HLM=DAFTAR_ACC&IDDKT=$IDDKT&RM=$RM&REG=$REG&KMAIL=MAIL&NO=$NO&EML=$vpss[PasienEmail]&TG=$vrjj_con_02[tgl_rjj]&WAKTU=($vjdll[KetJam])&HARI=$vjdll[KetHari]");
					 } }
					 
					 //Pribadi
					 if(isset($_GET['OKE_PRD'])){
					 $ket = "Sebelum ke Poli Silahkan menuju Kasir Pendaftaran,untuk Melakukan Pembayaran terlebih dahulu";
					$ms_q("UPDATE TRawatJalan set JalanNoUrut='$NO',AppJenisDaftar='2',ket='$ket' where JalanNoReg='$REG'"); #UPDATE RWAWAT JALAN PRIBADI
					$ms_q("UPDATE TOrderLabPas SET OrderStatusInden='1' , OrderNoDaftar='$REG' , OrderTgl='$vrjj_01[JalanRMTanggal]' WHERE DokterKode='$IDDKT' AND PasienNomorRM='$RM' AND OrderStatusInden='2'"); #UPDATE E-LAAB
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
					$ms_q("UPDATE TRawatJalan set JalanNoUrut='$NO',AppJenisDaftar='2',ket='$ket' where JalanNoReg='$REG'"); #RAWAT JALAN ASURANSI UMUM
					$ms_q("UPDATE TOrderLabPas SET OrderStatusInden='1' , OrderNoDaftar='$REG' , OrderTgl='$vrjj_01[JalanRMTanggal]' WHERE DokterKode='$IDDKT' AND PasienNomorRM='$RM' AND OrderStatusInden='2'"); #UPDATE E-LAAB
					
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
						$jkn = @trim($sql_slash($_POST['jkn']));
						$nama = @trim($sql_slash($_POST['nama']));
						$tlp = @trim($sql_slash($_POST['tlp']));
						$no_a= @trim($sql_slash($_POST['no_a']));
						$email = @trim( $sql_slash($_POST['email']));
						$tgl = @trim($sql_slash($_POST['tgl']));
						$ms_q("$up Tpasien set PasienNama='$nama',PasienTelp='$tlp',PasienNoKartuJamin='$jkn',PasienEmail='$email' where PasienNomorRM='$RM'");
						
						header("location:?HLM=LIST_DETAIL_DAFTAR&IDDKT=$IDDKT&RM=$RM&WAKTU=$WAKTU&REG=$REG&LENGKAP=LENGKAP#LENGKAP");
					}
					
					if(isset($_POST['upd_tgl'])){
						
						$tgl = @trim($sql_slash($_POST['tgl']));
						$ms_q("$up TRawatJalan set JalanRMTanggal='$tgl',JalanRMTanggal2='$tgl' where JalanNoReg='$REG'");
						header("location:?HLM=LIST_DETAIL_DAFTAR&IDDKT=$IDDKT&RM=$RM&WAKTU=$WAKTU&REG=$REG&LENGKAP=LENGKAP#LENGKAP");
					}
					
					if(isset($_POST['upd_a'])){
						
						$no_a= @trim($sql_slash($_POST['no_a']));
						
						$ms_q("$up TRawatJalan set JalanNoUrut='$no_a' where JalanNoReg='$REG'");
						header("location:?HLM=LIST_DETAIL_DAFTAR&IDDKT=$IDDKT&RM=$RM&WAKTU=$WAKTU&REG=$REG&LENGKAP=LENGKAP#LENGKAP");
					}
					
							if(isset($_GET['CANCEL_RW'])){
								$ms_q("$up TRawatJalan set JalanStatus='1' where JalanNoReg='$REG'");
								header("location:?HLM=LIST_DETAIL_DAFTAR&IDDKT=$IDDKT&RM=$RM&WAKTU=$WAKTU&REG=$REG&LENGKAP=LENGKAP#LENGKAP");
							}
					?>
					
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
	 		<input type="text" name="dokter" readonly class="form-control" value="<?php echo"$vdktt[PelakuNama]"; ?>">
	  </div>
	  <br>
	  <div class="input-group">
          <div class="input-group-addon">Poli</div>
	 		<input type="text" name="poli" readonly class="form-control" value="<?php echo"$txt_01"; ?>">
	  </div>
	  </td>
          <td width="54%">
		  		 
		 <label>Hari Praktik</label><br>
<?php echo"<h4>Periksa <i>$vrjj_con_02[tgl_rjj] $vjdll[KetJam]</i> <br><b>Penanggung <i>$vprr[PrshNama]</i></b></h4>"; ?>
	      
	   <?php echo"No Urut <b><i>$vrjj_01[JalanNoUrut]</i></b><br>"; ?>
	
	   <?php
	   	if($vrjj_01['JalanStatus']==9){
		?>
		<b><font color="#CC3333"><b><i>Dibatalkan, Dengan alasan khusus</i></b></font></b>&nbsp;
		<a href="<?php echo"?HLM=LIST_DETAIL_DAFTAR&IDDKT=$vrjj_01[DokterKode]&WAKTU=$WAKTU&NO=$hit_zero&RM=$vrjj_01[PasienNomorRM]&REG=$vrjj_01[JalanNoReg]&CANCEL_RW=CANCEL_RW"; ?>">Cancel</a>
		<?php }else{  ?>
		
	   <?php } ?>
       <br>
       
       	<?php
		//Urutan Pribadi Dan BPJS
		$vdc_hit_01 = $ms_q("SELECT TOP 1  JalanNoUrut FROM TRawatJalan where DokterKode = '$IDDKT' AND JalanRMTanggal between '$vrjj_con[tgl_rj]' and '$vrjj_con[tgl_rj] 23:59' and not JalanStatus='9'  AND WaktuPesan = '$WAKTU' AND JalanNoUrut > 0 order by Convert(Integer,JalanNoUrut) desc");
			$vdcc_hit_01 = $ms_fas($vdc_hit_01);
					$vdcc_jum_01 = $vdcc_hit_01['JalanNoUrut'] + 1 ;	
					$hit_zero_02 = sprintf("%02d", $vdcc_jum_01);
					//$hit_zero_02_opt01 = sprintf("%02d", '5');
	if($vrjj_01['PrshKode']=="0-0000"){
		
			echo"Pribadi - ";
					if($vdcc_jum_01 <= 5 ){
						$ant_01 = $hit_zero_02;
							echo"$ant_01";	
					}elseif($vdcc_jum_01 >= 5){
						$ant_01 = $hit_zero_02;	
						  echo"$ant_01";
					}
    	}elseif($vrjj_01['PrshKode']=="1-0113"){
			echo"BPJS - ";
					if( $vdcc_jum_01 <= 5 ){
						$ant_hit_01 = $hit_zero_02 + 5  ;
						$ant_01 = "0".$ant_hit_01;	
						echo"$ant_01";	
					}elseif( $vdcc_jum_01 >= 5){
						$ant_01 = $hit_zero_02;
						 echo"$ant_01";
					}
	}
	?>
    		<!-- <a href="<?php //echo"?HLM=LIST_DETAIL_DAFTAR&IDDKT=$vrjj_01[DokterKode]&NO=$ant_01&RM=$vrjj_01[PasienNomorRM]&REG=$vrjj_01[JalanNoReg]&OKE_PRD=OKE_PRD";?>" class="btn btn-success btn-sm"><i class="fa fa-send-o"></i>&nbsp;Setujui, Jika data benar (Tombol Test)</a> -->
        </td>
        </tr>
        <tr>
          <td>
		  <div style="overflow:auto;width:auto;height:400px;padding:10px;border:1px solid #eee">
		  <table width="100%" border="1" rules="all">
            <tr align="center" bgcolor="#9DDFFF" class="info">
			<td>#</td>
              <td width="17%">RM</td>
              <td width="37%">NAMA</td>
              <td width="10%">NO</td>
              <td width="36%">USER</td>
            </tr>
			<?php 
				$vdc_02 = $ms_q("SELECT TOP 500 PasienNama,PasienNomorRM,JalanNoUrut,UserID1,JalanNoUrut FROM TRawatJalan where DokterKode = '$IDDKT' AND JalanRMTanggal between '$vrjj_con[tgl_rj]' and '$vrjj_con[tgl_rj] 23:59' AND NOT JalanStatus='9' and WaktuPesan = '$WAKTU' AND JalanNoUrut > 0 order by TanggalPesan desc");
					$no_tb = 1;
					$hit_vdc_02 = $ms_nr($vdc_02);
					//echo"$hit_vdc_02";
					while($vdcc_02 = $ms_fas($vdc_02)){
			?>
			
            <tr align="center">
			<td><?php echo"$no_tb"; ?></td>
              <td><?php echo"$vdcc_02[PasienNomorRM]"; ?></td>
              <td align="left"><?php echo"$vdcc_02[PasienNama]"; ?></td>
              <td><?php echo"$vdcc_02[JalanNoUrut]"; ?></td>
              <td align="right"><?php echo"$vdcc_02[UserID1]"; ?></td>
            </tr>
			<?php $no_tb++; } ?>
          </table> 
		 </div>
</td>
          <td>
		    <?php
			/*
				$vrj_01_02 =  $ms_q("$call_sel TRawatJalan  where AtKd='$vjdll[AtKd]' AND DokterKode='$IDDKT' AND JalanRMTanggal between '$vrjj_con[tgl_rj]' and '$vrjj_con[tgl_rj] 23:59' and WaktuPesan = '$WAKTU'");
				$vrjj_01_02_jum = $ms_nr($vrj_01_02);
				echo"$vrjj_01_02_jum";
				*/
				//echo"<i>//$vjdll[Kuota] Pasien</i><br>";
				//echo"<i>Selanjutnya $hit_zero</i><br>";
					echo"//$vjdll[Kuota] Pasien</i><br>";
					
				if($vdcc['JalanNoUrut'] > 98){
								$hit_vdc_a = $vdcc['JalanNoUrut'] + 2;
									$hit_zero_a = sprintf("%02d", $hit_vdc_a);
									//echo"<b>Antrian $hit_zero_a</b>";
								}elseif($vdcc['JalanNoUrut'] < 98){
								$hit_vdc_a = $vdcc['JalanNoUrut'] + 1;
								$hit_zero_a = sprintf("%02d", $hit_vdc_a);
								
									//echo"<b>Antrian $hit_zero_a</b>";
								}
				if(empty($vjdll['Kuota'])){
				?>
				<div class="input-group">
          <div class="input-group-addon">Nomor antrian berikutnya</div>
		
		 <input type="text" name="no" readonly value="<?php echo"$hit_zero"; ?>" class="form-control">
		</div>
				
				<?php } else{ 
						//echo"ADA";
					if($hit_vdc >= $vjdll['Kuota']){ echo"<font color=red><b>Pasien Sudah Penuh</b></font>";}else{ ?>
					<div class="input-group">
          <div class="input-group-addon">Nomor antrian berikutnya</div>
		
		 <input type="text" name="no" readonly value="<?php echo"$hit_zero"; ?>" class="form-control">
		</div>
		<?php } ?>
		 <?php } ?>
		 <br>
		 	UPDATE TANGGAL &nbsp <input type="date" name="tgl"  class="form-control" style="max-width:30rem; "><button name="upd_tgl" class="btn btn-warning btn-sm"><i class="fa fa-sign-in"></i>&nbsp;Update Tanggal</button><br><br>
			UPDATE NO ANTRIAN &nbsp; <input type="number" name="no_a"  class="form-control" value="<?php echo"$vrjj_01[JalanNoUrut]"; ?>" style="max-width:30rem; "><button name="upd_a" class="btn btn-warning btn-sm"><i class="fa fa-sign-in"></i>&nbsp;Update Antrian</button>
		<br><br>
        
        <center><a href="<?php echo"?HLM=KIRIM_NOTIF_01&RM=$RM&REG=$REG&EML=$vpss[PasienEmail]"; ?>" target="_blank" class="btn btn-danger"><i class="fa fa-comment-o"></i>&nbsp;Kirim Notifikasi</a></center>
		
		<?php
			$FNS = @trim($_GET['FNS']);
				if(isset($_GET['FNS'])){
				?>
				<a href="<?php echo"#"; ?>" class="btn btn-info btn-sm"><i class="fa fa-wheelchair"></i>&nbsp;Detail Lengkap Data Pasien</a>
				<?php } ?>
		  </td>
        </tr>
        <tr>
          <td height="37">
		   <div class="input-group">
          <div class="input-group-addon">Nomor Reg</div>
	 		<input type="text" name="noreg"  class="form-control" readonly value="<?php echo"$REG"; ?>" required>
	  </div>
	  <br>
		  <div class="input-group">
          <div class="input-group-addon">Nomor RM</div>
	 		<input type="text" name="rm" readonly class="form-control" value="<?php echo"$vrjj_01[PasienNomorRM]"; ?>" required>
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
      <!-- Batas JKN -->
		  
		  
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
	 		<input type="text" name="tgl_lahir" readonly  class="form-control" value="<?php echo"$vpss[PasienTglLahir]"; ?>" required>
	  </div>
	   <br>
	     <div class="input-group">
          <div class="input-group-addon">Umur</div>
	 		<input type="text" name="umur" readonly  class="form-control" value="<?php echo"$hit_sub"; ?>" required>
	  </div>
	  <br>
	   <textarea class="form-control" readonly name="al"><?php echo"$vpss[PasienAlamat]"; ?></textarea>
		 <input type="text" name="al2" readonly  class="form-control" value="<?php echo"$vpss[PasienKelurahan]"; ?>" required>
		 <input type="text" name="al3" readonly  class="form-control" value="<?php echo"$vpss[PasienKecamatan]"; ?>" required>
		  <input type="text" name="al4" readonly  class="form-control" value="<?php echo"$vpss[PasienKota]"; ?>" required>
		   <input type="text" name="al5" readonly  class="form-control" value="<?php echo"$vpss[PasienProv]"; ?>" required>
		   <?php
		   	if($vrjj_01['AppJenisDaftar']==2){
		   ?> 
		  <center> <h4><font color="#007D00"><b>Telah Terverifikasi</b></font></h4>
		    <a href="<?php echo"layout/CTK_LAMPIRAN.php?IDDKT=$IDDKT&REG=$REG&RM=$RM#$REG"; ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i>&nbsp;Cetak Data Pendaftar</a>
			 <a href="<?php echo"layout/CTK_LAMPIRAN_02.php?IDDKT=$IDDKT&REG=$REG&RM=$RM#$REG"; ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i>&nbsp;Cetak Lampiran Pendaftar</a>
			 <br><br>
			 <a href="<?php echo"layout/CTK_RESUME.php?IDDKT=$IDDKT&REG=$REG&RM=$RM#$REG"; ?>" class="btn btn-warning btn-sm" target="_blank"><i class="fa fa-print"></i>&nbsp;Cetak Resume</a> &nbsp
			 <a href="<?php echo"layout/CTK_RESEP.php?IDDKT=$IDDKT&REG=$REG&RM=$RM#$REG"; ?>" class="btn btn-warning btn-sm" target="_blank"><i class="fa fa-print"></i>&nbsp;Cetak Resep</a>
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
		
				 
                 <div style="max-width:25rem;" class="alert alert-dismissible alert-info">
                 	<h4><b>Nomor Rujukan</b><br><?PHP echo"$vrjj_01[JalanNoRujukan]"; ?></h4>
                    <h4><b>Nomor JKN</b><br><?PHP echo"$vpss[PasienNoKartuJamin]"; ?></h4>
                 </div>
                 		<?php
							if($vrjj_01['PrshKode']=="1-0113"){
						?>
                 		<?php   include"API/BPJS_API_RUJUKAN_VIEW_ADMIN.php"; ?>
                        <br>
						<?php echo"<b>Tanggal terahir melakukan pemeriksaan </b> $vrjj_con03[tgl_rj02]";  ?>
                        <br>
						<?php echo"<b>pemeriksaan Berikutnya</b> &nbsp; <i>$vrjj_con_02[tgl_rjj] $vjdll[KetJam]</i>"; ?>
						<?php } ?>
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
					echo "<td><img src=../FL/$vgbrr_02[gambar] class=img-thumbnail></td>";
						echo"</tr>";
					}elseif($vgbrr_02['GambarStatus']==2){
						echo" <tr class=success>";
					echo "<td>Surat Rujukan <a href=layout/CTK_LAMPIRAN_03.php?IDDKT=$IDDKT&REG=$REG&RM=$RM&IDG=$vgbrr_02[gambar] target=_blank>#Cetak Berkas</a></td>";
						echo"</tr>";
						echo" <tr>";
					echo "<td><img src=../FL/$vgbrr_02[gambar] class=img-thumbnail></td>";
						echo"</tr>";
					}elseif($vgbrr_02['GambarStatus']==3){
						echo" <tr class=success>";
					echo "<td>Surat kontrol / Kronologi <a href=layout/CTK_LAMPIRAN_03.php?IDDKT=$IDDKT&REG=$REG&RM=$RM&IDG=$vgbrr_02[gambar] target=_blank>#Cetak Berkas</a></td>";
					echo"</tr>";
					echo" <tr>";
					echo "<td><img src=../FL/$vgbrr_02[gambar] class=img-thumbnail></td>";
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
		  <a href="<?php echo"?HLM=LIST_DETAIL_DAFTAR&IDDKT=$vrjj_01[DokterKode]&NO=$ant_01&RM=$vrjj_01[PasienNomorRM]&REG=$vrjj_01[JalanNoReg]&OKE_PRD=OKE_PRD";?>" class="btn btn-success"><i class="fa fa-send-o"></i>&nbsp;Setujui, Jika data benar</a>
		  <?php }elseif($vrjj_01['PrshKode']=="1-0113"){ ?>
		    <a href="<?php echo"?HLM=LIST_DETAIL_DAFTAR&IDDKT=$vrjj_01[DokterKode]&NO=$ant_01&RM=$vrjj_01[PasienNomorRM]&REG=$vrjj_01[JalanNoReg]&JAM=$vjdll[KetJam]&&OKE=OKE";?>" class="btn btn-success"><i class="fa fa-send-o"></i>&nbsp;Setujui, Jika data benar</a>
			<?php }else{ ?>
			  <a href="<?php echo"?HLM=LIST_DETAIL_DAFTAR&IDDKT=$vrjj_01[DokterKode]&NO=$hit_zero&RM=$vrjj_01[PasienNomorRM]&REG=$vrjj_01[JalanNoReg]&OKE_PDF=OKE_PDF";?>" class="btn btn-success"><i class="fa fa-send-o"></i>&nbsp;Setujui, Jika data benar</a>
			  <?php } ?>
			  <!-- Untuk ACC -->
		  <a href="<?php echo"?HLM=LIST_DETAIL_DAFTAR&IDDKT=$vrjj_01[DokterKode]&NO=$hit_zero&RM=$vrjj_01[PasienNomorRM]&REG=$vrjj_01[JalanNoReg]&BTL=BTL";?>" class="btn btn-danger" onClick="return konfirmasi()"><i class="fa fa-send-o"></i>&nbsp;Tolak / Batalkan</a>
		  <?php } ?>
		  <!-- REvisi -->
		  <br> <br>
		  
		    <a href="<?php echo"?HLM=LIST_DETAIL_DAFTAR&IDDKT=$vrjj_01[DokterKode]&NO=$hit_zero&RM=$vrjj_01[PasienNomorRM]&REG=$vrjj_01[JalanNoReg]&BTL=BTL&TEST=$ant_01";?>" class="btn btn-danger" onClick="return konfirmasi()"><i class="fa fa-send-o"></i>&nbsp; Batalkan *Revisi</a>
		  </td>
          <td> <?php 
		  	if($vrjj_01['AppJenisDaftar']=='2'){
			}elseif($vrjj_01['AppJenisDaftar']=='3'){
		  ?>
		  <a href="<?php echo"?HLM=LIST_DETAIL_DAFTAR&IDDKT=$vrjj_01[DokterKode]&NO=$hit_zero&RM=$vrjj_01[PasienNomorRM]&REG=$vrjj_01[JalanNoReg]&OKE_PDF=OKE_PDF";?>" class="btn btn-warning btn-sm disabled"><i class="fa fa-send-o"></i>&nbsp;Setujui, Jika data terlampir berkas tertentu</a>
		  &nbsp; 
		   
		<br>*<i>Tombol setujui data terlampir</i> digunakan untuk <i>Approval</i> Pasien yang diwajibkan menuju pendaftaran sebelum ke poli
		 <?php } ?>
		 <br>
		  <a href="<?php echo"../DAFTAR/UPLOAD_BERKAS.php?IDDKT=$IDDKT&RM=RM&REG=$REG#DSKK";?>" class="btn btn-info btn-sm" target="_blank"><i class="fa fa-cubes"></i>&nbsp;Lengkapi Berkas</a>
		 </td>
        </tr>
      </table>
	 
	</form>
	</div>
</body>
