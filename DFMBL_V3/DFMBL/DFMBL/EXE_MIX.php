<?php
     /*-------------------------------------------------------*/
    /* Himpunan Eksekusi Porses Mixing execution Quering            */
    /*-----------------------------------------------------*/
?>

<?php
         /*--------------------------*/
                /* E-PWC/
        /*---------------------------*/
            /*--E-PWC*/

			#-WS-API_EP_SAVE_RECINFO_01-#
               if(isset($_GET['GEOKLIK'])){
                  
                             
					function curlRI($urlRI){
						$chRI = curl_init(); 
						curl_setopt($chRI,CURLOPT_HTTPHEADER,array(
						"Content-Type: Application/JSON",          
						"Accept: Application/JSON"
					));
						curl_setopt($chRI, CURLOPT_URL, $urlRI); 
						curl_setopt($chRI, CURLOPT_RETURNTRANSFER, 1); 
						curl_setopt($chRI, CURLOPT_TIMEOUT, 60);  
						curl_setopt($chRI, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($chRI, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($chRI, CURLPROTO_HTTPS , true);
						curl_setopt($chRI, CURLINFO_HEADER_OUT, true);
						curl_setopt($chRI, CURLOPT_CUSTOMREQUEST, "GET");
						$outputRI = curl_exec($chRI); 
						curl_close($chRI);      
						return $outputRI;
					}
					
					$sendRI = curlRI("http://103.164.114.138/E-PWC/BJH12/EP_API/API_EP_SAVE_RECINFO_01.php?WS-GEOKLIK=WS-GEOKLIK&GEOKLIK=GEOKLIK&IDKRY=$IDEMP01&IDEMP01=$IDEMP01&IDLAT01=$IDLAT01&IDLONG01=$IDLONG01");
					
					// mengubah JSON menjadi array
					@$data_RI= json_decode($sendRI, TRUE);
                          #-WS-API_EP_SAVE_RECINFO_01-#

                              echo $data_RI[0]['message'];        


                      /*      
                    if($epwc_save_recinfo_01){
                              include"../LAYOUT/NOTIF/NF_SAVE_SUCCESS.php";
                    }else{
                         include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
                    }
                    */
               }


			   #-WS-API_EP_SAVE_RECINFO_02-#
               if(isset($_GET['GEOKLIK02'])){
                  
                             
				function curlRI($urlRI){
					$chRI = curl_init(); 
					curl_setopt($chRI,CURLOPT_HTTPHEADER,array(
					"Content-Type: Application/JSON",          
					"Accept: Application/JSON"
				));
					curl_setopt($chRI, CURLOPT_URL, $urlRI); 
					curl_setopt($chRI, CURLOPT_RETURNTRANSFER, 1); 
					curl_setopt($chRI, CURLOPT_TIMEOUT, 60);  
					curl_setopt($chRI, CURLOPT_SSL_VERIFYPEER, false);
					curl_setopt($chRI, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($chRI, CURLPROTO_HTTPS , true);
					curl_setopt($chRI, CURLINFO_HEADER_OUT, true);
					curl_setopt($chRI, CURLOPT_CUSTOMREQUEST, "GET");
					$outputRI = curl_exec($chRI); 
					curl_close($chRI);      
					return $outputRI;
				}
				
				$sendRI = curlRI("http://103.164.114.138/E-PWC/BJH12/EP_API/API_EP_SAVE_RECINFO_02.php?WS-GEOKLIK02=WS-GEOKLIK02&GEOKLIK02=GEOKLIK02&IDKRY=$IDEMP01&IDEMP01=$IDEMP01&IDLAT01=$IDLAT01&IDLONG01=$IDLONG01");
				
				// mengubah JSON menjadi array
				@$data_RI= json_decode($sendRI, TRUE);
					  #-WS-API_EP_SAVE_RECINFO_01-#

						  echo $data_RI[0]['message'];        


				  /*      
				if($epwc_save_recinfo_01){
						  include"../LAYOUT/NOTIF/NF_SAVE_SUCCESS.php";
				}else{
					 include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
				}
				*/
		   }


   ?>
<!-- -->
