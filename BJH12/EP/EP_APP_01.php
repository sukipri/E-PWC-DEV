<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			//error_reporting(0);
			?>
			<body>
            <table width="100%" class="table table-sm table-bordered" border="0">
                  <tr>
                    <td width="338">
                    <!-- -->
                    	<?PHP include_once"EP_MENU_01_APP.php"; ?>
                    <!-- -->
                    </td>
                    <td width="1317">
                    <!-- -->
	                    <?php require"../logic/page_logic_sa_sub_child.php"; ?>
                    <!-- -->
                    </td>
                  </tr>
			</table>
            
            
            </body>
            
          <?PHP } ?>