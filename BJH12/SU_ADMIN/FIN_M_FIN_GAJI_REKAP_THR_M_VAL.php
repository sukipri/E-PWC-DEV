<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
	<b>#Aktifasi E-Pay</b>
    <?php
		$vgj01_sw = $ms_q("$sl GajiTahun,GajiTHRJenis,KaryNomor,KaryNama,GajiTotal,GajiPph21,GajiBersih,GajiStatus,GajiOtorisasi,GajiDibayarkan FROM TGajiTHR WHERE  GajiTahun='$YR' ");
			$vgj01_sww = $ms_fas($vgj01_sw);
	?>
    <br><br>
    	<a href="<?php echo"?HLM=FIN_M&SUB=FIN_M_FIN_GAJI_REKAP_THR_M&SUB_CHILD=FIN_M_FIN_GAJI_REKAP_THR_M_VAL&VALPASKAH=VALPASKAH&IDVAL01=$YR"; ?>" onClick="return konfirmasi_simpan()" class="btn btn-primary"><?php echo"Kirim data Paskah $YR E-Pay"; ?> </a>
        	&nbsp;
        <a href="<?php echo"?HLM=FIN_M&SUB=FIN_M_FIN_GAJI_REKAP_THR_M&SUB_CHILD=FIN_M_FIN_GAJI_REKAP_THR_M_VAL&VALSHU=VALSHU&IDVAL01=$YR"; ?>" onClick="return konfirmasi_simpan()" class="btn btn-primary"><?php echo"Kirim data SHU $YR E-Pay"; ?> </a>
        	&nbsp;
        <a href="<?php echo"?HLM=FIN_M&SUB=FIN_M_FIN_GAJI_REKAP_THR_M&SUB_CHILD=FIN_M_FIN_GAJI_REKAP_THR_M_VAL&VALNATAL=VALNATAL&IDVAL01=$YR"; ?>" onClick="return konfirmasi_simpan()" class="btn btn-success"><?php echo"Kirim data Natal  $YR E-Pay"; ?> </a>
			&nbsp;
        <a href="<?php echo"?HLM=FIN_M&SUB=FIN_M_FIN_GAJI_REKAP_THR_M&SUB_CHILD=FIN_M_FIN_GAJI_REKAP_THR_M_VAL&VALGAJI=VALGAJI&IDVAL01=$YR$MH"; ?>" onClick="return konfirmasi_simpan()" class="btn btn-info"><?php echo"Kirim data Gaji  $YR E-Pay"; ?> </a>
		<br><br>
        <b>#UnReg E-Pay</b>
    <?php
		$vgj01_sw = $ms_q("$sl GajiTahun,GajiTHRJenis,KaryNomor,KaryNama,GajiTotal,GajiPph21,GajiBersih,GajiStatus,GajiOtorisasi,GajiDibayarkan FROM TGajiTHR WHERE  GajiTahun='$YR' ");
			$vgj01_sww = $ms_fas($vgj01_sw);
	?>
    <br><br>
    	<a href="<?php echo"?HLM=FIN_M&SUB=FIN_M_FIN_GAJI_REKAP_THR_M&SUB_CHILD=FIN_M_FIN_GAJI_REKAP_THR_M_VAL&UNVALPASKAH=UNVALPASKAH&IDVAL01=$YR"; ?>" onClick="return konfirmasi_simpan()" class="btn btn-primary"><?php echo"Kirim data Paskah $YR E-Pay"; ?> </a>
        	&nbsp;
        <a href="<?php echo"?HLM=FIN_M&SUB=FIN_M_FIN_GAJI_REKAP_THR_M&SUB_CHILD=FIN_M_FIN_GAJI_REKAP_THR_M_VAL&UNVALSHU=UNVALSHU&IDVAL01=$YR"; ?>" onClick="return konfirmasi_simpan()" class="btn btn-primary"><?php echo"Kirim data SHU $YR E-Pay"; ?> </a>
        	&nbsp;
        <a href="<?php echo"?HLM=FIN_M&SUB=FIN_M_FIN_GAJI_REKAP_THR_M&SUB_CHILD=FIN_M_FIN_GAJI_REKAP_THR_M_VAL&UNVALNATAL=UNVALNATAL&IDVAL01=$YR"; ?>" onClick="return konfirmasi_simpan()" class="btn btn-success"><?php echo"Kirim data Natal  $YR E-Pay"; ?> </a>
			&nbsp;
        <a href="<?php echo"?HLM=FIN_M&SUB=FIN_M_FIN_GAJI_REKAP_THR_M&SUB_CHILD=FIN_M_FIN_GAJI_REKAP_THR_M_VAL&UNVALGAJI=UNVALGAJI&IDVAL01=$YR$MH"; ?>" onClick="return konfirmasi_simpan()" class="btn btn-info"><?php echo"Kirim data Gaji  $YR E-Pay"; ?> </a>
        <!-- -->
        <?php include"../logic/UP_VAL_EPAY_01.php"; ?>

</body>
<?php } ?>
