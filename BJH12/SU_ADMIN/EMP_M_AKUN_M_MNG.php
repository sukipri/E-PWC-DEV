<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
<b>Pertinjauan Akun Karyawan</b>
<form method="post">
<table width="100%" border="0" class="table table-bordered table-striped" style="max-width:60rem;">
   <tr>
      <td>NO</td>
      <td>NIK</td>
      <td>NAMA</td>
      <td>####</td>
    </tr>
	<?php
			$vkry_up = $ms_q("$sl KaryNomor,KaryNama,KaryTglLahir FROM TKaryawan WHERE NOT KaryStatus='91' AND NOT KaryStatus='99'  AND NOT KaryStatus='92'  AND NOT KaryStatus='94'  AND NOT KaryStatus='93' order by  KaryNama asc  "); 
			$no = 1;    
				while($vkryy_up = $ms_fas($vkry_up)){   
				$vkry_tgl= $ms_q("select CONVERT(varchar(10),[KaryTglLahir],101) as tg_lhr from Tkaryawan where KaryNomor='$vkryy_up[KaryNomor]'");
					$vkryy_tgl = $ms_fas($vkry_tgl);
						$vtbu = $ms_q("$call_sel TBUser WHERE kode='$vkryy_up[KaryNomor]'");
							$vtbuu = $ms_fas($vtbu);
					//$kalimat = "123456789";
						$sub_kalimat = substr($vkryy_up['KaryNama'],0,3);
						$sub_kalimat_02 = substr($vkryy_tgl['tg_lhr'],8,2);
						$sub_kalimat_03 = substr($vkryy_tgl['tg_lhr'],3,2);
						//echo $sub_kalimat;
// 456789
     ?>
 
    <tr>
  	<td width="5%"><?php echo"$no"; ?></td>
    <td width="22%"><input type="text" name="<?php echo"nik$no"; ?>" class="form-control" readonly value="<?php echo"$vtbuu[kode]"; ?>"></td>
    <td width="32%"><?php echo"$vkryy_up[KaryNama]<br>Tgl Lahir //$vkryy_tgl[tg_lhr]"; ?></td>
    <td width="17%"><a href="" class="btn btn-success">Detail</a></td>
  </tr>
  <?php $no++;} ?>
</table>
<button class="btn btn-success" name="simpan"><i class="fas fa-cloud-upload-alt"></i>&nbsp;UNGGAH</button>
</form>


	
</body>
<?php } ?>