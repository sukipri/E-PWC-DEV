<?php
		//..Sesiion open../
		 if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
 			include'../LOGIC/PG/PG_H_LOCATION.php';
       }else{ 
	   
	   ?>
<body>
        <h5><a href="HOME.php"><i class="fas fa-angle-double-left"></i></a> &nbsp; || Info  Profil || <a href="?HLM=PROFIL_M_PROFIL_BERKAS">Berkas</a></h5>
        <br>
        <!-- -->
            <?php //echo"$vkryy[status]"; ?>
          <div class="row">
            <div class="col s12 m6">
              <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                  <!-- <span class="card-title">Card Title</span> -->
                  <ol>
                  <li>Silakan lakukan <i>pengeditan profil</i> dengan benar sesuai form yang ditentukan</li>
                  <li>Pastikan <i>data profil </i> sesuai dengan berkas yang di lampirkan</li>
                  <li>Setalah Melakukan <i>pengeditan profil</i> tunggu untuk proses validasi dai pihak <b>SDM</b>
                  </ol>
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
        
        <!-- -->
        <?php 
                if($vkryy['status']==3){
            ?>
             <div class="row">
            <div class="col s12 m6">
              <div class="card orange darken-4">
                <div class="card-content white-text">
                  <!-- <span class="card-title">Card Title</span> -->
                    <p>Penggantian profil anda tidak di validasi SDM silahkan lakukan pengisian kembali</p>
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
        <?php 
                if($vkryy['status']==1){
            ?>
             <div class="row">
            <div class="col s12 m6">
              <div class="card red darken-1">
                <div class="card-content white-text">
                  <!-- <span class="card-title">Card Title</span> -->
                    <p>Silahkan tunggu beberapa saat lagi untuk di validasi SDM</p>
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
            <?php }else{
                
                ?>
        <form method="post">
            NIK<br>
             <input value="<?php echo"$vkryy[KaryNomor]"; ?>" readonly  type="text" class="validate">
            <br>
            Nama
            <input value="<?php echo"$vkryy[KaryNama]"; ?>" name="nama"   type="text" class="validate">
            <br>
            Tempat Lahir
            <br>
            <input value="<?php echo"$vkryy[KaryTmpLahir]"; ?>" name="tlahir"  type="text" class="validate">
            <br>
            Tanggal Lahir
            <input value="<?php echo"$vkryy_tgl[tg_lhr]"; ?>" name="ttl"   type="text" class="validate">
            *(Format Bulan/Hari/Tahun
            <br>
            Alamat
            <input value="<?php echo"$vkryy[KaryAlamat]"; ?>" name="alamat"   type="text" class="validate">
             <br>
            Kota
            <input value="<?php echo"$vkryy[KaryKota]"; ?>" name="kota"   type="text" class="validate">
            <br>
            Telepon
           <input value="<?php echo"$vkryy[KaryTelepon]"; ?>" name="no_tlp"   type="text" class="validate">
           <br>
           @mail
            <input value="<?php echo"$vkryy[KaryEmail]"; ?>" name="email"   type="email" class="validate">
            <br><br>
            NPWP
            <input value="<?php echo"$vkryy[KaryNPWP]"; ?>" name="npwp"   type="text" class="validate">
            <br>
             Nomor Dapen
            <input value="<?php echo"$vkryy[KaryYDPNo]"; ?>" name="no_dapen"   type="text" class="validate"> 
            <br>
            JAMSOSTEK
            <input value="<?php echo"$vkryy[KaryNoJAMSOSTEK]"; ?>" name="no_jamsostek"   type="text" class="validate"> 
            No JKN
            <input value="<?php echo"$vkryy[KaryNoBPJS]"; ?>" name="no_bpjs"   type="text" class="validate"> 
            <button name="up_01" class="btn  light-green darken-4"><i class="fas fa-edit"></i>&nbsp; Update</button>
            
        </form>
       <?PHP } ?>
</body>
<?PHP } ?>