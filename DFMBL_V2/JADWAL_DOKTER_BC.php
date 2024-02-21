<?php 
		
			include"config02.php";
			include"css.php";
	?>
<body>
	<?php include"MENU.php"; ?>
<nav>
		<div class="nav-wrapper blue accent-2">
		   <ul>
		  <li><a href="#!!">Daftar Dokter</a></li>
		  </ul>
</div>
	  </nav>
	         <table width="100%" border="0" class="striped">
			 		<?php
				
				$vdkt =  $ms_q("$call_sel TPelaku where  PelakuStatus='A' order by PelakuNama asc");
				$no = 1;
							while($vdktt = $ms_fas($vdkt)){
						$vpl = $ms_q("$call_sel TUnit where UnitKode='$vdktt[UnitKode]'");
							$vpll = $ms_fas($vpl);
				//str_replcae
			$teksawal = "$vpll[UnitNama]";
 			$txt_01 = str_replace("Klinik Sp.", "", $teksawal);
				?>
               <tr>
                 <td width="54%"><?php echo"$vdktt[PelakuNama]<br><b>$txt_01</b>"; ?></td>
                 <td width="46%">
				 <?php
					$vjdl = $ms_q("$call_sel JadwalDokter where DokterKode='$vdktt[PelakuKode]'");
					$vjdl_nr = $ms_nr($vjdl);
					while($vjdll = $ms_fas($vjdl)){
						if($vjdl_nr < 0 ){
							echo"Tidak Ada Praktik";
							}elseif($vjdl_nr > 0){
							echo"$vjdll[KetHari] $vjdll[KetJam]<br>";
					} }
						
			?>
				 </td>
               </tr>
			   <?php } ?>
             </table>
</body>
</html>
