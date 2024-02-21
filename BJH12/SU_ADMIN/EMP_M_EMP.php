<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
	<?php
			
			if(isset($_POST['simpan'])){
				$nik = @$sql_slash($_POST['nik']);
				$nama = @$sql_slash($_POST['nama']);
				$bagian = @$sql_slash($_POST['bagian']);
				$alamat = @$sql_slash($_POST['alamat']);
					$save = $ms_q("$in tb_kary (idmain_kary,kode,nik,nama,bagian,alamat,app,idmain_divisi_posisi)values('$IDMAIN','$c_kode_vkry','$nik','$nama','$bagian','$alamat','2','$bagian')");
	if ($save) { echo "<META HTTP-EQUIV=Refresh Content=2; URL=?HLM=EMP_M&SUB=EMP_M_EMP>";  ?>
						<div class="alert alert-dismissible alert-success">
							 <strong>Well done!</strong> You successfully save...
						</div>
						<?php }else{ ?>
						<div class="alert alert-dismissible alert-danger">
							 <strong>Ula laaa!</strong> Save is Failed
						</div>
	<?php }} ?>
    
    <h5>-Entry Employee-</h5>
    <?php
			$IDEMP = @$sql_slash($_GET['IDEMP']);
					$vkry_pusat = $ms_q("$sl KaryNomor,KaryNama FROM TKaryawan WHERE KaryNomor='$IDEMP'");
						$no = 1;
						$vkryy_pusat = $ms_fas($vkry_pusat);
			?>
<form name="form1" method="post" action="">
  <table width="100%" border="0" style="max-width:35rem;" class="table table-bordered table-striped">
    <tr>
      <td><b>ID</b> <input type="text" style="max-width:25rem;" class="form-control" required value="<?php echo"$vkryy_pusat[KaryNomor]"; ?>" name="nik"></td>
    </tr>
    <tr>
      <td><b>Name</b> <input value="<?php echo"$vkryy_pusat[KaryNama]"; ?>" type="text" style="max-width:25rem;" class="form-control" required name="nama"></td>
    </tr>
    <tr>
      <td><b>Address</b> <textarea name="alamat" class="form-control"></textarea></td>
    </tr>
    <tr>
      <td>
      <select name="bagian" class="form-control" style="max-width:25rem;" required>
      <option value="">Division</option>
              <?php 
			  		$vdv = $ms_q("$call_sel tb_divisi order by nama asc");
							while($dvv = $ms_fas($vdv)){
			  ?>
              <optgroup label="<?php echo"$dvv[nama]"; ?>">
              		<?php 
						$vdvp = $ms_q("$call_sel tb_divisi_posisi WHERE idmain_divisi='$dvv[idmain_divisi]'");
							while($dvvp = $ms_fas($vdvp)){
					?>
                <option value="<?php echo"$dvvp[idmain_divisi_posisi]"; ?>"><?php echo"$dvvp[nama]"; ?></option>
           <?php } ?>
              </optgroup>
             <?php } ?>
	</select>
      </td>
    </tr>
    <tr>
      <td>
      <button name="simpan" onClick="return konfirmasi_simpan()" class="btn btn-success"><i class="fas fa-save"></i>&nbsp;S.A.V.E</button>
      </td>
    </tr>
  </table>
</form>
</body>
<?php } ?>
