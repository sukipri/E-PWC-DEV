<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>

	<?php
		if(isset($_POST['simpan'])){
			$kop = @$sql_slash($_POST['kop']);
			$ket = @$sql_slash($_POST['ket']);
			$tg1 = @$sql_slash($_POST['tg1']);
			$jenis = @$sql_slash($_POST['jenis']);
				$save = $ms_q("$in tb_kop values('$IDMAIN','$c_kode_vkop','$kop','$ket','$tg1','1','$jenis')");
		
			if($save){ echo "<META HTTP-EQUIV=Refresh Content=2; URL=?HLM=KOP_M&SUB=KOP_M_KOP>";  ?>
						<div class="alert alert-dismissible alert-success">
							 <strong>Well done!</strong> You successfully save...
						</div>
						<?php }else{ ?>
						<div class="alert alert-dismissible alert-danger">
							 <strong>Ula laaa!</strong> Save is Failed
						</div>
	<?php }} ?>
<form name="form1" method="post" action="">
  <table width="100%" style="max-width:40rem;" border="0" class="table table-bordered table-striped">
    <tr>
      <td><b>Nomor Surat</b><input type="text" name="kop" class="form-control" style="max-width:35rem;" value="<?php echo"$hit_zero/RSPWC/AA/IV/$YR"; ?>" required></td>
    </tr>
    <tr>
      <td><b>Acara</b><textarea class="form-control" name="ket"></textarea></td>
    </tr>
    <tr>
      <td><?php //echo"<b>Date</b> $date_html5"; ?>
      <b>Tanggal Terbit Nomor</b>
      <input type="date" name="tg1" class="form-control" style="max-width:15rem;" required>
      </td>
    </tr>
    <tr>
      <td>
      <select name="jenis" class="form-control" style="max-width:10rem;" required>
      <option value="">Jenis Rapat</option>
      <option value="2">INT</option>
      <!-- <option value="1">EKS</option> -->
      </select>
      </td>
    </tr>
    <tr>
      <td><button name="simpan" class="btn btn-success"><i class="fas fa-save"></i>&nbsp;S.A.V.E</button></td>
    </tr>
  </table>
</form>
</body>
<?php } ?>
