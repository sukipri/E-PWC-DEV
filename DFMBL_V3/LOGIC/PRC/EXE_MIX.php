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
					
					$sendRI = curlRI("http://182.253.60.178/E-PWC/BJH12/EP_API/API_EP_SAVE_RECINFO_01.php?WS-GEOKLIK=WS-GEOKLIK&GEOKLIK=GEOKLIK&IDKRY=$IDEMP01&IDEMP01=$IDEMP01&IDLAT01=$IDLAT01&IDLONG01=$IDLONG01");
					
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
				
				$sendRI = curlRI("http://182.253.60.178/E-PWC/BJH12/EP_API/API_EP_SAVE_RECINFO_02.php?WS-GEOKLIK02=WS-GEOKLIK02&GEOKLIK02=GEOKLIK02&IDKRY=$IDEMP01&IDEMP01=$IDEMP01&IDLAT01=$IDLAT01&IDLONG01=$IDLONG01");
				
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

		   			#WS-EPWC_EP_APP_JDW_IN02.php
					   if(isset($_POST['ep_btn_cari_01'])){
						$urljdw = "http://182.253.60.178/E-PWC/BJH12/EP_API/API_EP_SAVE_TJADWAL_01_IN.php";
						//$nomorrm = @$_POST['nomorrm'];
						$fieldsjdw = array(
							'IDEMP02' => @$_POST['IDEMP02'],
							'ep_bulan_01' => @$_POST['ep_bulan_01'],
							'ep_tgl_01' => @$_POST['ep_tgl_01'],
							'ep_shift_01' => @$_POST['ep_shift_01']
						
						);
						
						$chjdw = curl_init(); 
						curl_setopt($chjdw, CURLOPT_URL, $urljdw);
						curl_setopt($chjdw, CURLOPT_CUSTOMREQUEST, "POST");
						//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
						curl_setopt($chjdw, CURLOPT_POSTFIELDS,$fieldsjdw);
						curl_setopt($chjdw, CURLOPT_RETURNTRANSFER, 1); 
						curl_setopt($chjdw, CURLOPT_TIMEOUT, 60);  
						curl_setopt($chjdw, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($chjdw, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($chjdw, CURLPROTO_HTTPS , true);
						curl_setopt($chjdw, CURLINFO_HEADER_OUT, true);
						$outputjdw = curl_exec($chjdw); 
						curl_close($chjdw);
						
						$data_jdw = json_decode($outputjdw, TRUE);
				
							echo $data_jdw[0];

					   }

					   #WS-EPWC_EP_APP_JDW_LBR
					   if(isset($_POST['ep_save_plbr_01'])){
						   $ep_plbr_kode_01 = @$SQL_SL($_POST['ep_plbr_kode_01']);
						   $ep_plbr_ket_01 = @$SQL_SL($_POST['ep_plbr_ket_01']);
						   $ep_plbr_tglmasuk_01 = @$SQL_SL($_POST['ep_plbr_tglmasuk_01']);
						   $ep_plbr_jmljam_01 = @$SQL_SL($_POST['ep_plbr_jmljam_01']);

						   	#PROCCESSING
							   $ep_save_plbr_01 = $CL_Q("$IN Citarum.dbo.tb_tj_prs_lbr_01(idmain_plbr_01,KaryNomortj,plbr_kode_01,plbr_ket_01,plbr_tglinput_01,plbr_tglmasuk_01,plbr_jmljam_01,plbr_status_01)VALUES('$IDMAIN','$IDEMP02','$ep_plbr_kode_01','$ep_plbr_ket_01','$DATE_HTML5_SQL','$ep_plbr_tglmasuk_01','$ep_plbr_jmljam_01','1')");
							   if($ep_save_plbr_01){
									header("LOCATION:?NAVI=EPWC_MENU_01_EP&PG_SA=WS-EPWC_EP_APP_JDW_LBR&IDEMP02=$IDEMP02&IDEMP01=$IDEMP01");
							   }else{
								   include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
							   }

					   }					

					     #WS-EP_APP_01-RI_LBR02 GET
						 if(isset($_GET['SAVEPLBR01'])){
                      
							#PROCCESSING
							$ep_up_plbr_02 = $CL_Q("$UP Citarum.dbo.tb_tj_prs_lbr_01 SET plbr_status_01='2' WHERE idmain_plbr_01='$IDPLBR01'");
							if($ep_up_plbr_02){
									header("location:?NAVI=EPWC_MENU_01_EP&PG_SA=WS-EPWC_EP_APP_JDW_LBR_APP");
							}else{
								include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
							}
	
					  }

		#-----------------------------IPF---------------------------------#

					  #EPWC_IPF_01_KS02
					  	if(isset($_POST['ipf_update_01'])){
							  
							  $epwc_ototgl_01 = $SQL_SL($_POST['epwc_ototgl_01']);
							  $epwc_ordertindakan_01 = $SQL_SL($_POST['epwc_ordertindakan_01']);
							  $epwc_otopengerja_01 = $SQL_SL($_POST['epwc_otopengerja_01']);
							  $epwc_otindakanket_01 = $SQL_SL($_POST['epwc_otindakanket_01']);
							  #PROCCESSING
								$epwc_up_ipf_01 = $CL_Q("$UP TOrderIPF SET OtoDate='$epwc_ototgl_01',OrderTindakan='$epwc_ordertindakan_01',OrderTindakanKet='$epwc_otindakanket_01',OtoPengerja='$epwc_otopengerja_01',OrderStatus='2' WHERE OrderNomor='$IDONOMOR01' ");
								if($epwc_up_ipf_01){
										header("location:?PG_SA=EPWC_IPF_01_KS");
							}else{
								include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
							}							  
						  }

						  #UPDATE IP
						  if(isset($_GET['UPIP'])){
							  $epwc_up_hrp_01 = $CL_Q("$UP TJ_Main_Data.DBO.HR_Personnel SET ep_ip_01='$HP_ID_MD5' WHERE Per_Code='$open_tj_vkry01_sww[Per_Code]' ");
							
							if($epwc_up_hrp_01){
							  header("location:?NAVI=EPWC_MENU_01_EP");
							}else{
								include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
							 } }

							 #EPWC_MORMET_01
							 	#VARIABLE
								$cek_tglmasuk_01 = @$SQL_SL($_POST['cek_tglmasuk_01']);
								$cek_klp_01 = @$SQL_SL($_POST['cek_klp_01']);
								$cek_list_01 = @$SQL_SL($_POST['cek_list_01']);
								$cek_ket_01 = @$SQL_SL($_POST['cek_ket_01']);
							 	#PROCESSING
								if(isset($_POST['cek_simpan_01'])){
									$epwc_simpan_cek_01  = $CL_Q("$IN Citarum.dbo.TMorMetCekList(TglCek,KlpCek,ListCek,KetCek,idmain_cek_01)VALUES('$cek_tglmasuk_01','$cek_klp_01','$cek_list_01','$cek_ket_01','$IDMAIN')");
								if($epwc_simpan_cek_01){
										include"../LAYOUT/NOTIF/NF_SAVE_SUCCESS.php";
									  }else{
										  include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
									   } }

	#--------------OTORITASI FARMASI--------------------------#
			#EPWC_OTFARM_01_VIEW02 
				#PROCCESSING INSERT UPDATE
				if(isset($_POST['btn_simpan_order'])){
					$ofarmd01_no02 = 1;
					while($ofarmd01_no02 <= $epwc_nr_vofarmd01_sw){
						$OrderBanyak = @$_POST['OrderBanyak'.$ofarmd01_no02];
						$acc = @$_POST['acc'.$ofarmd01_no02];
						$ano = @$_POST['ano'.$ofarmd01_no02];
						$hrg = @$_POST['hrg'.$ofarmd01_no02];
						$dis = @$_POST['dis'.$ofarmd01_no02];
						$dis02 = @$_POST['dis02'.$ofarmd01_no02];
							#LOGIC Order Jumlah
							if($OrderBanyak < 1 ){
								$o_jum = 0;
							}elseif($OrderBanyak > 0 ){
								$o_jum = 1;
							}
						#KALKULASI 
						$hit_order_01 = $OrderBanyak * $hrg;
						$hit_dis_order_01 = $hit_order_01 - $dis / 100 ;
						$hit_dis02_order_01 = $hit_dis_order_01 - $dis / 100 ;
						
						#echo $acc ."-". ceil($hit_dis_order_01)."<br>";
						#PROCESSING
							$epwc_up_otdfarm01_sw = $CL_Q("$UP Citarum.dbo.TOrderFrmDetil SET OrderBanyak='$OrderBanyak',OtorisasiStatus='$o_jum',OrderJumlah='$hit_dis_order_01' WHERE OrderNomor='$IDOFARM01' AND OrderAutoNomor='$ano'");
						#$epwc_up_otdfarm01_sw = "OKE";
						$ofarmd01_no02++; 
						 }
						 #$query_oke = "oke";
						 $epwc_up_otfarm01_sw = $CL_Q("$UP Citarum.dbo.TOrderFrm SET OtorisasiStatus='1',OtorisasiID='$epwc_vkry01_sww[KaryNomorYakkum]' WHERE OrderNomor='$IDOFARM01'");
					if($epwc_up_otfarm01_sw){
							header("LOCATION:?NAVI=EPWC_OTFARM_01&PG_SA=EPWC_OTFARM_01_VIEW02&IDOFARM01=$IDOFARM01");
						  }else{
							  include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
						  } 
				}
				#PROCCESSING BATAL
				if(isset($_POST['btn_btl_order'])){
					$epwc_btl_order_01 = $CL_Q("$UP Citarum.dbo.TOrderFrm SET OtorisasiStatus='0' WHERE OrderNomor='$IDOFARM01' ");
					$epwc_btl_order_02 = $CL_Q("$UP Citarum.dbo.TOrderFrmDetil SET OtorisasiStatus='0' WHERE OrderNomor='$IDOFARM01' ");
					if($epwc_btl_order_01){
						header("LOCATION:?NAVI=EPWC_OTFARM_01&PG_SA=EPWC_OTFARM_01_VIEW02&IDOFARM01=$IDOFARM01");
					  }else{
						  include"../LAYOUT/NOTIF/NF_SAVE_FAILED.php";
					  } 
				}

		#--------------ELEMBUR--------------------------#
		#VARIABLE
		#$elembur_tahun_01 = @$SQL_SL($_POST['elembur_tahun_01']);
		$elembur_bulan_01 = @$SQL_SL($_POST['elembur_bulan_01']);
		$elembur_lemtgl_0101 = @$SQL_SL($_POST['elembur_lemtgl_0101']);
		$elembur_lemtgl_0102 = @$SQL_SL($_POST['elembur_lemtgl_0102']);
		$elembur_hittgl_01 = "$elembur_lemtgl_0102-$elembur_bulan_01-$elembur_lemtgl_0101";
		$elembur_lemtgl_01 = "$elembur_hittgl_01";
		$elembur_jenis_01 = @$SQL_SL($_POST['elembur_jenis_01']);
		$elembur_jmljam_01 = @$SQL_SL($_POST['elembur_jmljam_01']);
		$elembur_ur_01 = @$SQL_SL($_POST['elembur_ur_01']);
		$elembur_al_01 = @$SQL_SL($_POST['elembur_al_01']);
		$elembur_tar_01 = @$SQL_SL($_POST['elembur_tar_01']);
		$elembur_has_01 = @$SQL_SL($_POST['elembur_has_01']);
		#PROCCESSING INSERT
		if(isset($_POST['simpan_elembur_in02'])){
			
				#JOIN DATA
					$elembur_thnbln_01 = "$DATE_Y$DATE_m";
					$elembur_thnbln_02 = "$elembur_lemtgl_0102$elembur_bulan_01";
			 /*UpahPerJam = ((JmlUP1 + JmlUP2 + JMLKlg + JmlKinerjaMin + _
    		JmlInsentifRad + JmlInsentifProg + JmlTunjPeralihan) / 173) */
     		   #GajiUP1Yakkum,GajiUP2Yakkum,GajiKlgYakkum,GajiTunjKinerjaMinYakkum,GajiInsentifRadYakkum,GajiInsentifProgYakkum,GajiTunjPeralihanYakkum,KaryStatus,KaryLemburKhusus  
			   #Round2Hundred(((1.5 * UpahPerJam) + _((IsNull(e.Row("LemburBiasa"), 0) - 1) * 2) * UpahPerJam))
			
			$upahlembur = $epwc_vw_vkry01_sww['GajiUP1Yakkum'] + $epwc_vw_vkry01_sww['GajiUP2Yakkum'] + $epwc_vw_vkry01_sww['GajiKlgYakkum'] + $epwc_vw_vkry01_sww['GajiTunjKinerjaMinYakkum'] + $epwc_vw_vkry01_sww['GajiInsentifRadYakkum'] + $epwc_vw_vkry01_sww['GajiInsentifProgYakkum'] + $epwc_vw_vkry01_sww['GajiTunjPeralihanYakkum'] ; #Upah Lembur 02
			// $hit_new_lem_01 = ($elembur_jmljam_01 * 2) / 0.5;
			$upahlembur_02 = $upahlembur / 173 ; #Upah lembur 02
			$upahlembur_var_rev01 = 1.5;
			$upahlembur_rev01 =  $upahlembur_var_rev01 * $upahlembur_02 ;
			$upahlembur_rev02 =  $upahlembur_rev01 + ($elembur_jmljam_01 - 1) * 2 * $upahlembur_02;
			
			$upahlembur_fix =  $upahlembur_rev02;
			#$upahlembur_fix =  $hit_new_lem_01;
			#$save_elembur_01 ="oke";
			#PROCCESSING QUERY
			$save_elembur_01 = $CL_Q("$IN Citarum.dbo.TKaryLemburHari(LemburBulan,LemburBulanRng,KaryNomor,LemburTanggal,LemburPersen,LemburJam1,LemburJam2,LemburBiasa,LemburBiasaJumlah,LemburUraian,LemburAlasan,LemburTarget,LemburHasil,LemburApp,LemburID,KaryDir,LemburJenis,Uploader,UnitKode)VALUES('$elembur_thnbln_01','$elembur_thnbln_02','$IDKRY','$elembur_lemtgl_01 00:00:00','100','$elembur_lemtgl_01 00:00:00','$elembur_lemtgl_01 00:00:00','$elembur_jmljam_01','$upahlembur_fix','$elembur_ur_01','$elembur_al_01','$elembur_tar_01','$elembur_has_01','2','$IDMAIN','$epwc_vkry01_sww[KaryDir]','$elembur_jenis_01','$epwc_vkry01_sww[KaryNomor]','')");
			if($save_elembur_01){
				#echo $NF($upahlembur_fix);
				#echo"SUKSESS $IDMAIN";
				#echo"<br>";
				include"../LAYOUT/NOTIF/NF_SAVE_SUCCESS.php";
				#header("LOCATION:?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEW02");
			}else{
				echo"GAGAL";
			}
		}

		#PROCCESSING INSERT
		if(isset($_POST['update_elembur_in02'])){
			
			#JOIN DATA
				$elembur_thnbln_01 = "$DATE_Y$DATE_m";
				$elembur_thnbln_02 = "$elembur_lemtgl_0102$elembur_bulan_01";
		 /*UpahPerJam = ((JmlUP1 + JmlUP2 + JMLKlg + JmlKinerjaMin + _
		JmlInsentifRad + JmlInsentifProg + JmlTunjPeralihan) / 173) */
			#GajiUP1Yakkum,GajiUP2Yakkum,GajiKlgYakkum,GajiTunjKinerjaMinYakkum,GajiInsentifRadYakkum,GajiInsentifProgYakkum,GajiTunjPeralihanYakkum,KaryStatus,KaryLemburKhusus  
		   #Round2Hundred(((1.5 * UpahPerJam) + _((IsNull(e.Row("LemburBiasa"), 0) - 1) * 2) * UpahPerJam))
		
		$upahlembur = $epwc_vw_vkry01_sww['GajiUP1Yakkum'] + $epwc_vw_vkry01_sww['GajiUP2Yakkum'] + $epwc_vw_vkry01_sww['GajiKlgYakkum'] + $epwc_vw_vkry01_sww['GajiTunjKinerjaMinYakkum'] + $epwc_vw_vkry01_sww['GajiInsentifRadYakkum'] + $epwc_vw_vkry01_sww['GajiInsentifProgYakkum'] + $epwc_vw_vkry01_sww['GajiTunjPeralihanYakkum'] ; #Upah Lembur 02
		// $hit_new_lem_01 = ($elembur_jmljam_01 * 2) / 0.5;
		$upahlembur_02 = $upahlembur / 173 ; #Upah lembur 02
		$upahlembur_var_rev01 = 1.5;
		$upahlembur_rev01 =  $upahlembur_var_rev01 * $upahlembur_02 ;
		$upahlembur_rev02 =  $upahlembur_rev01 + ($elembur_jmljam_01 - 1) * 2 * $upahlembur_02;
		
		$upahlembur_fix =  $upahlembur_rev02;
		#$upahlembur_fix =  $hit_new_lem_01;
		#$save_elembur_01 ="oke";
		#PROCCESSING QUERY
		$save_elembur_01 = $CL_Q("$UP  Citarum.dbo.TKaryLemburHari SET LemburBulan='$elembur_thnbln_01',LemburBulanRng='$elembur_thnbln_02',KaryNomor='$IDKRY',LemburTanggal='$elembur_lemtgl_01 00:00:00',LemburPersen='100',LemburJam1='$elembur_lemtgl_01 00:00:00',LemburJam2='$elembur_lemtgl_01 00:00:00',LemburBiasa='$elembur_jmljam_01',LemburBiasaJumlah='$upahlembur_fix',LemburUraian='$elembur_ur_01',LemburAlasan='$elembur_al_01',LemburTarget='$elembur_tar_01',LemburHasil='$elembur_has_01',LemburApp='2',KaryDir='$epwc_vkry01_sww[KaryDir]' WHERE LemburID='$IDLBR01'");
		if($save_elembur_01){
			#echo $NF($upahlembur_fix);
			#echo"SUKSESS $IDMAIN";
			#echo"<br>";
			#include"../LAYOUT/NOTIF/NF_SAVE_SUCCESS.php";
			header("LOCATION:?NAVI=EPWC_ELEMBUR_01&PG_SA=EPWC_ELEMBUR_01_VIEW02");
		}else{
			echo"GAGAL";
		}
	}


   ?>
<!-- -->