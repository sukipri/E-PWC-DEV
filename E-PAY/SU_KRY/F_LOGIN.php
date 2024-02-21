	<?php
		session_start();
			ob_start();
		
		include"css.php";
		include"../CONFIG_INTERNAL.php";
	?>

	<script language="JavaScript" type="text/JavaScript">
	<!--
	function MM_openBrWindow(theURL,winName,features) { //v2.0
	  window.open(theURL,winName,features);
	}
	//-->
	</script>
	</head>
	
	<body>
<nav>
    <div class="nav-wrapper green darken-1" style="margin-left:5px;">
      <a href="F_LOGIN.php" class="brand-logo">E-PAY</a>
 </ul>
    </div>
  </nav>
  
	<br><br>
	<div class="container">
    			<?php
			$hasil_01 = "$an$an_02";
		?>
        	<h5 style="text-align:center;">-ACCESS-</h5></h5>
            <table class="table" border="1">
	<form name="form1" method="post">
             
           <input name="username" type="text" class="validate"  placeholder="Username" required>
				  <br>
				 <input name="passuser" type="password" class="validate"    placeholder="password" required>
				  <br>
				  <?php echo"<span class=style1>Kode <b>$hasil_01</b></span>"; ?>
					 <input name="an_sec" type="hidden"  class="validate" style="max-width: 15rem;" placeholder="Masukan Kode " value="<?php echo"$hasil_01"; ?>"   required>
				    &nbsp;&nbsp;
                    <input name="angka1" type="number"  class="validate" style="max-width: 15rem;" placeholder="Masukan Kode "   required>
				  <br>
             <button class="waves-effect green darken-4 waves-light btn" name="kirim">L.O.G.I.N</button>
             &nbsp; OR &nbsp;
             <a href="AKUN_INFO.php" class="waves-effect blue darken-2 waves-light btn">Register</a>
        </form>

     	</table>
        </div>
        <center>
        	<?php
					
		 //include"../config/connec_01_srv.php";
		 if(isset($_POST["kirim"])){ 
		$username=@trim(htmlentities(addslashes($_POST["username"])));
		$passuser=@trim(htmlentities(addslashes($_POST["passuser"])));  
		$mdpass=crc32($passuser);
		$angka1=@trim($_POST["angka1"]);
			$an_sec=@trim($_POST["an_sec"]);
		if($angka1!==$an_sec){
					echo"<font color=red><b>Kode Salah</b></font>";
					//echo"$an_sec";
				}elseif( $angka1==$an_sec ){
		$dt=$ms_q("select idmain,kode,namauser,passuser,akses from TBUser where namauser='$username' AND passuser='$mdpass'");
		$bc=$ms_fr($dt);
		if($bc > 1){
			  // di gunakan untuk mengawali perintah session
			
			   $_SESSION['namauser']=$bc[2];  // di gunakan untuk membandingkan variabel session dengan database
			   $_SESSION['passuser']=$bc[3];
			   header("location:HOME.php");
			 }else{
			echo"<font color=red><b>Username or password is wrong</b></font>";
			}
		}else{
		echo"<font color=red><b>Username or password is wrong</b></font>";
		}
			//echo"$mdpass";
   }
   
		
		?>
        </center>
     	<?php include_once"FOOTER.php"; ?>
<?php ob_flush(); ?>

