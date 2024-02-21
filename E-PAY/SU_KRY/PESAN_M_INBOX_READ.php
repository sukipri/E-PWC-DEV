<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
            <?php 	if($uu['akses']==4){  ?>
<body>
	<?php 
		$IDPSN01 = @$sql_slash($_GET['IDPSN01']);
	?>
	<ul class="collection with-header">
        <li class="collection-header"><h4>Kotak Masuk</h4></li>
       <?php
				$vps01_sw02 = $ms_q("$call_sel tb_pesan WHERE idmain_pesan='$IDPSN01' AND untuk='$vkryy[KaryNomor]'");
					while($vps01_sww02 = $ms_fas($vps01_sw02)){
					//echo"$vps01_sww";
			?>
              <?php
			  	echo"$vps01_sww02[nama]";
			echo"<br>";	   
					echo"$vps01_sww02[tgl] - $vps01_sww02[dari]";
				echo"<hr>";
			echo"$vps01_sww02[isi]";
			?>
	   
	   <?php  } ?>
       	
      </ul>
      <?php include"../logic/UP_PESAN_READ_01.php"; ?>
</body>
 <?php
		}else{
		  include'../logic/H_LOCATION.php';
		} }
		ob_flush();
	?>