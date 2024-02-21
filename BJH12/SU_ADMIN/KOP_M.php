<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="HOME.php">Home</a></li>
			<li class="breadcrumb-item active">E-Meeting</li>
		</ol>
		<a href="?HLM=KOP_M&SUB=KOP_M_KOP" class="btn btn-outline-primary "><i class="fas fa-pen"></i>&nbsp;Entri Nomor Surat</a>
        &nbsp;
        <a href="?HLM=KOP_M&SUB=KOP_M_CATATAN" class="btn btn-outline-primary "><i class="fas fa-pen"></i>&nbsp;Entri Note</a>
		&nbsp;
        <a href="?HLM=KOP_M&SUB=KOP_M_DAFTAR_MENU" class="btn btn-outline-success "><i class="fas fa-cogs"></i>&nbsp;Atur Penomoran Surat</a>
        &nbsp;
        <a href="?HLM=KOP_M&SUB=APP_DUTY_01" class="btn btn-outline-primary "><i class="fa fa-file-text"></i>&nbsp;Buat Tugas</a>
         &nbsp;
        <a href="?HLM=KOP_M&SUB=APP_DUTY_IN_DAFTAR" class="btn btn-outline-primary "><i class="fa fa-file-text"></i>&nbsp;Agenda Diklat & Rapat</a>
&nbsp;
        <a href="?HLM=KOP_M&SUB=RPT_M" class="btn btn-outline-warning "><i class="fas fa-clone"></i>&nbsp;Laporan</a>
			<?php require"../logic/page_logic_sa_sub.php"; ?>		
</body>
<?php } ?>
