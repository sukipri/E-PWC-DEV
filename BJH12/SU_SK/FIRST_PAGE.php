<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
<div class="jumbotron">
 
 <h1>{E-HR}</h1>
  <hr class="my-4">
   <?php echo"$uu[namauser] //$uu[passuser]"; ?>
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <p class="lead">
   			 <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
  </p>
</div>
</body>
<?php } ?>
