			<?php
				$IDDKT = @trim($_GET['IDDKT']);
				  $vdkt =  $ms_q("$sl PelakuKode,PelakuNama,PelakuAlamat,PelakuTelepon,PelakuStatus,UnitKode from TPelaku where  PelakuKode='$IDDKT' order by PelakuNama asc");
				$vdktt = $ms_fas($vdkt);
				$vpl = $ms_q("$sl UnitKode,UnitNama FROM  TUnit where UnitKode='$vdktt[UnitKode]'");
						$vpll = $ms_fas($vpl);
					//str_replcae
			$teksawal = "$vpll[UnitNama]";
 			$txt_01 = str_replace("Klinik Sp.", "", $teksawal);
					
					//UPDATE STATUS Dokter
						if(isset($_GET['EDITDOKTER'])){
								$save = $ms_q("$up TPelaku set PelakuStatus='N' WHERE PelakuKode='$IDDKT'");
							header("location:?HLM=DAFTAR_DETAIL_DOKTER&IDDKT=$IDDKT");
						}
						
							if(isset($_GET['EDITDOKTER_02'])){
								$save = $ms_q("$up TPelaku set PelakuStatus='A' WHERE PelakuKode='$IDDKT'");
							header("location:?HLM=DAFTAR_DETAIL_DOKTER&IDDKT=$IDDKT");
						}
			?>
	<ol class="breadcrumb">
  <li class="breadcrumb-item"><i class="fa fa-child"></i>&nbsp;Dokter</li>
  <li class="breadcrumb-item">Entri Jadwal Dokter</li>
</ol>
<br>

<form name="form1" method="post" action="">
<h4>FORM SUNTING DOKTER</h4>
  <table width="100%" border="0" class="table table-bordered">
    <tr>
      <td>
        <div class="input-group">
          <div class="input-group-addon">Kode</div>
          <input type="text" class="form-control" value="<?php echo"$IDDKT"; ?>" readonly="">
      </div></td>
      <td><div class="input-group">
          <div class="input-group-addon">Dokter</div>
       <input type="text" class="form-control" value="<?php echo"$vdktt[PelakuNama]"; ?>" readonly="">
      <td width="46%" rowspan="4">
	  <div class="input-group">
        		  <div class="input-group-addon">Hari & Jam Praktik</div>
				
		  	<?php
					$vjdl = $ms_q("$call_sel  JadwalDokter where DokterKode='$vdktt[PelakuKode]'");
					while($vjdll = $ms_fas($vjdl)){
								echo"<ul><li><a href=?HLM=EDIT_JADWAL_DOKTER&IDJDW=$vjdll[AtKd]>$vjdll[KetHari] $vjdll[KetJam] </a> //$vjdll[Kuota]</li></ul> ";
							}
			?>
		 
	    </div>
      </td>
    </tr>
    <tr>
      <td><?php echo"Poli $txt_01"; ?></td>
      <td><?php echo"$vdktt[PelakuAlamat]"; ?></td>
    </tr>
    <tr>
      <td width="21%"><?php echo"$vdktt[PelakuTelepon]"; ?></td>
      <td width="33%">&nbsp</td>
    </tr>
    <tr>
      <td colspan="2" align="left">	
	  <?php
		if($vdktt['PelakuStatus']=='A'){?>
		<a href="<?php echo"?HLM=DAFTAR_DETAIL_DOKTER&IDDKT=$IDDKT&EDITDOKTER=EDITDOKTER##"; ?>" class="btn btn-danger">Non Aktifkan Dokter</a>  
		<?php }else{ ?>
		<a href="<?php echo"?HLM=DAFTAR_DETAIL_DOKTER&IDDKT=$IDDKT&EDITDOKTER_02=EDITDOKTER_02##"; ?>" class="btn btn-success">Aktifkan Dokter</a>  
		<?php } ?>
			
	  </td>
    </tr>
  </table>
  <br>
  <h4>Daftar Penanganan pasien</h4>

  <table width="100%" border="0" class="table" style="max-width:40rem; ">
    <tr>
      <td> <input type="date" class="form-control" name="tgl"></td>
      <td><button name="go" class="btn btn-info"><i class="fa fa-sign-in"></i>&nbsp;Cari</button></td>
    </tr>
  </table>
  	<?php
			if(isset($_POST['go'])){
			$tgl = @trim($_POST['tgl']);
	?>
  <table width="100%" class="table table-bordered">
    <tr class="warning">
	<td width="3%" height="24">#</td>
      <td width="34%">#RM/Nama/Alamat</td>
      <td width="55%">#Tanggal Periksa/Pesan </td>
      <td width="8%">###</td>
    </tr>
	<?php
	$vps = @$ms_q("$sl TOP 100 JalanNoReg,PasienNomorRM,PasienNama,PasienAlamat,TanggalPesan,DokterKode,JalanCaraDaftar,JalanRMTanggal,JalanNoUrut  FROM TRawatJalan where DokterKode='$IDDKT' AND JalanRMTanggal BETWEEN '$tgl' AND '$tgl 23:59' AND NOT JalanStatus='9' order by TanggalPesan desc");
	$no = 1;
					while($vpss = $ms_fas($vps)){
				$vrj_kon= $ms_q("select CONVERT(varchar(10),[JalanRMTanggal],103) as tgl_rj from TRawatJalan where JalanNoReg='$vpss[JalanNoReg]'");
					$vrjj_kon = $ms_fas($vrj_kon);
					$vrj_kon_02= $ms_q("select CONVERT(varchar(10),[TanggalPesan],103) as tgl_rjj from TRawatJalan where JalanNoReg='$vpss[JalanNoReg]'");
					$vrjj_kon_02 = $ms_fas($vrj_kon_02);
	?>
    <tr>
	<td><?php echo"$no"; ?></td>
      <td><?php echo"$vpss[PasienNomorRM] <br>$vpss[PasienNama]<br>$vpss[PasienAlamat]"; ?>
		<br>
		<a href="<?PHP echo"?HLM=DAFTAR_DETAIL_DOKTER&IDDKT=$IDDKT&IDREG01=$vpss[JalanNoReg]&BTLPDF=BTLPDF"; ?>" class="btn btn-danger btn-sm">BatalKan</a>
	</td>
      <td>
	  <?php echo"PR $vrjj_kon[tgl_rj]<br>PS $vrjj_kon_02[tgl_rjj]"; ?>
	  <br>
	   <?php
		   	if($vpss['JalanCaraDaftar']==4){
		   ?>
		  <b><font color="#009900">ONLINE</font></b>
		   <?php }else{ ?>
		  <b>OFFLINE</b>
		   <?php }?>
	  </td>
      <td width="8%" align="center"><?php echo"<h3><b>$vpss[JalanNoUrut]</b></h3>"; ?></td>
    </tr>
	<?php $no++; } ?>
  </table>
  <?php } ?>
</form>
<?PHP 
		$IDREG01 =  @$_GET['IDREG01'];
		if(isset($_GET['BTLPDF'])){
			$ms_q("$up TRawatJalan set JalanStatus='9' WHERE JalanNoReg='$IDREG01' ");
			header("LOCATION:?HLM=DAFTAR_DETAIL_DOKTER&IDDKT=$IDDKT");
		}
?>