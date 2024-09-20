	<?php
			ob_start();
		
		include"css.php";
		include"../CONFIG_INTERNAL.php";
	?>

	
	<style type="text/css">
	<!--
	.style1 {font-size: 20px; color:#0033FF;}
	.style12 {color:#fff}
	body {
		margin-left: 0px;
		margin-top: 0px;
		margin-right: 0px;
		margin-bottom: 0px;
		
			background-image: url('../IMG/HD/LOGIN3.png');
					height:100%;
					width: 100%;
					 background-repeat: ;
	}
	.blur {
		opacity: 0.6;
		filter: alpha(opacity=80);
		background-color:#00773C;
	}
	
	.blur2:hover {
		opacity: 1.0;
		filter: alpha(opacity=100); /* For IE8 and earlier */
	}
	.rad {
		border: 0px solid #a1a1a1;
		padding: 10px 40px; 
	 background-color:#0099FF;
		width:750px;
		border-radius: 10px;
	}
	.bgk:hover{background-color:#0099FF;}
	-->
	</style>
	<script language="JavaScript" type="text/JavaScript">
	<!--
	function MM_openBrWindow(theURL,winName,features) { //v2.0
	  window.open(theURL,winName,features);
	}
	//-->
	</script>
	</head>
	
	<body>
	<br>
	<br><br>
	<div class="container">
		<?php
			$hasil_01 = "$an$an_02";
			echo crc32("sdm");
		?>
	<form name="form1" method="post" action="../logic/LOGIN_SA.php">
	<div class="card border-primary mb-3" style="max-width: 20rem;">
  <div class="card-header"><h3>L.O.G.I.N</h3> </div>
  <div class="card-body">
<input name="nim" autocomplete="off" type="text" class="form-control"  style="max-width: 40rem;"  placeholder="Username" required>
				  <br>
				 <input name="passuser" type="password" class="form-control" style="max-width: 40rem;"   placeholder="password" required>
				  <br>
				  <?php echo"<span class=style1>Kode <b>$hasil_01</b></span>"; ?>
					 <input name="an_sec" type="hidden"  class="form-control" style="max-width: 15rem;" placeholder="Masukan Kode " value="<?php echo"$hasil_01"; ?>"   required>
				    <input name="angka1" type="number"  class="form-control" style="max-width: 15rem;" placeholder="Masukan Kode "   required>
				  <br>
				  <input name="kirim" type="submit" class="btn btn-primary" id="kirim2" value="L.O.G.I.N">
				  <br>
				    <?php
				/*
		  if(isset($_POST["kirim"])){ 
			$username=@trim($sql_escape($_POST["nim"]));
			$passuser=@trim($sql_escape($_POST["passuser"]));  // MD5 --> 9e39fe12c7c9c968ceabcd0b80d622a7 	
			$angka1=@trim($sql_escape($_POST["angka1"]));
			$an_sec=@trim($sql_escape($_POST["an_sec"]));
				if($angka1!==$an_sec){
					echo"<font color=red><b>Kode Salah</b></font>";
					//echo"$an_sec";
				}elseif( $angka1==$an_sec ){
						//echo"$an_sec";
						
			//include"../sc/conek.php";
			$mdpass=md5($passuser);
				$dt=mysql_query("select idmain_user,kode,namauser,passuser,akses from user where namauser='$username' AND passuser='$mdpass'");
	$bc=mysql_fetch_row($dt);
			if($bc > 0){
				  // session_start(); // di gunakan untuk mengawali perintah session
					session_start(); 
				   $_SESSION['namauser']=$bc[2];  // di gunakan untuk membandingkan variabel session dengan database
				   $_SESSION['passuser']=$bc[3];
				 echo "<script language='javascript'>window.location = 'HOME.php'</script>";
						exit();  
						///
						echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../SU_ADMIN/F_LOGIN.php">';
						exit;
						///
						 header("location:../SU_ADMIN/HOME.php");
						exit
				   ?>
					
				 <?php
				//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=HOME.php">';
					//exit;
				}else{
				//header("location:index.php");
					echo"<font color=red><b>Password Dan User Salah</b></font>";
				}
			}else{
			echo"<font color=red><b>Password Dan User Salah</b></font>";
			} }
				//echo $_SESSION['namauser'];
				*/
   						?>
  </div>
	
			</div>
			
	</form>
<?php ob_flush(); ?>

