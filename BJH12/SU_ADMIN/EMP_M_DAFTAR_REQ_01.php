<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
	<b>#Permintaan pergantian profil</b>
    <table width="100%" border="0" class="table table-bordered table-striped table-sm" style="max-width:40rem;">
          <tr class="table-info">
            <td width="26%">NIK</td>
            <td width="56%">Nama</td>
            <td width="18%">Aksi</td>
          </tr>
         <?php 
		 	$vkry01_sw = $ms_q("$sl KaryNomor,KaryNama,status FROM TKaryawan WHERE status='1'");
				while($vkry01_sww = $ms_fas($vkry01_sw)){
		 ?>
          <tr>
            <td><?php echo"$vkry01_sww[KaryNomor]"; ?></td>
            <td><?php echo"$vkry01_sww[KaryNama]"; ?></td>
            <td align="center"><a href="<?php echo"?HLM=EMP_M&SUB=EMP_M_EMP_UPDATE&IDEMP=$vkry01_sww[KaryNomor]"; ?>" class="btn btn-success">Validasi</a></td>
          </tr>
          <?php } ?>
	</table>

</body>
<?php } ?>