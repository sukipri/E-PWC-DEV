
<body>
<br>
<h5><a href="HOME.php"><i class="fas fa-angle-double-left"></i></a> &nbsp; || <a href="?HLM=PROFIL_M_PROFIL"> Info  Profil </a>|| Berkas</h5>
<br>
<!-- -->
	<?php //echo"$vkryy[status]"; ?>
  <div class="row">
    <div class="col s12 m6">
      <div class="card blue darken-2">
        <div class="card-content white-text">
          <!-- <span class="card-title">Card Title</span> -->
          <ol>
          <li>Silakan lakukan <i>pelampiran berkas</i> dengan benar sesuai data yang diperlukan</li>
          <li>Pastikan <i>lampiran </i> sesuai dengan profil </li>
          <li>Setelah semua terunggah klik <i>Konfirmasi Berkas</i> </li>
         <!--
          <li>Setelah semua terlampirkan <i>klik tombol konfirmasi berkas</i></li>
          <li>Setalah Melakukan <i>pengunggan berkas</i> tunggu untuk proses validasi dai pihak <b>SDM</b>
          -->
          </ol>
        </div>
    </div>
		    <!-- -->
            <?php 
		if($vkryy['status']==3){
	?>
     <div class="row">
    <div class="col s12 m6">
      <div class="card orange darken-4">
        <div class="card-content white-text">
          <!-- <span class="card-title">Card Title</span> -->
         	<p>Lampiran profil anda tidak di validasi SDM silahkan lakukan pengisian kembali </p>
        </div>
        <!--
        <div class="card-action">
          <a href="#">This is a link</a>
          <a href="#">This is a link</a>
        </div>
        -->
      </div>
    </div>
  </div>
  <?php } ?>
            <!-- -->
            <?php 
		//if($vkryy['status']==1){
	?> <!--
      <div class="row">
    <div class="col s12 m6">
      <div class="card red darken-1">
        <div class="card-content white-text">
          <!-- <span class="card-title">Card Title</span> 
         	<p>Silahkan tunggu beberapa saat lagi untuk di validasi SDM</p>
        </div>
       
        <div class="card-action">
          <a href="#">This is a link</a>
          <a href="#">This is a link</a>
        </div>
       
      </div>
    </div>
  </div> -->
    <?php //}else{
		
		?>
            <form method="post" enctype="multipart/form-data">
            <div class="col s12 m7">
   
    <div class="card horizontal">
      <!--
      <div class="card-image">
        <img src="https://lorempixel.com/100/190/nature/6">
      </div> -->
      <div class="card-stacked">
        <div class="card-content">
        	 <select name="tipe_berkas" required>
                  <option value="">Tipe Berkas</option>
                  <option value="10">KTP</option>
                  <option value="11">Kart Keluarga</option>
                  <option value="12">Ijasah</option>
                  <option value="13">Sertifikat</option>
                  <option value="14">Surat Tanda Registrasi</option>
                  <option value="15">Kart BPJS</option>
             </select>
          <!-- -->   
          <input type="text" name="nama_berkas" placeholder="Nama Lampiran..." autocomplete="off" required>
          <!-- -->
          <font color="#0099FF"><b>Form Upload</b></font> <br> 
     <input type="file" required name="up_berkas" media="capture" accept="image/jpeg">
     <br>
     Format pdf,Jpeg
     <!-- Proccesing -->
    		<?php include"../logic/EXE_BERKAS_01.php"; ?>
        </div>
        <div class="card-action">
        <button name="simpan_berkas" class="waves-effect waves-light btn small"><i class="material-icons left">file_upload</i> Unggah</button>
        <a href="<?php echo"?HLM=PROFIL_M_PROFIL_BERKAS&ACC_BERKAS=ACC_BERKAS"; ?>" class="btn small green dark-4"><i class="material-icons left">check</i> Konfirmasi Berkas</a> 
        </div>
      </div>
    </div>
  </div>
		</form>
        <?php //} ?>
         	<?php
			$vbrk01_sw = $ms_q("$call_sel tb_berkas WHERE idmain_kary='$vkryy[KaryNomor]'");
				while($vbrk01_sww = $ms_fas($vbrk01_sw)){
		?>	
        
      <!--
      <div class="card-image">
        <img src="https://lorempixel.com/100/190/nature/6">
      </div> -->
     	
			<?php echo"$vbrk01_sww[nama]"; ?>
            <br>
            <img src="<?php echo"../../FL02/$vbrk01_sww[berkas]"; ?>"  width="300" height="300" class="materialboxed"><br>


		<?php } ?>
</body>
