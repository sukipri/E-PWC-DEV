<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
            #DATA KARYAWAN
            $ep_vkry01_sw = $ms_q("$sl KaryNomor,KaryNama FROM TKaryawan WHERE KaryNomor='$ep_vkryp01_sww[idmain_kary]'");
            $ep_vkry01_sww = $ms_fas($ep_vkry01_sw);
			?>
                <span class="badge bg-info">#ENTRI MANUAL ABSENSI</span>
                <form method="post">
                <input type="text" class="form-control form-control-sm" name="" value="">
                
                </form>

<?PHP } ?>