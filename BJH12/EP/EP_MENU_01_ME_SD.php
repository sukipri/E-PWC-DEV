<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
			<body>
                	<a href="<?PHP echo"?HLM=EP_HOME_01&SUB=EP_MD_01&SUB_CHILD=EP_MD_01_SD&SUB_CHILD02=EP_MD_01_JDW_IN"; ?>" class="btn btn-info btn-sm"><i class="fas fa-flag"></i>&nbsp;ENTRI JADWAL</a>
                    &nbsp;
                    	<a href="<?PHP echo"?HLM=EP_HOME_01&SUB=EP_MD_01&SUB_CHILD=EP_MD_01_SD&SUB_CHILD02=WS-EP_MD_01_SD_JADWAL_VIEW_GUSTU"; ?>" class="btn btn-info btn-sm"><i class="fas fa-calendar-check"></i>&nbsp;DATA Jadwal</a>
                        &nbsp;
                        <a href="<?PHP echo"?HLM=EP_HOME_01&SUB=EP_MD_01&SUB_CHILD=EP_MD_01_SD&SUB_CHILD02=EP_MD_01_SD_GCODE_01"; ?>" class="btn btn-info btn-sm"><i class="fas fa-calendar-check"></i>&nbsp;DATA Set Gcode</a>
                    
            </body>
            
     <?PHP } ?>