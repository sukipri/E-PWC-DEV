<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
	<?php
		if(isset($_POST['simpan'])){
			$divisi = @$sql_slash($_POST['divisi']);
			$posisi = @$sql_slash($_POST['posisi']);
			$save = $ms_q("$in tb_divisi_posisi values('$IDMAIN','$divisi','$c_kode_vdivp','$posisi','2')");
	
	if ($save) {  echo "<META HTTP-EQUIV=Refresh Content=2; URL=?HLM=DIV_M&SUB=DIV_M_DIV_POS>";  ?>
						<div class="alert alert-dismissible alert-success">
							 <strong>Well done!</strong> You successfully save...
						</div>
						<?php }else{ ?>
						<div class="alert alert-dismissible alert-danger">
							 <strong>Ula laaa!</strong> Save is Failed
						</div>
	<?php }} ?>
	<h5>-Entry Division-</h5>
<form name="form1" method="post" action="">
      <table width="200" border="0"  style="max-width:35rem;" class="table table-bordered">
        <tr>
          <td>
          <select name="divisi" class="form-control" style="max-width:30rem;" required>
          <option value="">Division</option>
          	<?php
				$vdv = $ms_q("$call_sel tb_divisi order by nama asc");
					while($dvv = $ms_fas($vdv)){
						echo"<option value=$dvv[idmain_divisi]>$dvv[nama]</option>";
					
					}
			?>
          </select>
          </td>
        </tr>
        <tr>
          <td><b>Posisition</b><input type="text" name="posisi" class="form-control" style="max-width:30rem;" required></td>
        </tr>
        <tr>
          <td><button name="simpan" onClick="return konfirmasi_simpan()" class="btn btn-success"><i class="fas fa-save"></i>&nbsp;S.A.V.E</button></td>
        </tr>
 
      </table>
</form>
</body>
<?php } ?>
