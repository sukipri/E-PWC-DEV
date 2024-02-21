	<?php
		error_reporting(0);
				include_once"../config/connec_01_srv.php";
				include"../secure/GR_01.php"; //security enggine
				 include"../sc/ID_IDF.php";  //Identifer ID PAGE
       			 include"../sc/stack_Q.php"; //Query SQL
				  include"../sc/code_rand.php"; 
		include"css.php"; 
	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<body>
<br><br>
<center>
  <h1> <img src="../../../images/logo_new.png" width="200" height="200"></h1>
</center><br>
<form name="form1" method="post" action="../logic/LOGIN.php">
  <table width="45%" border="0" align="center">
    <tr>
      <td colspan="2"><h4>LOGIN ACCESS </h4>
          <hr></td>
    </tr>
    <tr>
      <td height="59" colspan="2"><input type="text" name="username" class="form-control" required placeholder="Username.."></td>
    </tr>
    <tr>
      <td height="72" colspan="2"><input type="password" name="passuser" class="form-control" required placeholder="Password.."></td>
    </tr>
    <tr>
      <td width="35%"><input type="submit" name="kirim" value="L.O.G.I.N" class="btn btn-warning"></td>
      <td width="65%"><h4><b>{E-PWC}</b></h4></td>
    </tr>
  </table>
</form>
</body>
</html>
