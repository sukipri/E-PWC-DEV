<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
	<b>Pendaftaran Akun</b>
	<?php
			if(isset($_POST['simpan'])){
				$kode = @trim($_POST['kode']);
				$namauser = @$_POST['namauser'];
				$pass_text = @$_POST['passuser'];
				$passuser = cr($_POST['passuser']);
				$akses = @$_POST['akses'];
				$vkry = $ms_q("$sl KaryNomor FROM TKaryawan WHERE KaryNomor='$kode'");
						$jum_vkry = $ms_nr($vkry);
				$vkry_us = $ms_q("$sl namauser FROM TBUser WHERE namauser='$namauser'");
						$jum_vkry_us = $ms_nr($vkry_us);
				if($jum_vkry < 1){
				?>
				   <div class="collection red accent-3">
                 			<a href="#!" class="collection-item active">Maaf NIK tidak terdaftar</a>
                       </div>
                  <?php
				}elseif($jum_vkry_us > 0){ ?>
				   <div class="collection red accent-3">
                 			<font color="red"><b>Username Sampun gadahh nggihh , ojo dipaksakno ngko nek loro</b></font>
                       </div>
				 
				<?php
				}else{
						$ms_q("$in TBUser(idmain,kode,namauser,passuser,akses,password_text)values('$IDMAIN','$kode','$namauser','$passuser','$akses','$pass_text')");
						//header("location:?HLM=EMP_M&SUB=EMP_M_AKUN_M&SUB_CHILD=EMP_M_AKUN_M_DAF");

					?>              
                    <div class="collection">
                 			<a href="#!" class="collection-item active">Berhasil tersimpan</a>
                       </div>
                     
			<?php }} ?>
<form name="form1" method="post" action="">
  <table width="529" border="0" class="table table-borderless">
    <tr>
      <td width="523" height="62">  
         NIK<br>
	 		<input type="text" name="kode" style="max-width:20rem;" class="form-control" placeholder="isikan kode...." required>
	
      </td>
    </tr>
    <tr>
      <td height="66">
          Namauser<br>
	 		<input type="text" name="namauser" style="max-width:30rem;" class="form-control" placeholder="isikan user...." required>
	</td>
    </tr>
    <tr>
      <td height="65">
         Passuser<br>
	 		<input type="password" name="passuser" value="pwc123" style="max-width:30rem;" class="form-control" placeholder="isikan password...." required>
	  </td>
    </tr>
    <tr>
      <td height="86">
          Akses Karyawan<br>
	 		<input type="hidden" name="akses" class="form-control" value="4" readonly>
	 </td>
    </tr>
    <tr>
      <td>
      <button class="btn btn-success" name="simpan">Simpan Data User</button>
    
      </td>
    </tr>
  </table>
</form>
</body>
<?php } ?>