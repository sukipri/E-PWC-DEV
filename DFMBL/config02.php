	<?php
		ob_start();
	session_start();
			 include"../SU_ADMIN/config/connec_01_srv.php";
			 include"../SU_ADMIN/secure/GR_01.php"; //security enggine
				include"../SU_ADMIN/sc/stack_Q.php"; //Query SQL
				  include"../SU_ADMIN/sc/code_rand.php"; 
				  /*
				  $u = @$call_q("$call_sel tbuser where kode='$_SESSION[namauser]'");
					$uu = @$call_fas($u); */
			?>