<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PHPSQL_SERVER</title>
</head>

<body>
	<h4><i class="fa fa-puzzle-piece"></i>&nbsp;SQLSERVER Add User</h4>
		<form action="" method="post">
		  <table width="80%">
              <tr>
                <td width="42%">
				<select name="nim" class="form-control">
				<?php
					$vnim = $ms_q("$call_sel data_anggota");
						while($vnimm = $ms_fas($vnim)){
				?>
				<option value="<?php echo"$vnimm[kode]"; ?>"><?php echo"$vnimm[nama]"; ?></option>
				<?php } ?>
				</select>
				</td>
                <td width="58%"><input type="text" name="username" class="form-control" placeholder="Username......" required></td>
              </tr>
              <tr>
                <td><input type="password" name="passuser" placeholder="Password......" class="form-control" required></td>
                <td><input type="email" name="email" placeholder="Email......" class="form-control" required></td>
              </tr>
            </table>
			  <button name="simpan" class="btn btn-info">Save data</button>
		</form>
		<?php
		if(isset($_POST['simpan'])){
			$ack = rand('6666','888');
			$ack_02 = @$_POST['nim'];
			$nama = @$_POST['nama'];
			$username = @$_POST['username'];
			$pass = md($_POST['passuser']);
				$ms_q("$in data_user(iduser,kode,namauser,passuser)values('$ack','$ack_02','$username','$pass')");
				}
			?>
			
			<table width="100%" border="0" class="table table-bordered">
              <tr class="success">
                <td width="16%">ID</td>
                <td width="37%">KODE</td>
                <td width="20%">NAME</td>
                <td width="27%">PASS(MD5)</td>
              </tr>
	<?php
		$lim = "10";
		$ps = $ms_q("Select TOP 1000 * From data_user ");
			echo"<i>RECORD HISTORY</i><br>";
			while($pss = $ms_fas($ps)){
			?>
			
              <tr>
                <td><?php echo"$pss[iduser]"; ?></td>
                <td><?php echo"$pss[kode]"; ?></td>
                <td><?php echo"$pss[namauser]"; ?></td>
                <td><?php echo"$pss[passuser]"; ?></td>
              </tr>
          
<?php } ?>
  </table>
</body>
</html>
