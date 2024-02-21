<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			error_reporting(0);
			?>
<body>
<?php
		//..Sesiion open../
		 if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
 			include'../LOGIC/PG/PG_H_LOCATION.php';
       }else{ 
	   
	   ?>

		<span class="mx-2"><b>#RIWAYAT ABSENSI</b></span>
		
        <!-- -->
            <?php 
  
				
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
					
					$send = curl("http://182.253.60.178/E-PWC/BJH12/EP_API/API_EP_SAVE_RECINFO_01_VIEW_ADM.php");
					
					// mengubah JSON menjadi array
					@$data_ri = json_decode($send, TRUE);
					
						//print_r($data);

?>
            <!-- -->
			<div style="overflow:auto;width:auto;height:20%;padding:2px;border:1px solid #eee">
        	<?PHP foreach($data_ri['data_ri'] as $baris_ri){ ?>
				<?PHP if($baris_ri['status']=="1"){

				 ?>
            <div class="alert alert-dismissible alert-info mx-2" style="max-width:50rem;">
             <i class="fas fa-quote-right"></i>
              <strong>Absensi Masuk</strong> <?PHP echo $baris_ri['nama_kry'] ?> Telah Dilakukan <br><b><?PHP echo "Pada Tanggal ".$baris_ri['tgl_masuk']; ?></b>
           </div>
		   <?PHP }elseif($baris_ri['status']=="2"){ ?>
			<div class="alert alert-dismissible alert-danger mx-2" style="max-width:50rem;">
             <i class="fas fa-quote-right"></i>
              <strong>Absensi Pulang</strong> <?PHP echo $baris_ri['nama_kry'] ?> Telah Dilakukan <br><b><?PHP echo "Pada Tanggal ".$baris_ri['tgl_masuk']; ?></b>
           </div>
       <?PHP } } ?>
       </div>
       		
<?PHP } ?>
<?PHP } ?>