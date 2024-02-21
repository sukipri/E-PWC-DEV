<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
		<h5>#THR Karyawan Panti Wilasa</h5>
<form method="post" action="">
  <div class="input-group mb-3" style="max-width:20rem;">
                  <input type="text" required autocomplete="off" name="nama" class="form-control" placeholder="Masukan Nama / NIK ..."  aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button name="cari"  class="btn btn-success"><i class="fas fa-search"></i>&nbsp;Cari</button>      </td>
                  </div>
			</div>             
  <?php
  			if(isset($_POST['cari'])){
				$nama = @$sql_slash($_POST['nama']);
  ?>
  	<?php
		$vthr_sw = $ms_q("$call_sel TGajiTHR WHERE KaryNama LIKE '%$nama%' order by GajiTahun desc");
				while($vthr_sww = $ms_fas($vthr_sw)){
						//--//
						$nom_gajipokok_01 = @$nf($vthr_sww['GajiPokokJml']);
						$nom_gajikeluarga_01 = @$nf($vthr_sww['GajiKeluargaJml']);
						$nom_gajifungsi_01 = @$nf($vthr_sww['GajiFungsiJml']);
						$nom_gajikhusus_01 = @$nf($vthr_sww['GajiKhususJml']);
						$nom_gajijabatan_01 = @$nf($vthr_sww['GajiJabatanJml']);
						$nom_gajikompensasi_01 = @$nf($vthr_sww['GajiKompensasi']);
						$nom_gajilembur_01 = @$nf($vthr_sww['GajiLembur']);
	?>
  <table width="100%" border="0" class="table table-bordered table-sm" style="max-width:70rem;">
       <tr class="table-primary">
         <td width="20%"><?php echo"#$vthr_sww[GajiTahun]"; ?></td>
         <td width="25%">Gaji Pokok</td>
         <td width="25%">Tunj.Keluarga</td>
         <td width="25%">Tunj.Fungsi</td>
         <td width="25%">Tunj.Khusus</td>
         <td width="25%">Kompensasi</td>
         <td width="25%">Lembur</td>
       </tr>
              <tr>
                <td><?php echo"NIK $vthr_sww[KaryNomor]<br> <i>$vthr_sww[KaryNama]</i>"; ?></td>
                <td><?php echo"Rp.$nom_gajipokok_01"; ?></td>
                <td><?php echo"Rp.$nom_gajikeluarga_01"; ?></td>
                <td><?php echo"Rp.$nom_gajifungsi_01"; ?></td>
                <td><?php echo"Rp.$nom_gajikhusus_01"; ?></td>
                <td><?php echo"Rp.$nom_gajijabatan_01"; ?></td>
                <td><?php echo"Rp.$nom_gajilembur_01"; ?></td>
              </tr>
     <tr class="table-primary">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
     <tr>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
     </tr>
  </table>
    <?php }} ?>
            
             
  </form>
</body>
<?php } ?>