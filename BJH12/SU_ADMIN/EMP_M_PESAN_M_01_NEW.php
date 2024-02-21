<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
            <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<body>
	<form action="" method="post">
   <table width="100%" border="0" class="table table-bordered table-sm" style="max-width:50rem;">
          <tr>
            <td>
           		<select name="untuk" class="form-control form-control-sm" required style="max-width:22rem;">
           			<option value="">Untuk</option>     
                    <?php
						$vem_sw02 = $ms_q("$sl KaryNomor,KaryNama FROM  TKaryawan order by  KaryNama asc");
							while($vemm_sww02 = $ms_fas($vem_sw02)){
									if($vemm_sww02['KaryNomor']==$IDEMP01){
								echo"<option value=$vemm_sww02[KaryNomor] selected>$vemm_sww02[KaryNama]</option>";	
									}else{
								echo"<option value=$vemm_sww02[KaryNomor]>$vemm_sww02[KaryNama]</option>";	
							} }
					
					?>
                </select>
            </td>
          </tr>
          <tr>
            <td>
           		 Subjek<br>
                <input type="text" name="nama" class="form-control form-control-sm" required autocomplete="off" style="max-width:22rem;">
            </td>
          </tr>
          <tr>
            <td>
            <textarea name="isi"></textarea>
            </td>
          </tr>
          <tr>
            <td><button  class="btn btn-success" name="kirim"><i class="fas fa-arrow-alt-circle-up"></i>&nbsp;Kirim</button></td>
          </tr>
	</table>
			  <script>
                        CKEDITOR.replace( 'isi' );
                </script>
    </form>
   		 <?php include"../logic/EXE_PESAN_01.php"; ?>
         <?php include"../logic/UP_EMP_DAFTAR_01_TOLAK.php"; ?>
</body>
<?php } ?>