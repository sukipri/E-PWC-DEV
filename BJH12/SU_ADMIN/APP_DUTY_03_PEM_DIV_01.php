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
<body>

    <?php 
				$IDKOP = @$sql_slash($_GET['IDKOP']);
				$IDKRY = @$sql_slash($_GET['IDKRY']);
				$IDPART = @$sql_slash($_GET['IDPART']);
					$vkp = $ms_q("$call_sel tb_kop WHERE idmain_kop='$IDKOP'");
                        $vkpp = $ms_fas($vkp);
							 $vkpd = $ms_q("$call_sel tb_kop_detail WHERE idmain_kop='$IDKOP'");
                       			 $vkppd = $ms_fas($vkpd);
									$vkry02_sw = $ms_q("$sl KaryNomor,KaryNama,KaryPangkat FROM TKaryawan WHERE KaryNomor='$IDKRY' ");
										$vkry02_sww = $ms_fas($vkry02_sw);
											$vpart_sw= $ms_q("$call_sel  tb_kary_part WHERE idmain_kary_part='$IDPART'");
												$vpart_sww = $ms_fas($vpart_sw);
			
			?>
            	<div class="container">
<a href="<?php echo"APP_DUTY_03_PEM_PART_02.php?IDKOP=$IDKOP&IDKRY=$IDKRY"; ?>" class="btn btn-warning"><i class="fas fa-angle-double-left"></i></a> &nbsp; <?php echo"<b>#Peserta & Pembiyaan</b> $vkry02_sww[KaryNama]"; ?> &nbsp; <a href="<?php echo"APP_DUTY_03_PEM_DIV_01.php?IDKOP=$IDKOP&IDKRY=$IDKRY&IDPART=$IDPART"; ?>"><i class="fas fa-sync"></i>&nbsp;Reload</a>
<br><br>
<form method="post" action="">
  <table width="100%" border="0" style="max-width:40rem;" class="table table-bordered">
	  <tr>
	    <td width="61%">Jabatan<br>
        <select name="kode_var" class="form-control" required>
        <option value=""></option>
        <?php
			$vvar_sw = $ms_q("$call_sel tb_kary_var_dtl order by nama asc");
				while($vvar_sww = $ms_fas($vvar_sw)){
					if($vvar_sww['idmain_var_dtl']==$vpart_sww['jabatan_struk']){
					echo"<option value=$vvar_sww[idmain_var_dtl] selected>$vvar_sww[nama]</option>";	
				}else{
					
					echo"<option value=$vvar_sww[idmain_var_dtl]>$vvar_sww[nama]</option>";
				}}
		
		?>
        
        </select>
        </td>
	    <td width="29%"> <br><button name="simpan"  class="btn btn-success"><i class="fas fa-save"></i>&nbsp;Simpan</button></td>
	    <td width="10%">&nbsp;</td>
    </tr>
	  <tr>
	    <td>Urutan<br><input type="number" name="urut" style="max-width:10rem;" class="form-control" value="<?php echo"$vpart_sww[urut]"; ?>"></td>
	    <td><br><!-- <button name="simpan_urut"  class="btn btn-success"><i class="fas fa-save"></i>&nbsp;Simpan</button> --></td> 
	    <td>&nbsp;</td>
      </tr>
	  <tr>
	    <td>
        <!-- -->
        Mulai Pelaksanaan
        <table width="100%" border="0" class="table">
	      <tr>
	        <td>Hari<br><input type="number" name="tg_hari_01" class="form-control" value="<?php echo"$vpart_sww[hari]"; ?>"></td>
	        <td>Bulan<br><input type="number" name="tg_bulan_01" class="form-control"value="<?php echo"$vpart_sww[bulan]"; ?>"></td>
	        <td>Tahun<br><input type="text" name="tg_tahun_01" value="<?php echo"$YR"; ?>" class="form-control"></td>
	        </tr>
        </table>
        </td>
	    <td><br><!-- <button name="simpan_tgl"  class="btn btn-success"><i class="fas fa-save"></i>&nbsp;Simpan</button> --></td>
	    <td>&nbsp;</td>
      </tr>
  </table>
</form>
		<?php
			if(isset($_POST['simpan'])){
				$urut = @$sql_slash($_POST['urut']);
				$kode_var = @$sql_slash($_POST['kode_var']);
				$tg_hari_01 = @$sql_slash($_POST['tg_hari_01']);
				$tg_bulan_01 = @$sql_slash($_POST['tg_bulan_01']);
				$tg_tahun_01 = @$sql_slash($_POST['tg_tahun_01']);
					$save_jabatan = $ms_q("$up tb_kary_part set jabatan_struk='$kode_var',urut='$urut',hari='$tg_hari_01',bulan='$tg_bulan_01',tahun='$tg_tahun_01' WHERE idmain_kary_part='$IDPART'");
				header("location:APP_DUTY_03_PEM_DIV_01.php?IDKOP=$IDKOP&IDKRY=$IDKRY&IDPART=$IDPART");
			}
		
		?>
        <?php
		/*
			if(isset($_POST['simpan'])){
				$urut = @$sql_slash($_POST['urut']);
					$save_urut = $ms_q("$up tb_kary_part set urut='$urut' WHERE idmain_kary_part='$IDPART'");
				header("location:APP_DUTY_03_PEM_DIV_01.php?IDKOP=$IDKOP&IDKRY=$IDKRY&IDPART=$IDPART");
			}
		
		?>
           <?php
			if(isset($_POST['simpan'])){
				$tg_hari_01 = @$sql_slash($_POST['tg_hari_01']);
				$tg_bulan_01 = @$sql_slash($_POST['tg_bulan_01']);
				$tg_tahun_01 = @$sql_slash($_POST['tg_tahun_01']);
					$save_tgl = $ms_q("$up tb_kary_part set hari='$tg_hari_01',bulan='$tg_bulan_01',tahun='$tg_tahun_01' WHERE idmain_kary_part='$IDPART'");
				header("location:APP_DUTY_03_PEM_DIV_01.php?IDKOP=$IDKOP&IDKRY=$IDKRY&IDPART=$IDPART");
				
			}
		*/
		?>
		</div>
</body>
<?php
		}else{
		  include'../logic/H_LOCATION.php';
		} }
		ob_flush();
	?>