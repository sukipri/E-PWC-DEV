<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
  <a href="?HLM=EMP_M&SUB=EMP_M_AKUN_M&SUB_CHILD=EMP_M_AKUN_M_DAF" class="btn btn-outline-info btn-sm"><i class="fa fa-file-text"></i>&nbsp;Daftarkan Akun</a>
  &nbsp;
   <a href="?HLM=EMP_M&SUB=EMP_M_AKUN_M&SUB_CHILD=EMP_M_AKUN_M_DAF_GL" class="btn btn-outline-info btn-sm"><i class="fa fa-file-text"></i>&nbsp;Daftarkan Akun / GLobal</a>
   &nbsp;
   <a href="?HLM=EMP_M&SUB=EMP_M_AKUN_M&SUB_CHILD=EMP_M_AKUN_M_MNG" class="btn btn-outline-info btn-sm"><i class="fa fa-file-text"></i>&nbsp;Daftar Akun</a>
   &nbsp;
   <a href="?HLM=EMP_M&SUB=EMP_M_AKUN_M&SUB_CHILD=EMP_M_AKUN_M_UNIT" class="btn btn-outline-info btn-sm"><i class="fa fa-file-text"></i>&nbsp;Akun / Unit</a>
  <br>
  <br>
  	<?php require"../logic/page_logic_sa_sub_child.php"; ?>		
</body>
<?php } ?>