<?php
		error_reporting(0);

	?>
<body>
	<?php
		$RM = @trim($sql_slash($_GET['RM']));
		$REG = @trim($sql_slash($_GET['REG']));
		$EML = @trim($sql_slash($_GET['EML']));
			
	
	?>
    	<h4>Lampiran Pasien Kurang jelas dan diminta mengirim kembali</h4>
        <a href="<?php echo"MAIL/mail-proses-note.php?RM=$RM&REG=$REG&EML=$EML"; ?>" class="btn btn-success"><i class="fa fa-paper-plane"></i>&nbsp; Sending</a>
        <hr>
        <h4>Pergantian Tanggal Periksa</h4>
        <a href="<?php echo"MAIL/mail-proses-note_tgl.php?RM=$RM&REG=$REG&EML=$EML"; ?>" class="btn btn-info"><i class="fa fa-paper-plane"></i>&nbsp; Sending</a>
</body>
