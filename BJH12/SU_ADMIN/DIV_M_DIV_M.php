<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>

     <a href="?HLM=DIV_M&SUB=DIV_M_DIV_M&SUB_CHILD=DIV_M_DIV_M_VAR_DTL" class="btn btn-outline-info btn-sm"><i class="fa fa-file-text"></i>&nbsp; Judul Jabatan</a>
     			<?php require"../logic/page_logic_sa_sub_child.php"; ?>	
</body>
<?php } ?>