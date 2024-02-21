<body>
	<?php 
			$IDDKT = @$_GET['IDDKT'];
			$RM = @$_GET['RM'];
			$NO = @$_GET['NO'];
			$REG = @$_GET['REG'];
			$OKE = @$_GET['OKE'];
			$WAKTU = @$_GET['WAKTU'];
			$NOURUT = @$_GET['NOURUT'];
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
				$vicd = $ms_q("$sl ICDKode,ICDNama from TICD where ICDKode='$vrjj_01[JalanDiagKode1]'");
					$vicdd = $ms_fas($vicd); 
					$vrj_con= $ms_q("select CONVERT(varchar(10),[JalanRMTanggal],101) as tgl_rj from TRawatJalan where JalanNoReg='$REG'");
					$vrjj_con = $ms_fas($vrj_con);
					$hit_vrj = $vrjj['NomorAkhir'] + 1;
					$hit_zero = sprintf("%04d", $hit_vrj);
					$sub_01= substr($vpss['PasienTglLahir'],-4);
					$hit_sub = $years_big - $sub_01;
					$dt = "$date_html5 $time_html5";
				$vdc = $ms_q("SELECT TOP 1 JalanNoUrut 
FROM TRawatJalan
where DokterKode = '$IDDKT' AND JalanRMTanggal between '$vrjj_con[tgl_rj]' and '$vrjj_con[tgl_rj] 23:59'
      and WaktuPesan = '$WAKTU'
 order by JalanNoUrut desc");
					$vdcc = $ms_fas($vdc);
					$hit_vdc = $vdcc['JalanNoUrut'] + 1;
					$hit_zero = sprintf("%02d", $hit_vdc);
					
				if(isset($_GET['OKE'])){
					$ms_q("UPDATE TRawatJalan set JalanNoUrut='$NO',AppJenisDaftar='2' where JalanNoReg='$REG'");
					header("location:?HLM=LIST_DAFTAR_TODAY");}
					 
					if(isset($_GET['NOURUT'])){
					$ms_q("UPDATE TRawatJalan set JalanNoUrut='$NOURUT',AppJenisDaftar='2' where JalanNoReg='$REG'");
					header("location:?HLM=LIST_DAFTAR_TODAY");}
					
					if(isset($_POST['up'])){
						$kd = @$_POST['kd'];
							$ms_q("$up TRawatJalan set DokterKode='$kd',ket='Ganti Dokter' where JalanNoReg='$REG'");
							header("location:?HLM=DETAIL_RIWAYAT_RAWAT&IDDKT=$kd&RM=$RM&REG=$REG&FNS=FNS#LENGKAP");
					}
					?>
	<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo"?HLM=RIWAYAT_RAWAT&RM=$RM"; ?>">Pendaftar</a></li>
  <li class="breadcrumb-item"><?php echo"#$RM &nbsp;";  echo $vrjj_con['tgl_rj']; ?></li>
</ol>
	<form method="post" action="">
	  <table width="100%" border="0" class="table table-bordered">
    <tr>
      <td><b>#Data RS</b></td>
      <td><b>#Riwayat Periksa</b></td>
    </tr>
    <tr>
          <td width="46%">
		  <div class="input-group">
          <div class="input-group-addon">Dokter</div>
	 		<select name="kd" class="form-control" required>
            <option value="">Pilih Dokter...</option>
            <?php
		  $vdkt =  $ms_q("$sl PelakuKode,PelakuNama,PelakuStatus,UnitKode from TPelaku where PelakuStatus='A' order by PelakuNama asc");
				while($vdktt = $ms_fas($vdkt)){
					$vpl = $ms_q("$sl UnitKode,UnitNama from TUnit where UnitKode='$vdktt[UnitKode]'");
				$vpll = $ms_fas($vpl);
						if($vdktt['PelakuKode']==$IDDKT){
					echo"<option value=$vdktt[PelakuKode] selected>$vdktt[PelakuNama] //$vpll[UnitNama]</option>";
					}else{
					echo"<option value=$vdktt[PelakuKode]>$vdktt[PelakuNama] //$vpll[UnitNama]</option>";
					}
				}?>
          </select>
	  </div>
	  <br>
	  <div class="input-group">
          <div class="input-group-addon">Poli</div>
	 		<input type="text" name="poli" readonly="" class="form-control" value="<?php echo"$vpll[UnitNama]"; ?>">
	  </div>
	  </td>
          <td width="54%">
		 <label>Hari Praktik Dokter</label><br>
     <?php
		  $vjdl = $ms_q("$call_sel JadwalDokter where DokterKode='$vdktt[PelakuKode]'");
					while($vjdll = $ms_fas($vjdl)){
					echo"$vjdll[KetHari] $vjdll[KetJam] <br>"; }
					 ?>
		      <?php 
					echo"<b>Periksa <i>$vrjj_01[JalanRMTanggal]</i></b><br>";
					echo"No Urut <b><i>$vrjj_01[JalanNoUrut]</i></b><br>";
					echo"Penanggung Jawab <b><i>$vprr[PrshNama]</i></b>";
			 ?> 
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
	  </td>
          <td>
		<label>#Berkas</label> <br>
		  <?php
		  $vgbr_02 =  $ms_q("$sl gambar,nama from TBGambar where JalanNoReg='$REG'");
							while($vgbrr_02 = $ms_fas($vgbr_02)){
				?>
					<a href="<?php echo"../FL/$vgbrr_02[gambar]"; ?>" target="_blank" class="btn btn-danger btn-sm" /><?php echo"$vgbrr_02[nama]"; ?></a>
			<?php } ?>
					 </td>
        </tr>
        <tr>
          <td height="21"><b>#Data Diri</b></td>
          <td><b>#ICD</b></td>
        </tr>
        <tr>
          <td height="37">
		    <div class="input-group">
          <div class="input-group-addon">Nama</div>
	 		<input type="text" name="nama" readonly=""  class="form-control" value="<?php echo"$vpss[PasienNama]"; ?>" required>
	  </div>
	  <br>
	     <div class="input-group">
          <div class="input-group-addon">Telepon</div>
	 		<input type="text" name="tlp" readonly="" class="form-control" value="<?php echo"$vpss[PasienTelp]"; ?>" required>
	  </div>
	   <br>
	     <div class="input-group">
          <div class="input-group-addon">Tanggal Lahir</div>
	 		<input type="text" name="tlp" readonly=""  class="form-control" value="<?php echo"$vpss[PasienTglLahir]"; ?>" required>
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
		   	if($vrjj_01['JalanCaraDaftar']==4){
		   ?>
		   <h4><b>#Cara Daftar<font color="#007D00"><center> ONLINE</center></font></b></h4>
		   <?php }else{ ?>
		   <h4><b>#Cara Daftar<font color="#FF4646"><center>OFFLINE</b></center></font></h4>
		   <?php }?>
		   <br>
		   <button class="btn btn-success" name="up">Update Data</button>
		  </td>
		  <td>
		  <?php echo"$vicdd[ICDKode]-$vicdd[ICDNama]"; ?>
		  </td>
        </tr>
       
          <td height="37">&nbsp;
		
		  </td>
          <td>&nbsp;</td>
        </tr>
      </table>
	  
	</form>
	</div>
</body>
