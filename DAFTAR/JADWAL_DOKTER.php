<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<?php
	include"config.php"; 
	include"css.php"; 
	?>

<body>
	<?php include"MENU.php"; ?>
		<div class="container">
	<!-- content -->
	<br><br>
	<table width="100%"  border="0" class="table table-bordered">
          <tr class="info">
            <td width="2%">#</td>
            <td width="44%">Nama Dokter</td>
            <td width="54%">Praktik</td>
          </tr>
		  	<?php
				$vdkt =  $ms_q("$call_sel TPelaku where PelakuStatus='A' order by PelakuNama asc");
				$no = 1;
							while($vdktt = $ms_fas($vdkt)){
				
			?>
          <tr>
            <td><?php echo"$no"; ?></td>
            <td><?php echo"$vdktt[PelakuNama]"; ?></td>
            <td>
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
		  <?php $no++; } ?>
        </table>
		</div>
<?php include"footer.php"; ?>
</body>
</html>
