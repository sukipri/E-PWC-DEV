 <?php
		include"../DIST/DIST_GET.php";
			include"../QR/qrlib.php";
		
?>
	<?php 
				$ec_vqc01_sw = $CL_Q("$CL_SL tb_qc_01 order by NEWID()");
					$ec_vqc01_sww = $CL_FAS($ec_vqc01_sw);
	?>
	<?php include"EC_HOME_APP_MENU01.php"; ?>
    <div class="container">
    <br><br>
  		<h5>#Masukan Identitas anda</h5>
  <form method="post" action="">
        <div class="card text-white bg-info mb-3">
          <div class="card-header"><i class="far fa-id-badge"></i>&nbsp;LOGIN PENGAWAS</div>
          <div class="card-body">
            <input type="text" autocomplete="off" class="form-control" name="us_nama" required placeholder="Username.." />
            <br />
            <input type="password" class="form-control" name="us_pass" required placeholder="Password..." />
            <br />
            <span class="badge badge-warning"><?php echo"$ec_vqc01_sww[qc_pertanyaan_01] ?"; ?></span>
            <input type="hidden" name="tanya_us" value="<?php echo"$ec_vqc01_sww[qc_jawaban_01]"; ?>" />
            <br /><br />
            <input type="text" name="jawab_us" class="form-control form-control-sm" required="required" autocomplete="off" placeholder="isikan jawaban...." style="max-width:10rem;" />
            <br /><br />
            <button name="ec_acs_login" class="btn btn-success"><i class="fas fa-sign-in-alt"></i>&nbsp;LOGIN</button>
          </div>
        </div>
    </form>
    			
            <!-- -->
            	<?php include"../LOGIC/ACS/ACS_LOGIN_CLIENT.php"; ?>
            <!-- -->
</div>