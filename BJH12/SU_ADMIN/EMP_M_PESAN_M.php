<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
	<b>#Pesan</b>
    <br>
    		<a href="?HLM=EMP_M&SUB=EMP_M_PESAN_M&SUB_CHILD=EMP_M_PESAN_M_01_NEW" class="btn btn-outline-success btn-sm"><i class="fa fa-file-text"></i>&nbsp;Pesan Baru</a>
       		 &nbsp;
  		  	<a href="?HLM=EMP_M&SUB=EMP_M_PESAN_M" class="btn btn-outline-info btn-sm"><i class="fa fa-file-text"></i>&nbsp;Kotak Masuk</a>
       		 &nbsp;
        	<a href="?HLM=EMP_M&SUB=EMP_M_PESAN_M" class="btn btn-outline-danger btn-sm"><i class="fa fa-file-text"></i>&nbsp;Kotak Keluar</a>
        	&nbsp;
      <br>
      <?php require"../logic/page_logic_sa_sub_child.php"; ?>		      
</body>
<?php } ?>