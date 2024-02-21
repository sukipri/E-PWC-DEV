<?php /* session_start();  require"../CONFIG_INTERNAL.php";  require"css.php";*/ ?>
<?php  include"../CONFIG_INTERNAL.php"; ?>
<body>
	<br>
<?php
		$vus = $ms_q("$sl kode FROM TBUser ");
				$nr_vus = $ms_nr($vus);
					$hit_vus = $nr_vus + 1;
					$hit_zero = sprintf("%02d", $hit_vus);
				$c_kode = "AKN$date_ack-$hit_zero";
			if(isset($_POST['simpan'])){
				$kode = @$_POST['kode'];
				$angka = @$_POST['angka'];
				$akses_user = @$_POST['akses_user'];
				$id_akses = @$_POST['id_akses'];
				$namauser = @$_POST['namauser'];
				$passuser = cr($_POST['passuser']);
				$akses = @$_POST['akses'];
						$save = $ms_q("$in TBUser(idmain,kode,namauser,passuser,akses)values('$IDMAIN','$kode','$namauser','$passuser','$akses_user')");
						if ($save) {  echo"Data <b><i>sukses</i></b> diinput.....";
									}else{
   								 echo"Data <b><i>GAGAL</i></b> diinput....."; }
				} ?>
		<div class="container">
		<div class="card border-primary mb-3" style="max-width: 80rem;">
  <div class="card-header"><h4><i class="fa fa-address-book-o"></i>&nbsp;  Reg.Akun </h4></div>
  <div class="card-body">

   <form name="form1" method="post" action="#here">

	
	  <br>
	  <div id="here">  </div>
  <table width="529" border="0" class="table table-bordered">
    
    <tr>
      <td width="523" height="62"> 
	 		<input type="text" name="kode" class="form-control" placeholder="isikan kode...." value="<?php echo"$c_kode"; ?>" required>	</td>
    </tr>
    <tr>
      <td height="66">
	 		<input type="text" name="namauser" class="form-control" placeholder="isikan user...." required>	 </td>
    </tr>
    <tr>
      <td height="65">
	 		<input type="password" name="passuser" class="form-control" placeholder="isikan password...." required>	 </td>
    </tr>
    <tr>
      <td height="86">
      <select name="akses_user" class="form-control">
      <option value="">Akses</option>
      <option value="5">Super Admin</option>
      <option value="52">SDM</option>
      <option value="51">Sekertariat</option>
      
      </select>
      </td>
    </tr>
    <tr>
      <td height="86">
	 		<input type="hidden" name="akses" class="form-control" value="1" readonly="">	 </td>
    </tr>
    <tr>
      <td><button class="btn btn-success" name="simpan">Simpan Data User</button></td>
    </tr>
  </table>


</form>
  </div>
</div>
	 </div>

</body>
