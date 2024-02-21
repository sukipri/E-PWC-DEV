<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
		<?php 
			error_reporting(0);
			include"config02.php";
			include"css.php";
	?>
	<body>
<?php include"MENU.php"; ?>
		 <nav>
    <div class="nav-wrapper blue accent-2">
	   <ul>
      <li><a href="#!!"><b>Pilih Jenis Pendaftaran &nbsp; *min H-2 Max H-30</b></a></li>
      </ul>
	  </div>
  </nav>
  	<center>
		<a href="CARI_DOKTER_PRD.php">
		<h2>Pribadi<br>
  		<i class="material-icons large">person_add</i></h2>
		</a>
		<br>
		<a href="intent://app.bpjs.mobile#Intent;scheme=http;package=app.bpjs.mobile;end;">
		<h2>BPJS<br>
  		<i class="material-icons large">account_balance</i></h2>
		</a>
		<br>
		<a href="CARI_DOKTER_ANS.php">
		<h2>Asuransi<br>
  		<i class="material-icons large">perm_contact_calendar</i></h2>
		</a>
		</center>
		
	</div>
	</body>
</html>
