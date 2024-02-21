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
						//TGL//
								$vkppd_tgl = $ms_q("$sl convert(varchar(30),[tgl_data],103) as tgl_dt FROM tb_kop_in_detail WHERE idmain_kop='$IDKOP'");
                       			 $vkppdd_tgl = $ms_fas($vkppd_tgl);
								 //
							$vkr_02 = $ms_q("$sl KaryNomor,KaryNama FROM TKaryawan WHERE KaryNomor='$vkppd[KaryNomor]'");
								$vkrr_02 = $ms_fas($vkr_02);

			?>
<body>
<table width="100%" border="0" class="table">
          <tr class="table-primary">
            <td width="40%"><?php echo"<b>$vkppd[ruang] $vkppdd_tgl[tgl_dt]</b><br>Agenda $vkppd[agenda]"; ?></td>
            <td width="27%"><?php echo"<b>PIC</b> $vkrr_02[KaryNama]<br>Peserta Terlampir"; ?> </td>
            <td width="33%"></td>
      </tr>

    </table>
    <div class="container">
    <table width="100%" border="0" class="table table-bordered">
      <tr class="table-primary">
        <td width="40%">NAMA</td>
        <td width="27%">BAGIAN</td>
        <td width="33%">TTD</td>
      </tr>
      <?php
	
						$vkrp_03 = $ms_q("$call_sel tb_kary_part WHERE idmain_kop='$IDKOP'");
											$jum_vkrp_03 = $ms_nr($vkrp_03);
												while($vkrrp_03 = $ms_fas($vkrp_03)){
													$vem_02_in_02 = $ms_q("$sl KaryNomor,KaryNama,KaryAlamat FROM  TKaryawan WHERE KaryNomor='$vkrrp_03[idmain_kary]'");
																$vemm_02_in_02 = $ms_fas($vem_02_in_02);
					?>
      <tr>
        <td><?php echo"$vemm_02_in_02[KaryNama]"; ?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
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
