	<?php 
		
			include"config02.php";
			include"css.php";
	?>
<body>
		<?php include"MENU.php"; ?>
		 <nav>
    <div class="nav-wrapper blue accent-2">
	   <ul>
      <li><a href="#!!"><b>Syarat berkas Pengguna BPJS/Pribadi/Asuransi</b></a></li>
      </ul>
	  </div>
  </nav>
  <table  class="striped" width="100%">
	<tr>
	<td width="121" height="22"  bgcolor="#9DDFFF">#JALUR</td>
	<td width="928" bgcolor="#9DDFFF">KETENTUAN</td>
	</tr>
  <tr ng-repeat="x in names">
    <td><b>BPJS</b></td>
    <td align="left">
	<p>Untuk pasien kontrol wajib melampirkan<br>
	<ol>
		<li>Kartu BPJS</li>
		<li>Surat Rujukan</li>
		<li>Surat Kontrol</li>
		<li>*Data valid dan Terbaca</li>
	</ol>
	</p>
	Untuk pasien Rujukan wajib melampirkan<br>
	<ol>
		<li>Kartu BPJS</li>
		<li>Surat Rujukan</li>
		 <li>*Data valid dan Terbaca</li>
	</ol>
	</td>  
	</tr>
  <tr ng-repeat="x in names">
    <td><b>PRIBADI</b></td>
    <td align="left">
	Untuk pasien Pribadi wajib melampirkan<br>
	<ol>
		<li>Kartu Tanda Penduduk (E-KTP) <br><font color="#006633">*Dikhususkan untuk usia diatas 17 tahun</font></li>
		 <li>*Data valid dan Terbaca</li>
	</ol>
	</td>
  </tr>
  <tr ng-repeat="x in names">
    <td><b>Asuransi</b></td>
    <td align="left">
	Untuk pasien Asuransi wajib melampirkan<br>
	<ol>
		<li>Kartu Asuransi</li>
		 <li>*Data valid dan Terbaca</li>
	</ol>
	</td>
  </tr>
  <tr ng-repeat="x in names">
    <td><b>Catatan</b></td>
    <td align="left">
	<ol>
		<li>Untuk konfirmasi data 1X24 jam </li>
		<li>Konfrimasi Disetujui atau tidak tetap terkirim melalui Email,bisa juga di cek di Menu <i>Cek Nomor RM</i> </li>
		<li>Penolakan bisa terjadi dengan hal lain yang memang tidak bisa terhindarkan</li>
	</ol>
	</td>
  </tr>
</table>
 <br><br>
</body>

