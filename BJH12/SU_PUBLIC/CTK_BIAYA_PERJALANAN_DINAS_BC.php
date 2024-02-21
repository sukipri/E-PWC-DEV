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
			if($uu['akses']==5){
			 
		$IDKOP = @$sql_slash($_GET['IDKOP']);
				  $vkp = $ms_q("$call_sel tb_kop WHERE idmain_kop='$IDKOP'");
                        $vkpp = $ms_fas($vkp);
					 $vkpd = $ms_q("$call_sel tb_kop_detail WHERE idmain_kop='$IDKOP'");
                        $vkppd = $ms_fas($vkpd);

			?>
            <style>
			.fnt{font-size:1.2rem;}
			.fnt_hd{font-size:1.6rem; text-align:center; padding-right:17rem; font-weight:bold;}
			.pad_01{padding-left:1rem;}
			.pad_02{padding-left:2rem;}
			.pad_03{padding-left:10rem;}
			.pad_04{padding-left:9.3rem;}
			
			
			</style>
<body onLoad="window.print(); window.close();">
<div class="container">
	<div style="padding-top:11rem;"></div>
    
    <div class="fnt_hd"><u>BIAYA PERJALANAN DINAS</u><br>BPD</div>
    <br>
   <table border="0" width="100%">
   	<tr><td align="left">
    <table width="100%"   border="0"  class="fnt">
<tr>
                <td width="29%" height="37" valign="top">Nama</td>
                <td width="1%" valign="top">:</td>
                <td width="70%" valign="top"> 
                
                <?php
				$vkrp = $ms_q("$call_sel tb_kary_part WHERE idmain_kop='$IDKOP'");
					while($vkrrp = $ms_fas($vkrp)){
						$vem_02 = $ms_q("$sl KaryNomor,KaryNama,UnitKode,KaryJbtStruktural,KaryStatus FROM  TKaryawan WHERE KaryNomor='$vkrrp[idmain_kary]'");
									$vemm_02 = $ms_fas($vem_02);
					 ?>
					
					<?php echo"$vemm_02[KaryNama]<br>"; ?>
				<?php } ?>            </td>
          </tr>
              <tr>
                <td height="40">Jabatan Fungsional</td>
                <td valign="top">:</td>
                <td valign="top">
               
                <?php
				$vkrp_02 = $ms_q("$call_sel tb_kary_part WHERE idmain_kop='$IDKOP'");
					while($vkrrp_02 = $ms_fas($vkrp_02)){
						$vem_03 = $ms_q("$sl KaryNomor,KaryNama,UnitKode,KaryJbtStruktural,KaryStatus FROM  TKaryawan WHERE KaryNomor='$vkrrp_02[idmain_kary]'");
									$vemm_03 = $ms_fas($vem_03);
							$vdvp = $ms_q("$sl UnitKode,UnitNama FROM TUnitPrs WHERE UnitKode='$vemm_03[UnitKode]'");
									$vdvpp = $ms_fas($vdvp);
					 ?>
					
					<?php echo"$vdvpp[UnitNama] &nbsp;"; ?>
					<?php } ?>                </td>
              </tr>
              <tr>
                <td height="46">Jabatan Struktural</td>
                <td valign="top">:</td>
                <td valign="top">
                
                <?php
				
					$vkrp_03 = $ms_q("$sl jabatan_struk FROM tb_kary_part WHERE idmain_kop='$IDKOP'");
					while($vkrrp_03 = $ms_fas($vkrp_03)){
						echo"$vkrrp_03[jabatan_struk]";
					}
				?>
                </td>
              </tr>
              <tr>
                <td height="46">Acara</td>
                <td valign="top">:</td>
                <td valign="top">
                
                <?php echo"$vkppd[acara]"; ?> </td>
              </tr>
              <tr>
                <td height="51">Tempat</td>
                <td valign="top">&nbsp;</td>
                <td valign="top"><?php echo"$vkppd[tempat]"; ?></td>
              </tr>
              <tr>
                <td height="54">Tanggal</td>
                <td valign="top">:</td>
                <td valign="top"><?php echo"$vkppd[hari_tgl_tugas]"; ?></td>
              </tr>
              <tr>
                <td height="47">Sarana Transportasi</td>
                <td valign="top">:</td>
                <td valign="top"><?php echo"$vkppd[trans]"; ?></td>
              </tr>
              <tr>
                <td height="55">Biaya </td>
                <td valign="top">:</td>
                <td>
                  <table width="466" border="0" class="pad_01">
              <?php
				$vbjr = $ms_q("$call_sel tb_pembiayaan_rekam WHERE idmain_kop='$IDKOP' order by total_nominal desc");
					while($vbjrr = $ms_fas($vbjr)){
					$vbj_02 = $ms_q("$sl idmain_pembiayaan_jenis,kode,nama FROM tb_pembiayaan_jenis WHERE idmain_pembiayaan_jenis='$vbjrr[idmain_pembiayaan_jenis]'");
									$vbjj_02 = $ms_fas($vbj_02);
					$nom_vbjr = @$nf($vbjrr['total_nominal']);
					// echo"&nbsp;$vbjj_02[nama] : &nbsp;&nbsp;&nbsp;&nbsp;Rp.$nom_vbjr &nbsp;<i>$vbjrr[ket]</i><br>";
					 ?>
                   
                       
                              <tr>
                                <td width="162"><?php echo"$vbjj_02[nama]"; ?></td>
                                <td width="137"><?php echo"Rp.$nom_vbjr"; ?></td>
                                <td width="153"><?php echo"<i> Untuk $vbjrr[jml_orang] karyawan</i>"; ?></td>
                              </tr>
                              <tr>
                          
					 <?php }
					 	
					 	$jum_vbjr = @$ms_q("$sl sum(Convert(Integer,total_nominal)) as jum_nom FROM tb_pembiayaan_rekam WHERE idmain_kop='$IDKOP'");
							$jum_vbjrr = @$ms_fas($jum_vbjr);
							$nom_jum_vbjr = @$nf($jum_vbjrr['jum_nom']);
							
						//echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_____________+<br>";
						//echo"&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;  : &nbsp; Rp.$nom_jum_vbjr";
					?>
                          <td>&nbsp;</td>
                                <td colspan="2">_________________+<br><?php echo"Rp.$nom_jum_vbjr"; ?></td>
                              </tr>
                     </table>
                    
					       
                           
                      </td>
              </tr>
    </table>
</center>
			<br><br>
            <table width="66%" border="0" align="center" class="fnt">
              <tr>
                <td width="44%">
                <center>
                Mengetahui:<br>
                RS Panti Wilasa Citarum
                <br><br><br><br><br><br>
                <u><b>dr.Yohanes Mada.S.,Sp.PD</b></u><br>
                Direktur
                </center>
                
                </td>
                <td width="56%">
                <center>
                Semarang, <?php echo"$date_html5"; ?>
                <br><br><br><br><br><br>
                <u><b>Tjahjani Wulandari, S.Psi</b></u><br>
                Kabag
                </center>
                </td>
              </tr>
            </table>
  </td></td></table>
 </div>
</body>
<?php
		}else{
		  include'../logic/H_LOCATION.php';
		} }
		ob_flush();
	?>
