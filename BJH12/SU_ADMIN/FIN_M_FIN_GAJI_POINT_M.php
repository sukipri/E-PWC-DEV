<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
		<a href="?HLM=FIN_M&SUB=FIN_M_FIN_GAJI_POINT_M&SUB_CHILD=FIN_M_FIN_GAJI_POINT_M_01" class="btn btn-outline-info btn-sm"><i class="fa fa-file-text"></i>&nbsp;Daftar Point Gaji Karyawan</a>
		&nbsp;
        <br>
        <?php require"../logic/page_logic_sa_sub_child.php"; ?>	
</body>
<?php } ?>