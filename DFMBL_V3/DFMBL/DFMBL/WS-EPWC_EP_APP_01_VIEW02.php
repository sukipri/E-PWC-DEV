<?php
        error_reporting(0);
		//..Sesiion open../
		 if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
 			include'../LOGIC/PG/PG_H_LOCATION.php';
       }else{ 
	    #GEO LOCATED
        $epwc_vgeo01_sw = $CL_Q("$CL_SL tb_ep_geo_01 WHERE geo_status_01='2'");
        $epwc_vgeo01_sww = $CL_FAS($epwc_vgeo01_sw);

            #Web Service //--DATA KARYAWAN--//
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

	   ?>
<body>
    
        <a href="<?PHP echo"?NAVI=EPWC_MENU_01_EP&PG_SA=WS-EPWC_EP_APP_01_VIEW02_TB"; ?>" class="mx-2 btn btn-primary">DATA TABLE</a>
        <hr>
		<span class="mx-2 h5"><b>#Riwayat Presensi Personel</b></span>
<?PHP 
    $epwc_view02_vkry01_sw = $CL_Q("$SL KaryNomor,KaryNomorYakkum,KaryNama,UnitKode FROM Citarum.dbo.TKaryawan WHERE UnitKode='$epwc_vkry01_sww[UnitKode]' AND  NOT KaryStatus='91' AND NOT KaryStatus='99'  AND NOT KaryStatus='92'  AND NOT KaryStatus='94'  AND NOT KaryStatus='93' ");
        while($epwc_view02_vkry01_sww = $CL_FAS($epwc_view02_vkry01_sw)){
            #Substring data
            $epwc_sub_view02_vkry01_sw = substr($epwc_view02_vkry01_sww['KaryNomorYakkum'],1);
            $IDEMPUNIT01 = $epwc_sub_view02_vkry01_sw;

            $send = curl("http://103.164.114.138/E-PWC-DEV/BJH12/EP_API/API_EP_SAVE_RECINFO_01_VIEW02.php?IDEMPUNIT01=$IDEMPUNIT01");
					
            // mengubah JSON menjadi array
            @$data_ri = json_decode($send, TRUE);
?>
          <div class="toast show mx-2 bg-info" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto"><?PHP echo $epwc_sub_view02_vkry01_sw; ?></strong>
                </div>
                <div class="toast-body">
                   <b><?PHP echo $epwc_view02_vkry01_sww['KaryNama'] ?></b>
                </div>
            </div>  	
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
              <br>
              <?PHP echo $baris_ri['cek_masuk'];  ?>
               - 
            <?PHP
            if($baris_ri['cek_telat'] < 0 ){
                echo"<b>ON TIME</b>";                
            }else{

            #KONDISI TERLAMBAT
            if($baris_ri['status']=="1"){   ?>
            <i><?PHP echo $baris_ri['cek_telat']." Jam ".$baris_ri['cek_telat02']." Menit "; ?>
            <?PHP }elseif($baris_ri['status']=="2"){ echo $baris_ri['cek_telat02a']." Jam ".$baris_ri['cek_telat0202']." Menit";  } } ?>
            </i>
           </div>
       <?PHP } ?>

       <?PHP } #CLose data karyawan ?>
       <br>
       
</body>
<?PHP } ?>