<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
            <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<body>
	<?php
		$IDKOP = @$sql_slash($_GET['IDKOP']);
			$IDKOPDTL = @$sql_slash($_GET['IDKOPDTL']);
				$vkp_02 = $ms_q("$call_sel tb_kop WHERE idmain_kop='$IDKOP'");
                       	 $vkpp_02 = $ms_fas($vkp_02);
						 $vkpin_01 = $ms_q("$call_sel tb_kop_in_detail WHERE idmain_kop='$IDKOP'");
                       			 $vkpinn_01 = $ms_fas($vkpin_01);
			if(isset($_POST['simpan'])){
				$isi = $sql_slash($_POST['isi']);
					$ms_q("$up tb_kop_in_detail set isi='$isi' WHERE idmain_kop_in_detail='$IDKOPDTL'");
				header("location:?HLM=APP_DUTY_IN_01_UPDATE_ISI&IDKOP=$IDKOP&IDKOPDTL=$IDKOPDTL");
			
			}
	?>
	<ol class="breadcrumb">
  			<li class="breadcrumb-item"><a href="HOME.php">Home</a></li>
                <li class="breadcrumb-item active"><a href="<?php echo"?HLM=APP_DUTY_IN_01_UPDATE&IDKOP=$IDKOP&IDKOPDTL=$IDKOPDTL"; ?>">Jadwal Rapat Internal [UPDATE]</a></li>
                <li class="breadcrumb-item active">Isi Rapat</li>
        </ol>
        <?php echo"<h5>Agenda <i>$vkpinn_01[agenda]</i><br>Tanggal / Waktu <i>$vkpinn_01[tgl_data]</i></h5>"; ?>
	<form method="post">
    <textarea name="isi"><?php echo"$vkpinn_01[isi]"; ?></textarea>
    <br>
    <button  class="btn btn-success" name="simpan"><i class="fas fa-arrow-alt-circle-up"></i>&nbsp;Update</button>
                <script>
                        CKEDITOR.replace( 'isi' );
                </script>

	</form>
</body>
<?php } ?>

