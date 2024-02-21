	<?php
	ob_start();
	session_start();
		session_destroy();
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://103.164.114.138/E-PWC/E-CPF/E-CPF/ACC_LOGIN_ACCOUNT.php?PG_SA=ACC_LOGIN_ACCOUNT">';
			exit;
	ob_flush();
	?>