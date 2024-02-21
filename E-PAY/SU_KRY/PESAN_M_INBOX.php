<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
            <?php 	if($uu['akses']==4){  ?>
<body>
	<ul class="collection with-header">
        <li class="collection-header"><h4>Kotak Masuk</h4></li>
       <?php
				$vps01_sw02 = $ms_q("$call_sel tb_pesan WHERE untuk='$vkryy[KaryNomor]' order by tgl desc");
					while($vps01_sww02 = $ms_fas($vps01_sw02)){
					//echo"$vps01_sww";
			?>
            <?php if($vps01_sww02['status']=="1"){ ?>
       <a href="<?php echo"?HLM=PESAN_M_INBOX_READ&IDPSN01=$vps01_sww02[idmain_pesan]&UPPSNR=UPPSNR"; ?>"> <li class="collection-item active"><?php echo"$vps01_sww02[nama]"; ?>
        <?php
			echo"<br>";	   
					echo"$vps01_sww02[tgl] - $vps01_sww02[dari]";
			?>
        </li>
       		</a>
		<?php }elseif($vps01_sww02['status']=="2"){ ?>
        <a href="<?php echo"?HLM=PESAN_M_INBOX_READ&IDPSN01=$vps01_sww02[idmain_pesan]&UPPSNR=UPPSNR"; ?>"> <li class="collection-item"><?php echo"$vps01_sww02[nama]"; ?>
        <?php
			echo"<br>";	   
					echo"$vps01_sww02[tgl] - $vps01_sww02[dari]";
			?>
        </li>
	   
	   <?php } } ?>
       	
      </ul>
</body>
 <?php
		}else{
		  include'../logic/H_LOCATION.php';
		} }
		ob_flush();
	?>