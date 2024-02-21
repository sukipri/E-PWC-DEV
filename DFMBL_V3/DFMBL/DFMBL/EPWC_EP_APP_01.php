<?php
		//..Sesiion open../
		 if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
 			include'../LOGIC/PG/PG_H_LOCATION.php';
       }else{ 
	   
	   ?>
       
</body>
		<span class="h5 mx-2"><b>#Absensi Masuk Karyawan</b></span>
		<br>
       	<?PHP //include_once"WS-EPWC_EP_APP_01.php"; ?>
		   <!--
		   <a href="https://pantiwilasa-citarum.co.id/WEB-PWC/E-PWC/TEST_DATA/WS-EPWC_EP_APP_01.php<?PHP //echo"?IDEMP01=$IDEMP01"; ?>" class="btn btn-info">Menuju Absen</a>
	   -->
	   <meta http-equiv="refresh" content="0; url=https://pantiwilasa-citarum.co.id/WEB-PWC/E-PWC/TEST_DATA/WS-EPWC_EP_APP_01.php<?PHP echo"?IDEMP01=$IDEMP01"; ?>">      
        
</body>


<?PHP } ?>