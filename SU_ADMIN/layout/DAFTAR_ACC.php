
<body>
	<?php
			$IDDKT = @$_GET['IDDKT'];
			$RM = @$_GET['RM'];
			$NO = @$_GET['NO'];
			$REG = @$_GET['REG'];
			$OKE = @$_GET['OKE'];
			$WAKTU = @$_GET['WAKTU'];
			$NOURUT = @$_GET['NOURUT'];
			$EML = @$_GET['EML'];
			$TG = @$_GET['TG'];
			$HARI = @$_GET['HARI'];
			
	?>
<h5>#KETERANGAN UNTUK PASIEN <?php echo"<b>$RM</b>"; ?></h5>
		<?php
				if(isset($_POST['simpan'])){
					$ket = @$sql_slash($_POST['ket']);
						$save = $ms_q("$up TRawatJalan set ket='$ket' WHERE JalanNoReg='$REG' ");
				if($save){
					 header("location:MAIL/mail-proses.php?IDDKT=$IDDKT&RM=$RM&REG=$REG&KMAIL=MAIL&NO=$NO&EML=$EML&TG=$TG&WAKTU=$WAKTU&HARI=$HARI");
				}else{
					echo"<font color=red><b>Gagal Terinput</b></font>";
				}}
		?>
<form method="post">
	<textarea class="form-control" name="ket" style="max-width:50rem;" placeholder="Masukan keterangan...."></textarea>
    <br />
    <button class="btn btn-success" name="simpan">Simpan</button>
	
</form>
</body>
