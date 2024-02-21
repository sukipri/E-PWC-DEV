<?php
		//..Sesiion open../
		 if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
 			include'../LOGIC/PG/PG_H_LOCATION.php';
       }else{ 
	   
	   ?>
<body>
		<span class="mx-2 h5"><b>#Riwayat Presensi</b></span>
        
        	<!-- -->
            
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
					
					$send = curl("http://182.253.60.178/E-PWC/BJH12/EP_API/API_EP_SAVE_RECINFO_01_VIEW.php?IDEMP01=$IDEMP01");
					
					// mengubah JSON menjadi array
					@$data_ri = json_decode($send, TRUE);

			?>
            <!-- -->
        		
        	<?PHP foreach($data_ri['data_ri'] as $baris_ri){ 
			
					if($baris_ri['status']=="1"){
							$epwc_status = "<span class=badge-success>Masuk</span>";
					}elseif($baris_ri['status']=="2"){
						$epwc_status = "<span class=badge-danger>Pulang</span>";
					}
			?>              
            <div class="alert alert-dismissible alert-secondary mx-2" style="max-width:50rem;">
             <i class="fas fa-quote-right"></i>
              <strong> <?PHP echo "#".$baris_ri['nip']."-". $baris_ri['kode_masuk']; ?> </strong> <br> Anda Telah Melakukan Presensi <i><?PHP echo $epwc_status; ?></i> <br><b><?PHP echo "Pada Tanggal ".$baris_ri['tgl_masuk']; ?></b>
           </div>
       <?PHP } ?>
       <br>
            <a href="#" class="btn btn-primary mx-2">Lihat riwayat lengkap</a>
</body>
<?PHP } ?>