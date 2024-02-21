<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
			<body>
            <div class="list-group">
              <a class="list-group-item list-group-item-action active bg-success"> - NAVIGASI- </a>
              <a href="<?PHP echo"?HLM=EP_HOME_01&SUB=EP_MD_01&SUB_CHILD=EP_MD_01_SD"; ?>" class="list-group-item list-group-item-action">Setup Data</a>
              <a href="#" class="list-group-item list-group-item-action disabled">User Data</a>
			</div>
            
            </body>
            
     <?PHP } ?>