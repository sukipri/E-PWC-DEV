<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
		<?php
			$DELIDKEL = @$sql_slash($_GET['DELIDKEL']);
			if(isset($_POST['simpan'])){
				$kel = @$sql_slash($_POST['kel']);
					$save = $ms_q("$in tb_kel_bidang VALUES('$IDMAIN','$c_kode_vkbd','$kel')");
			
		if($save){ echo "<META HTTP-EQUIV=Refresh Content=2; URL=?HLM=DIV_M&SUB=DIV_M_KEL_BIDANG>";  ?>
						<div class="alert alert-dismissible alert-success">
							 <strong>Well done!</strong> You successfully save...
						</div>
						<?php }else{ ?>
						<div class="alert alert-dismissible alert-danger">
							 <strong>Ula laaa!</strong> Save is Failed
						</div>
	<?php }} ?>
    
    		<?php
				if(isset($_GET['DELKEL'])){
					$ms_q("$dl FROM tb_kel_bidang WHERE idmain_kel_bidang='$DELIDKEL'");
						header("location:?HLM=DIV_M&SUB=DIV_M_KEL_BIDANG");
				}
				
			?>
		
	<h5>Entri Kelompok Bidang</h5>
<form method="post">
<table width="100%" border="0" class="table">
  <tr>
    <td width="47%">
    	<b>Kelompok</b>
    	<input type="text" name="kel" required class="form-control" style="max-width: 30rem;">
        <br>
          <button  class="btn btn-primary" name="simpan">Save changes</button>
    </td>
    <td width="53%">
    <div class="card border-primary mb-3" style="max-width: 30rem;">
      <div class="card-header">Pertinjauan Singakat</div>
      <div class="card-body">
     	<?php
				$vkbd_02 = $ms_q("$call_sel tb_kel_bidang order by nama asc");
					while($vkbdd_02 = $ms_fas($vkbd_02)){
					
						echo"$vkbdd_02[nama]";
					 ?>
                <a href="<?php echo"?HLM=DIV_M&SUB=DIV_M_KEL_BIDANG&DELIDKEL=$vkbdd_02[idmain_kel_bidang]&DELKEL=DELKEL"; ?>" onClick="return konfirmasi()">Hapus</a><br>
		<?php } ?>
  </div>
  </div>
    </td>
  </tr>
</table>
</form>
</body>
	<?php } ?>
