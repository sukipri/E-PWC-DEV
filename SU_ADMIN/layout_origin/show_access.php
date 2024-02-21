<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h4><i class="fa fa-puzzle-piece"></i>&nbsp;DBAcess CONNECTED</h4>
<form id="form1" name="form1" method="post" action="">
  <table width="50%" border="1" rules="all">
    <tr>
      <td width="40%"><input type="text" required name="car" placeholder="CAR...." class="form-control" /></td>
      <td width="60%"><input type="text" required name="cont" placeholder="ContNo...." class="form-control" /></td>
    </tr>
    <tr>
      <td><input type="text" required name="ukur" placeholder="ContUkur...."  class="form-control" /></td>
      <td><input type="text" required name="no"  class="form-control" placeholder="ContTipe......" /></td>
    </tr>
    <tr>
      <td colspan="2"><button name="simpan" class="btn btn-success">Save Data</button></td>
    </tr>
  </table>
</form>
	<?php
	if(isset($_POST['simpan'])){
		$car = @$_POST['car'];
		$cont = @$_POST['cont'];
		$ukur = @$_POST['ukur'];
		$no = @$_POST['no'];
			$ac_q($conn,"$in tblBC23Con(CAR,ContNo,ContUkur,ContTipe)values('$car','$cont','$ukur','$no')") or die("UNSAVED");
		echo"<b>Success to Save</b>";
		
	}
	?>
<table width="100%" border="0" class="table table-bordered">
  <tr class="info">
    <td width="8%">CAR</td>
    <td width="34%">ContNo</td>
    <td width="30%">ContUkur</td>
    <td width="28%">ContTipe</td>
  </tr>
  	<?php
	$mx_01 = $ac_q($conn,"SELECT TOP 10 * FROM tblBC23Con order by CAR desc ");
	while ($mx_011 = $ac_fa($mx_01)){
	?>
  <tr>
    <td><?php echo"$mx_011[CAR]"; ?></td>
    <td><?php echo"$mx_011[ContNo]"; ?></td>
    <td><?php echo"$mx_011[ContUkur]"; ?></td>
    <td><?php echo"$mx_011[ContTipe]"; ?></td>
  </tr>
  <?php } ?>
</table>
</body>
</html>
