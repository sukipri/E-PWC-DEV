<?php
		//error_reporting(0);
		ob_start();
		session_start();
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	 	   include'../logic/H_LOCATION.php';
			} else {
		include"css.php";
		include"../CONFIG_INTERNAL.php";
		//User assigment
		$u = $ms_q("select * from TBUser where namauser='$_SESSION[namauser]'");
		$uu = $ms_fas($u);
			if($uu['akses']==5 || $uu['akses']==51 || $uu['akses']==52 ){
			 
		$IDKOP = @$sql_slash($_GET['IDKOP']);
				  $vkp = $ms_q("$call_sel tb_kop WHERE idmain_kop='$IDKOP'");
                        $vkpp = $ms_fas($vkp);
					 $vkpd = $ms_q("$call_sel tb_kop_in_detail WHERE idmain_kop='$IDKOP'");
                        $vkppd = $ms_fas($vkpd);
							$vkr_02 = $ms_q("$sl KaryNomor,KaryNama FROM TKaryawan WHERE KaryNomor='$vkppd[KaryNomor]'");
								$vkrr_02 = $ms_fas($vkr_02);
								
			//GET
				$IDUNIT = @$sql_slash($_GET['IDUNIT']);

			?>
<body onLoad="window.print(); window.close();">
<!-- content -->
	<div class="container">
<table width="100%" class="table table-bordered" border="0">
	<?php 
		$vun = $ms_q("$call_sel TUnitPrs WHERE UnitKode='$IDUNIT' ");
			while($vunn = $ms_fas($vun)){
	?>
	  <tr class="table-info">
	  
	    <td width="91%"><?php echo"$vunn[UnitNama]"; ?></td>
          <td width="9%">&nbsp;</td>
  </tr>
	  <tr>
	 
	    <td height="33" colspan="2">
        <?php 
			$vkry_up = $ms_q("$sl KaryNomor,KaryNama,KaryTglLahir FROM TKaryawan WHERE NOT KaryStatus='91' AND NOT KaryStatus='99'  AND NOT KaryStatus='92'  AND NOT KaryStatus='94'  AND NOT KaryStatus='93' AND UnitKode='$vunn[UnitKode]' order by  KaryNama asc  "); 
			$no = 1;    
				while($vkryy_up = $ms_fas($vkry_up)){  
				$vtbu = $ms_q("$call_sel TBUser WHERE kode='$vkryy_up[KaryNomor]'");
							$vtbuu = $ms_fas($vtbu);
				
		?>
        	<?php echo"<b>Nama</b> $vkryy_up[KaryNama] <b>$vkryy_up[KaryNomor]</b><br>Usernama //$vtbuu[namauser]<br> Password //$vtbuu[password_text]<hr>"; ?>
        <?php } ?>
        </td>
  </tr>
  <?php } ?>
</table>
</div>
</body>
<?php
		}else{
		  include'../logic/H_LOCATION.php';
		} }
		ob_flush();
	?>