<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
		<b>#AKTIFIASI GAJI BULANAN YAKKUM</b>
		<br>
		<form method="post">
		<div class="input-group mb-3" style="max-width:30rem;">
		<select name="gaji_bulan_01" class="form-control form-control-sm" required>
		<?PHP 
			$bj_sl_vgy01_sw = $ms_q("$sl DISTINCT GajiBulan FROM Citarum.dbo.TGajiYakkum order by GajiBulan desc ");
			echo"<option value=></option>";
				while($bj_sl_vgy01_sww = $ms_fas($bj_sl_vgy01_sw)){
				 echo"<option value=$bj_sl_vgy01_sww[GajiBulan]>$bj_sl_vgy01_sww[GajiBulan]</option>";
				}
		?>
		</select>
		 <button class="btn btn-success btn-sm" name="btn_appv_01">Publikasi</button>
		 &nbsp
		 <button class="btn btn-danger btn-sm" name="btn_unappv_01">Take Down</button>
		</div>
		</form>
		<br>
		
			<?PHP 
				if(isset($_POST['btn_appv_01'])){ #APPROVAL
					$gaji_bulan_01 = @$_POST['gaji_bulan_01'];
					
					$bj_up_gy_01 = $ms_q("$up  Citarum.dbo.TGajiYakkum SET GajiStatus='1' WHERE GajiBulan='$gaji_bulan_01'");
					if($bj_up_gy_01){
						echo"<b>Berhasil</b> di publikasi";
					}else{
						echo"<b>Gagal</b> Terpubilikasi";				
				}
				}
				
				if(isset($_POST['btn_unappv_01'])){ #UNAPPROVAL
					$gaji_bulan_01 = @$_POST['gaji_bulan_01'];
					
					$bj_up_gy_01 = $ms_q("$up  Citarum.dbo.TGajiYakkum SET GajiStatus='0' WHERE GajiBulan='$gaji_bulan_01'");
					if($bj_up_gy_01){
						echo"<b>Berhasil</b> di Take Down";
					}else{
						echo"<b>Gagal</b> Terpubilikasi";				
				}
				}
				
			?>
			
			

<?PHP } ?>