<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
		
            <div class="list-group">
              <a class="list-group-item list-group-item-action active bg-success"> - NAVIGASI- </a>
              <a href="<?PHP echo"?HLM=EP_HOME_01&SUB=EP_APP_01&SUB_CHILD=EP_APP_01_MNL"; ?>" class="list-group-item list-group-item-action">Mastering Presensi</a>
              <a href="<?PHP echo"?HLM=EP_HOME_01&SUB=EP_APP_01&SUB_CHILD=WS-EP_APP_01_RI_JADWAL_01"; ?>" class="list-group-item list-group-item-action">Data App</a>
			</div>
            
         
            
     <?PHP } ?>