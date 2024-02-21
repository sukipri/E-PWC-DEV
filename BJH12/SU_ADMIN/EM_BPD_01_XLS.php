<?php
		//error_reporting(0);
		ob_start();
		session_start();
        include"../secure/GR_01.php"; //security enggine
         include"../sc/ID_IDF.php";  //Identifer ID PAGE
       //include"../css.php";   //style and control title meta
        include"../sc/stack_Q.php"; //Query SQL
        include"../sc/code_rand.php";
        include"../config/connec_01_srv.php";
        include"../config/connec_01_srv_pdo_open.php";
        include"../sc/CODE_GET.php";
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	 	   include'../logic/H_LOCATION.php';
			} else {
                
		//User assigment
		$u = $ms_q("select * from TBUser where namauser='$_SESSION[namauser]'");
		$uu = $ms_fas($u);
			if($uu['akses']==5){
				  $vkp = $ms_q("$call_sel tb_kop WHERE idmain_kop='$IDKOP01'");
                        $vkpp = $ms_fas($vkp);
					 $vkpd = $ms_q("$call_sel tb_kop_detail WHERE idmain_kop='$IDKOP01'");
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
			.fnt_hd{font-size:1.6rem;   font-weight:bold;}
			.pad_01{padding-left:1rem;}
			.pad_02{padding-left:2rem;}
			.pad_03{padding-left:10rem;}
			.pad_04{padding-left:9.3rem;}
			
			
			</style>
            <!-- <body onLoad="window.print(); window.close();"> -->
<body onLoad="window.print();">

 <br>
	<div style="padding-top:11rem;"></div>
    
    	<center><div class="fnt_hd"><u>BIAYA PERJALANAN DINAS</u>&nbsp;(BPD)</div><?php echo"STPD $vkpp[kop]"; ?>  </center>
    <br>
   <table border="0" width="100%">
   	<tr>
   	  <td align="left">
    <table width="100%"   border="0"  class="fnt">
<tr>
                <td width="29%" height="37" valign="top">Nama</td>
                <td width="1%" valign="top">:</td>
                <td width="70%" valign="top"> 
           
                <?php
				$vkrp = $ms_q("$call_sel tb_kary_part WHERE idmain_kop='$IDKOP01' order by urut asc");
					while($vkrrp = $ms_fas($vkrp)){
						$vem_02 = $ms_q("$sl KaryNomor,KaryNama,UnitKode,KaryJbtStruktural,KaryStatus FROM  TKaryawan WHERE KaryNomor='$vkrrp[idmain_kary]'");
									$vemm_02 = $ms_fas($vem_02);
					 ?>
					
					<?php echo"$vemm_02[KaryNama]<br>"; ?>
				<?php } ?>           </td>
          </tr>
          <!--
              <tr>
                <td height="40" valign="top">Jabatan Fungsional</td>
                <td valign="top">:</td>
                <td valign="top">
               
                <?php
				/*
				$vkrp_02 = $ms_q("$call_sel tb_kary_part WHERE idmain_kop='$IDKOP01'");
				$no_jbt = 1;
					while($vkrrp_02 = $ms_fas($vkrp_02)){
						$vem_03 = $ms_q("$sl KaryNomor,KaryNama,UnitKode,KaryJbtStruktural,KaryStatus FROM  TKaryawan WHERE KaryNomor='$vkrrp_02[idmain_kary]'");
									$vemm_03 = $ms_fas($vem_03);
							$vvar_sw = $ms_q("$call_sel TKaryVar WHERE VarKode='$vemm_03[KaryJbtStruktural]'");
								$vvar_sww = $ms_fas($vvar_sw);
					 ?>
					
					<?php echo"$no_jbt.$vvar_sww[VarNama] &nbsp;"; ?>
					<?php $no_jbt++; } */?>                </td>
              </tr>
              <tr>
                <td height="46" valign="top">Jabatan Struktural</td>
                <td valign="top">:</td>
                <td valign="top">
                
                <?php
				/*
					$vkrp_03 = $ms_q("$sl idmain_kary,jabatan_struk FROM tb_kary_part WHERE idmain_kop='$IDKOP01'");
						$no_struk = 1;
					while($vkrrp_03 = $ms_fas($vkrp_03)){
							$vem_04 = $ms_q("$sl KaryNomor,KaryNama,UnitKode,KaryJbtStruktural,KaryStatus,KaryNoUrut FROM  TKaryawan WHERE KaryNomor='$vkrrp_03[idmain_kary]'");
									$vemm_04 = $ms_fas($vem_04);
							$vvar02_sw = $ms_q("$call_sel TKaryVar WHERE VarKode='$vemm_04[KaryNoUrut]'");
								$vvar02_sww = $ms_fas($vvar02_sw);
						echo"$no_struk.$vvar02_sww[VarNama] &nbsp;";
					$no_struk++;}
					*/
				?>
                </td>
              </tr>
              -->
              <tr>
                <td height="46" valign="top">Acara</td>
                <td valign="top">:</td>
                <td valign="top">
                
                <?php echo"$vkppd[acara]"; ?> </td>
              </tr>
              <tr>
                <td height="51" valign="top">Tempat</td>
                <td valign="top">:</td>
                <td valign="top"><?php echo"$vkppd[tempat]"; ?></td>
              </tr>
              <tr>
                <td height="54" valign="top">Hari &amp; Tanggal</td>
                <td valign="top">:</td>
                <td valign="top"><?php echo"$vkppd[hari_tgl_tugas]"; ?></td>
              </tr>
              <tr>
                <td height="47" valign="top">Jam Pelaksanaan</td>
                <td valign="top">:</td>
                <td valign="top"><?php echo"$vkppd[jam]"; ?></td>
              </tr>
              <tr>
                <td height="47" valign="top">Sarana Transportasi</td>
                <td valign="top">:</td>
                <td valign="top"><?php echo"$vkppd[trans]"; ?></td>
              </tr>
              <tr>
                <td height="55" colspan="3">
                <!-- -->
                 <table width="100%" border="1" class="table table-bordered">
                  <tr>
                    <td width="2%" align="center">No</td>
                    <td width="12%" align="center">Nama</td>
                    <td width="10%" align="center">Jabatan</td>
                    <!-- <td width="10%" align="center">Unit</td> -->
                    <td width="10%" align="center">Gol</td>
              		 <td width="10%" align="center">Saku</td>
                     <td width="10%" align="center">Makan</td>
                     <td width="10%" align="center">Transportasi</td>
                     <td width="10%" align="center">Pendaftaran</td>
                     <td width="10%" align="center">Akomodasi</td>
                     <td width="10%" align="center">Total</td>
           
                  </tr>
                  <?php 
				  	$vpart02_sw = $ms_q("$call_sel  tb_kary_part WHERE idmain_kop='$IDKOP01' order by urut asc");
						$no = 1;
							while($vpart02_sww = $ms_fas($vpart02_sw)){
									$vkry03_sw = $ms_q("$sl KaryNomor,KaryNama,KaryPangkat FROM TKaryawan WHERE KaryNomor='$vpart02_sww[idmain_kary]'");
										$vkry03_sww = $ms_fas($vkry03_sw);
				  ?>
                  <tr>
                    <td align="center"><?php echo"$no"; ?></td>
                    <td align="center"><?php echo"$vkry03_sww[KaryNama]"; ?></td>
                    <td align="center">
                     <?php
					 	$vvar03_sw = $ms_q("$call_sel tb_kary_var_dtl WHERE idmain_var_dtl='$vpart02_sww[jabatan_struk]'");
								$vvar03_sww = $ms_fas($vvar03_sw);
				/*
					$vem_04 = $ms_q("$sl KaryNomor,KaryNama,UnitKode,KaryJbtStruktural,KaryStatus,KaryNoUrut FROM  TKaryawan WHERE KaryNomor='$vpart02_sww[idmain_kary]'");
									$vemm_04 = $ms_fas($vem_04);
							$vvar02_sw = $ms_q("$call_sel TKaryVar WHERE VarKode='$vemm_04[KaryNoUrut]'");
								$vvar02_sww = $ms_fas($vvar02_sw);
									$vvar03_sw = $ms_q("$call_sel TKaryVar WHERE VarKode='$vemm_04[KaryJbtStruktural]'");
										$vvar03_sww = $ms_fas($vvar03_sw);
										*/
						echo"$vvar03_sww[nama]";
				
				?>
                    </td>
                    <!--
                    <td align="center">
                    <?php
                    //$vdvp = $ms_q(" $sl UnitKode,UnitNama FROM TUnitPrs  WHERE UnitKode='$vemm_04[UnitKode]'");
														//$vdvpp = $ms_fas($vdvp);
										//echo"$vdvpp[UnitNama]";
					?>
                    </td>
                    -->
                    <td align="center"><?php echo"$vkry03_sww[KaryPangkat]"; ?></td>
                    <td align="center">
                    	<?php
							$vpr_sw = $ms_q("$sl total_nominal FROM tb_pembiayaan_rekam WHERE idmain_kary='$vpart02_sww[idmain_kary]' AND idmain_kop='$IDKOP01' AND idmain_pembiayaan_jenis='265415647190429090810'");
								$vpr_sww = $ms_fas($vpr_sw);
									$nom_vpr_sw = $nf($vpr_sww['total_nominal']);
										echo"Rp.$nom_vpr_sw";
						?>
                    </td>
                    <td align="center">
                    <?php
							$vpr02_sw = $ms_q("$sl total_nominal FROM tb_pembiayaan_rekam WHERE idmain_kary='$vpart02_sww[idmain_kary]' AND idmain_kop='$IDKOP01' AND idmain_pembiayaan_jenis='920415612190429090843'");
								$vpr02_sww = $ms_fas($vpr02_sw);
									$nom_vpr02_sw = $nf($vpr02_sww['total_nominal']);
										echo"Rp.$nom_vpr02_sw";
						?>
                    </td>
                    <td align="center">
                       <?php
							$vpr03_sw = $ms_q("$sl total_nominal FROM tb_pembiayaan_rekam WHERE idmain_kary='$vpart02_sww[idmain_kary]' AND idmain_kop='$IDKOP01' AND idmain_pembiayaan_jenis='118426834190914124607'");
								$vpr03_sww = $ms_fas($vpr03_sw);
									$nom_vpr03_sw = $nf($vpr03_sww['total_nominal']);
										echo"Rp.$nom_vpr03_sw";
						?>
                    </td>
                    <td align="center">
                      <?php
							$vpr04_sw= $ms_q("$sl total_nominal FROM tb_pembiayaan_rekam WHERE idmain_kary='$vpart02_sww[idmain_kary]' AND idmain_kop='$IDKOP01' AND idmain_pembiayaan_jenis='-1390810459190914124415'");
								$vpr04_sww = $ms_fas($vpr04_sw);
									$nom_vpr04_sw = $nf($vpr04_sww['total_nominal']);
										echo"Rp.$nom_vpr04_sw";
						?>
                    </td>
                    <td align="center">
                      <?php
							$vpr05_sw= $ms_q("$sl total_nominal FROM tb_pembiayaan_rekam WHERE idmain_kary='$vpart02_sww[idmain_kary]' AND idmain_kop='$IDKOP01' AND idmain_pembiayaan_jenis='-1343132645190914124405'");
								$vpr05_sww = $ms_fas($vpr05_sw);
									$nom_vpr05_sw = $nf($vpr05_sww['total_nominal']);
										echo"Rp.$nom_vpr05_sw";
						?>
                    </td>
                    <td align="center">
                     <?php
							$vpr06_sw= $ms_q("$sl sum(Convert(Integer,total_nominal)) as tot_pem FROM tb_pembiayaan_rekam WHERE idmain_kary='$vpart02_sww[idmain_kary]' AND idmain_kop='$IDKOP01' ");
								$vpr06_sww = $ms_fas($vpr06_sw);
									$nom_vpr06_sw = $nf($vpr06_sww['tot_pem']);
										echo"Rp.$nom_vpr06_sw";
						?>
                    
                    </td>
                  </tr>
                 
                  <?php $no++;} ?>
                   <tr>
                    <td colspan="9" align="center">Total Keseluruhan</td>
                    <td align="center">
                      <?php
							$vpr07_sw= $ms_q("$sl sum(Convert(Integer,total_nominal)) as tot_pem FROM tb_pembiayaan_rekam WHERE   idmain_kop='$IDKOP01'");
								$vpr07_sww = $ms_fas($vpr07_sw);
									$nom_vpr07_sw = $nf($vpr07_sww['tot_pem']);
										echo"Rp.$nom_vpr07_sw";
						?>
                    </td>
                  </tr>
                 </table>
                 <!-- -->
                
               </td>
              </tr>
    </table>
</center>
			<br><br>
            <table width="100%" border="0" align="center" class="fnt">
              <tr>
                <td width="44%" align="center">
              
                Mengetahui:<br>
                RS Panti Wilasa Citarum<br>
                <br><br><br><br><br><br>
               <b>dr.Yohanes Mada.S.,Sp.PD , FINASIM</b><div class="garis_hori_dr"></div>
                Direktur
               
                
                </td>
                <td width="56%" align="center">
              
                Semarang, <?php echo"$text_date"; ?>
                <br><br><br><br><br><br><br><br>
                <b>Tjahjani Wulandari, S.Psi</b><div class="garis_hori_dr"></div>
                Kabag
               
                SDM</td>
              </tr>
            </table>
  </td></td></table>
		<?php //echo tanggal_indo('2016-03-20'); // 20 Maret 2016 ?>
</body>
<?php
		}else{
		  include'../logic/H_LOCATION.php';
		} }
		ob_flush();
        
	?>
