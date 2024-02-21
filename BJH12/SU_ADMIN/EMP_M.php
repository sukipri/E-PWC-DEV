<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
 <?php 
		 	$vkry01_cek01_sw = $ms_q("$sl status FROM TKaryawan WHERE status='1'");
				$vkry01_cek01_sww = $ms_nr($vkry01_cek01_sw);
		 ?>
<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="HOME.php">Home</a></li>
			<li class="breadcrumb-item active">Karyawan</li>
            
		</ol>
        <!--
		<a href="?HLM=EMP_M&SUB=EMP_M_DAFTAR" class="btn btn-outline-primary btn-sm"><i class="fa fa-file-text"></i>&nbsp;List Employee HIS</a>
		&nbsp;
        <a href="?HLM=EMP_M&SUB=EMP_M_EMP" class="btn btn-outline-primary btn-sm"><i class="fa fa-file-text"></i>&nbsp;Entry Employee</a>
        &nbsp;
        -->
        <a href="?HLM=EMP_M&SUB=EMP_M_DAFTAR_02" class="btn btn-outline-success btn-sm"><i class="fa fa-file-text"></i>&nbsp;Manage Employee</a>
        &nbsp;
        <a href="?HLM=EMP_M&SUB=EMP_M_AKUN_M" class="btn btn-outline-success btn-sm"><i class="fa fa-file-text"></i>&nbsp;Akun Karyawan</a>
        &nbsp;
        <a href="?HLM=EMP_M&SUB=EMP_M_PESAN_M" class="btn btn-outline-warning btn-sm"><i class="fa fa-file-text"></i>&nbsp;<?php echo"Pesan ()"; ?></a>
        &nbsp;
        <a href="?HLM=EMP_M&SUB=EMP_M_DAFTAR_REQ_01" class="btn btn-outline-info btn-sm"><i class="fa fa-file-text"></i>&nbsp;<?php echo"Permintaan update ($vkry01_cek01_sww)"; ?></a>

			<?php require"../logic/page_logic_sa_sub.php"; ?>		
</body>
<?php } ?>
