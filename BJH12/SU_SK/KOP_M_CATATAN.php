<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
		<?php
			$DELIDCAT = @$sql_slash($_GET['DELIDCAT']);
			if(isset($_POST['simpan'])){
				$isi = @$sql_slash($_POST['isi']);
			
					$save = $ms_q("$in tb_cat_tugas VALUES('$IDMAIN','$c_kode_vct','$isi')");
		
				if ($save) { echo "<META HTTP-EQUIV=Refresh Content=2; URL=?HLM=KOP_M&SUB=KOP_M_CATATAN>";  ?>
						<div class="alert alert-dismissible alert-success">
							 <strong>Well done!</strong> You successfully save...
						</div>
						<?php }else{ ?>
						<div class="alert alert-dismissible alert-danger">
							 <strong>Ula laaa!</strong> Save is Failed
						</div>
	<?php }} ?>
    <?php  
			if(isset($_GET['DELCAT'])){
				$ms_q("$dl FROM tb_cat_tugas WHERE idmain_cat_tugas='$DELIDCAT'");
				header("location:?HLM=KOP_M&SUB=KOP_M_CATATAN");
			}
	?>
    <form method="post">
	<table width="100%" class="table" border="0">
      <tr>
        <td width="52%">
        	<b>Isi Catatan</b>
        <textarea name="isi" class="form-control" required></textarea>
            <br>
              <button  class="btn btn-primary" name="simpan">Save changes</button>
        </td>
        <td width="48%">
        <div class="card border-primary mb-3" style="max-width: 40rem;">
          <div class="card-header">Pertinjauan Singkat</div>
          <div class="card-body">
          	<?php
				$vct_02 = $ms_q("$call_sel tb_cat_tugas ");
					while($vctt_02 = $ms_fas($vct_02)){
						echo"<p>$vctt_02[isi]";
					?>
                    	&nbsp; <a href="<?php echo"?HLM=KOP_M&SUB=KOP_M_CATATAN&DELIDCAT=$vctt_02[idmain_cat_tugas]&DELCAT=DELCAT"; ?>" onClick="return konfirmasi()">Hapus</a></p>
					<?php } ?>
           
          </div>
		</div>
        </td>
      </tr>
    </table>
    </form>
</body>
<?php } ?>
