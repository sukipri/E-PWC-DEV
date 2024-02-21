<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
            <?php 	if($uu['akses']==4){  ?>
<body>
	<ul class="collection with-header">
        <li class="collection-header"><h5>Pesan Masuk</h5></li>
       <?php
				$vps01_sw02 = $ms_q("$sl TOP 5 * FROM tb_pesan WHERE untuk='$vkryy[KaryNomor]' AND status='1' order by tgl desc");
					while($vps01_sww02 = $ms_fas($vps01_sw02)){
					//echo"$vps01_sww";
			?>
            <?php if($vps01_sww02['status']=="1"){ ?>
       <a href="<?php echo"?HLM=PESAN_M_INBOX_READ&IDPSN01=$vps01_sww02[idmain_pesan]"; ?>"> <li class="collection-item active"><?php echo"$vps01_sww02[nama]"; ?>
        <?php
			echo"<br>";	   
					echo"$vps01_sww02[tgl] - $vps01_sww02[dari]";
			?>
        </li>
       		</a>
		<?php }elseif($vps01_sww02['status']=="2"){ ?>
        <li class="collection-item"><?php echo"$vps01_sww02[nama]"; ?>
        <?php
			echo"<br>";	   
					echo"$vps01_sww02[tgl] - $vps01_sww02[dari]";
			?>
        </li>
	   
	   <?php } } ?>
       	
      </ul>
      <!-- -->
        <div class="col s12 m7">
            <!-- <h2 class="header">Horizontal Card</h2> -->
            <div class="card horizontal">
              <div class="card-image">
                <!-- <img src="https://lorempixel.com/100/190/nature/6"> -->
              </div>
              <div class="card-stacked">
                <div class="card-content">
                  <p><?php echo"NIK $vkryy[KaryNomor]<br>Nama $vkryy[KaryNama]<br>Alamat $vkryy[KaryAlamat]<br>Pangkat $vkryy[KaryPangkat]"; ?></p>
                </div>
                <div class="card-action">
                  <b>Pintasan Menu</b>
                  <br>
           
                  <div class="collection">
                    <a href="?HLM=RIWAYAT_M_RIWAYAT" class="collection-item"><i class="fas fa-bullseye"></i>&nbsp;Riwayat Gaji</a>
                    <a href="?HLM=RIWAYAT_M_RIWAYAT_THR" class="collection-item"><i class="fas fa-bullseye"></i>&nbsp;Riwayat THR</a>
                    <a href="?HLM=PROFIL_M_PROFIL" class="collection-item"><i class="fas fa-bullseye"></i>&nbsp;Profil Karyawan</a>
                    <a href="?HLM=PROFIL_M_AKUN" class="collection-item"><i class="fas fa-bullseye"></i>&nbsp;Akun Karyawan</a>
                    <?PHP #if($vkryy['KaryNomorYakkum']=="04181143" OR $vkryy['KaryNomorYakkum']=="04171083" OR $vkryy['KaryNomorYakkum']=="04960451" OR $vkryy['KaryNomorYakkum']=="04161031" OR $vkryy['KaryNomorYakkum']=="04020794" OR $vkryy['KaryNomorYakkum']=="04020798" OR $vkryy['KaryNomorYakkum']=="04100869"){ ?>
                        <!-- <a href="?HLM=RIWAYAT_M_YAKKUM" class="collection-item"><i class="fas fa-bullseye"></i>&nbsp;Gaji YAKKUM</a> -->
                    <?PHP #} ?>
                    
                       <a href="?HLM=RIWAYAT_M_YAKKUM" class="collection-item"><i class="fas fa-bullseye"></i>&nbsp;Gaji YAKKUM</a>
               		</div>
                
                </div>
              </div>
            </div>
          </div>
</body>
  <?php
		}else{
		  include'../logic/H_LOCATION.php';
		} }
		ob_flush();
	?>
