<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="HOME.php">Home</a></li>
			<li class="breadcrumb-item active">Master Division</li>
		</ol>
        <!--
		<a href="?HLM=DIV_M&SUB=DIV_M_DIV" class="btn btn-outline-primary btn-lg"><i class="fa fa-file-text"></i>&nbsp;Entry Division</a>
        &nbsp;
        <a href="?HLM=DIV_M&SUB=DIV_M_DIV_POS" class="btn btn-outline-primary btn-lg"><i class="fa fa-file-text"></i>&nbsp;Entry Posisiton</a>
        -->
        <a href="?HLM=DIV_M&SUB=DIV_M_KEL_BIDANG" class="btn btn-outline-primary btn-lg"><i class="fa fa-file-text"></i>&nbsp;Entri Kelompok Bidang</a>
        &nbsp;
        <a href="?HLM=DIV_M&SUB=DIV_M_DIV_M" class="btn btn-outline-success btn-lg"><i class="fa fa-file-text"></i>&nbsp;JBT Fungsional & Struktural</a>
		

			<?php require"../logic/page_logic_sa_sub.php"; ?>		
</body>
<?php } ?>
