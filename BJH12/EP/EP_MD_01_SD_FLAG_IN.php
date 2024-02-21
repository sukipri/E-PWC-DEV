<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
			<body>
          	<table width="100%" border="0" class="table table-bordered table-sm table-striped" style="max-width:60rem;">
                      <tr>
                        <td width="33%">
                        <!-- -->
                        
                        <form method="post">
                                <div class="card border-primary mb-3" style="max-width: 20rem;">
                                  <div class="card-header">Entri Flag</div>
                                  <div class="card-body">
                                  <!-- -->
                                    <div class="input-group input-group-sm mb-3">
                                          <span class="input-group-text" id="basic-addon1">Flag Kode</span>
                                          <input type="text" class="form-control form-control-sm" name="ep_flag_kode_01" required autocomplete="off">
                                    </div>
                                <!-- -->
                                <!-- -->
                                    <div class="input-group input-group-sm mb-3">
                                          <span class="input-group-text" id="basic-addon1">Flag Nama</span>
                                          <input type="text" class="form-control form-control-sm" name="ep_flag_ket_01" required autocomplete="off">
                                    </div>
                                <!-- -->
                                 <!-- -->
                                    <div class="input-group input-group-sm mb-3">
                                          <span class="input-group-text" id="basic-addon1">Inisialisasi</span>
                                          <input type="text" class="form-control form-control-sm" name="ep_flag_ins_01" required autocomplete="off">
                                    </div>
                                <!-- -->
                                
                                    <br>
                                     <button name="ep_flag_simpan_01" class="btn btn-success btn-sm"><i class="fas fa-paper-plane"></i>&nbsp;Simpan Data</button>
                                
                                  </div>
                            </div>
            
          		  </form>
            <!-- -->
            		<?PHP include"../logic/EP_EXE_MIX.php"; ?>
            <!--- -->
            
                        <!-- -->
                        </td>
                        <td width="67%">
                        <!-- -->
                        		<?PHP include"EP_MD_01_SD_FLAG_VIEW.php"; ?>
                        
                        <!-- -->
                        </td>
                      </tr>
		</table>

            </body>
            
     <?PHP } ?>