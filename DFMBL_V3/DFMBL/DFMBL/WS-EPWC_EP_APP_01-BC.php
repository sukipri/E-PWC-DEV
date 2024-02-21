  <?php 
  
  				//--DATA GEOLOCETE--//
						$epwc_vgeo01_sw = $CL_Q("$CL_SL tb_ep_geo_01 WHERE geo_status_01='2'");
							$epwc_vgeo01_sww = $CL_FAS($epwc_vgeo01_sw);
				
				
				
					//--DATA KARYAWAN--//
					function curl($url){
						$ch = curl_init(); 
						curl_setopt($ch,CURLOPT_HTTPHEADER,array(
						"Content-Type: Application/JSON",          
						"Accept: Application/JSON"
					));
						curl_setopt($ch, CURLOPT_URL, $url); 
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
						curl_setopt($ch, CURLOPT_TIMEOUT, 60);  
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLPROTO_HTTPS , true);
						curl_setopt($ch, CURLINFO_HEADER_OUT, true);
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
						$output = curl_exec($ch); 
						curl_close($ch);      
						return $output;
					}
					
					$send = curl("http://182.253.60.178/E-PWC/BJH12/EP_API/API_EP_HR_Personnel.php?IDEMP01=$IDEMP01");
					
					// mengubah JSON menjadi array
					@$data_kry = json_decode($send, TRUE);
					
						//print_r($data);

?>
			
             <?php 
					//--DATA JADWAL--//
					function curl02($url02){
						$ch02 = curl_init(); 
						curl_setopt($ch02,CURLOPT_HTTPHEADER,array(
						"Content-Type: Application/JSON",          
						"Accept: Application/JSON"
					));
						curl_setopt($ch02, CURLOPT_URL, $url02); 
						curl_setopt($ch02, CURLOPT_RETURNTRANSFER, 1); 
						curl_setopt($ch02, CURLOPT_TIMEOUT, 60);  
						curl_setopt($ch02, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($ch02, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch02, CURLPROTO_HTTPS , true);
						curl_setopt($ch02, CURLINFO_HEADER_OUT, true);
						curl_setopt($ch02, CURLOPT_CUSTOMREQUEST, "GET");
						$output02 = curl_exec($ch02); 
						curl_close($ch02);      
						return $output02;
					}
					
					$send02 = curl02("http://182.253.60.178/E-PWC/BJH12/EP_API/API_EP_TJADWAL_KRY_01.php?IDEMP01=$IDEMP01");
					
					// mengubah JSON menjadi array
					@$data_jdw = json_decode($send02, TRUE);
					
						//print_r($data);

?>
            
            		<!-- -->
                      <?PHP foreach($data_kry['data_kry']as $baris_kry){ ?>
                    <div class="card border-primary mb-3" style="max-width: 60rem;">
                      <div class="card-header"><?PHP echo $baris_kry['nip'] ." - ". $baris_kry['nama'];  ?></div>
                      <div class="card-body">
                      	<!-- -->
                        	<?PHP foreach($data_jdw['data_jdw'] as $baris_jdw){ ?>
                            
                                <button type="button" class="btn btn-info btn-lg" onClick="getLocation()"><span class="badge badge-primary"><?PHP echo FS_DATE($DATE_HTML5_SQL) ; ?> </span> Absen Sekarang</button>
                                     <p id="demo"></p>
                                    <script>
                                    var x = document.getElementById("demo");
                                     
                                    function getLocation() {
                                      if (navigator.geolocation) {
                                        navigator.geolocation.getCurrentPosition(showPosition);
                                      } else { 
                                        x.innerHTML = "Geolocation tidak didukung oleh browser ini.";
                                      }
                                    }
                                     
                                    function showPosition(position) {
									x.innerHTML = "Latitude: " + position.coords.latitude + 
                                      "<br>Longitude: " + position.coords.longitude + 
                                      "<br><b>Lokasi Telah Aktif</b>"; 
									  window.location.href = "?NAVI=EPWC_MENU_01_EP&PG_SA=EPWC_EP_APP_01&GEOKLIK=GEOKLIK&IDEMP01=<?PHP echo"$IDEMP01"; ?>&IDLAT01=" + position.coords.latitude + "&IDLONG01=" + position.coords.longitude ; 
                                    }
							</script>     

                                <!-- -->
                                <div class="alert alert-dismissible alert-secondary" style="max-width:20rem;">
  								<?PHP 
									//--Konversi & GET DATA--//
									$ep_cut_vmap01_lat = substr($IDLAT01,0,-3);
									$ep_ceil_vmap01_lat = round($ep_cut_vmap01_lat,PHP_ROUND_HALF_DOWN);
									$ep_cut_vmap01_long = substr($IDLONG01,0,-2);
									$ep_ceil_vmap01_long = round($ep_cut_vmap01_long,PHP_ROUND_HALF_DOWN);
									
									$epwc_ceil_vmap01_lat = round($epwc_vgeo01_sww['geo_latacuan_01'],PHP_ROUND_HALF_DOWN);
									$epwc_ceil_vmap01_long = round($epwc_vgeo01_sww['geo_longacuan_01'],PHP_ROUND_HALF_DOWN);
									/*
									echo"[]JADWAL MASUK";
									echo"<br>";
									echo FS_DATE($DATE_HTML5_SQL);
									echo"<br>";
									echo $baris_jdw['date_cek'];
									echo" - ";
									echo $baris_jdw['tgl'] ;
								*/
								if(isset($_GET['GEOKLIK'])){
										if($ep_ceil_vmap01_lat==$epwc_ceil_vmap01_lat AND $ep_ceil_vmap01_long==$epwc_ceil_vmap01_long )	{
											echo"<span class=badge-success><i>Absensi berhasil disimpan</i></span>";	
											echo"<br>";
											echo"$ep_ceil_vmap01_lat<>$epwc_ceil_vmap01_lat";
											echo"<br>";
											echo"$ep_ceil_vmap01_long<>$epwc_ceil_vmap01_long ";
										}else{
											echo"<span class=badge-danger><i>Anda Diluar jangkauan GPS PWC</i></span>";	
												echo"<br>";
											echo"$ep_ceil_vmap01_lat<>$epwc_ceil_vmap01_lat";
											echo"<br>";
											echo"$ep_ceil_vmap01_long<>$epwc_ceil_vmap01_long ";
											
										}
								}
								?>
								</div>
                                
								<iframe src="https://www.google.com/maps/embed/v1/view?key=AIzaSyDaRofJNTYxCNlyQgeA4ozIjV2_Ekt-hGc&center=<?php echo"$IDLAT01,$IDLONG01"; ?>&zoom=18&maptype=satellite" width="100%" height="500"></iframe>
                            <?PHP } ?>
                        <!-- -->
                      </div>
					</div>
                    	<?PHP } ?>