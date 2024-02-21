<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
				<body>
                	<b>#DATA JADWAL KARYAWAN </b>
                	<a href="?HLM=EP_HOME_01&SUB=EP_MD_01&SUB_CHILD=EP_MD_01_SD&SUB_CHILD02=WS-EP_MD_01_SD_JADWAL_VIEW" class="badge badge-success">*tJadwal / All </a>
                    &nbsp;
                    <a href="?HLM=EP_HOME_01&SUB=EP_MD_01&SUB_CHILD=EP_MD_01_SD&SUB_CHILD02=WS-EP_MD_01_SD_JADWAL_VIEW_GUSTU" class="badge badge-success">*tJadwal / Gustu </a>
                </body>
            
            <?PHP } ?>