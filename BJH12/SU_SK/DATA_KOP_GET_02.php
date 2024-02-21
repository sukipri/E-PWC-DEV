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
			if($uu['akses']==51){ 
		
			?>
<body>
	<?php
	
		$IDDT = @$sql_slash($_GET['IDDT']); 
		//$IDDT = @$sql_slash($_GET['IDDT']); 
				
				
	?>
    <h5>Daftar Agenda Tugas / Rapat</h5>
<table width="200" border="0" class="table table-bordered table-striped">
<?php
			$vkp = $ms_q("$call_sel tb_kop WHERE tgl_input = '$IDDT 00:00:00.000'");
                    					   while($vkpp = $ms_fas($vkp)){
?>
          <tr>
            <td>
            <?php
			
			echo"<b>$vkpp[kop]</b>";
				echo"<br> $vkpp[ket] ";
					echo"<br>$vkpp[tgl_input]";
		if($vkpp['app']==2){?> 
			<span class="badge badge-primary">Proses</span>
            <?php }elseif($vkpp['app']==4){ ?>
            <span class="badge badge-success">Verif</span>
				
			<?php }?>
            	<a href="<?php echo"../SU_PUBLIC/CTK_AGENDA.php?IDKOP=$vkpp[idmain_kop]"; ?>"><i class="fas fa-print"></i>&nbsp;Cetak</a>
             <hr style="max-width:40rem;">
            		<?php
						$vkop_in = mssql_query("select * from tb_kop_in_detail WHERE idmain_kop='$vkpp[idmain_kop]'");
					while($vkopp_in = mssql_fetch_assoc($vkop_in)){
				
					?>
					
                        <?php echo"<i>$vkopp_in[agenda]</i>"; ?> &nbsp;<i class="far fa-calendar-alt"></i>&nbsp;<?PHP echo"$vkopp_in[tgl_data]"; ?>
                        		<?php
											$vkrp_02 = $ms_q("$call_sel tb_kary_part WHERE idmain_kop='$vkopp_in[idmain_kop]'");
											echo"<ol>";
												$jum_vkrp_02 = $ms_nr($vkrp_02);
												while($vkrrp_02 = $ms_fas($vkrp_02)){
													$vem_02_in = $ms_q("$sl KaryNomor,KaryNama,KaryAlamat FROM  TKaryawan WHERE KaryNomor='$vkrrp_02[idmain_kary]'");
																$vemm_02_in = $ms_fas($vem_02_in);
														echo"<li>$vemm_02_in[KaryNama]</li>";
											}
											echo"</ol>";
								?>
						<?php }
				$vkop_in_02 = mssql_query("select * from tb_kop_detail WHERE idmain_kop='$vkpp[idmain_kop]'");
					while($vkopp_in_02 = mssql_fetch_assoc($vkop_in_02)){
					?>
					 <?php echo"<i>$vkopp_in_02[acara]</i>"; ?> &nbsp;<i class="far fa-calendar-alt"></i>&nbsp;<?PHP echo"$vkopp_in_02[hari_tgl_tugas]"; ?>
                     <?php
											$vkrp_03 = $ms_q("$call_sel tb_kary_part WHERE idmain_kop='$vkopp_in_02[idmain_kop]'");
											echo"<ol>";
												$jum_vkrp_03 = $ms_nr($vkrp_03);
												while($vkrrp_03 = $ms_fas($vkrp_03)){
													$vem_02_in_02 = $ms_q("$sl KaryNomor,KaryNama,KaryAlamat FROM  TKaryawan WHERE KaryNomor='$vkrrp_03[idmain_kary]'");
																$vemm_02_in_02 = $ms_fas($vem_02_in_02);
														echo"<li>$vemm_02_in_02[KaryNama]</li>";
											}
											echo"</ol>";
								?>
					<?php } ?>
             </td>
          </tr>
               <?php } ?>
        </table>
    
</body>
	<?php
		}else{
		  include'../logic/H_LOCATION.php';
		} }
		ob_flush();
	?>

