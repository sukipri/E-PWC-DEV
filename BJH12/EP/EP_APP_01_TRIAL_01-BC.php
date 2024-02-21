<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			error_reporting(0);
			?>
			<body>
            	<form method="post">
                	<b>#TRIAL APP EP</b>
            			<div class="card border-primary mb-3" style="max-width: 25rem;">
                                  <div class="card-header">Step - 01</div>
                                  <div class="card-body">
                                 	<!-- -->
                                    <div class="input-group mb-3">
                                      <input type="text" required class="form-control" autocomplete="off" placeholder="Nama...." name="ep_nip_cari_01">
                                      <button name="ep_cari_nip_01" class="btn btn-success btn-sm"><i class="fas fa-search"></i>&nbsp;CARI KARYAWAN</button>
								</div>
                                    
                                    <!-- --> 
                              </div>
                              </div>
                    </form>
                    <?PHP 
							if(isset($_POST['ep_cari_nip_01'])){
								$ep_nip_cari_01 = @$sql_sl($_POST['ep_nip_cari_01']);
								
								//--Proccessing--//
								$ep_vkry01_sw = $ms_q("$sl KaryNomor,KaryNomorYAKKUM,KaryNama FROM TKaryawan WHERE KaryNama LIKE '%$ep_nip_cari_01%'");
									while($ep_vkry01_sww = $ms_fas($ep_vkry01_sw)){
									
									//--DATA SHOW--//
										$ep_cut_vkry01_sw = substr($ep_vkry01_sww['KaryNomorYAKKUM'],1);
							?>
									<div class="alert alert-dismissible alert-info" style="max-width:20rem;">
                                        
                                          <strong><?PHp echo"$ep_vkry01_sww[KaryNama]"; echo"<br>"; echo"$ep_cut_vkry01_sw"; ?></strong> You successfully read <a href="<?PHP echo"?HLM=EP_HOME_01&SUB=EP_APP_01&SUB_CHILD=WS-EP_APP_01_TRIAL_02&IDEMP01=$ep_cut_vkry01_sw"; ?>" class="btn btn-primary btn-sm">Proses Data</a>.
									</div>
					<?PHP } } ?>
                    
            </body>
            
           <?PHP } ?>
            
            