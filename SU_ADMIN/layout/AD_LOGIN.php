	<?php
		session_start();
		error_reporting(0);
				include_once"../config/connec_01_srv.php";
				include"../secure/GR_01.php"; //security enggine
				 include"../sc/ID_IDF.php";  //Identifer ID PAGE
       			 include"../sc/stack_Q.php"; //Query SQL
				  include"../sc/code_rand.php"; 
		include"css.php"; 
		$hasil_01 = "$an$an_02";
	?>

<br><br>
<div class="container">
<form name="form1" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
<div class="card border-primary mb-3" style="max-width: 20rem;">
  <div class="card-header">LOGIN AKSES</div>
  <div class="card-body">
	  <center>
  <img src="../../../images/logo_new.png" width="200" height="200">
</center>
	<span class="badge bg-info">USERNAME</span>
  <input type="text" name="username" autocomplete="off" class="form-control form-control-sm" required placeholder="Username..">
  <span class="badge bg-info">PASSWORD</span>
  <input type="password" name="passuser" class="form-control form-control-sm" required placeholder="Password..">
  <br>
  <?php echo"<h3>Kode <b>$hasil_01</b></h3>"; ?>
  <input name="an_sec" type="hidden"  class="form-control form-control-sm" style="max-width: 15rem;" placeholder="Masukan Kode " value="<?php echo"$hasil_01"; ?>"   required>
	<input name="angka1" type="number"  class="form-control form-control-sm" style="max-width: 24rem;" placeholder="Masukan Kode "   required>
  <br>
  <button class="btn btn-dark" name="kirim">L.O.G.I.N</button>
  </div>
</div>
</form>
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
		$dt=mssql_query("select idmain,kode,namauser,passuser,akses from TBUser where namauser='$username' AND passuser='$mdpass'");
		$bc=mssql_fetch_row($dt);
		if($bc > 1){
			  // di gunakan untuk mengawali perintah session
			
			   $_SESSION['namauser']=$bc[1];  // di gunakan untuk membandingkan variabel session dengan database
			   $_SESSION['passuser']=$bc[2];
			   header("location:../");
			 }else{
			echo"<font color=red><b>Username or password is wrong</b></font>";
			}
		}else{
		echo"<font color=red><b>Username or password is wrong</b></font>";
		}
   }
		
		?>
		<br>
		<?PHP include"footer.php"; ?>
		</center>
