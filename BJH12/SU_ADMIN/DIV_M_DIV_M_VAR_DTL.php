<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
	

	<b><i class="fas fa-edit"></i>&nbsp Entri Judul jabatan</b>
    <form method="post" action="">
      <table width="100%" style="max-width:40rem;" border="0" class="table table-bordered">
        <tr>
          <td width="48%">Kelompok<br>
          <select name="kelompok" class="form-control" style="max-width:20rem;">
          <option value=""></option>
          <?php
		  	$vvar_sw = $ms_q("$call_sel TKaryVar WHERE VarSeri='KELOMPOK' order by VarNama asc");
				while($vvar_sww = $ms_fas($vvar_sw)){
					echo"<option value=$vvar_sww[VarKode]>$vvar_sww[VarNama]</option>";	
					
				}
		  
		  ?>
          
          </select>
          </td>
          <td width="52%" align="right">Kode<br><input type="text" style="max-width:10rem;" name="kode" class="form-control" value="<?php echo"$c_kode_vvar"; ?>"></td>
        </tr>
        <tr>
          <td>Judul<br><input type="text" style="max-width:15rem;" name="nama" required class="form-control"></td>
          <td align="right"><textarea class="form-control" name="ket"></textarea></td>
        </tr>
      </table>
      <button name="simpan" onClick="return konfirmasi_simpan()" class="btn btn-success"><i class="fas fa-save"></i>&nbsp;Simpan</button>
 	</form>
    <hr>
    <div style="overflow:auto;width:40rem;;height:600px;padding:2px;border:1px solid #eee">
    <table width="100%" style="max-width:40rem;" class="table table-bordered" border="0">
      <tr class="table-info">
        <td>JABATAN</td>
        <td>JUDUL</td>
        <td>KODE</td>
        <td>###</td>
      </tr>
      <?php 
	  	$vvdtl_sw = $ms_q("$call_sel tb_kary_var_dtl order by nama");
			while($vvdtl_sww = $ms_fas($vvdtl_sw)){
					$vvar02_sw = $ms_q("$call_sel TKaryVar WHERE VarSeri='KELOMPOK' AND VarKode='$vvdtl_sww[VarKode]'");
							$vvar02_sww = $ms_fas($vvar02_sw);
	  			
	  ?>
      <tr>
        <td><?php echo"$vvar02_sww[VarNama]"; ?></td>
        <td><?php echo"$vvdtl_sww[nama]"; ?></td>
        <td><?php echo"$vvdtl_sww[kode]"; ?></td>
        <td><a href="<?php echo"?HLM=DIV_M&SUB=DIV_M_DIV_M&SUB_CHILD=DIV_M_DIV_M_VAR_DTL&IDDELVARDTL=$vvdtl_sww[idmain_var_dtl]&DELVAR=DELVAR"; ?>" class="btn btn-danger btn-sm" onClick="return konfirmasi()"><i class="fas fa-cut"></i>&nbsp;Hapus</a></td>
      </tr>
      <?php } ?>
    </table>
    </div>
<?php
	//Simpan
			if(isset($_POST['simpan'])){
					$kode = @$sql_slash($_POST['kode']);
					$kelompok = @$sql_slash($_POST['kelompok']);
					$nama = @$sql_slash($_POST['nama']);
					$ket = @$sql_slash($_POST['ket']);
				$save_var_dtl  = $ms_q("$in tb_kary_var_dtl VALUES('$IDMAIN','$kelompok','KELOMPOK','$kode','$nama','$ket')");
					if($save_var_dtl){
					header("location:?HLM=DIV_M&SUB=DIV_M_DIV_M&SUB_CHILD=DIV_M_DIV_M_VAR_DTL");
					}else{
						
						echo"<font color=red><b>Maaf , data tidak tersimpan</b></font>";
					
				
			}}
			
			//DELETE
				$IDDELVARDTL = @$sql_slash($_GET['IDDELVARDTL']);
				if(isset($_GET['DELVAR'])){
					$ms_q("$dl FROM tb_kary_var_dtl WHERE idmain_var_dtl='$IDDELVARDTL' ");
					header("location:?HLM=DIV_M&SUB=DIV_M_DIV_M&SUB_CHILD=DIV_M_DIV_M_VAR_DTL");
				}
	
	?>
		
		
</body>
<?php } ?>