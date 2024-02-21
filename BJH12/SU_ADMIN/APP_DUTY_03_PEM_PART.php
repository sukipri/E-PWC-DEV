<?php
		//error_reporting(0);
		ob_start();
		session_start();
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	 	   include'../logic/H_LOCATION.php';
			} else {
		include"css.php";
		include"../CONFIG_INTERNAL.php";
		//User assigment
		$u = $ms_q("select * from TBUser where namauser='$_SESSION[namauser]'");
		$uu = $ms_fas($u);
			if($uu['akses']==5){ 
		
			?>
            
            <?php 
				$IDKOP = @$sql_slash($_GET['IDKOP']);
					$vkp = $ms_q("$call_sel tb_kop WHERE idmain_kop='$IDKOP'");
                        $vkpp = $ms_fas($vkp);
			
			?>
<body>
<form method="post" action="">
  <table width="100%" style="max-width:40rem;" border="0" class="table">
              <tr class="table-info">
               	<td width="45%"><input type="text" name="nama" autocomplete="off" required class="form-control" placeholder="Masukan nama.."></td>
                <td width="55%"><button name="cari"  class="btn btn-success"><i class="fas fa-search"></i>&nbsp;Cari</button></td>
              </tr>
        </table>
    <!-- -->
    	<?php if(isset($_POST['cari'])){ $nama = @$sql_slash($_POST['nama']); ?>
  <table width="100%" style="max-width:45rem;" border="0" class="table table-bordered">
          <tr class="table-warning">
            <td>NIK</td>
            <td>NAMA</td>
            <td>GOL</td>
            <td>###</td>
          </tr>
          	<?php 
				$vkry_sw = $ms_q("$sl KaryNomor,KaryNama,KaryPangkat FROM TKaryawan WHERE KaryNama LIKE '%$nama%' order by KaryNama asc ");
					while($vkry_sww = $ms_fas($vkry_sw)){
			
			?>
          <tr>
            <td><?php echo"$vkry_sww[KaryNomor]"; ?></td>
            <td><?php echo"$vkry_sww[KaryNama]"; ?></td>
            <td><?php echo"$vkry_sww[KaryPangkat]"; ?></td>
            <td><a href="<?php echo"APP_DUTY_03_PEM_PART_02.php?IDKOP=$IDKOP&IDKRY=$vkry_sww[KaryNomor]"; ?>" class="btn btn-primary">Pilih</a></td>
          </tr>
          <?php } ?>
  </table>
  <?php } ?>
  </form>
</body>

<?php
		}else{
		  include'../logic/H_LOCATION.php';
		} }
		ob_flush();
	?>
