<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
	<b>#Laporan E-Meeting</b><br><br>
		<a href="?HLM=KOP_M&SUB=RPT_M&SUB_CHILD=RPT_M_DUTY_01_M" class="btn btn-outline-primary btn-sm"><i class="fa fa-file-text"></i>&nbsp;Laporan Jam / Tahun</a>
		&nbsp;
     
	<br>
			<?php require"../logic/page_logic_sa_sub_child.php"; ?>		
</body>
<?php } ?>
