
<?php
		//error_reporting(0);
		ob_start();
		session_start();
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	 	   include'../logic/H_LOCATION.php';
			} else {
		include"css.php";
		include"../CONFIG_INTERNAL.php";
		//User assigment
		$u = $ms_q("$call_sel TBUser where namauser='$_SESSION[namauser]'");
		$uu = $ms_fas($u);
			$vkry = $ms_q("$call_sel TKaryawan WHERE KaryNomor='$uu[kode]'");
				$vkryy = $ms_fas($vkry);
				$vkry_tgl= $ms_q("select CONVERT(varchar(10),[KaryTglLahir],101) as tg_lhr from Tkaryawan where KaryNomor='$vkryy[KaryNomor]'");
					$vkryy_tgl = $ms_fas($vkry_tgl);
		if($uu['akses']==4){ 
		
	?>
			<?php
				$vps01_sw = $ms_q("$sl idmain_pesan,kode,untuk FROM tb_pesan WHERE untuk='$vkryy[KaryNomor]' AND status='1'");
					$vps01_sww = $ms_nr($vps01_sw);
					//echo"$vps01_sww";
			?>

		<body>
	<?php include_once"MENU.php"; ?>

	<div class="container">
    
	<?php include"../logic/page_logic_sa.php"; ?>
		
 
	</div>
       <?php include"FOOTER.php"; ?>
    </body>
    <?php
		}else{
		  include'../logic/H_LOCATION.php';
		} }
		ob_flush();
	?>