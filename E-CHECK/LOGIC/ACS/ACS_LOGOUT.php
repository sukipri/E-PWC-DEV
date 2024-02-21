	<?php
	ob_start();
	session_start();
		session_destroy();
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../../">';
			exit;
	ob_flush();
	?>