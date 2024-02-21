<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
			<body>
            <form method="post">
             <div class="card border-primary mb-3" style="max-width: 30rem;">
                                  <div class="card-header">Entri Jadwal</div>
                                  <div class="card-body">
                                 <!-- -->
                                    <div class="input-group input-group-sm mb-3">
                                          <span class="input-group-text" id="basic-addon1">Kode Jadwal</span>
                                          <input type="text" class="form-control form-control-sm" name="ep_jadwal_kode_01" required autocomplete="off">
                                    </div>
                                <!-- -->
                                <!-- -->
                                    <div class="input-group input-group-sm mb-3">
                                          <span class="input-group-text" id="basic-addon1">Flag Kode</span>
                                          <select name="ep_jadwal_flag_01" class="form-control form-control-sm" required>
                                          <option value=""></option>
                                          <?PHP 
										  	$ep_vflag01_sw = $ms_q("$call_sel tb_ep_flag_01 order by flag_kode_01 desc");
													while($ep_vflag01_sww = $ms_fas($ep_vflag01_sw)){
														echo"<option value=$ep_vflag01_sww[idmain_ep_flag_01]>$ep_vflag01_sww[flag_kode_01] - $ep_vflag01_sww[flag_ket_01]</option>";
													}
										  ?>
                                          </select>
                                          
                                    </div>
                                <!-- -->
                                    <div class="input-group input-group-sm mb-3">
                                          <span class="input-group-text" id="basic-addon1">Jadwal Caption</span>
                                          <input type="text" class="form-control form-control-sm" name="ep_jadwal_nama_01" required autocomplete="off">
                                    </div>
                                <!-- -->
                                 <!-- -->
                                    <div class="input-group input-group-sm mb-3">
                                          <span class="input-group-text" id="basic-addon1">Jadwal Hari</span>
                                         <select name="ep_jadwal_hari_01" class="form-control form-control-sm" required>
                                          <option value=""></option>
                                           <option value="MINGGU">MINGGU</option>
                                            <option value="SENIN">SENIN</option>
                                             <option value="SELASA">SELASA</option>
                                              <option value="RABU">RABU</option>
                                               <option value="KAMIS">KAMIS</option>
                                                <option value="JUMAT">JUMAT</option>
                                                 <option value="SABTU">SABTU</option>
                                                 
                                         
                                          </select>
                                    </div>
                                <!-- -->
                                   <!-- -->
                                    <div class="input-group input-group-sm mb-3">
                                          <span class="input-group-text" id="basic-addon1">Jam Berangkat</span>
                                          <input type="time" class="form-control form-control-sm" name="ep_jadwal_jam_01" required autocomplete="off">
                                    </div>
                                <!-- -->
                                 <!-- -->
                                    <div class="input-group input-group-sm mb-3">
                                          <span class="input-group-text" id="basic-addon1">Jam Pulang</span>
                                          <input type="time" class="form-control form-control-sm" name="ep_jadwal_jam_02" required autocomplete="off">
                                    </div>
                                <!-- -->
                                <!-- -->
                                 <div class="input-group input-group-sm mb-3">
                                          <span class="input-group-text" id="basic-addon1">Deskripsi</span>
                                         <textarea class="form-control" name="ep_jadwal_ket_01" placeholder="..........."></textarea>
                                    </div>
                                <!-- -->
                                   <br>
                                     <button name="ep_jadwal_simpan_01" class="btn btn-success btn-sm"><i class="fas fa-paper-plane"></i>&nbsp;Simpan Data</button>
                                     
                                    <!-- --> 
                                    <?PHP include"../logic/EP_EXE_MIX.php"; ?>
                                    <!-- -->
                                  </div>
                                  </div>
                              
                               
            
            </body>
     				</form>       
     <?PHP } ?>       
     