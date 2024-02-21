<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			//error_reporting(0);
?>

        <?php 
  
				//echo"$IDRECINFO01";
                //--VIEW REKAP DAY--//
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
                
                $send = curl("http://103.164.114.138/E-PWC/BJH12/EP_API/API_EP_SAVE_RECINFO_01_UP.php?IDRECINFO01=$IDRECINFO01");
                
                // mengubah JSON menjadi array
                @$data_ri = json_decode($send, TRUE);

                  ##-GET DATA--##
				    
				 
					//$APIkey="17dd3619561411ce1bf65fe7a91ca7fba9fa9f2e3f8b7419eddda096d9024fcc";
						function curlsf($urlsf){
                            $chsf01 = curl_init(); 
                            curl_setopt($chsf01,CURLOPT_HTTPHEADER,array(
                            "Content-Type: Application/JSON",          
                            "Accept: Application/JSON"
                        ));
                            curl_setopt($chsf01, CURLOPT_URL, $urlsf); 
                            curl_setopt($chsf01, CURLOPT_RETURNTRANSFER, 1); 
                            curl_setopt($chsf01, CURLOPT_CUSTOMREQUEST,"GET");
                            curl_setopt($chsf01, CURLOPT_TIMEOUT, 60);  
                            curl_setopt($chsf01, CURLOPT_SSL_VERIFYPEER, false);
                            curl_setopt($chsf01, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($chsf01, CURLPROTO_HTTPS , true);
                            curl_setopt($chsf01, CURLINFO_HEADER_OUT, true);
                            $outputsf = curl_exec($chsf01); 
                            curl_close($chsf01);      
                            return $outputsf;
                        }
                        
                        $sendsf = curlsf("http://103.164.114.138/E-PWC/BJH12/EP_API/API_EP_TSHIFT_01.php");
                        
                        // mengubah JSON menjadi array
                        @$data_shif = json_decode($sendsf, TRUE);

                    #>>DATABASE OPEN TJ
                        #DATA REcord Info
                        $open_tj_vrecinfo01_sw = $ms_q("$call_sel TJ_Main_Data.dbo.TA_Record_Info WHERE ID='$IDRECINFO01'");
                        $open_tj_vrecinfo01_sww = $ms_fas($open_tj_vrecinfo01_sw);
                        #DATA HR_Personnel
                        $open_tj_vkry01_sw = $ms_q("$sl ID,Per_Name,Per_Code,Dept_ID FROM TJ_Main_Data.dbo.HR_Personnel WHERE Per_Code='$open_tj_vrecinfo01_sww[Per_Code]' ");  
                        $open_tj_vkry01_sww = $ms_fas($open_tj_vkry01_sw);
                        #DATA DEPARTEMENT
                        $open_tj_vunit01_sw = $ms_q("$sl ID,Dept_Name FROM TJ_Main_Data.dbo.HR_Dept WHERE ID='$open_tj_vkry01_sww[Dept_ID]'");
                        $open_tj_vunit01_sww = $ms_fas($open_tj_vunit01_sw);
                     #<<DATABASE CLOSE TJ
                        #SUB STRUCTURAL DATA
                        $sub_tj_vrecinfo01_sw = substr($open_tj_vrecinfo01_sww['Date_Time'],0,-9);




?>

        <form method="post">
        <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <a href="<?PHP echo"?HLM=EP_HOME_01&SUB=EP_APP_01&SUB_CHILD=WS-EP_APP_01_RI_JADWAL_01&SUB_CHILD02=WS-EP_APP_01_RI_LAP_01&SUB_CHILD03=WS-EP_APP_01_RI_LAP_01_KRY02&IDEMP01=$IDEMP01"; ?>" class="btn btn-dark btn-sm"><< Back</a>
                    &nbsp
                    <strong class="me-auto">FORM UPDATE</strong>
                    <small><?PHP echo $open_tj_vunit01_sww['Dept_Name']; ?></small>
                </div>
                
                <div class="toast-body">
                    <b><?PHP echo $open_tj_vkry01_sww['Per_Name']; ?></b>
                    <br>
                        <?PHP echo $open_tj_vrecinfo01_sww['Per_Code']; ?>
                    <br>
                    UPDATE <?PHP echo tanggal_indo($open_tj_vrecinfo01_sww['Date_Time']); ?>
                </div>
             </div>
                    

                    <div style="max-width:30rem;">
                  
                    <!--  -->
                    <div class="input-group input-group-sm  mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div>
                        <input type="text"  class="form-control form-control-sm" readonly name="" value="<?PHP echo $open_tj_vrecinfo01_sww['ep_kode_01']; ?>">
                    </div>
                     <!--  -->
                     <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Tanggal & Jam Masuk</span>
                        </div>
                        <input type="text"  class="form-control form-control-sm" name="ep_tj_ri_tgl01" value="<?PHP echo $open_tj_vrecinfo01_sww['Date_Time']; ?>">
                        <span class="badge bg-info">yy/mm/dd H:i:s</span>
                    </div>
                     <!--  -->
                     <div class="input-group input-group-sm mb-3" style="max-width:15rem;">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Shift</span>
                        </div>
                       <select name="ep_tj_ri_shift_01" class="form-control form-control-sm" required>
                           <option value=""></option>
                       <?PHP 
                            foreach($data_shif['data_shif'] as $baris_shift){
                                    if($baris_shift['kode']==$open_tj_vrecinfo01_sww['ep_tjd_shift_01']){
                                        echo"<option value=$baris_shift[kode] selected>$baris_shift[kode] - $baris_shift[masuk]</option>";
                                    }else{
                                echo"<option value=$baris_shift[kode]>$baris_shift[kode] - $baris_shift[masuk]</option>";
                            }}
                       ?>
                       </select>

                    </div>

            </div>
                <button class="btn btn-success btn-sm" name="ep_tj_up_prs01">UPDATE DATA</button>
       
        </form>
                <?PHP include"../logic/EP_EXE_MIX.php"; ?>
<?PHP } ?>