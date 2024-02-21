<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
            <?php 	if($uu['akses']==4){  ?>

<body>
<div class="container">
	<br><a href="HOME.php"><i class="fas fa-angle-double-left"></i></a> &nbsp; ||<a href="?HLM=PROFIL_M_AKUN"> update user</a> ||<b> update Password</b> <hr>
	<?php
			if(isset($_POST['simpan'])){
				//$kode = @trim($_POST['kode']);
				//$namauser = @$_POST['namauser'];
				$passuser = cr($_POST['passuser']);
				$pass_text = trim($_POST['passuser']);
				$akses = @$_POST['akses'];
				
				?>
				
				<?php
			
						$ms_q("$up TBUser set passuser='$passuser',password_text='$pass_text' WHERE kode='$uu[kode]'");
						//header("location:SUCCESS.php");
					?>
                    	
                  
                    <div class="collection">
                 			<a href="#!" class="collection-item active">Berhasil tersimpan</a>
                       </div>
                     
			<?php } ?>
<form name="form1" method="post" action="">
  <table width="529" border="0">
    <tr>
      <td width="523" height="62">  <div class="input-group">
          <div class="input-group-addon">NIK</div>
	 		<input type="text" name="kode" class="form-control" value="<?php echo"$uu[kode]"; ?>" readonly placeholder="isikan kode...." required>
	  </div>
      </td>
    </tr>
    <tr>
      <td height="66"><div class="input-group">
          <div class="input-group-addon">Namauser</div>
	 		<input type="text" name="namauser" readonly class="form-control" value="<?php echo"$uu[namauser]"; ?>" placeholder="isikan user...." required>
          
	  </div></td>
    </tr>
    <tr>
      <td height="65"><input type="password" name="passuser"  class="form-control" value="<?php echo"$uu[password_text]"; ?>" placeholder="isikan user...." required>  *(Ketik Password jika ingin mengganti password</td>
    </tr>
    <tr>
      <td height="86">
         
	 		<input type="hidden" name="akses" class="form-control" value="4" readonly>
              <button class="btn green" name="simpan">Update Password</button>
	</td>
    </tr>
    <tr>
      <td>
    
    
      </td>
    </tr>
  </table>
</form>
</div>
</body>

 <?php
		}else{
		  include'../logic/H_LOCATION.php';
		} }
		ob_flush();
	?>