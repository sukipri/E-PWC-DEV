	<h4>PostgreSQL Inserted</h4>
		<form method="post" action="">
		  <table width="295" border="0">
            <tr>
              <td width="215"><input type="text" class="form-control" name="kode" placeholder="CODE TEXT ,ex US"></td>
		  <td width="70"><input type="submit" class="btn btn-success" name="save"></td>
            </tr>
          </table>
</form>
	<?php 
		if(isset($_POST['save'])){
		$pg_sql = $pg_q("$call_sel user_mhs");
			$hit_pg_sql = $pg_nr($pg_sql);
			$kode = $pg_escape($_POST['kode']);
				$hit_pg = $hit_pg_sql + 1;
				$ack = rand('9999','77777');
				$md_ack = md($ack);
		pg_query("insert into user_mhs(iduser_mhs,idmahasiswa,username,passuser)values('{$hit_pg}','$kode.$ack','$ack','$md_ack')");
			echo"<font color=#005B00><b>Success for save</b></font>";
		}
	 ?>
	<table width="100%" border="0" class="table">
    
      <tr  class="warning">
        <td width="28">NO</td>
        <td width="171">USER CODE</td>
        <td width="141">USERNAME</td>
        <td width="213">PASSWORD (SHA1)</td>
        <td width="289">PASSWORD (crc32)</td>
        <td width="232">PASSWORD (MD5)</td>
      </tr>
      	<?php 
			$pg_view = $pg_q("$call_sel user_mhs $ob iduser_mhs desc");
				$no = 1;
				while( $pg_vieww = $pg_fas($pg_view)){
		?>
      <tr>
        <td><?php echo"$no"; ?></td>
        <td><?php echo"$pg_vieww[idmahasiswa]"; ?></td>
        <td><?php echo"$pg_vieww[username]"; ?></td>
        <td><?php echo hs($pg_vieww['passuser']); ?></td>
        <td><?php echo cr($pg_vieww['passuser']); ?></td>
        <td><?php echo"$pg_vieww[passuser]"; ?></td>
      </tr>
      <?php $no++; } ?>
    </table>
