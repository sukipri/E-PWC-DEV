<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
<b>#Rekap THR</b>
<br>
	<a href="?HLM=FIN_M&SUB=FIN_M_FIN_GAJI_REKAP_THR_M&SUB_CHILD=FIN_M_FIN_GAJI_REKAP_THR_M_NATAL" class="btn btn-outline-primary"><i class="fas fa-clipboard"></i>&nbsp;THR Natal</a>
	&nbsp;
    <a href="?HLM=FIN_M&SUB=FIN_M_FIN_GAJI_REKAP_THR_M&SUB_CHILD=FIN_M_FIN_GAJI_REKAP_THR_M_PASKAH" class="btn btn-outline-primary"><i class="fas fa-clipboard"></i>&nbsp;THR Paskah</a>
    &nbsp;
    <a href="?HLM=FIN_M&SUB=FIN_M_FIN_GAJI_REKAP_THR_M&SUB_CHILD=FIN_M_FIN_GAJI_REKAP_THR_M_SHU" class="btn btn-outline-primary"><i class="fas fa-clipboard"></i>&nbsp;SHU</a>
    &nbsp;
    <a href="?HLM=FIN_M&SUB=FIN_M_FIN_GAJI_REKAP_THR_M&SUB_CHILD=FIN_M_FIN_GAJI_REKAP_THR_M_VAL" class="btn btn-outline-success"><i class="fas fa-clipboard"></i>&nbsp;Validasi E-PAY</a>
    <br>
    <?php include"../logic/page_logic_sa_sub_child.php"; ?>
</body>
<?php } ?>