<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
	<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="HOME.php">Home</a></li>
			<li class="breadcrumb-item active">Keuangan</li>
		</ol>
		<!-- <a href="?HLM=FIN_M&SUB=FIN_M_FIN_TYPE" class="btn btn-outline-primary btn-sm"><i class="fa fa-file-text"></i>&nbsp;Pembiayaan Pelatihan / Seminar</a>
		&nbsp;
        <a href="?HLM=FIN_M&SUB=FIN_M_FIN_GAJI_SLIP" class="btn btn-outline-success btn-sm"><i class="fa fa-file-text"></i>&nbsp;Rekap Gaji</a>
        &nbsp;
        <a href="?HLM=FIN_M&SUB=FIN_M_FIN_GAJI" class="btn btn-outline-success btn-sm"><i class="fa fa-file-text"></i>&nbsp;Slip Gaji</a>
        &nbsp;
        <a href="?HLM=FIN_M&SUB=FIN_M_FIN_GAJI_POINT_M" class="btn btn-outline-success btn-sm"><i class="fa fa-file-text"></i>&nbsp;Point Gaji</a>
        &nbsp;
        <a href="?HLM=FIN_M&SUB=FIN_M_FIN_GAJI_REKAP_THR_M" class="btn btn-outline-success btn-sm"><i class="fa fa-file-text"></i>&nbsp;Rekap THR</a>
        &nbsp;
        <a href="?HLM=FIN_M&SUB=FIN_M_FIN_GAJI_THR_01" class="btn btn-outline-success btn-sm"><i class="fa fa-file-text"></i>&nbsp;THR</a>
		&nbsp -->
		<a href="?HLM=FIN_M&SUB=FIN_M_FIN_GAJI_YAKKUM" class="btn btn-outline-success btn-sm"><i class="fa fa-file-text"></i>&nbsp; E-PAY Gaji Yakkum</a>
		&nbsp
		<a href="?HLM=FIN_M&SUB=FIN_M_FIN_LEMBUR" class="btn btn-outline-success btn-sm"><i class="fa fa-file-text"></i>&nbsp; MNG.Kompensasi</a>
		&nbsp
        <a href="?HLM=FIN_M&SUB=FIN_M_FIN_GAJI_KOM_M" class="btn btn-warning btn-sm"><i class="fas fa-road"></i>&nbsp Komparasi Data</a>
      
			<?php require"../logic/page_logic_sa_sub.php"; ?>	
</body>
<?php } ?>