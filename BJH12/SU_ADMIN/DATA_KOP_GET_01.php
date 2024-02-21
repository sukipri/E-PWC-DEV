
<title>Untitled Document</title><body>
	<?php
		include"../config/connec_01_srv.php";
			$qq_kop = @$_GET['qq_kop']; 
				
				echo"<br><b>Daftar Isi</b><hr>";
				
				$vkop_in = mssql_query("select * from tb_kop_in_detail WHERE idmain_kop='$qq_kop'");
					while($vkopp_in = mssql_fetch_assoc($vkop_in)){
						echo"<a href=#>$vkopp_in[agenda]  $vkopp_in[tgl_data]</a><br>";
						}
				$vkop_in_02 = mssql_query("select * from tb_kop_detail WHERE idmain_kop='$qq_kop'");
					while($vkopp_in_02 = mssql_fetch_assoc($vkop_in_02)){
						echo"<a href=#>$vkopp_in_02[acara]  $vkopp_in_02[hari_tgl_tugas]</a><br>";
						}
				   
    
    ?>
</body>
