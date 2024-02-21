	<?php
		$IDJDW = $sql_slash($_GET['IDJDW']);
			$vjdl = $ms_q("$call_sel  JadwalDokter where AtKd='$IDJDW'");
					$vjdll = $ms_fas($vjdl);
	?>
<body>
	<ol class="breadcrumb">
  <li class="breadcrumb-item"><i class="fa fa-child"></i>&nbsp;Dokter</li>
  <li class="breadcrumb-item">Entri Jadwal Dokter</li>
</ol>
<br>

<form name="form1" method="post" action="">
  <table width="100%" border="0" class="table table-bordered">
    <tr>
      <td colspan="2">
        <div class="input-group">
          <div class="input-group-addon">Dokter</div>
          <select name="kd" class="form-control" required>
            <option value="">Pilih Dokter...</option>
            <?php
		  $vdkt =  $ms_q("$sl PelakuKode,PelakuNama,PelakuStatus,UnitKode from TPelaku where PelakuStatus='A' order by PelakuNama asc");
				while($vdktt = $ms_fas($vdkt)){
					$vpl = $ms_q("$sl UnitKode,UnitNama from TUnit where UnitKode='$vdktt[UnitKode]'");
				$vpll = $ms_fas($vpl);
						if($vdktt['PelakuKode']==$vjdll['DokterKode']){
					echo"<option value=$vdktt[PelakuKode] selected>$vdktt[PelakuNama] //$vpll[UnitNama]</option>";
					}
				}?>
          </select>
      </div></td>
      <td width="27%" rowspan="5">
	  	<?php
			if(isset($_POST['simpan'])){
				$kd = @trim($_POST['kd']);
				$hari = @trim(ucwords($_POST['hari']));
				$hariurut = @trim(ucwords($_POST['hariurut']));
				$kdjam = @trim($_POST['kdjam']);
				$kuota = @trim($_POST['kuota']);
				$kuotaBPJS = @trim($_POST['kuotaBPJS']);
				$jam = @trim(ucwords($_POST['jam']));
				$jam2 = @trim($_POST['jam2']);
					$hit_jam = "$jam-$jam2";
							$ms_q("$up JadwalDokter set KetHari='$hari',KetJam='$jam',shift='$kdjam',Kuota='$kuota',KuotaBPJS='$kuotaBPJS',HariUrut='$hariurut' where AtKd='$IDJDW'");
							header("location:?HLM=DAFTAR_DETAIL_DOKTER&IDDKT=$vjdll[DokterKode]#SUCCESS");
							?>
							<!--
							<div class="alert alert-dismissible alert-success">
  			<button type="button" class="close" data-dismiss="alert">&times;</button>
  				<strong>Great..</strong> Data Berhasil Dimasukan </div>
				-->
						<?php }
							$IDDEL = @$_GET['IDDEL'];
							$IDDKT = @$_GET['IDDKT'];
								if(isset($_GET['IDDEL'])){
									$ms_q("$dl FROM JadwalDokter where AtKd='$IDDEL'");
									header("location:?HLM=DAFTAR_DETAIL_DOKTER&IDDKT=$IDDKT#SUCCESS");
								}							
						
						?>
		</td>
    </tr>
    <tr>
      <td>
        <div class="input-group">
          <div class="input-group-addon">Hari</div>
          <input type="text" name="hari" class="form-control" value="<?php echo"$vjdll[KetHari]"; ?>" required>
      </div></td>
      <td><span class="input-group">
      <input type="text" name="kdjam" class="form-control" value="<?php echo"$vjdll[shift]"; ?>" required>
	  <br> *(P = PAGI S = Siang  M = Lainya

        </select>
      </span></td>
    </tr>
    <tr>
      <td width="34%">Jam<input type="text" name="jam" class="form-control" value="<?php echo"$vjdll[KetJam]"; ?>" required><br>*( u/ Entry Jam Jangan Menggunakan Spasi </td>
      <td width="39%">Kuota Umum<br><input type="hidden" name="jam2" class="form-control" required> <input type="text" name="kuota" value="<?php echo"$vjdll[Kuota]"; ?>" placeholder="Kuota Pasien.." class="form-control"></td>
    </tr>
    <tr>
      <td align="left">Kuota BPJS<br><input type="hidden" name="jam2" class="form-control" required> <input type="text" name="kuotaBPJS" value="<?php echo"$vjdll[KuotaBPJS]"; ?>" placeholder="Kuota Pasien.." class="form-control"></td>
      <td align="left">
			<select name="hariurut" class="form-control">
			<option value="">Urutan hari</option>
			<?PHP 
				$no_hari = 1;
					while($no_hari <= 7 ){
						if($vjdll['HariUrut']==$no_hari){
						echo"<option value=$no_hari selected>$no_hari</option>";
						
						}else{
							echo"<option value=$no_hari>$no_hari</option>";
						}
					$no_hari++; }
			?>
			</select>

	  </td>
    </tr>
    <tr>
      <td colspan="2" align="left">
	  <button class="btn btn-success" name="simpan"><i class="fa fa-pencil"></i>&nbsp;Simpan Data</button>&nbsp;
	  <a href="<?php echo"?HLM=EDIT_JADWAL_DOKTER&IDDEL=$vjdll[AtKd]&IDDKT=$IDDKT##";  ?>" class="btn btn-danger" onClick="return konfirmasi()"><i class="fa fa-ban"></i>&nbsp;Hapus Jadwal</a>
	  </td>
    </tr>
  </table>
</form>
</body>