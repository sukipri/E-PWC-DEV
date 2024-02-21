<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
<table width="100%" class="table table-bordered" border="0">
	<?php 
		$vun = $ms_q("$call_sel TUnitPrs order by UnitNama");
			while($vunn = $ms_fas($vun)){
	?>
	  <tr class="table-info">
	  
	    <td width="91%"><?php echo"$vunn[UnitNama]"; ?></td>
          <td width="9%"><a href="<?php echo"../SU_PUBLIC/CTK_EMP_AKUN_BAG.php?IDUNIT=$vunn[UnitKode]"; ?>" target="_blank" class="btn btn-warning"><i class="fas fa-clipboard"></i>&nbsp;Cetak</a></td>
  </tr>
	  <tr>
	 
	    <td height="33" colspan="2">
        <?php 
			$vkry_up = $ms_q("$sl KaryNomor,KaryNama,KaryTglLahir,UnitKode FROM TKaryawan WHERE NOT KaryStatus='91' AND NOT KaryStatus='99'  AND NOT KaryStatus='92'  AND NOT KaryStatus='94'  AND NOT KaryStatus='93' AND UnitKode='$vunn[UnitKode]' order by  KaryNama asc  "); 
			$no = 1;    
				while($vkryy_up = $ms_fas($vkry_up)){  
				$vtbu = $ms_q("$call_sel TBUser WHERE kode='$vkryy_up[KaryNomor]'");
							$vtbuu = $ms_fas($vtbu);
				
		?>
        	<?php echo"<b>Nama</b> $vkryy_up[KaryNama] <b>$vkryy_up[KaryNomor]</b><br>Usernama //$vtbuu[namauser]<br> Password //$vtbuu[password_text]<br><br> <a href=../SU_PUBLIC/CTK_EMP_AKUN_KARY.php?IDKARY=$vkryy_up[KaryNomor]&IDUNIT=$vkryy_up[UnitKode] target=_blank>#Cetak Akun</a><hr>"; ?>
        <?php } ?>
        </td>
  </tr>
  <?php } ?>
</table>
</body>
<?php } ?>