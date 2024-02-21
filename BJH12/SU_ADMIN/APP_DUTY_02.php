<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
            			
            		<script src="https://cdn.ckeditor.com/4.5.10/full/ckeditor.js"></script>
<body>
		<?php
			$IDKOP = @$sql_slash($_GET['IDKOP']);
				  $vkp = $ms_q("$call_sel tb_kop WHERE idmain_kop='$IDKOP'");
                        $vkpp = $ms_fas($vkp);
			if(isset($_POST['simpan'])){
				$kop = @$sql_slash($_POST['kop']);
				$tjn = @$sql_slash($_POST['tjn']);
				$htg = @$sql_slash($_POST['htg']);
				$jam = @$sql_slash($_POST['jam']);
				$tmp = @$sql_slash($_POST['tmp']);
				$acr = @$sql_slash($_POST['acr']);
				$tbr = @$sql_slash($_POST['tbr']);
				$trp = @$sql_slash($_POST['trp']);
				$brk = @$sql_slash($_POST['brk']);
				$plng = @$sql_slash($_POST['plng']);
				$png = @$sql_slash($_POST['png']);
				$ket = @$sql_slash($_POST['ket']);
				$skp = @$sql_slash($_POST['skp']);
				$bentuk = @$sql_slash($_POST['bentuk']);
				$tema = @$sql_slash($_POST['tema']);
					//$save = $ms_q("$in tb_kop_detail values('$IDMAIN','$IDKOP','$c_kode_vkopd','$tjn','$htg','$jam','$tmp','$acr','$tbr','$brk','$plng','$trp','','$ket','3','$skp','0','0','-','$png','$bentuk','$tema')");
          $save = $ms_q("$in tb_kop_detail (idmain_kop_detail,idmain_kop,kode,tujuan,hari_tgl_tugas,jam,tempat,acara,stasiun,hari_tgl_go,hari_tgl_out,trans,pengantar,ket,app,skp,jam_pel,kegiatan,penanggung,bentuk,tema)values('$IDMAIN','$IDKOP','$c_kode_vkopd','$tjn','$htg','$jam','$tmp','$acr','$tbr','$brk','$plng','$trp','','$ket','3','$skp','0','0','$png','$bentuk','$tema')");
					$save_02 = $ms_q("$up tb_kop set app='2' WHERE idmain_kop='$IDKOP'");
						
		if ($save AND $save_02) { header("location:?HLM=APP_DUTY_03&IDKOP=$IDKOP");  ?>
						<div class="alert alert-dismissible alert-success">
							 <strong>Well done!</strong> You successfully save...
						</div>
						<?php }else{ ?>
						<div class="alert alert-dismissible alert-danger">
							 <strong>Ula laaa!</strong> Save is Failed
						</div>
	<?php }} ?>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="HOME.php">Home</a></li>
			<li class="breadcrumb-item active">Langkah 01</li>
            <li class="breadcrumb-item active">langkah 02</li>
		</ol>
       <form method="post">
        <table width="100%" style="max-width:60rem;" border="0" class="table table-bordered">
          <tr>
            <td width="42%"><b>Nomor</b><input type="text" readonly name="kop" style="max-width:20rem;" class="form-control" value="<?php echo"$vkpp[kop]"; ?>"></td>
            <td colspan="2"><b>Kota Tujuan</b><input type="text"  name="tjn" style="max-width:25rem;" class="form-control" placeholder="Manado" required></td>
          </tr>
          <tr class="table-info">
            <td colspan="3">Penjadwalan</td>
          </tr>
          <tr>
            <td><b>Hari dan Tanggal</b><input type="text"  name="htg" style="max-width:25rem;" class="form-control" placeholder="Sunday-monday , 18-22 March 2019" required></td>
            <td colspan="2"><b>Jam</b><input type="text"  name="jam" style="max-width:25rem;" class="form-control" placeholder="17.00 - 19.00" required></td>
          </tr>
          <tr>
            <td rowspan="2"><b>lokasi</b><input type="text"  name="tmp" style="max-width:25rem;" class="form-control" placeholder="Hotel Mawar" required></td>
            <td colspan="2">
            	<b>Acara</b><textarea name="acr" class="form-control"><?php echo"$vkpp[ket]"; ?></textarea></td>
          </tr>
          <tr>
            <td width="27%">
            <select name="bentuk" class="form-control" style="max-width:20rem;" required>
              <option value="">Bentuk</option>
              <option value="Seminar">Seminar</option>
              <option value="Rapat">Rapat</option>
              <option value="Simposium">Simposium</option>
              <option value="Penyuluhan">Penyuluhan</option>
              <option value="Workshop">Workshop</option>
              <option value="Pelatihan">Pelatihan</option>
              <option value="Audit">Audit</option>
              <option value="Seminar & Workshop">Seminar & Workshop</option>
              <option value="Seminar,Workshop & Pelatihan">Seminar,Workshop & Pelatihan</option>
            </select></td>
            <td width="31%"><input type="text"  name="tema" style="max-width:25rem;" class="form-control" placeholder="Tema.." required></td>
          </tr>
          <tr class="table-info">
            <td colspan="3">Akomodasi</td>
          </tr>
          <tr>
            <td><b>Tempat Keberangkatan</b><input type="text"  name="tbr" style="max-width:25rem;" class="form-control" placeholder="Rs Pantiwilasa" required></td>
            <td colspan="2"><b>Sarana Transportasi</b>
            <input type="text"  name="trp" style="max-width:25rem;" class="form-control" placeholder="Becak Air" required></td>
          </tr>
          <tr>
            <td><b>Keberangkatan</b><input type="text"  name="brk" style="max-width:25rem;" class="form-control" placeholder="Sunday , 18 March 2019" required></td>
            <td colspan="2"><b>Kembali</b><input type="text"  name="plng" style="max-width:25rem;" class="form-control" placeholder="Monday , 18 March 2019" required></td>
          </tr>
          <tr>
            <td><b>Penanggung</b><input type="text"  name="png" style="max-width:25rem;" class="form-control" placeholder="RS" required></td>
            <td colspan="2"><b>Catatan</b><textarea name="ket" class="form-control"></textarea> </td>
          </tr>
          <tr>
            <td><b>SKP</b><input type="number"  name="skp" style="max-width:10rem;" class="form-control"  required></td>
            <td colspan="2"><button name="simpan" class="btn btn-success"><i class="fas fa-save"></i>&nbsp;S.A.V.E</button></td>
          </tr>
        </table>
</form>
</body>
<?php } ?>
