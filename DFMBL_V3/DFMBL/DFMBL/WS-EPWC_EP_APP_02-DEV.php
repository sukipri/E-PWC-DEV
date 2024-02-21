<?PHP error_reporting(0) ?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1  , user-scalable=0">
<link href="<?PHP echo"https://pantiwilasa-citarum.co.id/WEB-PWC/CDN/MIX-001/CSS/BOOT_LUX.css"; ?>" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<!-- -->

<div style="padding-top:4rem;"></div>
<body>
	 <div class="container">
	 <h4><a href="http://182.253.60.178/E-PWC/DFMBL_V3/DFMBL/EPWC_HOME_01.php?NAVI=EPWC_MENU_01_EP" class="btn bg-dark btn-warning btn-sm"><i class="fas fa-angle-double-left"></i>BACK</a> Check Out Presensi</h2>
 <?PHP 
	$IDEMP01 = @$_GET['IDEMP01'];
	$IDLAT01 = @$_GET['IDLAT01'];
	$IDLONG01 = @$_GET['IDLONG01'];

	date_default_timezone_set('Asia/Jakarta');
	$DATE_HTML5_SQL = date("Y-m-d");
	$TIME_HTML5 = date("H:i:s");

 //--LOCATED--// -6.969851, 110.439619
 function distance($lat1, $lon1, $lat2, $lon2, $unit) {
														  if (($lat1 == $lat2) && ($lon1 == $lon2)) {
															return 0;
														  }
														  else {
															$theta = $lon1 - $lon2;
															$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
															$dist = acos($dist);
															$dist = rad2deg($dist);
															$miles = $dist * 60 * 1.1515;
															$unit = strtoupper($unit);
														
															if ($unit == "K") {
															  return ($miles * 1.609344);
															} else if ($unit == "N") {
															  return ($miles * 0.8684);
															} else {
															  return $miles;
															}
														  }
														}
														/*
														echo distance(-6.969340, 110.440249, -6.969374, 110.440074, "M") . " Miles<br>";
														echo distance(-6.969340, 110.440249, -6.969374, 110.440074, "K") . " Kilometers<br>";
														echo distance(-6.969340, 110.440249, -6.969374, 110.440074, "N") . " Nautical Miles<br>";
 
 */
 ?>
 
 
  <?php 
  
  				//--DATA GEOLOCATED--//
				  /*
						$epwc_vgeo01_sw = $CL_Q("$CL_SL tb_ep_geo_01 WHERE geo_status_01='2'");
							$epwc_vgeo01_sww = $CL_FAS($epwc_vgeo01_sw);
				*/
				
				
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
					
?>

 <?php 
					//--DATA RECINFO VALIDASI--//s
					function curlriv($urlriv){
						$chriv = curl_init(); 
						curl_setopt($chriv,CURLOPT_HTTPHEADER,array(
						"Content-Type: Application/JSON",          
						"Accept: Application/JSON"
					));
						curl_setopt($chriv, CURLOPT_URL, $urlriv); 
						curl_setopt($chriv, CURLOPT_RETURNTRANSFER, 1); 
						curl_setopt($chriv, CURLOPT_TIMEOUT, 60);  
						curl_setopt($chriv, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($chriv, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($chriv, CURLPROTO_HTTPS , true);
						curl_setopt($chriv, CURLINFO_HEADER_OUT, true);
						curl_setopt($chriv, CURLOPT_CUSTOMREQUEST, "GET");
						$outputriv = curl_exec($chriv); 
						curl_close($chriv);      
						return $outputriv;
					}
					
					$sendriv = curlriv("http://182.253.60.178/E-PWC/BJH12/EP_API/API_EP_SAVE_RECINFO_01_VIEW_VALIDASI02.php?IDEMP01=$IDEMP01");
					
					// mengubah JSON menjadi array
					@$data_riv = json_decode($sendriv, TRUE);
					
						//print_r($data);

?>

            
            		<!-- -->
                      <?PHP foreach($data_kry['data_kry']as $baris_kry){ ?>
                    <div class="card border-primary mb-3 mx-2" style="max-width: 60rem;">
                      <div class="card-header"><?PHP echo $baris_kry['nip'] ." <br> ". $baris_kry['nama'];  ?></div>
                      <div class="card-body">
                      	
                     <!-- VALIDASI -->
                     		<?PHP if($data_riv[0]['status']=="2"){ ?>
                            	<b>Anda Sudah Melakukan Absensi</b>
                            <?PHP }else{ ?>
                     <!-- -->
                        <!-- BUTTON PROCCESING DATA -->
                        
                        	<?PHP foreach($data_jdw['data_jdw'] as $baris_jdw){ ?>
                            
								<b>
									<i class="fas fa-calendar-alt"></i>&nbsp<?PHP echo $DATE_HTML5_SQL."<br>"; ?>
									<i class="far fa-bell"></i>&nbsp<?PHP echo $TIME_HTML5 ; ?>
									<br>
									<?PHP echo $baris_jdw['tgl_sub'];

								</b>
								<br>
                                	<button type="button" class="btn btn-info btn-lg" onClick="getLocation()">Check Out</button>
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
									  window.location.href = "?NAVI=EPWC_MENU_01_EP&PG_SA=EPWC_EP_APP_02&IDKRY=<?PHP echo $baris_kry['nip']; ?>&WS-GEOKLIK02=WS-GEOKLIK02&GEOKLIK02=GEOKLIK02&IDEMP01=<?PHP echo"$IDEMP01"; ?>&IDLAT01=" + position.coords.latitude + "&IDLONG01=" + position.coords.longitude ; 
                                    }
							</script>     
				
                                <!-- -->
                              <?PHP } //CLose DATA VALIDASI ?>
                              
                                <div class="alert alert-dismissible alert-secondary" style="max-width:20rem;">
  								<?PHP 
									//--Konversi & GET DATA--//
									/*
									$ep_cut_vmap01_lat = substr($IDLAT01,0,-3);
									$ep_ceil_vmap01_lat = round($ep_cut_vmap01_lat,PHP_ROUND_HALF_DOWN);
									$ep_cut_vmap01_long = substr($IDLONG01,0,-2);
									$ep_ceil_vmap01_long = round($ep_cut_vmap01_long,PHP_ROUND_HALF_DOWN);
									
									$epwc_ceil_vmap01_lat = round($epwc_vgeo01_sww['geo_latacuan_01'],PHP_ROUND_HALF_DOWN);
									$epwc_ceil_vmap01_long = round($epwc_vgeo01_sww['geo_longacuan_01'],PHP_ROUND_HALF_DOWN);
									*/
									/*
									echo"[]JADWAL MASUK";
									echo"<br>";
									echo FS_DATE($DATE_HTML5_SQL);
									echo"<br>";
									echo $baris_jdw['date_cek'];
									echo" - ";
									echo $baris_jdw['tgl'] ;
								*/
								if(isset($_GET['GEOKLIK02'])){
									//--FORMULLA--//
											#-VARIABLE-#-6.969340, 110.440249
											/*
											$R01LT = round('-6.969340',PHP_ROUND_HALF_DOWN);
											$R01LN = round('110.440249',PHP_ROUND_HALF_DOWN);
											
											-6.969704, 110.440595
											-6.969374, 110.440074
											-6.969704, 110.440595
											-6.9698192, 110.439787
											-7.018833, 110.433215 HOME TOWN
											-6.969815, 110.439678
											-6.970651, 110.439630 LUAR GERBANG
											-6.969764, 110.440594 PINUT POLI
											-0.063109700482828 LOKASI PWC
											-6.970107, 110.440281 ATM
											*/
											
											/**/
											$LT01 = $IDLAT01;
											$LN01 = $IDLONG01;
											
											 function distancePV($lat1PV, $lon1PV, $lat2PV, $lon2PV, $unitPV) {
														  if (($lat1PV == $lat2PV) && ($lon1PV == $lon2PV)) {
															return 0;
														  }
														  else {
															$thetaPV = $lon1PV - $lon2PV;
															$distPV = sin(deg2rad($lat1PV)) * sin(deg2rad($lat2PV)) +  cos(deg2rad($lat1PV)) * cos(deg2rad($lat2PV)) * cos(deg2rad($thetaPV));
															$distPV = acos($distPV);
															$distPV = rad2deg($distPV);
															$milesPV = $distPV * 60 * 1.1515;
															$unitPV = strtoupper($unitPV);
														
															if ($unitPV == "K") {
															  return ($milesPV * 1.609344);
															} else if ($unitPV == "N") {
															  return ($milesPV * 0.8684);
															} else {
															  return $milesPV;
															}
														  }
														}
															$MY_LOCATED = distancePV($LT01,$LN01, -6.969851, 110.439619, "M");
													
															echo "Radius Anda $MY_LOCATED";
															echo"<br>";
																	
																		if($MY_LOCATED > 0.04900000000){
																				echo"<br>";
																			echo"<span class=bg-danger><font color=#fff>is too far</font></span>";
																		}elseif($MY_LOCATED < 0.04900000000){
																			echo"<span class=bg-success><font color=#fff>GOOD SIGNAL</font></span>";
																			echo"<br>";
																			include"EXE_MIX.php";
																			
																		}
													
													
								}
									//include"../LOGIC/PRC/EXE_MIX.php";
								?>
								</div>
                                *(<i>Jika absensi sudah dilakukan tekan back untuk kembali ke halaman utama)
                                <!--
								<iframe src="https://www.google.com/maps/embed/v1/view?key=AIzaSyDaRofJNTYxCNlyQgeA4ozIjV2_Ekt-hGc&center=<?php //echo"$IDLAT01,$IDLONG01"; ?>&zoom=18&maptype=satellite" width="100%" height="500"></iframe> -->
                            <?PHP } ?>
                            
                            	<?PHP  ?>
                        <!-- -->
                      </div>
					</div>
                    	<?PHP } ?>
								</div>
								</body>