<?php
	include"../config/connec_01_srv.php";
		$IDKOP = @$_GET['IDKOP'];
		$qq_part = @$_GET['qq_part'];
				$vkry_pusat_02 = mssql_query("select KaryNomor,KaryNama,KaryGender,KaryTmpLahir,KaryAlamat,UnitKode FROM TKaryawan WHERE KaryNomor='$qq_part'");
										//$no = 1;
											$vkryy_pusat_02 = mssql_fetch_assoc($vkry_pusat_02);
					$vunit_02 = mssql_query("select * from TUnitPrs WHERE UnitKode='$vkryy_pusat_02[UnitKode]'");
						$vunitt_02 = mssql_fetch_assoc($vunit_02);
			echo"$vkryy_pusat_02[KaryNama]<br>";
				if($vkryy_pusat_02['KaryGender']=="L"){
			echo"LAKI LAKI<br>";
			}elseif($vkryy_pusat_02['KaryGender']=="P"){
				echo"Perempuan<br>";
			}
			echo"<b>Tempat Tgl Lahir</b> &nbsp; $vkryy_pusat_02[KaryTmpLahir]<br>";
			echo"<b>Alamat</b> &nbsp; $vkryy_pusat_02[KaryAlamat]<br>";
			echo"<b>Unit</b> &nbsp;$vunitt_02[UnitNama] <br>";
			
	
?>
			
            	<input type="hidden" name="kd_kry" value="<?php echo"$vkryy_pusat_02[KaryNomor]" ?>">
         

<body>
</body>

