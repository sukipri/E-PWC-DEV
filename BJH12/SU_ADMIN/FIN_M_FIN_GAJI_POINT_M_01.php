<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
		<b><i class="fas fa-thumbtack"></i>&nbsp;Daftar point gaji karyawan</b>
       	<form method="post" action="">
        <!-- -->
       <div class="input-group mb-3" style="max-width:20rem;">
              <input type="text" autocomplete="off" class="form-control" name="nama" placeholder="Masukan NIK..." required aria-label="Masukan NIK...">
              <div class="input-group-append">
                <button name="cari" class="form-control"><i class="fas fa-search"></i>&nbsp;Cari</button>
              </div>
		</div>
        <!-- -->
        <?php
			if(isset($_POST['cari'])){
				$nama = @$sql_slash($_POST['nama']);
		?>
     <?php
	 		$vkry_pusat = $ms_q("$sl KaryNomor,KaryNama FROM TKaryawan WHERE KaryNama LIKE '%$nama%' OR KaryNomor='$nama' AND NOT KaryStatus='91' AND NOT KaryStatus='99'  AND NOT KaryStatus='92'  AND NOT KaryStatus='94'  AND NOT KaryStatus='93'  order by KaryNama asc");
						$no = 1;
						while($vkryy_pusat = $ms_fas($vkry_pusat)){
	 			echo"<b>$vkryy_pusat[KaryNama]<b><br>$vkryy_pusat[KaryNomor]";
	 ?>
     			
        <table width="100%" border="0" class="table table-bordered table-striped">
        
          <tr class="table-info">
            <td width="25%">Gaji pokok , point & Total</td>
            <td width="25%">Gaji Jabatan</td>
            <td width="25%">Gaji Fungsional</td>
            <td width="25%">Gaji Khusus</td>
          </tr>
        <?php
			$vgj_02 = $ms_q("$sl TOP 10 * FROM TGaji WHERE  KaryNomor='$vkryy_pusat[KaryNomor]'  order by GajiBulan desc");
						while($vgjj_02 = $ms_fas($vgj_02)){
								
								$nom_vgj01a = @$nf($vgjj_02['GajiPokokVar']);
								$nom_vgj01b = @$nf($vgjj_02['GajiPokokJml']);
								
								$nom_vgj02a = @$nf($vgjj_02['GajiJabatanVar']);
								$nom_vgj02b = @$nf($vgjj_02['GajiJabatanJml']);
								
								$nom_vgj03a = @$nf($vgjj_02['GajiFungsiVar']);
								$nom_vgj03b = @$nf($vgjj_02['GajiFungsiJml']);
								
								$nom_vgj04a = @$nf($vgjj_02['GajiKhususVar']);
								$nom_vgj04b = @$nf($vgjj_02['GajiKhususJml']);
		
		?>
          <tr>
            <td width="29%">
             <input type="text" class="form-control" readonly value="<?php echo"$nom_vgj01a"; ?>" style="max-width:10rem;">
                <div class="input-group mb-3">
                   <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2"><i class="fas fa-award"></i>&nbsp<?php echo"$vgjj_02[GajiPokokAK]"; ?> </span>
                        <span class="input-group-text" id="basic-addon2"><i class="fas fa-calculator"></i>&nbsp<?php echo"$nom_vgj01b"; ?> </span>
                        <span class="input-group-text" id="basic-addon2"><?php echo"<b>@$vgjj_02[GajiBulan]</b>"; ?> </span>
						
                       </div>
                </div>
               
		</td>
            <td width="22%">
              <input type="text" class="form-control" readonly value="<?php echo"$nom_vgj02a"; ?>" style="max-width:10rem;">
                <div class="input-group mb-3">
                   <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2"><i class="fas fa-award"></i>&nbsp<?php echo"$vgjj_02[GajiJabatanAK]"; ?> </span>
                        <span class="input-group-text" id="basic-addon2"><i class="fas fa-calculator"></i>&nbsp<?php echo"$nom_vgj02b"; ?> </span>
                        <span class="input-group-text" id="basic-addon2"><?php echo"<b>@$vgjj_02[GajiBulan]</b>"; ?> </span>
						
                       </div>
                </div>
              
            </td>
            <td width="23%"> 
              <input type="text" class="form-control" readonly value="<?php echo"$nom_vgj03a"; ?>" style="max-width:10rem;">
                <div class="input-group mb-3">
                   <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2"><i class="fas fa-award"></i>&nbsp<?php echo"$vgjj_02[GajiFungsiAK]"; ?> </span>
                        <span class="input-group-text" id="basic-addon2"><i class="fas fa-calculator"></i>&nbsp<?php echo"$nom_vgj03b"; ?> </span>
                        <span class="input-group-text" id="basic-addon2"><?php echo"<b>@$vgjj_02[GajiBulan]</b>"; ?> </span>
						
                       </div>
                </div>
        
                </td>
            <td width="26%">
             <input type="text" class="form-control" readonly value="<?php echo"$nom_vgj04a"; ?>" style="max-width:10rem;">
                <div class="input-group mb-3">
                   <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2"><i class="fas fa-award"></i>&nbsp<?php echo"$vgjj_02[GajiKhususAK]"; ?> </span>
                        <span class="input-group-text" id="basic-addon2"><i class="fas fa-calculator"></i>&nbsp<?php echo"$nom_vgj04b"; ?> </span>
                        <span class="input-group-text" id="basic-addon2"><?php echo"<b>@$vgjj_02[GajiBulan]</b>"; ?> </span>
						
                       </div>
                </div>
             
            </td>
          </tr>
          <?php } ?>
        </table>
        <?php }} ?>
        <br>
        
        
        </form>
</body>
<?php } ?>