	<?php
			ob_start();
		
		include"css.php";
		include"../CONFIG_INTERNAL.php";
	?>
<body>
<div class="container">
		<h5><a href="AKUN.php"><i class="fas fa-angle-double-left"></i></a><i class="fa fa-address-book-o"></i>&nbsp; Cek NIK</h5> <hr>
	<form method="post">
    		 <div class="input-group-addon">Nama</div>
	 		<input type="text" name="nama" class="form-control" placeholder="isikan Nama e.g Meika" required>
             <button class="btn green" name="go"><i class="fas fa-eye"></i>&nbsp;G.O</button>
               <br><br><br>
    <?php
		if(isset($_POST['go'])){
			$nama = @$sql_slash($_POST['nama']);
		$vkr_cek = $ms_q("$sl KaryNomor,KaryNama FROM TKaryawan WHERE KaryNama LIKE '%$nama%' AND  NOT KaryStatus='9' order by KaryNama asc");
		while($vkrr_cek = $ms_fas($vkr_cek)){
	
		echo"<b>Nama</b> $vkrr_cek[KaryNama]<br><b>NIK</b> $vkrr_cek[KaryNomor]<hr>";
	?>
    	
    <?php }} ?>
	  </div>
    </form>
  
   </div>
</body>
