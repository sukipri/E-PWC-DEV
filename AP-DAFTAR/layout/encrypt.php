			<h4>Via Database From TB Mahasiswa Mysql</h4>
					<?php 
					$ambil = $call_q("$call_sel mahasiswa $ob idmahasiswa asc limit 20" );
					while($ambill = $call_fas($ambil)){
	echo "{<b>SHA1</b> ". hs($ambill['nama']) ."}-{<b>MD5</b> ". md($ambill['idmahasiswa']) ."}-{<b>CR32</b> ". cr($ambill['alamat'])."}<br>";
					}
				 ?>   