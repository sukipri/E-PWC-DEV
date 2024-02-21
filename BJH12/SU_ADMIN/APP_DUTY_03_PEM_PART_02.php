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
		
			?>
            
            <?php 
				$IDKOP = @$sql_slash($_GET['IDKOP']);
				$IDKRY = @$sql_slash($_GET['IDKRY']);
					$vkp = $ms_q("$call_sel tb_kop WHERE idmain_kop='$IDKOP'");
                        $vkpp = $ms_fas($vkp);
							 $vkpd = $ms_q("$call_sel tb_kop_detail WHERE idmain_kop='$IDKOP'");
                       			 $vkppd = $ms_fas($vkpd);
									$vkry02_sw = $ms_q("$sl KaryNomor,KaryNama,KaryPangkat FROM TKaryawan WHERE KaryNomor='$IDKRY' ");
										$vkry02_sww = $ms_fas($vkry02_sw);
											$vpart01_sw= $ms_q("$call_sel  tb_kary_part WHERE idmain_kop='$IDKOP' AND idmain_kary='$IDKRY'");
												$vpart01_sww = $ms_fas($vpart01_sw);
			
			?>
<body>
<br>
	<div class="container">
    <form method="post" action="">
		<a href="<?php echo"APP_DUTY_03_PEM_PART.php?IDKOP=$IDKOP"; ?>" class="btn btn-warning"><i class="fas fa-angle-double-left"></i></a> &nbsp; <?php echo"<b>#Peserta & Pembiyaan</b> $vkry02_sww[KaryNama]"; ?> &nbsp; <a href="<?php echo"APP_DUTY_03_PEM_PART_02.php?IDKOP=$IDKOP&IDKRY=$IDKRY"; ?>"><i class="fas fa-sync"></i>&nbsp;Reload</a> &nbsp; <a href="<?php echo"APP_DUTY_03_PEM_DIV_01.php?IDKOP=$IDKOP&IDKRY=$IDKRY&IDPART=$vpart01_sww[idmain_kary_part]"; ?>" class="btn btn-info btn-sm"><i class="far fa-file"></i>&nbsp;Ket Jab,Urutan & Tgl</a>
      	<br><br>
      <table width="100%" style="max-width:50rem;" class="table table-bordered" border="0">
          <tr>
            <td width="29%">NIK<br><input type="text" class="form-control" value="<?php echo"$vkry02_sww[KaryNomor]"; ?>"></td>
            <td width="21%">J.SKP<br><input type="text" name="skp" class="form-control" value="<?php echo" $vkppd[skp]"; ?>"></td>
            <td width="22%">J.Pelatihan<br><input type="text" name="jam_pel" class="form-control" value="<?php echo" $vkppd[jam_pel]"; ?>"></td>
            <td></td>
          </tr>
          <tr>
            <td>
            	Pembiayaan<br>
            	<select name="kode_pem" class="form-control">
                	<option value=""></option>
                    <?php
						$vjpem_sw = $ms_q("$call_sel tb_pembiayaan_jenis order by nama asc");
							while($vjpem_sww = $ms_fas($vjpem_sw)){
								echo"<option value=$vjpem_sww[idmain_pembiayaan_jenis]>$vjpem_sww[nama]</option>";	
							}
					?>
                </select>
            </td>
            <td>Nominal<br><input type="number" name="nom" class="form-control"></td>
            <td>Hari<br><input type="number" name="jml_hari" class="form-control"></td>
            <td>&nbsp;</td>
          </tr>
      </table>
      <button name="simpan"  class="btn btn-success"><i class="fas fa-save"></i>&nbsp;Simpan</button>
  
    </form> 
    	<hr>
        
      <?php
				$vpbr_02 = $ms_q("$call_sel tb_pembiayaan_rekam WHERE idmain_kop='$IDKOP' AND idmain_kary='$IDKRY'");
						while($vpbrr_02 = $ms_fas($vpbr_02)){
									$vpbj_02 = $ms_q("$call_sel tb_pembiayaan_jenis WHERE idmain_pembiayaan_jenis='$vpbrr_02[idmain_pembiayaan_jenis]' ");
										$vpbjj_02 = $ms_fas($vpbj_02);
							$hit_jum_hari = ($vpbrr_02['nominal'] * $vpbrr_02['jml_hari']) * $vpbrr_02['jml_orang'] ;
							$nom_vpbr = @$nf($hit_jum_hari);
						
					
					 ?>
					
					<span class="badge bg-info"><?php echo" $vpbjj_02[nama] <i>Rp.$nom_vpbr</i>"; ?></span>
                    <a href="<?php echo"?HLM=APP_DUTY_03&IDKOP=$IDKOP&DELPBR=$vpbrr_02[idmain_pembiayaan_rekam]&DELBIAYA=DELBIAYA#"; ?>" onClick="return konfirmasi()"><i class="far fa-times-circle"></i></a> 
			<?php } ?>  
            
            <!-- save proses -->
    
    	<?php
			if(isset($_POST['simpan'])){
					$skp = @$sql_slash($_POST['skp']);
					$kode_pem = @$sql_slash($_POST['kode_pem']);
					$jam_pel = @$sql_slash($_POST['jam_pel']);
					$nom = @$sql_slash($_POST['nom']);
					$jml_hari = @$sql_slash($_POST['jml_hari']);
					$jml_orang = "1";
					
						//---//
							$hit_total_pem = $nom * $jml_hari;
								$hit_total_pem02 = $hit_total_pem * $jml_orang;
							
						$vpart_cek = $ms_q("$sl idmain_kary FROM tb_kary_part WHERE idmain_kary='$IDKRY' AND idmain_kop='$IDKOP'");
							$vpart_cekk = $ms_nr($vpart_cek);
						if($vpart_cekk > 0 ){
								//echo"Uwiss , Ono boss";
									$ms_q("$in tb_pembiayaan_rekam VALUES('$IDMAIN','$kode_pem','0','$IDKOP','$c_kode_vpbr','$nom','$jml_hari','$jml_orang','$hit_total_pem02','$IDKRY')");
						}else{
					
						$save_part = $ms_q("$in tb_kary_part VALUES ('$IDMAIN','$IDKRY','$IDKOP','$vkppd[idmain_kop_detail]','$c_kode_vkryp','$skp','$jam_pel','$vkry02_sww[KaryPangkat]','','','','')");
								
								$ms_q("$in tb_pembiayaan_rekam VALUES('$IDMAIN','$kode_pem','0','$IDKOP','$c_kode_vpbr','$nom','$jml_hari','$jml_orang','$hit_total_pem02','$IDKRY')");
								
			if($save_part){
					//echo"<font color=green><b>Sukses Tersimpan</b></font>";
					header("location:APP_DUTY_03_PEM_PART_02.php?IDKOP=$IDKOP&IDKRY=$IDKRY");
			}else{
				echo"<font color=red><b>Gagal Tersimpan</b></font>";
			} } }
		?>
          </div>  
</body>

<?php
		}else{
		  include'../logic/H_LOCATION.php';
		} }
		ob_flush();
	?>