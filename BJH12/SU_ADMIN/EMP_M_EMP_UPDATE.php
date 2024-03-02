<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
	<?php
		$IDEMP = @$sql_slash($_GET['IDEMP']);
    $IDEMP02 = @$sql_slash($_GET['IDEMP02']);
    #DATA KARYAWAN
					$vem = $ms_q("$call_sel  TKaryawan WHERE KaryNomor='$IDEMP'");
									$vemm = $ms_fas($vem);
                  #TGL LAHIR KARYAWAN
										$tglahir_vem = $ms_q("$sl CONVERT(varchar(10),[KaryTglLahir],103) as tglahir FROM TKaryawan WHERE KaryNomor='$IDEMP'");
											$tglahir_vemm = $ms_fas($tglahir_vem);
			  if(isset($_POST['simpan'])){
				$nik = @$sql_slash($_POST['nik']);
				$nama = @$sql_slash($_POST['nama']);
				$bagian = @$sql_slash($_POST['bagian']);
        $bagian01 = @$sql_slash($_POST['bagian01']);
        $bagian02 = @$sql_slash($_POST['bagian02']);
        $txt_dep = @$sql_slash($_POST['txt_dep']);
				$alamat = @$sql_slash($_POST['alamat']);
				$kota = @$sql_slash($_POST['kota']);
				$gol = @$sql_slash($_POST['gol']);
				$no_dapen = @$sql_slash($_POST['no_dapen']);
				$no_ktp = @$sql_slash($_POST['no_ktp']);
				$no_tlp = @$sql_slash($_POST['no_tlp']);
				$email = @$sql_slash($_POST['email']);
				$no_manu = @$sql_slash($_POST['no_manu']);
				$no_bpjs = @$sql_slash($_POST['no_bpjs']);
				$no_jamsostek = @$sql_slash($_POST['no_jamsostek']);
				$provinsi = @$sql_slash($_POST['provinsi']);
				$npwp = @$sql_slash($_POST['npwp']);
				$tlahir  = @$sql_slash($_POST['tlahir']);
				$tgllahir  = @$sql_slash($_POST['tgllahir']);
				$save = $ms_q("$up TKaryawan set KaryNomorYakkum='$nik',KaryNama='$nama',UnitKode='$bagian',KaryAlamat='$alamat',KaryTmpLahir='$tlahir',KaryNoKTP='$no_ktp',KaryTelepon='$no_tlp',KaryEmail='$email',KaryKota='$kota',KaryNPWP='$npwp',KaryPangkat='$gol',KaryYDPNo='$no_dapen',KaryManulifeNo='$no_manu',KaryNoBPJS='$no_bpjs',KaryNoJAMSOSTEK='$no_jamsostek',KaryTglLahir='$tgllahir',KaryDir='$txt_dep',UnitKode01='$bagian01',UnitKode02='' WHERE KaryNomor='$IDEMP'");
	if ($save) { echo "<META HTTP-EQUIV=Refresh Content=2; URL=?HLM=EMP_M&SUB=EMP_M_EMP>";  ?>
						<div class="alert alert-dismissible alert-success">
							 <strong>Well done!</strong> You successfully save...
						</div>
						<?php }else{ ?>
						<div class="alert alert-dismissible alert-danger">
							 <strong>Ula laaa!</strong> Save is Failed
						</div>
	<?php }} ?>
    
<form name="form1" method="post" action="">
  <table width="100%" border="0" style="max-width:90rem;" class="table table-bordered table-striped">
    <tr class="table-primary">
      <td colspan="3"><h6>-Update Employee-</h6></td>
    </tr>
    <tr>
      <td width="58%"><b>NIK Lama</b> <input type="text" style="max-width:25rem;" readonly class="form-control" required name="##" value="<?php echo"$vemm[KaryNomor]"; ?>"></td>
      <td colspan="2"><b>Name</b> <input type="text" style="max-width:25rem;" value="<?php echo"$vemm[KaryNama]"; ?>" class="form-control" required name="nama"></td>
    </tr>
    <tr>
      <td><b>NIK Baru</b> <input type="text" style="max-width:25rem;"  class="form-control" required name="nik" value="<?php echo"$vemm[KaryNomorYakkum]"; ?>"></td>
      <td width="21%"><b>Tempat Lahir</b>
      <input type="text" style="max-width:20rem;"  class="form-control" required name="tlahir" value="<?php echo"$vemm[KaryTmpLahir]"; ?>"></td>
      <td width="21%">Tanggal Lahir: <b><?php echo"$vemm[KaryTglLahir]"; ?> </b>
     
      <input type="date" style="max-width:20rem;"  class="form-control"  name="tgllahir">
     
      </td>
    </tr>
    <tr>
      <!-- <td><b>Deputy</b> <input type="text" style="max-width:25rem;" class="form-control" name="npwp" value="<?php #echo"$vemm[KaryNPWP]"; ?>"> -->
      <td>
      <b>Deputy</b>
              <select name="txt_dep" class="form-control" style="max-width:25rem;">
              <?PHP if($vemm['KaryDir']=="04000671"){ ?>
              <option value="04000671">drg. Kriswidiati, M.Kes</option>
              <option value="04100869">	dr. Santi Kristiani, Sp.PK</option>
              <option value="04110877">dr.Yohanes Mada Suprayogi,Sp.PD.FINASIM	</option>
              <?PHP }elseif($vemm['KaryDir']=="04100869"){ ?>
              <option value="04100869">	dr. Santi Kristiani, Sp.PK</option>
              <option value="04000671">drg. Kriswidiati, M.Kes</option>
              <option value="04110877">dr.Yohanes Mada Suprayogi,Sp.PD.FINASIM	</option>
              <?PHP }elseif($vemm['KaryDir']=="04110877"){ ?>
              <option value="04110877">dr.Yohanes Mada Suprayogi,Sp.PD.FINASIM	</option>
              <option value="04100869">	dr. Santi Kristiani, Sp.PK</option>
              <option value="04000671">drg. Kriswidiati, M.Kes</option>
              <?PHP }else{ ?>
              <option value=""></option>
              <option value="04000671">drg. Kriswidiati, M.Kes</option>
              <option value="04100869">	dr. Santi Kristiani, Sp.PK</option>
              <option value="04110877">dr.Yohanes Mada Suprayogi,Sp.PD.FINASIM	</option>
              <?PHP } ?>
            </select>
    </td>
    <td><b>bagian Utama</b>
        <select name="bagian" class="form-control" style="max-width:25rem;" required>
          <option value="">Bagian</option>
          <?php
					$vunt = $ms_q("$sl UnitKode,UnitNama FROM TUnitPrs order by UnitNama asc ");
								while($vuntt = $ms_fas($vunt)){
									if($vuntt['UnitKode']==$vemm['UnitKode']){
									echo"<option value=$vuntt[UnitKode] selected>$vuntt[UnitNama]</option>";
								}else{
								echo"<option value=$vuntt[UnitKode]>$vuntt[UnitNama]</option>";
								}}
				?>
      </select>
    </td>
    <td><b>bagian Opsional 01</b>
    <select name="bagian01" class="form-control" style="max-width:25rem;">
          <option value="">Bagian</option>
          <?php
					$vunt = $ms_q("$sl UnitKode,UnitNama FROM TUnitPrs order by UnitNama asc ");
								while($vuntt = $ms_fas($vunt)){
									if($vuntt['UnitKode']==$vemm['UnitKode01']){
									echo"<option value=$vuntt[UnitKode] selected>$vuntt[UnitNama]</option>";
								}else{
								echo"<option value=$vuntt[UnitKode]>$vuntt[UnitNama]</option>";
								}}
				?>
      </select>
      <b>bagian Opsional 02</b>
    <select name="bagian02" class="form-control" style="max-width:25rem;">
          <option value="">Bagian</option>
          <?php
					$vunt = $ms_q("$sl UnitKode,UnitNama FROM TUnitPrs order by UnitNama asc ");
								while($vuntt = $ms_fas($vunt)){
									if($vuntt['UnitKode']==$vemm['UnitKode02']){
									echo"<option value=$vuntt[UnitKode] selected>$vuntt[UnitNama]</option>";
								}else{
								echo"<option value=$vuntt[UnitKode]>$vuntt[UnitNama]</option>";
								}}
				?>
      </select>
    </td>
      <!-- <td colspan="2"><b>City</b><input type="text" name="kota" required class="form-control" value="<?php #echo"$vemm[KaryKota]" ?>"></td> -->
    </tr>
    <tr>
      <td><b>NPWP</b> <input type="text" style="max-width:25rem;" class="form-control" name="npwp" value="<?php echo"$vemm[KaryNPWP]"; ?>"></td>
      <td colspan="2">
        <b>City</b><input type="text" name="kota" required class="form-control" value="<?php echo"$vemm[KaryKota]" ?>"> </td>
    </tr>
    <tr>
      <td><b>Golongan</b> <input type="text" style="max-width:25rem;" class="form-control" name="gol" value="<?php echo"$vemm[KaryPangkat]"; ?>"></td>
      <td colspan="2"><b>Address</b> <textarea name="alamat" class="form-control"><?php echo"$vemm[KaryAlamat]"; ?></textarea></td>
    </tr>
    <tr>
      <td><b>Nomor Dapen</b> <input type="text" style="max-width:25rem;" class="form-control" name="no_dapen" value="<?php echo"$vemm[KaryYDPNo]"; ?>"></td>
      <td colspan="2"> <b>Province</b><input type="text" name="provinsi"  class="form-control" value="<?php //echo"$vemm[KaryProvinsi]" ?>">      </td>
    </tr>
    <tr>
      <td><b>Nomor BPJS</b> <input type="text" style="max-width:25rem;" class="form-control" name="no_bpjs" value="<?php echo"$vemm[KaryNoBPJS]"; ?>"></td>
      <td colspan="2" rowspan="4">
        <!-- user E-Pay -->
        <b> Akun E-Pay</b><hr>
        
        <?php 
			$vtbu = $ms_q("$call_sel TBUser WHERE kode='$vemm[KaryNomor]'");
							while($vtbuu = $ms_fas($vtbu)){
		?>
        <div class="alert alert-dismissible alert-info">
          <?php echo"NamaUser <i>$vtbuu[namauser]</i><br>PassUser <i>$vtbuu[password_text]</i><br>"; ?>
          </div>
        
        <?php } ?>
          <?PHP 
              #HR_PERSONNEL TJ_MAIN_DATA
              $sub_nik = substr($IDEMP02,'1');
              //echo $sub_nik;
              $open_tj_vkry01_sw = $ms_q("$sl Per_Code,ep_ip_01 FROM TJ_Main_Data.dbo.HR_Personnel WHERE Per_Code='$sub_nik'");
              $open_tj_vkry01_sww = $ms_fas($open_tj_vkry01_sw);
          ?>
          
        <b>Reset Pematenan APP Presensi</b>
        <br>
        <?PHP if($open_tj_vkry01_sww['ep_ip_01']=="0"){ ?>
          <i>Belum Terkait</i>
          <?PHP }else{ ?>
        <a href="<?PHP echo"?HLM=EMP_M&SUB=EMP_M_EMP_UPDATE&IDEMP=$IDEMP&IDEMP02=$IDEMP02&IDEMPTJ=$sub_nik&UPIPTJ=UPIPTJ"; ?>" class="btn btn-outline-warning btn-sm">RESET</a>
        <?PHP }
              if(isset($_GET['UPIPTJ'])){
                $open_tj_kry01_sw = $ms_q("$up TJ_Main_Data.dbo.HR_Personnel SET ep_ip_01='0' WHERE Per_Code='$sub_nik'");

              if( $open_tj_kry01_sw){
							  header("location:?HLM=EMP_M&SUB=EMP_M_EMP_UPDATE&IDEMP=$IDEMP&IDEMP02=$IDEMP02");
							}else{
							  echo"<b>GAGAL ENTRY</b>";
							 } }
        ?>
            
      </td>
    </tr>
    <tr>
      <td><b>Nomor JAMSOSTEK</b> <input type="text" style="max-width:25rem;" class="form-control" name="no_jamsostek" value="<?php echo"$vemm[KaryNoJAMSOSTEK]"; ?>"></td>
    </tr>
    <tr>
      <td><b>ManuLife</b> <input type="text" style="max-width:25rem;" class="form-control" name="no_manu" value="<?php echo"$vemm[KaryManulifeNo]"; ?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>-</td>
      <td colspan="2" rowspan="2" align="center"><b>Berkas</b><br>
      <br>
      <!-- Button trigger modal -->
      <?php
			$vbrk01_sw = $ms_q("$call_sel tb_berkas WHERE idmain_kary='$vemm[KaryNomor]'");
				while($vbrk01_sww = $ms_fas($vbrk01_sw)){
		?>			
		
        <a href="" data-toggle="modal" data-target="<?php echo"#$vbrk01_sww[idmain_berkas]"; ?>">
        <?php echo"$vbrk01_sww[nama]"; ?>
        <br>
        <img src="<?php echo"../../FL02/$vbrk01_sww[berkas]"; ?>" class="img-rounded" width="200" height="200"><br>
        </a>
        

<!-- Modal -->
<div class="modal fade" id="<?php echo"$vbrk01_sww[idmain_berkas]"; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="<?php echo"../../FL02/$vbrk01_sww[berkas]"; ?>" class="img-responsive" width="500" height="500">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="<?php echo"../../FL02/$vbrk01_sww[berkas]"; ?>" class="btn btn-primary" target="_blank">Ukuran asli</a>
      </div>
    </div>
  </div>
</div>
	<br>
    <a href="<?php echo"?HLM=EMP_M&SUB=EMP_M_EMP_UPDATE&IDEMP=$IDEMP&DELDFB=DELDFB&IDBKS01=$vbrk01_sww[idmain_berkas]"; ?>" onClick="return konfirmasi()" class="btn btn-danger btn-sm">Hapus Berkas</a>
<br><br>
	<?php } ?>
      <hr>
      	
      </td>
    </tr>
    <tr>
      <td><b>No KTP</b> <input type="text" style="max-width:25rem;" class="form-control" name="no_ktp" value="<?php echo"$vemm[KaryNoKTP]"; ?>"></td>
    </tr>
    <tr>
      <td><b>Telepon (Mobile)</b> <input type="text" style="max-width:25rem;" class="form-control" name="no_tlp" value="<?php echo"$vemm[KaryTelepon]"; ?>"></td>
      <td colspan="2">
       <b>LOG</b>
       <br>
      <div style="overflow:auto;width:auto;height:360px;padding:10px;border:1px solid #eee">
    
      	<?php 
			$vlog01_sw = $ms_q("$sl TOP 5  * from tb_log WHERE kode_rls='$vemm[KaryNomor]' order by tgl desc");
				while($vlog01_sww = $ms_fas($vlog01_sw)){
		?>
        	<?php echo"<b>$vlog01_sww[tgl]</b> <br> $vlog01_sww[isi]<hr>"; ?>
        <?php } ?>
        </div>
      <hr></td>
    </tr>
    <tr>
      <td><b>@mail</b> <input type="email" style="max-width:25rem;" class="form-control" name="email" value="<?php echo"$vemm[KaryEmail]"; ?>"></td>
      <td colspan="2"><b>Diklat</b><hr>
      <ol>
      <?php
	  	#$vkary_prt = $ms_q("$sl idmain_kary_part,idmain_kary,idmain_kop FROM tb_kary_part WHERE idmain_kary='$vemm[KaryNomor]'");
		#while($vkary_prtt = $ms_fas($vkary_prt)){
				#$vkop_prt = $ms_q("$sl idmain_kop,kop,ket,tgl_input FROM tb_kop WHERE idmain_kop='$vkary_prtt[idmain_kop]'");
				#$vkop_prtt = $ms_fas($vkop_prt);
			?>
            <li><a href="<?php #echo"?HLM=APP_DUTY_03&IDKOP=$vkop_prtt[idmain_kop]"; ?>" class="badge bg-primary"><?php #echo"$vkop_prtt[tgl_input] - $vkop_prtt[kop]"; ?></a></li>
		<?php #} ?>
        </ol>
      </td>
    </tr>
    <tr>
      <td>
      <button name="simpan" onClick="return konfirmasi_simpan()" class="btn btn-success"><i class="fas fa-save"></i>&nbsp;Simpan Profil</button>      </td>
      <td colspan="2">
      <!-- -->
      <?php if($vemm['status']==1){ ?>
      <span style="color:#09F;">Pemberitahuan validasi</span><br><br>
      	<a href="<?php echo"?HLM=EMP_M&SUB=EMP_M_EMP_UPDATE&IDEMP=$vemm[KaryNomor]&UPEMP=UPEMP"; ?>" class="btn btn-success" onClick="return konfirmasi_simpan()"><i class="fas fa-check"></i>&nbsp;Konfirmasi Data</a>
        &nbsp;
        <a href="<?php echo"?HLM=EMP_M&SUB=EMP_M_PESAN_M&SUB_CHILD=EMP_M_PESAN_M_01_NEW&IDEMP01=$vemm[KaryNomor]&UPKRY01=UPKRY01"; ?>" class="btn btn-danger" onClick="return konfirmasi_simpan()"><i class="far fa-times-circle"></i>&nbsp;Tolak Perubahan</a>
      <?php } ?>
      <!-- -->
      </td>
    </tr>
  </table>
</form>
<?php include"../logic/UP_EMP_DAFTAR_01.php"; ?>
<?php include"../logic/DEL_DAFTAR_01_BERKAS.php"; ?>
</body>
<?php } ?>
