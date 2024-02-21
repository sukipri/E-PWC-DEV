<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
<b>Pendaftaran Akun / GLobal</b>
<form method="post">
<table width="100%" border="0" class="table table-bordered table-striped" style="max-width:60rem;">
   <tr>
      <td>NO</td>
      <td>NIK</td>
      <td>NAMA</td>
      <td>USERNAME</td>
      <td>PASSWORD</td>
    </tr>
	<?php
			$vkry_up = $ms_q("$sl KaryNomor,KaryNama,KaryTglLahir FROM TKaryawan WHERE NOT KaryStatus='91' AND NOT KaryStatus='99'  AND NOT KaryStatus='92'  AND NOT KaryStatus='94'  AND NOT KaryStatus='93' order by  KaryNama asc  "); 
			$no = 1;    
				while($vkryy_up = $ms_fas($vkry_up)){   
				$vkry_tgl= $ms_q("select CONVERT(varchar(10),[KaryTglLahir],101) as tg_lhr from Tkaryawan where KaryNomor='$vkryy_up[KaryNomor]'");
					$vkryy_tgl = $ms_fas($vkry_tgl);
					//$kalimat = "123456789";
						$sub_kalimat = substr($vkryy_up['KaryNama'],0,3);
						$sub_kalimat_02 = substr($vkryy_tgl['tg_lhr'],8,2);
						$sub_kalimat_03 = substr($vkryy_tgl['tg_lhr'],3,2);
						//echo $sub_kalimat;
// 456789
     ?>
 
    <tr>
  	<td width="5%"><?php echo"$no"; ?></td>
    <td width="22%"><input type="text" name="<?php echo"nik$no"; ?>" class="form-control" value="<?php echo"$vkryy_up[KaryNomor]"; ?>"></td>
    <td width="32%"><?php echo"$vkryy_up[KaryNama]<br>Tgl Lahir //$vkryy_tgl[tg_lhr]"; ?></td>
    <td width="24%"><input type="text" name="<?php echo"nu$no"; ?>" class="form-control" value="<?php echo"$sub_kalimat$sub_kalimat_02$no"; ?>"></td>
    <td width="17%"><input type="text" name="<?php echo"ps$no"; ?>" class="form-control" value="<?php echo"pwc123"; ?>"></td>
  </tr>
  <?php $no++;} ?>
</table>
<button class="btn btn-success" name="simpan"><i class="fas fa-cloud-upload-alt"></i>&nbsp;UNGGAH</button>
</form>

<?php
			if(isset($_POST['simpan'])){
				//$kode = @trim($_POST['kode']);
				//$namauser = @$_POST['namauser'];
				//$pass_text = @$_POST['passuser'];
				//$passuser = cr($_POST['passuser']);
				//$akses = @$_POST['akses'];
				$no_nik = 1;
				$jum_vkry_up = $ms_q("$sl KaryNomor,KaryNama,KaryTglLahir FROM TKaryawan WHERE NOT KaryStatus='91' AND NOT KaryStatus='99'  AND NOT KaryStatus='92'  AND NOT KaryStatus='94'  AND NOT KaryStatus='93'"); 
				$jum_vkryy_up = $ms_nr($jum_vkry_up);
					while($no_nik <= $jum_vkryy_up){
							$nik = @$_POST['nik'.$no_nik];
							$nik_id = @cr($_POST['nik'.$no_nik]);
							$nu = @$_POST['nu'.$no_nik];
							$ps = @$_POST['ps'.$no_nik];
							$ps2 = @cr($_POST['ps'.$no_nik]);
							
					
						$ms_q("$in TBUser(idmain,kode,namauser,passuser,akses,password_text)values('$nu$nik_id$no_nik','$nik','$nu','$ps2','41','$ps')");
						//header("location:?HLM=EMP_M&SUB=EMP_M_AKUN_M&SUB_CHILD=EMP_M_AKUN_M_DAF_GL");
					?>
                   <div class="alert alert-dismissible alert-success">
                          <button type="button" class="close" data-dismiss="alert">X</button>
                         	<a href="#!" class="collection-item active"><?php echo"<i>$nik</i> Berhasil tersimpan"; ?></a>
                        </div>
			<?php $no_nik++; }} ?>
</body>
<?php } ?>