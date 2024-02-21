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
			$save = $ms_q("$in tb_divisi values('$IDMAIN','$c_kode_vdiv','$divisi','2')");
	
	if ($save) {  echo "<META HTTP-EQUIV=Refresh Content=2; URL=?HLM=DIV_M&SUB=DIV_M_DIV>";  ?>
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
          <td><b>Division</b><input type="text" name="divisi"  style="max-width:20rem;" class="form-control" required></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><button name="simpan" onClick="return konfirmasi_simpan()" class="btn btn-success"><i class="fas fa-save"></i>&nbsp;S.A.V.E</button></td>
        </tr>
 
      </table>
</form>
</body>
<?php } ?>
