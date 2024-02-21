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
	.garis_hori{
				border: 0.8px black solid;
				height: 0px;
				width: 225px;
			}
			.garis_hori_dr{
				border: 0.8px black solid;
				height: 0px;
				width: 240px;
			}
			.under { text-decoration: underline; }
			.over  { text-decoration: overline; width:20px; }
			
			.fnt{font-size:1.3rem;}
			.fnt_02{font-size:2rem;}
			.fnt_hd{font-size:1.6rem; text-align:center; padding-right:17rem; font-weight:bold;}
	.pd {padding:10px;}
	</style>
<body onLoad="window.print();">
	<div style="padding-top:6rem;;"></div>
    <br><br><br><br><br>
  <div class="fnt container">
		<h2 style="text-align:center">SURAT TUGAS PERJALANAN DINAS</h2>
       <?php echo"Nomor : $vkpp[kop]"; ?> 	
      <table width="100%" border="0" class="fnt table table-bordered" fnt>
      <tr class=" pd">
            <td width="4%" height="47" align="center">1</td>
            <td width="44%">Pejabat yg berwenang memberikan tugas</td>
        <td width="52%">Direktur RS Panti Wilasa Citarum</td>
        </tr>
          <tr>
            <td height="50" align="center">2</td>
            <td>karyawan yang diberi tugas</td>
            <td>
            <ol>
             <?php
				$vkrp = $ms_q("$call_sel tb_kary_part WHERE idmain_kop='$IDKOP' order by urut asc");
					while($vkrrp = $ms_fas($vkrp)){
						$vem_02 = $ms_q("$sl KaryNomor,KaryNama,UnitKode,KaryJbtStruktural,KaryStatus FROM  TKaryawan WHERE KaryNomor='$vkrrp[idmain_kary]'");
									$vemm_02 = $ms_fas($vem_02);
					 ?>
					
					<?php echo"<li>$vemm_02[KaryNama]</li>"; ?>
			<?php } ?>   </ol>         </td>
          </tr>
          <tr>
            <td height="53" align="center">3</td>
            <td>Jabatan / Pekerjaan Bagian</td>
            <td>
         <ol>
         <?php
		 	$vkrp02 = $ms_q("$call_sel tb_kary_part WHERE idmain_kop='$IDKOP' order by urut asc");
					while($vkrrp02 = $ms_fas($vkrp02)){
							$vvar03_sw = $ms_q("$call_sel tb_kary_var_dtl WHERE idmain_var_dtl='$vkrrp02[jabatan_struk]'");
								$vvar03_sww = $ms_fas($vvar03_sw);
						
						/*
				$vem_04 = $ms_q("$sl KaryNomor,KaryNama,UnitKode,KaryJbtStruktural,KaryStatus,KaryNoUrut FROM  TKaryawan WHERE KaryNomor='$vkrrp02[idmain_kary]'");
									$vemm_04 = $ms_fas($vem_04);
							$vvar02_sw = $ms_q("$call_sel TKaryVar WHERE VarKode='$vemm_04[KaryNoUrut]'");
								$vvar02_sww = $ms_fas($vvar02_sw);
									$vvar03_sw = $ms_q("$call_sel TKaryVar WHERE VarKode='$vemm_04[KaryJbtStruktural]'");
										$vvar03_sww = $ms_fas($vvar03_sw);
											 $vdvp = $ms_q(" $sl UnitKode,UnitNama FROM TUnitPrs  WHERE UnitKode='$vemm_04[UnitKode]'");
														$vdvpp = $ms_fas($vdvp);
											*/					
						echo"<li> $vvar03_sww[nama] </li>";
						
					}
				
				?>
                </ol>
             </td>
          </tr>
          <!--
          <tr>
            <td height="41" align="center">4</td>
            <td>Tujuan</td>
            <td><?php echo"$vkppd[acara]"; //echo"$vkppd[tujuan]";  ?></td>
          </tr>
          -->
          <tr>
            <td height="41" align="center">4</td>
            <td>
            Pelaksanaan Kegiatan:<br>
            <ul><li>Hari / Tanggal</li><li>Jam</li><li>Tempat</li><li>Acara</li></ul>            </td>
            <td>
            <?php echo"<br><ul><li>$vkppd[hari_tgl_tugas]</li><li>$vkppd[jam]</li><li>$vkppd[tempat]</li><li>$vkppd[acara]</li></ul>"; ?>  
            </td>
          </tr>
          <!--
          <tr>
            <td height="43" align="center">6</td>
            <td>Tempat Berangkat</td>
            <td><?php //echo"$vkppd[stasiun]"; ?></td>
          </tr>
      
          <tr>
            <td height="39" align="center">7</td>
            <td>Hari / Tgl / Jam Berangkat </td>
            <td><?php //echo"$vkppd[hari_tgl_go]"; ?></td>
          </tr>
          <tr>
            <td height="47" align="center">8</td>
            <td>Hari / Tgl / Jam Kembali</td>
            <td><?php //echo"$vkppd[hari_tgl_out]"; ?></td>
          </tr>
              -->
          <tr>
            <td height="34" align="center">5</td>
            <td>SaranaTransportasi</td>
            <td><?php echo"$vkppd[trans]"; ?></td>
          </tr>
          <!--
          <tr>
            <td height="53" align="center">10</td>
            <td>Pengantar</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="42" align="center">11</td>
            <td>Pembebanan Anggaran</td>
            <td><?php echo"$vkppd[penanggung]"; ?></td>
          </tr>
          -->
          <tr>
            <td height="42" align="center">6</td>
            <td>Keterangan Lain-lain</td>
            <td>
            <b>Setelah selesai Pelatihan :</b>
            <ol>
			<?php 
				//echo"$vkppd[ket]";
				
					$vctr_02 = $ms_q("$call_sel tb_cat_rekam WHERE idmain_kop='$IDKOP'");
						while( $vctrr_02 = $ms_fas($vctr_02)){
							$vct_03 = $ms_q("$call_sel tb_cat_tugas WHERE idmain_cat_tugas='$vctrr_02[idmain_cat_tugas]'");
								 $vctt_03 = $ms_fas($vct_03);
								echo"<li>$vctt_03[isi]</li>";
							
						}
			 ?>
             </ol>
            </td>
          </tr>
          </table>
          <br>
<table width="100%" border="0" class="fnt">
          <tr>
            <td width="2%" height="101">&nbsp;</td>
            <td width="50%">
            Tiba di tempat tujuan:<br>
            Tanggal__________Jam________WIB <br>
            Yang menerima,
            <br><br><br><br><br><br>
            
            
            
            __________________________
            <br><br>
            Tembusan: <br>
            <ol>
			  <?php
			  
				$vkrt = $ms_q("$call_sel tb_kary_tembusan WHERE idmain_kop='$IDKOP' order by urut asc");
					while($vkrrt = $ms_fas($vkrt)){
					
					 ?>
					
					<li><?php echo"$vkrrt[nama]"; ?></li>
			<?php } ?> 
            		<li>Arsip</li>
            </ol>   
            </td>
            <td width="48%" valign="top">
            <center>
            Dikeluarkan di : Semarang<br>
            Pada tanggal : <?php echo"$text_date"; ?>
            <br>RS Panti Wilasa Citarum<br>
            an.Direktur
            <br><br><br><br><br><br>
            
            <center>drg. Kriswidiati, M.Kes <div class="garis_hori_dr"></div> 
            Wadir Pelayanan Medis</center>
            </td>
    </tr>
        </table>
</div>
</body>
<?php
		}else{
		  include'../logic/H_LOCATION.php';
		} }
		ob_flush();
	?>

